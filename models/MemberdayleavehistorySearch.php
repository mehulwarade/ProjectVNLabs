<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Memberdayleavehistory;

/**
 * MemberdayleavehistorySearch represents the model behind the search form of `app\models\Memberdayleavehistory`.
 */
class MemberdayleavehistorySearch extends Memberdayleavehistory
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['member_day_leave_history_id', 'history_kbn', 'time_count', 'status'], 'integer'],
            [['account', 'date_from', 'date_to', 'time_point', 'reason', 'insert_date', 'update_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Memberdayleavehistory::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'member_day_leave_history_id' => $this->member_day_leave_history_id,
            'history_kbn' => $this->history_kbn,
            'date_from' => $this->date_from,
            'date_to' => $this->date_to,
            'time_point' => $this->time_point,
            'time_count' => $this->time_count,
            'status' => $this->status,
            'insert_date' => $this->insert_date,
            'update_date' => $this->update_date,
        ]);

        $query->andFilterWhere(['like', 'account', $this->account])
            ->andFilterWhere(['like', 'reason', $this->reason]);

        return $dataProvider;
    }
}
