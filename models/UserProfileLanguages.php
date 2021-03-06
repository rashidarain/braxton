<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_profile_languages".
 *
 * @property int $id
 * @property string $title
 */
class UserProfileLanguages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_profile_languages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
        ];
    }
}
