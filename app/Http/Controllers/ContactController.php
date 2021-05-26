<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Support\Facades\Request;

class ContactController extends Controller
{
    public function index(){
    $conacts = Contact::all();
    return view('index' , compact('contacts'));
    }
    public function contact(){
        return view('contact');
    }
    public function store (Request $request){
        $contact = new Contact ;
        $contact->FName = $request->firstName ;
        $contact->LName = $request->lastName ;
        $contact->email = $request->email ;
        $contact->save();
        return redirect() -> back();
    }
    public function edit($id){
        $contact = Contact::find($id);
        return view('edit' , compact('contact'));
    }
    public function update(Request $request , $id){
        $contact = Contact::find($id);
        $contact->FName = $request->firstName;
        $contact->LName = $request->lastName;
        $contact->email = $request->email;

        $contact->save();

        return redirect('/');
    }
    public function destroy($id)
    {
        $contact= Contact::find($id);
        $contact->delete();
        return redirect('/');
    }
}
