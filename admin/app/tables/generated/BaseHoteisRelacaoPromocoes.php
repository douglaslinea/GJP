<?php

/**
 * BaseHoteisRelacaoPromocoes
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $cod_hotel
 * @property integer $cod_pacote_e_promocao
 * @property Hoteis $Hoteis
 * @property HoteisPromocoesPacotes $HoteisPromocoesPacotes
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseHoteisRelacaoPromocoes extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('hoteisRelacaoPromocoes');
        $this->hasColumn('cod_hotel', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('cod_pacote_e_promocao', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Hoteis', array(
             'local' => 'cod_hotel',
             'foreign' => 'cod_id'));

        $this->hasOne('HoteisPromocoesPacotes', array(
             'local' => 'cod_pacote_e_promocao',
             'foreign' => 'cod_id'));
    }
}