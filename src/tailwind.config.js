const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

module.exports = {
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './app/Http/Livewire/Documentation.php'
    ],

        whitelistPatterns: ['max-h-20'],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            orange: colors.orange,
            black: colors.black,
            white: colors.white,
            gray: colors.coolGray,
            red: colors.red,
            yellow: colors.amber,
            blue: colors.blue,
            green: colors.green,
            pink: colors.pink,
        }

    },
    plugins: [
        // ...
        require('@tailwindcss/forms'),
    ],
    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
    },

};
