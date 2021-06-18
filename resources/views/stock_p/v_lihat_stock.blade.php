<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <title>Pegawai | Capulus Caelum</title>
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
                        <a class="nav-link" href="{{url('/pegawai/pesanan/vieworder') }}">Order</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Stok Barang
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{url('/pegawai/barang/viewstock') }}">Stock Now</a></li>
                            <li><a class="dropdown-item" href="{{url('/pegawai/barang/addstock') }}">Stock In</a></li>
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
            <p><h2 align ="center">Goods Stock</h2></p>
            <form class="form-inline my-2 my-lg-0 ml-auto" method="GET" action="/pegawai/barang/searchstock">
            <h1 class="mt-2 mr-3 text-muted">Search</h1>
            <tr>
            <th><input class="form-control mr-sm-2" type="search" name="q" value="@php echo old('cari') @endphp"  placeholder="Search" aria-label="Search"></th>
            <th><button class="btn btn-outline-dark my-2 my-sm-0" type="submit" data-toggle="tooltip" title="Search">Cari<i class="fas fa-search" ></i></button></th>
            </tr>
            </form>
            <br />
            
                <a href="/pegawai/barang/addstock" class="btn btn-success" data-toggle="tooltip" title="Add" style="background-color: #CBAB8F" > [+] Stock </i></a>
            <table class="table table-hover">
            <tr>
            <th>No</th>
            <th>Code</th>
            <th>Name</th>
            <th>Stock</th>
            <th>Purchase</th>
            <th>Selling</th>
            </tr>

            <!--@php
            $no=1;
            @endphp-->
            @foreach($Barang as $no=> $p)
            <tr>
            <th scope="row"><?php echo ++$no + ($Barang->currentPage()-1)*$Barang->perPage() ?></th>
            <td>{{ $p->id_brg}}</td>
            <td>{{ $p->nama_brg}}</td>
            <td>{{ $p->stok}}</td>
            <td>{{ $p->hrg_bsat}}</td>
            <td>{{ $p->hrg_jsat}}</td>
            <td>
                <a href="/pegawai/barang/editstock/{{ $p->id_brg}}" class="btn btn-success " data-toggle="tooltip" title="Delete" style="background-color: #CBAB8F" > [-] Edit </i></a>
            </td>
            <td>
                <a href="/pegawai/barang/deletestock/{{ $p->id_brg}}" class="btn btn-success delete" data-toggle="tooltip" title="Delete" style="background-color: #CBAB8F" > [x] Delete </i></a>
            </td>
            </tr>
            @endforeach
            
            </table>
            <tr>@php echo $Barang->links() @endphp</tr>
            <!-- End Table -->


            <!-- Pagination -->
            <!-- Total Data Barang: @php echo $Barang->total() @endphp -->
            <!-- End Pagination -->
        </div>
        </div>
        </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </tbody>
</html>

