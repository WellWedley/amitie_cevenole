<?php
## Traitement des images, cr�ation des miniatures, rotation...
## v1.01 = 20/03/2008
## 
## utilisation :
/***********************************************
// instanciation de la classe
$myImg=new oxImg();

// fichier � traiter
$myImg->setSrc('input_dir/file.jpg');

// nom du fichier de sortie
$myImg->setDest("output_dir/file.jpg");

// taille en pixel du fichier apr�s traitement
$myImg->setSize(400,400);

// qualit� de compression jpeg (facultatif, 70 par d�faut)
#$myImg->setQlte(70);

// angle de rotation de l'image (0;90;180;270) (facultatif, 0 par d�faut)
#$myImg->setRotation(0);

// true = force l'ecrasement du fichier, false = ne fait rien si le fichier existe d�j� (facultatif, false par d�faut)
#$myImg->overWrite(true);

// mode verbose (facultatif, false par d�faut)
#$myImg->verbose(false);

// exportation du ficher et affichage du r�sultat
$result = $myImg->Output();
************************************************/
ini_set("memory_limit","512M");
class oxImg{
    var $mySrc;
    var $mySrcPack;
    var $myDest;
	var $myQlte;
	var $overWrite;
	var $verbose;
	var $myRotation;
	
    function oxImg() {
		$this->mySrc=null;
		$this->mySrcPack=array();
		$this->myDest=null;
		$this->myQlte=100;
		$this->overWrite=true;
		$this->verbose=false;
		$this->myRotation=0;
    }
    //function __destruct() {}
    
    function fileExist($file) {
        return(file_exists($file))? true : false;
    }
    function fileType($file) {
    	return strtolower(pathinfo($file, PATHINFO_EXTENSION));
    }
    function imgGetSize($file) {
    	return getimagesize($file);
    }
    function imgResize($file,$maxWidth,$maxHeight,$Dest,$Qlte,$Rotation) {
		$inputSize = $this->imgGetSize($file);
		$Width = $maxWidth;
		$Height =  $maxHeight;
		$nWidth = $inputSize[0];
		$nHeight =  $inputSize[1];
		$Ext = $this->fileType($file);
		switch($Ext){
			case "jpg":
			case "jpeg":
			case "pjpeg":
				$big = imagecreatefromjpeg($file);
			break;
			case "gif":
				$big = imagecreatefromgif($file);
			break;
			case "png":
				$big = imagecreatefrompng($file);
			break;
		}
		if($Rotation!=0){
			$big = imagerotate($big,$Rotation, 0);
			if(($Rotation==90)OR($Rotation==270)){
				$Width = $maxHeight;
				$Height =  $maxWidth;
				$nWidth = $inputSize[1];
				$nHeight = $inputSize[0];
			}
		}
		$thumb = imagecreatetruecolor($Width,$Height);
		imagecopyresampled($thumb,$big,0,0,0,0,$Width,$Height,$nWidth,$nHeight);
		switch($Ext){
			case "jpg":
			case "jpeg":
			case "pjpeg":
				imagejpeg($thumb,$Dest,$Qlte);
			break;
			case "gif":
				imagegif($thumb,$Dest,$Qlte);
			break;
			case "png":
				imagepng($thumb,$Dest,$Qlte);
			break;
		}
		imagedestroy($thumb);
		imagedestroy($big);
    }
    function calcSize($MaxWidth,$MaxHeight,$_size='') {
    	$Size = (is_array($_size)) ? $_size : $this->imgGetSize($this->mySrc);
		$inputWidth = $Size[0];
		$inputHeight = $Size[1];
		$outputWidth = $MaxWidth;
		$outputHeight = $MaxHeight;
		if($inputWidth > $outputWidth){
			$Coef = $inputWidth/$outputWidth;
			$w = $outputWidth;
			$h = $inputHeight/$Coef;
			$this->calcSize($MaxWidth,$MaxHeight,array($w,$h));
		}elseif($inputHeight > $outputHeight){
			$Coef = $inputHeight/$outputHeight;
			$h = $outputHeight;
			$w = $inputWidth/$Coef;
			$this->calcSize($MaxWidth,$MaxHeight,array($w,$h));
		}else{
			$this->Width = $inputWidth;
			$this->Height = $inputHeight;
		}
    }
    function setSrc($src) {
    	$this->mySrc=$src;
    }
    function setSrcPack($src) {
    	$this->mySrcPack[]=$src;
    }
    function setDest($dest) {
    	$this->myDest=$dest;
    }
    function setQlte($qlte) {
    	$this->myQlte=$qlte;
    }
    function overWrite($bool) {
		$this->overWrite=$bool;
    }
    function verbose($bool) {
		$this->verbose=$bool;
    }
    function setRotation($rotation) {
    	$this->myRotation=$rotation;
    }
 	function setSize($MaxWidth,$MaxHeight){
		$this->maxWidth = $MaxWidth;
		$this->maxHeight = $MaxHeight;
 	}
 	function thumbs($cadre){
 		$file = $this->mySrc;
// 		$cadre="templates/images/cadre_thumb.png";
		$thumb = imagecreatetruecolor (80,240);
		$couleur_fond = imagecolorallocate ($thumb, 255, 255, 255) ;
		imagefill($thumb, 0, 0, $couleur_fond);
		$orig_size = getimagesize($file);
		$big = imagecreatefromjpeg($file);
		$height=150;
		$ratio = $orig_size[1]/$height;
		$width= $orig_size[0]/$ratio;
		$marginleft = (80-$width)/2;
		$margintop = (80-$height)/2;
		imagecopyresampled($thumb,$big,$marginleft,$margintop,0,0,$width,$height,$orig_size[0],$orig_size[1]);
		imagecopyresampled($thumb,$big,$marginleft,($margintop+160),0,0,$width,$height,$orig_size[0],$orig_size[1]);
		$cadre = imagecreatefrompng($cadre);
		imagecopyresampled($thumb,$cadre,0,0,0,0,80,240,80,240);
		imagepng ($thumb,$this->myDest);

 	}
 	function thumbs_prod($cadre){
 		$file = $this->mySrc;
// 		$cadre="templates/images/cadre_thumb.png";
		$thumb = imagecreatetruecolor (80,240);
		$couleur_fond = imagecolorallocate ($thumb, 255, 255, 255) ;
		imagefill($thumb, 0, 0, $couleur_fond);
 		$orig_size = getimagesize($file);
		$big = imagecreatefromjpeg($file);
// 		$height=75;
// 		$ratio = $orig_size[1]/$height;
// 		$width= $orig_size[0]/$ratio;

		$this->calcSize(75,75);

		$marginleft = (80-$this->Width)/2;
		$margintop = ($this->Height<75) ? ((80-$this->Height)/2) : 0;
		imagecopyresampled($thumb,$big,$marginleft,$margintop,0,0,$this->Width,$this->Height,$orig_size[0],$orig_size[1]);
		imagecopyresampled($thumb,$big,$marginleft,($margintop+160),0,0,$this->Width,$this->Height,$orig_size[0],$orig_size[1]);

// 		$marginleft = (80-$width)/2;
// 		$margintop = ($height<75) ? ((80-$height)/2) : 0;
// 		imagecopyresampled($thumb,$big,$marginleft,$margintop,0,0,$width,$height,$orig_size[0],$orig_size[1]);
// 		imagecopyresampled($thumb,$big,$marginleft,($margintop+160),0,0,$width,$height,$orig_size[0],$orig_size[1]);

		
		$cadre = imagecreatefrompng($cadre);
		imagecopyresampled($thumb,$cadre,0,0,0,0,80,240,80,240);
		imagepng ($thumb,$this->myDest);

 	}
 	function thumbs_team($MaxWidth,$MaxHeight){
 		$file = $this->mySrc;
 		$inputSize = $this->imgGetSize($file);
		$this->calcSize($MaxWidth,$MaxHeight,$inputSize);
		$thumb = imagecreatetruecolor ($this->Width,$this->Height);
		$couleur_fond = imagecolorallocate ($thumb, 255, 255, 255) ;
		imagefill($thumb, 0, 0, $couleur_fond);
		$big = imagecreatefromjpeg($file);

		imagecopyresampled($thumb,$big,0,0,0,0,$this->Width,$this->Height,$inputSize[0],$inputSize[1]);

		imagepng ($thumb);

 	}
 	function thumbs_direct($MaxWidth,$MaxHeight,$flag=''){
//  		global $Config;
 		$file = $this->mySrc;
//  		switch($flag){
// 			default:
// 				$cadre="";
// 			break;
// 			case "new":
// 				$cadre=$Config['ROOT_PATH']."/templates/".$Config['SKIN']."/images/band-mini_nouveaute.png";
// 			break;
// 			case "promo":
// 				$cadre=$Config['ROOT_PATH']."/templates/".$Config['SKIN']."/images/band-mini_promotion.png";
// 			break;
// 			case "pack":
// 				$cadre=$Config['ROOT_PATH']."/templates/".$Config['SKIN']."/images/band-mini_pack.png";
// 			break;
//  		}
//  		echo $Config['ROOT_PATH']."/templates/".$Config['SKIN']."/images/band-mini_nouveaute.png";
		$thumb = imagecreatetruecolor ($MaxWidth,$MaxHeight);
		$couleur_fond = imagecolorallocate ($thumb, 255, 255, 255) ;
		imagefill($thumb, 0, 0, $couleur_fond);
 		$orig_size = getimagesize($file);
		$big = imagecreatefromjpeg($file);
// 		$height=75;
// 		$ratio = $orig_size[1]/$height;
// 		$width= $orig_size[0]/$ratio;

		$this->calcSize($MaxWidth,$MaxHeight);

		$marginleft = ($MaxWidth-$this->Width)/2;
		$margintop = ($this->Height<$MaxHeight) ? (($MaxHeight-$this->Height)/2) : 0;
		imagecopyresampled($thumb,$big,$marginleft,$margintop,0,0,$this->Width,$this->Height,$orig_size[0],$orig_size[1]);
// 		imagecopyresampled($thumb,$big,$marginleft,($margintop+160),0,0,$this->Width,$this->Height,$orig_size[0],$orig_size[1]);
		if($flag!=''){
			$cadre = imagecreatefrompng($flag);
			$cW = $cH = (floor($MaxWidth/3) < 86) ? floor($MaxWidth/3) : 86;
			imagecopyresampled($thumb,$cadre,0,0,0,0,$cW,$cH,86,86);
		}
// 		$marginleft = (80-$width)/2;
// 		$margintop = ($height<75) ? ((80-$height)/2) : 0;
// 		imagecopyresampled($thumb,$big,$marginleft,$margintop,0,0,$width,$height,$orig_size[0],$orig_size[1]);
// 		imagecopyresampled($thumb,$big,$marginleft,($margintop+160),0,0,$width,$height,$orig_size[0],$orig_size[1]);

// 		imagecopyresampled($thumb,$cadre,0,0,0,0,80,240,80,240);
		imagepng ($thumb);

 	}
 	function logo_direct($MaxWidth,$MaxHeight){
//  		global $Config;
 		$file = $this->mySrc;
//  		switch($flag){
// 			default:
// 				$cadre="";
// 			break;
// 			case "new":
// 				$cadre=$Config['ROOT_PATH']."/templates/".$Config['SKIN']."/images/band-mini_nouveaute.png";
// 			break;
// 			case "promo":
// 				$cadre=$Config['ROOT_PATH']."/templates/".$Config['SKIN']."/images/band-mini_promotion.png";
// 			break;
// 			case "pack":
// 				$cadre=$Config['ROOT_PATH']."/templates/".$Config['SKIN']."/images/band-mini_pack.png";
// 			break;
//  		}
//  		echo $Config['ROOT_PATH']."/templates/".$Config['SKIN']."/images/band-mini_nouveaute.png";
		$big = imagecreatefromgif($file);
		$thumb = imagecreatetruecolor ($MaxWidth,$MaxHeight);
		// on obtient une couleur
		$start_x = 1;
		$start_y = 1;
		$color_index = imagecolorat($big, $start_x, $start_y);
		$color_tran = imagecolorsforindex($big, $color_index);
		$couleur_fond = imagecolorallocate ($thumb, $color_tran['red'],$color_tran['green'],$color_tran['blue']) ;
		imagefill($thumb, 0, 0, $couleur_fond);
 		$orig_size = getimagesize($file);
// 		$height=75;
// 		$ratio = $orig_size[1]/$height;
// 		$width= $orig_size[0]/$ratio;

		$this->calcSize($MaxWidth,$MaxHeight);
		$marginleft = ($MaxWidth-$this->Width)/2;
		$margintop = ($this->Height<$MaxHeight) ? (($MaxHeight-$this->Height)/2) : 0;
		imagecopyresampled($thumb,$big,$marginleft,$margintop,0,0,$this->Width,$this->Height,$orig_size[0],$orig_size[1]);
// 		imagecopyresampled($thumb,$big,$marginleft,($margintop+160),0,0,$this->Width,$this->Height,$orig_size[0],$orig_size[1]);
// 		$marginleft = (80-$width)/2;
// 		$margintop = ($height<75) ? ((80-$height)/2) : 0;
// 		imagecopyresampled($thumb,$big,$marginleft,$margintop,0,0,$width,$height,$orig_size[0],$orig_size[1]);
// 		imagecopyresampled($thumb,$big,$marginleft,($margintop+160),0,0,$width,$height,$orig_size[0],$orig_size[1]);

// 		imagecopyresampled($thumb,$cadre,0,0,0,0,80,240,80,240);
		imagegif ($thumb);
 	}
 	function logo_cache($MaxWidth,$MaxHeight){
 		$file = $this->mySrc;
		$big = imagecreatefromgif($file);
		$thumb = imagecreatetruecolor ($MaxWidth,$MaxHeight);
		$start_x = 1;
		$start_y = 1;
		$color_index = imagecolorat($big, $start_x, $start_y);
		$color_tran = imagecolorsforindex($big, $color_index);
		$couleur_fond = imagecolorallocate ($thumb, $color_tran['red'],$color_tran['green'],$color_tran['blue']) ;
		imagefill($thumb, 0, 0, $couleur_fond);
 		$orig_size = getimagesize($file);
		$this->calcSize($MaxWidth,$MaxHeight);
		$marginleft = ($MaxWidth-$this->Width)/2;
		$margintop = ($this->Height<$MaxHeight) ? (($MaxHeight-$this->Height)/2) : 0;
		imagecopyresampled($thumb,$big,$marginleft,$margintop,0,0,$this->Width,$this->Height,$orig_size[0],$orig_size[1]);
		imagegif ($thumb,$this->myDest);
 	}
 	function product_cache($MaxWidth,$MaxHeight){

 		$file = $this->mySrc;
		$thumb = imagecreatetruecolor ($MaxWidth,$MaxHeight);
		$couleur_fond = imagecolorallocate ($thumb, 255, 255, 255) ;
		imagefill($thumb, 0, 0, $couleur_fond);
 		$orig_size = getimagesize($file);
		$big = imagecreatefromjpeg($file);
		$this->calcSize($MaxWidth,$MaxHeight);
		$marginleft = ($MaxWidth-$this->Width)/2;
		$margintop = ($this->Height<$MaxHeight) ? (($MaxHeight-$this->Height)/2) : 0;
		imagecopyresampled($thumb,$big,$marginleft,$margintop,0,0,$this->Width,$this->Height,$orig_size[0],$orig_size[1]);
		if($flag!=''){
			$cadre = imagecreatefrompng($flag);
			if(ereg('closebox',$flag)){
				$cW = $cH = 30;
				imagecopyresampled($thumb,$cadre,($MaxWidth-$cW),0,0,0,$cW,$cH,30,30);
			}else{
				$cW = $cH = (floor($MaxWidth/3) < 38) ? floor($MaxWidth/3) : 38;
				imagecopyresampled($thumb,$cadre,0,($MaxHeight-$cH),0,0,$cW,$cH,68,68);
			}

		}
		imagejpeg ($thumb,$this->myDest,$this->myQlte);

 	}
	
	
	
	
 	function image_cache($MaxWidth,$MaxHeight){
		global $Config;
 		$file = $this->mySrc;
 		$orig_size = getimagesize($file);









		$this->calcSize($MaxWidth,$MaxHeight);
		$Width = $this->Width;
		$Height = $this->Height;
		
		$thumb = imagecreatetruecolor ($Width,$Height);
		$couleur_fond = imagecolorallocate ($thumb, 255, 255, 255) ;
		imagefill($thumb, 0, 0, $couleur_fond);
		$big = imagecreatefromjpeg($file);

		
		imagecopyresampled($thumb,$big,0,0,0,0,$this->Width,$this->Height,$orig_size[0],$orig_size[1]);
		
		

	
			//fix photos taken on cameras that have incorrect
			//dimensions
			$exif = exif_read_data($file);
	
			//get the orientation
			$ort = $exif['Orientation'];
	
			//determine what oreientation the image was taken at
			switch($ort)
		    {
	
		        case 2: // horizontal flip
	
		           // $this->ImageFlip($dimg);
	
		        	break;
	
		        case 3: // 180 rotate left
	
		            $thumb = imagerotate($thumb, 180, -1);
	
		        	break;
	
		        case 4: // vertical flip
	
		            //$this->ImageFlip($dimg);
	
		       		break;
	
		        case 5: // vertical flip + 90 rotate right
	
		            //$this->ImageFlip($destinationImage);
	
		            $thumb = imagerotate($thumb, -90, -1);
	
		        	break;
	
		        case 6: // 90 rotate right
	
		            $thumb = imagerotate($thumb, -90, -1);
	
		        	break;
	
		        case 7: // horizontal flip + 90 rotate right
	
		            //$this->ImageFlip($destinationImage);
	
		            $thumb = imagerotate($thumb, -90, -1);
	
		        	break;
	
		        case 8: // 90 rotate left
	
		            $thumb = imagerotate($thumb, 90, -1);
	
		        	break;
	
		    }

			
		
		
		
		
		
		
		
		if(($Width>200)AND($Height>200)){
			$flag = imagecreatefrompng($Config['ROOT_PATH'].'templates/images/imgFlagBig.png');
			imagecopyresampled($thumb,$flag,($Width-179),($Height-179),0,0,179,179,179,179);
		}
		imagejpeg ($thumb,$this->myDest,100);

 	}
	
	
	
	
	
	
	




 	function pack_cache($MaxWidth,$MaxHeight,$flag){

 		$files = $this->mySrcPack;
		$nb_img = count($files);
		$thumb = imagecreatetruecolor ($MaxWidth,$MaxHeight);
		$couleur_fond = imagecolorallocate ($thumb, 255, 255, 255) ;
		imagefill($thumb, 0, 0, $couleur_fond);
		if($nb_img>3){
			$r=0;
			$c=0;
			$_itemwidth = floor($MaxWidth/ceil($nb_img/2));
			foreach($files as $k=>$e){
				$orig_size = getimagesize($e);
				$big = imagecreatefromjpeg($e);
				$this->calcSize($_itemwidth,($MaxHeight/2),$orig_size);
				$margintop = round($r*($MaxHeight/2));
				$marginleft = round($c*$_itemwidth);
				
				imagecopyresampled($thumb,$big,$marginleft,$margintop,0,0,$this->Width,$this->Height,$orig_size[0],$orig_size[1]);
				imagedestroy($big);
				$c++;
				if($c==2){
					$r++;
					$c=0;
				}
				
			}
		}else{
			$_itemwidth = floor($MaxWidth/$nb_img);
			foreach($files as $k=>$e){
				$orig_size = getimagesize($e);
				$big = imagecreatefromjpeg($e);
				$this->calcSize($_itemwidth,$MaxHeight,$orig_size);
				$margintop = ($this->Height<$MaxHeight) ? (($MaxHeight-$this->Height)/2) : 0;
				imagecopyresampled($thumb,$big,round($k*$_itemwidth),$margintop,0,0,$this->Width,$this->Height,$orig_size[0],$orig_size[1]);
				imagedestroy($big);
			}
		}


		if($flag!=''){
			$cadre = imagecreatefrompng($flag);
			if(ereg('closebox',$flag)){
				$cW = $cH = 30;
				imagecopyresampled($thumb,$cadre,($MaxWidth-$cW),0,0,0,$cW,$cH,30,30);
			}else{
				$cW = $cH = (floor($MaxWidth/3) < 38) ? floor($MaxWidth/3) : 38;
				imagecopyresampled($thumb,$cadre,0,($MaxHeight-$cH),0,0,$cW,$cH,68,68);
			}
		}

		imagejpeg ($thumb,$this->myDest,$this->myQlte);

 	}








 	
 	function team_cache($MaxWidth,$MaxHeight){
 		$file = $this->mySrc;
 		$inputSize = $this->imgGetSize($file);
		$this->calcSize($MaxWidth,$MaxHeight,$inputSize);
		$thumb = imagecreatetruecolor ($this->Width,$this->Height);
		$couleur_fond = imagecolorallocate ($thumb, 255, 255, 255) ;
		imagefill($thumb, 0, 0, $couleur_fond);
		$big = imagecreatefromjpeg($file);
		imagecopyresampled($thumb,$big,0,0,0,0,$this->Width,$this->Height,$inputSize[0],$inputSize[1]);
		imagejpeg ($thumb,$this->myDest,$this->myQlte);
 	}

 	
 	function FlashZoom($MaxWidth,$MaxHeight){
 		$file = $this->mySrc;
// 		$cadre="templates/images/cadre_thumb.png";
		$thumb = imagecreatetruecolor ($MaxWidth,$MaxHeight);
		$couleur_fond = imagecolorallocate ($thumb, 255, 255, 255) ;
		imagefill($thumb, 0, 0, $couleur_fond);
		$orig_size = getimagesize($file);
		$big = imagecreatefromjpeg($file);
		$height=$MaxHeight;
		$ratio = $orig_size[1]/$height;
		$width= $orig_size[0]/$ratio;
		$marginleft = ($MaxWidth-$width)/2;
		$margintop = ($MaxHeight-$height)/2;
		imagecopyresampled($thumb,$big,$marginleft,$margintop,0,0,$width,$height,$orig_size[0],$orig_size[1]);;
		imagepng ($thumb,$this->myDest);

 	}
    function Output() {
		if ($this->mySrc!=null) {
			if ($this->myDest!=null) {
				if(!$this->fileExist($this->myDest) OR ($this->overWrite==true)){
					$this->calcSize($this->maxWidth,$this->maxHeight);
					$this->imgResize($this->mySrc,$this->Width,$this->Height,$this->myDest,100,0);
					return ($this->verbose==true)? printDefine('image_edit_success',__LANG__,array('FILENAME'=>$this->myDest)):"";
				}else{
					return ($this->verbose==true)? printDefine('image_edit_file_exist',__LANG__,''):"";
				}
			}else {
				return ($this->verbose==true)? printDefine('image_edit_missing_dir',__LANG__,''):"";
			}
		}else{
			return ($this->verbose==true)? printDefine('image_edit_missing_file',__LANG__,''):"";
		}
    }
    
}
?>