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

class WaitingVerifDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('nama', function ($row) {
                return $row->profile->nama_d . ' ' . $row->profile->nama_b;
            })
            ->addColumn('noReg', function ($row) {
                return $row->noReg();
            })
            ->addColumn('prodi', function ($row) {
                return $row->getProdiName();
            })
            ->addColumn('status', function ($row) {
                if ($row->is_verif == false) {
                    return 'Belum Konfirmasi';
                } elseif ($row->is_verif == true && $row->appendix_id == null) {
                    return 'Belum Unggah Berkas';
                } elseif ($row->is_verif == true && $row->appendix_id != null && $row->is_set == false) {
                    return 'Menunggu Verifikasi';
                } else {
                    return 'Sudah Verifikasi';
                }
            })
            ->addColumn(
                'action',
                function ($row) {
                    $id = $row->appendix_id;
                    $nama = $row->profile->nama_d . ' ' . $row->profile->nama_b;
                    $prodi = $row->getProdiName();
                    $jalur = $row->jalur;
                    $ktp = $row->appendix->ktp;
                    $totalBiaya = $row->reg_fee + $row->pendaftaran_fee;

                    return '<button class="btn btn-sm btn-primary" onclick="openModal(\'' . $totalBiaya . '\', \'' . $nama . '\', \'' . $prodi . '\', \'' . $jalur . '\' , \'' . $id . '\', \'' . $ktp . '\')">Show</button>';
                }
            )

            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Registration $model): QueryBuilder
    {
        $query = $model->newQuery();
        $query->with(['profile', 'prodie', 'appendix']);
        $query->where('is_verif', true)
            ->where('is_set', false)
            ->whereNotNull('appendix_id');

        return $query;
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
            ])
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {

        return [
            Column::make('id')->title('No')
                ->searchable(false)
                ->orderable(false),
            Column::computed('noReg')
                ->searchable(true)
                ->orderable(true)
                ->title('No. Reg')
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
            Column::computed('action')
                ->title('show')
                ->addClass('text-center')
                ->width(60),
        ];
    }

    protected function filename(): string
    {
        return 'HomeAdmin_' . date('YmdHis');
    }
}
