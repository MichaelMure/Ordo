<?php

/**
 * NewMembre form.
 *
 * @package    Annuaire
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class NewProjetForm extends ProjetForm
{
  public function configure()
  {
    parent::configure();

    unset(
      $this['date_cloture'],
      $this['commentaire'],
      $this['budget'],
      $this['participants_list']
      );

  }
}
