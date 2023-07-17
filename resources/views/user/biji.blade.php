@extends('layouts.app')
@section('content')
    <div class="container row justify-content-center">
        <div class="col-5">
            <div class="card">
                <h2 class="card-title pt-4 px-5">Paket Bijian</h2>
                <div class="card-body">
                    <form action="{{ route('pktbiji') }}" method="POST" id="orderForm">
                        @csrf
                        <div class="mb-3">
                            <label for="product">Pilih Produk:</label>
                            <select name="product" id="product" onchange="calculateTotal()">
                                <option value="">Pilih Produk</option>
                                @foreach ($paket as $product)
                                    <option value="{{ $product->id }}" data-harga="{{ $product->harga }}">
                                        {{ $product->namapaket }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah">Jumlah:</label>
                            <input type="number" name="jumlah" id="jumlah" onchange="calculateTotal()" min="1"
                                value="1">
                            <button type="button" class="btn btn-info" onclick="addItem()">Tambah</button>
                        </div>
                        <a class="btn btn-danger ms-4" href="{{ route('homeusr') }}">Back</a>
                        <button type="submit" class="btn btn-primary ms-5">Order</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-5">
            <div class="card">
                <div class="card-title" >
                    <h4 class=" pt-4 px-5">Daftar Item</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="daftarItem"></tbody>
                    </table>
                    <h5>Total Harga: <span id="totalHarga"></span></h5>
                </div>
            </div>
        </div>
    </div>
    <script>
        function calculateTotal() {
            var product = document.getElementById('product');
            var jumlah = document.getElementById('jumlah');
            var harga = product.options[product.selectedIndex].dataset.harga;
            var totalHarga = parseInt(harga) * parseInt(jumlah.value);
            document.getElementById('totalHarga').textContent = totalHarga;
        }

        function addItem() {
            var product = document.getElementById('product');
            var jumlah = document.getElementById('jumlah');
            var selectedProduct = product.options[product.selectedIndex].text;

            var tableRow = document.createElement('tr');

            var productNameCell = document.createElement('td');
            productNameCell.textContent = selectedProduct;
            tableRow.appendChild(productNameCell);

            var jumlahCell = document.createElement('td');
            jumlahCell.textContent = jumlah.value;
            tableRow.appendChild(jumlahCell);

            var deleteButtonCell = document.createElement('td');
            var deleteButton = document.createElement('button');
            deleteButton.textContent = 'Hapus';
            deleteButton.classList.add('btn', 'btn-danger');
            deleteButton.onclick = function() {
                tableRow.remove();
                calculateTotal();
            };
            deleteButtonCell.appendChild(deleteButton);
            tableRow.appendChild(deleteButtonCell);

            document.getElementById('daftarItem').appendChild(tableRow);
            calculateTotal();
        }
    </script>
@endsection

