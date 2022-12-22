<?php

namespace App\DataTables;

use App\Models\UserBooking;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class AppointmentDataTable extends DataTable
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
			->addColumn('status_pembayaran', function ($query) {
				return $query->payment_status ? '<i class="far fa-check text-success"></i>' : '<i class="far fa-xmark text-danger"></i>';
			})
			->addColumn('action', function ($query) {
				$opsi = '<a class="btn btn-icon btn-primary mr-1" data-toggle="tooltip" title="Ubah" href="' . route('admin.pendaftaran-online.edit', $query->id) . '">
						<i class="fas fa-pencil-alt"></i>
					</a>';
				$opsi .= '<a class="btn btn-icon btn-info" data-toggle="tooltip" title="Lihat Invoice" href="' . route('admin.pendaftaran-online.show', $query->kode_antrian) . '">
						<i class="fas fa-receipt"></i>
					</a>';

				return $opsi;
			})
			->editColumn('created_at', function ($query) {
				return Carbon::parse($query->created_at)->locale('id-ID')->translatedFormat('l, d F Y H:i');
			})
			->setRowId('id')
			->rawColumns(['status_pembayaran', 'action']);
	}

	/**
	 * Get query source of dataTable.
	 *
	 * @param \App\Models\Appointment $model
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function query(UserBooking $model): QueryBuilder
	{
		return $model
			->join('users', 'user_bookings.user_id', '=', 'users.id')
			->join('users as d', 'user_bookings.dokter_id', '=', 'd.id')
			->join('polis', 'user_bookings.poli_id', '=', 'polis.id')
			->select('user_bookings.*', 'users.nama as pasien', 'd.nama as dokter', 'polis.nama_poli as poli')
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
			->setTableId('appointment-table')
			->columns($this->getColumns())
			->minifiedAjax()
			//->dom('Bfrtip')
			->scrollX(true)
			->addTableClass(['whitespace-nowrap'])
			->orderBy(6);
	}

	/**
	 * Get the dataTable columns definition.
	 *
	 * @return array
	 */
	public function getColumns(): array
	{
		return [
			Column::computed('action', '#')
				->printable(false)
				->exportable(false)
				->addClass('text-center'),
			Column::make('kode_antrian'),
			Column::make('nomor_antrian'),
			Column::make('pasien'),
			Column::make('dokter'),
			Column::make('poli'),
			Column::make('tgl_periksa')->title('Tanggal Periksa'),
			Column::make('perkiraan_jam')
				->addClass('text-center'),
			Column::make('created_at')->title('Tanggal Transaksi'),
			Column::make('status_pembayaran')
				->addClass('text-center')
				->searchable(false),
		];
	}

	/**
	 * Get filename for export.
	 *
	 * @return string
	 */
	protected function filename(): string
	{
		return 'Appointment_' . date('YmdHis');
	}
}
