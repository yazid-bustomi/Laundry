@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <h2 class="card-title pt-4 px-5">Laundry</h2>
            <div class="card-body">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                        <li>{{ $errors->first() }}</li>
                </div>
                @endif

                <form action="{{ route('sorder') }}" method="POST" id="orderForm">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="status" id="status" name="user_id" value="Order">

                    <div class="mb-3 mt-3">
                        <label for="pktkilo" class="form-label">Paket Kilo : </label>
                        <input type="text" class="form-control" id="pktkilo" placeholder="Silahkan isi satuan kilogram"
                            name="kilo">
                    </div>
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
                                <td class="text-primary">Harga Paket Perkilo Rp.10.000</td>
                            </tr>
                            <tr>
                                <td class="text-primary">Harga Paket Atasan Rp.2.000</td>
                            </tr>
                            <tr>
                                <td class="text-primary">Harga Paket Bawahan Rp.3.000</td>
                            </tr>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-primary">Order</button>
                </form>
            </div>
        </div>

    </div>
@endsection


<script>
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
</script>
