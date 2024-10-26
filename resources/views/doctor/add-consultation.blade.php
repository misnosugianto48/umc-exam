<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('doctor.consultation') }}">Konsultasi</a>
            </li>

        </ul>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6"><strong>Buat Konsultasi</strong></div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="p-6">
                    <form class="row g-3" action="{{ route('doctor.store-consultation') }}" method="POST">
                        @csrf
                        <div class="col-6">
                            <label for="date_in" class="form-label">Tanggal Konsul</label>
                            <input type="date" class="form-control" id="date_in" name="date_in">
                        </div>
                        <div class="col-6">
                            <label for="diagnoses" class="form-label">Diagnosa</label>
                            <input type="text" class="form-control" id="diagnoses" name="diagnoses">
                        </div>
                        <div class="col-6">
                            <label for="recipe" class="form-label">Resep</label>
                            <input type="text" class="form-control" id="recipe" name="recipe">
                        </div>
                        <div class="col-md-4">
                            <label for="id_patient" class="form-label">Pasien</label>
                            <select id="id_patient" name="id_patient" class="form-select" required>
                                <option selected disabled>Pilih...</option>
                                @foreach ($patients as $patient)
                                    <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
