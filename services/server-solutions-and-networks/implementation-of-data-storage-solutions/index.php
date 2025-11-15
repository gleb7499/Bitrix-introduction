<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Внедрение хранилищ данных");

$APPLICATION->IncludeComponent(
    "bitrix:news.detail",
    "service_detail",
    array(
        "IBLOCK_TYPE" => "services",
        "IBLOCK_ID" => "14", // ⚠️ ID инфоблока!
        "ELEMENT_CODE" => $_REQUEST["CODE"] ?: "server-solutions-and-networks",
        "SECTION_CODE" => "",

        "FIELD_CODE" => array("NAME", "DETAIL_TEXT"),
        "PROPERTY_CODE" => array(
            "HERO_TITLE",
            "HERO_DESCRIPTION",
            "HERO_IMAGE",
            "ABOUT_TITLE",
            "ABOUT_IMAGE",
            "ABOUT_DESCRIPTION",
            "PROCESS_TITLE",
            "PROCESS_SUBTITLE",
            "PROCESS_STEPS",
            "PROCESS_STEPS_DESC",
            "PROCESS_STEPS_IMAGES",
            "TARIFFS",
            "TARIFFS_DESCRIPTION",
            "READY_TITLE",
            "READY_DESCRIPTION",
            "READY_LIST",
            "READY_IMAGE",
            "FAQ_QUESTIONS",
            "FAQ_ANSWERS",
        ),

        "SET_TITLE" => "Y",
        "SET_BROWSER_TITLE" => "Y",
        "SET_META_KEYWORDS" => "Y",
        "SET_META_DESCRIPTION" => "Y",
        "SET_STATUS_404" => "Y",
        "SHOW_404" => "Y",

        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "3600",
        "CACHE_GROUPS" => "Y",

        "ADD_SECTIONS_CHAIN" => "Y",
        "ADD_ELEMENT_CHAIN" => "Y",
    )
);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
?>