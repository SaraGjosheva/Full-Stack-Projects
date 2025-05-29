<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuItemSeeder extends Seeder
{
    public function run(): void
    {
        // MenuItem::create([
        //     'name' => 'Mojito',
        //     'category' => 'Коктели',
        //     'ingredients' => 'White rum, mint, lime, sugar, soda water',
        //     'image' => 'https://uglyducklingbakery.com/wp-content/uploads/2023/07/blue-mojito.jpg',
        //     'is_recommended' => true,
        //     'is_popular' => false,
        // ]);

        // MenuItem::create([
        //     'name' => 'Sex on the Beach',
        //     'category' => 'Коктели',
        //     'ingredients' => 'Vodka, peach schnapps, cranberry juice, orange juice',
        //     'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT_A7cquoiColyghbvYFd9uQ_OXWYobhiu1wA&s',
        //     'is_recommended' => false,
        //     'is_popular' => true,
        // ]);

        // MenuItem::create([
        //     'name' => 'Tequila Sunrise',
        //     'category' => 'Коктели',
        //     'ingredients' => 'Tequila, orange juice, grenadine',
        //     'image' => 'https://www.liquor.com/thmb/4a5XHgm78VxmIq6AJ5Zq3VK12a4=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/tequila-sunrise-1500x1500-hero-eeae10efeb134a3e9d5a3852b1b6e7dc.jpg',
        // ]);

        // MenuItem::create([
        //     'name' => 'Cosmopolitan',
        //     'category' => 'Коктели',
        //     'ingredients' => 'Vodka, triple sec, cranberry juice, lime juice',
        //     'image' => 'https://assets.bonappetit.com/photos/650df690c94ec4218673b45a/1:1/w_2560%2Cc_limit/20230915-WEB-SEO-0882_update%2520copy.jpg',
        // ]);

        // MenuItem::create([
        //     'name' => 'Mai Tai',
        //     'category' => 'Коктели',
        //     'ingredients' => 'Rum, lime juice, orange liqueur, orgeat syrup',
        //     'image' => 'https://www.mantitlement.com/wp-content/uploads/2020/04/mai-tai-cocktail-feature.jpg',
        // ]);

        // MenuItem::create([
        //     'name' => 'Espresso',
        //     'category' => 'Кафе',
        //     'ingredients' => 'Espresso shot',
        //     'image' => 'https://sumatocoffee.com/cdn/shop/articles/espresso.png?v=1718370919&width=640',
        //     'is_popular' => true,
        // ]);

        // MenuItem::create([
        //     'name' => 'Cappuccino',
        //     'category' => 'Кафе',
        //     'ingredients' => 'Espresso, steamed milk, milk foam',
        //     'image' => 'https://lorcoffee.com/cdn/shop/articles/Cappuccino-exc.jpg?v=1684870907',
        // ]);

        // MenuItem::create([
        //     'name' => 'Latte',
        //     'category' => 'Кафе',
        //     'ingredients' => 'Espresso, steamed milk',
        //     'image' => 'https://images.unsplash.com/photo-1541167760496-1628856ab772?auto=format&fit=crop&w=800&q=80',
        //     'is_recommended' => true,
        // ]);

        // MenuItem::create([
        //     'name' => 'Americano',
        //     'category' => 'Кафе',
        //     'ingredients' => 'Espresso, hot water',
        //     'image' => 'https://www.foodandwine.com/thmb/9JyfZPcxlV9ubEeuSznhO-M4q0w=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/Partners-Americano-FT-BLOG0523-b8e18cc340574cc9bed536cceeec7082.jpg',
        // ]);

        // MenuItem::create([
        //     'name' => 'Macchiato',
        //     'category' => 'Кафе',
        //     'ingredients' => 'Espresso, small amount of milk foam',
        //     'image' => 'https://www.thespruceeats.com/thmb/HXaU0FwlEoZ6d5MoPVzGCXKx41k=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/85153452-56a176765f9b58b7d0bf84dd.jpg',
        // ]);

        // MenuItem::create([
        //     'name' => 'Cheese Platter',
        //     'category' => 'Мезе',
        //     'ingredients' => 'Assorted cheeses, crackers, grapes',
        //     'image' => 'https://theartoffoodandwine.com/wp-content/uploads/2023/07/Cheese-Board-2.jpg',
        //     'is_recommended' => true,
        // ]);

        // MenuItem::create([
        //     'name' => 'Prosciutto & Melon',
        //     'category' => 'Мезе',
        //     'ingredients' => 'Prosciutto ham, cantaloupe melon',
        //     'image' => 'https://www.giangiskitchen.com/wp-content/uploads/2012/09/prosciutto21-1-of-1-scaled.jpg',
        // ]);

        // MenuItem::create([
        //     'name' => 'Stuffed Peppers',
        //     'category' => 'Мезе',
        //     'ingredients' => 'Peppers, cheese, herbs',
        //     'image' => 'https://www.giverecipe.com/wp-content/uploads/2017/06/Feta-Cheese-Stuffed-Peppers-2.jpg',
        // ]);

        // MenuItem::create([
        //     'name' => 'Olives & Bread',
        //     'category' => 'Мезе',
        //     'ingredients' => 'Mixed olives, breadsticks, olive oil',
        //     'image' => 'https://hips.hearstapps.com/hmg-prod/images/olive-cheese-bread-recipe-1-65ea241d65da3.jpg?crop=0.6666666666666667xw:1xh;center,top&resize=1200:*',
        // ]);

        // MenuItem::create([
        //     'name' => 'Mini Burek',
        //     'category' => 'Мезе',
        //     'ingredients' => 'Phyllo pastry, cheese or meat filling',
        //     'image' => 'https://pekara-dubravica.hr/assets/uploads/Proizvodi/Bureci/370X550MINI%20BUREK%20S%20MESOM%201073.jpg',
        //     'is_popular' => true,
        // ]);
    }
}
