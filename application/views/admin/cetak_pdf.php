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

 <?php echo $nama ?>
</body>
</html>
