<html lang="en" moznomarginboxes mozdisallowselectionprint>
<head>
    <title>laporan data stok barang</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/laporan.css')?>"/>
</head>
<body onload="window.print()">
<div id="laporan">
<table align="center" style="width:900px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">
<!--<tr>
    <td><img src="<?php// echo base_url().'assets/img/kop_surat.png'?>"/></td>
</tr>-->
</table>

<table border="0" align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:0px;">
<tr>
    <td colspan="2" style="width:800px;paddin-left:20px;"><center><h4>LAPORAN STOK BARANG PERKATEGORI</h4></center><br/></td>
</tr>
                       
</table>
 
<table border="0" align="center" style="width:900px;border:none;">
        <tr>
            <th style="text-align:left"></th>
        </tr>
</table>

<table border="1" align="center" style="width:900px;margin-bottom:20px;">
<?php 
    $urut=0;
    $nomor=0;
    $group='-';
    foreach($data->result_array()as $d){
    $nomor++;
    $urut++;
    if($group=='-' || $group!=$d['nama_kategori']){
        $kat=$d['nama_kategori'];
        $query=$this->db->query("SELECT kategori_id,nama_kategori,nama_barang,SUM(stok_barang) AS tot_stok FROM tbl_kategori JOIN tbl_barang ON kategori_id=barang_kategori_id WHERE nama_kategori='$kat'");
        $t=$query->row_array();
        $tots=$t['tot_stok'];
        if($group!='-')
        echo "</table><br>";
        echo "<table align='center' width='900px;' border='1'>";
        echo "<tr><td colspan='2'><b>Kategori: $kat</b></td> <td style='text-align:center;'><b>Total Stok: $tots </b></td></tr>";
echo "<tr style='background-color:#ccc;'>
    <td width='4%' align='center'>No</td>
    <td width='60%' align='center'>Nama Barang</td>
    <td width='30%' align='center'>Stok</td>
    
    </tr>";
$nomor=1;
    }
    $group=$d['nama_kategori'];
        if($urut==500){
        $nomor=0;
            echo "<div class='pagebreak'> </div>";
            //echo "<center><h2>KALENDER EVENTS PER TAHUN</h2></center>";
            }
        ?>
        <tr>
                <td style="text-align:center;vertical-align:top;text-align:center;"><?php echo $nomor; ?></td>
                <td style="vertical-align:top;padding-left:5px;"><?php echo $d['nama_barang']; ?></td>
                <td style="vertical-align:top;text-align:center;"><?php echo $d['stok_barang']; ?></td>  
        </tr>
        

        <?php
        }
        ?>
</table>

</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <td></td>
</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <td align="right">Pekanbaru, <?php echo date('d-M-Y')?></td>
    </tr>
    <tr>
        <td align="right"></td>
    </tr>
   
    <tr>
    <td><br/><br/><br/><br/></td>
    </tr>    
    <tr>
        <td align="right">( <?php echo $this->session->userdata('nama');?> )</td>
    </tr>
    <tr>
        <td align="center"></td>
    </tr>
</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <th><br/><br/></th>
    </tr>
    <tr>
        <th align="left"></th>
    </tr>
</table>
</div>
</body>
</html>