<?php
class Conexao {
    private static $host = "185.213.81.205";
    private static $usuario = "u336727971_hostinger";
    private static $senha = "DreamGame@1";
    private static $banco = "u336727971_db_dreamgame";
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