<?php
abstract class Model
{
	protected $db = null;
		
	public function __construct(PDO $db){
		$this->db = $db;
	}

}