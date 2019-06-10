<!-- template of enquiry form -->
<main class="home">
<fieldset>
  <legend align ="center">ENQUIRY FORM</legend>
  <p style="margin:20px 0 0 20px;">Please call us on 01604 90345 or leave your enquiries below.</p><hr/>
  
  <form action="enquiryForm" method="POST">
  
  <label>First Name</label>
  <input type="text" name="firstName" placeholder="Enter your firstname" required=""/> <!-- field for the first name of the messenger -->
  
  <label>Surname</label>
  <input type="text" name="familyName" placeholder ="Enter your surname" required=""/><!-- field for the last name of the messenger -->
  
  <label>Phone Number</label>
  <input type="text" name="contactNum" placeholder ="Enter your contact number"/><!-- field for the phone number of the messenger -->
  
  <label>Email</label>
  <input type="text" name="email" placeholder ="Enter your email address" required=""/><!-- field for the email address of the messenger -->
  
  <label>Your Enquiry</label>
  <textarea name="enquiryMsg" rows="7" cols="50"></textarea><!-- field for the enquiry message -->
  
  <input type="submit" name="enquirySubmit" value="SUBMIT"/><!-- field for the submit button -->
  
  </form>
</fieldset>
</main>

