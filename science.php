<?php
require_once 'db-coonect.php';
require_once 'functions.php';

$section = isset($_GET['section']) ? $_GET['section'] : 'non-fiction';
$books = getBookBySection($section);
if (isset($_GET['sort']) && $_GET['sort'] == 'title') {
    $books = sortBooksByTitle($section);
}
if (isset($_GET['sort']) && $_GET['sort'] == 'author') {
    $books = sortBooksByAuthor($section);
}
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $keyword = $_GET['search'];
    $books = searchBooks($section, $keyword);
}
?>


<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if ($section == 'fiction') {
        echo 'Художня література';
        } else if ($section == 'non-fiction') {
        echo 'Документальна література';} else {
            echo 'Наукова література';
        }?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1 class="logo"><a href="./index.php">МояКнига</a></h1>
        <h2>Книги у розділі: <span><?php if ($section=='science') {
        echo 'Художня література';
        } else if ($section == 'science') {
        echo 'Документальна література';} else {
            echo 'Наукова література';
        }?></span></h2>
    </header>

    <main>
        <div class="sort-options">
            <a href="?section=<?php echo $section?>&sort=title">Сортувати за назвою</a>
            
            <a href="?section=<?php echo $section?>&sort=author">Сортувати за автором</a>

            <form action="science.php" method="GET">
                <input type="text" name="search" placeholder="Пошук...">
                <input type="hidden" name="section" value="<?php echo htmlspecialchars($section) ?>">
                <button type="submit">Пошук</button>
            </form>

                    </div>
        
        <div class="books-list">
            <?php
            foreach ($books as $book) : ?>
            <div class="book-item">
                <img src="<?php echo $book['cover'] ?>" alt="">
                <h2><?php echo $book['title']?></h2>
                <p class="genre"><?php echo $book['genre']?></p>
                <b class="year"><?php echo $book['year']?></b>
                <b><?php echo $book['author']?></b>
                <p><?php echo $book['description']?></p>
                
            </div>
            <?php endforeach ?>
                            
        </div>
    </main>
</body>
</html>
