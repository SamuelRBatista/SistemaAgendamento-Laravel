<?php

namespace App\Http\Controllers;
use App\Models\agendamento;
use App\Models\cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\usuarios;


class usuarioController extends Controller
{

    public function index(Request $request)
    {        
         if(!Session::has('login')){
              return $this->show();
           }else{        

          
             return redirect('/agendamento_index');
           }
    }

    public function show()   
    {
        return view('usuario.login');      
    }

    public function logar(Request $request )
    {
    // //Validação
    $this->validate($request,[
       'txt_usuario'=> 'required|between:3,30|alpha_num',
       'txt_senha'=>'required|between:6,15',
    // 'text_repetir'=>'required|same:text_senha',
    // 'text_email'=>'required|email',
     ]);
       $dados = usuarios::where('usuario',$request->txt_usuario)->first();
   
       $result = "";

       if(isset($dados)==0){
        $erros_bd = ['O usuário não existe'];
        return view('usuario.login',compact('erros_bd'));          
        }  

       if(!Hash::check($request->txt_senha,$dados->senha)){
        $erros_bd = ['A senha está incorreta'];
        return view('usuario.login',compact('erros_bd'));            
         }

         Session::put('login','sim');
         Session::put('usuario',$dados->id);
     

       
         return redirect()->route('login');
         
    }

    public function Logout()
    {
        //Logout da sessao
        //Destruir a sessão e redirecionar a pagina inicial
        Session::flush();
        return redirect('/');
    }

    public function registrar()
    {
        return view('usuario.frmcad');
    }

    public function inserir(Request $request)
    {
        try {
        //Validação
        $this->validate($request,[
        'txt_usuario'=> 'required|between:3,30|alpha_num',
        'txt_senha'=>'required|between:6,15',
        //'text_repetir'=>'required|same:text_senha',
        'txt_email'=>'required|email',
        ]);       

        $dados = new usuarios;
        $dados->usuario = $request->txt_usuario;
        $dados->senha = Hash::make($request->txt_senha);
        $dados->email = $request->txt_email;
        $dados->save();
        return redirect('/login');
    } catch (\PDOException $e) {
        if (strpos($e->getMessage(), 'Integrity constraint violation'))
        session()->flash('Não foi possível cadastrar verifique os campos e tente novemanete');
        return redirect()->back();
    }
    }   

   
}