# SIBANTAR - Design System Documentation

## 🎨 Color Palette

### Primary (Blue)

-   `primary-50`: #E3F2FD
-   `primary-100`: #BBDEFB
-   `primary-200`: #90CAF9
-   `primary-300`: #64B5F6
-   `primary-400`: #42A5F5
-   `primary-500`: #2196F3
-   `primary-600`: #1976D2
-   **`primary-700`: #0051BA** ← Main Brand Color
-   `primary-800`: #004494
-   `primary-900`: #003775

### Secondary (Orange)

-   `secondary-50`: #FFF3E0
-   `secondary-100`: #FFE0B2
-   `secondary-200`: #FFCC80
-   `secondary-300`: #FFB74D
-   `secondary-400`: #FFA726
-   **`secondary-500`: #FF9800** ← Main Accent Color
-   `secondary-600`: #FB8C00
-   `secondary-700`: #F57C00
-   `secondary-800`: #EF6C00
-   `secondary-900`: #E65100

### Success (Green)

-   `success-500`: #4CAF50
-   `success-600`: #43A047

### Danger (Red)

-   `danger-500`: #F44336
-   `danger-600`: #E53935

### Warning (Yellow)

-   `warning-500`: #FFEB3B
-   `warning-600`: #FDD835

### Info (Cyan)

-   `info-500`: #00BCD4
-   `info-600`: #00ACC1

### Neutral (Gray)

-   `neutral-50`: #FAFAFA
-   `neutral-100`: #F5F5F5
-   `neutral-200`: #EEEEEE
-   `neutral-300`: #E0E0E0
-   `neutral-400`: #BDBDBD
-   `neutral-500`: #9E9E9E
-   `neutral-600`: #757575
-   `neutral-700`: #616161
-   `neutral-800`: #424242
-   `neutral-900`: #212121

---

## 📝 Typography

### Font Family

-   **Default**: Inter (Google Fonts)
-   Fallback: Sans-serif

### Font Sizes

| Class       | Size | Line Height | Usage               |
| ----------- | ---- | ----------- | ------------------- |
| `text-xs`   | 12px | 16px        | Small text, labels  |
| `text-sm`   | 14px | 20px        | Labels, captions    |
| `text-base` | 16px | 24px        | Body text (default) |
| `text-lg`   | 18px | 28px        | Subheadings         |
| `text-xl`   | 20px | 28px        | Card titles         |
| `text-2xl`  | 24px | 32px        | Section titles      |
| `text-3xl`  | 30px | 36px        | H3                  |
| `text-4xl`  | 36px | 40px        | H2                  |
| `text-5xl`  | 48px | 1           | H1                  |

### Font Weights

-   `font-light`: 300
-   `font-normal`: 400
-   `font-medium`: 500
-   `font-semibold`: 600
-   `font-bold`: 700
-   `font-extrabold`: 800
-   `font-black`: 900

---

## 🧩 Components

### Buttons

#### Primary Button

```html
<button class="btn btn-primary">Masuk</button>
```

#### Secondary Button

```html
<button class="btn btn-secondary">Cari Bengkel</button>
```

#### Outline Button

```html
<button class="btn btn-outline">Daftar</button>
```

#### Button Sizes

```html
<button class="btn btn-primary btn-sm">Small</button>
<button class="btn btn-primary">Default</button>
<button class="btn btn-primary btn-lg">Large</button>
```

### Cards

```html
<div class="card p-6">
    <!-- Content -->
</div>
```

### Inputs

```html
<input type="text" class="input" placeholder="Masukkan teks..." />
```

### Select/Dropdown

```html
<select class="select">
    <option>Pilih opsi</option>
</select>
```

---

## 📐 Spacing

### Custom Spacing

-   `spacing-18`: 72px (4.5rem)
-   `spacing-22`: 88px (5.5rem)
-   `spacing-26`: 104px (6.5rem)
-   `spacing-30`: 120px (7.5rem)
-   `spacing-34`: 136px (8.5rem)

---

## 🔲 Border Radius

-   `rounded-sm`: 6px
-   `rounded`: 8px (default)
-   `rounded-md`: 12px
-   `rounded-lg`: 16px
-   `rounded-xl`: 20px
-   `rounded-2xl`: 24px
-   `rounded-3xl`: 32px

---

## 🌑 Shadows

-   `shadow-sm`: Small shadow
-   `shadow`: Default shadow
-   `shadow-md`: Medium shadow
-   `shadow-lg`: Large shadow
-   `shadow-xl`: Extra large shadow
-   `shadow-2xl`: Double extra large shadow

---

## 📱 Reusable Components

### Header

```blade
<x-header />
```

### Footer

```blade
<x-footer />
```

### Layout

```blade
<x-layout>
    <x-slot:title>Page Title</x-slot:title>

    <!-- Content here -->
</x-layout>
```

---

## 🚀 Usage Examples

### Creating a New Page

```blade
<x-layout>
    <x-slot:title>Judul Halaman</x-slot:title>

    <section class="py-12">
        <div class="container mx-auto px-4">
            <h1>Welcome to SIBANTAR</h1>
            <p class="text-neutral-600">Description here...</p>
        </div>
    </section>
</x-layout>
```

### Creating a Form

```blade
<form class="space-y-4">
    <div>
        <label class="block text-sm font-medium mb-2">Label</label>
        <input type="text" class="input" placeholder="Placeholder">
    </div>

    <button type="submit" class="btn btn-primary w-full">
        Submit
    </button>
</form>
```

---

## 📂 File Structure

```
resources/
├── css/
│   └── app.css                 # Tailwind CSS + Custom Styles
├── js/
│   ├── app.js                  # Main JavaScript
│   └── bootstrap.js
└── views/
    ├── components/
    │   ├── header.blade.php    # Header component
    │   ├── footer.blade.php    # Footer component
    │   └── layout.blade.php    # Main layout
    ├── home.blade.php          # Homepage
    └── layouts/
        └── app.blade.php       # Alternative layout
```

---

## 🎯 Best Practices

1. **Always use custom colors** from the palette instead of default Tailwind colors
2. **Use component classes** (.btn, .card, .input) for consistency
3. **Mobile-first approach** - design for mobile, then scale up with `lg:` prefix
4. **Use Inter font** for all text
5. **Maintain spacing consistency** using Tailwind's spacing scale
6. **Always include header and footer** using `<x-header />` and `<x-footer />`

---

Created: November 1, 2025
Last Updated: November 1, 2025
