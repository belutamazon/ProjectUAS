<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Seller Centre</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .no-spinner::-webkit-outer-spin-button,
    .no-spinner::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
    .no-spinner {
      -moz-appearance: textfield; /* Firefox */
    }
  </style>
</head>
<body class="bg-gray-300 text-gray-800">
  <div class="container mx-auto p-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-3xl font-bold">Seller Centre</h1>
      <div class="flex items-center gap-2">
        <span>Danielxxx</span>
        <img src="https://i.pravatar.cc/30" alt="Avatar" class="rounded-full w-8 h-8" />
      </div>
    </div>

    <!-- Status Pesanan -->
    <div class="bg-gray-100 p-4 rounded shadow mb-6">
      <h2 class="text-lg font-semibold mb-2">Fitur</h2>
      <div class="flex flex-wrap gap-4 mb-4">
        <a href="{{ url('/seller/status') }}" class="px-4 py-2 border rounded hover:bg-gray-200">Status</a>
        <a href="{{ route('chat.menu') }}" class="px-4 py-2 border rounded hover:bg-gray-200">Chat</a>
        <a href="{{ url('/seller/faq') }}" class="px-4 py-2 border rounded hover:bg-gray-200">FAQ</a>
      </div>
      <div id="statusOutput" class="text-blue-700 font-semibold"></div>
    </div>

    <!-- Grid Keuangan dan Produk -->
    <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
      <!-- Keuangan -->
      <div class="bg-gray-100 p-4 rounded shadow">
        <h2 class="text-lg font-semibold mb-2">Keuangan</h2>
        <div class="border rounded p-4 text-xl">
          <p>Total Saldo</p>
          <p class="text-2xl font-bold text-gray-800">Rp {{ number_format($balance ?? 9000000, 0, ',', '.') }}</p>
        </div>
      </div>

      <!-- Produk -->
      <div class="bg-gray-100 p-4 rounded shadow">
        <h2 class="text-lg font-semibold mb-2">Produk</h2>

        <!-- Form Tambah Produk -->
        <form method="POST" action="{{ route('seller.addProduct') }}" class="flex gap-2 mb-4">
          @csrf
          <input type="text" name="name" placeholder="Nama Produk" class="border p-2 flex-1" required />
          <input type="number" name="stock" placeholder="Stok" class="border p-2 w-24" required />
          <input type="number" name="harga" placeholder="Harga" class="border p-2 w-24 no-spinner" required />
          <button class="px-4 py-2 bg-blue-600 text-white rounded">Tambah Produk</button>
        </form>

        <!-- Tabel Produk -->
        <div class="overflow-x-auto">
          <table class="w-full border">
            <thead class="bg-gray-200">
              <tr>
                <th class="p-2 text-left">Nama Produk</th>
                <th class="p-2 text-left">Stok</th>
                <th class="p-2 text-left">Harga</th>
              </tr>
            </thead>
            <tbody>
              @forelse($products as $product)
                <tr>
                  <td class="p-2 border-t">{{ $product->name }}</td>
                  <td class="p-2 border-t">{{ $product->stock }}</td>
                  <td class="p-2 border-t">{{ $product->harga }}</td>
                </tr>
              @empty
                <tr>
                  <td colspan="3" class="p-2 text-center text-gray-500 border-t">Belum ada produk</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
