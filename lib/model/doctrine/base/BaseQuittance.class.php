<?php

/**
 * BaseQuittance
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $membre_id
 * @property integer $annee
 * @property Membre $Membre
 * 
 * @method integer   getMembreId()  Returns the current record's "membre_id" value
 * @method integer   getAnnee()     Returns the current record's "annee" value
 * @method Membre    getMembre()    Returns the current record's "Membre" value
 * @method Quittance setMembreId()  Sets the current record's "membre_id" value
 * @method Quittance setAnnee()     Sets the current record's "annee" value
 * @method Quittance setMembre()    Sets the current record's "Membre" value
 * 
 * @package    Annuaire
 * @subpackage model
 * @author     Michael Muré
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
abstract class BaseQuittance extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('quittance');
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