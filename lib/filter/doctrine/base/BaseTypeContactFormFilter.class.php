<?php

/**
 * TypeContact filter form base class.
 *
 * @package    Annuaire
 * @subpackage filter
 * @author     Michael Muré
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTypeContactFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nom'  => new sfWidgetFormFilterInput(),
      'logo' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nom'  => new sfValidatorPass(array('required' => false)),
      'logo' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('type_contact_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TypeContact';
  }

  public function getFields()
  {
    return array(
      'id'   => 'Number',
      'nom'  => 'Text',
      'logo' => 'Text',
    );
  }
}
