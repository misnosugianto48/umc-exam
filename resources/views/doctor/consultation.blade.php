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
                <div class="p-6 "><a href="{{ route('doctor.add-consultation') }}"
                        class="btn btn-outline-primary">Buat
                        Konsultasi</a></div>
                <div class="p-6">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nama Pasien</th>
                                <th scope="col">Tempat Lahir</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">No HP</th>
                                <th scope="col">Status</th>
                                <th scope="col">Diagnosa</th>
                                <th scope="col">Resep</th>


                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($consultations as $consultation)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $consultation->date_in }}</td>
                                    <td>{{ $consultation->patient->name }}</td>
                                    <td>{{ $consultation->patient->born }}</td>
                                    <td>{{ $consultation->patient->address }}</td>
                                    <td>{{ $consultation->patient->phone }}</td>
                                    <td>{{ $consultation->patient->status }}</td>
                                    <td>{{ $consultation->diagnoses }}</td>
                                    <td>{{ $consultation->recipe }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">Konsultasi Tidak Ada</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div </x-app-layout>
