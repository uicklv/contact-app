<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use \App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = auth()->user()->contacts()->latestFirst()->paginate(10);
        $companies = Company::userCompanies();

        return view('contacts.index', compact('contacts', 'companies'));
    }

    public function create()
    {
        $contact = new Contact();
        $companies = Company::userCompanies();

        return view('contacts.create', compact('companies','contact'));
    }

    public function store(ContactRequest $request)
    {
        $request->user()->contacts()->create($request->all());

        return redirect()->route('contacts.index')->with('message', 'Contact has been added successfully');
    }

    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    public function edit(Contact $contact)
    {
        $companies = Company::userCompanies();
        return view('contacts.edit', compact('companies', 'contact'));
    }

    public function update(Contact $contact, ContactRequest $request)
    {
        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('message', 'Contact has been updated successfully');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return back()->with('message', 'Contact has been deleted successfully');
    }
}
