<h2>Testing Image Functions</h2>

<p>The image function in the assets library has one main purpose: to provide a correctly-sized image to the browser so that extra bandwidth is not wasted. This is especially important as mobile browsing becomes more and more prevalent.</p>

<h3>Basic Usage</h3>

<p>This is the picture, without any sizing performed.</p>

<?php echo Assets::image(Template::theme_url('images/house.jpg')); ?>

<h3>Resizing</h3>

<p>To resize an image, you just need to ensure that you pass both <var>height</var> and <var>width</var> in the parameters. At the moment, true resizing (thumb-nail creation) isn't automated, but will be in a future release.</p>

<?php echo Assets::image(Template::theme_url('images/house.jpg'), array('height' => '150', 'width' => '250')); ?>