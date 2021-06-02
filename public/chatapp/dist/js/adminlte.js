/*!
 * AdminLTE v3.1.0 (https://adminlte.io)
 * Copyright 2014-2021 Colorlib <https://colorlib.com>
 * Licensed under MIT (https://github.com/ColorlibHQ/AdminLTE/blob/master/LICENSE)
 */
(function(global, factory) {
    typeof exports === 'object' && typeof module !== 'undefined' ? factory(exports, require('jquery')) :
        typeof define === 'function' && define.amd ? define(['exports', 'jquery'], factory) :
        (global = typeof globalThis !== 'undefined' ? globalThis : global || self, factory(global.adminlte = {}, global.jQuery));
}(this, (function(exports, $) {
    'use strict';

    function _interopDefaultLegacy(e) { return e && typeof e === 'object' && 'default' in e ? e : { 'default': e }; }

    var $__default = /*#__PURE__*/ _interopDefaultLegacy($);


    /**
     * --------------------------------------------
     * AdminLTE DirectChat.js
     * License MIT
     * --------------------------------------------
     */
    /**
     * Constants
     * ====================================================
     */

    var NAME$b = 'DirectChat';
    var DATA_KEY$b = 'lte.directchat';
    var EVENT_KEY$4 = "." + DATA_KEY$b;
    var JQUERY_NO_CONFLICT$b = $__default['default'].fn[NAME$b];
    var EVENT_TOGGLED = "toggled" + EVENT_KEY$4;
    var SELECTOR_DATA_TOGGLE$3 = '[data-widget="chat-pane-toggle"]';
    var SELECTOR_DIRECT_CHAT = '.direct-chat';
    var CLASS_NAME_DIRECT_CHAT_OPEN = 'direct-chat-contacts-open';
    /**
     * Class Definition
     * ====================================================
     */

    var DirectChat = /*#__PURE__*/ function() {
        function DirectChat(element) {
            this._element = element;
        }

        var _proto = DirectChat.prototype;

        _proto.toggle = function toggle() {
                $__default['default'](this._element).parents(SELECTOR_DIRECT_CHAT).first().toggleClass(CLASS_NAME_DIRECT_CHAT_OPEN);
                $__default['default'](this._element).trigger($__default['default'].Event(EVENT_TOGGLED));
            } // Static
        ;

        DirectChat._jQueryInterface = function _jQueryInterface(config) {
            return this.each(function() {
                var data = $__default['default'](this).data(DATA_KEY$b);

                if (!data) {
                    data = new DirectChat($__default['default'](this));
                    $__default['default'](this).data(DATA_KEY$b, data);
                }

                data[config]();
            });
        };

        return DirectChat;
    }();
    /**
     *
     * Data Api implementation
     * ====================================================
     */


    $__default['default'](document).on('click', SELECTOR_DATA_TOGGLE$3, function(event) {
        if (event) {
            event.preventDefault();
        }

        DirectChat._jQueryInterface.call($__default['default'](this), 'toggle');
    });
    /**
     * jQuery API
     * ====================================================
     */

    $__default['default'].fn[NAME$b] = DirectChat._jQueryInterface;
    $__default['default'].fn[NAME$b].Constructor = DirectChat;

    $__default['default'].fn[NAME$b].noConflict = function() {
        $__default['default'].fn[NAME$b] = JQUERY_NO_CONFLICT$b;
        return DirectChat._jQueryInterface;
    };




    exports.DirectChat = DirectChat;

    Object.defineProperty(exports, '__esModule', { value: true });

})));
//# sourceMappingURL=adminlte.js.map