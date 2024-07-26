<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBien;
use App\Models\AlerteClient;
use App\Models\BienImmo;
use App\Models\Image;
use App\Models\Recherche;
use App\Models\TypeBien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BienController extends Controller
{
    public function searchProperties(Request $request)
    {
        $query = BienImmo::where('disponible', 1)
            ->join('types_biens', 'biens_immo.typeBien_id', '=', 'types_biens.id_typeBien');

        $this->applyFilters($query, $request);
        $properties = $query->paginate(6);
        $searchExists = $this->checkSearchExists($request);

        return view('property.listing', compact('properties', 'request', 'searchExists'));
    }

    public function searchPropertiesByCity(Request $request)
    {
        $query = BienImmo::where('disponible', 1)
            ->join('types_biens', 'biens_immo.typeBien_id', '=', 'types_biens.id_typeBien');

        if ($request->filled('property-city')) {
            $query->where('ville', 'like', "%" . $request->input('property-city') . "%");
        }
        $this->applyFilters($query, $request);

        $properties = $query->paginate(6);

        $searchExists = null;

        return view('property.listing', compact('properties', 'request', 'searchExists'));
    }

    private function applyFilters($query, Request $request)
    {
        if ($request->filled('property-status')) {
            $isAchat = $request->input('property-status') === 'acheter';
            $query->where('achat', $isAchat);
        }

        if ($request->filled('property-type')) {
            $query->where('types_biens.intitule_type', $request->input('property-type'));
        }

        if ($request->filled('property-keywords')) {
            $keywords = $request->input('property-keywords');
            $query->where(function ($q) use ($keywords) {
                $q->where('titre_annonce', 'like', "%$keywords%")
                    ->orWhere('contenu_annonce', 'like', "%$keywords%");
            });
        }

        if ($request->filled('property-city')) {
            $query->where('ville', 'like', "%" . $request->input('property-city') . "%");
        }

        if ($request->filled('property-min-price')) {
            $query->where('prix', '>=', $request->input('property-min-price'));
        }

        if ($request->filled('property-max-price')) {
            $query->where('prix', '<=', $request->input('property-max-price'));
        }
    }

    private function checkSearchExists(Request $request)
    {
        $typeBien = TypeBien::where('intitule_type', $request->input('property-type'))->first();

        if (isset(Auth::user()->id_client)) {
            return Recherche::where('id_client', Auth::user()->id_client)
                ->where('id_typeBien', $typeBien->id_typeBien)
                ->where('achat', $request->input('property-status') === 'acheter')
                ->where('mots_cles', $request->input('property-keywords'))
                ->where('ville', $request->input('property-city'))
                ->where('budget_min', $request->input('property-min-price'))
                ->where('budget_max', $request->input('property-max-price'))
                ->exists();
        }

        return false;
    }

    public function retakeUserSearch($id)
    {
        $recherche = Recherche::with('getTypeBien')->findOrFail($id);
        $typeBienIntitule = $recherche->getTypeBien->intitule_type ?? null;

        $queryParams = [
            'property-status' => $recherche->achat ? 'acheter' : 'louer',
            'property-type' => $typeBienIntitule,
            'property-keywords' => $recherche->mots_cles,
            'property-city' => $recherche->ville,
            'property-min-price' => $recherche->budget_min,
            'property-max-price' => $recherche->budget_max
        ];

        return redirect()->route('search-properties', $queryParams);
    }

    public function showAllProperties()
    {
        $properties = BienImmo::where('disponible', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(6);
        $searchExists = '';

        return view('property.listing', compact('properties', 'searchExists'));
    }

    public function registerProperty(CreateBien $request)
    {
        $bien = BienImmo::create($request->validated());

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('photos', 'public');
                Image::create([
                    'id_bien' => $bien->id_bienImmo,
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('sale-form');
    }

    public function changeVisibilityProperty($id)
    {
        $bien = BienImmo::findOrFail($id);
        $bien->disponible = !$bien->disponible;
        $returnStatus = $bien->disponible ? 'visible' : 'hidden';
        $bien->save();

        $this->notifyUsers($bien, $returnStatus);

        return response()->json(['visibilityChanged' => $returnStatus]);
    }

    private function notifyUsers($bien, $status)
    {
        $usersInterested = $bien->getClientsInteressés;
        $titreAlerte = $status === 'visible'
            ? '"' . $bien->titre_annonce . '" de nouveau disponible'
            : '"' . $bien->titre_annonce . '" indisponible';
        $contenuAlerte = $status === 'visible'
            ? 'Un bien que vous aviez ajouté à vos favoris est de nouveau disponible ! N\'hésitez pas à aller le consulter !'
            : 'Ce bien que vous aviez ajouté à vos favoris n\'est plus disponible pour l\'instant. S\'il le redevient, une autre notification vous l\'informera.';

        foreach ($usersInterested as $user) {
            AlerteClient::create([
                'id_client' => $user->id_client,
                'titre_alerte' => $titreAlerte,
                'contenu_alerte' => $contenuAlerte
            ]);
        }
    }

    public function deleteProperty($id)
    {
        $bien = BienImmo::findOrFail($id);

        $this->notifyUsers($bien, 'deleted');

        $bien->delete();

        return response()->json(['propertyDeleted' => true]);
    }
}
