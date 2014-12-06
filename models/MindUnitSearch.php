<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MindUnit;

/**
 * MindUnitSearch represents the model behind the search form about `app\models\MindUnit`.
 */
class MindUnitSearch extends MindUnit
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mindunitid'], 'integer'],
            [['name', 'description', 'datein', 'userin', 'dateup', 'userup'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = MindUnit::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'mindunitid' => $this->mindunitid,
            'datein' => $this->datein,
            'dateup' => $this->dateup,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'userin', $this->userin])
            ->andFilterWhere(['like', 'userup', $this->userup]);

        return $dataProvider;
    }
}
