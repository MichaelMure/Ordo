<?php

/**
 * ProjetEvent form.
 *
 * @package    Annuaire
 * @subpackage form
 * @author     Michael Muré
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProjetEventForm extends BaseProjetEventForm
{
  public function configure()
  {
    unset(
      $this['created_at'],
      $this['updated_at']
    );

    $this->widgetSchema['projet_id'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['membre_id'] = new sfWidgetFormInputHidden();

    $this->widgetSchema['date'] = new sfWidgetFormJQueryDate(array(
      'image'=>'/images/calendar.png',
      'culture'=>'fr',
      'date_widget' => new sfWidgetFormDate(array('format' => '%day%/%month%/%year%')),
    ));
    $this->setValidator('date', new sfValidatorDate(array('max' => date('Y-m-d'))));
    $this->setDefault('date', date('Y-m-d'));
    
    $this->widgetSchema['type_id']->setLabel('Type (*)');
    $this->widgetSchema['date']->setLabel('Date (*)');
    $this->widgetSchema->moveField('type_id', sfWidgetFormSchema::FIRST);
    $this->widgetSchema->moveField('commentaire', sfWidgetFormSchema::LAST);
  }

  public function getJavascripts()
  {
    return array('jquery-1.4.2.min.js',
                 'jquery.ui.datepicker-fr.js',
                 'jquery-ui-1.8.1.custom.min.js');
  }
  
  public function getStylesheets()
  {
    return array('ui-lightness/jquery-ui-1.8.1.custom.css' => 'all');
  }
}
