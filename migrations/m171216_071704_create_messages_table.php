<?php

use yii\db\Migration;

/**
 * Handles the creation of table `messages`.
 * Has foreign keys to the tables:
 *
 * - `sender_user`
 * - `receiver_user`
 */
class m171216_071704_create_messages_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('messages', [
            'id' => $this->primaryKey(),
            'content' => $this->text()->notNull()(),
            'created_at' => $this->dateTime()->notNull(),
            'sender_user_id' => $this->notNull()(),
            'receiver_user_id' => $this->notNull()(),
        ]);

        // creates index for column `sender_user_id`
        $this->createIndex(
            'idx-messages-sender_user_id',
            'messages',
            'sender_user_id'
        );

        // add foreign key for table `sender_user`
        $this->addForeignKey(
            'fk-messages-sender_user_id',
            'messages',
            'sender_user_id',
            'users',
            'id',
            'CASCADE'
        );

        // creates index for column `receiver_user_id`
        $this->createIndex(
            'idx-messages-receiver_user_id',
            'messages',
            'receiver_user_id'
        );

        // add foreign key for table `receiver_user`
        $this->addForeignKey(
            'fk-messages-receiver_user_id',
            'messages',
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
            'fk-messages-sender_user_id',
            'messages'
        );

        // drops index for column `sender_user_id`
        $this->dropIndex(
            'idx-messages-sender_user_id',
            'messages'
        );

        // drops foreign key for table `receiver_user`
        $this->dropForeignKey(
            'fk-messages-receiver_user_id',
            'messages'
        );

        // drops index for column `receiver_user_id`
        $this->dropIndex(
            'idx-messages-receiver_user_id',
            'messages'
        );

        $this->dropTable('messages');
    }
}
