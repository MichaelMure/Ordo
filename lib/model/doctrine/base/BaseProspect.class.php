<?php

/**
 * BaseProspect
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $nom
 * @property string $contact
 * @property string $fonction
 * @property string $adresse
 * @property string $ville
 * @property string $cp
 * @property string $tel_fixe
 * @property string $tel_portable
 * @property string $email
 * @property string $site_web
 * @property string $origine
 * @property boolean $a_rappeler
 * @property date $date_recontact
 * @property string $commentaire
 * @property string $activite
 * @property Doctrine_Collection $Contacts
 * @property Doctrine_Collection $Projet
 * 
 * @method string              getNom()            Returns the current record's "nom" value
 * @method string              getContact()        Returns the current record's "contact" value
 * @method string              getFonction()       Returns the current record's "fonction" value
 * @method string              getAdresse()        Returns the current record's "adresse" value
 * @method string              getVille()          Returns the current record's "ville" value
 * @method string              getCp()             Returns the current record's "cp" value
 * @method string              getTelFixe()        Returns the current record's "tel_fixe" value
 * @method string              getTelPortable()    Returns the current record's "tel_portable" value
 * @method string              getEmail()          Returns the current record's "email" value
 * @method string              getSiteWeb()        Returns the current record's "site_web" value
 * @method string              getOrigine()        Returns the current record's "origine" value
 * @method boolean             getARappeler()      Returns the current record's "a_rappeler" value
 * @method date                getDateRecontact()  Returns the current record's "date_recontact" value
 * @method string              getCommentaire()    Returns the current record's "commentaire" value
 * @method string              getActivite()       Returns the current record's "activite" value
 * @method Doctrine_Collection getContacts()       Returns the current record's "Contacts" collection
 * @method Doctrine_Collection getProjet()         Returns the current record's "Projet" collection
 * @method Prospect            setNom()            Sets the current record's "nom" value
 * @method Prospect            setContact()        Sets the current record's "contact" value
 * @method Prospect            setFonction()       Sets the current record's "fonction" value
 * @method Prospect            setAdresse()        Sets the current record's "adresse" value
 * @method Prospect            setVille()          Sets the current record's "ville" value
 * @method Prospect            setCp()             Sets the current record's "cp" value
 * @method Prospect            setTelFixe()        Sets the current record's "tel_fixe" value
 * @method Prospect            setTelPortable()    Sets the current record's "tel_portable" value
 * @method Prospect            setEmail()          Sets the current record's "email" value
 * @method Prospect            setSiteWeb()        Sets the current record's "site_web" value
 * @method Prospect            setOrigine()        Sets the current record's "origine" value
 * @method Prospect            setARappeler()      Sets the current record's "a_rappeler" value
 * @method Prospect            setDateRecontact()  Sets the current record's "date_recontact" value
 * @method Prospect            setCommentaire()    Sets the current record's "commentaire" value
 * @method Prospect            setActivite()       Sets the current record's "activite" value
 * @method Prospect            setContacts()       Sets the current record's "Contacts" collection
 * @method Prospect            setProjet()         Sets the current record's "Projet" collection
 * 
 * @package    Annuaire
 * @subpackage model
 * @author     Michael Muré
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseProspect extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('prospect');
        $this->hasColumn('nom', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('contact', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('fonction', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('adresse', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('ville', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('cp', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('tel_fixe', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('tel_portable', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('email', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('site_web', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('origine', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('a_rappeler', 'boolean', null, array(
             'type' => 'boolean',
             'default' => true,
             ));
        $this->hasColumn('date_recontact', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('commentaire', 'string', 4000, array(
             'type' => 'string',
             'length' => 4000,
             ));
        $this->hasColumn('activite', 'string', 4000, array(
             'type' => 'string',
             'length' => 4000,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Contact as Contacts', array(
             'local' => 'id',
             'foreign' => 'prospect_id'));

        $this->hasMany('Projet', array(
             'local' => 'id',
             'foreign' => 'prospect_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}