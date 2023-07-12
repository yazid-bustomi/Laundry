@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <h2 class="card-title pt-4 px-5">Laundry</h2>
            <div class="card-body">
                <form action="{{ route('sorder') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="status" id="status" name="user_id" value="order">

                    <div class="mb-3 mt-3">
                        <label for="pktkilo" class="form-label">Paket Kilo :</label>
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
                    <button type="submit" class="btn btn-primary">Order</button>
                </form>
            </div>
        </div>

    </div>
@endsection


{{-- <script>
    const checkbox = document.getElementById('cekkilo');
    const input = document.getElementById('kilo');

    checkbox.addEventListener('change', function() {
        if (this.checked) {
            input.readonly = false;
        } else {
            input.readonly = true;
        }
    });
</script> --}}
