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
                                    <th scope="col">Paket Kilo</th>
                                    <th scope="col">Atasan</th>
                                    <th scope="col">Bawahan</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($order as $item)
                                    <tr>
                                        <td>{{ $no }}</td>
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


