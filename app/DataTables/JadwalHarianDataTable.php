<?php

namespace App\DataTables;

use App\Models\Poli;
use App\Models\PoliJadwal;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class JadwalHarianDataTable extends DataTable
{
	/**
	 * Build DataTable class.
	 *
	 * @param QueryBuilder $query Results from query() method.
	 * @return \Yajra\DataTables\EloquentDataTable
	 */
	public function dataTable(QueryBuilder $query): EloquentDataTable
	{
		return (new EloquentDataTable($query))
			->addColumn('senin', function ($query) {
				$data = $query->poliJadwal()->where('hari', 'senin');
				if ($data->exists() && $data->first()->jam_kerja) {
					$senin = '<i class="fas fa-check text-success"></i>';
					// $senin = $data->first('jam_kerja_buka')->jam_kerja_buka;
					// $senin = $data->first()->jam_kerja;
				} else {
					$senin = '<i class="fas fa-xmark text-danger"></i>';
				}
				return $senin;
			})
			->addColumn('selasa', function ($query) {
				$data = $query->poliJadwal()->where('hari', 'selasa');
				if ($data->exists() && $data->first()->jam_kerja) {
					$selasa = '<i class="fas fa-check text-success"></i>';
					// $selasa = $data->first('jam_kerja_buka')->jam_kerja_buka;
					// $selasa = $data->first()->jam_kerja;
				} else {
					$selasa = '<i class="fas fa-xmark text-danger"></i>';
				}
				return $selasa;
			})
			->addColumn('rabu', function ($query) {
				$data = $query->poliJadwal()->where('hari', 'rabu');
				if ($data->exists() && $data->first()->jam_kerja) {
					$rabu = '<i class="fas fa-check text-success"></i>';
					// $rabu = $data->first('jam_kerja_buka')->jam_kerja_buka;
					// $rabu = $data->first()->jam_kerja;
				} else {
					$rabu = '<i class="fas fa-xmark text-danger"></i>';
				}
				return $rabu;
			})
			->addColumn('kamis', function ($query) {
				$data = $query->poliJadwal()->where('hari', 'kamis');
				if ($data->exists() && $data->first()->jam_kerja) {
					$kamis = '<i class="fas fa-check text-success"></i>';
					// $kamis = $data->first('jam_kerja_buka')->jam_kerja_buka;
					// $kamis = $data->first()->jam_kerja;
				} else {
					$kamis = '<i class="fas fa-xmark text-danger"></i>';
				}
				return $kamis;
			})
			->addColumn('jumat', function ($query) {
				$data = $query->poliJadwal()->where('hari', 'jumat');
				if ($data->exists() && $data->first()->jam_kerja) {
					$jumat = '<i class="fas fa-check text-success"></i>';
					// $jumat = $data->first('jam_kerja_buka')->jam_kerja_buka;
					// $jumat = $data->first()->jam_kerja;
				} else {
					$jumat = '<i class="fas fa-xmark text-danger"></i>';
				}
				return $jumat;
			})
			->addColumn('sabtu', function ($query) {
				$data = $query->poliJadwal()->where('hari', 'sabtu');
				if ($data->exists() && $data->first()->jam_kerja) {
					$sabtu = '<i class="fas fa-check text-success"></i>';
					// $sabtu = $data->first('jam_kerja_buka')->jam_kerja_buka;
					// $sabtu = $data->first()->jam_kerja;
				} else {
					$sabtu = '<i class="fas fa-xmark text-danger"></i>';
				}
				return $sabtu;
			})
			->addColumn('minggu', function ($query) {
				$data = $query->poliJadwal()->where('hari', 'minggu');
				if ($data->exists() && $data->first()->jam_kerja) {
					$minggu = '<i class="fas fa-check text-success"></i>';
					// $minggu = $data->first('jam_kerja_buka')->jam_kerja_buka;
					// $minggu = $data->first()->jam_kerja;
				} else {
					$minggu = '<i class="fas fa-xmark text-danger"></i>';
				}
				return $minggu;
			})
			->addColumn('action', function ($query) {
				$opsi = '<a class="btn btn-icon btn-primary mr-1" data-toggle="tooltip" title="Ubah" href="' . route('admin.jadwal-harian.edit', $query->id) . '">
					<i class="fas fa-pencil-alt"></i>
				</a>';
				$opsi .= '<a class="btn btn-icon btn-info" data-toggle="tooltip" title="Lihat Jam Kerja" href="' . route('admin.jadwal-harian.show', $query->id) . '">
					<i class="fas fa-eye"></i>
				</a>';

				return $opsi;
			})
			->rawColumns(['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu', 'action'])
			->setRowId('id');
	}

	/**
	 * Get query source of dataTable.
	 *
	 * @param \App\Models\JadwalHarian $model
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function query(Poli $model): QueryBuilder
	{
		return $model
			->newQuery();
	}

	/**
	 * Optional method if you want to use html builder.
	 *
	 * @return \Yajra\DataTables\Html\Builder
	 */
	public function html(): HtmlBuilder
	{
		return $this->builder()
			->setTableId('jadwalharian-table')
			->columns($this->getColumns())
			->minifiedAjax()
			//->dom('Bfrtip')
			// ->scrollX(true)
			// ->addTableClass(['whitespace-nowrap'])
			// ->addTableClass(['table-hover'])
			->orderBy(1, 'ASC');
	}

	/**
	 * Get the dataTable columns definition.
	 *
	 * @return array
	 */
	public function getColumns(): array
	{
		return [
			Column::make('action')
				->title('#')->addClass('text-center')
				->orderable(false)->searchable(false),
			Column::make('nama_poli')->addClass('align-middle'),
			Column::make('senin')->addClass('text-center align-middle')->orderable(false)->searchable(false),
			Column::make('selasa')->addClass('text-center align-middle')->orderable(false)->searchable(false),
			Column::make('rabu')->addClass('text-center align-middle')->orderable(false)->searchable(false),
			Column::make('kamis')->addClass('text-center align-middle')->orderable(false)->searchable(false),
			Column::make('jumat')->addClass('text-center align-middle')->orderable(false)->searchable(false),
			Column::make('sabtu')->addClass('text-center align-middle')->orderable(false)->searchable(false),
			Column::make('minggu')->addClass('text-center align-middle')->orderable(false)->searchable(false),
		];
	}

	/**
	 * Get filename for export.
	 *
	 * @return string
	 */
	protected function filename(): string
	{
		return 'JadwalHarian_' . date('YmdHis');
	}
}
