<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;

/**
 * This is the model class for table "log_visits".
 *
 * @property string $datetime Дата создания записи
 * @property int|null $status Флаг посещения сайта
 */
class LogVisit extends ActiveRecord
{
    /** @var int Флаг посещения сайта */
    public const WAS_VISITED = 1;
    /** @var int Флаг выхода с сайта */
    public const WAS_QUITED = 0;

    /** @var string $startDate */
    public $startDate;
    /** @var string $endDate */
    public $endDate;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'log_visits';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['datetime', 'startDate', 'endDate'], 'required'],
            [['status'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'datetime' => 'Дата создания записи',
            'status' => 'Флаг посещения сайта',
        ];
    }

    /**
     * @return int Количество максимальных пользователей за определённый промежуток времени
     */
    public function getMaxVisitors(): int
    {
        return (int)(new Query())
            ->select('status')
            ->from(static::tableName())
            ->where(['between', 'datetime', $this->startDate, $this->endDate])
            ->andWhere(['status' => static::WAS_VISITED])
            ->count();
    }
}
