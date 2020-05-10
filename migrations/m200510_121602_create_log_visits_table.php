<?php

use yii\db\Migration;

/**
 * Handles the creation of table `log_visits`.
 */
class m200510_121602_create_log_visits_table extends Migration
{
    private $tableName = 'log_visits';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'datetime' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')->comment('Дата создания записи'),
            'status' => $this->tinyInteger()->comment('Флаг посещения сайта'),
        ]);

        $this->createIndex('IDX_DATETIME', $this->tableName, 'datetime');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('IDX_DATETIME', $this->tableName);
        $this->dropTable($this->tableName);
    }
}
