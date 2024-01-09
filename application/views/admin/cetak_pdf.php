<html>
<head>
	<title>Cetak PDF</title>
</head>
<?php 
    $path = base_url() . 'images/pnb.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $content = file_get_contents($path);
    $logo_pnb = 'data:image/' . $type . ';base64,' . base64_encode($content);
    
    ?>
<body>
<table width="100%">
  <tr>
        <td width="20%px" align="right">
<<<<<<< HEAD
        <img src="<?php echo base_url('images/pnb.png'); ?>" width="90px"/></td>
=======
        <img src="<?php echo base_url('images/pnb.png') ?>" width="90px"/></td>
>>>>>>> 0ce00764db5b6307a1e9e8936e405e5fd8ca708d
        <td align="center">
        <font size="3">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RESET, DAN TEKNOLOGI</font> <br/>
        <font size="5"><b>POLITEKNIK NEGERI BALI</b></font><br/>
 		<font size="2">Jalan Kampus Bukit Jimbaran, Kuta Selatan, Kabupaten Badung, Bali - 80364</font> <br/>
 		<font size="2">Telp.(0361)701981 (Hunting) Fax. 701128</font> <br/>
 		<font size="1">Laman : www.pnb.ac.id, Email : poltek@pnb.ac.id </font>
        
        </td>
    </tr>
    </table>

<hr/>



<div style="text-align: center;">
    <h2>Pemberitahuan Event</h2>
</div>

<p><strong>No : 0<?php echo $event->id_event; ?>/PNBCC/2024</strong></p>
<p><strong>Perihal : Pemberitahuan event <?php echo $event->nama_event; ?></strong></p>

<p>Kepada Yth</p>
<p>Mahasiswa Kampus / segala kalangan</p>
<p>Di Tempat</p>

<p>Denagan Hormat,</p>

<p>Kami Selaku panitia <?php echo $event->penyelenggara; ?> memberitahukan, bahwa <?php echo $event->penyelenggara; ?> akan mengadakan event <?php echo $event->nama_event; ?>. Event ini dapat diikuti oleh segala kalangan baik dari mahasiswa kampus maupun dari luar kampus. Adapun rincian detail event yang akan dilaksanakan adalah sebagai berikut:</p>

<ul>
    <li><strong>Nama Event:</strong> <?php echo $event->nama_event; ?></li>
    <li><strong>Tanggal:</strong> <?php echo $event->tgl_event; ?></li>
    <li><strong>Tempat:</strong> <?php echo $event->lokasi; ?></li>
    <li><strong>Link Pendaftaran:</strong> <a href="<?php echo $event->link_daftar; ?>"><?php echo $event->link_daftar; ?></a></li>
</ul>

<p>Demikian informasi yang kami sampaikan, besar harapan peserta mengikuti event kami, karena event kami merupakan event <?php echo $event->tingkat_event; ?>, atas perhatian dan partisipasinya kami ucapkan terima kasih.</p>

<p><strong>Ketua Panitia,</strong></p>
<p>____________</p>
<p><?php echo $event->penyelenggara; ?></p>


</body>
</html>
