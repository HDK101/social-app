<div class="background-content">
    <?php
    $connect = @mysqli_connect("localhost", "root", "shambler_faust_10", "socialapp") or die("Não foi possível conectar ao banco de dados");
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