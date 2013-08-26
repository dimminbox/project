<?php
return array(
    'contact' => '/site/contact',
    'about' => '/site/about',
    'signup' => '/user/registration',
    'faq' => '/site/faq',
    'referral' => '/site/referral',
    'login' => '/user/login',
    'logout' => '/user/logout',

    'profile' => '/user/profile',

    'profile/operations' => '/user/profile/operations',
    'profile/deposits' => '/user/profile/deposits',
    'profile/referrals' => '/user/profile/referral',
    'profile/edit' => '/user/profile/edit',
    'profile/edit/changepassword' => '/user/profile/changepassword',


    '<controller:\w+>/<id:\d+>'=>'<controller>/view',
    '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
    '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',




);