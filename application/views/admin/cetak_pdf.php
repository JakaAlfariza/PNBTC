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
          <img src="<?php echo base_url('images/pnb.png') ?>" width="90px"/></td>
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
    <h2>Surat Pemberitahuan Event</h2>
</div>

<table>
      <tr>
        <td>No</td> <td>:</td> <td>0<?php echo $event->id_event; ?>/PNBCC/2024</td>
      </tr>
      <tr>
        <td>Perihal</td> <td>:</td> <td>Pemberitahuan Event <?php echo $event->nama_event; ?></td>
      </tr>
</table>
<p>
Kepada Yth.<br>
Mahasiswa Kampus / Segala Kalangan<br>
Di Tempat<br>
</p>
<br>
<p>Dengan Hormat,</p>

<p>Kami selaku panitia <?php echo $event->penyelenggara; ?> memberitahukan, bahwa <?php echo $event->penyelenggara; ?> akan mengadakan event <?php echo $event->nama_event; ?>. Event ini dapat diikuti oleh segala kalangan baik dari mahasiswa kampus maupun dari luar kampus. Adapun rincian detail event yang akan dilaksanakan adalah sebagai berikut:</p>


<table>
      <tr>
        <td>Nama Event</td> <td>:</td> <td> <?php echo $event->nama_event; ?></td>
      </tr>
      <tr>
        <td>Tanggal</td> <td>:</td> <td> <?php echo $event->tgl_event; ?></td>
      </tr>
      <tr>
        <td>Tempat</td> <td>:</td> <td> <?php echo $event->lokasi; ?></td>
      </tr>
      <tr>
        <td>Link Pendaftaran</td> <td>:</td> <td> <?php echo $event->link_daftar; ?></td>
      </tr>
</table>

<p>Demikian informasi yang kami sampaikan, besar harapan peserta mengikuti event kami, karena event kami merupakan event <?php echo $event->tingkat_event; ?>, atas perhatian dan partisipasinya kami ucapkan terima kasih.</p>
<br>
<p><strong>Ketua Panitia,</strong></p>
<br>
<br>
<br>
<p>____________<br>
<?php echo $event->penyelenggara; ?></p>


</body>
</html>
