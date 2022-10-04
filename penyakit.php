<div class="page-header">
    <h1>Penyakit</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="penyakit" />
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?=$_GET['q']?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
            </div>
            <div class="form-group">
                <a class="btn btn-primary" href="?m=penyakit_tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            </div>
            <div class="form-group">
                <a class="btn btn-default" href="cetak.php?m=penyakit&q=<?=$_GET[q]?>" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr class="nw">
                <th>Kode</th>
                <th>Nama Penyakit</th>
                <th>Bobot</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <?php
        $q = esc_field($_GET['q']);
        $rows = $db->get_results("SELECT * FROM bayes_penyakit 
            WHERE kode_penyakit LIKE '%$q%' OR nama_penyakit LIKE '%$q%' OR keterangan LIKE '%$q%' 
            ORDER BY kode_penyakit");
        $no=0;
        
        foreach($rows as $row):?>
        <tr>
            <td><?=$row->kode_penyakit?></td>
            <td><?=$row->nama_penyakit?></td>
            <td><?=$row->bobot?></td>
            <td><?=$row->keterangan?></td>
            <td class="nw">
                <a class="btn btn-xs btn-warning" href="?m=penyakit_ubah&amp;ID=<?=$row->kode_penyakit?>"><span class="glyphicon glyphicon-edit"></span></a>
                <a class="btn btn-xs btn-danger" href="aksi.php?act=penyakit_hapus&amp;ID=<?=$row->kode_penyakit?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
        </tr>
        <?php endforeach;
        ?>
        </table>
    </div>
</div>