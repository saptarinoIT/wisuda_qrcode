<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Undangan Wisuda STITEK Bontang</title>

    <style>
        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }
    </style>
</head>

<body>

    <div class="container"
        style="width: 80vw; text-align: center; margin: auto; height: 100vh; display: flex; align-items: center; justify-content: center; flex-direction: column;">
        <div class="box" style="padding: 10px 70px; width: 90vw; border: solid 1px black;">
            <img src="{{ asset('img/stitek3.png') }}" width="300">
            <p style="color: #676465; font-weight: 500; margin-bottom: 10px;">Ketua Sekolah Tinggi Teknologi Bontang
                <br>
                Mengundang dengan
                hormat Saudara/i
                untuk menghadiri
            </p>
            <h3 style="margin-bottom: 6px; color: #1354A2">SIDANG TERBUKA SENAT SEKOLAH TINGGI TEKNOLOGI BONTANG</h3>
            <h2 style="background: #1354A2; color: #ffffff; border-radius: 12px 12px 0 0;">WISUDA SARJANA XII TAHUN 2022
            </h2>
            <div style="color: #676465; margin: 10px 0 30px;">
                <p style="margin-bottom: 10px;">Yang akan dilaksanakan pada: </p>
                <p>Hari <span style="padding-left: 20px;">: Sabtu/19 November 2022</span></p>
                <p>Waktu <span style="padding-left: 20px;">: 17.00 WITA - Selesai</span></p>
                <p>Tempat <span style="padding-left: 20px;">: Hotel Equator Bontang</span></p>
                <p style="margin-top: 10px;">Atas kehadirannya kami sampaikan terima kasih</p>
            </div>
            <P style="margin-bottom: 4px; color: #1354A2; font-weight: 600;">Ketua</P>
            <p style="color: #1354A2; font-weight: 900; margin-bottom: 10px">Hardianto, S.T., M.Eng.</p>
            <img id='barcode' src="https://api.qrserver.com/v1/create-qr-code/?data={{ $nim }}"
                alt="" title="HELLO" width="100" height="100" />
        </div>
    </div>
</body>

</html>
