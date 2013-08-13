<?php

class m130807_174718_create_messages_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('{{messages}}', array(
           'id' => 'pk',
            'user_id' => 'integer',
            'sender' => 'integer',
            'subject' => 'string',
            'message' => 'text',
            'time' => 'datetime',
            'status' => 'integer',
            'importance' => 'integer',
        ));
	}

	public function down()
	{
		$this->dropTable('{{messages}}');
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