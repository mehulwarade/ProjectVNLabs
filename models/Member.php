<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member".
 *
 * @property string $account
 * @property string $password
 * @property string $name
 * @property string $email
 * @property int $role
 * @property int|null $status
 * @property string|null $insert_date
 * @property string|null $update_date
 */
class Member extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'member';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['account', 'password', 'name', 'email', 'role'], 'required'],
            [['role', 'status'], 'integer'],
            [['insert_date', 'update_date'], 'safe'],
            [['account'], 'string', 'max' => 10],
            [['password'], 'string', 'max' => 64],
            [['name', 'email'], 'string', 'max' => 45],
            [['account'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'account' => 'Account',
            'password' => 'Password',
            'name' => 'Name',
            'email' => 'Email',
            'role' => 'Role',
            'status' => 'Status',
            'insert_date' => 'Insert Date',
            'update_date' => 'Update Date',
        ];
    }
}
