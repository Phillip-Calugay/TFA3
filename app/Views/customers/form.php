<?= view('templates/header', ['title' => $title]) ?>

<h2><?= esc($title) ?></h2>
<p class="page-intro">Enter the customer details. Required fields are validated before saving.</p>
<?php $errors = validation_errors(); if ($errors): ?><div class="errors"><?= $errors ?></div><?php endif; ?>
<?php $isEdit = $customer !== null; ?>
<form class="form-grid" method="post" action="<?= $isEdit ? site_url('customers/edit/' . $customer['id']) : site_url('customers/new') ?>">
    <?= csrf_field() ?>
    <label>Full name <input type="text" name="full_name" value="<?= esc(old('full_name', $customer['full_name'] ?? '')) ?>" required maxlength="100"></label>
    <label>Email <input type="email" name="email" value="<?= esc(old('email', $customer['email'] ?? '')) ?>" required maxlength="100"></label>
    <label>Phone <input type="text" name="phone" value="<?= esc(old('phone', $customer['phone'] ?? '')) ?>" maxlength="20"></label>
    <div class="actions"><button class="button" type="submit">Save Customer</button><a class="button secondary" href="<?= site_url('customers') ?>">Cancel</a></div>
</form>

<?= view('templates/footer') ?>
