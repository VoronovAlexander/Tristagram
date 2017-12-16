<?php

use yii\db\Migration;

/**
 * Handles the creation of table `likes`.
 * Has foreign keys to the tables:
 *
 * - `post`
 * - `user`
 */
class m171216_071347_create_likes_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('likes', [
            'id' => $this->primaryKey(),
            'post_id' => $this->notNull()(),
            'user_id' => $this->notNull()(),
        ]);

        // creates index for column `post_id`
        $this->createIndex(
            'idx-likes-post_id',
            'likes',
            'post_id'
        );

        // add foreign key for table `post`
        $this->addForeignKey(
            'fk-likes-post_id',
            'likes',
            'post_id',
            'posts',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            'idx-likes-user_id',
            'likes',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-likes-user_id',
            'likes',
            'user_id',
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
        // drops foreign key for table `post`
        $this->dropForeignKey(
            'fk-likes-post_id',
            'likes'
        );

        // drops index for column `post_id`
        $this->dropIndex(
            'idx-likes-post_id',
            'likes'
        );

        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-likes-user_id',
            'likes'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-likes-user_id',
            'likes'
        );

        $this->dropTable('likes');
    }
}
