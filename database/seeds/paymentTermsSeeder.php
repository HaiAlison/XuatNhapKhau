<?php

use Illuminate\Database\Seeder;

class paymentTermsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paymentTerm=[];
        $paymentTerm[]=[
            'id'=>'PaymentTerms_CAD',
            'payment_term'=>'Cash Against Document (CAD)'

        ];
        $paymentTerm[]=[
            'id'=>'PaymentTerms_Collection',
            'payment_term'=>'Collection'

        ];
        $paymentTerm[]=[
            'id'=>'PaymentTerms_LC',
            'payment_term'=>'Letter of Credit (LC)'

        ];
        $paymentTerm[]=[
            'id'=>'PaymentTerms_Prepaid',
            'payment_term'=>'Prepaid '

        ];
        $paymentTerm[]=[
            'id'=>'PaymentTerms_TT',
            'payment_term'=>'Telegraphic Transfer Remittance (TT)'

        ];
        foreach($paymentTerm as $pmt)
        {
            App\PaymentTerms::create($pmt);
        }
    }
}
