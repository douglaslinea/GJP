<?php

/**
 * BaseHoteis
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $cod_id
 * @property integer $cod_idioma
 * @property integer $cod_relacao_idioma
 * @property integer $cod_marca
 * @property string $txt_telefone
 * @property string $txt_email
 * @property string $img_capa
 * @property string $img_capa2
 * @property string $vid_video
 * @property string $txt_info
 * @property string $cod_latitude
 * @property string $cod_longitude
 * @property string $char_evento
 * @property string $txt_endereco
 * @property string $txt_bairro
 * @property string $txt_permalink
 * @property integer $cod_destino
 * @property integer $cod_categoria_download
 * @property integer $cod_categoria_imagem
 * @property integer $cod_categoria_Texto
 * @property integer $cod_imprensa
 * @property string $txt_razaoSocial
 * @property string $txt_nomeFantasia
 * @property string $txt_cadastroMTUR
 * @property string $num_cnpj
 * @property string $txt_tipo
 * @property string $txt_cat
 * @property string $txt_cep
 * @property DownloadCategoria $DownloadCategoria
 * @property Destinos $Destinos
 * @property ImagemCategoria $ImagemCategoria
 * @property ImprensaCategoria $ImprensaCategoria
 * @property MarcaGJP $MarcaGJP
 * @property TextoscCategoria $TextoscCategoria
 * @property WebsiteIdiomas $WebsiteIdiomas
 * @property Doctrine_Collection $CheckIn
 * @property Doctrine_Collection $ContatosHoteis
 * @property Doctrine_Collection $EventosOrcamentos
 * @property Doctrine_Collection $FormularioAgenciaEmpresa
 * @property Doctrine_Collection $FormularioContato
 * @property Doctrine_Collection $FormularioHospedagem
 * @property Doctrine_Collection $GjpReconhecimento
 * @property Doctrine_Collection $GjpVagas
 * @property Doctrine_Collection $HoteisAcomodacoes
 * @property Doctrine_Collection $HoteisDistancias
 * @property Doctrine_Collection $HoteisFacilidades
 * @property Doctrine_Collection $HoteisRelacaoPromocoes
 * @property Doctrine_Collection $ImprensaFotos
 * @property Doctrine_Collection $ImprensaVideo
 * @property Doctrine_Collection $RedesSociais
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseHoteis extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('hoteis');
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
             'unsigned' => true,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('cod_marca', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('txt_telefone', 'string', 14, array(
             'type' => 'string',
             'length' => 14,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('txt_email', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('img_capa', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('img_capa2', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('vid_video', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('txt_info', 'string', null, array(
             'type' => 'string',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('cod_latitude', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('cod_longitude', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('char_evento', 'string', 1, array(
             'type' => 'string',
             'length' => 1,
             'fixed' => true,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('txt_endereco', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('txt_bairro', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('txt_permalink', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('cod_destino', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => true,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('cod_categoria_download', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => true,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('cod_categoria_imagem', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => true,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('cod_categoria_Texto', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => true,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('cod_imprensa', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => true,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('txt_razaoSocial', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('txt_nomeFantasia', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('txt_cadastroMTUR', 'string', 45, array(
             'type' => 'string',
             'length' => 45,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('num_cnpj', 'string', 18, array(
             'type' => 'string',
             'length' => 18,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('txt_tipo', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('txt_cat', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('txt_cep', 'string', 45, array(
             'type' => 'string',
             'length' => 45,
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
        $this->hasOne('DownloadCategoria', array(
             'local' => 'cod_categoria_download',
             'foreign' => 'cod_id'));

        $this->hasOne('Destinos', array(
             'local' => 'cod_destino',
             'foreign' => 'cod_id'));

        $this->hasOne('ImagemCategoria', array(
             'local' => 'cod_categoria_imagem',
             'foreign' => 'cod_id'));

        $this->hasOne('ImprensaCategoria', array(
             'local' => 'cod_imprensa',
             'foreign' => 'cod_id'));

        $this->hasOne('MarcaGJP', array(
             'local' => 'cod_marca',
             'foreign' => 'cod_id'));

        $this->hasOne('TextoscCategoria', array(
             'local' => 'cod_categoria_Texto',
             'foreign' => 'cod_id'));

        $this->hasOne('WebsiteIdiomas', array(
             'local' => 'cod_idioma',
             'foreign' => 'cod_id'));

        $this->hasMany('CheckIn', array(
             'local' => 'cod_id',
             'foreign' => 'cod_hotel'));

        $this->hasMany('ContatosHoteis', array(
             'local' => 'cod_id',
             'foreign' => 'cod_hotel'));

        $this->hasMany('EventosOrcamentos', array(
             'local' => 'cod_id',
             'foreign' => 'cod_hotel'));

        $this->hasMany('FormularioAgenciaEmpresa', array(
             'local' => 'cod_id',
             'foreign' => 'cod_hotel'));

        $this->hasMany('FormularioContato', array(
             'local' => 'cod_id',
             'foreign' => 'cod_hotel'));

        $this->hasMany('FormularioHospedagem', array(
             'local' => 'cod_id',
             'foreign' => 'cod_hotel'));

        $this->hasMany('GjpReconhecimento', array(
             'local' => 'cod_id',
             'foreign' => 'cod_hotel'));

        $this->hasMany('GjpVagas', array(
             'local' => 'cod_id',
             'foreign' => 'cod_hotel'));

        $this->hasMany('HoteisAcomodacoes', array(
             'local' => 'cod_id',
             'foreign' => 'cod_hotel'));

        $this->hasMany('HoteisDistancias', array(
             'local' => 'cod_id',
             'foreign' => 'cod_hotel'));

        $this->hasMany('HoteisFacilidades', array(
             'local' => 'cod_id',
             'foreign' => 'cod_hotel'));

        $this->hasMany('HoteisRelacaoPromocoes', array(
             'local' => 'cod_id',
             'foreign' => 'cod_hotel'));

        $this->hasMany('ImprensaFotos', array(
             'local' => 'cod_id',
             'foreign' => 'cod_hotel'));

        $this->hasMany('ImprensaVideo', array(
             'local' => 'cod_id',
             'foreign' => 'cod_hotel'));

        $this->hasMany('RedesSociais', array(
             'local' => 'cod_id',
             'foreign' => 'cod_hotel'));
    }
}