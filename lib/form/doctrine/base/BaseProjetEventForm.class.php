<?php

/**
 * ProjetEvent form base class.
 *
 * @method ProjetEvent getObject() Returns the current form's model object
 *
 * @package    Annuaire
 * @subpackage form
 * @author     Michael Muré
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProjetEventForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'date'        => new sfWidgetFormDate(),
      'commentaire' => new sfWidgetFormTextarea(),
      'type_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ProjetEventType'), 'add_empty' => false)),
      'membre_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Membre'), 'add_empty' => false)),
      'projet_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Projet'), 'add_empty' => false)),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'date'        => new sfValidatorDate(array('required' => false)),
      'commentaire' => new sfValidatorString(array('max_length' => 4000, 'required' => false)),
      'type_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ProjetEventType'))),
      'membre_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Membre'))),
      'projet_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Projet'))),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('projet_event[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProjetEvent';
  }

}
