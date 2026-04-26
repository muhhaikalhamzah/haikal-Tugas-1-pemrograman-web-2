<x-app>

    <x-slot:title>{{ $title }}</x-slot>
    <form method="POST" action="{{ route('databantuan.store') }}">
        @csrf
        <div class="card shadow ">
            <div class="card-body p-5">
                <h3 class="mb-4 fw-bold text-center">Form Data Bantuan</h3>
                <div class="mb-3">
                    <label for="nokk" class="form-label">No KK</label>
                    <input type="number" class="form-control @error('nokk') is-invalid @enderror " name="nokk"
                        value="{{ old('nokk') }}">
                    @error('nokk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="number" class="form-control @error('nik') is-invalid @enderror" name="nik"
                        value="{{ old('nik') }}">
                    @error('nik')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="namapenerima" class="form-label">Nama Penerima</label>
                    <input type="text" class="form-control @error('namapenerima') is-invalid @enderror"
                        name="namapenerima" value="{{ old('namapenerima') }}">
                    @error('namapenerima')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" name="jeniskelamin">
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                        value="{{ old('alamat') }}">
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                    <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan"
                        value="{{ old('pekerjaan') }}">
                    @error('pekerjaan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" class="form-control @error('keterangan') is-invalid @enderror"
                        name="keterangan" value="{{ old('keterangan') }}">
                    @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div>

                    <a class="btn btn-warning" href="{{ route('databantuan.index') }}" role="button">batal</a>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </div>
        </div>
    </form>
</x-app>
