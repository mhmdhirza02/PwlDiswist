<?php
$id = App\Models\Hotel::first()->id;
$url = "/admin/hotel/{$id}";
$response = app()->handle(
    Illuminate\Http\Request::create($url, 'POST', [
        '_method' => 'PUT',
        '_token' => csrf_token(),
        'name' => 'Updated Name Test',
        'description' => 'Updated Desc',
        'location' => 'Updated Loc',
        'price' => 'Rp 999.000',
    ])
);
echo $response->getStatusCode() . PHP_EOL;
if ($response->getStatusCode() == 302) {
    echo "Redirect Location: " . $response->headers->get('Location') . PHP_EOL;
    // Check session for errors
    $session = app('session.store');
    if ($session->has('errors')) {
        print_r($session->get('errors')->all());
    } else {
        echo "No Validation Errors" . PHP_EOL;
    }
} else {
    echo $response->getContent();
}
