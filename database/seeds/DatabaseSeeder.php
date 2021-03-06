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
        // $this->call(UsersTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(SaleTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(BillTableSeeder::class);
        $this->call(DetailbillTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UserRoleTableSeeder::class);
        $this->call(CommentTableSeeder::class);
        $this->call(NewTableSeeder::class);

    }
}
