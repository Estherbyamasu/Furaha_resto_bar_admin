<?php

namespace App\Http\Controllers;

use App\Product;
use App\Facture;

use App\Detaillefacture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetaillefacturesController extends Controller
{
    
    public function index()
    {
      
        $products = Product::all();
        $factures = Facture::all();
        
        $detaillefactures = DB::table('detaillefactures')
            ->join('products', 'detaillefactures.product_id', '=', 'products.id')
            ->join('factures', 'detaillefactures.facture_id', '=', 'factures.id')
          
            ->select('products.*', 'factures.*', 'detaillefactures.*')
            ->get();
        return view('detaillefactures/index',[
            'detaillefactures' => $detaillefactures,
            'products' => $products,
            'factures' => $factures
            
           
        ]);
    }

    
    public function create()
    {
        //
        $products = Product::all();
        $factures = DB::table('factures')
        ->join('clients', 'factures.client_id', '=', 'clients.id')
        ->join('serveurs', 'factures.serveur_id', '=', 'serveurs.id')
        ->join('users', 'factures.user_id', '=', 'users.id')
        ->select('clients.*', 'serveurs.*', 'users.*','factures.*')
        ->get();
      
        return view('detaillefactures/create',[
            
            'products' => $products,
            'factures' => $factures
            
        ]);
    }

    
     
    public function store(Request $request)
    {
        //
        $request->validate([
            'product_id' => 'required',
            'facture_id' => 'required',
            'quantite' => 'required',
            'prix_unitaire' => 'required'
        ]);

        $detaillefacture = new Detaillefacture();
        $detaillefacture->product_id = $request->product_id;
        $detaillefacture->facture_id = $request->facture_id;
        $detaillefacture->quantite = $request->quantite;
        $detaillefacture->prix_unitaire = $request->prix_unitaire;
        $detaillefacture->save();

        return redirect('detaillefactures');
    }
    
    
    // public function show(Request $request)
    // {
    //     if ($request->has('facture_id')) {
    //         $client_id = $request->get('client_id');
    //         $serveur_id = $request->get('serveur_id');
    //         $user_id = $request->get('user_id');
    //         $detaillefactures = DB::table('factures')
    //                 ->join('clients', 'factures.client_id', '=', 'clients.id')
    //                 ->join('serveurs', 'factures.serveur_id', '=', 'serveurs.id')
    //                 ->join('users', 'factures.user_id', '=', 'users.id')
    //                 ->select('clients.*', 'serveurs.*', 'users.*','factures.*')
    //                 ->where('clients.id', '=', $client_id and 'serveurs.id', '=', $serveur_id and 'users.id', '=', $user_id)
    //                 ->get();
    //             }
    //                 return view('detaillefactures/show', [
    //                     'detaillefactures' => $detaillefactures
            
    //                 ]);
        
       
    // }


    public function edit(Detaillefacture $detaillefacture)
    {
        //
        $products = Product::all();
        $factures = DB::table('factures')
        ->join('clients', 'factures.client_id', '=', 'clients.id')
        ->join('serveurs', 'factures.serveur_id', '=', 'serveurs.id')
        ->join('users', 'factures.user_id', '=', 'users.id')
        ->select('clients.*', 'serveurs.*', 'users.*','factures.*')
        ->get();
      
        $detaillefacture = Detaillefacture::find($detaillefacture->id);
        return view('detaillefactures/edit',[
            'detaillefacture' => $detaillefacture,
            'products' => $products,
            'factures' => $factures
        ]);
    }

    
    public function update(Request $request, Detaillefacture $detaillefacture)
    {
        //
        $request->validate([
            'product_id' => 'required',
            'facture_id' => 'required',
            'quantite' => 'required',
            'prix_unitaire' => 'required'
        ]);
        
        $detaillefacture->product_id = $request->product_id;
        $detaillefacture->facture_id = $request->facture_id;
        $detaillefacture->quantite = $request->quantite;
        $detaillefacture->prix_unitaire = $request->prix_unitaire;
        $detaillefacture->save();

        return redirect('detaillefactures');
    }

    
    public function destroy(Detaillefacture $detaillefacture)
    {
        //
        $detaillefacture = Detaillefacture::find($detaillefacture->id);
        $detaillefacture->delete();

        return redirect('detaillefactures');
    }
}
