<?php

namespace App\Services;

use App\Http\Requests\SaleRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class SaleService
{
    /**
     * Handle an incoming request.
     * @param SaleRequest $request
     * @return JsonResponse
     */
    public function search(SaleRequest $request): JsonResponse
    {
        $dateFrom = $request->query('dateFrom');
        $dateTo = $request->query('dateTo');
        $page = $request->query('page', 1); // По умолчанию 1
        $limit = $request->query('limit', 500); // По умолчанию 500

        $query = DB::table('sales');

        if ($dateFrom) {
            $query->whereDate('created_at', '>=', $dateFrom);
        }

        if ($dateTo) {
            $query->whereDate('created_at', '<=', $dateTo);
        }

        $results = $query->paginate($limit);

        return response()->json($results);
    }

}
