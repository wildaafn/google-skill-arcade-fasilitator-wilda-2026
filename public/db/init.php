<?php
/**
 * Database initialization - auto-creates SQLite database, tables, and seed data.
 * This file is included by API endpoints and pages that need database access.
 * Safe to call multiple times (idempotent).
 */

// Database file path - stored in a persistent directory
$dbDir = __DIR__;
$dbPath = $dbDir . '/database.sqlite';

// Create database file if it doesn't exist
if (!file_exists($dbPath)) {
    touch($dbPath);
}

// Connect to SQLite via PDO
$db = new PDO('sqlite:' . $dbPath);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
// Enable WAL mode for better concurrent read performance
$db->exec('PRAGMA journal_mode=WAL');
$db->exec('PRAGMA foreign_keys=ON');

// Create mutual_profiles table if not exists
$db->exec("
    CREATE TABLE IF NOT EXISTS mutual_profiles (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        type TEXT NOT NULL CHECK(type IN ('Instagram', 'LinkedIn', 'GitHub')),
        username TEXT NOT NULL,
        link TEXT NOT NULL,
        is_verified INTEGER NOT NULL DEFAULT 0,
        created_at TEXT DEFAULT (datetime('now')),
        updated_at TEXT DEFAULT (datetime('now'))
    )
");

// Create leaderboard_participants table if not exists
$db->exec("
    CREATE TABLE IF NOT EXISTS leaderboard_participants (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL DEFAULT 'Peserta Arcade',
        profile_url TEXT NOT NULL UNIQUE,
        profile_token TEXT,
        arcade_count INTEGER NOT NULL DEFAULT 0,
        skill_count INTEGER NOT NULL DEFAULT 0,
        bonus_points REAL NOT NULL DEFAULT 0,
        total_points REAL NOT NULL DEFAULT 0,
        milestone_reached TEXT NOT NULL DEFAULT 'None',
        last_checked_at TEXT,
        created_at TEXT DEFAULT (datetime('now')),
        updated_at TEXT DEFAULT (datetime('now'))
    )
");

// Seed admin profiles if table is empty (first run only)
$count = $db->query("SELECT COUNT(*) as cnt FROM mutual_profiles")->fetch();
if ((int)$count['cnt'] === 0) {
    $seedData = [
        ['Instagram', '@m_wildaafn', 'https://www.instagram.com/m_wildaafn', 1],
        ['LinkedIn', 'WILDA ARIFFATUL FAISALNUR', 'https://www.linkedin.com/in/wildaafn/', 1],
        ['GitHub', '@wildaafn', 'https://github.com/wildaafn', 1],
    ];

    $stmt = $db->prepare("INSERT INTO mutual_profiles (type, username, link, is_verified) VALUES (?, ?, ?, ?)");
    foreach ($seedData as $row) {
        $stmt->execute($row);
    }
}
