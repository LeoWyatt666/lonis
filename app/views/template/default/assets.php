<?
// Jquery
add_assets([
    "jquery/jquery-3.3.1.min.js",
    "jquery/jquery.cookie.min.js",
], "jquery");

// Semantic
add_assets([
    "semantic-ui/semantic.lonis.css",
    "semantic-ui/semantic-magic.css",
    "semantic-ui/semantic.min.js",
], "semantic-ui");

// Other libraries
add_assets([
    "placeholder/placeholder.css",
    "scrollbar/scrollbar.black.min.css",
    "table-adaptive/table-adaptive.css",
    "table-adaptive/table-adaptive.js",
    "infinite-scroll/infinite-scroll.pkgd.min.js",
], "libraries");       

// Template
add_assets([
    "{$template}/style.css",
    "{$template}/script.js",
], $template);

// Group build
group_assets('assets', [
    "jquery",
    "semantic-ui",
    "libraries",
    "{$template}",
    "{$this->router->class}",
]);
?>