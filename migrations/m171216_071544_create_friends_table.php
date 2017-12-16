<?php

use yii\db\Migration;

/**
 * Handles the creation of table `friends`.
 * Has foreign keys to the tables:
 *
 * - `sender_user`
 * - `receiver_user`
 */
class m171216_071544_create_friends_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('friends', [
            'id' => $this->primaryKey(),
            'sender_user_id' => $this->notNull(),
            'receiver_user_id' => $this->notNull()(),
        ]);

        // creates index for column `sender_user_id`
        $this->createIndex(
            'idx-friends-sender_user_id',
            'friends',
            'sender_user_id'
        );

        // add foreign key for table `sender_user`
        $this->addForeignKey(
            'fk-friends-sender_user_id',
            'friends',
            'sender_user_id',
            'users',
            'id',
            'CASCADE'
        );

        // creates index for column `receiver_user_id`
        $this->createIndex(
            'idx-friends-receiver_user_id',
            'friends',
            'receiver_user_id'
        );

        // add foreign key for table `receiver_user`
        $this->addForeignKey(
            'fk-friends-receiver_user_id',
            'friends',
            'receiver_user_id',
            'users',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        // drops foreign key for table `sender_user`
        $this->dropForeignKey(
            'fk-friends-sender_user_id',
            'friends'
        );

        // drops index for column `sender_user_id`
        $this->dropIndex(
            'idx-friends-sender_user_id',
            'friends'
        );

        // drops foreign key for table `receiver_user`
        $this->dropForeignKey(
            'fk-friends-receiver_user_id',
            'friends'
        );

        // drops index for column `receiver_user_id`
        $this->dropIndex(
            'idx-friends-receiver_user_id',
            'friends'
        );

        $this->dropTable('friends');
    }
}
