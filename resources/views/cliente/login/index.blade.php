@extends('layout.cliente')

@section('titulo','Autenticação')

@section('breadcrumb')

  <!-- <nav>
    <div class="nav-wrapper grey lighten-3">
      <div class="col s12">
        <a href="#!" class="breadcrumb">/home</a>
      </div>
    </div>
  </nav>
-->
@endsection

@section('conteudo')

<div class="container"><br><br><br>
   <div class="row">
        <div class="col s12 m4 offset-m4">
          <br>
          <div class="card ">


            <div class="card-content teal lighten-2" style="padding: 10px 25px;">

                <h5 class="card-title  white-text">Área do Cliente</h5>
               
            </div>
            
            
          
            
            
            <div class="card-content white">
        
                      <form class="" method="post" action="{{ route('cliente.login.entrar')}}">
                        
                        {{ csrf_field() }}

                        <div class="row">	
							<div class="col s12 m12">


								<div class="input-field">
                  <i class="material-icons prefix teal-text">account_box</i>
									<input type="text" name="username">
									<label>Usuário</label>
								</div>
                       
              	<div class="input-field">
                  <i class="material-icons prefix teal-text">lock</i>
									<input type="password" name="password">
									<label>Senha</label>
								</div>
                        
                        
							</div>
						 </div>

                        <button class="btn halfway-fab btn-large left waves-effect waves-light teal lighten-2"><i class="material-icons left">chevron_right</i>Entrar</button>



                      </form>
          
            </div>
          </div>

        </div>
   </div>
</div>

@endsection