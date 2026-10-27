<?php

namespace App\Http\Controllers\Concerns;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Pagination activée seulement si le client envoie `?per_page=N` (max 200) :
 * sans ce paramètre, la réponse reste la liste complète attendue par le front actuel.
 */
trait PaginationOptionnelle
{
    protected function listeOuPage(Builder $requete, Request $request): JsonResponse
    {
        if (! $request->filled('per_page')) {
            return response()->json($requete->get());
        }

        $parPage = max(1, min((int) $request->query('per_page'), 200));

        return response()->json($requete->paginate($parPage));
    }
}
