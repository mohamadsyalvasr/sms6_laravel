<?php
namespace App\Exports;
use App\Mahasiswa;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class MahasiswaReport implements FromView
{
    use Exportable;

    public function view(): View
    {
        return view('pages.export', [
            'users' => Mahasiswa::all()
        ]);
    }
}
