@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <h2 class="card-title pt-4 px-5">Paket Bijian</h2>
            <div class="card-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <li>{{ $errors->first() }}</li>
                    </div>
                @endif

                <form action="{{ route('pktbiji') }}" method="POST" id="orderForm">
                    @csrf
                    <div class="mb-3">
                        <label for="product">Pilih Produk:</label>
                        <select name="product" id="product" onchange="calculateTotal()">
                            <option value="">Pilih Produk</option>
                            @foreach ($paket as $product)
                                <option value="{{ $product->id }}" data-harga="{{ $product->harga }}">{{ $product->namapaket }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah">Jumlah:</label>
                        <input type="number" name="jumlah" id="jumlah" onchange="calculateTotal()" min="1"
                            value="1">
                    </div>
                    <div class="mb-3">
                        <label for="harga">Total Harga:</label>
                        <input type="number" name="harga" id="harga" readonly>
                    </div>
                    <a class="btn btn-danger ms-4" href="{{ route('homeusr') }}">Back</a>
                    <button type="submit" class="btn btn-primary ms-5">Order</button>
                </form>
            </div>
        </div>

    </div>
@endsection
