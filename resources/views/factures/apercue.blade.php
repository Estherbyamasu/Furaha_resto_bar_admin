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
    <p style="direction: ltr; position: static; top:31px; margin-left: 4em" align="left">
           RESTAURANT_BAR</br>
            FURAHA Resto-Bar</br>
            TEL: 22354678
            </p>
        <center>

            <h1>Factures Furaha_Resto_bar</h1>
        </center>
        
           
            <table >
            <tr>
            <td>Facture num:</td>
            <td>{{$facture->id}}</td>
            </tr>
            <tr>
            <td>NOM Client:</td>
            <td>{{$facture->nom_client}}</td>
            </tr>
            <td>USER:</td>
            <td>{{$facture->name}}</td>
            </tr>
            <tr>
            <td>NOM Produit:</td>
            <td>{{$facture->nom_produit}}</td>
            </tr>
            <tr>
            <td>NOM Serveur:</td>
            <td>{{$facture->nom_serveur}}</td>
            </tr>
            <tr>
            <td>DATE:</td>
            <td>{{$facture->date_facture}}</td>
            </tr>
            <tr>
            <td>QUANTITE:</td>
            <td>{{$facture->quantite}}</td>
            </tr>
            <tr>
            <td>MONTANT:</td>
            <td>{{$facture->montant}}</td>
            </tr>
                  
            </table>
          
            
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