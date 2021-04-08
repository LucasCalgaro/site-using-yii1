 <?php
  class UserIdentity extends CUserIdentity
  {
              private $_id, $_username;
   
              public function authenticate()
              {
   
                          $record = Administrador::model()->findByAttributes(array('usuario'=>$this->username));
   
                          if($record === null){
                                     $this->errorCode = self::ERROR_USERNAME_INVALID;
                          } elseif ($record->senha !== $this->password){
                                     $this->errorCode = self::ERROR_PASSWORD_INVALID;
                          } else {
                                     $this->_id=$record->id;
                                     $this->username=$record->usuario;
                                     $this->setState('nome', $record->nome);
                                     $this->errorCode=self::ERROR_NONE;
                          }
                          return !$this->errorCode;
              }
   
              public function getId()
              {
                          return $this->_id;
              }
  }