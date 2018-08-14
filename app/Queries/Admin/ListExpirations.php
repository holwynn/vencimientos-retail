<?php

namespace App\Queries\Admin;

use App\Expiration;

class ListExpirations
{
    public function search($request, $paginate = 10)
    {
        $request->validate([
            'dateFrom' => 'nullable|date',
            'dateTo' => 'nullable|date',
            'paginate' => 'nullable|integer',
        ]);

        $query = Expiration::with('product');

        if ($request->filled('dateFrom')) {
            $query->where('expiration', '>=', $request->input('dateFrom'));
        }

        if ($request->filled('dateTo')) {
            $query->where('expiration', '<=', $request->input('dateTo'));
        }

        if ($request->filled('paginate')) {
            $paginate = $request->input('paginate');
        }

        $query->orderBy('expiration', 'DESC');

        $pages = $query->paginate($paginate);
        return $pages->appends($request->all());
    }
}
