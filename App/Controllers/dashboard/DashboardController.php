<?php

namespace App\Controllers\Dashboard;

use App\Models\Contato;
use Core\Database;


class DashboardController
{
    public function __invoke()
    {
        $db = new Database(config('database'));

        $contatos = $db->query(
            query: "select * from contatos where usuario_id = :usuario_id",
            class: Contato::class,
            params: ['usuario_id' => auth()->id]
        )->fetchAll();

        return view('dashboard/index', [
            'contatos' => $contatos,
        ]);
    }
}
