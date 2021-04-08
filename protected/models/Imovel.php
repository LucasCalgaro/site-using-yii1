<?php

/*
 * Comando para criar view no banco de dados dos clientes
 * CREATE VIEW zacarias_imoveis.imovel AS SELECT * FROM encontra_eibd.imovel WHERE id_imob = 119;
 * CREATE VIEW zacarias_imoveis.benf_cruz AS SELECT * FROM encontra_eibd.benf_cruz;
 */

class Imovel extends CActiveRecord {
    # ALIMENTA AS GLOBAIS

    private $codImob = 179;
    private $rPasta = 'encontra';
    private $socketIp = '198.50.183.148';
    private $socketPorta = 4040;
    public $finalidade;
    public $urlBem;
    public $urlCidade;
    public $urlBairro;
    public $urlFinali;
    public $cidadeBr;
    public $bairroBr;
    public $tipoBr;
    public $finalidadeBr;

    public $paArrayCamposParaPesquisa = array(
        "finalidade",
        "estado",
        "cidade",
        "bairro",
        "tipo",
        "valor_min",
        "valor_max",
        "referencia",
    );

        public function __construct()
    {
        parent::__construct();
        $this->codImob  = Yii::app()->params['codImob']; //179;
        $this->rPasta   = Yii::app()->params['rPasta']; //'encontra';
        $this->socketIp = Yii::app()->params['socketIp']; //'198.50.183.148';
        $this->socketPorta = Yii::app()->params['socketPorta']; //4040;
    }


    # REMOVE ACENTOS E ESPAÇOS

    private function limpaString($str) {
        $str = preg_replace('/[áàãâä]/ui', 'a', $str);
        $str = preg_replace('/[éèêë]/ui', 'e', $str);
        $str = preg_replace('/[íìîï]/ui', 'i', $str);
        $str = preg_replace('/[óòõôö]/ui', 'o', $str);
        $str = preg_replace('/[úùûü]/ui', 'u', $str);
        $str = preg_replace('/[ç]/ui', 'c', $str);
        $str = preg_replace('/[^a-z0-9]/i', '_', $str);
        $str = preg_replace('/_+/', '_', $str);
        return $str;
    }

    public function tableName() {
        return 'imovel';
    }

    public function rules() {
        return array(
            array('id, incorporacao, quadra, lote, utima, angariador, lat, lng', 'required'),
            array('cod_bem, trata_endereco, cep, qtde_quartos, qtde_suites, qtde_salas, qtde_cozinhas, qtde_banheiros, qtde_garagens, qtde_area_servico, anos_financ, meses_financ, anos_fim_financ, meses_fim_financ, destaque, lista, visualizacao, informacao, lancamento, oportunidade, recomendacao, familia, casal, idosos, estudantes, diversidade, empresario, mulher, solteiro', 'numerical', 'integerOnly' => true),
            array('lat, lng', 'numerical'),
            array('id', 'length', 'max' => 11),
            array('endereco_1, endereco_2, complemento, bairro, tp_financ, imagem, planta_baixa', 'length', 'max' => 40),
            array('cidade, observacao1, observacao2, observacao3, observacao4, proximidade1, proximidade2, proximidade3, proximidade4, regiao, estrutura', 'length', 'max' => 30),
            array('uf', 'length', 'max' => 2),
            array('incorporacao, quadra, lote', 'length', 'max' => 255),
            array('area_total, area_util, vlr_oferta, vlr_locacao, vlr_rentabilidade, vlr_financiamento, vlr_sld_devedor, vlr_direitos, vlr_poupanca, vlr_parcela, vlr_condominio, vlr_iptu', 'length', 'max' => 10),
            array('tp_bem, finalidade, aplicacao, estado, utima', 'length', 'max' => 50),
            array('video', 'length', 'max' => 256),
            array('descr_adicional', 'length', 'max' => 2000),
            array('angariador', 'length', 'max' => 120),
            array('benfeitorias, comentario, dt_reserva, anuncio, data_inc, dt_opcao, dt_latlng', 'safe'),
            array('cod_bem, id, trata_endereco, endereco_1, endereco_2, complemento, cidade, uf, cep, bairro, incorporacao, quadra, lote, area_total, area_util, qtde_quartos, qtde_suites, qtde_salas, qtde_cozinhas, qtde_banheiros, qtde_garagens, qtde_area_servico, observacao1, observacao2, observacao3, observacao4, proximidade1, proximidade2, proximidade3, proximidade4, regiao, estrutura, benfeitorias, comentario, dt_reserva, tp_bem, finalidade, aplicacao, estado, tp_financ, anos_financ, meses_financ, anos_fim_financ, meses_fim_financ, vlr_oferta, vlr_locacao, vlr_rentabilidade, vlr_financiamento, vlr_sld_devedor, vlr_direitos, vlr_poupanca, vlr_parcela, vlr_condominio, vlr_iptu, imagem, planta_baixa, video, destaque, lista, visualizacao, utima, informacao, lancamento, oportunidade, recomendacao, anuncio, descr_adicional, familia, casal, idosos, estudantes, diversidade, empresario, mulher, solteiro, data_inc, angariador, dt_opcao, lat, lng, dt_latlng', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
        );
    }

    public function attributeLabels() {
        return array(
            'cod_bem' => 'Cod Bem',
            'id' => 'ID',
            'trata_endereco' => 'Trata Endereco',
            'endereco_1' => 'Endereco 1',
            'endereco_2' => 'Endereco 2',
            'complemento' => 'Complemento',
            'cidade' => 'Cidade',
            'uf' => 'Uf',
            'cep' => 'Cep',
            'bairro' => 'Bairro',
            'incorporacao' => 'Incorporacao',
            'quadra' => 'Quadra',
            'lote' => 'Lote',
            'area_total' => 'Area Total',
            'area_util' => 'Area Util',
            'qtde_quartos' => 'Qtde Quartos',
            'qtde_suites' => 'Qtde Suites',
            'qtde_salas' => 'Qtde Salas',
            'qtde_cozinhas' => 'Qtde Cozinhas',
            'qtde_banheiros' => 'Qtde Banheiros',
            'qtde_garagens' => 'Qtde Garagens',
            'qtde_area_servico' => 'Qtde Area Servico',
            'observacao1' => 'Observacao1',
            'observacao2' => 'Observacao2',
            'observacao3' => 'Observacao3',
            'observacao4' => 'Observacao4',
            'proximidade1' => 'Proximidade1',
            'proximidade2' => 'Proximidade2',
            'proximidade3' => 'Proximidade3',
            'proximidade4' => 'Proximidade4',
            'regiao' => 'Regiao',
            'estrutura' => 'Estrutura',
            'benfeitorias' => 'Benfeitorias',
            'comentario' => 'Comentario',
            'dt_reserva' => 'Dt Reserva',
            'tp_bem' => 'Tp Bem',
            'finalidade' => 'Finalidade',
            'aplicacao' => 'Aplicacao',
            'estado' => 'Estado',
            'tp_financ' => 'Tp Financ',
            'anos_financ' => 'Anos Financ',
            'meses_financ' => 'Meses Financ',
            'anos_fim_financ' => 'Anos Fim Financ',
            'meses_fim_financ' => 'Meses Fim Financ',
            'vlr_oferta' => 'Vlr Oferta',
            'vlr_locacao' => 'Vlr Locacao',
            'vlr_rentabilidade' => 'Vlr Rentabilidade',
            'vlr_financiamento' => 'Vlr Financiamento',
            'vlr_sld_devedor' => 'Vlr Sld Devedor',
            'vlr_direitos' => 'Vlr Direitos',
            'vlr_poupanca' => 'Vlr Poupanca',
            'vlr_parcela' => 'Vlr Parcela',
            'vlr_condominio' => 'Vlr Condominio',
            'vlr_iptu' => 'Vlr Iptu',
            'imagem' => 'Imagem',
            'planta_baixa' => 'Planta Baixa',
            'video' => 'Video',
            'destaque' => 'Destaque',
            'lista' => 'Lista',
            'visualizacao' => 'Visualizacao',
            'utima' => 'Utima',
            'informacao' => 'Informacao',
            'lancamento' => 'Lancamento',
            'oportunidade' => 'Oportunidade',
            'recomendacao' => 'Recomendacao',
            'anuncio' => 'Anuncio',
            'descr_adicional' => 'Descr Adicional',
            'familia' => 'Familia',
            'casal' => 'Casal',
            'idosos' => 'Idosos',
            'estudantes' => 'Estudantes',
            'diversidade' => 'Diversidade',
            'empresario' => 'Empresario',
            'mulher' => 'Mulher',
            'solteiro' => 'Solteiro',
            'data_inc' => 'Data Inc',
            'angariador' => 'Angariador',
            'dt_opcao' => 'Dt Opcao',
            'lat' => 'Lat',
            'lng' => 'Lng',
            'dt_latlng' => 'Dt Latlng',
        );
    }

    public function search() {
        $criteria = new CDbCriteria;
        $criteria->compare('cod_bem', $this->cod_bem);
        $criteria->compare('id', $this->id, true);
        $criteria->compare('trata_endereco', $this->trata_endereco);
        $criteria->compare('endereco_1', $this->endereco_1, true);
        $criteria->compare('endereco_2', $this->endereco_2, true);
        $criteria->compare('complemento', $this->complemento, true);
        $criteria->compare('cidade', $this->cidade, true);
        $criteria->compare('uf', $this->uf, true);
        $criteria->compare('cep', $this->cep);
        $criteria->compare('bairro', $this->bairro, true);
        $criteria->compare('incorporacao', $this->incorporacao, true);
        $criteria->compare('quadra', $this->quadra, true);
        $criteria->compare('lote', $this->lote, true);
        $criteria->compare('area_total', $this->area_total, true);
        $criteria->compare('area_util', $this->area_util, true);
        $criteria->compare('qtde_quartos', $this->qtde_quartos);
        $criteria->compare('qtde_suites', $this->qtde_suites);
        $criteria->compare('qtde_salas', $this->qtde_salas);
        $criteria->compare('qtde_cozinhas', $this->qtde_cozinhas);
        $criteria->compare('qtde_banheiros', $this->qtde_banheiros);
        $criteria->compare('qtde_garagens', $this->qtde_garagens);
        $criteria->compare('qtde_area_servico', $this->qtde_area_servico);
        $criteria->compare('observacao1', $this->observacao1, true);
        $criteria->compare('observacao2', $this->observacao2, true);
        $criteria->compare('observacao3', $this->observacao3, true);
        $criteria->compare('observacao4', $this->observacao4, true);
        $criteria->compare('proximidade1', $this->proximidade1, true);
        $criteria->compare('proximidade2', $this->proximidade2, true);
        $criteria->compare('proximidade3', $this->proximidade3, true);
        $criteria->compare('proximidade4', $this->proximidade4, true);
        $criteria->compare('regiao', $this->regiao, true);
        $criteria->compare('estrutura', $this->estrutura, true);
        $criteria->compare('benfeitorias', $this->benfeitorias, true);
        $criteria->compare('comentario', $this->comentario, true);
        $criteria->compare('dt_reserva', $this->dt_reserva, true);
        $criteria->compare('tp_bem', $this->tp_bem, true);
        $criteria->compare('finalidade', $this->finalidade, true);
        $criteria->compare('aplicacao', $this->aplicacao, true);
        $criteria->compare('estado', $this->estado, true);
        $criteria->compare('tp_financ', $this->tp_financ, true);
        $criteria->compare('anos_financ', $this->anos_financ);
        $criteria->compare('meses_financ', $this->meses_financ);
        $criteria->compare('anos_fim_financ', $this->anos_fim_financ);
        $criteria->compare('meses_fim_financ', $this->meses_fim_financ);
        $criteria->compare('vlr_oferta', $this->vlr_oferta, true);
        $criteria->compare('vlr_locacao', $this->vlr_locacao, true);
        $criteria->compare('vlr_rentabilidade', $this->vlr_rentabilidade, true);
        $criteria->compare('vlr_financiamento', $this->vlr_financiamento, true);
        $criteria->compare('vlr_sld_devedor', $this->vlr_sld_devedor, true);
        $criteria->compare('vlr_direitos', $this->vlr_direitos, true);
        $criteria->compare('vlr_poupanca', $this->vlr_poupanca, true);
        $criteria->compare('vlr_parcela', $this->vlr_parcela, true);
        $criteria->compare('vlr_condominio', $this->vlr_condominio, true);
        $criteria->compare('vlr_iptu', $this->vlr_iptu, true);
        $criteria->compare('imagem', $this->imagem, true);
        $criteria->compare('planta_baixa', $this->planta_baixa, true);
        $criteria->compare('video', $this->video, true);
        $criteria->compare('destaque', $this->destaque);
        $criteria->compare('lista', $this->lista);
        $criteria->compare('visualizacao', $this->visualizacao);
        $criteria->compare('utima', $this->utima, true);
        $criteria->compare('informacao', $this->informacao);
        $criteria->compare('lancamento', $this->lancamento);
        $criteria->compare('oportunidade', $this->oportunidade);
        $criteria->compare('recomendacao', $this->recomendacao);
        $criteria->compare('anuncio', $this->anuncio, true);
        $criteria->compare('descr_adicional', $this->descr_adicional, true);
        $criteria->compare('familia', $this->familia);
        $criteria->compare('casal', $this->casal);
        $criteria->compare('idosos', $this->idosos);
        $criteria->compare('estudantes', $this->estudantes);
        $criteria->compare('diversidade', $this->diversidade);
        $criteria->compare('empresario', $this->empresario);
        $criteria->compare('mulher', $this->mulher);
        $criteria->compare('solteiro', $this->solteiro);
        $criteria->compare('data_inc', $this->data_inc, true);
        $criteria->compare('angariador', $this->angariador, true);
        $criteria->compare('dt_opcao', $this->dt_opcao, true);
        $criteria->compare('lat', $this->lat);
        $criteria->compare('lng', $this->lng);
        $criteria->compare('dt_latlng', $this->dt_latlng, true);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getValorSemPontos($dVlr) 
            {
        $dVlr = str_replace(".", "", $dVlr);
        return str_replace(",", ".", $dVlr);
    }

    public function getCriterioBuscaRapida($post) 
    {
        $finalidade = Yii::app()->user->hasState('finalidade') ? Yii::app()->user->getState('finalidade') : ( isset($post['finalidade']) ? $post['finalidade'] : null );
        $estado = Yii::app()->user->hasState('estado') ? Yii::app()->user->getState('estado') : ( isset($post['estado']) ? $post['estado'] : null );
        $cidade = Yii::app()->user->hasState('cidade') ? Yii::app()->user->getState('cidade') : ( isset($post['cidade']) ? $post['cidade'] : null );
        $bairro = Yii::app()->user->hasState('bairro') ? Yii::app()->user->getState('bairro') : ( isset($post['bairro']) ? $post['bairro'] : null );
        $tipo = Yii::app()->user->hasState('tipo') ? Yii::app()->user->getState('tipo') : ( isset($post['tipo']) ? $post['tipo'] : null );
        $referencia = Yii::app()->user->hasState('referencia') ? Yii::app()->user->getState('referencia') : ( isset($post['referencia']) ? $post['referencia'] : null );
        $valor_min = Yii::app()->user->hasState('valor_min') ? Yii::app()->user->getState('valor_min') : ( isset($post['valor_min']) ? $post['valor_min'] : null );
        $valor_max = Yii::app()->user->hasState('valor_max') ? Yii::app()->user->getState('valor_max') : ( isset($post['valor_max']) ? $post['valor_max'] : null );

        $criteria = new CDbCriteria;

        if (empty($referencia)) {

            $criteria->condition = 'finalidade = "' . $finalidade . '"';

            if (!empty($estado)) {
                $criteria->addCondition('uf = "' . $estado . '"');
            }
            if (!empty($cidade)) {
                $criteria->addCondition('cidade = "' . $cidade . '"');
            }
            if (!empty($bairro)) {
                $criteria->addCondition('bairro = "' . $bairro . '"');
            }
            if (!empty($tipo)) {
                $criteria->addCondition('tp_bem = "' . $tipo . '"');
            }
            if (!empty($valor_min) && !empty($valor_max)) {
                $criteria->addCondition('vlr_oferta>=' . self::getValorSemPontos($valor_min) . ' AND vlr_oferta<=' . self::getValorSemPontos($valor_max));
            }
        } 
        elseif (!empty($referencia)) {
            // $criteria->addCondition('id=' . sprintf("1%09d", $referencia) . ' OR id=' . sprintf("2%09d", $referencia));
            //$criteria->addSearchCondition('id', $referencia, true, 'LIKE');
            $criteria->addCondition('id LIKE "%' . $referencia . '%"');
        } 
        elseif (!empty($valor)) {
            $criteria->addCondition('vlr_oferta', $valor, true, 'LIKE');
        }
        $criteria->order = 'vlr_oferta ASC';
        return $criteria;
    }

    public function buscaRapida($post)
    {
        $criteria = self::getCriterioBuscaRapida($post);
        //echo "Opcoes: " . $criteria->condition . "<br>";

        return Imovel::model()->findAll($criteria);
    }

    // public function buscaRapida($post){
    //     $finalidade = Yii::app()->user->hasState('finalidade') ? Yii::app()->user->getState('finalidade') : ( isset($post['finalidade']) ? $post['finalidade'] : null ) ;
    //     $estado     = Yii::app()->user->hasState('estado') ? Yii::app()->user->getState('estado') : ( isset($post['estado']) ? $post['estado'] : null ) ;
    //     $cidade     = Yii::app()->user->hasState('cidade') ? Yii::app()->user->getState('cidade') : ( isset($post['cidade']) ? $post['cidade'] : null ) ;
    //     $bairro     = Yii::app()->user->hasState('bairro') ? Yii::app()->user->getState('bairro') : ( isset($post['bairro']) ? $post['bairro'] : null ) ;
    //     $tipo       = Yii::app()->user->hasState('tipo') ? Yii::app()->user->getState('tipo') : ( isset($post['tipo']) ? $post['tipo'] : null ) ;
    //     $referencia = Yii::app()->user->hasState('referencia') ? Yii::app()->user->getState('referencia') : ( isset($post['referencia']) ? $post['referencia'] : null ) ;
    //     $criteria = new CDbCriteria;
    //     if( empty($referencia) ){
    //         $criteria->condition = 'finalidade = "'.$finalidade.'"';
    //         if( !empty($estado) ){
    //             $criteria->addCondition('uf = "'.$estado.'"');
    //         }
    //         if( !empty($cidade) ){
    //             $criteria->addCondition('cidade = "'.$cidade.'"');
    //         }
    //         if( !empty($bairro) ){
    //             $criteria->addCondition('bairro = "'.$bairro.'"');
    //         }
    //         if( !empty($tipo) ){
    //             $criteria->addCondition('tp_bem = "'.$tipo.'"');
    //         }
    //     }else{
    //         $criteria->addSearchCondition('id', $referencia, true, 'LIKE');
    //     }
    //     return Imovel::model()->findAll($criteria);
    // }

    /*     * **** FUNÇÕES PARA RECUPERAR IMAGEM QUANDO ONLINE ***** */
    public function aGetRequisicaoSocket($tamanho) 
    {
        if (!empty($this->imobiliaria->pasta) AND ( !empty($this->finalidade))) {
            $requisicao['pasta'] = $this->imobiliaria->pasta;
            $requisicao['finalidade'] = $this->finalidade;
        } else {
            $requisicao['pasta'] = "encontra";
            $requisicao['finalidade'] = $this->finalidade;
        }

        $requisicao['id_imob'] = $this->id_imob;
        $requisicao['tamanho'] = $tamanho;

        if (!empty($this->imobiliaria->versao)) {
            $requisicao['versao'] = $this->imobiliaria->versao;
        }

        $aTmp = implode('|', $requisicao);
        return $aTmp;
    }

    public function aGetArrayImgsSocket($requisicao) 
    {
        if ((Yii::app()->request->hostInfo == 'http://www.chaleimobiliaria.com.br') or ( Yii::app()->request->hostInfo == 'http://chaleimobiliaria.com.br')) {

            if (!($sock = socket_create(AF_INET, SOCK_STREAM, 0))) {
                $errorcode = socket_last_error();
                $errormsg = socket_strerror($errorcode);
                return false;
            }

            //if(@!socket_connect($sock, Yii::app()->params['socketIp'], Yii::app()->params['socketPorta']))
            if (@!socket_connect($sock, $this->socketIp, $this->socketPorta)) {
                $errorcode = socket_last_error();
                $errormsg = socket_strerror($errorcode);
                return false;
            }

            socket_write($sock, trim($requisicao));
            if (!(socket_recv($sock, $buf, 1024000, MSG_WAITALL))) {
                $errorcode = socket_last_error();
                $errormsg = socket_strerror($errorcode);
                return false;
            }

            $resposta = explode('|', $buf);

            return $resposta;
        } else {
            return false;
        }
    }

    function getPathRealImagens()
    {
        //return Yii::getAlias('@common') . '/imagens/img' . DIRECTORY_SEPARATOR;
        return Yii::app()->params['pathImagens'];
    }

    function getPathWebImagens()
    {
        //return Yii::getAlias('@web/common/imagens/img') . DIRECTORY_SEPARATOR;
        return Yii::app()->params['urlImagens'];
    }
    
    public function aGetUrlImagensTodas($aResposta, $codBem = null) 
    {
        $imagens = array();
        if (!empty($aResposta)) {
            foreach ($aResposta as $v) {
                if (!empty($codBem)) {
                    //$imagens[$codBem][] = 'http://www.encontraimoveis.com.br/img/' . array_pop(explode('/', $v));
                    $imagens[$codBem][] = self::getPathWebImagens() . array_pop(explode('/', $v));
                } else {
                    //$imagens[] = 'http://www.encontraimoveis.com.br/img/' . array_pop(explode('/', $v));
                    $imagens[] = self::getPathWebImagens() . array_pop(explode('/', $v));
                }
            }
        }
        return $imagens;
    }

    public function getArrayImagensExiste()
    {
	$aPath = self::getPathRealImagens();
	//echo "Usa Glob " . $aPath;
	
        if(Yii::app()->params['usarGlobPesqFotos'] == true) {
	   // usar glob
           $aNome = sprintf("????-%09d.???", $this->cod_bem);
           return glob($aPath . $aNome);
        }
                                                            
        $aImg = substr($this->aImagem, 0, -1);
        return explode("|", $aImg);
        
        $arRtn = array();

        for($nIdxMacro=0; ; $nIdxMacro += 30) {
            $fIndicaTemArquivo = false;
            for($nIdx=0; $nIdx < 30; $nIdx++) {
                if(($nIdxMacro+$nIdx) == 0) {
                    $aNome = sprintf("imgr-%09d.jpg", $this->cod_bem);
                }
                else {
                    $aNome = sprintf("im%02d-%09d.jpg", ($nIdxMacro+$nIdx), $this->cod_bem);
                }
                //$aUrl = 'http://www.encontraimoveis.com.br/img/' . $aNome;
                $aUrl = self::getPathRealImagens() . $aNome;
                if(file_exists( $aUrl ) ) {
                //if( ($prFp=@fopen($aUrl, "r")) ) {
                //    fclose($prFp);
                    $arRtn[] = $aNome;
                    $fIndicaTemArquivo = true;
                }
                /*
                $file_headers = @get_headers($aUrl);
                if ($file_headers) {
                    $arRtn[] = $aNome;
                    $fIndicaTemArquivo = true;
                } 
                */
            }
            if($fIndicaTemArquivo == false) {
                // nao tem mais
                break;
            }
        }
        
        return $arRtn;
    }
    
// 107 [Q 1], 180 [Q 1], 22 [Q 3], 27 [Q 1], 705 [Q 1], 23 [Q 1], 703 [Q 1], 25 [Q 2], 98 [Q 1], 26 [Q 3], 37 [Q 1], 28 [Q 2], 35 [Q 1], 243 [M 378.000]

    public function trataBenfeitoria($string, $chSeparador=", ") 
    {
        $criteria = new CDbCriteria;
        $criteria->condition = 'aLegenda IS NOT NULL';
        $benf = new BenfCruz;
        $dataProvider = $benf->findAll($criteria);

        foreach ($dataProvider as $data) {
            $return[$data->id] = $data->aLegenda;
            //$return[$data->id] = $data->aLegenda . ', ';
        }
        $benfe = explode(',', $string);
        foreach ($benfe as $benfeitoria) {
            $ids[] = explode('[', str_replace(' ', '', $benfeitoria));
        }
        $benfeitorias = '';
        foreach ($ids as $id) {
            // $qtd = substr($id[1], -2,1);
            // $qtd = substr($id[1], -9,7);
            if (isset($id[1])) {
                $qtd = substr($id[1], 1, -1);
            } else {
                $qtd = 0;
            }
            if (isset($id[1][0])) {
                $tp = $id[1][0];
            } else {
                $tp = "";
            }
            if (isset($return[$id[0]])) {
                $item = $return[$id[0]];
            } else {
                $item = "";
            }

            $benfeitorias .= self::TrataTipoBenfeitoria($item, $tp, $qtd) . $chSeparador;
        }
        return $benfeitorias;
    }

// 243 [A 0.00 x 3.87]
    public function TrataTipoBenfeitoria($benf, $tp, $qt) 
    {
        switch ($tp) {
            case 'F' : {
                    return $benf;
                    break;
                }
            case 'Q' : {
                    return substr($qt, -2, 1) . " " . $benf;
                    break;
                }
            case 'M' : {
                    return substr($benf, 0, -2) . " " . number_format($qt, 2, ",", "") . " m&sup2;";
                    //return substr($benf, 0, -2) . " " . $qt . " m&sup2;";
                    break;
                }
            case 'A' : {
                    return substr($benf, 0, -2) . " " . $qt . "";
                    break;
                }
            case 'V' : {
                    return $benf . " " . "R$ " . $qt;
                    break;
                }
            case '' : {
                    return $qt;
                    break;
                }
            default : {
                    return $qt . " " . $benf;
                    break;
                }
        }
    }

    public function aTrataCaracEstran($str, $reverso = false) {
        $caracEstran = array('Ã£', 'Ã¢', 'Ã¡', 'Ã©', 'Ãµ', 'Ã³', 'Ã´', 'Ãº', 'Ã§', 'Â°', 'Âº', 'Ã­', 'Ã', 'Ãƒ', 'Ãª');
        $caracNormal = array('ã', 'â', 'á', 'é', 'õ', 'ó', 'ô', 'ú', 'ç', '°', 'º', 'í', 'Á', 'Ã', 'ê');
        if ($reverso) {
            return str_replace($caracNormal, $caracEstran, $str);
        } else {
            return str_replace($caracEstran, $caracNormal, $str);
        }
    }

    public function tabImoveis($finalidade) {

        $criteria = new CDbCriteria();
        $criteria->condition = 'finalidade = ' . $finalidade;
        // $criteria->group = 'tp_bem';
        // return Imovel::model()->findAll($criteria); 
        //   	foreach($array as $v){
        // 	$criteria->addCondition('finalidade = "'.$v.'"', 'OR');
        // }
        return Imovel::model()->findAll($criteria);
        // foreach ($finalidade as $key => $value) {
        // 	print_r($value);
        // }
    }

    # CORREÇÃO DE ACENTUAÇÃO

    public function afterFind() {

        #  PREPARA INFORMAÇÕES PARA A URL
        $this->urlBairro = strtolower($this->limpaString(utf8_decode($this->bairro)));
        $this->urlBem = strtolower($this->limpaString(utf8_decode($this->tp_bem)));
        $this->urlCidade = strtolower($this->limpaString(utf8_decode($this->cidade)));
        $this->urlFinali = strtolower($this->limpaString(utf8_decode($this->finalidade)));
        
        if(!empty($this->finalidade)
        && $this->finalidade == 'Locacao') {
            $this->finalidadeBr = utf8_encode('Locação');
            //$this->finalidade = utf8_encode('Locação');
        }
        
        /*
        # Corrige Texto
        foreach ($this as $k => $v) {

            switch ($k) {
                case 'cidade':
                    $this->cidadeBr = utf8_decode($this->$k);
                    break;
                case 'bairro':
                    $this->bairroBr = utf8_decode($this->$k);
                    break;
                case 'tp_bem':
                    $this->tipoBr = utf8_decode($this->$k);
                    break;
                default:
                    $this->$k = utf8_decode($this->$k);
            }
        }
        */
        $this->cidadeBr = Imovel::model()->getStringUf8($this->cidade);
        $this->bairroBr = Imovel::model()->getStringUf8($this->bairro);
        $this->tipoBr = Imovel::model()->getStringUf8($this->tp_bem);
        if (!empty($this->benfeitorias)) {
            $this->benfeitorias = $this->aTrataCaracEstran($this->trataBenfeitoria($this->benfeitorias, '|'));
        }

        return true;
    }

    # FAVORITOS

    public function Favoritos($array) {
        $criteria = new CDbCriteria;
        foreach ($array as $v) {
            $criteria->addCondition('cod_bem = "' . $v . '"', 'OR');
        }
        return Imovel::model()->findAll($criteria);
    }

    public function getAllEstadosDaFederacao($paFinalidade = false) {

        $aSql = "SELECT uf "
                . "FROM " . Imovel::tableName();
        if (isset($paFinalidade) && $paFinalidade != false) {
            $aSql .= " WHERE finalidade='" . $paFinalidade . "' ";
        }
        $aSql .= " GROUP BY uf;";

        // teste de um estado so
        /*
          $aSql = "SELECT uf "
          . "FROM " . Imovel::tableName();
          $aSql .= " WHERE uf='PR' ";
          $aSql .= " GROUP BY uf;";
         */
        return Imovel::model()->findAllBySql($aSql);
    }

    public function getAllCidades($paUF = false, $paFinalidade = false) {

        $aSql = "SELECT cidade "
                . "FROM " . Imovel::tableName();
        if ($paUF != false || $paFinalidade != false) {
            $aSql .= " WHERE ";
            if ($paUF != false) {
                $aSql .= " uf='" . $paUF . "' ";
            }
            if ($paFinalidade != false) {
                if ($paUF != false) {
                    $aSql .= " AND ";
                }
                $aSql .= " finalidade='" . $paFinalidade . "' ";
            }
        }
        $aSql .= " GROUP BY cidade;";

        /*
          // teste de uma cidade so
          $aSql = "SELECT cidade "
          . "FROM " . Imovel::tableName()
          . " WHERE cidade='Apucarana'"
          . " GROUP BY cidade;";
         */
        return Imovel::model()->findAllBySql($aSql);
    }

    public function getMaiorValorDoCampo($aNomeCampo, $paFinalidade = false, $paEstado = false, $paCidade = false, $paBairro = false, $paTipo = false) {
        $aSql = "SELECT MAX(" . $aNomeCampo . ") "
                . "FROM " . Imovel::tableName()
                . " WHERE " . $aNomeCampo . "<99999999";
        if ($paFinalidade != false) {
            $aSql .= " AND finalidade='" . $paFinalidade . "'";
        }
        if ($paEstado != false) {
            $aSql .= " AND uf='" . $paEstado . "'";
        }
        if ($paCidade != false) {
            $aSql .= " AND cidade='" . $paCidade . "'";
        }
        if ($paBairro != false) {
            $aSql .= " AND bairro='" . $paBairro . "'";
        }
        if ($paTipo != false) {
            $aSql .= " AND tp_bem='" . $paTipo . "'";
        }

        return Yii::app()->db->createCommand($aSql)->queryScalar();
    }

    public function getMenorValorDoCampo($aNomeCampo, $paFinalidade = false, $paEstado = false, $paCidade = false, $paBairro = false, $paTipo = false) {
        $aSql = "SELECT MIN(" . $aNomeCampo . ") "
                . "FROM " . Imovel::tableName()
                . " WHERE " . $aNomeCampo . ">0";
        if ($paFinalidade != false) {
            $aSql .= " AND finalidade='" . $paFinalidade . "'";
        }
        if ($paEstado != false) {
            $aSql .= " AND uf='" . $paEstado . "'";
        }
        if ($paCidade != false) {
            $aSql .= " AND cidade='" . $paCidade . "'";
        }
        if ($paBairro != false) {
            $aSql .= " AND bairro='" . $paBairro . "'";
        }
        if ($paTipo != false) {
            $aSql .= " AND tp_bem='" . $paTipo . "'";
        }

        return Yii::app()->db->createCommand($aSql)->queryScalar();
    }

    public function getQtdImoveis($paFinalidade = false, $paEstado = false, $paCidade = false, $paBairro = false, $paTipo = false) {
        $aSql = "SELECT COUNT(*) "
                . "FROM " . Imovel::tableName();
        $aCampoLigacao = " WHERE ";
        if ($paFinalidade != false) {
            $aSql .= $aCampoLigacao . " finalidade='" . $paFinalidade . "'";
            $aCampoLigacao = " AND ";
        }
        if ($paEstado != false) {
            $aSql .= $aCampoLigacao . " uf='" . $paEstado . "'";
            $aCampoLigacao = " AND ";
        }
        if ($paCidade != false) {
            $aSql .= $aCampoLigacao . " cidade='" . $paCidade . "'";
            $aCampoLigacao = " AND ";
        }
        if ($paBairro != false) {
            $aSql .= $aCampoLigacao . " bairro='" . $paBairro . "'";
            $aCampoLigacao = " AND ";
        }
        if ($paTipo != false) {
            $aSql .= $aCampoLigacao . " tp_bem='" . $paTipo . "'";
            $aCampoLigacao = " AND ";
        }

        return Yii::app()->db->createCommand($aSql)->queryScalar();
    }

    public static function getStringUf8($aTexto) 
    {
	return Util::getStringUf8($aTexto);
	/*
        return mb_convert_case($aTexto,  MB_CASE_TITLE);
        //return self::getStringUf8( ucwords( mb_strtolower($aTexto, 'UTF-8') ) );
        
        $aTst1 = mb_detect_encoding($aTexto, 'UTF-8', true);
        $aUtf1 = utf8_decode($aTexto);
        $aTst2 = mb_detect_encoding($aUtf1, 'UTF-8', true);
        $aUtf2 = utf8_encode($aUtf1);
        $aTst3 = mb_detect_encoding($aUtf2, 'UTF-8', true);

        if ($aTst1 == $aTst2 && $aTst1 == $aTst3 && $aTst1 == 'UTF-8') {
            if ($aUtf1 != false && $aUtf1 != $aTexto) {
                return $aUtf1;
            }
        }
        return $aTexto;
        */
    }

    public static function getStringUf8NomeProprio($aTexto) 
    {
	return Util::getStringUf8($aTexto);
        //return Imovel::model()->getStringUf8(ucwords(mb_strtolower($aTexto, 'UTF-8')));
    }

}
