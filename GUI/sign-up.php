<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 13-04-2017
 * Time: 21:36
 */
require("page.php");
// include_once("newsletteruser.php");

Class SignupPage extends Page
{
    public $firstname;
    public $lastname;
    public $email;

    public function Display()
    {
        echo "<html>\n<head>\n";
        $this->DisplayTitle();
        $this->DisplayKeywords();
        $this->DisplayKeywords();
        $this->DisplayStyles();
        echo "</head>\n<bopy>";
        $this->DisplayHeader();
        $this->DisplayMenu($this->buttons);
        echo $this->content;
        $this->DisplayFooter();
        echo "</bopy>\n</html>\n";
    }

    public function GetDataFromForm(){
        $this->firstname = htmlspecialchars($_POST['firstname']);
        $this->lastname = htmlspecialchars($_POST['lastname']);
        $this->email = htmlspecialchars($_POST['email']);
        $user = new newsletteruser($this->firstname,$this->lastname,$this->email);

        if ($user->saveToDatabase())
            $this->content="<p>You where added to the database!</p>";
        else
            $this->content="<p>Something went wrong when writing to the database!</p>";




    }
}


// create the page
$Signup = new SignupPage();
$Signup ->content = "<form action='sign-up.php' method='post'>
  First name:<br>
  <input type=\"text\" name=\"firstname\" value=\"Mickey\">
  <br>
  Last name:<br>
  <input type=\"text\" name=\"lastname\" value=\"Mouse\">
  <br>
  email:<br>
  <input type=\"text\" name=\"email\" value=\"Mickey@Mouse.com\">
  <br><br>
  <input type=\"submit\" value=\"Submit\">
</form> 

<p>If you click the \"Submit\" button, the form-data will be sent to a page called \"/action_page.php\".</p>

    </form> ";



if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
    $Signup->GetDataFromForm();
    //$Signup ->content = "<br>Thanks, you are now signedup for our newsletter!<br>You are registred under ".$Signup->firstname." ".$Signup->lastname." and with the email: ".$Signup->email;
    $Signup->Display();

    }
else
    {
        $Signup->Display();
    }





