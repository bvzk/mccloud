<?php
/**
 * Template Name: Contacts
 * Template Post Type: post, page
 */

 get_header();
?>
<?php
                    $current_url = $_SERVER['REQUEST_URI']; 
                if (strpos($current_url, '/ro') !== false): ?>
            
                <?php else: ?>
                    <div class="md:container md:mx-auto md:mt-[40px] mt-[-24px] md:mt-0 py-4 px-3 radius-5">

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2540.3616122975504!2d30.51973367677472!3d50.452990587180636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4ce5008ef3d2d%3A0xc8bd36b289af4f24!2z0LLRg9C70LjRhtGPINCc0LjRhdCw0LnQu9GW0LLRgdGM0LrQsCwgMTQsINCa0LjRl9CyLCAwMjAwMA!5e0!3m2!1suk!2sua!4v1718520816900!5m2!1suk!2sua"
            width="100%" height="302" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade" class="w-full hidden md:block rounded-[30px]"></iframe>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2540.3616122975504!2d30.51973367677472!3d50.452990587180636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4ce5008ef3d2d%3A0xc8bd36b289af4f24!2z0LLRg9C70LjRhtGPINCc0LjRhdCw0LnQu9GW0LLRgdGM0LrQsCwgMTQsINCa0LjRl9CyLCAwMjAwMA!5e0!3m2!1suk!2sua!4v1718520816900!5m2!1suk!2sua"
            width="100%" height="427" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade" class="w-full md:hidden radius-5"></iframe>
</div>
                <?php endif; ?>



<?php get_footer() ?>