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
      'role'      => new sfWidgetFormChoice(array('choices' => array('Intervenant' => 'Intervenant', 'Commercial' => 'Commercial', 'Contact' => 'Contact', 'Redacteur' => 'Redacteur'))),
      'projet_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Projet'), 'add_empty' => false)),
      'membre_id' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'role'      => new sfValidatorChoice(array('choices' => array(0 => 'Intervenant', 1 => 'Commercial', 2 => 'Contact', 3 => 'Redacteur'))),
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
