<?php
return array(
    '<language:(en)>/' => 'site/index',
    '/' => 'site/index',
    '<language:(en)>/contact/' => '/site/contact',
    'contact' => '/site/contact/',

    '<language:(en)>/about' => '/site/about',
    'about' => '/site/about',

    '<language:(en)>/signup' => '/user/registration',
    'signup' => '/user/registration',

    '<language:(en)>/faq' => '/site/faq',
    'faq' => '/site/faq',

    '<language:(en)>/referral' => '/site/referral',
    'referral' => '/site/referral',

    '<language:(en)>/login' => '/user/login',
    'login' => '/user/login',

    '<language:(en)>/logout' => '/user/logout',
    'logout' => '/user/logout',

    '<language:(en)>/profile' => '/user/profile',
    'profile' => '/user/profile',

    '<language:(en)>/profile/operations' => '/user/profile/operations',
    'profile/operations' => '/user/profile/operations',

    '<language:(en)>/profile/deposits' => '/user/profile/deposits',
    'profile/deposits' => '/user/profile/deposits',

    '<language:(en)>/referrals' => '/user/profile/referral',
    'profile/referrals' => '/user/profile/referral',

    '<language:(en)>/profile/edit' => '/user/profile/edit',
    'profile/edit' => '/user/profile/edit',

    'profile/depositSuccess' => '/user/profile/depositSuccess',
    'profile/depositFail' => '/user/profile/depositFail',
    'profile/depositStatus' => '/user/profile/depositStatus',

    '<language:(en)>/profile/edit/changepassword' => '/user/profile/changepassword',
    'profile/edit/changepassword' => '/user/profile/changepassword',

    '<language:(en)>/<controller:\w+>/<id:\d+>'=>'<controller>/view',
    '<controller:\w+>/<id:\d+>'=>'<controller>/view',

    '<language:(en)>/<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
    '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',

    '<language:(en)>/<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
    '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',




);