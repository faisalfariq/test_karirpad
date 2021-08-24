@extends('layouts.app')
@section('content')
<div class="row justify-content-md-center">
    <div class="col-lg-12">
        <div class="card card-olive">
            <div class="card-header text-center">
            <h3><b>Halaman Daftar Kategori Barang</b></h3>
            </div>

            <div class="card-body text-dark">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card card-success card-outline">
                            <div class="card-header ">
                                <h5 class="card-title"><b>Form Tambah Kategori</b></h5>
                            </div>
                            {!! Form::open(['route' => 'kategori_produk.store', 'enctype'=> 'multipart/form-data', 'files' => true])!!}
                                 @include('kategori_produk._form')
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="card card-primary card-outline">
                            <div class="card-header text-center ">
                                <div >
                                    <h5 class="card-title"><b>Data Daftarkategori_produk</b></h5>
                                </div>
                                <div class="card-tools">
                                    {!! Form::open(['url' => 'kategori_produk', 'method'=>'get'])!!}
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
                            <div class="card-body table-responsive p-0" style="height: 180px;">
                                        <!--Tabel Transaksi-->
                                <table class="table table-striped table-hover product-descriptiontable-head-fixed text-nowrap">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    <?php $i=0; $discount ?>
                                    @foreach($kategori_produk as $kategori_produks)
                                        <?php $i++;?>
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{$kategori_produks->nama_kategori}}</td>
                                                <td >
                                                    <div class="row justify-content-center">
                                                        {!! Form::model($kategori_produks, ['route' => ['kategori_produk.destroy', $kategori_produks], 'method' => 'delete', 'class' => 'form-inline'] ) !!}
                                                        <a href="{{ route('kategori_produk.edit', $kategori_produks->id)}}" class="btn btn-warning btn-sm text-white"><i class="fa fa-pencil-alt"></i></a>&nbsp; 
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