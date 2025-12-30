<?php 
class Aravalli_pagination
{	function Aravalli_page($curpage, $post_type_data)
	{	?>				
			<div class="row">
				<div class="col-12 text-center mt-5">
					<nav class="navigation pagination custom-pagination" role="navigation" aria-label="Posts">
						<div class="nav-links">
						<?php
							if($curpage != 1  )	{  
								echo '<a href="'.get_pagenum_link(($curpage-1 > 0 ? $curpage-1 : 1)).'"><i class="fa fa-chevron-left"></i></a>'; 
							}
							
							for($i=1;$i<=$post_type_data->max_num_pages;$i++)	{
								echo '<a class="'.($i == $curpage ? 'active ' : '').'" href="'.get_pagenum_link($i).'">'.$i.'</a>';
							}
							
							if($i-1!= $curpage) { 
								echo '<a href="'.get_pagenum_link(($curpage+1 <= $post_type_data->max_num_pages ? $curpage+1 : $post_type_data->max_num_pages)).'"><i class="fa fa-chevron-right"></i></a>'; 
							}
							?>
							</div>
					</nav>
				</div>
			</div>
				
		<?php
	} 
}
?>