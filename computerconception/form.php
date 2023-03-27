<?php
$username = $_POST["UserLoginName"];
$password= $_POST["UserPassword"];
$email = $_POST["UserEmail"];
$cemail = $_POST["UserEmailConfirm"];
$fname = $_POST["UserFirstname"];
$lname = $_POST["UserLastName"];
$address1 = $_POST["UserAddressLineOne"];
$address2 = $_POST["UserAddressLineTwo"];
$city = $_POST["UserCity"];
$state = $_POST["UserState"];
$zip = $_POST["UserZipCode"];
$phone1 = $_POST["UserPhone1"];
$phone2 = $_POST["UserPhone2"];
$phone3 = $_POST["UserPhone3"];

if (!isset($_POST['Submit'])) { // if page is not submitted to itself echo the form
?>
<html>
<head>
<title>Personal INFO</title>
</head>
<body>
<form method="post" action="<?php echo $PHP_SELF;?>">
<table border="1" cellpadding="6" cellspacing="2">
    
    <tr>
        <td colspan="2"><b>- Account Information -</b></td>
    </tr>

    <tr><td>&nbsp;</td></tr>

    <tr>
        <td align="right">Login Name:</td>
        <td><input type="text" name="UserLoginName" value="" size="23" maxlength="64"></td>
    </tr>
    <tr>
	<td align="right">Desired Password:</td>
        <td><input type="password" name="UserPassword" value="" size="23" maxlength="64"></td>
    </tr>	
    <tr>

        <td align="right">E-Mail Address:</td>
        <td><input type="text" name="UserEMail" size="30" maxlength="60"></td>

    </tr>
    <tr>
        <td align="right">Confirm E-Mail Address:</td>
        <td><input type="text" name="UserEMailConfirm" size="30" maxlength="60"></td>
    </tr>

    <tr>
        <td>&nbsp;</td>
    </tr>
    
    <tr>
        <td><b>- User Information -</b></td>
    </tr>
    <tr><td>&nbsp;</td></tr>
    <tr>

        <td align="right">First Name:</td>

        <td><input type="text" name="UserFirstName" size=23 maxlength=40 value=""></td>
    </tr>
     <tr>
        <td align="right">Last Name:</td>

        <td><input type="text" name="UserLastName" size=23 maxlength=40 value=""></td>
    </tr>

    <tr>
        <td align="right">Address:</td>

        <td><input type="text" name="UserAddressLineOne" size=23 maxlength=40 value=""></td>
    </tr>
    <tr>
        <td align="right">Address 2:</td>
        <td><input type="text" name="UserAddressLineTwo" size=23 maxlength=40 value=""></td>

    </tr>
    <tr>
        <td align="right">City:</td>

        <td><input type="text" name="UserCity" size=23 maxlength=40 value=""></td>
    </tr>
    <tr>
        <td align="right">State:</td>

        <td>
            <select name="UserState" size="1">
                <option value="">--
                <option value="AL">Alabama
                <option value="AK">Alaska
                <option value="AZ">Arizona
                <option value="AR">Arkansas
                <option value="CA">California
                <option value="CO">Colorado
                <option value="CT">Connecticut
                <option value="DE">Delaware
                <option value="DC">District of Columbia
                <option value="FL">Florida
                <option value="GA">Georgia
                <option value="HI">Hawaii
                <option value="ID">Idaho
                <option value="IL">Illinois
                <option value="IN">Indiana
                <option value="IA">Iowa
                <option value="KS">Kansas
                <option value="KY">Kentucky
                <option value="LA">Louisiana
                <option value="ME">Maine
                <option value="MD">Maryland
                <option value="MA">Massachusetts
                <option value="MI">Michigan
                <option value="MN">Minnesota
                <option value="MS">Mississippi
                <option value="MO">Missouri
                <option value="MT">Montana
                <option value="NE">Nebraska
                <option value="NV">Nevada
                <option value="NH">New Hampshire
                <option value="NJ">New Jersey
                <option value="NM">New Mexico
                <option value="NY">New York
                <option value="NC">North Carolina
                <option value="ND">North Dakota
                <option value="OH">Ohio
                <option value="OK">Oklahoma
                <option value="OR">Oregon
                <option value="PA">Pennsylvania
                <option value="RI">Rhode Island
                <option value="SC">South Carolina
                <option value="SD">South Dakota
                <option value="TN">Tennessee
                <option value="TX">Texas
                <option value="UT">Utah
                <option value="VT">Vermont
                <option value="VA">Virginia
                <option value="WA">Washington
                <option value="WV">West Virginia
                <option value="WI">Wisconsin
                <option value="WY">Wyoming
            </select>

           
        </td>
    </tr>
    <tr>
        <td align="right">Zip Code:</td>
        <td><input type="text" name="UserZipCode" value="" size="10" maxlength="10"></td>

    </tr>
    <tr>

	<td align="right">Telephone:</td>
	<td>
        (<input name="UserPhone1" size="3" maxlength="3" type="text">)&nbsp;
	<input name="UserPhone2" size="3" maxlength="3" type="text">&nbsp;-&nbsp;
	<input name="UserPhone3" size="4" maxlength="4" type="text">
        </td>
    </tr>

    <tr><td>&nbsp;</td></tr>
    <tr>
	<td>&nbsp;</td>
        <td>
        <input type="submit" name="Submit" value="Sign Up" >
        </td>
    </tr>

    
    
</table>

</form>
<?
} else {
echo "Username ".$username.".<br />";
echo "Password ".$password.".<br />";
echo "Email ".$email.".<br />";
echo "Name ".$fname." ".$lname.".<br />";
echo "Address ".$address1.".<br />";
echo "City ".$city.".<br />";
echo "State ".$state.".<br />";
echo "Zip ".$zip.".<br />";
echo "Phone ".$phone1."-".$phone2."-".phone3.".<br />";
}
?>
