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
            ->editColumn("featured_image", function($query){
                $img = '<img src="'.asset('assets/wolpin_media/products/featured_images/' . $query->featured_image).'" alt="Featured Image" height="50">';
                return $img;
            })
            ->editColumn('product_type', function ($query) {
                return $query->product_type == "simple" ? "Simple" : "Variable";
            })
            ->editColumn('category', function ($query) {
                return $query->categories->pluck('name')->implode(', ');
            })
            ->editColumn('status', function ($query) {
                $statusLabels = [
                    'draft' => ['label' => 'Draft', 'class' => 'badge-light-warning'],
                    'publish' => ['label' => 'Publish', 'class' => 'badge-light-success'],
                ];
                $status = $query->status;
                $statusLabel = $statusLabels[$status]['label'] ?? 'Unknown';
                $badgeClass = $statusLabels[$status]['class'] ?? 'badge-light-secondary';
                return '<span class="badge ' . $badgeClass . '">' . $statusLabel . '</span>';
            })
            ->editColumn('created_at', function ($query) {
                return $query->created_at->format('Y-m-d');
            })
            ->addColumn('action', function($query) {
                return view('pages.product.columns.action', compact("query"));
            })
            ->rawColumns(['status', 'featured_image'])
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
                    ->orderBy([9, "desc"]);
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
            Column::make('featured_image'),
            Column::make('sku'),
            Column::make('title'),
            Column::make('product_type')->title("Product Type"),
            Column::make('category')->title('Categories'),
            Column::make('price')->title('Price'),
            Column::make('sale_price')->title('Sale Price'),
            Column::make('status')->title('Status'),
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
