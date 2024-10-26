<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}

        </h2>
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
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}

                    <form class="row g-3 mt-4" method="GET" action="{{ route('admin.index') }}">
                        @csrf
                        <div class="col-md-6">
                            <label for="nik" class="form-label">Cari Pasien</label>
                            <input type="text" class="form-control" id="nik" name="nik"
                                placeholder="masukan nik" value="{{ request('nik') }}">
                        </div>
                        <div class="col-md-6">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Data Pencarian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @forelse ($patient as $p)
                                            <th scope="row">{{ $p->name }}</th>
                                        @empty
                                            <th> Pasien Tidak Ada, Tambah Pasien <a class="btn btn-warning"
                                                    href="{{ route('admin.add-patient') }}">+</a></th>
                                        @endforelse

                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
