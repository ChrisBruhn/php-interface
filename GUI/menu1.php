<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 13-04-2017
 * Time: 21:36
 */
require ("page.php");

Class ContactPage extends Page
{


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
}
$services = new ContactPage();
$services ->content = "<p>call us!.</p>";
$services->Display();