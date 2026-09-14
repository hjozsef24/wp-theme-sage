<?php

namespace App\View\Composers\Blocks;

use Roots\Acorn\View\Composer;

class BlogList extends Composer
{
    protected static $views = [
        'blocks.blog-list',
    ];

    public function with()
    {
        return [
            'title' => $this->title(),
            'description' => $this->description(),
            'posts_per_page' => $this->postsPerPage(),
            'posts' => $this->posts(),
            'spacing' => $this->spacing(),
            'section_style' => $this->sectionStyle()
        ];
    }

    private function title(): string
    {
        $title = get_field('blog_title');
        return $title ? $title : '';
    }

    private function description(): string
    {
        $description = get_field('blog_description');
        return $description ? $description : '';
    }

    private function postsPerPage(): int
    {
        return get_field('blog_posts_per_page') ?: 6;
    }

    private function posts(): array
    {
        $selected_ids = get_field('blog_posts');

        $args = [
            'post_type'      => 'post',
            'post_status'    => 'publish',
        ];

        if ($selected_ids) {
            $args['post__in'] = $selected_ids;
            $args['orderby']  = 'post__in';
        } else {
            $args['orderby'] = 'date';
            $args['order']   = 'DESC';
        }

        $query = new \WP_Query($args);
        $items = [];

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $id = get_the_ID();

                $categories = get_the_category($id);
                $formatted_categories = [];

                if ($categories) {
                    foreach ($categories as $cat) {
                        $formatted_categories[] = [
                            'name'  => $cat->name,
                            'slug'  => $cat->slug,
                            'color' => get_field('color', 'category_' . $cat->term_id) ?: '#3545D2',
                        ];
                    }
                }

                $author_data = get_field('author', $id);

                $items[] = [
                    'id'         => $id,
                    'title'      => get_the_title(),
                    'image'      => get_post_thumbnail_id($id) ? [
                        'url' => get_the_post_thumbnail_url($id, 'large'),
                        'alt' => get_post_meta(get_post_thumbnail_id($id), '_wp_attachment_image_alt', true) ?: get_the_title(),
                    ] : null,
                    'categories' => $formatted_categories,
                    'author'     => [
                        'name'  => $author_data['name'] ?? '',
                        'image' => $author_data['image'] ?? null,
                    ],
                    'url'        => get_permalink($id),
                    'date'       => get_the_date('Y.m.d'),
                ];
            }
            wp_reset_postdata();
        }

        return $items;
    }

    private function spacing(): string
    {
        $spacing = get_field('spacing');

        $padding_val = $spacing['spacing']['inner'] ?? null;
        $margin_val = $spacing['spacing']['outer'] ?? null;

        $p = $padding_val ? ((int)$padding_val / 4) : 6;
        $m = $margin_val ? ((int)$margin_val / 4) : 6;

        return "py-{$p} mb-{$m}";
    }

    private function sectionStyle(): string
    {
        $background_color = get_field('background_color');
        $text_color = get_field('text_color'); 

        $styles = [];

        if (!empty($background_color)) {
            $styles[] = "background-color: " . $background_color . " !important;";
        }

        if (!empty($text_color)) {
            $styles[] = "color: " . $text_color . " !important;";
        }

        return !empty($styles) ? implode(' ', $styles) : "";
    }
}
