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
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Pelanggan</th>
                                    <th scope="col">Id Order</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($order->count() == '')
                                    <td colspan="6" class="text-center text-danger">Data Belum Ada</td>
                                @else
                                    <?php $no = 1; ?>
                                    @foreach ($order as $item)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $item->user->name }}</td>

                                            <td>
                                                {{-- untuk mengambil 1 data order id dan di masukkan ke dalam variable, di tampilkan --}}
                                                @foreach ($item->OrderDetail as $detail)
                                                    @php
                                                        $orderId = $detail->order_id;
                                                    @endphp
                                                @endforeach
                                                {{ $orderId }}
                                            </td>

                                            <td>
                                                @foreach ($item->OrderDetail as $paket)
                                                    <li>{{ $paket->paket->namapaket }}</li>
                                                @endforeach
                                            </td>

                                            <td>
                                                @foreach ($item->OrderDetail as $jumlah)
                                                    <li>{{ $jumlah->jumlah }}</li>
                                                @endforeach
                                            </td>

                                            <td>
                                                <?php $hargall = 0 ?>
                                                @foreach ($item->OrderDetail as $harga)
                                                @php
                                                    $hargasatuan = $harga->total_harga;
                                                    $hargall += $harga->total_harga;
                                                @endphp                                                      
                                                <li>@currency($hargasatuan)</li>
                                                @endforeach
                                                    Total = @currency($hargall)
                                            </td>

                                            {{-- Untuk membuat aksi dan button selesai apa belum --}}
                                            @if ($item->status == 'Selesai')
                                                <td>
                                                    <div class="text-danger">Selesai</div>
                                                </td>
                                            @endif

                                            @if ($item->status == 'Order')
                                                <td>
                                                    <a href="{{ route('proses', $item->id) }}"
                                                        class="btn btn-success">Proses</a>
                                                </td>
                                            @elseIf($item->status == 'Proses')
                                                <td>
                                                    <a href="{{ route('selesai', $item->id) }}"
                                                        class="btn btn-primary">Selesai</a>
                                                </td>
                                            @endif
                                        </tr>
                                        <?php $no++; ?>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
