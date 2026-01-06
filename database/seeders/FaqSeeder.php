<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;
use Illuminate\Support\Facades\DB;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        //Step 2: Truncate table
        Faq::truncate();

        // Step 3: Enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        $faqsByPage = [

            'landing' => [
                [
                    'question' => 'What types of medical equipment do you service?',
                    'answer'   => 'We service a range of biomed equipment in the Texas area, including: anesthesia machines, general surgical and medical equipment, laboratory equipment, imaging and diagnostic tools, rehabilitation and pain management equipment, respiratory equipment, and sterilizers.',
                ],
                [
                    'question' => 'Do you offer 24/7 medical equipment repair services?',
                    'answer'   => 'Yes, we are known for our reliability and around-the-clock solutions for selling new and refurbished medical equipment and reliable disposition services.',
                ],
                [
                    'question' => 'What is the closest medical equipment rental near me?',
                    'answer'   => 'The closest medical equipment rental services are located in the heart of Texas-- Mr Biomed Tech. They provide a variety of biomed tech makes and models for the Austin, San Antonio, Dallas, and Houston areas.',
                ],
                [
                    'question' => 'Which areas does Mr Biomed Tech serve in Texas?',
                    'answer'   => 'Mr Biomed Tech offers fast diagnostics and repair for critical care equipment with transparent pricing in the Austin, San Antonio, Dallas, and Houston areas of Texas.',
                ],
                [
                    'question' => 'How do I know which biomed equipment is right for my hospital?',
                    'answer'   => 'The BMEs (biomedical engineering) and experts at Mr Biomed Tech can help assess patient needs and long-term scaling plans in order to provide you with the best biomed equipment options for your hospital.',
                ],
                [
                    'question' => 'What types of imaging devices do biomedical engineers repair?',
                    'answer'   => 'Biomedical equipment technicians repair a wide array of imaging devices from computer tomography (CT) scans to X-ray machines. Mr Biomed Tech specializes in repairing C-arms in the Austin, Texas area.',
                ],
                [
                    'question' => 'Can you help with the disposition of medical equipment?',
                    'answer'   => 'Yes, we can help discard obsolete medical waste, tech equipment, or restore capital if you wish to sell your machinery.',
                ],
                [
                    'question' => 'What is the MedRad Smart System?',
                    'answer'   => 'The MedRad Smart System is an asset management software based on the cloud. It is used to manage the span of medical equipment in order to assist healthcare facilities maintenance schedules.',
                ],
                [
                    'question' => 'Do biomedical medical technicians support outpatient centers?',
                    'answer'   => 'Mr-Biomed’s technicians assist outpatient centers by calibrating and troubleshooting faster and more precisely than on-site BMEs.',
                ],
                [
                    'question' => 'What are the best medical equipment companies in Dallas, TX?',
                    'answer'   => 'Mr Biomed Tech Services offers the best medical equipment in Dallas, TX, ranging from infusion pumps, ventilators, and imaging systems to large-scale machinery.',
                ],
            ],

            'location' => [
                // add later
            ],

            'service' => [
                // add later
            ],
        ];

        foreach ($faqsByPage as $pageName => $faqs) {
            foreach ($faqs as $faq) {
                Faq::updateOrCreate(
                    [
                        'page_name' => $pageName,
                        'question'  => $faq['question'],
                    ],
                    [
                        'answer' => $faq['answer'],
                    ]
                );
            }
        }
    }
}
