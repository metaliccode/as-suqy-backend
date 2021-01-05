@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Ubah Transaksi | <small> {{ $item->uuid }}</small></strong>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('transactions.update', $item->id ) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Pemesan</label>
                        <input 
                            class="form-control @error('name') is-invalid @enderror" 
                            type="text" 
                            name="name" 
                            value="{{ old('name') ? old('name') : $item->name }}
                        ">

                        @error('name') <div class="text-muted">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input 
                            class="form-control @error('email') is-invalid @enderror" 
                            type="text" 
                            name="email" 
                            value="{{ old('email') ? old('email') : $item->email }}"
                        >

                        @error('email') <div class="text-muted">{{$message}}</div> @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="price">Nomor HP</label>
                        <input 
                            class="form-control @error('price') is-invalid @enderror" 
                            type="text" 
                            name="number" 
                            value="{{ old('number') ? old('number') : $item->number }}"
                        >

                        @error('number') <div class="text-muted">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat Pemesan</label>
                        <input 
                            class="form-control @error('address') is-invalid @enderror" 
                            type="text" 
                            name="address" 
                            value="{{ old('address') ? old('address') : $item->address }}"
                            >
                            
                        @error('address') <div class="text-muted">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary">
                            Ubah Transaksi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection