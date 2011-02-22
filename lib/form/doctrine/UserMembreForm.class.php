<?php

/**
 * UserMembre form.
 *
 * @package    Annuaire
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class UserMembreForm extends BaseMembreForm
{
  public function configure()
  {
    unset(
      $this['created_at'],
      $this['updated_at']
      );

    /*$this->validatorSchema['username'] = null;
    $this->validatorSchema['numero_etudiant'] = null;
    $this->validatorSchema['carte_ID'] = null;
    $this->validatorSchema['just_domicile'] = null;
    $this->validatorSchema['quittance'] = null;
    $this->validatorSchema['cotisation'] = null;
    $this->validatorSchema['status'] = null;*/
  }
}
