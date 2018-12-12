<?php
//variables BD
define("DB_HOST", "localhost");
define("DB_USUARIO", "irene");
define("DB_PASSWORD", "majada");
define("DB_NOMBRE", "proypreci");
//conectar con BD
define("SGBD", "mysql:host=" . DB_HOST . ";dbname=" . DB_NOMBRE);
define("OPCIONES", array (
  PDO::ATTR_PERSISTENT => true,
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
));
//variables para encrptar y desencriptar
const METHOD="AES-256-CBC";
const SECRET_KEY='$PC@2019';
const SECRET_IV='952611';
