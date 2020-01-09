<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        
        // Balks inserting parent_skill_id due to FK constraint, so disable it
        Schema::disableForeignKeyConstraints();
        

        DB::table('skills')->insert([
      
            ['id'=>'9','skill'=>'Build Tools','parent_skill_id'=>'11','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'81','skill'=>'Operations','parent_skill_id'=>'18','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'80','skill'=>'Tools','parent_skill_id'=>'18','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'8','skill'=>'Bootstrap (v4) ','parent_skill_id'=>'12','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'79','skill'=>'MS-SQL','parent_skill_id'=>'78','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'78','skill'=>'Structured Query Languages','parent_skill_id'=>'18','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'77','skill'=>'Other','parent_skill_id'=>null,'created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'76','skill'=>'Webmin','parent_skill_id'=>'50','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'75','skill'=>'APT','parent_skill_id'=>'71','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'72','skill'=>'Chocolatey (Windows)','parent_skill_id'=>'71','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'71','skill'=>'Package / Dependency Management','parent_skill_id'=>'77','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'70','skill'=>'Yarn ','parent_skill_id'=>'71','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'7','skill'=>'Backup (full,differential,transactional)','parent_skill_id'=>'81','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'69','skill'=>'Waterfall ','parent_skill_id'=>'3','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'68','skill'=>'WAI/ARIA','parent_skill_id'=>'1','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'67','skill'=>'W3C','parent_skill_id'=>'1','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'66','skill'=>'Vuetify','parent_skill_id'=>'65','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'65','skill'=>'Vue','parent_skill_id'=>'12','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'64','skill'=>'Visual Studio Code ','parent_skill_id'=>'25','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'63','skill'=>'Virtualisation ','parent_skill_id'=>'50','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'62','skill'=>'Views ','parent_skill_id'=>'81','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'61','skill'=>'Version Control ','parent_skill_id'=>'77','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'60','skill'=>'Vb.net ','parent_skill_id'=>'53','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'6','skill'=>'AXE','parent_skill_id'=>'1','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'59','skill'=>'User & Role Management ','parent_skill_id'=>'81','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'58','skill'=>'Triggers ','parent_skill_id'=>'81','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'57','skill'=>'Storage configuration & monitoring ','parent_skill_id'=>'81','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'55','skill'=>'SQL Server Management Studio (SSMS)','parent_skill_id'=>'80','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'53','skill'=>'Server-side Languages','parent_skill_id'=>'51','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'52','skill'=>'Server-side Frameworks','parent_skill_id'=>'51','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'51','skill'=>'Server-side Development','parent_skill_id'=>null,'created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'50','skill'=>'Server Administration ','parent_skill_id'=>'51','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'5','skill'=>'Atom ','parent_skill_id'=>'25','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'49','skill'=>'SEO','parent_skill_id'=>'11','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'48','skill'=>'Semantic HTML','parent_skill_id'=>'1','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'47','skill'=>'SASS','parent_skill_id'=>'9','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'46','skill'=>'Responsive Web Design','parent_skill_id'=>'1','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'45','skill'=>'Reporting & Logging ','parent_skill_id'=>'81','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'44','skill'=>'Replication ','parent_skill_id'=>'81','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'42','skill'=>'PHP Storm','parent_skill_id'=>'25','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'41','skill'=>'PHP ','parent_skill_id'=>'53','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'40','skill'=>'Oracle Virtualbox ','parent_skill_id'=>'63','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'4','skill'=>'ASP.NET ','parent_skill_id'=>'53','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'39','skill'=>'Node (inc NPM /  NVM)','parent_skill_id'=>'71','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'38','skill'=>'Navicat','parent_skill_id'=>'80','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'37','skill'=>'MySQL Workbench','parent_skill_id'=>'80','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'36','skill'=>'MySQL','parent_skill_id'=>'78','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'35','skill'=>'Miscellaneous ','parent_skill_id'=>'77','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'34','skill'=>'Microsoft SQL Server Studio','parent_skill_id'=>'80','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'33','skill'=>'Microdata','parent_skill_id'=>'32','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'32','skill'=>'Markup & Styling','parent_skill_id'=>'11','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'31','skill'=>'Laravel Mix ','parent_skill_id'=>'9','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'30','skill'=>'Laravel Homestead','parent_skill_id'=>'63','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'3','skill'=>'Analysis / Design Methodologies','parent_skill_id'=>'77','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'29','skill'=>'Laravel ','parent_skill_id'=>'52','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'28','skill'=>'LAMP stack configuration ','parent_skill_id'=>'50','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'27','skill'=>'JS (including AJAX & JSON) ','parent_skill_id'=>'13','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'26','skill'=>'Jquery','parent_skill_id'=>'13','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'25','skill'=>'Integrated Development Environments ','parent_skill_id'=>'77','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'24','skill'=>'HTML5 ','parent_skill_id'=>'32','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'22','skill'=>'Hashicorp Vagrant ','parent_skill_id'=>'63','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'21','skill'=>'GIT','parent_skill_id'=>'61','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'20','skill'=>'Emmet ','parent_skill_id'=>'35','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'2','skill'=>'AGILE ','parent_skill_id'=>'3','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'18','skill'=>'Database ','parent_skill_id'=>'51','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'17','skill'=>'CSS3 ','parent_skill_id'=>'32','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'16','skill'=>'Connection Management ','parent_skill_id'=>'81','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'15','skill'=>'Composer ','parent_skill_id'=>'71','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'13','skill'=>'Client-side Languages','parent_skill_id'=>'11','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'12','skill'=>'Client-side Frameworks','parent_skill_id'=>'11','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'11','skill'=>'Client-side Development ','parent_skill_id'=>null,'created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'10','skill'=>'C# ','parent_skill_id'=>'53','created_at'=>'2020-01-09 11:54:07'],
            ['id'=>'1','skill'=>'Accessibility / standards compliance','parent_skill_id'=>'11','created_at'=>'2020-01-09 11:54:07'],
            ]);
    }
}
