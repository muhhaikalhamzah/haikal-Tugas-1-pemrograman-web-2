<x-app>

    <x-slot:title>{{ $title }}</x-slot>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a class="btn btn-primary mb-3" href="{{ route('databantuan.create') }}" role="button">tambah data</a>
    <div class="container mt-5">
        <div class="card shadow ">
            <div class="card-body p-5">
                <h3 class="mb-4 fw-bold text-center">Data Bantuan</h3>
                <div class="table-responsive">
                    <table class="table table-bordered tabel-hover align-middle text-center">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>No KK</th>
                                <th>NIK</th>
                                <th>Nama Penerima</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Pekerjaan</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($databantuans as $index => $databantuan)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $databantuan->nokk }}</td>
                                    <td>{{ $databantuan->nik }}</td>
                                    <td>{{ $databantuan->namapenerima }}</td>
                                    <td>{{ $databantuan->jeniskelamin }}</td>
                                    <td>{{ $databantuan->alamat }}</td>
                                    <td>{{ $databantuan->pekerjaan }}</td>
                                    <td>{{ $databantuan->keterangan }}</td>
                                    <td>
                                        <div class="d-flex justify-content">
                                            <a href="{{ route('databantuan.edit', $databantuan) }}"
                                                class="btn btn-warning m-1">edit</a>
                                            <form action="{{ route('databantuan.destroy', $databantuan) }}"
                                                method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger m-1"
                                                    onclick="return confirm('Anda Yakin')">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app>
