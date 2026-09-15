# 🎯 Guide: Implementing Dynamic Service Pages in 1C-Bitrix

## 📋 General Concept

You create an **info-block** (service database) in the Bitrix admin panel, where services are added as individual elements. When a user opens the URL `/services/bitrix24/implementation/`, the Bitrix component automatically pulls the matching service from the database and renders it in your HTML template.

---

## 🏗️ Step 1: Creating an Info-block for Services

### 1.1. Create the info-block type

1. Go to **Content → Info-blocks → Info-block Types**
2. Click **"Add Info-block Type"**
3. Fill in:
   - **ID**: `services`
   - **Name**: `Services`
   - **Sections**: ☑ Yes
   - **RSS**: ☐ No
   - **Language**: russian
4. Save

---

### 1.2. Create the info-block

1. Go to **Content → Info-blocks → Info-block Management**
2. Click **"Add Info-block"**
3. Fill in:
   - **Info-block type**: `Services (services)`
   - **Name**: `Service Catalog`
   - **Symbolic code**: `service-catalog`
   - **Active**: ☑ Yes
   - **Sort**: `500`

4. **"Fields" tab**:
   - ☑ Element name (`NAME`)
   - ☑ Detailed description (`DETAIL_TEXT`) — **enable the visual editor**
   - ☑ Detail picture (`DETAIL_PICTURE`)
   - ☑ Announcement text (`PREVIEW_TEXT`)
   - ☑ Announcement picture (`PREVIEW_PICTURE`)

5. Save the info-block (note its **ID**, e.g., `1`)

---

### 1.3. Add info-block properties

After creating the info-block, go to **Info-block Properties**. You need to create **all properties** from the table below:

---

#### 🎨 **1. Hero Section** (main screen)

| # | Property name | Code | Type | Multiple | Required | Description |
|---|---------------|------|------|----------|----------|-------------|
| 1 | Hero title | `HERO_TITLE` | String | No | Yes | "IT infrastructure of a new level" |
| 2 | Hero description | `HERO_DESCRIPTION` | Text | No | Yes | "We help businesses automate..." |
| 3 | Hero image | `HERO_IMAGE` | File | No | Yes | Main image (to the right of the text) |

---

#### 📖 **2. "About the Company" Section** (learn more)

| # | Property name | Code | Type | Multiple | Required | Description |
|---|---------------|------|------|----------|----------|-------------|
| 4 | "Learn more" title | `ABOUT_TITLE` | String | No | Yes | "Learn more about Bitrix 24 implementation" |
| 5 | "About the company" image | `ABOUT_IMAGE` | File | No | Yes | Photo to the left of the text |

**⚠️ Note:** The text for this section is taken from the **standard DETAIL_TEXT field** (element detailed description), not from a property!

---

#### ⚙️ **3. "How Implementation Works" Section** (work process)

| # | Property name | Code | Type | Multiple | Required | Description |
|---|---------------|------|------|----------|----------|-------------|
| 6 | Process title | `PROCESS_TITLE` | String | No | Yes | "How does CRM implementation work?" |
| 7 | Process subtitle | `PROCESS_SUBTITLE` | String | No | No | "Analysis, configuration, integration and training for efficiency" |
| 8 | Process steps (titles) | `PROCESS_STEPS` | List | Yes | Yes | Step names: "Audit", "Implementation and Configuration", "Integration", "Support" |
| 9 | Process step descriptions | `PROCESS_STEPS_DESC` | List | Yes | Yes | Text for each step (must have the same number of values as PROCESS_STEPS) |

**💡 How to create a "List" property with multiple values:**

- Type: **List**
- Multiple: **☑ Yes**
- List type: **Arbitrary text** (not bound to a directory)

---

#### 💰 **4. "Pricing Plans" Section**

| # | Property name | Code | Type | Multiple | Required | Description |
|---|---------------|------|------|----------|----------|-------------|
| 10 | Pricing plans (JSON) | `TARIFFS` | Text | Yes | Yes | JSON data for each plan (usually 3) |

**Example JSON for a plan:**

**Plan 1 (Basic):**

```json
{"name":"Basic","price":"From 29 900 ₽","badge":"Price below market","old_price":"","features":["Business process audit","Basic CRM setup","Sales pipeline setup","Employee training (up to 5 people)","Technical support"]}
```

**Plan 2 (Optimal):**

```json
{"name":"Optimal","price":"From 55 000 ₽","badge":"Best value","old_price":"","features":["Business process audit","Extended CRM setup for business tasks","Integration with messengers and email","Automation of tasks and notifications setup","Team training (up to 15 people)"]}
```

**Plan 3 (Maximum with strikethrough price):**

```json
{"name":"Maximum","price":"From 120 000 ₽","badge":"-50%","old_price":"(from 180 000 ₽)","features":["Comprehensive audit and CRM strategy development","Full integration with business systems","Analytics and reporting setup","Key process automation","Employee and management training","Custom functionality"]}
```

---

#### 🎯 **5-6-8. "Advantages", "Testimonials", "Clients" Sections**

**⚠️ These sections are IDENTICAL for all services!** They are hardcoded in the template and do **NOT** require creating properties.

---

#### 🚀 **7. "Implementation and Configuration" Section** (ready-to-start)

| # | Property name | Code | Type | Multiple | Required | Description |
|---|---------------|------|------|----------|----------|-------------|
| 11 | Block title | `READY_TITLE` | String | No | Yes | "CRM implementation and configuration for your business" |
| 12 | Description | `READY_DESCRIPTION` | Text | No | Yes | Descriptive text (paragraph) |
| 13 | Advantages list | `READY_LIST` | List | Yes | Yes | Bulleted list items (usually 3) |
| 14 | Image | `READY_IMAGE` | File | No | Yes | Photo to the right of the text |

**Example values for `READY_LIST`:**

1. `Over 120 successful CRM projects across Russia and the CIS`
2. `Customer LTV increase up to 37%`
3. `Sales department operating cost reduction by 51%`

---

#### ❓ **9. "FAQ" Section** (Q&A)

| # | Property name | Code | Type | Multiple | Required | Description |
|---|---------------|------|------|----------|----------|-------------|
| 15 | FAQ questions | `FAQ_QUESTIONS` | List | Yes | Yes | Question titles (usually 6) |
| 16 | FAQ answers | `FAQ_ANSWERS` | List | Yes | Yes | Detailed answers (must have the same number of values as questions) |

**Example questions:**

1. `Why does my business need a CRM system?`
2. `How long does CRM implementation take?`
3. `How does CRM training work?`
4. `What determines the cost?`
5. `What to do after implementation?`
6. `Which CRM should I choose?`

---

#### 🔗 **10. "Related Services" Section**

**⚠️ This section is AUTOMATIC!** It automatically picks services from the same category (section), excluding the current page. It does **NOT** require creating properties.

It uses the **HERO_DESCRIPTION** of other services in the same category.

---

## 📊 **Summary Table: FULL Property List (16 items)**

| # | Property code | Type | Multiple | Required |
|---|---------------|------|----------|----------|
| 1 | `HERO_TITLE` | String | No | Yes |
| 2 | `HERO_DESCRIPTION` | Text | No | Yes |
| 3 | `HERO_IMAGE` | File | No | Yes |
| 4 | `ABOUT_TITLE` | String | No | Yes |
| 5 | `ABOUT_IMAGE` | File | No | Yes |
| 6 | `PROCESS_TITLE` | String | No | Yes |
| 7 | `PROCESS_SUBTITLE` | String | No | No |
| 8 | `PROCESS_STEPS` | List | Yes | Yes |
| 9 | `PROCESS_STEPS_DESC` | List | Yes | Yes |
| 10 | `TARIFFS` | Text | Yes | Yes |
| 11 | `READY_TITLE` | String | No | Yes |
| 12 | `READY_DESCRIPTION` | Text | No | Yes |
| 13 | `READY_LIST` | List | Yes | Yes |
| 14 | `READY_IMAGE` | File | No | Yes |
| 15 | `FAQ_QUESTIONS` | List | Yes | Yes |
| 16 | `FAQ_ANSWERS` | List | Yes | Yes |

---

## 🎨 **How to Create a Property in the Admin Panel (step by step)**

1. Go to **Content → Info-blocks → Service Catalog**
2. Click the **"Properties"** button
3. Click **"Add Property"**
4. Fill in:
   - **Name**: e.g., "Hero title"
   - **Code**: e.g., `HERO_TITLE`
   - **Type**: choose from the list (String/Text/File/List)
   - **Multiple**: ☑ if multiple values are needed (e.g., for lists)
   - **Required**: ☑ if the field must be filled
5. Save

Repeat for all 16 properties from the table above.

---

#### ✅ **"Advantages" Section**

**⚠️ THIS SECTION IS IDENTICAL FOR ALL SERVICES!** It does not require properties.

|----------------------|--------------|-----|-------|----------|
| Advantages           | `ADVANTAGES`      | List | Yes | Advantage titles |
| Advantage descriptions | `ADVANTAGES_DESC` | List | Yes | Advantage texts |
| Advantage images     | `ADVANTAGES_IMG` | File | Yes | Icons/photos |

---

## 📂 Step 2: Creating Service Sections

1. Go to **Content → Info-blocks → Service Catalog**
2. Click **"Add Section"**
3. Create sections:

| Section name | Symbolic code | Sort |
|--------------|---------------|------|
| 1C Services | `1c` | 100 |
| Bitrix 24 Services | `bitrix24` | 200 |
| IT Infrastructure | `it-infrastructure` | 300 |
| Server Solutions | `server-solutions` | 400 |

---

## 🎨 Step 3: Adding a Service (Example)

1. Go to **Content → Info-blocks → Service Catalog → Add Element**
2. Fill in:

### 📝 **Main fields:**

- **Active**: ☑ Yes
- **Name**: `Bitrix 24 Implementation`
- **Symbolic code**: `bitrix24-implementation`
- **Section**: `Bitrix 24 Services`
- **Announcement text**: Short description for service lists
- **Detailed description** (used in the "About the Company" section):

  ```
  <p>Bitrix 24 implementation is a solution for automating business processes.
  We configure the system for your tasks and integrate it with other services.</p>
  
  <p>We train employees for efficient work. Increase your team's efficiency
  and improve project management with Bitrix 24!</p>
  ```

### 🎯 **Properties:**

**Hero section:**

- **HERO_TITLE**: `IT infrastructure of a new level`
- **HERO_DESCRIPTION**: `We help businesses automate processes, ensure security, and build IT infrastructure`
- **HERO_IMAGE**: upload the image `a-new-level-of-IT-infrastructure.png`

**"About the company" section:**

- **ABOUT_TITLE**: `Learn more about Bitrix 24 implementation`
- **ABOUT_IMAGE**: upload the image `section-learn-more.png`

**Implementation process:**

- **PROCESS_TITLE**: `How does CRM implementation work?`
- **PROCESS_SUBTITLE**: `Analysis, configuration, integration and training for efficiency`
- **PROCESS_STEPS** (add 4 values):
  1. `Audit`
  2. `Implementation and Configuration`
  3. `Integration`
  4. `Support`
- **PROCESS_STEPS_DESC** (add 4 values):
  1. `We conduct a maximally detailed analysis of the current business`
  2. `Configuration according to the written specification`
  3. `Messengers, telephony, social networks, 1C, MyWarehouse`
  4. `Support, development and addition of new functionality`

**Pricing plans** (add 3 JSON values):
1.

```json
{"name":"Basic","price":"From 29 900 ₽","badge":"Price below market","old_price":"","features":["Business process audit","Basic CRM setup","Sales pipeline setup","Employee training (up to 5 people)","Technical support"]}
```

2.

```json
{"name":"Optimal","price":"From 55 000 ₽","badge":"Best value","old_price":"","features":["Business process audit","Extended CRM setup for business tasks","Integration with messengers and email","Automation of tasks and notifications setup","Team training (up to 15 people)"]}
```

3.

```json
{"name":"Maximum","price":"From 120 000 ₽","badge":"-50%","old_price":"(from 180 000 ₽)","features":["Comprehensive audit and CRM strategy development","Full integration with business systems","Analytics and reporting setup","Key process automation","Employee and management training","Custom functionality"]}
```

**Advantages** (add 4 values):

1. `Data protection`
2. `Responsiveness`
3. `Full control`
4. `Audit and approach`

**ADVANTAGES_DESC** (add 4 values):

1. `We store data on secure servers`
2. `We fix issues and deploy software for your tasks`
3. `Every stage of work is documented and confirmed`
4. `We propose solutions after a process audit`

3. Click **Save**

---

## 🔗 Step 4: Setting Up SEF URLs (Human-Readable URLs)

### 4.1. Create the `.section.php` file for the services section

Create the file `/services/.section.php`:

```php
<?php
$sSectionName = "Services";
$arDirProperties = Array(
   "description" => "Company services - 1C, Bitrix 24, IT infrastructure",
   "keywords" => "services, 1c, bitrix24, it-infrastructure"
);
?>
```

### 4.2. Create the file for the detail page

Already created at: `/local/services/bitrix24/implementation/index.php`

**Important!** In the `index.php` file, specify the correct **info-block ID** (the `IBLOCK_ID` parameter), which you noted after creating the info-block (usually `1`).

---

## 🚀 Step 5: Copying Files to the Server

Copy the created files from the `local/` folder to the **root of your Bitrix site**:

```
/local/templates/main/...              → /local/templates/main/...
/local/services/bitrix24/...           → /services/bitrix24/...
/local/services/1c/...                 → /services/1c/...
```

**⚠️ Attention!** The structure must look like this:

```
/
├── bitrix/
├── local/
│   └── templates/
│       └── main/
│           ├── header.php
│           ├── footer.php
│           └── components/
│               └── bitrix/
│                   └── news.detail/
│                       └── service_detail/
│                           └── template.php
├── services/
│   ├── bitrix24/
│   │   └── implementation/
│   │       └── index.php
│   └── 1c/
│       └── support/
│           └── index.php
└── index.php
```

---

## 🧪 Step 6: Testing

1. Open in a browser: `http://your-site.ru/services/bitrix24/implementation/`
2. You should see your page with data from the info-block!

**If the page does not open:**

- Check that the `index.php` file is in the correct folder
- Check the `IBLOCK_ID` in the file (must match the info-block ID)
- Check the `ELEMENT_CODE` (must match the element's symbolic code)

---

## 📌 Step 7: Adding the Remaining Services

Now simply **duplicate** the structure for the remaining services:

1. **Create folders:**

   ```
   /services/1c/implementation/index.php
   /services/1c/customization/index.php
   /services/1c/support/index.php
   ...
   ```

2. In each `index.php` change:
   - `ELEMENT_CODE` — element symbolic code
   - `SECTION_CODE` — section symbolic code
   - `$APPLICATION->SetTitle()` — page title

3. **Create elements in the info-block** with the corresponding symbolic codes!

---

## 🎨 Optional: "Testimonials", "FAQ", "Clients" Sections

These sections can be:

1. **Moved to separate info-blocks** (for management via the admin panel)
2. **Kept static** in the footer (if the content is the same for all pages)
3. **Added as properties** to each service (if the content differs)

**Recommendation:** Create separate "Testimonials" and "FAQ" info-blocks and render them via `bitrix:news.list` components.

---

## ✅ Final Workflow Diagram

```
User clicks "Bitrix 24 Implementation"
           ↓
URL opens: /services/bitrix24/implementation/
           ↓
Bitrix runs index.php in that folder
           ↓
index.php calls the bitrix:news.detail component
           ↓
The component finds the element with code "bitrix24-implementation"
           ↓
The component loads the template.php template
           ↓
template.php outputs HTML with data from $arResult
           ↓
The user sees a beautiful page!
```

---

## 🛠️ Troubleshooting

### Problem: 404 Page

**Solution:** Check that:

- The `index.php` file exists at the correct path
- An element with the required `ELEMENT_CODE` exists in the admin panel
- The `IBLOCK_ID` is correctly specified in the component

### Problem: Blank Page Is Displayed

**Solution:**

- Check PHP logs for errors
- Make sure all required fields are filled for the element
- Check info-block access permissions

### Problem: Images Not Loading

**Solution:**

- Make sure "File" type properties are created correctly
- Check that images are uploaded for the element
- Check the code: `CFile::GetPath($arResult['PROPERTIES']['...']['VALUE'])`

---

## 📚 Useful Links

- [Bitrix Documentation](https://dev.1c-bitrix.ru/)
- [news.detail component](https://dev.1c-bitrix.ru/api_help/iblock/components/news_detail.php)
- [Info-blocks](https://dev.1c-bitrix.ru/learning/course/index.php?COURSE_ID=43&LESSON_ID=2830)

---

## 🎉 Done

Now you can:

1. ✅ Create new services via the admin panel
2. ✅ Edit content without programming
3. ✅ Use a single template for all services
4. ✅ Scale the structure painlessly

**Good luck with the implementation! 🚀**
