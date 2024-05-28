<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function importexcel(Request $request)
    {
        Excel::import(new UsersImport, $request->file('file'));
        return redirect('/dashboard/posts')->with('succes' , 'All good!');
    }

    public function exportexcel()
    {    
        return Excel::download(new UsersExport, 'post-'.Carbon::now()->timestamp.' .xlsx');
    }
}
