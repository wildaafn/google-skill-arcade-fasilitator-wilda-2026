<?php
header('Content-Type: application/json');

$id = $_GET['id'] ?? '';

if (!$id) {
    echo json_encode(['error' => 'Profile ID required']);
    http_response_code(400);
    exit;
}

$url = "https://www.skills.google/public_profiles/" . $id;

$options = [
    'http' => [
        'method' => 'GET',
        'header' => [
            'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36'
        ],
        'timeout' => 6
    ]
];
$context = stream_context_create($options);

$html = @file_get_contents($url, false, $context);

if ($html) {
    if (preg_match('/<ql-avatar[^>]*src=[\'"]([^\'"]+)[\'"]/i', $html, $avatarMatch)) {
        echo json_encode(['avatarUrl' => $avatarMatch[1]]);
        exit;
    }
}

echo json_encode(['avatarUrl' => null]);
