<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Garmoniya
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <link href="./assets/katyaphotos/favicon.ico" rel="icon" />
	<link crossorigin='anonymous' href='https://use.fontawesome.com/releases/v5.8.2/css/all.css' integrity='sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay' rel='stylesheet' />
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700|Roboto:500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bad+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<?php wp_head(); ?>
</head>
 
<body oncopy="return false" class="t-body">
<?php wp_body_open(); ?>

	<div class="preloader" id="preloader">
        <div id="load">
            <div>G</div>
            <div>N</div>
            <div>I</div>
            <div>D</div>
            <div>A</div>
            <div>O</div>
            <div>L</div>
        </div>
    </div>
    <div class="meny-0">
        <div class="meny-1">
            <div class="meny-2">
                <div class="meny-3">
                    <a href="<?php bloginfo('url') ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/katyaphotos/Garmoniya.png" class="imglogo" imgfield="img" alt="Company">
                    </a>
                </div>
                <div class="meny-text">
                    <p>
                    	Асоціація психологів,<br />педагогів та медиків "Гармонія"
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="menu-mobile">
        <a class="menu-link" href="#menu">
            <span></span>
        </a>
        <?php
			wp_nav_menu( 
				array(
					'menu' => 'menu-3', /* Тут міняти назву меню*/
					'theme_location' => 'phone-menu', /*тут треба міняти на яке меню хочеш, футер чи мобільне*/
					'menu_id'        => 'primary-menu-1',
					'container_class' => 'menu',
					'items_wrap'      => '<ul>%3$s</ul>',
					//'link_before'	=> '<i class="fas fa-home"></i>', /*фото перед силкою виводить*/
				)
			);
			?>
    </div>
    <div class="menu-comp">
        <div class="inst-fais">
            <a href="https://www.facebook.com/katya.kokh.psychologist/" target="_blank">
                <svg class="t-sociallinks__svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 48 48" enable-background="new 0 0 48 48" xml:space="preserve">
                <desc>Facebook</desc>
                <path d="M47.761,24c0,13.121-10.638,23.76-23.758,23.76C10.877,47.76,0.239,37.121,0.239,24c0-13.124,10.638-23.76,23.764-23.76C37.123,0.24,47.761,10.876,47.761,24 M20.033,38.85H26.2V24.01h4.163l0.539-5.242H26.2v-3.083c0-1.156,0.769-1.427,1.308-1.427h3.318V9.168L26.258,9.15c-5.072,0-6.225,3.796-6.225,6.224v3.394H17.1v5.242h2.933V38.85z" />
				 </svg>
            </a>
        </div>
        <div class="inst-fais2">
            <a href="https://www.instagram.com/katya.kokh.psychologist/" target="_blank">
                <svg class="t-sociallinks__svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30px" height="30px" viewBox="0 0 30 30" xml:space="preserve">
                <desc>Instagram</desc>
                <path d="M15,11.014 C12.801,11.014 11.015,12.797 11.015,15 C11.015,17.202 12.802,18.987 15,18.987 C17.199,18.987 18.987,17.202 18.987,15 C18.987,12.797 17.199,11.014 15,11.014 L15,11.014 Z M15,17.606 C13.556,17.606 12.393,16.439 12.393,15 C12.393,13.561 13.556,12.394 15,12.394 C16.429,12.394 17.607,13.561 17.607,15 C17.607,16.439 16.444,17.606 15,17.606 L15,17.606 Z"></path>
                <path d="M19.385,9.556 C18.872,9.556 18.465,9.964 18.465,10.477 C18.465,10.989 18.872,11.396 19.385,11.396 C19.898,11.396 20.306,10.989 20.306,10.477 C20.306,9.964 19.897,9.556 19.385,9.556 L19.385,9.556 Z"></path>
                <path d="M15.002,0.15 C6.798,0.15 0.149,6.797 0.149,15 C0.149,23.201 6.798,29.85 15.002,29.85 C23.201,29.85 29.852,23.202 29.852,15 C29.852,6.797 23.201,0.15 15.002,0.15 L15.002,0.15 Z M22.666,18.265 C22.666,20.688 20.687,22.666 18.25,22.666 L11.75,22.666 C9.312,22.666 7.333,20.687 7.333,18.28 L7.333,11.734 C7.333,9.312 9.311,7.334 11.75,7.334 L18.25,7.334 C20.688,7.334 22.666,9.312 22.666,11.734 L22.666,18.265 L22.666,18.265 Z"></path>
            </svg>
            </a>
        </div>
			<?php
			wp_nav_menu( 
				array(
					'menu' => 'menu-1', /* Тут міняти назву меню*/
					'theme_location' => 'header-menu', /*тут треба міняти на яке меню хочеш, футер чи мобільне*/
					'menu_id'        => 'primary-menu',
					'container_class' => 'dws-menu',
					'menu_class'	 => 'dws-ul',
					//'link_before'	=> '<i class="fas fa-home"></i>', /*фото перед силкою виводить*/
				)
			);
			?>
        
    </div>

