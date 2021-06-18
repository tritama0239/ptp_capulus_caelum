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

    <section class="jumbotron " >
        <div class="container" style="background-color: #E7D8CF" > 
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card-header" align="center"><h3> Input Pesanan </h3></div>

                    <div class="card-body">
                    <form method="POST" action="/pegawai/pesanan/saveorder">
                    @csrf
                    <div class="col-md-6">

                        <div class="form-group">
                            <input type="hidden" class="form-control" name="id" id="id" value="{{ Auth::user()->id }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="" class="font-weight-bold">Pelanggan</label>
                            <input type="text" class="form-control" name="nama_cus" id="nama_cus" >
                        </div>

                        <div class="form-group">
                            <label for="" class="font-weight-bold">Pilih Item</label>
                            
                            <select class="form-control" name="id_brg" id="id_brg" onchange="">
				 			<option disabled selected> - - Item - - </option>
                            @foreach($Barang as $p)
				      		<option value="{{ $p->id_brg }}" > {{ DB::table('barang')->select('nama_brg')->where('id_brg', $p->id_brg)->value('id_brg') }} </option>
				      	    @endforeach
                            </select> 
                        </div>

                        <div class="form-group">
                            <label for="" class="font-weight-bold">Harga Item</label>
                            <input type="" class="form-control" name="hrg_jsat" id="hrg_jsat" value="">
                        </div>

                        <div class="form-group">
                            <label for="" class="font-weight-bold">Jumlah Item</label>
                            <input type="number" class="form-control" name="jlh_item" id="jlh_item" >
                        </div>

                        <div class="form-group">
                            <label for="" class="font-weight-bold">Total Harga</label>
                            <input type="number" class="form-control" name="total_hrg" id="total_hrg">
                        </div>
                    </div><br>
                    
                    <button type="submit" class="btn btn-primary" style="background-color: #CBAB8F">[+] Add Order</button>
                </form>
                <!-- End Form -->
                
                </div>
            </div>
        </div>  
        </div>
    
    </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    
    </body>
</html>