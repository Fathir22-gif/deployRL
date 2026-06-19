<?php

it('redirects to login from the home route', function () {
    $response = $this->get('/');

    $response->assertRedirect('/login');
});
