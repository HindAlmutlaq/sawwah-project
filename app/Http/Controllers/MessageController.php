<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function showForm()
    {
return view('main', ['page' => 'contact']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Message::create([
            'name' => $request->name,
            'message' => $request->message,
        ]);

        return redirect()->route('contact.form')->with('success', 'تم إرسال رسالتك بنجاح!');
    }

    public function index()
    {
        $messages = Message::orderBy('created_at', 'desc')->get();
return view('main', ['page' => 'dashboard', 'messages' => $messages]);
    }

    public function destroy($id)
{
    $message = Message::findOrFail($id);
    $message->delete();

    return redirect()->route('dashboard.messages')->with('success', 'تم حذف الرسالة بنجاح');
}

public function edit($id)
{
    $message = Message::findOrFail($id);
    return view('main', ['page' => 'edit-message', 'message' => $message]);
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    $message = Message::findOrFail($id);
    $message->update([
        'name' => $request->name,
        'message' => $request->message,
    ]);

    return redirect()->route('dashboard.messages')->with('success', 'تم تعديل الرسالة بنجاح!');
}

}
