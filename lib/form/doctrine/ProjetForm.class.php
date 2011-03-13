<?php

/**
 * Projet form.
 *
 * @package    Annuaire
 * @subpackage form
 * @author     Michael Muré
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProjetForm extends BaseProjetForm
{
  public function configure()
  {
    sfContext::getInstance()->getConfiguration()->loadHelpers('Url');
    
    unset($this['created_at'],
          $this['updated_at'],
          $this['deleted_at']);
    
    $this->widgetSchema['date_debut'] = new sfWidgetFormJQueryDate(array(
      'image'=>'/images/calendar.png',
      'culture'=>'fr',
      'date_widget' => new sfWidgetFormDate(array('format' => '%day%/%month%/%year%')),
    ));
    $this->setValidator('date_debut', new sfValidatorDate(array('max' => date('Y-m-d'))));
    $this->setDefault('date_debut', date('Y-m-d'));

    $this->widgetSchema['date_cloture'] = new sfWidgetFormJQueryDate(array(
      'image'=>'/images/calendar.png',
      'culture'=>'fr',
      'date_widget' => new sfWidgetFormDate(array('format' => '%day%/%month%/%year%')),
    ));
    $this->setValidator('date_cloture', new sfValidatorDate(array('max' => date('Y-m-d'))));
    $this->setDefault('date_cloture', date('Y-m-d'));
    
    $this->widgetSchema['prospect_id']->setOption('renderer_class', 'sfWidgetFormDoctrineJQueryAutocompleter');
    $this->widgetSchema['prospect_id']->setOption('renderer_options', array(
      'model' => 'Prospect',
      'url'   => url_for('@prospect?action=ajax')
    ));

    $this->widgetSchema['respo_id']->setOption('renderer_class', 'sfWidgetFormDoctrineJQueryAutocompleter');
    $this->widgetSchema['respo_id']->setOption('renderer_options', array(
      'model' => 'Membre',
      'url'   => url_for('@annuaire?action=ajax')
    ));

    /*
    $autocompleteWidget = new sfWidgetFormChoice(array(
          'multiple'         => true,
          'choices'          => $this->getObject()->getParticipants(),
          'renderer_class'   => 'sfWidgetFormJQueryAutocompleter',
          'renderer_options' => array(
            'config' => '{
                json_url: "'.sfContext::getInstance()->getController()->genUrl('projet/autocomplete').'",
                json_cache: true,
                filter_hide: true,
                filter_selected: true,
                maxshownitems: 8        
              }')
        ));
    $this->widgetSchema['participants_list'] = $autocompleteWidget;*/

    $this->widgetSchema['numero']->setLabel('Numéro (*)');
    $this->widgetSchema['nom']->setLabel('Nom (*)');
    $this->widgetSchema['date_debut']->setLabel('Date de début (*)');
    $this->widgetSchema['date_cloture']->setLabel('Date de cloture');
    $this->widgetSchema['respo_id']->setLabel('Chef de projet (*)');
    $this->widgetSchema['prospect_id']->setLabel('Prospect (*)');
  }
  
  public function getJavascripts()
  {
    return array('jquery-1.4.2.min.js',
                 'jquery.ui.datepicker-fr.js',
                 'jquery.flot.selection.min.js',
                 'jquery.flot.min.js',
                 'jquery-ui-1.8.1.custom.min.js',
                 '/sfFormExtraPlugin/js/jquery.autocompleter.js');
  }
  
  public function getStylesheets()
  {
    return array('ui-lightness/jquery-ui-1.8.1.custom.css' => 'all',
                 '/sfFormExtraPlugin/css/jquery.autocompleter.css' => 'all');
  }
}

