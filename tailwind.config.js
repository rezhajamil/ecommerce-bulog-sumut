import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },
    daisyui: {
        themes: [
            "nord",
            "fantasy",
            "emerald",
            "bumblebee",
            "halloween",
            "corporate",
            {
                mytheme: {
                    primary: "#00a5ff",

                    secondary: "#00deff",

                    accent: "#f27f00",

                    neutral: "#1c1e19",

                    "base-100": "#fffafc",

                    info: "#00d3ff",

                    success: "#247f00",

                    warning: "#dc9b00",

                    error: "#ff8c8c",
                },
            },
        ],
    },

    plugins: [forms, require("daisyui")],
};
