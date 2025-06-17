<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="UTF-8" />
  <title>Status Produk Terjual</title>
   <script src="https://cdn.tailwindcss.com"></script>
  </head>
<body class="bg-gray-100 text-gray-800 p-6">
   <h1 class="text-3xl font-bold mb-6">Status Produk Terjual</h1>

  <table class="table-auto w-full border-collapse border border-gray-300">
    <thead>
      <tr>
        <th class="border border-gray-300 px-4 py-2 text-left">Nama Produk</th>
        <th class="border border-gray-300 px-4 py-2 text-left">Jumlah Terjual</th>
      </tr>
    </thead>
  <tbody>
      @foreach ($soldProducts as $product)
      <tr>
        <td class="border border-gray-300 px-4 py-2">{{ $product['name'] }}</td>
        <td class="border border-gray-300 px-4 py-2">{{ $product['sold'] }}</td>
      </tr>
      @endforeach
      </tbody>
  </table>
</body>
 </html>
