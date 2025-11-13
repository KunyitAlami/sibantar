import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        container: {
            center: true,
            padding: {
                DEFAULT: "1rem",
                sm: "1.5rem",
                lg: "2rem",
                xl: "2rem",
                "2xl": "2rem",
            },
            screens: {
                sm: "640px",
                md: "768px",
                lg: "1024px",
                xl: "1200px",
                "2xl": "1200px",
            },
        },
        extend: {
            fontFamily: {
                sans: ["Inter", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Primary Colors (Blue)
                primary: {
                    50: "#E3F2FD",
                    100: "#BBDEFB",
                    200: "#90CAF9",
                    300: "#64B5F6",
                    400: "#42A5F5",
                    500: "#2196F3",
                    600: "#1976D2",
                    700: "#0051BA", // Main brand color
                    800: "#004494",
                    900: "#003775",
                },
                // Secondary Colors (Orange)
                secondary: {
                    50: "#FFF3E0",
                    100: "#FFE0B2",
                    200: "#FFCC80",
                    300: "#FFB74D",
                    400: "#FFA726",
                    500: "#FF9800", // Main accent color
                    600: "#FB8C00",
                    700: "#F57C00",
                    800: "#EF6C00",
                    900: "#E65100",
                },
                // Success (Green)
                success: {
                    50: "#E8F5E9",
                    100: "#C8E6C9",
                    200: "#A5D6A7",
                    300: "#81C784",
                    400: "#66BB6A",
                    500: "#4CAF50",
                    600: "#43A047",
                    700: "#388E3C",
                    800: "#2E7D32",
                    900: "#1B5E20",
                },
                // Danger (Red)
                danger: {
                    50: "#FFEBEE",
                    100: "#FFCDD2",
                    200: "#EF9A9A",
                    300: "#E57373",
                    400: "#EF5350",
                    500: "#F44336",
                    600: "#E53935",
                    700: "#D32F2F",
                    800: "#C62828",
                    900: "#B71C1C",
                },
                // Warning (Yellow)
                warning: {
                    50: "#FFFDE7",
                    100: "#FFF9C4",
                    200: "#FFF59D",
                    300: "#FFF176",
                    400: "#FFEE58",
                    500: "#FFEB3B",
                    600: "#FDD835",
                    700: "#FBC02D",
                    800: "#F9A825",
                    900: "#F57F17",
                },
                // Info (Cyan)
                info: {
                    50: "#E0F7FA",
                    100: "#B2EBF2",
                    200: "#80DEEA",
                    300: "#4DD0E1",
                    400: "#26C6DA",
                    500: "#00BCD4",
                    600: "#00ACC1",
                    700: "#0097A7",
                    800: "#00838F",
                    900: "#006064",
                },
                // Neutral/Gray
                neutral: {
                    50: "#FAFAFA",
                    100: "#F5F5F5",
                    200: "#EEEEEE",
                    300: "#E0E0E0",
                    400: "#BDBDBD",
                    500: "#9E9E9E",
                    600: "#757575",
                    700: "#616161",
                    800: "#424242",
                    900: "#212121",
                },
            },
            fontSize: {
                // Custom font sizes for consistency
                xs: ["0.75rem", { lineHeight: "1rem" }], // 12px
                sm: ["0.875rem", { lineHeight: "1.25rem" }], // 14px
                base: ["1rem", { lineHeight: "1.5rem" }], // 16px
                lg: ["1.125rem", { lineHeight: "1.75rem" }], // 18px
                xl: ["1.25rem", { lineHeight: "1.75rem" }], // 20px
                "2xl": ["1.5rem", { lineHeight: "2rem" }], // 24px
                "3xl": ["1.875rem", { lineHeight: "2.25rem" }], // 30px
                "4xl": ["2.25rem", { lineHeight: "2.5rem" }], // 36px
                "5xl": ["3rem", { lineHeight: "1" }], // 48px
                "6xl": ["3.75rem", { lineHeight: "1" }], // 60px
                "7xl": ["4.5rem", { lineHeight: "1" }], // 72px
            },
            spacing: {
                // Custom spacing for consistency
                18: "4.5rem", // 72px
                22: "5.5rem", // 88px
                26: "6.5rem", // 104px
                30: "7.5rem", // 120px
                34: "8.5rem", // 136px
            },
            borderRadius: {
                // Custom border radius
                sm: "0.375rem", // 6px
                DEFAULT: "0.5rem", // 8px
                md: "0.75rem", // 12px
                lg: "1rem", // 16px
                xl: "1.25rem", // 20px
                "2xl": "1.5rem", // 24px
                "3xl": "2rem", // 32px
            },
            boxShadow: {
                sm: "0 1px 2px 0 rgb(0 0 0 / 0.05)",
                DEFAULT:
                    "0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1)",
                md: "0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1)",
                lg: "0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1)",
                xl: "0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1)",
                "2xl": "0 25px 50px -12px rgb(0 0 0 / 0.25)",
            },
        },
    },
    plugins: [require("daisyui")],
    daisyui: {
        themes: [
            {
                sibantar: {
                    "primary": "#0051BA",
                    "secondary": "#FF9800",
                    "accent": "#00BCD4",
                    "neutral": "#212121",
                    "base-100": "#FFFFFF",
                    "info": "#2196F3",
                    "success": "#4CAF50",
                    "warning": "#FFEB3B",
                    "error": "#F44336",
                },
            },
            "light",
            "dark",
        ],
        darkTheme: "dark",
        base: true,
        styled: true,
        utils: true,
        logs: true,
    },
};
