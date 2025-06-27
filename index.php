<?php include('includes/auth.php'); ?>
<?php include('includes/dbconnect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>MINI CRM</title>
    <style>
        .highlight {
            background-color: #d4edda !important; 
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">MyWebsite</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex me-auto" method="GET">
                <input class="form-control me-2" type="search" name="search" placeholder="Search..."
                       aria-label="Search" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            
            <div class="d-flex gap-2 align-items-center">
    <a href="clients/add.php" class="btn btn-success">+ Add New Client</a>
    <a href="logout.php" class="btn btn-danger">Logout</a>
</div>


        </div>
    </div>
</nav>

<div class="container mt-4">
    <h2 class="mb-3 text-center">Welcome Admin!</h2>
    <h4>All Clients:</h4>

    <?php
    $searchTerm = isset($_GET['search']) ? trim($_GET['search']) : '';
    if ($searchTerm !== '') {
        $stmt = $conn->prepare("SELECT * FROM clients WHERE name LIKE ? OR email LIKE ? OR mobile LIKE ? OR company LIKE ?");
        $likeTerm = "%" . $searchTerm . "%";
        $stmt->bind_param("ssss", $likeTerm, $likeTerm, $likeTerm, $likeTerm);
        $stmt->execute();
        $result = $stmt->get_result();
    } else {
        $result = $conn->query("SELECT * FROM clients");
    }
    ?>

    <?php if ($result->num_rows > 0): ?>
        <table class="table table-bordered table-striped mt-3">
            <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile Number</th>
                <th>Company</th>
                <th>Notes</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php while ($row = $result->fetch_assoc()): 
                $match = false;
                if ($searchTerm !== '') {
                    $haystack = strtolower($row['name'] . $row['email'] . $row['mobile'] . $row['company']);
                    $match = strpos($haystack, strtolower($searchTerm)) !== false;
                }
            ?>
                <tr class="<?= $match ? 'highlight' : '' ?>">
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['mobile']) ?></td>
                    <td><?= htmlspecialchars($row['company']) ?></td>
                    <td><?= htmlspecialchars($row['notes']) ?></td>
                    <td>
                        <a href="clients/edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                        <a href="clients/delete.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger"
                           onclick="return confirm('Are you sure to delete?');">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-warning mt-3">
            No matching records found for "<strong><?= htmlspecialchars($searchTerm) ?></strong>".
        </div>
    <?php endif; ?>
</div>
</body>
</html>
