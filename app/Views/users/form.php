<?= view('templates/header', ['title' => $title]) ?>

<h2><?= esc($title) ?></h2>
<p class="page-intro">Enter the user account details. Usernames must be unique.</p>
<?php $errors = validation_errors(); if ($errors): ?><div class="errors"><?= $errors ?></div><?php endif; ?>
<?php $isEdit = $user !== null; ?>
<form class="form-grid" method="post" enctype="multipart/form-data" action="<?= $isEdit ? site_url('users/edit/' . $user['id']) : site_url('users/new') ?>">
    <?= csrf_field() ?>
    <label>Username <input type="text" name="username" value="<?= esc(old('username', $user['username'] ?? '')) ?>" required maxlength="50"></label>
    <label>Full name <input type="text" name="full_name" value="<?= esc(old('full_name', $user['full_name'] ?? '')) ?>" required maxlength="100"></label>
    <?php if ($isEdit): ?>
        <label>Profile picture <input type="file" name="avatar" accept="image/jpeg,image/png"></label>
        <small>Optional JPG or PNG image, maximum 2 MB. It will be prepared as a 300 × 300 thumbnail.</small>
    <?php endif; ?>
    <div class="actions"><button class="button" type="submit">Save User</button><a class="button secondary" href="<?= site_url('users') ?>">Cancel</a></div>
</form>

<?= view('templates/footer') ?>
