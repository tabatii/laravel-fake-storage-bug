<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

it('can copy files on real disks', function () {
    $old = 'test/file.txt';
    $new = Str::random(16).'/file.txt';
    Storage::disk('local')->assertExists($old);
    // Storage::fake('local');
    Storage::disk('local')->copy($old, $new);
    Storage::disk('local')->assertExists($new);
});

it('can copy files on fake disks', function () {
    $old = 'test/file.txt';
    $new = Str::random(16).'/file.txt';
    Storage::disk('local')->assertExists($old);
    Storage::fake('local');
    Storage::disk('local')->copy($old, $new);
    Storage::disk('local')->assertExists($new);
});
