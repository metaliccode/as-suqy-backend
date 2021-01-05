@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Barang</strong>
        </div>
        <div class="card">
            <div class="card-body card-block">
                <form action="{{ route('products.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="form-control-label">Nama Barang</label>
                        <input  type="text" 
                                name="name" 
                                value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror" 
                                />

                                @error('name') <div class="text-muted">{{ $message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="type" class="form-control-label">Tipe Barang</label>
                        <input  type="text" 
                                name="type" 
                                value="{{ old('type') }}"
                                class="form-control @error('type') is-invalid @enderror" 
                                />

                                @error('type') <div class="text-muted">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi Barang</label>
                        <textarea   name="description" 
                                    class="form-control @error('description') is-invalid @enderror ckeditor" 
                            >{{ old('description') }}</textarea>
                        @error('dexcription') <div class="text-muted">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Harga Barang</label>
                        <input 
                            class="form-control @error('price') is-invalid @enderror" 
                            type="number" 
                            name="price" 
                            value="{{old('price')}}
                        ">
                        @error('price') <div class="text-muted">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="quantity">Kuantitas Barang</label>
                        <input 
                            class="form-control @error('quantity') is-invalid @enderror" 
                            type="number" 
                            name="quantity" 
                            value="{{old('quantity')}}
                        ">
                        @error('quantity') <div class="text-muted">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary">
                            Tambah Barang
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection