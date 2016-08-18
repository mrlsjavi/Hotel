<?php


interface IORM {

	public static function getConnection();
	public static function find($id);
	public static function where($field, $value);
	public static function like($field, $value);
	public static function notwhere($field, $value);

	public static function horas($trabajador);
	public static function all($order = null);
	public function save();
	
	
	


}
