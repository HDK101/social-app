<div class="background-content">
    <div class='content-whitebox' style='min-height: 250px; max-width: 720px; margin: 0px auto 50px auto'>
        <h1 class='lead-big center'>Create post</h1>
        <form action="/web/posts/createpost.php" method="POST">
            <div class="center" style="height: auto; width: 70%; margin: 25px auto 25px auto;">
                <input class="center input-text-style" type="text" name="title">
                <textarea class="input-text-style" name="content" cols="30" rows="10" style="height: 300px; margin-top: 20px; margin-bottom: 20px"></textarea>
                <?php include '../modules/errorhandling.php';
                ?>

                <input type="submit" class="button-styles green" style="margin-bottom: 20px">
            </div>
        </form>
    </div>
    <?php
    $connect = @mysqli_connect("localhost", "root", "", "socialapp") or die("Não foi possível conectar ao banco de dados");
    @mysqli_select_db($connect, "socialapp") or die("Não foi possível selecionar o banco de dados");

    $query = "SELECT * FROM posts ORDER BY reg_date ASC LIMIT 0,10";
    $select = mysqli_query($connect, $query);
    while ($row = mysqli_fetch_assoc($select)) {
        echo "<div class='content-whitebox' style='min-height: 250px; max-width: 720px; margin: 0px auto 50px auto'>
     <h1 class='lead-big center'>{$row["title"]}</h1>
     <p class='center'>{$row["content"]}</p>
 </div>";
    }
    ?>
</div>