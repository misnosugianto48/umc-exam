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
                <div class="p-6"><strong>Tambah Pasien</strong></div>
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
                    <form class="row g-3" action="{{ route('admin.store-patient') }}" method="POST">
                        @csrf
                        <div class="col-md-6">
                            <label for="NIK" class="form-label">NIK</label>
                            <input type="text" class="form-control" id="NIK" name="nik">
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                autocomplete="name">
                        </div>
                        <div class="col-6">
                            <label for="born" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="born" name="born">
                        </div>
                        <div class="col-6">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address"
                                placeholder="Apartment, studio, or floor">
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">No HP</label>
                            <input type="number" class="form-control" id="phone" name="phone">
                        </div>
                        <div class="col-md-4">
                            <label for="status" class="form-label">Status</label>
                            <select id="status" name="status" class="form-select" required>
                                <option selected disabled>Pilih...</option>
                                <option value="Mahasiswa">Mahasiswa</option>
                                <option value="Umum">Umum</option>
                                <option value="Karyawan">Karyawan</option>
                                <option value="Dosen">Dosen</option>
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
