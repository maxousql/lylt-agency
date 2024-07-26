<?php

namespace App\Http\Controllers;

use App\Models\BienImmo;
use App\Models\Utilisateur;
use App\Models\Favori;
use App\Models\Recherche;
use App\Models\AlerteClient;
use App\Models\DemandeContact;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ViewsController extends Controller
{
    public function showHomepage()
    {
        $recentProperties = BienImmo::where('disponible', 1)->orderBy('created_at', 'desc')->take(3)->with('getImages')->get();
        return view('homepage', ['recentProperties' => $recentProperties]);
    }

    public function showPropertyDetail($id)
    {
        $propertyDetails = BienImmo::with(['getTypeBien', 'getImages'])->findOrFail($id);

        $isFavorited = false;
        if (isset(Auth::user()->id_client)) {
            $id_client = Auth::user()->id_client;
            $isFavorited = DB::table('favoris')->where('id_client', $id_client)->where('id_bienImmo', $id)->exists();
        }

        return view('property.detail', compact('propertyDetails', 'isFavorited'));
    }


    public function showUserAccount()
    {
        if (!isset(Auth::user()->id_client)) {
            $homeUrl = route('homepage');

            header('Location: ' . $homeUrl);
            exit();
        }

        $id_user = Auth::user()->id_client;
        $favorites = Favori::where('id_client', $id_user)->whereHas('getBienImmo', fn($query) => $query->where('disponible', 1))->with('getBienImmo')->orderBy('created_at', 'desc')->get();
        $researches = Recherche::where('id_client', $id_user)->with('getTypeBien')->orderBy('created_at', 'desc')->get();
        $notifications = AlerteClient::where('id_client', $id_user)->orderBy('created_at', 'desc')->get();

        return view('account.user', compact('favorites', 'researches', 'notifications'));
    }


    public function showAdminAccount()
    {
        $contactRequests = DemandeContact::all();
        $biens = BienImmo::all();
        $clients = Utilisateur::where('role_id', 2)->get();

        return view('account.admin', compact('contactRequests', 'biens', 'clients'));
    }
}
