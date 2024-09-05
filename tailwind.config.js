/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            scale: {
                '105': '1.05',
                '110': '1.10',
            },
            boxShadow: {
                'custom-combined': '-4px -4px 10px rgba(255, 255, 255, 0.12), 4px 4px 10px rgba(0, 0, 0, 0.20)',
                'hover-shadow': '0 4px 8px rgba(0, 0, 0, 0.3)',
            },
            blur: {
                '29': '29px',
            },
            brightness: {
                '110': '1.10',
            },
            contrast: {
                '125': '1.25',
            },
            screens: {
                'xs': '450px',
            },
            transitionProperty: {
                'transform': 'transform',
                'shadow': 'box-shadow',
                'filter': 'filter',
            },
        },
    },
    plugins: [
        function ({ addBase, addComponents }) {
            addBase({
                '*:hover': {
                    transition: 'all 200ms ease-in-out',
                },
            });

            addComponents({
                '.custom-bg': {
                    '@apply bg-white bg-opacity-10 backdrop-blur whitespace-normal break-words': {},
                },
                '.custom-border': {
                    '@apply border border-white border-opacity-10': {},
                },
                '.custom-shadow': {
                    '@apply shadow-custom-combined': {},
                },
                '.custom-box': {
                    '@apply custom-bg custom-border custom-shadow': {},
                },
                '.hover-transform': {
                    '@apply transition-transform duration-300 ease-in-out transform hover:scale-110 hover:brightness-110 hover:contrast-125 hover:shadow-hover-shadow': {},
                },
            });


        },
    ],
}

