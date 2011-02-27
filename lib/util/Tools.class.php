<?php
class Tools
{
  static public function addHtmlLinks($text)
  {
    $pattern = '/((http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?)/';
    $replacement = '<a href="$1">$1</a>';
    return preg_replace($pattern, $replacement, $text);
  }
}