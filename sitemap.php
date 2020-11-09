<?php
header ('Content-type: text/plain; charset=UTF-8');

// **************************************************
// *** Sitemap                                    ***
// **************************************************

define("CMS_ROOTPATH", '');

include_once(CMS_ROOTPATH."include/db_login.php"); //Inloggen database.
include_once(CMS_ROOTPATH."include/safe.php"); //Variabelen

// *** Needed for privacy filter ***
include_once(CMS_ROOTPATH."include/settings_global.php"); //Variables
include_once(CMS_ROOTPATH."include/settings_user.php"); // USER variables
include_once(CMS_ROOTPATH."include/person_cls.php");

include_once(CMS_ROOTPATH."include/db_functions_cls.php");
$db_functions = New db_functions;

$person_cls = New person_cls;

// *** Example, see: http://www.sitemaps.org/protocol.html ***
/*
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	<url>
		<loc>http://www.example.com/</loc>
		<lastmod>2005-01-01</lastmod>
		<changefreq>monthly</changefreq>
		<priority>0.8</priority>
	</url>
	<url>
		<loc>http://www.example.com/catalog?item=12&amp;desc=vacation_hawaii</loc>
		<changefreq>weekly</changefreq>
	</url>
	<url>
		<loc>http://www.example.com/catalog?item=73&amp;desc=vacation_new_zealand</loc>
		<lastmod>2004-12-23</lastmod>
		<changefreq>weekly</changefreq>
	</url>
</urlset>
*/

echo '<?xml version="1.0" encoding="UTF-8"?>'."\r\n"
.'<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\r\n";

// *** Database ***
@$datasql=$db_functions->get_trees();
foreach($datasql as $dataDb){
	// *** Check is family tree is shown or hidden for user group ***
	$hide_tree_array=explode(";",$user['group_hide_trees']);
	$hide_tree=false; if (in_array($dataDb->tree_id, $hide_tree_array)) $hide_tree=true;
	if ($hide_tree==false){

		// *** Get all family pages ***
		$person_qry=$dbh->query("SELECT fam_gedcomnumber FROM humo_families
			WHERE fam_tree_id='".$dataDb->tree_id."' ORDER BY fam_gedcomnumber");
		while (@$personDb=$person_qry->fetch(PDO::FETCH_OBJ)){
			// *** Use class for privacy filter ***
			//$person_cls = New person_cls;
			//$person_cls->construct($personDb);
			//$privacy=$person_cls->privacy;

			// *** Completely filter person ***
			//if ($user["group_pers_hide_totally_act"]=='j'
			//	AND strpos(' '.$personDb->pers_own_code,$user["group_pers_hide_totally"])>0){
			//	// *** Don't show person ***
			//}
			//else{
				// *** Example ***
				//http://localhost/humo-gen/family.php?database=humo2_&amp;id=F365&main_person=I1180
				// OR, using url_rewrite:
				//http://localhost/humo-gen/family/humo_//I2354/

				// *** First part of url (strip sitemap.php from path) ***
				$position=strrpos($_SERVER['PHP_SELF'],'/');
				$uri_path= substr($_SERVER['PHP_SELF'],0,$position);
				if ($humo_option["url_rewrite"]=="j"){
					//$person_url=$uri_path.'/family/'.$dataDb->tree_prefix.'/'.$personDb->fam_gedcomnumber.'/';
					$person_url=$uri_path.'/family/'.$dataDb->tree_id.'/'.$personDb->fam_gedcomnumber.'/';
					//if ($personDb->pers_indexnr==''){ $person_url.=$personDb->pers_gedcomnumber.'/'; }
				}
				else{
					//$person_url=$uri_path.'/family.php?database='.$dataDb->tree_prefix.'&amp;id='.$personDb->fam_gedcomnumber;
					$person_url=$uri_path.'/family.php?tree_id='.$dataDb->tree_id.'&amp;id='.$personDb->fam_gedcomnumber;
					//if ($personDb->pers_indexnr==''){ $person_url.='&amp;main_person='.$personDb->pers_gedcomnumber; }
				}
				echo "<url>\r\n<loc>".$person_url."</loc>\r\n</url>\r\n";
			//}
		}

		// *** Get all single persons ***
		$person_qry=$dbh->query("SELECT pers_tree_id, pers_indexnr, pers_gedcomnumber, pers_own_code FROM humo_persons
			WHERE pers_tree_id='".$dataDb->tree_id."' AND pers_indexnr=''");
		while (@$personDb=$person_qry->fetch(PDO::FETCH_OBJ)){
			// *** Use class for privacy filter ***
			//$person_cls = New person_cls;
			//$person_cls->construct($personDb);
			//$privacy=$person_cls->privacy;

			// *** Completely filter person ***
			if ($user["group_pers_hide_totally_act"]=='j'
				AND strpos(' '.$personDb->pers_own_code,$user["group_pers_hide_totally"])>0){
				// *** Don't show person ***
			}
			else{
				// *** Example ***
				//http://localhost/humo-gen/family.php?database=humo2_&amp;id=F365&main_person=I1180
				// OR, using url_rewrite:
				//http://localhost/humo-gen/family/humo_//I2354/

				// *** First part of url (strip sitemap.php from path) ***
				$position=strrpos($_SERVER['PHP_SELF'],'/');
				$uri_path= substr($_SERVER['PHP_SELF'],0,$position);
				
				if ($humo_option["url_rewrite"]=="j"){
					//$person_url=$uri_path.'/family/'.$dataDb->tree_prefix.'/'.$personDb->pers_indexnr.'/'.$personDb->pers_gedcomnumber.'/';
					$person_url=$uri_path.'/family/'.$dataDb->tree_id.'/'.$personDb->pers_indexnr.'/'.$personDb->pers_gedcomnumber.'/';
				}
				else{
					//$person_url=$uri_path.'/family.php?database='.$dataDb->tree_prefix.'&amp;id='.$personDb->pers_indexnr.'&amp;main_person='.$personDb->pers_gedcomnumber;
					$person_url=$uri_path.'/family.php?tree_id='.$dataDb->tree_id.'&amp;id='.$personDb->pers_indexnr.'&amp;main_person='.$personDb->pers_gedcomnumber;
				}
				/*
				if ($humo_option["url_rewrite"]=="j"){
					$person_url=$person_cls->person_url($personDb);	// *** Get url to family ***
				}
				else{
					$person_url=$uri_path.'/'.$person_cls->person_url($personDb);	// *** Get url to family ***
				}
				*/
				echo "<url>\r\n<loc>".$person_url."</loc>\r\n</url>\r\n";
			}
		}

	} // *** End of hidden family tree ***
} // *** End of multiple family trees ***
unset ($datasql);

echo '</urlset>';
?>