<?php


namespace Core;

class Flash
{
    public function push($chave, $conteudo)
    {
        $_SESSION[$chave] = $conteudo;
    }

    public function get($chave)
    {
        if (isset($_SESSION[$chave])) {
            $conteudo = $_SESSION[$chave];

            unset($_SESSION[$chave]);

            return $conteudo;
        }
        return [];
    }
}
