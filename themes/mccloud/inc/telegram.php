<?php

/**
 * Send Contact Form 7 submission data to Telegram.
 *
 * Triggered on the `wpcf7_submit` action. If the 'your-number' field is present in the POST data,
 * it sends a message to Telegram.
 *
 * @param WPCF7_ContactForm $contact_form The submitted contact form object.
 * @return void
 */
function mccloud_send_telegram_on_submit($contact_form): void
{
	if (empty($_POST['your-number'])) {
		return;
	}
	
	$number = sanitize_text_field($_POST['your-number']);
	
	// You can build a more detailed message here if needed.
	$message = "Новий запит із номером: {$number}";
	
	$telegram = new Telegram();
	$telegram->send($message);
}

add_action('wpcf7_submit', 'mccloud_send_telegram_on_submit');
