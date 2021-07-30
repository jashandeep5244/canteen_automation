<div id='bodyleft'>
<h3>Canteen Management</h3>
    <ul>
        <li>
            <a href="add_handler.php"><i class="fa fa-plus" aria-hidden="true"></i>   Add Canteen</a>
        </li>
         <li>
            <a href="admin_dashboard.php?edit_handler"><i class="fa fa-edit" aria-hidden="true"></i>   Edit Canteen</a>
        </li>
    </ul>
    <h3>User Management</h3>
    <ul>
        <li>
            <a href="add_user.php"><i class="fa fa-plus" aria-hidden="true"></i>   Add User</a>
        </li>
         <li>
            <a href="admin_dashboard.php?edit_user"><i class="fa fa-edit" aria-hidden="true"></i>   Edit User</a>
        </li>
    </ul> 
    <h3>Menu</h3>
    <ul>
         <li>
            <a href="admin_dashboard.php?view_menu"><i class="fa fa-book" aria-hidden="true"></i>  Canteen Menu </a>
        </li>
    </ul>
</div>
<?php
if(isset($_GET['add_handler']))
{
   include("add_handler.php");
}
if(isset($_GET['add_user']))
{
   include("add_user.php");

}
if(isset($_GET['edit_handler']))
{
   include("edit_handler.php");

}

if(isset($_GET['edit_user']))
{
   include("edit_user.php");

}
if(isset($_GET['view_menu']))
{
   include("view_menu.php");

}

?>