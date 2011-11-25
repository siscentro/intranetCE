<h2>Testing CSS Functionality</h2>

<p>By default, Ocular will load a stylesheet from the themes based on the media type of the call, which defaults to <var>screen</var>. Simply placing a screen.css file in your theme and calling the <kbd>Assets::css()</kbd> method will give create a link to both the active and default theme's <dfn>screen.css</dfn> file. That's how the styles on this page are being shown.</p>

<code>&lt;?php echo Assets::css(); ?></code>

<h3>Displaying a Single CSS file</h3>

<p>When you pass in a single stylesheet name, a link is created if that stylesheet exists within either the active or default styles. For example, right now, we are loading in a new style to change the way the following code blocks look. </p>

<?php echo Assets::css('css/green_code'); ?>

<code>&lt;?php echo Assets::css('css/green_code'); ?></code>

<h3>Media Types</h3>

<p>Now, we'll load it again, but this time use a print media style. (You will have to view source to see the effect.)</p>

<?php echo Assets::css('css/green_code', 'print'); ?>

<code>&lt;?php echo Assets::css('css/green_code', 'print'); ?></code>

<h3>Media Queries</h3>

<p>You can easily use media queries when calling a single stylesheet by passing the entire string of the query into the second parameter. Resize your browser window to see the effect of this.</p>

<?php echo Assets::css('css/narrow', 'screen and (max-width: 700px)'); ?>

<code>&lt;?php echo Assets::css('css/narrow', 'screen and (max-width: 700px)'); ?></code>

<h3>Multiple Styles at Once</h3>

<p>By passing an array of filenames as the first parameter, we can create multiple links with only a single call. The only catch is that they all need to support a single media style. (ie. screen).</p>

<?php echo Assets::css(array('css/green_code', 'css/blue_border'), 'screen'); ?>

<code>&lt;?php echo Assets::css(array('css/green_code', 'css/narrow'), 'screen'); ?></code>