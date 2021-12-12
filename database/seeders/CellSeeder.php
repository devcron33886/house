<?php

namespace Database\Seeders;

use App\Models\Cell;
use Illuminate\Database\Seeder;

class CellSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cells = [
            [
            'sector_id' => 1,
            'name' => 'A1',],
            [
            'sector_id' => 1,
            'name' => 'A2',],
            [
            'sector_id' => 2,
            'name' => 'A3',],
            [
            'sector_id' => 1,
            'name' => 'A4',],
            [
            'sector_id' => 3,
            'name' => 'A5',],
            [
            'sector_id' => 2,
            'name' => 'A6',],
            [
            'sector_id' => 2,
            'name' => 'A7',],
            ['sector_id' => 3,
            'name' => 'A8',],
            [
            'sector_id' => 3,
            'name' => 'A9',],
            [
            'sector_id' => 1,
            'name' => 'A10',],
            
        ];

        Cell::insert($cells);
    }
}
