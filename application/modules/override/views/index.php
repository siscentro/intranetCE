<h2>Testing Controller Overrides</h2>

<p>Ocular will show a layout based upon the class name that CodeIgniter's router class thinks is the active controller. This layout will show in place of the index.php layout for that theme.</p>

<p>For example, if you have a layout that is specific to all of the pages in your blog, and they are routed through the blog controller, then a layout named <dfn>blog</dfn> would be used in place of the <dfn>index</dfn> layout.</p>

<pre><code>themes/
  - default/
    - index.php		// The default layout used.
    - blog.php		// Used to render all views from the 'blog' controller.</code></pre>
    
<h2>Assets Override</h2>

<p>Assets will also be included based upon the name of the current controller, if one exists in your themes. So, for our blog example, a <dfn>blog.css</dfn> or <dfn>blog.js</dfn> file will be included from either/both themes automatically.</p>