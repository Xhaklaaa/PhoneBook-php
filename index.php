<?php
require 'functions.php';
session_start();
$contacts = getContacts();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Телефонный справочник</title>
</head>
<body>
<h1>Телефонный справочник</h1>
<?php if (isset($_SESSION['error'])): ?>
    <p style="color: red;"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
<?php endif; ?>
<form action="process.php" method="post">
    Имя: <input type="text" name="name" required>
    Телефон: <input type="text" name="phone" required>
    <button type="submit">Добавить</button>
</form>

<h2>Список контактов:</h2>
<ul>
    <?php foreach ($contacts as $index => $contact): ?>
        <li>
            <?php echo htmlspecialchars($contact['name']) . ' - ' . htmlspecialchars($contact['phone']); ?>
            <a href="delete.php?index=<?php echo $index; ?>">Удалить</a>
        </li>
    <?php endforeach; ?>
</ul>
</body>
</html>