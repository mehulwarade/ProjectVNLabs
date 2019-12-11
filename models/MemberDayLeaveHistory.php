<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member_day_leave_history".
 *
 * @property int $member_day_leave_history_id
 * @property string $account
 * @property int $history_kbn
 * @property string|null $date_from
 * @property string|null $date_to
 * @property string|null $time_point
 * @property int|null $time_count
 * @property string|null $reason
 * @property int|null $status
 * @property string|null $insert_date
 * @property string|null $update_date
 */
class Memberdayleavehistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'member_day_leave_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['account', 'history_kbn'], 'required'],
            [['history_kbn', 'time_count', 'status'], 'integer'],
            [['date_from', 'date_to', 'time_point', 'insert_date', 'update_date'], 'safe'],
            [['account'], 'string', 'max' => 10],
            [['reason'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'member_day_leave_history_id' => 'Member Day Leave History ID',
            'account' => 'Account',
            'history_kbn' => 'History Kbn',
            'date_from' => 'Date From',
            'date_to' => 'Date To',
            'time_point' => 'Time Point',
            'time_count' => 'Time Count',
            'reason' => 'Reason',
            'status' => 'Status',
            'insert_date' => 'Insert Date',
            'update_date' => 'Update Date',
        ];
    }
}
