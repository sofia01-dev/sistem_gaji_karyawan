@extends('layouts.app')

@section('content')

<div class="page-header">
    <h3 class="page-title">Proses Gaji Karyawan</h3>
</div>

<div class="form-box">
    <form action="/gaji" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Karyawan</label>
            <select name="karyawan_id" id="karyawan_id" class="form-control">
                <option value="">Pilih Karyawan</option>

                @foreach ($karyawan as $k)
                    <option value="{{ $k->id }}">{{ $k->nama_karyawan }}</option>                   
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Tunjangan</label>
            <input type="number" name="tunjangan" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Bonus</label>
            <input type="number" name="bonus" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Bulan</label>
            <select name="bulan" id="bulan" class="form-control">
                <option value="Januari">Januari</option>
                <option value="Februari">Februari</option>
                <option value="Maret">Maret</option>
                <option value="April">April</option>
                <option value="Mei">Mei</option>
                <option value="Juni">Juni</option>
                <option value="Juli">Juli</option>
                <option value="Agustus">Agustus</option>
                <option value="September">September</option>
                <option value="Oktober">Oktober</option>
                <option value="November">November</option>
                <option value="Desember">Desember</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Tahun</label>
            <input type="number" name="tahun" id="tahun" class="form-control">
        </div>

        <div class="mb-3">
            <label>Jabatan</label>
            <input type="text" id="jabatan" class="form-control"readonly>
        </div>

        <div class="mb-3">
            <label>Gaji Pokok</label>
            <input type="text" id="gaji_pokok" class="form-control" readonly>
        </div>
                
        <div class="mb-3">
            <label>Alpha</label>
            <input type="text" id="alpha" class="form-control" readonly>
        </div>

        <div class="mb-3">
            <label>Terlambat</label>
            <input type="text" id="terlambat" class="form-control" readonly>
        </div>

        <div class="mb-3">
            <label>Jam Lembur</label>
            <input type="text" id="jam_lembur" class="form-control" readonly>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="/gaji" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script>

    function getDataKaryawan() {

        let id = document.getElementById('karyawan_id').value;

        let bulan = document.getElementById('bulan').value;

        let tahun = document.getElementById('tahun').value;

        if(id != '' && bulan != '' && tahun != '') {

            fetch('/get-karyawan/' + id + '/' + bulan + '/' + tahun)

            .then(response => response.json())

            .then(data => {

                document.getElementById('jabatan').value = data.jabatan;

                document.getElementById('gaji_pokok').value = data.gaji_pokok;

                document.getElementById('alpha').value = data.alpha;

                document.getElementById('terlambat').value = data.terlambat;

                document.getElementById('jam_lembur').value = data.jam_lembur;
            });
        } else {
            document.getElementById('jabatan').value = '';

            document.getElementById('gaji_pokok').value = '';

            document.getElementById('alpha').value = '';

            document.getElementById('terlambat').value = '';

            document.getElementById('jam_lembur').value = '';
        }
    }

    document.getElementById('karyawan_id')
        .addEventListener('change', getDataKaryawan);

    document.getElementById('bulan')
        .addEventListener('change', getDataKaryawan);

    document.getElementById('tahun')
        .addEventListener('keyup', getDataKaryawan);

</script>
@endsection