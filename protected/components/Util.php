<?php

class Util extends CApplicationComponent {
    
    /*     * ******** RETORNA APENAS NUMEROS ********* */
    public function apenasNumeros($string, $quantidade) {
        $numero = preg_replace('/\D+/', '', $string);
        if (strlen($numero) < $quantidade) {
            $numero = str_pad($numero, $quantidade, "0", STR_PAD_LEFT);
        }
        return $numero;
    }
    
    /*     * ******** RETORNA TEXTO SEM HTML ********* */
    public function getarray($get, $campos) {
        foreach ($campos as $v) {
            $value = isset($get[$v]) ? $get[$v] : null;
            $retorno[$v] = $value;
        }
        return $retorno;
    }

    /*     * ******** RETORNA FOTOS DE CAPA ********* */
    public static function getImagem($dir){
        $getFoto = glob($dir.DIRECTORY_SEPARATOR."*.{jpg,png,gif,jpeg}", GLOB_BRACE);
        foreach ($getFoto as $key => $v){
            $file = explode('/', $v);
            $f = end($file);
            //echo $f;
            $getFoto[$key] = $f;
        }
        return $getFoto;
    }
    
    /*     * ******** RETORNA FOTOS DE CAPA ********* */
    public static function getShorticon($dir){
        $getFoto = glob($dir.DIRECTORY_SEPARATOR."*.{ico}", GLOB_BRACE);
        foreach ($getFoto as $key => $v){
            $file = explode('/', $v);
            $f = end($file);
            //echo $f;
            $getFoto[$key] = $f;
        }
        return $getFoto;
    }

    /*     * ******** RETORNA TEXTO SEM HTML ********* */
    public function somenteTexto($string) {
        $trans_tbl = get_html_translation_table(HTML_ENTITIES);
        $trans_tbl = array_flip($trans_tbl);
        return trim(strip_tags(strtr($string, $trans_tbl)));
    }

    /*     * ******** ABREVIA UM TEXTO ********* */
    function abreviaTexto($texto, $limite, $tres_p = '…') {
        $texto = $this->somenteTexto($texto);
        if (strlen($texto) <= $limite)
            return $texto;
        return array_shift(explode('||', wordwrap($texto, $limite, '||'))) . $tres_p;
    }

    /*     * ******** RETORNA URL ENCONTRA IMOVEIS IMAGENS ********* */
    public function eImovel($arquivo, $pasta = null) {
        return 'http://www.encontraimoveis.com.br/img/' . $pasta . $arquivo;
    }

    /*     * ******** RETORNA URL PARA CARREGAMENTO ********* */
    public function pasta($tipo = null) {
        //return Yii::app()->request->hostInfo.''.Yii::app()->user->returnUrl.'/'.$direciona;
        return Yii::app()->request->hostInfo . Yii::app()->getBaseUrl() . '/' . $tipo;
    }

    /*     * ******** RETORNA URL COMPLETA ********* */
    public static function rurl($direciona = null) {
        //return Yii::app()->request->hostInfo.''.Yii::app()->user->returnUrl.'/'.$direciona;
        return Yii::app()->request->hostInfo . Yii::app()->getBaseUrl() . '/index.php/' . Yii::app()->getController()->getId() . '/' . $direciona;
    }

    /*     * ******** GERA NOME ARQUIVO PARA PARCIAL RENDER ********* */
    public function rparcial($get) {
        $parcial = null;
        foreach ($_GET as $k => $v) {
            $parcial .= $k . '_';
        }
        return substr($parcial, 0, -1);
    }

    /*     * ******** FORMATA DIVERSOS TIPOS DE CAMPO ********* */
    public static function formata($dados, $tipo, $reverso = null) {
        if ($tipo == 'imageNome') {
            return str_pad($dados, 9, "0", STR_PAD_LEFT);
        }
        if ($tipo == 'sref') {
            if (empty($reverso)) {
                $string = $dados;
                $string = explode('-', $string);
                switch ($string[0]) {
                    case 'Locação':
                        $prefixo = 1;
                        break;
                    case 'Venda':
                        $prefixo = 2;
                        break;
                }
                return $prefixo . str_pad($string[1], 9, "0", STR_PAD_LEFT);
            } else {
                return str_pad($dados, 9, "0", STR_PAD_LEFT);
            }
        }
        if ($tipo == 'ref') {
            return substr($dados, 1, 9) * 1;
        }
        if ($tipo == 'percentual') {
            $dados = empty($dados) || !is_numeric($dados) ? 0 : $dados;
            return $dados . '%';
        }
        if ($tipo == 'cnpj') {
            if (count(explode('.', $dados)) == 3) {
                return $dados;
            } else if (strlen($dados) != 14) {
                return 'CNPJ Inválido';
            } else {
                for ($x = 1; $x <= 5; $x++) {
                    if ($x == 1 || $x == 5) {
                        $cnpj[$x] = substr($dados, -2);
                        $dados = str_replace($cnpj, '', $dados);
                    } else if ($x == 2) {
                        $cnpj[$x] = substr($dados, -4);
                        $dados = str_replace($cnpj, '', $dados);
                    } else {
                        $cnpj[$x] = substr($dados, -3);
                        $dados = str_replace($cnpj, '', $dados);
                    }
                }
                $cnpj = array_reverse($cnpj);
                return $cnpj[0] . '.' . $cnpj[1] . '.' . $cnpj[2] . '/' . $cnpj[3] . '-' . $cnpj[4];
            }
        }
        if ($tipo == 'real') {
            //$dados = empty($dados) || !is_numeric($dados) ? 0 : $dados ;
            if ($reverso) {
                return str_replace(',', '.', str_replace('.', '', $dados));
            } else {
                $a = new \NumberFormatter("pt-BR", \NumberFormatter::CURRENCY);
                //echo $a->format(12345.12345) . "<br>"; // outputs €12.345,12
                return $a->format($dados);
            }
        }
        if ($tipo == 'telefone') {
            if (is_numeric(str_replace(' ', '', $dados)) || is_numeric(str_replace('-', '', $dados)) || (is_numeric(str_replace(' ', '', str_replace('-', '', $dados))))) {
                $dados = (is_numeric(str_replace(' ', '', str_replace('-', '', $dados)))) ? str_replace(' ', '', str_replace('-', '', $dados)) : $dados;
                if (strlen($dados) == 10 || strlen($dados) == 11) {
                    $dados = str_replace(' ', '', str_replace('-', '', $dados));
                    $tel[0] = substr($dados, 0, 2);
                    $tel[1] = str_replace(substr($dados, -4), '', substr($dados, 2));
                    $tel[2] = substr($dados, -4);
                    return '(' . $tel[0] . ') ' . $tel[1] . '-' . $tel[2];
                } else {
                    $dados = explode(' ', $dados);
                    return '(' . $dados[0] . ') ' . str_replace(substr($dados[1], -4), '', $dados[1]) . '-' . substr($dados[1], -4);
                }
            } else {
                return 'Telefone Inválido';
            }
        }
        if ($tipo == 'cep') {
            if (count(explode('-', $dados)) == 2) {
                return $dados;
            } else {
                return str_replace(substr($dados, -3), '', $dados) . '-' . substr($dados, -3);
            }
        }
        if ($tipo == 'cpf') {
            if (count(explode('.', $dados)) == 3) {
                return $dados;
            } else if (strlen($dados) != 11) {
                return 'CPF Inválido';
            } else {
                for ($x = 1; $x <= 4; $x++) {
                    if ($x == 1) {
                        $cpf[$x] = substr($dados, -2);
                        $dados = str_replace($cpf, '', $dados);
                    } else {
                        $cpf[$x] = substr($dados, -3);
                        $dados = str_replace($cpf, '', $dados);
                    }
                }
                $cpf = array_reverse($cpf);
                return $cpf[0] . '.' . $cpf[1] . '.' . $cpf[2] . '-' . $cpf[3];
            }
        }
        if ($tipo == 'data') {
            if (strlen(array_pop(explode('/', $dados))) == 4) {
                return $dados;
            } else if (count(explode('-', $dados)) == 3) {
                $dados = explode('-', $dados);
                return $dados[1] . '/' . $dados[2] . '/' . $dados[0];
            } else {
                return 'Data Inválida';
            }
        }
        if ($tipo == 'finalidade'){
            if($reverso){
                if($dados == 'Venda'){
                    return 'venda';
                }
                else if ($dados == 'Locação'){
                    return 'locacao';
                }
                else if ($dados == 'Lançamento'){
                    return 'lancamento';
                }
            }
            else {
                if($dados == 'venda'){
                    return 'Venda';
                }
                else if($dados == 'Locacao' || $dados == 'locacao'){
                    return 'Locação';
                }
                else if ($dados == 'Lancamento' || $dados == 'lancamento'){
                    return 'Lançamento';
                }
            }
            return $dados;
        }
        
    }

    public function formataNome($nome) {
        switch ($nome) {
            case 'juridica':
                return 'Jurídica';
                break;
            case 'fisica':
                return 'Física';
                break;
            case 'adicionar':
                return 'Adicionar';
                break;
            case 'editar':
                return 'Alterar';
                break;
            case 'apagar':
                return 'Remover';
                break;
        }
    }

    public function selectOpcao($opcao, $banco = null) {
        if (is_array($banco)) {
            foreach ($banco[0]::model()->$banco[1]($banco[2]) as $a => $k) {
                $retorno[$k['tp_bem']] = $k['tp_bem'];
            }
            return $retorno;
        }

        if (is_numeric($opcao)) {
            $retorno = array();
            for ($x = 1; $x <= $opcao; $x++) {
                $retorno[$x] = $x;
            }
            return $retorno;
        }

        if ($opcao == 'estadoImovel') {
            return array(
                'Excelente' => 'Excelente',
                'Muito Bom' => 'Muito Bom',
                'Bom' => 'Bom',
                'Regular' => 'Regular',
                'Péssimo' => 'Péssimo'
            );
        }

        if ($opcao == 'tipopessoa') {
            return array(
                'Jurídica' => 'Jurídica',
                'Fisíca' => 'Fisíca',);
        }

        if ($opcao == 'portajanela') {
            return array(
                'Madeira' => 'Madeira',
                'Ferro' => 'Ferro',);
        }

        if ($opcao == 'finalidade') {
            return array(
                'Locação' => 'Locação',
                'Venda' => 'Venda',);
        }

        if ($opcao == 'imovel') {
            return array(
                'Residencial' => 'Residencial',
                'Comercial' => 'Comercial',
                'Misto' => 'Misto',);
        }

        if ($opcao == 'target') {
            return array(
                '_self' => 'Abrir na mesma janela',
                '_blank' => 'Abrir em uma nova janela',);
        }

        if ($opcao == 'snn') {
            return array(
                '0' => 'Não',
                '1' => 'Sim',);
        }

        if ($opcao == 'simnao') {
            return array(
                'Sim' => 'Sim',
                'Não' => 'Não',);
        }

        if ($opcao == 'civil') {
            return array(
                'Solteiro' => 'Solteiro',
                'Casado' => 'Casado',
                'Separado' => 'Separado',
                'Divorciado' => 'Divorciado',
                'Viúvo' => 'Viúvo',);
        }

        if ($opcao == 'terreno') {
            return array(
                'Plano' => 'Plano',
                'Caído' => 'Caído',);
        }

        if ($opcao == 'construcao') {
            return array(
                'Madeira' => 'Madeira',
                'Alvenaria' => 'Alvenaria',);
        }

        if ($opcao == 'cobertura') {
            return array(
                'Laje' => 'Laje',
                'Forro' => 'Forro',);
        }

        if ($opcao == 'esgoto') {
            return array(
                'Fossa Séptica' => 'Fossa Séptica',
                'Rede de Esgoto' => 'Rede de Esgoto',);
        }

        if ($opcao == 'piso') {
            return array(
                'Cerâmica' => 'Cerâmica',
                'Madeira' => 'Madeira',
                'Cimento' => 'Cimento',);
        }

        if ($opcao == 'iptu') {
            return array(
                'Sem IPTU' => 'Sem IPTU',
                'Com IPTU' => 'Com IPTU',);
        }

        if ($opcao == 'tipoCadastro') {
            return array(
                'Locatário' => 'Locatário',
                'Fiador 1' => 'Fiador 1',
                'Fiador 2' => 'Fiador 2',);
        }

        if ($opcao == 'tipobem') {
            return array(
                'Apartamento' => 'Apartamento',
                'Barracão' => 'Barracão',
                'Casas' => 'Casa',
                'Comercial' => 'Comercial',
                'Sala Comercial' => 'Sala Comercial',
                'Sítios' => 'Sítio',
                'Sobrados' => 'Sobrado',
                'Terrenos' => 'Terreno',
                'Outro' => 'Outro',);
        }

        if ($opcao == 'comochegou') {
            return array(
                'Jornal' => 'Jornal',
                'TV' => 'TV',
                'Rádio' => 'Rádio',
                'Banca de Jornal' => 'Banca de Jornal',
                'Internet' => 'Internet',
                'Outros' => 'Outros',
            );
        }

        if ($opcao == 'estados') {
            return array(
                'AC' => 'Acre',
                'AL' => 'Alagoas',
                'AP' => 'Amapá',
                'AM' => 'Amazonas',
                'BA' => 'Bahia',
                'CE' => 'Ceará',
                'DF' => 'Distrito Ferderal',
                'ES' => 'Espirito Santo',
                'GO' => 'Goiás',
                'MA' => 'Maranhão',
                'MT' => 'Mato Grosso',
                'MS' => 'Mato Grosso do Sul',
                'MG' => 'Minas Gerais',
                'PR' => 'Paraná',
                'PB' => 'Paraíba',
                'PA' => 'Pará',
                'PE' => 'Pernambuco',
                'PI' => 'Piauí',
                'RJ' => 'Rio de Janeiro',
                'RN' => 'Rio Grande do Norte',
                'RS' => 'Rio Grande do Sul',
                'RO' => 'Rondonia',
                'RR' => 'Roraima',
                'SC' => 'Santa Catarina',
                'SE' => 'Sergipe',
                'SP' => 'São Paulo',
                'TO' => 'Tocantins');
        }
    }

    public function labelEmails($tipo) {
        if ($tipo == 'juridica') {
            return array(
                'Cadastro de: ', 'Imóvel Pretendido: ', 'Valor Aluguel: ', 'Finalidade: ', 'Condomínio (Aproximado): ', 'O que será montado: ',
                'Razão Social: ', 'Nome Fantasia: ', 'Telefone: ', 'Fax: ', 'E-mail: ', 'Estado: ', 'Cidade: ', 'Bairro: ', 'Endereço: ', 'CEP: ', 'CNPJ: ', 'Inscrição Estadual: ', 'Inscrição Municipal: ', 'Data Constituição: ',
                'Nome: ', 'E-mail: ', 'Endereço: ', 'Bairro: ', 'Cidade: ', 'Estado: ', 'CEP: ', 'Telefone: ', 'Celular: ',
                'CPF: ', 'RG: ', 'Estado Civil: ', 'Data de Nascimento: ', 'Naturalidade: ', 'Nacionalidade: ', 'Profissão: ', 'Tempo de Serviço: ',
                'Salário: ', 'Possuí Outra Renda: ', 'Quais: ', 'Valor: ', 'Possuí Imóvel: ', 'Onde: ',
                'Nome: ', 'E-mail: ', 'Endereço: ', 'Bairro: ', 'Cidade: ', 'Estado: ', 'CEP: ', 'Telefone: ', 'Celular: ',
                'CPF: ', 'RG: ', 'Estado Civil: ', 'Data de Nascimento: ', 'Naturalidade: ', 'Nacionalidade: ', 'Profissão: ', 'Tempo de Serviço: ',
                'Salário: ', 'Possuí Outra Renda: ', 'Quais: ', 'Valor: ', 'Possuí Imóvel: ', 'Onde: ',
                'Empresa: ', 'Endereço: ', 'Bairro: ', 'Cidade: ', 'Estado: ', 'CEP: ', 'Telefone: ', 'Profissão: ', 'Salário: ', 'Tempo de Serviço: ', 'Possuí Outra Renda: ', 'Quais: ', 'Valor: ',
                'Nome 1: ', 'Telefone 1: ', 'Nome 2: ', 'Telefone 2: ',
                'Nome do Banco: ', 'Telefone: ', 'Cliente Deste: ', 'Número da Conta: ', 'Agência: ', 'Cidade: ', 'Estado: ');
        }

        if ($tipo == 'fisica') {
            return array(
                // Cadastro
                'Cadastro de: ', 'Imóvel Pretendido: ', 'Valor Aluguel: ', 'Finalidade: ', 'Condomínio (Aproximado): ', 'O que será montado: ',
                // Dados Pessoais
                'Nome: ', 'Telefone: ', 'Celular: ', 'E-mail: ', 'Estado: ', 'Cidade: ', 'Endereço: ', 'Bairro: ', 'CEP: ',
                'CPF: ', 'RG: ', 'Data de Nascimento: ', 'Estado Civil: ', 'Naturalidade: ', 'Nacionalidade: ', 'Possuí Imóvel: ', 'Onde?: ',
                'Já Alugou Imóvel por Imob ou Part.: ', 'Qual Imobiliária: ',
                // Dados Profissionais
                'Empresa: ', 'Endereço: ', 'Bairro: ', 'Cidade: ', 'Estado: ', 'CEP: ', 'Telefone: ', 'Profissão: ', 'Salário: ', 'Tempo de Serviço: ', 'Possuí Outra Renda: ', 'Quais: ', 'Valor: ',
                //Conjugue
                'Nome: ', 'Endereço: ', 'Telefone: ', 'Data de Nascimento: ', 'Empresa: ', 'Profissão: ', 'Tempo de Serviço: ', 'Salário: ',
                // Referência Comercial
                'Nome 1: ', 'Telefone 1: ', 'Nome 2: ', 'Telefone 2: ',
                // Referência Bancária
                'Nome do Banco: ', 'Telefone: ', 'Cliente Deste: ', 'Número da Conta: ', 'Agência: ', 'Cidade: ', 'Estado: ',
                // Pessoas Residirão no Imóvel
                'Pessoa Nome 1: ', 'Pessoa Nome 2: ', 'Pessoa Nome 3: ', 'Pessoa Nome 4: ');
        }

        if ($tipo == 'avalie') {
            return array(
                // Dados Pessoais (9)
                'Nome: ', 'Telefone: ', 'Celular: ', 'E-mail: ', 'Estado: ', 'Cidade: ', 'Endereço: ', 'Bairro: ', 'CEP: ',
                // Dados do Imóveis
                'Finalidade: ', 'Tipo do Imóvel: ', 'Área Útil: ', 'Área Total: ', 'Dormitórios: ', 'Garagens: ', 'Valor Sugerido: ',
                'Imóvel Estado: ', 'Imóvel Cidade: ', 'Imóvel Bairro: ', 'Imóvel Endereço: ', 'Informações Extras: ', 'Como Chegou: ',
                'Comentários: ');
        }

        if ($tipo == 'imovel') {
            return array(
                // Dados Pessoais (9)
                'Nome: ', 'Telefone: ', 'Celular: ', 'E-mail: ', 'Estado: ', 'Cidade: ', 'Endereço: ', 'Bairro: ', 'CEP: ',
                // Dados do Imóveis (10~21)
                'Locação: ', 'Valor do Aluguel (R$): ', 'Valor do IPTU (Mês): ', 'IPTU: ',
                'Venda: ', 'Valor Venda (R$): ', 'Comissão Venda (%): ', 'Valor Condomínio (R$): ', 'Taxa de Locaçao do 1° Aluguel (%): ',
                'Taxa Administrativa dos demais aluguéis (R$): ', 'De: ', 'Até: ',
                // AVALIAÇÃO DO IMÓVEL (22~34)
                // Terreno 34
                'Área Total: ', 'Medidas: ', 'Terreno: ',
                // Casa / Apartamento: 44
                'Área Construída: ', 'Tipo Construção: ', 'Cobertura: ', 'Aquecimento Gás: ', 'Portão Eletrônico: ',
                'Piscina: ', 'Esgoto: ', 'Elevador: ', 'Churrasqueira: ', 'Acabamento em Gesso: ',
                // Quartos 35
                'Quantidade: ', 'Piso: ', 'Armário: ', 'Porta: ', 'Janela: ', 'Outros: ',
                // Suítes 41
                'Quantidade: ', 'Piso: ', 'Armário: ', 'Porta: ', 'Janela: ', 'Outros: ',
                // Banheiros 62
                'Quantidade: ', 'Piso: ', 'Armário: ', 'Porta: ', 'Janela: ', 'Outros: ',
                // Sala 68
                'Quantidade: ', 'Piso: ', 'Armário: ', 'Porta: ', 'Janela: ', 'Outros: ',
                // Cozinha 74
                'Quantidade: ', 'Piso: ', 'Armário: ', 'Porta: ', 'Janela: ', 'Outros: ',
                // Lavanderia 80
                'Quantidade: ', 'Piso: ', 'Armário: ', 'Porta: ', 'Janela: ', 'Outros: ',
                // Empregada 86
                'Quantidade: ', 'Piso: ', 'Armário: ', 'Porta: ', 'Janela: ', 'Outros: ',
                // Edícula 92
                'Quantidade: ', 'Piso: ', 'Armário: ', 'Porta: ', 'Janela: ', 'Outros: ',
                // Garagem 98
                'Quantidade: ', 'Piso: ', 'Armário: ', 'Porta: ', 'Janela: ', 'Outros: ',
                'Observação'
            );
        }
    }

    public function criaRadioButton($form, $model, $opcoes) {
        $retorno = null;
        foreach ($opcoes as $label => $value) {
            $retorno .= '<div class="col-md-2 criaRadioButton">';
            $retorno .= $form->radioButton($model, 'como_chegou', array('value' => $value, 'uncheckValue' => null));
            $retorno .= '<span>' . $label . '</span>';
            $retorno .= '</div>';
        }
        return $retorno;
    }

    /*
     * Metodo de USO
     * Dentro do "Action" da Página, instancie 
     * $url = Yii::app()->util->urlAmigavel($_GET);
     * 
     * Essa função retorna tudo a partir da página atual por exemplo:
     * 
     * Estou dentro do "Controle Admin" no "Action Fichas".
     * http://127.0.0.1/default/index.php/admin/fichas/fisica/adicionar/teste
     * 
     * Meu Retorno
     * array (size=3)
     * 	0 => string 'fisica' (length=6)
     * 	1 => string 'adicionar' (length=9)
     * 	2 => string 'teste' (length=5)
     */

    public function removeUrl($remover, $url) {
        return str_replace($remover, '', $url);
    }

    public function testaView($controlPath, $arquivo) {

        if (!is_readable($controlPath->getViewPath() . '/' . str_replace('admin/', '', $arquivo) . '.php')) {
            return false;
        }

        return true;
    }

    public function renderDinamico($controlPath, $url) {
        $cheia = explode("/", Yii::app()->urlManager->parseUrl(Yii::app()->request));
        $surl = null;

        foreach ($cheia as $k => $v) {
            if ($k <= 1) {
                $surl[] = $v;
            }
        }

        if (count($cheia) == 2 && count($url) == 0) {
            return array_pop($cheia) . '/index';
        }if (count($cheia) == 3 && count($url) == 1) {
            return '/' . implode('/', $cheia);
        } else {
            foreach (array_reverse($url) as $v) {
                $var = implode('/', array_merge($surl, array($v)));
                if ($this->testaView($controlPath, $var)) {
                    return $this->removeUrl('admin/', $var);
                }
            }
        }
    }

    public function listaDados($pagLimite, $sql) {
        // Quantidade de Itens.
        $limiteItens = $pagLimite;
        // Monta SQL
        $dados = $sql[0]::model()->$sql[1]($sql[2]);
        // Total de Registros
        $count = count($dados);
        // Paginador
        $dataProvider = new CArrayDataProvider($dados, array(
            'pagination' => array('pageSize' => $limiteItens),
        ));
        // Trás os dados
        $models = $dataProvider->getData();

        return array('count' => $count, 'dataProvider' => $dataProvider, 'models' => $models);
    }

    public function mostraDados($sql) {
        $models = $sql[0]::model()->$sql[1]($sql[2]);
        return array('count' => null, 'dataProvider' => null, 'models' => $models);
    }

    public function validaAcao($controlPath, $diretorio, $url) {
        // Páginas: Index
        if (empty($url)) {
            if (!Yii::app()->util->testaView($controlPath, 'admin/' . $diretorio . '/index')) {
                return false;
            }
        } else
        //Alguma ação
        if (count($url) == 1) {
            if (!Yii::app()->util->testaView($controlPath, 'admin/' . $diretorio . '/' . $url[0])) {
                return false;
            }
        } else {
            if ((count($url) < 3) || (!Yii::app()->util->testaView($controlPath, 'admin/' . $diretorio . '/' . $url[2]) && is_numeric($url[1]))) {
                return false;
            }
        }

        return true;
    }

    function montaHtml($form, $model, $tipo, $nome, $dados) {
        if ($tipo == 'select') {
            return '
					<div class="col-md-3">
						' . $form->labelEx($model, $nome) . $form->dropDownList($model, $nome, Yii::app()->util->selectOpcao($dados), array('class' => 'col-md-12', 'empty' => 'Selecione um estado')) . '
					</div>
				';
        }
    }

    function resumoTexto($texto, $quantidade, $simbolo = '...') {
        $textoResumo = strip_tags($texto);
        if (strlen($textoResumo) > $quantidade) {
            return substr($textoResumo, 0, strpos($textoResumo, ' ', $quantidade)) . $simbolo;
        } else {
            return $textoResumo . $simbolo;
        }
    }

    public function url_exists($url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return ($code == 200); // verifica se recebe "status OK"
    }

    public static function trataFone($fone, $tipo = null) {
        $search = array('(', ')', ' ', '-');
        $replace = array('', '', '', '');
        // $formatado = str_replace($search, $replace, $fone);
        if ($tipo == 'whatsapp') {
            return '+55' . str_replace($search, $replace, $fone);
        } else {
            return str_replace($search, $replace, $fone);
        }
    }

    public static function aTrataCaracEstran($str, $reverso = false) 
    {
        $caracEstran = array('Ã£', 'Ã¢', 'Ã¡', 'Ã©', 'Ãµ', 'Ã³', 'Ã´', 'Ãº', 'Ã§', 'Â°', 'Âº', 'Ã­', 'Ã', 'Ãƒ', 'Ãª', 'Ã‰', 'ÃŠ', 'Ãš', 'Ã“', '²Í ',  'Í ', 'Ã‡');
        //$caracEstran = array('Ã‰', 'ÃŠ', 'Ãš', 'Ã“', 'Í ', 'í');
        $caracNormal = array('ã',  'â',  'á',  'é',  'õ',  'ó',  'ô',  'ú',  'ç',  '°',  'º',  'í',  'Á',  'Ã',  'ê',  'Ê',  'Ê',  'Ú',  'Ó',  '²',    '²', 'ç');
        //$caracNormal = array('Ê',  'Ê',  'Ú',  'Ó',  '²',  'í');
        if ($reverso) {
            return str_replace($caracNormal, $caracEstran, $str);
        } else {
            return str_replace($caracEstran, $caracNormal, $str);
        }
    }
    

    public static function getStringUf8($aTexto) 
    {
        /*
        error_log("F:" . __FILE__ . " L:" . __LINE__ . " getStringUf8: Texto:" . $aTexto
                . "=[" . date('d-m-Y') . "]"
                . "\n", 3, "/tmp/zacarias.log");
       
        $aDbg = Util::aTrataCaracEstran($aTexto);
        error_log("F:" . __FILE__ . " L:" . __LINE__ . " getStringUf8: Texto:" . $aTexto . " Dbg:" . $aDbg
                . "=[" . date('d-m-Y') . "]"
                . "\n", 3, "/tmp/zacarias.log");
        */
        //return mb_convert_case($aTexto,  MB_CASE_TITLE, "UTF-8");
        return mb_convert_case(Util::aTrataCaracEstran($aTexto), MB_CASE_TITLE, "UTF-8");
        //return self::getStringUf8( ucwords( mb_strtolower($aTexto, 'UTF-8') ) );
    }

    public static function getStringUTF8($aTexto)
    {
        $aTexto = Util::aTrataCaracEstran($aTexto);
        return iconv(mb_detect_encoding($aTexto, mb_detect_order(), true), "UTF-8", $aTexto);
    }
    

    public static function getStringUTF8Link($aTexto, $reverso = false)
    {
        $aTexto = Util::aTrataCaracEstran($aTexto, false);
        $caracEnable = array
                        (
                            '@', '%', ';',
                            '¹', '²', '³', '°', 'º', 'ª', 
                            '#', '*', '-', '=', '+', '/', '÷',
                            '¼', '½', '¾', '¿', '?', '!', '¡', '¬',
                            'Æ', 'æ', 'Å', 'å', 'ï', 'Ï', 'Ö', 'ö',
                            '>', '<', '(', ')', '{', '}', '[', ']'
                        );
        $caracNormal = array(  ' '   ,
                               'À'   ,    'Á'   ,    'Â'   ,    'Ã'   ,    'à'   ,    'á'   ,
			       'â'   ,    'ã'   ,    'É'   ,    'Ê'   ,    'é'   ,    'ê'   ,
			       'Í'   ,    'í'   ,    'Ú'   ,    'Ü'   ,    'ú'   ,    'ü'   ,
			       'Ò'   ,    'Ó'   ,    'Ô'   ,    'Õ'   ,    'ò'   ,    'ó'   ,
			       'ô'   ,    'õ'   ,    'Ç'   ,    'ç'   ,    ','   ,    '.'   ,    ':'   
                            );
        $caracUTF8 =   array( '+'  ,
                            '%C3%80' , '%C3%81' , '%C3%82' , '%C3%83' , '%C3%A0' , '%C3%A1' ,
		 	    '%C3%A2' , '%C3%A3' , '%C3%89' , '%C3%8A' , '%C3%A9' , '%C3%AA' ,
			    '%C3%8D' , '%C3%AD' , '%C3%9A' , '%C3%9C' , '%C3%BA' , '%C3%BC' ,
			    '%C3%92' , '%C3%93' , '%C3%94' , '%C3%95' , '%C3%B2' , '%C3%B3' ,
			    '%C3%B4' , '%C3%B5' , '%C3%87' , '%C3%A7' ,   '%2c'  ,   '%2e'  ,   '%3a'   
                            );
        $caracMultiSpace = array('+++', '++');
        if($reverso){
            return str_replace($caracUTF8, $caracNormal, $aTexto);      // TRANSFORMA UTF-8 LITERAL PARA TEXTO
        }
        else{
            $aTexto = str_replace($caracEnable, '', $aTexto);           // CARACTERES IGNORADOS
            $aTexto = str_replace($caracNormal, $caracUTF8, $aTexto);   // TRANSFORMA TEXTO PARA UTF-8 LITERAL
            $aTexto = str_replace($caracMultiSpace, '%20 ', $aTexto);   // RETIRA MULTIPLE-SPACES
            return $aTexto;
        }
    }
    
    public static function aTrataBairroZona($aTexto, $reverso = false)
    {
        $aTexto = Util::aTrataCaracEstran($aTexto, false);
        $caracEnable = array();
        $caracNormal = array();
        $caracUTF8 =   array();
        $caracMultiSpace = array('+++', '++');
        if($reverso){
            return str_replace($caracUTF8, $caracNormal, $aTexto);      // TRANSFORMA UTF-8 LITERAL PARA TEXTO
        }
        else{
            $aTexto = str_replace($caracEnable, '', $aTexto);           // CARACTERES IGNORADOS
            $aTexto = str_replace($caracNormal, $caracUTF8, $aTexto);   // TRANSFORMA TEXTO PARA UTF-8 LITERAL
            $aTexto = str_replace($caracMultiSpace, '%20 ', $aTexto);   // RETIRA MULTIPLE-SPACES
            return $aTexto;
        }
    }
    
    public static function getEnderecoEmbed($aEndereco, $aBairro = null, $aCidade = null){
        $aEmbed = $aEndereco.' '.$aBairro.' '.$aCidade;
        return Util::getStringUTF8Link($aEmbed, false);
    }

    public static function enviarEmail( $aArrayOpcoes )
    {
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host         = $aArrayOpcoes['Host'];// $this->mailHost;// 'mail.imobiliarialiderdracena.com.br';
        $mail->SMTPAuth     = true;
        $mail->Username     = $aArrayOpcoes['UserName'];//$this->emailDisp;
        $mail->Password     = $aArrayOpcoes['Password'];//$this->emailSenha;
        $mail->SMTPSecure   = 'tls';
        $mail->Port         = $aArrayOpcoes['Porta'];//587;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
         );

        $mail->From         = $aArrayOpcoes['EmailOrigemDisplay'];//$this->emailDisp;
        $mail->FromName     = $aArrayOpcoes['NomeOrigem'];//'Imobiliaria Lider Dracena';
        $mail->addAddress($aArrayOpcoes['EmailDestino'] /*$this->emailRecep*/, $aArrayOpcoes['UserName']/*'Imobiliaria Lider Dracena'*/);
        //$mail->addAddress($this->emailRecep, 'Imobiliaria Lider Dracena');
        if(isset($aArrayOpcoes['enviarArquivos']) 
        && is_array($aArrayOpcoes['enviarArquivos']) ) {
            foreach($aArrayOpcoes['enviarArquivos'] as $aFiles) {
                $mail->addAttachment($aFiles['tmp_name']['curriculo'], $aFiles['name']['curriculo']);
            }
        }
        //$mail->addAttachment($_FILES['TrabalheConoscoForm']['tmp_name']['curriculo'], $_FILES['TrabalheConoscoForm']['name']['curriculo']);
        $mail->isHTML(true);

        $mail->Subject = utf8_decode($aArrayOpcoes['Assunto'] /*'Contato recebido através do formulário "Trabalhe Conosco"'*/);
        $mail->Body = $aArrayOpcoes['Corpo'];

        //$mail->send();

	if(!$mail->send()) {
	    echo 'Message was not sent.';
	    echo 'Mailer error: ' . $mail->ErrorInfo;
    	    error_log("==> Util::enviaraEmail Fixa=[" . date('d-m-Y') . "]" . " Erro Envio:" .  $mail->ErrorInfo .
    		    " Host: " . $aArrayOpcoes['Host'] . 
    		    " Username: " . $aArrayOpcoes['UserName'] .
    		    " Senha: " . $aArrayOpcoes['Password'] .
    		    " Porta: " . $aArrayOpcoes['Porta'] .
    		    " From: " . $aArrayOpcoes['EmailOrigemDisplay'] .
	                                  "\n", 3, "/tmp/jm.log");
	                                  
	} 
	else {
	    echo 'Message has been sent.';
    	    error_log("==> Util::enviaraEmail Fixa=[" . date('d-m-Y') . "]" . " Enviado Sem Erro:" .
	                                  "\n", 3, "/tmp/jm.log");
	}
        
    }
    

    static public $rules = array(
    //singular     plural
        'ão'    => 'ões', 
        'ês'    => 'eses', 
        'm'     => 'ns', 
        'l'     => 'is', 
        'r'     => 'res', 
        'x'     => 'xes', 
        'z'     => 'zes', 
    );

    static public $exceptions = array(
        'cidadão' => 'cidadãos',
        'mão'     => 'mãos',
        'qualquer'=> 'quaisquer',
        'campus'  => 'campi',
        'lápis'   => 'lápis',
        'ônibus'  => 'ônibus',
    );

    public static function addException($singularWord, $pluralWord){
      self::$exceptions[$singularWord] = $pluralWord;

      return true;
    }

    public static function addRule($singularWord, $pluralWord){
      self::$rules[$singularSufix] = $pluralSufix;

      return true;
    }

    public static function pluralize($word){
        //Pertence a alguma exceção?
        if(array_key_exists($word, self::$exceptions)){
            return self::$exceptions[$word];
        }
        //Não pertence a nenhuma exceção, mas tem alguma regra?
        else{
            foreach(self::$rules as $singular=>$plural){
                if(preg_match("({$singular}$)", $word)){
                    return preg_replace("({$singular}$)", $plural, $word);
                }
            }
        }
        //Não pertence às exceções, nem às regras.
        //Se não terminar com "s", adiciono um.
        if(substr($word, -1) !== 's'){
            return $word . 's';
        }
        else{
          return $word;
        }
    }
    
    public static function singularize($word){
        //Pertence às exceções?
        if(in_array($word, self::$exceptions)){
            $invert = array_flip(self::$exceptions);
            return $invert[$word];
        }
        //Não é exceção, mas pertence a alguma regra?
        else{
            foreach(self::$rules as $singular => $plural){
                if(preg_match("({$plural}$)",$word)){
                    return preg_replace("({$plural}$)", $singular, $word);
                }
            }
        }
        //Nem é exceção, nem tem regra definida. 
        //Apaga a última somente se for um "s" no final
        if(substr($word, -1) == 's'){
            return substr($word, 0, -1);
        }
        else{
          return $word;
        }
    }
    
    
}
