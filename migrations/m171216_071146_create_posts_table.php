<?php

use yii\db\Migration;

/**
 * Handles the creation of table `posts`.
 * Has foreign keys to the tables:
 *
 * - `user`
 */
class m171216_071146_create_posts_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('posts', [
            'id' => $this->primaryKey(),
            'title' => $this->string()()->notNull()(),
            'content' => $this->text()->notNull()(),
            'user_id' => $this->notNull()(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-posts-user_id',
            'posts',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-posts-user_id',
            'posts',
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
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-posts-user_id',
            'posts'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-posts-user_id',
            'posts'
        );

        $this->dropTable('posts');
    }
}
