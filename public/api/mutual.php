<?php
require_once __DIR__ . '/../db/init.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);

$type = $input['type'] ?? '';
$username = trim($input['username'] ?? '');
$link = trim($input['link'] ?? '');

$validTypes = ['Instagram', 'LinkedIn', 'GitHub'];
if (!in_array($type, $validTypes) || empty($username) || empty($link) || !filter_var($link, FILTER_VALIDATE_URL)) {
    echo json_encode(['success' => false, 'message' => 'Input tidak valid']);
    exit;
}

try {
    $stmt = $db->prepare("INSERT INTO mutual_profiles (type, username, link, is_verified) VALUES (?, ?, ?, 0)");
    $stmt->execute([$type, $username, $link]);
    
    echo json_encode(['success' => true, 'message' => 'Berhasil terkirim! Profil kalian akan segera diverifikasi oleh Admin.']);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Terjadi kesalahan sistem']);
}
