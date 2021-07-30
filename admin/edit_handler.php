
<div id='bodyright'>
 <?php if(isset($_GET['handler_edit'])) {
     echo handler_edit();
} else{
    ?>
   <h3>View All Canteens</h3>
   <div id='add'>
     
    <table cellspacing="0">
        <tr>
            <th>Sr No.</th>
            <th>Canteen Name</th>
            <th>Actions</th>
            
        </tr>
        <?php echo view_handler(); ?>
    </table>
   </div>
   <?php } ?>
</div> 
