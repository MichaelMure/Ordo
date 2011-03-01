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
}
