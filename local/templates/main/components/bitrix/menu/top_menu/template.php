<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

$this->setFrameMode(true);

if (empty($arResult)) {
    return;
}
?>

<ul class="nav__list">
    <?php foreach ($arResult as $arItem): ?>
        <?php
        $hasChildren = !empty($arItem["ITEMS"]);
        $isActive = $arItem["SELECTED"];

        // Отладка (удалить после проверки)
        // echo "<pre>"; echo $arItem["TEXT"]; print_r($arItem["ITEMS"]); echo "</pre>";
        ?>

        <li class="nav__item<?= $hasChildren ? ' nav__item--has-dropdown' : '' ?><?= $isActive ? ' active' : '' ?>">
            <a href="<?= $arItem["LINK"] ?>" class="nav__link">
                <?= $arItem["TEXT"] ?>
                <?php if ($hasChildren): ?>
                    <img src="<?= SITE_TEMPLATE_PATH ?>/image/icons/show-more.svg" alt="" class="nav__link-icon"
                        loading="lazy" />
                <?php endif; ?>
            </a>

            <?php if ($hasChildren): ?>
                <!-- Всплывающее меню для пункта с детьми -->
                <div class="nav-dropdown">
                    <div class="nav-dropdown__container">
                        <?php foreach ($arItem["ITEMS"] as $arChild): ?>
                            <a href="<?= $arChild["LINK"] ?>"
                                class="nav-dropdown__link<?= $arChild["SELECTED"] ? ' active' : '' ?>">
                                <?= $arChild["TEXT"] ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>