<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;

class ProductsExportExcel extends Controller
{
    public function export()
    {
        return Excel::download(new ProductsExport, 'product.xlsx');
    }
}
