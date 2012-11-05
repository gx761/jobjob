      <div class="hero-unit">
        <h1>Welcome</h1>
        <p>This is the host page of JOBJOB. All front-end system is developed based on twitter bootstrap. The back-end system is implemented using concept of MVC framework. The main purpose of this site is to record all Roy's job applications and relevant status</p>
        <p><a class="btn btn-primary btn-large">Learn more &raquo;</a></p>
      </div>
      
      <div class="row">
         <div class="span12">
          <h2>Recent applies jobs</h2>
          <table class="table table-hover" id="indextable">
          <tr class="th">
          <th>Title</th>
          <th>Company</th>
          <th>Type</th>
          <th>Description</th>
          <th>Rating</th>
          <th>Applied date</th>
          <th>Status</th>
          <th>link</th>
          <th>manipulate</th>
          </tr>
          <?php 
          foreach($this->_viewValues as $key=>$value)
          {
          	echo '<tr class="added" rel="'.$key.'">';
        	echo '<td>'.$value['job_title'].'</td>';
          	echo '<td>'.$value['company'].'</td>';
          	echo '<td>'.$value['job_type'].'</td>' ;
          	echo '<td>'.$value['description'].'</td>' ;
          	echo '<td>'.$value['interest_rating'].'</td>';
          	echo '<td>'.$value['applying_date'].'</td>';
          	echo '<td>'.$value['status'].'</td>';
          	echo '<td>'.'<a href="'.$value['link'].'">click here </a></td>';
          	
          ?>
          <td>
			<div class="dropdown">
 		 	<a class="dropdown-toggle" data-toggle="dropdown" href="#">Action</a>
 			 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
    			<li><a href="" class="edit" rel="<?php echo $value['jid']?>">Edit</a></li>
    			<li><a href="" class="delete" rel="<?php echo $value['jid']?>">Delete</a></li>
 			 </ul>
			</div>
          </td>
          <?php echo '</tr>'; }?>
        
        
          </table>
          <div class="pagination">
  			<ul>
  			<li><a class="pageButton" id="prev" rel="1" href="">Prev</a></li>
  			<?php 
  			
  			for ($i=0;$i<$this->numberOfPages;$i++)
  			{
  				echo '<li><a class="pageButton" id="pageNumber" href="" rel="'.($i+1).'">'.($i+1).'</a></li>';
  			}
	
  			?>

   				   <li><a class="pageButton" id="next" rel="2" href="">Next</a></li>
 			 </ul>
			</div>
     <p><a class="btn" href="#">View details &raquo;</a></p>
     </div>
      
      
      
      </div>
      
      
      
      <div class="row">
        <div class="span6">
          <h2>Add new jobs here</h2>
		<form class="form-horizontal">
  		     <div class="control-group">
 		     <label class="control-label" for="=job_title">Job Title</label>
  			  <div class="controls">
   			   <input type="text" name="job_title" id="job_title" placeholder="Job Title">
  			  </div>
 			 </div>
 			 
  			<div class="control-group">
   			 <label class="control-label" for="company">Company</label>
  			  <div class="controls">
   		   <input type="text" name="company" id="company" placeholder="company">
  			  </div>
  			</div>
  			
  			 <div class="control-group">
   			 <label class="control-label" for="interest_rating">Interest</label>
   			 <div class="controls">
  			<select name="interest_rating" id="interest_rating">
  				<option value="interested" selected="selected">interested</option>
  				<option value="normal">normal</option>
  				<option value="just for fun">just for fun</option>
			</select>
  			</div>
  			</div>
  			
  			<div class="control-group">
   			 <label class="control-label" for="description">Description</label>
  			  <div class="controls">
   		   		<textarea name="description" id="description" rows="3"></textarea>
  			  </div>
  			</div>
  			
  			<div class="control-group">
   			  
   			  <label class="control-label" for="link">Link</label>
   		   <div class="controls">
   		   <input type="text" name="link" id="link" placeholder="Link">
  			  </div>
  			</div>
  			
 
			  <div class="control-group">
 			   <div class="controls">
  			 <label class="checkbox">
   		     <input type="checkbox" name="job_type" id="job_type" value="part" >Part Time
  		    </label>
 		   </div>
 		 </div>
 		 
 		 <div class="form-actions">
  			<button id="addJob" type="submit" class="btn btn-primary">Add</button>
  			<button type="button" class="btn">Clear</button>
		</div>
		</form>

        </div>
        <div class="span6">
         <h2>Leave a message</h2>
       </div>

      </div>

      <hr>