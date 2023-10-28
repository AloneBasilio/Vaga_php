<?php

namespace App\Entity;

use \PDO;
use \App\Db\Database;

class Vaga{

	public $id;
	public $titulo;
	public $descricao;
	public $ativo;
	public $data;

	//CADASTRO
	public function cadastrar() {
		//DEFINIR A HORA
		$this->data = date('Y-m-d H-i-s');
		
		//INSERIR NO BANCO
		$obDatabase = new Database('vaga');
		$this->id = $obDatabase->insert([
			'titulo' => $this->titulo,
			'descricao' => $this->descricao,
			'ativo' => $this->ativo,
			'data' => $this->data
		]);
		
		return true;
	}

	//METODO RESPONSAVEL POR OBTER AS VAGA DO BANCO DE  DADOS
	public static function getVagas($where = null, $order = null, $limit = null) {
		return (new Database('vaga'))->select($where, $order, $limit)
					      ->fetchAll(PDO::FETCH_CLASS, self::class);
	}
	
	//METODO RESPONSAVEL POR BUSCAR UMA VAGA ATRAVES DO ID
	public static function getVaga($id){
		return (new Database('vaga'))->select('id = '.$id)
					     ->fetchObject(self::class);
	}
	//METHODS GETTERS
	public function getId() {
		return $this->id;
	}
	public function getTitle() {
		return $this->titulo;
	}
	public function getDescription() {
		return $this->descricao;
	}
	public function getAction() {
		return $this->ativo;
	}
	public function getData() {
		return $this->data;
	}

	//METHODS SETTERS
	public function setTitle($title) {
		$this->titulo = $title;
	}
	public function setDescription($description) {
		$this->descricao = $description;
	}
	public function setAction($action) {
		$this->ativo = $action;
	}

}
