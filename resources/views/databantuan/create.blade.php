<x-app>

    <x-slot:title>{{ $title }}</x-slot>
    <form class="container mt-5">
        <div class="card shadow ">
            <div class="card-body p-5">
                <h3 class="mb-4 fw-bold text-center">Form Data Bantuan</h3>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">No KK</label>
                    <input type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">NIK</label>
                    <input type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Penerima</label>
                    <input type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select class="form-select" name="Jenis Kelamin">
                        <option value="1">Laki-Laki</option>
                        <option value="2">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Alamat</label>
                    <input type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Pekerjaan</label>
                    <input type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Keterangan</label>
                    <input type="text" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Kirim</button>
                <a href="" type="button" class="btn btn-warning">Batal</a>

            </div>
        </div>
    </form>
</x-app>
