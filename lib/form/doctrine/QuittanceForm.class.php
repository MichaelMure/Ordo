<?php

/**
 * Quittance form.
 *
 * @package    Annuaire
 * @subpackage form
 * @author     Michael Muré
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class QuittanceForm extends BaseQuittanceForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at']);
  }
}
