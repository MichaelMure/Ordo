<?php
class Tools
{
  static public function addHtmlLinks($text)
  {
    $pattern = '/((http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?)/';
    $replacement = '<a href="$1">$1</a>';
    $text = preg_replace($pattern, $replacement, $text, 1, $count);
    if($count)
      return $text;
    
    $pattern = '/((\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?)/';
    $replacement = '<a href="http://$1">$1</a>';
    return preg_replace($pattern, $replacement, $text);
  }
  
  /**
   * Retourne l'année de la rentrée scolaire de l'année scolaire courante :
   * Si avant août, année - 1, sinon, année
  */
  public static function getAnneeCourante()
  {
    return (date("n") <= 8) ? (date("Y") - 1) : date("Y");
  }

}
