<?php

namespace app\commands;

use yii\console\Controller;
use app\models\Feed;
use \Yii;

class FeedController extends Controller
{
    public function actionIndex()
    {
        $feeds = Feed::find()->all();

        foreach ($feeds as $feed) {
            $res = Yii::$app->feed->reader()->import($feed->url);
            foreach ($res as $item) {
                var_dump($item->getTitle());
            }
        }
    }
}
