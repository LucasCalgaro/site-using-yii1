<?
    class TrabalheConoscoForm extends CFormModel {
        
        public $nome;
        public $telefone;
        public $email;
        public $estado;
        public $cidade;
        public $curriculo;
        public $cargo;
        public $mensagem;
        public $verifyCode;

        public function rules() {
            return array(
                array('nome, telefone, email, mensagem', 'required'),
                array('email', 'email'),
                array('verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements()),
            );
        }
        
        public function attributeLabels() {
            return array(
                'nome' => 'Nome',
                'telefone' => 'Telefone',
                'email' => 'E-mail',
                'estado' => 'Estado',
                'cidade' => 'Cidade',
                'curriculo' => 'Curriculo',
                'cargo' => 'Cargo Desejável',
                'mensagem' => 'Mensagem',
                'verifyCode' => 'Código Autenticador',
            );
        }
        
    }
?>