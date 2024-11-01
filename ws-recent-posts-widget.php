<?php
/*
Plugin Name: WS Recent Posts Widget 
Plugin URI: https://wordpress.org/plugins/ws-recent-posts-widget
Description: WS Recent Posts Widget is a version of the WordPress Recent Posts widget allowing increased customization to display recent posts from category you define.
Author: WebShouters
Author URI: http://www.webshouters.com
Version: 1.0                                    
*/                                                  
class WS_RECENT_POSTS_WIDGET extends WP_Widget {  
	/* Constructor */          
	public function __construct() {                                
		parent::__construct(                                      
			'ws_recent_posts', //Base ID       
			__( 'WS Recent Posts', 'ws-recent-posts' ), //Name
			array( 'description' => __( 'Displays the recent posts from your blog', 'ws-recent-posts' ), ) //Args
		);
		add_action('wp_print_styles', array(&$this, 'ws_recent_posts_style'));//add widget styles
	}
    public function ws_recent_posts_style()            
    {
		wp_enqueue_style( 'add-ws-recent-posts-styles', plugins_url( 'ws-recent-posts-widget/css/style.css' ),'1.0' );
    }         
	
	public function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : 'WS Recent Posts';
		$category=isset($instance['category'])?$instance['category']:'';
		$order_by=isset($instance['order_by'])?$instance['order_by']:'';
		$order_type=isset($instance['order_type'])?$instance['order_type']:'';
		$no_post_to_display=isset($instance['no_post_to_display'])?(int)$instance['no_post_to_display']:'5';
		$post_offset=isset($instance['post_offset'])?(int)$instance['post_offset']:'0';
		$post_title=isset($instance['post_title']) ? (bool)$instance['post_title'] : false;
		$post_date=isset($instance['post_date']) ? (bool)$instance['post_date'] : false;
		$post_date_format=isset($instance['post_date_format'])?$instance['post_date_format']:'F j, Y g:i a';
		$post_author=isset($instance['post_author']) ? (bool)$instance['post_author'] : false;
		$show_post_thumb=isset($instance['show_post_thumb']) ? (bool)$instance['show_post_thumb'] : false;
		$post_thumb_width=isset($instance['post_thumb_width'])?(int)$instance['post_thumb_width']:'50';
		$post_thumb_height=isset($instance['post_thumb_height'])?(int)$instance['post_thumb_height']:'50';
		$post_excerpt=isset($instance['post_excerpt']) ? (bool)$instance['post_excerpt'] : false;
		$post_excerpt_length=isset($instance['post_excerpt_length'])?$instance['post_excerpt_length']:'10';
		$read_more_text=isset($instance['read_more_text'])?$instance['read_more_text']:'Read more &raquo;';
		include('inc/admin_area.php');		
	}
	public function update( $new_instance, $old_instance ) {
		return $new_instance;
	}
	public function widget( $args, $instance ) {
		
		extract($args);
        
        $title = apply_filters('title', isset($instance['title']) ? esc_attr($instance['title']) : '');
        $category = apply_filters('category', isset($instance['category']) ? esc_attr($instance['category']) : '');
        $order_by = apply_filters('order_by', isset($instance['order_by']) ? esc_attr($instance['order_by']) : '');
		$order_type = apply_filters('order_type', isset($instance['order_type']) ? $instance['order_type'] : '');
		
        $no_post_to_display = apply_filters('no_post_to_display', isset($instance['no_post_to_display']) && is_numeric($instance['no_post_to_display']) ? esc_attr($instance['no_post_to_display']) : '');
        $post_offset = apply_filters('post_offset', isset($instance['post_offset']) && is_numeric($instance['post_offset']) ?(int)$instance['post_offset'] : 0);
		$post_title = apply_filters('post_title', isset($instance['post_title']) ?(bool)$instance['post_title'] : false);
		$post_date = apply_filters('post_date', isset($instance['post_date']) ?(bool)$instance['post_date'] : false);
		$post_date_format=apply_filters('cw_erpv_post_date_format',(isset($instance['post_date_format'])&&($instance['post_date_format']))?$instance['post_date_format']:'F j, Y g:i a');
        $post_author = apply_filters('post_author', isset($instance['post_author']) ?(bool)$instance['post_author'] : false);
		$show_post_thumb = apply_filters('show_post_thumb', isset($instance['show_post_thumb']) ?(bool)$instance['show_post_thumb'] : false);
		$post_thumb_width = apply_filters('post_thumb_width', isset($instance['post_thumb_width']) && is_numeric($instance['post_thumb_width']) ?(int)$instance['post_thumb_width'] : 50);
        $post_thumb_height = apply_filters('post_thumb_height', isset($instance['post_thumb_height']) && is_numeric($instance['post_thumb_height']) ?(int)$instance['post_thumb_height'] : 50);
		$post_excerpt = apply_filters('post_excerpt', isset($instance['post_excerpt']) ?(bool)$instance['post_excerpt'] : false);
		$post_excerpt_length = apply_filters('post_excerpt_length', isset($instance['post_excerpt_length']) ? $instance['post_excerpt_length'] : '10');
		$read_more_text = apply_filters('read_more_text', isset($instance['read_more_text']) ? $instance['read_more_text'] : 'Read more &raquo;');
		
        echo $before_widget;
        if(!empty($title)) {
            echo $before_title . $title . $after_title;
        }
		include('inc/widget_area.php');	
		echo $after_widget;
	}	
}

// register  widget
function register_ws_recent_posts_widget() {
    register_widget( 'WS_RECENT_POSTS_WIDGET' );
}
add_action( 'widgets_init', 'register_ws_recent_posts_widget' );