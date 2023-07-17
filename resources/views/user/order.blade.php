@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <h2 class="card-title pt-4 px-5">Laundry</h2>
            <div class="card-body">
                {{-- @if (count($errors) > 0)
                <div class="alert alert-danger">
                        <li>{{ $errors->first() }}</li>
                </div>
                @endif --}}

                <form action="{{ route('pktkilo') }}" method="POST" id="orderForm">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="status" id="status" name="user_id" value="Order">

                    <div class="mb-3 mt-3">
                        <label for="pktkilo" class="form-label">Paket Kilo : </label>
                        <input type="text" class="form-control" id="pktkilo" placeholder="Silahkan isi satuan kilogram"
                            name="jumlah">
                    </div>
                    
                    <div class="mb-3">
                        <table>
                            <tr>
                                <td class="text-primary">Harga Paket Perkilo Rp.10.000</td>
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


{{-- <script>
    function confirmOrder() {
        var hkilo = 10000;
        var hatasan = 2000;
        var hbawahan = 3000;
        var kilo = parsint(document.getElementById('pktkilo').value);
        var atasan = parsint(document.getElementById('pktatas').value);
        var bawahan = parsint(document.getElementById('pktbwh').value);
        var total = (kilo * hkilo) + (atasan * hatasan) + (bawahan * hbawahan);

        var message = 'Anda akan mengirimkan pesanan dengan detail:\n';
        message += 'Paket Kilo: ' + kilo + '\n';
        message += 'Paket Atasan: ' + atasan + '\n';
        message += 'Paket Bawahan: ' + bawahan + '\n';
        message += 'Total ' + total;

        if (confirm(message)) {
            document.getElementById('orderForm').submit();
        }
    }
</script> --}}
