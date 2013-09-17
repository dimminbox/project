<?php

class newsWidget extends CWidget {

    public $quantity = 3;

    public function run() {
        $criteria = new CDbCriteria();

        $criteria->limit = $this->quantity;
        $criteria->order = 'id DESC';

        $news = News::model()->findAll($criteria);
        // передаем данные в представление виджета
        $this->render('newsWidget',array('news'=>$news));
    }
}