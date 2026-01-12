import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.{vue,js,ts,jsx,tsx}',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            keyframes: {
                wave: {
                    '0%':   { transform: 'translateX(0)' },
                    '50%':  { transform: 'translateX(-25px)' },
                    '100%': { transform: 'translateX(0)' },
                },
                'fade-in': {
                    '0%': { opacity: '0' },
                    '25%': { opacity: '0.4' },
                    '50%': { opacity: '0.8' },
                    '100%': { opacity: '1' },
                },
                spinSlow: {
                    "0%": { transform: "rotate(0deg)" },
                    "100%": { transform: "rotate(360deg)" },
                },

            },
            animation: {
                wave: 'wave 4s ease-in-out infinite',
                'fade-in': 'fadeIn 1s ease-out forwards',
                spinslow: "spinSlow 8s linear infinite",
            },
        },
    },

    plugins: [forms],
};
