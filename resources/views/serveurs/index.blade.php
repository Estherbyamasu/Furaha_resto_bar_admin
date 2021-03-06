@extends('templates.default_layout')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-8 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Serveur</li>
        </ol>
    </div>
    <!--/.row-->
    <div class="modal-content">
    <div class="modal-body text-center mb-1">
   
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
            
                <div class="panel-body">
                    <div class="col-lg-12">
               
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
 Inserer un Nouveau Caissier
</button>
            <table id="example1" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col"> Nom serveur</th>
                       
                        <th scope="col">Prenom serveur</th>
                        <th scope="col">Address</th>
                        <th scope="col">Tel</th>
                        
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($serveurs as $serveur)
                    <tr>
                        <td>{{$serveur->id}}</td>
                        <td>{{$serveur->nom_serveur}}</td>
                       
                        <td>{{$serveur->prenom_serveur}}</td>
                        <td>{{$serveur->address}}</td>
                        <td>{{$serveur->tel}}</td>
                        
                        
                        <td>
                            <a href="serveurs/edit/{{$serveur->id}}" class="glyphicon glyphicon-edit   btn btn-primary">Edit</a>
                            <form action="serveurs/destroy/{{$serveur->id}}" method="POST">
                            @csrf
                                <button type="submit" onclick="return confirm('Voulez vs vraiment supprimer cette serveur ?')" class="glyphicon glyphicon-delite glyphicon-trash    btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                   
                </tbody>
            </table>
            </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
    </div>
    <!--/.row-->


    

<!-- Modal -->
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
            
            <form action="{{url('serveurs')}}" method="POST">
                @csrf
                <div class="row">
               
                <div class="form-group">
                    <label for="">nom serveur</label>
                    <input type="text" name="nom_serveur" id="" class="form-control" class="@error('nom_serveur') is-danger @enderror" placeholder="" aria-describedby="helpId" required>
                    @error('nom_serveur')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
             
                <div class="form-group">
                    <label for="">prenom serveur</label>
                    <input type="text" name="prenom_serveur" id="" class="form-control" class="@error('prenom_serveur') is-danger @enderror" placeholder="" aria-describedby="helpId" required>
                    @error('prenom_serveur')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
             
                
                <div class="row">
                
                <div class="form-group">
                    <label for="">Adresse</label>
                    <input type="text" name="address" id="" class="form-control" class="@error('address') is-danger @enderror" placeholder="" aria-describedby="helpId"required >
                    @error('address')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
               
                
                <div class="form-group">
                    <label for="">Telephone</label>
                    <input type="text" name="tel" id="" class="form-control" class="@error('tel') is-danger @enderror" placeholder="" aria-describedby="helpId" required>
                    @error('tel')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
              
                <div class="modal-footer"> 
                <div class="row">
            <div class="text-center mb-3 col-md-6">
              <button type="submit" class=" glyphicon glyphicon-plus btn  btn-primary btn-block btn-rounded z-depth-1">Save</button>
              </div>
              <div class="text-center mb-3 col-md-6">
              <button  type="reset"class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Reset</button>
              </div>
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
   
</div><!-- /.row -->
@endsection()