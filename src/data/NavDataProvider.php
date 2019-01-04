<?php 
namespace futureactivities\navapi\data;

use yii\base\InvalidConfigException;
use yii\db\QueryInterface;

use futureactivities\navapi\models\Nav;

class NavDataProvider extends \yii\data\ActiveDataProvider
{
    /**
     * {@inheritdoc}
     */
    protected function prepareModels()
    {
        $models = parent::prepareModels();
        
        $result = [];
        foreach ($models AS $model) {
            $result[] = new Nav([
                'model' => $model
            ]);
        }
        
        return $result;
    }
}