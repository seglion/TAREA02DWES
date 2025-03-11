<?php

namespace src;


use Src\Conexion;
use PDO;
use PDOException;

class Jugador {

    public static function insertarJugador($nombre, $apellidos, $dorsal, $posicion, $barcode) {
        try {
            $conexion = Conexion::getConexion();

            // Validar dorsal único
            if (self::dorsalExiste($dorsal)) {
                throw new PDOException("El dorsal ya está asignado a otro jugador.");
            }

            // Validar código de barras único
            if (self::barcodeExiste($barcode)) {
                throw new PDOException("El código de barras ya está asignado a otro jugador.");
            }

            // Validar posición (ENUM)
            $posicionesValidas = [
                'Portero', 
                'Defensa', 
                'Lateral Izquierdo', 
                'Lateral Derecho', 
                'Central', 
                'Delantero'
            ];
            if (!in_array($posicion, $posicionesValidas)) {
                throw new PDOException("Posición no válida");
            }

            // Insertar jugador
            $stmt = $conexion->prepare("
                INSERT INTO jugadores 
                (nombre, apellidos, dorsal, posicion, barcode) 
                VALUES (?, ?, ?, ?, ?)
            ");
            $stmt->execute([$nombre, $apellidos, $dorsal, $posicion, $barcode]);

            return "Jugador insertado correctamente.";
        } catch (PDOException $e) {
            return "Error al insertar jugador: " . $e->getMessage();
        }
    }

    public static function barcodeExiste($barcode) {
        try {
            $conexion = Conexion::getConexion();
            $stmt = $conexion->prepare("SELECT * FROM jugadores WHERE barcode = ?");
            $stmt->execute([$barcode]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function dorsalExiste($dorsal) {
        try {
            $conexion = Conexion::getConexion();
            $stmt = $conexion->prepare("SELECT * FROM jugadores WHERE dorsal = ?");
            $stmt->execute([$dorsal]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function obtenerJugadores() {
        try {
            $conexion = Conexion::getConexion();
            $stmt = $conexion->query("SELECT * FROM jugadores");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }
}