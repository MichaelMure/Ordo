<?php

/**
 * EditMembre form.
 *
 * @package    Annuaire
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EditMembreForm extends MembreForm
{
  public function configure()
  {
    parent::configure();

    unset(
      $this['username'],
      $this['numero_etudiant'],
      $this['carte_ID'],
      $this['just_domicile'],
      $this['quittance'],
      $this['cotisation'],
      $this['poste'],
      $this['email_interne'],
      $this['status'],
      $this['passwd']
      );
  }
}
