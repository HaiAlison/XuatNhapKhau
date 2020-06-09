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

            'payment_terms'=>'Cash Against Document (CAD)'


        ];
        $paymentTerm[]=[
            'id'=>'PaymentTerms_Collection',

            'payment_terms'=>'Collection'


        ];
        $paymentTerm[]=[
            'id'=>'PaymentTerms_LC',
            'payment_terms'=>'Letter of Credit (LC)'


        ];
        $paymentTerm[]=[
            'id'=>'PaymentTerms_Prepaid',
            'payment_terms'=>'Prepaid '
        ];
        $paymentTerm[]=[
            'id'=>'PaymentTerms_TT',
            'payment_terms'=>'Telegraphic Transfer Remittance (TT)'

        ];
        foreach($paymentTerm as $pmt)
        {
            App\PaymentTerm::create($pmt);
        }
    }
}
