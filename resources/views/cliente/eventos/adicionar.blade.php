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