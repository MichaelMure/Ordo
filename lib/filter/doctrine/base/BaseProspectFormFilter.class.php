<?php

/**
 * Prospect filter form base class.
 *
 * @package    Annuaire
 * @subpackage filter
 * @author     Michael Muré
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseProspectFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nom'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'contact'        => new sfWidgetFormFilterInput(),
      'fonction'       => new sfWidgetFormFilterInput(),
      'adresse'        => new sfWidgetFormFilterInput(),
      'ville'          => new sfWidgetFormFilterInput(),
      'cp'             => new sfWidgetFormFilterInput(),
      'tel_fixe'       => new sfWidgetFormFilterInput(),
      'tel_portable'   => new sfWidgetFormFilterInput(),
      'email'          => new sfWidgetFormFilterInput(),
      'site_web'       => new sfWidgetFormFilterInput(),
      'origine'        => new sfWidgetFormFilterInput(),
      'a_rappeler'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'date_recontact' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'commentaire'    => new sfWidgetFormFilterInput(),
      'activite'       => new sfWidgetFormFilterInput(),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'nom'            => new sfValidatorPass(array('required' => false)),
      'contact'        => new sfValidatorPass(array('required' => false)),
      'fonction'       => new sfValidatorPass(array('required' => false)),
      'adresse'        => new sfValidatorPass(array('required' => false)),
      'ville'          => new sfValidatorPass(array('required' => false)),
      'cp'             => new sfValidatorPass(array('required' => false)),
      'tel_fixe'       => new sfValidatorPass(array('required' => false)),
      'tel_portable'   => new sfValidatorPass(array('required' => false)),
      'email'          => new sfValidatorPass(array('required' => false)),
      'site_web'       => new sfValidatorPass(array('required' => false)),
      'origine'        => new sfValidatorPass(array('required' => false)),
      'a_rappeler'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'date_recontact' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'commentaire'    => new sfValidatorPass(array('required' => false)),
      'activite'       => new sfValidatorPass(array('required' => false)),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('prospect_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Prospect';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'nom'            => 'Text',
      'contact'        => 'Text',
      'fonction'       => 'Text',
      'adresse'        => 'Text',
      'ville'          => 'Text',
      'cp'             => 'Text',
      'tel_fixe'       => 'Text',
      'tel_portable'   => 'Text',
      'email'          => 'Text',
      'site_web'       => 'Text',
      'origine'        => 'Text',
      'a_rappeler'     => 'Boolean',
      'date_recontact' => 'Date',
      'commentaire'    => 'Text',
      'activite'       => 'Text',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
    );
  }
}
