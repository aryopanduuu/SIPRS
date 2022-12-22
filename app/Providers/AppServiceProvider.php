<?php

namespace App\Providers;

use Illuminate\Support\Facades\Request;
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
			if (Request::segment(1) != 'admin') {
				$menu = [
					[
						'url'      => route('home'),
						'title'    => 'Home',
						'name'     => 'home',
						'hasChild' => false
					],
					[
						'url'      => route('tentang'),
						'title'    => 'Tentang',
						'name'     => 'tentang',
						'hasChild' => false
					],
					[
						'url'      => route('poli'),
						'title'    => 'Poli',
						'name'     => 'poli',
						'hasChild' => false
					],
					[
						'url'      => route('spesialis.index'),
						'title'    => 'Spesialis',
						'name'     => 'spesialis',
						'hasChild' => true
					],
					[
						'url'      => route('dokter.index'),
						'title'    => 'Dokter',
						'name'     => 'dokter',
						'hasChild' => true
					],
					[
						'url'      => route('kontak'),
						'title'    => 'Kontak',
						'name'     => 'kontak',
						'hasChild' => false
					]
				];
			} else {
				$menu = [
					[
						'title' => 'Menu Utama',
						'role'  => 'any',
						'menu'  => [
							[
								'url'      => route('admin.index'),
								'title'    => 'Dashboard',
								'name'     => 'admin.index',
								'icon'     => 'tachometer',
								'hasChild' => false,
								'role'     => 'any',
							],
							[
								'url'         => route('admin.poli.index'),
								'title'       => 'Poli',
								'name'        => 'admin.poli.index',
								'icon'        => 'hospital-user',
								'hasChild'    => true,
								'prefixChild' => 'poli',
								'role'        => 'super_admin',
							],
							[
								'url'         => route('admin.dokter.index'),
								'title'       => 'Dokter',
								'name'        => 'admin.dokter.index',
								'icon'        => 'user-doctor',
								'hasChild'    => true,
								'prefixChild' => 'dokter',
								'role'        => 'super_admin',
							],
							[
								'url'         => route('admin.spesialis.index'),
								'title'       => 'Spesialis',
								'name'        => 'admin.spesialis.index',
								'icon'        => 'stethoscope',
								'hasChild'    => true,
								'prefixChild' => 'spesialis',
								'role'        => 'super_admin',
							],
							[
								'url'         => route('admin.poli.index'),
								'title'       => 'Jadwal',
								'name'        => null,
								'icon'        => 'calendar-day',
								'hasChild'    => true,
								'prefixChild' => 'jadwal',
								'role'        => 'super_admin',
								'hasSubMenu'  => true,
								'subMenu'     => [
									[
										'title'  => 'Harian',
										'url'    => route('admin.jadwal-harian.index'),
										'prefix' => ['jadwal', 'harian'],
									],
									[
										'title'  => 'Hari Libur',
										'url'    => '',
										'prefix' => ['jadwal', 'libur'],
									],
								],
							],
							[
								'url'         => route('admin.pendaftaran-online.index'),
								'title'       => 'Pendaftaran Online',
								'name'        => 'admin.pendaftaran-online.index',
								'icon'        => 'clipboard-list-check',
								'hasChild'    => true,
								'prefixChild' => 'pendaftaran-online',
								'role'        => 'any',
							]
						]
					],
					[
						'title' => 'Informasi Website',
						'role'  => 'super_admin',
						'menu'  => [
							[
								'url'         => route('admin.index'),
								'title'       => 'Deskripsi/SEO',
								'name'        => 'admin.seo.index',
								'icon'        => 'text',
								'hasChild'    => true,
								'prefixChild' => 'seo',
								'role'  => 'super_admin',
							],
							[
								'url'         => route('admin.kontak.index'),
								'title'       => 'Kontak',
								'name'        => 'admin.kontak.index',
								'icon'        => 'contact-book',
								'hasChild'    => true,
								'prefixChild' => 'kontak',
								'role'  => 'super_admin',
							],
						]
					],
					[
						'title' => 'Lainnya',
						'role'  => 'super_admin',
						'menu'  => [
							[
								'url'         => route('admin.admin.index'),
								'title'       => 'Admin',
								'name'        => 'admin.index',
								'icon'        => 'text',
								'hasChild'    => true,
								'prefixChild' => 'admin',
								'role'  => 'super_admin',
							],
						]
					]
				];
			}
			View::share('menu', $menu);
		});
	}
}
