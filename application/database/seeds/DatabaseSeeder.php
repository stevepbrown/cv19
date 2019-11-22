<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SkillsTableSeeder::class);
        $this->call(InstitutionsTableSeeder::class);
        $this->call(QualificationsTableSeeder::class);
        $this->call(ModulesTableSeeder::class);
        $this->call(EmployersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(ResponsibilitiesTableSeeder::class);
        $this->call(EmployerRolesTableSeeder::class);
        $this->call(RoleResponsibilitiesTableSeeder::class);
   
        
        
        
        
        
         }
}
