<h2>Testing Breadcrumbs</h2>

<p>The <dfn>breadcrumb()</dfn> function is a simple method that will create a list perfect for a breadcrumb trail based on your current url. The default crumb looks like:</p>

<?php echo breadcrumb(); ?>

<code>&lt;?php echo breadcrumb(); ?></code>

<h3>Custom Breadcrumbs</h3>

<p>You will find that certain uri's will not work with the simple version above. In these cases, you can pass an array into the breadcrumb function and customize the title and uri of each segment.</p>

<?php
	$crumb = array(
		'welcome' => 'welcome',
		'to'    => 'to',
		'OZ'	=> 'http://google.com',
		'Toto'	=> ''
	);
	
	echo breadcrumb($crumb);
?>

<pre><code>&lt;?php
	$crumb = array(
		'welcome' => 'welcome',
		'to'    => 'to',
		'OZ'	=> 'http://google.com'
	);
	
	echo breadcrumb($crumb);
?></code></pre>