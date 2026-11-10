<?php

namespace Tests\Unit;

use App\Models\Notice;
use PHPUnit\Framework\TestCase;

class NoticeDisplayImageTest extends TestCase
{
    public function test_each_notice_gets_a_stable_varied_display_image(): void
    {
        $images = collect([1, 2, 3, 4])->map(function (int $id): string {
            $notice = new Notice(['name' => 'Notice '.$id]);
            $notice->id = $id;

            return $notice->display_image;
        });

        $this->assertCount(4, $images->unique());

        $notice = new Notice(['name' => 'Stable notice']);
        $notice->id = 2;
        $this->assertSame($notice->display_image, $notice->display_image);
    }
}
