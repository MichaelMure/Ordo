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
      $this['email_externe'],
      $this['status']
      );

    $this->widgetSchema['prenom']->setLabel('Prénom');
  }
}
