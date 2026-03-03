<?php

$exercicios = [

    1 => [
        "titulo" => "Sistema Fuzzy para Controle de Irrigação",

        "descricao" => "Desenvolver um sistema fuzzy para determinar o tempo ideal de irrigação com base na temperatura ambiente e na umidade do solo.",

        "entradas" => [
            "Temperatura" => "0°C a 44°C",
            "Umidade do Solo" => "0% a 100%"
        ],

        "saida" => [
            "Tempo de Irrigação" => "0 a 60 minutos"
        ],

        "regras" => [
            "Se a umidade for BAIXA e a temperatura for ALTA, então o tempo deve ser LONGO.",
            "Se a umidade for MÉDIA e a temperatura for MÉDIA, então o tempo deve ser MÉDIO.",
            "Se a umidade for ALTA ou a temperatura for BAIXA, então o tempo deve ser CURTO."
        ],

        "casos_teste" => [
            1 => ["Temperatura" => 32, "Umidade" => 25],
            2 => ["Temperatura" => 20, "Umidade" => 80],
            3 => ["Temperatura" => 28, "Umidade" => 50]
        ]
    ],

    2 => [
        "titulo" => "Exercício Exemplo 2",
        "descricao" => "Aqui você pode colocar outro exercício futuramente."
    ]

];

?>