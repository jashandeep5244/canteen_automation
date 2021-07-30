<div id='footer'>
	<ul>
		<li>
			<h2><span>Abo</span>ut us</h2>
	<?php
		include 'includes/conn.php';
        $query="select * from about";
        $res=mysqli_query($con,$query);
        while($row=mysqli_fetch_assoc($res))
         {
           echo"<p>".$row['about']."</p>";
       }
       ?>
		</li>
		<li>
			<h2><span>Cont</span>act Us</h2>
			<table>
				<?php
		include 'includes/conn.php';
        $query="select * from admin";
        $res=mysqli_query($con,$query);
        while($row=mysqli_fetch_assoc($res))
         {
           echo"
				<tr>
					<td><i class='fas fa-phone'></i></td>
					<td>".$row['admin_mobile']."</td>
				</tr>
				<tr>
					<td><i class='fas fa-envelope'></i></td>
					<td>".$row['admin_email']."</td>
				</tr>";
       }
       ?>
			</table>
			
		</li>
		<li>
			<h2><span>Leave Your</span> Message</h2>
			<form method="post" action="./query.php">
				<div id="f_input">
					<i class="fas fa-user"></i>
					<input type="text" name='query_name' placeholder="Enter Your Name">
				</div>
				<div id="f_input">
					<i class="fas fa-envelope"></i>
					<input type="text" name='query_email' placeholder="Enter Your Query">
				</div>
				
				<textarea name="msg" placeholder="Enter Your Message"></textarea>
				<button>Send</button>
			
			</form>
		</li><br clear="all">
	</ul>
</div>