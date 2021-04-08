<?
    class AjaxController extends Controller {
        
        # ATUALIZA ESTADO
        public function actionEstado(){
            $tmp = Imovel::model()->findAll( array('condition' => 'finalidade = "'.$_POST['finalidade'].'"', 'group' => 'uf') );
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
        public function actionCidade(){
            $tmp = Imovel::model()->findAll( array('condition' => 'finalidade = "'.$_POST['finalidade'].'" AND uf = "'.$_POST['estado'].'"', 'group' => 'cidade') );
            if( count($tmp) == 0 ){
                $return = '<option value="">Nenhum imóvel nesta cidade</option>';
            }else{
                $return = '<option value="">Selecione uma Cidade</option>';
            }
            foreach($tmp as $k => $v){
                if( !empty( $v->cidade ) ){
                    $return .= '<option value="'.$v->cidade.'">'.$v->cidadeBr.'</option>';
                }
            }
            echo $return;
        }
        
        # ATUALIZA BAIRRO
        public function actionBairro(){
            $tmp = Imovel::model()->findAll( array('condition' => 'finalidade = "'.$_POST['finalidade'].'" AND uf = "'.$_POST['estado'].'" AND cidade = "'.$_POST['cidade'].'"', 'group' => 'bairro') );
            if( count($tmp) == 0 ){
                $return = '<option value="">Nenhum imóvel neste bairro</option>';
            }else{
                $return = '<option value="">Selecione um Bairro</option>';
            }
            foreach($tmp as $k => $v){
                if( !empty( $v->bairro ) ){
                    $return .= '<option value="'.$v->bairro.'">'.$v->bairroBr.'</option>';
                }
            }
            echo $return;
        }
        
        
        # ATUALIZA TIPO
        public function actionTipo(){
            $tmp = Imovel::model()->findAll( array('condition' => 'finalidade = "'.$_POST['finalidade'].'" AND uf = "'.$_POST['estado'].'" AND cidade = "'.$_POST['cidade'].'" AND bairro = "'.$_POST['bairro'].'"', 'group' => 'tp_bem') );
            if( count($tmp) == 0 ){
                $return = '<option value="">Nenhum imóvel encontrado</option>';
            }else{
                $return = '<option value="">Selecione um Tipo</option>';
            }
            foreach($tmp as $k => $v){
                if( !empty( $v->tp_bem ) ){
                    $return .= '<option value="'.$v->tp_bem.'">'.$v->tipoBr.'</option>';
                }
            }
            echo $return;
        }
        
    }
?>