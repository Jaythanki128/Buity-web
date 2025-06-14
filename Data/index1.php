<!DOCTYPE html>
<html>
<head>
  <title>Appointments</title>
  <link rel="icon" href="/Final/Data/Images/Logo/Logo.png" type="Image/x-icon" />
</head>
<body background="/Final/Data/Images/Appoiment/3.jpg" style="background-repeat: no-repeat; background-size: cover; background-attachment: scroll;">
  <form action="Appoiment_Confirm.php" method="POST" accept-charset="UTF-8">
    <center><font size="6" color="#581845">Person Details:</font></center>
    <br>
    <table width="80%" border="0" align="center" cellpadding="40px">
      <tr><td>
        <center>
          <font size="4" color="#581846">Name:</font>
          <input type="text" name="name" required><br><br>
          
          <font size="4" color="#581846">Email Address:</font>
          <input type="email" name="email" required><br><br>

          <font size="4" color="#581846">Phone Number:</font>
          <input type="tel" name="phone" required><br><br>
        </center>
      </td></tr>
    </table>

    <center><font size="6" color="#581845">Appointment Request:</font></center>
    <table width="80%" border="0" align="center" cellpadding="40px">
      <tr><td>
        <center>
          <font size="4" color="#007BB0">Date:</font>
          <input type="date" name="Appointment_request" required><br><br>

          <input type="hidden" name="Morning_desired" value="no">
          <input type="checkbox" name="Morning_desired" value="yes"> <font size="4" color="#007BB0">Morning</font><br>

          <input type="hidden" name="Afternoon_desired" value="no">
          <input type="checkbox" name="Afternoon_desired" value="yes"> <font size="4" color="#007BB0">Afternoon</font><br>

          <input type="hidden" name="Night_desired" value="no">
          <input type="checkbox" name="Night_desired" value="yes"> <font size="4" color="#007BB0">Night</font><br><br>

          <b><font color="#581845" size="5" face="Corbel">Confirmation requested by...</font></b><br><br>
          <input type="radio" name="Confirmation_requested_by" value="email" checked> <font size="5" color="#007BB0">Email</font><br>
          <input type="radio" name="Confirmation_requested_by" value="phone"> <font size="5" color="#007BB0">Phone Call</font><br><br>

          <input type="submit" value="Book Appointment">
        </center>
      </td></tr>
    </table>
  </form>
</body>
</html>
