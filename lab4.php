<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

	<style type="text/css">
	body{
		background-color: #075668;
	}
	.content{
		background-color: #76DEF6;

		padding: 30px;
		font-size: 30px;
		margin:40px;
		font-family: 'Ubuntu', sans-serif;
	}
	input, select{
		font-size: 20px;
	}
		h1{
		
        	margin: 50px;
        	background: #45CAE9;
        	border-radius: 20px;
        	text-align: center;
        	font-family: 'Ubuntu', sans-serif;
		}
		button{
			padding: 10px;
          margin: 10px 10px 10px 0px;
          
          border-radius: 10px;
			font-size: 20px;
			font-family: 'Ubuntu', sans-serif;
		}
	</style>
</head>
<body>
	<center>
	<div class="content">
<?php 
	$selected = $_GET["cal"];
	if ($selected == "bmi"){
		echo'
		 <div>
		 <h1> โปรแกรมคำนวณดัชนีมวลกาย Body Mass Index (BMI)  </h1>
		 Height:<br>
  		 <input type="text" name="height" id = "h"><br>
  		 Weight:<br>
 		 <input type="text" name="weight" id = "w">
 		 </div>
 		 <button onclick=calBMI() >Calulate</button>
 		 <p >Your BMI : <span id="outBMI"></span></p>
 		 
 		 <p id = "result"></p>
 		  '; 
	}elseif ($selected == "bmr") {
		echo '
		<h1> คำนวณการเผาผลาญพลังงาน Basal Metabolic Rate (BMR) </h1>
		<div class="col-lg-3">
		        <label><input id="male" name="Sex" value="Male" class="form-control" 
		        checked="checked" type="radio"> ชาย</label>
                <label><input id="female" name="Sex" class="form-control" value="Female"  type="radio">หญิง</label>
		</div>
		<div class="form-group">
		      <label class="col-lg-2 control-label">ส่วนสูง/เซ็นติเมตร</label>
		      <div class="col-lg-3">
		        <input name="Tall" class="form-control" id="Tall" size="10" maxlength="3"  type="text">
                    
		      </div>
		    </div>
		<div class="form-group">
		      <label class="col-lg-2 control-label">น้ำหนัก/กิโลกรัม</label>
		      <div class="col-lg-3">
		        <input name="Weight" class="form-control" id="weightBmr" size="10" maxlength="3"  type="text">
                    
		      </div>
		    </div>
		<div class="form-group">
		      <label class="col-lg-2 control-label">อายุ/ปี</label>
		      <div class="col-lg-3">
		        <input name="Age" class="form-control" id="ages" size="10" maxlength="3"  type="text">
                    
		      </div>
		    </div>
		<div class="form-group">
		      <label class="col-lg-2 control-label">กิจกรรม</label>
		      <div class="col-lg-3">
		        <select id="Activity" class="form-control" name="Activity">
				<option selected="selected" value="0">ไม่ออกกำลังกายหรือออกกำลังกายน้อยมาก</option>
				<option value="1">ออกกำลังกายน้อยเล่นกีฬา 1-3 วัน/สัปดาห์</option>
				<option value="2">ออกกำลังกายปานกลางเล่นกีฬา 3-5 วัน/สัปดาห์</option>
				<option value="3">ออกกำลังกายหนักเล่นกีฬา 6-7 วัน/สัปดาห์</option>
				<option value="4">ออกกำลังกายหนักมากเป็นนักกีฬา</option>
				</select>
                      
		      </div>
		    </div>
		    <button onclick=calBMR() >Calulate</button>
		    <div class = "output">
		    <p> BMR (Basal Metabolic Rate) พลังงานที่จำเป็นพื้นฐานในการมีชีวิต  <span id="bmrOut"></span> กิโลแคลอรี่ </p>
		    <p>TDEE (Total Daily Energy Expenditure) พลังงานที่คุณใช้ในแต่ละวัน <span id="tdeeOut"></span> กิโลแคลอรี่</p>
		    </div>

		';
	}else{
		echo '<h1>คำนวณค่าคอเลสเตอรอลรวม </h1>
			<div class="choles">
				<p>ระดับไขมันแอลดีแอล LDL</p><br>
  		 <input type="text" name="LDL" id = "ldl"><br>
  		 <p>ระดับไขมันเอชดีแอล HDL </p><br>
 		 <input type="text" name="HDL" id = "hdl">
 		 <p>ไตรกลีเซอไรด์ Triglycerides </p><br>
 		 <input type="text" name="try" id = "try"><br>
 		 <button onclick=calCho() >Calulate</button>
 		 <p >ค่าคอเลสเตอรอลรวม : <span id="outCho"></span></p>

			</div>



		';
	}

 ?>
 <div><a href="index.html"><button >back to Home</button></a></div>
 </div></center>
 <script src="jquery-3.3.1.min.js" type="text/javascript"></script>
 <script type="text/javascript">
 	function calCho(){
 		var total = parseFloat(document.getElementById("ldl").value) + parseFloat(document.getElementById("hdl").value) + (parseFloat(document.getElementById("try").value)/5);
 		console.log(total);
 		if(total >= 240){
 			$("#outCho").html("สูง");
 		}else if(total >= 200 && total <=239){
 			$("#outCho").html("ค่อนข้่างสูง");
 		}else{
 			$("#outCho").html("ดีมาก");
 		}

 	}
 	function calBMR(){

 		var bmr;
 		var tdee;
 		var w = parseFloat(document.getElementById("weightBmr").value);
 		var h = parseFloat(document.getElementById("Tall").value);
 		var a = parseFloat(document.getElementById("ages").value);
 		console.log(w); console.log(h); console.log(a);
 		if (document.getElementById('male').checked) {
 			console.log("male")
  			male = document.getElementById('male').value;
  			bmr = 66 + (13.7 * w) + (5 * h) - (6.8 * a) ;
		}else if((document.getElementById('female').checked)){
			console.log("fmale")
			female = document.getElementById('male').value;
			bmr = 665 + (9.6 * w) + (1.8 * h) - (4.7 * a) ;
		}
		console.log(document.getElementById("Activity").value);
		if(document.getElementById("Activity").value == "0"){
			tdee = bmr * 1.2;
		}else if(document.getElementById("Activity").value == "1"){
			tdee = bmr*1.375;
		}else if(document.getElementById("Activity").value == "2"){
			tdee = bmr * 1.55;
		}else if(document.getElementById("Activity").value == "3"){
			tdee = bmr * 1.725;
		}else{
			tdee = bmr * 1.9;
		}
		$("#bmrOut").html(bmr);
		$("#tdeeOut").html(Math.round(tdee,0));
		// bmr = Math.round(bmr,2);
		
 	}
 	function calBMI() {
 		// body...
 		var value = ((parseFloat(document.getElementById("w").value) ) / (((parseFloat(document.getElementById("h").value))/100)*((parseFloat(document.getElementById("h").value))/100))).toFixed(2);
 		console.log((parseFloat(document.getElementById("w").value) ) / (((parseFloat(document.getElementById("h").value))/100)*((parseFloat(document.getElementById("h").value))/100)));
 		// document.getElementById("outBMI").innerHTML = value;
 		$("#outBMI").html(value);
 		if (value >= 40){
 			$("#result").html("โรคอ้วนขั้นสูงสุด");
 			
 		}
 		else if(value >= 35.0){
 			$("#result").html("โรคอ้วนระดับ2 คุณเสี่ยงต่อการเกิดโรคที่มากับความอ้วน หากคุณมีเส้นรอบเอวมากกว่าเกณฑ์ปกติคุณจะเสี่ยงต่อการเกิดโรคสูง คุณต้องควบคุมอาหาร และออกกำลังกายอย่างจริงจัง");
 			
 		}else if(value >= 28.5){
 			$("#result").html("โรคอ้วนระดับ1 และหากคุณมีเส้นรอบเอวมากกว่า 90 ซม.(ชาย) 80 ซม.(หญิง) คุณจะมีโอกาศเกิดโรคความดัน เบาหวานสูง จำเป็นต้องควบคุมอาหาร และออกกำลังกาย");
 			
 		}else if(value >= 23.5){
 			$("#result").html("น้ำหนักเกิน หากคุณมีกรรมพันธ์เป็นโรคเบาหวานหรือไขมันในเลือดสูงต้องพยายามลดน้ำหนักให้ดัชนีมวลกายต่ำกว่า 23");
 		}else if(value >= 18.5){
 			$("#result").html("น้ำหนักปกติ และมีปริมาณไขมันอยู่ในเกณฑ์ปกติ มักจะไม่ค่อยมีโรคร้าย อุบัติการณ์ของโรคเบาหวาน ความดันโลหิตสูงต่ำกว่าผู้ที่อ้วนกว่านี้");
 		}else{
 			$("#result").html(" น้ำหนักน้อยเกินไป ซึ่งอาจจะเกิดจากนักกีฬาที่ออกกำลังกายมาก และได้รับสารอาหารไม่เพียงพอ วิธีแก้ไขต้องรับประทานอาหารที่มีคุณภาพ และมีปริมาณพลังงานเพียงพอ และออกกำลังกายอย่างเหมาะสม");
 	}}
 </script>
</body>
</html>