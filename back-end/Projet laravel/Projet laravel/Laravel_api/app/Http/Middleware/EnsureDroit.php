<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Contrôle d'accès par rôle (colonne `users.Droit`).
 *
 *  - `droit:DG,admin`           : toutes les requêtes sont limitées à ces rôles ;
 *  - `droit.ecriture:Comptable` : seules les écritures le sont, la lecture reste
 *                                 ouverte à tout utilisateur authentifié.
 */
class EnsureDroit
{
    /** Routes en POST qui ne font que lire des données : traitées comme des lectures. */
    private const LECTURES_EN_POST = [
        'actionParentId',
        'getactionPersonnelId',
        'list-notation',
        'list-resultatAnnuel',
        'list-resultatSemestriel',
        'bulletin_eleve',
        'MgEleve',
    ];

    public function handle(Request $request, Closure $next, string $mode, string ...$droits): Response
    {
        if ($mode === 'ecriture' && $this->estUneLecture($request)) {
            return $next($request);
        }

        $user = $request->user();

        if (! $user || ! in_array($user->Droit, $droits, true)) {
            return response()->json(['message' => 'Accès non autorisé'], 403);
        }

        return $next($request);
    }

    private function estUneLecture(Request $request): bool
    {
        return $request->isMethodSafe()
            || in_array($request->route()?->getName(), self::LECTURES_EN_POST, true);
    }
}
