<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="Style.css">
</head>
<body>

<?php
if(isset($_POST['save'])){ 
  
  $base_ = $_POST['base'];
  $shoulder_ = $_POST['shoulder'];
  $elbow_ = $_POST['elbow'];
  $wrist_ = $_POST['wrist'];
  $gripper_ = $_POST['gripper'];


  $conn = new mysqli('localhost' , 'root' , '' , 'robot_controller');

if($conn->connect_error)
{
  die('Connection faild : '.$conn->connect_error);
}
else
{
  
  $stmt = $conn->prepare("UPDATE DB SET base='$base_', shoulder='$shoulder_', elbow='$elbow_ ', wrist='$wrist_' ,gripper='$gripper_' ");
  $stmt->execute();
  $stmt->close();
    $conn->close();
  
}
 
}

if(isset($_POST['on/off'])){
  
  if ($run_ = "on"){
$conn = new mysqli('localhost' , 'root' , '' , 'robot_controller');
  $stmt = $conn->prepare("UPDATE DB SET on_off='$stop_'");
  $stmt->execute();
  $stmt->close();
  $conn->close();
  
}

elseif($stop_="off")){

  $conn = new mysqli('localhost' , 'root' , '' , 'robot_controller');
  $stmt = $conn->prepare("UPDATE DB SET on_off='$run_'");
  $stmt->execute();
  $stmt->close();
  $conn->close();}
  
}
?>

<form action ="Task1.php" method ="post">

<h2 >Arm Controller</h2>
<br><br>

<table class="center">
  <tr>
    <th>Motor</th>
    <th>Degree</th> 
    <th>Value</th>
  </tr>
  <tr>
    <td>M 1</td>
    <td><input type="range" min="0" max="180" value="90" class="slider1" id="R1"></td>
    <td><span id="V1"></span></td>
  </tr>
  <tr>
    <td>M 2</td>
    <td><input type="range" min="0" max="180" value="90" class="slider2" id="R2"></td>
    <td><span id="V2"></span></td>
  </tr>
  <tr>
    <td>M 3</td>
    <td><input type="range" min="0" max="180" value="90" class="slider" id="R3"></td>
    <td><span id="V3"></span></td>
  </tr>
  <tr>
    <td>M 4</td>
    <td><input type="range" min="0" max="180" value="90" class="slider" id="R4"></td>
    <td><span id="V4"></span></td>
  </tr>
  <tr>
    <td>M 5</td>
    <td><input type="range" min="0" max="180" value="90" class="slider" id="R5"></td>
    <td><span id="V5"></span></td>
  </tr>
</table>
<br>

<p class="center">
<button id="save" type="submit" value="Submit" name="save" ><b>SAVE</button> 
<button id="onoff" type="submit" value="Submit" name="on/off" ><b>ON/OFF</button>
</p>
</form>

<script>
var slider1 = document.getElementById("R1");
var output1 = document.getElementById("V1");
output1.innerHTML = slider1.value;
slider1.oninput = function() {
output1.innerHTML = slider1.value;
}

var slider2 = document.getElementById("R2");
var output2 = document.getElementById("V2");
output2.innerHTML = slider2.value;
slider2.oninput = function() {
output2.innerHTML = slider2.value;
}

var slider3 = document.getElementById("R3");
var output3 = document.getElementById("V3");
output3.innerHTML = slider3.value;
slider3.oninput = function() {
output3.innerHTML = slider3.value;
}

var slider4 = document.getElementById("R4");
var output4 = document.getElementById("V4");
output4.innerHTML = slider4.value;
slider4.oninput = function() {
output4.innerHTML = slider4.value;
}

var slider5 = document.getElementById("R5");
var output5 = document.getElementById("V5");
output5.innerHTML = slider5.value;
slider5.oninput = function() {
output5.innerHTML = slider5.value;
}

</script>

</body>
</html>