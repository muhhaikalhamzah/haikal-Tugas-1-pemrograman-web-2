<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>

    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession

    <div class="d-flex justify-content-between mb-3">
        <h3>Trash Penerima Bantuan</h3>
        <a href="{{ route('penerimabantuan.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="table-danger">
                    <tr>
                        <th>No</th>
                        <th>Nama Penerima</th>
                        <th>No KK</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Desa</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penerimaBantuans as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->nama_penerima }}</td>
                            <td>{{ $p->nokk }}</td>
                            <td>{{ $p->jenis_kelamin }}</td>
                            <td>{{ $p->alamat }}</td>
                            <td>{{ $p->desa?->nama_desa }}</td>
                            <td>
                                <span class="badge {{ $p->status_penerima == 'Aktif' ? 'bg-success' : 'bg-danger' }}">
                                    {{ $p->status_penerima }}
                                </span>
                            </td>
                            <td>
                                <form action="{{ route('penerimabantuan.restore', $p) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-warning btn-sm"
                                        onclick="return confirm('Yakin ingin mengembalikan data?')">
                                        Restore
                                    </button>
                                </form>
                                <form action="{{ route('penerimabantuan.forceDelete', $p) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus permanen?')">
                                        Force Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if ($penerimaBantuans->isEmpty())
                        <tr>
                            <td colspan="8" class="text-center">Tidak ada data di trash</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app>
