<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		Sanctum::ignoreMigrations();
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$route = $this->app->request;
		View::share('menu', [
			[
				'url'      => '',
				'title'    => 'Home',
				'name'     => 'home',
				'hasChild' => false
			],
			[
				'url' => '',
				'title' => 'Tentang',
				'name'     => 'tentang',
				'hasChild' => false
			],
			[
				'url' => '',
				'title' => 'Poli',
				'name'     => 'poli',
				'hasChild' => true
			],
			[
				'url' => '',
				'title' => 'Spesialis',
				'name'     => 'spesialis',
				'hasChild' => true
			],
			[
				'url' => '',
				'title' => 'Dokter',
				'name'     => 'dokter',
				'hasChild' => true
			],
			[
				'url' => '',
				'title' => 'Kontak',
				'name'     => 'kontak',
				'hasChild' => false
			]
		]);
	}
}
