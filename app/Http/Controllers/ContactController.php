<?php

namespace App\Http\Controllers;

use App\Contactmodel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\RequiredIf;
class ContactController extends Controller
{
    public function contactliste()
    {
         $contact=Contactmodel::all();
            // $contact= Contactmodel::status();
            // $contact= Contactmodel::where('status','=', 1)->get();
            // $contact=Contactmodel::with('liste')->paginate(20);
        return view('/admin/Contact/liste',
        ['contact'=>$contact]);
    }
    public function create()
    {

        request()->validate([
            'adresse'=>'required|min:4',
            'mail'=>'required|email',
            'telephone'=>'required|min:8',
        ]);
         $adresse=request('adresse');
         $telephone=request('telephone');
         $mail=request('mail');
         $status=1;
         $contact=new Contactmodel();
         $contact->adresse=$adresse;
         $contact->telephone=$telephone;
         $contact->status=$status;
         $contact->mail=$mail;
         $contact->save();


    # code...

    return view('/admin/Contact/create')->withSuceesMessage('BIEN ENREGSTREI') ;

    }
    public function show($contact)
    {
        // dd('fjdkssjsd');
        $contact=Contactmodel::where('id',$contact)->firstOrfail();
        // $contact=Contactmodel::find($contact);
        return view('admin.Contact.single',compact('contact'));
    }
     public function edit(Contactmodel $contact)
    {
    # code...
        return view('admin.contact.update',compact('contact'));
    }
    public function update(Contactmodel $contact){

        $data=request()->validate([
            'adresse'=>'required|min:4',
            'mail'=>'required|email',
            'telephone'=>'required|min:8',
        ]);
        $contact->update($data);
       return redirect('contact.'.$contact->id);
    }
}
