<?php
namespace AlissonGuedes\AsaasIntegration\Customers;

use AlissonGuedes\AsaasIntegration\Asaas;

class Customers {

	private $asaas;

	public function __construct() {
		$this->asaas = new Asaas;
	}

	public function get(string $cpfCnpj = '', int $offset = 0, int $limit = 10): array | bool {
		$get = Asaas::get('customers', ['cpfCnpj' => $cpfCnpj]);
		if ($get['totalCount'] > 0) {
			return $get['data'];
		}
		return false;
	}

	public function create(array $data): array | bool {
		$created = Asaas::create('customers', $data);
		if ($created) {
			return $created;
		}
		return false;
	}

	public function update(array $data): array {
		return Asaas::update('customers', $data);
	}

	public function delete(array $data) {
		return Asaas::delete('customers', $data);
	}

}
