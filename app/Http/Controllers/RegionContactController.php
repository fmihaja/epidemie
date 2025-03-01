<?php

namespace App\Http\Controllers;

use App\Models\RegionContact;
use App\Models\Region;
use App\Models\Contact;
use Illuminate\Http\Request;

class RegionContactController extends Controller
{
    /**
     * Afficher la liste des contacts associés aux régions.
     */
    public function index()
    {
        $regionContacts = RegionContact::with(['contact', 'region'])->paginate(10);
        return view('region_contacts.index', compact('regionContacts'));
    }

    /**
     * Afficher le formulaire de création.
     */
    public function create()
    {
        $contacts = Contact::all();
        $regions = Region::all();
        return view('region_contacts.create', compact('contacts', 'regions'));
    }

    /**
     * Enregistrer une nouvelle association.
     */
    public function store(Request $request)
    {
        $request->validate([
            'contact_id' => 'required|exists:contacts,id',
            'region_id' => 'required|exists:regions,id',
        ]);

        RegionContact::create($request->all());

        return redirect()->route('region_contacts.index')->with('success', 'Association ajoutée avec succès.');
    }

    /**
     * Afficher les détails d'une association.
     */
    public function show(RegionContact $regionContact)
    {
        return view('region_contacts.show', compact('regionContact'));
    }

    /**
     * Afficher le formulaire d'édition.
     */
    public function edit(RegionContact $regionContact)
    {
        $contacts = Contact::all();
        $regions = Region::all();
        return view('region_contacts.edit', compact('regionContact', 'contacts', 'regions'));
    }

    /**
     * Mettre à jour une association.
     */
    public function update(Request $request, RegionContact $regionContact)
    {
        $request->validate([
            'contact_id' => 'required|exists:contacts,id',
            'region_id' => 'required|exists:regions,id',
        ]);

        $regionContact->update($request->all());

        return redirect()->route('region_contacts.index')->with('success', 'Association mise à jour avec succès.');
    }

    /**
     * Supprimer une association.
     */
    public function destroy(RegionContact $regionContact)
    {
        $regionContact->delete();
        return redirect()->route('region_contacts.index')->with('success', 'Association supprimée avec succès.');
    }
}
