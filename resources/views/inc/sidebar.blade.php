<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
<div class="profile-sidebar dropdowns">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>


			<li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle page-header " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                     <span class="caret color_siew">{{ Auth::user()->name }}</span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-left  color_id" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
									</form>
									<br>
                                    @can('manage-users')
                                    <a href="{{route('admin.users.index')}}" class="dropdown-item">Liste des utilisateurs</a>
                                    @endcan
                                </div>
                            </li>



			<!-- <img class="user__img" src="{{ asset('demo/img/profile-pics/8.jpg') }}" alt="">
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">{{ Auth::user()->name }}</div>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                   
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    @can('manage-users')
                                    <a href="{{route('admin.users.index')}}" class="dropdown-item">Liste des utilisateurs</a>
                                    @endcan
                                </div>
			</div> -->



			


			<div class="clear"></div>
		</div>
	<ul class="nav menu">
	<li class="active"><a href="{{ url('')}}"><em class="fa fa-dashboard">&nbsp;</em> Accueille</a></li>
	<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-cog">&nbsp;</em> Liste menu<span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">

					<li><a class="" href="{{ url('clients')}}">
						<span class="fa fa-users">&nbsp;</span> Clients
					</a></li>
					<li><a class="" href="{{ url('serveurs')}}">
						<span class="fa fa-users">&nbsp;</span> Serveurs
					</a></li>
					<li><a class="" href="{{ url('achats')}}">
						<span class="fa fa-list-alt">&nbsp;</span> Achats
					</a></li>
					<li><a class="" href="{{ url('fournisseurs')}}">
						<span class="fa fa-users">&nbsp;</span> Fournisseurs
					</a></li>
					<li><a class="" href="{{ url('categories')}}">
						<span class="fa fa-list-alt">&nbsp;</span> Categories
					</a></li>
					<li><a class="" href="{{ url('products')}}">
						<span class="fa fa-list-alt">&nbsp;</span> Products
					</a></li>
				
				<li><a class="" href="{{ url('detailleachats')}}">
						<span class="fa fa-bar-chart">&nbsp;</span> Detailleachats
					</a></li>
					<li><a class="" href="{{ url('factures')}}">
						<span class="fa fa-bell">&nbsp;</span> Factures
					</a></li>
					<li><a class="" href="{{ url('detaillefactures')}}">
						<span class="fa fa-bar-chart">&nbsp;</span> Detaillefactures
					</a></li>
					<!-- <li><a class="" href="{{ url('users')}}">
						<span class="fa fa-bar-chart">&nbsp;</span> utilisateur
					</a></li> -->
					<!-- <li><a class="" href="{{ url('users')}}">
						<span class="fa fa-user">&nbsp;</span> utilisateur 
						
					</a></li>
					</ul> -->
					<!-- @if(isset(Auth::user()->profil) && Auth::user()->profil == 'Admin')
					<li><a class="" href="{{ url('users')}}">
						<span class="fa fa-bar-chart">&nbsp;</span> utilisateur
					</a></li>
					@endif -->
					</ul>
			</li>
			<!-- <li  class="active" ><a data-toggle="collapse" href="#sub-item-2">
				<em class="fa fa-cog">&nbsp;</em> Statistics<span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				  <ul class="children collapse" id="sub-item-2">
					<li><a class="" href="{{ url('statistics')}}">
						<span class="fa fa-user">&nbsp;</span>Rapport/jour
					</a></li>
					<li><a class="" href="{{ url('clients')}}">
						<span class="fa fa-users">&nbsp;</span> Clients
					</a></li>
					<li><a class="" href="{{ url('serveurs')}}">
						<span class="fa fa-users">&nbsp;</span> Serveurs
					</a></li>
					</ul>
					 @if(isset(Auth::user()->admin) && Auth::user()->admin == 'Admin')
					<li><a class="" href="{{ url('register')}}">
						<span class="fa fa-bar-chart">&nbsp;</span> utilisateur
					</a></li>
					@endif -->
			<!-- </li>
		 --> 
		
	
		
		
       <li>
	   <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <div class="form-group row">
                           <div class="col-md-6">
                                <input id="" type="submit" value="Logout" >
                            </div>
						</div>
        </form>
					</li>
	</ul>
</div>