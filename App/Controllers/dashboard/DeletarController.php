<?php

namespace App\Controllers\Dashboard;

use Core\Database;
use App\Models\Contato;

class DeletarController
{
    public function __invoke()
    {
        $contato_id = explode('=', parse_url($_SERVER['REQUEST_URI'])['query'])[1];

        $db = new Database(config('database'));

        $db->query(
            query: "delete from contatos where id = :contato_id",
            params: compact('contato_id')
        );

        flash()->push('sucesso', 'Usuário deletado com sucesso.');
        return redirect('/dashboard');
    }
}
