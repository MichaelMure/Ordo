<?php

/**
 * Contact form.
 *
 * @package    Annuaire
 * @subpackage form
 * @author     Michael Muré
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ContactForm extends BaseContactForm
{
  public function configure()
  {
    sfContext::getInstance()->getConfiguration()->loadHelpers('Url');

    unset($this['created_at'], $this['updated_at']);

    $this->widgetSchema['type_contact_id'] = new sfWidgetFormDoctrineChoice(array(
      'expanded'     => true,
      'model'        => 'TypeContact',
    ));

    $this->widgetSchema['prospect_id']->setOption('renderer_class', 'sfWidgetFormDoctrineJQueryAutocompleter');
    $this->widgetSchema['prospect_id']->setOption('renderer_options', array(
      'model' => 'Prospect',
      'url'   => url_for('@prospect?action=ajax')
    ));

    $this->widgetSchema['membre_id']->setOption('renderer_class', 'sfWidgetFormDoctrineJQueryAutocompleter');
    $this->widgetSchema['membre_id']->setOption('renderer_options', array(
      'model' => 'Membre',
      'url'   => url_for('@annuaire?action=ajax')
    ));

    $this->widgetSchema['date'] = new sfWidgetFormJQueryDate(array(
      'image'=>'/images/calendar.png',
      'culture'=>'fr',
      'date_widget' => new sfWidgetFormDate(array('format' => '%day%/%month%/%year%')),
    ));
    $this->setValidator('date', new sfValidatorDate(array('max' => date('Y-m-d'))));
    $this->setDefault('date', date('Y-m-d'));


    $this->setWidget('a_recontacter', new sfWidgetFormChoice(array('choices' => array('Oui' => 'Oui', 'Non' => 'Non'))));
    $this->setValidator('a_recontacter', new sfValidatorChoice(array('choices' => array(0 => 'Oui', 1 => 'Non'))));


    $this->setWidget('date_recontact', new sfWidgetFormJQueryDate(array(
      'image'=>'/images/calendar.png',
      'culture'=>'fr',
      'date_widget' => new sfWidgetFormDate(array('format' => '%day%/%month%/%year%')),
    )));
    $this->setValidator('date_recontact', new sfValidatorDate());
    $this->setDefault('date_recontact', date('Y-m-d', strtotime('today +14 day')));
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
