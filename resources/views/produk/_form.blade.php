<div class="card-body" >
    <div class="form-group {!! $errors->has('nama_p') ? 'has-error' : ''!!}">
        <label for="nama_p" >{{ __('Nama Produk :') }}</label>
        {!! Form::text('nama_p', null, ['class'=>'form-control']) !!}
        {!! $errors->first('nama_p', '<p class="help-block">:message</p>') !!}
    </div>
    <!-- Kolom Harga -->
    <div class="form-group {!! $errors->has('harga_p') ? 'has-error' : ''!!}">
            <label for="harga_p" >{{ __('Harga Produk :') }}</label>
            <div  class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><b>Rp.</b>
                    </span>
                </div>
                {!! Form::text('harga_p', null, ['class'=>'form-control']) !!}
                <div class="input-group-append">
                    <div class="input-group-text"><b>,-</b></div>
                </div>
            </div>
            {!! $errors->first('harga_p', '<p class="help-block">:message</p>') !!}
    </div>

                                            
    <div class="form-group ">
        <label>Kategori Produk :</label>
        <select name="id_kategori" id="id_kategori" class="form-control">  
            <option value="">== Pilih Kategori ==</option>
            @foreach ($data_kategori as $id => $nama_kategori)
                <option value="{{ $id }}">{{ $nama_kategori }}</option>
            @endforeach
            <span id="error_id_kategori" class="text-danger"></span>
        </select>
    </div>
    <div class="form-group {!! $errors->has('photo') ? 'has-error' : ''!!}">
        {!! Form::label('photo', 'Product photo (jpeg, png)') !!}
        {!! Form::file('photo') !!}
        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
            @if (isset($model) && $model->photo !== '')
            <div class="row">
                <div class="col-md-6">
                    <p>Current photo:</p>
                    <div class="thumbnail">
                        <img src="{{ url('/img/' . $model->photo) }}" width=100px class="imgrounded">
                    </div>
                </div>
            </div>
            @endif
        </div>
    <!-- Tombol Kelola-->
    <div class="form-group text-center">
        {!! Form::submit(isset($model) ? 'Update' : 'Simpan', ['class'=>'btn btn-success']) !!}
    </div>
</div>