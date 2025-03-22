<?php
namespace AlissonGuedes\AsaasIntegration;

use AlissonGuedes\AsaasIntegration\AsaasService;

class Asaas {

	private static $asaas;

	public function __construct() {
		self::$asaas = new AsaasService();
	}

	public static function get($endpoint, $data) {
		return self::$asaas->get($endpoint, $data);
	}

	public static function create($endpoint, $data) {
		return self::$asaas->post($endpoint, $data);
	}

	public static function update($endpoint, $data) {
		return self::$asaas->put($endpoint, $data);
	}

	public static function delete($endpoint) {
		return self::$asaas->delete($endpoint);
	}

}
