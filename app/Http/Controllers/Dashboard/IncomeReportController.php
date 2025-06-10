<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\IncomeReportExport;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class IncomeReportController extends Controller
{
    public function index(Request $request)
    {
        $month = $request->input('month', now()->month);
        $year = $request->input('year', now()->year);

        $income = Order::whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->where('status', 'Selesai')
            ->sum('total_price');

        return view('dashboard.income-report.index', compact('income', 'month', 'year'));
    }

    public function export(Request $request)
    {
        $month = $request->input('month', now()->month());
        $year = $request->input('year', now()->year());

        return Excel::download(new IncomeReportExport($month, $year), 'income_report_' . $month . '_' . $year . '.xlsx');
    }
}
