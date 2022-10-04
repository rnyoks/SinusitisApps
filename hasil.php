<?php
$selected = (array) $_POST[selected];
$rows = $db->get_results("SELECT kode_gejala, nama_gejala FROM bayes_gejala WHERE kode_gejala IN ('".implode("','", $selected)."')");
?>
<div class="panel panel-default">
    <div class="panel-heading">        
        <h3 class="panel-title">Gejala Terpilih</h3>
    </div>
    <table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Gejala</th>
        </tr>
    </thead>
    <?php
    $no=1;
    foreach($rows as $row):
    $gejala[$row->kode_gejala] = $row->nama_gejala;
    ?>
    <tr>
        <td><?=$no++?></td>
        <td><?=$row->nama_gejala?></td>
    </tr>
    <?php endforeach;?>
    </table>
</div>
<?php

$rows = $db->get_results("SELECT * FROM bayes_penyakit ORDER BY kode_penyakit");
foreach($rows as $row){
    $penyakit[$row->kode_penyakit] = $row;
}

$data = get_data($selected);
$bayes = bayes($data, $penyakit);
   
?>
<div class="panel panel-default">
    <div class="panel-heading">        
        <h3 class="panel-title">Hasil Analisa</h3>
    </div>
    <table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>Nama Penyakit</th>
            <th>Bobot Penyakit</th>
            <th>Gejala Dipilih</th>
            <th>Bobot Aturan</th>
            <th>Probabilitas</th>
            <th>Hasil</th>
        </tr>
    </thead>
    <?php foreach($data as $key => $val):?>
    <tr>
        <td rowspan="<?=count($val)?>"><?=$penyakit[$key]->nama_penyakit?></td>
        <td rowspan="<?=count($val)?>"><?=$penyakit[$key]->bobot?></td>        
        <td><?=$gejala[key($val)]?></td>
        <td><?=current($val)?></td>
        <td rowspan="<?=count($val)?>"><?=round($bayes['kali'][$key], 4)?></td>
        <td rowspan="<?=count($val)?>"><?=round($bayes['hasil'][$key], 4)?></td>
    </tr>
    <?php 
    /** menghilangkan elemen pertama array tanpa menghilangkan key */
    unset($val[key($val)]); 
        
    foreach($val as $k => $v):?>
    <tr>
        <td><?=$gejala[$k]?></td>
        <td><?=$v?></td>
    </tr>    
    <?php endforeach?>      
    <?php endforeach?>
    <tr>
        <td colspan="4">Total</td>
        <td colspan="2"><?=round($bayes['total'], 4)?></td>
    </tr>
    </table>
    <div class="panel-body">     
        <p>
        <?php
        arsort($bayes['hasil']);
        ?>
        Hasil Terbesar Didapatkan oleh Penyakit = <strong><?=$penyakit[key($bayes['hasil'])]->nama_penyakit?></strong> dengan Nilai = <strong><?=round(current($bayes['hasil']), 4)?></strong>
        </p>           
        <p>
            <a class="btn btn-primary" href="?m=konsultasi"><span class="glyphicon glyphicon-refresh"></span> Konsultasi Lagi</a>
            <a class="btn btn-default" href="cetak.php?m=hasil&<?=http_build_query(array('selected' => $selected))?>" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>
        </p>       
    </div>
</div>
