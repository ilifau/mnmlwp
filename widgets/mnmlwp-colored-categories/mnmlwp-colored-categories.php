<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class mnmlWP_Widget_Colored_Categories extends WP_Widget
{
    public $widget_folder;

    public function __construct()
    {
        $widget_options = array(
            'classname' => 'mnmlwp_colored_categories',
            'description' => 'A list of categories styled with the selected category color.',
        );

        parent::__construct(
            'mnmlwp_colored_categories',
            esc_html__('mnmlWP Colored Categories', 'mnmlwp'),
            $widget_options
        );

        $this->widget_folder = get_template_directory_uri() . '/widgets/mnmlwp-colored-categories/';

        $this->enqueue_scripts_and_styles();
    }

    private function enqueue_scripts_and_styles()
    {
        wp_enqueue_style( 'mnmlwp-colored-categories',  $this->widget_folder . 'mnmlwp-colored-categories-style.css' );
    }

    public function widget( $args, $instance )
    {
        $instance_title = isset( $instance['title'] ) ? $instance['title'] : '';
        $instance_num_cats = isset( $instance['num_cats'] ) ? $instance['num_cats'] : 5;
        $instance_hide_empty = isset( $instance['hide_empty'] ) ? $instance['hide_empty'] : false;
        $instance_colorize = isset( $instance['colorize'] ) ? $instance['colorize'] : false;
        
        $title = apply_filters( 'widget_title', $instance_title, $instance, $this->id_base );
        $num_cats = (int)$instance_num_cats;
        
        if( $num_cats === -1 )
            $num_cats = 99999999;
            
        $hide_empty = filter_var( $instance_hide_empty, FILTER_VALIDATE_BOOLEAN );
        $colorize = filter_var( $instance_colorize, FILTER_VALIDATE_BOOLEAN );

        echo $args['before_widget'];

        if( ! empty( $title ) ) {
            echo $args['before_title'];
            echo $title;
            echo $args['after_title'];
        }

        $categories = get_terms( 'category', array(
            'orderby' => 'count',
            'hide_empty' => absint( $hide_empty ),
            'number' => $num_cats,
        ) );

        if( empty( $categories ) ) {
            echo '&hellip;';
            echo $args['after_widget'];
            return;
        }

        foreach( $categories as $cat )
        {
            $term_id = $cat->term_id;
            $cat_meta = get_option( "category_$term_id" );
            $cat_count = $cat->count;
            $color = isset( $cat_meta['color'] ) ? $cat_meta['color'] : '#0073aa';
            $text_color = $colorize ? $cat_meta['color'] : 'inherit';
            $style = 'background:' .$color;

            echo '<a class="mnmlwp-colored-category-link" href="' . get_category_link( $cat->term_id ) . '">';
                echo '<span class="mnmlwp-colored-category-link-title" style="color:' . $text_color . '">' . esc_attr( $cat->name ) . '</span>';
                echo '<span class="mnmlwp-colored-category-link-color" style="' . $style  . '">' . $cat_count . '</span>';
            echo '</a>';
        }

        echo $args['after_widget'];
    }

    /**
    * Back-end widget form.
    *
    * @see WP_Widget::form()
    *
    * @param array $instance Previously saved values from database.
    */
    public function form( $instance )
    {
        $title = ! empty(  $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) : '';
        $num_cats = ! empty( $instance['num_cats'] ) ? (int)$instance['num_cats'] : 5;
        $hide_empty = ! empty( $instance['hide_empty'] ) ? (int)$instance['hide_empty'] : 0;
        $colorize = ! empty( $instance['colorize'] ) ? (int)$instance['colorize'] : 0;

        ?>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'mnmlwp' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'num_cats' ) ); ?>"><?php esc_html_e( 'Number of categories:', 'mnmlwp' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'num_cats' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'num_cats' ) ); ?>" type="text" value="<?php echo esc_attr( (int)$num_cats ); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'hide_empty' ) ); ?>"><?php esc_html_e( 'Hide empty categories:', 'mnmlwp' ); ?></label>
            <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'hide_empty' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'hide_empty' ) ); ?>" value="1" <?php echo $hide_empty === 1 ? 'checked' : ''; ?>>
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'colorize' ) ); ?>"><?php esc_html_e( 'Colorize link text:', 'mnmlwp' ); ?></label>
            <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'colorize' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'colorize' ) ); ?>" value="1" <?php echo $colorize === 1 ? 'checked' : ''; ?>>
        </p>

        <?php
    }

    /**
    * Sanitize widget form values as they are saved.
    *
    * @see WP_Widget::update()
    *
    * @param array $new_instance Values just sent to be saved.
    * @param array $old_instance Previously saved values from database.
    *
    * @return array Updated safe values to be saved.
    */
    public function update( $new_instance, $old_instance )
    {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
        $instance['num_cats'] = ( ! empty( $new_instance['num_cats'] ) ) ? (int)$new_instance['num_cats'] : 5;
        
        if( $instance['num_cats'] < -1 )
            $instance['num_cats'] = -1;
            
        if( $instance['num_cats'] > 99999999 )
            $instance['num_cats'] = 99999999;
        
        $instance['hide_empty'] = ( ! empty( $new_instance['hide_empty'] ) ) ? absint( $new_instance['hide_empty'] ) : '';
        $instance['colorize'] = ( ! empty( $new_instance['colorize'] ) ) ? absint( $new_instance['colorize'] ) : '';

        return $instance;
    }
}

add_action( 'widgets_init', function() {
    return register_widget('mnmlWP_Widget_Colored_Categories');
});
