<?php
namespace AlissonGuedes\AsaasIntegration;

use Illuminate\Support\ServiceProvider;

class AsaasServiceProvider extends ServiceProvider {

	public function register(): void {
		$this->mergeConfigFrom(__DIR__ . '/../config/asaas.php', 'asaas');
		$this->app->singleton('asaas', function ($app) {
			return new AsaasService();
		});
	}

	public function boot(): void {
		$this->publishes([__DIR__ . '/../config/asaas.php' => config_path('asaas.php')], 'asaas-config');
	}

}
