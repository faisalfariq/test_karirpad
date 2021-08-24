@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-success card-outline">
                <div class="card-header text-right">
                    <h5 class="card-title "><b>Edit Data {{ $produk->nama_p }}</b></h5>
                    <a href="{{ route('produk.index')}}" class="btn btn-danger btn-sm " ><b>x</b></a>
                </div>
                {!! Form::model($produk, ['route' => ['produk.update', $produk],'method' =>'patch','files' => true])!!}
                    @include('produk._form', ['model' => $produk])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection