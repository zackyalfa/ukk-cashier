<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, WithHeadings, WithMapping
{
    private static $counter = 1;

    /**
     * Ambil semua data user
     */
    public function collection()
    {
        return User::all();
    }

    /**
     * Judul kolom di Excel
     */
    public function headings(): array
    {
        return [
            'No',
            'ID',
            'Nama',
            'Email',
            'Role',
            'Email Terverifikasi',
            'Dibuat Pada'
        ];
    }

    /**
     * Format data untuk setiap baris
     */
    public function map($user): array
    {
        return [
            self::$counter++,
            $user->id,
            $user->name,
            $user->email,
            $user->role,
            $user->email_verified_at ? $user->email_verified_at->format('d-m-Y H:i') : 'Belum Terverifikasi',
            $user->created_at->format('d-m-Y H:i'),
        ];
    }
}
