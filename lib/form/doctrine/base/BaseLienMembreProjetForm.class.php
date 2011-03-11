<?php

/**
 * LienMembreProjet form base class.
 *
 * @method LienMembreProjet getObject() Returns the current form's model object
 *
 * @package    Annuaire
 * @subpackage form
 * @author     Michael Muré
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseLienMembreProjetForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'projet_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Projet'), 'add_empty' => false)),
      'membre_id' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'projet_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Projet'))),
      'membre_id' => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('lien_membre_projet[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'LienMembreProjet';
  }

}
