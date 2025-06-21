<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= isset($partner) ? 'Edit' : 'Add' ?> Partner</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="bg-light py-4">

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2><?= isset($partner) ? '✏️ Edit' : '➕ Add' ?> Partner</h2>
            <a href="<?= base_url('partners') ?>" class="btn btn-secondary">← Back to List</a>
        </div>

        <?php if (validation_errors()): ?>
            <div class="alert alert-danger">
                <?= validation_errors() ?>
            </div>
        <?php endif; ?>

        <form method="post" class="card p-4 shadow-sm bg-white">
            <div class="mb-3">
                <label class="form-label">School Name</label>
                <input type="text" name="school_name" class="form-control" value="<?= set_value('school_name', $partner->school_name ?? '') ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Contact Person</label>
                <input type="text" name="contact_person" class="form-control" value="<?= set_value('contact_person', $partner->contact_person ?? '') ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="<?= set_value('email', $partner->email ?? '') ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Number of Students</label>
                <input type="number" name="num_students" class="form-control" value="<?= set_value('num_students', $partner->num_students ?? '') ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select" required>
                    <option value="">-- Select Status --</option>
                    <option value="active" <?= set_select('status', 'active', ($partner->status ?? '') === 'active') ?>>Active</option>
                    <option value="inactive" <?= set_select('status', 'inactive', ($partner->status ?? '') === 'inactive') ?>>Inactive</option>
                </select>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary"><?= isset($partner) ? 'Update' : 'Create' ?> Partner</button>
            </div>
        </form>
    </div>

</body>

</html>