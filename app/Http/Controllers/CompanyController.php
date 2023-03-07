<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = auth()->user() ?
        Company::orderBy('id', 'desc')->
        where(function($query){

            $query->where('user_id',auth()->user()->id);

            if($search = request('search')){

                $query->where('name','LIKE', "%{$search}%");

 
            }
            
        })->
        paginate(10) : "";


        return view('companies.index', compact('companies'));
    }


    public function create()
    {


        return view('companies.companycreate');
    }

    public function store(Request $request)
    {
        $request->merge([
            'user_id' => auth()->user()->id
        ]);

        $request->validate(

            [
                'name' => 'required',
                'address' => 'required',
                'email' => 'required',
                "website" => 'required',
                'user_id' => 'required'
            ]
        );

        Company::create($request->all());
        return redirect()->route('companies.index')->with('massage', "Company has been added");
    }

    public function view($id)
    {
        $company = Company::findOrFail($id);
        return view('companies.companyview',compact('company'));
        
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);

        $company->delete();
        return back()->with('message', "Contact has been deleted");
    }
}
