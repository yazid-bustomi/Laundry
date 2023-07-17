@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <div class="card">
                    <div class="card-title">
                        <h3 class="card-title px-4 pt-4">
                            List Order
                            <a href="{{ route('pktkilo') }}" class="btn btn-primary float-end me-4">Paket Kilo</a>
                            <a href="{{ route('pktbiji') }}" class="btn btn-primary float-end me-5 pe-3 ">Paket Biji</a>
                        </h3>

                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Total Harga</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($order as $item)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        
                                        <td>
                                            @foreach ($item->OrderDetail as $detail)
                                                <li>{{ $detail->paket->namapaket }}</li>
                                            @endforeach
                                        </td>

                                        <td>
                                            @foreach ($item->OrderDetail as $detail)
                                                <li>{{ $detail->jumlah }}</li>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($item->OrderDetail as $detail)
                                                <li>{{ $detail->harga }}</li>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($item->OrderDetail as $detail)
                                                <li>{{ $detail->total_harga }}</li>
                                            @endforeach
                                        </td>

                                        @if ($item->status == 'Order')
                                            <td class="text-success">{{ $item->status }}</td>
                                        @elseIf($item->status == 'Proses')
                                            <td class="text-primary">{{ $item->status }}</td>
                                        @else
                                            <td class="text-danger">{{ $item->status }}</td>
                                        @endif
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
