
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Proje Detayı</h1>
			</div>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-8">
				<div class="panel panel-default">
					<div class="panel-heading"><?=$proje->ad?></div>
					<div class="panel-body">
                        <? foreach($isler as $row){?>
                        <div class="col-lg-12">
                            <div class="col-lg-1 px0"><?=$row->id?></div>
                            <div class="col-lg-2 px0"><?=Time::set('{DN}-{month}-{year}',$row->tarih)?> <?=$row->tarih?></div>
                            <div class="col-lg-2 px0"><?=Time::set('{DN}-{month}-{year}',$row->baslama)?></div>
                            <div class="col-lg-2 px0"><?=Time::set('{DN}-{month}-{year}',$row->bitis)?></div>
							<div class="col-lg-2 px0"><?=$row->admin->username?></div>
                            <div class="col-lg-3 px0"><?=$row->maliyet?> TL /<?=$row->alinan?> TL</div>
                        </div>
                        <? } ?>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="">
                    <div class="panel panel-info">
                        <div class="panel-heading">Müşteri : <b><a href="/musteri/<?=$musteri->id?>"><?=$musteri->ad?></a></b></div>
                        <div class="panel-body">
                            <div class="col-lg-8">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
