<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //'url'=>'Galaxy-S22-Plus-White-600x600.jpg'
            //'url'=>'iphone-11-trang-600x600.jpg',
             'url'=>'msi-gaming-gf63-thin-11uc-i5-11400h-8gb-512gb-600x600.jpg',
            // 'url'=>'Nokia-C31-Xanh-thumb-1-600x600.jpg',
            // 'url'=>'oppo-a16k-thumb1-600x600-1-600x600.jpg',
            // 'url'=>'oppo-a54-4g-black-600x600.jpg',
            // 'url'=>'realme-c35-thumb-new-600x600.jpg',
            // 'url'=>'samsung-galaxy-z-flip4-5g-512gb-thumb-xanh-600x600.jpg',
            // 'url'=>'Vivo-y15A-trang-xanh-600x600.jpg',
            // 'url'=>'vivo-y21s-white-600x600.jpg',
            // 'url'=>'Galaxy-S22-Plus-White-600x600.jpg',
            'category'=>'laptop'
        ];
    }
}
