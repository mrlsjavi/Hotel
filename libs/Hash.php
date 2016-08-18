<?php

class Hash {

	/*
		$algo, es el algoritmo
		$data what a want to encode
		$salt the salt it should be the same through the system
		return es un string con el hashed and salted data
	*/

	public static function create($algo, $data, $salt){//algo es algoritmo
		//algo = md5, option =  hash
		$context = hash_init($algo, HASH_HMAC, $salt);
		hash_update($context, $data);

		return hash_final($context);
	}
}