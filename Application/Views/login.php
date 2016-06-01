	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Giriş Yap</div>
				<div class="panel-body">
					<form action="/login" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Kullanıcı Adı" name="username" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Şifre" name="password" type="password" value="">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="1">Beni Hatırla
								</label>
							</div>
							<input type="submit" class="btn btn-primary" value="Giriş Yap" />
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
		<div class="col-md-6 col-md-offset-3">

			<?php
			if(isset($uyari)){
				echo $uyari;
				redirectDeleteData('uyari');
			}
			?>

		</div>
	</div><!-- /.row -->	
	
	