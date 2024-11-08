<?php

namespace App\Http\Controllers;

use App\Models\tipodado;
use App\Models\cliente;
use App\Models\cidade;
use App\Models\Horario;
use App\Models\usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class agendaController extends Controller
{

    //home
    public function index(Request $request )
    {
        //test$user= $request->id_usuario;  
    
        if(!Session::has('login')){         
            
         return redirect('/');
          }    
          $tipodado = tipodado::all();
          $cidade = cidade::all();
          //$clientes = cliente::all();  
          $horario = Horario::all();  

           $user = $request->session()->get('usuario');
         // print_r($user);
  
      $clientes = cliente::where('id_usuario', $user)->get();  

 
       
       // $clientes= cliente::where('id_usuario', $user)->first();

       
      
        return view('agendamento.agenda',compact('cidade','clientes','tipodado','horario'));
        
    
    }

    public function show ()
    {     
        return redirect('');
    }

    public function store(Request $request)
    {     
        
        try {   
       
        if(!Session::has('login')){
            return redirect('/');
             } 

             $user = $request->session()->get('usuario');
             $date = now()->format("H:i:s");
             $dados = Horario::where('id',$request->id_horario)->first();       
             $dr = $dados->horario;         
 
         if($dr >= $date)
            {
           $data = new cliente();          
           $data['nome'] = $request->nome;  
           $data['id_usuario'] = $user;
           $data['email'] = $request->email;
           $data['telefone'] = $request->telefone;          
           $data['cpf'] = $request->cpf; 
           $data['id_cidade'] = $request->id_cidade; 
           $data['id_tipodado'] = $request->id_tipodado; 
           $data['id_horario'] = $request->id_horario; 
           $data->save();        
           session()->flash('message', 'Seu agendamento foi efetuado com sucesso.');      
               
            return redirect('/agendamento_index');
            }else{
                session()->flash('message1', 'Horário inválido escolha outro.');       
                return redirect('/agendamento_index');
            }
                
        } catch (\PDOException $e) {
            if (strpos($e->getMessage(), 'Integrity constraint violation'))
            session()->flash('message', 'Seu agendamento não foi salvo verifiques os campos e tente novamente.',$e);
            return redirect()->back();
        }   
    }

    public function destroy($id)
    {
        try {
        $clientes= DB::table('clientes')->where('id',$id)->delete();

        session()->flash('message1', 'Seu agendamento foi cancelado com sucesso.');

         return redirect('/agendamento_index'); 
        } catch (\PDOException $e) {
            if (strpos($e->getMessage(), 'Integrity constraint violation'))
            session()->flash('message', 'Seu agendamento não foi removido.', $e);
            return redirect()->back();
        } 
       
    }
}
