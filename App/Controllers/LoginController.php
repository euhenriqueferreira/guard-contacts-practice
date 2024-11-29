<?php

namespace App\Controllers;

use Core\Validacao;
use Core\Database;
use App\Models\Usuario;

class LoginController
{
    public function index()
    {
        return view('login', template: 'guest');
    }

    public function logar()
    {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $validacao = Validacao::validar([
            'email' => ['required'],
            'senha' => ['required']
        ], $_POST);

        if ($validacao->naoPassou()) {
            return view('login', template: 'guest');
            exit();
        }

        $db = new Database(config('database'));

        $usuario = $db->query(
            query: "select * from usuarios where email = :email",
            class: Usuario::class,
            params: compact('email')
        )->fetch();

        if (! ($usuario && password_verify($senha, $usuario->senha))) {
            flash()->push('validacoes', ['email' => ['Usuário ou senha estão incorretos!']]);

            return view('login', template: 'guest');
        }

        $_SESSION['auth'] = $usuario;

        return redirect('/dashboard');
    }
}
