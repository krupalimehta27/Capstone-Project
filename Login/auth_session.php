<?php
    session_start();

    if(($_SESSION['login']=="true")){
        function authAcc($msg,$url)
			{
				echo '<script language="javascript">alert("'.$msg.'");</script>';
				echo "<script>document.location = '$url'</script>";
				$con->close();
			}
			authAcc("Welcome to your Account! ", "../index.html");
        }
    else{
        header("Location : ../index.html");
    }
    
    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        header("Location: ../index.html");
        //unset session
        session_unset();
        die();
    }
?>