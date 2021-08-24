@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-success card-outline">
                <div class="card-header text-right">
                    <h5 class="card-title "><b>Edit Data {{ $kategori->nama_kategori }}</b></h5>
                    <a href="{{ route('kategori.index')}}" class="btn btn-danger btn-sm " ><b>x</b></a>
                </div>
                {!! Form::model($kategori, ['route' => ['kategori.update', $kategori],'method' =>'patch','files' => true]])!!}
                    @include('kategori._form', ['model' => $kategori])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection