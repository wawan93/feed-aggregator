<?php

namespace app\commands;

class TelegramController
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

        return file_get_contents($link);
    }
}