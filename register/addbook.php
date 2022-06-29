<!doctype html>
<html lang="en">
<head >
    <meta charset="UTF-8"
</head>
<body>

<div class="container">
    <form method="POST">
        <input type="text" id="author" name="author" class="form-control" placeholder="Автор" required><br>
        <input type="text" id="bookname" name="bookname" class="form-control" placeholder="Название книги" required><br>
        <input type="text" id="short_desc" name="short_desc" class="form-control" placeholder="Краткое содержание" required><br>
        <input type="text" id="long_desc" name="long_desc" class="form-control" placeholder="Описание" required><br>
        <input type="text" id="cost" name="cost" class="form-control" placeholder="Цена в гривнах" required><br>
        <input type="file" id="pic" name="pic" class="form-control" placeholder="Обложка книги" required><br>
        <button type="submit" name="addBook" id="addBook" value="addBook" required>Добавить книгу в каталог</button><br><br> <!-- onclick= "document.write('<?php addBook() ?>');" -->
    </form>
</div>

<?php
require ('connect.php');
if(array_key_exists('addBook',$_POST)) {
    addBook();
}
else {
    echo "Something went wrong!";
}



function addBook(){
//    print_r($_POST);
    $author = $_POST['author'];
    $bookname = $_POST['bookname'];
    $short_desc = $_POST['short_desc'];
    $long_desc = $_POST['long_desc'];
    $cost = $_POST['cost'];
    $pic = $_POST['pic'];
//    echo $author;
//    echo $bookname;
//    echo $short_desc;
//    echo $long_desc;
//    echo $cost;
//    echo $pic;
    $newBook = "INSERT INTO books (`author`,`bookname`,`short_desc`,`long_desc`,`pic`,`cost`) VALUES ('$author','$bookname','$short_desc','$long_desc','$pic','$cost')";
    echo $newBook;
//    $connection->query($newBook);
//    echo $connection;
//    $bookID = $connection->insert_id;
//    printf("ID новой записи: %d.\n", $conn->insert_id);
}

?>

</body>
</html>