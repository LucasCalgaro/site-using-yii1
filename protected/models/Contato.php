<?

    class Contato extends CFormModel {
        
        public $id_cadastro;
        public $cadastro;
        public $imovel_pretendido;
        public $valor_aluguel;
        public $finalidade;
        public $condominio_aprox;
        public $sera_montado;
        public $nome;
        public $telefone;
        public $celular;
        public $email;
        public $uf;
        public $cidade;
        public $bairro;
        public $endereco;
        public $cep;
        public $cpf;
        public $rg;
        public $data_nascimento;
        public $estado_civil;
        public $naturalidade;
        public $nacionalidade;
        public $possui_imovel;
        public $onde;
        public $alugou_imob_part;
        public $imobiliaria;
        public $empresa;
        public $empresa_endereco;
        public $empresa_bairro;
        public $empresa_cidade;
        public $empresa_estado;
        public $empresa_cep;
        public $empresa_telefone;
        public $empresa_profissao;
        public $empresa_salario;
        public $empresa_tempo_servico;
        public $empresa_outra_renda;
        public $empresa_quais;
        public $empresa_valor;
        public $conjuge_nome;
        public $conjuge_endereco;
        public $conjuge_telefone;
        public $conjuge_data_nascimento;
        public $conjuge_empresa;
        public $conjuge_profissao;
        public $conjuge_tempo_servico;
        public $conjuge_salario;
        public $refcom_nome1;
        public $refcom_fone1;
        public $refcom_nome2;
        public $refcom_fone2;
        public $refban_banco;
        public $refban_fone;
        public $refban_desde;
        public $refban_conta;
        public $refban_agencia;
        public $refban_cidade;
        public $refban_estado;
        public $pesres_nome1;
        public $pesres_nome2;
        public $pesres_nome3;
        public $pesres_nome4;
        public $pj_razao_social;
        public $pj_nome_fantasia;
        public $pj_telefone;
        public $pj_fax;
        public $pj_email;
        public $pj_uf;
        public $pj_cidade;
        public $pj_bairro;
        public $pj_endereco;
        public $pj_cep;
        public $pj_cnpj;
        public $pj_inscricao_estadual;
        public $pj_inscricao_municipal;
        public $pj_data_constituicao;
        public $s1_nome;
        public $s1_email;
        public $s1_endereco;
        public $s1_bairro;
        public $s1_cidade;
        public $s1_estado;
        public $s1_cep;
        public $s1_telefone;
        public $s1_celular;
        public $s1_cpf;
        public $s1_rg;
        public $s1_estado_civil;
        public $s1_data_nascimento;
        public $s1_naturalidade;
        public $s1_nacionalidade;
        public $s1_profissao;
        public $s1_tempo_servico;
        public $s1_salario;
        public $s1_outra_renda;
        public $s1_quais;
        public $s1_valor;
        public $s1_imovel;
        public $s1_onde;
        public $s2_nome;
        public $s2_email;
        public $s2_endereco;
        public $s2_bairro;
        public $s2_cidade;
        public $s2_estado;
        public $s2_cep;
        public $s2_telefone;
        public $s2_celular;
        public $s2_cpf;
        public $s2_rg;
        public $s2_estado_civil;
        public $s2_data_nascimento;
        public $s2_naturalidade;
        public $s2_nacionalidade;
        public $s2_profissao;
        public $s2_tempo_servico;
        public $s2_salario;
        public $s2_outra_renda;
        public $s2_quais;
        public $s2_valor;
        public $s2_imovel;
        public $s2_onde;
        
        public $estado;
        public $locacao;
        public $valor_iptu_mes;
        public $iptu;
        public $venda;
        public $venda_valor;
        public $comissao_venda;
        public $valor_condominio;
        public $taxa_locacao_1_aluguel;
        public $taxa_adm_percentual;
        public $prazo_de;
        public $prazo_ate;
        public $area_total;
        public $medidas;
        public $terreno;
        public $area_construida;
        public $tipo_construcao;
        public $cobertura;
        public $aquecimento_gas;
        public $portao_eletrico;
        public $piscina;
        public $esgoto;
        public $elevador;
        public $churrasqueira;
        public $acabamento_gesso;
        public $quarto;
        public $quarto_piso;
        public $quarto_armario;
        public $quarto_porta;
        public $quarto_janela;
        public $quarto_outro;
        public $suite;
        public $suite_piso;
        public $suite_armario;
        public $suite_porta;
        public $suite_janela;
        public $suite_outro;
        public $banheiro;
        public $banheiro_piso;
        public $banheiro_armario;
        public $banheiro_porta;
        public $banheiro_janela;
        public $banheiro_outro;
        public $sala;
        public $sala_piso;
        public $sala_armario;
        public $sala_porta;
        public $sala_janela;
        public $sala_outro;
        public $cozinha;
        public $cozinha_piso;
        public $cozinha_armario;
        public $cozinha_porta;
        public $cozinha_janela;
        public $cozinha_outro;
        public $lavanderia;
        public $lavanderia_piso;
        public $lavanderia_armario;
        public $lavanderia_porta;
        public $lavanderia_janela;
        public $lavanderia_outro;
        public $dempregada;
        public $dempregada_piso;
        public $dempregada_armario;
        public $dempregada_porta;
        public $dempregada_janela;
        public $dempregada_outro;
        public $edicula;
        public $edicula_piso;
        public $edicula_armario;
        public $edicula_porta;
        public $edicula_janela;
        public $edicula_outro;
        public $garagem;
        public $garagem_piso;
        public $garagem_armario;
        public $garagem_porta;
        public $garagem_janela;
        public $garagem_outro;
        public $observacao;
        
        public $tipo;
        public $area_util;
        public $dormitorio;
        public $im_garagem;
        public $valor;
        public $im_estado;
        public $im_cidade;
        public $im_endereco;
        public $im_bairro;
        public $informacoes;
        public $como_chegou;
        public $comentario;
        
        public $horario;
        
        public $titulo1;
        public $titulo2;
        public $titulo3;
        public $titulo4;
        public $titulo5;
        public $titulo6;
        public $titulo7;
        public $titulo8;
        public $titulo9;
        public $titulo10;
        public $titulo11;
        public $titulo12;
        public $titulo13;
        public $titulo14;
        public $titulo15;
        public $titulo16;
        public $titulo17;
        public $titulo18;
        public $titulo19;
        public $titulo20;
        public $titulo21;
        public $titulo22;
        public $titulo23;
        public $titulo24;
        public $titulo25;
        public $titulo26;
        public $titulo27;
		
		public $envParaNome;
		public $envParaEmail;
		public $data;
		public $proposta;
		
        public function rules() {
            return array(
                array('nome, telefone', 'required'),
                array('email', 'email'),
                // array('verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements()),
            );
        }

        public function attributeLabels() {
            return array(
                // Titulos
                'titulo1' => 'CADASTRO PESSOA F??SICA', // DIVISOR
                'titulo2' => 'DADOS PESSOAIS',
                'titulo3' => 'DADOS PROFISSIONAIS',
                'titulo4' => 'DADOS CONJUGUE',
                'titulo5' => 'REFER??NCIA COMERCIAL',
                'titulo6' => 'REFER??NCIA BANC??RIA',
                'titulo7' => 'PESSOAS QUE RESIDIR??O NO IM??VEL',
                
                'titulo8' => 'CADASTRO PESSOA JUR??DICA', // DIVISOR
                'titulo9' => 'INFORMA????ES',
                'titulo10' => 'DADOS DO S??CIO 1',
                'titulo11' => 'DADOS DO S??CIO 2',
                
                'titulo12' => 'CADASTRO DE IM??VEL',
                'titulo13' => 'DADOS DO IM??VEL',
                'titulo14' => 'AVALIA????O DO IM??VEL',
                
                'titulo15' => ':: Terreno',
                'titulo16' => ':: Casa / Apartamento',
                
                'titulo17' => 'Informa????es sobre Quartos',
                'titulo18' => 'Informa????es sobre Su??tes',
                'titulo19' => 'Informa????es sobre Banheiros',
                'titulo20' => 'Informa????es sobre Sala',
                'titulo21' => 'Informa????es sobre Cozinha',
                'titulo22' => 'Informa????es sobre Lavanderia',
                'titulo23' => 'Informa????es sobre Departamento Empregada',
                'titulo24' => 'Informa????es sobre Ed??cula',
                'titulo25' => 'Informa????es sobre Garagem',
                'titulo26' => 'Solicita????o de Avalia????o de Im??vel',
                
                'titulo27' => 'N??s Ligamos Para Voc??',
                
                
                // TITULO 1 : CADASTRO PESSOA F??SICA
                'cadastro' => 'Cadastro de',
                'imovel_pretendido' => 'Im??vel Pretendido',
                'valor_aluguel' => 'Valor do Aluguel (R$)',
                'finalidade' => 'Finalidade',
                'condominio_aprox' => 'Condom??nio (Aproximado)',
                'sera_montado' => 'O que ser?? montado',
                
                // TITULO 2 : DADOS PESSOAIS (PESSOA FISICA)
                'nome' => 'Nome',
                'telefone' => 'Telefone',
                'celular' => 'Celular',
                'email' => 'Email',
                'uf' => 'Estado',
                'cidade' => 'Cidade',
                'bairro' => 'Bairro',
                'endereco' => 'Endere??o',
                'cep' => 'CEP',
                'cpf' => 'CPF',
                'rg' => 'RG',
                'data_nascimento' => 'Data de Nascimento',
                'estado_civil' => 'Estado Civil',
                'naturalidade' => 'Naturalidade',
                'nacionalidade' => 'Nacionalidade',
                'possui_imovel' => 'Possui Im??vel Pr??prio?',
                'onde' => 'Onde',
                'alugou_imob_part' => 'J?? alugou im??vel por imobili??ria ou particular?',
                'imobiliaria' => 'Qual Imobili??ria',
                
                # TITULO 3 - DADOS PROFISSIONAIS (PESSOA JURIDICA E FISICA)
                'empresa' => 'Empresa',
                'empresa_endereco' => 'Endereco',
                'empresa_bairro' => 'Bairro',
                'empresa_cidade' => 'Cidade',
                'empresa_estado' => 'Estado',
                'empresa_cep' => 'CEP',
                'empresa_telefone' => 'Telefone',
                'empresa_profissao' => 'Profiss??o',
                'empresa_salario' => 'Sal??rio',
                'empresa_tempo_servico' => 'Tempo de Servi??o',
                'empresa_outra_renda' => 'Possui Outra Renda?',
                'empresa_quais' => 'Quais',
                'empresa_valor' => 'Valor',
                
                # TITULO 4 - DADOS CONJUGUE (PESSOA FISICA)
                'conjuge_nome' => 'Nome',
                'conjuge_endereco' => 'Endere??o',
                'conjuge_telefone' => 'Telefone',
                'conjuge_data_nascimento' => 'Data de Nascimento',
                'conjuge_empresa' => 'Empresa',
                'conjuge_profissao' => 'Profiss??o',
                'conjuge_tempo_servico' => 'Tempo e Servi??o',
                'conjuge_salario' => 'Sal??rio',
                
                # TITULO 5 - REFER??NCIA COMERCIAL (PESSOA JURIDICA E FISICA)
                'refcom_nome1' => 'Nome',
                'refcom_fone1' => 'Telefone',
                'refcom_nome2' => 'Nome',
                'refcom_fone2' => 'Telefone',
                
                # TITULO 6 : REFER??NCIA BANC??RIA (PESSOA JURIDICA E FISICA)
                'refban_banco' => 'Banco',
                'refban_fone' => 'Telefone',
                'refban_desde' => 'Cliente Desde',
                'refban_conta' => 'N?? Conta',
                'refban_agencia' => 'Ag??ncia',
                'refban_cidade' => 'Cidade',
                'refban_estado' => 'Estado',
                
                # TITULO 7 : PESSOAS QUE RESIDIR??O NO IM??VEL (PESSOA FISICA)
                'pesres_nome1' => 'Nome',
                'pesres_nome2' => 'Nome',
                'pesres_nome3' => 'Nome',
                'pesres_nome4' => 'Nome',
                
                # TITULO 9 : INFORMA????ES (PESSOA JURIDICA)
                'pj_razao_social' => 'Raz??oSocial',
                'pj_nome_fantasia' => 'Nome Fantasia',
                'pj_telefone' => 'Telefone',
                'pj_fax' => 'Fax',
                'pj_email' => 'E-mail',
                'pj_uf' => 'Estado',
                'pj_cidade' => 'Cidade',
                'pj_bairro' => 'Bairro',
                'pj_endereco' => 'Endere??o',
                'pj_cep' => 'CEP',
                'pj_cnpj' => 'CNPJ',
                'pj_inscricao_estadual' => 'Inscri????o Estadual',
                'pj_inscricao_municipal' => 'Inscri????o Municipal',
                'pj_data_constituicao' => 'Data Constitui????o',
                
                # TITULO 10 : S??CIO 1 (PESSOA JURIDICA)
                's1_nome' => 'Nome',
                's1_email' => 'E-mail',
                's1_endereco' => 'Endere??o',
                's1_bairro' => 'Bairro',
                's1_cidade' => 'Cidade',
                's1_estado' => 'Estado',
                's1_cep' => 'CEP',
                's1_telefone' => 'Telefone',
                's1_celular' => 'Celular',
                's1_cpf' => 'CPF',
                's1_rg' => 'RG',
                's1_estado_civil' => 'Estado Civil',
                's1_data_nascimento' => 'Data de Nascimento',
                's1_naturalidade' => 'Naturalidade',
                's1_nacionalidade' => 'Nacionalidade',
                's1_profissao' => 'Profiss??o',
                's1_tempo_servico' => 'Tempo de Servi??o',
                's1_salario' => 'Sal??rio',
                's1_outra_renda' => 'Possui Outra Renda?',
                's1_quais' => 'Quais',
                's1_valor' => 'Valor',
                's1_imovel' => 'Possui Im??vel Pr??prio?',
                's1_onde' => 'Onde',
                
                # TITULO 11 : S??CIO 2 (PESSOA JURIDICA)
                's2_nome' => 'Nome',
                's2_email' => 'E-mail',
                's2_endereco' => 'Endere??o',
                's2_bairro' => 'Bairro',
                's2_cidade' => 'Cidade',
                's2_estado' => 'Estado',
                's2_cep' => 'CEP',
                's2_telefone' => 'Telefone',
                's2_celular' => 'Celular',
                's2_cpf' => 'CPF',
                's2_rg' => 'RG',
                's2_estado_civil' => 'Estado Civil',
                's2_data_nascimento' => 'Data de Nascimento',
                's2_naturalidade' => 'Naturalidade',
                's2_nacionalidade' => 'Nacionalidade',
                's2_profissao' => 'Profiss??o',
                's2_tempo_servico' => 'Tempo de Servi??o',
                's2_salario' => 'Sal??rio',
                's2_outra_renda' => 'Possui Outra Renda?',
                's2_quais' => 'Quais',
                's2_valor' => 'Valor',
                's2_imovel' => 'Possui Im??vel Pr??prio?',
                's2_onde' => 'Onde',
                
                # TITULO 12 : CADASTRO DE IM??VEL
                'locacao' => 'Loca????o',
                'valor_iptu_mes' => 'Valor IPTU (M??s)',
                'iptu' => 'IPTU',
                'venda' => 'Venda',
                'venda_valor' => 'Valor Venda (R$)',
                'comissao_venda' => 'Comiss??o Venda (%)',
                'valor_condominio' => 'Valor do Condom??nio (R$)',
                'taxa_locacao_1_aluguel' => 'Taxa de Loca??ao do 1?? Aluguel (%)',
                'taxa_adm_percentual' => 'Taxa Administrativa dos demais alugu??is (R$)',
                'prazo_de' => 'De',
                'prazo_ate' => 'At??',
                'area_total' => '??rea Total',
                'medidas' => 'Medidas',
                'terreno' => 'Terreno',
                'area_construida' => '??rea Constru??da',
                'tipo_construcao' => 'Tipo Constru????o',
                'cobertura' => 'Cobertura',
                'aquecimento_gas' => 'Aquecimento G??s',
                'portao_eletrico' => 'Port??o Eletr??nico',
                'piscina' => 'Piscina',
                'esgoto' => 'Esgoto',
                'elevador' => 'Elevador',
                'churrasqueira' => 'Churrasqueira',
                'acabamento_gesso' => 'Acabamento em Gesso',
                'quarto' => 'Quant.',
                'quarto_piso' => 'Piso',
                'quarto_armario' => 'Arm??rio',
                'quarto_porta' => 'Porta',
                'quarto_janela' => 'Janela',
                'quarto_outro' => 'Outro',
                'suite' => 'Quant.',
                'suite_piso' => 'Piso',
                'suite_armario' => 'Arm??rio',
                'suite_porta' => 'Porta',
                'suite_janela' => 'Janela',
                'suite_outro' => 'Outro',
                'banheiro' => 'Quant.',
                'banheiro_piso' => 'Piso',
                'banheiro_armario' => 'Arm??rio',
                'banheiro_porta' => 'Porta',
                'banheiro_janela' => 'Janela',
                'banheiro_outro' => 'Outro',
                'sala' => 'Quant.',
                'sala_piso' => 'Piso',
                'sala_armario' => 'Arm??rio',
                'sala_porta' => 'Porta',
                'sala_janela' => 'Janela',
                'sala_outro' => 'Outro',
                'cozinha' => 'Quant.',
                'cozinha_piso' => 'Piso',
                'cozinha_armario' => 'Arm??rio',
                'cozinha_porta' => 'Porta',
                'cozinha_janela' => 'Janela',
                'cozinha_outro' => 'Outro',
                'lavanderia' => 'Quant.',
                'lavanderia_piso' => 'Piso',
                'lavanderia_armario' => 'Arm??rio',
                'lavanderia_porta' => 'Porta',
                'lavanderia_janela' => 'Janela',
                'lavanderia_outro' => 'Outro',
                'dempregada' => 'Quant.',
                'dempregada_piso' => 'Piso',
                'dempregada_armario' => 'Arm??rio',
                'dempregada_porta' => 'Porta',
                'dempregada_janela' => 'Janela',
                'dempregada_outro' => 'Outro',
                'edicula' => 'Quant.',
                'edicula_piso' => 'Piso',
                'edicula_armario' => 'Arm??rio',
                'edicula_porta' => 'Porta',
                'edicula_janela' => 'Janela',
                'edicula_outro' => 'Outro',
                'garagem' => 'Quant.',
                'garagem_piso' => 'Piso',
                'garagem_armario' => 'Arm??rio',
                'garagem_porta' => 'Porta',
                'garagem_janela' => 'Janela',
                'garagem_outro' => 'Outro',
                'observacao' => 'Observa????o',
                
                'tipo' => 'Tipo',
                'area_util' => '??rea ??til',
                'dormitorio' => 'Dormit??rio(s)',
                'im_garagem' => 'Garagem(ns)',
                'valor' => 'Valor',
                'im_estado' => 'Estado',
                'im_cidade' => 'Cidade',
                'im_endereco' => 'Endere??o',
                'im_bairro' => 'Bairro',
                'informacoes' => 'Informa????es',
                'como_chegou' => 'Como Chegou?',
                'comentario' => 'Coment??rios',
                
                'horario' => 'Que horas podemos ligar?',
				
				'envParaNome' => 'Destinat??rio',
				'envParaEmail' => 'E-mail do Destinat??rio',
				'data' => 'Data',
				'pagina' => 'Im??vel',
		
            );      
        }
    }
?>



         