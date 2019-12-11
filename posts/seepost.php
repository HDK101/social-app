<div class="background-content">
    <?php
    $post_id = $_GET['id'];

    $connect = @mysqli_connect("localhost", "root", "shambler_faust_10", "socialapp") or die("Não foi possível conectar ao banco de dados");
    @mysqli_select_db($connect, "socialapp") or die("Não foi possível selecionar o banco de dados");

    $query = "SELECT title, content FROM posts WHERE postid = '$post_id'";
    $select = mysqli_query($connect, $query);
    $post_array = mysqli_fetch_assoc($select);

    if ($post_array) {
        echo "<div class='content-whitebox' style='min-height: 250px; max-width: 720px; margin: 0px auto 50px auto'>
     <h1 class='lead-big center'>{$post_array["title"]}</h1>
     <p class='center'>{$post_array["content"]}</p>
 </div>";
    } else {
        echo "<div class='content-whitebox' style='min-height: 100px; max-width: 720px; margin: 0px auto 50px auto'>
    <p class = 'center' style=' color: red'>An error occurred.</p>
 </div>";
    }
    ?>
</div>