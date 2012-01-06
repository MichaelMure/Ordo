<?php

/**
 * Membre filter form base class.
 *
 * @package    Annuaire
 * @subpackage filter
 * @author     Michael Muré
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMembreFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'username'            => new sfWidgetFormFilterInput(),
      'passwd'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'numero_etudiant'     => new sfWidgetFormFilterInput(),
      'prenom'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nom'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sexe'                => new sfWidgetFormChoice(array('choices' => array('' => '', 'Homme' => 'Homme', 'Femme' => 'Femme'))),
      'date_naissance'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'ville_naissance'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'numero_secu'         => new sfWidgetFormFilterInput(),
      'promo'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'filiere'             => new sfWidgetFormChoice(array('choices' => array('' => '', 'Informatique' => 'Informatique', 'Automatique' => 'Automatique', 'Mécanique' => 'Mécanique', 'Textile' => 'Textile', 'Système de prod' => 'Système de prod'))),
      'poste'               => new sfWidgetFormFilterInput(),
      'photo'               => new sfWidgetFormFilterInput(),
      'adresse_mulhouse'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cp_mulhouse'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ville_mulhouse'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'adresse_parents'     => new sfWidgetFormFilterInput(),
      'cp_parents'          => new sfWidgetFormFilterInput(),
      'ville_parents'       => new sfWidgetFormFilterInput(),
      'tel_mobile'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tel_fixe'            => new sfWidgetFormFilterInput(),
      'email_interne'       => new sfWidgetFormFilterInput(),
      'email_externe'       => new sfWidgetFormFilterInput(),
      'carte_ID'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'just_domicile'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'reglement_interieur' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'convention_etudiant' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'status'              => new sfWidgetFormChoice(array('choices' => array('' => '', 'Administrateur' => 'Administrateur', 'Membre' => 'Membre', 'Ancien' => 'Ancien'))),
      'created_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'projets_list'        => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Projet')),
    ));

    $this->setValidators(array(
      'username'            => new sfValidatorPass(array('required' => false)),
      'passwd'              => new sfValidatorPass(array('required' => false)),
      'numero_etudiant'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'prenom'              => new sfValidatorPass(array('required' => false)),
      'nom'                 => new sfValidatorPass(array('required' => false)),
      'sexe'                => new sfValidatorChoice(array('required' => false, 'choices' => array('Homme' => 'Homme', 'Femme' => 'Femme'))),
      'date_naissance'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'ville_naissance'     => new sfValidatorPass(array('required' => false)),
      'numero_secu'         => new sfValidatorPass(array('required' => false)),
      'promo'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'filiere'             => new sfValidatorChoice(array('required' => false, 'choices' => array('Informatique' => 'Informatique', 'Automatique' => 'Automatique', 'Mécanique' => 'Mécanique', 'Textile' => 'Textile', 'Système de prod' => 'Système de prod'))),
      'poste'               => new sfValidatorPass(array('required' => false)),
      'photo'               => new sfValidatorPass(array('required' => false)),
      'adresse_mulhouse'    => new sfValidatorPass(array('required' => false)),
      'cp_mulhouse'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ville_mulhouse'      => new sfValidatorPass(array('required' => false)),
      'adresse_parents'     => new sfValidatorPass(array('required' => false)),
      'cp_parents'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ville_parents'       => new sfValidatorPass(array('required' => false)),
      'tel_mobile'          => new sfValidatorPass(array('required' => false)),
      'tel_fixe'            => new sfValidatorPass(array('required' => false)),
      'email_interne'       => new sfValidatorPass(array('required' => false)),
      'email_externe'       => new sfValidatorPass(array('required' => false)),
      'carte_ID'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'just_domicile'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'reglement_interieur' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'convention_etudiant' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'status'              => new sfValidatorChoice(array('required' => false, 'choices' => array('Administrateur' => 'Administrateur', 'Membre' => 'Membre', 'Ancien' => 'Ancien'))),
      'created_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'projets_list'        => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Projet', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('membre_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addProjetsListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.LienMembreProjet LienMembreProjet')
      ->andWhereIn('LienMembreProjet.projet_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Membre';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'username'            => 'Text',
      'passwd'              => 'Text',
      'numero_etudiant'     => 'Number',
      'prenom'              => 'Text',
      'nom'                 => 'Text',
      'sexe'                => 'Enum',
      'date_naissance'      => 'Date',
      'ville_naissance'     => 'Text',
      'numero_secu'         => 'Text',
      'promo'               => 'Number',
      'filiere'             => 'Enum',
      'poste'               => 'Text',
      'photo'               => 'Text',
      'adresse_mulhouse'    => 'Text',
      'cp_mulhouse'         => 'Number',
      'ville_mulhouse'      => 'Text',
      'adresse_parents'     => 'Text',
      'cp_parents'          => 'Number',
      'ville_parents'       => 'Text',
      'tel_mobile'          => 'Text',
      'tel_fixe'            => 'Text',
      'email_interne'       => 'Text',
      'email_externe'       => 'Text',
      'carte_ID'            => 'Boolean',
      'just_domicile'       => 'Boolean',
      'reglement_interieur' => 'Boolean',
      'convention_etudiant' => 'Boolean',
      'status'              => 'Enum',
      'created_at'          => 'Date',
      'updated_at'          => 'Date',
      'projets_list'        => 'ManyKey',
    );
  }
}
