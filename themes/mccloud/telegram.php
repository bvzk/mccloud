<?php
class Telegram{

    protected $API = '1149982559:AAFCcYiytd5UhDnjashQru2Jc-Z14lEMR2M';
    protected $url = 'https://api.telegram.org/bot';
    protected $chatId = '-1001380484700';

    public function send($html){

        $html = "Заявка с сайта \n" . $html;

        $url = $this->url . $this->API.'/sendMessage';

        $data = array(
            'chat_id'=>$this->chatId,
            'text'=> $html
        );
        $options = array(
            'http'=>
                array(
                    'method'=>'POST',
                    'header'=>"Content-Type:application/x-www-form-urlencoded\r\n",
                    'content'=>http_build_query($data),
                ),
        );

        $context = stream_context_create($options);
        $result = file_get_contents($url,false,$context);

    }
}