<?php

/**
 * ProjetEventType filter form base class.
 *
 * @package    Annuaire
 * @subpackage filter
 * @author     Michael Muré
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseProjetEventTypeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'abreviation' => new sfWidgetFormFilterInput(),
      'description' => new sfWidgetFormFilterInput(),
      'ordre'       => new sfWidgetFormFilterInput(),
      'obligatoire' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'abreviation' => new sfValidatorPass(array('required' => false)),
      'description' => new sfValidatorPass(array('required' => false)),
      'ordre'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'obligatoire' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('projet_event_type_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProjetEventType';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'abreviation' => 'Text',
      'description' => 'Text',
      'ordre'       => 'Number',
      'obligatoire' => 'Number',
    );
  }
}
