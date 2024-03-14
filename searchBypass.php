<?php
if(!session_id())
    session_start();
 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>search</title>
    <style>
    main {
        height: auto;
        /* background-color: blue; */
        width: 100%;

    }

    #second {
        width: auto;
        height: 250px;
        margin: 35px 50px;
        display: flex;
        justify-content: space-evenly;
        /* background-color: red; */
    }

    #search {
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        color: white;
        width: 700px;
        height: 100%;
        border-radius: 20px;
        background: url(img/second.png);
        background-repeat: no-repeat;
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* #search-img{
        mix-blend-mode: multiply;
        height:200px;
        padding: 20px;
    } */
    #search h1 {
        font-weight: bold;
    }

    #input_search {
        height: 15px;
        cursor: pointer;
        margin-left: 10px;
        border: 0;
        outline: none;
        font-size: 0.6rem;
    }

    #search button {
        border-radius: 15px;
        width: 45px;
        height: 80%;
        margin-right: 5px;
        border: none;
        background-color: #f2a900;
        color: white;
        font-size: 0.6rem;
    }

    #explore-search-button {
        border-radius: 15px;
        margin-right: 5px;
        border: 1px solid #f2a900;
        padding: 5px 10px;
        background-color: #f2a900;
        color: white;
        font-size: 0.8rem;
    }

    #search button:hover,
    #explore-search-button:hover {
        border: 1px solid #f2a900;
        color: #f2a900;
        background-color: inherit;
    }

    #searchbar {
        margin-top: 10px;
        width: 200px;
        height: 30px;
        background-color: white;
        border-radius: 15px;
        justify-content: space-between;
        display: flex;
        align-items: center;

    }

    .scroll-container {
        height: 100%;
        background-color: #f2a900;
        width: auto;
        border-radius: 20px;

    }

    .link {
        color: black;

    }

    .link:hover {
        text-decoration: none;
        color: gray;
    }

    .explore-page {
        height: auto;
        width: 95%;
        /* background-color: blue; */


    }

    .explore-section {
        margin-left: 0;
        width: 90%;

    }

    html {
        scroll-behavior: smooth;
        scroll-padding-top: 75px;
    }

    #search-a {
        text-decoration: none;
    }

    #search button {
        border-radius: 15px;
        width: 45px;
        height: 80%;
        margin-right: 5px;
        border: none;
        background-color: #f2a900;
        color: white;
        font-size: 0.6rem;
    }

    #search button:hover {
        transform: scale(1.1);
        border: 1px solid #f2a900;
        color: #f2a900;
        background-color: inherit;
    }
    </style>
</head>

<body>
    <?php
    include("db_conn.php");
    ?>
    <?php
    include("header.php");
    ?>
    <main>
        <div id='second'>
            <div id='search'>
                <?php include('searchBanner.php'); ?>
            </div>
            <div class="scroll-container">
                <?php
                include ("scroll_cont.php");
                ?>
            </div>
        </div>
        <!-- category-bar -->
        <div id="category-bar">
            <?php  include('categoryCarousel.php')?>
        </div>
    </main>
    <!-- explore page -->
    <section id="explore-section"><span style="height:1px;"></span></section>
    <div class="explore-page">

        <div style="display: flex;justify-content:center;margin-left:376px;align-items:center;">
            <div style="">
                <h2 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                    Explore</h2>
            </div>

            <form action="searchResult.php#explore-section" method="post">

                <input name="searched-item" id="explore-section-input"
                    style="border:none;border-bottom:1px solid black;margin-left:50px;outline:none;width:250px;padding-left:10px;font-size:0.9rem;"
                    placeholder="Find your favourite food" type="text">
                <button type="submit" id="explore-search-button">SEARCH</button>
            </form>
        </div>
        <?php include('explore.php')?>

    </div>
    <div id="footer-section">
        <?php
        include('footer.php');
        ?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script>
    const input = document.getElementById("explore-section-input");
    window.addEventListener("load", () => {
        setTimeout(() => {

            input.focus();
        }, 200)
    })

    function inputFocus() {
        setTimeout(() => {

            input.focus();
        }, 200)

    }
    </script>
</body>

</html>