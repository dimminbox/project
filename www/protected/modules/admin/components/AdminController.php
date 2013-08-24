<?php
class AdminController extends RController
{

    public $layout='//layouts/admin';

    public function filters()
    {
        return array(
            'rights', // perform access control for CRUD operations

        );
    }


}