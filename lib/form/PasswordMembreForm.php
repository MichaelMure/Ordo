<?php

class PasswordMembreForm extends BaseForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'ancien_mdp'    => new sfWidgetFormInputPassword(),
      'nouveau_mdp'   => new sfWidgetFormInputPassword(),
      're_mdp' => new sfWidgetFormInputPassword(),
    ));
    
    
    $this->widgetSchema->setLabels(array(
      'ancien_mdp'    => 'Ancien mot de passe',
      'nouveau_mdp'   => 'Nouveau mot de passe',
      're_mdp' => 'Confirmer le mot de passe',
    ));
  }
}
