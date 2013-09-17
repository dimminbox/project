<?php

class LanguageSwitcherWidget extends CWidget
{
    public function run()
    {
        $currentUrl = ltrim(Yii::app()->request->url, '/');
        $links = array();
        foreach (DMultilangHelper::suffixList() as $prefix => $name){
            $url = '/' . ($prefix ? $prefix . '/' : '') . $currentUrl;
            $links[] = CHtml::tag('li', array('class'=>$prefix), CHtml::link($name, $url));
        }
        echo CHtml::tag('ul', array('class'=>'language'), implode("\n", $links));
    }
}
