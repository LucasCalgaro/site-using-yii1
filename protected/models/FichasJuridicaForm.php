<?

    class FichasJuridicaForm extends CFormModel {
        
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

        public function rules() {
            return array(
                array('nome, telefone, email, mensagem', 'required'),
                array('email', 'email'),
                array('verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements()),
            );
        }

        public function attributeLabels() {
            return array(
                // Titulos
                'titulo1' => 'CADASTRO PESSOA FÍSICA',
                'titulo2' => 'DADOS PESSOAIS',
                'titulo3' => 'DADOS PROFISSIONAIS',
                'titulo4' => 'DADOS CONJUGUE',
                'titulo5' => 'REFERÊNCIA COMERCIAL',
                'titulo6' => 'REFERÊNCIA BANCÁRIA',
                'titulo7' => 'PESSOAS QUE RESIDIRÃO NO IMÓVEL',
                
                'titulo8' => 'CADASTRO PESSOA JURÍDICA',
                'titulo9' => 'INFORMAÇÕES',
                'titulo10' => 'DADOS DO SÓCIO 1',
                'titulo11' => 'DADOS DO SÓCIO 2',
                
                'titulo12' => 'CADASTRO DE IMÓVEL',
                'titulo13' => 'DADOS DO IMÓVEL',
                'titulo14' => 'AVALIAÇÃO DO IMÓVEL',
                
                
                // Base
                'id_cadastro' => 'Identificador',
                'cadastro' => 'Cadastro de',
                'imovel_pretendido' => 'Imóvel Pretendido',
                'valor_aluguel' => 'Valor do Aluguel',
                'finalidade' => 'Finalidade',
                'condominio_aprox' => 'Condomínio (Aproximado)',
                'sera_montado' => 'O que será montado',
                // Dados Pessoais (PF)
                'nome' => 'Nome',
                'telefone' => 'Telefone',
                'celular' => 'Celular',
                'email' => 'Email',
                'uf' => 'Estado',
                'cidade' => 'Cidade',
                'bairro' => 'Bairro',
                'endereco' => 'Endereço',
                'cep' => 'CEP',
                'cpf' => 'CPF',
                'rg' => 'RG',
                'data_nascimento' => 'Data de Nascimento',
                'estado_civil' => 'Estado Civil',
                'naturalidade' => 'Naturalidade',
                'nacionalidade' => 'Nacionalidade',
                'possui_imovel' => 'Possui Imóvel Próprio?',
                'onde' => 'Onde',
                'alugou_imob_part' => 'Já alugou imóvel por imobiliária ou particular?',
                'imobiliaria' => 'Qual Imobiliária',
                // Dados Profissionais
                'empresa' => 'Empresa',
                'empresa_endereco' => 'Endereco',
                'empresa_bairro' => 'Bairro',
                'empresa_cidade' => 'Cidade',
                'empresa_estado' => 'Estado',
                'empresa_cep' => 'CEP',
                'empresa_telefone' => 'Telefone',
                'empresa_profissao' => 'Profissão',
                'empresa_salario' => 'Salário',
                'empresa_tempo_servico' => 'Tempo de Serviço',
                'empresa_outra_renda' => 'Possui Outra Renda?',
                'empresa_quais' => 'Quais',
                'empresa_valor' => 'Valor',
                // Dados Conjuge
                'conjuge_nome' => 'Nome',
                'conjuge_endereco' => 'Endereço',
                'conjuge_telefone' => 'Telefone',
                'conjuge_data_nascimento' => 'Data de Nascimento',
                'conjuge_empresa' => 'Empresa',
                'conjuge_profissao' => 'Profissão',
                'conjuge_tempo_servico' => 'Tempo e Serviço',
                'conjuge_salario' => 'Salário',
                // Referência 
                'refcom_nome1' => 'Nome',
                'refcom_fone1' => 'Telefone',
                'refcom_nome2' => 'Nome',
                'refcom_fone2' => 'Telefone',
                // Banco
                'refban_banco' => 'Banco',
                'refban_fone' => 'Telefone',
                'refban_desde' => 'Cliente Desde',
                'refban_conta' => 'N° Conta',
                'refban_agencia' => 'Agência',
                'refban_cidade' => 'Cidade',
                'refban_estado' => 'Estado',
                // Residirão
                'pesres_nome1' => 'Nome',
                'pesres_nome2' => 'Nome',
                'pesres_nome3' => 'Nome',
                'pesres_nome4' => 'Nome',
                // Informações (PJ)
                'pj_razao_social' => 'RazãoSocial',
                'pj_nome_fantasia' => 'Nome Fantasia',
                'pj_telefone' => 'Telefone',
                'pj_fax' => 'Fax',
                'pj_email' => 'E-mail',
                'pj_uf' => 'Estado',
                'pj_cidade' => 'Cidade',
                'pj_bairro' => 'Bairro',
                'pj_endereco' => 'Endereço',
                'pj_cep' => 'CEP',
                'pj_cnpj' => 'CNPJ',
                'pj_inscricao_estadual' => 'Inscrição Estadual',
                'pj_inscricao_municipal' => 'Inscrição Municipal',
                'pj_data_constituicao' => 'Data Constituição',
                // Sócio 1 (PJ)
                's1_nome' => 'Nome',
                's1_email' => 'E-mail',
                's1_endereco' => 'Endereço',
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
                's1_profissao' => 'Profissão',
                's1_tempo_servico' => 'Tempo de Serviço',
                's1_salario' => 'Salário',
                's1_outra_renda' => 'Possui Outra Renda?',
                's1_quais' => 'Quais',
                's1_valor' => 'Valor',
                's1_imovel' => 'Possui Imóvel Próprio?',
                's1_onde' => 'Onde',
                // Sócio 2 (PJ)
                's2_nome' => 'Nome',
                's2_email' => 'E-mail',
                's2_endereco' => 'Endereço',
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
                's2_profissao' => 'Profissão',
                's2_tempo_servico' => 'Tempo de Serviço',
                's2_salario' => 'Salário',
                's2_outra_renda' => 'Possui Outra Renda?',
                's2_quais' => 'Quais',
                's2_valor' => 'Valor',
                's2_imovel' => 'Possui Imóvel Próprio?',
                's2_onde' => 'Onde',
            );      
        }
    }
?>