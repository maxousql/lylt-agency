<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUser;
use App\Http\Requests\UpdateUserInfo;
use App\Http\Requests\UpdateUserPassword;
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
    public function updateUserInfo(UpdateUserInfo $request)
    {
        $user = Utilisateur::findOrFail(Auth::user()->id_client);

        $user->update($request->validated());

        Session::flash('success', 'Informations mise à jour avec succès !');

        return Redirect::back();
    }

    public function updateUserPassword(UpdateUserPassword $request)
    {
        $validatedData = $request->validated();
        $user = Utilisateur::findOrFail(Auth::user()->id_client);

        if (!Hash::check($validatedData['old-password'], $user->password)) {
            return response()->json(['error' => 'L\'ancien mot de passe est incorrect.'], 400);
        }

        if ($validatedData['new-password']) {
            $user->password = Hash::make($validatedData['new-password']);
            $user->save();
        }

        Session::flash('success', 'Mot de passe modifié avec succès !');

        return Redirect::back();
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
