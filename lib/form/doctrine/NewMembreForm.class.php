<?php

/**
 * Membre form.
 *
 * @package    Annuaire
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class NewMembreForm extends BaseMembreForm
{
  public function configure()
  {
    unset(
      $this['username'],
      $this['numero_etudiant'],
      $this['created_at'],
      $this['updated_at'],
      $this['carte_ID'],
      $this['just_domicile'],
      $this['quittance'],
      $this['cotisation'],
      $this['poste'],
      $this['email_interne'],
      $this['status']
      );

    $this->widgetSchema['prenom']->setLabel('Prénom');
    $this->widgetSchema['passwd']->setLabel('Mot de passe');
    $this->widgetSchema['date_naissance']->setLabel('Date de naissance');
    $this->widgetSchema['ville_naissance']->setLabel('Ville de naissance');
    $this->widgetSchema['numero_secu']->setLabel('Numéro de sécurité sociale');
    $this->widgetSchema['promo']->setLabel('Promotion (année de sortie)');
    $this->widgetSchema['filiere']->setLabel('Filière');
    $this->widgetSchema['adresse_mulhouse']->setLabel('Adresse locale');
    $this->widgetSchema['cp_mulhouse']->setLabel('Code postal local');
    $this->widgetSchema['ville_mulhouse']->setLabel('Ville locale');
    $this->widgetSchema['adresse_parents']->setLabel('Adresse des parents');
    $this->widgetSchema['cp_parents']->setLabel('Code postal des parents');
    $this->widgetSchema['ville_parents']->setLabel('Ville des parents');
    $this->widgetSchema['tel_mobile']->setLabel('Téléphone portable');
    $this->widgetSchema['tel_fixe']->setLabel('Téléphone fixe');
    $this->widgetSchema['email_externe']->setLabel('Email (autre que IARISS)');
  }
}
