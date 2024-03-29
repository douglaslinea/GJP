<?php

/**
 * BaseHoteisFacilidades
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $cod_id
 * @property integer $cod_idioma
 * @property integer $cod_relacao_idioma
 * @property integer $cod_hotel
 * @property integer $cod_tipo
 * @property string $txt_facilidades
 * @property Hoteis $Hoteis
 * @property WebsiteIdiomas $WebsiteIdiomas
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseHoteisFacilidades extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('hoteisFacilidades');
        $this->hasColumn('cod_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('cod_idioma', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => true,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('cod_relacao_idioma', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('cod_hotel', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => true,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('cod_tipo', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('txt_facilidades', 'string', null, array(
             'type' => 'string',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Hoteis', array(
             'local' => 'cod_hotel',
             'foreign' => 'cod_id'));

        $this->hasOne('WebsiteIdiomas', array(
             'local' => 'cod_idioma',
             'foreign' => 'cod_id'));
    }
}