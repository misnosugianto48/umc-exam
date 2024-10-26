<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $searchNik = $request->nik;

        $patient = Patient::select('name')->where('nik', '=', $searchNik)->get();
        return view('admin.dashboard', ['patient' => $patient]);
        // dd($patient);
    }


    public function showPatient()
    {
        $patients = Patient::all();
        return view('admin.patient', ['patients' => $patients]);
    }

    public function addPatient()
    {
        return view('admin.add-patient',);
    }

    public function storePatient(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|unique:patients,nik',
            'name' => 'required|string|max:255',
            'born' => 'required|date',
            'address' => 'required|string',
            'phone' => 'required|string|max:15',
            'status' => 'required|in:Mahasiswa,Umum,Karyawan,Dosen'
        ]);

        $patient = new Patient();

        $patient->nik = $validated['nik'];
        $patient->name = $validated['name'];
        $patient->born = $validated['born'];
        $patient->address = $validated['address'];
        $patient->phone = $validated['phone'];
        $patient->status = $validated['status'];

        $patient->save();

        return redirect()->route('admin.patient')->with('success', 'Patient registered successfully');
    }
}
