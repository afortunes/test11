(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-18597df7"],{7094:function(t,e,r){
/*!
 * clipboard.js v2.0.8
 * https://clipboardjs.com/
 *
 * Licensed MIT © Zeno Rocha
 */
(function(e,r){t.exports=r()})(0,(function(){return function(){var t={134:function(t,e,r){"use strict";r.d(e,{default:function(){return B}});var n=r(279),o=r.n(n),i=r(370),a=r.n(i),u=r(817),s=r.n(u);function l(t){return l="function"===typeof Symbol&&"symbol"===typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"===typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},l(t)}function c(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}function h(t,e){for(var r=0;r<e.length;r++){var n=e[r];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(t,n.key,n)}}function f(t,e,r){return e&&h(t.prototype,e),r&&h(t,r),t}var d=function(){function t(e){c(this,t),this.resolveOptions(e),this.initSelection()}return f(t,[{key:"resolveOptions",value:function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};this.action=t.action,this.container=t.container,this.emitter=t.emitter,this.target=t.target,this.text=t.text,this.trigger=t.trigger,this.selectedText=""}},{key:"initSelection",value:function(){this.text?this.selectFake():this.target&&this.selectTarget()}},{key:"createFakeElement",value:function(){var t="rtl"===document.documentElement.getAttribute("dir");this.fakeElem=document.createElement("textarea"),this.fakeElem.style.fontSize="12pt",this.fakeElem.style.border="0",this.fakeElem.style.padding="0",this.fakeElem.style.margin="0",this.fakeElem.style.position="absolute",this.fakeElem.style[t?"right":"left"]="-9999px";var e=window.pageYOffset||document.documentElement.scrollTop;return this.fakeElem.style.top="".concat(e,"px"),this.fakeElem.setAttribute("readonly",""),this.fakeElem.value=this.text,this.fakeElem}},{key:"selectFake",value:function(){var t=this,e=this.createFakeElement();this.fakeHandlerCallback=function(){return t.removeFake()},this.fakeHandler=this.container.addEventListener("click",this.fakeHandlerCallback)||!0,this.container.appendChild(e),this.selectedText=s()(e),this.copyText(),this.removeFake()}},{key:"removeFake",value:function(){this.fakeHandler&&(this.container.removeEventListener("click",this.fakeHandlerCallback),this.fakeHandler=null,this.fakeHandlerCallback=null),this.fakeElem&&(this.container.removeChild(this.fakeElem),this.fakeElem=null)}},{key:"selectTarget",value:function(){this.selectedText=s()(this.target),this.copyText()}},{key:"copyText",value:function(){var t;try{t=document.execCommand(this.action)}catch(e){t=!1}this.handleResult(t)}},{key:"handleResult",value:function(t){this.emitter.emit(t?"success":"error",{action:this.action,text:this.selectedText,trigger:this.trigger,clearSelection:this.clearSelection.bind(this)})}},{key:"clearSelection",value:function(){this.trigger&&this.trigger.focus(),document.activeElement.blur(),window.getSelection().removeAllRanges()}},{key:"destroy",value:function(){this.removeFake()}},{key:"action",set:function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"copy";if(this._action=t,"copy"!==this._action&&"cut"!==this._action)throw new Error('Invalid "action" value, use either "copy" or "cut"')},get:function(){return this._action}},{key:"target",set:function(t){if(void 0!==t){if(!t||"object"!==l(t)||1!==t.nodeType)throw new Error('Invalid "target" value, use a valid Element');if("copy"===this.action&&t.hasAttribute("disabled"))throw new Error('Invalid "target" attribute. Please use "readonly" instead of "disabled" attribute');if("cut"===this.action&&(t.hasAttribute("readonly")||t.hasAttribute("disabled")))throw new Error('Invalid "target" attribute. You can\'t cut text from elements with "readonly" or "disabled" attributes');this._target=t}},get:function(){return this._target}}]),t}(),g=d;function p(t){return p="function"===typeof Symbol&&"symbol"===typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"===typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},p(t)}function v(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}function m(t,e){for(var r=0;r<e.length;r++){var n=e[r];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(t,n.key,n)}}function y(t,e,r){return e&&m(t.prototype,e),r&&m(t,r),t}function E(t,e){if("function"!==typeof e&&null!==e)throw new TypeError("Super expression must either be null or a function");t.prototype=Object.create(e&&e.prototype,{constructor:{value:t,writable:!0,configurable:!0}}),e&&b(t,e)}function b(t,e){return b=Object.setPrototypeOf||function(t,e){return t.__proto__=e,t},b(t,e)}function T(t){var e=C();return function(){var r,n=A(t);if(e){var o=A(this).constructor;r=Reflect.construct(n,arguments,o)}else r=n.apply(this,arguments);return w(this,r)}}function w(t,e){return!e||"object"!==p(e)&&"function"!==typeof e?k(t):e}function k(t){if(void 0===t)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return t}function C(){if("undefined"===typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"===typeof Proxy)return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],(function(){}))),!0}catch(t){return!1}}function A(t){return A=Object.setPrototypeOf?Object.getPrototypeOf:function(t){return t.__proto__||Object.getPrototypeOf(t)},A(t)}function L(t,e){var r="data-clipboard-".concat(t);if(e.hasAttribute(r))return e.getAttribute(r)}var P=function(t){E(r,t);var e=T(r);function r(t,n){var o;return v(this,r),o=e.call(this),o.resolveOptions(n),o.listenClick(t),o}return y(r,[{key:"resolveOptions",value:function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};this.action="function"===typeof t.action?t.action:this.defaultAction,this.target="function"===typeof t.target?t.target:this.defaultTarget,this.text="function"===typeof t.text?t.text:this.defaultText,this.container="object"===p(t.container)?t.container:document.body}},{key:"listenClick",value:function(t){var e=this;this.listener=a()(t,"click",(function(t){return e.onClick(t)}))}},{key:"onClick",value:function(t){var e=t.delegateTarget||t.currentTarget;this.clipboardAction&&(this.clipboardAction=null),this.clipboardAction=new g({action:this.action(e),target:this.target(e),text:this.text(e),container:this.container,trigger:e,emitter:this})}},{key:"defaultAction",value:function(t){return L("action",t)}},{key:"defaultTarget",value:function(t){var e=L("target",t);if(e)return document.querySelector(e)}},{key:"defaultText",value:function(t){return L("text",t)}},{key:"destroy",value:function(){this.listener.destroy(),this.clipboardAction&&(this.clipboardAction.destroy(),this.clipboardAction=null)}}],[{key:"isSupported",value:function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:["copy","cut"],e="string"===typeof t?[t]:t,r=!!document.queryCommandSupported;return e.forEach((function(t){r=r&&!!document.queryCommandSupported(t)})),r}}]),r}(o()),B=P},828:function(t){var e=9;if("undefined"!==typeof Element&&!Element.prototype.matches){var r=Element.prototype;r.matches=r.matchesSelector||r.mozMatchesSelector||r.msMatchesSelector||r.oMatchesSelector||r.webkitMatchesSelector}function n(t,r){while(t&&t.nodeType!==e){if("function"===typeof t.matches&&t.matches(r))return t;t=t.parentNode}}t.exports=n},438:function(t,e,r){var n=r(828);function o(t,e,r,n,o){var i=a.apply(this,arguments);return t.addEventListener(r,i,o),{destroy:function(){t.removeEventListener(r,i,o)}}}function i(t,e,r,n,i){return"function"===typeof t.addEventListener?o.apply(null,arguments):"function"===typeof r?o.bind(null,document).apply(null,arguments):("string"===typeof t&&(t=document.querySelectorAll(t)),Array.prototype.map.call(t,(function(t){return o(t,e,r,n,i)})))}function a(t,e,r,o){return function(r){r.delegateTarget=n(r.target,e),r.delegateTarget&&o.call(t,r)}}t.exports=i},879:function(t,e){e.node=function(t){return void 0!==t&&t instanceof HTMLElement&&1===t.nodeType},e.nodeList=function(t){var r=Object.prototype.toString.call(t);return void 0!==t&&("[object NodeList]"===r||"[object HTMLCollection]"===r)&&"length"in t&&(0===t.length||e.node(t[0]))},e.string=function(t){return"string"===typeof t||t instanceof String},e.fn=function(t){var e=Object.prototype.toString.call(t);return"[object Function]"===e}},370:function(t,e,r){var n=r(879),o=r(438);function i(t,e,r){if(!t&&!e&&!r)throw new Error("Missing required arguments");if(!n.string(e))throw new TypeError("Second argument must be a String");if(!n.fn(r))throw new TypeError("Third argument must be a Function");if(n.node(t))return a(t,e,r);if(n.nodeList(t))return u(t,e,r);if(n.string(t))return s(t,e,r);throw new TypeError("First argument must be a String, HTMLElement, HTMLCollection, or NodeList")}function a(t,e,r){return t.addEventListener(e,r),{destroy:function(){t.removeEventListener(e,r)}}}function u(t,e,r){return Array.prototype.forEach.call(t,(function(t){t.addEventListener(e,r)})),{destroy:function(){Array.prototype.forEach.call(t,(function(t){t.removeEventListener(e,r)}))}}}function s(t,e,r){return o(document.body,t,e,r)}t.exports=i},817:function(t){function e(t){var e;if("SELECT"===t.nodeName)t.focus(),e=t.value;else if("INPUT"===t.nodeName||"TEXTAREA"===t.nodeName){var r=t.hasAttribute("readonly");r||t.setAttribute("readonly",""),t.select(),t.setSelectionRange(0,t.value.length),r||t.removeAttribute("readonly"),e=t.value}else{t.hasAttribute("contenteditable")&&t.focus();var n=window.getSelection(),o=document.createRange();o.selectNodeContents(t),n.removeAllRanges(),n.addRange(o),e=n.toString()}return e}t.exports=e},279:function(t){function e(){}e.prototype={on:function(t,e,r){var n=this.e||(this.e={});return(n[t]||(n[t]=[])).push({fn:e,ctx:r}),this},once:function(t,e,r){var n=this;function o(){n.off(t,o),e.apply(r,arguments)}return o._=e,this.on(t,o,r)},emit:function(t){var e=[].slice.call(arguments,1),r=((this.e||(this.e={}))[t]||[]).slice(),n=0,o=r.length;for(n;n<o;n++)r[n].fn.apply(r[n].ctx,e);return this},off:function(t,e){var r=this.e||(this.e={}),n=r[t],o=[];if(n&&e)for(var i=0,a=n.length;i<a;i++)n[i].fn!==e&&n[i].fn._!==e&&o.push(n[i]);return o.length?r[t]=o:delete r[t],this}},t.exports=e,t.exports.TinyEmitter=e}},e={};function r(n){if(e[n])return e[n].exports;var o=e[n]={exports:{}};return t[n](o,o.exports,r),o.exports}return function(){r.n=function(t){var e=t&&t.__esModule?function(){return t["default"]}:function(){return t};return r.d(e,{a:e}),e}}(),function(){r.d=function(t,e){for(var n in e)r.o(e,n)&&!r.o(t,n)&&Object.defineProperty(t,n,{enumerable:!0,get:e[n]})}}(),function(){r.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)}}(),r(134)}().default}))},"98ad":function(t,e,r){"use strict";
/*!
 * qrcode.vue v1.7.0
 * A Vue component to generate QRCode.
 * © 2017-2019 @scopewu(https://github.com/scopewu)
 * MIT License.
 */var n={MODE_NUMBER:1,MODE_ALPHA_NUM:2,MODE_8BIT_BYTE:4,MODE_KANJI:8};function o(t){this.mode=n.MODE_8BIT_BYTE,this.data=t}o.prototype={getLength:function(t){return this.data.length},write:function(t){for(var e=0;e<this.data.length;e++)t.put(this.data.charCodeAt(e),8)}};var i=o,a={L:1,M:0,Q:3,H:2};function u(t,e){this.totalCount=t,this.dataCount=e}u.RS_BLOCK_TABLE=[[1,26,19],[1,26,16],[1,26,13],[1,26,9],[1,44,34],[1,44,28],[1,44,22],[1,44,16],[1,70,55],[1,70,44],[2,35,17],[2,35,13],[1,100,80],[2,50,32],[2,50,24],[4,25,9],[1,134,108],[2,67,43],[2,33,15,2,34,16],[2,33,11,2,34,12],[2,86,68],[4,43,27],[4,43,19],[4,43,15],[2,98,78],[4,49,31],[2,32,14,4,33,15],[4,39,13,1,40,14],[2,121,97],[2,60,38,2,61,39],[4,40,18,2,41,19],[4,40,14,2,41,15],[2,146,116],[3,58,36,2,59,37],[4,36,16,4,37,17],[4,36,12,4,37,13],[2,86,68,2,87,69],[4,69,43,1,70,44],[6,43,19,2,44,20],[6,43,15,2,44,16],[4,101,81],[1,80,50,4,81,51],[4,50,22,4,51,23],[3,36,12,8,37,13],[2,116,92,2,117,93],[6,58,36,2,59,37],[4,46,20,6,47,21],[7,42,14,4,43,15],[4,133,107],[8,59,37,1,60,38],[8,44,20,4,45,21],[12,33,11,4,34,12],[3,145,115,1,146,116],[4,64,40,5,65,41],[11,36,16,5,37,17],[11,36,12,5,37,13],[5,109,87,1,110,88],[5,65,41,5,66,42],[5,54,24,7,55,25],[11,36,12],[5,122,98,1,123,99],[7,73,45,3,74,46],[15,43,19,2,44,20],[3,45,15,13,46,16],[1,135,107,5,136,108],[10,74,46,1,75,47],[1,50,22,15,51,23],[2,42,14,17,43,15],[5,150,120,1,151,121],[9,69,43,4,70,44],[17,50,22,1,51,23],[2,42,14,19,43,15],[3,141,113,4,142,114],[3,70,44,11,71,45],[17,47,21,4,48,22],[9,39,13,16,40,14],[3,135,107,5,136,108],[3,67,41,13,68,42],[15,54,24,5,55,25],[15,43,15,10,44,16],[4,144,116,4,145,117],[17,68,42],[17,50,22,6,51,23],[19,46,16,6,47,17],[2,139,111,7,140,112],[17,74,46],[7,54,24,16,55,25],[34,37,13],[4,151,121,5,152,122],[4,75,47,14,76,48],[11,54,24,14,55,25],[16,45,15,14,46,16],[6,147,117,4,148,118],[6,73,45,14,74,46],[11,54,24,16,55,25],[30,46,16,2,47,17],[8,132,106,4,133,107],[8,75,47,13,76,48],[7,54,24,22,55,25],[22,45,15,13,46,16],[10,142,114,2,143,115],[19,74,46,4,75,47],[28,50,22,6,51,23],[33,46,16,4,47,17],[8,152,122,4,153,123],[22,73,45,3,74,46],[8,53,23,26,54,24],[12,45,15,28,46,16],[3,147,117,10,148,118],[3,73,45,23,74,46],[4,54,24,31,55,25],[11,45,15,31,46,16],[7,146,116,7,147,117],[21,73,45,7,74,46],[1,53,23,37,54,24],[19,45,15,26,46,16],[5,145,115,10,146,116],[19,75,47,10,76,48],[15,54,24,25,55,25],[23,45,15,25,46,16],[13,145,115,3,146,116],[2,74,46,29,75,47],[42,54,24,1,55,25],[23,45,15,28,46,16],[17,145,115],[10,74,46,23,75,47],[10,54,24,35,55,25],[19,45,15,35,46,16],[17,145,115,1,146,116],[14,74,46,21,75,47],[29,54,24,19,55,25],[11,45,15,46,46,16],[13,145,115,6,146,116],[14,74,46,23,75,47],[44,54,24,7,55,25],[59,46,16,1,47,17],[12,151,121,7,152,122],[12,75,47,26,76,48],[39,54,24,14,55,25],[22,45,15,41,46,16],[6,151,121,14,152,122],[6,75,47,34,76,48],[46,54,24,10,55,25],[2,45,15,64,46,16],[17,152,122,4,153,123],[29,74,46,14,75,47],[49,54,24,10,55,25],[24,45,15,46,46,16],[4,152,122,18,153,123],[13,74,46,32,75,47],[48,54,24,14,55,25],[42,45,15,32,46,16],[20,147,117,4,148,118],[40,75,47,7,76,48],[43,54,24,22,55,25],[10,45,15,67,46,16],[19,148,118,6,149,119],[18,75,47,31,76,48],[34,54,24,34,55,25],[20,45,15,61,46,16]],u.getRSBlocks=function(t,e){var r=u.getRsBlockTable(t,e);if(void 0==r)throw new Error("bad rs block @ typeNumber:"+t+"/errorCorrectLevel:"+e);for(var n=r.length/3,o=new Array,i=0;i<n;i++)for(var a=r[3*i+0],s=r[3*i+1],l=r[3*i+2],c=0;c<a;c++)o.push(new u(s,l));return o},u.getRsBlockTable=function(t,e){switch(e){case a.L:return u.RS_BLOCK_TABLE[4*(t-1)+0];case a.M:return u.RS_BLOCK_TABLE[4*(t-1)+1];case a.Q:return u.RS_BLOCK_TABLE[4*(t-1)+2];case a.H:return u.RS_BLOCK_TABLE[4*(t-1)+3];default:return}};var s=u;function l(){this.buffer=new Array,this.length=0}l.prototype={get:function(t){var e=Math.floor(t/8);return 1==(this.buffer[e]>>>7-t%8&1)},put:function(t,e){for(var r=0;r<e;r++)this.putBit(1==(t>>>e-r-1&1))},getLengthInBits:function(){return this.length},putBit:function(t){var e=Math.floor(this.length/8);this.buffer.length<=e&&this.buffer.push(0),t&&(this.buffer[e]|=128>>>this.length%8),this.length++}};for(var c=l,h={glog:function(t){if(t<1)throw new Error("glog("+t+")");return h.LOG_TABLE[t]},gexp:function(t){while(t<0)t+=255;while(t>=256)t-=255;return h.EXP_TABLE[t]},EXP_TABLE:new Array(256),LOG_TABLE:new Array(256)},f=0;f<8;f++)h.EXP_TABLE[f]=1<<f;for(f=8;f<256;f++)h.EXP_TABLE[f]=h.EXP_TABLE[f-4]^h.EXP_TABLE[f-5]^h.EXP_TABLE[f-6]^h.EXP_TABLE[f-8];for(f=0;f<255;f++)h.LOG_TABLE[h.EXP_TABLE[f]]=f;var d=h;function g(t,e){if(void 0==t.length)throw new Error(t.length+"/"+e);var r=0;while(r<t.length&&0==t[r])r++;this.num=new Array(t.length-r+e);for(var n=0;n<t.length-r;n++)this.num[n]=t[n+r]}g.prototype={get:function(t){return this.num[t]},getLength:function(){return this.num.length},multiply:function(t){for(var e=new Array(this.getLength()+t.getLength()-1),r=0;r<this.getLength();r++)for(var n=0;n<t.getLength();n++)e[r+n]^=d.gexp(d.glog(this.get(r))+d.glog(t.get(n)));return new g(e,0)},mod:function(t){if(this.getLength()-t.getLength()<0)return this;for(var e=d.glog(this.get(0))-d.glog(t.get(0)),r=new Array(this.getLength()),n=0;n<this.getLength();n++)r[n]=this.get(n);for(n=0;n<t.getLength();n++)r[n]^=d.gexp(d.glog(t.get(n))+e);return new g(r,0).mod(t)}};var p=g,v={PATTERN000:0,PATTERN001:1,PATTERN010:2,PATTERN011:3,PATTERN100:4,PATTERN101:5,PATTERN110:6,PATTERN111:7},m={PATTERN_POSITION_TABLE:[[],[6,18],[6,22],[6,26],[6,30],[6,34],[6,22,38],[6,24,42],[6,26,46],[6,28,50],[6,30,54],[6,32,58],[6,34,62],[6,26,46,66],[6,26,48,70],[6,26,50,74],[6,30,54,78],[6,30,56,82],[6,30,58,86],[6,34,62,90],[6,28,50,72,94],[6,26,50,74,98],[6,30,54,78,102],[6,28,54,80,106],[6,32,58,84,110],[6,30,58,86,114],[6,34,62,90,118],[6,26,50,74,98,122],[6,30,54,78,102,126],[6,26,52,78,104,130],[6,30,56,82,108,134],[6,34,60,86,112,138],[6,30,58,86,114,142],[6,34,62,90,118,146],[6,30,54,78,102,126,150],[6,24,50,76,102,128,154],[6,28,54,80,106,132,158],[6,32,58,84,110,136,162],[6,26,54,82,110,138,166],[6,30,58,86,114,142,170]],G15:1335,G18:7973,G15_MASK:21522,getBCHTypeInfo:function(t){var e=t<<10;while(m.getBCHDigit(e)-m.getBCHDigit(m.G15)>=0)e^=m.G15<<m.getBCHDigit(e)-m.getBCHDigit(m.G15);return(t<<10|e)^m.G15_MASK},getBCHTypeNumber:function(t){var e=t<<12;while(m.getBCHDigit(e)-m.getBCHDigit(m.G18)>=0)e^=m.G18<<m.getBCHDigit(e)-m.getBCHDigit(m.G18);return t<<12|e},getBCHDigit:function(t){var e=0;while(0!=t)e++,t>>>=1;return e},getPatternPosition:function(t){return m.PATTERN_POSITION_TABLE[t-1]},getMask:function(t,e,r){switch(t){case v.PATTERN000:return(e+r)%2==0;case v.PATTERN001:return e%2==0;case v.PATTERN010:return r%3==0;case v.PATTERN011:return(e+r)%3==0;case v.PATTERN100:return(Math.floor(e/2)+Math.floor(r/3))%2==0;case v.PATTERN101:return e*r%2+e*r%3==0;case v.PATTERN110:return(e*r%2+e*r%3)%2==0;case v.PATTERN111:return(e*r%3+(e+r)%2)%2==0;default:throw new Error("bad maskPattern:"+t)}},getErrorCorrectPolynomial:function(t){for(var e=new p([1],0),r=0;r<t;r++)e=e.multiply(new p([1,d.gexp(r)],0));return e},getLengthInBits:function(t,e){if(1<=e&&e<10)switch(t){case n.MODE_NUMBER:return 10;case n.MODE_ALPHA_NUM:return 9;case n.MODE_8BIT_BYTE:return 8;case n.MODE_KANJI:return 8;default:throw new Error("mode:"+t)}else if(e<27)switch(t){case n.MODE_NUMBER:return 12;case n.MODE_ALPHA_NUM:return 11;case n.MODE_8BIT_BYTE:return 16;case n.MODE_KANJI:return 10;default:throw new Error("mode:"+t)}else{if(!(e<41))throw new Error("type:"+e);switch(t){case n.MODE_NUMBER:return 14;case n.MODE_ALPHA_NUM:return 13;case n.MODE_8BIT_BYTE:return 16;case n.MODE_KANJI:return 12;default:throw new Error("mode:"+t)}}},getLostPoint:function(t){for(var e=t.getModuleCount(),r=0,n=0;n<e;n++)for(var o=0;o<e;o++){for(var i=0,a=t.isDark(n,o),u=-1;u<=1;u++)if(!(n+u<0||e<=n+u))for(var s=-1;s<=1;s++)o+s<0||e<=o+s||0==u&&0==s||a==t.isDark(n+u,o+s)&&i++;i>5&&(r+=3+i-5)}for(n=0;n<e-1;n++)for(o=0;o<e-1;o++){var l=0;t.isDark(n,o)&&l++,t.isDark(n+1,o)&&l++,t.isDark(n,o+1)&&l++,t.isDark(n+1,o+1)&&l++,0!=l&&4!=l||(r+=3)}for(n=0;n<e;n++)for(o=0;o<e-6;o++)t.isDark(n,o)&&!t.isDark(n,o+1)&&t.isDark(n,o+2)&&t.isDark(n,o+3)&&t.isDark(n,o+4)&&!t.isDark(n,o+5)&&t.isDark(n,o+6)&&(r+=40);for(o=0;o<e;o++)for(n=0;n<e-6;n++)t.isDark(n,o)&&!t.isDark(n+1,o)&&t.isDark(n+2,o)&&t.isDark(n+3,o)&&t.isDark(n+4,o)&&!t.isDark(n+5,o)&&t.isDark(n+6,o)&&(r+=40);var c=0;for(o=0;o<e;o++)for(n=0;n<e;n++)t.isDark(n,o)&&c++;var h=Math.abs(100*c/e/e-50)/5;return r+=10*h,r}},y=m;function E(t,e){this.typeNumber=t,this.errorCorrectLevel=e,this.modules=null,this.moduleCount=0,this.dataCache=null,this.dataList=[]}var b=E.prototype;b.addData=function(t){var e=new i(t);this.dataList.push(e),this.dataCache=null},b.isDark=function(t,e){if(t<0||this.moduleCount<=t||e<0||this.moduleCount<=e)throw new Error(t+","+e);return this.modules[t][e]},b.getModuleCount=function(){return this.moduleCount},b.make=function(){if(this.typeNumber<1){var t=1;for(t=1;t<40;t++){for(var e=s.getRSBlocks(t,this.errorCorrectLevel),r=new c,n=0,o=0;o<e.length;o++)n+=e[o].dataCount;for(o=0;o<this.dataList.length;o++){var i=this.dataList[o];r.put(i.mode,4),r.put(i.getLength(),y.getLengthInBits(i.mode,t)),i.write(r)}if(r.getLengthInBits()<=8*n)break}this.typeNumber=t}this.makeImpl(!1,this.getBestMaskPattern())},b.makeImpl=function(t,e){this.moduleCount=4*this.typeNumber+17,this.modules=new Array(this.moduleCount);for(var r=0;r<this.moduleCount;r++){this.modules[r]=new Array(this.moduleCount);for(var n=0;n<this.moduleCount;n++)this.modules[r][n]=null}this.setupPositionProbePattern(0,0),this.setupPositionProbePattern(this.moduleCount-7,0),this.setupPositionProbePattern(0,this.moduleCount-7),this.setupPositionAdjustPattern(),this.setupTimingPattern(),this.setupTypeInfo(t,e),this.typeNumber>=7&&this.setupTypeNumber(t),null==this.dataCache&&(this.dataCache=E.createData(this.typeNumber,this.errorCorrectLevel,this.dataList)),this.mapData(this.dataCache,e)},b.setupPositionProbePattern=function(t,e){for(var r=-1;r<=7;r++)if(!(t+r<=-1||this.moduleCount<=t+r))for(var n=-1;n<=7;n++)e+n<=-1||this.moduleCount<=e+n||(this.modules[t+r][e+n]=0<=r&&r<=6&&(0==n||6==n)||0<=n&&n<=6&&(0==r||6==r)||2<=r&&r<=4&&2<=n&&n<=4)},b.getBestMaskPattern=function(){for(var t=0,e=0,r=0;r<8;r++){this.makeImpl(!0,r);var n=y.getLostPoint(this);(0==r||t>n)&&(t=n,e=r)}return e},b.createMovieClip=function(t,e,r){var n=t.createEmptyMovieClip(e,r),o=1;this.make();for(var i=0;i<this.modules.length;i++)for(var a=i*o,u=0;u<this.modules[i].length;u++){var s=u*o,l=this.modules[i][u];l&&(n.beginFill(0,100),n.moveTo(s,a),n.lineTo(s+o,a),n.lineTo(s+o,a+o),n.lineTo(s,a+o),n.endFill())}return n},b.setupTimingPattern=function(){for(var t=8;t<this.moduleCount-8;t++)null==this.modules[t][6]&&(this.modules[t][6]=t%2==0);for(var e=8;e<this.moduleCount-8;e++)null==this.modules[6][e]&&(this.modules[6][e]=e%2==0)},b.setupPositionAdjustPattern=function(){for(var t=y.getPatternPosition(this.typeNumber),e=0;e<t.length;e++)for(var r=0;r<t.length;r++){var n=t[e],o=t[r];if(null==this.modules[n][o])for(var i=-2;i<=2;i++)for(var a=-2;a<=2;a++)this.modules[n+i][o+a]=-2==i||2==i||-2==a||2==a||0==i&&0==a}},b.setupTypeNumber=function(t){for(var e=y.getBCHTypeNumber(this.typeNumber),r=0;r<18;r++){var n=!t&&1==(e>>r&1);this.modules[Math.floor(r/3)][r%3+this.moduleCount-8-3]=n}for(r=0;r<18;r++){n=!t&&1==(e>>r&1);this.modules[r%3+this.moduleCount-8-3][Math.floor(r/3)]=n}},b.setupTypeInfo=function(t,e){for(var r=this.errorCorrectLevel<<3|e,n=y.getBCHTypeInfo(r),o=0;o<15;o++){var i=!t&&1==(n>>o&1);o<6?this.modules[o][8]=i:o<8?this.modules[o+1][8]=i:this.modules[this.moduleCount-15+o][8]=i}for(o=0;o<15;o++){i=!t&&1==(n>>o&1);o<8?this.modules[8][this.moduleCount-o-1]=i:o<9?this.modules[8][15-o-1+1]=i:this.modules[8][15-o-1]=i}this.modules[this.moduleCount-8][8]=!t},b.mapData=function(t,e){for(var r=-1,n=this.moduleCount-1,o=7,i=0,a=this.moduleCount-1;a>0;a-=2){6==a&&a--;while(1){for(var u=0;u<2;u++)if(null==this.modules[n][a-u]){var s=!1;i<t.length&&(s=1==(t[i]>>>o&1));var l=y.getMask(e,n,a-u);l&&(s=!s),this.modules[n][a-u]=s,o--,-1==o&&(i++,o=7)}if(n+=r,n<0||this.moduleCount<=n){n-=r,r=-r;break}}}},E.PAD0=236,E.PAD1=17,E.createData=function(t,e,r){for(var n=s.getRSBlocks(t,e),o=new c,i=0;i<r.length;i++){var a=r[i];o.put(a.mode,4),o.put(a.getLength(),y.getLengthInBits(a.mode,t)),a.write(o)}var u=0;for(i=0;i<n.length;i++)u+=n[i].dataCount;if(o.getLengthInBits()>8*u)throw new Error("code length overflow. ("+o.getLengthInBits()+">"+8*u+")");o.getLengthInBits()+4<=8*u&&o.put(0,4);while(o.getLengthInBits()%8!=0)o.putBit(!1);while(1){if(o.getLengthInBits()>=8*u)break;if(o.put(E.PAD0,8),o.getLengthInBits()>=8*u)break;o.put(E.PAD1,8)}return E.createBytes(o,n)},E.createBytes=function(t,e){for(var r=0,n=0,o=0,i=new Array(e.length),a=new Array(e.length),u=0;u<e.length;u++){var s=e[u].dataCount,l=e[u].totalCount-s;n=Math.max(n,s),o=Math.max(o,l),i[u]=new Array(s);for(var c=0;c<i[u].length;c++)i[u][c]=255&t.buffer[c+r];r+=s;var h=y.getErrorCorrectPolynomial(l),f=new p(i[u],h.getLength()-1),d=f.mod(h);a[u]=new Array(h.getLength()-1);for(c=0;c<a[u].length;c++){var g=c+d.getLength()-a[u].length;a[u][c]=g>=0?d.get(g):0}}var v=0;for(c=0;c<e.length;c++)v+=e[c].totalCount;var m=new Array(v),E=0;for(c=0;c<n;c++)for(u=0;u<e.length;u++)c<i[u].length&&(m[E++]=i[u][c]);for(c=0;c<o;c++)for(u=0;u<e.length;u++)c<a[u].length&&(m[E++]=a[u][c]);return m};var T=E;function w(t){for(var e="",r=0;r<t.length;r++){var n=t.charCodeAt(r);n<128?e+=String.fromCharCode(n):n<2048?(e+=String.fromCharCode(192|n>>6),e+=String.fromCharCode(128|63&n)):n<55296||n>=57344?(e+=String.fromCharCode(224|n>>12),e+=String.fromCharCode(128|n>>6&63),e+=String.fromCharCode(128|63&n)):(r++,n=65536+((1023&n)<<10|1023&t.charCodeAt(r)),e+=String.fromCharCode(240|n>>18),e+=String.fromCharCode(128|n>>12&63),e+=String.fromCharCode(128|n>>6&63),e+=String.fromCharCode(128|63&n))}return e}function k(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:0,r=[];return t.forEach((function(t,n){var o=null;t.forEach((function(i,a){if(!i&&null!==o)return r.push("M".concat(o+e," ").concat(n+e,"h").concat(a-o,"v1H").concat(o+e,"z")),void(o=null);if(a!==t.length-1)i&&null===o&&(o=a);else{if(!i)return;null===o?r.push("M".concat(a+e,",").concat(n+e," h1v1H").concat(a+e,"z")):r.push("M".concat(o+e,",").concat(n+e," h").concat(a+1-o,"v1H").concat(o+e,"z"))}}))})),r.join("")}var C={props:{value:{type:String,required:!0,default:""},className:{type:String,default:""},size:{type:[Number,String],default:100,validator:function(t){return!0!==isNaN(Number(t))}},level:{type:String,default:"L",validator:function(t){return["L","Q","M","H"].indexOf(t)>-1}},background:{type:String,default:"#fff"},foreground:{type:String,default:"#000"},renderAs:{type:String,required:!1,default:"canvas",validator:function(t){return["canvas","svg"].indexOf(t)>-1}}},data:function(){return{numCells:0,fgPath:""}},updated:function(){this.render()},mounted:function(){this.render()},methods:{render:function(){var t=this.value,e=this.size,r=this.level,n=this.background,o=this.foreground,i=this.renderAs,u=e>>>0,s=new T(-1,a[r]);s.addData(w(t)),s.make();var l=s.modules,c=u/l.length,h=u/l.length,f=window.devicePixelRatio||1;if("svg"===i)this.numCells=l.length,this.fgPath=k(l);else{var d=this.$refs["qrcode-vue"],g=d.getContext("2d");d.height=d.width=u*f,g.scale(f,f),l.forEach((function(t,e){t.forEach((function(t,r){g.fillStyle=t?o:n;var i=Math.ceil((r+1)*c)-Math.floor(r*c),a=Math.ceil((e+1)*h)-Math.floor(e*h);g.fillRect(Math.round(r*c),Math.round(e*h),i,a)}))}))}}},render:function(t){var e=this.className,r=this.value,n=this.level,o=this.background,i=this.foreground,a=this.size,u=this.renderAs,s=this.numCells,l=this.fgPath;return t("div",{class:this.class||e,attrs:{value:r,level:n,background:o,foreground:i}},["svg"===u?t("svg",{attrs:{height:a,width:a,shapeRendering:"crispEdges",viewBox:"0 0 ".concat(s," ").concat(s)},style:{width:a+"px",height:a+"px"}},[t("path",{attrs:{fill:o,d:"M0,0 h".concat(s,"v").concat(s,"H0z")}}),t("path",{attrs:{fill:i,d:l}})]):t("canvas",{attrs:{height:a,width:a},style:{width:a+"px",height:a+"px"},ref:"qrcode-vue"},[])])}};e["a"]=C}}]);