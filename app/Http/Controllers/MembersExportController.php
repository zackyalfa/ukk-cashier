<?php

namespace App\Http\Controllers;

use App\Exports\MembersExport;
use Maatwebsite\Excel\Facades\Excel;

class MembersExportController extends Controller
{
    public function export()
    {
        return Excel::download(new ProductsExport, 'Members.xlsx');
    }
}
