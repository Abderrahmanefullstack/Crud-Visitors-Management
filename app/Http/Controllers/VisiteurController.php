<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visiteur;

class VisiteurController extends Controller
{
    public function index(){
        $visiteurs=Visiteur::all();
        
        return view('visiteur.index',['visiteurs'=> $visiteurs]);
    }
    public function create(){
        return view('visiteur.create');
    }
    public function store(Request $request){
        $data = $request->validate([
            'nom' => 'string',
            'prenom' => 'string',
            'telephone' => 'numeric'
        ]);
        $newVisiteur = Visiteur::create($data);
        return redirect(route('visiteur.index'));
    }
    public function edit(Visiteur $visiteur){
    return view('visiteur.edit', ['visiteur' => $visiteur]);}
    public function update(Visiteur $visiteur, Request $request){
        $data = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'telephone' => 'required|numeric',
        ]);
        $visiteur->update($data);
        return redirect(route('visiteur.index'))->with('success', 'Product has been updated successfully');
    }

    public function destroy(Visiteur $visiteur){
        $visiteur->delete();
        return redirect(route('visiteur.index'))->with('success', 'Product has been delete with success');
    }
}
