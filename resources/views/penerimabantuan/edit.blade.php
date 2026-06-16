<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>

    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession

    @session('error')
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endsession

    <div class="d-flex justify-content-between mb-3">
        <h3 class="text-center w-100">Ubah Data Penerima Bantuan</h3>
    </div>

    <div class="card shadow">
        <div class="card-body">

            <form action="{{ route('penerimabantuan.update', $penerimabantuan) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Desa</label>
                    <select name="desa_id" class="form-select" required>
                        <option value="">-- Pilih Desa --</option>
                        @foreach ($desas as $desa)
                            <option value="{{ $desa->id }}"
                                {{ old('desa_id', $penerimabantuan->desa_id) == $desa->id ? 'selected' : '' }}>
                                {{ $desa->nama_desa }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Penerima</label>
                    <input type="text" name="nama_penerima" class="form-control"
                        value="{{ old('nama_penerima', $penerimabantuan->nama_penerima) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">NIK</label>
                    <input type="text" name="nik" class="form-control"
                        value="{{ old('nik', $penerimabantuan->nik) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">No KK</label>
                    <input type="text" name="nokk" class="form-control"
                        value="{{ old('nokk', $penerimabantuan->nokk) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-select" required>
                        <option value="Laki-Laki"
                            {{ old('jenis_kelamin', $penerimabantuan->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>
                            Laki-Laki</option>
                        <option value="Perempuan"
                            {{ old('jenis_kelamin', $penerimabantuan->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                            Perempuan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat', $penerimabantuan->alamat) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status Penerima</label>
                    <select name="status_penerima" class="form-select" required>
                        <option value="Aktif"
                            {{ old('status_penerima', $penerimabantuan->status_penerima) == 'Aktif' ? 'selected' : '' }}>
                            Aktif</option>
                        <option value="Tidak Aktif"
                            {{ old('status_penerima', $penerimabantuan->status_penerima) == 'Tidak Aktif' ? 'selected' : '' }}>
                            Tidak Aktif</option>
                    </select>
                </div>

                <div class="mt-4 text-center">
                    <button type="submit" class="btn btn-primary px-4">Simpan Perubahan</button>
                    <a href="{{ route('penerimabantuan.index') }}" class="btn btn-secondary px-4">Batal</a>
                </div>
            </form>

        </div>
    </div>
</x-app>
