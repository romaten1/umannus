<?php

namespace app\modules\prepod\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\prepod\models\Prepod;

/**
 * PrepodSearch represents the model behind the search form about `app\modules\prepod\models\Prepod`.
 */
class PrepodSearch extends Prepod
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cafedra_id', 'job_id', 'job_org_id', 'science_status_id', 'active', 'visited'], 'integer'],
            [['name', 'second_name', 'surname', 'name_en', 'description', 'image_id'], 'safe'],
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
        $query = Prepod::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'cafedra_id' => $this->cafedra_id,
            'job_id' => $this->job_id,
            'job_org_id' => $this->job_org_id,
            'science_status_id' => $this->science_status_id,
            'active' => $this->active,
            'visited' => $this->visited,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'second_name', $this->second_name])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'name_en', $this->name_en])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'image_id', $this->image_id]);

        return $dataProvider;
    }
}
