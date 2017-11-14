<?php

namespace Tests\Unit\Eloquent\Models;

use Tests\TestCase;
use Matthewbdaly\LaravelFlatpages\Eloquent\Models\Flatpage;

class FlatpageTest extends TestCase
{
    public function testCreateFlatpage()
    {
        $obj = new Flatpage;
        $obj->path = '/about/';
        $obj->title = 'About me';
        $obj->content = 'Welcome to my site';
        $obj->save();
        $page = Flatpage::first();
        $this->assertEquals('/about/', $page->path);
        $this->assertEquals('About me', $page->title);
        $this->assertEquals('Welcome to my site', $page->content);
        $this->assertNotNull($page->created_at);
        $this->assertNotNull($page->updated_at);
    }
}
