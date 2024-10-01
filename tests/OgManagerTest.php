<?php

use C6Digital\OgManager\Models\Meta;
use Illuminate\Support\Facades\Blade;

it('renders global meta tags', function () {
    Meta::create([
        'title' => 'My Site',
        'description' => 'This is my site.',
    ]);

    $blade = Blade::render(<<<'BLADE'
    <x-og-manager::seo />
    BLADE);

    expect($blade)->toContain('My Site')->toContain('This is my site.');
});
