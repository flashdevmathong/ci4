<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">เพิ่มผู้ใช้งาน</h3>
	</div>
	     
	<div class="card-body">
	<?php
                if(isset($validation))
                {
                    echo '<div class="alert alert-danger">'.$validation->listErrors().'</div>';
                }
          ?>
		<form action="<?= base_url('/storeuser')?>" method="POST" enctype="multipart/form-data">
			<div class="row">

				<div class="col-md-6">
					<div class="form-group">
						<label>ชื่อจริง</label>
						<input class="form-control" name="name" value="<?= set_value('name')?>">

					</div>

				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>นามสุกล</label>
						<input class="form-control" name="surname" value="<?= set_value('surname')?>">
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label>ชื่อผู้ใช้งาน</label>
						<input class="form-control" name="musername" value="<?= set_value('musername')?>">
					
					</div>

				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>รหัสผ่าน</label>
						<input class="form-control" name="mpassword" value="<?= set_value('mpassword')?>" >
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label>เบอร์โทร</label>
						<input class="form-control" name="tel" value="<?= set_value('tel')?>">
					
					</div>

				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label>email</label>
						<input type="text" class="form-control" name="email" value="<?= set_value('email')?>">
					</div>
				</div>
           

				<div class="col-md-6">
					<div class="form-group">
						<label>แผนก</label>
						<select class="form-control" name="dep"  >
							<option selected="selected">กรุณาเลือก</option>
							<?php
						foreach ($listdep as $key => $value)
							{
				          	?>
							<option value="<?=$value[0]?>"  ><?=$value[1]?></option>
							<?php
							}
				       	?>
						</select>
					
					</div>
				</div>


				<div class="col-md-6">
					<div class="form-group">
						<label>ระดับ</label>
						<select class="form-control" name="mlevel" >
							<option selected="selected">กรุณาเลือก</option>
							<?php
						      for ($i=1; $i <= 4 ; $i++) { 
				       		?>
							<option value="<?=$i?>" >ระดับ <?= $i?></option>
						<?php	
						  }
				     	?>

						</select>
					
					</div>
				</div>





			
             

				<div class="col-md-12">
					<div class="form-group">
						<input type="file" name="picture">
					</div>
				</div>

				<div class="col-md-12">
					<div class="form-group">
						<input type="submit" value="บันทึกข้อมูล" class="btn btn-primary">
					</div>
				</div>


			</div>
		</form>
	</div>
</div>
