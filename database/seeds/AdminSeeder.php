<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dados = [
        	"name"=>"Guilherme Borges",
        	"job_title"=>"Desenvolvedor",
        	"email"=>"admin@admin.com",
        	"username"=>"admin",
        	"password"=>bcrypt("123")
        ];

        if(Admin::where('email','=',$dados['email'])->count()){

        	$usuario= Admin::where('email','=',$dados['email'])->first();
        	$usuario->update($dados);

        	echo 'admin alterado';

        }else{

        	 Admin::create($dados);
        	 echo 'admin criado';

        }
    }
}
