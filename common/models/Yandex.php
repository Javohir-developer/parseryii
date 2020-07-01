<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "yandex".
 *
 * @property string $id
 * @property string $title
 * @property string $body
 * @property string $address
 */
class Yandex extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'yandex';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'title', 'body', 'address'], 'required'],
            [['id', 'title', 'body', 'address'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'body' => 'Body',
            'address' => 'Address',
        ];
    }

    public function request($string, $string1)
    {
    }
}
