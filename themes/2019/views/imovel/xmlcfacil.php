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



    $arquivo = "../../../../../chave/cfacil.xml";
    $ponteiro = fopen(dirname(__FILE__).$arquivo, "w");
    
    fwrite($ponteiro, "<?xml version='1.0' encoding='utf-8' ?>\r\n");
    fwrite($ponteiro, "<Importacao>\r\n");
    fwrite($ponteiro, "<Imobiliaria><Codigo>".Yii::app()->params['codImob']."</Codigo></Imobiliaria>\r\n");
    fwrite($ponteiro, "<Imoveis>\r\n");

    $encontra = "http://encontraimoveis.com.br";
     foreach($model as $k => $v){

            $TbBem = ereg_replace("[^a-zA-Z0-9_]", '', clearId(utf8_decode($v->tp_bem)));
            switch ($TbBem) {case 'apartamento': case 'apartamentos': case 'triplex': case 'duplex': case 'flat': case 'apto': $SubTipoImovel ="Apartamento Padrão"; break; case 'loft': $SubTipoImovel ="Loft"; break; case 'kitnets': case 'kitnet': case 'kitinete': case 'kitchenette': $SubTipoImovel ="Kitchenette/Conjugados"; break; case 'casa': case 'casa de alvenaria': case 'casa de madeira': case 'casa de geminada': case 'casa de mista': case 'casa de residencial': case 'residaâªncia': case 'sobrado': case 'chale': case 'residência': case 'residencia': $SubTipoImovel ="Casa Padrão"; break; case 'rural': $SubTipoImovel = "rural"; break; case 'casaemcondominio': case 'condominiocasasterrenos': case 'condominiocasas': case 'residenciaemcondominio': $SubTipoImovel = "Casa de Condomínio"; break; case 'chacara': case 'chacara campo': case 'terreno': case 'terrenoemcondominio': case 'condominioterreno': case 'areacconstrucao': case 'lote': $SubTipoImovel = "Terreno Padrao"; break; case 'ponto comercial': case 'barracaocomercial': case 'imovelcomercial': case 'comercial': case 'sala': $SubTipoImovel = "Comercial"; break; case 'galpao': $SubTipoImovel = "Galpão"; break; }

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
           
//180 [Q 1], 22 [Q 1], 23 [Q 1], 25 [Q 1], 26 [Q 1], 28 [Q 1], 35 [Q 1]
$arr = preg_replace("/[^0-9]/", "", $v->endereco_1);
$explode = explode(' ', $arr);

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


        $conteudo ='<Imovel>';
        $conteudo .='<Codigo>'.$cod.'' . substr($v->id, 1) * 1 . '</Codigo>';
        if(utf8_decode($v->tp_bem) == 'Apto' OR utf8_decode($v->tp_bem) == 'apto'){
        	$conteudo .='<Tipo>Apartamento</Tipo>';
        }else{
	        $conteudo .='<Tipo>' . utf8_decode($v->tp_bem) . '</Tipo>';
		}
        $conteudo .='<Endereco>';
        $conteudo .='	<Rua>'.utf8_encode($v->endereco_1).'</Rua>';
        $conteudo .='	<Numero>'.$explode[0].'</Numero>';
        $conteudo .='	<Complemento>'.acentos(utf8_decode($v->complemento)).'</Complemento>';
        $conteudo .='	<Cep>'.$v->cep.'</Cep>';
        $conteudo .='	<Bairro>'.acentos($v->bairro).'</Bairro>';
        $conteudo .='	<Cidade>'.utf8_decode($v->cidade).'</Cidade>';
        $conteudo .='	<Estado>'.$v->uf.'</Estado>';
        $conteudo .='	<Latitude>'.$v->lat.'</Latitude>';
        $conteudo .='	<Longitude>'.$v->lng.'</Longitude>';
        $conteudo .='</Endereco>';
        $conteudo .='<Contato>';
        $conteudo .='	<Telefone1>'.Yii::app()->params['Telefone1'].'</Telefone1>';
        $conteudo .='	<Telefone2>'.Yii::app()->params['Telefone2'].'</Telefone2>';
        $conteudo .='	<Telefone3>'.Yii::app()->params['Telefone3'].'</Telefone3>';
        $conteudo .='	<Email>'.Yii::app()->params['Email2'].'</Email>';
        $conteudo .='</Contato>';
        $conteudo .='<Valores>';
        $conteudo .='	<ValorIPTU>'.$v->vlr_iptu.'</ValorIPTU>';
        $conteudo .='	<ValorVenda>'.$vlrV.'</ValorVenda>';
        $conteudo .='	<ValorAluguel>'.$vlrL.'</ValorAluguel>';
        $conteudo .='	<ValorAluguelTemporada>0</ValorAluguelTemporada>';
        $conteudo .='	<ValorCondominio>'.tiraMoeda(substr($v->vlr_condominio,0,-2)).'</ValorCondominio>';
        $conteudo .='</Valores>';
        $conteudo .='<Creci>'.Yii::app()->params['Creci'].'</Creci>';
		    $dormitorio = $v->qtde_suites + $v->qtde_quartos;
        $conteudo .='<QuantidadeDormitorios>'.$dormitorio.'</QuantidadeDormitorios>';
        $conteudo .='<QuantidadeVagas>'.$dormitorio.'</QuantidadeVagas>';
        $conteudo .='<AreaPrivativa>'.tiraMoeda(substr($v->area_util,0,-2)).'</AreaPrivativa>';
        $conteudo .='<AreaTotal>'.tiraMoeda(substr($v->area_total,0,-2)).'</AreaTotal>';
        $conteudo .='<QuantidadeBanheiros>'.$v->qtde_banheiros.'</QuantidadeBanheiros>';
        $conteudo .='<QuantidadeSuites>'.$v->qtde_suites.'</QuantidadeSuites>';
        $conteudo .='<QuantidadeSalas>0</QuantidadeSalas>';
        $conteudo .='<QuantidadeElevadores>0</QuantidadeElevadores>';
        $conteudo .='<QuantidadeUnidadesPorAndar>0</QuantidadeUnidadesPorAndar>';
        $conteudo .='<QuantidadeAndares>0</QuantidadeAndares>';
        $conteudo .='<Portaria>0</Portaria>';
        $conteudo .='<Piscina>0</Piscina>';
        $conteudo .='<PlayGround>0</PlayGround>';
        $conteudo .='<QuadraPoliEsportiva>0</QuadraPoliEsportiva>';
        $conteudo .='<SalaGinastica>0</SalaGinastica>';
        $conteudo .='<SalaoFestas>0</SalaoFestas>';
        $conteudo .='<Descricao><![CDATA['.utf8_encode(acentos(clearId($v->anuncio))).']]></Descricao>';
        // $conteudo .='<IdadePredio>'..'</IdadePredio>';
        // $conteudo .='<Audio>'..'</Audio>';

        $conteudo .='<Fotos>';
		$aImg = '';
		$aImg  = substr($v->aImagem, 0, -1);
		$Img = explode("|", $aImg);
		$total = count($Img);
		for ($i=0; $i < $total ; $i++) { 
		    $conteudo .=' <Foto>';
		    $conteudo .=' 	<Caminho>http://encontraimoveis.com.br/img/' . $Img[$i] . "</Caminho>";
		    // $conteudo .=' <Legenda>'.$Img[$i].'</Legenda>';		    
		    $conteudo .=' </Foto>';    
		//    echo $total.'*>'.($i+1).'<br>';
		}
        $conteudo .='</Fotos>';

        // $conteudo .='<Videos>';
        // $conteudo .='	<Video>';
        // $conteudo .='		<Url></Url>';
        // $conteudo .='		<Legenda></Legenda>';
        // $conteudo .='	</Video>';
        // $conteudo .='</Videos>';
    
        $conteudo .='</Imovel>';


	echo 	' <li class="list-group-item col-md-3">'.substr($v->id, 1) * 1 .'<br>'.$SubTipoImovel.'</li>';


    fwrite($ponteiro, $conteudo);
}

    fwrite($ponteiro, "</Imoveis>");
    fwrite($ponteiro, "</Importacao>");
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