<?php
abstract class Model
{
	protected $table = null;
	protected $db    = null;
		
	public function __construct(PDO $db){
		$this->db = $db;
	}
}