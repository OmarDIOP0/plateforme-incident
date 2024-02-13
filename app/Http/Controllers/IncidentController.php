<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncidentController extends Controller
{
    public function index()
    {

        return view("incident");
    }

    public function dashboard()
    {
        $incidents=Incident::all();
        return view('dashboard',compact('incidents'));
    }
    public function create(Request $request)
    {
        $validation=$request->validate([
            'libelle'=>'required',
            'description'=>'required',
            'lieu'=>'required',
            'image'=>'required',
        ]);

        if($validation)
        {
            $image=$request->image;
            $image_name=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('images',$image_name);
            $user=Auth::user();
            $userId=$user->id;
            Incident::create([
                'libelle'=>$request->libelle,
                'description'=>$request->description,
                'lieu'=>$request->lieu,
                'image'=>$image_name,
                'user_id'=>$userId
            ]);
            return redirect('/incident')->with('success','Incident ajouté avec success');
        }
        return back()->with('fail','Erreur lors de la creation de l incident');
    }

    public function delete($id,Incident $incident)
    {
       $affected=Incident::where('id',$id)->delete();
       if($affected){
        return redirect('/dashboard')->with('success','Suppression avec succes');
        }
        else{
            return back()->with('fail','Erreur lors de la suppression de l incident');
        }
    }

    public function show($id,Incident $incident)
    {
        $incidents=Incident::where('id',$id)->get();
        return view('detail-incident',compact('incidents'));
    }

    public function edit($id,Incident $incident)
    {
        $incidents=Incident::where('id',$id)->get();
        return view('update-incident',compact('incidents'));
    }
}
