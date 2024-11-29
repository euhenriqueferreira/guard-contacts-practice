<?php


namespace Core;

class Validacao
{
    public $validacoes = [];

    public static function validar($params = [], $dados)
    {
        $valObj = new self;

        foreach ($params as $campo => $validacoes) {
            foreach ($validacoes as $validacao) {
                if (str_contains($validacao, ':')) {
                    $aux = explode(":", $validacao);
                    $method = $aux[0];
                    $limiter = $aux[1];

                    $valObj->$method($campo, $dados[$campo], $limiter);
                } else {
                    if ($validacao == 'confirmed') {
                        $valObj->$validacao($campo, $dados[$campo], $dados);
                    } else {
                        $valObj->$validacao($campo, $dados[$campo]);
                    }
                }
            }
        }

        return $valObj;
    }

    public function required($campo, $valor)
    {
        echo 'Required';
        if (!strlen($valor) > 0) {
            $this->validacoes[$campo][] = "O campo $campo é obrigatório";
        }
    }

    public function email($campo, $valor)
    {
        if (!filter_var($valor, FILTER_VALIDATE_EMAIL)) {
            $this->validacoes[$campo][] = "O campo $campo deve ser um e-mail";
        }
    }

    public function unique($campo, $valor)
    {
        $db = new Database(config('database'));

        $usuario = $db->query(
            query: "select * from usuarios where $campo = :campo",
            params: ['campo' => $valor]
        )->fetch();

        if ($usuario) {
            $this->validacoes[$campo][] = "Esse $campo já está sendo usado";
        }
    }

    public function strong($campo, $valor)
    {
        if (!strpbrk($valor, '!@#$%¨&*())_+{`}^:><')) {
            $this->validacoes[$campo][] = "O campo $campo deve conter caracteres especiais";
        }
    }


    public function telefone($campo, $valor)
    {
        $regex = '/^\(\d{2}\)\s\d{4,5}-\d{4}$/';

        if (!preg_match($regex, $valor)) {
            $this->validacoes[$campo][] = "O campo $campo deve ser (xx) xxxxx-xxxx";
        }
    }

    public function min($campo, $valor, $limitador)
    {
        if (strlen($valor) < $limitador) {
            $this->validacoes[$campo][] = "O campo $campo deve conter no mínimo $limitador caracteres";
        }
    }

    public function max($campo, $valor, $limitador)
    {
        if (strlen($valor) > $limitador) {
            $this->validacoes[$campo][] = "O campo $campo deve conter no máximo $limitador caracteres";
        }
    }

    public function confirmed($campo, $valor, $dados)
    {
        $valorConfirmacao = $dados[$campo . '_confirmacao'];

        if (!$valor == $valorConfirmacao) {
            $this->validacoes[$campo][] = "O campo $campo deve ser igual ao campo " . $campo . '_confirmacao';
        }
    }

    public function naoPassou($chaveCustomizada = null)
    {
        $chave = 'validacoes';

        if ($chaveCustomizada) {
            $chave .= '_' . $chaveCustomizada;
        }

        flash()->push($chave, $this->validacoes);

        return count($this->validacoes) > 0;
    }
}
