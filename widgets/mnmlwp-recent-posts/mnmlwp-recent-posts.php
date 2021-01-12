<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class mnmlWP_Widget_Recent_Posts extends WP_Widget
{
    public $widget_folder;

    public function __construct()
    {
        $widget_options = array(
            'classname' => 'mnmlwp_recent_posts',
            'description' => 'A list of of your recent posts.',
        );

        parent::__construct(
            'mnmlwp_recent_posts',
            esc_html__('mnmlWP Recent Posts', 'mnmlwp'),
            $widget_options
        );

        $this->widget_folder = get_template_directory_uri() . '/widgets/mnmlwp-recent-posts/';

        $this->enqueue_scripts_and_styles();
    }

    private function enqueue_scripts_and_styles()
    {
        wp_enqueue_style( 'mnmlwp-recent-posts',  $this->widget_folder . 'mnmlwp-recent-posts-style.css' );
    }

    public function widget( $args, $instance )
    {
        $instance_title = isset( $instance['title'] ) ? $instance['title'] : '';
        $instance_show_thumbs = isset( $instance['show_thumbs'] ) ? $instance['show_thumbs'] : false;
        $instance_title_length = isset( $instance['title_length'] ) ? $instance['title_length'] : 44;
        
        $title = apply_filters( 'widget_title', $instance_title, $instance, $this->id_base );
        $show_thumbs = filter_var( $instance_show_thumbs, FILTER_VALIDATE_BOOLEAN );
        $title_length = (int)$instance_title_length;

        if( $title_length === -1 || $title_length > 1024 )
            $title_length = 1024;

        $num_posts = (int)$instance['num_posts'];
        
        if( $num_posts > 9999999 )
            $num_posts = 9999999;

        echo $args['before_widget'];

        if( ! empty( $title ) ) {
            echo $args['before_title'];
            echo $title;
            echo $args['after_title'];
        }

        $sticky = get_option( 'sticky_posts' );

        $posts = get_posts( array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => $num_posts,
            'post__not_in' => $sticky,
            'orderby' => 'date',
            'order' => 'DESC',
        ) );

        $sticky_posts = get_posts( array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => $num_posts,
            'post__in' => $sticky,
            'orderby' => 'date',
            'order' => 'DESC',
        ) );

        $posts = array_merge( $sticky_posts, $posts );

        if( empty( $posts ) ) {
            echo esc_html__('No posts found', 'mnmlwp');
            echo $args['after_widget'];
            return;
        }

        foreach( $posts as $post )
        {
            $url = has_post_thumbnail( $post->ID ) ? get_the_post_thumbnail_url( $post->ID, 'thumbnail' ) : '';

            echo '<a class="mnmlwp-recent-posts-link" href="' . esc_url( get_permalink( $post->ID ) ) . '">';

                $tack = in_array( $post->ID, $sticky ) ? '<span class="mnmlwp-recent-posts-tack fa fa-thumb-tack"></span>' : '';
                $more = strlen( $post->post_title ) >= $title_length ? '&hellip;' : '';

                if( $show_thumbs ) {
                    echo '<span class="mnmlwp-recent-posts-link-title">' . $tack . substr(esc_attr( $post->post_title ), 0 , $title_length) . $more . '</span>';
                    echo '<span class="mnmlwp-recent-posts-link-thumbnail"><img data-original="' . $url . '" class="lazy" src="' . get_template_directory_uri() . '/widgets/mnmlwp-recent-posts/assets/img/placeholder.png" alt=""></span>';

                } else {
                    echo '<span class="mnmlwp-recent-posts-link-title mnmlwp-recent-posts-link-title-no-thumb">' . $tack . substr(esc_attr( $post->post_title ), 0 , $title_length) . $more . '</span>';
                }

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
        $title = ! empty( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) : '';
        $num_posts = ! empty( $instance['num_posts'] ) ? (int)$instance['num_posts'] : 5;
        $show_thumbs = ! empty( $instance['show_thumbs'] ) ? (int)$instance['show_thumbs'] : 0;
        $title_length = ! empty( $instance['title_length'] ) ? (int)$instance['title_length'] : 44;

        ?>

        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'mnmlwp' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>

        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'num_posts' ) ); ?>"><?php esc_html_e( 'Number of posts:', 'mnmlwp' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'num_posts' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'num_posts' ) ); ?>" type="text" value="<?php echo esc_attr( (int)$num_posts ); ?>">
        </p>

        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title_length' ) ); ?>"><?php esc_html_e( 'Max. number of title characters:', 'mnmlwp' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title_length' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title_length' ) ); ?>" type="text" value="<?php echo esc_attr( (int)$title_length ); ?>">
        </p>

        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'show_thumbs' ) ); ?>"><?php esc_html_e( 'Display thumbnails:', 'mnmlwp' ); ?></label>
        <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'show_thumbs' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_thumbs' ) ); ?>" value="1" <?php echo $show_thumbs === 1 ? 'checked' : ''; ?>>
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
        $instance['title_length'] = ( ! empty( $new_instance['title_length'] ) ) ? absint( $new_instance['title_length'] ) : 44;
        
        if( $instance['title_length'] <= 0 || $instance['title_length'] > 1024 )
            $instance['title_length'] = 1024;
            
        $instance['num_posts'] = ( ! empty( $new_instance['num_posts'] ) ) ? (int)$new_instance['num_posts'] : 5;
        
        if( $instance['num_posts'] > 9999999 )
            $instance['num_posts'] = 9999999;
        
        if( $instance['num_posts'] <= -1 )
            $instance['num_posts'] = -1;
        
        $instance['show_thumbs'] = ( ! empty( $new_instance['show_thumbs'] ) ) ? absint( $new_instance['show_thumbs'] ) : '';

        return $instance;
    }
}

add_action( 'widgets_init', function() {
    return register_widget('mnmlWP_Widget_Recent_Posts');
});
