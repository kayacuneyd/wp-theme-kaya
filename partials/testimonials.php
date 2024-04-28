<!-- Start Testimonial Slider -->
<div class="testimonial-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto text-center">
                <h2 class="section-title">Testimonials</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="testimonial-slider-wrap text-center">
                    <div id="testimonial-nav">
                        <span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
                        <span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
                    </div>
                    <div class="testimonial-slider">
                        <?php
                        $args = array(
                            'post_type'      => 'testimonial', // Make sure this is the correct post type slug
                            'posts_per_page' => 3,              // Adjust the number of posts as needed
                            'order'          => 'DESC',          // 'ASC' or 'DESC'
                            'orderby'        => 'date',          // Sort by title - change as needed
                        );

                        $testi_query = new WP_Query($args);

                        // Check if there are posts in the query
                        if ($testi_query->have_posts()) :
                            while ($testi_query->have_posts()) : $testi_query->the_post();
                                $testimonial = get_field('testimonial');
                                // Check if $testimonial is not null and has the expected structure
                                if ($testimonial && is_array($testimonial) && isset($testimonial['comment']) && isset($testimonial['attestant']) && isset($testimonial['attestant_name']) && isset($testimonial['attestant_title'])) :
                        ?>
                                    <div class="item">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-8 mx-auto">
                                                <div class="testimonial-block text-center">
                                                    <blockquote class="mb-5">
                                                        <p>&ldquo;<?php echo esc_html($testimonial['comment']); ?>&rdquo;</p>
                                                    </blockquote>
                                                    <div class="author-info">
                                                        <div class="author-pic">
                                                            <img src="<?php echo esc_url($testimonial['attestant']); ?>" alt="<?php echo esc_attr($testimonial['attestant_name']); ?>" class="img-fluid">
                                                        </div>
                                                        <h3 class="font-weight-bold"><?php echo esc_html($testimonial['attestant_name']); ?></h3>
                                                        <span class="position d-block mb-3"><?php echo esc_html($testimonial['attestant_title']); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                endif;
                            endwhile;
                            wp_reset_postdata();
                        else :
                            ?>
                            <p>No testimonials found</p>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- End Testimonial Slider -->