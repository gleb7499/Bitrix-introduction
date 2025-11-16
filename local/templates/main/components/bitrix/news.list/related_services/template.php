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

        <?php
        // Формируем правильный URL: преобразуем ELEMENT_CODE в путь
        // Например: "1c-development" -> "/services/1c/development/"
        $elementCode = $arItem["CODE"];
        $detailUrl = $arItem["DETAIL_PAGE_URL"];

        // Если код содержит дефис после префикса (1c-, bitrix24-, и т.д.), убираем префикс
        if (preg_match('/^(1c|bitrix24|it-infrastructure|server-solutions)-(.+)$/', $elementCode, $matches)) {
            $category = $matches[1];
            $service = $matches[2];

            // Формируем корректный URL на основе структуры папок
            if ($category === '1c') {
                $detailUrl = "/services/1c/{$service}/";
            } elseif ($category === 'bitrix24') {
                $detailUrl = "/services/bitrix24/{$service}/";
            } elseif ($category === 'it-infrastructure') {
                $detailUrl = "/services/IT-infrastructure-and-equipment/{$service}/";
            } elseif ($category === 'server-solutions') {
                $detailUrl = "/services/server-solutions-and-networks/{$service}/";
            }
        }
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
                <a href="<?= $detailUrl ?>" class="services-opportunities__card-link">Подробнее</a>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>