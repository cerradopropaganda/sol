@extends('layout.cliente')

@section('titulo','Adicionar Evento - Fase Inicial')

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

<div class="container">
   <div class="row">
        <div class="col s12 m12">
          <br>
          <div class="card ">


            <div class="card-content teal lighten-2" style="padding: 10px 25px;">

                <h5 class="card-title  white-text">Cadastrar Evento</h5>
               
            </div>

            
          
            
            
            <div class="card-content white">
        
                      <form id="frm_evento" class="" method="post" action="{{ route('cliente.eventos.salvar')}}">
                        
                        {{ csrf_field() }}

  

                            <div class="step-content" >
							       <div class="row">

							          <!--<div class="input-field col s12">
							             <input name="email" type="email" class="validate" required>
							             <label for="email">Your e-mail</label>
							          </div>-->

							             <div class="input-field">
										    <select  name="id_orgao">
										      <!--<option value="" disabled selected>Escolha um Orgão Solicitante</option>-->
										      @foreach($orgaos as $orgao)                    
								                   <option value="{{ $orgao->id }}" @if (isset($registro->id_orgao)) @if ($registro->id_orgao == $orgao->id) selected  @endif @endif > {{ $orgao->nome }} </option> 
								              @endforeach
										    </select>
										    <label>ORGÃO SOLICITANTE</label>
										  </div>

										<br>

										<div class="input-field">
											<textarea class="materialize-textarea" name="objeto">{{isset($registro->objeto) ? $registro->objeto : ''}}</textarea>
											<label>OBJETO</label>
										</div>

										<div class="input-field">
											<textarea class="materialize-textarea" name="justificativa">{{isset($registro->justificativa) ? $registro->justificativa : ''}}</textarea>
											<label>JUSTIFICATIVA</label>
										</div>


										<div class="input-field">
											<input type="text" name="processo" value="{{isset($registro->processo) ? $registro->processo : ''}}">
											<label>NÚMERO DO PROCESSO</label>
										</div>
										
										<br>
										
										<div class="input-field">
										    <select  name="id_fiscal">
										      <!--<option value="" disabled selected>Escolha um Orgão Solicitante</option>-->
										      @foreach($fiscais as $fiscal)                    
								                   <option value="{{ $fiscal->id }}" @if (isset($registro->id_fiscal)) @if ($registro->id_fiscal == $fiscal->id) selected  @endif @endif > {{ $fiscal->nome }} </option> 
								              @endforeach
										    </select>
										    <label>FISCAL DE CONTRATO</label>
										  </div>

										<br>
										
										<div class="input-field">
										    <select  name="id_pregoeiro">
										      <!--<option value="" disabled selected>Escolha um Orgão Solicitante</option>-->
										      @foreach($pregoeiros as $pregoeiro)                    
								                   <option value="{{ $pregoeiro->id }}" @if (isset($registro->id_pregoeiro)) @if ($registro->id_pregoeiro == $pregoeiro->id) selected  @endif @endif > {{ $pregoeiro->nome }} </option> 
								              @endforeach
										    </select>
										    <label>PREGOEIRO</label>
										  </div>



											  <label><H6>SERÁ EXIGIDA GARANTIA CONTRATUAL ?</H6></label>

												<div class="switch">
													<label>
													  Não
													  <input type="checkbox" name="garantia_contratual" id="garantia_contratual" value="1"  {{ isset($registro->garantia_contratual) && $registro->garantia_contratual == '1' ? 'checked' : '' }} >
													  <span class="lever"></span>
													  Sim
													</label>
												</div>
												
											<BR><BR>

											
											<div id="box_porcentagem_garantia" style="display: {{ isset($registro->garantia_contratual) && $registro->garantia_contratual == '1' ? '' : 'none' }};" >
												<div class="input-field">												
													 <select  name="porcentagem_garantia">
												      <!--<option value="" disabled selected>Escolha um Orgão Solicitante</option>-->
												                       
										                 <option value="1" @if (isset($registro->porcentagem_garantia)) @if ($registro->porcentagem_garantia ==1) selected  @endif @endif > 1% </option> 
										                 <option value="2" @if (isset($registro->porcentagem_garantia)) @if ($registro->porcentagem_garantia ==2) selected  @endif @endif > 2% </option> 
										                 <option value="3" @if (isset($registro->porcentagem_garantia)) @if ($registro->porcentagem_garantia ==3) selected  @endif @endif > 3% </option> 
										                 <option value="4" @if (isset($registro->porcentagem_garantia)) @if ($registro->porcentagem_garantia ==4) selected  @endif @endif > 4% </option> 
										                 <option value="5" @if (isset($registro->porcentagem_garantia)) @if ($registro->porcentagem_garantia ==5) selected  @endif @endif > 5% </option> 
										             
												    </select>										
													<label>PORCENTAGEM ( % )</label>
												</div>
												<br>
											</div>
										
							       </div>
							       <div class="step-actions">
							       		<input type="hidden" name="id_usuario" value="@if(Auth::user()->id_usuario==0){{Auth::user()->id}}@else@php

       $registro = Auth::user()->select('id')->where('id',Auth::user()->id_usuario)->get() ; foreach($registro as $user) { echo $user->id ;}

       @endphp@endif">
							           <button class="waves-effect waves-dark btn teal lighten-2 next-step">Criar novo Evento</button>   
							       </div>
							    </div>
                       
                      </form>
          
            </div>
          </div>

        </div>
   </div>
</div>

@endsection


@section('page-script')
<script type="text/javascript">

	$(document).ready(function(){

/*
    * Este método mostra a porcentagem caso seja exigida garantia contratual
    */
	$("#garantia_contratual").on("click",function() {
		
	  var status = $("input[name=garantia_contratual]").prop('checked');
	  console.log(status);
	  if( status == true){
	  	$("#box_porcentagem_garantia").show();
	  }else{
	  	$("#box_porcentagem_garantia").hide();
	  	$( "input[name=porcentagem_garantia]" ).val('');
	  }
	})


    }); 

</script>
@endsection
