<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Tiket Antrian</title>
    <style>
        body {
            font-family: sans-serif;
            text-align: center;
            margin-top: 100px;
        }

        .nomor {
            font-size: 100px;
            font-weight: bold;
        }

        .tanggal {
            font-size: 24px;
            margin-top: 20px;
        }

        .instansi {
            font-size: 18px;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="nomor">{{ $nomor }}</div>
    <div class="tanggal">{{ $tanggal }}</div>
    <div class="instansi">{{ $instansi }}</div>
</body>

</html>