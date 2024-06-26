<?php

namespace Phortugol\Helpers;

use Phortugol\Enums\TokenType;

class ScannerKeywords
{
    public const KEYWORDS = [
        'E' => TokenType::AND,
        'senao' => TokenType::ELSE,
        'falso' => TokenType::FALSE,
        'para' => TokenType::FOR,
        'funcao' => TokenType::FUNCTION,
        'se' => TokenType::IF,
        'nulo' => TokenType::NULL,
        'indefinido' => TokenType::UNDEFINED,
        'OU' => TokenType::OR,
        'retorne' => TokenType::RETURN,
        'verdadeiro' => TokenType::TRUE,
        'var' => TokenType::VAR,
        'enquanto' => TokenType::WHILE,
        'pare' => TokenType::BREAK,
        'continue' => TokenType::CONTINUE,
        'escreva' => TokenType::PRINT,
        'leia' => TokenType::READ,
        // 'let' => TokenType::LET,
        // 'const' => TokenType::CONST,
    ];
}
