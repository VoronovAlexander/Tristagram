<?php

use yii\db\Migration;

/**
 * Handles the creation of table `drink_statistics`.
 * Has foreign keys to the tables:
 *
 * - `category`
 * - `user`
 */
class m171216_075514_create_drink_statistics_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('drink_statistics', [
            'id' => $this->primaryKey(),
            'percent' => $this->real()()->notNull(),
            'volume' => $this->integer()()->notNull()(),
            'created_at' => $this->dateTime()()->notNull(),
            'category_id' => $this->notNull()(),
            'user_id' => $this->notNull()(),
        ]);

        // creates index for column `category_id`
        $this->createIndex(
            'idx-drink_statistics-category_id',
            'drink_statistics',
            'category_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-drink_statistics-category_id',
            'drink_statistics',
            'category_id',
            'categories',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            'idx-drink_statistics-user_id',
            'drink_statistics',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-drink_statistics-user_id',
            'drink_statistics',
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
        // drops foreign key for table `category`
        $this->dropForeignKey(
            'fk-drink_statistics-category_id',
            'drink_statistics'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            'idx-drink_statistics-category_id',
            'drink_statistics'
        );

        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-drink_statistics-user_id',
            'drink_statistics'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-drink_statistics-user_id',
            'drink_statistics'
        );

        $this->dropTable('drink_statistics');
    }
}
