<?php

namespace App\Console\Commands;

use App\Company;
use Illuminate\Console\Command;

class AddCompanyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'contact:company {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds a new company';


    public function handle()
    {
        //
        $company =Company::create([
            'name' => $this->argument('name')
        ]);

        $this->info('Added' . $company->name);


    }
}
