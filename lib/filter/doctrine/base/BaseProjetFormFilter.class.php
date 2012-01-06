<?php

/**
 * Projet filter form base class.
 *
 * @package    Annuaire
 * @subpackage filter
 * @author     Michael Muré
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseProjetFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'numero'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nom'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'date_debut'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'date_cloture'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'commentaire'       => new sfWidgetFormFilterInput(),
      'budget'            => new sfWidgetFormFilterInput(),
      'delai_realisation' => new sfWidgetFormFilterInput(),
      'avancement'        => new sfWidgetFormFilterInput(),
      'qualite'           => new sfWidgetFormFilterInput(),
      'prospect_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Prospect'), 'add_empty' => true)),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'deleted_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'participants_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Membre')),
    ));

    $this->setValidators(array(
      'numero'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nom'               => new sfValidatorPass(array('required' => false)),
      'date_debut'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'date_cloture'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'commentaire'       => new sfValidatorPass(array('required' => false)),
      'budget'            => new sfValidatorPass(array('required' => false)),
      'delai_realisation' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'avancement'        => new sfValidatorPass(array('required' => false)),
      'qualite'           => new sfValidatorPass(array('required' => false)),
      'prospect_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Prospect'), 'column' => 'id')),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'deleted_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'participants_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Membre', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('projet_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addParticipantsListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('LienMembreProjet.membre_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Projet';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'numero'            => 'Number',
      'nom'               => 'Text',
      'date_debut'        => 'Date',
      'date_cloture'      => 'Date',
      'commentaire'       => 'Text',
      'budget'            => 'Text',
      'delai_realisation' => 'Number',
      'avancement'        => 'Text',
      'qualite'           => 'Text',
      'prospect_id'       => 'ForeignKey',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
      'deleted_at'        => 'Date',
      'participants_list' => 'ManyKey',
    );
  }
}
