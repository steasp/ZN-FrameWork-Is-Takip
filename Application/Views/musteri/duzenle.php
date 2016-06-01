		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Müşteri Düzenle</h1>
			</div>
		</div><!--/.row-->
			
		<div class="panel panel-default">
			<div class="panel-heading">
				<svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg>
				Müşteri Bilgileri
			</div>
			<div class="panel-body">
				<? if(isset($hatalar) && $hatalar!=null){ ?>
				<div class="alert alert-danger"><?=$hatalar?></div>
				<?
					}
				?>
				<?
				echo Form::open("Kayit",array("method"=>"post","class"=>"form-horizontal")); ?>
					<fieldset>
						
						<div class="form-group">
							<label for="ad" class="col-md-3 control-label">Adı</label>
							<div class="col-md-9">
								<?=Form::text("ad",$musteri->ad,array("maxlength"=>50,"id"=>"ad","required"=>"required","class"=>"form-control"));?>
							</div>
						</div>
					
						
						<div class="form-group">
							<label for="yetkili" class="col-md-3 control-label">Yetkili</label>
							<div class="col-md-9">
								<?=Form::text("yetkili",$musteri->yetkili,array("maxlength"=>50,"id"=>"yetkili","required"=>"required","class"=>"form-control"));?>
							</div>
						</div>
						
						
						<div class="form-group">
							<label for="gsm" class="col-md-3 control-label">GSM</label>
							<div class="col-md-9">
								<?=Form::tel("gsm",$musteri->gsm,array("id"=>"gsm","required"=>"required","class"=>"form-control"));?>
							</div>
						</div>
						
						<div class="form-group">
							<label for="email" class="col-md-3 control-label">Email</label>
							<div class="col-md-9">
								<?=Form::email("email",$musteri->email,array("id"=>"email","required"=>"required","class"=>"form-control"));?>
							</div>
						</div>
						
						
						<div class="form-group">
							<label for="telefon" class="col-md-3 control-label">Telefon</label>
							<div class="col-md-9">
								<?=Form::tel("telefon",$musteri->telefon,array("id"=>"telefon","class"=>"form-control","required"=>"required"));?>
							</div>
						</div>
						
						<div class="form-group">
							<label for="websitesi" class="col-md-3 control-label">Websitesi</label>
							<div class="col-md-9">
								<?=Form::url("websitesi",$musteri->websitesi,array("id"=>"websitesi","required"=>"required","class"=>"form-control"));?>
							</div>
						</div>
						
						
						<!-- Message body -->
						<div class="form-group">
							<label for="adres" class="col-md-3 control-label">Adres</label>
							<div class="col-md-9">
								<?=Form::textArea("adres",$musteri->adres,array("placeholder"=>"Müşterinin adres bilgileri","class"=>"form-control"))?>
							</div>
						</div>
						
						<!-- Form actions -->
						<div class="form-group">
							<div class="col-md-12 widget-right">
								<?=Form::submit("kaydet","Kaydet",array("class"=>"btn btn-success fr"));?>
							</div>
						</div>
					</fieldset>
				<?=Form::close();?>
			</div>
		</div>
