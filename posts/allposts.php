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
    
    /*Pega o número de posts disponíveis*/
    $count_query = "SELECT COUNT(*) FROM posts";
    $count_select = mysqli_query($connect,$count_query);
    $count = (int)mysqli_fetch_row($count_select)[0];

    /*Lista atual(10 posts)*/
    $current_list = isset($_GET["list"]) ? is_numeric($_GET["list"]) ? $_GET["list"] : 0 : 0;
    /*Lista máxima(10 posts próximos)*/
    $max_elements = $current_list + 10;
    /*Número dos próximos elementos, é zero se a quantidade de posts for menor do que 10*/
    $next_elements = $count >= 10 ? $current_list + 10 : 0;
    /*Lista anterior(10 posts anteriores)*/
    $previous_elements = $current_list - 10 >= 0 ? $current_list - 10 : 0;

    /*Query dos posts*/
    $query = "SELECT * FROM posts ORDER BY reg_date ASC LIMIT {$current_list},{$max_elements}";
    $select = mysqli_query($connect, $query);

    /*Mostra os posts*/
    while ($row = mysqli_fetch_assoc($select)) {
        echo "<div class='content-whitebox' style='min-height: 250px; max-width: 720px; margin: 0px auto 50px auto'>
        <div style='float: left; padding: 10px'>
            <a href='/web/?user={$row["userid"]}'><img src='../img/profilepic.png' alt='Profile' class='img img--profile-small img-fly-animation'></a>
        </div>
        <div style='width: 65%; float: right;'>
            <h1 class='lead-big center'>{$row["title"]}</h1>
            <p class='center'>{$row["content"]}</p>
        </div>
    </div>";
    }
    ?>
    <div class="content-whitebox" style="height: 60px; max-width: 220px;">
        <div style="width: 80px; float:right; padding: 15px">
            <div class="center">
                <?php
                echo "<a class='a a--color-gray' href='/web/posts/?list={$next_elements}'>Next</a>"
                ?>
            </div>
        </div>
        <div style="width: 80px; float:left; padding: 15px">
            <div class="center">
                <?php
                echo "<a class='a a--color-gray' href='/web/posts/?list={$previous_elements}'>Previous</a>"
                ?>
            </div>
        </div>
        <span style="clear: both;"></span>
    </div>
</div>