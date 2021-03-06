
<!DOCTYPE html>
<html>
<head>
	<title>@yield('titulo')</title>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body class="grey lighten-2">

	 

	<header>

	  <nav class="blue-grey  darken-1">

	  		<div class="container">

			    <div class="nav-wrapper ">

			      <a href="#!" class="brand-logo"> <a href="{{route('cliente.index')}}" class="brand-logo"> <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA1MTIuMDE4IDUxMi4wMTgiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMi4wMTggNTEyLjAxODsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSIzMnB4IiBoZWlnaHQ9IjMycHgiPgo8Zz4KCTxnPgoJCTxwYXRoIGQ9Ik01MDQuNzEzLDg1LjkwNmwtMjU2LTg1LjMzM2MtMy4yNjQtMS4xMzEtNi44MjctMC41NTUtOS42MjEsMS40NTFjLTIuNzk1LDIuMDA1LTQuNDE2LDUuMjI3LTQuNDE2LDguNjYxdjEyMC41MzMgICAgTDcuMDI3LDIxMy45OTFjLTQuMjI0LDEuNTM2LTcuMDE5LDUuNTI1LTcuMDE5LDEwLjAyN3YyNzcuMzMzYzAsNS44ODgsNC43NzksMTAuNjY3LDEwLjY2NywxMC42NjdoNDkwLjY2NyAgICBjNS44ODgsMCwxMC42NjctNC43NzksMTAuNjY3LTEwLjY2N1Y5Ni4wMThDNTEyLjAwOSw5MS40MzEsNTA5LjA2NSw4Ny4zNTYsNTA0LjcxMyw4NS45MDZ6IE0xMDYuNjc2LDQ1OC42ODQgICAgYzAsNS44ODgtNC43NzksMTAuNjY3LTEwLjY2NywxMC42NjdINTMuMzQyYy01Ljg4OCwwLTEwLjY2Ny00Ljc3OS0xMC42NjctMTAuNjY3di04NS4zMzNjMC01Ljg4OCw0Ljc3OS0xMC42NjcsMTAuNjY3LTEwLjY2NyAgICBoNDIuNjY3YzUuODg4LDAsMTAuNjY3LDQuNzc5LDEwLjY2NywxMC42NjdWNDU4LjY4NHogTTEwNi42NzYsMzMwLjY4NGMwLDUuODg4LTQuNzc5LDEwLjY2Ny0xMC42NjcsMTAuNjY3SDUzLjM0MiAgICBjLTUuODg4LDAtMTAuNjY3LTQuNzc5LTEwLjY2Ny0xMC42Njd2LTg1LjMzM2MwLTUuODg4LDQuNzc5LTEwLjY2NywxMC42NjctMTAuNjY3aDQyLjY2N2M1Ljg4OCwwLDEwLjY2Nyw0Ljc3OSwxMC42NjcsMTAuNjY3ICAgIFYzMzAuNjg0eiBNMjEzLjM0Miw0NTguNjg0YzAsNS44ODgtNC43NzksMTAuNjY3LTEwLjY2NywxMC42NjdoLTQyLjY2N2MtNS44ODgsMC0xMC42NjctNC43NzktMTAuNjY3LTEwLjY2N3YtODUuMzMzICAgIGMwLTUuODg4LDQuNzc5LTEwLjY2NywxMC42NjctMTAuNjY3aDQyLjY2N2M1Ljg4OCwwLDEwLjY2Nyw0Ljc3OSwxMC42NjcsMTAuNjY3VjQ1OC42ODR6IE0yMTMuMzQyLDMzMC42ODQgICAgYzAsNS44ODgtNC43NzksMTAuNjY3LTEwLjY2NywxMC42NjdoLTQyLjY2N2MtNS44ODgsMC0xMC42NjctNC43NzktMTAuNjY3LTEwLjY2N3YtODUuMzMzYzAtNS44ODgsNC43NzktMTAuNjY3LDEwLjY2Ny0xMC42NjcgICAgaDQyLjY2N2M1Ljg4OCwwLDEwLjY2Nyw0Ljc3OSwxMC42NjcsMTAuNjY3VjMzMC42ODR6IE0zNjIuNjc2LDQ1OC42ODRjMCw1Ljg4OC00Ljc3OSwxMC42NjctMTAuNjY3LDEwLjY2N2gtNDIuNjY3ICAgIGMtNS44ODgsMC0xMC42NjctNC43NzktMTAuNjY3LTEwLjY2N3YtODUuMzMzYzAtNS44ODgsNC43NzktMTAuNjY3LDEwLjY2Ny0xMC42NjdoNDIuNjY3YzUuODg4LDAsMTAuNjY3LDQuNzc5LDEwLjY2NywxMC42NjcgICAgVjQ1OC42ODR6IE0zNjIuNjc2LDMzMC42ODRjMCw1Ljg4OC00Ljc3OSwxMC42NjctMTAuNjY3LDEwLjY2N2gtNDIuNjY3Yy01Ljg4OCwwLTEwLjY2Ny00Ljc3OS0xMC42NjctMTAuNjY3di04NS4zMzMgICAgYzAtNS44ODgsNC43NzktMTAuNjY3LDEwLjY2Ny0xMC42NjdoNDIuNjY3YzUuODg4LDAsMTAuNjY3LDQuNzc5LDEwLjY2NywxMC42NjdWMzMwLjY4NHogTTM2Mi42NzYsMjAyLjY4NCAgICBjMCw1Ljg4OC00Ljc3OSwxMC42NjctMTAuNjY3LDEwLjY2N2gtNDIuNjY3Yy01Ljg4OCwwLTEwLjY2Ny00Ljc3OS0xMC42NjctMTAuNjY3di04NS4zMzNjMC01Ljg4OCw0Ljc3OS0xMC42NjcsMTAuNjY3LTEwLjY2NyAgICBoNDIuNjY3YzUuODg4LDAsMTAuNjY3LDQuNzc5LDEwLjY2NywxMC42NjdWMjAyLjY4NHogTTQ0OC4wMDksNDU4LjY4NGMwLDUuODg4LTQuNzc5LDEwLjY2Ny0xMC42NjcsMTAuNjY3aC00Mi42NjcgICAgYy01Ljg4OCwwLTEwLjY2Ny00Ljc3OS0xMC42NjctMTAuNjY3di04NS4zMzNjMC01Ljg4OCw0Ljc3OS0xMC42NjcsMTAuNjY3LTEwLjY2N2g0Mi42NjdjNS44ODgsMCwxMC42NjcsNC43NzksMTAuNjY3LDEwLjY2NyAgICBWNDU4LjY4NHogTTQ0OC4wMDksMzMwLjY4NGMwLDUuODg4LTQuNzc5LDEwLjY2Ny0xMC42NjcsMTAuNjY3aC00Mi42NjdjLTUuODg4LDAtMTAuNjY3LTQuNzc5LTEwLjY2Ny0xMC42Njd2LTg1LjMzMyAgICBjMC01Ljg4OCw0Ljc3OS0xMC42NjcsMTAuNjY3LTEwLjY2N2g0Mi42NjdjNS44ODgsMCwxMC42NjcsNC43NzksMTAuNjY3LDEwLjY2N1YzMzAuNjg0eiBNNDQ4LjAwOSwyMDIuNjg0ICAgIGMwLDUuODg4LTQuNzc5LDEwLjY2Ny0xMC42NjcsMTAuNjY3aC00Mi42NjdjLTUuODg4LDAtMTAuNjY3LTQuNzc5LTEwLjY2Ny0xMC42Njd2LTg1LjMzM2MwLTUuODg4LDQuNzc5LTEwLjY2NywxMC42NjctMTAuNjY3ICAgIGg0Mi42NjdjNS44ODgsMCwxMC42NjcsNC43NzksMTAuNjY3LDEwLjY2N1YyMDIuNjg0eiIgZmlsbD0iI0ZGRkZGRiIvPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" style="margin-left:20px;" /> SOL - Sistema Otimizador de Licitação</a>


			    </div>

			</div>

	  </nav>





	</header>