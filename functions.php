<?php
function getBookBySection($section) {
    $query = sprintf("SELECT * FROM books WHERE section='%s'", mysql_real_escape_string($section));
    $result = mysql_query($query);
    $books = [];
    while ($row = mysql_fetch_assoc($result)) {
        $books[] = $row;
    }
    return $books;
}
function sortBooksByTitle($section) {
    $query = sprintf("SELECT * FROM books WHERE section='%s' ORDER BY title", mysql_real_escape_string($section));
    $result = mysql_query($query);
    $books = [];
    while ($row = mysql_fetch_assoc($result)) {
        $books[] = $row;
    }
    return $books;
}

function sortBooksByAuthor($section) {
    $query = sprintf("SELECT * FROM books WHERE section='%s' ORDER BY author", mysql_real_escape_string($section));
    $result = mysql_query($query);
    $books = [];
    while ($row = mysql_fetch_assoc($result)) {
        $books[] = $row;
    }
    return $books;
}

function searchBooks($section, $keyword) {
    $query = sprintf("SELECT * FROM books WHERE section='%s' AND (title LIKE '%%%s%%' OR author LIKE '%%%s%%' OR description LIKE '%%%s%%')",
        mysql_real_escape_string($section),
        mysql_real_escape_string($keyword),
        mysql_real_escape_string($keyword),
        mysql_real_escape_string($keyword)
    );
    $result = mysql_query($query);
    $books = [];
    while ($row = mysql_fetch_assoc($result)) {
        $books[] = $row;
    }
    return $books;
}
?>