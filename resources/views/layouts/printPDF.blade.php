<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #333;
            padding-bottom: 15px;
        }

        .header h1 {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .header h2 {
            margin: 5px 0;
            font-size: 14px;
            font-weight: normal;
            color: #666;
        }

        .info-section {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
        }

        .info-left,
        .info-right {
            width: 48%;
        }

        .info-item {
            margin-bottom: 5px;
        }

        .info-label {
            font-weight: bold;
            display: inline-block;
            width: 120px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #f8f9fa;
            font-weight: bold;
            text-align: center;
            font-size: 11px;
        }

        .table td {
            font-size: 10px;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .text-center {
            text-align: center;
        }

        .badge {
            background-color: #dc3545;
            color: white;
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 9px;
            font-weight: bold;
        }

        .footer {
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
            page-break-inside: avoid;
        }

        .signature-section {
            width: 45%;
            text-align: center;
        }

        .signature-line {
            border-top: 1px solid #333;
            margin-top: 60px;
            padding-top: 5px;
            font-weight: bold;
        }

        .page-break {
            page-break-before: always;
        }

        .summary {
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .summary-item {
            display: inline-block;
            margin-right: 20px;
            font-weight: bold;
        }

        @media print {
            body {
                padding: 10px;
            }
        }
    </style>
</head>

<body>

    @php
        $path = public_path('storage/' . setting('logo'));
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    @endphp

    <!-- Header -->
    <div class="header">
        <table width="100%">
            <tr>
                <td style="width: 50px;">
                    <img src="{{ $base64 }}" alt="Logo" width="70">
                </td>
                <td style="text-align: center;">
                    <h1 style="font-size: 1.4rem">KANTOR IMIGRASI KELAS I TPI BANJARMASIN</h1>
                    <h2>{{ setting('address') }}</h2>
                </td>
            </tr>
        </table>
    </div>

    <div style="text-align: center;font-size: 0.5rem;margin-bottom: 3rem;">
        <h1>@yield('title')</h1>
    </div>


    @yield('content')

    <table width="100%" style="margin-top: 50px;">
        <tr>
            <td align="right">
                Banjarmasin, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
            </td>
        </tr>
    </table>



    <!-- Footer with Signatures -->

    <table width="100%" style="margin-top: 50px;">
        <tr>
            <td align="center">
                Mengetahui,<br>
                <strong>Kepala Urusan Umum</strong><br><br><br><br><br>
                <br>
                <span style="font-size:12px;">{{ setting('kepala') }}</span>
            </td>
            <td align="center">
                Dibuat oleh,<br>
                <strong>Bendahara Penerima</strong><br><br><br><br><br>
                <br>
                <span style="font-size:12px;">Rizki Zulfa Meisyarah</span>
            </td>
        </tr>
    </table>

</body>

</html>
