<?php

/**
 * Membre form base class.
 *
 * @method Membre getObject() Returns the current form's model object
 *
 * @package    Annuaire
 * @subpackage form
 * @author     Michael Muré
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseMembreForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'username'         => new sfWidgetFormInputText(),
      'passwd'           => new sfWidgetFormInputText(),
      'numero_etudiant'  => new sfWidgetFormInputText(),
      'prenom'           => new sfWidgetFormInputText(),
      'nom'              => new sfWidgetFormInputText(),
      'sexe'             => new sfWidgetFormChoice(array('choices' => array('Homme' => 'Homme', 'Femme' => 'Femme'))),
      'date_naissance'   => new sfWidgetFormDate(),
      'ville_naissance'  => new sfWidgetFormInputText(),
      'numero_secu'      => new sfWidgetFormInputText(),
      'promo'            => new sfWidgetFormInputText(),
      'filiere'          => new sfWidgetFormChoice(array('choices' => array('Informatique' => 'Informatique', 'Automatique' => 'Automatique', 'Mécanique' => 'Mécanique', 'Textile' => 'Textile', 'Système de prod' => 'Système de prod'))),
      'poste'            => new sfWidgetFormInputText(),
      'adresse_mulhouse' => new sfWidgetFormTextarea(),
      'cp_mulhouse'      => new sfWidgetFormInputText(),
      'ville_mulhouse'   => new sfWidgetFormInputText(),
      'adresse_parents'  => new sfWidgetFormTextarea(),
      'cp_parents'       => new sfWidgetFormInputText(),
      'ville_parents'    => new sfWidgetFormInputText(),
      'tel_mobile'       => new sfWidgetFormInputText(),
      'tel_fixe'         => new sfWidgetFormInputText(),
      'email_interne'    => new sfWidgetFormInputText(),
      'email_externe'    => new sfWidgetFormInputText(),
      'carte_ID'         => new sfWidgetFormInputCheckbox(),
      'just_domicile'    => new sfWidgetFormInputCheckbox(),
      'quittance'        => new sfWidgetFormInputCheckbox(),
      'cotisation'       => new sfWidgetFormInputCheckbox(),
      'status'           => new sfWidgetFormChoice(array('choices' => array('Administrateur' => 'Administrateur', 'Membre' => 'Membre', 'Ancien' => 'Ancien'))),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'username'         => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'passwd'           => new sfValidatorString(array('max_length' => 50)),
      'numero_etudiant'  => new sfValidatorInteger(array('required' => false)),
      'prenom'           => new sfValidatorString(array('max_length' => 255)),
      'nom'              => new sfValidatorString(array('max_length' => 255)),
      'sexe'             => new sfValidatorChoice(array('choices' => array(0 => 'Homme', 1 => 'Femme'))),
      'date_naissance'   => new sfValidatorDate(),
      'ville_naissance'  => new sfValidatorString(array('max_length' => 255)),
      'numero_secu'      => new sfValidatorString(array('max_length' => 21, 'required' => false)),
      'promo'            => new sfValidatorInteger(),
      'filiere'          => new sfValidatorChoice(array('choices' => array(0 => 'Informatique', 1 => 'Automatique', 2 => 'Mécanique', 3 => 'Textile', 4 => 'Système de prod'))),
      'poste'            => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'adresse_mulhouse' => new sfValidatorString(array('max_length' => 4000)),
      'cp_mulhouse'      => new sfValidatorInteger(),
      'ville_mulhouse'   => new sfValidatorString(array('max_length' => 255)),
      'adresse_parents'  => new sfValidatorString(array('max_length' => 4000, 'required' => false)),
      'cp_parents'       => new sfValidatorInteger(array('required' => false)),
      'ville_parents'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'tel_mobile'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'tel_fixe'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email_interne'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email_externe'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'carte_ID'         => new sfValidatorBoolean(array('required' => false)),
      'just_domicile'    => new sfValidatorBoolean(array('required' => false)),
      'quittance'        => new sfValidatorBoolean(array('required' => false)),
      'cotisation'       => new sfValidatorBoolean(array('required' => false)),
      'status'           => new sfValidatorChoice(array('choices' => array(0 => 'Administrateur', 1 => 'Membre', 2 => 'Ancien'), 'required' => false)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('membre[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Membre';
  }

}
