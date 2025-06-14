<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Appointment Booking</title>
  <link rel="icon" href="/Final/Data/Images/Logo/Logo.png" type="Image/x-icon" />
  <script>
    // Function to validate form
    function validateForm() {
      var name = document.forms["appointmentForm"]["name"].value;
      var email = document.forms["appointmentForm"]["email"].value;
      var phone = document.forms["appointmentForm"]["phone"].value;
      var appointmentDate = document.forms["appointmentForm"]["appointment_date"].value;
      var timeOfDay = document.forms["appointmentForm"]["time_of_day"].value;
      var confirmationMethod = document.forms["appointmentForm"]["confirmation_method"].value;

      if (name == "" || email == "" || phone == "" || appointmentDate == "" || !timeOfDay || !confirmationMethod) {
        alert("All fields are required!");
        return false; // Prevent form submission
      }
      return true; // Allow form submission
    }
  </script>
</head>
  <body background="\Final\Data\Images\Appoiment/3.jpg" 
      style="background-repeat: no-repeat; background-size: cover; background-attachment: scroll;">
    
<form name="appointmentForm" action="http://localhost/Final/data/Appoiment_Confirm.php" id="ft-form" method="POST" accept-charset="UTF-8" onsubmit="return validateForm()">

<center><font size="6" color="#581845"> Person Details : </font></center>
<br>
<table width="80%" border="0" align="center" cellpadding="40px">
   <tr> <td>
<center>
<font size="4" color="#581846"> Name : </font>      
      <input type="text" name="name" required>
    
    <div class="two-cols">
<br>
      <label>
<font size="4" color="#581846"> Email Address : </font>        
        <input type="email" name="email" required>
<br><br>
      <label>
<font size="4" color="#581846"> Phone number : </font>           
        <input type="tel" name="phone" required>
</center>
 </td></tr>
    </div>
</table>

<!-- Appointment Request Section -->
<br><br><br><br>
<center><font size="6" color="#581845"> Appointment request : </font></center> <br>
<br>

<table width="80%" border="0" align="center" cellpadding="40px">
    <tr><td>
<center>
<font size="4" color="#007BB0"> Date : </font>       
        <input type="date" name="appointment_date" required>
      
<br><br>

<font size="4" color="#007BB0"> Appointment Time: </font><br>
<!-- Radio buttons for time selection -->
<input type="radio" name="time_of_day" value="Morning" required> Morning<br>
<input type="radio" name="time_of_day" value="Afternoon" required> Afternoon<br>
<input type="radio" name="time_of_day" value="Night" required> Night<br>
        
<br><br>

<b> <font color="#581845" font size="5" font face="Corbel">Confirmation requested by... </font> </b>
    <div class="inline">
<br>
      <label>
        <input type="radio" name="confirmation_method" value="email" checked>
<font size="5" color="#007BB0"> Email </font>         
      </label>
      <label>
        <input type="radio" name="confirmation_method" value="phone" > 
<font size="5" color="#007BB0"> Phone call </font>         
      </label>
    </div>
<br><br>
  
  <input type="submit" value="Book Appointment">
</table>

<br><br><br><br><br><br>
<table width="100%">
<tr><td>
<center>
  <div class="footer">
<table border="0" width="30%" align="center" cellpadding="15">
<tr align="center">
<td colspan="2"><font color="#581845" size="6"> Contact Us :-<br></font><hr align="50%"> <br>
</tr>

<tr>
<td> <font size="5" font color="#0731A2"> Name :</td>
<td><input type="text"></td>
</tr>

<tr>
<td><font size="5" font color="#0731A2"> Mobile :</td>
<td><input type="number"></td>
</tr>

<tr>
<td><font size="5" font color="#0731A2"> Message :</td>
<td><textarea cols="20" rows="4"></textarea>

</center>
</td>
</tr>
</table>
<div>
  <p>&copy; 2024 JT Parlour. All rights reserved.</p>
</div>
</footer>
<br><br><br><br><br><br><br><br>
</body>
</html>
