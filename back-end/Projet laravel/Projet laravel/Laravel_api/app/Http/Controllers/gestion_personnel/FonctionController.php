<?php

namespace App\Http\Controllers\gestion_personnel;

use App\Http\Controllers\Controller;
use App\Http\Requests\gestion_personnel\FonctionRequest;
use App\Models\Fonction;
use Illuminate\Http\Request;

class FonctionController extends Controller
{
    public function liste()
    {
        $fonctions = Fonction::all();
        return response()->json($fonctions);
    }

    public function create(FonctionRequest $request)
    {
        $fonction = Fonction::create($request->validated());
        return response()->json(['message' => 'Enregistrement effectué avec succès']);
    }

    public function show(int $id)
    {
        $fonction = Fonction::find($id);
        if (is_null($fonction)) {
            return response()->json(['message' => 'Cette fonction n\'existe pas'], 404);
        }
        return response()->json($fonction);
    }

    public function update(FonctionRequest $request, int $id)
    {
        $fonction = Fonction::find($id);
        if (!$fonction) {
            return response()->json(['message' => 'Cette fonction n\'existe pas'], 404);
        }
        $fonction->update($request->validated());

        return response()->json(['message' => 'Modification effectuée avec succès']);
    }
    public function delete(int $id)
    {
        $fonction = Fonction::find($id);
        if (!$fonction) {
            return response()->json(['message' => 'Cette fonction n\'existe pas'], 404);
        }
        $fonction->delete();
        return response()->json(['message' => 'Suppression effectuée avec succès']);
    }
    //
}
