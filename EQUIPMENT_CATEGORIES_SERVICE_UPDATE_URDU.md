# Equipment Categories - "Sale" to "Service" Update

## Kya Kiya Gaya

"Sale" option ko "Service" se replace kar diya gaya taake Biomed Services page par equipment categories show hon.

## Changes Summary

### Database
- ✅ Migration updated: `show_on` enum values changed
- ✅ Old value: `'sale', 'rental', 'both', 'none'`
- ✅ New value: `'service', 'rental', 'both', 'none'`
- ✅ Existing data automatically migrated (sale → service)

### Backend Files Updated

#### 1. Controller
**File**: `app/Http/Controllers/EquipmentCategoryController.php`
- Validation updated: `in:service,rental,both,none`

#### 2. DataTable
**File**: `app/DataTables/EquipmentCategoryDataTable.php`
- Badge updated: `'service' => 'Service'`

#### 3. Component
**File**: `app/View/Components/RentalProductListColumns.php`
- Logic updated: `'service' => ['service', 'both']`

#### 4. Seeder
**File**: `database/seeders/EquipmentCategorySeeder.php`
- Sample data updated with 'service' values

### Frontend Files Updated

#### 1. Admin Form
**File**: `resources/views/pages/equipment-categories/index.blade.php`
- Add Modal: "Both (Service & Rental)", "Service Only"
- Edit Modal: "Both (Service & Rental)", "Service Only"

#### 2. Services Page
**File**: `resources/views/frontend/pages/services.blade.php`
- Component updated: `<x-rental-product-list-columns type="service" />`

## Show On Options - Updated

### Admin Panel Dropdown

| Option | Display Text | Shows On |
|--------|-------------|----------|
| `both` | Both (Service & Rental) | Biomed Services + Rental |
| `service` | Service Only | Biomed Services only |
| `rental` | Rental Only | Rental Services only |
| `none` | None | Nowhere |

## Pages Display Logic

### Biomed Services Page (`/services`)
- **Component**: `<x-rental-product-list-columns type="service" />`
- **Shows**: Equipment with `show_on` = 'service' OR 'both'

### Rental Services Page (`/rental-services`)
- **Component**: `<x-rental-product-list-columns type="rental" />`
- **Shows**: Equipment with `show_on` = 'rental' OR 'both'

## Testing

### Admin Panel
1. ✅ Equipment Categories → Add New
2. ✅ "Show On" dropdown should show:
   - Both (Service & Rental)
   - Service Only
   - Rental Only
   - None
3. ✅ Save and verify

### Frontend Pages

#### Test 1: Service Only Equipment
1. Admin: Add equipment with "Show On" = "Service Only"
2. Check `/services` → Should show ✅
3. Check `/rental-services` → Should NOT show ❌

#### Test 2: Rental Only Equipment
1. Admin: Add equipment with "Show On" = "Rental Only"
2. Check `/services` → Should NOT show ❌
3. Check `/rental-services` → Should show ✅

#### Test 3: Both Equipment
1. Admin: Add equipment with "Show On" = "Both (Service & Rental)"
2. Check `/services` → Should show ✅
3. Check `/rental-services` → Should show ✅

## Migration Details

### Migration File
`database/migrations/2026_03_06_130238_update_equipment_categories_show_on_values.php`

### What It Does
1. Adds 'service' to enum temporarily
2. Updates all 'sale' values to 'service'
3. Removes 'sale' from enum
4. Final enum: `'service', 'rental', 'both', 'none'`

### Rollback
Migration can be rolled back to restore 'sale' values if needed.

## Summary Table

| Feature | Old Value | New Value |
|---------|-----------|-----------|
| Enum Option | sale | service |
| Display Text | Sale Only | Service Only |
| Shows On | (Not used) | Biomed Services |
| Badge Color | Primary (Blue) | Primary (Blue) |

## Benefits

1. ✅ **Correct Naming**: "Service" matches "Biomed Services" page
2. ✅ **Clear Logic**: Service equipment shows on Service page
3. ✅ **Flexible**: Can still use "Both" for both pages
4. ✅ **Data Preserved**: Existing data automatically migrated

## Note
- Purana "Sale" option ab "Service" ban gaya hai
- Existing data automatically update ho gaya
- Admin panel mein dropdown updated hai
- Frontend pages properly configured hain
