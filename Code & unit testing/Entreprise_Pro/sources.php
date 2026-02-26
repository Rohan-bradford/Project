<?php
include 'db_config.php';

// Handle new source submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_source'])) {
    $stmt = $pdo->prepare("INSERT INTO sources (`Source`, `Source type`, `School`, `Department`, `Notes`, `Hyperlink`) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $_POST['source'],
        $_POST['source_type'],
        $_POST['school'],
        $_POST['department'],
        $_POST['notes'],
        $_POST['hyperlink']
    ]);
    header("Location: sources.php");
    exit;
}

$source = $_GET['source'] ?? '';
$school = $_GET['school'] ?? '';
$source_type = $_GET['source_type'] ?? '';

$query = "SELECT * FROM sources WHERE `Source` LIKE :source AND `School` LIKE :school AND `Source type` LIKE :source_type";
$stmt = $pdo->prepare($query);
$stmt->execute([
    ':source'      => "%$source%",
    ':school'      => "%$school%",
    ':source_type' => "%$source_type%"
]);
$sources = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sources Database - Marshfield School History</title>
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

        td a { color: #1e3a8a; text-decoration: none; font-weight: bold; }
        td a:hover { text-decoration: underline; }

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
            <h2>Sources Database Search</h2>
            <button class="btn-add" onclick="document.getElementById('addModal').classList.add('active')">+ Add New Source</button>
        </div>

        <form class="search-form" method="GET">
            <input type="text" name="source" placeholder="Source name" value="<?= htmlspecialchars($source) ?>">
            <select name="source_type">
                <option value="">All Types</option>
                <option value="Archive" <?= $source_type === 'Archive' ? 'selected' : '' ?>>Archive</option>
                <option value="Book" <?= $source_type === 'Book' ? 'selected' : '' ?>>Book</option>
                <option value="Website" <?= $source_type === 'Website' ? 'selected' : '' ?>>Website</option>
                <option value="Newspaper" <?= $source_type === 'Newspaper' ? 'selected' : '' ?>>Newspaper</option>
                <option value="Census" <?= $source_type === 'Census' ? 'selected' : '' ?>>Census</option>
            </select>
            <select name="school">
                <option value="">All Schools</option>
                <option value="Chapel Green Board School" <?= $school === 'Chapel Green Board School' ? 'selected' : '' ?>>Chapel Green</option>
                <option value="Thornton Lane Board School" <?= $school === 'Thornton Lane Board School' ? 'selected' : '' ?>>Thornton Lane</option>
                <option value="Marshfield School" <?= $school === 'Marshfield School' ? 'selected' : '' ?>>Marshfield</option>
            </select>
            <button type="submit">Search</button>
            <a href="sources.php"><button type="button">Reset</button></a>
        </form>

        <?php if (empty($sources)): ?>
            <p class="no-results">No sources found. Try a different search.</p>
        <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Source</th><th>Source Type</th><th>School</th>
                    <th>Department</th><th>Notes</th><th>Hyperlink</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sources as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['Source'] ?? '') ?></td>
                    <td><?= htmlspecialchars($row['Source type'] ?? '') ?></td>
                    <td><?= htmlspecialchars($row['School'] ?? '') ?></td>
                    <td><?= htmlspecialchars($row['Department'] ?? '') ?></td>
                    <td><?= htmlspecialchars($row['Notes'] ?? '') ?></td>
                    <td>
                        <?php if (!empty($row['Hyperlink'])): ?>
                            <a href="<?= htmlspecialchars($row['Hyperlink']) ?>" target="_blank">View Source</a>
                        <?php else: ?>
                            —
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </section>
</main>

<!-- Add Source Modal -->
<div class="modal-overlay" id="addModal">
    <div class="modal">
        <button class="modal-close" onclick="document.getElementById('addModal').classList.remove('active')">&times;</button>
        <h3>Add New Source</h3>
        <form method="POST">
            <div class="form-grid">
                <div class="form-group full">
                    <label>Source Name</label>
                    <input type="text" name="source" placeholder="e.g. Bradford Archives Log Book">
                </div>
                <div class="form-group">
                    <label>Source Type</label>
                    <select name="source_type">
                        <option value="">-- Select Type --</option>
                        <option value="Archive">Archive</option>
                        <option value="Book">Book</option>
                        <option value="Website">Website</option>
                        <option value="Newspaper">Newspaper</option>
                        <option value="Census">Census</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>School</label>
                    <select name="school">
                        <option value="">-- Select School --</option>
                        <option value="Chapel Green Board School">Chapel Green</option>
                        <option value="Thornton Lane Board School">Thornton Lane</option>
                        <option value="Marshfield School">Marshfield</option>
                    </select>
                </div>
                <div class="form-group full">
                    <label>Department</label>
                    <input type="text" name="department" placeholder="e.g. Infant">
                </div>
                <div class="form-group full">
                    <label>Notes</label>
                    <textarea name="notes" placeholder="Any additional notes..."></textarea>
                </div>
                <div class="form-group full">
                    <label>Hyperlink</label>
                    <input type="text" name="hyperlink" placeholder="https://...">
                </div>
            </div>
            <div class="modal-actions">
                <button type="button" class="btn-cancel" onclick="document.getElementById('addModal').classList.remove('active')">Cancel</button>
                <button type="submit" name="add_source" class="btn-submit">Save Source</button>
            </div>
        </form>
    </div>
</div>

<footer>Community History Research by Ray Greenhough</footer>

</body>
</html>