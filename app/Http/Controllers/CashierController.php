<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CashierController extends Controller
{
    public function index()
    {
        return view('cashier.dashboard');
    }
    public function report(Request $request)
    {
        $bulan = $request->input('bulan', Carbon::now()->format('m'));
        $tahun = $request->input('tahun', Carbon::now()->format('Y'));
        $transaksi = Payment::whereYear('date', $tahun)->whereMonth('date', $bulan)->get();

        return view('cashier.report', ['transaksi' => $transaksi, 'bulan' => $bulan, 'tahun' => $tahun]);
    }

    public function storePayment(Request $request)
    {
        $validated = $request->validate([
            'id_patient' => 'required|integer|exists:patients,id',
            'price' => 'required|numeric',
            'date' => 'required|date'
        ]);


        $patient = Patient::find($validated['id_patient']);


        if (!$patient) {
            return redirect()->back()->withErrors(['id_patient' => 'Patient not found.']);
        }


        $price = in_array($patient->status, ['Dosen', 'Karyawan']) ? 0 : $validated['price'];


        $payment = new Payment();
        $payment->id_patient = $validated['id_patient'];
        $payment->price = $price;
        $payment->date = $validated['date'];
        $payment->save();

        return redirect()->route('cashier.report')->with('success', 'Pembayaran Ditambahkan');
    }
}
