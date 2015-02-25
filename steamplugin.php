<?php
/*
Plugin Name: SteamGroup-Widget
Plugin URI: http://www.florian-chapon.fr/pages/realisations/steam
Description: Permet l'affichage des informations importantes d'un groupe steam de votre choix 
(nombre d'inscrits, joueurs en ligne, en jeu, miniatures de membres du groupe...).
Version: 1.0
Author: Florian Chapon
Author URI: http://www.florian-chapon.fr
License: --
*/

class steamplugin
{
	/* Création du plugin associé au widget */ 
	public function __construct()
	{
	include_once plugin_dir_path( __FILE__ ).'/steamgroup.php';
	new steamgroup();

	/* Appel BDD + installation */
	register_activation_hook(__FILE__, array('steamgroup', 'install'));
		
	/* Suppresion BDD si désinstallation + suppression */
	register_uninstall_hook(__FILE__, array('steamgroup', 'uninstall'));
		
	/* Ajoute un menu d'administration */ 
	add_action('admin_menu', array($this, 'add_admin_menu'));

	}
  
	/* Sous menu */

    public function add_admin_menu()
    {
       add_menu_page('SteamGroup Widget', 'SteamGroup Widget', 'manage_options', 'home', array($this, 'menu_html'), plugins_url( 'images/steamicon.png', __FILE__ ));
	    add_submenu_page('home', 'Home', 'Home', 'manage_options', 'home', array($this, 'menu_html'));
    }

	/* fin sous menu */
	
	/* Fonction du menu admin 1*/
	public function menu_html()
	{
	echo '<h1>'.get_admin_page_title().'</h1>';
	
	?>
		(English)<br/><br/>
		Here you can have a little preview of the widget with the Official CSGO Steam Group.The group adress is this one: <a href="http://steamcommunity.com/games/CSGO">http://steamcommunity.com/games/CSGO</a>.
		We directly set the adress of the group in the Settings form with the correct width.<br/>
		You can use every type of steam group adress: <br/><br/>
		<center> <u>http://steamcommunity.com/games/"groupname"</u><br/>
		<u> http://steamcommunity.com/groups/"groupname"</u></center>
		<br/><br/><br/>
		

	
		(French)<br/><br/>
		Vous pouvez ici avoir un aperçu du widget avec le groupe steam officiel de Counter Strike Global Offensive. L'adresse du groupe était la suivante: <a href="http://steamcommunity.com/games/CSGO">http://steamcommunity.com/games/CSGO</a>.
		Nous avons mis directement l'adresse du groupe et la largeur de widget de notre choix.<br/>
		// Vous pouvez utiliser tout les types d'adresse de groupe:<br/><br/>
		<center><u>http://steamcommunity.com/games/"groupname"</u><br/>
		<u>http://steamcommunity.com/groups/"groupname"</u></center>
		<br/><br/><br/>
		
		
		
		<u><b>Preview test</u>:</b><br/><br/>
		
		<center>
		<table>
		<tr><td>
			<?php echo '<img src="'.plugins_url( 'images/screenshots/screenshot%231.png', __FILE__ ).'" style="border:1px solid #CBCBCB;border-radius:5px;"/>';?>
		</td>
		<td>		
		
		<?php echo '<img src="'.plugins_url( 'images/screenshots/screenshot%232.png', __FILE__ ).'" style="border:1px solid #CBCBCB;border-radius:5px;"/>'; ?>
			
		</td></tr>
		</table>
		
		<style>td { padding-left:40px; padding-right:40px; }</style>
		
		</center>
		
		<u><b>Author</u>:</b><br/><br/>
		
		
		<div style="float:left;text-align:justify;margin-right:40px;">(English) This plugin was made by Florian Chapon, a french technical engineer specialised in chemistry. He felt in love with webdesign and webdevelopment. <br/>
		After months of self study, he decides to start making his own web applications. <br/><br/>
		
		(French) Ce plugin a été crée par Florian Chapon, un ingénieur technique spécialisé en chimie. <br/>Passionné de webdesign, de webdeveloppement et après des mois d'apprentissage en autodidacte, il décide de commencer à créer 
		ses propres applications web.
		
			
		</div>
		<div><img src="https://media.licdn.com/mpr/mpr/shrink_200_200/p/4/005/0b3/2e0/32ba2af.jpg" width="100px"/></div>
		
		<br/><br/>
		<b>You can find more information about him on his official website and his social pages / Vous pouvez trouver plus d'information à son propos sur sa site officiel ainsi que sur les réseaux sociaux:</b><br/><br/>
		
	
		<div style="float:left;width:100%;">
	
		<div style="float:left; width:auto; margin-right:40px;">
		<a href="http://www.florian-chapon.fr">http://www.florian-chapon.fr</a>
		</div>
		
		<div style="float:left;margin-right:10px;">
		<a href="https://www.facebook.com/chaponf"><img src="https://www.facebook.com/images/fb_icon_325x325.png" width="30px"></a>
		</div>
		
		<div style="float:left;margin-right:10px;">
		<a href="https://fr.linkedin.com/pub/florian-chapon/80/a6/37"><img src="http://upload.wikimedia.org/wikipedia/commons/c/ca/LinkedIn_logo_initials.png" width="30px"></a>
		</div>
		
		<div style="float:left;margin-right:10px;">
		<a href="https://twitter.com/florianchapon"><img src="https://g.twimg.com/Twitter_logo_blue.png" width="30px"></a>
		</div>
		</div>
		
		
		
		
		
		
		
		<?php
	
	
	
	}
	/* fin menu admin 1 */

}

new steamplugin();


?>