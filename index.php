<?php
get_header();
?>
      <div class="showcase">
        <div class="container">
          <div class="row">
            <div id="slides" class="banner-rotate">
              <div class="slides_container" style='background:white'>
				<?php
				$ptype = "e_carousel";
				$args = array(
					'post_type'=> $ptype,
					'order'    => 'ASC',
					'orderby'	=> 'meta_value',
					'meta_key' 	=> $ptype.'_order',
					'posts_per_page' => -1
				);              
				$the_query = new WP_Query( $args );
				if($the_query->have_posts() ){
					while ( $the_query->have_posts() ){
						$the_query->the_post();
						$p = get_post( get_the_ID(), OBJECT );
						$image_id = get_post_meta( $p->ID, $ptype.'_image_id', true );
						$image_src = wp_get_attachment_url( $image_id );
						$alt = get_post_meta( $p->ID, $ptype.'_alt_tag', true );
						$title = get_post_meta( $p->ID, $ptype.'_title_tag', true );
						$order = get_post_meta($p->ID, $ptype.'_order', true );
						?><img width="490" height="300" alt="<?php echo htmlentities($alt); ?>" title="<?php echo htmlentities($title); ?>" src="<?php echo $image_src ?>" style="max-width:100%;" /><?php
					}
				}
				wp_reset_postdata();
				?>
              </div>
            </div>
            
            <div class="video-wrapper">
            <?php
				$ptype = "e_youtube";
				$args = array(
					'post_type'=> $ptype,
					'order'    => 'ASC',
					'orderby'	=> 'rand',
					'posts_per_page' => -1
				);              
				$the_query = new WP_Query( $args );
				if($the_query->have_posts() ){
					while ( $the_query->have_posts() ){
						$the_query->the_post();
						$p = get_post( get_the_ID(), OBJECT );
						$youtube_link = get_post_meta( $p->ID, $ptype.'_youtube_link', true );
						$youtube_id = explode("watch?v=", $youtube_link);
						$youtube_id = $youtube_id[1];
						$youtube_id = explode("&", $youtube_id);
						$youtube_id = $youtube_id[0];
						?> 
						<iframe width="449" height="337" src="http://www.youtube.com/embed/<?php echo $youtube_id; ?>" frameborder="0" allowfullscreen></iframe><?php
						break;
					}
				}
				wp_reset_postdata();
			
			?>
            </div>
          </div>
        </div>            
      </div>


    <div class="container">
      <div class="row add-bot-med">
        <div class="span9 highlights">
          <?php
		  /*
		  <h2>The Biggest TechBiz Event in the Region</h2>
          <p>Echelon 2013 is a <a href="">two-day, double-track event on June 11-12</a> with over 1,100 delegates, a <a href="">startup marketplace of up to 50 startups</a> and various workshops. Echelon 2012 will be the biggest ever edition of Asia's best startup event. It will discover Southeast Asia's best startups on an all new scale.</p>
          <p>Echelon 2013 will be the biggest ever edition of Asia's best startup event. It will discover Southeast Asia's best startups on an all new scale.</p>  
			*/
			?>

			<h2><?php echo stripslashes(html_entity_decode(get_option("echelon_fphead_1"))); ?></h2>
			<p><?php echo nl2br(stripslashes(html_entity_decode(get_option("echelon_fptext_1")))); ?></p>
          <div class="par-comment">
            <div class="row-fluid comment-wrapper" style='position:relative'>
              <style>
				#quotes1{
					width:370px;
				}
				#quotes1 .slides_container .div {
					width:300px;
					height:130px;
					display:block;
				}
				
				</style>
				<div class="green-quote">quote</div>
				<div id='quotes1'>
				<div class="slides_container">
					<?php
						$ptype = "e_quote";
						$args = array(
							'post_type'=> $ptype,
							'order'    => 'ASC',
							'orderby'	=> 'rand',
							'posts_per_page' => -1
						);              
						$the_query = new WP_Query( $args );
						if($the_query->have_posts() ){
							while ( $the_query->have_posts() ){
								$the_query->the_post();
								$p = get_post( get_the_ID(), OBJECT );
								$image_id = get_post_meta( $p->ID, $ptype.'_image_id', true );
								$image_src = wp_get_attachment_url( $image_id );
								?> 
								
									<div class='div'>
										<table style='width:100%; height:150px'>
										<tr>
										<td style='vertical-align:top'>
											<div class="client-badge"><img src="<?php echo $image_src; ?>" style='height:70px; width:70px' /></div>
										</td>
										<td style='vertical-align:middle'>
											<div class="sayings" style='margin-top:0px; float:left; width:230px;'><?php echo $p->post_content; echo " </p> <p align='right'>- "; echo $p->post_title; ?></div>
										</td>
										</tr>
										</table>
									</div>
								
								<?php
							}
						}
						wp_reset_postdata();
						
						?>
				</div>
				</div>
				<div class="register-small" style='position:absolute; left:370px; top:0px'><a href="/register" alt="Register" title="Early Bird Registration">Early Bird</a></div>
            </div>
          </div>
          <!--
		  <h2 class="add-top">Featured Speakers</h2>
          <p>Renowned for our ability to bring in top notch speakers and judges from around the world including US and Asia. You can be assured that we will delivered the utmost relevant trending Asia content. <a href="">Check out our full list of speakers</a>.</p>
          -->
		  <h2><?php echo stripslashes(html_entity_decode(get_option("echelon_fphead_2"))); ?></h2>
		  <p><?php echo nl2br(stripslashes(html_entity_decode(get_option("echelon_fptext_2")))); ?></p>
		  <div class="row-fluid add-top">
			 <?php
				$ptype = "echelon_speaker";
				$args = array(
					'post_type'=> $ptype,
					'order'    => 'ASC',
					'orderby'	=> 'meta_value',
					'meta_key' 	=> $ptype.'_order',
					'meta_key' => $ptype.'_frontpage',
					'meta_value' => 'Yes',
					'posts_per_page' => -1
				);              
				$the_query = new WP_Query( $args );
				$i=0;
				if($the_query->have_posts() ){
					while ( $the_query->have_posts() ){
						if($i%4==0){
							if($i>0){
								?></div><?php
							}
							?><div class="wrapper-speakers"><?php
						}
						$the_query->the_post();
						$p = get_post( get_the_ID(), OBJECT );
						$image_id = get_post_meta( $p->ID, $ptype.'_image_id', true );
						$designation = get_post_meta( $p->ID, $ptype.'_designation', true );
						$image_src = wp_get_attachment_url( $image_id );
						?>
						 <div class="span3 txt-c">
							<a href='<?php echo get_permalink( $p->ID ) ; ?>'><img style='cursor:pointer; height:128px; width:128px' src="<?php echo $image_src?>" title="<?php echo htmlentities($p->post_title) ?>" alt="<?php echo htmlentities($p->post_title) ?>" class="rounded"/></a>
							<p><a href='<?php echo get_permalink( $p->ID ) ; ?>'style='color:black'><em><?php echo htmlentities($p->post_title) ?></em></a><br/><?php echo $designation;?></p>
						  </div>
						<?php
						$i++;
					}
					?></div><?php
				}
				wp_reset_postdata();
			
			?>
         
          </div>
          
          <div class="view-more"><a href="/speakers" class="pull-right add-top">Check out our full list of speakers</a></div>          
          <div class="par-comment">
            <div class="row-fluid comment-wrapper" style='position:relative'>
			 
				<style>
				#quotes2{
					width:370px;
				}
				#quotes2 .slides_container .div {
					width:300px;
					height:130px;
					display:block;
				}
				
				</style>
				<div class="green-quote">quote</div>
				<div id='quotes2'>
				<div class="slides_container">
					<?php
						$ptype = "e_quote";
						$args = array(
							'post_type'=> $ptype,
							'order'    => 'ASC',
							'orderby'	=> 'rand',
							'posts_per_page' => -1
						);              
						$the_query = new WP_Query( $args );
						if($the_query->have_posts() ){
							while ( $the_query->have_posts() ){
								$the_query->the_post();
								$p = get_post( get_the_ID(), OBJECT );
								$image_id = get_post_meta( $p->ID, $ptype.'_image_id', true );
								$image_src = wp_get_attachment_url( $image_id );
								?> 
								
									<div class='div'>
										<table style='width:100%; height:150px'>
										<tr>
										<td style='vertical-align:top'>
											<div class="client-badge"><img src="<?php echo $image_src; ?>" style='height:70px; width:70px' /></div>
										</td>
										<td style='vertical-align:middle'>
											<div class="sayings" style='margin-top:0px; float:left; width:230px;'><?php echo $p->post_content; echo " </p> <p align='right'>- "; echo $p->post_title; ?></div>
										</td>
										</tr>
										</table>
									</div>
								
								<?php
							}
						}
						wp_reset_postdata();
						
						?>
					</div>
					</div>
					<div class="register-small" style='position:absolute; left:370px; top:0px'><a href="/register" alt="Register" title="Early Bird Registration">Early Bird</a></div>
              
            </div>
			
          </div>
          <div class="row-fluid add-top">
            <div class="span6">
              <h2><?php echo stripslashes(html_entity_decode(get_option("echelon_fphead_5"))); ?></h2>
			  <p><?php echo nl2br(stripslashes(html_entity_decode(get_option("echelon_fptext_5")))); ?></p>
            </div>
            <div class="span6">
               <h2><?php echo stripslashes(html_entity_decode(get_option("echelon_fphead_4"))); ?></h2>
			   <p><?php echo nl2br(stripslashes(html_entity_decode(get_option("echelon_fptext_4")))); ?></p>
            </div>
          </div>
          <div class="row-fluid fourth-lvl">
            <h2>News & Update</h2>
            <div class="row-fluid">
              <div class="span6 nu-box">
                <h3><?php echo $e_rss->items[0]['title']; ?></h3>
                <p>
				<?php echo $e_rss->items[0]['description']; ?>
				</p>            
                <a href="<?php echo $e_rss->items[0]['link']; ?>" class="readmore">Read more</a>              
              </div>
              <div class="span6 nu-box">
                <h3><?php echo $e_rss->items[1]['title']; ?></h3>
                <p>
				<?php echo $e_rss->items[1]['description']; ?>
				</p>            
                <a href="<?php echo $e_rss->items[1]['link']; ?>" class="readmore">Read more</a>              
              </div>
            </div>
          </div>
        </div>
        
        <div class="span3 side-pillar txt-c" id='side_pillar' style='display:none'>
			<?php
			$side = false;
			$ptype = "e_sponsor";
			$args = array(
				'post_type'=> $ptype,
				'order'    => 'ASC',
				'orderby'	=> 'meta_value',
				'meta_key' 	=> $ptype.'_order',
				'posts_per_page' => -1
			);              
			$the_query = new WP_Query( $args );
			$premier_sponsors = array();
			$sponsors = array();
			if($the_query->have_posts() ){
				while ( $the_query->have_posts() ){
					$the_query->the_post();
					$p = get_post( get_the_ID(), OBJECT );
					$image_id = get_post_meta( $p->ID, $ptype.'_image_id', true );
					$type = get_post_meta( $p->ID, $ptype.'_type', true );
					$link = get_post_meta( $p->ID, $ptype.'_link', true );
					$html = get_post_meta( $p->ID, $ptype.'_html', true );
					
					$image_src = wp_get_attachment_url( $image_id );
					$v = array();
					$v['post'] = $p;
					$v['image_src'] = $image_src;
					$v['link'] = $link;
					$v['html'] = $html;
					
					if(strtolower($type)=='premier'){
						$premier_sponsors[] = $v;
						$side = true;
					}
					else{
						$sponsors[] = $v;
						$side = true;
					}
				}
			}
			
			wp_reset_postdata();
			
			$t = count($premier_sponsors);
			if($t){
				?>
				<div class="head-pillar"><p>Premier Sponsors</p></div>
				<ul>
				<?php
				for($i=0; $i<$t; $i++){
					?>
					<li>
					<?php
					if(trim($premier_sponsors[$i]['html'])){
						echo trim($premier_sponsors[$i]['html']);
					}
					else{
						e_view($premier_sponsors[$i]['post']);
						if(trim($premier_sponsors[$i]['link'])){
							?>
							<a href="<?php echo e_clickurl($premier_sponsors[$i]['link'], $premier_sponsors[$i]['post']); ?>"><img src="<?php echo $premier_sponsors[$i]['image_src']; ?>" title="<?php echo htmlentities($premier_sponsors[$i]['post']->post_title); ?>" alt="<?php echo htmlentities($premier_sponsors[$i]['post']->post_title); ?>"></a>
							<?php
						}
						else{
							?>
							<img src="<?php echo $premier_sponsors[$i]['image_src']; ?>" title="<?php echo htmlentities($premier_sponsors[$i]['post']->post_title); ?>" alt="<?php echo htmlentities($premier_sponsors[$i]['post']->post_title); ?>">
							<?php
						}
					}
					?>
					</li>
					<?php
				}
				?>
				</ul>
				<?php
			}
			
			$t = count($sponsors);
			if($t){
				?>
				<div class="inner-pillar"><p>Sponsors</p></div>
				<ul>
				<?php
				for($i=0; $i<$t; $i++){
					?>
					<li>
					<?php
					if(trim($sponsors[$i]['html'])){
						echo trim($sponsors[$i]['html']);
					}
					else{
						e_view($sponsors[$i]['post']);
						if(trim($sponsors[$i]['link'])){
							?>
							<a href="<?php echo e_clickurl($sponsors[$i]['link'], $sponsors[$i]['post']); ?>"><img src="<?php echo $sponsors[$i]['image_src']; ?>" title="<?php echo htmlentities($sponsors[$i]['post']->post_title); ?>" alt="<?php echo htmlentities($sponsors[$i]['post']->post_title); ?>"></a>
							<?php
						}
						else{
							?>
							<img src="<?php echo $sponsors[$i]['image_src']; ?>" title="<?php echo htmlentities($sponsors[$i]['post']->post_title); ?>" alt="<?php echo htmlentities($sponsors[$i]['post']->post_title); ?>">
							<?php
						}
					}
					?>
					</li>
					<?php
				}
				?>
				</ul>
				<?php
			}
			
			
			
			
			
			$ptype = "e_mediapartners";
			$args = array(
				'post_type'=> $ptype,
				'order'    => 'ASC',
				'orderby'	=> 'meta_value',
				'meta_key' 	=> $ptype.'_order',
				'posts_per_page' => -1
			);              
			$the_query = new WP_Query( $args );
			$premier_mps = array();
			$mps = array();
			if($the_query->have_posts() ){
				while ( $the_query->have_posts() ){
					$the_query->the_post();
					$p = get_post( get_the_ID(), OBJECT );
					$image_id = get_post_meta( $p->ID, $ptype.'_image_id', true );
					$type = get_post_meta( $p->ID, $ptype.'_type', true );
					$link = get_post_meta( $p->ID, $ptype.'_link', true );
					$html = get_post_meta( $p->ID, $ptype.'_html', true );
					
					$image_src = wp_get_attachment_url( $image_id );
					$v = array();
					$v['post'] = $p;
					$v['image_src'] = $image_src;
					$v['link'] = $link;
					$v['html'] = $html;
					
					if(strtolower($type)=='premier'){
						$premier_mps[] = $v;
						$side = true;
					}
					else{
						$mps[] = $v;
						$side = true;
					}
				}
			}
			
			wp_reset_postdata();
			
			$t = count($premier_mps);
			if($t){
				?>
				<div class="inner-pillar"><p>Premier Media Partners</p></div>
				<ul>
				<?php
				for($i=0; $i<$t; $i++){
					?>
					<li>
					<?php
					e_view($premier_mps[$i]['post']);
					if(trim($premier_mps[$i]['link'])){
						?>
						<a href="<?php echo e_clickurl($premier_mps[$i]['link'], $premier_mps[$i]['post']); ?>"><img src="<?php echo $premier_mps[$i]['image_src']; ?>" title="<?php echo htmlentities($premier_mps[$i]['post']->post_title); ?>" alt="<?php echo htmlentities($premier_mps[$i]['post']->post_title); ?>"></a>
						<?php
					}
					else{
						if(trim($premier_mps[$i]['link'])){
							?>
							<a href="<?php echo $premier_mps[$i]['link']; ?>"><img src="<?php echo $premier_mps[$i]['image_src']; ?>" title="<?php echo htmlentities($premier_mps[$i]['post']->post_title); ?>" alt="<?php echo htmlentities($premier_mps[$i]['post']->post_title); ?>"></a>
							<?php
						}
						else{
							?>
							<img src="<?php echo $premier_mps[$i]['image_src']; ?>" title="<?php echo htmlentities($premier_mps[$i]['post']->post_title); ?>" alt="<?php echo htmlentities($premier_mps[$i]['post']->post_title); ?>">
							<?php
						}
					}
					?>
					</li>
					<?php
				}
				?>
				</ul>
				<?php
			}
			
			$t = count($mps);
			if($t){
				?>
				<div class="inner-pillar"><p>Media Partners</p></div>
				<ul>
				<?php
				for($i=0; $i<$t; $i++){
					?>
					<li>
					<?php
					e_view($mps[$i]['post']);
					if(trim($mps[$i]['link'])){
						?>
						<a href="<?php echo e_clickurl($mps[$i]['link'], $mps[$i]['post']); ?>"><img src="<?php echo $mps[$i]['image_src']; ?>" title="<?php echo htmlentities($mps[$i]['post']->post_title); ?>" alt="<?php echo htmlentities($mps[$i]['post']->post_title); ?>"></a>
						<?php
					}
					else{
						if(trim($mps[$i]['link'])){
							?>
							<a href="<?php echo $mps[$i]['link']; ?>"><img src="<?php echo $mps[$i]['image_src']; ?>" title="<?php echo htmlentities($mps[$i]['post']->post_title); ?>" alt="<?php echo htmlentities($mps[$i]['post']->post_title); ?>"></a>
							<?php
						}
						else{
							?>
							<img src="<?php echo $mps[$i]['image_src']; ?>" title="<?php echo htmlentities($mps[$i]['post']->post_title); ?>" alt="<?php echo htmlentities($mps[$i]['post']->post_title); ?>">
							<?php
						}
					}
					?>
					</li>
					<?php
				}
				?>
				</ul>
				<?php
			}
			?>
			

      </div>
	 

      
    <!-- /container -->
   
</div>

 <!-- /container -->
 <?php
  if($side){
	?>
	<script>
		jQuery("#side_pillar").show();
	</script>
	<?php		
  }
  
  ?>
<?php
get_footer();
?>