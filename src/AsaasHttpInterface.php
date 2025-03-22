<?php

namespace AlissonGuedes\AsaasIntegration;

interface AsaasHttpInterface {
 
	public static function get(string $endpoint, array $queryParams = []): array;

	public static function post(string $endpoint, array $data): array;

	public static function put(string $endpoint, array $data): array;

	public static function delete(string $endpoint): array;

}
