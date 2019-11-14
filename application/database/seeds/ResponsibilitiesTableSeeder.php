<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ResponsibilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('responsibilities')->insert([
        
            ['id'=>'1','responsibility'=>'General tidiness of the yard','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'2','responsibility'=>'Route planning','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'3','responsibility'=>'Speaking to customers','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'4','responsibility'=>'Vehicle condition checks','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'5','responsibility'=>'Vehicle loading','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'6','responsibility'=>'Presentation of vehicles on sale days','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'7','responsibility'=>'Manoeuvring & parking of vehicles on site','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'8','responsibility'=>'DBA (eg. User / role Management, Maintenance Plans etc) ','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'9','responsibility'=>'Needs elicitation','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'10','responsibility'=>'Design specification','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'11','responsibility'=>'Project Implementation','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'12','responsibility'=>'Maintenance','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'13','responsibility'=>'Bug-fixes','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'14','responsibility'=>'Day-to-day project management','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'15','responsibility'=>'Standard Operating Procedures (SOPs)','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'16','responsibility'=>'Enhancement','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'17','responsibility'=>'Code review','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'18','responsibility'=>'Testing','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'19','responsibility'=>'Data collection systems (Case Report Forms, lab results, patient questionaires etc)','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'20','responsibility'=>'Views','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'21','responsibility'=>'Reports','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'22','responsibility'=>'Randomisation systems','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'23','responsibility'=>'Integration & maintenance of the Data Warehouse system','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'24','responsibility'=>'Sample tracking & storage systems','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'25','responsibility'=>'Maintenance of Control of Substances Hazardous to Health (COSHH) database','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'26','responsibility'=>'Entering patients on the trial, via randomisation wizard','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'27','responsibility'=>'Data-entry','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'28','responsibility'=>'Adverse event reporting','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'29','responsibility'=>'Collation of treatment records','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'30','responsibility'=>'Generating data queries and reports','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'31','responsibility'=>'Managing participating clinicians (data warehouse)','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'32','responsibility'=>'Managing participating centres (data warehouse)','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'33','responsibility'=>'Installation & support of servers and desktop PCs','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'34','responsibility'=>'Offsite Backups','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'35','responsibility'=>'Monitoring of UNIX fail-over cluster','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'36','responsibility'=>'Configuration of wireless devices','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'37','responsibility'=>'Installation & service of terminals, printers, barcode scanners etc','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'38','responsibility'=>'Data-entry (BEWT)','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'39','responsibility'=>'Writing data queries (BEWT)','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'40','responsibility'=>'Database backup (BEWT)','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'41','responsibility'=>'Analysis','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'42','responsibility'=>'Design','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'43','responsibility'=>'Implementation','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'44','responsibility'=>'Maintenance','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'45','responsibility'=>'User support','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'46','responsibility'=>'Using XML based code generation tools','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'47','responsibility'=>'Policies & Procedures','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'48','responsibility'=>'Code review','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'49','responsibility'=>'Site Action to manage customer issues with history and context links to the CDM application','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'50','responsibility'=>'Manage Customers (Address, Bank Accounts, Contacts, Opening Hours) ','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'51','responsibility'=>'Manage Suppliers (Address, Bank Accounts, Contacts) ','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'52','responsibility'=>'Manage Product and Items (Supplier Products and Price Lists for various currencies, Item Bundles and Prices for various currencies) ','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'53','responsibility'=>'Contract to Invoice process (Contract, Booking, Billing Run, Invoice Approval) ','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'54','responsibility'=>'Finance Config (Tax Codes and Rates, Financial Products, Currency X-Change Rates) ','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'55','responsibility'=>'Factory pattern to derive a dynamic menu ','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'56','responsibility'=>'User defined Lookup to enable the business to change the values in picklists ','created_at'=>'2019-11-14 13:29:12'],
            ['id'=>'57','responsibility'=>'Modal window for info, forms and approval ','created_at'=>'2019-11-14 13:29:12']

            ]);
    }
}
