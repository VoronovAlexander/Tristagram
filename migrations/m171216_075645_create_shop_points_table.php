<?php

use yii\db\Migration;

/**
 * Handles the creation of table `shop_points`.
 */
class m171216_075645_create_shop_points_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('shop_points', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('shop_points');
    }
}
