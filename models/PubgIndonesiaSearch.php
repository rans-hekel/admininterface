<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PubgIndonesia;

/**
 * PubgIndonesiaSearch represents the model behind the search form of `app\models\PubgIndonesia`.
 */
class PubgIndonesiaSearch extends PubgIndonesia
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_account', 'transaction_invoice'], 'integer'],
            [['nickname_account', 'purchase', 'method_payment'], 'safe'],
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
        $query = PubgIndonesia::find();

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
            'id' => $this->id,
            'id_account' => $this->id_account,
            'transaction_invoice' => $this->transaction_invoice,
        ]);

        $query->andFilterWhere(['like', 'nickname_account', $this->nickname_account])
            ->andFilterWhere(['like', 'purchase', $this->purchase])
            ->andFilterWhere(['like', 'method_payment', $this->method_payment]);

        return $dataProvider;
    }
}
