<?php
namespace Src;

use PDO;
use PDOException;
class Conexion {
    private static $conexion = null;

    public static function getConexion() {
        if (self::$conexion === null) {
            $host = 'localhost';
            $db = 'practicaUnidad5';
            $user = 'admin';
            $pass = '1234';
            $charset = 'utf8mb4';

            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

            try {
                self::$conexion = new PDO($dsn, $user, $pass);
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Error de conexión: " . $e->getMessage());
            }
        }

        return self::$conexion;
    }

    public static function cerrar() {
        self::$conexion = null;
    }
}