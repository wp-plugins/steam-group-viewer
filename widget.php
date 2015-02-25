<head>
		
	<?php echo "<LINK href='".plugin_dir_url( __FILE__ )."style.css' rel='stylesheet' type='text/css'/>"; ?>
	</head>

	<!-- chargement page groupe en XML -->


	<?




	/* $url = "http://steamcommunity.com/groups/"; */
	$url = $groupadressiframe."/memberslistxml/?xml=1";
	$width = $groupwidthiframe-((6/100)*$groupwidthiframe)-12;
	$padding = (3/100)*$groupwidthiframe;
	$imagewidth =((18/100)*$width);




	$xml = simplexml_load_file($url);

	/* $avatar = $xml->groupDetails->avatarFull;*/
	$avatar = $xml->groupDetails->avatarIcon;
	$groupname = $xml->groupDetails->groupName;
	$member = $xml->groupDetails->memberCount;
	$online = $xml->groupDetails->membersOnline;
	$ingame = $xml->groupDetails->membersInGame;
	$inchat = $xml->groupDetails->membersInChat;
	$groupurl = $xml->groupDetails->groupURL;



	?>
	 

	<!-- Affichage widget -->
	<div id ="widget" style="width:auto;padding:<? echo $padding."px"; ?>;">
				
				<!-- Groupe -->

				<div style="height:auto;width:100%;display:inline-block;">
					<div style="float:left;width:18%;"><img src="<? echo $avatar;?>" width="<? echo $imagewidth; ?>" style="border-radius:100%;"/></div>
					<div style="float:left;width:77%;padding-left:5%;height:<? echo $imagewidth; ?>;display:flex; align-items:center;font-size:1.2em;"><font color="#3b5998"><b><span><? echo $groupname;?></span></b></font></div>
				</div>
				
				<div id="separator"></div>
				
				<div>
				<!-- Stats -->
				<ul>
					<li id="stats" style="color:#FF6600;">
						<div id="statsnumber"><? echo $member; ?></div>
						<div>MEMBRES</div>
					</li>
					<li id="stats" style="color:#62a7e3;">
						<div id="statsnumber"><? echo $online; ?></div>
						<div>EN LIGNE</div>
					</li>
					<li id="stats" style="color:#8bc53f;">
						<div id="statsnumber"><? echo $ingame; ?></div>
						<div>EN JEU</div>
					</li>
					<li id="stats" style="color:#9a9a9a;">
						<div id="statsnumber"><? echo $inchat; ?></div>
						<div>EN CHAT</div>
					</li>
				</ul>
				</div>
				
				<div id="separator"></div>	
				
				<!-- Boutton rejoindre -->
				<table width="100%">
					<tr>
						<td valign="middle" width="65%" style="border:0;"><u>Rejoignez nous!</u>
						</td>
						<td align="right" valign="middle" width="35%" style="padding:0;border:0;">
							<div style="width:100%; height: 22px;border:none; border-radius:2px; background: #a4d007; background: -moz-linear-gradient(top, #a4d007 5%, #6b8805 95%);
							background: -webkit-gradient(linear, left top, left bottom, color-stop(5%,#a4d007), color-stop(95%,#6b8805));
							background: -webkit-linear-gradient(top, #a4d007 5%,#6b8805 95%);
							background: -o-linear-gradient(top, #a4d007 5%,#6b8805 95%);
							background: -ms-linear-gradient(top, #a4d007 5%,#6b8805 95%);
							background: linear-gradient(to bottom, #a4d007 5%,#6b8805 95%);
							text-align:center;">
							<a href="http://steamcommunity.com/groups/<?php echo $groupurl;?>" target="_BLANCK" style="text-decoration:none; display:block; color:white;width:100%; height:22px;line-height:22px;">Rejoindre</a></div></td>
					</tr>
				</table>
			

			
				<!-- Mozaique de membres -->			
				<?php 

				$total = $xml->groupDetails->memberCount;

				// Nombre aléatoire pour profil
				$rand = rand(0, 1000);
				 

				// de base 0 et 9 
				echo "<ul style='text-align:center;'>";
				
					for ($i=0;$i<=9; $i++)
					{
					$rand2 = $rand + $i;
					$profilapi= "http://steamcommunity.com/profiles/";
					$profilapi .= $xml->members->steamID64[$i];
					$profilapi .= "/?xml=1";
					

					
					$xmlprofil = simplexml_load_file($profilapi); 
					
					
					echo "<li id='profil' style='";
					
					if ($xmlprofil->onlineState == "online")
					{
					
					echo "border-color:#7bafd6;'>";
					
					}
					
					
					elseif ($xmlprofil->onlineState == "in-game")
					{
					echo "border-color:#9bc861;'>";
					}
					
					else
					
					{
					echo "border-color:#545454;'>";
					
					}
					echo "<a href='http://steamcommunity.com/profiles/".$xml->members->steamID64[$i]."' target='_blank' title='".$xmlprofil->steamID."'><img src='".$xmlprofil->avatarMedium."' id='profileimg' width='100%'/></a></li>";

					
					}
					echo "</ul>";
				
				?>	

			
	</div>

	<script type="text/javascript">

	$("body").each(function(i, obj) {
		newSize = ((<?php echo $groupwidthiframe; ?>)/300)*14;
		$(obj).css("font-size", newSize + "px");
	});

	</script>
		
	