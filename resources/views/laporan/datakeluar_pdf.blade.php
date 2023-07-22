<!DOCTYPE html>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        table {
            border-spacing: 0;
            width: 100%;
        }

        th {
            background: #404853;
            background: linear-gradient(#687587, #404853);
            border-left: 1px solid rgba(0, 0, 0, 0.2);
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            color: #fff;
            padding: 8px;
            text-align: left;
            text-transform: uppercase;
        }

        th:first-child {
            border-top-left-radius: 4px;
            border-left: 0;
        }

        th:last-child {
            border-top-right-radius: 4px;
            border-right: 0;
        }

        td {
            border-right: 1px solid #c6c9cc;
            border-bottom: 1px solid #c6c9cc;
            padding: 8px;
        }

        td:first-child {
            border-left: 1px solid #c6c9cc;
        }

        tr:first-child td {
            border-top: 0;
        }

        tr:nth-child(even) td {
            background: #e8eae9;
        }

        tr:last-child td:first-child {
            border-bottom-left-radius: 4px;
        }

        tr:last-child td:last-child {
            border-bottom-right-radius: 4px;
        }

        img {
            width: 40px;
            height: 40px;
            border-radius: 100%;
        }

        .center {
            text-align: center;
        }

    </style>
    <link rel="stylesheet" href="">
    <title>Cetak Data</title>
</head>

<body>
    <h1 class="center">CETAK DATA</h1>
    <table id="pseudo-demo">
        <thead>
            <tr>
            <th>
                                    Nomor 
                                </th>
                                <th>
                                    Nomor Surat
                                </th>
                                <th>
                                    Pengirim 
                                </th>
                                <th>
                                    Perihal
                                </th>
                                <th>
                                    Tanggal Surat
                                </th>
                                <th>
                                    Status
                                </th>
                                </tr>
                        </thead>
                        <tbody>
                            @foreach($surat_keluar as $key => $surat_keluars)
                            <tr>
                                <td class="py-1">
                                    <a href="{{route('surat_keluar.show', $surat_keluars->id)}}">
                                        {{$surat_keluars->id}}
                                    </a>
                                </td>
                                <td>
                                    {{$surat_keluars->no_suratsk}}
                                </td>
                                <td>
                                    {{$surat_keluars->pengirimsk}}
                                </td>
                                <td>
                                    {{$surat_keluars->perihalsk}}
                                </td>
                                <td>
                                    {{$surat_keluars->tgl_sk}}
                                </td>
                                <td>
                                    @if($disposisi[$key] == 2) 
                                    <a style="color:green;"> Terdisposisi </a>
                                    @elseif($disposisi[$key] == 1)
                                    <a style="color:blue;"> Menunggu </a>
                                    @else
                                   <a style="color:red;"> Belum Terdisposisi</a>
                                   @endif($disposisi[$key] == 0)
                                </td>
            @endforeach
        </tbody>
    </table>
</body>

</html>
