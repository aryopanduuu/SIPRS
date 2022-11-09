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
		$this->app->register(RouteServiceProvider::class);
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->app->booted(function () {
			View::share('menu', [
				[
					'url'      => route('home'),
					'title'    => 'Home',
					'name'     => 'home',
					'hasChild' => false
				],
				[
					'url' => route('tentang'),
					'title' => 'Tentang',
					'name'     => 'tentang',
					'hasChild' => false,
					'subMenu'  => [
						[
							'url' =>  route('tentang'),
							'title' => 'Visi & Misi',
						]
					]
				],
				[
					'url' => route('poli'),
					'title' => 'Poli',
					'name'     => 'poli',
					'hasChild' => true
				],
				[
					'url' =>  route('spesialis'),
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
		});
	}
}
