<?php

namespace App\Services;

use App\Http\Requests\StockRequest;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class StockService
{
    /**
     * Handle an incoming request.
     * @param StockRequest $request
     * @return JsonResponse
     */
    public function search(StockRequest $request): JsonResponse
    {
        $today = Carbon::today();
        $dateFrom = $today->startOfDay();
        $dateTo = $today->endOfDay();

        $page = $request->query('page', 1);
        $limit = $request->query('limit', 500);

        $query = DB::table('stocks')
            ->whereBetween('created_at', [$dateFrom, $dateTo]);

        $results = $query->paginate($limit);

        return response()->json($results);
    }

}

