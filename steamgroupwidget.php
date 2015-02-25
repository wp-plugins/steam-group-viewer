<?php


class Steam_Group_Widget extends WP_Widget
{	
	/* Information s'affichant au moment de l'ajout du widget */
    public function __construct()
    {
        parent::__construct('steamgroup', 'Steam Group Widget', array('description' => '(en) Allow you to display some informations about your steam group. | (fr) Permet l affichage des informations importantes d un groupe steam de votre choix.'));
    }
    
	/* Le code d'affichage du widget */
    public function widget($args, $instance)
    {
		echo $args['before_widget'];
		echo $args['before_title'];
		echo apply_filters('widget_title', $instance['title']);
		echo $args['after_title'];
		
		
		global $wpdb;
		$test = $wpdb->get_results("SELECT id, groupadress, groupwidth FROM {$wpdb->prefix}steam_group_widget ORDER BY id DESC LIMIT 1");

		foreach ($test as $_test) {
		$groupadressiframe = $_test->groupadress;
		$groupwidthiframe = $_test->groupwidth;
			
		}
		
		include_once plugin_dir_path( __FILE__ ).'/widget.php';
		
	
		
		echo $args['after_widget'];	
		
    }
	
	/* Gere le champ de titre du widget */
	public function form($instance)
	{
    $title = isset($instance['title']) ? $instance['title'] : ''; 
	?>
	<p>
        <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo  $title; ?>" />
    </p> <?php
   
	}
	
	
	
}

?>

