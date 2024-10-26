<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}


        </h2>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('cashier.report') }}">Laporan</a>
            </li>

        </ul>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h4>Masukan Pembayaran</h4>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="row row-cols-lg-auto g-3 align-items-center" method="POST"
                        action="{{ route('cashier.store-payment') }}">
                        @csrf
                        <div class="col-12">
                            <label class="visually-hidden" for="id_patient">Id Pasien</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="id_patient" placeholder="Id Pasien"
                                    name="id_patient">
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="visually-hidden" for="price">Harga</label>
                            <div class="input-group">
                                <input type="number" placeholder="Harga" class="form-control" id="price"
                                    name="price">
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="visually-hidden" for="date">Waktu</label>
                            <div class="input-group">
                                <input type="date" class="form-control" id="date" placeholder="Waktu"
                                    name="date">
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-success">Masukan Pembayaran</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
