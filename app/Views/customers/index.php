<?= view('templates/header', ['title' => $title]) ?>

<div class="page-heading">
    <h2>Customer Accounts</h2>
    <div class="actions"><span class="record-count"><?= count($customers) ?> records</span><a class="button" href="<?= site_url('customers/new') ?>">Add Customer</a></div>
</div>
<p class="page-intro">Customer records stored in the POS database.</p>

<div class="table-wrap"><table>
    <thead>
        <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($customers === []): ?>
            <tr><td colspan="4" class="empty-state">No customer records found.</td></tr>
        <?php endif; ?>
        <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?= esc($customer['full_name']) ?></td>
                <td><?= esc($customer['email']) ?></td>
                <td><?= esc($customer['phone']) ?></td>
                <td><a href="<?= site_url('customers/edit/' . $customer['id']) ?>">Edit</a></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table></div>

<?= view('templates/footer') ?>
