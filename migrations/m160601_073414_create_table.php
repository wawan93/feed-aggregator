<?php

use yii\db\Migration;

/**
 * Handles the creation for table `table`.
 */
class m160601_073414_create_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->renameColumn('feeds', 'last_item', 'last_modified');
        $this->alterColumn('feeds', 'last_modified', $this->dateTime());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('feeds');
    }
}
