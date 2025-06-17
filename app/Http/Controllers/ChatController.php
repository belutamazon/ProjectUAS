<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\ChatMenu;

class ChatController extends Controller
{
    public function chatMenu()
    {
        $menus = ChatMenu::where('user_id', 2)->get();
        if ($menus->isEmpty()) {
            ChatMenu::create(['user_id' => 2, 'partner_id' => 1]);
            $menus = ChatMenu::where('user_id', 2)->get();
        }
            return view('seller.chat_menu', compact('menus'));
    }

    public function chat(Request $request)
    {
        $senderId = 2; 
        $receiverId = 1; 
        $messages = Chat::where(function ($q) use ($senderId, $receiverId) {
            $q->where('sender_id', $senderId)->where('receiver_id', $receiverId);
        })->orWhere(function ($q) use ($senderId, $receiverId) {
            $q->where('sender_id', $receiverId)->where('receiver_id', $senderId);
        })->orderBy('created_at')->get();

        if ($messages->isEmpty()) {
            Chat::create([
                'sender_id' => $receiverId,
                'receiver_id' => $senderId,
                'message' => 'Apakah produk ini masih ada?',
            ]);
            return redirect()->route('chat.page');
        }

        if ($request->isMethod('post')) {
            $request->validate([
                'message' => 'required|string',
            ]);
            $input = strtolower(trim($request->message));

            Chat::create([
                'sender_id' => $senderId,
                'receiver_id' => $receiverId,
                'message' => $request->message,
            ]);
            
            if (strpos($input, 'masih ada') !== false) {
                Chat::create([
                    'sender_id' => $receiverId,
                    'receiver_id' => $senderId,
                    'message' => 'Saya mau size M, bisa dikirim hari ini?',
                ]);
            } elseif (strpos($input, 'bisa') !== false) {
                Chat::create([
                    'sender_id' => $receiverId,
                    'receiver_id' => $senderId,
                    'message' => 'Baik, saya checkout sekarang ya.',
                ]);
                
            } elseif (strpos($input, 'maaf, size M sudah habis') !== false) {
                Chat::create([
                    'sender_id' => $receiverId,
                    'receiver_id' => $senderId,
                    'message' => 'Baiklah, kabarkan saya jika sudah stock.',
                ]);
                
            }

            return redirect()->route('chat.page');
        }

        return view('seller.chat', compact('messages', 'senderId', 'receiverId'));
    }
}