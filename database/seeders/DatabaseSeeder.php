<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Postingan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ahmad Reskey',
            'username' => 'ahmadreskey',
            'email' => 'ahmadreskey@gmail.com',
            'password' => bcrypt('12345')
        ]);

        User::factory(3)->create();

        /*
        User::create([
            'name' => 'Dewa Angga',
            'email' => 'dewaangga@gmail.com',
            'password' => bcrypt('12345')
        ]);
        */

        Kategori::create([
            'nama' => 'Musik',
            'slug' => 'musik'
        ]);

        Kategori::create([
            'nama' => 'Desain',
            'slug' => 'desain'
        ]);

        Kategori::create([
            'nama' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Postingan::factory(29)->create();

        /*
        Postingan::create([
            'kategori_id' => '1',
            'user_id' => '1',
            'judul' => 'Judul Ke Satu',
            'slug' => 'judul-kesatu',
            'author' => 'Ahmad Reskey',
            'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt reiciendis est rerum facere rem cupiditate distinctio saepe assumenda beatae modi expedita architecto molestiae quaerat a fugiat nam dolore',
            'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt reiciendis est rerum facere rem cupiditate distinctio saepe assumenda beatae modi expedita architecto molestiae quaerat a fugiat nam dolore, odio illum nisi praesentium atque commodi ea voluptas.</p><p>Consectetur officiis harum cum, delectus assumenda enim maxime quisquam laboriosam iste soluta optio officia voluptatibus corrupti quidem nam mollitia est, eius totam facilis facere quos dolores natus ad distinctio! Beatae corrupti repellendus velit nesciunt perspiciatis a, reiciendis animi vero et nam consequatur autem quia? Quibusdam beatae aliquid esse illo corporis, itaque est dolores officiis unde obcaecati, voluptas hic. Rerum saepe molestiae voluptates nobis aliquid!</p>'
        ]);

        Postingan::create([
            'kategori_id' => '2',
            'user_id' => '1',
            'judul' => 'Judul Ke Dua',
            'slug' => 'judul-kedua',
            'author' => 'Deva Mahendra',
            'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt reiciendis est rerum facere rem cupiditate distinctio saepe assumenda beatae modi expedita architecto molestiae quaerat a fugiat nam dolore',
            'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt reiciendis est rerum facere rem cupiditate distinctio saepe assumenda beatae modi expedita architecto molestiae quaerat a fugiat nam dolore, odio illum nisi praesentium atque commodi ea voluptas.</p><p>Consectetur officiis harum cum, delectus assumenda enim maxime quisquam laboriosam iste soluta optio officia voluptatibus corrupti quidem nam mollitia est, eius totam facilis facere quos dolores natus ad distinctio! Beatae corrupti repellendus velit nesciunt perspiciatis a, reiciendis animi vero et nam consequatur autem quia? Quibusdam beatae aliquid esse illo corporis, itaque est dolores officiis unde obcaecati, voluptas hic. Rerum saepe molestiae voluptates nobis aliquid!</p>'
        ]);

        Postingan::create([
            'kategori_id' => '1',
            'user_id' => '2',
            'judul' => 'Judul Ke Tiga',
            'slug' => 'judul-ketiga',
            'author' => 'Seto Nurdiantoro',
            'isi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem accusamus omnis quam odio itaque! Necessitatibus',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem accusamus omnis quam odio itaque! Necessitatibus, voluptate illo.</p><p>At sunt temporibus sit architecto eveniet excepturi adipisci tempore quisquam, facere esse modi nulla provident quos voluptas commodi cumque autem vitae velit veritatis ducimus ab! Corrupti qui aperiam distinctio unde ipsam ipsum?</p>'
        ]);
        */
    }
}
