@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Ubah Barang | <small> {{ $item->name }}</small></strong>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('products.update', $item->id ) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Barang</label>
                        <input 
                            class="form-control @error('name') is-invalid @enderror" 
                            type="text" 
                            name="name" 
                            value="{{ old('name') ? old('name') : $item->name }}
                        ">

                        @error('name') <div class="text-muted">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="type">Tipe Barang</label>
                        <input 
                            class="form-control @error('type') is-invalid @enderror" 
                            type="text" 
                            name="type" 
                            value="{{ old('type') ? old('type') : $item->type }}"
                        >

                        @error('type') <div class="text-muted">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi Barang</label>
                        <textarea 
                            name="description" 
                            class="form-control @error('description') is-invalid @enderror ckeditor" 
                            > {{old('description') ? old('description') : $item->description }}</textarea>
                        
                        @error('description') <div class="text-muted">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Harga Barang</label>
                        <input 
                            class="form-control @error('price') is-invalid @enderror" 
                            type="number" 
                            name="price" 
                            value="{{ old('price') ? old('price') : $item->price }}"
                        >

                        @error('price') <div class="text-muted">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="quantity">Kuantitas Barang</label>
                        <input 
                            class="form-control @error('quantity') is-invalid @enderror" 
                            type="number" 
                            name="quantity" 
                            value="{{ old('quantity') ? old('quantity') : $item->quantity }}"
                            >
                            
                        @error('quantity') <div class="text-muted">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary">
                            Ubah Barang
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection