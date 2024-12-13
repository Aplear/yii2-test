<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%task}}`.
 */
class m241211_224559_create_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // https://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%tasks}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'description' => $this->text()->null(),
            'status' => "ENUM('waiting', 'in_dev', 'close') NOT NULL",
            'priority' => "ENUM('low', 'medium', 'high') NOT NULL",
            'end_at' => $this->dateTime(),
        ], $tableOptions);

        // add foreign key for table `tasks`
        $this->addForeignKey(
            'fk-tasks-user_id',
            'tasks',
            'user_id',
            'user',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-tasks-user_id', 'tasks');
        $this->dropTable('{{%tasks}}');
    }
}
