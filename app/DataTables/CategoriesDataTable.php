<?php

namespace App\DataTables;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CategoriesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->editColumn("created_at", function($query){
                return date("Y-m-d", strtotime($query->created_at));
            })
            ->editColumn("image", function($query){
                if($query->image){
                    $img = '<a href="'.asset('assets/wolpin_media/categories/' . $query->image).'" target="_blank">View File</a>';
                }else{
                    $img = null;
                }
                return $img;
            })
            ->editColumn("video", function($query){
                if($query->video){
                    $img = '<a href="'.asset('assets/wolpin_media/categories/' . $query->video).'" target="_blank">View File</a>';
                } else{
                    $img = null;
                }
                return $img;
            })

            ->editColumn("banner_image", function($query){
                if($query->banner_image){
                    $img = '<a href="'.asset('assets/wolpin_media/categories/' . $query->banner_image).'" target="_blank">View File</a>';
                } else{
                    $img = null;
                }
                return $img;
            })
            ->addColumn('parent_category', function ($query) {
                return $query->parentCategory ? $query->parentCategory->name : 'N/A';
            })
            ->addColumn('action', function($query){
                return view('pages.categories.columns.action', compact("query"));
            })
            ->rawColumns(['action', 'image', 'video', 'banner_image'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Category $model): QueryBuilder
    {
        return $model->newQuery()
        ->with('parentCategory')
        ->latest();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('categories-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->addTableClass('table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-gray-600 fw-semibold')
                    ->setTableHeadClass('text-start text-muted fw-bold fs-7 text-uppercase gs-0')
                    ->orderBy([3, "desc"]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('DT_RowIndex') // Serial Number Column
              ->title('#') // Column Title
              ->searchable(false)
              ->orderable(false)
              ->width(30)
              ->addClass('text-center'),
            // Column::make('id'),
            Column::make('name'),
            Column::make('parent_category') // Add this column
            ->title('Parent Category'), // Set column title
            Column::make('image'),
            Column::make('video'),
            Column::make('banner_image')->title("Banner Image"),
            Column::make('created_at'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Categories_' . date('YmdHis');
    }
}
