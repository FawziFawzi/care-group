<?php

namespace App\Observers;

use App\Models\Product;
use App\Models\ProductLog;
use Illuminate\Support\Facades\Auth;

class ProductObserver
{
    private function logAction(Product $product, string $action, array $changes = null)
    {
        ProductLog::create([
            'product_id' => $product->id,
            'action' => $action,
            'changes' => $changes,
            'changed_by' => Auth::id() ?? null,
        ]);
    }


    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {
        $this->logAction($product, 'created', [
            'new' => $product->getAttributes()
        ]);
    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {
        $changes = [];
        foreach ($product->getDirty() as $attribute => $newValue) {
            $changes[$attribute] = [
                'old' => $product->getOriginal($attribute),
                'new' => $newValue,
            ];
        }
        $this->logAction($product, 'updated', $changes);
    }

    /**
     * Handle the Product "deleted" event.
     */
    public function deleted(Product $product): void
    {
        $this->logAction($product, 'deleted', [
            'old' => $product->getOriginal()
        ]);
    }


}
