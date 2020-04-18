<?php
 
namespace App\Models;
 
class ValidacaoPacote
{
    public const MENSAGENS_DE_ERRO = [
        'required' => 'Campo :attribute é obrigatorio',
        'numeric' => 'O valor do campo deve ser numerico',
        'date_format' => 'O formato da data deve ser no padrão dd/mm/aaaa',
        'max' => 'O :attribute RODRIGO deve ter no máximo :max caracteres'
    ];
 
    public const REGRA_NOVO_PACOTE = [
        'nome' => 'required | max:80',
        'valor' => 'required | numeric',
        'dataInicio' => 'required | date_format:"Y-m-d"',
        'dataFim' => 'required | date_format:"Y-m-d"',
        'descricao' => 'required',
        'urlImagem' => 'mimes:jpeg,bmp,png'
    ];
}