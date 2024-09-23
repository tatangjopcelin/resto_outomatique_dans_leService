<?php
namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UtilisateurController extends Controller
{
    public function register(Request $request)
    {
        // Validation des données
        $request->validate([
            'nom_utilisateur' => 'required|string|max:255',
            'mot_de_pass' => 'required|string|min:8|confirmed', // Le mot de passe doit être confirmé
            'email' => 'required|string|email|max:255|unique:utilisateurs',
            'role' => 'required|string|max:255',
        ]);

        // Création de l'utilisateur
        $utilisateur = Utilisateur::create([
            'nom_utilisateur' => $request->nom_utilisateur,
            'mot_de_pass' => Hash::make($request->mot_de_pass),
            'email' => $request->email,
            'role' => $request->role,
        ]);

        // Retourner une réponse
        return response()->json(['message' => 'Utilisateur créé avec succès', 'utilisateur' => $utilisateur], 201);
    }
}
