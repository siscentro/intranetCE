<h2>Testing Basic JS Functionality</h2>

<p>By default, Ocular will attempt to load a file from the themes with the name <dfn>global.js</dfn>. By simply creating a file named global.js and dropping it in your theme folder, the file will be loaded for every page.</p>

<?php echo Assets::external_js(); ?>

<code>&lt;?php echo Assets::js(); ?></code>

<h3>Controller Overrides</h3>

<p>If Ocular finds a script file with a name matching the name of the current controller (in this case 'asset' - see above) it will be automatically included when no parameters are passed to js().</p>