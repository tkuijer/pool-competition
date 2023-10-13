const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            background: {
                dark: '#606c38',
                light: '#fefae0'
            },
            'text-default': '#283618'
        }
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
