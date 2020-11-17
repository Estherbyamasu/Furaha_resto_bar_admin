<?php

namespace App\Http\Controllers;

use App\User;
use App\Client;
use App\Facture;
use App\Serveur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FacturesController extends Controller
{
    
    public function index()
    {
        //
        $clients = Client::all();
        $serveurs = Serveur::all();
        $users = User::all();
        $factures = DB::table('factures')
            ->join('clients', 'factures.client_id', '=', 'clients.id')
            ->join('serveurs', 'factures.serveur_id', '=', 'serveurs.id')
            ->join('users', 'factures.user_id', '=', 'users.id')
            ->select('clients.*', 'serveurs.*', 'users.*','factures.*')
            ->get();

            $total = DB::table('factures')
                        ->join('clients', 'factures.client_id', '=', 'clients.id')
                        ->join('serveurs', 'factures.serveur_id', '=', 'serveurs.id')
                        ->join('users', 'factures.user_id', '=', 'users.id')
                        ->select(DB::raw('sum(factures.montant) as total'))
                        ->first();
                        
        return view('factures/index',[
            'factures' => $factures,
            'clients' => $clients,
            'serveurs' => $serveurs,
            'users' => $users,
            'total'=>$total->total
        ]);
    }

    
    public function create()
    {
        //
        $clients = Client::all();
        $serveurs = Serveur::all();
        $users = User::all();
        return view('factures/create',[
            
            'clients' => $clients,
            'serveurs' => $serveurs,
            'users' => $users
        ]);
    }

    
     
    public function store(Request $request)
    {
        //
        $request->validate([
            'client_id' => 'required',
            'serveur_id' => 'required',
         
            'montant' => 'required',
            'date_facture' => 'required'
        ]);

        $facture = new Facture();
        $facture->client_id = $request->client_id;
        $facture->serveur_id = $request->serveur_id;
        $facture->user_id = Auth::id();
        $facture->montant = $request->montant;
        $facture->date_facture = $request->date_facture;
        $facture->save();

        return redirect('factures');
    }
    public function search(Request $request)
    {

        $clients = Client::all();
        $serveurs = Serveur::all();
        $users = User::all();

        $date_debut=$request->date_debut;
        $date_fin=$request->date_fin;
        $factures=  DB::table('factures')
            ->join('clients', 'factures.client_id', '=', 'clients.id')
            ->join('serveurs', 'factures.serveur_id', '=', 'serveurs.id')
            ->join('users', 'factures.user_id', '=', 'users.id')
            ->select('clients.*', 'serveurs.*', 'users.*','factures.*')
            ->wherebetween('date_facture',[$date_debut, $date_fin])
         ->get();

         return view('factures.index',compact('factures'),[
            
            'clients' => $clients,
            'serveurs' => $serveurs,
            'users' => $users
        ]);
    }
    
    public function show()
    {
        $clients = Client::all();
        $serveurs = Serveur::all();
        $users = User::all();
        $factures = DB::table('factures')
            ->join('clients', 'factures.client_id', '=', 'clients.id')
            ->join('serveurs', 'factures.serveur_id', '=', 'serveurs.id')
            ->join('users', 'factures.user_id', '=', 'users.id')
            ->select('clients.*', 'serveurs.*', 'users.*','factures.*')
            ->get();
            $total = DB::table('factures')
            ->join('clients', 'factures.client_id', '=', 'clients.id')
            ->join('serveurs', 'factures.serveur_id', '=', 'serveurs.id')
            ->join('users', 'factures.user_id', '=', 'users.id')
            ->select(DB::raw('sum(factures.montant) as total'))
            ->first();

        return view('factures/show',[
            'factures' => $factures,
            'clients' => $clients,
            'serveurs' => $serveurs,
            'users' => $users,
            'total'=>$total->total
        ]);
    
    }

   
    public function edit(Facture $facture)
    {
        //
        $clients = Client::all();
        $serveurs = Serveur::all();
        $users = User::all();
        $facture = Facture::find($facture->id);
        return view('factures/edit',[
            'facture' => $facture,
            'clients' => $clients,
            'serveurs' => $serveurs,
            'users' => $users
        ]);
    }
    public function apercue($id)
    {

    
        $facture = DB::table('factures')
            ->join('clients', 'factures.client_id', '=', 'clients.id')
            ->join('serveurs', 'factures.serveur_id', '=', 'serveurs.id')
            ->join('users', 'factures.user_id', '=', 'users.id')
            ->select('clients.*', 'serveurs.*', 'users.*','factures.*')
             ->where('factures.id',$id)
            ->first();
        return view('factures.apercue',[
            'facture' => $facture
            
        ]);

        // $factures = facture::with(['factures'])->find($id);
        // return view('factures.apercue',compact('factures'));
    }
    
    public function update(Request $request, Facture $facture)
    {
        //
        $request->validate([
            'client_id' => 'required',
            'serveur_id' => 'required',
         
            'montant' => 'required',
            'date_facture' => 'required'
        ]);

        $facture->client_id = $request->client_id;
        $facture->serveur_id = $request->serveur_id;
        $facture->user_id = Auth::id();
        $facture->montant = $request->montant;
        $facture->date_facture = $request->date_facture;
        $facture->save();

        return redirect('factures');
    }

    
    public function destroy(Facture $facture)
    {
        //
        $facture = Facture::find($facture->id);
        $facture->delete();

        return redirect('factures');
    }
}
