<div class="home">
	<div class="pw">
		<div class="grid-layout">
			<div class="grid-row filter-sidebar">
				<? $this->render('templates/sidebar'); ?>
			</div>
			<div class="grid-row inside-content">
				<div class="title-header">
					<div class="">
						<h2>Újdonságok</h2>
					</div>
				</div>
				<div class="webshop-product-top">
					<?php if (true): ?>
						<div class="items">
							<? foreach ( $this->ujdonsag_products_list as $p ) {
									$p['itemhash'] = hash( 'crc32', microtime() );
									$p['sizefilter'] = ( count($this->ujdonsag_products->getSelectedSizes()) > 0 ) ? true : false;
									$p['show_variation'] = ($this->myfavorite) ? true : false;
									$p = array_merge( $p, (array)$this );
									echo $this->ptemplate->get( 'product_item', $p );
							} ?>
						</div>
					<?php endif; ?>
				</div>

				<div class="title-header">
					<div class="">
						<h2>Kiemelt ajánlataink</h2>
					</div>
				</div>
				<div class="webshop-product-top">
					<?php if (true): ?>
						<div class="items">
							<? foreach ( $this->kiemelt_products_list as $p ) {
									$p['itemhash'] = hash( 'crc32', microtime() );
									$p['sizefilter'] = ( count($this->kiemelt_products->getSelectedSizes()) > 0 ) ? true : false;
									$p['show_variation'] = ($this->myfavorite) ? true : false;
									$p = array_merge( $p, (array)$this );
									echo $this->ptemplate->get( 'product_item', $p );
							} ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="news">
		<div class="pw">
			<div class="articles">
				<?
				$step = 0;
				while ( $this->news->walk() ) {
					$step++;
					$arg = $this->news->the_news();
					$arg['date_format'] = $this->settings['date_format'];
					echo $this->template->get( 'slide', $arg );
				}?>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(function(){
			$('.news .articles').slick({
				infinite: true,
			  slidesToShow: 3,
			  slidesToScroll: 1,
				dots: true
			});
		})
	</script>
</div>
