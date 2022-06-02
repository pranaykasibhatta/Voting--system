<html>
    <head>
        <style> 
            input{
                float:left;
                padding: 7px;
                width: 100%;
                background-color:lavender;
                font-weight: bold;
            }
            input[type=submit]{
            background-color: #45a049;
            font-weight: bold;
            width: 20%;
            height: 20%;
            }
            .card {
            align-items: center ;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,2);
            width: 30%;
            height: 20%;
            margin :auto;
            margin-top:10%;
            background-image: url(bg.jpg);
            background-repeat: no-repeat;
            }
            .container {
            padding: 30px 20px ;
            } 
        </style>
        <link rel="stylesheet" href="style.css">
    </head>
    <body >
        <nav>
            <label class="logo">ONLINE VOTING SYSTEM</label>
            <ul>
                <li><a href="http://localhost/votingsystem/otp_send.php">VOTE</a></li>
                <li><a href="http://localhost/votingsystem/register1.php">REGISTER</a></li>
                <li><a href="#">RESULT</a></li>
            </ul></nav>  
        <div class="card" style="text-align: center;">
            <div class="container">
                <form method="post">
                <input type="number" value="" name="a" required placeholder="Enter otp" size=50><br><br><br>
                <input type="submit" value="Submit" name="save"><br><br><br>
        </form>
        <?php
        if(isset($_POST['a'])&&isset($_POST['save'])){
            $server_name="localhost";
            $username="root";
            $password="";
            $database_name="vote";
            $conn=mysqli_connect($server_name,$username,$password,$database_name);
            if($conn){
                $b=$_GET['value'];
                $q="SELECT otp FROM otp WHERE email='$b'";
                $r=mysqli_query($conn,$q);
                $re=mysqli_fetch_array($r,MYSQLI_ASSOC);
                $a=$_POST['a'];
                $g=$re['otp'];$a=(int)$a;$g=(int)$g;
                if($a==$g){
                   echo '<script>alert("successfull")</script>';
                }
                else{
                    echo'<script>alert("incorrect otp")</script>';
                }
            }
        }
        ?>
    </body>
</html>
    