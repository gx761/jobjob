<div class="row">
	<div class="span6">
		<h2>Edit</h2>
		<form class="form-horizontal" id="editForm"
			action="../../index/jobEditSave/<?php echo $this->_viewValues[0]['jid'] ?>"
			method="post">
			<div class="control-group">
				<label class="control-label" for="job_title">Job Title</label>
				<div class="controls">
					<input type="text" name="job_title" id="job_title"
						value="<?php echo $this->_viewValues[0]['job_title']?>">
				</div>
			</div>

			<div class="control-group">
			<label class="control-label" for="radioButtons">Status</label>
			<div class="controls">
				
				<fieldset name="radioButtons">
				<label class="radio">Expired 
				<input type="radio" name="status" id="expired" value="expired" <?php if($this->_viewValues[0]['status']=="expired") echo "checked"?>> </label> 
				<label class="radio">waiting
				<input type="radio" name="status" id="waiting" value="waiting" <?php if($this->_viewValues[0]['status']=="waiting") echo "checked"?>></label>
				<label class="radio">unsuccessful
				<input type="radio" name="status" id="unsuccessful" value="unsuccessful" <?php if($this->_viewValues[0]['status']=="unsuccessful") echo "checked"?>></label>
				</fieldset>
				
			</div>	
			</div>




			<div class="control-group">
				<label class="control-label" for="company">Company</label>
				<div class="controls">
					<input type="text" name="company" id="company"
						value="<?php echo $this->_viewValues[0]['company']?>">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="interest_rating">Interest</label>
				<div class="controls">
					<select name="interest_rating" id="interest_rating">
						<option value="interested"
							<?php echo $this->_viewValues[0]['interest_rating']=="interested"? ("selected") : ''?>>interested</option>
						<option value="normal"
							<?php echo $this->_viewValues[0]['interest_rating']=="normal"? ("selected") : ''?>>normal</option>
						<option value="just for fun"
							<?php echo $this->_viewValues[0]['interest_rating']=="just for fun"? ("selected") : ''?>>just
							for fun</option>
					</select>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="description">Description</label>
				<div class="controls">
					<textarea name="description" id="description" rows="3"><?php echo $this->_viewValues[0]['description']?></textarea>
				</div>
			</div>

			<div class="control-group">

				<label class="control-label" for="link">Link</label>
				<div class="controls">
					<input type="text" name="link" id="link"
						value="<?php echo $this->_viewValues[0]['link']?>">
				</div>
			</div>


			<div class="control-group">
				<div class="controls">
					<label class="checkbox"> <input type="checkbox" name="job_type"
						id="job_type" value="part">Part Time
					</label>
				</div>
			</div>

			<div class="form-actions">
				<button id="jobEditSave" type="submit" name="submit"
					value="buttonOne" class="btn btn-primary">Save</button>
				<button id="jobEditSaveCancel" type="submit" name="submit"
					value="buttonTwo" class="btn">Cancel</button>
			</div>
		</form>
	</div>
</div>