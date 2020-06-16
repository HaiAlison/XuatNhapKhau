<?php

use Illuminate\Database\Seeder;

class certificateOfOriginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $certificate_of_origin=[];
        $certificate_of_origin[]=[
            'id'=>'CertificateOfOrigin_FormAIFTA',
            'certificate_of_origin'=>'Form AIFTA'
        ];
        $certificate_of_origin[]=[
            'id'=>'CertificateOfOrigin_FormD',
            'certificate_of_origin'=>'FormD'
        ];
        $certificate_of_origin[]=[
            'id'=>'CertificateOfOrigin_FormE',
            'certificate_of_origin'=>'FormE'
        ];
        $certificate_of_origin[]=[
            'id'=>'CertificateOfOrigin_Normal',
            'certificate_of_origin'=>'Normal'
        ];
        foreach($certificate_of_origin as $cor)
        {
            App\CertificateOfOrigin::create($cor);
        }
    }
}
