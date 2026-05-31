<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="text-end">
        <a href="{{ route('penerimabantuan.index') }}" class="btn btn-warning" role="button">Back</a>
    </div>

    <div class="container mt-4">

        <div class="card shadow">
            <div class="card-header bg-light text-dark ">
                <ul>
                    <h4 class="text-center">Detail Penerima Bantuan</h4>
                    <li class="list-group-item">Nama Penerima : {{ $penerimabantuan->nama_penerima }}</li>
                    <li class="list-group-item">NIK : {{ $penerimabantuan->nik }}</li>
                    <li class="list-group-item">No KK : {{ $penerimabantuan->nokk }}</li>
                    <li class="list-group-item">Jenis Kelamin : {{ $penerimabantuan->jenis_kelamin }}</li>
                    <li class="list-group-item">Desa : {{ $penerimabantuan->desa?->nama_desa ?? '-' }}</li>
                    <li class="list-group-item">Alamat : {{ $penerimabantuan->alamat }}</li>
                    @if ($penerimabantuan->pekerjaan)
                        <li class="list-group-item">Pekerjaan : {{ $penerimabantuan->pekerjaan }}</li>
                    @endif
                    @if ($penerimabantuan->keterangan)
                        <li class="list-group-item">Keterangan : {{ $penerimabantuan->keterangan }}</li>
                    @endif
                    <li class="list-group-item">Created At : {{ $penerimabantuan->created_at->diffForHumans() }}</li>
                    <li class="list-group-item">Last Update : {{ $penerimabantuan->updated_at->diffForHumans() }}</li>
                </ul>
            </div>
        </div>
    </div>
</x-app>
