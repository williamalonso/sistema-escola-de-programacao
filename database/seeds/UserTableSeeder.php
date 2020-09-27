<?php

use Illuminate\Database\Seeder;
use App\User;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $dados = [
            'name' => 'William', 
            'email' => 'williamalonso@outlook.com',
            'password' => bcrypt('123'),
        ];
        if(User::where('email', '=', $dados['email'])->count()) {
            $usuario = User::where('email', '=', $dados['email'])->first();
            $usuario->update($dados);
            echo "Usuario Alterado!";
        } else {
            User::create($dados);
            echo "Usuario Criado!"; 
        }
    }

}