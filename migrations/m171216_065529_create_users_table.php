<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m171216_065529_create_users_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'login'=> $this->string()->notNull(),
            'password'=> $this->string()->notNull(),
            'fullname'=> $this->string()->notNull(),
            'birthday'=> $this->date(),
            'avatar'=> $this->string(),
            'active'=> $this->boolean()->notNull()->defaultValue(true),
            'enable_point'=> $this->string()->notNull()->defaultValue(true),
            'created_at' => $this->dateTime()->notNull()
            // role_id ?
        ]);

        // $this->addForeignKey(
        //     'fk-user-role_id',
        //     'users',
        //     'role_id',
        //     'role',
        //     'id',
        //     'CASCADE'
        // );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }
}
