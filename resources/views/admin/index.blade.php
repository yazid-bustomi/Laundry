@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <div class="row">
            <div class="col ">
                <div class="card">
                    <div class="title">
                        <div class="labe fw-bold fs-3">
                            Pelanggan
                        </div> 
                    </div>
                    <div class="body">
                        <div class="label pt-4 fs-4">Total Pelanggan  : {{ $user }}</div>
                    </div>
                </div>
            </div>
            <div class="col ">
                <div class="card">
                    <div class="title">
                        <div class="labe fw-bold fs-3">
                            Order
                        </div> 
                    </div>
                    <div class="body">
                        <div class="label pt-4 fs-4">Total Order  : {{ $order }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
