<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container mt-4">

        <div class="card shadow">

            <div class="card-body p-5">

                <h3 class="text-center mb-4">
                    Edit Data Desa
                </h3>
                <form method="POST" action="{{ route('desa.update', $desa) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">
                            Nama Desa
                        </label>

                        <input type="text" name="nama_desa"
                            class="form-control @error('nama_desa') is-invalid @enderror"
                            value="{{ old('nama_desa', $desa) }}">

                        @error('nama_desa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Kecamatan
                        </label>

                        <input type="text" name="kecamatan"
                            class="form-control @error('kecamatan') is-invalid @enderror"
                            value="{{ old('kecamatan', $desa) }}">

                        @error('kecamatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Kabupaten
                        </label>

                        <input type="text" name="kabupaten"
                            class="form-control @error('kabupaten') is-invalid @enderror"
                            value="{{ old('kabupaten', $desa) }}">

                        @error('kabupaten')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <a href="{{ route('desa.index') }}" class="btn btn-warning">
                        Batal
                    </a>

                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>

                </form>

            </div>

        </div>

    </div>
</x-app>
