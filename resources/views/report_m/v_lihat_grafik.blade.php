<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <title>Manager | Capulus Caelum</title>
        <style>
        body{
            background-image: url(image/bg2.png);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            height: 100%;
        }
        .title{
            text-align: center;
            font-size: 2.5em;
            color: #000;
        }
         
        </style>
    </head>

    <body class="antialiased">

    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #a37351">
        <div class="container">   
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ Auth::user()->level }}"><img src="{{ asset('image/logo1.png') }}" alt="" width="20%" height="20%"/></a>
                    </li>

                    <li class="nav-item">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    </li>
                </ul>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/manager/pesanan/vieworder') }}">Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/manager/barang/viewstock') }}">Stock</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Transaction
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{url('/manager/transaksi/viewreport') }}">Report</a></li>
                            <li><a class="dropdown-item" href="{{url('/manager/transaksi/viewgrafik') }}">Grafik</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a  class="dropdown-item" href="{{url('logout') }}"onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"> Log Out
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="jumbotron ">
        <div class="container" style="background-color: #E7D8CF" > 
        <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card-body">
            <p><h2 align ="center">List Reports</h2></p>
            <form class="form-inline my-2 my-lg-0 ml-auto" method="GET" action="/manager/barang/searchreport">
            <h1 class="mt-2 mr-3 text-muted">Search</h1>
            <tr>
            <th><input class="form-control mr-sm-2" type="search" name="q" value="@php echo old('cari') @endphp"  placeholder="Search" aria-label="Search"></th>
            <th><button class="btn btn-outline-dark my-2 my-sm-0" type="submit" data-toggle="tooltip" title="Search">Cari<i class="fas fa-search" ></i></button></th>
            </tr>
            </form>
            <br />
                <a href="/manager/transaksi/viewreport" class="btn btn-success refresh" data-toggle="tooltip" title="Print" style="background-color: #CBAB8F" > [ Refresh ]  </i></a>
                <a href="/manager/transaksi/viewreport/export2/" class="btn btn-success" data-toggle="tooltip" title="Print" style="background-color: #CBAB8F" > [ Print ]  </i></a>
            <table class="table table-hover">
            <th>Code</th>
        <th>No. Item</th>
        <th>Pengeluaran</th>
        <th>Pemasukkan</th>
        </tr>

        <!--@php
        $no=1;
        @endphp-->
        @foreach($Transaksi as $no=> $p)
        <tr>
        <td>{{ $p->id_trans}}</td>
        <td>{{ $p->id_brg}}</td>
        <td>{{ $p->modal}}</td>
        <td>{{ $p->pemasukkan}}</td>
        </tr>
        @endforeach
        </tbody>
        </table>
        <tr>
        </div>
        </div>
        <div class="panel">
            <div id="chartTransaksi"></div>
        </div>
        </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script> 
        Highcharts.chart('chartTransaksi', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Laporan Keuangan'
            },
            xAxis: {
                categories: {!!json_encode($bulan)!!},
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Rupiah (Rp)'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Modal',
                data: {!!json_encode($data)!!},

            }, {
                name: 'Pemasukkan',
                data: {!!json_encode($biaya)!!},

            }]
        });
    </script>
    </tbody>
</html>