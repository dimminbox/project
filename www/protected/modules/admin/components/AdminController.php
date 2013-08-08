<?php
class AdminController extends RController
{

    public $layout='//layouts/column2';
    public function filters()
    {
        return array(
            'rights', // perform access control for CRUD operations

        );
    }


}