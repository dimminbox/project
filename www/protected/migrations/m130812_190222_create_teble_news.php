<?php

class m130812_190222_create_teble_news extends CDbMigration
{
	public function up()
	{
        $this->createTable('{{news}}', array(
            'id' => 'pk',
            'title' => 'string',
            'description' => 'string',
            'text' => 'text',
            'image' => 'string',
            'status' => 'integer',
            'created_time' => 'datetime',
            'update_time' => 'datetime',
        ));
	}

	public function down()
	{
		$this->dropTable('{{news}}');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}