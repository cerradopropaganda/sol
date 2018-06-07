
<!DOCTYPE html>
<html>
<head>
	<title>@yield('titulo')</title>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="{{ asset('css/materialize-stepper.min.css') }}">
  <link rel="stylesheet" href="{{ asset('js/trumbowyg/ui/trumbowyg.min.css')}}">


  <link href="//cdn.bri.io/mbox/dist/mbox-0.0.5.min.css" rel="stylesheet">


  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <style type="text/css">
  	
.inline-icon {
   vertical-align: bottom;
   font-size: 24px !important;
}
.disable_step{
    pointer-events:none;
    opacity:0.7;
}



/* css search itens eventos*/

.autocomplete-suggestions{
    border: 1px solid #999!important;
    background: white;
    padding: 20px;
    display: block;
    overflow-y: scroll;
}
.autocomplete-suggestion{ border-bottom: 1px solid #999; padding: 10px; cursor: pointer; }
.autocomplete-suggestion:hover{ background: #f3f3f3;}

	.error{ background: #ff00002b; }



.lista_orcamentos [type="checkbox"]+label {
    /*font-size: .7rem;*/
}



  	
  </style>


</head>
<body class="grey lighten-2">

	 

	<header>

	  <nav class=" teal lighten-2">

	  		<div class="container">

			    <div class="nav-wrapper ">

			      <a href="#!" class="brand-logo"> <a href="{{route('cliente.index')}}" class="brand-logo"> <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA1MTIuMDE4IDUxMi4wMTgiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMi4wMTggNTEyLjAxODsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSIzMnB4IiBoZWlnaHQ9IjMycHgiPgo8Zz4KCTxnPgoJCTxwYXRoIGQ9Ik01MDQuNzEzLDg1LjkwNmwtMjU2LTg1LjMzM2MtMy4yNjQtMS4xMzEtNi44MjctMC41NTUtOS42MjEsMS40NTFjLTIuNzk1LDIuMDA1LTQuNDE2LDUuMjI3LTQuNDE2LDguNjYxdjEyMC41MzMgICAgTDcuMDI3LDIxMy45OTFjLTQuMjI0LDEuNTM2LTcuMDE5LDUuNTI1LTcuMDE5LDEwLjAyN3YyNzcuMzMzYzAsNS44ODgsNC43NzksMTAuNjY3LDEwLjY2NywxMC42NjdoNDkwLjY2NyAgICBjNS44ODgsMCwxMC42NjctNC43NzksMTAuNjY3LTEwLjY2N1Y5Ni4wMThDNTEyLjAwOSw5MS40MzEsNTA5LjA2NSw4Ny4zNTYsNTA0LjcxMyw4NS45MDZ6IE0xMDYuNjc2LDQ1OC42ODQgICAgYzAsNS44ODgtNC43NzksMTAuNjY3LTEwLjY2NywxMC42NjdINTMuMzQyYy01Ljg4OCwwLTEwLjY2Ny00Ljc3OS0xMC42NjctMTAuNjY3di04NS4zMzNjMC01Ljg4OCw0Ljc3OS0xMC42NjcsMTAuNjY3LTEwLjY2NyAgICBoNDIuNjY3YzUuODg4LDAsMTAuNjY3LDQuNzc5LDEwLjY2NywxMC42NjdWNDU4LjY4NHogTTEwNi42NzYsMzMwLjY4NGMwLDUuODg4LTQuNzc5LDEwLjY2Ny0xMC42NjcsMTAuNjY3SDUzLjM0MiAgICBjLTUuODg4LDAtMTAuNjY3LTQuNzc5LTEwLjY2Ny0xMC42Njd2LTg1LjMzM2MwLTUuODg4LDQuNzc5LTEwLjY2NywxMC42NjctMTAuNjY3aDQyLjY2N2M1Ljg4OCwwLDEwLjY2Nyw0Ljc3OSwxMC42NjcsMTAuNjY3ICAgIFYzMzAuNjg0eiBNMjEzLjM0Miw0NTguNjg0YzAsNS44ODgtNC43NzksMTAuNjY3LTEwLjY2NywxMC42NjdoLTQyLjY2N2MtNS44ODgsMC0xMC42NjctNC43NzktMTAuNjY3LTEwLjY2N3YtODUuMzMzICAgIGMwLTUuODg4LDQuNzc5LTEwLjY2NywxMC42NjctMTAuNjY3aDQyLjY2N2M1Ljg4OCwwLDEwLjY2Nyw0Ljc3OSwxMC42NjcsMTAuNjY3VjQ1OC42ODR6IE0yMTMuMzQyLDMzMC42ODQgICAgYzAsNS44ODgtNC43NzksMTAuNjY3LTEwLjY2NywxMC42NjdoLTQyLjY2N2MtNS44ODgsMC0xMC42NjctNC43NzktMTAuNjY3LTEwLjY2N3YtODUuMzMzYzAtNS44ODgsNC43NzktMTAuNjY3LDEwLjY2Ny0xMC42NjcgICAgaDQyLjY2N2M1Ljg4OCwwLDEwLjY2Nyw0Ljc3OSwxMC42NjcsMTAuNjY3VjMzMC42ODR6IE0zNjIuNjc2LDQ1OC42ODRjMCw1Ljg4OC00Ljc3OSwxMC42NjctMTAuNjY3LDEwLjY2N2gtNDIuNjY3ICAgIGMtNS44ODgsMC0xMC42NjctNC43NzktMTAuNjY3LTEwLjY2N3YtODUuMzMzYzAtNS44ODgsNC43NzktMTAuNjY3LDEwLjY2Ny0xMC42NjdoNDIuNjY3YzUuODg4LDAsMTAuNjY3LDQuNzc5LDEwLjY2NywxMC42NjcgICAgVjQ1OC42ODR6IE0zNjIuNjc2LDMzMC42ODRjMCw1Ljg4OC00Ljc3OSwxMC42NjctMTAuNjY3LDEwLjY2N2gtNDIuNjY3Yy01Ljg4OCwwLTEwLjY2Ny00Ljc3OS0xMC42NjctMTAuNjY3di04NS4zMzMgICAgYzAtNS44ODgsNC43NzktMTAuNjY3LDEwLjY2Ny0xMC42NjdoNDIuNjY3YzUuODg4LDAsMTAuNjY3LDQuNzc5LDEwLjY2NywxMC42NjdWMzMwLjY4NHogTTM2Mi42NzYsMjAyLjY4NCAgICBjMCw1Ljg4OC00Ljc3OSwxMC42NjctMTAuNjY3LDEwLjY2N2gtNDIuNjY3Yy01Ljg4OCwwLTEwLjY2Ny00Ljc3OS0xMC42NjctMTAuNjY3di04NS4zMzNjMC01Ljg4OCw0Ljc3OS0xMC42NjcsMTAuNjY3LTEwLjY2NyAgICBoNDIuNjY3YzUuODg4LDAsMTAuNjY3LDQuNzc5LDEwLjY2NywxMC42NjdWMjAyLjY4NHogTTQ0OC4wMDksNDU4LjY4NGMwLDUuODg4LTQuNzc5LDEwLjY2Ny0xMC42NjcsMTAuNjY3aC00Mi42NjcgICAgYy01Ljg4OCwwLTEwLjY2Ny00Ljc3OS0xMC42NjctMTAuNjY3di04NS4zMzNjMC01Ljg4OCw0Ljc3OS0xMC42NjcsMTAuNjY3LTEwLjY2N2g0Mi42NjdjNS44ODgsMCwxMC42NjcsNC43NzksMTAuNjY3LDEwLjY2NyAgICBWNDU4LjY4NHogTTQ0OC4wMDksMzMwLjY4NGMwLDUuODg4LTQuNzc5LDEwLjY2Ny0xMC42NjcsMTAuNjY3aC00Mi42NjdjLTUuODg4LDAtMTAuNjY3LTQuNzc5LTEwLjY2Ny0xMC42Njd2LTg1LjMzMyAgICBjMC01Ljg4OCw0Ljc3OS0xMC42NjcsMTAuNjY3LTEwLjY2N2g0Mi42NjdjNS44ODgsMCwxMC42NjcsNC43NzksMTAuNjY3LDEwLjY2N1YzMzAuNjg0eiBNNDQ4LjAwOSwyMDIuNjg0ICAgIGMwLDUuODg4LTQuNzc5LDEwLjY2Ny0xMC42NjcsMTAuNjY3aC00Mi42NjdjLTUuODg4LDAtMTAuNjY3LTQuNzc5LTEwLjY2Ny0xMC42Njd2LTg1LjMzM2MwLTUuODg4LDQuNzc5LTEwLjY2NywxMC42NjctMTAuNjY3ICAgIGg0Mi42NjdjNS44ODgsMCwxMC42NjcsNC43NzksMTAuNjY3LDEwLjY2N1YyMDIuNjg0eiIgZmlsbD0iI0ZGRkZGRiIvPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" style="margin-left:20px;" /> SOL - Cliente</a> 
			      
			      
			      <ul class="right hide-on-med-and-down">
			        <!-- <li><a href="{{route('cliente.index')}}"><i class="material-icons left">assignment_ind</i>Perfil</a></li> -->
			        @if(Auth::guest())
			        	<li><a href="/"><i class="material-icons left">home</i>Início</a></li>
			        @else
			        	<li><i class="material-icons left">business</i>

			        		 @if(Auth::user()->id_usuario==0)
			        		 	{{ Auth::user()->fantasia }}&nbsp;&nbsp;&nbsp;</li>
			        		 @else
			        		 	@php
			        		 		$registro = Auth::user()->select('fantasia')->where('id',Auth::user()->id_usuario)->get() ;
									foreach ($registro as $user)  echo $user->fantasia ;
			        		 	@endphp
			        		 &nbsp;&nbsp;&nbsp;</li>
			        		 @endif
			        		
			        	<li><i class="material-icons left">assignment_ind</i>{{ Auth::user()->nome_contato }}  ({{ Auth::user()->nivel }})&nbsp;&nbsp;&nbsp;</li>
						<li><a href="{{route('cliente.login.sair')}}"><i class="material-icons left">exit_to_app</i>Sair</a></li>
			        @endif
			        
			      </ul>
			    </div>

			</div>

	  </nav>




	  @if(Auth::guest())
			        	
	  @else
		  <nav class=" white">

		  		<div class="container">

			   		 <div class="nav-wrapper ">
					     <a href="#" data-activates="mobile-demo" class="teal-text text-lighten-2 button-collapse"><i class="material-icons left">menu</i> MENU</a>
					      <ul class="hide-on-med-and-down">
					        <li><a class="teal-text text-lighten-2" href="{{route('cliente.index')}}"><i class="material-icons left">dashboard</i>Início</a></li>
					        @if(Auth::user()->nivel<=2)
							<li><a class="teal-text text-lighten-2 dropdown-button" href="#!"  data-activates="dropdown-cadastro"><i class="material-icons left">library_books</i>Cadatro<i class="material-icons right">arrow_drop_down</i></a></li>
							@endif
							<li><a class="teal-text text-lighten-2 dropdown-button" href="#!"  data-activates="dropdown-evento"><i class="material-icons left">event_note</i>Evento<i class="material-icons right">arrow_drop_down</i></a></li>
							@if(Auth::user()->nivel<=3)
							<li><a class="teal-text text-lighten-2 dropdown-button" href="#!"  data-activates="dropdown-solicitar"><i class="material-icons left">bookmark_border</i>Solicitar<i class="material-icons right">arrow_drop_down</i></a></li>
							@endif
					      </ul>
					      <ul class="side-nav" id="mobile-demo">
					        <li><a class="teal-text text-lighten-2" href="{{route('cliente.index')}}"><i class="material-icons left">dashboard</i>Início</a></li>
					        @if(Auth::user()->nivel<=2)
							<li><a class="teal-text text-lighten-2 dropdown-button" href="#!"  data-activates="dropdown-cadastro-mobile"><i class="material-icons left">library_books</i>Cadatro<i class="material-icons right">arrow_drop_down</i></a></li>
							@endif
							<li><a class="teal-text text-lighten-2 dropdown-button" href="#!"  data-activates="dropdown-evento-mobile"><i class="material-icons left">event_note</i>Evento<i class="material-icons right">arrow_drop_down</i></a></li>
							@if(Auth::user()->nivel<=3)
							<li><a class="teal-text text-lighten-2 dropdown-button" href="#!"  data-activates="dropdown-solicitar-mobile"><i class="material-icons left">bookmark_border</i>Solicitar<i class="material-icons right">arrow_drop_down</i></a></li>
							@endif
					      </ul>
					      <!-- Dropdown Cadastro -->
							<ul id="dropdown-cadastro" class="dropdown-content">							 
							  <li><a class="teal-text text-lighten-2" href="{{route('cliente.usuarios')}}">Usuários do Sistema</a></li>
							  <li><a class="teal-text text-lighten-2" href="{{route('cliente.orgaos')}}">Órgão Solicitante</a></li>
							  <li><a class="teal-text text-lighten-2" href="{{route('cliente.fiscais')}}">Fiscal de Contrato</a></li>
							  <li><a class="teal-text text-lighten-2" href="{{route('cliente.pregoeiros')}}">Pregoeiros</a></li>
							  <li><a class="teal-text text-lighten-2" href="{{route('cliente.header')}}">Logomarca e Cabeçalho</a></li>
							</ul>
						  <!-- Dropdown Evento -->
							<ul id="dropdown-evento" class="dropdown-content">
							  @if(Auth::user()->nivel<>5)
							  <li><a class="teal-text text-lighten-2" href="{{route('cliente.eventos.adicionar')}}">Novo</a></li>
							  @endif
							  <li><a class="teal-text text-lighten-2" href="{{route('cliente.eventos.fase_inicial')}}">Fase Inicial</a></li>
							  @if(Auth::user()->nivel<>5)
							  <li><a class="teal-text text-lighten-2" href="{{route('cliente.eventos.fase_final')}}">Fase Final</a></li>
							  @endif
							  @if(Auth::user()->nivel<>5)
							  <li><a class="teal-text text-lighten-2" href="{{route('cliente.eventos.concluidos')}}">Concluídos</a></li>
							  @endif
							</ul>
						  <!-- Dropdown Solicitar -->
							<ul id="dropdown-solicitar" class="dropdown-content">
							  <li><a class="teal-text text-lighten-2" href="#!">Item</a></li>
							  <li><a class="teal-text text-lighten-2" href="#!">Cotação</a></li>
							</ul>

						  <!-- Dropdown Cadastro - Mobile -->
							<ul id="dropdown-cadastro-mobile" class="dropdown-content">
							  <li><a class="teal-text text-lighten-2" href="{{route('cliente.usuarios')}}">Usuários do Sistema</a></li>
							  <li><a class="teal-text text-lighten-2" href="{{route('cliente.orgaos')}}">Órgão Solicitante</a></li>
							  <li><a class="teal-text text-lighten-2" href="{{route('cliente.fiscais')}}">Fiscal de Contrato</a></li>
							  <li><a class="teal-text text-lighten-2" href="{{route('cliente.pregoeiros')}}">Pregoeiros</a></li>
							  <li><a class="teal-text text-lighten-2" href="{{route('cliente.header')}}">Logomarca e Cabeçalho</a></li>
							</ul>
						  <!-- Dropdown Evento - Mobile -->
							<ul id="dropdown-evento-mobile" class="dropdown-content">
							  <li><a class="teal-text text-lighten-2" href="{{route('cliente.eventos.adicionar')}}">Novo</a></li>
							  <li><a class="teal-text text-lighten-2" href="{{route('cliente.eventos.fase_inicial')}}">Fase Inicial</a></li>
							  <li><a class="teal-text text-lighten-2" href="{{route('cliente.eventos.fase_final')}}">Fase Final</a></li>
							  <li><a class="teal-text text-lighten-2" href="{{route('cliente.eventos.concluidos')}}">Concluídos</a></li>
							</ul>
						  <!-- Dropdown Solicitar - Mobile -->
							<ul id="dropdown-solicitar-mobile" class="dropdown-content">
							  <li><a class="teal-text text-lighten-2" href="#!">Item</a></li>
							  <li><a class="teal-text text-lighten-2" href="#!">Cotação</a></li>
							</ul>
					</div>
				</div>


		  </nav>
	  @endif

	</header>