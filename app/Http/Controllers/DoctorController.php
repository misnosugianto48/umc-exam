<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Patient;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        return view('doctor.dashboard');
    }

    public function showConsultation()
    {
        $consultations = Consultation::with('patient')->get();
        return view('doctor.consultation', ['consultations' => $consultations]);
    }

    public function addConsultation()
    {
        $patients = Patient::select('id', 'name')->get();
        return view('doctor.add-consultation', ['patients' => $patients]);
    }

    public function storeConsultation(Request $request)
    {
        $validated = $request->validate([
            'date_in' => 'required|date',
            'id_patient' => 'required|integer',
            'diagnoses' => 'required|string|max:255',
            'recipe' => 'required|string',
        ]);

        $consultation = new Consultation();

        $consultation->date_in = $validated['date_in'];
        $consultation->id_patient = $validated['id_patient'];
        $consultation->diagnoses = $validated['diagnoses'];
        $consultation->recipe = $validated['recipe'];

        $consultation->save();
        return redirect()->route('doctor.consultation')->with('success', 'Consultation registered successfully');
    }
}
