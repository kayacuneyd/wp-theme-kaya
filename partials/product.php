<!-- Start Product Section -->
<div class="product-section">
    <div class="container">
        <div class="row">
            <?php
            $product_entry = get_field("product_entry");
            ?>
            <!-- Start Column 1 -->
            <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                <h2 class="mb-4 section-title"><?php echo $product_entry['title']; ?></h2>
                <p class="mb-4">
                    <?php echo $product_entry['desc']; ?>
                </p>
                <p><a href="<?php echo $product_entry['page_link']; ?>" class="btn">Explore</a></p>
            </div>
            <!-- End Column 1 -->
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
                    <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                        <a class="product-item" href="cart.html">
                            <img src="<?php echo $product_image; ?>" class="img-fluid product-thumbnail">
                            <h3 class="product-title"><?php echo $product_title; ?></h3>
                            <strong class="product-price"><?php echo $product_price; ?>€</strong>
                            <span class="icon-cross">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/cross.svg" class="img-fluid">
                            </span>
                        </a>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <p>No products found</p>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- End Product Section -->