<?php

namespace App\Http\Controllers;

use App\Export\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class usersExportExcel extends Controller
{
    public function export()
    {
        return Excel::download(new UsersExport, 'Users.xlsx');
    }
}
