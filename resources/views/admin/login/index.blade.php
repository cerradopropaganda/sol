@extends('layout.admin')

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


            <div class="card-content blue" style="padding: 10px 25px;">

                <h5 class="card-title  white-text">Área Administrativa</h5>
               
            </div>
            
            
          
            
            
            <div class="card-content white">
        
                      <form class="" method="post" action="{{ route('admin.login.entrar')}}">
                        
                        {{ csrf_field() }}

                        <div class="row">	
							<div class="col s12 m12">


								<div class="input-field">
                  <i class="material-icons prefix blue-text">account_box</i>
									<input type="text" name="username">
									<label>Usuário</label>
								</div>
                       
                <div class="input-field">
                  <i class="material-icons prefix blue-text">lock</i>
									<input type="password" name="password">
									<label>Senha</label>
								</div>
                        
                        
							</div>
						 </div>

                        <button class="btn halfway-fab btn-large left waves-effect waves-light blue darken-1"><i class="material-icons left">chevron_right</i>Entrar</button>



                      </form>
          
            </div>
          </div>

        </div>
   </div>
</div>
<style>
/* label color */
   .input-field label {
     color: #000;
   }
   /* label focus color */
   .input-field input[type=text]:focus + label {
     color: #000;
   }
   /* label underline focus color */
   .input-field input[type=text]:focus {
     border-bottom: 1px solid #000;
     box-shadow: 0 1px 0 0 #000;
   }
   /* valid color */
   .input-field input[type=text].valid {
     border-bottom: 1px solid #000;
     box-shadow: 0 1px 0 0 #000;
   }
   /* invalid color */
   .input-field input[type=text].invalid {
     border-bottom: 1px solid #000;
     box-shadow: 0 1px 0 0 #000;
   }
   /* icon prefix focus color */
   .input-field .prefix.active {
     color: #000;
   }
</style>
@endsection
