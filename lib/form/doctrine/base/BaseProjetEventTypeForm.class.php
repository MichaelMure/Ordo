<?php

/**
 * ProjetEventType form base class.
 *
 * @method ProjetEventType getObject() Returns the current form's model object
 *
 * @package    Annuaire
 * @subpackage form
 * @author     Michael Muré
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProjetEventTypeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'abreviation' => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormInputText(),
      'ordre'       => new sfWidgetFormInputText(),
      'obligatoire' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'abreviation' => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'description' => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'ordre'       => new sfValidatorInteger(array('required' => false)),
      'obligatoire' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('projet_event_type[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProjetEventType';
  }

}
