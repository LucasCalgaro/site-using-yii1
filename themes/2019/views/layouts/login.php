<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="pt-br" />
        
        <!-- JQUERY -->
        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <!-- GOOGLE FONTS -->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
        <!-- BOOTSTRAP -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- FONT AWESOME -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>
    
    <body>
        
        <style type="text/css">
            .form-signin{max-width: 330px;padding: 15px;margin: 0 auto;}
            .form-signin .form-signin-heading, .form-signin .checkbox{margin-bottom: 10px;}
            .form-signin .checkbox{font-weight: normal;}
            .form-signin .form-control{position: relative;font-size: 16px;height: auto;padding: 10px;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;}
            .form-signin .form-control:focus{z-index: 2;}
            .form-signin input[type="text"]{margin-bottom: -1px;border-bottom-left-radius: 0;border-bottom-right-radius: 0;}
            .form-signin input[type="password"]{margin-bottom: 10px;border-top-left-radius: 0;border-top-right-radius: 0;}
            .account-wall{margin-top: 20px;padding: 40px 0px 20px 0px;background-color: #f7f7f7;-moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);-webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);}
            .login-title{color: #555;font-size: 18px;font-weight: 400;display: block;}
            .profile-img{width: 96px;height: 96px;margin: 0 auto 10px;display: block;-moz-border-radius: 50%;-webkit-border-radius: 50%;border-radius: 50%;}
            .need-help{margin-top: 10px;}
            .new-account{display: block;margin-top: 10px;}
        </style>
        
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <h1 class="text-center login-title">Para acessar ambiente de desenvolvimento entre com suas credenciais</h1>
                    <div class="account-wall">
                        <form class="form-signin" action="<?=Yii::app()->createUrl('/desenvolvimento')?>" method="post">
                        <input name="usuario" type="text" class="form-control" placeholder="Email" required autofocus>
                        <input name="senha" type="password" class="form-control" placeholder="Password" required>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Autenticar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        
    </body>
    
    <!-- BOOSTRAP JAVASCRIPT -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</html>