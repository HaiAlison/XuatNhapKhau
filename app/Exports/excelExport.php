<?php

namespace App\Exports;


use App\PaymentOversea;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class excelExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $data;
    function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        $data = $this->data;
        $start=$data->date_start;
        $end=$data->date_end;
        
       if($data->po_no_id==null && $data->sub_po_id==null && $data->date_start==null && $data->date_end==null)
       {
       
            return PaymentOversea::all();
       }
        if($data->po_no_id!=null && $data->sub_po_id==null && $data->date_start==null && $data->date_end==null)
        {
            return PaymentOversea::whereIn('po_no_id',$data)->get();
        }
        if($data->po_no_id!=null && $data->sub_po_id!=null && $data->date_start==null && $data->date_end==null)
        {
            return PaymentOversea::whereIn('po_no_id',$data)->WhereIn('sub_po_id',$data)->get();
        }
        if($data->po_no_id!=null && $data->sub_po_id!=null && $data->date_start!=null && $data->date_end!=null)
        {
            return PaymentOversea::whereIn('po_no_id',$data)->WhereIn('sub_po_id',$data)->whereBetween('po_date',[$start,$end])->get();
        }
        if($data->po_no_id==null && $data->sub_po_id==null && $data->date_start!=null && $data->date_end!=null)
        {
            return PaymentOversea::whereBetween('po_date',[$start,$end])->get();
        }
        if($data->po_no_id==null && $data->sub_po_id==null && $data->date_start!=null && $data->date_end==null)
        {
            return PaymentOversea::where('po_date','>', $start)->get();
        }
        
    }
    public function headings() :array {
    	return ["PO - Item","PO no.","PO date","Item name","Item packing","Item Source","Item Origin","QTY","Unit Price","Incoterms","Payment term","Invoicing party","POL","Ship","# CONT","Freight","BL date","ETA","Total Amount","Due date","Week","PR no.","PR date","TOTAL PAYMENT","1st Payment Date","1st Payment Amount","2nd Payment Date","2nd Payment Amount","3rd Payment Date","3rd Payment Amount","4th Payment Date","4th Payment Amount","5th Payment Date","5th Payment Amount"
        ];
    }
}
