<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class IncomeReportExport implements FromView
{
    protected $month;
    protected $year;

    public function __construct($month, $year)
    {
        $this->month = $month;
        $this->year = $year;
    }

    public function view(): View
    {
        $month = $this->month;
        $year = $this->year;

        $reports = Order::whereMonth('created_at', $this->month)
            ->whereYear('created_at', $this->year)
            ->where('status', 'Selesai')
            ->get();

        $income = Order::whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->where('status', 'Selesai')
            ->sum('total_price');

        return view('dashboard.income-report.export', compact('reports', 'income', 'month', 'year'));
    }
}
