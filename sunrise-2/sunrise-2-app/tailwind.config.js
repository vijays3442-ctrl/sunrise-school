import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                primary: '#FE5D37',
                secondary: '#103741',
                light: '#FFF5F3',
                dark: '#0E2E37',
                saffron: '#FE5D37', 
                darkblue: '#103741', 
            },
            fontFamily: {
                sans: ['Heebo', 'sans-serif'],
                heading: ['Inter', 'sans-serif'],
                lobster: ['Lobster Two', 'cursive'],
            },
            borderRadius: {
                'blob': '56% 44% 70% 30% / 30% 54% 46% 70%',
                'blob-alt': '30% 70% 70% 30% / 30% 30% 70% 70%',
                'circle': '50%',
            },
            keyframes: {
                float: {
                    '0%, 100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-20px)' },
                },
                wiggle: {
                    '0%, 100%': { transform: 'rotate(-3deg)' },
                    '50%': { transform: 'rotate(3deg)' },
                }
            },
            animation: {
                float: 'float 3s ease-in-out infinite',
                'float-slow': 'float 5s ease-in-out infinite',
                wiggle: 'wiggle 1s ease-in-out infinite',
            }
        },
    },

    plugins: [forms],
};
