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
            $last_feed_date = $last_modified =  new \DateTime($feed->last_modified);

            /** @var \Zend\Feed\Reader\Reader $reader */
            $reader = Yii::$app->feed->reader();
            $res = $reader->import($feed->url, null, $last_modified);

            foreach ($res as $item) {
                $diff = $item->getDateModified()->diff($last_modified);
                if ($diff->format('%R') == '-') {
                    echo $item->getTitle() . PHP_EOL;

                    $diff = $item->getDateModified()->diff($last_feed_date);
                    if ($diff->format('%R') == '-') {
                        $last_feed_date = $item->getDateModified();
                    }
                }
            }
            $feed->last_modified = $last_feed_date->format('Y-m-d H:i:s');
            $feed->save();
        }
    }
}
