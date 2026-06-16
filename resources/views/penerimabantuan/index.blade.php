<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>

    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession

    <div class="d-flex justify-content-between mb-3">
        <h3>Data Penerima Bantuan</h3>

        <a href="{{ route('penerimabantuan.create') }}" class="btn btn-primary">
            Tambah Data
        </a>
    </div>

    <form action="{{ route('penerimabantuan.index') }}" method="GET">
        <div class="row mb-3">

            <div class="col-md-4">
                <input type="text" name="keyword" class="form-control" value="{{ request('keyword') }}"
                    placeholder="Cari Nama atau No KK">
            </div>

            <div class="col-md-4">
                <select name="alamat" class="form-select">
                    <option value="">Semua Alamat</option>

                    @foreach ($alamats as $alamat)
                        <option value="{{ $alamat }}" {{ request('alamat') == $alamat ? 'selected' : '' }}>
                            {{ $alamat }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <button type="submit" class="btn btn-success w-100">
                    summit
                </button>
            </div>

            <div class="col-md-2">
                <a href="{{ route('penerimabantuan.index') }}" class="btn btn-secondary w-100">
                    Reset
                </a>
            </div>

        </div>
    </form>

    <div class="card shadow">
        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead class="table-primary">
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
                            <td>{{ $penerimaBantuans->firstItem() + $loop->index }}</td>
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
                                <a href="{{ route('penerimabantuan.show', $p) }}" class="btn btn-info btn-sm">
                                    Detail
                                </a>

                                <a href="{{ route('penerimabantuan.edit', $p) }}" class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('penerimabantuan.destroy', $p) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus data?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if ($penerimaBantuans->isEmpty())
                        <tr>
                            <td colspan="8" class="text-center">
                                Data Tidak Ditemukan
                            </td>
                        </tr>
                    @endif

                </tbody>
            </table>

            <div class="mt-4 d-flex justify-content-center">
                {{ $penerimaBantuans->links() }}
            </div>

        </div>
    </div>
</x-app>
