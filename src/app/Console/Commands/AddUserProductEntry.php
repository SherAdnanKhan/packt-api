<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\UserProduct;
use Illuminate\Console\Command;

class AddUserProductEntry extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:add-user-product-entry';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Use this command to add an entry in user_products table for allowing user to access specific products';

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
        $userID = $this->ask('Please provide a User ID');
        $product = $this->ask('Please provide a Product ISBN / SKU');

        try {
            $user = User::find($userID);

            if(!$user) {
                throw new \Exception('User with ID '.$userID.' does not exists.');
            }

            $userProduct = new UserProduct;
            $userProduct->user_id = $userID;
            $userProduct->product_id = $product;
            if($userProduct->save()) {
                $this->info('Entry added successfully!');
                return 0;
            }
            throw new \Exception('Something went wrong, unable to save new entry for UserProducts');

        } catch (\Exception $ex) {
            $this->error($ex->getMessage());
            return 1;
        }
    }
}
