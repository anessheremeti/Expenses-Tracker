<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
    *{
        overflow: hidden;
    }
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(6, 71, 137);
          color: white;
            margin: 0;
            padding: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            color: white;
        }

        table, th, td {
            border: 1px solid white;
            color: white;
        }

        th, td {
            padding: 10px;
            text-align: left;
            color: white;
        }

        th {
            background-color: #427AA1;
            color: white;
        }
        a {
            color:white;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
        }

        a:hover {
           opacity: 0.7;
        }

        

        h2 {
            color: white;
        }
    </style>
<?php
// Lidhja me bazën e të dhënave
include './database.php';// Sigurohuni që rruga te jetë e saktë për skedarin e lidhjes me bazën e të dhënave

// Kontrolloni nëse admini është i kyçur (ndryshe, ridrejtoni tek faqja e login)
session_start();


// Pyetja për të marrë të dhënat nga tabela `users`
$query = "SELECT id, name, email, fullname FROM users"; // Shtoni kolonat që doni të merrni
$result = $conn->query($query);

// Kontrolloni nëse ka rezultate nga pyetja SQL
if ($result->num_rows > 0) {
    // Shfaqni të dhënat në një tabelë HTML
    echo "<h2>Përdoruesit në Sistemin tuaj</h2>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Fullname</th>
                <th>Action</th>
            </tr>";
    
    // Loop për çdo rresht dhe shfaqni të dhënat
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['name'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['fullname'] . "</td>
                <td><a href='http://localhost/phpmyadmin/index.php?route=/sql&db=expensesdb&table=users&pos=0?id=" . $row['id'] . "'>Edit</a> </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Nuk ka përdorues në sistem.";
}

// Mbyll lidhjen me bazën e të dhënave
$conn->close();
?>

    
</body>
</html>