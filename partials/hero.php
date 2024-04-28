<?php
$hero = get_field("hero");
?>
<div class="hero" style="background-color: <?php echo $hero['background_color']; ?>;">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1><?php echo $hero['hero_title']; ?></h1>
                    <?php
                    if ($hero) { ?>
                        <p class="mb-4">
                            <?php echo $hero['hero_desc']; ?>
                        </p>
                    <?php } else {
                        echo '<p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.</p>';
                    }
                    ?>
                    <p><a href="<?php echo $hero['hero_button_link_left']; ?>" class="btn btn-secondary me-2">Shop Now</a>
                        <a href="<?php echo $hero['hero_button_link_right']; ?>" class="btn btn-white-outline">Explore</a>
                    </p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="hero-img-wrap">
                    <?php
                    if ($hero['hero_image_link']) { ?>
                        <p class="mb-4">
                            <img src="<?php echo $hero['hero_image_link']; ?>" class="img-fluid">
                        </p>
                    <?php } else {
                        echo '<img src="<?php echo get_template_directory_uri(); ?>/images/couch.png" class="img-fluid">';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>