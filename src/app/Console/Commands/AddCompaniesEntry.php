<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Company;
use App\Models\CompanyUser;
use Illuminate\Console\Command;

class AddCompaniesEntry extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:add-companies-entry';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Use this command to add an entry in companies, company_users table';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $company = strtolower($this->ask('Please provide a Company Name'));

        try {

            $company_name = Company::where('company_name', '=', $company)->exists();
            if(!$company_name) {
                $companyName = new Company();
                $companyName->company_name = $company;
                $companyName->save();
                $this->info('Company added successfully!');
            }

            $companyid = Company::where('company_name', $company)->first()->id;

            $userID = $this->ask('Please provide a User ID');
            $user = User::find($userID);

            if(!$user) {
                throw new \Exception('User with ID '.$userID.' does not exists.');
            }

            $check_user = CompanyUser::where('company_id', '=', $companyid)
                                        ->where('user_id', '=', $userID)
                                        ->exists();

            if (!$check_user){
                $companyUsers = new CompanyUser();
                $companyUsers->company_id = $companyid;
                $companyUsers->user_id = $userID;
                if($companyUsers->save()){;
                    $this->info('Company User added successfully!');
                    return 0;
                }
            }

            throw new \Exception('User already added to company'. ' '. $company);

        } catch (\Exception $ex) {
            $this->error($ex->getMessage());
            return 1;
        }
    }
}
