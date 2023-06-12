<?php
// Incluir arquivo de configuração
require_once "config.php";
 
// Defina variáveis e inicialize com valores vazios
$CPF = $username = $password = $confirm_password = "";
$CPF_err = $username_err = $password_err = $confirm_password_err = "";
 
// Processando dados do formulário quando o formulário é enviado
if($_SERVER["REQUEST_METHOD"] == "POST"){

    //validar cpf
    if(empty(trim($_POST["CPF"]))){
        $CPF_err = "Por favor coloque seu CPF.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["CPF"]))){
        $CPF_err = "digite somente números.";
    } else{
        // Prepare uma declaração selecionada
        $sql = "SELECT CPF FROM users WHERE CPF = :CPF";
        
        if($stmt = $pdo->prepare($sql)){
            // Vincule as variáveis à instrução preparada como parâmetros
            $stmt->bindParam(":CPF", $param_CPF, PDO::PARAM_STR);
            
            // Definir parâmetros
            $param_CPF = trim($_POST["CPF"]);
            
            // Tente executar a declaração preparada
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $CPF_err = "Este CPF já está em uso.";
                } else{
                    $CPF = trim($_POST["CPF"]);
                }
            } else{
                echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
            }

            // Fechar declaração
            unset($stmt);
        }
    }
 
    // Validar nome de usuário
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor coloque um nome de usuário.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "O nome de usuário pode conter apenas letras, números e sublinhados.";
    } else{
        // Prepare uma declaração selecionada
        $sql = "SELECT username FROM users WHERE username = :username";
        
        if($stmt = $pdo->prepare($sql)){
            // Vincule as variáveis à instrução preparada como parâmetros
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            
            // Definir parâmetros
            $param_username = trim($_POST["username"]);
            
            // Tente executar a declaração preparada
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $username_err = "Este nome de usuário já está em uso.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
            }

            // Fechar declaração
            unset($stmt);
        }
    }
    
    // Validar senha
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor insira uma senha.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "A senha deve ter pelo menos 6 caracteres.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validar e confirmar a senha
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Por favor, confirme a senha.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "A senha não confere.";
        }
    }
    
    // Verifique os erros de entrada antes de inserir no banco de dados
    if(empty($CPF_err) && empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare uma declaração de inserção
        $sql = "INSERT INTO users (CPF,username, password) VALUES (:CPF, :username, :password)";
         
        if($stmt = $pdo->prepare($sql)){
            // Vincule as variáveis à instrução preparada como parâmetros
            $stmt->bindParam(":CPF", $param_CPF, PDO::PARAM_STR);
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
            
            // Definir parâmetros
            $param_CPF = $CPF;
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Tente executar a declaração preparada
            if($stmt->execute()){
                // Redirecionar para a página de login
                header("location: login.php");
            } else{
                echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
            }

            // Fechar declaração
            unset($stmt);
        }
    }
    
    // Fechar conexão
    unset($pdo);
}
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Cadastro</h2>
        <p>Por favor, preencha este formulário para criar uma conta.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
            <label>CPF</label>
                <input type="text" name="CPF" class="form-control <?php echo (!empty($CPF_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $CPF; ?>">
                <span class="invalid-feedback"><?php echo $CPF_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Nome do usuário</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Senha</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirme a senha</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Criar Conta">
                <input type="reset" class="btn btn-secondary ml-2" value="Apagar Dados">
            </div>
            <p>Já tem uma conta? <a href="login.php">Entre aqui</a>.</p>
        </form>
    </div>    
</body>
</html>