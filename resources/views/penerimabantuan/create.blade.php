<x-app>

    <x-slot:title>{{ $title }}</x-slot:title>

    <form method="POST" action="{{ route('penerimabantuan.store') }}">
        @csrf

        <div class="card shadow ">
            <div class="card-body p-5">
                <h3 class="mb-4 fw-bold text-center">Tambah Data Penerima Bantuan</h3>

                <!-- Desa -->
                <div class="mb-3">
                    <label class="form-label">Desa</label>
                    <select class="form-select @error('desa_id') is-invalid @enderror" name="desa_id" required>
                        <option value=""> Pilih Desa</option>
                        @foreach ($desas as $desa)
                            <option value="{{ $desa->id }}" {{ old('desa_id') == $desa->id ? 'selected' : '' }}>
                                {{ $desa->nama_desa ?? $desa->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('desa_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nokk" class="form-label">No KK</label>
                    <input type="text" class="form-control @error('nokk') is-invalid @enderror" name="nokk"
                        value="{{ old('nokk') }}" required>
                    @error('nokk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik"
                        value="{{ old('nik') }}" required>
                    @error('nik')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nama_penerima" class="form-label">Nama Penerima</label>
                    <input type="text" class="form-control @error('nama_penerima') is-invalid @enderror"
                        name="nama_penerima" value="{{ old('nama_penerima') }}" required>
                    @error('nama_penerima')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Jenis Kelamin yang sudah diperbaiki -->
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin"
                        required>
                        <option value="">Pilih</option>
                        <option value="Laki-Laki" {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki
                        </option>
                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan
                        </option>
                    </select>
                    @error('jenis_kelamin')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                        value="{{ old('alamat') }}" required>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <a class="btn btn-warning" href="{{ route('penerimabantuan.index') }}" role="button">Batal</a>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>

            </div>
        </div>
    </form>
</x-app>
