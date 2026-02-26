<?php 
include 'db_config.php'; 

// Handle new staff submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_staff'])) {
    $stmt = $pdo->prepare("INSERT INTO staff (`School Name`, `Dept`, `Title`, `Last Name`, `First Name`, `Position`, `Address`, `Year name recorded`, `Left School`, `Notes`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $_POST['school_name'],
        $_POST['dept'],
        $_POST['title'],
        $_POST['last_name'],
        $_POST['first_name'],
        $_POST['position'],
        $_POST['address'],
        $_POST['year_recorded'],
        $_POST['left_school'],
        $_POST['notes']
    ]);
    header("Location: staff.php");
    exit;
}

$last_name = $_GET['last_name'] ?? '';
$school = $_GET['school'] ?? '';

$query = "SELECT * FROM staff WHERE `Last Name` LIKE :last_name AND `School Name` LIKE :school";
$stmt = $pdo->prepare($query);
$stmt->execute([
    ':last_name' => "%$last_name%",
    ':school'    => "%$school%"
]);
$staff_members = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Staff Database - Marshfield School History</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: Arial, sans-serif; background: #f4f4f4; color: #333; }

        header { background: #1e3a8a; color: white; padding: 20px 30px; }
        header h1 { font-size: 1.6rem; }

        nav { background: #162d6e; padding: 10px 30px; display: flex; gap: 10px; }
        nav a button {
            background: white; color: #1e3a8a; border: none;
            padding: 8px 16px; cursor: pointer; font-weight: bold; border-radius: 4px;
        }
        nav a button:hover { background: #dbeafe; }

        main { padding: 30px; }
        h2 { margin-bottom: 15px; color: #1e3a8a; }

        .top-bar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; }

        form.search-form { display: flex; gap: 10px; flex-wrap: wrap; margin-bottom: 20px; }
        form.search-form input, form.search-form select {
            padding: 8px 12px; border: 1px solid #ccc; border-radius: 4px; font-size: 0.95rem;
        }
        form.search-form button {
            background: #1e3a8a; color: white; border: none;
            padding: 8px 20px; border-radius: 4px; cursor: pointer; font-weight: bold;
        }
        form.search-form button:hover { background: #162d6e; }

        .btn-add {
            background: #16a34a; color: white; border: none;
            padding: 10px 20px; border-radius: 4px; cursor: pointer;
            font-weight: bold; font-size: 0.95rem;
        }
        .btn-add:hover { background: #15803d; }

        table { width: 100%; border-collapse: collapse; background: white; font-size: 0.9rem; }
        thead tr { background: #1e3a8a; color: white; }
        th, td { padding: 10px 12px; border: 1px solid #ddd; text-align: left; vertical-align: top; }
        tbody tr:nth-child(even) { background: #f0f4ff; }
        tbody tr:hover { background: #dbeafe; }

        .no-results { color: #888; font-style: italic; margin-top: 10px; }

        /* Modal */
        .modal-overlay {
            display: none; position: fixed; inset: 0;
            background: rgba(0,0,0,0.5); z-index: 1000;
            justify-content: center; align-items: center;
        }
        .modal-overlay.active { display: flex; }
        .modal {
            background: white; border-radius: 8px; padding: 30px;
            width: 100%; max-width: 600px; max-height: 90vh;
            overflow-y: auto; position: relative;
        }
        .modal h3 { color: #1e3a8a; margin-bottom: 20px; font-size: 1.2rem; }
        .modal-close {
            position: absolute; top: 15px; right: 20px;
            background: none; border: none; font-size: 1.5rem;
            cursor: pointer; color: #888;
        }
        .modal-close:hover { color: #333; }
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
        .form-group { display: flex; flex-direction: column; gap: 4px; }
        .form-group.full { grid-column: 1 / -1; }
        .form-group label { font-size: 0.85rem; font-weight: bold; color: #555; }
        .form-group input, .form-group select, .form-group textarea {
            padding: 8px 10px; border: 1px solid #ccc;
            border-radius: 4px; font-size: 0.9rem;
        }
        .form-group textarea { resize: vertical; min-height: 70px; }
        .modal-actions { margin-top: 20px; display: flex; gap: 10px; justify-content: flex-end; }
        .btn-submit {
            background: #1e3a8a; color: white; border: none;
            padding: 9px 24px; border-radius: 4px; cursor: pointer; font-weight: bold;
        }
        .btn-submit:hover { background: #162d6e; }
        .btn-cancel {
            background: #e5e7eb; color: #333; border: none;
            padding: 9px 24px; border-radius: 4px; cursor: pointer; font-weight: bold;
        }
        .btn-cancel:hover { background: #d1d5db; }

        footer {
            text-align: center; padding: 20px; background: #1e3a8a;
            color: white; margin-top: 40px; font-size: 0.9rem;
        }
    </style>
</head>
<body>

<header>
    <h1>Marshfield School History</h1>
</header>

<nav>
    <a href="index.php"><button>About</button></a>
    <a href="staff.php"><button>Staff Database</button></a>
    <a href="sources.php"><button>Sources Database</button></a>
</nav>

<main>
    <section>
        <div class="top-bar">
            <h2>Staff Database Search</h2>
            <button class="btn-add" onclick="document.getElementById('addModal').classList.add('active')">+ Add New Staff</button>
        </div>

        <form class="search-form" method="GET">
            <input type="text" name="last_name" placeholder="Last Name" value="<?= htmlspecialchars($last_name) ?>">
            <select name="school">
                <option value="">All Schools</option>
                <option value="Chapel Green Board School" <?= $school === 'Chapel Green Board School' ? 'selected' : '' ?>>Chapel Green</option>
                <option value="Thornton Lane Board School" <?= $school === 'Thornton Lane Board School' ? 'selected' : '' ?>>Thornton Lane</option>
                <option value="Marshfield School" <?= $school === 'Marshfield School' ? 'selected' : '' ?>>Marshfield</option>
            </select>
            <button type="submit">Search</button>
            <a href="staff.php"><button type="button">Reset</button></a>
        </form>

        <?php if (empty($staff_members)): ?>
            <p class="no-results">No staff found. Try a different search.</p>
        <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>School Name</th><th>Dept</th><th>Title</th><th>Last Name</th>
                    <th>First Name</th><th>Position</th><th>Address</th>
                    <th>Year Recorded</th><th>Left School</th><th>Notes</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($staff_members as $person): ?>
                <tr>
                    <td><?= htmlspecialchars($person['School Name'] ?? '') ?></td>
                    <td><?= htmlspecialchars($person['Dept'] ?? '') ?></td>
                    <td><?= htmlspecialchars($person['Title'] ?? '') ?></td>
                    <td><?= htmlspecialchars($person['Last Name'] ?? '') ?></td>
                    <td><?= htmlspecialchars($person['First Name'] ?? '') ?></td>
                    <td><?= htmlspecialchars($person['Position'] ?? '') ?></td>
                    <td><?= htmlspecialchars($person['Address'] ?? '') ?></td>
                    <td><?= htmlspecialchars($person['Year name recorded'] ?? '') ?></td>
                    <td><?= htmlspecialchars($person['Left School'] ?? '') ?></td>
                    <td><?= htmlspecialchars($person['Notes'] ?? '') ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </section>
</main>

<!-- Add Staff Modal -->
<div class="modal-overlay" id="addModal">
    <div class="modal">
        <button class="modal-close" onclick="document.getElementById('addModal').classList.remove('active')">&times;</button>
        <h3>Add New Staff Member</h3>
        <form method="POST">
            <div class="form-grid">
                <div class="form-group">
                    <label>School Name</label>
                    <select name="school_name">
                        <option value="">-- Select School --</option>
                        <option value="Chapel Green Board School">Chapel Green</option>
                        <option value="Thornton Lane Board School">Thornton Lane</option>
                        <option value="Marshfield School">Marshfield</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Department</label>
                    <input type="text" name="dept" placeholder="e.g. Infant">
                </div>
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" placeholder="e.g. Miss, Mrs, Mr">
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="last_name" placeholder="Last Name">
                </div>
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="first_name" placeholder="First Name">
                </div>
                <div class="form-group">
                    <label>Position</label>
                    <input type="text" name="position" placeholder="e.g. Head Mistress">
                </div>
                <div class="form-group full">
                    <label>Address</label>
                    <input type="text" name="address" placeholder="Address">
                </div>
                <div class="form-group">
                    <label>Year Recorded</label>
                    <input type="text" name="year_recorded" placeholder="e.g. 1877">
                </div>
                <div class="form-group">
                    <label>Left School</label>
                    <input type="text" name="left_school" placeholder="e.g. 31/07/1878">
                </div>
                <div class="form-group full">
                    <label>Notes</label>
                    <textarea name="notes" placeholder="Any additional notes..."></textarea>
                </div>
            </div>
            <div class="modal-actions">
                <button type="button" class="btn-cancel" onclick="document.getElementById('addModal').classList.remove('active')">Cancel</button>
                <button type="submit" name="add_staff" class="btn-submit">Save Staff Member</button>
            </div>
        </form>
    </div>
</div>

<footer>Community History Research by Ray Greenhough</footer>

</body>
</html>