<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "feeds".
 *
 * @property integer $id
 * @property string $url
 * @property string $type
 * @property string $last_modified
 */
class Feed extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'feeds';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url', 'type'], 'required'],
            [['url', 'type'], 'string', 'max' => 255],
//            [['last_modified'], 'datetime']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'type' => 'Type',
            'last_modified' => 'Last Modified',
        ];
    }

    /**
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if (!$this->last_modified) {
                $this->last_modified = date('Y-m-d H:i:s', time() - 100000);
            }
            return true;
        }
        return false;
    }
}
