<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Excel;
use App\PaymentLocal;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExcelController extends Controller implements FromCollection, WithHeadings
{
    use Exportable;
    protected $data;
    function __construct($data)
    {
        $this->data = $data;
    }

    public function collection() //overload phương thức của fromCollection
    {
    	$data = $this->data;

        $start = array_values($data)[0];
        $end = array_values($data)[1];
        $paymentLocalArray = [];
        $d = PaymentLocal::whereIn('po_no_id',$data)
        ->orWhereIn('sub_po_no_id',$data)
        ->get();

        foreach ($d as $value) {
            $paymentLocalArray[] = array(
                '0' => $value->po_no_id,
                '1' => $value->sub_po_no_id,
                '2' => $value->po_date,
                '3' => $value->type_of_service,
                '4' => ($value->tax_level != null) ? $value->tax_level.'%' : '-',
                '5' => $value->item_name,
                '6' => $value->item_origin,
                '7' => $value->qty,
                '8' => $value->unit_price,
                '9' => $value->incoterms_id,
                '10' => $value->freight,
                '11' => $value->pol,
                '12' => $value->ship,
                '13' => $value->cont,
                '14' => ($value->docs != null) ? $value->docs : '-',
                '15' => ($value->dthc != null) ? $value->dthc : '-',
                '16' => ($value->cic != null) ? $value->cic : '-',
                '17' => ($value->cleaning != null) ? $value->cleaning : '-',
                '18' => ($value->other != null) ? $value->other : '-',
                '19' => $value->bl_date,
                '20' => $value->eta,
                '21' => $value->amount,
                '22' => $value->due_date,
                '23' => $value->week,
                '24' => $value->pr_no,
                '25' => $value->pr_date,
            );
        }
        return collect($paymentLocalArray);
        
    }

    public function headings(): array
    {
    	return ['PO No.', 'Sub PO No.', 'PO date', 'Type of service', 'Tax level', 'Item name', 'Item origin', 'QTY', 'Unit price ($)', 'Incoterms', 'Freight', 'POL', 'Ship', '# Cont', 'DOCS', 'THC', 'CIC', 'Cleaning', 'Others', 'BL date', 'ETA', 'Amount', 'Due date', 'Week', 'PR No.', 'PR date'
        ];
    }

   

}
