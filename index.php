<?php
require 'config.php';

// 1. Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $age  = (int)$_POST['age'];
    if ($name && $age) {
        $conn->query("INSERT INTO people (name, age) VALUES ('$name', $age)");
    }
}

// 2. Fetch all records
$result = $conn->query("SELECT * FROM people ORDER BY id");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Summer Task</title>
</head>
<body>
  <!-- One‑line form -->
  <form method="POST" style="margin-bottom:20px;">
    <input name="name" placeholder="Name" required>
    <input name="age" type="number" placeholder="Age" required style="width:60px">
    <button type="submit">Submit</button>
  </form>

  <!-- Table of records -->
  <table border="1" cellpadding="5" cellspacing="0">
    <tr>
      <th>ID</th><th>Name</th><th>Age</th><th>Status</th><th>Action</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
      <tr id="row-<?= $row['id'] ?>">
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= $row['age'] ?></td>
        <td class="status"><?= $row['status'] ?></td>
        <td>
          <button class="toggleBtn" data-id="<?= $row['id'] ?>">Toggle</button>
        </td>
      </tr>
    <?php endwhile; ?>
  </table>

  <!-- 3. JS for AJAX toggle -->
  <script>
    document.querySelectorAll('.toggleBtn').forEach(btn => {
      btn.addEventListener('click', () => {
        const id = btn.dataset.id;
        fetch('toggle.php', {
          method: 'POST',
          headers: {'Content-Type': 'application/x-www-form-urlencoded'},
          body: 'id=' + encodeURIComponent(id)
        })
        .then(res => res.text())
        .then(newStatus => {
          const row = document.getElementById('row-' + id);
          row.querySelector('.status').innerText = newStatus;
        })
        .catch(console.error);
      });
    });
  </script>
</body>
</html>
