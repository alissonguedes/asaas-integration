<?php
namespace AlissonGuedes\AsaasIntegration\Customers;

use AlissonGuedes\AsaasIntegration\Asaas;

class Customers {

	private $asaas;

	public function __construct() {
		$this->asaas = new Asaas;
	}

	public function get(array $data = [], int $offset = 0, int $limit = 10): array {
		return Asaas::get('customers', $data);
	}

	public function create(array $data): array {
		return Asaas::create('customers', $data);
	}

	public function update(array $data): array {
		return Asaas::update('customers', $data);
	}

	public function delete(array $data) {
		return Asaas::delete('customers', $data);
	}

}