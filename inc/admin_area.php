		
<p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>

<p>
    <label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Category:' ); ?></label>
	<select id="<?php echo $this->get_field_id( 'category' ); ?>"	name="<?php echo $this->get_field_name( 'category' ); ?>">
		<option value="0" <?php echo ($category==0)?'selected':''?>><?php _e( 'All categories' ); ?></option>
		<?php 
		$category_list = get_categories(array('hide_empty' => 0, 'name' => 'category', 'hierarchical' => true));
		foreach ($category_list as $category_item) {	?>
			<option value="<?php echo $category_item->term_id?>" <?php echo ($category==$category_item->term_id)?'selected':''?>><?php echo $category_item->name; ?></option>
		<?php } ?>
	</select>	
</p>

<p>
    <label for="<?php echo $this->get_field_id( 'order_' ); ?>"><?php _e( 'Order by:' ); ?></label>
	<select id="<?php echo $this->get_field_id('order_by'); ?>"	name="<?php echo $this->get_field_name('order_by'); ?>">
		<option value="date" <?php echo ($order_by=='date')?'selected':''?>><?php _e( 'Date' ); ?></option>
		<option value="title" <?php echo ($order_by=='title')?'selected':''?>><?php _e( 'Title' ); ?></option>
		<option value="modified" <?php echo ($order_by=='modified')?'selected':''?>><?php _e( 'Modified Date' ); ?></option>
		<option value="ID" <?php echo ($order_by=='ID')?'selected':''?>><?php _e( 'ID' ); ?></option>
		<option value="author" <?php echo ($order_by=='author')?'selected':''?>><?php _e( 'Author' ); ?></option>
		<option value="comment_count" <?php echo ($order_by=='comment_count')?'selected':''?>><?php _e( 'Comment Count' ); ?></option>
		<option value="rand" <?php echo ($order_by=='rand')?'selected':''?>><?php _e( 'Random' ); ?></option>
	</select>	
	<select id="<?php echo $this->get_field_id('order_type'); ?>"	name="<?php echo $this->get_field_name('order_type'); ?>">
		<option value="DESC" <?php echo ($order_type=='DESC')?'selected':''?>><?php _e( 'Desc' ); ?></option>
		<option value="ASC" <?php echo ($order_type=='ASC')?'selected':''?>><?php _e( 'Asc' ); ?></option>
	</select>		
</p>

<p>
    <label for="<?php echo $this->get_field_id( 'no_post_to_display' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
    <input class="small-text" id="<?php echo $this->get_field_id( 'no_post_to_display' ); ?>" name="<?php echo $this->get_field_name( 'no_post_to_display' ); ?>" type="text" value="<?php echo esc_attr( $no_post_to_display ); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id( 'post_offset' ); ?>"><?php _e( 'Posts offset:' ); ?></label>
    <input class="small-text" id="<?php echo $this->get_field_id( 'post_offset' ); ?>" name="<?php echo $this->get_field_name( 'post_offset' ); ?>" type="text" value="<?php echo esc_attr( $post_offset ); ?>" />
</p>

<p>
    <input id="<?php echo $this->get_field_id( 'post_title' ); ?>" name="<?php echo $this->get_field_name( 'post_title' ); ?>" type="checkbox" <?php checked($post_title); ?> />
    <label for="<?php echo $this->get_field_id( 'post_title' ); ?>"><?php _e( 'Show post title' ); ?></label>
</p>
<p>
    <input id="<?php echo $this->get_field_id( 'post_date' ); ?>" name="<?php echo $this->get_field_name( 'post_date' ); ?>" type="checkbox" <?php checked($post_date); ?> />
    <label for="<?php echo $this->get_field_id( 'post_date' ); ?>"><?php _e( 'Show post time/date' ); ?></label>
	<br />
	<label for="<?php echo $this->get_field_id( 'post_date_format' ); ?>"><?php _e( 'Date Format' ); ?></label> <a href="http://php.net/manual/en/datetime.format.php" style=" text-decoration: none;" target="_blank" class="tips-link">[?]</a>
	<input size="12" id="<?php echo $this->get_field_id( 'post_date_format' ); ?>" name="<?php echo $this->get_field_name( 'post_date_format' ); ?>" type="text" value="<?php echo esc_attr( $post_date_format ); ?>" />	
</p>

<p>
    <input id="<?php echo $this->get_field_id( 'post_author' ); ?>" name="<?php echo $this->get_field_name( 'post_author' ); ?>" type="checkbox" <?php checked($post_author); ?> />
    <label for="<?php echo $this->get_field_id( 'post_author' ); ?>"><?php _e( 'Show post author' ); ?></label>
</p>

<p><input id="<?php echo $this->get_field_id('show_post_thumb'); ?>" name="<?php echo $this->get_field_name('show_post_thumb'); ?>" type="checkbox" <?php checked($show_post_thumb); ?> /> <label for="<?php echo $this->get_field_id('show_post_thumb'); ?>"><?php _e('Show post thumb'); ?></label><br />
<small><?php _e('Thumbnail size(W-H):'); ?></small>
<input type="text" size="3" name="<?php echo $this->get_field_name('post_thumb_width'); ?>" value="<?php echo $post_thumb_width; ?>" />px 
<input type="text" size="3" name="<?php echo $this->get_field_name('post_thumb_height'); ?>" value="<?php echo $post_thumb_height; ?>" />px</p>
		
<p>
   <input id="<?php echo $this->get_field_id('post_excerpt'); ?>" name="<?php echo $this->get_field_name('post_excerpt'); ?>" type="checkbox" <?php checked($post_excerpt); ?> /> 
   <label for="<?php echo $this->get_field_id('post_excerpt'); ?>"><?php _e('Show post excerpt'); ?></label><br />
  <br /> <?php _e('Post excerpt length(characters)'); ?>
   <input id="<?php echo $this->get_field_id('post_excerpt_length'); ?>" name="<?php echo $this->get_field_name('post_excerpt_length'); ?>" type="text" size="3" value="<?php echo $post_excerpt_length; ?>" /><br />
   <br /><?php _e('Read more text'); ?>
   <input name="<?php echo $this->get_field_name('read_more_text'); ?>" type="text" size="12" value="<?php echo $read_more_text; ?>" />
</p>
	 