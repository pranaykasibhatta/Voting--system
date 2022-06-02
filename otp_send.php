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
            .card{
            align-items: center ;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,2);
            width: 30%;
            height: 24%;
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
                <input type="email" value="" name="email" required placeholder="Enter email" size=50><br><br><br>
                <input type="submit" value="Send OTP" name="save"><br><br><br>

        </form>
        <?php
        if(isset($_POST['email'])){
            $server_name="localhost";
            $username="root";
            $password="";
            $database_name="vote";
            $conn=mysqli_connect($server_name,$username,$password,$database_name);
            if(isset($_POST['save'])){
                $email=$_POST['email'];
                $query="SELECT email FROM otp where email='$email'";
                $result=mysqli_query($conn,$query);
                $count=mysqli_num_rows($result);
                if($count>0){
                $random_otp=rand(10000,99999);
                $receiver = $email;
                $subject = "OTP for online voting";
                $body = "otp is:".$random_otp;
                $sender = "From:pranaykasibhatla@gmail.com";
                if(mail($receiver, $body,$subject, $sender)){
                    $query1="UPDATE otp SET otp='$random_otp' WHERE email='$email'";
                    $re=mysqli_query($conn,$query1);
                    echo '<script>alert("email sent")</script>';
                    echo"<button style='background-color: #45a049;' width=30 ><b><a href='otp.php?value=$receiver' style='color:black'>enter otp</a></b></button>";
                }else{
                    echo '<script>alert("email sending failed")</script>';
                }
                }
                else{
                    echo '<script>alert("email not found")</script>';
                }
                }
            }
            if(isset($_POST['n'])&&isset($_POST['s'])){
                
            }
        ?>
    </body>
</html>
    