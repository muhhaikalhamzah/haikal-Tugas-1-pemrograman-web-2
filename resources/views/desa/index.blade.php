<x-app>
    <x-slot:title>{{ $title ?? 'Data Desa' }}</x-slot:title>

    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession

    <div class="d-flex justify-content-between mb-3">
        <h3>Daftar Data Desa</h3>

        <a href="{{ route('desa.create') }}" class="btn btn-primary">
            Tambah Data Desa
        </a>
    </div>

    <form action="{{ route('desa.index') }}" method="GET">
        <div class="row mb-3">

            <div class="col-md-4">
                <input type="text" class="form-control" name="keyword" value="{{ request('keyword') }}"
                    placeholder="Cari nama desa, kecamatan, atau kabupaten...">
            </div>

            <div class="col-md-4">
                <select name="nama_desa" class="form-select">
                    <option value="">Semua Desa</option>

                    @foreach ($filterDesas as $desa)
                        <option value="{{ $desa->nama_desa }}"
                            {{ request('nama_desa') == $desa->nama_desa ? 'selected' : '' }}>
                            {{ $desa->nama_desa }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <button type="submit" class="btn btn-success w-100">
                    Cari
                </button>
            </div>

            <div class="col-md-2">
                <a href="{{ route('desa.index') }}" class="btn btn-secondary w-100">
                    Reset
                </a>
            </div>

        </div>
    </form>

    <div class="card shadow">
        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead class="table-warning">
                    <tr>
                        <th>No</th>
                        <th>Nama Desa</th>
                        <th>Kecamatan</th>
                        <th>Kabupaten</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($desas as $desa)
                        <tr>
                            <td>{{ $desas->firstItem() + $loop->index }}</td>
                            <td>{{ $desa->nama_desa }}</td>
                            <td>{{ $desa->kecamatan }}</td>
                            <td>{{ $desa->kabupaten }}</td>

                            <td>
                                <a href="{{ route('desa.show', $desa) }}" class="btn btn-info btn-sm">
                                    Detail
                                </a>

                                <a href="{{ route('desa.edit', $desa) }}" class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('desa.destroy', $desa) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus data desa ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if ($desas->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center">
                                Data Tidak Ditemukan
                            </td>
                        </tr>
                    @endif

                </tbody>
            </table>

            <div class="mt-4 d-flex justify-content-center">
                {{ $desas->links() }}
            </div>

        </div>
    </div>
</x-app>
