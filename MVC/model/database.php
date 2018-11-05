<?php
class Database
{
    public static function StartUp()
    {
      $pdo = new PDO('mysql:host=localhost; port=3306; dbname=automoviles', 'irene', 'majada');
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $pdo;
    }
}
?>
