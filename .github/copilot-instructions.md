# AI Coding Agent Instructions for Bitrix-introduction

## 🎯 Project Overview

**Bitrix-introduction** is a local copy of a 1С-Bitrix file system with a dynamic service catalog CMS. The project implements the Main page (`index.php`) and Service pages template that are filled in via Bitrix admin panel on remote hosting.

### Architecture

- **Local Copy**: Reduced filesystem structure matching remote Bitrix installation
- **Frontend**: Static HTML templates in `layout/` (design source reference)
- **Backend**: PHP templates in `local/templates/main/components/bitrix/`
- **Data**: Bitrix info-block "Каталог услуг" (Service Catalog) - managed on remote hosting
- **Deployment**: Manual file uploads via mouse drag-and-drop to remote hosting

### Important Note

**This is a LOCAL DEVELOPMENT COPY ONLY.** All changes are:

1. Made locally to this filesystem copy
2. Manually uploaded to remote hosting (no CLI commands, no automated deployment)
3. Data and content managed through Bitrix admin panel on remote server

## 📂 Critical File Structure

### Templates (PHP Components)

- `local/templates/main/header.php` - Contains inline Critical CSS for FOUC prevention + all services popup navigation
- `local/templates/main/footer.php` - Footer with relative links to all services
- `local/templates/main/components/bitrix/news.detail/service_detail/template.php` - **PRIMARY TEMPLATE** (renders single service page with 10 sections)
- `local/templates/main/components/bitrix/news.list/related_services/template.php` - Auto-shows 3 related services from same category (URL transformation logic on lines ~20-45)
- `index.php` - Main page (root level) - renders homepage with service categories and all services in carousels

### CSS

- `local/templates/main/css/template_styles.css` - All styles (6000+ lines)
  - **Critical**: `.section--reviews` has `column-count: 3` desktop layout with `overflow-x: hidden` protection against FOUC
  - Mobile media queries start ~line 4500+
  - Breadcrumbs: `flex-wrap: wrap` on desktop AND mobile for proper line-breaking
  - Includes inline critical CSS in header for instantaneous first-render styling

### Services Directories

```
services/
├── 1c/                           # Service category
│   ├── implementation/
│   │   └── index.php            # Each service = CMS endpoint file
│   ├── customization/
│   ├── support/
│   └── ...
├── bitrix24/
├── IT-infrastructure-and-equipment/
└── server-solutions-and-networks/
```

Each `index.php` filters Bitrix component for specific service by category + service name.

## 🔑 Key Patterns & Conventions

### 1. URL Formation & Transformation

- **Storage**: Service CODE = "1c-implementation" (with category prefix in Bitrix DB)
- **Display URL**: `/services/1c/implementation/` (split by first hyphen)
- **Implementation**: In `related_services/template.php` (lines ~25-45), regex splits CODE:

  ```php
  if (preg_match('/^(1c|bitrix24|it-infrastructure|server-solutions)-(.+)$/', $elementCode, $matches)) {
      $category = $matches[1];
      $service = $matches[2];
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
  ```

- **Pitfall**: Hardcoded absolute URLs must be changed to relative `/services/...`

### 2. JSON Tariffs Property

- **Property**: `TARIFFS` (multiple text values in Bitrix)
- **Format**: Each value is JSON object: `{"name":"","price":"","badge":"","old_price":"","features":[]}`
- **Rendering**: Template decodes via `json_decode($tariff, true)` on `service_detail/template.php` line ~180
- **Color rotation**: `['green','orange','red'][$key % 3]` cycles card colors
- **Escaping**: Store in Bitrix as-is; no special encoding needed for JSON properties

### 3. Dynamic vs Static Content

| Section | Type | Source |
|---------|------|--------|
| Hero, About, Process, Tariffs, Ready-to-start, FAQ | **Dynamic** | Properties + DETAIL_TEXT field |
| Advantages, Reviews, Clients | **Static** | Hardcoded (same for all services) |
| Related Services | **Auto** | Bitrix filter by SECTION_ID, excludes current ID |

### 4. Component Properties Alignment

- All service `index.php` files define `PROPERTY_CODE` array
- Must match properties defined in `example.xml` structure
- All 16 properties synced: HERO_TITLE, HERO_DESCRIPTION, HERO_IMAGE, ABOUT_TITLE, ABOUT_IMAGE, PROCESS_TITLE, PROCESS_SUBTITLE, PROCESS_STEPS, PROCESS_STEPS_DESC, PROCESS_STEPS_IMAGES, TARIFFS, TARIFFS_DESCRIPTION, ADVANTAGES (static), READY_TITLE, READY_DESCRIPTION, READY_LIST, FAQ_QUESTIONS, FAQ_ANSWERS
- **Keep in sync**: When adding property, update both XML pattern AND all service index.php files

### 5. FOUC (Flash of Unstyled Content) Prevention

- **Issue**: Reviews section initially renders in horizontal line on first load (before CSS applies)
- **Solution**: Inline critical CSS in `header.php` (lines ~24-54) with `!important` flags
- **Protection layers**:
  1. Body `overflow-x: hidden`
  2. `.section--reviews`: `overflow-x: hidden; max-width: 100%;`
  3. `.reviews__container`: Grid with `minmax(0, auto) minmax(0, 1fr)` columns
  4. `.reviews__cards-block`: `width: 100%`, `max-width: 100%`, `overflow: hidden`, `min-width: 0`, `contain: layout style`
  5. `.reviews__card`: `max-width: 100%`, `flex-shrink: 0`, `overflow: hidden`

### 6. Breadcrumbs Responsive Behavior

- **Desktop**: `flex-wrap: wrap` allows items to wrap to next line as unit
- **Each element**: `white-space: nowrap` + `flex-shrink: 0` prevents text breaking inside item
- **Mobile**: Same rules (no text wrapping inside links/separators)
- **Path**: `.breadcrumbs` → `.breadcrumbs__logo-link` → separator → `.breadcrumbs__link` each as unbreakable unit
- **Result**: Breadcrumbs wrap entire groups to new line, never split individual items

### 7. Related Services URL Transformation

- **Location**: `related_services/template.php` lines ~20-45
- **Execution**: PHP code runs BEFORE HTML output (outside `<p>` tag block)
- **Variables**: `$detailUrl` must be defined before use in anchor `href` attribute
- **Critical**: Do NOT place transformation logic inside output blocks - will cause parsing errors

## 🛠️ Common Tasks

### Adding a New Service

1. Create folder: `/services/{category}/{service-name}/`
2. Copy `index.php` from similar service, adjust:
   - `ELEMENT_CODE = "category-service-name"`
   - `SECTION_CODE = "category"`
   - `PROPERTY_CODE` array matches all 16 properties
3. In Bitrix admin, create element with matching code/section
4. Fill all 16 properties (see PROPERTIES_CHECKLIST.md)
5. Upload modified files to remote hosting manually

### Updating Service Links

- **Global search**: Replace absolute URLs with relative `/services/...`
- **Files**: `header.php`, `footer.php`, `index.php` (main)
- **Pattern**: `/services/1c/implementation/` not `https://domain.com/services/1c/implementation/`
- **After edit**: Upload files to remote hosting

### Fixing Component Rendering Issues

1. Check `related_services/template.php` for URL transformation logic placement
2. Ensure PHP code OUTSIDE `<p>` tag output block (execute before closing `?>`)
3. Test: `$detailUrl` must be defined before use in anchor href
4. Verify: No PHP code inside output HTML tags

### Template Modifications

- Always test on first page load (hard refresh, clear cache) for FOUC
- Changes to `.reviews__*` classes require testing in column-count layout
- Media query breakpoint: ~1024px (mobile cutoff)
- After modifications, upload to remote hosting for testing

## 📋 Developer Workflow Tips

### Testing

- **Page rendering**: Check that service pages display correctly without horizontal scroll
- **Related services carousel**: Verify URL format `/services/{category}/{service}/` not `/services/{category}/{category}-{service}/`
- **Mobile**: Breadcrumbs should wrap items, not break text inside items
- **First load**: Hard refresh to see FOUC prevention in action

### Debugging

- **Bitrix component not rendering**: Check component path parameter in `index.php`
- **Wrong URLs in related services**: Debug `related_services/template.php` regex splitting logic
- **Horizontal scroll on reviews**: Inspect element width; check for missing `max-width: 100%` on parent containers
- **Text rendering issues**: Use browser DevTools to check applied CSS (`getComputedStyle`)
- **Empty pages**: Check that `PROPERTY_CODE` array matches all properties used in template

### Deployment Workflow

1. Make changes locally to this filesystem copy
2. Test locally if possible (view HTML output)
3. Upload changed files to remote hosting via mouse drag-and-drop
4. Access remote site and hard refresh (Ctrl+Shift+R) to clear cache
5. Verify changes are visible on remote server

### Cache Management (Remote)

- Bitrix caches component output: `"CACHE_TYPE" => "A", "CACHE_TIME" => "3600"`
- Clear: Remote Admin Panel → Инструменты → Очистить кеш
- During development: Can temporarily set `"CACHE_TYPE" => "N"` if modifying templates

## 🚨 Critical Gotchas

1. **Service folder naming**: Must match SECTION_CODE + ELEMENT_CODE split pattern (e.g., `/services/1c/development/` → CODE = "1c-development", SECTION = "1c")

2. **JSON in Bitrix properties**: Store as-is - no special escaping needed. Template decodes with `json_decode($value, true)`

3. **Component parameters mismatch**: `PROPERTY_CODE` array in service `index.php` must include ALL properties used in template (esp. new ones like TARIFFS_DESCRIPTION)

4. **Horizontal scroll trap**: Never add `width: auto` without `max-width: 100%` to flex children; always use `flex-shrink: 0` with explicit sizing

5. **Related services filter**: `"!ID" => $arResult["ID"]` correctly excludes current page; `"SECTION_ID" => $arResult["IBLOCK_SECTION_ID"]` filters by category

6. **Manual deployment**: Changes only live after uploading to remote hosting - test locally first if possible

7. **PHP code placement**: URL transformation in `related_services/template.php` MUST execute before HTML output block - wrong placement causes rendering failures

## 📖 Reference Files

- `BITRIX_SETUP_GUIDE.md` (497 lines) - Full admin setup + 16 property definitions
- `PROPERTIES_CHECKLIST.md` - Property quick reference
- `example.xml` - Template property schema
- `layout/` - Original HTML design (reference only)

---

**Last Updated**: November 2025 | Project Type: Local Bitrix filesystem copy with manual deployment | Focus: Dynamic service catalog with Bitrix info-blocks
