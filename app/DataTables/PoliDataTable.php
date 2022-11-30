<?php

namespace App\DataTables;

use App\Models\Poli;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PoliDataTable extends DataTable
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
				$opsi = '<a class="btn btn-icon btn-primary" data-toggle="tooltip" title="Ubah" href="' . route('admin.poli.edit', $query->id) . '">
						<i class="fas fa-pencil-alt"></i>
					</a>';

				return $opsi;
			})
			->setRowId('id');
	}

	/**
	 * Get query source of dataTable.
	 *
	 * @param \App\Models\Poli $model
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function query(Poli $model): QueryBuilder
	{
		return $model->newQuery();
	}

	/**
	 * Optional method if you want to use html builder.
	 *
	 * @return \Yajra\DataTables\Html\Builder
	 */
	public function html(): HtmlBuilder
	{
		return $this->builder()
			->setTableId('poli-table')
			->columns($this->getColumns())
			->minifiedAjax()
			//->dom('Bfrtip')
			->orderBy(1, 'ASC')
			->pageLength(5)
			->buttons([
				Button::make('excel'),
				Button::make('csv'),
				Button::make('pdf'),
				Button::make('print'),
			]);
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
			Column::make('nama_poli'),
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
		return 'Poli_' . date('YmdHis');
	}
}
