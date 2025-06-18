<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Daftar Chat</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 p-6">
  <div class="max-w-xl mx-auto">
    <h2 class="text-2xl font-bold mb-4">Daftar Chat</h2>

    <div class="space-y-4">
      @forelse ($menus as $menu)
        <a href="{{ route('chat.page', ['partner_id' => $menu->partner_id]) }}"
           class="flex items-center justify-between bg-white p-4 rounded shadow hover:bg-gray-100">
          <div>
            <p class="font-semibold text-gray-800">Buyer #{{ $menu->partner_id }}</p>
            <p class="text-sm text-gray-600">Klik untuk membuka chat</p>
          </div>
          <img src="https://i.pravatar.cc/40?u={{ $menu->partner_id }}" class="rounded-full" />
        </a>
      @empty
        <p class="text-gray-500">Belum ada pembeli yang diajak chat.</p>
      @endforelse
    </div>
  </div>
</body>
</html>
