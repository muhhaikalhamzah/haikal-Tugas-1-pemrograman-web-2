<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>
    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession
    <a href="{{ route('desa.create') }}" class="btn btn-primary mb-3" role="button">Tambah Data</a>
    <form action="">
        <div class="row g-3  mb-3 align-items-center">
            <div class="col-md-6">
                <input type="text" class="form-control" id="keyword" name="keyword" placeholder="search..."
                    name="keyword">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-success">Search</button>
            </div>
        </div>
    </form>
    <div class="container mt-4">
        <div class="card shadow">
            <div class="card-header bg-light text-dark text-center">
                <h3>Data Desa</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover aligin-middle">
                        <thead class="table-warning  text-center fs-5">
                            <tr>
                                <th>No</th>
                                <th>Nama Desa</th>
                                <th>Kecamatan</th>
                                <th>Kabupaten</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($desas as $desa)
                                <tr>

                                    <td>{{ $desas->firstItem() + $loop->index }}</td>
                                    <td>{{ $desa->nama_desa }}</td>
                                    <td>{{ $desa->kecamatan }}</td>
                                    <td>{{ $desa->kabupaten }}</td>
                                    <td>
                                        <div class=" d-flex justify-content-center gap-2">
                                            <a href="{{ route('desa.edit', $desa) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('desa.destroy', $desa) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apa Anda Yakin Ingin Menghapusnya')">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                </div>
                </table>
            </div>
        </div>
    </div>
    {{ $desas->links() }}
</x-app>
