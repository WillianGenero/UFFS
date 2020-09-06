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
        $select = pg_query($conexao,"Select * from aluno order by 1");
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
          pg_close();
        ?>
        </table>
      </div>
<?php
  class ConnectException extends Exception { }
  class QueryException extends Exception { }
  try{
    $conexao = @pg_connect("host=localhost dbname=mydb port=5432 user=myuser password=123");
    if(@pg_connection_status($conexao) !== 0){
      throw new ConnectException("Conexão com o banco de dados falhou!");
    }
    @pg_query("BEGIN");
    $id1 = 100342;
		$id2 = 102;
    echo "Inserindo matrícula com valor $id1 <br>";
		echo "Inserindo matrícula com valor $id2 <br>";
    $res1 = @pg_query("INSERT INTO aluno VALUES ($id1, 'Beltrano')");
		$res2 = @pg_query("INSERT INTO aluno VALUES ($id2, 'Beltrano')");
    if(!$res1 or !$res2){
      throw new QueryException("Rollback");
    }
    @pg_query("COMMIT");
    echo "Committed";

  }catch(ConnectException $erro){
    echo $erro->getMessage();
    die();
  }catch(QueryException $erro){
    echo $erro->getMessage();
    @pg_query("ROLLBACK");
  }
?>
</body>
</html>
