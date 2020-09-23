<?php 

class Tools
{
	//utiliser cette fonction pour debugger
	public static function d($var){
		echo '<pre>'; print_r($var); die(); 
	}
	public static function str2url($string, $slug = '-', $extra = null)
	{
	  return strtolower(trim(preg_replace('~[^0-9a-z' . preg_quote($extra, '~') . ']+~i', $slug, self::unaccent($string)), $slug));
	}
	public static function unaccent($string) // normalizes (romanization) accented chars
	{
	    if (strpos($string = htmlentities($string, ENT_QUOTES, 'UTF-8'), '&') !== false) {
	        $string = html_entity_decode(preg_replace('~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|tilde|uml);~i', '$1', $string), ENT_QUOTES, 'UTF-8');
	    }

	    return $string;
	}
	public static function getLogo($logo)
	{
		$reldir = __DIR__."/../uploads/logo/";
		if (file_exists($reldir.$logo.".png")) {
			$img .= $logo.".png";
		}elseif (file_exists($reldir.$logo.".jpg")) {
			$img .= $logo.".jpg";
		} else {
			$img .= "logo_avatar.png";
		}
		$img = _SITE_URL_."uploads/logo/".$img;
		return $img;
	}
}