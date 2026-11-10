<?php

namespace Tests\Unit;

use App\Models\Banner;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class BannerImageUrlTest extends TestCase
{
    #[Test]
    public function it_resolves_bundled_and_uploaded_banner_images(): void
    {
        $bundled = new Banner(['image' => 'assets/images/farms/nepal-terrace-farm.jpg']);
        $uploaded = new Banner(['image' => 'hero.webp']);

        $this->assertSame(
            asset('assets/images/farms/nepal-terrace-farm.jpg'),
            $bundled->url_image
        );
        $this->assertSame(asset('storage/banner/hero.webp'), $uploaded->url_image);
    }
}
