<?php

namespace app\modules\cafedra\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\cafedra\models\Cafedra;

/**
 * CafedraSearch represents the model behind the search form about `app\modules\cafedra\models\Cafedra`.
 */
class CafedraSearch extends Cafedra
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'faculty_id', 'image_id', 'active', 'visited'], 'integer'],
            [['title', 'title_en', 'description'], 'safe'],
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
        $query = Cafedra::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'faculty_id' => $this->faculty_id,
            'image_id' => $this->image_id,
            'active' => $this->active,
            'visited' => $this->visited,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'title_en', $this->title_en])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
