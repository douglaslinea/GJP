<?php

/**
 * BaseMarcaGJP
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $cod_id
 * @property integer $cod_idioma
 * @property string $txt_nomeMarca
 * @property string $txt_link
 * @property string $txt_tel_vendas
 * @property string $arq_video_marca
 * @property string $img_logo
 * @property string $cod_relacao_idioma
 * @property string $txt_texto_marca
 * @property integer $cod_ordem
 * @property integer $cod_Imprensa
 * @property ImprensaCategoria $ImprensaCategoria
 * @property WebsiteIdiomas $WebsiteIdiomas
 * @property Doctrine_Collection $CadastroNews
 * @property Doctrine_Collection $FormularioAgenciaEmpresa
 * @property Doctrine_Collection $FormularioContato
 * @property Doctrine_Collection $FormularioHospedagem
 * @property Doctrine_Collection $GjpReconhecimento
 * @property Doctrine_Collection $Hoteis
 * @property Doctrine_Collection $TextoscCategoria
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseMarcaGJP extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('marcaGJP');
        $this->hasColumn('cod_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
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
        $this->hasColumn('txt_nomeMarca', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('txt_link', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('txt_tel_vendas', 'string', 14, array(
             'type' => 'string',
             'length' => 14,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('arq_video_marca', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('img_logo', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('cod_relacao_idioma', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('txt_texto_marca', 'string', null, array(
             'type' => 'string',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('cod_ordem', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('cod_Imprensa', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => true,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('ImprensaCategoria', array(
             'local' => 'cod_Imprensa',
             'foreign' => 'cod_id'));

        $this->hasOne('WebsiteIdiomas', array(
             'local' => 'cod_idioma',
             'foreign' => 'cod_id'));

        $this->hasMany('CadastroNews', array(
             'local' => 'cod_id',
             'foreign' => 'cod_marca'));

        $this->hasMany('FormularioAgenciaEmpresa', array(
             'local' => 'cod_id',
             'foreign' => 'cod_marca'));

        $this->hasMany('FormularioContato', array(
             'local' => 'cod_id',
             'foreign' => ' cod_marca'));

        $this->hasMany('FormularioHospedagem', array(
             'local' => 'cod_id',
             'foreign' => 'cod_marca'));

        $this->hasMany('GjpReconhecimento', array(
             'local' => 'cod_id',
             'foreign' => 'cod_marca'));

        $this->hasMany('Hoteis', array(
             'local' => 'cod_id',
             'foreign' => 'cod_marca'));

        $this->hasMany('TextoscCategoria', array(
             'local' => 'cod_id',
             'foreign' => 'cod_marca'));
    }
}