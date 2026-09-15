# 📋 Cheat Sheet: "Service Catalog" Info-block Property List

## ✅ FULL property list to create in the admin panel

Create **18 properties** in **Content → Info-blocks → Service Catalog → Properties**

---

### 📝 Table of All Properties

| # | Name | Code | Type | Multiple | Required | HTML Section |
|---|------|------|------|----------|----------|--------------|
| 1 | Hero title | `HERO_TITLE` | String | ☐ | ☑ | section--hero |
| 2 | Hero description | `HERO_DESCRIPTION` | Text | ☐ | ☑ | section--hero |
| 3 | Hero image | `HERO_IMAGE` | File | ☐ | ☑ | section--hero |
| 4 | "Learn more" title | `ABOUT_TITLE` | String | ☐ | ☑ | section--about-company |
| 5 | "About the company" image | `ABOUT_IMAGE` | File | ☐ | ☑ | section--about-company |
| 6 | "About the company" description | `ABOUT_DESCRIPTION` | Text (HTML) | ☐ | ☑ | section--about-company |
| 7 | Process title | `PROCESS_TITLE` | String | ☐ | ☑ | section--work-process |
| 7 | Process subtitle | `PROCESS_SUBTITLE` | String | ☐ | ☐ | section--work-process |
| 8 | Process subtitle | `PROCESS_SUBTITLE` | String | ☐ | ☐ | section--work-process |
| 9 | Process steps (names) | `PROCESS_STEPS` | List | ☑ | ☑ | section--work-process |
| 10 | Process step descriptions | `PROCESS_STEPS_DESC` | List | ☑ | ☑ | section--work-process |
| 11 | Process step images | `PROCESS_STEPS_IMAGES` | File | ☑ | ☐ | section--work-process |
| 12 | Pricing plans JSON | `TARIFFS` | Text | ☑ | ☑ | section--pricing |
| 13 | "Ready" title | `READY_TITLE` | String | ☐ | ☑ | section--ready-to-start |
| 14 | "Ready" description | `READY_DESCRIPTION` | Text | ☐ | ☑ | section--ready-to-start |
| 15 | Advantages list | `READY_LIST` | List | ☑ | ☑ | section--ready-to-start |
| 16 | "Ready" image | `READY_IMAGE` | File | ☐ | ☑ | section--ready-to-start |
| 17 | FAQ questions | `FAQ_QUESTIONS` | List | ☑ | ☑ | section--faq |
| 18 | FAQ answers | `FAQ_ANSWERS` | List | ☑ | ☑ | section--faq |

**Legend:**

- ☑ = Yes
- ☐ = No
- **Multiple** = Multiple values allowed
- **Required** = Must be filled in

---

## 🎯 Which Sections Do NOT Require Properties (Identical for All)

✅ **section--advantages** — Work advantages (4 cards)  
✅ **section--reviews** — Client testimonials (6 cards)  
✅ **section--clients** — Client logos (14 logos)  
✅ **section--services-opportunities** — Related services (automatic selection)

---

## 📦 Standard Info-block Fields (Not Properties!)

These fields are created automatically when an element is created:

| Field | Required | Usage in the template |
|-------|----------|-----------------------|
| `NAME` | ☑ | Service name (headings, breadcrumbs) |
| `PREVIEW_TEXT` | ☐ | Short description (for service lists) |
| `PREVIEW_PICTURE` | ☐ | Announcement image (for list cards) |
| `DETAIL_PICTURE` | ☐ | Main detail image (optional) |

**⚠️ IMPORTANT:** The text for the "About the Company" section is now in the **ABOUT_DESCRIPTION property** (#6), not in the standard DETAIL_TEXT field!

---

## 🎨 Example Values for the "Bitrix 24 Implementation" Service

### 1. HERO_TITLE (String)

```
IT infrastructure of a new level
```

### 2. HERO_DESCRIPTION (Text)

```
We help businesses automate processes, ensure security, and build IT infrastructure
```

### 3. HERO_IMAGE (File)

Upload: `a-new-level-of-IT-infrastructure.png`

---

### 4. ABOUT_TITLE (String)

```
Learn more about Bitrix 24 implementation
```

### 5. ABOUT_IMAGE (File)

Upload: `section-learn-more.png`

---

### 6. ABOUT_DESCRIPTION (HTML Text)

**⚠️ IMPORTANT:** This is an "HTML/Text" type property — it will have a visual editor!

```html
<p>Bitrix 24 implementation is a solution for automating business processes.
We configure the system for your tasks and integrate it with other services.</p>

<p>We train employees for efficient work. Increase your team's efficiency
and improve project management with Bitrix 24!</p>
```

**How to fill in:**

1. In the admin panel, find the "About the Company description" property
2. Enter 2-3 paragraphs of text (you can use the visual editor)
3. Save the element

---

### 7. PROCESS_TITLE (String)

```
How does CRM implementation work?
```

### 8. PROCESS_SUBTITLE (String)

```
Analysis, configuration, integration and training for efficiency
```

### 9. PROCESS_STEPS (List, 4 values)

```
Value 1: Audit
Value 2: Implementation and Configuration
Value 3: Integration
Value 4: Support
```

### 10. PROCESS_STEPS_DESC (List, 4 values)

```
Value 1: We conduct a maximally detailed analysis of the current business
Value 2: Configuration according to the written specification
Value 3: Messengers, telephony, social networks, 1C, MyWarehouse
Value 4: Support, development and addition of new functionality
```

### 11. PROCESS_STEPS_IMAGES (File, 4 values)

**⚠️ This field is NOT required!** If no images are uploaded, default images from the template will be used.

Upload **4 images** in the same order as the step names:

```
File 1: audit-section-crm-proces.png (or your own image for "Audit")
File 2: implem-section-crm-proces.png (or your own image for "Implementation")
File 3: integration-section-crm-proces.png (or your own image for "Integration")
File 4: escort-section-crm-proces.png (or your own image for "Support")
```

**How to upload:**

1. In the admin panel, open the "Bitrix 24 Implementation" element
2. Find the "Process step images" property
3. Click "Add" 4 times and upload one image each time
4. Save the element

---

### 12. TARIFFS (Text, 3 JSON values)

**Value 1 (Basic):**

```json
{"name":"Basic","price":"From 29 900 ₽","badge":"Price below market","old_price":"","features":["Business process audit","Basic CRM setup","Sales pipeline setup","Employee training (up to 5 people)","Technical support"]}
```

**Value 2 (Optimal):**

```json
{"name":"Optimal","price":"From 55 000 ₽","badge":"Best value","old_price":"","features":["Business process audit","Extended CRM setup for business tasks","Integration with messengers and email","Automation of tasks and notifications setup","Team training (up to 15 people)"]}
```

**Value 3 (Maximum with strikethrough price):**

```json
{"name":"Maximum","price":"From 120 000 ₽","badge":"-50%","old_price":"(from 180 000 ₽)","features":["Comprehensive audit and CRM strategy development","Full integration with business systems","Analytics and reporting setup","Key process automation","Employee and management training","Custom functionality"]}
```

---

### 13. READY_TITLE (String)

```
CRM implementation and configuration for your business
```

### 14. READY_DESCRIPTION (Text)

```
We analyze processes and implement a CRM tailored to your company's tasks, automating sales and client control. We integrate messengers, telephony and 1C, reduce routine work and increase efficiency
```

### 15. READY_LIST (List, 3 values)

```
Value 1: Over 120 successful CRM projects across Russia and the CIS
Value 2: Customer LTV increase up to 37%
Value 3: Sales department operating cost reduction by 51%
```

### 16. READY_IMAGE (File)

Upload: `ready-to-start-img.png`

---

### 17. FAQ_QUESTIONS (List, 6 values)

```
Value 1: Why does my business need a CRM system?
Value 2: How long does CRM implementation take?
Value 3: How does CRM training work?
Value 4: What determines the cost?
Value 5: What to do after implementation?
Value 6: Which CRM should I choose?
```

### 18. FAQ_ANSWERS (List, 6 values)

```
Value 1: A CRM system helps systematize client management, automate business processes and increase sales. It allows you to store the entire interaction history with clients in one place, track deals at every stage of the sales pipeline and analyze your team's efficiency.

Value 2: CRM implementation timelines depend on the scale of your business, the complexity of integrations and the volume of personal data. On average, the process takes from several weeks to several months. We conduct a preliminary analysis of your tasks and business processes to determine the most optimal timelines and provide you with an implementation plan.

Value 3: We provide comprehensive training for your team, including theoretical sessions and practical workshops. The training is adapted to the specifics of your business and covers working with the main system modules, setting up sales pipelines and process automation. After training we provide technical support.

Value 4: The cost of CRM implementation consists of several components: the system license, configuration and customization work for your business processes, integration with other services, employee training and technical support. We offer flexible pricing plans so you can choose the optimal option.

Value 5: After CRM implementation we stay in touch for technical support and consultations. We recommend regularly analyzing the efficiency of system usage, optimizing business processes and training new employees. We also offer services for further functionality development and system scaling as your business grows.

Value 6: The choice of CRM depends on the specifics of your business, the number of employees and the tasks that need to be solved. We work with Bitrix24 — a powerful Russian platform that includes CRM, tasks and projects, telephony, chats and much more. We will conduct an audit and help determine the optimal solution for you.
```

---

## 🔄 Project File Structure

```
local/
├── templates/
│   └── main/
│       └── components/
│           └── bitrix/
│               ├── news.detail/
│               │   └── service_detail/
│               │       └── template.php (service page template)
│               └── news.list/
│                   └── related_services/
│                       └── template.php (related services block)
└── services/
    ├── bitrix24/
    │   └── implementation/
    │       └── index.php (component call)
    └── 1c/
        └── support/
            └── index.php (component call)
```

---

## ✅ Verification Checklist

- [ ] The "Service Catalog" info-block is created with ID = 1
- [ ] All 16 properties from the table above are created
- [ ] Sections are created: 1c, bitrix24, it-infrastructure, server-solutions
- [ ] Files from `local/` are copied to the site root
- [ ] The correct `IBLOCK_ID` is specified in the `index.php` file
- [ ] The first service "Bitrix 24 Implementation" is created
- [ ] All required fields and properties are filled in
- [ ] The page opens at the URL `/services/bitrix24/implementation/`

---

## 🚀 Done

Now you can create new services simply by **duplicating the existing one** and changing the content! 🎉
