<?php 
/**
 * Template Name: Мой шаблон страницы
 * Template Post Type:  page
 */
get_header(); ?>



<header class="reviews-0" style="padding-top:100px;">



<?php if (have_posts()) {
            while (have_posts()) {
                the_post(); ?>
                   <div class="reviews-1">
            <div class="reviews-2">
                <div class="reviews-3">
                	               
                   
                </div>
                <div class="reviews-4">
                    <div class="reviews-5">
                    
                    </div>
                </div>
            </div>
            dsgdfgdfgsdfgdsfgdsfg
        </div>
        <hr class="hr-reviews" /> 

           <?php } //end while            
        } //end if ?>

</header>

<?php get_footer(); ?> 