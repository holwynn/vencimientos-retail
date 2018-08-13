<?php

namespace App\Queries\Admin;

use App\Product;

class ListProducts
{
    public function search($request, $paginate = 10)
    {
        $request->validate([
            'name' => 'nullable|string',
            'upc' => 'nullable|string|min:13|max:13',
            'paginate' => 'nullable|integer',
        ]);

        $query = Product::with('expirations');

        if ($request->filled('name')) {
            $query->where('name', 'LIKE', '%'.$request->input('name').'%');
        }

        if ($request->filled('upc')) {
            $query->where('upc', $request->input('upc'));
        }

        if ($request->filled('paginate')) {
            $paginate = $request->input('paginate');
        }

        $query->orderBy('id', 'DESC');

        $pages = $query->paginate($paginate);
        return $pages->appends($request->all());
    }
}
