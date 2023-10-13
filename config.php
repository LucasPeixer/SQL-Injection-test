<?php
// Conecta ao banco de dados
$server = "localhost";
$user = "root";
$password = "";
$database = "users";
$connect = mysqli_connect($server, $user, $password, $database);

// Verifica se a conexão foi bem sucedida
if (!$connect) {
  die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
}

// Recebe o nome do usuário do campo de busca
$name = $_GET["name"];

// Monta a consulta SQL usando o nome do usuário sem validar ou escapar
$sql = "SELECT * FROM users WHERE name = '$name'";

// Executa a consulta SQL no banco de dados
$result = mysqli_query($connect, $sql);

// Verifica se a consulta retornou algum resultado
if (mysqli_num_rows($result) > 0) {
  // Mostra as informações do usuário encontrado
  while ($row = mysqli_fetch_assoc($result)) {
    echo "Nome: " . $row["name"] . "<br>";
    echo "Email: " . $row["email"] . "<br>";
    echo "Senha: " . $row["password"] . "<br>";
  }
} else {
  // Mostra uma mensagem de erro
  echo "Usuário não encontrado";
}

// Fecha a conexão com o banco de dados
mysqli_close($connect);
?>