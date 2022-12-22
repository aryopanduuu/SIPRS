<?php

namespace App\DataTables;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class AdminDataTable extends DataTable
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
				$opsi = '<a class="btn btn-icon btn-primary mr-1" data-toggle="tooltip" title="Ubah" href="' . route('admin.admin.edit', $query->id) . '">
						<i class="fas fa-pencil-alt"></i>
					</a>';
				return $opsi;
			})
			->editColumn('role', function ($query) {
				return $query->role == 'super_admin' ? 'Super Admin' : 'Admin';
			})
			->setRowId('id');
	}

	/**
	 * Get query source of dataTable.
	 *
	 * @param \App\Models\Admin $model
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function query(Admin $model): QueryBuilder
	{
		return $model
			->where('username', '!=', auth()->user()->username)
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
			->setTableId('admin-table')
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
			Column::make('username'),
			Column::make('role'),
			Column::computed('action', '#')
				->printable(false)
				->exportable(false)
				->addClass('text-center')
		];
	}

	/**
	 * Get filename for export.
	 *
	 * @return string
	 */
	protected function filename(): string
	{
		return 'Admin_' . date('YmdHis');
	}
}
