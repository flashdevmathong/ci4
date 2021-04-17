<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">แก้ไขผู้ใช้งาน</h3>
	</div>
	     
	<div class="card-body">
	<?php
                if(isset($validation))
                {
                    echo '<div class="alert alert-danger">'.$validation->listErrors().'</div>';
                }
          ?>
		<form action="<?= base_url('/updateuser')?>" method="POST" enctype="multipart/form-data">
			<div class="row">

				<div class="col-md-6">
					<div class="form-group">
						<label>ชื่อจริง</label>
						<input class="form-control" name="name" value="<?= $edituser['name']?>">

					</div>

				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>นามสุกล</label>
						<input class="form-control" name="surname" value="<?= $edituser['name']?>">
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label>ชื่อผู้ใช้งาน</label>
						<input class="form-control" name="musername" value="<?= $edituser['musername']?>">
					
					</div>

				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>รหัสผ่าน</label>
						<input class="form-control" name="mpassword" value="<?= $edituser['mpassword']?>" >
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label>เบอร์โทร</label>
						<input class="form-control" name="tel" value="<?= $edituser['tel']?>">
					
					</div>

				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label>email</label>
						<input type="text" class="form-control" name="email" value="<?= $edituser['email']?>">
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
								if($edituser['dep'] === $value[0])
								{
									echo '<option value="'.$value[0].'"  selected>'.$value[1].'</option>';
								}
								else
								{
									echo '<option value="'.$value[0].'"  >'.$value[1].'</option>';
								}
				          
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
						      for ($i=1; $i <= 4 ; $i++) 
							  { 
								if($edituser['mlevel'] == $i)
								{
									echo '<option value="'.$i.'"  selected>ระดับ '.$i.'</option>';
								}
								else
								{
									echo '<option value="'.$i.'"  >ระดับ '.$i.'</option>';
								}
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
					<input type="hidden" value="<?=$edituser['mid']?>" name="mid">
						<input type="submit" value="แก้ไขข้อมูล" class="btn btn-primary">
					</div>
				</div>


			</div>
		</form>
	</div>
</div>
