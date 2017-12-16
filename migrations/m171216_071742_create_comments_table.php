<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comments`.
 * Has foreign keys to the tables:
 *
 * - `post`
 * - `user`
 */
class m171216_071742_create_comments_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('comments', [
            'id' => $this->primaryKey(),
            'content' => $this->text()->notNull()(),
            'post_id' => $this->notNull()(),
            'user_id' => $this->notNull()(),
        ]);

        // creates index for column `post_id`
        $this->createIndex(
            'idx-comments-post_id',
            'comments',
            'post_id'
        );

        // add foreign key for table `post`
        $this->addForeignKey(
            'fk-comments-post_id',
            'comments',
            'post_id',
            'posts',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            'idx-comments-user_id',
            'comments',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-comments-user_id',
            'comments',
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
            'fk-comments-post_id',
            'comments'
        );

        // drops index for column `post_id`
        $this->dropIndex(
            'idx-comments-post_id',
            'comments'
        );

        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-comments-user_id',
            'comments'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-comments-user_id',
            'comments'
        );

        $this->dropTable('comments');
    }
}
