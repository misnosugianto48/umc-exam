<x-app-layout>
    <x-slot name="header">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('admin.patient') }}">Pasien</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.doctor') }}">Doctor</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.cashier') }}">Cashier</a>
            </li>
        </ul>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 "><a href="{{ route('admin.add-patient') }}" class="btn btn-outline-primary">Tambah
                        Pasien</a></div>
                <div class="p-6">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Tempat Lahir</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">No HP</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($patients as $patient)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $patient->name }}</td>
                                    <td>{{ $patient->NIK }}</td>
                                    <td>{{ $patient->born }}</td>
                                    <td>{{ $patient->address }}</td>
                                    <td>{{ $patient->phone }}</td>
                                    <td>{{ $patient->status }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">Pasien Tidak Ada</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
