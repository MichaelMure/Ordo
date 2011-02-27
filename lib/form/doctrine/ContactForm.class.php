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
    unset($this['created_at'], $this['updated_at']);
    
    $this->widgetSchema['type_contact_id'] = new sfWidgetFormDoctrineChoice(array(
      "expanded"     => true,
      "model"        => 'TypeContact',
    ));
    
    $this->widgetSchema['prospect_id']->setOption('renderer_class', 'sfWidgetFormDoctrineJQueryAutocompleter');
    $this->widgetSchema['prospect_id']->setOption('renderer_options', array(
      'model' => 'Prospect',
      'url'   => 'contact/ajax'
    ));

    $this->widgetSchema['date'] = new sfWidgetFormJQueryDate(array(
      'image'=>'/images/calendar.png',
      'culture'=>'fr',
      'date_widget' => new sfWidgetFormDate(array("format" => '%day%/%month%/%year%')),
    ));
  }
}
