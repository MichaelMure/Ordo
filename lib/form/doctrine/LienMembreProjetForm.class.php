<?php

/**
 * LienMembreProjet form.
 *
 * @package    Annuaire
 * @subpackage form
 * @author     Michael Muré
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class LienMembreProjetForm extends BaseLienMembreProjetForm
{
  public function configure()
  {
    sfContext::getInstance()->getConfiguration()->loadHelpers('Url');

    $this->widgetSchema['projet_id'] = new sfWidgetFormInputHidden();
    
    $this->widgetSchema['membre_id']->setOption('renderer_class', 'sfWidgetFormDoctrineJQueryAutocompleter');
    $this->widgetSchema['membre_id']->setOption('renderer_options', array(
      'model' => 'Membre',
      'url'   => url_for('@annuaire?action=ajax')
    ));

    $this->widgetSchema->moveField('role', sfWidgetFormSchema::AFTER, 'membre_id');
    $this->widgetSchema->moveField('JEH', sfWidgetFormSchema::AFTER, 'role');
  }

  public function getJavascripts()
  {
    return array('jquery-1.4.2.min.js',
                 '/sfFormExtraPlugin/js/jquery.autocompleter.js');
  }
  
  public function getStylesheets()
  {
    return array('/sfFormExtraPlugin/css/jquery.autocompleter.css' => 'all');
  }
}
