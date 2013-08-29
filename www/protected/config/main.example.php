<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
Yii::setPathOfAlias('chartjs', dirname(__FILE__).'/../extensions/yii-chartjs');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');

return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'Доверительное управление',
    'theme' => 'tm',
    'language' => 'ru',
    //'homeUrl'=>array('site/index'),

    // preloading 'log' component
    'preload' => array(
        'log',
        'chartjs'
    ),
    /*
    'aliases' => array(
        'chartjs' => 'ext.chartjs'
    ),*/
    // autoloading model and component classes
    'import'=>array(
        'ext.imperavi-redactor-widget.*',
        'ext.widgets.news-widget.*',
        'ext.bootstrap.*',
        'ext.yii-chartjs.*',
        'application.models.*',
        'application.components.*',
        'application.modules.user.models.*',
        'application.modules.user.components.*',
        'application.modules.rights.*',
        'application.modules.rights.models.*',
        'application.modules.rights.components.*',
        'application.modules.admin.models.*',
    ),

    'modules'=>array(
        // uncomment the following to enable the Gii tool
        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'gii',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters'=>array('127.0.0.1','::1'),
            'generatorPaths'=>array(
                'bootstrap.gii',
            )
        ),

        'user'=>array(
            'tableUsers' => 'hyip_users',
            'tableProfiles' => 'hyip_profiles',
            'tableProfileFields' => 'hyip_profiles_fields',
            # encrypting method (php hash function)
            'hash' => 'md5',
            # send activation email
            'sendActivationMail' => true,
            # allow access for non-activated users
            'loginNotActiv' => false,
            # activate user on registration (only sendActivationMail = false)
            'activeAfterRegister' => true,
            # automatically login from registration
            'autoLogin' => true,
            # registration path
            'registrationUrl' => array('/user/registration'),
            # recovery password path
            'recoveryUrl' => array('/user/recovery'),
            # login form path
            'loginUrl' => array('/login'),
            # page after login
            'returnUrl' => array('/profile'),
            # page after logout
            'returnLogoutUrl' => array('/login'),
        ),
        'rights'=>array(
            'superuserName'=>'Admin', // Name of the role with super user privileges.
            'authenticatedName'=>'Authenticated',  // Name of the authenticated user role.
            'userIdColumn'=>'id', // Name of the user id column in the database.
            'userNameColumn'=>'username',  // Name of the user name column in the database.
            'enableBizRule'=>true,  // Whether to enable authorization item business rules.
            'enableBizRuleData'=>true,   // Whether to enable data for business rules.
            'displayDescription'=>true,  // Whether to use item description instead of name.
            'flashSuccessKey'=>'RightsSuccess', // Key to use for setting success flash messages.
            'flashErrorKey'=>'RightsError', // Key to use for setting error flash messages.

            'baseUrl'=>'/rights', // Base URL for Rights. Change if module is nested.
            'layout'=>'rights.views.layouts.main',  // Layout to use for displaying Rights.
            'appLayout'=>'application.views.layouts.main', // Application layout.
            'cssFile'=>'rights.css', // Style sheet file to use for Rights.
            'install'=>false,  // Whether to enable installer.
            'debug'=>false,
        ),
        'admin'=>array(),

    ),

    // application components
    'components'=>array(

        'user'=>array(
            'class'=>'RWebUser',
            // enable cookie-based authentication
            'allowAutoLogin'=>true,
            'loginUrl'=>array('/user/login'),
        ),
        'authManager'=>array(
            'class'=>'RDbAuthManager',
            'connectionID'=>'db',
            'defaultRoles'=>array('Authenticated', 'Guest'),
        ),

        'urlManager'=>array(
            'urlFormat'=>'path',
            'showScriptName' => false,
            'rules'=> include(__DIR__ . DIRECTORY_SEPARATOR . 'route.php'),
        ),
        'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap',
        ),
        'chartjs' => array('class' => 'chartjs.components.ChartJs'),
        /* 'user'=>array(
             // enable cookie-based authentication
             'class' => 'WebUser',
             'allowAutoLogin'=>true,
             'loginUrl' => array('/user/login'),
         ),*/

        /*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
        */
        // uncomment the following to use a MySQL database

        'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=project',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
            'tablePrefix' => 'hyip_',
        ),

        'errorHandler'=>array(
            // use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
        'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error, warning',
                ),
                // uncomment the following to show log messages on web pages
                /*
                array(
                    'class'=>'CWebLogRoute',
                ),
                */
            ),
        ),
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params'=>array(
        // this is used in contact page
        'adminEmail'=>'yborschev@gmail.com',
        'CronSecretPhrase' => '7g65dwrh78wc6r7wgxr637TY6xhYUGYTYf9867HGVhghj',
        'AccountID' => '3140075',
        'payee_account' => 'U4330448',
        'PassPhrase' => 'Cecfybyj915',
        'payment_units' => 'USD',
        'max_amount_output' => '300',//максимальная сумма для вывода
        'defaultGeneralPercent' => 0.6, // Значение общего процента по-умолчанию
        'reinvest' => false, //Реинвестирование
    ),
);