<?php

namespace Domains\Sales\Controllers;

use App\Http\Controllers\Controller;
use Domains\Sales\Models\Sale;

class CancelSaleController extends Controller
{
    public function __invoke(Sale $sale)
    {
        if ($sale->is_canceled) {
            return $sale;
        }

        $sale->update([
            'canceled_at' => now()
        ]);

        return $sale->fresh();
    }
}
