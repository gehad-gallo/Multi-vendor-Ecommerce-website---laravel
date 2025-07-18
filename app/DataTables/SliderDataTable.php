<?php

namespace App\DataTables;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SliderDataTable extends DataTable
{
    
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->editColumn('banner', function ($slider) {
                return '<img src="' . asset($slider->banner) . '" height="50" width="70">';

            })
            ->editColumn('status', function ($slider) {
                return $slider->status ? 'Active' : 'Inactive';
            })

            ->addColumn('action', function ($slider) {
                return view('admin.slider.partials.actions', compact('slider'))->render();
            })

            ->rawColumns(['banner', 'status', 'action']); // Must include 'action' here too

    }


    
    
    public function query(Slider $model)
    {
        return $model->newQuery()->select([
            'id',
            'banner',
            'type',
            'title',
            'starting_price',
            'btn_url',
            'serial',
            'status',
            'created_at',
        ]);
    }

    
 
    protected function getColumns()
{
    return [
       
        Column::make('banner'),
        Column::make('type'),
        Column::make('title'),
        Column::make('starting_price'),
        Column::make('btn_url'),
        Column::make('serial'),
        Column::make('status'),
        Column::make('created_at'),
        Column::computed('action')
        ->title('Actions')
        ->exportable(false)
        ->printable(false)
        ->width(120)
        ->addClass('text-center'),
    ];
}



    public function html()
    {
        return $this->builder()
            ->setTableId('sliders-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0);
    }
    

    protected function filename(): string
    {
        return 'Sliders_' . date('YmdHis');
    }

}
