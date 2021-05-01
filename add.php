<?php

//if(isset($_GET['submit'])){

  //echo $_GET['email']; //$_GET it is a globale  array isset is checking if the submit button has been clicked and then we echo the value submitted in the URL to the server in the add.php page
  //echo '<br/>';            //if there are not data set the code that will be in the browser is the html form without any data
  //echo $_GET['title'];
  //echo '<br/>';
//  echo $_GET['Ingredients'];
//}
$email=$title=$ingredients='';

$errors=['email'=>'','title'=>'','ingredients'=>''];


    if (isset($_POST['submit'])) {
        //echo htmlspecialchars($_POST['email']); //$_POST it is a globale  array isset is checking if the submit button has been clicked and then we echo the value submitted in the URL to the server in the add.php page
        //echo '<br/>';            //if there are not data set the code that will be in the browser is the html form without any data
        //echo htmlspecialchars($_POST['title']); // The POST METHOD IS THE safety way to send date to the server hidding them on the body of the method
        //echo '<br/>';
        //echo htmlspecialchars($_POST['Ingredients']); // each script will be converted into the browser as an HTML document, so in this way we can protect ourself from XSS Attacks

        //check email

        if (empty($_POST['email'])) {
            $errors['email']='An email is required';
        } else {
            $email=htmlspecialchars($_POST['email']);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email']='email not valid';
            }
        }
    }

    //check title
    if (empty($_POST['title'])) {
        $errors['title']='A title is required';
    } else {
        $title=htmlspecialchars($_POST['title']);

        if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
            $errors['title']='title must be letters and spaces only';
        }
    }
 
    //check ingredients

    if (empty($_POST['ingredients'])) {
         $errors['ingredients']='A ingredients is required';
    } else {
        $ingredients=htmlspecialchars($_POST['ingredients']);
        if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]]*)*$/', $ingredients)) {
            $errors['ingredients']= 'ingredients must be a comma separated list';
        }
    }
// end of the POST  validation 
?>


<!DOCTYPE html>
<html lang="en">



    <?php include('templates/header.php')?>


    <section >

    <h4>Add a Pizza</h4>
    <form action="add.php" method="POST">

    <div class="row mb-3">
  <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Email</label>
  <div class="col-sm-10">
  <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="email" name="email" value="<?php echo $email?>" >

   <div class="errors"><?php echo $errors['email']?></div>
  </div>
    </div>
    <div class="row mb-3">
  <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Pizza Title</label>
  <div class="col-sm-10">
    <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Pizza Title" name="title" value="<?php echo $title?>">
    <div class="errors"><?php echo $errors['title']?></div>
  </div>
  </div>
    <div class="row mb-3">
  <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Ingredients (comma separeted) </label>
  <div class="col-sm-10">
    <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Ingredients" name="ingredients" value="<?php echo $ingredients?>">
    <div class="errors"><?php echo $errors['ingredients']?></div>  
  </div>
  </div>
  
  <div>
  <button  type="submit" name="submit" value="submit" style="margin-top: 20px;">Submit</button>
  </div>  
    
    </section>



    <?php include('templates/footer.php')?>

</html>