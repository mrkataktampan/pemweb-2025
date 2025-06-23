<?php

namespace App\Http\Controllers;
use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    // GET /tests
    public function index()
    {
        $data = Test::all();

        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }

    // POST /tests
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'Type' => 'required|string|max:100',
        ]);

        $data = Test::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    // PUT /tests/{test}
    public function update(Request $request, Test $test)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'Type' => 'sometimes|required|string|max:100',
        ]);

        $test->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil diperbarui',
            'data' => $test
        ]);
    }

    // DELETE /tests/{test}
    public function destroy(Test $test)
    {
        $test->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil dihapus'
        ]);
    }

    public function show(Test $test)
    {
        return response()->json([
            'status' => 'success',
            'data' => $test
        ]);
    }
}