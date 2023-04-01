<style>
    *{
        margin-left: auto;
        margin-right: auto;
        font-family: sans-serif;
    }

    table{
        border-collapse: collapse;
    }

    table tr td{
        padding-top:2px;
        padding-bottom:2px;
        padding-left:10px;
        padding-right:10px;
    }
</style>
<html>
<head>
    <title> Form Slip Gaji Karyawan</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<form method="post" action="uts_proses.php" style="padding-left:20px;padding-right:20px;padding-top:5px;padding-bottom:5px">
    <table>
        <tr>
            <td colspan="7" align="center" style="padding-bottom: 2px !important"><h3 style="margin-bottom: 1px !important">PT SELIM ELEKTRO<br></h3></td>
        </tr>
        <tr>
            <td colspan="7" align="center" style="padding-bottom: 2px !important"><h3 style="margin-bottom: 1px !important">SLIP GAJI KARYAWAN<br></h3></td>
        </tr>
        <tr>
            <td colspan="7" align="center" style="padding-top: 2px !important"><h5>Periode {{$data['bulan'].' - '.$data['tahun']}}<br></h5></td>
        </tr>
        <tr>
            <td width="200">ID Karyawan</td>
            <td>:</td>
            <td>
               {{$data['id_karyawan']}}
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td width="200">Nama Karyawan</td>
            <td>:</td>
            <td>
               {{$data['nama']}}
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td width="200">Bagian</td>
            <td>:</td>
            <td>
               {{$data['j_bagian']}}
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td width="200">Jabatan</td>
            <td>:</td>
            <td>
               {{$data['j_jabatan']}}
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td width="160" align="center" colspan="3" style="font-weight:bold;text-decoration:underline">PENDAPATAN</td>
            <td></td>
            <td width="160" align="center" colspan="3" style="font-weight:bold;text-decoration:underline"></td>
        </tr>
        <tr>
            <td>Gaji Pokok</td>
            <td>:</td>
            <td align="right"><?php echo number_format($data['gaji_pokok']); ?></td>
            <td width="150px"></td>
            <td><td>
            <td><td>
            <td><td>
        </tr>
        <tr>
            <td>Tj. Tetap</td>
            <td>:</td>
            <td align="right"><?php echo number_format($data['ttetap']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Tj. Jabatan</td>
            <td>:</td>
            <td align="right"><?php echo number_format($data['tjabatan']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Tj. Insentif</td>
            <td>:</td>
            <td align="right"><?php echo number_format($data['tinsentif']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            
        </tr>
        <tr>
            <td>Tj. Transport</td>
            <td>:</td>
            <td align="right"><?php echo number_format($data['ttransport']); ?></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Gaji Lembur</td>
            <td>:</td>
            <td align="right"><?php echo number_format($data['lembur']); ?></td>
            <td>X {{$data['total_lembur']}} Jam = <?php echo number_format($data['gaji_lembur']); ?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td align="center" colspan="7" style="font-weight:bold;text-decoration:underline;border-top:0.5px solid !important;"></td> 
        </tr>
        <tr>
            <td width="160" align="center" colspan="3" style="font-weight:bold;text-decoration:underline">Keterangan Absensi:</td>
            <td></td>
            <td width="160" align="center" colspan="3" style="font-weight:bold;text-decoration:underline"></td>
        </tr>
        <tr>
            <td>1. Masuk</td>
            <td>:</td>
            <td align="right">{{$data['masuk']}} Hari</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>2. Izin</td>
            <td>:</td>
            <td align="right">{{$data['izin']}} Hari</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>3. Sakit</td>
            <td>:</td>
            <td align="right">{{$data['sakit']}} Hari</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td align="center" colspan="7" style="font-weight:bold;text-decoration:underline;border-bottom:0.5px solid !important;"></td> 
        </tr>
        <tr>
            <td align="center" colspan="7" style="font-weight:bold;text-decoration:underline;border:0.5px solid !important;">TOTAL GAJI BERSIH : <?php echo number_format($data['gaji_bersih']); ?></td> 
        </tr>
    </table>
    <table>
        <tr>
            <td colspan="4"></td>
            <td  align="center">Brebes, {{$data['sekarang']}}</td>
        </tr>
        <tr>
            <td  height="80px" align="center" style="vertical-align: top;"></td>
            <td width="50px"></td>
            <td  align="center"style="vertical-align: top;"></td>
            <td width="50px"></td>
            <td align="center"style="vertical-align: top;">Karyawan</td>
        </tr>
        <tr>
            <td align="center"></td>
            <td width="50px"></td>
            <td  align="center"></td>
            <td width="50px"></td>
            <td  align="center">{{$data['nama']}}</td>
        </tr>
    </table>
</form>
</body>
</html>