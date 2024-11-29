<?php

use Core\Flash;

function base_path($path)
{
    return __DIR__ . '/../' . $path;
}

function dd(...$dump)
{
    dump($dump);
    exit();
}

function dump(...$dump)
{
    echo '<pre>';
    var_dump($dump);
    echo '</pre>';
}

function abort($code)
{
    http_response_code($code);
    view($code);
    exit();
}


function view($view, $params = [], $template = 'app')
{
    if (!$view) {
        abort(404);
    }


    foreach ($params as $chave => $valor) {
        $$chave = $valor;
    }

    require base_path("views/templates/$template.php");
}


function flash()
{
    return new Flash;
}


function config($chave)
{
    $configuracao = require base_path('config/config.php');

    return $configuracao['database']['driver'] . ':' . $configuracao['database']['database'];
}

function redirect($uri)
{
    return header('location: ' . $uri);
}

function auth()
{
    if (isset($_SESSION['auth'])) {
        return $_SESSION['auth'];
    }

    return null;
}
