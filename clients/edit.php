<?php
include('../includes/auth.php');
include('../includes/dbconnect.php');


$id = (int)$_GET['id']; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("UPDATE clients SET name=?, email=?, mobile=?, company=?, notes=? WHERE id=?");
    $stmt->bind_param(
        "sssssi",
        $_POST['name'],
        $_POST['email'],
        $_POST['mobile'],
        $_POST['company'],
        $_POST['notes'],
        $id
    );
    $stmt->execute();
    header("Location: ../index.php");
    exit;
}

$result = $conn->query("SELECT * FROM clients WHERE id=$id");
$row = $result->fetch_assoc();
?>

<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" />

<div class="container mt-5">
    <h2>Edit Client</h2>
    <form method="POST" class="mt-4">
        <div class="mb-3">
            <label>Name</label>
            <input name="name" class="form-control" value="<?= htmlspecialchars($row['name']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input name="email" class="form-control" value="<?= htmlspecialchars($row['email']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Phone</label>
            <input name="mobile" class="form-control" pattern="^\d{10}$" value="<?= htmlspecialchars($row['mobile']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Company</label>
            <input name="company" class="form-control" value="<?= htmlspecialchars($row['company']) ?>">
        </div>
        <div class="mb-3">
            <label>Notes</label>
            <textarea name="notes" class="form-control"><?= htmlspecialchars($row['notes']) ?></textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="../index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
