<?php

/**
 * Membre form.
 *
 * @package    Annuaire
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MembreForm extends BaseMembreForm
{
  public function configure()
  {
    unset(
      $this['created_at'],
      $this['updated_at']
    );
  
    $this->setWidget('passwd', new sfWidgetFormInputPassword());

    $years = range(1970, 2000);
    $years_list = array_combine($years, $years);
    $this->setWidget('date_naissance', new sfWidgetFormDate(array('years' => $years_list,
                                                                  'format' => '%day% - %month% - %year%')));

    $this->widgetSchema['nom']->setLabel('Nom (*)');
    $this->widgetSchema['prenom']->setLabel('Prénom (*)');
    $this->widgetSchema['passwd']->setLabel('Mot de passe (*)');
    $this->widgetSchema['sexe']->setLabel('Sexe (*)');
    $this->widgetSchema['date_naissance']->setLabel('Date de naissance (*)');
    $this->widgetSchema['ville_naissance']->setLabel('Ville de naissance (*)');
    $this->widgetSchema['numero_secu']->setLabel('Numéro de sécurité sociale');
    $this->widgetSchema['promo']->setLabel('Promotion (année de sortie) (*)');
    $this->widgetSchema['filiere']->setLabel('Filière (*)');
    $this->widgetSchema['adresse_mulhouse']->setLabel('Adresse locale (*)');
    $this->widgetSchema['cp_mulhouse']->setLabel('Code postal local (*)');
    $this->widgetSchema['ville_mulhouse']->setLabel('Ville locale (*)');
    $this->widgetSchema['adresse_parents']->setLabel('Adresse des parents');
    $this->widgetSchema['cp_parents']->setLabel('Code postal des parents');
    $this->widgetSchema['ville_parents']->setLabel('Ville des parents');
    $this->widgetSchema['tel_mobile']->setLabel('Téléphone portable (*)');
    $this->widgetSchema['tel_fixe']->setLabel('Téléphone fixe');
    $this->widgetSchema['email_externe']->setLabel('Email (autre que IARISS)');

    $this->widgetSchema->moveField('prenom', sfWidgetFormSchema::AFTER, 'nom');
    $this->widgetSchema->moveField('passwd', sfWidgetFormSchema::LAST);
  }
}
