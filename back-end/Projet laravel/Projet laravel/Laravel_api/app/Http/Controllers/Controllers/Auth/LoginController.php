<?php

namespace App\Http\Controllers\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Absence;
use App\Models\Info_site;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class LoginController extends Controller
{
    public function inscription_store(Request $request){
        $request->validate([
            'prenomUser'=>'required',
            'nomUser'=>'required',
            'telephoneUser'=>'required',
            'Droit'=>['required', Rule::in(User::DROITS)],
            'idDroit'=>'required',
            'password'=>'required',
            'email'=>'required',
            'role'=>['required', Rule::in(User::ROLES)],
            'photosUser'=>'required',
            'matricule',
            'statut',
        ]);
        $users = new User();
        $users->prenomUser = $request->prenomUser;
        $users->nomUser = $request->nomUser;
        $users->telephoneUser = $request->telephoneUser;
        $users->Droit = $request->Droit;
        $users->idDroit = $request->idDroit;
        $users->email = $request->email;
        $users->role = $request->role;
        $users->photosUser = $request->photosUser;
        $users->password = bcrypt($request->password);
        $users->statut = "actif";
        $users->save();
       
        
    }

    public function updateUserStatut($id){
        $user = User::find($id);
        if($user->statut =="actif"){
            $user->statut ="bloquer";
        }else{
            $user->statut ="actif";
        }

        $user->update();
        return response()->json(['message'=>'Le Statut à été modifié']);
    }

    public function updateUser(Request $request, $id){
        $request->validate([
            'prenomUser'=>'required',
            'nomUser'=>'required',
            'telephoneUser'=>'required',
            'password'=>'nullable',
            'email'=>'required',
            'photosUser'=>'nullable',
        ]);

        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'cet utilisateur n existe pas'], 404);
        }
        $acteur = $request->user();
        if ((int) $acteur->id !== (int) $user->id && !in_array($acteur->Droit, ['admin', 'DG'], true)) {
            return response()->json(['message' => 'Accès non autorisé'], 403);
        }
        // 🔹 Vérifier si une nouvelle image a été envoyée
        if ($request->hasFile('photosUser')) {
            // Supprimer l'ancienne photosUser si elle existe
            if ($user->photosUser && $user->photosUser !="avatar.png" && file_exists(public_path('storage/images/profile/' . $user->photosUser))) {
                unlink(public_path('storage/images/profile/' . $user->photosUser));
            }
    
            // Stocker la nouvelle photosUser
            $file = $request->file('photosUser');
             $nomFichier = time() . '_' . $file->getClientOriginalName();
            $uploadPath = $file->storeAs('images/profile',$nomFichier, 'public'); 
        }else{
            if ($user->photosUser) {
                $nomFichier=$user->photosUser;
            }else{
                $nomFichier="avatar.png";
            }
        }

        
        if($user){
            $user->prenomUser = $request->prenomUser;
            $user->nomUser = $request->nomUser;
            $user->telephoneUser = $request->telephoneUser;
            if($request->password){
               $user->password = bcrypt($request->password); 
            }
            $user->email = $request->email;
            $user->photosUser = $nomFichier;
            $user->update();
            return response()->json(['message'=>'Modification effectuer avec succes']);
        }else{
            return response()->json('cet utilisateur n existe pas');
        }

    }

    public function listeUser(){

        $user= User::all();
        return response()->json($user);
    }
    public function infosite_store(Request $request){
        $request->validate([
            'nom_ecole'=>'required',
            'logo'=>'',
            'telephone_ecole'=>'required',
            'adresse_ecole'=>'required',
            'email_ecole'=>'required',
            'description_ecole'=>'required',
            'histoire_ecole'=>'required',
            'slogan'=>'required',
        ]);
        $infoSite = Info_site::find(1);
        $infoSite->nom_ecole = $request->nom_ecole;
        $infoSite->logo = $request->logo;
        $infoSite->telephone_ecole = $request->telephone_ecole;
        $infoSite->adresse_ecole = $request->adresse_ecole;
        $infoSite->email_ecole = $request->email_ecole;
        $infoSite->slogan = $request->slogan;
        $infoSite->description_ecole = $request->description_ecole;
        $infoSite->histoire_ecole = $request->histoire_ecole;
        $infoSite->update();
        return response()->json('Modification effectuer avec succes');
        
    }
    public function login_store(Request $request){
        $request = $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        $user = User::where('email', $request['email'])->first();
        if(!$user){
             return response()->json(['message' => 'Identifiants incorrects: '], 201);
        }
        if($user->statut=='bloquer'){
            return response()->json(['message' => 'Ce compte utilisateur est bloqué'], 201);
        }

        if (!Hash::check($request['password'], $user->password)) {

            return response()->json(['message' => 'Identifiants incorrects: '], 201);
        }

        $token = $user->createToken('token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token
        ]);
        
    }

    public function logout(Request $request){
        $user =$request->user();
        if($user && $user->currentAccessToken()){
            $user->currentAccessToken()->delete();
            return response()->json(['message'=>'Déconnexion réussie']);
        }
        return response()->json(['message' => 'Utilisateur non authentifié'],401);
    }
    
    public function destroy($id){
        $nbUser=User::count();
        if($nbUser>1){
            $user = User::findOrFail($id);
            $user->delete();
        }
    }

    public function showFile($filename, Request $request): StreamedResponse | \Illuminate\Http\JsonResponse
    {
        $user = $request->user();

        if (!$user || !in_array($user->Droit, ['Comptable', 'DG', 'admin'])) {
            return response()->json(['message' => 'Accès non autorisé'], 403);
        }

        $path = 'public/images/pieceJointe/' . $filename;

        if (!Storage::exists($path)) {
            return response()->json(['message' => 'Fichier introuvable'], 404);
        }

        $mimeType = Storage::mimeType($path);
        return Storage::response($path, $filename, [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'inline; filename="' . $filename . '"'
        ]);
    }
}
