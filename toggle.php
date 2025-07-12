<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = (int)$_POST['id'];
    // 1. Get current status
    $res = $conn->query("SELECT status FROM people WHERE id = $id");
    $row = $res->fetch_assoc();
    $new = $row['status'] ? 0 : 1;

    // 2. Update it
    $conn->query("UPDATE people SET status = $new WHERE id = $id");

    // 3. Return it
    echo $new;
}
?>
