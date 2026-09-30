<?= view('templates/header', ['title' => $title]) ?>

<div class="page-heading">
    <h2>User Accounts</h2>
    <div class="actions"><span class="record-count"><?= count($users) ?> records</span><a class="button" href="<?= site_url('users/new') ?>">Add User</a></div>
</div>
<p class="page-intro">Authorized staff accounts stored in the POS database.</p>

<div class="table-wrap"><table>
    <thead>
        <tr>
            <th>Avatar</th>
            <th>Username</th>
            <th>Full Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($users === []): ?>
            <tr><td colspan="4" class="empty-state">No user accounts found.</td></tr>
        <?php endif; ?>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><img class="avatar" src="<?= $user['avatar'] ? base_url('uploads/' . rawurlencode($user['avatar'])) : base_url('favicon.ico') ?>" alt="Avatar for <?= esc($user['full_name']) ?>"></td>
                <td class="username"><?= esc($user['username']) ?></td>
                <td><?= esc($user['full_name']) ?></td>
                <td><a href="<?= site_url('users/edit/' . $user['id']) ?>">Edit</a></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table></div>

<?= view('templates/footer') ?>
