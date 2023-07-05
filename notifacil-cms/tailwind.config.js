import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme:{
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            primaryDark: '#075985',
            primary: '#0284c7',
            slate: '#cbd5e1',
            white: '#ffffff',
            error: '#C03221',
            divider: '#e2e8f0',
            greyDark: '#8A92A6',
            errorDark: '#b91c1c',
            error: '#C03221',
            
          },
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, typography],
};
