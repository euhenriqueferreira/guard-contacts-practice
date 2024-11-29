<?php

namespace App\Controllers;

use Core\Validacao;
use Core\Database;

class RegisterController
{
    public function index()
    {
        return view('register', template: 'guest');
    }

    public function registrar()
    {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $senha_confirmacao = $_POST['senha_confirmacao'];

        $validacao = Validacao::validar([
            'nome' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique'],
            'senha' => ['required', 'min:8', 'max:40', 'strong', 'confirmed']
        ], $_POST);

        if ($validacao->naoPassou()) {
            return redirect('/login');
            exit();
        }

        $db = new Database(config('database'));

        $db->query(
            query: "insert into usuarios (nome, email, senha) 
                    values(:nome, :email, :senha)",
            params: ['nome' => $nome, 'email' => $email, 'senha' => password_hash($senha, PASSWORD_DEFAULT)]
        );

        flash()->push('sucesso', 'Conta criada com sucesso!');
        return redirect('/login');
    }
}
