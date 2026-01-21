<?php
/*

[exercise-1
title=Title
link-text=Lorem ipsum
bgimage=25]
<p>Lorem ipsum</p>
[/exercise-1]
*/

function exercise_1_shortcode_function($atts, $content = null)
{
    $atts = shortcode_atts([
        'bgimage'   => '',
        'class'     => '',
        'link'      => '',
        'link-text' => '',
        'target'    => '_self',
        'title'     => '',
        'title-tag' => 'h2',
    ], $atts);

    $bgimage   = $atts['bgimage'];
    $class     = $atts['class'];
    $link      = $atts['link'];
    $link_text = $atts['link-text'];
    $target    = $atts['target'];
    $title     = $atts['title'];
    $title_tag = $atts['title-tag'];

    if ($title === '') {
        return '';
    }

    ob_start(); ?>

    <section class="exercise-1 <?= esc_attr($class) ?>">

        <!-- Background image -->
        <?php if ($bgimage): ?>
            <div class="exercise-1__background-image">
                <?= wp_get_attachment_image($bgimage, 'full', false) ?>
            </div>
        <?php endif; ?>

        <!-- Wrapper -->
        <div class="exercise-1__container container">
            <div class="exercise-1__wrapper">

                <!-- Title -->
                <<?= esc_html($title_tag) ?> class="exercise-1__title hdg hdg--60">
                    <?= esc_html($title) ?>
                </<?= esc_html($title_tag) ?>>

                <!-- Text -->
                <?php if (trim($content) !== ''): ?>
                    <div class="exercise-1__text hdg hdg--30">
                        <?= do_shortcode($content) ?>
                    </div>
                <?php endif; ?>

                <!-- Button -->
                <?php if ($link && $link_text): ?>
                    <a
                        class="exercise-1__button"
                        href="<?= esc_url($link) ?>"
                        target="<?= esc_attr($target) ?>"
                        <?= $target === '_blank' ? 'rel="noopener noreferrer"' : '' ?>
                    >
                        <?= esc_html($link_text) ?>
                    </a>
                <?php endif; ?>

            </div>
        </div>

    </section>

    <?php
    return ob_get_clean();
}
add_shortcode('exercise-1', 'exercise_1_shortcode_function');
