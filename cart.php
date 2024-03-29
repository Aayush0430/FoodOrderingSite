<?php
if(!session_id())
    session_start();

if(isset($_SESSION['login'])&&$_SESSION['login']==true){

 }
 else{
    header("location:index.php");
 }
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.1.0/remixicon.css"
        integrity="sha512-dUOcWaHA4sUKJgO7lxAQ0ugZiWjiDraYNeNJeRKGOIpEq4vroj1DpKcS3jP0K4Js4v6bXk31AAxAxaYt3Oi9xw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Cart</title>
    <style>
    .cart-items {
        /* background-color: red; */
        /* display: flex; */
        margin: 50px 40px;
        width: auto;
        height: auto;
    }

    h1 {
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }

    .empty-cart {

        padding-left: 300px;
        border-radius: 10px;
        padding: 20px;
        background-color: rgb(249, 244, 228);
        /* box-shadow: 5px 5px 5px gray; */
        display: flex;
        flex-direction: column;
    }

    .nonempty-cart {
        padding: 20px;
        display: flex;
        border-radius: 10px;
        background-color: rgb(249, 244, 222);
        /* box-shadow: 5px 5px 5px gray; */
        display: flex;
        flex-direction: column;

    }

    .empty-cart a,
    .nonempty-cart a {
        text-decoration: none;
        width: 120px;
    }

    button {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f2a900;
        border-radius: 7px;
        border: 1px solid black;
        width: 120px;
        font-weight: bold;
        font-size: 1.2rem;
        height: 40px;
        transition: all 0.3s ease;
    }

    button:hover {
        /* color: #f2a900;
        background-color: white; */
        transform: scale(0.9);
    }

    .total-div {
        height: 100px;
        margin: 50px auto;
        font-size: 2rem;
        font-weight: bold;
        /* background-color: red; */
        width: 200px;
    }

    .internal-nonempty {
        display: flex;
        /* background-color: #f2a900; */
        /* justify-content: center; */


    }

    .internal-right {
        display: flex;
        flex-direction: column;
        width: 650px;
    }

    .buttons {
        width: 250px;

        /* background-color: blue; */
        display: flex;
        justify-content: space-between
    }

    #buy-more-button {
        color: #f2a900;
        background-color: black;
    }

    /* input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    } */

    .quantity {
        width: 40px;
        text-align: center;
    }
    </style>
</head>

<body>
    <?php include("header.php");
        include("db_conn.php");
        include("utility.php");
        $userid = $_SESSION["userid"];
    ?>


    <?php
    if(isset($_GET["status"])){
        $status=$_GET["status"];
        if($status== "added"){
            $item_id=$_REQUEST['itemid'];
            $sql="SELECT * from items where item_id=$item_id";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);
            echo'<div id="alert-added" style="position:fixed;z-index:100;height:100vh;width:100vw;background:black;opacity:50%"></div>
            <div id="alert-added-inside" class="alert alert-success alert-dismissible fade show"style="text-align:center;width:25vw;position:fixed;top:50%;left:40%;z-index:100;" role="alert">
                '.$row['item_name'].' added in Cart!!
              
            </div>
            ';
        }
    }
    ?>
    <?php
    if(isset($_GET["status"])){
        $status=$_GET["status"];
        if($status== "removed"){
            $item_id=$_REQUEST['itemid'];
            $sql="SELECT * from items where item_id=$item_id";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);
            echo'<div id="alert-added" style="position:fixed;z-index:100;height:100vh;width:200vw;background:black;opacity:50%"></div>
            <div id="alert-added-inside" class="alert alert-danger alert-dismissible fade show"style="text-align:center;width:25vw;position:fixed;top:50%;left:40%;z-index:100;" role="alert">
                '.$row['item_name'].' removed from Cart!!
                
            </div>
            ';
        }
    }
    ?>
    <div class="cart-items">

        <!-- items-div -->
        <div>
            <?php 
            // echo"$userid";
            $sql="SELECT * from cart where user_id=$userid";
            $result=mysqli_query($conn,$sql);
            $rows=mysqli_num_rows($result);
            if ($rows==0) {

                echo"<div class='empty-cart'><br>
                <h1>Cart is empty</h1><br>
                <a href='index.php#explore-section'><button>Add items</button></a><br><br>
                </div>
                ";
                
            }
            else{
                echo"<div class='nonempty-cart'>
                <div class='internal-nonempty'>
                <div class='internal-right' >";
                echo"<table style='width:700px;height:200px;'>
                    <tr>
                        <th>Image</th>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        </tr>
                ";

                while($item=mysqli_fetch_assoc($result)){
                    $cart_id= $item["cart_id"];
                    $item_id=$item["item_id"];
                    $product_quantity=$item["product_quantity"];

                    $sql_item="SELECT * from items where item_id=".$item_id."";
                    $result_item=mysqli_query($conn,$sql_item);
                    $item=mysqli_fetch_assoc($result_item);
                    
                    $item_id=$item["item_id"];
                    $item_name=$item["item_name"];
                    $item_price=$item["item_price"];
                    $item_image=$item["item_image"];


                    echo'
                    <tr>
                    <td><img style="height:100px;width:100px;border-radius:20px;padding-bottom:5px;object-fit:cover;" src="'.$item_image.'"</td>
                    <td>'.$item_name.'</td>
                    <td class="price">'.$item_price.'</td>
                    <td >

                    <form action="quantityHandle.php?id='.$item_id.'" method="post">
                    
                    <input type="number" class="quantity" name="quant" value="'.$product_quantity.'" min="1" max="50" onfocus="tick('.$item_id.')" onchange="handlequan()" >
                    <button style="padding:0;height:0;width:0;border:none;" type="submit" ><i id="tick'.$item_id.'" class="ri-check-line"></i></button>
                    </form>
                    
                    </td>
                    <td class="sum"></td>
                    <td><a href="cartRemove.php?itemid='.$item_id.'"><button style="width:100px;height:30px;font-size:0.9rem;">Remove</button><a></td>
                    </tr>
                    ';

                }
                echo '</table></div>
                <div class="total-div">Grand Total:<div style="display:flex;">Rs.<p id="grandtotal"></p></div>
                
                <div class="buttons"><a href="searchBypass.php#explore-section"><button id="buy-more-button">Buy more</button></a>
                
                <a href="checkout.php"><button >Check Out</button></a></div>
                
                
                </div>
                </div>
                ';
                
                
            }
            ?>
        </div>
    </div>
</body>

<script>
const quan = document.getElementsByClassName("quantity");
const price = document.getElementsByClassName("price");
const sums = document.getElementsByClassName("sum");
const total = document.getElementById("grandtotal")

function handlequan() {
    let finalSum = 0;


    for (let i = 0; i < quan.length; i++) {
        // quantity[i] = quan[i].value;
        // console.log(quantity);
        let sum = Number(quan[i].value) * Number(price[i].innerHTML);
        sums[i].innerHTML = sum;
        finalSum += sum;

    }

    total.innerHTML = finalSum;
    // console.log(finalSum);
    // window.location.href = 'quantityHandle.php';

}

function tick(iid) {

    document.getElementById(`tick${iid}`).style.color = "red";

}
handlequan();
</script>
<script>
const alertdiv = document.getElementById("alert-added");
const alertdivinside = document.getElementById("alert-added-inside");
window.addEventListener("load", () => {
    setTimeout(() => {
        alertdiv.style.display = "none";
        alertdivinside.style.display = "none";
        // alertdiv.style.opacity = "0";
    }, 1000)

})
</script>

</html>