<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CaseContact;
use App\Models\Contact;
use App\Models\Region;


class CaseContactController extends Controller
{
    public function index()
    {
        $caseContacts = CaseContact::with(['contact', 'region'])->paginate(10);
        return view('case_contacts.index', compact('caseContacts'));
    }

    /**
     * Afficher le formulaire de création.
     */
    public function create()
    {
        $contacts = Contact::all();
        $regions = Region::all();
        return view('case_contacts.create', compact('contacts', 'regions'));
    }

    /**
     * Enregistrer une nouvelle relation case-contact.
     */
    public function store(Request $request)
    {
        $request->validate([
            'contact_id' => 'required|exists:contacts,id',
            'case_id' => 'required|exists:regions,id',
        ]);

        CaseContact::create($request->all());

        return redirect()->route('case_contacts.index')->with('success', 'Association case-contact ajoutée avec succès.');
    }

    /**
     * Afficher les détails d'une relation case-contact.
     */
    public function show(CaseContact $caseContact)
    {
        return view('case_contacts.show', compact('caseContact'));
    }

    /**
     * Afficher le formulaire d'édition.
     */
    public function edit(CaseContact $caseContact)
    {
        $contacts = Contact::all();
        $regions = Region::all();
        return view('case_contacts.edit', compact('caseContact', 'contacts', 'regions'));
    }

    /**
     * Mettre à jour une relation case-contact.
     */
    public function update(Request $request, CaseContact $caseContact)
    {
        $request->validate([
            'contact_id' => 'required|exists:contacts,id',
            'case_id' => 'required|exists:regions,id',
        ]);

        $caseContact->update($request->all());

        return redirect()->route('case_contacts.index')->with('success', 'Association case-contact mise à jour avec succès.');
    }


    public function destroy(CaseContact $caseContact)
    {
        $caseContact->delete();
        return redirect()->route('case_contacts.index')->with('success', 'Association case-contact supprimée avec succès.');
    }
}
