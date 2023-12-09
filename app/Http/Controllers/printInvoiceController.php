<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Billingdetails;
use App\Models\OrderProduct;
use app\Exports\OrdersExport;
use Excel;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class printInvoiceController extends Controller
{
    //view_invoice
    public function view_invoice($orderId)
{
    $order = Order::where('order_id',$orderId);
    $billingdetails = Billingdetails::where('order_id', $orderId)->get();
    $OrderProducts = OrderProduct::where('order_id', $orderId)->get();
    return view('backend.orders.view_invoice_print', [
        'order'=> $order,
        'billingdetails'=> $billingdetails,
        'OrderProducts'=> $OrderProducts,
    ]);
}

function multi_view_invoice(Request $request){
    $order_ids = explode(',', $request->print_data);
    $orders = Order::where('order_id', $order_ids)->get();

    return view('backend.orders.multi_view_invoice_print', [
        'orders'=>$orders,
        'order_ids'=>$order_ids,
    ]);
}

public function excel_exportOrdersReport(Request $request)
    {
        $status = $request->input('status');
        $orderIds = explode(',', $request->input('all_ord_id'));

        // Fetch orders based on order IDs
        $orders = Order::whereIn('id', $orderIds)->get();

        $orderDetails = [];

        $orderDetails [] = array(
            'Invoice ID',
            'Order Date',
            'Customer Name',
            'Customer Phone',
            'Customer Address',
            'Total',
        );
        foreach ($orders as $order) {
            $billingdetails = Billingdetails::where('order_id', $order->order_id)->get();
            $orderDetails[] = [
                'Invoice ID' => $order->order_id,
                'Order Date' => $order->order_date,
                'Customer Name' => $billingdetails->first()->customer_name,
                'Customer Phone' => $billingdetails->first()->customer_phone,
                'Customer Address' => $billingdetails->first()->customer_address,
                'Total' => $order->total,
                // Add more fields as needed
            ];
        }

        $this->exportExcel($orderDetails);
    }

    public function exportExcel($data)
    {
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '4000M');

        try {
            $spreadSheet = new Spreadsheet();
            $spreadSheet->getActiveSheet()->getDefaultColumnDimension()->setWidth(20);
            $spreadSheet->getActiveSheet()->fromArray($data);
            
            $Excel_writer = new Xls($spreadSheet);

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="order-report.xls"');
            header('Cache-Control: max-age=0');
            
            ob_end_clean();
            
            $Excel_writer->save('php://output');
            exit();
        } catch (SpreadsheetException $e) {
            // Handle the exception if needed
            return;
        }
    }

}
