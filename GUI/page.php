<?php

/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 13-04-2017
 * Time: 17:11
 */
class page
{
    public $content;
    public $title = "We say so";
    public $keywords = "WSS Consulting, Three Letter Abbreviation, some of my bedst freinds are search engines";
    public $buttons = array("home" => "home.php",
        "menu1" => "menu1.php",
        "menu2" => "sign-up.php",
        "menu3" => "menu3.php",
        "menu4" => "menu4.php");

    // class operation
    public function __set($name, $value){
        $this->$name = $value;
    }
    public function Display(){
        echo "<html>\n<head>\n";
        $this->DisplayTitle();
        $this->DisplayKeywords();
        $this->DisplayStyles();
        echo "</head>\n<body>\n";
        $this->DisplayHeader();
        $this->DisplayMenu($this->buttons);
        echo"$this->content";
        $this->DisplayFooter();
        echo"</body>\n</html>\n";
    }
    public function DisplayTitle(){
        echo "<title>".$this->title."</title>";
    }
    public function DisplayKeywords(){
        echo "<meta name='keywords' content='".$this->keywords."'/>";
    }

    public function DisplayStyles(){
        ?>
        <link href="styles.css" type="text/css" rel="stylesheet">
        <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
        <?php
    }
    public function DisplayHeader(){
        ?>
        <!--- page header -->
        <header>
            <img src="logo.png" alt="TLA logo" height="70" width="270"/>
            <h1>WESAYSO</h1>
        </header>
        <?php
    }
    public function DisplayMenu($buttons){
        echo "<!-- menu --><nav><ul>";
        while (list($name,$url)= each($buttons)){
            $this->DisplayButton($name,$url,!$this->IsURLCurrentPage($url));
        }
        echo "</ul></nav>\n";
    }
    public function IsURLCurrentPage($url){
        if(strpos ($_SERVER['PHP_SELF'],$url)==false){
            return false;
        }
        else{
            return true;
        }
    }
    public function DisplayButton($name, $url, $active=true){
        if($active) {
            ?>
            <li>
                <a href="<?= $url ?>">
                    <!-- <img src="jenware_logo.png" alt="" height="20" width="20"/> -->
                    <span class="menutext"><?=$name?></span>
                </a>
            </li>
            <?php
        }
        else{
            ?>
            <li>
                <!-- <img src="side-logo.gif"> -->
                <span class="menutext"><?=$name?></span>
            </li>
            <?php
        }
    }
    public function DisplayFooter(){
        ?>
        <!-- page footer -->
        <footer>

            <hr/><br>
            <p>&copy; TLA Consulting Pty Ltd.<br/>
            please see our
                <a href="legal.php">legal information</a>.</p>
        </footer>
        <?php
    }
}