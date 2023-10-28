<?php

namespace App\Db;

use \PDO;
use \PDOException;

class Database{

	private $host = 'localhost';
	private $name = 'vaga';
	private $user = 'root';
	private $pass = '';

	private $table;
	private $connection;

	public function __construct($table = null) {
		$this->table = $table;
		
		$this->setConnection();
	}

	private function setConnection() {
		try{
			$this->connection = new PDO('mysql:host='. $this->host. ';dbname='. $this->name, $this->user, $this->pass);
			$this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e){
			die('Erro capturado:' .$e->getMessage());
		}
	}

	//METODO RESPONSAVEL POR EXECUTAR QUERY DENTRO DO BANCO DE DADOS
	public function execute($query, $params = []) {
		try{
			
			$statement = $this->connection->prepare($query);
			$statement->execute($params);
			return $statement;
		} catch (PDOException $e) {
			die('Mensagem de erro: ' .$e->getMessage());
		}
	}

	//METODO RESPONSAVEL POR INSERIR DADOS NO BANCO
	public function insert($values) {
		//DADOS DA QUERY
		$fields = array_keys($values);
		$binds = array_pad([], count($values), '?');
		$value = array_values($values);

		//QUERY PRONTA
		$query = 'INSERT INTO '.$this->table.' ('.implode(',', $fields).') VALUES ('.implode(',',$binds).')';
		
		
		//EXECUCAO DA QUERY
		$test = $this->execute($query, $value);

		//RETORNA UM ID INSERIDO
		return $this->connection->lastInsertId();
	}

	public function select($where = null, $order = null, $limit = null, $fields = '*') {
		//DADOS DA QUERY
		$where = strlen($where) ? 'WHERE '.$where : '';
		$order = strlen($order) ? 'ORDER BY '.$order : '';
		$limit = strlen($limit) ? 'LIMIT '. $limit : '';

		//MONTAR A QUERY
		$query = 'SELECT'.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;
		
		//Executar a a query
		return $this->execute($query);
	}

}
