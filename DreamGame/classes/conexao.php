<?php
class Conexao {
    private static $host = "localhost";
    private static $usuario = "root";
    private static $senha = "";
    private static $banco = "db_dreamgame";
    private static $conn;

    public static function getConexao() {
        if (!isset(self::$conn)) {
            self::$conn = new mysqli(self::$host, self::$usuario, self::$senha, self::$banco);

            if (self::$conn->connect_error) {
                die("Erro de conexão: " . self::$conn->connect_error);
            }
        }
        return self::$conn;
    }
}
?>