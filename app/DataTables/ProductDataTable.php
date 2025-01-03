<?php

namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
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
            ->addColumn('parent_category', function ($query) {
                // return $query->parentCategory ? $query->parentCategory->name : 'N/A'; // Display the parent category name
                return $query->color ? $query->color->name : 'N/A'; // Display the color name
            })
            ->addColumn('category', function ($query) {
                // return $query->categories->map(function ($category) {
                //     return $category->name;
                // })->implode(', '); // Display the category names
                return $query->color ? $query->color->name : 'N/A'; // Display the color name
            })
            ->addColumn('color', function ($query) {
                return $query->color ? $query->color->name : 'N/A'; // Display the color name
            })
            ->addColumn('tags', function ($query) {
                return $query->tags->map(function ($tag) {
                    return $tag->name;
                })->implode(', '); // Display the tag names
            })
            ->editColumn('created_at', function ($query) {
                return $query->created_at->format('Y-m-d');
            })
            ->addColumn('action', function($query) {
                return view('pages.product.columns.action', compact("query"));
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->newQuery()
            ->with(['color', 'categories.parentCategory', 'tags']); // Eager load categories and their parentCategory
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('product-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->addTableClass('table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-gray-600 fw-semibold')
                    ->setTableHeadClass('text-start text-muted fw-bold fs-7 text-uppercase gs-0')
                    ->orderBy([0, "desc"]);
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
            Column::make('title'),
            Column::make('color')
                ->title('Color'),
                Column::make('parent_category')
                ->title('Parent Category'),
            Column::make('category')
                ->title('Categories'),
            Column::make('tags')
                ->title('Tags'),
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
        return 'Product_' . date('YmdHis');
    }
}
