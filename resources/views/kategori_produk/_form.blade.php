<div class="card-body" >
    <div class="form-group {!! $errors->has('nama_kategori') ? 'has-error' : ''!!}">
        <label for="nama_kategori" >{{ __('Nama Produk :') }}</label>
        {!! Form::text('nama_kategori', null, ['class'=>'form-control']) !!}
        {!! $errors->first('nama_kategori', '<p class="help-block">:message</p>') !!}
    </div>
    <!-- Kolom Harga -->
    
    <!-- Tombol Kelola-->
    <div class="form-group text-center">
        {!! Form::submit(isset($model) ? 'Update' : 'Simpan', ['class'=>'btn btn-success']) !!}
    </div>
</div>