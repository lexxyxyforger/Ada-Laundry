<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoucherController extends Controller
{
    /**
     * Show voucher page
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): View
    {
        $user = Auth::user();
        $vouchers = Voucher::all();

        return view('admin.voucher', compact('user', 'vouchers'));
    }

    /**
     * Add new voucher to database
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $input = $request->validate([
            'name'           => ['required', 'string'],
            'description'    => ['nullable', 'string'],
            'discount_value' => ['required', 'numeric'],
            'point_need'     => ['required', 'numeric'],
            'theme'          => ['nullable', 'string'],
        ]);

        // Cek apakah nama voucher ada yang sama di database
        $voucherExists = Voucher::where('name', $input['name'])->exists();

        if ($voucherExists) {
            return redirect()->route('admin.vouchers.index')
                ->with('error', 'Voucher dengan nama ' . $input['name'] . ' sudah ada');
        }

        // Masukkan potongan ke dalam tabel vouchers
        $voucher = new Voucher([
            'name'           => $input['name'],
            'discount_value' => $input['discount_value'],
            'point_need'     => $input['point_need'],
            'description'    => $input['description'] ?? 'Mendapatkan potongan harga ' . number_format($input['discount_value'], 0, ',', '.') . ' dari total transaksi',
            'theme'          => $input['theme'] ?? 'blue',
            'active_status'  => 1,
        ]);
        $voucher->save();

        return redirect()->route('admin.vouchers.index')
            ->with('success', 'Voucher baru berhasil ditambah!');
    }

    /**
     * Update voucher status
     *
     * @param  \App\Models\Voucher $voucher
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Voucher $voucher): JsonResponse
    {
        // Jika 1 maka ubah ke 0
        if ($voucher->active_status == 1) {
            $voucher->active_status = 0;
            $voucher->save();
        } else {
            // Ubah ke 1
            $voucher->active_status = 1;
            $voucher->save();
        }

        return response()->json();
    }
}
