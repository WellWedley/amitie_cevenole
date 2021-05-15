<?php
## Envoi d'email HTML/Text
## v1.02 = 31/12/2008 ajout de piece jointe + accusé de reception + priorité
## v1.01 = 24/09/2008 importation de feuille de style css
## v1.00 = 17/09/2008 templates au format TPL
##
## utilisation :
/***********************************************

	$myEmail=new eMail("Mr Expediteur","expediteur@site.fr","destinataire@site.fr" [,"copie@site.fr"]);
	
	$myEmail->setTemplate("absolute_path/includes/mails", "commande" [,"fr"]);
	
	$myEmail->setSubject("sujet du mail");

	$myEmail->setBody( @array params() );

	$myEmail->setAttachement($_FILES); 

	@bool $result = $myEmail->send();  

************************************************/
class eMail{
    var $myReceptEmail;
    var $mySenderEmail;
    var $mySenderName;
    var $myTemplatePath;
    var $myTemplateName;
    var $mySubject;
    var $myBody;
    var $myHTMLContent;
    var $myTEXTContent;
 	var $myHeaders;
 	var $myCharset;
	var $myBccEmail;
	var $myBoundary;
	var $myParams;
	var $myAttachmentFile;
	var $myNotification;
	var $myPriority;
	
	function genBoundary(){
		$this->myBoundary = "_NextPart_".md5(uniqid(rand()));
    }
    function createHeaders(){
		$this->myHeaders	 = "From: ".$this->mySenderName."<".$this->mySenderEmail.">\n";
		$this->myHeaders	.= "Return-Path: <".$this->mySenderEmail.">\n";
		$this->myHeaders  	.= ($this->myBccEmail != '') ? "Bcc:".$this->myBccEmail."\n" : "";
		$this->myHeaders  	.= ($this->myNotification != '') ? "Disposition-Notification-To: ".$this->myNotification."\n" : "";
		$this->myHeaders  	.= "X-Sender: <".$this->mySenderEmail.">\n";
		$this->myHeaders  	.= "X-Mailer: PHP/".phpversion()."\n";
		$this->myHeaders	.= "X-Priority: ".$this->myPriority."\n";
		if(is_array($this->myAttachmentFile)){
			$attach_name = $this->myAttachmentFile['name'];
			$upload_file = $this->myAttachmentFile['tmp_name'];
			$ext = explode(".", basename($upload_file));
			switch($ext[1]) {
				default:
					$attach_type =  "application/octet-stream";
				break;
				case "gz":
				case "tgz":
					$attach_type =  "application/x-gzip";
				break;
				case "zip":
					$attach_type =  "application/zip";
				break;
				case "pdf":
					$attach_type =  "application/pdf";
				break;
				case "png":
					$attach_type =  "image/png";
				break;
				case "gif":
					$attach_type =  "image/gif";
				break;
				case "jpg":
				case "jpeg":
				case "pjpeg":
					$attach_type =  "image/jpeg";
				break;
				case "txt":
					$attach_type =  "text/plain";
				break;
				case "htm":
				case "html":
					$attach_type =  "text/html";
				break;
			}
			if (file_exists($upload_file)) {
				$file = fopen($upload_file, "r");
				$contents = fread($file, filesize($upload_file));
				$encoded_attach = chunk_split(base64_encode($contents));
				fclose($file);
			}
			$this->myAttachmentFile = array('file'=>$upload_file,'type'=>$attach_name,'name'=>$attach_type,'base64'=>$encoded_attach);
			$this->myHeaders	.= "X-attachments: ".$attach_name."\n";
		}
		$this->myHeaders  	.= "MIME-Version: 1.0\n";
		$this->myHeaders  	.= "Content-Type: multipart/alternative; boundary=\"".$this->myBoundary."\";\n\n";
    }
	function table2txt($table_html){
		$search = array(
			'@<table[^>]*?>@si'=>"",
			'@<th[^>]*?>@si'=>"",
			'@</th></tr>@si'=>"\t|\t\n------------------------------------------------------------------------------------\t\n",
			'@</th>@si'=>"\t|\t",
			'@<td[^>]*?>@si'=>"",
			'@</td>@si'=>"\t|\t",
			'@<tr[^>]*?>@si'=>"",
			'@</tr>@si'=>"\n",
			'@<br>@si'=>" ",
			'@</table>@si'=>"------------------------------------------------------------------------------------\t\n"
		);
		foreach($search as $k=>$e){
			$patterns[] = $k;
			$replacements[] = $e;
		}
		$table_text = preg_replace($patterns, $replacements, $table_html);
		return $table_text;
	}
	function html2txt($str_html){
		$search = array(
			'@<br[^>]*?>@si'=>"\n",
			'@<hr[^>]*?>@si'=>"\n"
		);
		foreach($search as $k=>$e){
			$patterns[] = $k;
			$replacements[] = $e;
		}
		$str_text = preg_replace($patterns, $replacements, $str_html);
		$str_text = preg_replace('/\<a(.*?)href\=\"(.*?)\"(.*?)\>(.*?)\<\/a\>/si', '\\2', $str_text);
		$str_text = ereg_replace("&euro;","Euro",$str_text);
		$str_text = html_entity_decode(strip_tags($str_text));
		return $str_text;
	}
	function parseBody($format,$params){
		$fp = fopen($this->myTemplatePath,"r");
		$buffer = "";
		while(!feof($fp)){
			$buffer .= fgets($fp,4096);
		}
		fclose($fp);
		$format = strtoupper($format);
		$aBuffer = split("<!--BEGIN TEMPLATE_".$format."-->",$buffer);
		$firstpart = $aBuffer[1];
		$aBuffer = split("<!--END TEMPLATE_".$format."-->",$firstpart);
		$body_mail = $aBuffer[0];
		foreach($params as $k=>$e){
			$patterns[] = "/\{(".$k.")\}/i";
			$rep_str = (($format=="TEXT")AND(ereg('^TAB_',$k))) ? $this->table2txt($e) : $e;
			$replacements[] = ($format=="TEXT") ? $this->html2txt($rep_str) : $rep_str;
		}
// 		$patterns[] = "/\{CHARSET\}/i";
// 		$replacements[] = ($params['CHARSET']!="")?$params['CHARSET'] : $this->myCharset ;
		$this->Css_path = ereg_replace($this->myTemplateName.'.tpl$','mails.css',$this->myTemplatePath);
		$fp = fopen($this->Css_path,"r");
		$buffer = "";
		while(!feof($fp)){
			$buffer .= fgets($fp,4096);
		}
		fclose($fp);
		$patterns[] = "/\{IMPORT_CSS\}/i";
		$replacements[] = '<style type="text/css"><!-- '.$buffer.' --></style>';
		$completed_mail = preg_replace($patterns,$replacements,$body_mail);
		return $completed_mail;
	}
	function parseMail(){
		$this->myHTMLContent	=	$this->parseBody("html",$this->myParams);
   		$this->myTEXTContent	=	$this->parseBody("text",$this->myParams);
		$this->myBody  = "";
		$this->myBody .= "\n";
		$this->myBody .= "--".$this->myBoundary;
		$this->myBody .= "\n";
		$this->myBody .= "Content-Type: text/plain; charset=\"".$this->myCharset."\";\n\n";
		$this->myBody .= $this->myTEXTContent;
		$this->myBody .= "\n";
		$this->myBody .= "--".$this->myBoundary;
		$this->myBody .= "\n";
		$this->myBody .= "Content-type: text/html; charset=\"".$this->myCharset."\";\n\n";
		$this->myBody .= $this->myHTMLContent;
		$this->myBody .= "\n";
		$this->myBody .= "--" . $this->myBoundary;
		if(is_array($this->myAttachmentFile)){
			$this->myBody .= "Content-type: ".$this->myAttachmentFile['type']."; name=\"".$this->myAttachmentFile['name']."\"\n";
			$this->myBody .= "Content-Length: " . filesize($this->myAttachmentFile['file']) . "\n";
			$this->myBody .= "Content-transfer-Encoding: BASE64\n";
			$this->myBody .= "Content-disposition: attachment; filename=\"".$this->myAttachmentFile['name']."\"\n\n";
			$this->myBody .= "".$this->myAttachmentFile['base64']."\n";
			$this->myBody .= "--" . $this->myBoundary;
		}
		$this->myBody .= "--";
		return $this->myBody;
	}
    function eMail($SenderName,$SenderEmail,$ReceptEmail,$BccEmail="") {
		$this->setSender($SenderName,$SenderEmail);
		$this->setRecept($ReceptEmail);
		$this->setBcc($BccEmail);
		$this->setCharset();
		$this->genBoundary();
		$this->setAttachement();
		$this->setNotification();
		$this->setPriority();
		$this->createHeaders();
    }
    function setSender($SenderName,$SenderEmail){
    	$this->mySenderName = $SenderName;
    	$this->mySenderEmail = $SenderEmail;
    }
    function setRecept($ReceptEmail){
    	$this->myReceptEmail = $ReceptEmail;
    }
    function setBcc($BccEmail){
    	$this->myBccEmail = ($BccEmail!='')?$BccEmail:'';
    }
    function setCharset($charset="ISO-8859-15"){
    	$this->myCharset = $charset;
    }
    function setTemplate($path,$template,$lang="fr"){
    	$this->myTemplateName = $template;
    	$this->myTemplatePath = $path."/".$lang."/".$template.".tpl";
    }
    function setAttachement($AttachementFile=""){
    	$this->myAttachementFile = $AttachementFile;
    }
    function setNotification($NotificationAddress=""){
    	$this->myNotification = $NotificationAddress;
    }
    function setPriority($Priority=5){
    	$this->myPriority = $Priority;
    }
    function setSubject($Subject){
    	$this->mySubject = $Subject;
    }
    function setBody($ParamsBody){
    	$this->myParams = $ParamsBody;
    }
	function send(){
		return mail($this->myReceptEmail, $this->mySubject, $this->parseMail(), $this->myHeaders);
	}
//     public function __destruct() {}
}
?>