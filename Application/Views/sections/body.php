<?
    if(User::isLogin()==true){
        include "_topmenu.php";
    
	
	/*
	 *isterseniz aşağıdaki bread kısmını _topmenu içinede alabilirsiniz
	 */
	
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="/"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<?
                if(isset($breadName)){
				if(count($breadName)==1) { ?>
				<li class="active"><a href="<?=$breadUrl[0]?>"><?=$breadName[0]?></a></li>
				<? }else{
						for($i=0;$i<count($breadName);$i++){		
				?>
				<li><a href="<?=$breadUrl[$i]?>"><?=$breadName[$i]?></a></li>
				<? 		}
				   }
				}
				?>
			</ol>
		</div>
<? } ?>	
<?= isset($body) ? $body : ""; ?>
</div>
<?
    include "_footer.php";
?>