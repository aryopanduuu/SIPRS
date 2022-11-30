<?php

namespace App\DataTables;

use App\Models\User;
use App\Models\UserDokter;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DokterDataTable extends DataTable
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
			->editColumn('foto', function ($query) {
				if ($query->dokter->foto) {
					return '<img src="/assets/img/' . $query->dokter->foto . '" alt="avatar" width="30" class="rounded-circle">';
				} else {
					return '-';
				}
			})
			->addColumn('action', function ($query) {
				$opsi = '<a class="btn btn-icon btn-primary mr-1" data-toggle="tooltip" title="Ubah" href="' . route('admin.dokter.edit', $query->id) . '">
						<i class="fas fa-pencil-alt"></i>
					</a>';
				$opsi .= '<a class="btn btn-icon btn-info" data-toggle="tooltip" title="Spesialis Dokter" href="' . route('admin.dokter.spesialis.index', $query->id) . '">
						<i class="fas fa-stethoscope"></i>
					</a>';

				return $opsi;
			})
			->filterColumn('nip', function ($query, $keyword) {
				$query->whereRaw("nip like ?", ["%{$keyword}%"]);
			})
			->filterColumn('nama_poli', function ($query, $keyword) {
				$query->whereRaw("nama_poli like ?", ["%{$keyword}%"]);
			})
			->setRowId('id')
			->rawColumns(['foto', 'action']);;
	}

	/**
	 * Get query source of dataTable.
	 *
	 * @param \App\Models\Dokter $model
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function query(User $model): QueryBuilder
	{
		return $model
			->join('user_dokters', 'user_dokters.user_id', '=', 'users.id')
			->join('user_dokter_polis', 'user_dokter_polis.user_id', '=', 'users.id')
			->join('polis', 'user_dokter_polis.poli_id', '=', 'polis.id')
			->select('users.id', 'users.nama', 'user_dokters.nip', 'user_dokters.foto', 'polis.nama_poli')
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
			->setTableId('dokter-table')
			->columns($this->getColumns())
			->minifiedAjax()
			//->dom('Bfrtip')
			->orderBy(3, 'ASC');
	}

	/**
	 * Get the dataTable columns definition.
	 *
	 * @return array
	 */
	public function getColumns(): array
	{
		return [
			Column::computed('no', 'No')
				->printable(false)
				->exportable(false)
				->addClass('text-center')
				->renderRaw('function (data, type, row, meta) {return meta.row + 1;}'),
			Column::make('foto')
				->searchable(false)
				->orderable(false),
			Column::make('nip')->title('NIP'),
			Column::make('nama')->title('Nama Dokter'),
			Column::make('nama_poli')->title('Poli'),
			Column::computed('action', '#')
				->printable(false)
				->exportable(false)
				->addClass('text-center'),
		];
	}

	/**
	 * Get filename for export.
	 *
	 * @return string
	 */
	protected function filename(): string
	{
		return 'Dokter_' . date('YmdHis');
	}
}
