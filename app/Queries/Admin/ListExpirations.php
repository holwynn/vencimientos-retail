<?php

namespace App\Queries\Admin;

use App\Expiration;

class ListExpirations
{
    public function search($request, $paginate = 10)
    {
        $request->validate([
            'since' => 'nullable|date',
            'to' => 'nullable|date',
            'paginate' => 'nullable|integer',
        ]);

        $query = Expiration::with('product');

        if ($request->filled('since')) {
            $query->where('expiration', '>=', $request->input('since'));
        }

        if ($request->filled('to')) {
            $query->where('expiration', '<=', $request->input('to'));
        }

        if ($request->filled('paginate')) {
            $paginate = $request->input('paginate');
        }

        $query->orderBy('expiration', 'DESC');

        $pages = $query->paginate($paginate);
        return $pages->appends($request->all());
    }
}
