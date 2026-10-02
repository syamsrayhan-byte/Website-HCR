<?php
/**
 * Widget Popular Posts
 * 
 * @package eiPro_Master
 * @link https://codex.wordpress.org/Widgets_API#Developing_Widgets
 */

class eipro_widget_popular_post extends WP_Widget {
	
	public function __construct() {
		$widget_options = array(
			'classame' => 'eipro_popular_post_widget',
			'description' => esc_html__( 'Widget to display popular posts', 'eipro-master' ),
		);
		parent::__construct( 
			'eipro_popular_post_widget', 
			esc_html__( 'eiPro - Popular Posts', 'eipro-master' ), 
			$widget_options 
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
	    $title = apply_filters( 'widget_title', $instance['title'] );
	    $number = ! empty( $instance['number'] ) ? $instance['number'] : 5;

	    echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title'];
	?>

	<div class="widget post">
	    <ul>
	        <?php
	        $popular_args = array(
	            'post_type'      => 'post',
	            'numberposts' 	 => absint( $number ),
	            'meta_key'       => 'post_views_count',
	            'orderby'        => 'meta_value_num',
	            'order'          => 'DESC',
	        );

	        if ( isset( $instance['time_period'] ) && $instance['time_period'] ) {
	            $popular_args['date_query'] = array(
	                array(
	                    'column' => 'post_date',
	                    'after'  => $instance['time_period'] . ' ago',
	                ),
	            );
	        }

	        $popular_posts = get_posts( $popular_args );

	        if ( $popular_posts ) {
	            $colors = array('#CB5D79', '#EA8F63', '#C7C561', '#4C7DC7', '#8D5692', '#657B9A');
	            $i = 0;
	            foreach ( $popular_posts as $post ) {
	                setup_postdata( $post );
	                $color = $colors[$i % count($colors)];
	                $thumb_post = get_the_post_thumbnail_url( $post->ID );
	                $img_blank = get_template_directory_uri() . '/assets/img/blank.jpg';
	                $url = $thumb_post ? $thumb_post : $img_blank;
	                $layout_set = get_theme_mod('layout_set');

	                echo '<li>';
	                echo '<a href="' . get_permalink($post->ID) . '"><img src="' . esc_url( $url ) . '" alt="' . esc_attr( get_the_title($post->ID) ) . '"';
	                if($layout_set == 'lbusiness') {
	                    echo ' style="border-color:'. $color .' !important"';
	                }
	                echo ' /></a>';
	                echo '<a href="' . get_permalink($post->ID) . '">' . get_the_title($post->ID) . '</a>';
	                echo '</li>';

	                $i++;
	            }
	            wp_reset_postdata();
	        } else {
	            echo '<li style="padding: 0;">';
	            esc_html_e( 'No popular posts within this time range.', 'eipro-master' );
	            echo '</li>';
	        }
	        ?>
	    </ul>
	</div>

	<?php
	    echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {

		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$number = ! empty( $instance['number'] ) ? $instance['number'] : 5;
		$time_period = ! empty( $instance['time_period'] ) ? $instance['time_period'] : '1 week';
?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
				<?php esc_html_e( 'Title:', 'eipro-master' ); ?>
			</label><br>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ) ?>" name="<?php echo $this->get_field_name( 'title' ) ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>">
				<?php esc_html_e( 'Number of posts to show:', 'eipro-master' ); ?>
			</label>
			<input type="number" id="<?php echo $this->get_field_id( 'number' ) ?>" name="<?php echo $this->get_field_name( 'number' ) ?>" value="<?php echo absint( $number ); ?>" style="width: 45px;">
		</p>

		<p>
            <label for="<?php echo $this->get_field_id( 'time_period' ); ?>">
            	<?php esc_html_e( 'Time Period:', 'eipro-master' ); ?>
            </label>
            <select class="widefat" id="<?php echo $this->get_field_id( 'time_period' ); ?>" name="<?php echo $this->get_field_name( 'time_period' ); ?>">
                <option value="1 day" <?php selected( $time_period, '1 day' ); ?>>
                	<?php esc_html_e( '1 Day', 'eipro-master' ); ?>
                </option>
                <option value="1 week" <?php selected( $time_period, '1 week' ); ?>>
                	<?php esc_html_e( '1 Week', 'eipro-master' ); ?>
                </option>
                <option value="1 month" <?php selected( $time_period, '1 month' ); ?>>
	                <?php esc_html_e( '1 Month', 'eipro-master' ); ?>
	            </option>
                <option value="1 year" <?php selected( $time_period, '1 year' ); ?>>
	                <?php esc_html_e( '1 Year', 'eipro-master' ); ?>
	            </option>
                <option value="all time" <?php selected( $time_period, 'all time' ); ?>>
	                <?php esc_html_e( 'All Time', 'eipro-master' ); ?>
	            </option>
            </select>
        </p>

<?php
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['number'] = (int) ( $new_instance['number'] );
		$instance['time_period'] = ! empty( $new_instance['time_period'] ) ? sanitize_text_field( $new_instance['time_period'] ) : '1 week';

		return $instance;

	}
}
/**
 * Register Widget
 */
function eipro_register_popular_posts_widget() {
	register_widget( 'eipro_widget_popular_post' );
}
add_action( 'widgets_init', 'eipro_register_popular_posts_widget' );
