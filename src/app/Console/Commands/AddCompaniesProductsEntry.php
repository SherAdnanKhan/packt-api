<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Company;
use App\Models\CompanyProduct;

class AddCompaniesProductsEntry extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:add-companies-products-entry';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Use this command to add an entry in company_products table for allowing companies to access specific products';

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
        try {
           
            $company = strtolower($this->ask('Please provide a Company Name'));
            $company_name = Company::where('company_name', '=', $company)->first();
            if(!$company_name) {
                throw new \Exception('Company Name do not exist');
            }
            $companyid = $company_name->id;

            $product = $this->ask('Please provide a Product ISBN / SKU');
            $companiesProduct = new CompanyProduct();
            $companiesProduct->company_id = $companyid;
            $companiesProduct->product_id = $product;
            if($companiesProduct->save()) {
                $this->info('Product ISBN / SKU added successfully!');
                return 0;
            }

            throw new \Exception('Something went wrong, unable to save new entry for Companies Products');

        } catch (\Exception $ex) {
            $this->error($ex->getMessage());
            return 1;
        }
    }
}
