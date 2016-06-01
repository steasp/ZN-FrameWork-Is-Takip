<?
/*
 *bu sayfayı hem musteri/ekle hemde musteri/kayit fonksiyonlarında kullanacaz.
 *normal şartlarda bunlar için ayrı view ler yazarım ancak kullanım şeklini gösterebilmek için bunu kullanacaz
 */
if(CURRENT_CFUNCTION=="ekle"){
?>
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Müşteri Ekle</h1>
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
				<? echo Form::open("Kayit",array("method"=>"post","action"=>"/musteriler/ekle","class"=>"form-horizontal")); ?>
					<fieldset>
						
						<div class="form-group">
							<label for="ad" class="col-md-3 control-label">Adı</label>
							<div class="col-md-9">
								<?=Form::text("ad",Validation::postBack("ad"),array("maxlength"=>50,"id"=>"ad","required"=>"required","class"=>"form-control",Validation::postBack('ad')));?>
							</div>
						</div>
					
						
						<div class="form-group">
							<label for="yetkili" class="col-md-3 control-label">Yetkili</label>
							<div class="col-md-9">
								<?=Form::text("yetkili",Validation::postBack("yetkili"),array("maxlength"=>50,"id"=>"yetkili","required"=>"required","class"=>"form-control",Validation::postBack('yetkili')));?>
							</div>
						</div>
						
						
						<div class="form-group">
							<label for="gsm" class="col-md-3 control-label">GSM</label>
							<div class="col-md-9">
								<?=Form::tel("gsm",Validation::postBack("gsm"),array("id"=>"gsm","required"=>"required","class"=>"form-control",Validation::postBack('gsm')));?>
							</div>
						</div>
						
						<div class="form-group">
							<label for="email" class="col-md-3 control-label">Email</label>
							<div class="col-md-9">
								<?=Form::email("email",Validation::postBack("email"),array("id"=>"email","required"=>"required","class"=>"form-control",Validation::postBack('email')));?>
							</div>
						</div>
						
						
						<div class="form-group">
							<label for="telefon" class="col-md-3 control-label">Telefon</label>
							<div class="col-md-9">
								<?=Form::tel("telefon",Validation::postBack('telefon'),array("id"=>"telefon","class"=>"form-control","required"=>"required"));?>
							</div>
						</div>
						
						<div class="form-group">
							<label for="websitesi" class="col-md-3 control-label">Websitesi</label>
							<div class="col-md-9">
								<?=Form::url("websitesi",Validation::postBack('websitesi'),array("id"=>"websitesi","required"=>"required","class"=>"form-control"));?>
							</div>
						</div>
						
						
						<!-- Message body -->
						<div class="form-group">
							<label for="adres" class="col-md-3 control-label">Adres</label>
							<div class="col-md-9">
								<?=Form::textArea("adres",Validation::postBack('adres'),array("placeholder"=>"Müşterinin adres bilgileri","class"=>"form-control",Validation::postBack('adres')))?>
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
<?
}
if(CURRENT_CFUNCTION=="kayit"){
?>
	<div class="col-lg-12">
		<div class="alert alert-success mt30">
			<?=redirectData("veri")["ad"]?> müşterisi eklendi
		</div>
		<div class="col-lg-12">
			<a href="/projeler/ekle/<?=$musteriid?>" class="btn btn-lg btn-default">Proje Ekleyin</a>
		</div>
	</div>
<? } ?>