<?php

/**
 * Forbid submission of emails ending with *.edu.ua in CF7.
 *
 * @param WPCF7_Validation $result Validation result object.
 * @param WPCF7_FormTag    $tag    The form tag being validated.
 * @return WPCF7_Validation Modified validation result.
 */
function mccloud_block_edu_ua_emails(WPCF7_Validation $result, WPCF7_FormTag $tag): WPCF7_Validation
{
	if ($tag->name === 'your-email') {
		$email = isset($_POST['your-email']) ? trim($_POST['your-email']) : '';
		
		// Block any email that ends with .edu.ua (e.g., user@something.edu.ua)
		if (preg_match('/@[^@]*\.edu\.ua$/i', $email)) {
			$result->invalidate($tag, 'Email на домені .edu.ua не підтримується.');
		}
	}
	
	return $result;
}
add_filter('wpcf7_validate_email*', 'mccloud_block_edu_ua_emails', 20, 2);
