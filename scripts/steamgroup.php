<?php
include_once plugin_dir_path( __FILE__ ).'steamgroupwidget.php';

class steamgroup
{
	/* Enregistrement du widget */
    public function __construct()
    {
        add_action('widgets_init', function(){register_widget('Steam_Group_Widget');});
		
		/* Agout de sous menu */ 
		add_action('admin_menu', array($this, 'add_admin_menu'), 20);
		
		/* Admin init */
		add_action('admin_init', array($this, 'register_settings'));
		
		/* gestion form */
		add_action('wp_loaded', array($this, 'saveform'));
		
	}
	
	/* Création de la table */
	public static function install()
	{
    global $wpdb;

    $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}steam_group_widget (groupadress VARCHAR(255) NOT NULL, groupwidth VARCHAR(255) NOT NULL, id INT AUTO_INCREMENT PRIMARY KEY);");
	}
	
	/* Désinstallation BDD si suppression plugin */
	public static function uninstall()
	{
		global $wpdb;

		$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}steam_group_widget;");
	}
	
	
	/* Fonction sous menu 2*/ 
	public function add_admin_menu()
    {
        add_submenu_page('home', 'Settings', 'Settings', 'manage_options', 'Settings', array($this, 'menu_html'));
    }
	
	
	/* Contenu sous menu principal 2*/
	public function menu_html()
    {
        echo '<h1>'.get_admin_page_title().'</h1>';
		?>
		<u><b>Settings</u>:</b><br/><br/>
		
		<form method="post" action="options.php">
		<?php settings_fields('groupsettings') ?>
		<table width="70%"><tr><td width="30%">
			<label>Steam Group Adress</label>
			</td><td width="70%">
		<input type="text" style="width:100%;" name="groupadress" value="<?php echo get_option('groupadress')?>"/>
			</td></tr><tr><td width="30%">
		<label>Width</label>
			</td><td width="70%">
		<input type="text" style="width:100%;" name="groupwidth" value="<?php echo get_option('groupwidth')?>"/>
			</td></tr></table>
		<?php submit_button(); ?>
		
		</form>
		
		
		<?php	
    }
	
	/* gestion BDD groupe */ 
	public function saveform()
	{
    if (isset($_POST['groupadress'],$_POST['groupwidth']) && $_POST['groupadress'] && $_POST['groupwidth']) 
	{
        global $wpdb;
        $groupadress = $_POST['groupadress'];
		$groupwidth = $_POST['groupwidth'];		
		
        $wpdb->insert("{$wpdb->prefix}steam_group_widget", array('groupadress' => $groupadress, 'groupwidth' => $groupwidth));
	
	}
	
	}
	/* fin gestion */
	
	
	/* Widget Options */
	
		public function register_settings()
		{
			register_setting('groupsettings', 'groupadress');
			register_setting('groupsettings', 'groupwidth');
		}
	
		
}

?>