<?php
namespace futureactivities\navapi\models;

use futureactivities\rest\models\Element;

class Nav extends Element
{
    public $newWindow;
    public $classes;
    public $navId;
    
    public function fields()
    {
        return [
            'id',
            'title',
            'url',
            'newWindow',
            'classes',
            'enabled',
            'navId',
            'descendants'
        ];
    }
    
    protected function processModel()
    {
        if (!$this->model)
            return;
            
        parent::processModel();
        
        $this->url = $this->model->getUrl();
        $this->newWindow = $this->model->newWindow == 1;
        $this->classes = $this->model->classes;
        $this->navId = (int)$this->model->navId;
    }
    
    protected function getElementClass($element)
    {
        if ($element instanceof \verbb\navigation\elements\Node)
            return 'futureactivities\navapi\models\Nav';
        
        return parent::getElementClass($element);
    }
}