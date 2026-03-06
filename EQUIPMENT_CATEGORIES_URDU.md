# Equipment Categories Feature - اردو میں

## خلاصہ
ایک نیا admin section بنایا گیا ہے جس سے آپ equipment categories کو manage کر سکتے ہیں جو rental اور sale product sections میں دکھائی دیتی ہیں۔

## Admin Panel میں کیسے جائیں

1. اپنے admin dashboard میں login کریں
2. Sidebar menu میں جائیں
3. Products section کے نیچے **"Equipment Categories"** تلاش کریں

## Features

### Fields (خانے)
- **Name**: Equipment کا نام (مثال: "Patient Monitors", "Defibrillators")
- **URL**: Optional link جہاں user click کرنے پر جائے گا (خالی چھوڑیں تو default rental services page پر جائے گا)
- **Show On**: یہ control کرتا ہے کہ equipment کہاں دکھائی دے:
  - `Both (Sale & Rental)` - دونوں sale اور rental pages پر دکھائی دے گی
  - `Sale Only` - صرف sale pages پر دکھائی دے گی
  - `Rental Only` - صرف rental pages پر دکھائی دے گی
  - `None` - کسی بھی page پر نہیں دکھائی دے گی
- **Sort Number**: Display order control کرتا ہے (کم نمبر پہلے آئیں گے)

## کیسے کام کرتا ہے

### Frontend پر Display
Equipment categories 3 columns میں دکھائی دیتی ہیں:
- Rental Services page (`/rental-services`)
- Services page (`/services`)

## Equipment Categories کو Manage کرنا

### نئی Equipment Add کرنا
1. "Add Equipment Category" button پر click کریں
2. Required fields بھریں
3. "Show On" option set کریں (جہاں دکھانا چاہتے ہیں)
4. Sort number set کریں (0 = پہلے، زیادہ نمبر بعد میں)
5. Submit پر click کریں

### Equipment Edit کرنا
1. کسی بھی equipment row پر "Actions" dropdown پر click کریں
2. "Edit" select کریں
3. Fields update کریں
4. Update پر click کریں

### Equipment Delete کرنا
1. کسی بھی equipment row پر "Actions" dropdown پر click کریں
2. "Delete" select کریں
3. Deletion confirm کریں

## Sample Data
کچھ sample equipment categories پہلے سے add کی گئی ہیں:
- Patient Monitors (Both)
- Defibrillators (Both)
- Infusion Pumps (Rental Only)
- Ventilators (Both)
- Ultrasound Machines (Sale Only)
- ECG Machines (Both)
- Surgical Tables (Rental Only)
- Anesthesia Machines (Both)
- X-Ray Equipment (Sale Only)

## نوٹ
- پرانا product-based system اس نئے equipment categories system سے replace ہو گیا ہے
- صرف وہ equipment categories دکھائی دیں گی جن کی "Show On" setting مناسب ہو
- Equipment پہلے "Sort Number" سے sort ہوتی ہے، پھر alphabetically name سے
- اگر URL نہیں دیا گیا تو equipment پر click کرنے سے rental services page پر redirect ہو گا
- یہ section صرف rental اور sale pages میں دکھائی دیتا ہے
- باقی code پر کوئی اثر نہیں پڑا ہے
