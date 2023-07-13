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
                    <input type="hidden" name="user_id" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="status" id="status" name="user_id" value="Order">

                    <div class="mb-3">
                        <label for="pktatas" class="form-label">Paket Atasan :</label>
                        <input type="text" class="form-control" id="pktatas" placeholder="Silahkan isi jumlah pcs"
                            name="atasan">
                    </div>
                    <div class="mb-3">
                        <label for="pktbwh" class="form-label">Paket Bawahan :</label>
                        <input type="text" class="form-control" id="pktbwh" placeholder="Silahkan isi jumlah pcs"
                            name="bawahan">
                    </div>

                    <div class="mb-3">
                        <table>
                            
                            <tr>
                                <td class="text-primary">Harga Paket Atasan Rp.2.000</td>
                            </tr>
                            <tr>
                                <td class="text-primary">Harga Paket Bawahan Rp.3.000</td>
                            </tr>
                        </table>
                    </div>
                    <a class="btn btn-danger ms-4" href="{{ route('homeusr') }}">Back</a>
                    <button type="submit" class="btn btn-primary ms-5">Order</button>
                </form>
            </div>
        </div>

    </div>
@endsection

