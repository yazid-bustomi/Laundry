@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <h3 class="card-title px-4 pt-4">
                    List Order
                </h3>
                    
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Paket Kilo</th>
                                <th scope="col">Atasan</th>
                                <th scope="col">Bawahan</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($order as $item)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->kilo }} Kg</td>
                                    <td>{{ $item->atasan }} Pcs</td>
                                    <td>{{ $item->bawahan }} Pcs</td>
                                    <td>Rp.{{ $item->harga }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <form action="/admin/order/{{ $item->id }}" method="post">
                                            @csrf
                                            <input type="button" value="proses">
                                        </form>
                                    </td>
                                </tr>
                                <?php $no++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection