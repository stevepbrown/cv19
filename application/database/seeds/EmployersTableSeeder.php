<?php

use Illuminate\Database\Seeder;

class EmployersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('employers')->insert([
            ['id'=>'1','employer'=>'Birmingham Clinical Trials Unit (BCTU)','description'=>'The University of Birmingham Clinical Trials Unit (BCTU) is a leading national clinical trials unit, specialising in the design, conduct and analysis of definitive clinical trials and test evaluation studies.','created_at'=>'2020-01-09 12:06:58'],
            ['id'=>'2','employer'=>'Cancer Research UK Clinical Trials Unit','description'=>'The Cancer Research UK Clinical Trials Unit (CRCTU) translates cutting edge science into improved patient care, both rapidly and safely, through the design and conduct of large multi-centre/international randomised trials as well as smaller more data intensive phase I trials of novel therapies.','created_at'=>'2020-01-09 12:06:58'],
            ['id'=>'3','employer'=>'Synstar Computer Services','description'=>'Synstar International provided IT Support & Business Continuity services, principally in the automotive sector.','created_at'=>'2020-01-09 12:06:58'],
            ['id'=>'4','employer'=>'Suresite LTD','description'=>'Suresite provides Compliance / Risk Management, Card Services, and Wetstock Management solutions to the retail petroleum sector.','created_at'=>'2020-01-09 12:06:58'],
            ['id'=>'5','employer'=>'Bechtel Water Technlogy','description'=>'Bechtel Water Technology, based at Chadwick House, Risley, near Warrington, is the water engineering Centre of Excellence for Bechtel Group, Inc.','created_at'=>'2020-01-09 12:06:58'],
            ['id'=>'6','employer'=>'National Car Auctions','description'=>'NCA provided automotive auction services to trade & public','created_at'=>'2020-01-09 12:06:58'],
            
         ]);
    }
}
