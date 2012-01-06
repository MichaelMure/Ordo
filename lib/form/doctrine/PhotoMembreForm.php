<?php

class PhotoMembreForm extends BaseFormDoctrine
{
  public function configure()
  {
    $this->widgetSchema['photo'] = new sfWidgetFormInputFile(array('label' => 'Photo'));

    $this->validatorSchema['photo'] = new sfValidatorFile(array(
      'required' => true,
      'path' => sfConfig::get('sf_upload_dir').'/annuaire',
      'mime_types' => 'web_images',
    ));
  }

  public function setup()
  {
    $this->setWidgets(array(
      'photo' => new sfWidgetFormInputFile(),
    ));


    $this->validatorSchema['photo'] = new sfValidatorFile(array(
      'required' => true,
      'path' => sfConfig::get('sf_upload_dir').'/annuaire',
      'mime_types' => 'web_images',
    ));

    $this->widgetSchema->setNameFormat('photo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }


  public function getModelName()
  {
    return 'Membre';
  }

}
