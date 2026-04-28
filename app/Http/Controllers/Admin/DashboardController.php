<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Role;
use App\Http\Controllers\Controller;
use App\Models\PriceList;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Function to show admin dashboard view - Modern Dashboard
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request): View
    {
        $currentMonth = $request->input('month', date('m'));
        $currentYear = $request->input('year', date('Y'));

        $user = Auth::user();

        // Dashboard statistics
        $membersCount = User::where('role', 2)->count();
        $transactionsCount = Transaction::count();
        $monthlyRevenue = Transaction::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->sum('total');
        $pendingTransactions = Transaction::where('finish_date', null)->count();

        // Transactions data
        $ongoingTransactions = Transaction::with('member')->whereYear('created_at', '=', $currentYear)
            ->whereMonth('created_at', '=', $currentMonth)
            ->where('service_type_id', 1)
            ->where('finish_date', null)
            ->orderBy('created_at', 'DESC')
            ->get();

        $ongoingPriorityTransactions = Transaction::with('member')->whereYear('created_at', '=', $currentYear)
            ->whereMonth('created_at', '=', $currentMonth)
            ->where('service_type_id', 2)
            ->where('finish_date', null)
            ->orderBy('created_at', 'DESC')
            ->get();

        $finishedTransactions = Transaction::with('member')->whereYear('created_at', '=', $currentYear)
            ->whereMonth('created_at', '=', $currentMonth)
            ->where('finish_date', '!=', null)
            ->orderBy('created_at', 'DESC')
            ->get();

        // Members data
        $members = User::where('role', 2)->get();

        // Price lists data
        $priceList = PriceList::with(['service', 'item'])->get();
        $satuan = $priceList->filter(function (PriceList $value, $key) {
            return $value->category_id == 1;
        })->all();
        $kiloan = $priceList->filter(function (PriceList $value, $key) {
            return $value->category_id == 2;
        })->all();

        // Vouchers data
        $vouchers = Voucher::all();

        // Reports data
        $years = Transaction::selectRaw('YEAR(created_at) as Tahun')->distinct()->get();

        return view('admin.dashboard', compact(
            'user',
            'membersCount',
            'transactionsCount',
            'monthlyRevenue',
            'pendingTransactions',
            'ongoingTransactions',
            'ongoingPriorityTransactions',
            'finishedTransactions',
            'members',
            'satuan',
            'kiloan',
            'vouchers',
            'years'
        ));
    }
}
