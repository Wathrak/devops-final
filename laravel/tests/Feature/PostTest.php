<?php

uses(\Tests\TestCase::class);

test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
