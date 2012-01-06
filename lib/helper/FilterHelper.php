<?php

function filter_link_to($sText, $mUrl, $sFilterValue = null, array $aParams = null, $sFilterName = 'filter')
{
  $aFilterValues = array();
  $array = null;
  $isactive = true;

  foreach( (array) $sFilterValue as $key => $value )
    if( is_object($value) ) {
      $array = explode('-', $value->getParameter($sFilterName));
      unset($sFilterValue[$key]);
    }

  if( $array )
  {
    $allIsIn = true;

    // On vérifie que toutes les valeurs sont dans l'URL
    $aFilterValues = $array;
    foreach( (array) $sFilterValue as $value )
      if( !in_array($value, $array) )
        $allIsIn = false;

    if( $allIsIn )
    {
      // Alors, on fait la différence des deux arrays (on vide celui de l'URL)
      $isactive = true;
      $aFilterValues = array_diff($aFilterValues, $sFilterValue);
    }
    else
    {
      // Sinon, on ajoute.
      $isactive = false;
      foreach( (array) $sFilterValue as $value )
        $aFilterValues[$value] = $value;
    }
  }
  else
  {
    $isactive = false;
    $aFilterValues = (array) $sFilterValue;
  }

  $aFilterValues = array_unique($aFilterValues);

  foreach( $aFilterValues as $key => $val )
    if( $val === '' )
      unset($aFilterValues[$key]);

  sort($aFilterValues);

  if( count($aFilterValues) )
    $mUrl .= (strpos($mUrl, '?') !== false ? '&' : '?') . $sFilterName . '=' . urlencode(implode('-', $aFilterValues));// . '+' . count($aFilterValues);


  $aParams = array_merge(array('class' => 'filter' . ($isactive ? ' active' : null)), (array) $aParams);
  return link_to($sText, $mUrl, $aParams);
}



Class FilterHelper
{
  private $oO;
  private $aFunctions = array();

  public function __construct(sfWebRequest $request, $sNameParameter = 'filter', $sSeparator = '-')
  {
    $this->oO = explode($sSeparator, $request->getParameter($sNameParameter));

    $this->add('default', function() { return 'Filtre inconnu'; });
  }

  public function add($saFilterValue, $cFunction)
  {
    foreach( (array) $saFilterValue as $sName )
      $this->aFunctions[$sName] = $cFunction;
  }

  public function execute()
  {
    foreach( $this->oO as $sName )
      if( isset($this->aFunctions[$sName]) )
        $this->aFunctions[$sName]();
      else
        $this->aFunctions['default']();
  }
}
