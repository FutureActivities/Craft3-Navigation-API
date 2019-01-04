<?php
namespace futureactivities\navapi;

use yii\base\Event;
use craft\web\UrlManager;
use craft\events\RegisterUrlRulesEvent;

class Plugin extends \craft\base\Plugin
{
    public function init()
    {
        parent::init();
        
        // Register our site routes
        Event::on(
            UrlManager::class,
            UrlManager::EVENT_REGISTER_SITE_URL_RULES,
            function (RegisterUrlRulesEvent $event) {
                $event->rules['rest/v1/nav'] = 'navapi/v1/nav';
            }
        );
    }
}