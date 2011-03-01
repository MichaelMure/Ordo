<?php

/**
 * Prospect form base class.
 *
 * @method Prospect getObject() Returns the current form's model object
 *
 * @package    Annuaire
 * @subpackage form
 * @author     Michael Muré
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProspectForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'nom'            => new sfWidgetFormInputText(),
      'contact'        => new sfWidgetFormInputText(),
      'fonction'       => new sfWidgetFormInputText(),
      'adresse'        => new sfWidgetFormInputText(),
      'ville'          => new sfWidgetFormInputText(),
      'cp'             => new sfWidgetFormInputText(),
      'tel_fixe'       => new sfWidgetFormInputText(),
      'tel_portable'   => new sfWidgetFormInputText(),
      'email'          => new sfWidgetFormInputText(),
      'site_web'       => new sfWidgetFormInputText(),
      'origine'        => new sfWidgetFormInputText(),
      'a_rappeler'     => new sfWidgetFormInputCheckbox(),
      'date_recontact' => new sfWidgetFormDate(),
      'commentaire'    => new sfWidgetFormTextarea(),
      'activite'       => new sfWidgetFormTextarea(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nom'            => new sfValidatorString(array('max_length' => 255)),
      'contact'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'fonction'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'adresse'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'ville'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cp'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'tel_fixe'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'tel_portable'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'site_web'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'origine'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'a_rappeler'     => new sfValidatorBoolean(array('required' => false)),
      'date_recontact' => new sfValidatorDate(array('required' => false)),
      'commentaire'    => new sfValidatorString(array('max_length' => 4000, 'required' => false)),
      'activite'       => new sfValidatorString(array('max_length' => 4000, 'required' => false)),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('prospect[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Prospect';
  }

}
