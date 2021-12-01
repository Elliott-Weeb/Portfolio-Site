<?php
	
if(isset($_POST['user-submit'])){
  $name = htmlspecialchars(stripslashes(trim($_POST['user-name'])));
  $subject = "Boom Radio Contact";
  $email = htmlspecialchars(stripslashes(trim($_POST['user-email'])));
  $message = htmlspecialchars(stripslashes(trim($_POST['user-message'])));
  if(!preg_match("/^[A-Za-z .'-]+$/", $name)){
    $name_error = 'Invalid name';
  }
  if(!preg_match("/^[A-Za-z .'-]+$/", $subject)){
    $subject_error = 'Invalid subject';
  }
  if(!preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/", $email)){
    $email_error = 'Invalid email';
  }
  if(strlen($message) === 0){
    $message_error = 'Your message should not be empty';
  }
  
 
}
?>
<section class="contact-us-section">
  

      <h3 class="contact-us-header">Contact Me</h3>
	  <br>
	  <ul>
				<li> <span> Phone Number: </span> 0411512661 </li>
				<li> <span> Email: </span> eliowebb@hotmail.com
				<li> <span> City: </span> Perth, Western Australia </li>
				<li> <span> My Resume: </span> <a href="./assets/pdf/resume.pdf">Download here </a></li>
	  </ul>
	  <br>
				
      <form class="contact-us-form" action="" method='POST'>
		
        <input type="text" placeholder="Name" name='user-name'>
		<p><?php if(isset($name_error)) echo $name_error; ?></p>
		
        <input type="email" placeholder="Email" name='user-email'>
		<p><?php if(isset($email_error)) echo $email_error; ?></p>
		
		
        <textarea rows="12" placeholder="Type your message here" name='user-message'></textarea>
		<p><?php if(isset($message_error)) echo $message_error; ?></p>
		
        
          <input type="submit" class="button" value="Send Message!" name='user-submit'/>
      
		
	   </form>
	   <?php 
        if(isset($_POST['user-submit']) && !isset($name_error) && !isset($subject_error) && !isset($email_error) && !isset($message_error)){
		  //CHANGE TO RELEVANT EMAIL
          $to = 'eliowebb@hotmail.com'; 
          $body = " Name: $name\n E-mail: $email\n Message:\n $message";
          if(mail($to, $subject, $body)){
            echo '<p style="color: #56E87F;">Message sent</p>';
          } else{
            echo '<p>Error occurred, please try again later</p>';
          }
        }
      ?>
		
   
</section>
