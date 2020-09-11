<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    <?php
        if(empty ($_POST)){
            include('cabecalho_conexao.php');
            $pront = $_GET['pront'];
            $SQL = "SELECT * FROM pessoas WHERE id=$pront";

            // Executa o comando SQL
            $dados_recuperados = mysqli_query($con, $SQL);

            if(mysqli_num_rows($dados_recuperados) > 0){
                
                while( ($resultado = mysqli_fetch_array($dados_recuperados)) != null) {
                    $nome = $resultado[1];
                    $idade = $resultado[2];
                    $endereco = $resultado[3];
                }
                echo '<form action="editar_aluno.php" method="POST">
                    <fieldset>
                    <legend>Editar dados dos alunos</legend>
                    <p>
                        <label>Nome</label>
                        <input type="text" name="nome2" value="'.$nome.'"/>
                    </p>
                    <p>
                        <label>Idade</label>
                        <input type="number" name="idade2" value="'.$idade.'"/>
                    </p>
                    <p>
                        <label>Endereco</label>
                        <input type="text" name="endereco2" value="'.$endereco.'"/>
                    </p>
                    <input type = "hidden" name="RA" value="'.$pront.'"/>
                    <p>
                    </p>
                    <p>
                        <input type="submit" value="Enviar"/>
                    </p>
                    </fieldset>
                </form>';
            }
        }else{
            $pront = $_POST['RA'];
            $nome2 = $_POST['nome2'];
            $idade2 = $_POST['idade2'];
            $endereco2 = $_POST['endereco2'];
            include('cabecalho_conexao.php');
            
            $SQL = "UPDATE pessoas set nome='$nome2', idade='$idade2', endereco='$endereco2' WHERE id=$pront";

            include('rodape_conexao.php');
        }
    ?>
</body>
</html>