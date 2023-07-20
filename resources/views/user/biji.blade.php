@extends('layouts.app')
@section('content')
<div class="container row justify-content-center">
    <div class="col-5">
        <div class="card">
            <h2 class="card-title pt-4 px-5">Paket Bijian</h2>
            <div class="card-body">
                <form action="{{ route('storeBiji') }}" method="POST" id="orderForm">
                    @csrf
                    <div class="mb-3">
                        <label for="product">Pilih Produk:</label>
                        <select name="data[0][product]" id="product">
                            <option value="">Pilih Kategori</option>
                            @foreach ($paket as $product)
                                @if ($product->namapaket != 'kilo')
                                    <option value="{{ $product->id }}" data-harga="{{ $product->harga }}">
                                        {{ $product->namapaket }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah">Jumlah:</label>
                        <input type="number" name="data[0][jumlah]" id="jumlah" min="1" value="1">
                        <button type="button" class="btn btn-info" onclick="addItem()">Tambah</button>
                    </div>
                    <a class="btn btn-danger ms-4" href="{{ route('homeusr') }}">Back</a>
                    <button type="submit" class="btn btn-primary ms-5">Order</button>
                    <!-- Hidden input untuk menyimpan data -->
                    <input type="hidden" id="jsonData" name="jsonData">
                </form>
            </div>
        </div>
    </div>
    <div class="col-5">
        <div class="card">
            <div class="card-title">
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
    let data = [];

    function calculateTotal() {
        let totalHarga = 0;
        for (let i = 0; i < data.length; i++) {
            totalHarga += data[i].harga * data[i].jumlah;
        }
        document.getElementById('totalHarga').textContent = totalHarga;
    }

    function addItem() {
        const product = document.getElementById('product');
        const jumlah = document.getElementById('jumlah');
        const selectedProduct = product.options[product.selectedIndex].text;

        // Menambahkan item baru ke dalam tabel
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>${selectedProduct}</td>
            <td>${jumlah.value}</td>
            <td>
                <button class="btn btn-danger" onclick="removeItem(this)">Hapus</button>
            </td>
        `;
        document.getElementById('daftarItem').appendChild(newRow);

        // Menambahkan data input ke dalam array
        data.push({
            product: selectedProduct,
            jumlah: parseInt(jumlah.value),
            harga: parseInt(product.options[product.selectedIndex].dataset.harga)
        });

        calculateTotal();

        // Mengatur ulang elemen input setelah data ditambahkan
        product.value = ''; // Kosongkan pilihan produk
        jumlah.value = 1; // Reset jumlah menjadi 1

        // Update nilai input hidden dengan data JSON yang dikirimkan saat form disubmit
        document.getElementById('jsonData').value = JSON.stringify(data);
    }

    function removeItem(button) {
        const row = button.parentElement.parentElement;
        const productName = row.getElementsByTagName('td')[0].innerText;

        // Menghapus data dari array berdasarkan nama produk
        for (let i = 0; i < data.length; i++) {
            if (data[i].product === productName) {
                data.splice(i, 1);
                break;
            }
        }

        // Menghapus baris dari tabel
        row.remove();

        calculateTotal();

        // Update nilai input hidden dengan data JSON yang dikirimkan saat form disubmit
        document.getElementById('jsonData').value = JSON.stringify(data);
    }
</script>

@endsection
