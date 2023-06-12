<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'agencia');
try {
	$pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
	// Defina o modo de erro PDO para exceção
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	die("ERROR: Não foi possível conectar." . $e->getMessage());
}

class Conexao
{

	private $usuario = 'root';
	private $senha = '';

	/**
	 * Conecta com o MySQL usando PDO
	 */
	public function conexao()
	{
		return new PDO('mysql:host=localhost;dbname=agencia; charset=utf8', $this->usuario, $this->senha);
	}

	/**
	 * Cria o hash da senha, usando MD5 e SHA-1
	 */
	public function make_hash($str)
	{
		return sha1(md5($str));
	}

	/**
	 * Verifica se o usuário está logado
	 */
	public function isLoggedIn()
	{
		if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
			return false;
		}
		return true;
	}
}

/* Credenciais do banco de dados. Supondo que você esteja executando o MySQL
servidor com configuração padrão (usuário 'root' sem senha) */

 
/* Tentativa de conexão com o banco de dados MySQL */