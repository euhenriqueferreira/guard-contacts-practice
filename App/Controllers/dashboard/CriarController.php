<?php

namespace App\Controllers\Dashboard;

use Core\Validacao;
use Core\Database;
use App\Models\Contato;

class CriarController
{
    public function __invoke()
    {
        $db = new Database(config('database'));

        $contatos = $db->query(
            query: "select * from contatos where usuario_id = :usuario_id",
            class: Contato::class,
            params: ['usuario_id' => auth()->id]
        )->fetchAll();

        return view('dashboard/criar', [
            'contatos' => $contatos,
        ]);
    }

    public function criar()
    {
        $usuario_id = auth()->id;
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];

        $validacao = Validacao::validar([
            'nome' => ['required', 'min:4'],
            'telefone' => ['required', 'telefone'],
            'email' => ['required', 'email'],
        ], $_POST);

        if ($validacao->naoPassou()) {
            return redirect('/dashboard/criar-contato');
            exit();
        }

        $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        $novoNome = md5(rand());
        $foto = "images/$novoNome.$extensao";
        move_uploaded_file($_FILES['foto']['tmp_name'], base_path('public/' . $foto));

        $db = new Database(config('database'));

        $db->query(
            query: "insert into contatos (usuario_id, nome, telefone, email, foto)
                    values (:usuario_id, :nome, :telefone, :email, :foto)",
            params: compact('usuario_id', 'nome', 'telefone', 'email', 'foto')
        );

        flash()->push('sucesso', 'Contato cadastrado com sucesso!');
        return redirect('/dashboard');
    }
}
