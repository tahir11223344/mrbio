# Sort Number Validation - Equipment Categories

## Kya Kiya Gaya

Sort number field mein smart validation add ki gayi hai jo ensure karta hai ke user sirf valid range mein numbers enter kar sake.

## Validation Logic

### Rule
- **Minimum**: 0 (zero se start ho sakta hai)
- **Maximum**: Current max sort number + 1

### Example Scenarios

#### Scenario 1: 10 Entries Already Exist
- Current max sort number: 10
- **Allowed values**: 0 to 11
- **Rejected values**: 12, 30, 100, etc.

#### Scenario 2: No Entries Exist
- Current max sort number: 0
- **Allowed values**: 0 to 1
- **Rejected values**: 2, 5, 10, etc.

#### Scenario 3: Adding Between Existing Numbers
- Current entries: 1, 2, 3, 5, 10
- Current max: 10
- **Allowed**: 0, 4, 6, 7, 8, 9, 11
- **Rejected**: 12, 15, 20, etc.

## Implementation Details

### Backend Validation

#### Store Method (Add New)
```php
$maxSortNumber = EquipmentCategory::max('sort_number') ?? 0;
$nextAllowedSort = $maxSortNumber + 1;

// Validation rule
'sort_number' => [
    'required',
    'integer',
    'min:0',
    function ($attribute, $value, $fail) use ($nextAllowedSort) {
        if ($value > $nextAllowedSort) {
            $fail("Sort number cannot be greater than {$nextAllowedSort}");
        }
    },
]
```

#### Update Method (Edit Existing)
```php
// Exclude current record from max calculation
$maxSortNumber = EquipmentCategory::where('id', '!=', $id)->max('sort_number') ?? 0;
$nextAllowedSort = $maxSortNumber + 1;

// Same validation rule as store
```

### Frontend Helper Text

#### Add Form
```
Lower numbers appear first. You can use 0 to 11.
```

#### Edit Form
```
Lower numbers appear first. Maximum allowed: 11.
```

## Error Messages

### When User Enters Invalid Number

**Example**: 10 entries exist, user enters 30
```
Sort number cannot be greater than 11. Current maximum is 10.
```

**Example**: No entries exist, user enters 5
```
Sort number cannot be greater than 1. Current maximum is 0.
```

## Benefits

### 1. Prevents Gaps
- User cannot create large gaps in sort numbers
- Keeps numbering sequential and manageable

### 2. Allows Reordering
- User can still insert between existing numbers
- Example: If you have 1, 2, 5, you can add 3 or 4

### 3. Clear Feedback
- Helper text shows allowed range
- Error message explains why validation failed

### 4. Flexible
- Allows 0 as starting number
- Allows any number up to max + 1

## Usage Examples

### Example 1: Adding First Item
```
Current entries: None
Max allowed: 1
User can enter: 0 or 1
```

### Example 2: Adding to Existing List
```
Current entries: 5 items (sort: 0, 1, 2, 3, 4)
Max allowed: 5
User can enter: 0 to 5
```

### Example 3: Filling Gap
```
Current entries: 0, 1, 5, 10
Max allowed: 11
User can enter: 0 to 11 (including 2, 3, 4, 6, 7, 8, 9)
```

### Example 4: Editing Existing
```
Current entries: 10 items (0-9)
Editing item with sort: 5
Max allowed: 10 (excluding current item's 5)
User can enter: 0 to 10
```

## Testing

### Test Case 1: Add with Valid Number
1. Check current max (e.g., 10)
2. Enter 11 or less
3. Should save successfully ✅

### Test Case 2: Add with Invalid Number
1. Check current max (e.g., 10)
2. Enter 30
3. Should show error: "Sort number cannot be greater than 11" ❌

### Test Case 3: Add Between Numbers
1. Current: 0, 1, 5, 10
2. Enter 3
3. Should save successfully ✅

### Test Case 4: Edit Existing
1. Edit item with sort 5
2. Change to 8
3. Should save successfully ✅

## Technical Details

### Files Modified
1. **Controller**: `app/Http/Controllers/EquipmentCategoryController.php`
   - Added custom validation in `store()` method
   - Added custom validation in `update()` method

2. **View**: `resources/views/pages/equipment-categories/index.blade.php`
   - Added helper text in add form
   - Added helper text in edit form

### Validation Type
- **Backend**: Custom closure validation
- **Frontend**: Helper text (informational only)
- **Database**: No constraint (handled by application logic)

## Note
- Validation sirf backend par hai (security ke liye)
- Frontend helper text sirf guidance ke liye hai
- User ko clear error message milta hai agar invalid number enter kare
- Existing data ko koi effect nahi hota
