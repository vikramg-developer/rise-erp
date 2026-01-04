<?php


$secret = 'R1se@2025#Deploy';

$payload = file_get_contents('php://input');

file_put_contents(
    __DIR__.'/sig_debug.log',
    json_encode([
        'method'  => $_SERVER['REQUEST_METHOD'] ?? '',
        'headers' => function_exists('getallheaders') ? getallheaders() : [],
        'payload_length' => strlen((string)$payload),
    ], JSON_PRETTY_PRINT) . PHP_EOL,
    FILE_APPEND
);

$headers = function_exists('getallheaders') ? getallheaders() : [];

$sent = $headers['X-Hub-Signature-256'] ?? $headers['X-Hub-Signature'] ?? '';

$expected = 'sha256=' . hash_hmac('sha256', $payload, $secret);

file_put_contents(
    __DIR__.'/sig_debug.log',
    json_encode([
        'calc' => $expected,
        'sent' => $sent,
    ], JSON_PRETTY_PRINT) . PHP_EOL,
    FILE_APPEND
);

if (!hash_equals($expected, $sent)) {
    http_response_code(403);
    exit('Invalid signature');
}

// Valid GitHub request → deploy
chdir('/home/rayatedu/public_html/rise.rayatedu.in');

$git = '/usr/local/cpanel/3rdparty/lib/path-bin/git';

$cmd = 'GIT_SSH_COMMAND="ssh -i ~/.ssh/id_ed25519 -o StrictHostKeyChecking=no" '. "$git pull origin master 2>&1";

exec($cmd, $output, $status);

file_put_contents(
    __DIR__.'/deploy.log',
    "STATUS=$status\n" . implode("\n", $output) . "\n\n",
    FILE_APPEND
);

echo implode("\n", $output);
