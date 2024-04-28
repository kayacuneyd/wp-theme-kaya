<?php
$help = get_field("help_section");
?>

<!-- Start We Help Section -->
<div class="we-help-section">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-7 mb-5 mb-lg-0">
                <div class="imgs-grid">
                    <div class="grid grid-1"><img src="<?php echo esc_attr($help['section_first_img']); ?>" alt="Untree.co"></div>
                    <div class="grid grid-2"><img src="<?php echo esc_attr($help['section_second_img']); ?>" alt="Untree.co"></div>
                    <div class="grid grid-3"><img src="<?php echo esc_attr($help['section_third_img']); ?>" alt="Untree.co"></div>
                </div>
            </div>
            <div class="col-lg-5 ps-lg-5">
                <h2 class="section-title mb-4"><?php echo esc_attr($help['section_title']); ?></h2>
                <?php echo $help['section_description']; ?>

                <p>
                    <?php if ($help) : ?>
                        <a herf="<?php echo esc_attr($help['section_button_link']['url']); ?>" class="btn">
                            <?php echo esc_attr($help['section_button_link']['title']); ?>
                        </a>
                    <?php endif; ?>
                </p>

            </div>
        </div>
    </div>
</div>
<!-- End We Help Section -->