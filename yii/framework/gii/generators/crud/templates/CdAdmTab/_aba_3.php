<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/*
 * CdADM - Web -> Administrador de Bens e Contratos
 * ------------------------------------------------
 * 
 *   Funcao: 
 *  Criacao: <?=date('d-m-Y')?> - Seu Nome
 * Objetivo: 
 * 
 *  Histórico de Alteracoes
 *    Data   Autor      Descricao
 *
 *
 **/
?>
<?php
$nQtdCampos = 14;
$aIdTab = 'todasAsAbas_' . $this->modelClass;
$nNroAba = 3;
$nIdxCampoInicial = ($nQtdCampos*(3-1) );
require 'gera/geraEntradas.php';
?>
