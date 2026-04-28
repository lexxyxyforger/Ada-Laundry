<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\PriceListController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\Transaction\TransactionController;
use App\Http\Controllers\Admin\VoucherController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Profile\ProfilePasswordController;
use App\Http\Controllers\Profile\ProfilePhotoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home route
Route::get('/', function () {
    return view('landing');
})->middleware('language');

// Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('islogin');

// Admin routes
Route::prefix('admin')->middleware('islogin')->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('admin.index');

    // Transactions
    Route::get('transactions/create', [TransactionController::class, 'create'])->name('admin.transactions.create');
    Route::post('transactions', [TransactionController::class, 'store'])->name('admin.transactions.store');
    Route::get('transactions', [TransactionController::class, 'index'])->name('admin.transactions.index');

    // Members
    Route::get('members', [MemberController::class, 'index'])->name('admin.members.index');

    // Price Lists
    Route::get('price-lists', [PriceListController::class, 'index'])->name('admin.price-lists.index');
    Route::post('price-lists', [PriceListController::class, 'store'])->name('admin.price-lists.store');
    Route::patch('price-lists/{priceList}', [PriceListController::class, 'update'])->name('admin.price-lists.update');

    // Vouchers
    Route::get('vouchers', [VoucherController::class, 'index'])->name('admin.vouchers.index');
    Route::post('vouchers', [VoucherController::class, 'store'])->name('admin.vouchers.store');
    Route::patch('vouchers/{voucher}', [VoucherController::class, 'update'])->name('admin.vouchers.update');

    // Reports
    Route::get('reports', [ReportController::class, 'index'])->name('admin.reports.index');
});

// Auth routes
Route::group(['middleware' => 'language'], function () {
    Route::get('login', [LoginController::class, 'show'])->name('login.show')->middleware('islogin');
    Route::post('login', [LoginController::class, 'authenticate'])->name('login.authenticate');
    Route::get('logout', [LoginController::class, 'logout'])->name('login.logout');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('register', [RegisterController::class, 'show'])->name('register.show');
    Route::post('register', [RegisterController::class, 'register'])->name('register.register');
    Route::get('register-admin', [RegisterController::class, 'registerAdminView'])->name('register.admin');
    Route::post('register-admin', [RegisterController::class, 'registerAdmin'])->name('register.register_admin');
});

// User profile routes (v1)
Route::group([
    'prefix' => 'profile',
    'middleware' => ['language', 'islogin'],
], function () {
    Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
    Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/photo/delete', [ProfilePhotoController::class, 'destroy'])->name('profile.photo.destroy');
    Route::patch('/password', [ProfilePasswordController::class, 'update'])->name('profile.password.update');
});

// Profile v2 routes (new inline dashboard profile)
Route::group([
    'prefix' => 'admin/profile',
    'middleware' => ['islogin'],
], function () {
    Route::patch('/update', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::patch('/password', [ProfilePasswordController::class, 'update'])->name('admin.profile.password.update');
});

// Set language route
Route::get('/{locale}', LocaleController::class);

// ============================================================
// REALTIME JSON API ENDPOINTS
// ============================================================
Route::prefix('api/admin')->middleware('islogin')->group(function () {

    // Dashboard Stats
    Route::get('/dashboard-stats', function () {
        $membersCount       = \App\Models\User::where('role', 2)->count();
        $transactionsCount  = \App\Models\Transaction::count();
        $totalRevenue       = \App\Models\Transaction::whereMonth('created_at', now()->month)
                                ->whereYear('created_at', now()->year)->sum('total');
        $pendingTransactions = \App\Models\Transaction::where('finish_date', null)->count();

        return response()->json([
            'totalMembers'       => $membersCount,
            'totalTransactions'  => $transactionsCount,
            'totalRevenue'       => $totalRevenue,
            'pendingTransactions'=> $pendingTransactions,
        ]);
    })->name('api.dashboard.stats');

    // Realtime Transactions JSON
    Route::get('/transactions', function (Request $request) {
        $month = $request->input('month', date('m'));
        $year  = $request->input('year', date('Y'));

        $transactions = \App\Models\Transaction::with('member', 'service_type')
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->orderBy('created_at', 'DESC')
            ->get()
            ->map(function ($t) {
                return [
                    'id'           => $t->id,
                    'member_name'  => $t->member->name ?? '-',
                    'service_type' => $t->service_type->name ?? '-',
                    'total'        => $t->total,
                    'total_fmt'    => 'Rp ' . number_format($t->total, 0, ',', '.'),
                    'status'       => is_null($t->finish_date) ? 'Diproses' : 'Selesai',
                    'is_done'      => !is_null($t->finish_date),
                    'date'         => $t->created_at->format('d M Y'),
                ];
            });

        return response()->json(['data' => $transactions, 'timestamp' => now()->toISOString()]);
    })->name('api.realtime.transactions');

    // Realtime Members JSON
    Route::get('/members', function () {
        $members = \App\Models\User::where('role', 2)
            ->orderBy('created_at', 'DESC')
            ->get()
            ->map(function ($m) {
                return [
                    'id'           => $m->id,
                    'name'         => $m->name,
                    'email'        => $m->email,
                    'phone'        => $m->phone_number ?? '-',
                    'address'      => $m->address ?? '-',
                    'joined'       => $m->created_at->format('d M Y'),
                    'initial'      => strtoupper(substr($m->name, 0, 1)),
                ];
            });

        return response()->json(['data' => $members, 'timestamp' => now()->toISOString()]);
    })->name('api.realtime.members');

    // Realtime Price Lists JSON
    Route::get('/price-lists', function () {
        $prices = \App\Models\PriceList::with(['service', 'item', 'category'])
            ->orderBy('category_id')
            ->get()
            ->map(function ($p) {
                return [
                    'id'         => $p->id,
                    'item'       => $p->item->name ?? '-',
                    'service'    => $p->service->name ?? '-',
                    'category'   => $p->category->name ?? '-',
                    'category_id'=> $p->category_id,
                    'price'      => $p->price,
                    'price_fmt'  => 'Rp ' . number_format($p->price, 0, ',', '.'),
                ];
            });

        return response()->json(['data' => $prices, 'timestamp' => now()->toISOString()]);
    })->name('api.realtime.prices');

    // Realtime Vouchers JSON
    Route::get('/vouchers', function () {
        $vouchers = \App\Models\Voucher::orderBy('created_at', 'DESC')->get()->map(function ($v) {
            return [
                'id'             => $v->id,
                'name'           => $v->name,
                'discount_value' => $v->discount_value,
                'discount_fmt'   => 'Rp ' . number_format($v->discount_value, 0, ',', '.'),
                'point_need'     => $v->point_need,
                'description'    => $v->description,
                'active'         => (bool) $v->active_status,
            ];
        });

        return response()->json(['data' => $vouchers, 'timestamp' => now()->toISOString()]);
    })->name('api.realtime.vouchers');

    // Realtime Reports JSON
    Route::get('/reports', function (Request $request) {
        $month = $request->input('month', date('m'));
        $year  = $request->input('year', date('Y'));

        $revenue = \App\Models\Transaction::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)->sum('total');

        $totalTx  = \App\Models\Transaction::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)->count();

        $doneTx   = \App\Models\Transaction::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->whereNotNull('finish_date')->count();

        $pendingTx = \App\Models\Transaction::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->whereNull('finish_date')->count();

        // Monthly chart (last 6 months)
        $monthly = [];
        for ($i = 5; $i >= 0; $i--) {
            $d = now()->subMonths($i);
            $monthly[] = [
                'label'  => $d->format('M Y'),
                'amount' => (int) \App\Models\Transaction::whereYear('created_at', $d->year)
                                ->whereMonth('created_at', $d->month)->sum('total'),
                'count'  => \App\Models\Transaction::whereYear('created_at', $d->year)
                                ->whereMonth('created_at', $d->month)->count(),
            ];
        }

        return response()->json([
            'revenue'      => $revenue,
            'revenue_fmt'  => 'Rp ' . number_format($revenue, 0, ',', '.'),
            'total_tx'     => $totalTx,
            'done_tx'      => $doneTx,
            'pending_tx'   => $pendingTx,
            'monthly'      => $monthly,
            'timestamp'    => now()->toISOString(),
        ]);
    })->name('api.realtime.reports');
});