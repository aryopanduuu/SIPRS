<?php

namespace App\DataTables;

use App\Models\UserDokterSpesialis;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Collective\Html\FormFacade as Form;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class SpesialisOfDokterDataTable extends DataTable
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
			->addColumn('action', function ($query) {
				$opsi = Form::open(['route' => ['admin.dokter.spesialis.destroy', [$this->id, $query->spesialis_id]], 'method' => 'delete']);
				$opsi .= '<button class="btn btn-icon btn-danger delete" data-toggle="tooltip" title="Hapus">
						<i class="fas fa-trash"></i>
					</button>';
				$opsi .= Form::close();

				return $opsi;
			})
			->filterColumn('gelar', function ($query, $keyword) {
				$query->whereRaw("gelar like ?", ["%{$keyword}%"]);
			})
			->filterColumn('gelar_singkatan', function ($query, $keyword) {
				$query->whereRaw("gelar_singkatan like ?", ["%{$keyword}%"]);
			})
			->setRowId('id');
	}

	/**
	 * Get query source of dataTable.
	 *
	 * @param \App\Models\SpesialisOfDokter $model
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function query(UserDokterSpesialis $model): QueryBuilder
	{
		return $model->where('user_id', $this->id)
			->join('spesialis', 'user_dokter_spesialis.spesialis_id', '=', 'spesialis.id')
			->select('user_dokter_spesialis.user_id', 'user_dokter_spesialis.spesialis_id', 'spesialis.gelar', 'spesialis.gelar_singkatan')
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
			->setTableId('spesialisofdokter-table')
			->columns($this->getColumns())
			->minifiedAjax()
			//->dom('Bfrtip')
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
			Column::computed('no', 'No')
				->printable(false)
				->exportable(false)
				->addClass('text-center')
				->renderRaw('function (data, type, row, meta) {return meta.row + 1;}'),
			Column::make('gelar'),
			Column::make('gelar_singkatan'),
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
		return 'SpesialisOfDokter_' . date('YmdHis');
	}
}
