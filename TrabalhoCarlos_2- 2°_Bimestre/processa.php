

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envio de dados</title>
    <link rel="stylesheet" href="processa.css">
</head> 
<body>

<?php 


    include("database.php");

    $writeall =  "Select * from usuarios";

    $writeid = "Select * from usuarios order by id desc limit 1";
    
    $commandWrite = @mysqli_query($conn, $writeall);
    $commandWriteid = @mysqli_query($conn, $writeid);

    $numid = mysqli_num_rows($commandWriteid);

    ?>
    <div class="Registro">
        <h1>Novo Registro</h1>
        <div class="novo">
    <?php
    while($rowid = mysqli_fetch_array($commandWriteid)){
        echo "<h2>";
            echo "Registro: " . $rowid['id'];
        echo "</h2>";

        echo "<h2>";
            echo "Nome: " . $rowid['nome'];
        echo "</h2>";

        echo "<h2>";
            echo "Email: " . $rowid['email'];
        echo "</h2>";

    }
    ?>
        </div>
    </div>

    <?php
    $num = mysqli_num_rows($commandWrite);

    if($num > 0){
        ?>
        <div class="any">


        <?php
        while($row = mysqli_fetch_array($commandWrite)){
        

            echo "<div class='separation'>";

                 echo "<div class='idUsuario'>";
                    echo "<p>";
                    echo $row['id'];
                    echo "</p>";
                echo "</div>";

                echo "<div class='nameUsuario'>";
                    echo "<p>";
                    echo $row['nome'];
                    echo "</p>";
                echo "</div>";

                echo "<div class='emailUsuario'>";
                    echo "<p>";
                    echo $row['email'];
                    echo "</p>";
                echo "</div>";
            echo "</div>";

        }

        ?>
        </div>

        <?php
        

    }else{
        echo "<p> Não há linhas na aplicação<p>";
    }

    $insert->close();
    $conn->close();
?>    
</body>
</html>