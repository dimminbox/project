<?php

class m130915_091545_alter_table_deposit_type_add_column_total_return extends CDbMigration
{
	public function up()
	{
        $this->addColumn('{{deposit_type}}', 'total_return', 'float');
	}

	public function down()
	{
		$this->dropColumn('{{deposit_type}}', 'total_return');
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