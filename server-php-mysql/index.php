<?php
function _printr($var) {
    echo "<pre>";
    print_r($var);
    echo "</pre>";
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Załaduj zmienne ze środowiska z pliku .env
require_once __DIR__ . '/vendor/autoload.php';
// use Dotenv\Dotenv;
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// _printr($_ENV);
// Dane do połączenia z bazą danych pobrane z pliku .env
$username = $_ENV['MYSQL_USER']; // Nazwa użytkownika MySQL
$password = $_ENV['MYSQL_PASSWORD']; // Hasło użytkownika MySQL
$database = $_ENV['MYSQL_DATABASE']; // Nazwa bazy danych MySQL
$port = $_ENV['MYSQL_DB_PORT']; // Port MySQL

// $host = $_ENV['MYSQL_HOST']; // Port MySQL
$host = 'mysql';  // Nazwa serwisu MySQL w Docker Compose

// $host = "192.168.32.2";
// $username = "duser";
// $password = "aaa";
// $database = "dbdocker";
// $port = "3306";

echo "FILE: " .__FILE__."<br>";
echo "PHP_VERSION: ".PHP_VERSION. "<br>"; 
echo "<br>";

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "DB CONNECTED";
    $sql = "CREATE TABLE IF NOT EXISTS user(
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(32) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
    $pdo->exec($sql);
    $sql = "INSERT INTO user (name) VALUES (:name)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':name', 'woj gaw');
    $stmt->execute();

    $sql = "SELECT * FROM user";
    $stmt = $pdo->query($sql);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    _printr($users);

} catch(PDOException $e) {
    echo "DB NOT CONNECTED<br>";
    echo "Error: ". $e->getMessage();
}

?>