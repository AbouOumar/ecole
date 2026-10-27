<?php

namespace App\Http\Middleware;

use App\Models\Eleve;
use App\Models\Parent_eleve;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Restreint les comptes `eleve` et `parent` à leurs propres données.
 *
 * Pour ces deux profils l'accès est refusé par défaut : seules les routes listées
 * ci-dessous passent, soit librement (configuration en lecture), soit après
 * vérification que la ressource demandée leur appartient (élève, enfant, classe).
 * Les autres profils (administration, enseignants) ne sont pas concernés.
 *
 * `users.idDroit` contient l'id de l'élève (profil eleve) ou du parent (profil parent).
 */
class EnsureAccesPersonnel
{
    /** Routes de données personnelles : nom de route => [type de ressource, source]. */
    private const PROPRES = [
        'eleveId' => ['eleve', 'id'],
        'showMatricule' => ['eleve', 'matricule'],
        'parent_eleveId' => ['eleve', 'id'],
        'actionEleveId' => ['eleve', 'id'],
        'ImpayesEleve' => ['eleve', 'id'],
        'frais_scolairiteEleve' => ['eleve', 'matricule'],
        'list-bulletinsDisoEleve' => ['eleve', 'id'],
        'bulletin_eleve' => ['eleve', 'corps:eleve_id'],
        'eleve_parentId' => ['parent', 'id'],
        'actionParentId' => ['parent', 'corps:id'],
        'emploi_tempsId' => ['classe', 'id'],
        'showEmploiClasse' => ['classe', 'classe_id'],
    ];

    /** Routes communes (configuration ou compte personnel) ouvertes à tout utilisateur connecté. */
    private const COMMUNES = [
        'logout', 'updateUser',
        'list-anneeScolaire', 'list-semestreAnnee', 'anneeScolaireId',
        'list-classe', 'list-desclasse', 'classeId', 'fraisParClasseId',
        'list-matiere', 'matiereId', 'list-coefficient', 'coefficientId',
    ];

    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (! $user || ! in_array($user->Droit, ['eleve', 'parent'], true)) {
            return $next($request);
        }

        $nom = $request->route()?->getName();

        if (in_array($nom, self::COMMUNES, true)) {
            return $next($request);
        }

        if (isset(self::PROPRES[$nom]) && $this->luiAppartient($request, $user, ...self::PROPRES[$nom])) {
            return $next($request);
        }

        return response()->json(['message' => 'Accès non autorisé'], 403);
    }

    private function luiAppartient(Request $request, $user, string $type, string $source): bool
    {
        $valeur = str_starts_with($source, 'corps:')
            ? $request->input(substr($source, 6))
            : $request->route($source);

        if ($valeur === null || $valeur === '') {
            return false;
        }

        // `actionParentId` reçoit aussi un `type` : seul le type « parent » concerne un compte parent.
        if ($source === 'corps:id' && $request->input('type') !== 'parent') {
            return false;
        }

        return match ($type) {
            'eleve' => $this->eleveAutorise($user, $this->idEleve($source, $valeur)),
            'parent' => $user->Droit === 'parent' && (int) $user->idDroit === (int) $valeur,
            'classe' => in_array((int) $valeur, $this->classesAutorisees($user), true),
            default => false,
        };
    }

    private function idEleve(string $source, mixed $valeur): ?int
    {
        if ($source === 'matricule') {
            return Eleve::where('matricule_eleve', $valeur)->value('id');
        }

        return (int) $valeur;
    }

    private function eleveAutorise($user, ?int $eleveId): bool
    {
        return $eleveId !== null && in_array($eleveId, $this->elevesAutorises($user), true);
    }

    /** @return int[] */
    private function elevesAutorises($user): array
    {
        if ($user->Droit === 'eleve') {
            return [(int) $user->idDroit];
        }

        return Parent_eleve::where('parent_id', $user->idDroit)->pluck('eleve_id')->map(fn ($id) => (int) $id)->all();
    }

    /** @return int[] */
    private function classesAutorisees($user): array
    {
        return Eleve::whereIn('id', $this->elevesAutorises($user))->pluck('classe_id')->filter()->map(fn ($id) => (int) $id)->all();
    }
}
