<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\Faq;
use App\Models\Farm;
use App\Models\Gallery;
use App\Models\GalleryImage;
use App\Models\Notice;
use App\Models\Office;
use App\Models\Product;
use App\Models\Team;
use App\Models\Video;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MunaaKrishiSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Seed Products
        if (Product::count() === 0) {
            $products = [
                [
                    'name' => 'Jumla Marsi Red Rice',
                    'nepali_name' => 'जुम्ला मार्सी चामल',
                    'slug' => 'jumla-marsi-rice',
                    'category' => 'grains',
                    'district' => 'Jumla',
                    'tag' => 'New harvest',
                    'price' => 240.00,
                    'unit' => 'kg',
                    'image' => 'assets/images/products/rice-marsi.jpg',
                    'description' => 'Nutty, slightly sweet red rice grown above 2,400 metres in Sinja valley.',
                    'order' => 1,
                    'status' => true,
                ],
                [
                    'name' => 'Marpha Apple',
                    'nepali_name' => 'मार्फा स्याउ',
                    'slug' => 'marpha-apple',
                    'category' => 'fruits',
                    'district' => 'Mustang',
                    'tag' => 'Asoj harvest',
                    'price' => 180.00,
                    'unit' => 'kg',
                    'image' => 'assets/images/products/apple-mustang.jpg',
                    'description' => 'Crisp, juicy apples from the dry Kali Gandaki valley at 2,670m altitude.',
                    'order' => 2,
                    'status' => true,
                ],
                [
                    'name' => 'Raw Chiuri Honey',
                    'nepali_name' => 'चिउरी मह',
                    'slug' => 'chiuri-honey',
                    'category' => 'honey',
                    'district' => 'Surkhet',
                    'tag' => 'Raw Honey',
                    'price' => 1200.00,
                    'unit' => 'kg',
                    'image' => 'assets/images/products/honey-chiuri.jpg',
                    'description' => 'Thick, pale winter honey harvested from butter tree forests by women beekeepers.',
                    'order' => 3,
                    'status' => true,
                ],
                [
                    'name' => 'Ilam Orthodox Black Tea',
                    'nepali_name' => 'इलाम चिया',
                    'slug' => 'ilam-orthodox-tea',
                    'category' => 'tea-spices',
                    'district' => 'Ilam',
                    'tag' => 'Export Grade',
                    'price' => 650.00,
                    'unit' => '250g',
                    'image' => 'assets/images/products/tea-ilam.jpg',
                    'description' => 'Hand rolled first and second flush from the misty slopes above Kanyam.',
                    'order' => 4,
                    'status' => true,
                ],
                [
                    'name' => 'Kavre Red Potato',
                    'nepali_name' => 'काभ्रे रातो आलु',
                    'slug' => 'kavre-red-potato',
                    'category' => 'vegetables',
                    'district' => 'Kavrepalanchok',
                    'tag' => 'Fresh this week',
                    'price' => 90.00,
                    'unit' => 'kg',
                    'image' => 'assets/images/products/potato-red.jpg',
                    'description' => 'Firm, waxy red potatoes grown with vermicompost, harvested fresh daily.',
                    'order' => 5,
                    'status' => true,
                ],
                [
                    'name' => 'Jumla Timur',
                    'nepali_name' => 'जुम्लाको टिमुर',
                    'slug' => 'jumla-timur',
                    'category' => 'tea-spices',
                    'district' => 'Jumla',
                    'tag' => 'Wild Harvest',
                    'price' => 350.00,
                    'unit' => '100g',
                    'image' => 'assets/images/products/timur-dried.jpg',
                    'description' => 'Wild Himalayan pepper with a bright, citrusy and tingling aroma.',
                    'order' => 6,
                    'status' => true,
                ],
                [
                    'name' => 'Kalinchowk Gundruk',
                    'nepali_name' => 'कालिञ्चोक गुन्द्रुक',
                    'slug' => 'kalinchowk-gundruk',
                    'category' => 'pickles-dried',
                    'district' => 'Dolakha',
                    'tag' => 'Heritage Recipe',
                    'price' => 220.00,
                    'unit' => '200g',
                    'image' => 'assets/images/products/gundruk.jpg',
                    'description' => 'Naturally fermented, sun dried mustard and radish leaves made by mothers\' groups.',
                    'order' => 7,
                    'status' => true,
                ],
                [
                    'name' => 'Langtang Soft Chhurpi',
                    'nepali_name' => 'लाङटाङ छुर्पी',
                    'slug' => 'langtang-chhurpi',
                    'category' => 'dairy',
                    'district' => 'Rasuwa',
                    'tag' => 'High Altitude',
                    'price' => 450.00,
                    'unit' => '250g',
                    'image' => 'assets/images/products/chhurpi.jpg',
                    'description' => 'Mild, creamy cheese made from high-altitude chauri milk at 3,400 metres.',
                    'order' => 8,
                    'status' => true,
                ],
                [
                    'name' => 'Mustang Phapar Flour',
                    'nepali_name' => 'मुस्ताङ फापरको पिठो',
                    'slug' => 'mustang-phapar-flour',
                    'category' => 'grains',
                    'district' => 'Mustang',
                    'tag' => 'Gluten Free',
                    'price' => 160.00,
                    'unit' => 'kg',
                    'image' => 'assets/images/products/flour-buckwheat.jpg',
                    'description' => 'Stone ground high-altitude buckwheat flour, naturally nutritious and gluten-free.',
                    'order' => 9,
                    'status' => true,
                ],
                [
                    'name' => 'Rayo Saag and Seasonal Greens',
                    'nepali_name' => 'रायो साग तथा ताजा तरकारी',
                    'slug' => 'rayo-saag-seasonal-greens',
                    'category' => 'vegetables',
                    'district' => 'Kavrepalanchok',
                    'tag' => 'Picked daily',
                    'price' => 70.00,
                    'unit' => 'bundle',
                    'image' => 'assets/images/products/greens-seasonal.jpg',
                    'description' => 'Fresh mustard greens, radish, and cauliflower harvested at dawn every morning.',
                    'order' => 10,
                    'status' => true,
                ],
            ];

            foreach ($products as $p) {
                Product::create($p);
            }
        }

        // 2. Seed Farms
        if (Farm::count() === 0) {
            $farms = [
                [
                    'name' => 'Sinja Valley High Altitude Cooperative',
                    'nepali_name' => 'सिन्जा उपत्यका मार्सी सहकारी',
                    'slug' => 'sinja-marsi-cooperative',
                    'province' => 'Karnali Province',
                    'district' => 'Jumla',
                    'altitude' => '2,400 - 2,800m',
                    'practice' => 'Snowmelt irrigation, Indigenous seed saving, Farmyard manure only',
                    'produce' => 'Jumla Marsi Red Rice, Jumla Timur, Walnut',
                    'farmers_count' => 140,
                    'image' => 'assets/images/farms/nepal-terrace-farm.jpg',
                    'description' => 'Historic origins of Nepali language and cold-climate agriculture. Farmers here use zero synthetic fertilizers and irrigate with direct glacier runoff.',
                    'order' => 1,
                    'status' => true,
                ],
                [
                    'name' => 'Muktinath Valley Orchard Collective',
                    'nepali_name' => 'मुक्तिनाथ स्याउ तथा ओखर फार्म',
                    'slug' => 'marpha-thakali-orchard',
                    'province' => 'Gandaki Province',
                    'district' => 'Mustang',
                    'altitude' => '2,700m',
                    'practice' => 'Drip irrigation, Pheromone pest traps, Hand picking and grading',
                    'produce' => 'Marpha Apple, Mustang Phapar Flour, Dried Apple Rings',
                    'farmers_count' => 85,
                    'image' => 'assets/images/farms/apple-orchard.jpg',
                    'description' => 'Rain-shadow alpine climate with intense solar radiation produces unmatched natural sugars and crispness in every harvest.',
                    'order' => 2,
                    'status' => true,
                ],
                [
                    'name' => 'Kanyam Smallholder Bio-Tea Growers',
                    'nepali_name' => 'कन्याम साना किसान चिया उत्पादक संघ',
                    'slug' => 'kanyam-small-tea-growers',
                    'province' => 'Koshi Province',
                    'district' => 'Ilam',
                    'altitude' => '1,850m',
                    'practice' => 'Vermicomposting, Shade tree intercropping, Hand rolled orthodox',
                    'produce' => 'Ilam Orthodox Black Tea, Silver Needle, Green Tea',
                    'farmers_count' => 210,
                    'image' => 'assets/images/farms/kanyam-tea.jpg',
                    'description' => 'Mist-covered mountain slopes yielding world-class organic tea leaves picked during morning dew by generational tea masters.',
                    'order' => 3,
                    'status' => true,
                ],
                [
                    'name' => 'Rapti Terai Agro-Ecology Cluster',
                    'nepali_name' => 'राप्ती तराई तोरी तथा तेलहन समूह',
                    'slug' => 'chitwan-mustard-coop',
                    'province' => 'Bagmati Province',
                    'district' => 'Chitwan',
                    'altitude' => '180m',
                    'practice' => 'Regenerative Oilseed Farming, Pulses Rotation',
                    'produce' => 'Cold-Pressed Mustard Oil, Yellow Mustard Seed, Raw Honey',
                    'farmers_count' => 320,
                    'image' => 'assets/images/farms/tea-field.jpg',
                    'description' => 'Rich alluvial plains cultivated with traditional non-GMO mustard varieties rotated with nitrogen-fixing pulses for balanced soil biology.',
                    'order' => 4,
                    'status' => true,
                ],
            ];

            foreach ($farms as $f) {
                Farm::create($f);
            }
        }

        // 3. Seed Offices / Outlets
        if (Office::count() === 0) {
            $offices = [
                [
                    'name' => 'Munaabazar Sanepa Mart & Central Office',
                    'address' => 'Sanepa, Lalitpur (Opposite Star Hospital road)',
                    'phone' => '+977-98031 65605',
                    'email' => 'sanepa@munaa.com.np',
                    'order' => 1,
                    'status' => 1,
                ],
                [
                    'name' => 'Munaabazar Imadol Mart',
                    'address' => 'Imadol Chowk, Mahalaxmi Municipality, Lalitpur',
                    'phone' => '+977-98031 65606',
                    'email' => 'imadol@munaa.com.np',
                    'order' => 2,
                    'status' => 1,
                ],
                [
                    'name' => 'Munaabazar Hattiban Mart',
                    'address' => 'Hattiban (Near LA College Gate), Lalitpur',
                    'phone' => '+977-98031 65607',
                    'email' => 'hattiban@munaa.com.np',
                    'order' => 3,
                    'status' => 1,
                ],
                [
                    'name' => 'Munaabazar Golphutar Outlet',
                    'address' => 'Golphutar Main Road, Budhanilkantha, Kathmandu',
                    'phone' => '+977-98031 65608',
                    'email' => 'golphutar@munaa.com.np',
                    'order' => 4,
                    'status' => 1,
                ],
                [
                    'name' => 'Munaabazar Mid-Baneshwor Store',
                    'address' => 'Mid-Baneshwor (Near Apex College), Kathmandu',
                    'phone' => '+977-98031 65609',
                    'email' => 'baneshwor@munaa.com.np',
                    'order' => 5,
                    'status' => 1,
                ],
                [
                    'name' => 'Munaabazar Pokhara Regional Center',
                    'address' => 'New Road, Pokhara, Kaski, Gandaki Province',
                    'phone' => '+977-98031 65610',
                    'email' => 'pokhara@munaa.com.np',
                    'order' => 6,
                    'status' => 1,
                ],
            ];

            foreach ($offices as $o) {
                Office::create($o);
            }
        }

        // 4. Seed Notices / News
        if (Notice::count() === 0) {
            $notices = [
                [
                    'name' => 'Direct Farmer Procurement Drive launched across 15 districts',
                    'date' => date('Y-m-d', strtotime('-5 days')),
                    'description' => 'Munaa Krishi Limited has initiated its winter seasonal buy-back and procurement campaign for high-altitude pulses, mountain rice varieties, and cold-pressed mustard oil with local cooperatives.',
                    'status' => 1,
                ],
                [
                    'name' => 'New Organic Sourcing Hub opens in Sinja Valley, Jumla',
                    'date' => date('Y-m-d', strtotime('-15 days')),
                    'description' => 'A dedicated grading and packaging center in Jumla now connects over 140 smallholder farmers directly to urban consumers in Kathmandu Valley without exploitative middlemen.',
                    'status' => 1,
                ],
                [
                    'name' => 'Quality Certification milestone achieved for Mountain Honey',
                    'date' => date('Y-m-d', strtotime('-30 days')),
                    'description' => 'Our cliff honey harvest from Lamjung has passed comprehensive lab tests with zero sugar adulteration, setting a new benchmark for genuine Nepali organic honey distribution.',
                    'status' => 1,
                ],
            ];

            foreach ($notices as $n) {
                Notice::create($n);
            }
        }

        // 5. Seed FAQs
        if (Faq::count() === 0) {
            $faqs = [
                [
                    'question' => 'What products does Munaa Krishi supply?',
                    'nepali_question' => 'मुना कृषिले कुन-कुन उत्पादनहरू उपलब्ध गराउँछ?',
                    'answer' => 'Our product range includes genuine Nepali agricultural inputs, fresh mountain produce, certified organic tea, high-altitude herbs, unpolished grains, pure mustard oil, and authentic local spices sourced directly from partner farmer cooperatives.',
                    'order' => 1,
                    'status' => true,
                ],
                [
                    'question' => 'How can farmers and cooperatives partner with Munaa Krishi?',
                    'nepali_question' => 'किसान र सहकारीहरूले कसरी सहकार्य गर्न सक्छन्?',
                    'answer' => 'Farmers and agricultural cooperatives can contact our sourcing team with details of their location, crop variety, seasonal harvest timeline, and expected volume. We establish fair buy-back agreements and provide post-harvest supply chain support.',
                    'order' => 2,
                    'status' => true,
                ],
                [
                    'question' => 'Do you supply institutions, restaurants, and wholesale dealers?',
                    'nepali_question' => 'के तपाईँहरूले होटल तथा थोक बिक्रेतालाई आपूर्ति गर्नुहुन्छ?',
                    'answer' => 'Yes. We have dedicated B2B institutional supply arrangements for hotels, restaurants, corporate cafeterias, supermarkets, and wholesale distributors across Nepal with quality guarantees.',
                    'order' => 3,
                    'status' => true,
                ],
                [
                    'question' => 'Where are your retail outlets located?',
                    'nepali_question' => 'तपाईँहरूका शाखाहरू कहाँ कहाँ छन्?',
                    'answer' => 'Visit our Outlets page for current locations in Sanepa (Head Office), Imadol, Hattiban, Golphutar, Mid-Baneshwor, and Pokhara with contact details and opening hours.',
                    'order' => 4,
                    'status' => true,
                ],
                [
                    'question' => 'How does Munaa ensure produce freshness and food safety?',
                    'nepali_question' => 'खाद्य गुणस्तर र शुद्धता कसरी सुनिश्चित गरिन्छ?',
                    'answer' => 'We implement a strict 7-stage farm-to-table traceability protocol including origin verification, non-toxic grading, temperature-controlled transit, and eco-friendly packaging ensuring maximum nutrient retention.',
                    'order' => 5,
                    'status' => true,
                ],
            ];

            foreach ($faqs as $fq) {
                Faq::create($fq);
            }
        }

        // 6. Seed Videos
        if (Video::count() === 0) {
            $videos = [
                [
                    'title' => 'Harvesting Marshi Rice in Sinja Valley, Jumla',
                    'nepali_title' => 'जुम्लाको मार्सी धान भित्र्याउँदै किसानहरू',
                    'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                    'duration' => '4:20',
                    'image' => 'assets/images/farms/tea-field.jpg',
                    'order' => 1,
                    'status' => true,
                ],
                [
                    'title' => 'Cold-Pressed Mustard Oil: From Field to Bottle',
                    'nepali_title' => 'काठको कोलबाट तोरीको तेल पेल्ने परम्परा',
                    'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                    'duration' => '3:45',
                    'image' => 'assets/images/products/mustard-oil.jpg',
                    'order' => 2,
                    'status' => true,
                ],
                [
                    'title' => 'Munaabazar Mart Experience & Farmer Fair',
                    'nepali_title' => 'मुनाबजार मार्ट र किसान मेला',
                    'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                    'duration' => '5:10',
                    'image' => 'assets/images/gallery/outlet-interior.jpg',
                    'order' => 3,
                    'status' => true,
                ],
            ];

            foreach ($videos as $v) {
                Video::create($v);
            }
        }

        // 7. Seed Banners
        if (Banner::count() === 0) {
            $banners = [
                [
                    'name' => 'Empowering Nepali Farmers, Connecting Every Table',
                    'image' => 'assets/images/farms/nepal-terrace-farm.jpg',
                    'status' => 1,
                ],
                [
                    'name' => 'Purity & Traceability from the Himalayas',
                    'image' => 'assets/images/farms/tea-field.jpg',
                    'status' => 1,
                ],
                [
                    'name' => 'Fair Trade Agribusiness & Social Enterprise',
                    'image' => 'assets/images/gallery/outlet-interior.jpg',
                    'status' => 1,
                ],
            ];

            foreach ($banners as $b) {
                Banner::create($b);
            }
        }

        // 8. Seed Team
        if (Team::count() === 0) {
            $teams = [
                [
                    'name' => 'Yubraj Pandey',
                    'designation' => 'Chairman',
                    'image' => 'assets/images/team/board-chair.jpg',
                    'order' => 1,
                    'status' => 1,
                ],
                [
                    'name' => 'Bishnu Kumar Rai',
                    'designation' => 'Managing Director',
                    'image' => 'assets/images/team/managing-director.jpg',
                    'order' => 2,
                    'status' => 1,
                ],
                [
                    'name' => 'Sunita Sharma',
                    'designation' => 'Head of Supply Chain & Quality',
                    'image' => 'assets/images/team/agronomist-lead.jpg',
                    'order' => 3,
                    'status' => 1,
                ],
                [
                    'name' => 'Prakash Adhikari',
                    'designation' => 'Farmer Relations Director',
                    'image' => 'assets/images/team/supply-chain-head.jpg',
                    'order' => 4,
                    'status' => 1,
                ],
            ];

            foreach ($teams as $t) {
                Team::create($t);
            }
        }

        // 9. Seed Galleries
        if (Gallery::count() === 0) {
            $gallery = Gallery::create([
                'name' => 'Munaa Agricultural Field & Harvest Moments',
                'slug' => 'field-and-harvest',
                'folder' => 'harvest',
                'image' => 'assets/images/gallery/apple-harvest.jpg',
                'status' => 1,
                'meta_title' => 'Munaa Krishi Photo Gallery',
                'meta_description' => 'Scenes from our partner farms, seasonal harvests and daily life at Munaa outlets.',
            ]);

            $photos = [
                ['name' => 'Apple harvest in Jumla orchard', 'image' => 'assets/images/gallery/apple-harvest.jpg', 'order' => 1],
                ['name' => 'Farmer plucking organic tea leaves in Ilam', 'image' => 'assets/images/gallery/tea-pluckers.jpg', 'order' => 2],
                ['name' => 'Munaabazar fresh produce shelf presentation', 'image' => 'assets/images/gallery/outlet-interior.jpg', 'order' => 3],
                ['name' => 'Community grading and packing circle', 'image' => 'assets/images/gallery/sorting-sorting.jpg', 'order' => 4],
                ['name' => 'Mustard flowering across valley terraces', 'image' => 'assets/images/farms/mustard-terrace.jpg', 'order' => 5],
            ];

            foreach ($photos as $ph) {
                GalleryImage::create([
                    'gallery_id' => $gallery->id,
                    'name' => $ph['name'],
                    'image' => $ph['image'],
                    'order' => $ph['order'],
                    'status' => 1,
                ]);
            }
        }
    }
}
