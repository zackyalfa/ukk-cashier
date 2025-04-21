<?php

namespace App\Exports;

use App\Models\Member;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class MembersExport implements FromCollection, WithHeadings, WithMapping
{
    private static $counter = 1;

    /**
     * Ambil semua data member
     */
    public function collection()
    {
        return Member::all();
    }

    /**
     * Judul kolom di Excel
     */
    public function headings(): array
    {
        return [
            'No',
            'ID',
            'Kode Member',
            'Nama',
            'No. Telepon',
            'Email',
            'Alamat',
            'Tanggal Lahir',
            'Poin',
        ];
    }

    /**
     * Format data untuk setiap baris
     */
    public function map($member): array
    {
        return [
            self::$counter++,
            $member->id,
            $member->member_code,
            $member->name,
            $member->phone_number,
            $member->email,
            $member->address,
            $member->date_of_birth ? date('d-m-Y', strtotime($member->date_of_birth)) : '-',
            $member->points,
        ];
    }
}
