<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 13-04-2017
 * Time: 21:32
 */
require ("page.php");
$homepage = new page;

$homepage->content ="<!-- page content -->
<section>
<h2>Welcome to the home of TLA Consulting.</h2> 
<p>Please take some time to get to know us. </p>
<p>We specialize in serving you business needs and hope to hear from you soon.</p>
</section>";

$homepage->Display();
?>