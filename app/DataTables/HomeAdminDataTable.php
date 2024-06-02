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
            ->addColumn('nama', function ($row) {
                return $row->profile->nama_d . ' ' . $row->profile->nama_b;
            })
            ->addColumn('nik', function ($row) {
                return $row->profile->nik;
            })
            ->addColumn('prodi', function ($row) {
                return $row->getProdiName();
            })
            ->addColumn('status', function ($row) {
                if ($row->is_verif == false) {
                    return '<span class="badge text-bg-primary">Belum Konfirmasi</span>';
                } elseif ($row->is_verif == true && $row->appendix_id == null) {
                    return
                        '<span class="badge text-bg-warning">Belum Unggah Berkas</span>';
                } elseif ($row->is_verif == true && $row->appendix_id != null && $row->is_set == false) {
                    return
                        '<span class="badge text-bg-danger">Menunggu Verifikasi</span>';
                } else {
                    return
                        '<span class="badge text-bg-success">Terverifikasi</span>';
                }
            })
            ->rawColumns(['status'])
            ->setRowId('id');
    }

    public function query(Registration $model): QueryBuilder
    {
        return $model->newQuery()->with(['profile', 'prodie']);
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('homeadmin-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(5, 'desc')
            ->parameters([
                'columnDefs' => [
                    [
                        'targets' => 0, // Kolom 'id' (urutan angka)
                        'render' => 'function (data, type, row, meta) { return meta.row + 1; }',
                    ],
                    [
                        'targets' => 5, // Index kolom 'profile.created_at'
                        'render' => 'function (data) { return moment(data).format("DD MMM YYYY");}',
                    ],
                ],
                'buttons' => [
                    'excel',
                    'csv',
                    'pdf',
                    'print', // Menambahkan tombol print
                ],
                'language' => [
                    'searchPlaceholder' => 'Cari Data', // Placeholder untuk kotak pencarian
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
            // Column::computed('action')
            //     ->exportable(true)
            //     ->printable(true)
            //     ->addClass('text-center'),
            Column::make('id')->title('No')
                ->searchable(false)
                ->orderable(false),
            Column::computed('nik')
                ->searchable(true)
                ->orderable(true)
                ->title('NIK')
                ->addClass('text-center'),
            Column::computed('nama')
                ->searchable(true)
                ->orderable(true),
            Column::make('profile.kota')->title('Alamat'),
            Column::make('profile.pend_terakhir')->title('Pend. Terakhir'),
            Column::make('profile.created_at')->title('Tgl. Registrasi'),
            Column::computed('prodi')
                ->searchable(true)
                ->orderable(true)
                ->title('Program Studi'),
            // Column::make('prodi')->title('Program Studi'),
            Column::make('jalur')->title('Jalur'),
            Column::computed('status')
                ->addClass('text-center')
                ->title('Status')
                ->width(60),
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
