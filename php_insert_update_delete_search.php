<?php
require 'db.php'; // Підключення до бази даних через PDO
include("includes/header.php");

$id = "";
$name = "";
$rank = "";
$unit_id = "";
$message = ""; // Змінна для повідомлень

// Отримання значень із форми
function getPosts()
{
    return [
        'id' => $_POST['id'] ?? null,
        'name' => $_POST['name'] ?? null,
        'rank' => $_POST['rank'] ?? null,
        'unit_id' => $_POST['unit_id'] ?? null
    ];
}

// Валідація введених даних
function validateInput($data)
{
    $errors = [];

    if (!empty($data['id']) && !filter_var($data['id'], FILTER_VALIDATE_INT)) {
        $errors[] = "Invalid ID";
    }

    if (!empty($data['unit_id']) && !filter_var($data['unit_id'], FILTER_VALIDATE_INT)) {
        $errors[] = "Invalid Unit ID";
    }

    if (!empty($data['name']) && strlen($data['name']) > 100) {
        $errors[] = "Name is too long (max 100 characters)";
    }

    if (!empty($data['rank']) && !preg_match("/^[a-zA-Z\s]+$/", $data['rank'])) {
        $errors[] = "Rank contains invalid characters";
    }

    return $errors;
}

// Пошук
if (isset($_POST['search'])) {
    $data = getPosts();
    $errors = validateInput($data);

    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare("SELECT * FROM officer WHERE id = ?");
            $stmt->execute([$data['id']]);
            $row = $stmt->fetch();
            if ($row) {
                $id = $row['id'];
                $name = $row['name'];
                $rank = $row['rank'];
                $unit_id = $row['unit_id'];
                $message = "Data Found: ID: $id, Name: $name, Rank: $rank, Unit ID: $unit_id";
            } else {
                $message = "No Data Found For This ID";
            }
        } catch (PDOException $e) {
            $message = 'Search Error: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
        }
    } else {
        $message = implode('<br>', $errors);
    }
}

// Додавання
if (isset($_POST['insert'])) {
    $data = getPosts();
    $errors = validateInput($data);

    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO officer (name, rank, unit_id) VALUES (?, ?, ?)");
            $stmt->execute([$data['name'], $data['rank'], $data['unit_id']]);
            $message = 'Data Inserted Successfully';
        } catch (PDOException $e) {
            $message = 'Insert Error: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
        }
    } else {
        $message = implode('<br>', $errors);
    }
}

// Видалення
if (isset($_POST['delete'])) {
    $data = getPosts();
    $errors = validateInput($data);

    if (empty($errors)) {
        try {
            // Видаляємо запис
            $stmt = $pdo->prepare("DELETE FROM officer WHERE id = ?");
            $stmt->execute([$data['id']]);

            // Скидаємо інкремент
            $pdo->exec("ALTER TABLE officer AUTO_INCREMENT = 1");

            $message = 'Data Deleted and AUTO_INCREMENT reset';
        } catch (PDOException $e) {
            $message = 'Delete Error: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
        }
    } else {
        $message = implode('<br>', $errors);
    }
}

// Оновлення
if (isset($_POST['update'])) {
    $data = getPosts();
    $errors = validateInput($data);

    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare("UPDATE officer SET name = ?, rank = ?, unit_id = ? WHERE id = ?");
            $stmt->execute([$data['name'], $data['rank'], $data['unit_id'], $data['id']]);
            $message = 'Data Updated Successfully';
        } catch (PDOException $e) {
            $message = 'Update Error: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
        }
    } else {
        $message = implode('<br>', $errors);
    }
}
?>

<head>
    <meta charset="utf-8">
    <title>Database: Military district</title>
    <link href="css/style.css" media="screen" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="container mregister">
        <div id="login">
            <h1>Officer Management</h1>
            <form action="" method="post">
                <p>
                    <label for="id">ID<br>
                        <input class="input" id="id" name="id" size="32" type="number" value="<?php echo htmlspecialchars($id); ?>">
                    </label>
                </p>
                <p>
                    <label for="name">Name<br>
                        <input class="input" id="name" name="name" size="32" type="text" value="<?php echo htmlspecialchars($name); ?>">
                    </label>
                </p>
                <p>
                    <label for="rank">Rank<br>
                        <input class="input" id="rank" name="rank" size="32" type="text" value="<?php echo htmlspecialchars($rank); ?>">
                    </label>
                </p>
                <p>
                    <label for="unit_id">Unit ID<br>
                        <input class="input" id="unit_id" name="unit_id" size="32" type="number" value="<?php echo htmlspecialchars($unit_id); ?>">
                    </label>
                </p>
                <p class="submit">
                    <input class="button" id="insert" name="insert" type="submit" value="Add">
                    <input class="button" id="update" name="update" type="submit" value="Update">
                    <input class="button" id="delete" name="delete" type="submit" value="Delete">
                    <input class="button" id="search" name="search" type="submit" value="Find">
                </p>
            </form>
        </div>
    </div>

    <!-- Виведення повідомлень -->
    <?php if (!empty($message)) { echo "<p class='error'>" . htmlspecialchars($message, ENT_QUOTES, 'UTF-8') . "</p>"; } ?>

    <footer>
    </footer>
</body>

<?php include("includes/footer.php"); ?>
