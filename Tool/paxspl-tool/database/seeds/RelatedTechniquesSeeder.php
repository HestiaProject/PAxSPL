<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
class RelatedTechniquesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('related_techniques')->insert([ 
            'related_from' => 1, 
            'related_to' => 4, 
        ]);

        DB::table('related_techniques')->insert([ 
            'related_from' => 2, 
            'related_to' => 4, 
        ]);

        DB::table('related_techniques')->insert([ 
            'related_from' => 3, 
            'related_to' => 1, 
        ]);

        DB::table('related_techniques')->insert([ 
            'related_from' => 4, 
            'related_to' => 1, 
        ]);

        DB::table('related_techniques')->insert([ 
            'related_from' => 4, 
            'related_to' => 5, 
        ]);

        DB::table('related_techniques')->insert([ 
            'related_from' => 5, 
            'related_to' => 1, 
        ]);

        DB::table('related_techniques')->insert([ 
            'related_from' => 5, 
            'related_to' => 4, 
        ]);

        DB::table('related_techniques')->insert([ 
            'related_from' => 6, 
            'related_to' => 1, 
        ]);

        DB::table('related_techniques')->insert([ 
            'related_from' => 6, 
            'related_to' => 4, 
        ]);
    }
}
