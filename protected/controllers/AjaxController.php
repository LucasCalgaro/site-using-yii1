<?php
    class AjaxController extends Controller {
        
        # ATUALIZA ESTADO
        public function actionEstado()
        {
            //$tmp = Imovel::model()->findAll( array('condition' => 'finalidade = "'.$_POST['finalidade'].'"', 'group' => 'uf') );
            $tmp = Imovel::model()->getAllEstadosDaFederacao($_POST['finalidade']);
            if( count($tmp) == 0 ){
                $return = '<option value="">Nenhum imóvel nesta Finalidade</option>';
            }else{
                $return = '<option value="">Selecione um Estado</option>';
            }
            foreach($tmp as $k => $v){
                if( !empty( $v->uf ) ){
                    $return .= '<option value="'.$v->uf.'">'.$v->uf.'</option>';
                }
            }
            echo $return;
        }
        
        # ATUALIZA CIDADE
        public function actionCidade()
        {
            //$tmp = Imovel::model()->findAll( array('condition' => 'finalidade = "'.$_POST['finalidade'].'" AND uf = "'.$_POST['estado'].'"', 'group' => 'cidade') );
            //$tmp = Imovel::model()->findAll( array('condition' => 'finalidade = "'.$_POST['finalidade'].'" AND uf = "PR"', 'group' => 'cidade') );
            $tmp = Imovel::model()->getAllCidades($_POST['estado'], $_POST['finalidade']);
            if( count($tmp) == 0 ){
                $return = '<option value="">Nenhum imóvel nesta cidade</option>';
            }else{
                $return = '<option value="">Selecione uma Cidade</option>';
            }
            foreach($tmp as $k => $v){
                if( !empty( $v->cidade ) ){
                    $return .= '<option value="'.$v->cidade.'">'.Imovel::model()->getStringUf8($v->cidade).'</option>';
                }
            }
            echo $return;
        }
        
        # ATUALIZA BAIRRO
        public function actionBairro()
        {
            // $tmp = Imovel::model()->findAll( array('condition' => 'finalidade = "'.$_POST['finalidade'].'" AND uf = "'.$_POST['estado'].'" AND cidade = "'.$_POST['cidade'].'"', 'group' => 'bairro') );
            //$tmp = Imovel::model()->findAll( array('condition' => 'finalidade = "'.$_POST['finalidade'].'" AND uf = "PR" AND cidade = "'.$_POST['cidade'].'"', 'group' => 'bairro') );
            // $tmp = Imovel::model()->getAllBairros(isset($_POST['estado']) ? $_POST['estado'] : false, 
            //                                       isset($_POST['cidade']) ? $_POST['cidade'] : false, 
            //                                       isset($_POST['finalidade']) ? $_POST['finalidade'] : false);
            $tmp = Imovel::model()->findAll( array('condition' => 'finalidade = "'.$_POST['finalidade'].'" '
                                                                . 'AND uf = "'.$_POST['estado'].'" '
                                                                . 'AND cidade = "'.$_POST['cidade'].'"', 
                                                    'group' => 'bairro') );
            if( count($tmp) == 0 ){
                $return = '<option value="">Nenhum imóvel neste bairro</option>';
            }else{
                $return = '<option value="">Todos</option>';
                // $return .= '<option value="">Selecione um bairro</option>';
            }
                // $return .= '<option value=" ">bairro</option>';
            foreach($tmp as $k => $v){
                if( !empty( $v->bairro ) ){
                    //$return .= '<option value="'.$v->bairro.'">'.ucwords(strtolower(Imovel::model()->getStringUf8($v->bairroBr))).'</option>';
                    $return .= '<option value="'.$v->bairro.'">'.Imovel::model()->getStringUf8NomeProprio($v->bairroBr).'</option>';
                }
            }
            echo $return;
        }
        /*
        public function actionBairro()
        {
            // $tmp = Imovel::model()->findAll( array('condition' => 'finalidade = "'.$_POST['finalidade'].'" AND uf = "'.$_POST['estado'].'" AND cidade = "'.$_POST['cidade'].'"', 'group' => 'bairro') );
            //$tmp = Imovel::model()->findAll( array('condition' => 'finalidade = "'.$_POST['finalidade'].'" AND uf = "PR" AND cidade = "'.$_POST['cidade'].'"', 'group' => 'bairro') );
            // $tmp = Imovel::model()->getAllBairros(isset($_POST['estado']) ? $_POST['estado'] : false, 
            //                                       isset($_POST['cidade']) ? $_POST['cidade'] : false, 
            //                                       isset($_POST['finalidade']) ? $_POST['finalidade'] : false);
            $tmp = Imovel::model()->findAll( array('condition' => 'finalidade = "'.$_POST['finalidade'].'" AND cidade = "'.$_POST['cidade'].'"', 'group' => 'bairro') );
            if( count($tmp) == 0 ){
                $return = '<option value="">Nenhum imóvel neste bairro</option>';
            }else{
                $return = '<option value="">Todos</option>';
                // $return .= '<option value="">Selecione um bairro</option>';
            }
                // $return .= '<option value=" ">bairro</option>';
            foreach($tmp as $k => $v){
                if( !empty( $v->bairro ) ){
                    $return .= '<option value="'.$v->bairro.'">'.$v->bairro.'</option>';
                }
            }
            echo $return;
        }
        */
        
        # ATUALIZA TIPO
        public function actionTipo()
        {
            if(isset($_POST['finalidade']) 
            && isset($_POST['cidade'])
            && isset($_POST['bairro']) ) {
                // $tmp = Imovel::model()->findAll( array('condition' => 'finalidade = "'.$_POST['finalidade'].'" AND uf = "'.$_POST['estado'].'" AND cidade = "'.$_POST['cidade'].'" AND bairro = "'.$_POST['bairro'].'"', 'group' => 'tp_bem') );
                $tmp = Imovel::model()->findAll( array('condition' => 'finalidade = "'.$_POST['finalidade'].'" '
                                                                    . 'AND uf = "'.$_POST['estado'].'" '
                                                                    . 'AND cidade = "'.$_POST['cidade'].'" '
                                                                    . 'AND bairro = "'.$_POST['bairro'].'" ', 
                                                       'group' => 'tp_bem') );

                // $tmp = Imovel::model()->findAll( array('condition' => 'finalidade = "'.$_POST['finalidade'].'" AND uf = "'.$_POST['estado'].'" AND cidade = "'.$_POST['cidade'].'"',
                                                // 'group' => 'tp_bem') );
                
                if( count($tmp) == 0 ){
                    $return = '<option value="">Nenhum imóvel encontrado</option>';
                }else{
                    $return = '<option value="">Selecione um Tipo</option>';
                    // $return = '<option value="">Todos</option>';
                }
                foreach($tmp as $k => $v){
                    if( !empty( $v->tp_bem ) ){
                        //$return .= '<option value="'.$v->tp_bem.'">'.ucwords(strtolower(Imovel::model()->getStringUf8($v->tipoBr))).'</option>';
                        $return .= '<option value="'.$v->tp_bem.'">'.Imovel::model()->getStringUf8NomeProprio($v->tipoBr).'</option>';
                    }
                }
            }
            else {
                $return = '<option value="">Nenhum imóvel encontrado</option>';
            }
            echo $return;
        }

        /*
        public function actionTipo()
        {
            if(isset($_POST['finalidade']) 
            && isset($_POST['cidade'])
            && isset($_POST['bairro']) ) {
                // $tmp = Imovel::model()->findAll( array('condition' => 'finalidade = "'.$_POST['finalidade'].'" AND uf = "'.$_POST['estado'].'" AND cidade = "'.$_POST['cidade'].'" AND bairro = "'.$_POST['bairro'].'"', 'group' => 'tp_bem') );
                $tmp = Imovel::model()->findAll( array('condition' => 'finalidade = "'.$_POST['finalidade'].'"  AND cidade = "'.$_POST['cidade'].'" ', 'group' => 'tp_bem') );

                // $tmp = Imovel::model()->findAll( array('condition' => 'finalidade = "'.$_POST['finalidade'].'" AND uf = "'.$_POST['estado'].'" AND cidade = "'.$_POST['cidade'].'"',
                                                // 'group' => 'tp_bem') );
                
                if( count($tmp) == 0 ){
                    $return = '<option value="">Nenhum imóvel encontrado</option>';
                }else{
                    $return = '<option value="">Selecione um Tipo</option>';
                    // $return = '<option value="">Todos</option>';
                }
                foreach($tmp as $k => $v){
                    if( !empty( $v->tp_bem ) ){
                        $return .= '<option value="'.$v->tp_bem.'">'.$v->tp_bem.'</option>';
                    }
                }
            }
            else {
                $return = '<option value="">Nenhum imóvel encontrado</option>';
            }
            echo $return;
        }
        */
        
        # ATUALIZA VALOR
        public function actionFaixaValor()
        {
            $sFinalidade = false;
            $sEstado     = false;
            $sCidade     = false;
            $sBairro     = false;
            $sTipo       = false;
            if(isset($_POST['finalidade']) )
                $sFinalidade = $_POST['finalidade'];
            if(isset($_POST['estado']) )
                $sEstado = $_POST['estado'];
            if(isset($_POST['cidade']) )
                $sCidade = $_POST['cidade'];
            if(isset($_POST['bairro']) )
                $sBairro = $_POST['bairro'];
            if(isset($_POST['tipo']) )
                $sTipo = $_POST['tipo'];
            
            $nVlrMinimo = abs(Imovel::model()->getMenorValorDoCampo('vlr_oferta', $sFinalidade, $sEstado, $sCidade, $sBairro, $sTipo));
            $nVlrMaximo = abs(Imovel::model()->getMaiorValorDoCampo('vlr_oferta', $sFinalidade, $sEstado, $sCidade, $sBairro, $sTipo));
            
            echo $nVlrMinimo . "|" . $nVlrMaximo;
        }
        
    }
?>