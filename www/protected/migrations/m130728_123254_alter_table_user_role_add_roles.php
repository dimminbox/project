<?php

class m130728_123254_alter_table_user_role_add_roles extends CDbMigration
{
	public function up()
	{
        $this->insert('{{user_role}}', array(
            'name' => 'admin',
        ));
        $this->insert('{{user_role}}', array(
            'name' => 'user',
        ));
        $this->insert('{{user_role}}', array(
            'name' => 'superuser',
        ));
	}

	public function down()
	{
        $this->delete('{{user_role}}', array('name' => 'admin'));
        $this->delete('{{user_role}}', array('name' => 'user'));
        $this->delete('{{user_role}}', array('name' => 'superuser'));
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