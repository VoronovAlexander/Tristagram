<?php

use yii\db\Migration;

/**
 * Handles the creation of table `preferences`.
 * Has foreign keys to the tables:
 *
 * - `user`
 * - `category`
 */
class m171216_072122_create_preferences_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('preferences', [
            'id' => $this->primaryKey(),
            'user_id' => $this->notNull()(),
            'category_id' => $this->notNull()(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-preferences-user_id',
            'preferences',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-preferences-user_id',
            'preferences',
            'user_id',
            'users',
            'id',
            'CASCADE'
        );

        // creates index for column `category_id`
        $this->createIndex(
            'idx-preferences-category_id',
            'preferences',
            'category_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-preferences-category_id',
            'preferences',
            'category_id',
            'categories',
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
            'fk-preferences-user_id',
            'preferences'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-preferences-user_id',
            'preferences'
        );

        // drops foreign key for table `category`
        $this->dropForeignKey(
            'fk-preferences-category_id',
            'preferences'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            'idx-preferences-category_id',
            'preferences'
        );

        $this->dropTable('preferences');
    }
}
