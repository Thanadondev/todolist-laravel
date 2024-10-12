<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        // ดึงรายการ To-Do ทั้งหมดจากฐานข้อมูล
        $todos = Todo::all();

        // ส่งข้อมูลไปยัง view 'welcome'
        return view('welcome', [
            'todos' => $todos
        ]);
    }

    public function store()
    {
        // ตรวจสอบข้อมูลที่รับมาจากฟอร์ม
        $attributes = request()->validate([
            'title' => 'required|string|max:255', // เพิ่มการตรวจสอบให้ครบถ้วน
            'description' => 'nullable|string|max:500', // เพิ่มการตรวจสอบให้ครบถ้วน
        ]);

        // สร้างงานใหม่ในฐานข้อมูล
        Todo::create($attributes);

        // เปลี่ยนเส้นทางกลับไปยังหน้าแรก
        return redirect('/')->with('success', 'Task added successfully!'); // เพิ่มข้อความแจ้งเตือน
    }

    public function update(Todo $todo)
    {
        // อัปเดตสถานะงานเป็นทำเสร็จ
        $todo->update(['isDone' => true]);

        // เปลี่ยนเส้นทางกลับไปยังหน้าแรก
        return redirect('/')->with('success', 'Task updated successfully!'); // เพิ่มข้อความแจ้งเตือน
    }

    public function destroy(Todo $todo)
    {
        // ลบงานจากฐานข้อมูล
        $todo->delete();

        // เปลี่ยนเส้นทางกลับไปยังหน้าแรก
        return redirect('/')->with('success', 'Task deleted successfully!'); // เพิ่มข้อความแจ้งเตือน
    }
}
