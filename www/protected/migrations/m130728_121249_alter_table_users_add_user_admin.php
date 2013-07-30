<?php

class m130728_121249_alter_table_users_add_user_admin extends CDbMigration
{
	public function up()
	{
        $this->insert('{{users}}', array(
            'name' => 'admin',
            'password' => 'adminka',
            'email' => 'admin@project.ru',
            'role_id' => '1',
        ));
	}

	public function down()
	{
        $this->delete('{{users}}', array('name' => 'admin'));
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