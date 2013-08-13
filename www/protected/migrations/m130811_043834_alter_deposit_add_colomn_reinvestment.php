<?php

class m130811_043834_alter_deposit_add_colomn_reinvestment extends CDbMigration
{
	public function up()
	{
        $this->addColumn('{{deposit}}', 'reinvest' ,'boolean');
	}

	public function down()
	{
        $this->dropColumn('{{deposit}}','reinvest');
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