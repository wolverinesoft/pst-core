<?php  if(@$brand): 
	$brand_id = @$breadcrumbs['brand'];

		$brandlist = $breadcrumbs;
	if(@$brand_id): 
		unset($brandlist['brand']);
		$key = array_search($brand_id, $brandlist);
		unset($brandlist[$key]);
	endif;
						?>
	<div class="side_header">
		<div class="grg">Refine Search by Brand</div>
	</div>		
	<div class="base_container">
		<div class="base_nav">
			<ul>	
	 <?php foreach($brand as $id => $ref):  ?>
	<!-- EXPANDER 1 -->
				<li>
					<?php if($id == @$brand_id): ?><div style="float:right; margin:-15px -5px;"><a href="javascript:void(0);" onclick="removeMainSearch('brand', '<?php echo $id; ?>')" style="color:#F00"> <i class="fa fa-times"></i> &nbsp; </a></div><?php endif; ?>
					<a href="<?php echo site_url($ref['slug']);?>" id="<?php echo $id; ?>"><?php echo $ref['name']; ?> (<?php echo $ref['count']; ?>)</a><script>createNamedURL('brand', '<?php echo $id; ?>', '<?php echo addslashes($ref['name']); ?>');</script>
				</li>

<?php  endforeach; ?>
			</ul>
		</div>
	</div>
	
	<?php endif; ?>