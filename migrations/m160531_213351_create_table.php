<?php

use yii\db\Migration;

/**
 * Handles the creation for table `table`.
 */
class m160531_213351_create_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('feeds', [
            'id' => $this->primaryKey(),
            'url' => $this->string(255)->notNull(),
            'type' => $this->string(255)->notNull(),
            'last_item' => $this->string()->defaultValue(0)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('feeds');
    }
}
