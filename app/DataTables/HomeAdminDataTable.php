<?php

namespace App\DataTables;

use App\Models\Registration;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class HomeAdminDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'homeadmin.action')
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Registration $model): QueryBuilder
    {
        return $model->newQuery()->with('profile');
    }
    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('homeadmin-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(3, 'desc')
            ->parameters([
                'columnDefs' => [
                    [
                        'targets' => 1, // Kolom 'id' (urutan angka)
                        'render' => 'function (data, type, row, meta) { return meta.row + 1; }', // Render urutan angka
                    ],
                    [
                        'targets' => 3, // Index kolom 'profile.created_at'
                        'render' => 'function (data) { return moment(data).format("DD MMMM YYYY"); }',
                    ],
                ],
                'buttons' => [
                    'excel',
                    'csv',
                    'pdf',
                    'print', // Menambahkan tombol print
                ],
            ])
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                // Button::make('reset'),
                // Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {

        return [
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
            Column::make('id')->title('No')
                ->searchable(false)
                ->orderable(false),
            Column::make('profile.nama_d'),
            Column::make('profile.created_at')
                ->title('Registration Date'),
            Column::make('kode_prodi')
                ->title('Program Studi'),
            Column::make('jalur')
                ->title('Jalur'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'HomeAdmin_' . date('YmdHis');
    }
}
