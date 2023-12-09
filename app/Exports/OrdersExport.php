<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Collection;
use App\Models\Order;

class OrdersExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */

    protected $orderIds;
    protected $status;

    public function __construct(array $orderIds, $status)
    {
        $this->orderIds = $orderIds;
        $this->status = $status;
    }

    public function collection()
    {
        $orders = Order::whereIn('id', $this->orderIds)->get();

        // Format the data as needed
        $formattedData = $orders->map(function ($order) {
            return [
                // Add your fields here, for example:
                'Order ID' => $order->id,
                'Customer Name' => $order->customer_name,
                // Add more fields as needed
            ];
        });

        return new Collection($formattedData);
    }

    public function headings(): array
    {
        // Define the column headings
        return [
            'Order ID',
            'Customer Name',
            // Add more headings as needed
        ];
    }
}
