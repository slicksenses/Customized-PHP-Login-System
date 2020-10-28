<?php
include('layout/header.php');

?>
<form action="action/register.php" method="POST">
    <h4 class="mdl-typography--text-center">Register</h4>
   <div class="group">
       <input id="username" type="text" name="username" class="form-control"  >
       <span class="highlight"></span><span class="bar"></span>
       <label>Username</label>
   </div>
 <div class="group">
     <input id="password" type="password" name="password" class="form-control"  >
     <span class="highlight"></span><span class="bar"></span>
     <label>Password</label>
 </div>
    <button class="mdl-button mdl-button--raised" type="submit">Submit</button>
    <button class="mdl-button mdl-button--raised" type="reset">Reset</button>
</form>
<?php
include('layout/footer.php')
?>