@extends('layouts.app')
@section('content')
<div class="row justify-content-md-center">
    <div class="col-lg-12">
        <div class="card card-olive">
            <div class="card-header text-center">
            <h3><b>Halaman Daftar Barang</b></h3>
            </div>

            <div class="card-body text-dark">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card card-success card-outline">
                            <div class="card-header ">
                                <h5 class="card-title"><b>Form Tambah Produk</b></h5>
                            </div>
                            {!! Form::open(['route' => 'produk.store', 'enctype'=> 'multipart/form-data', 'files' => true])!!}
                                 @include('produk._form')
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="card card-primary card-outline">
                            <div class="card-header text-center ">
                                <div >
                                    <h5 class="card-title"><b>Data Daftar Barang</b></h5>
                                </div>
                                <div class="card-tools">
                                    {!! Form::open(['url' => 'produk', 'method'=>'get'])!!}
                                    <div class="input-group input-group-sm {!! $errors->has('q') ? 'has-error' : ''!!}" style="width: 150px;">
                                    
                                        {!! Form::text('q', isset($q) ? $q : null, ['class'=>'form-control float-right','placeholder' => 'Cari']) !!}
                                        {!! $errors->first('q', '<p class="help-block">:message</p>') !!}
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>      

                                    </div>
                                    {!! Form::close() !!} 
                                </div>
                            </div>
                            <div class="card-body table-responsive p-0" style="height: 430px;">
                                        <!--Tabel Transaksi-->
                                <table class="table table-striped table-hover product-descriptiontable-head-fixed text-nowrap">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No.</th>
                                            <th>Foto Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Kategori</th>
                                            <th>Harga</th>
                                            <th>Diskon</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    <?php $i=0; $discount=0; ?>
                                    @foreach($produk as $produks)
                                        <?php $i++;
                                        $i++;
                                        if($produks->harga_p>40000){
                                            $discount= $produks->harga_p*10/100;
    
                                        }elseif($produks->harga_p>20000 AND $produks->harga_p <= 40000 ){
                                            $discount= $produks->harga_p*5/100;
                                        }else{
                                            $discount=0;
                                        }
                                        ?>
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td><img src="<?= asset('img/'.$produks->photo) ?>"  width="50px"></td>
                                                <td>{{$produks->nama_p}}</td>
                                                <td>{{$produks->kategories->nama_kategori}}</td>
                                                <td>@currency($produks->harga_p)</td>
                                                <td>@currency($discount)</td>
                                                <td >
                                                    <div class="row justify-content-center">
                                                        {!! Form::model($produks, ['route' => ['produk.destroy', $produks], 'method' => 'delete', 'class' => 'form-inline'] ) !!}
                                                        <a href="{{ route('produk.edit', $produks->id)}}" class="btn btn-warning btn-sm text-white"><i class="fa fa-pencil-alt"></i></a>&nbsp; 
                                                        <button type="submit" class="btn btn-danger btn-sm text-white"><i class="fa fa-trash-alt"></i> </button>
                                                        {!! Form::close()!!}
                                                    </div>
                                                </td>
                                            </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection