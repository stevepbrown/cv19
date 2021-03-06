<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modules')->insert([
        
            
            ['id'=>'1','module'=>'English Language','qualification_id'=>'1','grade'=>'A','created_at'=>'2019-11-25 16:43:17'],
            ['id'=>'2','module'=>'English Literature','qualification_id'=>'1','grade'=>'A','created_at'=>'2019-11-25 16:43:17'],
            ['id'=>'3','module'=>'Biology','qualification_id'=>'1','grade'=>'A','created_at'=>'2019-11-25 16:43:17'],
            ['id'=>'4','module'=>'Geography','qualification_id'=>'1','grade'=>'A','created_at'=>'2019-11-25 16:43:17'],
            ['id'=>'5','module'=>'French','qualification_id'=>'1','grade'=>'B','created_at'=>'2019-11-25 16:43:17'],
            ['id'=>'6','module'=>'Mathematics','qualification_id'=>'1','grade'=>'C','created_at'=>'2019-11-25 16:43:17'],
            ['id'=>'7','module'=>'Physics','qualification_id'=>'1','grade'=>'C','created_at'=>'2019-11-25 16:43:17'],
            ['id'=>'8','module'=>'Control Technology','qualification_id'=>'1','grade'=>'C','created_at'=>'2019-11-25 16:43:17'],
            ['id'=>'9','module'=>'Economics','qualification_id'=>'2','grade'=>'A','created_at'=>'2019-11-25 16:43:17'],
            ['id'=>'10','module'=>'Biology','qualification_id'=>'2','grade'=>'B','created_at'=>'2019-11-25 16:43:17'],
            ['id'=>'11','module'=>'Modern History','qualification_id'=>'2','grade'=>'C','created_at'=>'2019-11-25 16:43:17'],
            ['id'=>'12','module'=>'Business Economics','qualification_id'=>'3','grade'=>null,'created_at'=>'2019-11-25 16:43:17'],
            ['id'=>'13','module'=>'Marketing Management','qualification_id'=>'3','grade'=>null,'created_at'=>'2019-11-25 16:43:17'],
            ['id'=>'14','module'=>'Promotional Communications','qualification_id'=>'3','grade'=>null,'created_at'=>'2019-11-25 16:43:17'],
            ['id'=>'15','module'=>'International Relations','qualification_id'=>'3','grade'=>null,'created_at'=>'2019-11-25 16:43:17'],
            ['id'=>'16','module'=>'Participate effectively in Work Health & Safety communication & consultation process (WSBWHS304)','qualification_id'=>'4','grade'=>'CO','created_at'=>'2019-11-25 16:43:17'],
            ['id'=>'17','module'=>'Create basic databases (ICTDBS403)','qualification_id'=>'4','grade'=>'CO','created_at'=>'2019-11-25 16:43:17'],
            ['id'=>'18','module'=>'Determine & confirm client Business Requirements (ICTICT401)','qualification_id'=>'4','grade'=>'CO','created_at'=>'2019-11-25 16:43:17'],
            ['id'=>'19','module'=>'Apply Software Development Methodologies (ICTICT403)','qualification_id'=>'4','grade'=>'CO','created_at'=>'2019-11-25 16:43:17'],
            ['id'=>'20','module'=>'Contribute to copyright ethics & privacy in an ICT environment (ICTDBS403)  ','qualification_id'=>'4','grade'=>'CO','created_at'=>'2019-11-25 16:43:17'],
            ['id'=>'21','module'=>'Confirm accessibility of websites for people with special needs (ICTWEB402)','qualification_id'=>'4','grade'=>'CO','created_at'=>'2019-11-25 16:43:17'],
            ['id'=>'22','module'=>'Transfer content to a website using commercial packages (ICTWEB403)','qualification_id'=>'4','grade'=>'CO','created_at'=>'2019-11-25 16:43:17'],
            ['id'=>'23','module'=>'Monitor traffic and compile Website Traffic Reports (ICTWEB405)','qualification_id'=>'4','grade'=>'CO','created_at'=>'2019-11-25 16:43:17'],
            ['id'=>'24','module'=>'Develop Cascading Style Sheets (ICTWEB409)','qualification_id'=>'4','grade'=>'CO','created_at'=>'2019-11-25 16:43:17'],
            ['id'=>'25','module'=>'Apply a web authoring tool to convert client data for websites (ICTWEB410)','qualification_id'=>'4','grade'=>'CO','created_at'=>'2019-11-25 16:43:17'],
            ['id'=>'26','module'=>'Produce basic client-side script for Dynamic Web Pages (ICTWEB411)','qualification_id'=>'4','grade'=>'CO','created_at'=>'2019-11-25 16:43:17'],
            ['id'=>'27','module'=>'Optimise search engines (ICTWEB413)','qualification_id'=>'4','grade'=>'CO','created_at'=>'2019-11-25 16:43:17'],
            ['id'=>'28','module'=>'Design simple webpage layouts (ICTWEB414)','qualification_id'=>'4','grade'=>'CO','created_at'=>'2019-11-25 16:43:17'],
            ['id'=>'29','module'=>'Produce server-side script for Dynamic Web Pages (ICTWEB415)','qualification_id'=>'4','grade'=>'CO','created_at'=>'2019-11-25 16:43:17'],
            ['id'=>'30','module'=>'Integrate Social Web Technologies (ICTWEB417)','qualification_id'=>'4','grade'=>'CO','created_at'=>'2019-11-25 16:43:17'],
            ['id'=>'31','module'=>'Use development tools & ICT tools to build a basic website (ICTWEB418)','qualification_id'=>'4','grade'=>'CO','created_at'=>'2019-11-25 16:43:17'],
            ['id'=>'32','module'=>'Ensure website content meets technical protocols & standards (ICTWEB421)','qualification_id'=>'4','grade'=>'CO','created_at'=>'2019-11-25 16:43:17'],
            ['id'=>'33','module'=>'Ensure website Access & Usability (ICTWEB422)','qualification_id'=>'4','grade'=>'CO','created_at'=>'2019-11-25 16:43:17'],
            ['id'=>'34','module'=>'Evaluate & select a Web Hosting Service (ICTWEB424)','qualification_id'=>'4','grade'=>'CO','created_at'=>'2019-11-25 16:43:17'],
            ['id'=>'35','module'=>'Apply Structured Query Language to extract & manipulate data (ICTWEB425)','qualification_id'=>'4','grade'=>'CO','created_at'=>'2019-11-25 16:43:17'],
            ['id'=>'36','module'=>'Create a Markup Language Document to specification (ICTWEB429)','qualification_id'=>'4','grade'=>'CO','created_at'=>'2019-11-25 16:43:17']
            ]);
    }
}
