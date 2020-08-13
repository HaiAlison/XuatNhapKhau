<?php

namespace App\Http\Controllers\User;
use App\PaymentOversea;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PaymentOverseaExportController extends Controller implements FromCollection, WithHeadings
{
    use Exportable;
    public function collection()
    {
    $orders = PaymentOversea::all();
        foreach ($paymentOversea as $row) {
            $payment[] = array(
                '0' => $row->sub_po_id,
                '1' => $row->po_date,
                '2' => $row->item_name,
                '3' => $row->item_packing,
                '4' => $row->item_source,
                '5' => $row->item_origing,
                '6' => $row->item_origing,

                '7' => $row->qty,
                '8' => $row->unit_price,
                '9' => $row->incoterms,
                '10' => $row->payment_term,
                '11' => $row->invoicing_party,
                '12' => $row->pol,
                '13' => $row->ship,

                '14' => $row->cont,
                '15' => $row->freight,
                '16' => $row->bl_date,
                '17' => $row->ate,
                '18' => $row->total_amount,
                '19' => $row->due_date,
                '20' => $row->week,

                '21' => $row->pr_no,
                '22' => $row->pr_date,
                '23' => $row->total_payment,
                '24' => $row->_1st_payment_date,
                '25' => $row->_1st_payment_amount,
                '26' => $row->_2st_payment_date,
                '27' => $row->_2st_payment_amount,
                '28' => $row->_3st_payment_date,
                '29' => $row->_3st_payment_amount,
                '30' => $row->_4st_payment_date,
                '31' => $row->_4st_payment_amount,
                '32' => $row->_5st_payment_date,
                '33' => $row->_5st_payment_amount,
            );
        }

        return (collect($order));
    }
    public function headings() :array {
    	return ["PO - Item","PO no.","PO date","Item name","Item packing","Item Source","Item Origin","QTY","Unit Price","Incoterms","Payment term","Invoicing party","POL","Ship","# CONT","Freight","BL date","ETA","Total Amount","Due date","Week","PR no.","PR date","TOTAL PAYMENT","1st Payment Date","1st Payment Amount","2nd Payment Date","2nd Payment Amount","3rd Payment Date","3rd Payment Amount","4th Payment Date","4th Payment Amount","5th Payment Date","5th Payment Amount"
        ];
    }
}
