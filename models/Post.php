<?php

namespace app\models;
use yii\behaviors\BlameableBehavior;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $name
 * @property string $text
 * @property string $auhtor
 */
class Post extends \yii\db\ActiveRecord
{

	
public function behaviors()
{
    return [
        [
            'class' => BlameableBehavior::className(),
            'createdByAttribute' => 'author_id',
            'updatedByAttribute' => 'updater_id',
        ],
    ]
}
	
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name', 'text', 'auhtor'], 'required'],
            [['id'], 'integer'],
            [['name', 'text', 'auhtor'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'text' => 'Text',
            'auhtor' => 'Auhtor',
        ];
    }
}
