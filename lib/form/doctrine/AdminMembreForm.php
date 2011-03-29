<?php

/**
 * AdminMembre form.
 *
 * @package    Annuaire
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AdminMembreForm extends MembreForm
{
  public function configure()
  {
    parent::configure();

    unset(
      $this['passwd'],
      $this['carte_ID'],
      $this['just_domicile'],
      $this['reglement_interieur'],
      $this['convention_etudiant']
      );

  }
}
