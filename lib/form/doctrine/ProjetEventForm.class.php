<?php

/**
 * ProjetEvent form.
 *
 * @package    Annuaire
 * @subpackage form
 * @author     Michael Muré
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProjetEventForm extends BaseProjetEventForm
{
  public function configure()
  {
    unset(
      $this['created_at'],
      $this['updated_at']
    );

    $this->widgetSchema['projet_id'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['membre_id'] = new sfWidgetFormInputHidden();

    $this->widgetSchema['type_id']->setLabel('Type (*)');
    $this->widgetSchema->moveField('commentaire', sfWidgetFormSchema::LAST);
  }
}
