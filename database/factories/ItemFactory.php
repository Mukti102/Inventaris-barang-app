<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\ReportItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode_barang' => fake()->unique()->numerify('KB###'),
            'nama_barang' => fake()->words(2, true),
            'spesifikasi' => fake()->sentence(3),
            'satuan' => fake()->randomElement(['pcs', 'box', 'unit']),
            'kategori' => fake()->name(),
            'stok' => fake()->numberBetween(1, 10),
            'lokasi_penyimpanan' => fake()->city(),
        ];
    }


    public function configure(): static
    {
        return $this->afterCreating(function (Item $item) {
            ReportItem::create([
                'item_id' => $item->id,
                'stock_awal' => $item->stok,
                'jumlah_pemasukkan' => 0,
                'jumlah_pengeluaran' => 0,
                'sisa_stok' => $item->stok,
            ]);
        });
    }
}
