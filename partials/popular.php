<!-- Start Popular Product -->
<div class="popular-product">
    <div class="container">
        <div class="row">
            <?php
            $args = array(
                'post_type' => 'product', // Make sure this is the correct post type slug
                'posts_per_page' => 3, // Adjust the number of posts as needed
                'order' => 'DESC', // 'ASC' or 'DESC'
                'orderby' => 'date', // Sort by title - change as needed
            );
            $product_query = new WP_Query($args);

            if ($product_query->have_posts()) :

                while ($product_query->have_posts()) : $product_query->the_post();
                    $product_image = get_field('product')['product_media']; // Assuming 'product_image' is your ACF field for the image
                    $product_title = get_field('product')['product_title']; // ACF field for the title
                    $product_description = get_field('product')['product_desc']; // ACF field for the description
                    $product_price = get_field('product')['product_price']; // ACF field for the price
            ?>
                    <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                        <div class="product-item-sm d-flex">
                            <div class="thumbnail">
                                <img src="<?php echo $product_image; ?>" alt="Image" class="img-fluid">
                            </div>
                            <div class="pt-3">
                                <h3><?php echo $product_title; ?></h3>
                                <p><?php echo $product_price; ?></p>
                                <p><a href="#">Read More</a></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <p>No products found</p>
            <?php endif; ?>

        </div>
    </div>
</div>
<!-- End Popular Product -->