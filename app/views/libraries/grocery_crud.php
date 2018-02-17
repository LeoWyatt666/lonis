<? if (isset($css_files)) : ?>
<? foreach ($css_files as $file) : ?>
    <link type="text/css" rel="stylesheet" href="<?= $file; ?>" />
<? endforeach; ?>
<? endif; ?>

<? if (isset($output)) : ?>
<?= $output; ?>
<? endif; ?>

<? if (isset($js_files)) : ?>
<? foreach ($js_files as $file) : ?>
    <script src="<?= $file; ?>"></script>
<? endforeach; ?>
<? endif; ?>
