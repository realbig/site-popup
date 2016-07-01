/**
 The primary functions for the pop up.

 @since 0.1.0
 */

var RBPU_Popup;

(function ($, api) {
    'use strict';

    api = {
        $elements: {
            popup: false,
            close: false,
            video: false,
        },

        /**
         * Initializes the pop up functionality.
         *
         * @since 0.1.0
         */
        init: function () {

            api.get_elements();
            api.bind_handlers();

            $(window).load(function () {
                setTimeout(api.open, 500);
            });
        },

        /**
         * Gets all of the necessary DOM elements.
         *
         * @since 0.1.0
         */
        get_elements: function () {

            api.$elements['popup'] = $('.rbpu-popup');

            if (!api.$elements['popup'].length) {
                return;
            }

            api.$elements['close'] = api.$elements['popup'].find('.rbpu-popup-close');
            api.$elements['video'] = api.$elements['popup'].find('.rbpu-popup-video');
        },

        /**
         * Bindes handlers to elements.
         *
         * @since 0.1.0
         */
        bind_handlers: function () {

            if (!api.$elements['close'].length) {
                return;
            }

            api.$elements['close'].click(api.close);
        },

        /**
         * Opens the pop up.
         *
         * @since 0.1.0
         */
        open: function () {

            api.$elements['popup'].animate({opacity: 1}, {
                duration: 500, complete: function () {
                    $(this).addClass('rbpu-popup-opened');
                }
            });
        },

        /**
         * Closes the pop up.
         *
         * @since 0.1.0
         */
        close: function () {

            api.$elements['popup'].addClass('rbpu-popup-closed').removeClass('rbpu-popup-opened');

            setTimeout(function () {
                api.$elements['popup'].animate({opacity: 0}, {
                    duration: 500, complete: function () {
                        $(this).remove();
                    }
                });
            }, 1000);
        }
    };

    $(api.init);
})(jQuery, RBPU_Popup);