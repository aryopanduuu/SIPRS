<?php

namespace App\DataTables;

use App\Models\Spesialis;
use App\Models\UserDokterSpesialis;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Str;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DokterBySpesialisDataTable extends DataTable
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
			->addColumn('action', 'dokterbyspesialis.action')
			->editColumn('userDetail.nama', function ($query) {
				return Str::limit($query->userDetail->nama, 20, $query->userDetail->nama);
			})
			->setRowId('id');
	}

	/**
	 * Get query source of dataTable.
	 *
	 * @param \App\Models\DokterBySpesiali $model
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function query(UserDokterSpesialis $model): QueryBuilder
	{
		return $model->where('spesialis_id', $this->id)
			->with('userDetail')
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
			->setTableId('dokterbyspesialis-table')
			->columns($this->getColumns())
			->minifiedAjax()
			//->dom('Bfrtip')
			->orderBy(1);
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
			Column::make('userDetail.nama')->title('Nama Dokter'),
		];
	}

	/**
	 * Get filename for export.
	 *
	 * @return string
	 */
	protected function filename(): string
	{
		return 'Dokter_Spesialis_' . date('YmdHis');
	}
}
