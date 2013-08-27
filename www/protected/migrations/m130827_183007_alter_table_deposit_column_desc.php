<?php

class m130827_183007_alter_table_deposit_column_desc extends CDbMigration
{
	public function up()
	{
        $this->addColumn('{{deposit_type}}', 'description', 'string');
        $this->addColumn('{{deposit_type}}', 'min_amount', 'integer');
        $this->addColumn('{{deposit_type}}', 'max_amount', 'integer');
        $this->addColumn('{{deposit_type}}', 'status', 'integer');
	}

	public function down()
	{
		$this->dropColumn('{{deposit_type}}', 'description');
        $this->dropColumn('{{deposit_type}}', 'min_amount');
        $this->dropColumn('{{deposit_type}}', 'max_amount');
        $this->dropColumn('{{deposit_type}}', 'status');
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