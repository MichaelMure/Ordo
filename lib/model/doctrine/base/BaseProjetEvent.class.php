<?php

/**
 * BaseProjetEvent
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property date $date
 * @property string $commentaire
 * @property string $url
 * @property integer $type_id
 * @property integer $membre_id
 * @property integer $projet_id
 * @property ProjetEventType $ProjetEventType
 * @property Membre $Membre
 * @property Projet $Projet
 * 
 * @method date            getDate()            Returns the current record's "date" value
 * @method string          getCommentaire()     Returns the current record's "commentaire" value
 * @method string          getUrl()             Returns the current record's "url" value
 * @method integer         getTypeId()          Returns the current record's "type_id" value
 * @method integer         getMembreId()        Returns the current record's "membre_id" value
 * @method integer         getProjetId()        Returns the current record's "projet_id" value
 * @method ProjetEventType getProjetEventType() Returns the current record's "ProjetEventType" value
 * @method Membre          getMembre()          Returns the current record's "Membre" value
 * @method Projet          getProjet()          Returns the current record's "Projet" value
 * @method ProjetEvent     setDate()            Sets the current record's "date" value
 * @method ProjetEvent     setCommentaire()     Sets the current record's "commentaire" value
 * @method ProjetEvent     setUrl()             Sets the current record's "url" value
 * @method ProjetEvent     setTypeId()          Sets the current record's "type_id" value
 * @method ProjetEvent     setMembreId()        Sets the current record's "membre_id" value
 * @method ProjetEvent     setProjetId()        Sets the current record's "projet_id" value
 * @method ProjetEvent     setProjetEventType() Sets the current record's "ProjetEventType" value
 * @method ProjetEvent     setMembre()          Sets the current record's "Membre" value
 * @method ProjetEvent     setProjet()          Sets the current record's "Projet" value
 * 
 * @package    Annuaire
 * @subpackage model
 * @author     Michael Muré
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseProjetEvent extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('projet_event');
        $this->hasColumn('date', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('commentaire', 'string', 4000, array(
             'type' => 'string',
             'length' => 4000,
             ));
        $this->hasColumn('url', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('type_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('membre_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('projet_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('ProjetEventType', array(
             'local' => 'type_id',
             'foreign' => 'id'));

        $this->hasOne('Membre', array(
             'local' => 'membre_id',
             'foreign' => 'id'));

        $this->hasOne('Projet', array(
             'local' => 'projet_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}