<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function konfirmasi(Request $request, Pembayaran $pembayaran)
    {
        if($request->hasFile('bukti_bayar')){
            $file = $request->file('bukti_bayar');
            $path = $file->store('bukti_bayar');
            $pembayaran->update([
                'bukti_bayar' => $path
            ]);
        }

        toast('Pembayaran berhasil dikonfirmasi', 'success');
        return redirect()->back();
    }
}
