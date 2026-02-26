<!DOCTYPE html>
<html lang="en" class="text-[14px] sm:text-[16px] 2xl:text-[20px]">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_name ?></title>
    <link rel="stylesheet" href="<?= base_url('/assets/css/fonts.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/assets/css/base.css') ?>">
</head>

<body class="bg-primary">
    <!-- @Content -->
    <?= $this->renderSection('content') ?>
</body>

</html>