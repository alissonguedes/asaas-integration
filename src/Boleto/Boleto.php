<?php
namespace AlissonGuedes\AsaasIntegration\Boleto;

use AlissonGuedes\AsaasIntegration\Asaas;

class Boleto {

	private $asaas;

	public function __construct() {
		$this->asaas = new Asaas;
	}

	public function get(string $id = '', string $resource = 'billingInfo', int $offset = 0, int $limit = 10): array | bool {
		$get = Asaas::get("payments/{$id}/{$resource}");
		// if ($get['totalCount'] > 0) {
		// 	return $get['data'];
		// }
		// return false;
		return $get;
	}

	public function create(array $data): array | bool {
		$created = Asaas::create('payments', $data);
		if ($created) {
			return $created;
		}
		return false;
	}

	public function update(array $data): array {
		return Asaas::update('payments', $data);
	}

	public function delete(array $data) {
		return Asaas::delete('payments', $data);
	}

	public function restore(string $id) {
		return Asaas::post('/payments/' . $id . '/restore');
	}

}
