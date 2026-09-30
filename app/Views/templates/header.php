<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title) ?> | Simple POS</title>
    <style>
        :root { --navy: #102a43; --blue: #2563eb; --sky: #eff6ff; --ink: #1f2937; --muted: #64748b; --line: #e2e8f0; }
        * { box-sizing: border-box; }
        body { margin: 0; font-family: Inter, system-ui, -apple-system, "Segoe UI", sans-serif; color: var(--ink); background: #f8fafc; }
        header { background: linear-gradient(120deg, var(--navy), #1e3a8a); color: white; padding: 20px max(24px, calc((100% - 1060px) / 2)); box-shadow: 0 2px 8px rgb(15 23 42 / 18%); }
        header h1 { margin: 0 0 14px; font-size: 1.35rem; letter-spacing: .01em; }
        nav { display: flex; flex-wrap: wrap; gap: 8px; }
        nav a { color: #dbeafe; padding: 7px 11px; border-radius: 7px; text-decoration: none; font-size: .92rem; font-weight: 600; }
        nav a:hover, nav a:focus { background: rgb(255 255 255 / 16%); color: white; }
        main { max-width: 1060px; min-height: calc(100vh - 165px); margin: 32px auto; padding: 32px; background: white; border: 1px solid var(--line); border-radius: 14px; box-shadow: 0 10px 28px rgb(15 23 42 / 6%); }
        h2 { margin: 0; color: var(--navy); font-size: 1.7rem; }
        .page-intro { margin: 8px 0 24px; color: var(--muted); }
        .page-heading { display: flex; justify-content: space-between; align-items: center; gap: 16px; }
        .record-count { padding: 6px 10px; border-radius: 999px; background: var(--sky); color: #1d4ed8; font-size: .82rem; font-weight: 700; white-space: nowrap; }
        .table-wrap { overflow-x: auto; border: 1px solid var(--line); border-radius: 10px; }
        table { width: 100%; border-collapse: collapse; min-width: 620px; }
        th, td { padding: 14px 16px; text-align: left; border-bottom: 1px solid var(--line); }
        th { background: #f8fafc; color: #475569; font-size: .75rem; text-transform: uppercase; letter-spacing: .06em; }
        tbody tr:last-child td { border-bottom: 0; }
        tbody tr:hover { background: #f8fbff; }
        .username { color: #1d4ed8; font-family: ui-monospace, monospace; font-weight: 700; }
        .empty-state { padding: 28px; text-align: center; color: var(--muted); }
        .actions { display: flex; gap: 8px; flex-wrap: wrap; }
        .button { display: inline-block; padding: 9px 13px; border: 0; border-radius: 7px; background: var(--blue); color: white; text-decoration: none; font-weight: 700; cursor: pointer; }
        .button.secondary { background: #e2e8f0; color: var(--ink); }
        .form-grid { display: grid; gap: 18px; max-width: 620px; }
        label { display: grid; gap: 7px; font-weight: 700; color: #334155; }
        input { width: 100%; padding: 11px 12px; border: 1px solid #cbd5e1; border-radius: 7px; font: inherit; }
        .errors { padding: 12px 16px; margin: 0 0 20px; border-radius: 8px; background: #fef2f2; color: #b91c1c; }
        .notice { padding: 12px 16px; margin: 0 0 20px; border-radius: 8px; background: #ecfdf5; color: #047857; }
        .avatar { width: 48px; height: 48px; object-fit: cover; border-radius: 50%; vertical-align: middle; }
        footer { text-align: center; padding: 0 16px 28px; color: var(--muted); font-size: .9rem; }
        @media (max-width: 600px) {
            header { padding: 18px 20px; }
            main { margin: 18px 14px; padding: 22px 18px; }
            .page-heading { align-items: flex-start; flex-direction: column; }
        }
    </style>
</head>
<body>
<header>
    <h1>Simple POS System</h1>
    <nav>
        <a href="<?= site_url('/') ?>">Home</a>
        <a href="<?= site_url('about') ?>">About</a>
        <a href="<?= site_url('customers') ?>">Customers</a>
        <a href="<?= site_url('users') ?>">Users</a>
        <a href="<?= site_url('customers/new') ?>">New Customer</a>
        <a href="<?= site_url('users/new') ?>">New User</a>
    </nav>
</header>
<main>
<?php if (session()->getFlashdata('message')): ?>
    <div class="notice"><?= esc(session()->getFlashdata('message')) ?></div>
<?php endif; ?>
