<!DOCTYPE html>
<html>
<head>
    <title>Tutorial Membuat CRUD Pada Laravel - www.malasngoding.com</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <div class="mb-4">
        <h2>
            <a href="https://www.malasngoding.com" class="text-decoration-none">
                www.malasngoding.com
            </a>
        </h2>
        <h3>Edit Pegawai</h3>
    </div>

    <a href="/pegawai" class="btn btn-secondary mb-4">Kembali</a>

    @foreach($pegawai as $p)

    <div class="card">
        <div class="card-header">
            Form Edit Data Pegawai
        </div>

        <div class="card-body">
            <form action="/pegawai/update" method="post">
                {{ csrf_field() }}

                <input type="hidden" name="id" value="{{ $p->pegawai_id }}">

                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input
                            type="text"
                            name="nama"
                            id="nama"
                            class="form-control"
                            required
                            value="{{ $p->pegawai_nama }}"
                        >
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-sm-10">
                        <input
                            type="text"
                            name="jabatan"
                            id="jabatan"
                            class="form-control"
                            required
                            value="{{ $p->pegawai_jabatan }}"
                        >
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="umur" class="col-sm-2 col-form-label">Umur</label>
                    <div class="col-sm-10">
                        <input
                            type="number"
                            name="umur"
                            id="umur"
                            class="form-control"
                            required
                            value="{{ $p->pegawai_umur }}"
                        >
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <textarea
                            name="alamat"
                            id="alamat"
                            class="form-control"
                            rows="4"
                            required
                        >{{ $p->pegawai_alamat }}</textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="offset-sm-2 col-sm-10">
                        <input type="submit" value="Simpan Data" class="btn btn-primary">
                    </div>
                </div>

            </form>
        </div>
    </div>

    @endforeach

</div>

<!-- Bootstrap JS Optional -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
