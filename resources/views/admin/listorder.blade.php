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
                                    <th scope="col">Id Order</th>
                                    <th scope="col">Nama Pelanggan</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Jumlah</th>
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
                                        @if ($item->kilo == '')
                                            <td>{{ $item->kilo }}</td>
                                        @else
                                            <td>{{ $item->kilo }} Kg</td>
                                        @endif
                                        @if ($item->atasan == '')
                                            <td>{{ $item->atasan }}</td>
                                        @else
                                            <td>{{ $item->atasan }} Pcs</td>
                                        @endif
                                        @if ($item->bawahan == '')
                                            <td>{{ $item->bawahan }}</td>
                                        @else
                                            <td>{{ $item->bawahan }} Pcs</td>
                                        @endif
                                        <td>@currency($item->harga)</td>
                                        @if ($item->status == 'Selesai')
                                            <td class="text-danger">{{ $item->status }}</td>
                                            <td>
                                                <div class="text-danger">Selesai</div>
                                            </td>
                                        @endif

                                        @if ($item->status == 'Order')
                                            <td class="text-success">{{ $item->status }}</td>
                                            <td>
                                                <a href="{{ route('proses', $item->id) }}"
                                                    class="btn btn-success">Proses</a>
                                            </td>
                                        @elseIf($item->status == 'Proses')
                                            <td class="text-primary">{{ $item->status }}</td>
                                            <td>
                                                <a href="{{ route('selesai', $item->id) }}"
                                                    class="btn btn-primary">Selesai</a>
                                            </td>
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
