<!DOCTYPE html>
<html lang="en">

<head>
	<title>SNP POST TENSION</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="dist/images/logo_snp.ico" />
	<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="dist/css/util.css">
	<link rel="stylesheet" type="text/css" href="dist/css/main.css">

</head>
<body style="background-color: #666666;">

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
    


       <form action="/login/auth" method="post" class="login100-form validate-form">
					<span class="login100-form-title p-b-43">
						Login to continue
					</span>
	
					<div class="col-md-12">
          <div class="form-group">
             <?php if(session()->getFlashdata('msg')): ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('msg'); ?></div>
                <?php endif; ?>
                </div>
						<div class="form-group">
							<label>UserName</label>
							<input type="text" name="musername" class="form-control" required>
			
						</div>

						<div class="form-group">
							<label>Password</label>
							<input type="password" name="mpassword" class="form-control" required>
					
						</div>

						<button type="submit" class="btn btn-primary">เข้าระบบ</button>
					</div>
				</form>
				<div class="login100-more" style="background-image: url('dist/images/backgroup_snp.jpg');">
				</div>
			</div>
		</div>
	</div>

</body>
</html>
