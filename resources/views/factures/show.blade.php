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
          </button></a>
       
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
            
         
            <script type="text/javascript">
        function print() {

            var zone = document.getElementById("imprimer");
            var f = window.open(
                "",
                "",
                "height=730,width=720,toolbar=0,menubar=0,scrollbars=1,resizable=0,status=0,location=0,left=10,top=10"
            );
            f.document.write('<html><head><title></title></head><body onload="window.print();window.close();"><center>' + zone.innerHTML + '</center></body></html>');
            f.document.close();
            return;
        }
    </script>


    <div id="imprimer">
        <center>

            <h1>Factures Furaha_Resto_bar</h1>
        </center>
        <p style="direction: ltr;  position: static; top:31px; margin-left: 4em" align="left">
           RESTAURANT_BAR</br>
            FURAHA Resto-Bar</br>
            TEL: 22354678
            </p>
           
            <!-- <form action="{{url('search')}}" method="POST">
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
            </form> -->
          
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nom client</th>
                        <th scope="col">Nom utilisateur</th>
                        <th scope="col">Nom produit</th>
                        <th scope="col">Nom serveur</th>
                        <th scope="col">Date facture</th>
                        <th scope="col">Quantite</th>
                        <th scope="col">Montant</th>
                       
                    </tr>
                </thead>
                <tbody>
                @foreach($factures as $facture)
                    <tr>
                        <td>{{$facture->id}}</td>
                        <td>{{$facture->nom_client}}</td>
                        <td>{{$facture->name}}</td>
                        <td>{{$facture->nom_produit}}</td>
                        <td>{{$facture->nom_serveur}}</td>
                        <td>{{$facture->date_facture}}</td>
                        <td>{{$facture->quantite}}</td>
                        <td>{{$facture->montant}}</td>
                       
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="3"><b>Montant Total</b></td>
                        <td colspan="5" align="right"><b>{{$total}}</b></td>
                    </tr>
                </tbody>
            </table>
            <div class="row">
        <div class="col-lg-12">
        </div>
    </div>
    <font style="direction: ltr; position: static; top:31px; margin-left: 25em">
        Bujumbura, le.........../........../......
    </font>

</div></br></br>
<center>
    <input type="button" onclick="print();" value="APERCU" />
</center>
<div class="col-sm-12">
    <p class="back-link">
        <tr>
            <td align="center">
                DEVELOPPEUR<br> Esther Furaha<br> Copyright &copy; 2020
            </td>
        </tr>
    </p>
</div>
    
        </div>
    </div>
    <!--/.row-->





    



    </div>
        </div>
        </div>
        </div>
        </div>
        </div>
    </div>
</div><!-- /.row -->
@endsection()