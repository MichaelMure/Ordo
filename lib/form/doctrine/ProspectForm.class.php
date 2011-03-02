<?php

/**
 * Prospect form.
 *
 * @package    appel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProspectForm extends BaseProspectForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at']);

    $this->widgetSchema['nom']->setLabel('Nom (*)');
    $this->widgetSchema['cp']->setLabel('Code postal');
    $this->widgetSchema['activite']->setLabel('Activité');
  }
}
