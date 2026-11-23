<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('testimonials', function (Blueprint $table) {
            if (! Schema::hasColumn('testimonials', 'order')) {
                $table->unsignedInteger('order')->default(0)->after('status');
            }
        });

        $existing = DB::table('testimonials')->orderBy('id')->get();

        if ($existing->isEmpty()) {
            $now = now();
            DB::table('testimonials')->insert([
                [
                    'name' => 'Prakash Rokaya',
                    'company' => 'Sinja High Altitude Cooperative, Jumla',
                    'reviews' => 'Before partnering with Munaa, our Marsi rice would sit waiting for buyers while middlemen negotiated rock bottom rates. Today, our 140 farm families receive guaranteed fair prices and advance scheduling.',
                    'image' => 'assets/images/team/team-field.jpg',
                    'status' => 1,
                    'order' => 1,
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'name' => 'Karma Thakali',
                    'company' => 'Muktinath Orchard Collective, Marpha',
                    'reviews' => 'The cold-chain transit Munaa introduced preserves the crisp texture of our Mustang apples down to the valley markets. Farmers now focus entirely on organic orchard care without worrying about post-harvest spoilage.',
                    'image' => 'assets/images/team/team-director.jpg',
                    'status' => 1,
                    'order' => 2,
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'name' => 'Radha Bajracharya',
                    'company' => 'Munaabazar Regular Customer, Sanepa',
                    'reviews' => 'As a mother of two in Lalitpur, knowing my vegetables come straight from Panauti without heavy chemical sprays gives me total peace of mind. The taste is remarkably fresh.',
                    'image' => 'assets/images/team/team-quality.jpg',
                    'status' => 1,
                    'order' => 3,
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
            ]);

            return;
        }

        foreach ($existing as $index => $row) {
            if ((int) $row->order === 0) {
                DB::table('testimonials')->where('id', $row->id)->update(['order' => $index + 1]);
            }
        }
    }

    public function down(): void
    {
        Schema::table('testimonials', function (Blueprint $table) {
            if (Schema::hasColumn('testimonials', 'order')) {
                $table->dropColumn('order');
            }
        });
    }
};
