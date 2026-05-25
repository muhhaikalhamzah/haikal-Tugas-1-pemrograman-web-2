<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="text-end">
        <a href="{{ route('desa.index') }}" class="btn btn-warning" role="button">Back</a>
    </div>
    <div class="container mt-4">

        <div class="card shadow">
            <div class="card-header bg-light text-dark ">
                <ul>
                    <h4 class="text-center">Detail Desa</h4>
                    <li class="list-group-item">Nama Desa: {{ $desa->nama_desa }}</li>
                    <li class="list-group-item">Kecamatan: {{ $desa->kecamatan }}</li>
                    <li class="list-group-item">Kabupaten: {{ $desa->kabupaten }}</li>
                    <li class="list-group-item">Created At: {{ $desa->created_at->diffForHumans() }}</li>
                    <li class="list-group-item">Last Update: {{ $desa->updated_at->diffForHumans() }}</li>
                </ul>
            </div>
        </div>
    </div>
</x-app>
