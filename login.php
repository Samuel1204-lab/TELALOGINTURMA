<?php
    require_once 'usuario.php';
    $usuario = new Usuario();
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Login</title>
</head>

    <h2>TELA LOGIN</h2><br><br>
    <form  method="POST">
        <label >Usuário:</label>
        <input type="email" name="email" id = "" placeholder = "Digite seu email">
    <br><br>
        <label>Senha:</label><br><br>
        <input type="password" name="senha" id = "" placeholder = "**************"><br><br>
        <input type="submit" value="LOGAR">
        <a href="cadastro.php">INSCREVA-SE</a>
    </form>

    <?php
    
        if(isset($_POST['email']))
        {
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);

            if(!empty($email) && !empty($senha))
            {
                $usuario->conectar("cadastrousuarioturma33", "localhost", "root","");

                if($usuario->msgerro == "")
                {
                    if($usuario->logar($email, $senha))
                    {
                        header("location: areaRestrita.php");
                    }
                    else
                    {
                        ?>
                        
                        <div class="msg-erro">
                            <p>Email e/ou senha incorreta</p>
                        </div>

                        <?php
                    }
                }
                else
                {
                    ?>
                    <div class = "msg-erro">
                        <?php echo "Erro" .$usuario->msgerro ?>

                    </div>
                    <?php
                }
            }
            else
            {
                ?>
                        <div class="msg-erro">
                            <p>preencha todos os campos.</p>
                        </div>
        
        
        
                    <?php
            }
        
        };
  
    ?>

    
</body>
</html>