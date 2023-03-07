<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {

        $contacts = auth()->check() ? Contact::orderBy('id', 'desc')->where(function ($query) {
            $query->where('user_id', auth()->user()->id);
            if ($companyId = request('company_id')) {
                $query->where('company_id', $companyId);
            }
            if ($search = request('search')) {

                $query->where('first_name', "LIKE", "%{$search}%");
            }
        })->paginate(10) : [];
        $companies = Company::orderBy("name", "asc")->pluck('name', 'id')->prepend('All Companies', '');

        return view('contacts.index', compact('contacts', 'companies'));
    }

    public function create()
    {
        $companies = Company::orderBy("name", "asc")->pluck('name', 'id')->prepend('All Companies', '');

        return view('contacts.contactcreate', compact("companies"));
    }

    public function store(Request $request)
    {
        $request->merge([
            'user_id' => auth()->user()->id
        ]);
        $request->validate([

            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'company_id' => 'required',
            'user_id' => 'required'
        ]);

        Contact::create($request->all());
        return redirect()->route('contacts.index')->with('message', 'Added Succrssfully');
    }

    public function edit($id)
    {
        $companies = Company::orderBy("name", "asc")->pluck('name', 'id')->prepend('All Companies', '');
        $contact = Contact::findOrFail($id);

        return view('contacts.contactedit', compact("companies", "contact"));
    }


    public function update($id, Request $request)
    {

        $request->validate([

            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'company_id' => 'required'
        ]);


        $contact = Contact::findOrFail($id);
        $contact->update($request->all());


        return redirect()->route('contacts.index')->with('message', 'Updated Succrssfully');
    }

    public function ViewContact($id)
    {

        $contact = Contact::findOrFail($id);
        return view('contacts.contactview', compact("contact"));
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return back()->with('message', "Contact has been deleted");
    }
}
