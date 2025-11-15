<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
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
?>

<?php if (!empty($arResult["ITEMS"])): ?>
    <?php foreach ($arResult["ITEMS"] as $arItem): ?>
        <?php
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>

        <div class="services-opportunities__card" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
            <div class="services-opportunities__card-content">
                <h3><?= $arItem["NAME"] ?></h3>
                <p>
                    <?php
                    // Используем HERO_DESCRIPTION из свойств или PREVIEW_TEXT
                    if (!empty($arItem['PROPERTIES']['HERO_DESCRIPTION']['VALUE'])):
                        echo $arItem['PROPERTIES']['HERO_DESCRIPTION']['VALUE'];
                    elseif (!empty($arItem['PREVIEW_TEXT'])):
                        echo $arItem['PREVIEW_TEXT'];
                    else:
                        echo 'Автоматизация, систематизация и увеличение продаж';
                    endif;
                    ?>
                </p>
                <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>" class="services-opportunities__card-link">Подробнее</a>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>