<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookCategory;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $limit = $request->limit;
        $orderBy = $request->orderBy ?? 'order_index';
        $orderDir = strtolower($request->orderDir) === 'desc' ? 'desc' : 'asc'; // Ensure 'asc' or 'desc'

        $query = BookCategory::query();

        // Apply ordering
        $query->orderBy($orderBy, $orderDir);

        // Apply limit if provided
        if ($limit) {
            $query->limit($limit);
        }

        $categories = $query->get();

        return response()->json($categories);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}