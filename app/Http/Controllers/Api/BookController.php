<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->perPage ?? 12;
        $search = $request->search;
        $categoryId = $request->categoryId;
        $subCategoryId = $request->subCategoryId;
        $orderBy = $request->orderBy ?? 'id';
        $orderDir = strtolower($request->orderDir) === 'asc' ? 'asc' : 'desc'; // Ensure 'asc' or 'desc'

        $query = Book::query();

        if ($search) {
            $query->where(function ($sub_query) use ($search) {
                $sub_query->where('title', 'LIKE', '%' . $search . '%')
                    ->orWhere('authors', 'LIKE', '%' . $search . '%')
                    ->orWhere('isbn', 'LIKE', '%' . $search . '%')
                    ->orWhere('publisher_name', 'LIKE', '%' . $search . '%')
                    ->orWhere('description', 'LIKE', '%' . $search . '%');
            });
        }

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        if ($subCategoryId) {
            $query->where('sub_category_id', $subCategoryId);
        }

        // Apply ordering
        $query->orderBy($orderBy, $orderDir);

        // Paginate results with the specified number per page
        // $query->with('images');
        $books = $query->paginate($perPage);

        // Map the results to extract URLs
        $books->getCollection()->transform(function ($book) {
            // Replace 'url' with the specific key you want from the image
            $book->image_urls = $book->images->pluck('image');
            return $book;
        });

        return response()->json($books);
    }

    public function new_arrival(Request $request)
    {
        // First set of 10 books ordered by ID in descending order
        $first_set = Book::query()->orderBy('id', 'DESC')->limit(10)->get();

        // Second set of 10 books ordered by ID in descending order, offset by 10
        $second_set = Book::query()->orderBy('id', 'DESC')->offset(10)->limit(10)->get();

        return response()->json([
            'first_set' => $first_set,
            'second_set' => $second_set,
        ]);
    }

    public function best_selling(Request $request)
    {
        // First set of 10 books ordered by ID in descending order
        $first_set = Book::query()->inRandomOrder()->limit(10)->get();

        // Second set of 10 books ordered by ID in descending order, offset by 10
        $second_set = Book::query()->inRandomOrder()->offset(10)->limit(10)->get();

        return response()->json([
            'first_set' => $first_set,
            'second_set' => $second_set,
        ]);
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
