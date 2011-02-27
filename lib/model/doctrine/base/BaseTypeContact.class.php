<?php

/**
 * BaseTypeContact
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $nom
 * @property string $logo
 * @property Doctrine_Collection $Contact
 * 
 * @method string              getNom()     Returns the current record's "nom" value
 * @method string              getLogo()    Returns the current record's "logo" value
 * @method Doctrine_Collection getContact() Returns the current record's "Contact" collection
 * @method TypeContact         setNom()     Sets the current record's "nom" value
 * @method TypeContact         setLogo()    Sets the current record's "logo" value
 * @method TypeContact         setContact() Sets the current record's "Contact" collection
 * 
 * @package    Annuaire
 * @subpackage model
 * @author     Michael Muré
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTypeContact extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('type_contact');
        $this->hasColumn('nom', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('logo', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Contact', array(
             'local' => 'id',
             'foreign' => 'type_contact_id'));
    }
}