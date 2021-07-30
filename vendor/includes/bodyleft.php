<?php

 require_once "includes/function.php";
 ?>

 <div id='bodyleft'>
<h3>Menu Management</h3>
    <ul>
        <li>
            <a href="vendor_dashboard.php?add_items"><i class="fa fa-plus" aria-hidden="true"></i> Menu Item</a>
        </li>
         
    </ul>
    <h3>Order Management</h3>
    <ul>
        <li>
            <a href="vendor_dashboard.php?orders"><i class="fa fa-eye" aria-hidden="true"></i> View Orders</a>
        </li>
         
    </ul> 
    <h3>Payment Management </h3>
    <ul>
        
    </ul> 
</div>
<?php

if(isset($_GET['add_items']))
{
    include("add_items.php");
}
if(isset($_GET['orders']))
{
   include("orders.php");
}
?>
