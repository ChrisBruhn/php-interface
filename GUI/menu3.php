<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 13-04-2017
 * Time: 21:36
 */
require ("page.php");

Class ServicesPage extends Page
{
    private $row2buttons = array(
        "submenu1" => "submenu1.php",
        "submenu2" => "submenu2.php",
        "submenu3" => "submenu3.php"
    );
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
         $this->DisplayMenu($this->row2buttons);
     echo $this->content;
         $this->DisplayFooter();
     echo "</bopy>\n</html>\n";
    }
}
$services = new ServicesPage();
$services ->content = "<p>At TLA Consulting, we offer a number of services. Perhaps the productivity of you employees would improve if we re-engineerd you business. Maby all you business needs is a fresh mission statement, or a new batch of buzzwords.</p>";
$services->Display();