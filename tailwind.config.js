const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        /*-------------------------------------------------------------------------------------------------------------- */
        /*-------------------------------------------------------------------------------------------------------------- */
        extend: {
            fontFamily: {
                nun:   ['Nunito', ...defaultTheme.fontFamily.serif],
                sans:  ['ui-sans-serif', 'system-ui'],
                serif: ['ui-serif', 'Georgia'],
                mono:  ['ui-monospace', 'SFMono-Regular'],
                quin:  ['Quintessential', 'cursive'],
            },
/* .......................................................................................................................................... */
    animation:{                                               
        'show-banner-text2': 'showBannerText2 4s linear',
        'show-card-icon': 'showCardIcon 300ms linear',           //icono de las tarjetas
        'show-card-h2': 'showCardh2 400ms linear',               //h2 de las tarjetas
    },   
    /* ............................................................................................................................... */ 
    keyframes:{
            showBannerText2:{
                '0%'  :{transform: "scale(0,0)",},            //textto del banner mio
                '100%' :{transform: "scale(1,1)",},
                    
            },
            showCardIcon:{
                'from':{transform: "translateY(-200%)"},            //icono de las tarjetas
                'to'  :{transform: "translateY(0%)"},
                },
            showCardh2:{
                '0%'  :{transform: "translateY(-200%)"},            //h2 de las tarjetas
                '100%':{transform: "translateY(0%)"},
                },  
      
    },




/* .......................................................................................................................................... */
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],

    variants: {
        fontSize: ['responsive','hover','group-hover'],
        animation: ['responsive','hover','group-hover'],
        transform: ['responsive','hover','group-hover'],
        scale: ['responsive','hover','group-hover'],
    }
};
