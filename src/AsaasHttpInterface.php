<?php
namespace AlissonGuedes\AsaasIntegration;

interface AsaasHttpInterface {

	public function get(string $endpoint, array $queryParams = []): array;

	public function post(string $endpoint, array $data): array;

	public function put(string $endpoint, array $data): array;

	public function delete(string $endpoint): array;

}
