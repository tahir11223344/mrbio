# Equipment Categories Feature

## Overview
A new admin section has been created to manage equipment categories that appear in the rental and sale product sections of your website.

## Admin Panel Access

1. Login to your admin dashboard
2. Navigate to the sidebar menu
3. Look for **"Equipment Categories"** under the Products section

## Features

### Fields
- **Name**: The name of the equipment (e.g., "Patient Monitors", "Defibrillators")
- **URL**: Optional link where users will be redirected when clicking the equipment (leave empty to use default rental services page)
- **Show On**: Controls where this equipment appears:
  - `Both (Sale & Rental)` - Shows on both sale and rental pages
  - `Sale Only` - Shows only on sale pages
  - `Rental Only` - Shows only on rental pages
  - `None` - Hidden from all pages
- **Sort Number**: Controls the display order (lower numbers appear first)

## How It Works

### Frontend Display
The equipment categories are displayed in 3 columns on:
- Rental Services page (`/rental-services`)
- Services page (`/services`)

### Component Usage
The component can be used in blade templates:

```blade
{{-- For rental equipment --}}
<x-rental-product-list-columns type="rental" />

{{-- For sale equipment --}}
<x-rental-product-list-columns type="sale" />

{{-- For both (default is rental) --}}
<x-rental-product-list-columns />
```

## Sample Data
Sample equipment categories have been seeded with the following:
- Patient Monitors (Both)
- Defibrillators (Both)
- Infusion Pumps (Rental Only)
- Ventilators (Both)
- Ultrasound Machines (Sale Only)
- ECG Machines (Both)
- Surgical Tables (Rental Only)
- Anesthesia Machines (Both)
- X-Ray Equipment (Sale Only)

## Managing Equipment Categories

### Adding New Equipment
1. Click "Add Equipment Category" button
2. Fill in the required fields
3. Set the "Show On" option based on where you want it displayed
4. Set a sort number (0 = first, higher numbers appear later)
5. Click Submit

### Editing Equipment
1. Click the "Actions" dropdown on any equipment row
2. Select "Edit"
3. Update the fields as needed
4. Click Update

### Deleting Equipment
1. Click the "Actions" dropdown on any equipment row
2. Select "Delete"
3. Confirm the deletion

## Technical Details

### Database
- Table: `equipment_categories`
- Migration: `2026_03_06_104920_create_equipment_categories_table.php`

### Files Created/Modified
- Model: `app/Models/EquipmentCategory.php`
- Controller: `app/Http/Controllers/EquipmentCategoryController.php`
- DataTable: `app/DataTables/EquipmentCategoryDataTable.php`
- Component: `app/View/Components/RentalProductListColumns.php` (updated)
- Views:
  - `resources/views/pages/equipment-categories/index.blade.php`
  - `resources/views/pages/equipment-categories/columns/_actions.blade.php`
  - `resources/views/components/rental-product-list-columns.blade.php` (updated)
- Routes: Added to `routes/web.php`
- Sidebar: Updated `resources/views/layout/partials/sidebar-layout/sidebar/admin-sidebar.blade.php`

### Routes
- List: `GET /admin/equipment-categories`
- Store: `POST /admin/equipment-categories/store`
- Update: `PUT /admin/equipment-categories/{id}`
- Delete: `DELETE /admin/equipment-categories/{id}`

## Notes
- The old product-based system has been replaced with this new equipment categories system
- Only equipment categories with appropriate "Show On" settings will appear on respective pages
- Equipment is sorted by "Sort Number" first, then alphabetically by name
- If no URL is provided, clicking the equipment will redirect to the rental services page
