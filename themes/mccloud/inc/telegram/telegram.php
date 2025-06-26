<?php

class Telegram
{
	protected $API;
	protected $url = 'https://api.telegram.org/bot';
	protected $chatId;
	
	public function __construct()
	{
		$this->API = defined('TELEGRAM_BOT_TOKEN') ? TELEGRAM_BOT_TOKEN : '';
		$this->chatId = defined('TELEGRAM_CHAT_ID') ? TELEGRAM_CHAT_ID : '';
	}
	
	public function send($text)
	{
		$text = "Заявка з сайту:\n" . $text;
		
		$response = wp_remote_post($this->url . $this->API . '/sendMessage', [
			'body' => [
				'chat_id' => $this->chatId,
				'text' => $text,
			],
		]);
		
		if (is_wp_error($response)) {
			error_log('Telegram send error: ' . $response->get_error_message());
		}
	}
}
