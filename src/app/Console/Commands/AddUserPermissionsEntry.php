<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\UserPermission;
use App\Models\UserProduct;
use Illuminate\Console\Command;

class AddUserPermissionsEntry extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:add-user-permission-entry';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Use this command to add an entry in user_permissions table for allowing user to have specific SUPER permissions';

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
        $permissions = $this->ask('Please provide permissions in comma separated format. e.g. : SU,ALLCONTENT');

        try {
            $user = User::find($userID);

            if(!$user) {
                throw new \Exception('User with ID '.$userID.' does not exists.');
            }

            $userPermission = new UserPermission();
            $userPermission->user_id = $userID;
            $userPermission->abilities = explode(',',$permissions);
            if($userPermission->save()) {
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
