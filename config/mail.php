<?php
return [
    'driver'     => 'smtp',
    'host'       => 'smtp.gmail.com',
    'port'       => 587,
    'from'       => ['address' => 'tian020200@gmail.com', 'name' => 'yinsh-service'],
    'encryption' => 'tls',
    'username'   =>'tian020200',
    'password'   => 'tiantian0202',
    'sendmail'   => '/usr/sbin/sendmail -bs',
    'pretend'    => true,
    'stream' => [
        'ssl' => [
            'allow_self_signed' => true,
            'verify_peer' => false,
            'verify_peer_name' => false,
        ],
    ],
];

