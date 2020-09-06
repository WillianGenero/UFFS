<!DOCTYPE html>
<html>
	<head>
		<title>Postgresql - Tratando Transition</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
    <?php
      $conexao = pg_connect("host=localhost dbname=mydb port=5432 user=myuser password=123") or die ('Não foi possivel conectar');
      ?>
      <div id='sup'>
        <p id='titulo'>
          <strong>Banco conectado</strong><br>
        </p>
      <?php
        pg_query("Begin");
        $select = pg_query($conexao,"Select * from aluno order by matricula");
        pg_query("Commit");
      ?>
        <div id='tabela'>
          <?="<br><strong>Conteúdo presente na tabela<br></strong>";?>
        </div>
      </div>
        <div id="container">
        <table cellspacing="0">
          <tr>
            <th>Matrícula</th>
            <th>Nome</th>
        <?php
          while ($row = pg_fetch_array($select)){
              echo "<tr>";
              echo "<td>".$row['matricula']."</td>";
              echo "<td>".$row['nome']."</td>";
              echo "</tr><br>";
          }
        ?>
        </table>
      </div>

    <?php
    //usando PDO
    $pdo = new PDO("pgsql:dbname=mydb;host=localhost", "myuser", "123");  //seta conexão
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );      //seta modo de exceção

    // exemplo de como fazer uma consulta usando pdo
    // $rs = $pdo->prepare("SELECT * FROM aluno");
    // $rs->execute();
    // while($row = $rs->fetch(PDO::FETCH_OBJ)){
    //   echo "<pre>";
    //   echo $row->matricula . " - " . $row->nome;
    //   echo "</pre>";
    // }

    try {
        $pdo->beginTransaction();

        $stmt = $pdo->prepare("INSERT INTO aluno values (1999, 'Fulano')");  //prepara o insert
        if($stmt->execute()){                                                        //executa o insert
          echo "<p>Query 1 comitada<p>";
        }else
          echo "<p>Query 1 não comitada<p>";

        $stmt = $pdo->prepare("INSERT INTO aluno values (1003, 'Ciclano')");   //prepara o insert
        if($stmt->execute()){                                                        //executa o insert
          echo "<p>Query 2 comitada<p>";
        }else
          echo "<p>Query 2 não comitada<p>";

        $pdo->commit();
        echo "<h3>Commit</h3>";
    } catch (\PDOException $e) {
        $pdo->rollBack();
        echo $e->getMessage();
        echo "<h3>Rollback</h3>";
    }
    ?>
  </body>
</html>
