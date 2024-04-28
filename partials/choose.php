<?php
$choose_section = get_field("reason_section_title");
?>

<!-- Start Why Choose Us Section -->
<div class="why-choose-section">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-6">
                <h1><?php echo $choose_section['reason_section_title']; ?></h1>
                <?php
                if ($choose_section) { ?>
                    <p class="mb-4">
                        <?php echo $choose_section['reason_explanation']; ?>
                    </p>
                <?php } else {
                    echo '<p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.</p>';
                }
                ?>
                <div class="row my-5">
                    <?php
                    // Get the reasons from the "Reason" post type
                    $reasons_query = new WP_Query(array(
                        'post_type' => 'reason', // Use your custom post type slug
                        'posts_per_page' => -1, // Get all posts
                    ));

                    // Loop through the reasons
                    if ($reasons_query->have_posts()) :
                        while ($reasons_query->have_posts()) : $reasons_query->the_post();
                            // Get ACF fields
                            $reason = get_field('reason');
                            //$reason_icon = get_field('reason_icon');
                            //$reason_title = get_field('reason_title');
                            //$reason_explanation = get_field('reason_explanation');
                    ?>
                            <div class="col-6 col-md-6">
                                <div class="feature">
                                    <div class="icon">
                                        <img src="<?php echo esc_url($reason['reason_icon']); ?>" alt="<?php echo esc_attr($reason_icon['alt']); ?>" class="imf-fluid">
                                    </div>
                                    <h3><?php echo esc_html($reason['reason_title']); ?></h3>
                                    <p><?php echo esc_html($reason['reason_explanation']); ?></p>
                                </div>
                            </div>
                    <?php
                        endwhile;
                        wp_reset_postdata(); // Reset post data
                    endif;
                    ?>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="img-wrap">
                    <?php
                    if ($choose_section) { ?>
                        <img src="<?php echo $choose_section['reason_section_image']; ?>" alt="Image" class="img-fluid">
                    <?php } else {
                        echo '<?php echo get_template_directory_uri(); ?>/images/why-choose-us-img.jpg';
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End Why Choose Us Section -->