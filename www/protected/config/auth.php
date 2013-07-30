<?php
return array(
    'guest' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Guest',
        'bizRule' => null,
        'data' => null
    ),
    'user' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'User',
        'children' => array(
            'guest', // унаследуемся от гостя
        ),
        'bizRule' => null,
        'data' => null
    ),
   /* 'superuser' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Superuser',
        'children' => array(
            'user',          // позволим супер юзеру всё, что позволено пользователю
        ),
        'bizRule' => null,
        'data' => null
    ),*/
    'admin' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Admin',
        'children' => array(
            'user',
        ),
        'bizRule' => null,
        'data' => null
    ),
);