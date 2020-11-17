@extends('templates.default_layout')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-8 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Factures</li>
        </ol>
    </div>
    <!--/.row-->

    <!--/.row-->
    <div class="modal-content">
    <div class="modal-body text-center mb-1">
    <a href="{{ url('factures') }}" > <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
            
            <span aria-hidden="true">&times;</span></a>
          </button></a>-->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
            
         
            <a href="{{url('factures/show')}}" class="btn btn-success">rapport</a>
           
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
 Inserer un Nouveau facture
</button>  
            <form action="{{url('search')}}" method="POST">
            @csrf
             <div class="row pb-2">
                <div class="col-md-4">
                     <input type="datetime-local" class="form-control" name="date_debut" value="{{ old('date_debut') }}" placeholder="date_debut" > 
                     @error('date_debut')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                </div>
                <div class="col-md-4">
                    <input type="datetime-local" class="form-control" name="date_fin" value="{{ old('date_fin') }}" placeholder="date_fin" >
                    @error('date_fin')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                 </div>
                 <div class="col-md-4">
                    <input type="submit" class="btn btn-warning" value="Rechercher" placeholder="search" >
                </div>
             </div>
            </form>
          
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nom client</th>
                        <th scope="col">Nom utilisateur</th>
                        <th scope="col">Nom serveur</th>
                        <th scope="col">Date facture</th>
                        <th scope="col">Montant</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($factures as $facture)
                    <tr>
                        <td>{{$facture->id}}</td>
                        <td>{{$facture->nom_client}}</td>
                        <td>{{$facture->name}}</td>
                        <td>{{$facture->nom_serveur}}</td>
                        <td>{{$facture->date_facture}}</td>
                        <td>{{$facture->montant}}</td>
                        <td>
                            <a href="factures/edit/{{$facture->id}}" class="glyphicon glyphicon-edit    btn btn-primary">Edit</a>
                            <a href="factures/apercue/{{$facture->id}}" class="glyphicon glyphicon-play btn btn-primary" >Voir la facture</a>
                            <form action="factures/destroy/{{$facture->id}}" method="POST">
                            @csrf
                                <button type="submit" onclick="return confirm('Voulez vs vraiment supprimer cet facture ?')" class="glyphicon glyphicon-delite glyphicon-trash  btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="3"><b>Montant Total</b></td>
                        <td colspan="3" align="right"><b>{{$total}}</b></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!--/.row-->






    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLongTitle">L'ajout des serveurs</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="panel panel-default">
             <div class="panel-body">
                    <div class="col-md-8">
            
            <form action="{{url('factures')}}" method="POST">
                @csrf
                
                <div class="row"> 
                <div class="col-lg-6"> 
                <div class="form-group">
                    <label for="nom_client">Nom client</label>
                    <select name="client_id" id="" class="form-control" 
                    class="@error('montant') is-danger @enderror" required>
                        <option value="">Select client</option>
                        @foreach($clients as $client)
                        <option value="{{$client->id}}">{{$client->nom_client}}</option>
                        @endforeach
                        @error('client_id')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    </select>
                </div>
                </div> 
               
                <div class="col-lg-6"> 
                 <div class="form-group">
                 <label for="nom_serveur">Nom serveur</label>
                    <select name="serveur_id" id="" class="form-control" 
                    class="@error('montant') is-danger @enderror" required>
                        <option value="">Select serveur</option>
                        @foreach($serveurs as $serveur)
                        <option value="{{$serveur->id}}">{{$serveur->nom_serveur}}</option>
                        @endforeach
                        @error('serveur_id')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    </select>
                </div>
                </div> 
                </div> 
                <div class="form-group">
            <label for="">Name user</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ Auth::user()->name }}"
                    class="@error('name') is-danger @enderror " placeholder="" aria-describedby="helpId" required>
                    @error('name')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
            <div class="form-group">
            <label for="">Date facture</label>
                    <input type="datetime-local" name="date_facture" id="date_facture" 
                    class="@error('date_facture') is-danger @enderror form-control datepicker" placeholder="" aria-describedby="helpId" required>
                    @error('date_facture')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                
           
            <div class="form-group">
            <label for="">Montant</label>
                    <input type="text" name="montant" id="montant" class="form-control "
                    class="@error('montant') is-danger @enderror " placeholder="" aria-describedby="helpId" required>
                    @error('montant')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                
                
                <div class="row">
            <div class="text-center mb-3 col-md-6">
              <button type="submit" class=" glyphicon glyphicon-plus btn  btn-primary btn-block btn-rounded z-depth-1">Save</button>
              </div>
              <div class="text-center mb-3 col-md-6">
              <button  type="reset"class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Reset</button>
              </div>
             </div>
            </form>
            </div>
        </div>
        </div>
      </div>
      
    </div>
  </div>
</div>



    </div>
        </div>
        </div>
        </div>
        </div>
        </div>
    </div>
</div><!-- /.row -->
@endsection()