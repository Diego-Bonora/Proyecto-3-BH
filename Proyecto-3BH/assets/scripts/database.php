 <?php 
    $server = 'localhost';
    $username = 'root';
    $pasword = '';
    $database = 'NetClip';

    try {
        $conn = new PDO ("mysql:host=$server;dbname=$database;",$username,$pasword);
    } catch (PDOException $e) {
        die('conected failed: '.$e->getMessage());
    }

 ?>