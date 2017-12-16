<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_points`.
 */
class m171216_075619_create_user_points_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('user_points', [
            'id' => $this->primaryKey(),
            '',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('user_points');
    }
}
