<h2>Child Theme Example</h2>

<p>This pages uses the 'blue' theme. It is still called from the <dfn>welcome</dfn> controller. This particular view can be found at:</p>

<code>application/views/welcome/blue.php</code>

<p>There are two things happening on this page:</p>

<ol>
	<li>The <dfn>_masthead.php</dfn> view file in the blue theme is overriding the file of the same name in the default theme. With the exception of the stylesheet, all other files are being pulled from the default theme.</li>
	<li>The <var>assets</var> library is automatically finding a file called <dfn>screen.css</dfn> in the blue theme. This file only has color information for the <var>.masthead</var> div. All other styles are provided by the default theme's screen.css file.</li>
</ol>