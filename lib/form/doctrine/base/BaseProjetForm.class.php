<?php

/**
 * Projet form base class.
 *
 * @method Projet getObject() Returns the current form's model object
 *
 * @package    Annuaire
 * @subpackage form
 * @author     Michael Muré
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProjetForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'numero'            => new sfWidgetFormInputText(),
      'nom'               => new sfWidgetFormInputText(),
      'date_debut'        => new sfWidgetFormDate(),
      'date_cloture'      => new sfWidgetFormDate(),
      'prospect_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Prospect'), 'add_empty' => false)),
      'respo_id'          => new sfWidgetFormInputText(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
      'deleted_at'        => new sfWidgetFormDateTime(),
      'participants_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Membre')),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'numero'            => new sfValidatorInteger(array('required' => false)),
      'nom'               => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'date_debut'        => new sfValidatorDate(),
      'date_cloture'      => new sfValidatorDate(array('required' => false)),
      'prospect_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Prospect'))),
      'respo_id'          => new sfValidatorInteger(array('required' => false)),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
      'deleted_at'        => new sfValidatorDateTime(array('required' => false)),
      'participants_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Membre', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('projet[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Projet';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['participants_list']))
    {
      $this->setDefault('participants_list', $this->object->Participants->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveParticipantsList($con);

    parent::doSave($con);
  }

  public function saveParticipantsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['participants_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Participants->getPrimaryKeys();
    $values = $this->getValue('participants_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Participants', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Participants', array_values($link));
    }
  }

}
