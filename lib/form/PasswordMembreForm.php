<?php

class PasswordMembreForm extends BaseFormDoctrine
{
  public function configure()
  {
    $this->setWidgets(array(
      'ancien_mdp'    => new sfWidgetFormInputPassword(),
      'passwd'   => new sfWidgetFormInputPassword(),
      're_passwd' => new sfWidgetFormInputPassword(),
    ));
    
    
    $this->widgetSchema->setLabels(array(
      'ancien_mdp'    => 'Ancien mot de passe',
      'passwd'   => 'Nouveau mot de passe',
      're_passwd' => 'Confirmer le mot de passe',
    ));

    $this->setValidators(array(
      'ancien_mdp'    => new sfValidatorString(array('required' => true)),
      'passwd'   => new sfValidatorString(array('required' => true)),
      're_passwd'        => new sfValidatorString(array('required' => true)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorCallback(array('callback' => array($this, 'checkPassword')))
    );

    $this->widgetSchema->setNameFormat('mdp[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }
 
  public function checkPassword($validator, $values)
  {
    if (sha1($values['ancien_mdp']) != $this->object->getPasswd())
    {
      throw new sfValidatorError($validator, 'L\'ancien mot de passe ne correspond pas.');
    }
    
    if ($values['passwd'] != $values['re_passwd'])
    {
      throw new sfValidatorError($validator, 'Les deux mots de passe fournis sont différents.');
    }

    // password is correct, return the clean values
    return $values;
  }

  public function getModelName()
  {
    return 'Membre';
  }
}
