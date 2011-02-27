<?php

/**
 * Contact form base class.
 *
 * @method Contact getObject() Returns the current form's model object
 *
 * @package    Annuaire
 * @subpackage form
 * @author     Michael Muré
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseContactForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'date'            => new sfWidgetFormDate(),
      'commentaire'     => new sfWidgetFormTextarea(),
      'prospect_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Prospect'), 'add_empty' => false)),
      'membre_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Membre'), 'add_empty' => false)),
      'type_contact_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TypeContact'), 'add_empty' => false)),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'date'            => new sfValidatorDate(),
      'commentaire'     => new sfValidatorString(array('max_length' => 4000, 'required' => false)),
      'prospect_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Prospect'))),
      'membre_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Membre'))),
      'type_contact_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TypeContact'))),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('contact[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Contact';
  }

}
