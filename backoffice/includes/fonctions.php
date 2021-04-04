<?
function productName($product_name){
	$name = stripslashes(ucwords(strtolower($product_name)));
	return $name;
}
function menageFonts($text){
	$textclear = preg_replace('/<font face=\"(.*)\">(.*)<\/font>/i','$2',$text);
	return $textclear;
}
function array_sort($array, $key){
	for ($i = 0; $i < sizeof($array); $i++) {
		$sort_values[$i] = $array[$i][$key];
	}
	asort  ($sort_values);
	reset ($sort_values);
	while (list ($arr_key, $arr_val) = each ($sort_values)) {
		$sorted_arr[] = $array[$arr_key];
	}
	unset($array);
	return $sorted_arr;
}

function CacheImage($product,$view,$name,$width=800,$height=800,$flag='',$lifetime=30){
	global $Config, $db, $bdd;
	$product = str_pad($product,5,'0', STR_PAD_LEFT);
	$name = menageURL($name);

	$last_edition = ($res['produit_modification']!='')?$res['produit_modification']:$res['produit_creation'];
	switch($flag){
		default:
			$flag="";
		break;
	}
	if(!file_exists($Config['ROOT_PATH'].'cache/products/'.$name.'-'.$product.'-'.$width.'x'.$height.'_'.$view.'.jpg')){
		$myImg=new oxImg();

		if(file_exists($Config['ROOT_PATH'].'produits/'.$product.'_'.$view.'.jpg')){
			$myImg->setSrc($Config['ROOT_PATH'].'produits/'.$product.'_'.$view.'.jpg');
		}else{
			$myImg->setSrc($Config['ROOT_PATH'].'produits/indisponible.jpg');
		}
		$myImg->setDest($Config['ROOT_PATH'].'cache/products/'.$name.'-'.$product.'-'.$width.'x'.$height.'_'.$view.'.jpg');
		$myImg->product_cache($width,$height,$flag);
		
		
	}else{
		if((filemtime($Config['ROOT_PATH'].'cache/products/'.$name.'-'.$product.'-'.$width.'x'.$height.'_'.$view.'.jpg')) <$last_edition){
			$myImg=new oxImg();
			if(file_exists($Config['ROOT_PATH'].'produits/'.$product.'_'.$view.'.jpg')){
				$myImg->setSrc($Config['ROOT_PATH'].'produits/'.$product.'_'.$view.'.jpg');
			}else{
				$myImg->setSrc($Config['ROOT_PATH'].'produits/indisponible.jpg');
			}
			$myImg->setDest($Config['ROOT_PATH'].'cache/products/'.$brand.'-'.$name.'-'.$product.'-'.$width.'x'.$height.'_'.$view.'.jpg');
			$myImg->product_cache($width,$height,$flag);

		}
	}
	$img = '/cache/products/'.$name.'-'.$product.'-'.$width.'x'.$height.'_'.$view.'.jpg';
	return $img;
}
function CacheImageV2($name, $dir ,$width=565,$height=565){
	global $Config, $db, $bdd;
	
	
	$name2 = menageURL(@ereg_replace('\.jpg$','',$name));
	$dir = stripslashes($dir);
	
	if(!file_exists($dir.'/'.$name2.'-'.$width.'x'.$height.'.jpg')){
		$myImg=new oxImg();

		if(file_exists($Config['ROOT_PATH'].'ressources/temp_upload/'.$name)){
			$myImg->setSrc($Config['ROOT_PATH'].'ressources/temp_upload/'.$name);
			$myImg->setDest($dir.'/'.$name2.'-'.$width.'x'.$height.'.jpg');
			$myImg->image_cache($width,$height);
			
			$myImg->setSrc($Config['ROOT_PATH'].'ressources/temp_upload/'.$name);
			$myImg->setDest($Config['ROOT_PATH'].'ressources/temp_upload/'.$name2.'-'.$width.'x'.$height.'.jpg');
			$myImg->image_cache(80,80);
		}
		
	}
	$img = @ereg_replace($Config['ROOT_PATH'],'/',$dir);
	
	$img .= '/'.$name2.'-'.$width.'x'.$height.'.jpg';
	return urlencode($img);
}
function lettrine($str){
	$lettrine = substr($str,0,1);
	$mot = substr($str,1);
	$str = '<span style="font-size:24px;">'.$lettrine.'</span><span style="font-size:18px;">'.$mot.'</span>';
	return $str;
}

function file_list($d,$x,$i){
	foreach(array_diff(scandir($d),array('.','..')) as $f)
		if(is_file($d.'/'.$f)&&(($x)?ereg('^'.$i.'_([0-9]{1,})'.$x.'$',$f):1))
			$l[]=$f;
	return $l;
}

function gen_rand_string($hash){
	$chars = array('a','A','b','B','c','C','d','D','e','E','f','F','g','G','h','H','i','I','j','J','k','K','l','L','m','M','n','N','p','P','q','Q','r','R','s','S','t','T','u','U','v','V','w','W','x','X','y','Y','z','Z','1','2','3','4','5','6','7','8','9');
	$max_chars = count($chars) - 1;
	$rand_str = '';
	for($i = 0; $i < 12; $i++)
	{
		$rand_str = ( $i == 0 )?$chars[rand(0,$max_chars)]:$rand_str.$chars[rand(0, $max_chars)];
	}

	return($hash)?md5($rand_str):$rand_str;
}


	/////////////////////////////////////////////////////////
	//  Get the post data from the param file (tmp_sid.param)
	/////////////////////////////////////////////////////////
	function getPostData($up_dir, $tmp_sid) {
		$param_array = array();
		$buffer = "";
		$key = "";
		$value = "";
		$paramFileName = $up_dir . $tmp_sid . ".params";
		$fh = @fopen($paramFileName, 'r');

		if (!is_resource($fh)) {
			kak("<font color='red'>ERROR</font>: Failed to open $paramFileName");
		}

		while (!feof($fh)) {
			$buffer = fgets($fh, 4096);
			list($key, $value) = explode('=', trim($buffer));
			$value = str_replace("~EQLS~", "=", $value);
			$value = str_replace("~NWLN~", "\r\n", $value);

			if (isset($key) && isset($value) && strlen($key) > 0 && strlen($value) > 0) {
				if (preg_match('/(.*)\[(.*)\]/i', $key, $match)) {
					$param_array[$match[1]][$match[2]] = $value;
				}
				else {
					$param_array[$key] = $value;
				}
			}
		}

		fclose($fh);

		if (isset($param_array['delete_param_file']) && $param_array['delete_param_file'] ==
			1) {
			for ($i = 0; $i < 5; $i++) {
				if (@unlink($paramFileName)) {
					break;
				}
				else {
					sleep(1);
				}
			}
		}

		return $param_array;
	}

	//////////////////////////////////////////////////
	//  formatBytes($file_size) mixed file sizes
	//  formatBytes($file_size, 0) KB file sizes
	//  formatBytes($file_size, 1) MB file sizes etc
	//////////////////////////////////////////////////
	function formatBytes($bytes, $format = 99) {
		$byte_size = 1024;
		$byte_type = array(" KB", " MB", " GB", " TB", " PB", " EB", " ZB", " YB");

		$bytes /= $byte_size;
		$i = 0;

		if ($format == 99 || $format > 7) {
			while ($bytes > $byte_size) {
				$bytes /= $byte_size;
				$i++;
			}
		}
		else {
			while ($i < $format) {
				$bytes /= $byte_size;
				$i++;
			}
		}

		$bytes = sprintf("%1.2f", $bytes);
		$bytes .= $byte_type[$i];

		return $bytes;
	}




function menageURL($var){
	$out = strtolower(stripslashes($var));
	$ArrExtension = array("gif","jpeg","jpg","pjpeg","pdf","swf","doc","txt","xls","ppt","php","html","png");
	foreach($ArrExtension as $key=>$value){
		if(eregi("\.".$value."$",$out)){
			$Extension = $value;
			$out = eregi_replace(".".$Extension."$","",$out);
			break;
		}
	}
	$out = ereg_replace('&oelig;', 'oe', $out);
    $trans_tbl = get_html_translation_table (HTML_ENTITIES);
    $trans_tbl = array_flip ($trans_tbl);
    $out = strtr ($out, $trans_tbl);
	$out = strtr($out,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿñ','aaaaaaceeeeiiiiooooouuuuyaaaaaaceeeeiiiioooooouuuuyyn');
	$out = preg_replace('/([^a-z0-9]+)/i', '-', $out);
	$out = ereg_replace('--', '', $out);
	$out = ereg_replace('-$', '', $out);
	$out = ($Extension !="") ? $out.".".$Extension : $out ;
	return $out;
}

function str_to_upper($str){
    $trans_tbl = get_html_translation_table (HTML_ENTITIES);
    $trans_tbl = array_flip ($trans_tbl);
    $out = strtr ($str, $trans_tbl);
	$out = strtr($out,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿñ','aaaaaaceeeeiiiiooooouuuuyaaaaaaceeeeiiiioooooouuuuyyn');
	$out = strtoupper($out);
	return $out;
}
function uc_first($str){
    $trans_tbl = get_html_translation_table (HTML_ENTITIES);
    $trans_tbl = array_flip ($trans_tbl);
    $out = strtr ($str, $trans_tbl);
	$out = strtr($out,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿñ','aaaaaaceeeeiiiiooooouuuuyaaaaaaceeeeiiiioooooouuuuyyn');
	$out = ucfirst($out);
	return $out;
}





function date_fr($_timestamp)
{

	$traduction = array(
	
		/* Jours de la semaine en entier */
		
	   'Monday' => 'Lundi',
	   'Tuesday' => 'Mardi',
	   'Wednesday' => 'Mercredi',
	   'Thursday' => 'Jeudi',
	   'Friday' => 'Vendredi',
	   'Saturday' => 'Samedi',
	   'Sunday' => 'Dimanche',
	
		/* Jours de la semaine en 3 lettres */
	
	   'Mon' => 'Lun',
	   'Tue' => 'Mar',
	   'Wed' => 'Mer',
	   'Thu' => 'Jeu',
	   'Fri' => 'Ven',
	   'Sat' => 'Sam',
	   'Sun' => 'Dim',
	
		/* Mois de l'année en entier */
	
	   'January' => 'Janvier',
	   'February' => 'Février',
	   'March' => 'Mars',
	   'April' => 'Avril',
	   'May' => 'Mai',
	   'June' => 'Juin',
	   'July' => 'Juillet',
	   'August' => 'Août',
	   'September' => 'Septembre',
	   'October' => 'Octobre',
	   'November' => 'Novembre',
	   'December' => 'Décembre',
	
		/* Mois de l'année en 3 lettres */
	
	   'Jan' => 'Jan',
	   'Feb' => 'Fév',
	   'Mar' => 'Mar',
	   'Apr' => 'Avr',
	   'May' => 'Mai',
	   'Jun' => 'Juin',
	   'Jul' => 'Juil',
	   'Aug' => 'Aoû',
	   'Sep' => 'Sep',
	   'Oct' => 'Oct',
	   'Nov' => 'Nov',
	   'Dec' => 'Déc'
	
	);

   $jour = $traduction[date('l', $_timestamp)];
   $mois = $traduction[date('F', $_timestamp)];
   $jour_nb = date('d', $_timestamp);
   $annee = date('Y', $_timestamp);

   $date = $jour.' '.$jour_nb.' '.$mois.' '.$annee;

   return $date;

}





function Tronquer_Texte($texte, $longeur_max)
{
    if (strlen($texte) > $longeur_max)
    {
    $texte = substr($texte, 0, $longeur_max);
    $dernier_espace = strrpos($texte, " ");
    $texte = substr($texte, 0, $dernier_espace)."...";
    }
	$texte = ereg_replace("&nbsp;","",$texte);
    return $texte;
}
function check_email($email) {
	// RegEx begin
	$nonascii      = "\x80-\xff"; # Les caractères Non-ASCII ne sont pas permis

	$nqtext        = "[^\\\\$nonascii\015\012\"]";
	$qchar         = "\\\\[^$nonascii]";

	$protocol      = '(?:mailto:)';

	$normuser      = '[a-zA-Z0-9][a-zA-Z0-9_.-]*';
	$quotedstring  = "\"(?:$nqtext|$qchar)+\"";
	$user_part     = "(?:$normuser|$quotedstring)";

	$dom_mainpart  = '[a-zA-Z0-9][a-zA-Z0-9._-]*\\.';
	$dom_subpart   = '(?:[a-zA-Z0-9][a-zA-Z0-9._-]*\\.)*';
	$dom_tldpart   = '[a-zA-Z]{2,5}';
	$domain_part   = "$dom_subpart$dom_mainpart$dom_tldpart";

	$regex         = "$protocol?$user_part\@$domain_part";
	// RegEx end

	return preg_match("/^$regex$/",$email);
}


##### SUPPRESSION RECURSIVE DE FICHIER+REP ###############
function DeleteDirRecursive($resource, $path) {
	$result_message = "";
	$list = ftp_nlist ($resource, $path);
	if ( empty($list) ) {
		$list = RawlistToNlist( ftp_rawlist($resource, $path), $path . ( substr($path, strlen($path) - 1, 1) == "/" ? "" : "/" ) );
	}
	if ($list[0] != $path) {
		$path .= ( substr($path, strlen($path)-1, 1) == "/" ? "" : "/" );
		foreach ($list as $item) {
			if ($item != $path.".." && $item != $path.".") {
				$result_message .= DeleteDirRecursive($resource, $item);
			}
		}
		if (ftp_rmdir ($resource, $path)) {
			$result_message .= "Répertoire ".$path." supprimé avec succès<br />\n";
		} else {
			$result_message .= "Impossible de supprimer le répertoire ".$path." <br />\n";
		}
	}
	else {
		if (ftp_delete ($resource, $path)) {
			$result_message .= "Fichier ".$path." supprimé avec succès<br />\n";
		} else {
			$result_message .= "Impossible de supprimer le fichier ".$path." <br />\n";
		}
	}
	return $result_message;
}
function RawlistToNlist($rawlist, $path) {
	$array = array();
	foreach ($rawlist as $item) {
		$filename = trim(substr($item, 55, strlen($item) - 55));
		if ($filename != "." || $filename != "..") {
		$array[] = $path . $filename;
		}
	}
	return $array;
}
function list_modules($path, $name) {
	global $ArrModules;
	if ($dir = opendir("$path/$name")) {
		while($file = readdir($dir)){
			if(!in_array($file, array(".",".."))) {
				$chem = "$path".(($name == '')?'':"/$name");

				if(is_dir("$chem/$file")){
					$ArrModules[]=trim($file);
				}
			}
		}
		closedir($dir);
	}
}
function parseData($data){
	$_rows = split('
',$data);
	$aInti = array();
	$aData = array();
	foreach($_rows as $row=>$content){
// 		$RowContent = split(';',$content);
// 		foreach($RowContent as $field=>$val){
			$content = utf8_decode($content);
			$content = str_replace("?" , "'",$content);
			$content = trim(preg_replace("/\"(.*?)\"/i","$1",$content));
			if($content!=""){
				$aData[$row] = ereg_replace('^www.','',$content);
			}
// 		}
	}
	return $aData;
}

function doreadFile($file){
	$buffer = "";

	$fp = fopen($file,'r');
	while(!feof($fp))
		$buffer .= fgets($fp);
	fclose($fp);
	return $buffer;
}
?>