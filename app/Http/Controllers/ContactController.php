<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Contact;
use Session;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::orderBy('fname','asc')->get();
        return view('contacts.index')->with('storedContacts', $contacts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *'number' => 'required|numeric|size:11',
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'fname' => 'required|min:2|max:50',
            'lname' => 'required|min:2|max:50',
            'email' => ['required','string', 'email', 'max:250',
            'unique:contacts'],
            'number' => 'required|numeric|min:2',
            
        ]);

        $contact = new Contact;

        $contact->fname = $request->fname;
        $contact->lname = $request->lname;
        $contact->email = $request->email;
        $contact->number = $request->number;

        $contact->save();

            Session::flash('success','Contact Added!');

        return redirect()->route('contacts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);

        return view('contacts.show')->with('contactShow', $contact);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id);

        return view('contacts.edit')->with('contactEdit', $contact);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   $contact = Contact::find($id);
        $this->validate($request, [
            'ufname' => 'required|min:2|max:50',
            'ulname' => 'required|min:2|max:50',
            'email' => 'required|string|email|max:250|unique:contacts,email,'.$contact->id,
            'unumber' => 'required|numeric|min:2',
            
        ]);

        

        $contact->fname = $request->ufname;
        $contact->lname = $request->ulname;
        $contact->email = $request->email;
        $contact->number = $request->unumber;

        $contact->save();

         Session::flash('success2','Contact Updated!');

         return view('contacts.edit')->with('contactEdit', $contact);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete(); 
            Session::flash('success1','Contact Deleted!');
        return redirect()->route('contacts.index');
    }
}
