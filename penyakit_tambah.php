<div class="page-header">
    <h1>Tambah Penyakit</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if($_POST) include'aksi.php'?>
        <form method="post" action="?m=penyakit_tambah">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode_penyakit" value="<?=$_POST[kode_penyakit]?>"/>
            </div>
            <div class="form-group">
                <label>Nama Penyakit <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_penyakit" value="<?=$_POST[nama_penyakit]?>"/>
            </div>
            <div class="form-group">
                <label>Bobot <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="bobot" value="<?=$_POST[bobot]?>"/>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <textarea class="form-control" name="keterangan"><?=$_POST[keterangan]?></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=penyakit"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>