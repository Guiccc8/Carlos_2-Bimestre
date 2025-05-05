<?php 


$name = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);


$errors = []; 
if (empty(trim($name))) { 

$errors[] = "O campo 'nome' é obrigatório.";

}
 elseif(empty($email_input)) {
    $errors[] = "O campo 'email' é obrigatório.";
}


try{
    $db_server = "localhost";
    $db_user = "root";
    $password = "raiz";
    $db_name = "meu_banco";

        $conn = mysqli_connect(
            $db_server, 
            $db_user, 
            $password, 
            $db_name
        );

    
        #->: Para acessar os métodos e as propriedades de um objeto
        $insert = $conn->prepare("INSERT INTO usuarios (nome, email) VALUES (?, ?)");
    
        if($insert === false){
            die('Não foi possível a preparação:' . $conn->error);
        }
    
        #Para implementar noa pontos de interrogação
        $insert->bind_param("ss", $name, $email);
    
        if($insert->execute()){}
        else{
            echo "Erro:" . $insert->error;
        }
    
        header("Location:processa.php");


     } catch(mysqli_sql_exception){
        "Error";
     }
?>