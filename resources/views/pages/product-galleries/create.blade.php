@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Foto Barang</strong>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('product-galleries.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="products_id">Nama Barang</label>
                        <select name="products_id"  
                                class="form-control @error('products_id') is-invalid @enderror">

                            @foreach ($products as $product)
                            <option value="{{ $product->id}}">
                                {{$product->name}}
                            </option>
                                
                            @endforeach
                        </select>

                        @error('products_id') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                   
                    <div class="form-group">
                        <label for="photo">Foto Barang</label>
                        <input 
                            type="file" 
                            name="photo" 
                            accept="image/*"
                            value="{{old('photo')}}"
                            class="form-control @error('photo') is-invalid @enderror">

                        @error('photo') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="is_default">Jadikan Default</label>
                        <br>
                        <label>
                            <input 
                            class=" @error('is_default') is-invalid @enderror" 
                            type="radio" 
                            name="is_default" 
                            value="1"
                            > Ya
                        </label>
                        &nbsp;
                        <label>
                            <input 
                            class=" @error('is_default') is-invalid @enderror" 
                            type="radio" 
                            name="is_default" 
                            value="0"
                            > Tidak 
                        </label>
                        @error('is_default') <div class="text-muted">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary">
                            Tambah Foto Barang
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection