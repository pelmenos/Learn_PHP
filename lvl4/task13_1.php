<?php

$earth = [
    'continent' => [
        'Eurasia' =>  [
            'countries' => [
                    'Russia',
                    'USA',
                    'Austria'
                    ]
        ]
    ]
];

$earth['continent']['Eurasia']['countries'][] = 'Great Britain';
var_dump($earth['continent']['Eurasia']['countries']);
echo count($earth);