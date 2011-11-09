<?php

/**
 * BaseCotisation
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $membre_id
 * @property integer $annee
 * @property Membre $Membre
 * 
 * @method integer    getMembreId()  Returns the current record's "membre_id" value
 * @method integer    getAnnee()     Returns the current record's "annee" value
 * @method Membre     getMembre()    Returns the current record's "Membre" value
 * @method Cotisation setMembreId()  Sets the current record's "membre_id" value
 * @method Cotisation setAnnee()     Sets the current record's "annee" value
 * @method Cotisation setMembre()    Sets the current record's "Membre" value
 * 
 * @package    Annuaire
 * @subpackage model
 * @author     Michael Muré
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCotisation extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('cotisation');
        $this->hasColumn('membre_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('annee', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Membre', array(
             'local' => 'membre_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}