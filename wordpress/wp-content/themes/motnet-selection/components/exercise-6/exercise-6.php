<?php
/*
===============================================================================
EXERCISE 6 — ALTERNATING MEDIA / TEXT LIST
===============================================================================

[exercise-6 title="Elit occaecat ipsum" text="Intro text here"]

  [exercise-6-item
    image-id="24"
    subtitle="Lorem ipsum"
    title="Lorem ipsum"
    link-text="Read more"
    link="#"]
    <p>Fugiat aliqua commodo consequat reprehenderit…</p>
  [/exercise-6-item]

  [exercise-6-item
    image-id="25"
    subtitle="Lorem ipsum"
    title="Lorem ipsum"
    link-text="Read more"
    link="#"]
    <p>Fugiat aliqua commodo consequat reprehenderit…</p>
  [/exercise-6-item]

[/exercise-6]
*/

/* ---------------------------------------------------------------------------
 * [exercise-6] — WRAPPER
 * --------------------------------------------------------------------------- */
function exercise_6_shortcode($atts, $content = null) {
    $atts = shortcode_atts([
        'class' => '',
        'title' => '',
        'text'  => '',
    ], $atts);

    if (trim($content) === '') return '';

    ob_start(); ?>
    <section class="exercise-6 <?= esc_attr($atts['class']) ?>">
        <div class="exercise-6__container container">

            <?php if ($atts['title'] || $atts['text']): ?>
                <header class="exercise-6__header">
                    <?php if ($atts['title']): ?>
                        <h2 class="exercise-6__title"><?= esc_html($atts['title']) ?></h2>
                    <?php endif; ?>
                    <?php if ($atts['text']): ?>
                        <div class="exercise-6__intro"><?= wpautop($atts['text']) ?></div>
                    <?php endif; ?>
                </header>
            <?php endif; ?>

            <div class="exercise-6__list">
                <?= do_shortcode($content) ?>
            </div>

        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode('exercise-6', 'exercise_6_shortcode');

/* ---------------------------------------------------------------------------
 * [exercise-6-item]
 * --------------------------------------------------------------------------- */
function exercise_6_item_shortcode($atts, $content = null) {
    $atts = shortcode_atts([
        'class'     => '',
        'image-id'  => '',
        'subtitle'  => '',
        'title'     => '',
        'link'      => '',
        'link-text' => '',
    ], $atts);

    if (!$atts['image-id'] || trim($content) === '') return '';

    $img = wp_get_attachment_url($atts['image-id']);
    if (!$img) return '';

    ob_start(); ?>
    <article class="exercise-6__item <?= esc_attr($atts['class']) ?>">
        <div class="exercise-6__item-media">
            <img src="<?= esc_url($img) ?>" alt="">
        </div>

        <div class="exercise-6__item-content">
            <?php if ($atts['subtitle']): ?>
                <p class="exercise-6__item-subtitle"><?= esc_html($atts['subtitle']) ?></p>
            <?php endif; ?>

            <?php if ($atts['title']): ?>
                <h3 class="exercise-6__item-title"><?= esc_html($atts['title']) ?></h3>
            <?php endif; ?>

            <div class="exercise-6__item-text">
                <?= wpautop($content) ?>
            </div>

            <?php if ($atts['link'] && $atts['link-text']): ?>
                <a href="<?= esc_url($atts['link']) ?>" class="exercise-6__item-link">
                    <?= esc_html($atts['link-text']) ?>
                </a>
            <?php endif; ?>
        </div>
    </article>
    <?php
    return ob_get_clean();
}
add_shortcode('exercise-6-item', 'exercise_6_item_shortcode');
