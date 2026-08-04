<?php
require_once __DIR__ . '/../db/init.php';

header('Content-Type: application/json');

$records = $db->query("SELECT * FROM leaderboard_participants ORDER BY total_points DESC, arcade_count DESC, skill_count DESC")->fetchAll();

$formattedRecords = array_map(function($r) {
    return [
        'name' => $r['name'],
        'profile_token' => $r['profile_token'],
        'milestone_reached' => $r['milestone_reached'],
        'arcade_count' => $r['arcade_count'],
        'skill_count' => $r['skill_count'],
        'total_points' => $r['total_points']
    ];
}, $records);

$lastUpdateQuery = $db->query("SELECT MAX(updated_at) as max_date FROM leaderboard_participants")->fetch();
$lastUpdate = $lastUpdateQuery['max_date'];

if ($lastUpdate) {
    $fileDate = date('d M Y, H:i', strtotime($lastUpdate)) . ' WIB';
} else {
    $fileDate = date('d M Y') . ' WIB';
}

echo json_encode([
    'records' => $formattedRecords,
    'fileDate' => $fileDate
]);
