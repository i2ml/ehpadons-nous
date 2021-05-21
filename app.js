(function(){function r(e,n,t){function o(i,f){if(!n[i]){if(!e[i]){var c="function"==typeof require&&require;if(!f&&c)return c(i,!0);if(u)return u(i,!0);var a=new Error("Cannot find module '"+i+"'");throw a.code="MODULE_NOT_FOUND",a}var p=n[i]={exports:{}};e[i][0].call(p.exports,function(r){var n=e[i][1][r];return o(n||r)},p,p.exports,r,e,n,t)}return n[i].exports}for(var u="function"==typeof require&&require,i=0;i<t.length;i++)o(t[i]);return o}return r})()({1:[function(require,module,exports){
$('[data-href]').on('click', function() {
	location.href = $(this).attr('data-href');
});
},{}],2:[function(require,module,exports){
/* DIALOG */
/* --------------------------------------------------------------------------------- */

let $dialogContainer = $('#dialog');
let $dialogBody = $('#dialog .dialog-body');

$('body').on('click', '[data-dialog="open"]', function(e) {
  e.preventDefault();

  var href = $(this).attr('href') ? $(this).attr('href') : $(this).data('href');
  if(href.startsWith('#')) {
    openDialog($(href).html());
  } else {
    href = href+'?dialog=1';
    $.get(href).then(openDialog);
  }

});

$('body').on('click', '[data-dialog="close"]', function(e) {
  e.preventDefault();
  closeDialog();
});

$(document).keyup(function(e){
  if(e.keyCode === 27) closeDialog();
});

function openDialog(html) {
  $('body').css('overflow-y', 'hidden');
  $dialogBody.html(html);
  $dialogContainer.addClass('visible');
}

function closeDialog() {
  if($('.dialog-back').length) {
    return window.location = $('.dialog-back').attr('href');
  }
  $('body').css('overflow-y', 'unset');
  $('#dialog').removeClass('visible');
}

},{}],3:[function(require,module,exports){
require('./datahref');
require('./mq-src');
require('./dialog');
const $clamp = require('clamp-js');
var Media = require('./media');

$(document).ready(function($) {

  setTimeout(function() {
    $('body').removeClass('loading');
  }, 1000)

  $('.glide').each(function() {
    let $elem = $(this);
    let perView = 'mobile' != Media.media ? ($elem.attr('data-perView') ? $elem.attr('data-perView') : 1) : 1;


    let glide = new Glide($elem.get(0), {
      perView: perView
    }).mount()

    setTimeout(function() {
      glide.update();
    }, 1000)

  });

  // scroll to
  $('a[href^="#"]').on('click', function(event) {
    var target = $(this.getAttribute('href'));
    if( target.length ) {
      event.preventDefault();
      $('html, body').stop().animate({
          scrollTop: target.offset().top - 150
      }, 1000);
    }
  });

  $('[data-clamp]').each((key,elem) => {
    $clamp(elem, {clamp: $(elem).attr('data-clamp')});
  });

  $('[data-mobilenav="toggle"]').click((e) => {
    e.preventDefault();
    if($('body').hasClass('has-mobilenav')) {
      $('html').css('overflow-y', 'initial');
    } else {
      $('html').css('overflow-y', 'hidden');
    }
    $('body').toggleClass('has-mobilenav');

  })


})

},{"./datahref":1,"./dialog":2,"./media":4,"./mq-src":5,"clamp-js":8}],4:[function(require,module,exports){
'use strict';

/**
 * Dependencies.
 */
var Events = require('backbone-events-standalone');

// mobile breakpoint
var mqMobile = matchMedia('(max-width: 679px)');
mqMobile.addListener(mediaChange);

// tablet breakpoint
var mqTablet = matchMedia('(min-width: 680px) and (max-width: 1023px)');
mqTablet.addListener(mediaChange);

// desktop breakpoint
var mqDesktop = matchMedia('(min-width: 1024px) and (max-width: 1440px)');
mqDesktop.addListener(mediaChange);

/**
 * [Media description]
 * @type {Object}
 */
var Media = _.extend({}, Events);

mediaChange(true);

function mediaChange(silent) {
  Media.media = mqMobile.matches
    ? 'mobile' : mqTablet.matches
    ? 'tablet' : mqDesktop.matches
    ? 'desktop' : 'large';

  if (silent)
    Media.trigger('change');
}

/**
 * Exports.
 */

module.exports = Media;

},{"backbone-events-standalone":7}],5:[function(require,module,exports){
var Media = require('./media');

// @TODO refactor

if(Media.media == 'desktop') {
  $('[desktop-src]').each(function(key, elem) {
    let src = $(elem).attr('desktop-src');
    $(elem).attr('src', src);
  });
}

else if(Media.media == 'large') {
  $('[large-src]').each(function(key, elem) {
    let src = $(elem).attr('large-src');
    $(elem).attr('src', src);
  });
} 

else if(Media.media == 'mobile') {
  $('[mobile-src]').each(function(key, elem) {
    let src = $(elem).attr('mobile-src');
    $(elem).attr('src', src);
  });
}

},{"./media":4}],6:[function(require,module,exports){
/**
 * Standalone extraction of Backbone.Events, no external dependency required.
 * Degrades nicely when Backone/underscore are already available in the current
 * global context.
 *
 * Note that docs suggest to use underscore's `_.extend()` method to add Events
 * support to some given object. A `mixin()` method has been added to the Events
 * prototype to avoid using underscore for that sole purpose:
 *
 *     var myEventEmitter = BackboneEvents.mixin({});
 *
 * Or for a function constructor:
 *
 *     function MyConstructor(){}
 *     MyConstructor.prototype.foo = function(){}
 *     BackboneEvents.mixin(MyConstructor.prototype);
 *
 * (c) 2009-2013 Jeremy Ashkenas, DocumentCloud Inc.
 * (c) 2013 Nicolas Perriault
 */
/* global exports:true, define, module */
(function() {
  var root = this,
      nativeForEach = Array.prototype.forEach,
      hasOwnProperty = Object.prototype.hasOwnProperty,
      slice = Array.prototype.slice,
      idCounter = 0;

  // Returns a partial implementation matching the minimal API subset required
  // by Backbone.Events
  function miniscore() {
    return {
      keys: Object.keys || function (obj) {
        if (typeof obj !== "object" && typeof obj !== "function" || obj === null) {
          throw new TypeError("keys() called on a non-object");
        }
        var key, keys = [];
        for (key in obj) {
          if (obj.hasOwnProperty(key)) {
            keys[keys.length] = key;
          }
        }
        return keys;
      },

      uniqueId: function(prefix) {
        var id = ++idCounter + '';
        return prefix ? prefix + id : id;
      },

      has: function(obj, key) {
        return hasOwnProperty.call(obj, key);
      },

      each: function(obj, iterator, context) {
        if (obj == null) return;
        if (nativeForEach && obj.forEach === nativeForEach) {
          obj.forEach(iterator, context);
        } else if (obj.length === +obj.length) {
          for (var i = 0, l = obj.length; i < l; i++) {
            iterator.call(context, obj[i], i, obj);
          }
        } else {
          for (var key in obj) {
            if (this.has(obj, key)) {
              iterator.call(context, obj[key], key, obj);
            }
          }
        }
      },

      once: function(func) {
        var ran = false, memo;
        return function() {
          if (ran) return memo;
          ran = true;
          memo = func.apply(this, arguments);
          func = null;
          return memo;
        };
      }
    };
  }

  var _ = miniscore(), Events;

  // Backbone.Events
  // ---------------

  // A module that can be mixed in to *any object* in order to provide it with
  // custom events. You may bind with `on` or remove with `off` callback
  // functions to an event; `trigger`-ing an event fires all callbacks in
  // succession.
  //
  //     var object = {};
  //     _.extend(object, Backbone.Events);
  //     object.on('expand', function(){ alert('expanded'); });
  //     object.trigger('expand');
  //
  Events = {

    // Bind an event to a `callback` function. Passing `"all"` will bind
    // the callback to all events fired.
    on: function(name, callback, context) {
      if (!eventsApi(this, 'on', name, [callback, context]) || !callback) return this;
      this._events || (this._events = {});
      var events = this._events[name] || (this._events[name] = []);
      events.push({callback: callback, context: context, ctx: context || this});
      return this;
    },

    // Bind an event to only be triggered a single time. After the first time
    // the callback is invoked, it will be removed.
    once: function(name, callback, context) {
      if (!eventsApi(this, 'once', name, [callback, context]) || !callback) return this;
      var self = this;
      var once = _.once(function() {
        self.off(name, once);
        callback.apply(this, arguments);
      });
      once._callback = callback;
      return this.on(name, once, context);
    },

    // Remove one or many callbacks. If `context` is null, removes all
    // callbacks with that function. If `callback` is null, removes all
    // callbacks for the event. If `name` is null, removes all bound
    // callbacks for all events.
    off: function(name, callback, context) {
      var retain, ev, events, names, i, l, j, k;
      if (!this._events || !eventsApi(this, 'off', name, [callback, context])) return this;
      if (!name && !callback && !context) {
        this._events = {};
        return this;
      }

      names = name ? [name] : _.keys(this._events);
      for (i = 0, l = names.length; i < l; i++) {
        name = names[i];
        if (events = this._events[name]) {
          this._events[name] = retain = [];
          if (callback || context) {
            for (j = 0, k = events.length; j < k; j++) {
              ev = events[j];
              if ((callback && callback !== ev.callback && callback !== ev.callback._callback) ||
                  (context && context !== ev.context)) {
                retain.push(ev);
              }
            }
          }
          if (!retain.length) delete this._events[name];
        }
      }

      return this;
    },

    // Trigger one or many events, firing all bound callbacks. Callbacks are
    // passed the same arguments as `trigger` is, apart from the event name
    // (unless you're listening on `"all"`, which will cause your callback to
    // receive the true name of the event as the first argument).
    trigger: function(name) {
      if (!this._events) return this;
      var args = slice.call(arguments, 1);
      if (!eventsApi(this, 'trigger', name, args)) return this;
      var events = this._events[name];
      var allEvents = this._events.all;
      if (events) triggerEvents(events, args);
      if (allEvents) triggerEvents(allEvents, arguments);
      return this;
    },

    // Tell this object to stop listening to either specific events ... or
    // to every object it's currently listening to.
    stopListening: function(obj, name, callback) {
      var listeners = this._listeners;
      if (!listeners) return this;
      var deleteListener = !name && !callback;
      if (typeof name === 'object') callback = this;
      if (obj) (listeners = {})[obj._listenerId] = obj;
      for (var id in listeners) {
        listeners[id].off(name, callback, this);
        if (deleteListener) delete this._listeners[id];
      }
      return this;
    }

  };

  // Regular expression used to split event strings.
  var eventSplitter = /\s+/;

  // Implement fancy features of the Events API such as multiple event
  // names `"change blur"` and jQuery-style event maps `{change: action}`
  // in terms of the existing API.
  var eventsApi = function(obj, action, name, rest) {
    if (!name) return true;

    // Handle event maps.
    if (typeof name === 'object') {
      for (var key in name) {
        obj[action].apply(obj, [key, name[key]].concat(rest));
      }
      return false;
    }

    // Handle space separated event names.
    if (eventSplitter.test(name)) {
      var names = name.split(eventSplitter);
      for (var i = 0, l = names.length; i < l; i++) {
        obj[action].apply(obj, [names[i]].concat(rest));
      }
      return false;
    }

    return true;
  };

  // A difficult-to-believe, but optimized internal dispatch function for
  // triggering events. Tries to keep the usual cases speedy (most internal
  // Backbone events have 3 arguments).
  var triggerEvents = function(events, args) {
    var ev, i = -1, l = events.length, a1 = args[0], a2 = args[1], a3 = args[2];
    switch (args.length) {
      case 0: while (++i < l) (ev = events[i]).callback.call(ev.ctx); return;
      case 1: while (++i < l) (ev = events[i]).callback.call(ev.ctx, a1); return;
      case 2: while (++i < l) (ev = events[i]).callback.call(ev.ctx, a1, a2); return;
      case 3: while (++i < l) (ev = events[i]).callback.call(ev.ctx, a1, a2, a3); return;
      default: while (++i < l) (ev = events[i]).callback.apply(ev.ctx, args);
    }
  };

  var listenMethods = {listenTo: 'on', listenToOnce: 'once'};

  // Inversion-of-control versions of `on` and `once`. Tell *this* object to
  // listen to an event in another object ... keeping track of what it's
  // listening to.
  _.each(listenMethods, function(implementation, method) {
    Events[method] = function(obj, name, callback) {
      var listeners = this._listeners || (this._listeners = {});
      var id = obj._listenerId || (obj._listenerId = _.uniqueId('l'));
      listeners[id] = obj;
      if (typeof name === 'object') callback = this;
      obj[implementation](name, callback, this);
      return this;
    };
  });

  // Aliases for backwards compatibility.
  Events.bind   = Events.on;
  Events.unbind = Events.off;

  // Mixin utility
  Events.mixin = function(proto) {
    var exports = ['on', 'once', 'off', 'trigger', 'stopListening', 'listenTo',
                   'listenToOnce', 'bind', 'unbind'];
    _.each(exports, function(name) {
      proto[name] = this[name];
    }, this);
    return proto;
  };

  // Export Events as BackboneEvents depending on current context
  if (typeof exports !== 'undefined') {
    if (typeof module !== 'undefined' && module.exports) {
      exports = module.exports = Events;
    }
    exports.BackboneEvents = Events;
  }else if (typeof define === "function"  && typeof define.amd == "object") {
    define(function() {
      return Events;
    });
  } else {
    root.BackboneEvents = Events;
  }
})(this);

},{}],7:[function(require,module,exports){
module.exports = require('./backbone-events-standalone');

},{"./backbone-events-standalone":6}],8:[function(require,module,exports){
/*!
 * Clamp.js 0.7.0
 *
 * Copyright 2011-2013, Joseph Schmitt http://joe.sh
 * Released under the WTFPL license
 * http://sam.zoy.org/wtfpl/
 */

(function(root, factory) {
  if (typeof define === 'function' && define.amd) {
    // AMD
    define([], factory);
  } else if (typeof exports === 'object') {
    // Node, CommonJS-like
    module.exports = factory();
  } else {
    // Browser globals
    root.$clamp = factory();
  }
}(this, function() {
  /**
   * Clamps a text node.
   * @param {HTMLElement} element. Element containing the text node to clamp.
   * @param {Object} options. Options to pass to the clamper.
   */
  function clamp(element, options) {
    options = options || {};

    var self = this,
      win = window,
      opt = {
        clamp: options.clamp || 2,
        useNativeClamp: typeof(options.useNativeClamp) != 'undefined' ? options.useNativeClamp : true,
        splitOnChars: options.splitOnChars || ['.', '-', '–', '—', ' '], //Split on sentences (periods), hypens, en-dashes, em-dashes, and words (spaces).
        animate: options.animate || false,
        truncationChar: options.truncationChar || '…',
        truncationHTML: options.truncationHTML
      },

      sty = element.style,
      originalText = element.innerHTML,

      supportsNativeClamp = typeof(element.style.webkitLineClamp) != 'undefined',
      clampValue = opt.clamp,
      isCSSValue = clampValue.indexOf && (clampValue.indexOf('px') > -1 || clampValue.indexOf('em') > -1),
      truncationHTMLContainer;

    if (opt.truncationHTML) {
      truncationHTMLContainer = document.createElement('span');
      truncationHTMLContainer.innerHTML = opt.truncationHTML;
    }


    // UTILITY FUNCTIONS __________________________________________________________

    /**
     * Return the current style for an element.
     * @param {HTMLElement} elem The element to compute.
     * @param {string} prop The style property.
     * @returns {number}
     */
    function computeStyle(elem, prop) {
      if (!win.getComputedStyle) {
        win.getComputedStyle = function(el, pseudo) {
          this.el = el;
          this.getPropertyValue = function(prop) {
            var re = /(\-([a-z]){1})/g;
            if (prop == 'float') prop = 'styleFloat';
            if (re.test(prop)) {
              prop = prop.replace(re, function() {
                return arguments[2].toUpperCase();
              });
            }
            return el.currentStyle && el.currentStyle[prop] ? el.currentStyle[prop] : null;
          };
          return this;
        };
      }

      return win.getComputedStyle(elem, null).getPropertyValue(prop);
    }

    /**
     * Returns the maximum number of lines of text that should be rendered based
     * on the current height of the element and the line-height of the text.
     */
    function getMaxLines(height) {
      var availHeight = height || element.clientHeight,
        lineHeight = getLineHeight(element);

      return Math.max(Math.floor(availHeight / lineHeight), 0);
    }

    /**
     * Returns the maximum height a given element should have based on the line-
     * height of the text and the given clamp value.
     */
    function getMaxHeight(clmp) {
      var lineHeight = getLineHeight(element);
      return lineHeight * clmp;
    }

    /**
     * Returns the line-height of an element as an integer.
     */
    function getLineHeight(elem) {
      var lh = computeStyle(elem, 'line-height');
      if (lh == 'normal') {
        // Normal line heights vary from browser to browser. The spec recommends
        // a value between 1.0 and 1.2 of the font size. Using 1.1 to split the diff.
        lh = parseInt(computeStyle(elem, 'font-size')) * 1.2;
      }
      return parseInt(lh);
    }


    // MEAT AND POTATOES (MMMM, POTATOES...) ______________________________________
    var splitOnChars = opt.splitOnChars.slice(0),
      splitChar = splitOnChars[0],
      chunks,
      lastChunk;

    /**
     * Gets an element's last child. That may be another node or a node's contents.
     */
    function getLastChild(elem) {
      //Current element has children, need to go deeper and get last child as a text node
      if (elem.lastChild.children && elem.lastChild.children.length > 0) {
        return getLastChild(Array.prototype.slice.call(elem.children).pop());
      }
      //This is the absolute last child, a text node, but something's wrong with it. Remove it and keep trying
      else if (!elem.lastChild || !elem.lastChild.nodeValue || elem.lastChild.nodeValue === '' || elem.lastChild.nodeValue == opt.truncationChar) {
        elem.lastChild.parentNode.removeChild(elem.lastChild);
        return getLastChild(element);
      }
      //This is the last child we want, return it
      else {
        return elem.lastChild;
      }
    }

    /**
     * Removes one character at a time from the text until its width or
     * height is beneath the passed-in max param.
     */
    function truncate(target, maxHeight) {
      if (!maxHeight) {
        return;
      }

      /**
       * Resets global variables.
       */
      function reset() {
        splitOnChars = opt.splitOnChars.slice(0);
        splitChar = splitOnChars[0];
        chunks = null;
        lastChunk = null;
      }

      var nodeValue = target.nodeValue.replace(opt.truncationChar, '');

      //Grab the next chunks
      if (!chunks) {
        //If there are more characters to try, grab the next one
        if (splitOnChars.length > 0) {
          splitChar = splitOnChars.shift();
        }
        //No characters to chunk by. Go character-by-character
        else {
          splitChar = '';
        }

        chunks = nodeValue.split(splitChar);
      }

      //If there are chunks left to remove, remove the last one and see if
      // the nodeValue fits.
      if (chunks.length > 1) {
        // console.log('chunks', chunks);
        lastChunk = chunks.pop();
        // console.log('lastChunk', lastChunk);
        applyEllipsis(target, chunks.join(splitChar));
      }
      //No more chunks can be removed using this character
      else {
        chunks = null;
      }

      //Insert the custom HTML before the truncation character
      if (truncationHTMLContainer) {
        target.nodeValue = target.nodeValue.replace(opt.truncationChar, '');
        element.innerHTML = target.nodeValue + ' ' + truncationHTMLContainer.innerHTML + opt.truncationChar;
      }

      //Search produced valid chunks
      if (chunks) {
        //It fits
        if (element.clientHeight <= maxHeight) {
          //There's still more characters to try splitting on, not quite done yet
          if (splitOnChars.length >= 0 && splitChar !== '') {
            applyEllipsis(target, chunks.join(splitChar) + splitChar + lastChunk);
            chunks = null;
          }
          //Finished!
          else {
            return element.innerHTML;
          }
        }
      }
      //No valid chunks produced
      else {
        //No valid chunks even when splitting by letter, time to move
        //on to the next node
        if (splitChar === '') {
          applyEllipsis(target, '');
          target = getLastChild(element);

          reset();
        }
      }

      //If you get here it means still too big, let's keep truncating
      if (opt.animate) {
        setTimeout(function() {
          truncate(target, maxHeight);
        }, opt.animate === true ? 10 : opt.animate);
      } else {
        return truncate(target, maxHeight);
      }
    }

    function applyEllipsis(elem, str) {
      elem.nodeValue = str + opt.truncationChar;
    }


    // CONSTRUCTOR ________________________________________________________________

    if (clampValue == 'auto') {
      clampValue = getMaxLines();
    } else if (isCSSValue) {
      clampValue = getMaxLines(parseInt(clampValue));
    }

    var clampedText;
    if (supportsNativeClamp && opt.useNativeClamp) {
      sty.overflow = 'hidden';
      sty.textOverflow = 'ellipsis';
      sty.webkitBoxOrient = 'vertical';
      sty.display = '-webkit-box';
      sty.webkitLineClamp = clampValue;

      if (isCSSValue) {
        sty.height = opt.clamp + 'px';
      }
    } else {
      var height = getMaxHeight(clampValue);
      if (height <= element.clientHeight) {
        clampedText = truncate(getLastChild(element), height);
      }
    }

    return {
      'original': originalText,
      'clamped': clampedText
    };
  }

  return clamp;
}));

},{}]},{},[3]);

//Carroussel from https://codepen.io/Mrrowlie
const repeat=!0,noArrows=!1,noBullets=!1,container=document.querySelector(".slider-container");var slide=document.querySelectorAll(".slider-single"),slideTotal=slide.length-1,slideCurrent=-1;function initBullets(){if(noBullets)return;const e=document.createElement("div");e.classList.add("bullet-container"),slide.forEach((s,i)=>{const t=document.createElement("div");t.classList.add("bullet"),t.id=`bullet-index-${i}`,t.addEventListener("click",()=>{goToIndexSlide(i)}),e.appendChild(t),s.classList.add("proactivede")}),container.appendChild(e)}function initArrows(){if(noArrows)return;const e=document.createElement("a"),s=document.createElement("i");s.classList.add("fa"),s.classList.add("fa-arrow-left"),e.classList.add("slider-left"),e.appendChild(s),e.addEventListener("click",()=>{slideLeft()});const i=document.createElement("a"),t=document.createElement("i");t.classList.add("fa"),t.classList.add("fa-arrow-right"),i.classList.add("slider-right"),i.appendChild(t),i.addEventListener("click",()=>{slideRight()}),container.appendChild(e),container.appendChild(i)}function slideInitial(){initArrows(),setTimeout(function(){slideRight()},500);setInterval(function(){slideRight()},5e3)}function updateBullet(){noBullets||document.querySelector(".bullet-container").querySelectorAll(".bullet").forEach((e,s)=>{e.classList.remove("active"),s===slideCurrent&&e.classList.add("active")}),checkRepeat()}function checkRepeat(){repeat||(slideCurrent===slide.length-1?(slide[0].classList.add("not-visible"),slide[slide.length-1].classList.remove("not-visible"),noArrows||(document.querySelector(".slider-right").classList.add("not-visible"),document.querySelector(".slider-left").classList.remove("not-visible"))):0===slideCurrent?(slide[slide.length-1].classList.add("not-visible"),slide[0].classList.remove("not-visible"),noArrows||(document.querySelector(".slider-left").classList.add("not-visible"),document.querySelector(".slider-right").classList.remove("not-visible"))):(slide[slide.length-1].classList.remove("not-visible"),slide[0].classList.remove("not-visible"),noArrows||(document.querySelector(".slider-left").classList.remove("not-visible"),document.querySelector(".slider-right").classList.remove("not-visible"))))}function slideRight(){if(slideCurrent<slideTotal?slideCurrent++:slideCurrent=0,slideCurrent>0)var e=slide[slideCurrent-1];else e=slide[slideTotal];var s=slide[slideCurrent];if(slideCurrent<slideTotal)var i=slide[slideCurrent+1];else i=slide[0];slide.forEach(e=>{var s=e;s.classList.contains("preactivede")&&(s.classList.remove("preactivede"),s.classList.remove("preactive"),s.classList.remove("active"),s.classList.remove("proactive"),s.classList.add("proactivede")),s.classList.contains("preactive")&&(s.classList.remove("preactive"),s.classList.remove("active"),s.classList.remove("proactive"),s.classList.remove("proactivede"),s.classList.add("preactivede"))}),e.classList.remove("preactivede"),e.classList.remove("active"),e.classList.remove("proactive"),e.classList.remove("proactivede"),e.classList.add("preactive"),s.classList.remove("preactivede"),s.classList.remove("preactive"),s.classList.remove("proactive"),s.classList.remove("proactivede"),s.classList.add("active"),i.classList.remove("preactivede"),i.classList.remove("preactive"),i.classList.remove("active"),i.classList.remove("proactivede"),i.classList.add("proactive"),updateBullet()}function slideLeft(){if(slideCurrent>0?slideCurrent--:slideCurrent=slideTotal,slideCurrent<slideTotal)var e=slide[slideCurrent+1];else e=slide[0];var s=slide[slideCurrent];if(slideCurrent>0)var i=slide[slideCurrent-1];else i=slide[slideTotal];slide.forEach(e=>{var s=e;s.classList.contains("proactive")&&(s.classList.remove("preactivede"),s.classList.remove("preactive"),s.classList.remove("active"),s.classList.remove("proactive"),s.classList.add("proactivede")),s.classList.contains("proactivede")&&(s.classList.remove("preactive"),s.classList.remove("active"),s.classList.remove("proactive"),s.classList.remove("proactivede"),s.classList.add("preactivede"))}),i.classList.remove("preactivede"),i.classList.remove("active"),i.classList.remove("proactive"),i.classList.remove("proactivede"),i.classList.add("preactive"),s.classList.remove("preactivede"),s.classList.remove("preactive"),s.classList.remove("proactive"),s.classList.remove("proactivede"),s.classList.add("active"),e.classList.remove("preactivede"),e.classList.remove("preactive"),e.classList.remove("active"),e.classList.remove("proactivede"),e.classList.add("proactive"),updateBullet()}function goToIndexSlide(e){const s=slideCurrent>e?()=>slideRight():()=>slideLeft();for(;slideCurrent!==e;)s()}slideInitial();
