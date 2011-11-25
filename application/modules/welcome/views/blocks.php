<h2>Testing Blocks</h2>

<p>Blocks allow a simple method for inserting a common view across all of your layouts. While a default view can be provided, you can set the view to be overriden from within any controller. The following examples test all of the basic functionalities of blocks.</p>

<h3>1. Basic Block</h3>

<?php echo Template::block('block_one', 'blocks/block_1'); ?>

<h3>2. Overriden Block</h3>

<?php echo Template::block('block_two', 'blocks/block_1'); ?>

<h3>3. Data Block</h3>

<?php echo Template::block('block_three', 'blocks/data_block', $block_data); ?>

<h3>4. Theme Blocks</h3>

<?php echo Template::block('block_theme', 'block', null, true); ?>