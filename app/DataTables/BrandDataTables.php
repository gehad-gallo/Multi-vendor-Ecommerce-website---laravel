<?php

namespace App\DataTables;

use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use App\Models\Brand;

class BrandDataTables extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('logo', function ($brand) {
                return '<img src="' . asset($brand->logo) . '" height="50" width="70">';

            })
            ->addColumn('action', 'branddatatables.action')

            ->rawColumns(['action', 'status', 'logo', 'is_featured']) // allow HTML rendering

            ->addColumn('action', function ($brand) {
                return view('admin.brands.partials.actions', compact('brand'))->render();
            })
            ->addColumn('is_featured', function ($brand) {
                return view('admin.brands.partials.is_featured', compact('brand'))->render();
            })
            ->addColumn('status', function ($brand) {
                return view('admin.brands.partials.status', compact('brand'))->render();
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    
    public function query(Brand $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('branddatatables-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            
            Column::make('name')->with(200),
            Column::make('logo'),
            Column::make('slug'),
            Column::make('is_featured'),
            Column::make('status'),
            Column::computed('action')
              ->exportable(false)
              ->printable(false)
              ->width(100)
              ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'BrandDataTables_' . date('YmdHis');
    }
}
