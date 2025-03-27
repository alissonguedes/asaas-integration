<?php
namespace AlissonGuedes\AsaasIntegration;

use AlissonGuedes\AsaasIntegration\AsaasHttpInterface;
use Illuminate\Support\Facades\Http;

class AsaasService implements AsaasHttpInterface
{

	protected string $apiKey;
	protected string $baseUrl;
	protected string $production;
	protected string $version;

	public function __construct()
	{
		$this->version    = config('asaas.version');
		$this->production = config('asaas.enviroment') !== 'sandbox';
		$this->baseUrl    = config('asaas.url') . '/' . config('asaas.version') . '/';
		$this->apiKey     = config('asaas.api_key');
	}

	public function get(string $endpoint, array $queryParams = []): array
	{
		return $this->request('GET', $endpoint, $queryParams);
	}

	public function post(string $endpoint, array $queryParams = []): array
	{
		return $this->request('POST', $endpoint, $queryParams);
	}

	public function put(string $endpoint, array $queryParams = []): array
	{
		return $this->request('PUT', $endpoint, $queryParams);
	}

	public function delete(string $endpoint): array
	{
		return $this->request('DELETE', $endpoint);
	}

	public function request(string $method, string $endpoint, array $data = []): array
	{
		$response = Http::withHeaders($this->headers())->{$method}($this->baseUrl . $endpoint, $data);
		return $this->handleResponse($response);
	}

	protected function headers(): array
	{
		return [
			'accept'       => 'application/json',
			'content-type' => 'application/json',
			'access_token' => $this->apiKey,
		];
	}

	protected function handleResponse($response): array
	{
		if ($response->successful()) {
			return $response->json();
		}

		return [
			'error'   => true,
			'status'  => $response->status(),
			'message' => $response->json()['message'] ?? 'Unknown error',
		];
	}
}
