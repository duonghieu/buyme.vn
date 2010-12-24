<div class="box">
<h3><?php echo $heading;?></h3>
<div class="box-content">
	<div class="prod-grid-medium">
		<?php $i=0;?>
		<?php foreach ($product_short_list as $product){?>
			<div>
				<a href="#" class="prod-img"><img src="<?php echo user_image_url($product['default_image'],'160x120');?>" alt="<?php echo $product['title'];?>" /></a>
				<p class="price"><strong>1.000.000</strong> <em>(-5%)</em></p>
				<h3><a href="#"><?php echo anchor($product['slug'],$product['title']); ?></a></h3>
				<p class="meta">đăng bởi <?php echo anchor('cua-hang/'.$product['shop_name'].'/' . $product['shop_id'],$product['shop_name'], array('class'=>'meta-link')); ?></p>
			</div>
			<?php if($i!=0 && ($i%4)==0){?>
				<div class="clear"></div>
			<?php }?>
			<?php $i++;?>
		<?php }?>
		<?php if($i%4){?>
			<div class="clear"></div>
		<?php unset($i);}?>
		
		
		<div>
			<a href="#" class="prod-img"><img src="images/sample-product-medium.jpg" alt="" /></a>
			<p class="price"><strong>1.000.000</strong> <em>(-5%)</em></p>
			<h3><a href="#">Sample product title</a></h3>
			<p class="meta">đăng bởi <a href="#" class="meta-link">Dat Nguyen</a></p>
		</div>
		
		<div>
			<a href="#" class="prod-img"><img src="images/sample-product-medium.jpg" alt="" /></a>
			<p class="price"><strong>1.000.000</strong> <em>(-5%)</em></p>
			<h3><a href="#">Yet another Sample product title</a></h3>
			<p class="meta">đăng bởi <a href="#" class="meta-link">Dat Nguyen</a></p>
		</div>
		<div>
			<a href="#" class="prod-img"><img src="images/sample-product-medium.jpg" alt="" /></a>
			<p class="price"><strong>1.000.000</strong> <em>(-5%)</em></p>
			<h3><a href="#">Sample product title</a></h3>
			<p class="meta">đăng bởi <a href="#" class="meta-link">Dat Nguyen</a></p>
		</div>
		<div>
			<a href="#" class="prod-img"><img src="images/sample-product-medium.jpg" alt="" /></a>
			<p class="price"><strong>1.000.000</strong> <em>(-5%)</em></p>
			<h3><a href="#">Sample product title</a></h3>
			<p class="meta">đăng bởi <a href="#" class="meta-link">Dat Nguyen</a></p>
		</div>
		
		<div class="clear"></div>
		<div>
			<a href="#" class="prod-img"><img src="images/sample-product-medium.jpg" alt="" /></a>
			<p class="price"><strong>1.000.000</strong> <em>(-5%)</em></p>
			<h3><a href="#">Sample product title</a></h3>
			<p class="meta">đăng bởi <a href="#" class="meta-link">Dat Nguyen</a></p>
		</div>
		<div>
			<a href="#" class="prod-img"><img src="images/sample-product-medium.jpg" alt="" /></a>
			<p class="price"><strong>1.000.000</strong> <em>(-5%)</em></p>
			<h3><a href="#">Yet another Sample product title</a></h3>
			<p class="meta">đăng bởi <a href="#" class="meta-link">Dat Nguyen</a></p>
		</div>
		<div>
			<a href="#" class="prod-img"><img src="images/sample-product-medium.jpg" alt="" /></a>
			<p class="price"><strong>1.000.000</strong> <em>(-5%)</em></p>
			<h3><a href="#">Sample product title</a></h3>
			<p class="meta">đăng bởi <a href="#" class="meta-link">Dat Nguyen</a></p>
		</div>
		<div>
			<a href="#" class="prod-img"><img src="images/sample-product-medium.jpg" alt="" /></a>
			<p class="price"><strong>1.000.000</strong> <em>(-5%)</em></p>
			<h3><a href="#">Sample product title</a></h3>
			<p class="meta">đăng bởi <a href="#" class="meta-link">Dat Nguyen</a></p>
		</div>
		<div class="clear"></div>
		<div>
			<a href="#" class="prod-img"><img src="images/sample-product-medium.jpg" alt="" /></a>
			<p class="price"><strong>1.000.000</strong> <em>(-5%)</em></p>
			<h3><a href="#">Yet another Sample product title</a></h3>
			<p class="meta">đăng bởi <a href="#" class="meta-link">Dat Nguyen</a></p>
		</div>
		<div>
			<a href="#" class="prod-img"><img src="images/sample-product-medium.jpg" alt="" /></a>
			<p class="price"><strong>1.000.000</strong> <em>(-5%)</em></p>
			<h3><a href="#">Sample product title</a></h3>
			<p class="meta">đăng bởi <a href="#" class="meta-link">Dat Nguyen</a></p>
		</div>
		<div>
			<a href="#" class="prod-img"><img src="images/sample-product-medium.jpg" alt="" /></a>
			<p class="price"><strong>1.000.000</strong> <em>(-5%)</em></p>
			<h3><a href="#">Sample product title</a></h3>
			<p class="meta">đăng bởi <a href="#" class="meta-link">Dat Nguyen</a></p>
		</div>
		<div>
			<a href="#" class="prod-img"><img src="images/sample-product-medium.jpg" alt="" /></a>
			<p class="price"><strong>1.000.000</strong> <em>(-5%)</em></p>
			<h3><a href="#">Sample product title</a></h3>
			<p class="meta">đăng bởi <a href="#" class="meta-link">Dat Nguyen</a></p>
		</div>
		<div class="clear"></div>
	</div>
</div>
</div>
				