
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Müşteriler</h1>
			</div>
		</div><!--/.row-->
		<?
			if(redirectData("mesaj")!==null){
				echo redirectData("mesaj");
				redirectDeleteData("mesaj");
			}
		?>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Müşteri Listesi</div>
					<div class="panel-body">
						<table class="table table-hover">
						    <thead>
						    <tr>
						        <th>ID</th>
						        <th>Müşteri</th>
						        <th>Yetkili</th>
						        <th>Proje</th>
								<th>Alacak</th>
								<th class="wy20 tac">İşlemler</th>
						    </tr>
						    </thead>
							<tbody>
								<? foreach($musteriler as $row) { ?>
								<tr class="vac">
                                    <td><?=$row->id?></td>
                                    <td><?=$row->ad?></td>
                                    <td><?=$row->yetkili?></td>
                                    <td><?=$row->projesayisi?></td>
									<td><?=$row->kalan?> TL</td>
                                    <td class="tac">
										<a href="/musteriler/duzenle/<?=$row->id?>" class="btn btn-default"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg></a>
										<?
										/*aşağıda linklemenin zn tarafından yapılışını kullanıyoruz
										bu siteniz.com/istakip/ gibi bir adreste ise çok işinize yarayacaktır
										eğer öyle değil ana dizinde ise yukarıdaki gibi kullanabilirsiniz
										*/?>
										<a href="<?=siteUrl('musteriler/sil/'.$row->id)?>" class="btn btn-danger"><svg class="glyph stroked trash"><use xlink:href="#stroked-trash"/></svg></a>
										<a href="<?=siteUrl('projeler/musteri/'.$row->id)?>" class="btn btn-info"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg></a>
									</td>
                                </tr>
								<tr class="none">
										<td colspan="3">
												
										</td>
								</tr>
								<? } ?>
							</tbody>
							<tfoot>
                                <tr>
										<td colspan="4">&nbsp;</td>
										<td colspan="2" class="tar"><a href="/musteriler/ekle" class="mt20 btn btn-success btn-lg">Yeni Müşteri Ekle</a></td>
                                </tr>
                            </tfoot>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
		<div class="row">
				<? echo Script::library('bootstrap-table')->open() ?>
				<? echo Script::library()->close() ?>
			<script type="text/javascript">
                           $(function () {
						        $('#hover, #striped, #condensed').click(function () {
						            var classes = 'table';
						
						            if ($('#hover').prop('checked')) {
						                classes += ' table-hover';
						            }
						            if ($('#condensed').prop('checked')) {
						                classes += ' table-condensed';
						            }
						            $('#table-style').bootstrapTable('destroy')
						                .bootstrapTable({
						                    classes: classes,
						                    striped: $('#striped').prop('checked')
						                });
						        });
						    });
						
						    function rowStyle(row, index) {
						        var classes = ['active', 'success', 'info', 'warning', 'danger'];
						
						        if (index % 2 === 0 && index / 2 < classes.length) {
						            return {
						                classes: classes[index / 2]
						            };
						        }
						        return {};
						    }
						</script>
					
		</div><!--/.row-->	
