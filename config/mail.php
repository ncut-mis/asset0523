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
];

