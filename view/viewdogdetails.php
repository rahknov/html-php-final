<!DOCTYPE html>
<html>
<head>
    <title>Dog Details</title>
    <style>
        table {
            width: 50%;
            margin: 0 auto;
            border-collapse: collapse;
            text-align: left;
        }
        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        tbody tr:hover {
            background-color: #f1f1f1;
        }
        .action-links {
            text-align: center;
            margin-top: 20px;
        }
        .action-links a {
            margin: 0 10px;
            text-decoration: none;
            color: white;
            background-color: #4CAF50;
            padding: 10px 15px;
            border-radius: 5px;
        }
        .action-links a.delete {
            background-color: #f44336;
        }
    </style>
</head>
<body>

<?php if ($dog): ?>
    <h2>Details of <?php echo htmlspecialchars($dog->dog_name); ?></h2>
    <table>
        <tr>
            <th>Dog Name</th>
            <td><?php echo htmlspecialchars($dog->dog_name); ?></td>
        </tr>
        <tr>
            <th>Breed</th>
            <td><?php echo htmlspecialchars($dog->dog_breed); ?></td>
        </tr>
        <tr>
            <th>Age</th>
            <td><?php echo htmlspecialchars($dog->dog_age); ?></td>
        </tr>
        <tr>
            <th>Weight (kg)</th>
            <td><?php echo htmlspecialchars($dog->dog_weight); ?></td>
        </tr>
        <tr>
            <th>Owner Name</th>
            <td><?php echo htmlspecialchars($dog->owner_name); ?></td>
        </tr>
        <tr>
            <th>Phone</th>
            <td><?php echo htmlspecialchars($dog->owner_phone); ?></td>
        </tr>
        <tr>
            <th>Vaccination Status</th>
            <td><?php echo htmlspecialchars($dog->vaccination_status); ?></td>
        </tr>
    </table>

    <div class="action-links">
        <a href="index.php?command=editDog&dog_name=<?php echo urlencode($dog->dog_name); ?>">Edit</a>
        <a href="index.php?command=deleteDog&dog_name=<?php echo urlencode($dog->dog_name); ?>" class="delete" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
    </div>
<?php else: ?>
    <p>No dog found with the given name.</p>
<?php endif; ?>

</body>
</html>
