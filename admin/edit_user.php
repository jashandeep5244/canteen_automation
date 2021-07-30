<div id='bodyright'>
 <?php if(isset($_GET['edit'])) {
     echo edit();
} else{
    ?>
   <h3>View All Users</h3>
   <div id='add'>
     
    <table cellspacing="0">
        <tr>
            <th>Sr No.</th>
            <th>User Name</th>
            <th>Actions</th>
            
        </tr>
        <?php echo view_user(); ?>
    </table>
   </div>
   <?php } ?>
</div>
