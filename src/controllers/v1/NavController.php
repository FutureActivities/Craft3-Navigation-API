<?php 
namespace futureactivities\navapi\controllers\v1;

use Craft;
use verbb\navigation\elements\Node;
use yii\rest\ActiveController;
use futureactivities\rest\Plugin as API;
use futureactivities\rest\errors\BadRequestException;
use futureactivities\rest\traits\ActionRemovable;
use futureactivities\navapi\data\NavDataProvider;

class NavController extends ActiveController
{
    use ActionRemovable;
    
    public $modelClass = 'verbb\navigation\records\Node';
    
    public function actionIndex()
    {
        $query = Node::find();
        
        if (API::getInstance()->settings->disabled == 1)
            $query->status(null);
    
        if ($filter = Craft::$app->request->getParam('filter')) {
            foreach ($filter AS $key => $value)
                $query->$key($value);
        }
        
        $query->orderBy('lft');
        
        return new NavDataProvider([
            'query' => $query
        ]);
    }
    
    public function actionView($id)
    {
        $query = Node::find()->navId($id);
        
        if (API::getInstance()->settings->disabled == 1)
            $query->status(null);
        
        if ($filter = Craft::$app->request->getParam('filter')) {
            foreach ($filter AS $key => $value)
                $query->$key($value);
        }
        
        $query->orderBy('lft');
        
        if ($query->count() == 0)
            throw new BadRequestException('Could not find entry');
            
        return new NavDataProvider([
            'query' => $query
        ]);
    }
}