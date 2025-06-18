<!DOCTYPE html>
<html>
<head>
  <title>Chat</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex flex-col">

  <!-- Header -->
  <div class="bg-white p-4 shadow flex-none">
    <h2 class="text-2xl font-bold">Live Chat</h2>
  </div>

  <!-- Container Pesan -->
  <div class="flex-1 overflow-y-auto p-4 space-y-2">
    @foreach ($messages as $msg)
      <div class="{{ $msg->sender_id == $senderId ? 'text-right' : 'text-left' }}">
        <div class="inline-block px-4 py-2 rounded max-w-xs 
          {{ $msg->sender_id == $senderId ? 'bg-blue-500 text-white' : 'bg-gray-300 text-black' }}">
          {{ $msg->message }}
        </div>
      </div>
    @endforeach
  </div>

  <!-- Form Input -->
  <form action="{{ route('chat.page') }}" method="POST" class="flex-none p-4 bg-white flex gap-2 border-t">
    @csrf
    <input type="text" name="message" class="border p-2 flex-1 rounded" placeholder="Tulis pesan..." required>
    <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Kirim</button>
  </form>

</body>
</html>

