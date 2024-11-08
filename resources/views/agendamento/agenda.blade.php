@extends('agendamento.layout.app')
                   


<div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>

    <div>
        @if (session()->has('message1'))
            <div class="alert alert-danger">
                {{ session('message1') }}
            </div>
        @endif
    </div>


<div id="container-a">       



        <div id="div-ag" class="bk-azul-escuro box-s">
          <h2 class="color-white"><i class="far fa-calendar-alt" style="margin-right: 6px; font-size: 24px;"></i> Agendamento</h2>

  		    <div id="agendamento" class="row">                     

            <form  action="/store" method="POST">
              @csrf

          

                <div class="form-header">
                    <div class="title">
                        <h1>Agendar seu horário</h1>
                    </div>
                </div> 
                
              	
            

                <div class="input-group"> 
                  
                     <div class="input-box col-md-6">
                        <label for="email">Cpf</label>
                        <input id="email" type="cpf" name="cpf" placeholder="Digite seu cpf" >
                    </div>  

                    <div class="input-box col-md-12">
                        <label for="nome">Nome</label>
                        <input id="nome" type="text" name="nome" placeholder="Digite seu nome" >
                    </div>		
                 

                   <div class="input-box col-md-12">
                        <label for="telefone">E-mail</label>
                        <input id="email" type="email" name="email" placeholder="Digite seu email" >
                    </div>


				          	<div class="input-box col-md-12">
                        <label for="telefone">Telefone</label>
                        <input id="number" type="tel" name="telefone" placeholder="Digite seu telefone" >
                    </div>	
                    
                    
                    <div class="input-box col-md-12">
                       <label for="local">Local</label>                   
                        <select class="selectcidade" type="text" id="id_cidade" name="id_cidade" >
                        @foreach ($cidade as $cid)                      
                        <option value="{{$cid->id}}">{{$cid->nome}}</option>
                        @endforeach
                      </select>                      
                    </div>

                    <div class="input-box col-md-12">
                      <label for="local">Serviço</label>
                        <select class="selectservice" id="id_tipodado" name="id_tipodado">
                        @foreach ($tipodado as $servico)                              
                        <option value="{{$servico->id}}">{{$servico->nome}}</option>
                        @endforeach
                        </select>                      
                    </div>  


                 

                    <div class="input-box col-md-12">
                       <label for="local">Horário</label>                   
                          <select class="selecthorario" type="time" id="id_horario" name="id_horario" >
                          @foreach ($horario as $hora) 
                           <option value="{{$hora->id}}">{{$hora->horario}}</option>
                          @endforeach
                          </select>   
                      </div>  


                  
          
                    <div class="continue-button">
                    <a href="#"><button type="submit">Continuar </button></a>
                    </div>            

                    <div class="continue-button">
                      <a  href="/logout_usuario"><button type="button">Sair</button></a>
                    </div>                 
            </form>  
            </div><!-- agendamento -->
        </div><!-- div-ag -->          

      </div>
      <div id="div-todos" class="box-s bk-azul-escuro ">

      @foreach($clientes as $cli)
   
      <div class="card">
              
                 <p class="frase font15"><span class="destaque">Nome:</span>{{$cli->nome}}</p>
                 <p class="frase font15"><span class="destaque">Email:</span>{{$cli->email}}</p>
                 <p class="frase font15"><span class="destaque">Telefone:</span>{{$cli->telefone}}</p> 
                   <p class="frase font15"><span class="destaque">Cidade:</span>{{$cid->nome}}</p>                 
                 <p class="frase font15"><span class="destaque">Serviço:</span>{{$servico->nome}}</p>
                 <p class="frase font15"><span class="destaque">Duração:</span>{{$servico->duracao}}</p>

                 <!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteAgenda{{ $cli->id}}">
                        Cancelar
                </button> -->


                <a class="btn btn-primary" href="{{URL::to('/agenda/'.$cli->id)}}" >Cancelar</a>      

     </div>
     @endforeach
  
  
</div><!-- container-agen -->
  
<!-- 
#008B00
#8B0000
#EE7600 
-->

  

  <script>

$('.form').find('input, textarea').on('keyup blur focus', function (e) {
  
  var $this = $(this),
      label = $this.prev('label');

	  if (e.type === 'keyup') {
			if ($this.val() === '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
    	if( $this.val() === '' ) {
    		label.removeClass('active highlight'); 
			} else {
		    label.removeClass('highlight');   
			}   
    } else if (e.type === 'focus') {
      
      if( $this.val() === '' ) {
    		label.removeClass('highlight'); 
			} 
      else if( $this.val() !== '' ) {
		    label.addClass('highlight');
			}
    }

});

$('.tab a').on('click', function (e) {
  
  e.preventDefault();
  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();
  
  $(target).fadeIn(600);
  
});


  </script>





       