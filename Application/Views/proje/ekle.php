<?
/*
 *bu sayfayı hem musteri/ekle hemde musteri/kayit fonksiyonlarında kullanacaz.
 *normal şartlarda bunlar için ayrı view ler yazarım ancak kullanım şeklini gösterebilmek için bunu kullanacaz
 */
if(CURRENT_CFUNCTION=="ekle"){
	/*echo Import::plugin("datetimepicker",false,true);
	echo Script::library('jquery')->open();
	
	echo Script::library()->close();*/
?>
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Proje Ekle</h1>
			</div>
		</div><!--/.row-->
			
		<div class="panel panel-default">
			<div class="panel-heading">
				<svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg>
				Proje Bilgileri
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
							<div class="col-md-4">
								<?=Form::text("ad",Validation::postBack("ad"),array("maxlength"=>50,"id"=>"ad","required"=>"required","class"=>"form-control",Validation::postBack('ad')));?>
							</div>
						</div>
					
						
						<div class="form-group">
							<label for="musteriid" class="col-md-3 control-label">Müşteri</label>
							<div class="col-md-4">
								<?= Form::select("musteriid",$musteriListesi,$id,array("class"=>"form-control")) ?>
							</div>
						</div>
						
						
						<div class="form-group">
							<label for="gsm" class="col-md-3 control-label">Açıklama</label>
							<div class="col-md-8">
								<?=Form::textarea("aciklama",Validation::postBack("aciklama"),array("id"=>"aciklama","required"=>"required","class"=>"form-control"));?>
							</div>
						</div>
						
						<div class="form-group">
							<label for="email" class="col-md-3 control-label">Başlama Tarihi</label>
							<div class="col-md-3">
								<?=Form::text("baslamatarihi",Validation::postBack("baslamatarihi"),array("id"=>"baslamatarihi","required"=>"required","class"=>"form-control"));?>
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