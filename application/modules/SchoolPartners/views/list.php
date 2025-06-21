<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>School Partners</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="bg-light py-4">

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>🎓 School Partners</h2>
            <a href="<?= base_url('partners/create') ?>" class="btn btn-success">+ Add New</a>
        </div>

        <form method="get" class="row g-3 mb-4">
            <div class="col-md-6">
                <input type="text" name="search" class="form-control" placeholder="Search..." value="<?= $this->input->get('search') ?>">
            </div>
            <div class="col-md-auto">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

        <div class="table-responsive shadow-sm">
            <table class="table table-bordered table-striped bg-white">
                <thead class="table-light">
                    <tr>
                        <th>School Name</th>
                        <th>Contact Person</th>
                        <th>Email</th>
                        <th>Students</th>
                        <th>Created Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($partners)): ?>
                        <?php foreach ($partners as $p): ?>
                            <tr>
                                <td><?= htmlspecialchars($p->school_name) ?></td>
                                <td><?= htmlspecialchars($p->contact_person) ?></td>
                                <td><?= htmlspecialchars($p->email) ?></td>
                                <td><?= htmlspecialchars($p->num_students) ?></td>
                                <td><?= date('F j, Y g:i A', strtotime($p->created_at)) ?></td>
                                <td><?= htmlspecialchars(ucfirst($p->status)) ?></td>
                                <td>
                                    <a href="<?= base_url('partners/edit/' . $p->id) ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="<?= base_url('partners/delete/' . $p->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted">No records found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            <?= $pagination ?>
        </div>
    </div>

</body>

</html>