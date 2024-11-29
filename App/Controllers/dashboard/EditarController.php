<?php

namespace App\Controllers\Dashboard;

use Core\Validacao;
use Core\Database;
use App\Models\Contato;

class EditarController
{
    public function __invoke()
    {
        $contato_id = explode('=', parse_url($_SERVER['REQUEST_URI'])['query'])[1];

        $db = new Database(config('database'));

        $contatoEdit = $db->query(
            query: "select * from contatos where id = :id",
            class: Contato::class,
            params: ['id' => $contato_id]
        )->fetch();

        $contatos = $db->query(
            query: "select * from contatos where usuario_id = :usuario_id",
            class: Contato::class,
            params: ['usuario_id' => auth()->id]
        )->fetchAll();


        return view('dashboard/editar', [
            'contatoEdit' => $contatoEdit,
            'contatos' => $contatos,
        ]);
    }


    public function editar()
    {

        $contato_id = $_POST['contato_id'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];

        $validacao = Validacao::validar([
            'nome' => ['required', 'min:4'],
            'telefone' => ['required', 'telefone'],
            'email' => ['required', 'email'],
        ], $_POST);

        if ($validacao->naoPassou()) {
            return redirect('/dashboard/editar-contato');
            exit();
        }

        $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        $novoNome = md5(rand());
        $foto = "images/$novoNome.$extensao";
        move_uploaded_file($_FILES['foto']['tmp_name'], base_path('public/' . $foto));

        $db = new Database(config('database'));

        $db->query(
            query: "update contatos set nome = :nome, telefone = :telefone, email = :email, foto = :foto where id = :contato_id",
            params: compact('nome', 'telefone', 'email', 'foto', 'contato_id')
        );

        flash()->push('sucesso', 'Contato editado com sucesso!');
        return redirect('/dashboard');
    }
}
