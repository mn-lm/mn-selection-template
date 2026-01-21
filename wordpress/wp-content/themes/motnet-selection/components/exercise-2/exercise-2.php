<?php


function exercise_2_shortcode($atts, $content = null) {
    $atts = shortcode_atts([
        'class' => '',
    ], $atts);

    if (strpos($content, '[exercise-2-wrapper]') === false) {
        $content = '[exercise-2-wrapper]' . $content . '[/exercise-2-wrapper]';
    }

    return '<section class="exercise-2 ' . esc_attr($atts['class']) . '">' .
        do_shortcode($content) .
    '</section>';
}
add_shortcode('exercise-2', 'exercise_2_shortcode');




function exercise_2_wrapper_shortcode($atts, $content = null) {
    return '<div class="exercise-2__wrapper">' . do_shortcode($content) . '</div>';
}
add_shortcode('exercise-2-wrapper', 'exercise_2_wrapper_shortcode');




function exercise_2_item_shortcode($atts, $content = null) {
    $atts = shortcode_atts([
        'url'          => '',
        'title'        => '',
        'title-tag'    => 'h2',
        'subtitle'     => '',
        'subtitle-tag' => 'h3',
        'class'        => '',
    ], $atts);

    if (!$atts['url']) {
        return '';
    }

    $url = esc_url($atts['url']);

    ob_start(); ?>
    <div class="exercise-2__item <?= esc_attr($atts['class']) ?>">

        <?php if ($atts['subtitle']): ?>
            <<?= esc_html($atts['subtitle-tag']) ?> class="exercise-2__subtitle">
                <?= esc_html($atts['subtitle']) ?>
            </<?= esc_html($atts['subtitle-tag']) ?>>
        <?php endif; ?>

        <?php if ($atts['title']): ?>
            <<?= esc_html($atts['title-tag']) ?> class="exercise-2__title">
                <?= esc_html($atts['title']) ?>
            </<?= esc_html($atts['title-tag']) ?>>
        <?php endif; ?>

        <div class="exercise-2__video">
            <iframe
                src="<?= $url ?>"
                frameborder="0"
                allow="autoplay; fullscreen; picture-in-picture"
                allowfullscreen>
            </iframe>
        </div>

    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('exercise-2-item', 'exercise_2_item_shortcode');
