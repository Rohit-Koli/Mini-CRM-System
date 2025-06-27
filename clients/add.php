<?php 
include('../includes/auth.php'); 
include('../includes/dbconnect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("INSERT INTO clients (name, email, mobile, company, notes) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param(
        "sssss",
        $_POST['name'],
        $_POST['email'],
        $_POST['mobile'], // Changed to match DB field
        $_POST['company'],
        $_POST['notes']
    );
    $stmt->execute();
    header("Location: ../index.php");
    exit;
}
?>

<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

<div class="container mt-5">
    <h2>Add New Client</h2>
    <form method="POST" class="mt-4">
        <div class="mb-3">
            <label>Name</label>
            <input name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="mobile" class="form-control" pattern="^\d{10}$" required>
        </div>
        <div class="mb-3">
            <label>Company</label>
            <input name="company" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Notes</label>
            <textarea name="notes" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Client</button>
        <a href="../index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
