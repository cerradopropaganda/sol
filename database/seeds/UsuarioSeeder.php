<?php

use Illuminate\Database\Seeder;
use App\Usuario;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dados = [
        	"cnpj"=>"27.276.429/000162",
            "fantasia"=>"Empresa Teste",
            "data_contrato_inicio"=>"2017-12-01 00:00:00",
            "data_contrato_final"=>"2018-12-01 00:00:00",
            "nome_contato"=>"Guilherme Borges",
            "status"=>"0",
            "endereco"=>"Rua 59 a, 666, apt.702, Edi.Cartier, Setor Aeroporto",
            "cidade"=>"Goiânia",
            "uf"=>"GO",
            "website"=>"http:://cerradopropaganda.com.br",
            "fone1"=>"(62) 3224-1055",
            "fone2"=>"(62) 98323-5151",
            "fone3"=>"(62) 98210-2351",
            "username"=>"cliente",
        	"email_contato"=>"user@user.com",
        	"password"=>bcrypt("123")
        ];
        if(Usuario::where('email_contato','=',$dados['email_contato'])->count()){
        	$usuario= Usuario::where('email_contato','=',$dados['email_contato'])->first();
        	$usuario->update($dados);
        	echo 'usuário alterado';
        }else{
        	 Usuario::create($dados);
        	 echo 'usuario criado';
        }


        $dados = [
            "cnpj"=>"23.345.567/000163",
            "fantasia"=>"Empresa Teste 2",
            "data_contrato_inicio"=>"2017-12-15 00:00:00",
            "data_contrato_final"=>"2018-12-15 00:00:00",
            "nome_contato"=>"Daniel Borges",
            "status"=>"0",
            "endereco"=>"Rua 1a, 113, Setor Aeroporto",
            "cidade"=>"Goiânia",
            "uf"=>"GO",
            "website"=>"http:://vemcomer.com.br",
            "fone1"=>"(62) 3224-1055",
            "fone2"=>"(62) 98323-5151",
            "fone3"=>"(62) 98210-2351",
            "username"=>"cliente2",
            "email_contato"=>"cliente@cliente.com",
            "password"=>bcrypt("123")
        ];
        if(Usuario::where('email_contato','=',$dados['email_contato'])->count()){
            $usuario= Usuario::where('email_contato','=',$dados['email_contato'])->first();
            $usuario->update($dados);
            echo 'usuário alterado';
        }else{
             Usuario::create($dados);
             echo 'usuario criado';
        }
    }
}
