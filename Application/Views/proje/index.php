
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Projeler</h1>
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
					<div class="panel-heading">Proje Listesi</div>
					<div class="panel-body">
						<table data-toggle="table" data-show-refresh="true"
                               data-show-toggle="true" data-show-columns="true" data-search="true"
                               data-select-item-name="toolbar1" data-pagination="true" data-sort-name="ad"
                               data-sort-order="desc">
						    <thead>
						    <tr>
						        <th data-field="id" data-checkbox="true" >Item ID</th>
						        <th data-field="ad" data-sortable="true">Proje Adı</th>
						        <th data-field="aciklama"  data-sortable="false">Proje Açıklaması</th>
						        <th data-field="tarih" data-sortable="true">Tarih</th>
								<th>İşlemler</th>
						    </tr>
						    </thead>
							<tbody>
								<? foreach($projeler as $row) { ?>
								<tr>
                                    <td><?=$row->id?></td>
                                    <td><?=$row->ad?></td>
                                    <td><?=$row->aciklama?></td>
                                    <td><?=$row->tarih?></td>
                                    <td><a href="/projeler/detay/<?=$row->id?>" class="btn btn-default">Düzenle</a></td>
                                </tr>
								<? } ?>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="4"></td>
									<td>
										<a href="/projeler/ekle" class="btn btn-success btn-lg mt20">Proje Ekle</a>
									</td>
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
