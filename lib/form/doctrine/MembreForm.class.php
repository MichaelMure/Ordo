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
      $this['updated_at'],
      $this['projets_list']
    );
  
    $this->setWidget('passwd', new sfWidgetFormInputPassword());
    $this->setValidator('email_externe', new sfValidatorEmail());
    $this->setValidator('nom', new sfValidatorRegex(array('pattern' => '/^[a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\s\-]*$/', 'max_length' => 255)));
    $this->setValidator('prenom', new sfValidatorRegex(array('pattern' => '/^[a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\s\-]*$/', 'max_length' => 255)));
    $this->setValidator('ville_naissance', new sfValidatorRegex(array('pattern' => '/^[a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\s\-]*$/', 'max_length' => 255)));
    $this->setValidator('ville_parents', new sfValidatorRegex(array('pattern' => '/^[a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\s\-]*$/', 'max_length' => 255, 'required' => false)));
    $this->setValidator('ville_mulhouse', new sfValidatorRegex(array('pattern' => '/^[a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\s\-]*$/', 'max_length' => 255)));
    $this->setValidator('numero_secu', new sfValidatorRegex(array('pattern' => '/^[0-9\s]*$/', 'max_length' => 21, 'required' => false)));
    $this->setValidator('tel_mobile', new sfValidatorRegex(array('pattern' => '/^[0-9\s]*$/', 'max_length' => 21)));
    $this->setValidator('tel_fixe', new sfValidatorRegex(array('pattern' => '/^[0-9\s]*$/', 'max_length' => 21, 'required' => false)));
    $this->setValidator('cp_mulhouse', new sfValidatorRegex(array('pattern' => '/^[0-9]{5}$/')));
    $this->setValidator('cp_parents', new sfValidatorRegex(array('pattern' => '/^[0-9]{5}$/', 'required' => false)));


    $years = range(1970, 2000);
    $years_list = array_combine($years, $years);
    $this->setWidget('date_naissance', new sfWidgetFormJQueryDate(array('image'=>'/images/calendar.png',
                                                                        'culture'=>'fr',
                                                                        'date_widget' => new sfWidgetFormDate(array("format" => '%day%/%month%/%year%',
                                                                                                                    'years' => $years_list))
                     )));

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
  
  public function getJavascripts()
  {
    return array('jquery.ui.datepicker-fr.js',
                 'jquery.flot.selection.min.js',
                 'jquery.flot.min.js',
                 'jquery-1.4.2.min.js',
                 'jquery-ui-1.8.1.custom.min.js');
  }
  
  public function getStylesheets()
  {
    return array('ui-lightness/jquery-ui-1.8.1.custom.css' => 'all');
  }
}
