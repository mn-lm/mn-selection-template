<?php

function exercise_5_shortcode($atts) {
    $atts = shortcode_atts([
        'ids'   => '',
        'class' => '',
    ], $atts);

    $ids = array_filter(array_map('trim', explode(',', $atts['ids'])));
    if (empty($ids)) return '';

    ob_start(); ?>
    <div class="exercise-5 <?= esc_attr($atts['class']) ?>" data-exercise-5>

        <?php foreach ($ids as $i => $id): ?>
            <?php
            $url = wp_get_attachment_url($id);
            if (!$url) continue;
            ?>
            <div class="exercise-5__item" data-index="<?= (int) $i ?>">
                <img src="<?= esc_url($url) ?>" alt="">
            </div>
        <?php endforeach; ?>

        <div class="exercise-5__lightbox" hidden>
            <button class="exercise-5__close" type="button" aria-label="Close">×</button>
            <button class="exercise-5__nav prev" type="button" aria-label="Previous">‹</button>
            <img class="exercise-5__lightbox-image" src="" alt="">
            <button class="exercise-5__nav next" type="button" aria-label="Next">›</button>
        </div>

    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('exercise-5', 'exercise_5_shortcode');
