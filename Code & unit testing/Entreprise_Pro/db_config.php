<?php
/* 1 */ // Database configuration - clearly annotated for easy adaptation 
/* 2 */ $host = 'localhost';
/* 3 */ $db   = 'entreprise_pro';
/* 4 */ $user = 'root';
/* 5 */ $pass = '';
/* 6 */ $charset = 'utf8mb4';
/* 7 */
/* 8 */ $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
/* 9 */ $options = [
/* 10 */    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
/* 11 */    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
/* 12 */ ];
/* 13 */
/* 14 */ try {
/* 15 */      $pdo = new PDO($dsn, $user, $pass, $options);
/* 16 */ } catch (\PDOException $e) {
/* 17 */      throw new \PDOException($e->getMessage(), (int)$e->getCode());
/* 18 */ }
?>