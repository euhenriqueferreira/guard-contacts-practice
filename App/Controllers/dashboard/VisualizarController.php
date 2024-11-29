<?php

namespace App\Controllers\Dashboard;

use Core\Database;
use Core\Validacao;
use App\Models\Contato;
use App\Models\Usuario;

class VisualizarController
{
    public function __invoke()
    {
        if (isset($_SESSION['mostrar'])) {
            unset($_SESSION['mostrar']);
        } else {
            $db = new Database(config('database'));

            $contatos = $db->query(
                query: "select * from contatos where usuario_id = :usuario_id",
                class: Contato::class,
                params: ['usuario_id' => auth()->id]
            )->fetchAll();

            return view('dashboard/visualizar', [
                'contatos' => $contatos,
            ]);
            // $_SESSION['mostrar'] = true;
        }

        return redirect('/dashboard');
    }


    public function mostrar()
    {
        $senha = $_POST['senha'];

        $validacao = Validacao::validar([
            'senha' => ['required']
        ], $_POST);

        if ($validacao->naoPassou()) {
            return view('dashboard/visualizar');
            exit();
        }

        if (!(password_verify($senha, auth()->senha))) {
            flash()->push('validacoes', ['senha' => ['A senha está incorreta!']]);

            return view('dashboard/visualizar');
        }

        $_SESSION['mostrar'] = true;

        return redirect('/dashboard');
    }
}
