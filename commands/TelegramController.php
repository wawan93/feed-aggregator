<?php

namespace app\commands;

class TelegramController extends \yii\base\Controller
{
    /**
     * @param $message
     * @return string
     */
    public function sendMessage($message)
    {
        $token = \Yii::$app->params['token'];
        $channel = \Yii::$app->params['channel'];

        $link = 'https://api.telegram.org/bot'.$token.'/sendMessage?';
        $link .= http_build_query([
            'chat_id' => $channel,
            'text' => $message
        ]);

	do {
        	$result = json_decode(file_get_contents($link), true);
		if (!isset($result) || $result['ok'] != true) {
			sleep(60 * 2); $ok = false;
		} else {
			$ok = true;
		}
	} while ($ok != true);
    }
    
    public function actionIndex($message = 'test')
    {
        $this->sendMessage($message);
    }
}
