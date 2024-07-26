<?php

namespace App\Http\Controllers;

use App\Models\DemandeContact;
use App\Models\Utilisateur;
use App\Models\Favori;
use App\Models\Recherche;
use App\Models\TypeBien;
use App\Models\AlerteClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class UtilisateurController extends Controller
{
    public function registerUser(Request $request)
    {

        $validatedData = $request->validate([
            'firstname' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
            'phone' => 'required|string|max:15|regex:/^[0-9]+$/',
            'mail2' => 'required|string|email|max:75|unique:Utilisateurs,email',
            'password2' => ['required', 'string', 'min:8', 'confirmed', 'regex:/[0-9]/', 'regex:/[a-zA-Z]/', 'regex:/[!@#$%^&*(),.?":{}|<>]/'],
        ]);

        $newUser = new Utilisateur();
        $newUser->prenom = $validatedData['firstname'];
        $newUser->nom = $validatedData['lastname'];
        $newUser->telephone = $validatedData['phone'];
        $newUser->email = $validatedData['mail2'];
        $newUser->mot_de_passe = Hash::make($validatedData['password2']);
        $newUser->role_id = 2;

        $newUser->save();

        Session::flash('user_alert_message', 'Votre compte a été crée avec succès, vous pouvez dès à présent vous connecter !');

        return redirect('/');
    }

    public function updateUser(Request $request)
    {
        $userId = Auth::user()->id_client;

        $user = Utilisateur::where('id_client', $userId)->first();

        $user->prenom = $request->input('update-firstname');
        $user->nom = $request->input('update-lastname');
        $user->telephone = $request->input('update-phone');
        $user->email = $request->input('update-mail');

        if ($request->input('update-password') !== Auth::user()->password) {
            $user->mot_de_passe = Hash::make($request->input('update-password'));
        }

        $user->save();

        unset($_SESSION['user']);
        $_SESSION['user'] = [
            'id' => $userId,
            'prenom' => $user->prenom,
            'nom' => $user->nom,
            'email' => $user->email,
            'telephone' => $user->telephone,
            'mot_de_passe' => $request->input('update-password'),
            'role' => $user->getUserRole->intitule_role,
        ];


        return redirect()->back()->with('user_alert_message', 'Vos informations personnelles ont été mise à jour avec succès !');
    }

    public function addFavorite(Request $request)
    {
        Favori::create([
            'id_client' => Auth::user()->id_client,
            'id_bienImmo' => $request->input('id_bienImmo'),
            'date_ajout' => Carbon::now(),
        ]);

        Session::flash('success', 'Favori ajouté avec succès!');

        return Redirect::back();
    }

    public function removeFavorite(Request $request)
    {
        if (!isset(Auth::user()->id_client)) {
            return response()->json(['removedFavorite' => false, 'message' => 'Aucun utilisateur n\'est connecté !']);
        }

        $id_client = Auth::user()->id_client;
        $id_bienImmo = $request->input('id_bienImmo');

        DB::table('favoris')->where('id_client', $id_client)->where('id_bienImmo', $id_bienImmo)->delete();

        return response()->json(['removedFavorite' => true, 'message' => 'Ce bien à été retiré de vos favoris !']);
    }

    public function saveSearch(Request $request)
    {
        $validatedData = $request->validate([
            'propertyStatus' => 'required|in:acheter,louer',
            'propertyType' => 'required|string',
            'propertyKeywords' => 'nullable|string',
            'propertyCity' => 'nullable|string',
            'propertyMinPrice' => 'nullable|numeric',
            'propertyMaxPrice' => 'nullable|numeric'
        ]);

        $typeBien = TypeBien::where('intitule_type', $validatedData['propertyType'])->firstOrFail();

        $recherche = new Recherche();

        $recherche->date_enregistrement_recherche = Carbon::now();
        $recherche->id_client = $_SESSION['user']['id'];
        $recherche->id_typeBien = $typeBien->id_typeBien;
        $recherche->achat = $validatedData['propertyStatus'] === 'acheter';
        $recherche->mots_cles = $validatedData['propertyKeywords'];
        $recherche->ville = $validatedData['propertyCity'];
        $recherche->budget_min = $validatedData['propertyMinPrice'];
        $recherche->budget_max = $validatedData['propertyMaxPrice'];

        $recherche->save();

        return response()->json(['searchRegistered' => true]);
    }

    public function deleteUserSearch($id)
    {
        $recherche = Recherche::findOrFail($id);
        $recherche->delete();

        return response()->json(['searchDeleted' => true]);
    }
    public function sendContactRequest(Request $request)
    {
        $validatedData = $request->validate([
            'contact-lastname' => 'required|string|max:255',
            'contact-firstname' => 'required|string|max:255',
            'contact-mail' => 'required|email|max:255',
            'contact-phonenum' => 'required|string|max:20',
            'contact-message' => 'nullable|string',
            'id_bienImmo' => 'nullable|integer|exists:biens_immo,id_bienImmo'
        ]);

        $demandeContact = new DemandeContact();
        $demandeContact->nom_demandeur = $validatedData['contact-lastname'];
        $demandeContact->prenom_demandeur = $validatedData['contact-firstname'];
        $demandeContact->mail_demandeur = $validatedData['contact-mail'];
        $demandeContact->tel_demandeur = $validatedData['contact-phonenum'];
        $demandeContact->contenu_demande = $validatedData['contact-message'] ?? '';
        $demandeContact->id_bienImmo = $validatedData['id_bienImmo'] ?? null;
        $demandeContact->save();

        return redirect()->back()->with('user_alert_message', 'Merci, votre demande de contact nous a bien été transmise. Nous vous répondrons sous 72 heures !');
    }

    public function deleteContactRequest($id)
    {

        $demande = DemandeContact::findOrFail($id);
        $demande->delete();

        return response()->json(['contactRequestDeleted' => true]);
    }


    public function sendNotificationClient(Request $request)
    {

        $request->validate([
            'id_client' => 'required|exists:Utilisateurs,id_client',
            'titre_alerte' => 'required|string|max:255',
            'contenu_alerte' => 'required|string',
        ]);

        AlerteClient::create([
            'id_client' => $request->input('id_client'),
            'titre_alerte' => $request->input('titre_alerte'),
            'contenu_alerte' => $request->input('contenu_alerte'),
        ]);

        return response()->json(['notificationSended' => true]);
    }
}
