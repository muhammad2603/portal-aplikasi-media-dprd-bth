<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_name ?></title>
    <link rel="stylesheet" href="<?= base_url('/assets/css/fonts.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/assets/css/base.css') ?>">
</head>

<body>
    <!-- @Content -->
    <?= $this->renderSection('content') ?>
</body>

</html>