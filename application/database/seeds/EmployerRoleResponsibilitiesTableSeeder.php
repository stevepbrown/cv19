<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmployerRoleResponsibilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    

        DB::table('employer_role_responsibilities')->insert([

            ['id'=>'1','responsibility_id'=>'9','role_id'=>'5','employer_id'=>'1','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'2','responsibility_id'=>'10','role_id'=>'5','employer_id'=>'1','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'3','responsibility_id'=>'11','role_id'=>'5','employer_id'=>'1','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'4','responsibility_id'=>'13','role_id'=>'5','employer_id'=>'1','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'5','responsibility_id'=>'13','role_id'=>'5','employer_id'=>'2','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'6','responsibility_id'=>'14','role_id'=>'5','employer_id'=>'1','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'7','responsibility_id'=>'15','role_id'=>'5','employer_id'=>'1','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'8','responsibility_id'=>'16','role_id'=>'5','employer_id'=>'1','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'9','responsibility_id'=>'18','role_id'=>'5','employer_id'=>'1','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'10','responsibility_id'=>'20','role_id'=>'5','employer_id'=>'1','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'11','responsibility_id'=>'21','role_id'=>'5','employer_id'=>'1','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'12','responsibility_id'=>'22','role_id'=>'5','employer_id'=>'1','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'13','responsibility_id'=>'24','role_id'=>'5','employer_id'=>'1','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'14','responsibility_id'=>'27','role_id'=>'5','employer_id'=>'1','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'15','responsibility_id'=>'28','role_id'=>'5','employer_id'=>'1','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'16','responsibility_id'=>'34','role_id'=>'1','employer_id'=>'3','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'17','responsibility_id'=>'41','role_id'=>'5','employer_id'=>'1','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'18','responsibility_id'=>'42','role_id'=>'5','employer_id'=>'1','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'19','responsibility_id'=>'43','role_id'=>'5','employer_id'=>'1','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'20','responsibility_id'=>'44','role_id'=>'5','employer_id'=>'1','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'21','responsibility_id'=>'45','role_id'=>'5','employer_id'=>'1','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'22','responsibility_id'=>'46','role_id'=>'5','employer_id'=>'1','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'23','responsibility_id'=>'47','role_id'=>'5','employer_id'=>'1','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'24','responsibility_id'=>'53','role_id'=>'6','employer_id'=>'4','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'25','responsibility_id'=>'26','role_id'=>'2','employer_id'=>'2','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'26','responsibility_id'=>'27','role_id'=>'2','employer_id'=>'2','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'27','responsibility_id'=>'29','role_id'=>'2','employer_id'=>'2','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'28','responsibility_id'=>'31','role_id'=>'2','employer_id'=>'2','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'29','responsibility_id'=>'32','role_id'=>'2','employer_id'=>'2','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'30','responsibility_id'=>'6','role_id'=>'3','employer_id'=>'6','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'31','responsibility_id'=>'8','role_id'=>'5','employer_id'=>'2','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'32','responsibility_id'=>'9','role_id'=>'5','employer_id'=>'2','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'33','responsibility_id'=>'10','role_id'=>'5','employer_id'=>'2','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'34','responsibility_id'=>'11','role_id'=>'5','employer_id'=>'2','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'35','responsibility_id'=>'14','role_id'=>'5','employer_id'=>'2','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'36','responsibility_id'=>'15','role_id'=>'5','employer_id'=>'2','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'37','responsibility_id'=>'16','role_id'=>'5','employer_id'=>'2','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'38','responsibility_id'=>'18','role_id'=>'5','employer_id'=>'2','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'39','responsibility_id'=>'19','role_id'=>'5','employer_id'=>'2','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'40','responsibility_id'=>'20','role_id'=>'5','employer_id'=>'2','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'41','responsibility_id'=>'21','role_id'=>'5','employer_id'=>'2','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'42','responsibility_id'=>'22','role_id'=>'5','employer_id'=>'2','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'43','responsibility_id'=>'23','role_id'=>'5','employer_id'=>'2','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'44','responsibility_id'=>'25','role_id'=>'5','employer_id'=>'2','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'45','responsibility_id'=>'28','role_id'=>'5','employer_id'=>'2','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'46','responsibility_id'=>'41','role_id'=>'5','employer_id'=>'2','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'47','responsibility_id'=>'42','role_id'=>'5','employer_id'=>'2','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'48','responsibility_id'=>'43','role_id'=>'5','employer_id'=>'2','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'49','responsibility_id'=>'44','role_id'=>'5','employer_id'=>'2','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'50','responsibility_id'=>'45','role_id'=>'5','employer_id'=>'2','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'51','responsibility_id'=>'47','role_id'=>'5','employer_id'=>'2','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'52','responsibility_id'=>'48','role_id'=>'5','employer_id'=>'2','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'53','responsibility_id'=>'33','role_id'=>'1','employer_id'=>'3','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'54','responsibility_id'=>'35','role_id'=>'1','employer_id'=>'3','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'55','responsibility_id'=>'36','role_id'=>'1','employer_id'=>'3','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'56','responsibility_id'=>'37','role_id'=>'1','employer_id'=>'3','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'57','responsibility_id'=>'48','role_id'=>'5','employer_id'=>'1','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'58','responsibility_id'=>'49','role_id'=>'6','employer_id'=>'4','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'59','responsibility_id'=>'50','role_id'=>'6','employer_id'=>'4','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'60','responsibility_id'=>'51','role_id'=>'6','employer_id'=>'4','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'61','responsibility_id'=>'52','role_id'=>'6','employer_id'=>'4','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'62','responsibility_id'=>'54','role_id'=>'6','employer_id'=>'4','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'63','responsibility_id'=>'55','role_id'=>'6','employer_id'=>'4','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'64','responsibility_id'=>'56','role_id'=>'6','employer_id'=>'4','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'65','responsibility_id'=>'57','role_id'=>'6','employer_id'=>'4','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'66','responsibility_id'=>'1','role_id'=>'3','employer_id'=>'6','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'67','responsibility_id'=>'2','role_id'=>'3','employer_id'=>'6','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'68','responsibility_id'=>'3','role_id'=>'3','employer_id'=>'6','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'69','responsibility_id'=>'4','role_id'=>'3','employer_id'=>'6','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'70','responsibility_id'=>'5','role_id'=>'3','employer_id'=>'6','created_at'=>'2019-11-14 12:55:32'],
            ['id'=>'71','responsibility_id'=>'31','role_id'=>'5','employer_id'=>'1','created_at'=>'2019-11-14 12:55:32'],
            
        ]);    

    }
}
