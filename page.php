<?php
get_header();
?>


    <div class="container add-top">
      <div class="row add-bot-med">
        <div class="span9 highlights" >
          
		  <?php
		  while ( have_posts() ){
			the_post();
			$p = get_post( get_the_ID(), OBJECT );
			?><h2>
			
			<!--social-->
			<?php
			$perm = get_permalink();
			$perm = urlencode($perm);
			?>
			<div style='position:relative; height:20px;'>
				<div class="juiz_sps_links  juiz_sps_displayed_both" style='margin:0px; position:absolute; top:-20px; '>
					<p class="screen-reader-text juiz_sps_maybe_hidden_text">Share the post "<?php the_title(); ?>"</p>
					<ul class="juiz_sps_links_list juiz_sps_hide_name" style='line-height:20px'>
						<li class="juiz_sps_item juiz_sps_link_facebook">
							<a target="_blank" title="Share this article on Facebook" rel="nofollow" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $perm; ?>">
							<span class="juiz_sps_icon"></span>
							<span class="juis_sps_network_name">facebook</span>
							</a>
						</li>
						<li class="juiz_sps_item juiz_sps_link_twitter">
							<a target="_blank" title="Share this article on Twitter" rel="nofollow" href="https://twitter.com/intent/tweet?source=webclient&amp;original_referer=<?php echo $perm; ?>&amp;text=<?php echo urlencode($p->post_title); ?>&amp;url=<?php echo $perm; ?>&amp;related=e27co&amp;via=e27co">
							<span class="juiz_sps_icon"></span><span class="juis_sps_network_name">twitter</span></a>
						</li>
						<li class="juiz_sps_item juiz_sps_link_google">
							<a target="_blank" title="Share this article on Google+" rel="nofollow" href="https://plus.google.com/share?url=<?php echo $perm; ?>"><span class="juiz_sps_icon"></span><span class="juis_sps_network_name">google</span></a>
						</li>
						<li class="juiz_sps_item juiz_sps_link_linkedin">
							<a target="_blank" title="Share this article on LinkedIn" rel="nofollow" href="http://www.linkedin.com/shareArticle?mini=true&amp;ro=true&amp;trk=JuizSocialPostSharer&amp;title=<?php echo urlencode($p->post_title); ?>&amp;url=<?php echo $perm; ?>"><span class="juiz_sps_icon"></span><span class="juis_sps_network_name">linkedin</span></a>
						</li>
						<li class="juiz_sps_item juiz_sps_link_mail">
							<a target="_blank" title="Share this article with a friend (email)" rel="nofollow" href="mailto:?subject=&amp;body= : <?php echo $perm; ?>"><span class="juiz_sps_icon"></span><span class="juis_sps_network_name">mail</span></a>
						</li>
					</ul>
				</div>
			</div>
			
			
			
			<?php echo $p->post_title;?></h2><?php
			echo "<div class='content'>";
			the_content();
			echo "</div>";
		  }
		  
		  ?>
		</div>
		<?php
		include_once(dirname(__FILE__)."/sidepillar.php");
		?>
	 

      
    <!-- /container -->
   
</div>

<!-- /container -->
<?php
get_footer();
?>