<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<title></title>
	<meta name="generator" content="https://conversiontools.io" />
	<meta name="author" content="Microsoft Office User"/>
	<meta name="created" content="2020-09-13T16:13:48"/>
	<meta name="changedby" content="Microsoft Office User"/>
	<meta name="changed" content="2020-09-13T16:14:18"/>
	<meta name="AppVersion" content="16.0300"/>
	<meta name="DocSecurity" content="0"/>
	<meta name="HyperlinksChanged" content="false"/>
	<meta name="LinksUpToDate" content="false"/>
	<meta name="ScaleCrop" content="false"/>
	<meta name="ShareDoc" content="false"/>
	
	<style type="text/css">
		body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family:"Calibri"; font-size:small }
		a.comment-indicator:hover + comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em;  } 
		a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em;  } 
		comment { display:none;  } 
        /* <style> */
            /* @page {
                align-content: center;
                width: 21cm;
            } */
	</style>
	
</head>

<body>
<table cellspacing="0" border="0">
	<colgroup width="34"></colgroup>
	<colgroup width="135"></colgroup>
	<colgroup width="30"></colgroup>
	<colgroup width="64"></colgroup>
	<colgroup width="72"></colgroup>
	<colgroup width="100"></colgroup>
	<colgroup width="72"></colgroup>
	<colgroup width="61"></colgroup>
	<colgroup width="26"></colgroup>
	<colgroup width="16"></colgroup>
	<colgroup width="114"></colgroup>
	<colgroup width="68"></colgroup>
	<tr>
		<td colspan=12 height="28" align="center" valign=middle><b><font face="Bodoni Bk BT" size=4 color="#000000">LAPORAN HASIL BELAJAR</font></b></td>
		</tr>
	<tr>
		<td colspan=12 height="21" align="center" valign=bottom> <br></font></td>
		</tr>
	<tr>
		<td colspan=2 height="21" align="left" valign=middle><b> NAMA SEKOLAH</font></b></td>
		<td align="left" valign=bottom> :</font></td>
		<td colspan=3 align="left" valign=middle> PONPES AL-QOSIM JAMBI</font></td>
		<td colspan=3 align="left" valign=middle><b> KELAS</font></b></td>
		<td align="left" valign=bottom> :</font></td>
		<td colspan=2 align="left" valign=middle> 
			
			{{-- Kelas --}}
			{{$santriwustha->kelas->namaKelas}}
		
		</font></td>
		</tr>
	<tr>
		<td colspan=2 height="21" align="left" valign=middle><b> PROGRAM</font></b></td>
		<td align="left" valign=bottom> :</font></td>
		<td colspan=3 align="left" valign=middle> SALAFIYAH WUSTHA</font></td>
		<td colspan=3 align="left" valign=bottom><b> SEMESTER</font></b></td>
		<td align="left" valign=bottom> :</font></td>
		<td colspan=2 align="left" valign=middle> 
			{{-- Semester --}}
			{{$periode->semester}}
		
		</font></td>
		</tr>
	<tr>
		<td colspan=2 height="21" align="left" valign=middle><b> ALAMAT</font></b></td>
		<td align="left" valign=bottom> :</font></td>
		<td colspan=3 align="left" valign=middle><font size=2 color="#000000">JL. SEI BELURU, RT.01 TL. BELIDO</font></td>
		<td colspan=3 align="left" valign=middle><b> TAHUN</font></b></td>
		<td align="left" valign=bottom> :</font></td>
		<td colspan=2 align="left" valign=middle> 
			{{-- tahun ajaran --}}
			{{$periode->tahun}}
		
		</font></td>
		</tr>
	<tr>
		<td colspan=2 height="23" align="left" valign=middle><b> NAMA SANTRI</font></b></td>
		<td align="left" valign=bottom> :</font></td>
		<td colspan=3 align="left" valign=middle><b><i> 
			
			{{-- nama santri --}}
			{{$santriwustha->namaLengkap}}
		
		
		</font></i></b></td>
		<td colspan=3 align="left" valign=bottom><b> NOMOR INDUK/NISN</font></b></td>
		<td align="left" valign=bottom> :</font></td>
		<td style="border:1px solid #000000; width:150px" align="left" valign=middle><b> 
			{{-- NIS --}}
			0041150037
		</font></b></td>
		</tr>
	<tr>
		<td colspan=12 height="23" align="center" valign=bottom> <br></font></td>
		</tr>
</table>
<style>
	#nilai td {
		padding:5px;
		border: 1px solid #000000;

	}
	.namaMapel{
		width:20%;
	}
	.namaArab{
		width: 15%;
	}
	.judul{
		width:16%;
	}

	#bawah {
		border-collapse: collapse;
		margin-top: 20px;
		padding: 3px;
	}
	.ekskul {
		width: 250px;
		height: 30px;
	}
	.nilaiekskul{
		width: 100px;
	}
	.noekskul {
		width: 50px;
	}
	
	
</style>
<table id="nilai" border="1px" style=" border-collapse:collapse; "> 
	<tr>
		<td style="border:1px solid #000000" rowspan=2 height="57" align="center" valign=middle><b> NO.</font></b></td>
		<td style="border:1px solid #000000" colspan=6 rowspan=2 align="center" valign=middle><b><font face="Bodoni Bk BT" color="#000000">MATA PELAJARAN</font></b></td>
		<td style="border:1px solid #000000" colspan=4 align="center" valign=middle><b><font face="Bodoni Bk BT" color="#000000">NILAI</font></b></td>
		<td style="border:1px solid #000000" align="center" valign=middle><b> Rata-rata Kelas</font></b></td>
	</tr>
	<tr>
		<td style="border:1px solid #000000" align="center" valign=middle><b> Angka</font></b></td>
		<td style="border:1px solid #000000" colspan=3 align="center" valign=middle><b> Huruf</font></b></td>
		<td style="border:1px solid #000000" align="center" valign=middle><b> Angka</font></b></td>
	</tr>
	<tr>
		<td style="border:1px solid #000000" rowspan=9 height="193" align="center" valign=middle><b> I</font></b></td>
		<td class="judul" style="border:1px solid #000000" rowspan=9 align="center" valign=middle><b> ILMU DINIYAH</font></b></td>
		<td style="border:1px solid #000000" align="center" valign=middle sdval="1" sdnum="1033;"><b> 1</font></b></td>
		<td class="namaMapel" style="border:1px solid #000000" colspan=2 align="left" valign=bottom><b> Hifzul Qur'an</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="right" valign=middle><b><font face="Traditional Arabic" size=2 color="#000000">&#1581;&#1601;&#1592; &#1575;&#1604;&#1602;&#1585;&#1570;&#1606;</font></b></td>
		<td style="border:1px solid #000000" align="center" valign=bottom sdval="65" sdnum="1033;"><b> 
			{{-- tahfidz --}}
			<?php
			$nilai=$nilaiaktif->where('mapel_id',26)->first();
			?>
			@if($nilai!=null)
				{{ round($nilai->rataRata)}}
			@endif
		</font></b></td>
		<td style="border:1px solid #000000" colspan=3 align="left" valign=bottom><b> 
			<?php $nilai=$nilaiaktif->where('mapel_id',26)->first();?>
			@if($nilai!=null){{ terbilang($nilai->rataRata)}}@endif</font></b></td>
		<td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="75.21" sdnum="1033;"><b> 
			{{-- rataRata tahfidz --}}
			<?php
			$nilai=$nilaiaktif->where('mapel_id',26)->first();
			?>
			@if($nilai!=null)
				{{ round($nilai->rataRataKelas)}}
			@endif
		</font></b></td>
	</tr>
	<tr>
		<td style="border:1px solid #000000" align="center" valign=middle sdval="2" sdnum="1033;"><b> 2</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="left" valign=bottom><b> Tauhid</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="right" valign=middle><b><font face="Traditional Arabic" size=2 color="#000000">&#1575;&#1604;&#1578;&#1608;&#1581;&#1610;&#1583;</font></b></td>
		<td style="border:1px solid #000000" align="center" valign=bottom sdval="73" sdnum="1033;"><b> 
			{{-- tauhid --}}
			<?php
			$nilai=$nilaiaktif->where('mapel_id',9)->first();
			?>
			@if($nilai!=null)
			{{ round($nilai->rataRata)}}
			@endif
		</font></b></td>
		<td style="border:1px solid #000000" colspan=3 align="left" valign=bottom><b> 
			<?php $nilai=$nilaiaktif->where('mapel_id',9)->first();?>
			@if($nilai!=null){{ terbilang($nilai->rataRata)}}@endif</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="73.65" sdnum="1033;"><b> 
			<?php
			$nilai=$nilaiaktif->where('mapel_id',9)->first();
			?>
			@if($nilai!=null)
				{{ round($nilai->rataRataKelas)}}
			@endif
		</font></b></td>
	</tr>
	<tr>
		<td style="border:1px solid #000000" align="center" valign=middle sdval="3" sdnum="1033;"><b> 3</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="left" valign=bottom><b> Hadits</font></b></td>
		<td class="namaArab" style="border:1px solid #000000" colspan=2 align="right" valign=middle><b><font face="Traditional Arabic" size=2 color="#000000">&#1575;&#1604;&#1581;&#1583;&#1610;&#1579;</font></b></td>
		<td style="border:1px solid #000000" align="center" valign=bottom sdval="80" sdnum="1033;"><b> 
			{{-- hadits --}}
			<?php
			$nilai=$nilaiaktif->where('mapel_id',4)->first();
			?>
			@if($nilai!=null)
			{{ round($nilai->rataRata)}}
			@endif
		</font></b></td>
		<td style="border:1px solid #000000" colspan=3 align="left" valign=bottom><b> 
			<?php $nilai=$nilaiaktif->where('mapel_id',4)->first();?>
			@if($nilai!=null){{ terbilang($nilai->rataRata)}}@endif</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="90.43" sdnum="1033;"><b> 
			<?php
			$nilai=$nilaiaktif->where('mapel_id',4)->first();
			?>
			@if($nilai!=null)
				{{ round($nilai->rataRataKelas)}}
			@endif
		</font></b></td>
	</tr>
	<tr>
		<td style="border:1px solid #000000" align="center" valign=middle sdval="4" sdnum="1033;"><b> 4</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="left" valign=bottom><b> Adab/Akhlaq</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="right" valign=middle><b><font face="Traditional Arabic" size=2 color="#000000">&#1575;&#1604;&#1571;&#1582;&#1604;&#1575;&#1602;</font></b></td>
		<td style="border:1px solid #000000" align="center" valign=bottom sdval="91" sdnum="1033;"><b> 
			{{-- akhlak --}}
			<?php
			$nilai=$nilaiaktif->where('mapel_id',10)->first();
			?>
			@if($nilai!=null)
			{{ round($nilai->rataRata)}}
			@endif
		</font></b></td>
		<td style="border:1px solid #000000" colspan=3 align="left" valign=bottom><b> 
			<?php $nilai=$nilaiaktif->where('mapel_id',10)->first();?>
			@if($nilai!=null){{ terbilang($nilai->rataRata)}}@endif</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="72" sdnum="1033;"><b> 
			
			<?php $nilai=$nilaiaktif->where('mapel_id',10)->first();?>
			@if($nilai!=null)
				{{ round($nilai->rataRataKelas)}}
			@endif
	</tr>
	<tr>
		<td style="border:1px solid #000000" align="center" valign=middle sdval="5" sdnum="1033;"><b> 5</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="left" valign=bottom><b> Tajwid/Tahsin</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="right" valign=middle><b><font face="Traditional Arabic" size=2 color="#000000">&#1575;&#1604;&#1578;&#1580;&#1608;&#1610;&#1583;</font></b></td>
		<td style="border:1px solid #000000" align="center" valign=bottom sdval="70" sdnum="1033;"><b> 
		{{-- tajwid --}}
		<?php $nilai=$nilaiaktif->where('mapel_id',11)->first();?>
			@if($nilai!=null){{ round($nilai->rataRata)}}@endif
		</font></b></td>
		<td style="border:1px solid #000000" colspan=3 align="left" valign=bottom><b> 
			<?php $nilai=$nilaiaktif->where('mapel_id',11)->first();?>
			@if($nilai!=null){{ terbilang($nilai->rataRata)}}@endif</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="72.34" sdnum="1033;"><b> 
			<?php $nilai=$nilaiaktif->where('mapel_id',11)->first();?>
			@if($nilai!=null){{ round($nilai->rataRataKelas)}}@endif
		</font></b></td>
	</tr>
	<tr>
		<td style="border:1px solid #000000" align="center" valign=middle sdval="6" sdnum="1033;"><b> 6</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="left" valign=bottom><b> Fiqih</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="right" valign=middle><b><font face="Traditional Arabic" size=2 color="#000000">&#1575;&#1604;&#1601;&#1602;&#1607;</font></b></td>
		<td style="border:1px solid #000000" align="center" valign=bottom sdval="86" sdnum="1033;"><b> 
			{{-- fiqih --}}
			<?php $nilai=$nilaiaktif->where('mapel_id',3)->first();?>
			@if($nilai!=null)				{{ round($nilai->rataRata)}}@endif
		</font></b></td>
		<td style="border:1px solid #000000" colspan=3 align="left" valign=bottom><b> 
			<?php $nilai=$nilaiaktif->where('mapel_id',3)->first();?>
			@if($nilai!=null){{ terbilang($nilai->rataRata)}}@endif</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="79" sdnum="1033;"><b> 
			<?php $nilai=$nilaiaktif->where('mapel_id',3)->first();?>
			@if($nilai!=null){{ round($nilai->rataRataKelas)}}@endif
		</font></b></td>
	</tr>
	<tr>
		<td style="border:1px solid #000000" align="center" valign=middle sdval="7" sdnum="1033;"><b> 7</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="left" valign=bottom><b> Sejarah Islam/Siroh</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="right" valign=middle><b><font face="Traditional Arabic" size=2 color="#000000">&#1575;&#1604;&#1587;&#1610;&#1600;&#1600;&#1600;&#1585;&#1577;</font></b></td>
		<td style="border:1px solid #000000" align="center" valign=bottom sdval="91" sdnum="1033;"><b> 
			{{-- sirah --}}
			<?php $nilai=$nilaiaktif->where('mapel_id',7)->first();?>
			@if($nilai!=null)				{{ round($nilai->rataRata)}}@endif
		</font></b></td>
		<td style="border:1px solid #000000" colspan=3 align="left" valign=bottom><b> 
			<?php $nilai=$nilaiaktif->where('mapel_id',7)->first();?>
			@if($nilai!=null){{ terbilang($nilai->rataRata)}}@endif</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="75" sdnum="1033;"><b> 
			<?php $nilai=$nilaiaktif->where('mapel_id',7)->first();?>
			@if($nilai!=null){{ round($nilai->rataRataKelas)}}@endif
		</font></b></td>
	</tr>
	<tr>
		<td style="border:1px solid #000000" align="center" valign=middle sdval="8" sdnum="1033;"><b> 8</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="left" valign=bottom><b> Tafsir</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="right" valign=middle><b><font face="Traditional Arabic" size=2 color="#000000">&#1575;&#1604;&#1578;&#1601;&#1587;&#1600;&#1600;&#1600;&#1600;&#1600;&#1610;&#1585;</font></b></td>
		<td style="border:1px solid #000000" align="center" valign=bottom><b> 
			{{-- tafsir --}}
			<?php $nilai=$nilaiaktif->where('mapel_id',12)->first();?>
			@if($nilai!=null)				{{ round($nilai->rataRata)}}@endif
		</font></b></td>
		<td style="border:1px solid #000000" colspan=3 align="left" valign=bottom><b> 
			<?php $nilai=$nilaiaktif->where('mapel_id',12)->first();?>
			@if($nilai!=null){{ terbilang($nilai->rataRata)}}@endif</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom><b> 
			<?php $nilai=$nilaiaktif->where('mapel_id',12)->first();?>
			@if($nilai!=null){{ round($nilai->rataRataKelas)}}@endif
		</font></b></td>
	</tr>
	<tr>
		<td style="border:1px solid #000000" align="center" valign=middle sdval="8" sdnum="1033;"><b> 9</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="left" valign=bottom><b> <p>  Manhaj<p></font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="right" valign=middle><b><font face="Traditional Arabic" size=2 color="#000000">&#1575;&#1604;&#1605;&#1606;&#1607;&#1580;</font></b></td>
		<td style="border:1px solid #000000" align="center" valign=bottom><b> 
			{{-- manhaj --}}
			<?php $nilai=$nilaiaktif->where('mapel_id',13)->first();?>
			@if($nilai!=null)				{{ round($nilai->rataRata)}}@endif
		</font></b></td>
		<td style="border:1px solid #000000" colspan=3 align="left" valign=bottom><b> 
			<?php $nilai=$nilaiaktif->where('mapel_id',13)->first();?>
			@if($nilai!=null){{ terbilang($nilai->rataRata)}}@endif</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom><b> 
			<?php $nilai=$nilaiaktif->where('mapel_id',13)->first();?>
			@if($nilai!=null){{ round($nilai->rataRataKelas)}}@endif
		</font></b></td>
	</tr>
	
	<tr>
		<td style="border:1px solid #000000" rowspan=6 height="128" align="center" valign=middle><b> II</font></b></td>
		<td style="border:1px solid #000000" rowspan=6 align="center" valign=middle><b> ILMU BAHASA</font></b></td>
		<td style="border:1px solid #000000" align="center" valign=middle sdval="10" sdnum="1033;"><b> 10</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="left" valign=bottom><b> Nahwu</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="right" valign=middle><b><font face="Traditional Arabic" size=2 color="#000000">&#1575;&#1604;&#1606;&#1581;&#1608;</font></b></td>
		<td style="border:1px solid #000000" align="center" valign=bottom sdval="60" sdnum="1033;"><b> 
			{{-- nahwu --}}
			<?php $nilai=$nilaiaktif->where('mapel_id',14)->first();?>
			@if($nilai!=null)				{{ round($nilai->rataRata)}}@endif	
		</font></b></td>
		<td style="border:1px solid #000000" colspan=3 align="left" valign=bottom><b> 
			<?php $nilai=$nilaiaktif->where('mapel_id',14)->first();?>
			@if($nilai!=null){{ terbilang($nilai->rataRata)}}@endif</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="71.52" sdnum="1033;"><b> 
			<?php $nilai=$nilaiaktif->where('mapel_id',14)->first();?>
			@if($nilai!=null){{ round($nilai->rataRataKelas)}}@endif
		</font></b></td>
	</tr>
	<tr>
		<td style="border:1px solid #000000" align="center" valign=middle sdval="11" sdnum="1033;"><b> 11</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="left" valign=bottom><b> Sharf</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="right" valign=middle><b><font face="Traditional Arabic" size=2 color="#000000">&#1575;&#1604;&#1589;&#1585;&#1601;</font></b></td>
		<td style="border:1px solid #000000" align="center" valign=bottom><b> 
			{{-- sharf --}}
			<?php $nilai=$nilaiaktif->where('mapel_id',15)->first();?>
			@if($nilai!=null)				{{ round($nilai->rataRata)}}@endif
		</font></b></td>
		<td style="border:1px solid #000000" colspan=3 align="left" valign=bottom><b> 
			<?php $nilai=$nilaiaktif->where('mapel_id',15)->first();?>
			@if($nilai!=null){{ terbilang($nilai->rataRata)}}@endif</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom><b> 
			
			<?php $nilai=$nilaiaktif->where('mapel_id',15)->first();?>
			@if($nilai!=null){{ round($nilai->rataRataKelas)}}@endif
		</font></b></td>
	</tr>
	<tr>
		<td style="border:1px solid #000000" align="center" valign=middle sdval="12" sdnum="1033;"><b> 12</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="left" valign=bottom><b> Muhadatsah</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="right" valign=middle><b><font face="Traditional Arabic" size=2 color="#000000">&#1575;&#1604;&#1605;&#1581;&#1575;&#1583;&#1579;&#1577;</font></b></td>
		<td style="border:1px solid #000000" align="center" valign=bottom sdval="90" sdnum="1033;"><b> 
			{{-- muhadatsah --}}
			<?php $nilai=$nilaiaktif->where('mapel_id',27)->first();?>
			@if($nilai!=null)				{{ round($nilai->rataRata)}}@endif
		</font></b></td>
		<td style="border:1px solid #000000" colspan=3 align="left" valign=bottom><b> 
			<?php $nilai=$nilaiaktif->where('mapel_id',27)->first();?>
			@if($nilai!=null){{ terbilang($nilai->rataRata)}}@endif</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="78.69" sdnum="1033;"><b> 
			<?php $nilai=$nilaiaktif->where('mapel_id',27)->first();?>
			@if($nilai!=null){{ round($nilai->rataRataKelas)}}@endif
		</font></b></td>
	</tr>
	<tr>
		<td style="border:1px solid #000000" align="center" valign=middle sdval="13" sdnum="1033;"><b> 13</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="left" valign=bottom><b> Khot / Imla'</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="right" valign=middle><b><font face="Traditional Arabic" size=2 color="#000000"> &#1575;&#1604;&#1582;&#1591; &#1575;&#1604;&#1593;&#1585;&#1576;&#1610; &#1608; &#1575;&#1604;&#1573;&#1605;&#1604;&#1575;&#1569;</font></b></td>
		<td style="border:1px solid #000000" align="center" valign=bottom sdval="60" sdnum="1033;"><b> 
			{{-- khot --}}
			<?php $nilai=$nilaiaktif->where('mapel_id',17)->first();?>
			@if($nilai!=null)				{{ round($nilai->rataRata)}}@endif
		</font></b></td>
		<td style="border:1px solid #000000" colspan=3 align="left" valign=bottom><b> 
			<?php $nilai=$nilaiaktif->where('mapel_id',17)->first();?>
			@if($nilai!=null){{ terbilang($nilai->rataRata)}}@endif</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="67.63" sdnum="1033;"><b> 
			<?php $nilai=$nilaiaktif->where('mapel_id',17)->first();?>
			@if($nilai!=null){{ round($nilai->rataRataKelas)}}@endif
		</font></b></td>
	</tr>
	<tr>
		<td style="border:1px solid #000000" align="center" valign=middle sdval="14" sdnum="1033;"><b> 14</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="left" valign=bottom><b> Tathbiqul Qiro'ah</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="right" valign=middle>
		<b><font face="Traditional Arabic" size=2 color="#000000">التفســـــير	</font></b></td>
		<td style="border:1px solid #000000" align="center" valign=bottom><b> 
			{{-- tatbiqul qiroah --}}
			<?php $nilai=$nilaiaktif->where('mapel_id',18)->first();?>
			@if($nilai!=null)				{{ round($nilai->rataRata)}}@endif
		</font></b></td>
		<td style="border:1px solid #000000" colspan=3 align="left" valign=bottom><b> 
			<?php $nilai=$nilaiaktif->where('mapel_id',18)->first();?>
			@if($nilai!=null){{ terbilang($nilai->rataRata)}}@endif</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom><b> 
			<?php $nilai=$nilaiaktif->where('mapel_id',18)->first();?>
			@if($nilai!=null){{ round($nilai->rataRataKelas)}}@endif
		</font></b></td>
	</tr>
	<tr>
		<td style="border:1px solid #000000" align="center" valign=middle sdval="15" sdnum="1033;"><b> 15</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="left" valign=bottom><b> Durusul Lughoh</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="right" valign=middle><b><font face="Traditional Arabic" size=2 color="#000000">&#1583;&#1585;&#1608;&#1587; &#1575;&#1604;&#1604;&#1594;&#1577; &#1575;&#1604;&#1593;&#1585;&#1576;&#1610;&#1577;</font></b></td>
		<td style="border:1px solid #000000" align="center" valign=bottom sdval="62" sdnum="1033;"><b> 
			{{-- durusul lughoh --}}
			<?php $nilai=$nilaiaktif->where('mapel_id',19)->first();?>
			@if($nilai!=null)				{{ round($nilai->rataRata)}}@endif
		</font></b></td>
		<td style="border:1px solid #000000" colspan=3 align="left" valign=bottom><b> 
			<?php $nilai=$nilaiaktif->where('mapel_id',19)->first();?>
			@if($nilai!=null){{ terbilang($nilai->rataRata)}}@endif</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="69.66" sdnum="1033;"><b> 
			<?php $nilai=$nilaiaktif->where('mapel_id',19)->first();?>
			@if($nilai!=null){{ round($nilai->rataRataKelas)}}@endif
		</font></b></td>
	</tr>
	<tr>
		<td style="border:1px solid #000000" rowspan=9 height="192" align="center" valign=middle><b> III</font></b></td>
		<td style="border:1px solid #000000" rowspan=9 align="center" valign=middle><b> ILMU UMUM</font></b></td>
		<td style="border:1px solid #000000" align="right" valign=bottom sdval="16" sdnum="1033;"><b> 16</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="left" valign=bottom><b> Bahasa Indonesia</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="right" valign=middle><b><font face="Traditional Arabic" size=2 color="#000000">&#1575;&#1604;&#1604;&#1594;&#1577; &#1575;&#1604;&#1573;&#1606;&#1583;&#1608;&#1606;&#1610;&#1587;&#1600;&#1600;&#1600;&#1600;&#1610;&#1577;</font></b></td>
		<td style="border:1px solid #000000" align="center" valign=bottom><b> 
			{{-- b indo --}}
			<?php $nilai=$nilaiaktif->where('mapel_id',20)->first();?>
			@if($nilai!=null)				{{ round($nilai->rataRata)}}@endif
		</font></b></td>
		<td style="border:1px solid #000000" colspan=3 align="left" valign=bottom><b> 
			<?php $nilai=$nilaiaktif->where('mapel_id',20)->first();?>
			@if($nilai!=null){{ terbilang($nilai->rataRata)}}@endif</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom><b> 
			<?php $nilai=$nilaiaktif->where('mapel_id',20)->first();?>
			@if($nilai!=null){{ round($nilai->rataRataKelas)}}@endif
		</font></b></td>
	</tr>
	<tr>
		<td style="border:1px solid #000000" align="right" valign=bottom sdval="17" sdnum="1033;"><b> 17</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="left" valign=bottom><b> PKn</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="right" valign=middle><b><font face="Traditional Arabic" size=2 color="#000000">&#1575;&#1604;&#1578;&#1585;&#1576;&#1610;&#1577; &#1575;&#1604;&#1608;&#1591;&#1606;&#1610;&#1577;</font></b></td>
		<td style="border:1px solid #000000" align="center" valign=bottom><b> 
			{{-- pkn --}}
			<?php $nilai=$nilaiaktif->where('mapel_id',21)->first();?>
			@if($nilai!=null)				{{ round($nilai->rataRata)}}@endif</font></b></td>

		<td style="border:1px solid #000000" colspan=3 align="left" valign=bottom><b> 
			<?php $nilai=$nilaiaktif->where('mapel_id',21)->first();?>
			@if($nilai!=null){{ terbilang($nilai->rataRata)}}@endif</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom><b> 
			<?php $nilai=$nilaiaktif->where('mapel_id',21)->first();?>
			@if($nilai!=null){{ round($nilai->rataRataKelas)}}@endif</font></b></td>
	</tr>
	<tr>
		<td style="border:1px solid #000000" align="right" valign=bottom sdval="18" sdnum="1033;"><b> 18</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="left" valign=bottom><b> Matematika</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="right" valign=middle><b><font face="Traditional Arabic" size=2 color="#000000">&#1575;&#1604;&#1585;&#1610;&#1575;&#1590;&#1600;&#1600;&#1600;&#1610;&#1575;&#1578;</font></b></td>
		<td style="border:1px solid #000000" align="center" valign=bottom><b> 
			{{-- mtk --}}
			<?php $nilai=$nilaiaktif->where('mapel_id',22)->first();?>
			@if($nilai!=null)				{{ round($nilai->rataRata)}}@endif</font></b></td>
		<td style="border:1px solid #000000" colspan=3 align="left" valign=bottom><b> 
			<?php $nilai=$nilaiaktif->where('mapel_id',22)->first();?>
			@if($nilai!=null){{ terbilang($nilai->rataRata)}}@endif</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom><b> 
			<?php $nilai=$nilaiaktif->where('mapel_id',22)->first();?>
			@if($nilai!=null){{ round($nilai->rataRataKelas)}}@endif</font></b></td>
	</tr>
	<tr>
		<td style="border:1px solid #000000" align="right" valign=bottom sdval="19" sdnum="1033;"><b> 19</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="left" valign=bottom><b> IPA</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="right" valign=middle><b><font face="Traditional Arabic" size=2 color="#000000">&#1575;&#1604;&#1593;&#1604;&#1608;&#1605; &#1575;&#1604;&#1591;&#1576;&#1610;&#1593;&#1600;&#1600;&#1600;&#1600;&#1600;&#1600;&#1610;&#1577;</font></b></td>
		<td style="border:1px solid #000000" align="center" valign=bottom><b> 
			{{-- ipa --}}
			<?php $nilai=$nilaiaktif->where('mapel_id',23)->first();?>
			@if($nilai!=null)				{{ round($nilai->rataRata)}}@endif</font></b></td>
		<td style="border:1px solid #000000" colspan=3 align="left" valign=bottom><b> 
			<?php $nilai=$nilaiaktif->where('mapel_id',23)->first();?>
			@if($nilai!=null){{ terbilang($nilai->rataRata)}}@endif</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom><b> 
			<?php $nilai=$nilaiaktif->where('mapel_id',23)->first();?>
			@if($nilai!=null){{ round($nilai->rataRataKelas)}}@endif</font></b></td>
	</tr>
	<tr>
		<td style="border:1px solid #000000" align="right" valign=bottom sdval="20" sdnum="1033;"><b> 20</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="left" valign=bottom><b> IPS</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="right" valign=middle><b><font face="Traditional Arabic" size=2 color="#000000">&#1575;&#1604;&#1593;&#1604;&#1608;&#1605; &#1575;&#1604;&#1575;&#1580;&#1578;&#1605;&#1575;&#1593;&#1600;&#1600;&#1600;&#1600;&#1610;&#1577;</font></b></td>
		<td style="border:1px solid #000000" align="center" valign=bottom><b> 
			{{-- ips --}}
			<?php $nilai=$nilaiaktif->where('mapel_id',24)->first();?>
			@if($nilai!=null)				{{ round($nilai->rataRata)}}@endif</font></b></td>
		<td style="border:1px solid #000000" colspan=3 align="left" valign=bottom><b> 
			<?php $nilai=$nilaiaktif->where('mapel_id',24)->first();?>
			@if($nilai!=null){{ terbilang($nilai->rataRata)}}@endif</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom><b> 
			<?php $nilai=$nilaiaktif->where('mapel_id',24)->first();?>
			@if($nilai!=null){{ round($nilai->rataRataKelas)}}@endif</font></b></td>
	</tr>
	<tr>
		<td style="border:1px solid #000000" align="right" valign=bottom sdval="21" sdnum="1033;"><b> 21</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="left" valign=bottom><b> Bahasa Inggris</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="right" valign=middle><b><font face="Traditional Arabic" size=2 color="#000000">&#1575;&#1604;&#1604;&#1594;&#1577; &#1575;&#1604;&#1573;&#1606;&#1580;&#1604;&#1610;&#1586;&#1610;&#1577;</font></b></td>
		<td style="border:1px solid #000000" align="center" valign=bottom><b> 
			{{-- b ing --}}
			<?php $nilai=$nilaiaktif->where('mapel_id',1)->first();?>
			@if($nilai!=null)				{{ round($nilai->rataRata)}}@endif</font></b></td>
		<td style="border:1px solid #000000" colspan=3 align="left" valign=bottom><b> 
			<?php $nilai=$nilaiaktif->where('mapel_id',1)->first();?>
			@if($nilai!=null){{ terbilang($nilai->rataRata)}}@endif
			</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom><b> 
			<?php $nilai=$nilaiaktif->where('mapel_id',1)->first();?>
			@if($nilai!=null){{ round($nilai->rataRataKelas)}}@endif</font></b></td>
	</tr>
	<tr>
		<td style="border:1px solid #000000" align="right" valign=bottom sdval="22" sdnum="1033;"><b> 22</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="left" valign=bottom><b> Penjaskes</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="right" valign=middle><b><font face="Traditional Arabic" size=2 color="#000000">&#1575;&#1604;&#1585;&#1610;&#1575;&#1590;&#1577; &#1575;&#1604;&#1576;&#1583;&#1606;&#1610;&#1577;</font></b></td>
		<td style="border:1px solid #000000" align="center" valign=bottom><b> 
			{{-- penjas --}}
			<?php $nilai=$nilaiaktif->where('mapel_id',28)->first();?>
			@if($nilai!=null)				{{ round($nilai->rataRata)}}@endif</font></b></td>
		<td style="border:1px solid #000000" colspan=3 align="left" valign=bottom><b> 
			<?php $nilai=$nilaiaktif->where('mapel_id',28)->first();?>
			@if($nilai!=null){{ terbilang($nilai->rataRata)}}@endif</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom><b> 
			<?php $nilai=$nilaiaktif->where('mapel_id',28)->first();?>
			@if($nilai!=null){{ round($nilai->rataRataKelas)}}@endif</font></b></td>
	</tr>
	<tr>
		<td style="border:1px solid #000000" align="right" valign=bottom sdval="23" sdnum="1033;"><b> 23</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="left" valign=bottom><b> <br></font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="right" valign=middle><b><font face="Traditional Arabic" size=2 color="#000000"><br></font></b></td>
		<td style="border:1px solid #000000" align="center" valign=bottom><b> <br></font></b></td>
		<td style="border:1px solid #000000" colspan=3 align="center" valign=bottom><b> <br></font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom><b> <br></font></b></td>
	</tr>
	<tr>
		<td style="border:1px solid #000000" align="right" valign=bottom sdval="24" sdnum="1033;"><b> 24</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="left" valign=bottom><b> -</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="right" valign=middle><b><font face="Traditional Arabic" size=2 color="#000000">-</font></b></td>
		<td style="border:1px solid #000000" align="center" valign=bottom><b> <br></font></b></td>
		<td style="border:1px solid #000000" colspan=3 align="left" valign=bottom><b> <br></font></b></td>
		<td style="border:1px solid #000000" align="center" valign=bottom><b> <br></font></b></td>
	</tr>
	<tr>
		<td style="border:1px solid #000000" colspan=5 height="21" align="left" valign=middle><b> JUMLAH</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="right" valign=middle><b><font face="Traditional Arabic" size=2 color="#000000">&#1605;&#1580;&#1605;&#1608;&#1593; &#1575;&#1604;&#1583;&#1585;&#1580;&#1575;&#1578;</font></b></td>
		<td style="border:1px solid #000000" align="center" valign=bottom sdval="938" sdnum="1033;"><b> 
			{{-- jumlah --}}
			{{round($nilaiaktif->sum('rataRata'))}}
		</font></b></td>
		<td style="border:1px solid #000000" colspan=3 align="left" valign=bottom><b> 
			{{terbilang($nilaiaktif->sum('rataRata'))}}	
		</font></b></td>
		<td style="border:1px solid #000000" align="center" valign=bottom><b> <br></font></b></td>
	</tr>
	<tr>
		<td style="border:1px solid #000000" colspan=5 height="23" align="left" valign=middle><b> NILAI RATA-RATA</font></b></td>
		<td style="border:1px solid #000000" colspan=2 align="right" valign=middle><b><font face="Traditional Arabic" size=2 color="#000000">&#1605;&#1593;&#1583;&#1604; &#1575;&#1604;&#1578;&#1585;&#1575;&#1603;&#1605;&#1610;</font></b></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="78.16" sdnum="1033;0;0.0"><b> 
			{{-- Rata rata --}}
			{{round($nilaiaktif->avg('rataRata'),2)}}
		</font></b></td>
		<td style="border:1px solid #000000" colspan=3 align="left" valign=bottom><b> 
			{{terbilang(round($nilaiaktif->avg('rataRata'),2))}}	
		</font></b></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdnum="1033;0;0.0"><b> <br></font></b></td>
	</tr>
	<tr>
		<td style="border:1px solid #000000" colspan=12 height="23" align="center" valign=middle><b> PERINGKAT KE :        ...  ...   (  )       dari  &hellip;&hellip;  santri         </font></b></td>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000" colspan=12 height="23" align="center" valign=middle><b> <br></font></b></td>
		</tr>
</table>
<table id="bawah">
	<tr>
		<td class="noekskul" style="border:1px solid #000000" align="center"><b> NO.</font></b></td>
		{{-- <td>No</td> --}}
		<td class="ekskul" style="border:1px solid #000000" colspan=4 align="center" valign=middle><b> KEGIATAN EKSTRAKURIKULER</font></b></td>
		<td class="nilaiekskul" style="border:1px solid #000000" align="center" valign=middle><b> NILAI</font></b></td>
		<td align="center" style="width: 40px;" valign=middle><b> <br></font></b></td>
		<td style="border:1px solid #000000; width:355px;" colspan="6" align="center" valign=middle><b> KETIDAKHADIRAN</font></b></td>
		</tr>
	<tr>
		<td style="border:1px solid #000000; height:25px;" align="center" ><b> 1</font></b></td>
		<td style="border:1px solid #000000" colspan=4 align="center" valign=middle><b> <br></font></b></td>
		<td style="border:1px solid #000000" align="center" valign=middle><b> <br></font></b></td>
		<td align="center" valign=middle><b> <br></font></b></td>
		<td style="border:1px solid #000000; padding-left:10px;" colspan=4 align="left" valign=middle><b> SAKIT   (S)</font></b></td>
		<td style="border:1px solid #000000; width:100px;" align="center" valign=middle><b> <br></font></b></td>
	</tr>
	<tr>
		<td style="border:1px solid #000000; height:25px;" align="center" ><b> 2</font></b></td>
		<td style="border:1px solid #000000" colspan=4 align="center" valign=middle><b> <br></font></b></td>
		<td style="border:1px solid #000000" align="center" valign=middle><b> <br></font></b></td>
		<td align="center" valign=middle><b> <br></font></b></td>
		<td style="border:1px solid #000000; padding-left:10px;" colspan=4 align="left" valign=middle><b> IZIN      (I)</font></b></td>
		<td style="border:1px solid #000000" align="center" valign=middle><b> <br></font></b></td>
	</tr>
	<tr>
		<td style="border:1px solid #000000; height:25px;" align="center" ><b>3</font></b></td>
		<td style="border:1px solid #000000" colspan=4 align="center" valign=middle><b> <br></font></b></td>
		<td style="border:1px solid #000000" align="center" valign=middle><b> <br></font></b></td>
		<td align="center" valign=middle><b> <br></font></b></td>
		<td style="border:1px solid #000000; padding-left:10px;" colspan=4 align="left" valign=middle><b> ALFA    (A)</font></b></td>
		<td style="border:1px solid #000000" align="center" valign=middle><b> <br></font></b></td>
	</tr>
{{-- </table>
<br>
<table > --}}
	<tr>
		<td height="10px"></td>
	</tr>
	<tr>
		<td colspan="12" style="border:1px solid black; width:810px" align="center" valign=middle><b> CATATAN UNTUK DIPERHATIKAN WALI SANTRI:</font></b></td>
	</tr>
	<tr>
		<td colspan="12" style="border:1px solid black; width:810px" height="70" align="left" valign=bottom><b>   </font></b></td>
	</tr>
</table>
<br>
<table  style="margin-left: 600px">
	<tr>
		<td style="padding-right: 20px" ><b> DIBERIKAN DI</font></b></td>
		<td><b> :</font></b></td>
		<td style="padding-left: 5px"><b> TALANG BELIDO</font></b></td>
	</tr>
	<tr>
		<td ><b> TANGGAL</font></b></td>
		<td ><b> :</font></b></td>
		<td style="padding-left: 5px" sdval="43814" sdnum="1033;1057;DD MMMM YYYY;@"><b> {{$tanggal->isoFormat('D MMMM YYYY')}}</font></b></td>
	</tr>
</table>
<br>
<table>
	<tr>
		<td align="center" height="30" colspan="3" style="width: 800px"> MENGETAHUI</td>
	</tr>
	<tr>
		<td height="100" align="center" valign=top> WALI SANTRI/ORANG TUA</font></td>
		<td  align="center" valign=top> KEPALA SEKOLAH</font></td>
		<td  align="center" valign=top> WALI KELAS</font></td>
	</tr>
	
	<tr>
		<td align="center" height="21" align="center" valign=bottom> (.............................................)</font></td>
		<td align="center" valign=bottom><b> HERY WANDRISAL, S.H</font></b></td>
		<td align="center" valign=bottom><b> {{$kelas->waliKelas}}</font></b></td>
	</tr>
</table>
<!-- ************************************************************************** -->
</body>

</html>
