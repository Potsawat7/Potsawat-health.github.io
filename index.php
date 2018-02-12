<!DOCTYPE html>
<html>
<head>
	<title></title>

<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

	<style type="text/css">
	body{
		background-image: url("bg.jpg");

	}
	.main{
		padding: 30px;
		font-size: 40px;
		text-align: center;
		font-family: 'Ubuntu', sans-serif;
	}
	#drop{
		height: 50px;
		width: 60%;
		text-align: center;
		font-size: 30px;
    	font-family: 'Ubuntu', sans-serif;


	}
	 button{
          padding: 10px 40px;
          margin: 0px 10px 10px 0px;
          
          border-radius: 10px;
          font-family: 'Ubuntu', sans-serif;
          font-size: 35px;
          color: #FFF;
          text-decoration: none;  
          
        }
        
        #but{

          background-color: #04B7AA;
          border-bottom: 5px solid #669644;
          text-shadow: 0px -2px #669644;
        }

        button:active{
          transform: translate(0px,5px);
          -webkit-transform: translate(0px,5px);
          border-bottom: 1px solid;
        }
        .h{
        	/*width: 60%;*/
        	margin: 50px;
        	background: #FFE48D;
        	border-radius: 20px;
        	text-align: center;

        }
	</style>
</head>
<body>
<center>
	<div class="main">
<div class="h"><h1>Healthcare Center.</h1></div>
<form action="lab4.php">
  <select name="cal" id="drop">
    <option value="bmi">BMI</option>
    <option value="bmr">BMR</option>
    <option value="cholesterol">Cholesterol</option>
  </select>
  <br><br>
  <button type="submit" id="but">GO</button> 
</form>
</div>
</center>


</body>
</html>