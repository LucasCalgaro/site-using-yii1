<?
function array_search_multi($busca, $arrays){
    foreach((array)$arrays as $array){
        if (is_array($array)) {
            if(array_search_multi($busca, $array)) return true;
        }else{
            if($busca == $array) return true;
        }
    }
    return false;
}

function tiraMoeda($valor) {
    $pontos = array(",", ".");
    $result = str_replace($pontos, "", $valor);
    return $result;
}
 function clearId($id){
     $LetraProibi = Array(" ",".","'","\"","&","|","!","#","$","¨","*","(",")","`","´","<",">",";","=","+","§","{","}","[","]","?","%");
     $special = Array('Á','È','ô','Ç','á','è','Ò','ç','Â','Ë','ò','â','ë','Ø','Ñ','À','Ð','ø','ñ','à','ð','Õ','Å','õ','Ý','å','Í','Ö','ý','Ã','í','ö','ã',
        'Î','Ä','î','Ú','ä','Ì','ú','Æ','ì','Û','æ','Ï','û','ï','Ù','®','É','ù','©','é','Ó','Ü','Þ','Ê','ó','ü','þ','ê','Ô','ß','‘','’','‚','“','”','„');
     $clearspc = Array('a','e','o','c','a','e','o','c','a','e','o','a','e','o','n','a','d','o','n','a','o','o','a','o','y','a','i','o','y','a','i','o','a',
        'i','a','i','u','a','i','u','a','i','u','a','i','u','i','u','','e','u','c','e','o','u','p','e','o','u','b','e','o','b','','','','','','');
     $newId = str_replace($special, $clearspc, $id);
     $newId = str_replace($LetraProibi, " ", trim($newId));
     return strtolower($newId);
  }
function acentos($texto) {
    $array1 = array("&aacute;", "&nbsp;", "&eacute;", "&atilde;", "&ocirc;", "&oacute;", "&iacute;", "&ccedil;", "&ecirc;", "&sup2;", "&otilde;", "&acirc;", "&uacute;", "&ordm;", "&Aacute;", "a￿");
    $array2 = array("a", " ", "e", "a", "o", "a", "i", "c", "e", "²", "o", "a", "u", "º", "A", "ó");
    return str_replace($array1, $array2, $texto);
}
/*function url_exists($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return ($code == 200); // verifica se recebe "status OK"
}*/



    $arquivo = "../../../../../zap/zap.xml";
    $ponteiro = fopen(dirname(__FILE__).$arquivo, "w");
    
    fwrite($ponteiro, "<?xml version='1.0'?>\r\n");
    fwrite($ponteiro, "<Carga>\r\n");
    fwrite($ponteiro, "<Imoveis>\r\n");

    $encontra = "http://encontraimoveis.com.br";
     foreach($model as $k => $v){

            $TbBem = ereg_replace("[^a-zA-Z0-9_]", '', clearId(utf8_decode($v->tp_bem)));
            switch ($TbBem) {
                        case 'apartamento':
                        case 'apartamentos':
                        case 'triplex':
                        case 'duplex':
                        case 'flat':
                        case 'apto':
                            $SubTipoImovel ="Apartamento Padrão";
                            break;
                            
                        case 'loft':                        
                            $SubTipoImovel ="Loft";
                            break;

                        case 'kitnets':
                        case 'kitnet':
                        case 'kitinete':
                        case 'kitchenette':
                            $SubTipoImovel ="Kitchenette/Conjugados";
                            break;

                        case 'casa':
                        case 'casa de alvenaria':
                        case 'casa de madeira':
                        case 'casa de geminada':
                        case 'casa de mista':
                        case 'casa de residencial':
                        case 'residaâªncia':
                        case 'sobrado':
                        case 'chale':
                        case 'residência':
                        case 'residencia':
                            $SubTipoImovel ="Casa Padrão";
                            break;

                        case 'rural':
                            $SubTipoImovel = "rural";
                            break;     

                        case 'casaemcondominio':
                        case 'condominiocasasterrenos':
                        case 'condominiocasas':
                        case 'residenciaemcondominio':
                            $SubTipoImovel = "Casa de Condomínio";
                            break;

                        case 'chacara':
                        case 'chacara campo':
                        case 'terreno':
                        case 'terrenoemcondominio':
                        case 'condominioterreno':
                        case 'areacconstrucao':
                        case 'lote':
                            $SubTipoImovel = "Terreno Padrao";
                            break;

                        
                        case 'ponto comercial':
                        case 'barracaocomercial':
                        case 'imovelcomercial':
                        case 'comercial':
                        case 'sala':
                            $SubTipoImovel = "Comercial";
                            break;
                        
                        case 'galpao':
                            $SubTipoImovel = "Galpão";
                            break;     

            }


            switch ($v->uf) {
                  case 'AC': $estado = 'Acre';break;
                  case 'AL': $estado = 'Alagoas';break;
                  case 'AP': $estado = 'Amapá';break;
                  case 'AM': $estado = 'Amazonas';break;
                  case 'BA': $estado = 'Bahia';break;
                  case 'CE': $estado = 'Ceará';break;
                  case 'DF': $estado = 'Distrito Federal';break;
                  case 'ES': $estado = 'Espírito Santo';break;
                  case 'GO': $estado = 'Goiás';break;
                  case 'MA': $estado = 'Maranhão';break;
                  case 'MT': $estado = 'Mato Grosso';break;
                  case 'MS': $estado = 'Mato Grosso do Sul';break;
                  case 'MG': $estado = 'Minas Gerais';break;
                  case 'PA': $estado = 'Pará';break;
                  case 'PB': $estado = 'Paraíba';break;
                  case 'PR': $estado = 'Paraná';break;
                  case 'PE': $estado = 'Pernambuco';break;
                  case 'PI': $estado = 'Piauí';break;
                  case 'RJ': $estado = 'Rio de Janeiro';break;
                  case 'RN': $estado = 'Rio Grande do Norte';break;
                  case 'RS': $estado = 'Rio Grande do Sul';break;
                  case 'RO': $estado = 'Rondônia';break;
                  case 'RR': $estado = 'Roraima';break;
                  case 'SC': $estado = 'Santa Catarina';break;
                  case 'SP': $estado = 'São Paulo';break;
                  case 'SE': $estado = 'Sergipe';break;
                  case 'TO': $estado = 'Tocantins';break;
           }
           
//           180 [Q 1], 22 [Q 1], 23 [Q 1], 25 [Q 1], 26 [Q 1], 28 [Q 1], 35 [Q 1]

        if ($v->finalidade == 'Venda') {
        	$cod = "V";
        	$vlrV = tiraMoeda(substr($v->vlr_oferta, 0, -2)); 
            //$vlrV = tiraMoeda(substr($v->vlr_oferta, 0, -2));
	        $vlrL = "";
        }else{
            $cod = "L";
            $vlrL = tiraMoeda(substr($v->vlr_oferta, 0, -2));
            //$vlrL = tiraMoeda(substr($v->vlr_locacao, 0, -2));
            $vlrV = "";
        }
        // $TpBem = strtolower(utf8_encode(clearId($v->tp_bem)));
        $conteudo ='<Imovel>';
//       $conteudo .='<TTpb>' . $TbBem . '</TTpb>';
        $conteudo .='<CodigoImovel>'.$cod.'' . substr($v->id, 1) * 1 . '</CodigoImovel>';
        if(utf8_decode($v->tp_bem) == 'Apto' OR utf8_decode($v->tp_bem) == 'apto'){
        	$conteudo .='<TipoImovel>Apartamento</TipoImovel>';
        }else{
	        $conteudo .='<TipoImovel>' . utf8_decode($v->tp_bem) . '</TipoImovel>';
	}
        $conteudo .='<SubTipoImovel>' . $SubTipoImovel . '</SubTipoImovel>';        
        $conteudo .='<CategoriaImovel>Padrão</CategoriaImovel>';
        $conteudo .='<TipoOferta>'.$v->lista.'</TipoOferta>';
        $conteudo .='<UF>'.$v->uf.'</UF>';
        $conteudo .='<Cidade>'.utf8_decode($v->cidade).'</Cidade>';
        $conteudo .='<Bairro>'.acentos($v->bairro).'</Bairro>';
        $conteudo .='<Numero></Numero>';
        // $conteudo .='<Numero>'.$v->endereco_1.'</Numero>';
        $conteudo .='<Complemento>'.acentos(utf8_decode($v->complemento)).'</Complemento>';
        if($v->cep == "0"){
            $conteudo .='<CEP></CEP>';
        }else{
            $conteudo .='<CEP>'.$v->cep.'</CEP>';
        }
        $conteudo .='<PrecoVenda>'.$vlrV.'</PrecoVenda>';
        $conteudo .='<PrecoLocacao>'.$vlrL.'</PrecoLocacao>';
        $conteudo .='<PrecoLocacaoTemporada></PrecoLocacaoTemporada>';
        $conteudo .='<PrecoCondominio>'.tiraMoeda(substr($v->vlr_condominio,0,-2)).'</PrecoCondominio>';
        // $conteudo .='<AreaUtil>'.tiraMoeda(substr($v->area_util,0,-2)).'</AreaUtil>';
        $conteudo .='<AreaTotal>'.tiraMoeda(substr($v->area_total,0,-2)).'</AreaTotal>';
        $conteudo .='<UnidadeMetrica>m²</UnidadeMetrica>';

	
//	$bft = clearId(implode('--,&nbsp;', array_filter(explode(',&nbsp;--', $v->benfeitorias ))));
//        $arr = explode(',', $bft);
//        $arrN = array();
//        foreach ($arr as $item) {
//        	$value = explode(', ', $item);
//        	$arrN[$value[0]] = $value[1];
//        }
//        $dormitorio = substr($arr[0], 0,1);
//        if($SubTipoImovel == "Comercial" or $SubTipoImovel == "rural" or $SubTipoImovel == "Terreno"){
//        		$conteudo .='<QtdDormitorios></QtdDormitorios>';
//        	}else{
//	           $conteudo .='<QtdDormitorios>'.$dormitorio.'</QtdDormitorios>';
//        }
	
	
        
	$dormitorio = $v->qtde_suites + $v->qtde_quartos;
        $conteudo .='<QtdDormitorios>'.$dormitorio.'</QtdDormitorios>';
        
        $conteudo .='<QtdSuites>'.$v->qtde_suites.'</QtdSuites>';
        $conteudo .='<QtdBanheiros>'.$v->qtde_banheiros.'</QtdBanheiros>';

        $conteudo .='<Observacao>'.utf8_encode(acentos(clearId($v->anuncio))).'</Observacao>';
        

        $conteudo .='<Fotos>';
        
        
                /*$filename = $encontra . "/img/imgr-" . str_pad($v->cod_bem, 9, "0", STR_PAD_LEFT) . ".jpg";
                if (url_exists($filename)) {
                    $conteudo .=' <Foto>';
                    $conteudo .=' <NomeArquivo>imgr-'.$v->cod_bem.'.jpg</NomeArquivo>';
                    $conteudo .=' <URLArquivo>' . $filename . "</URLArquivo>";
                    $conteudo .=' <Principal>1</Principal>';
                    $conteudo .=' </Foto>';
                }
                for ($l = 1; $l <= 100; $l++) {
                    $filename = $encontra . "/img/im" . str_pad($l, 2, "0", STR_PAD_LEFT) . "-" . str_pad($v->cod_bem, 9, "0", STR_PAD_LEFT) . ".jpg";
                    if (url_exists($filename)) {
                        $conteudo .=' <Foto>';
                        $conteudo .=' <NomeArquivo>im'.str_pad($l, 2, "0", STR_PAD_LEFT)."-".$v->cod_bem.'.jpg</NomeArquivo>';
                        $conteudo .=' <URLArquivo>' . $filename . '</URLArquivo>';
                        $conteudo .=' </Foto>';
                    }
                }*/
$aImg = '';
$aImg  = substr($v->aImagem, 0, -1);
$Img = explode("|", $aImg);
$total = count($Img);
for ($i=0; $i < $total ; $i++) { 
    $conteudo .=' <Foto>';
    $conteudo .=' <NomeArquivo>'.$Img[$i].'</NomeArquivo>';
    $conteudo .=' <URLArquivo>http://encontraimoveis.com.br/img/' . $Img[$i] . "</URLArquivo>";
    if($total == ($i+1)){
    	$conteudo .=' <Principal>1</Principal>';
    }
    $conteudo .=' </Foto>';    
//    echo $total.'*>'.($i+1).'<br>';
}
/*$r = end($Img);
if(!empty($aImg)){
	if (strstr($r, 'r')) {
		$conteudo .=' <Foto>';
		$conteudo .=' <NomeArquivo>'.$r.'</NomeArquivo>';
		$conteudo .=' <URLArquivo>http://encontraimoveis.com.br/img/' . $r . "</URLArquivo>";
                $conteudo .=' <Principal>1</Principal>';
		$conteudo .=' </Foto>';
//		$imagem = "http://encontraimoveis.com.br/img/".$r;
	}else{
		$conteudo .=' <Foto>';
		$conteudo .=' <NomeArquivo>'.$Img[0].'</NomeArquivo>';
		$conteudo .=' <URLArquivo>http://encontraimoveis.com.br/img/' . $Img[0] . "</URLArquivo>";
		$conteudo .=' </Foto>';
//		$imagem = "http://encontraimoveis.com.br/img/".$r;
	}
}*/

        $conteudo .='</Fotos>';
        $conteudo .='</Imovel>';


//	echo '	<div class="col-md-3" style="height: 50px;">';
	echo 	' <li class="list-group-item col-md-3">'.substr($v->id, 1) * 1 .'<br>'.$SubTipoImovel.'</li>';
//	echo '	</div>';	



    fwrite($ponteiro, $conteudo);
}
    fwrite($ponteiro, "</Imoveis>");
    fwrite($ponteiro, "</Carga>");

    fclose($ponteiro);

    echo "feeitooooooooooooooooooooooooooooooooooooooooooooooooooooooo\n\n";
    // echo $encontra .'/img/imgr-'. str_pad($v->cod_bem, 9, 0, STR_PAD_LEFT).'.jpg';
    // echo "<hr>Conteudo<b><u>$xml</u></b> gerado com  sucesso\n\n";
    echo "<hr>Arquivo <b><u>$arquivo</u></b> gerado com  sucesso\n\n";
    echo "<hr>Imoveis encontrados: ".count($model)." em ." . date('d-m-Y') . " as " . date('H:i:s') . "\n";
?>
<style>
#corretor{display:none;}
</style>