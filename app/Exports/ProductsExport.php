<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductsExport implements FromCollection, WithHeadings, WithMapping
{
    private static $counter = 1;

    public function collection()
    {
        return Product::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'ID Produk',
            'Nama Produk',
            'Gambar',
            'Jumlah Stok',
            'Harga',
        ];
    }

    public function map($product): array
    {
        return [
            self::$counter++,
            $product->id,
            $product->name,
            $product->image,
            $product->quantity,
            'Rp ' . number_format($product->price, 0, ',', '.'),
        ];
    }
}
