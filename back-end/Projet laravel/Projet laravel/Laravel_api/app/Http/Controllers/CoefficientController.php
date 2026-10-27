<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoefficientRequest;
use App\Models\Coefficient;
use Illuminate\Http\Request;

class CoefficientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function liste()
    {
        $coefficients = Coefficient::with(['matiere','option','fiche_renseignement'])->get();
        return response()->json($coefficients);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CoefficientRequest $request, string $id)
    {
           //methode pour modifier un coe$coefficient
        $coefficient = Coefficient::find($id);
        
        if (!$coefficient) {
            return response()->json(['message' => 'Ce coefficient n\'existe pas'], 404);
        }
        $coefficient->update($request->validated());
    
        return response()->json(['message' => 'Modification effectué avec succès']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
