<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user This property is read-only.
 *
 */
class ParsingUrls extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'to_parse';
    }

    // public function fields()
    // {
    //     return [
    //         'id',
    //         // field name is the same as the attribute name
    //         'asin',

    //         // field name is "email", the corresponding attribute name is "email_address"
    //         'field_name' => 'field_name',

    //         // field name is "name", its value is defined by a PHP callback
    //         'field_value' => 'field_value'
    //     ];
    // }
}
