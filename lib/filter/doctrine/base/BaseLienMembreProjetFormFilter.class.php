<?php

/**
 * LienMembreProjet filter form base class.
 *
 * @package    Annuaire
 * @subpackage filter
 * @author     Michael Muré
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseLienMembreProjetFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'role'        => new sfWidgetFormChoice(array('choices' => array('' => '', 'Chef de projet' => 'Chef de projet', 'Intervenant' => 'Intervenant', 'Commercial' => 'Commercial', 'Contact' => 'Contact', 'Redacteur' => 'Redacteur'))),
      'JEH'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'commentaire' => new sfWidgetFormFilterInput(),
      'projet_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Projet'), 'add_empty' => true)),
      'membre_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Membre'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'role'        => new sfValidatorChoice(array('required' => false, 'choices' => array('Chef de projet' => 'Chef de projet', 'Intervenant' => 'Intervenant', 'Commercial' => 'Commercial', 'Contact' => 'Contact', 'Redacteur' => 'Redacteur'))),
      'JEH'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'commentaire' => new sfValidatorPass(array('required' => false)),
      'projet_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Projet'), 'column' => 'id')),
      'membre_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Membre'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('lien_membre_projet_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'LienMembreProjet';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'role'        => 'Enum',
      'JEH'         => 'Number',
      'commentaire' => 'Text',
      'projet_id'   => 'ForeignKey',
      'membre_id'   => 'ForeignKey',
    );
  }
}
