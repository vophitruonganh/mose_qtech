/*
Mithril v0.2.5
http://mithril.js.org
(c) 2014-2016 Leo Horie
License: MIT
*/
!function(a,b){"use strict";var c=b(a);"object"==typeof module&&null!=module&&module.exports?module.exports=c:"function"==typeof define&&define.amd?define(function(){return c}):a.m=c}("undefined"!=typeof window?window:this,function(a,b){"use strict";function c(a){return"function"==typeof a}function d(a){return"[object Object]"===Ca.call(a)}function e(a){return"[object String]"===Ca.call(a)}function f(){}function g(a){xa=a.document,ya=a.location,Aa=a.cancelAnimationFrame||a.clearTimeout,za=a.requestAnimationFrame||a.setTimeout}function h(a,b){for(var c,d=[],e=/(?:(^|#|\.)([^#\.\[\]]+))|(\[.+?\])/g;c=e.exec(b);)if(""===c[1]&&c[2])a.tag=c[2];else if("#"===c[1])a.attrs.id=c[2];else if("."===c[1])d.push(c[2]);else if("["===c[3][0]){var f=/\[(.+?)(?:=("|'|)(.*?)\2)?\]/.exec(c[3]);a.attrs[f[1]]=f[3]||""}return d}function i(a,b){var c=b?a.slice(1):a;return 1===c.length&&Da(c[0])?c[0]:c}function j(a,b,c){var d="class"in b?"class":"className";for(var e in b)Ba.call(b,e)&&(e===d&&null!=b[e]&&""!==b[e]?(c.push(b[e]),a[e]=""):a[e]=b[e]);c.length&&(a[d]=c.join(" "))}function k(a,b){for(var c=[],f=1,g=arguments.length;g>f;f++)c[f-1]=arguments[f];if(d(a))return da(a,c);if(!e(a))throw new Error("selector in m(selector, attrs, children) should be a string");var k=null!=b&&d(b)&&!("tag"in b||"view"in b||"subtree"in b),l=k?b:{},m={tag:"div",attrs:{},children:i(c,k)};return j(m.attrs,l,h(m,a)),m}function l(a,b){for(var c=0;c<a.length&&!b(a[c],c++););}function m(a,b){l(a,function(a,c){return(a=a&&a.attrs)&&null!=a.key&&b(a,c)})}function n(a){try{if(null!=a&&null!=a.toString())return a}catch(b){}return""}function o(a,b,c,d){try{q(a,b,c),b.nodeValue=d}catch(e){}}function p(a){for(var b=0;b<a.length;b++)Da(a[b])&&(a=a.concat.apply([],a),b--);return a}function q(a,b,c){a.insertBefore(b,a.childNodes[c]||null)}function r(a,b,c,d){m(a,function(a,d){b[a=a.key]=b[a]?{action:Ha,index:d,from:b[a].index,element:c.nodes[b[a].index]||xa.createElement("div")}:{action:Ga,index:d}});var e=[];for(var f in b)Ba.call(b,f)&&e.push(b[f]);var g=e.sort(R),h=new Array(c.length);return h.nodes=c.nodes.slice(),l(g,function(b){var e=b.index;if(b.action===Fa&&(W(c[e].nodes,c[e]),h.splice(e,1)),b.action===Ga){var f=xa.createElement("div");f.key=a[e].attrs.key,q(d,f,e),h.splice(e,0,{attrs:{key:a[e].attrs.key},nodes:[f]}),h.nodes[e]=f}if(b.action===Ha){var g=b.element,i=d.childNodes[e];i!==g&&null!==g&&d.insertBefore(g,i||null),h[e]=c[b.from],h.nodes[e]=g}}),h}function s(a,b,c,d){var e=a.length!==b.length;return e||m(a,function(a,c){var d=b[c];return e=d&&d.attrs&&d.attrs.key!==a.key}),e?r(a,c,b,d):b}function t(a,b,c){l(a,function(a,d){null!=b[d]&&c.push.apply(c,b[d].nodes)}),l(b.nodes,function(a,d){null!=a.parentNode&&c.indexOf(a)<0&&W([a],[b[d]])}),a.length<b.length&&(b.length=a.length),b.nodes=c}function u(a){var b=0;m(a,function(){return l(a,function(a){(a=a&&a.attrs)&&null==a.key&&(a.key="__mithril__"+b++)}),1})}function v(a,b,c){return a.tag!==b.tag?!0:c.sort().join()!==Object.keys(b.attrs).sort().join()?!0:a.attrs.id!==b.attrs.id?!0:a.attrs.key!==b.attrs.key?!0:"all"===k.redraw.strategy()?!b.configContext||b.configContext.retain!==!0:"diff"===k.redraw.strategy()?b.configContext&&b.configContext.retain===!1:!1}function w(a,b,d){v(a,b,d)&&(b.nodes.length&&W(b.nodes),b.configContext&&c(b.configContext.onunload)&&b.configContext.onunload(),b.controllers&&l(b.controllers,function(a){a.onunload&&a.onunload({preventDefault:f})}))}function x(a,b){return a.attrs.xmlns?a.attrs.xmlns:"svg"===a.tag?"http://www.w3.org/2000/svg":"math"===a.tag?"http://www.w3.org/1998/Math/MathML":b}function y(a,b,c){c.length&&(a.views=b,a.controllers=c,l(c,function(a){if(a.onunload&&a.onunload.$old&&(a.onunload=a.onunload.$old),Ia&&a.onunload){var b=a.onunload;a.onunload=f,a.onunload.$old=b}}))}function z(a,b,d,e,f){if(c(b.attrs.config)){var g=f.configContext=f.configContext||{};a.push(function(){return b.attrs.config.call(b,d,!e,g,f)})}}function A(a,c,d,e,f,g,h,i){var j=a.nodes[0];return e&&V(j,c.tag,c.attrs,a.attrs,f),a.children=Q(j,c.tag,b,b,c.children,a.children,!1,0,c.attrs.contenteditable?j:d,f,h),a.nodes.intact=!0,i.length&&(a.views=g,a.controllers=i),j}function B(a,b,c){var d;a.$trusted?d=_(b,c,a):(d=[xa.createTextNode(a)],b.nodeName in Ea||q(b,d[0],c));var e;return e="string"==typeof a||"number"==typeof a||"boolean"==typeof a?new a.constructor(a):a,e.nodes=d,e}function C(a,b,c,d,e,f){var g=b.nodes;return d&&d===xa.activeElement||(a.$trusted?(W(g,b),g=_(c,e,a)):"textarea"===f?c.value=a:d?d.innerHTML=a:((1===g[0].nodeType||g.length>1||g[0].nodeValue.trim&&!g[0].nodeValue.trim())&&(W(b.nodes,b),g=[xa.createTextNode(a)]),o(c,g[0],e,a))),b=new a.constructor(a),b.nodes=g,b}function D(a,b,c,d,e,f,g){return a.nodes.length?a.valueOf()!==b.valueOf()||e?C(b,a,d,f,c,g):(a.nodes.intact=!0,a):B(b,d,c)}function E(a){if(a.$trusted){var b=a.match(/<[^\/]|\>\s*[^<]/g);if(null!=b)return b.length}else if(Da(a))return a.length;return 1}function F(a,c,d,e,f,g,h,i,j){a=p(a);var k=[],l=c.length===a.length,n=0,o={},q=!1;m(c,function(a,b){q=!0,o[c[b].attrs.key]={action:Fa,index:b}}),u(a),q&&(c=s(a,c,o,d));for(var r=0,v=0,w=a.length;w>v;v++){var x=Q(d,f,c,e,a[v],c[r],g,e+n||n,h,i,j);x!==b&&(l=l&&x.nodes.intact,n+=E(x),c[r++]=x)}return l||t(a,c,k),c}function G(a,b,c,d,e){if(null!=b){if(Ca.call(b)===Ca.call(a))return b;if(e&&e.nodes){var f=c-d,g=f+(Da(a)?a:b.nodes).length;W(e.nodes.slice(f,g),e.slice(f,g))}else b.nodes&&W(b.nodes,b)}return b=new a.constructor,b.tag&&(b={}),b.nodes=[],b}function H(a,b){return a.attrs.is?null==b?xa.createElement(a.tag,a.attrs.is):xa.createElementNS(b,a.tag,a.attrs.is):null==b?xa.createElement(a.tag):xa.createElementNS(b,a.tag)}function I(a,b,c,d){return d?V(b,a.tag,a.attrs,{},c):a.attrs}function J(a,c,d,e,f,g){return null!=a.children&&a.children.length>0?Q(c,a.tag,b,b,a.children,d.children,!0,0,a.attrs.contenteditable?c:e,f,g):a.children}function K(a,b,c,d,e,f,g){var h={tag:a.tag,attrs:b,children:c,nodes:[d]};return y(h,f,g),h.children&&!h.children.nodes&&(h.children.nodes=[]),"select"===a.tag&&"value"in a.attrs&&V(d,a.tag,{value:a.attrs.value},{},e),h}function L(a,b,d,e){var f;return f="diff"===k.redraw.strategy()&&a?a.indexOf(b):-1,f>-1?d[f]:c(e)?new e:{}}function M(a,b,c,d){null!=d.onunload&&Ka.map(function(a){return a.handler}).indexOf(d.onunload)<0&&Ka.push({controller:d,handler:d.onunload}),a.push(c),b.push(d)}function N(a,b,c,d,e,f){var g=L(c.views,b,d,a.controller),h=a&&a.attrs&&a.attrs.key;return a=0===Ia||La||d&&d.indexOf(g)>-1?a.view(g):{tag:"placeholder"},"retain"===a.subtree?a:(a.attrs=a.attrs||{},a.attrs.key=h,M(f,e,b,g),a)}function O(a,b,c,d){for(var e=b&&b.controllers;null!=a.view;)a=N(a,a.view.$original||a.view,b,e,d,c);return a}function P(a,b,c,d,f,g,h,i){var j=[],k=[];if(a=O(a,b,j,k),"retain"===a.subtree)return b;if(!a.tag&&k.length)throw new Error("Component template must return a virtual element, not an array, string, etc.");a.attrs=a.attrs||{},b.attrs=b.attrs||{};var l=Object.keys(a.attrs),m=l.length>("key"in a.attrs?1:0);if(w(a,b,l),e(a.tag)){var n=0===b.nodes.length;h=x(a,h);var o;if(n){o=H(a,h);var p=I(a,o,h,m);q(d,o,f);var r=J(a,o,b,c,h,i);b=K(a,p,r,o,h,j,k)}else o=A(b,a,c,m,h,j,i,k);return n||g!==!0||null==o||q(d,o,f),z(i,a,o,n,b),b}}function Q(a,b,e,f,g,h,i,j,k,l,m){return g=n(g),"retain"===g.subtree?h:(h=G(g,h,j,f,e),Da(g)?F(g,h,a,j,b,i,k,l,m):null!=g&&d(g)?P(g,h,k,a,j,i,l,m):c(g)?h:D(h,g,j,a,i,k,b))}function R(a,b){return a.action-b.action||a.index-b.index}function S(a,b,c){for(var d in b)Ba.call(b,d)&&(null!=c&&c[d]===b[d]||(a.style[d]=b[d]));for(d in c)Ba.call(c,d)&&(Ba.call(b,d)||(a.style[d]=""))}function T(a,b,e,f,g,h){if("config"===b||"key"===b)return!0;if(c(e)&&"on"===b.slice(0,2))a[b]=aa(e,a);else if("style"===b&&null!=e&&d(e))S(a,e,f);else if(null!=h)"href"===b?a.setAttributeNS("http://www.w3.org/1999/xlink","href",e):a.setAttribute("className"===b?"class":b,e);else if(b in a&&!Ma[b])try{"input"===g&&a[b]===e||(a[b]=e)}catch(i){a.setAttribute(b,e)}else a.setAttribute(b,e)}function U(a,b,c,d,e,f,g){if(b in e&&d===c&&xa.activeElement!==a)"value"===b&&"input"===f&&a.value!==c&&(a.value=c);else{e[b]=c;try{return T(a,b,c,d,f,g)}catch(h){if(h.message.indexOf("Invalid argument")<0)throw h}}}function V(a,b,c,d,e){for(var f in c)!Ba.call(c,f)||!U(a,f,c[f],d[f],d,b,e);return d}function W(a,b){for(var c=a.length-1;c>-1;c--)if(a[c]&&a[c].parentNode){try{a[c].parentNode.removeChild(a[c])}catch(d){}b=[].concat(b),b[c]&&X(b[c])}a.length&&(a.length=0)}function X(a){a.configContext&&c(a.configContext.onunload)&&(a.configContext.onunload(),a.configContext.onunload=null),a.controllers&&l(a.controllers,function(a){c(a.onunload)&&a.onunload({preventDefault:f})}),a.children&&(Da(a.children)?l(a.children,X):a.children.tag&&X(a.children))}function Y(a,b){try{a.appendChild(xa.createRange().createContextualFragment(b))}catch(c){a.insertAdjacentHTML("beforeend",b),Z(a)}}function Z(a){if("SCRIPT"===a.tagName)a.parentNode.replaceChild($(a),a);else{var b=a.childNodes;if(b&&b.length)for(var c=0;c<b.length;c++)Z(b[c])}return a}function $(a){for(var b=document.createElement("script"),c=a.attributes,d=0;d<c.length;d++)b.setAttribute(c[d].name,c[d].value);return b.text=a.innerHTML,b}function _(a,b,c){var d=a.childNodes[b];if(d){var e=1!==d.nodeType,f=xa.createElement("span");e?(a.insertBefore(f,d||null),f.insertAdjacentHTML("beforebegin",c),a.removeChild(f)):d.insertAdjacentHTML("beforebegin",c)}else Y(a,c);for(var g=[];a.childNodes[b]!==d;)g.push(a.childNodes[b]),b++;return g}function aa(a,b){return function(c){c=c||event,k.redraw.strategy("diff"),k.startComputation();try{return a.call(b,c)}finally{ha()}}}function ba(a){var b=Oa.indexOf(a);return 0>b?Oa.push(a)-1:b}function ca(a){function b(){return arguments.length&&(a=arguments[0]),a}return b.toJSON=function(){return a},b}function da(a,b){function c(){return(a.controller||f).apply(this,b)||this}function d(c){for(var d=[c].concat(b),e=1;e<arguments.length;e++)d.push(arguments[e]);return a.view.apply(a,d)}a.controller&&(c.prototype=a.controller.prototype),d.$original=a.view;var e={controller:c,view:d};return b[0]&&null!=b[0].key&&(e.attrs={key:b[0].key}),e}function ea(a,b,c,d){if(!d){k.redraw.strategy("all"),k.startComputation(),Ra[c]=b;var e;e=Qa=a?a:a={controller:f};var g=new(a.controller||f);return e===Qa&&(Ta[c]=g,Sa[c]=a),ha(),null===a&&fa(b,c),Ta[c]}null==a&&fa(b,c)}function fa(a,b){Ra.splice(b,1),Ta.splice(b,1),Sa.splice(b,1),oa(a),Oa.splice(ba(a),1)}function ga(){Wa&&(Wa(),Wa=null),l(Ra,function(a,b){var c=Sa[b];if(Ta[b]){var d=[Ta[b]];k.render(a,c.view?c.view(Ta[b],d):"")}}),Xa&&(Xa(),Xa=null),Ua=null,Va=new Date,k.redraw.strategy("diff")}function ha(){"none"===k.redraw.strategy()?(Ia--,k.redraw.strategy("diff")):k.endComputation()}function ia(a){return a.slice(ab[k.route.mode].length)}function ja(a,b,c){$a={};var d=c.indexOf("?");-1!==d&&($a=na(c.substr(d+1,c.length)),c=c.substr(0,d));var e=Object.keys(b),f=e.indexOf(c);if(-1!==f)return k.mount(a,b[e[f]]),!0;for(var g in b)if(Ba.call(b,g)){if(g===c)return k.mount(a,b[g]),!0;var h=new RegExp("^"+g.replace(/:[^\/]+?\.{3}/g,"(.*?)").replace(/:[^\/]+/g,"([^\\/]+)")+"/?$");if(h.test(c))return c.replace(h,function(){var c=g.match(/:[^\/]+/g)||[],d=[].slice.call(arguments,1,-2);l(c,function(a,b){$a[a.replace(/:|\./g,"")]=decodeURIComponent(d[b])}),k.mount(a,b[g])}),!0}}function ka(a){if(a=a||event,!(a.ctrlKey||a.metaKey||a.shiftKey||2===a.which)){a.preventDefault?a.preventDefault():a.returnValue=!1;var b,c=a.currentTarget||a.srcElement;for(b="pathname"===k.route.mode&&c.search?na(c.search.slice(1)):{};c&&!/a/i.test(c.nodeName);)c=c.parentNode;Ia=0,k.route(c[k.route.mode].slice(ab[k.route.mode].length),b)}}function la(){"hash"!==k.route.mode&&ya.hash?ya.hash=ya.hash:a.scrollTo(0,0)}function ma(a,c){var e={},f=[];for(var g in a)if(Ba.call(a,g)){var h=c?c+"["+g+"]":g,i=a[g];if(null===i)f.push(encodeURIComponent(h));else if(d(i))f.push(ma(i,h));else if(Da(i)){var j=[];e[h]=e[h]||{},l(i,function(a){e[h][a]||(e[h][a]=!0,j.push(encodeURIComponent(h)+"="+encodeURIComponent(a)))}),f.push(j.join("&"))}else i!==b&&f.push(encodeURIComponent(h)+"="+encodeURIComponent(i))}return f.join("&")}function na(a){if(""===a||null==a)return{};"?"===a.charAt(0)&&(a=a.slice(1));var b=a.split("&"),c={};return l(b,function(a){var b=a.split("="),d=decodeURIComponent(b[0]),e=2===b.length?decodeURIComponent(b[1]):null;null!=c[d]?(Da(c[d])||(c[d]=[c[d]]),c[d].push(e)):c[d]=e}),c}function oa(a){var c=ba(a);W(a.childNodes,Pa[c]),Pa[c]=b}function pa(a,b){var c=k.prop(b);return a.then(c),c.then=function(c,d){return pa(a.then(c,d),b)},c["catch"]=c.then.bind(null,null),c}function qa(a,b){function e(a){i=a||gb,l.map(function(a){i===fb?a.resolve(j):a.reject(j)})}function f(a,b,e,f){if((null!=j&&d(j)||c(j))&&c(a))try{var g=0;a.call(j,function(a){g++||(j=a,b())},function(a){g++||(j=a,e())})}catch(h){k.deferred.onerror(h),j=h,e()}else f()}function g(){var d;try{d=j&&j.then}catch(l){return k.deferred.onerror(l),j=l,i=eb,g()}i===eb&&k.deferred.onerror(j),f(d,function(){i=db,g()},function(){i=eb,g()},function(){try{i===db&&c(a)?j=a(j):i===eb&&c(b)&&(j=b(j),i=db)}catch(g){return k.deferred.onerror(g),j=g,e()}j===h?(j=TypeError(),e()):f(d,function(){e(fb)},e,function(){e(i===db&&fb)})})}var h=this,i=0,j=0,l=[];h.promise={},h.resolve=function(a){return i||(j=a,i=db,g()),h},h.reject=function(a){return i||(j=a,i=eb,g()),h},h.promise.then=function(a,b){var c=new qa(a,b);return i===fb?c.resolve(j):i===gb?c.reject(j):l.push(c),c.promise}}function ra(a){return a}function sa(c){var d=c.callbackName||"mithril_callback_"+(new Date).getTime()+"_"+Math.round(1e16*Math.random()).toString(36),e=xa.createElement("script");a[d]=function(f){e.parentNode.removeChild(e),c.onload({type:"load",target:{responseText:f}}),a[d]=b},e.onerror=function(){return e.parentNode.removeChild(e),c.onerror({type:"error",target:{status:500,responseText:JSON.stringify({error:"Error making jsonp request"})}}),a[d]=b,!1},e.onload=function(){return!1},e.src=c.url+(c.url.indexOf("?")>0?"&":"?")+(c.callbackKey?c.callbackKey:"callback")+"="+d+"&"+ma(c.data||{}),xa.body.appendChild(e)}function ta(b){var d=new a.XMLHttpRequest;if(d.open(b.method,b.url,!0,b.user,b.password),d.onreadystatechange=function(){4===d.readyState&&(d.status>=200&&d.status<300?b.onload({type:"load",target:d}):b.onerror({type:"error",target:d}))},b.serialize===JSON.stringify&&b.data&&"GET"!==b.method&&d.setRequestHeader("Content-Type","application/json; charset=utf-8"),b.deserialize===JSON.parse&&d.setRequestHeader("Accept","application/json, text/*"),c(b.config)){var f=b.config(d,b);null!=f&&(d=f)}var g="GET"!==b.method&&b.data?b.data:"";if(g&&!e(g)&&g.constructor!==a.FormData)throw new Error("Request data should be either be a string or FormData. Check the `serialize` option in `m.request`");return d.send(g),d}function ua(a){return a.dataType&&"jsonp"===a.dataType.toLowerCase()?sa(a):ta(a)}function va(a,b,c){if("GET"===a.method&&"jsonp"!==a.dataType){var d=a.url.indexOf("?")<0?"?":"&",e=ma(b);a.url+=e?d+e:""}else a.data=c(b)}function wa(a,b){return b&&(a=a.replace(/:[a-z]\w+/gi,function(a){var c=a.slice(1),d=b[c]||a;return delete b[c],d})),a}k.version=function(){return"v0.2.5"};var xa,ya,za,Aa,Ba={}.hasOwnProperty,Ca={}.toString,Da=Array.isArray||function(a){return"[object Array]"===Ca.call(a)},Ea={AREA:1,BASE:1,BR:1,COL:1,COMMAND:1,EMBED:1,HR:1,IMG:1,INPUT:1,KEYGEN:1,LINK:1,META:1,PARAM:1,SOURCE:1,TRACK:1,WBR:1};k.deps=function(b){return g(a=b||window),a},k.deps(a);var Fa=1,Ga=2,Ha=3,Ia=0;k.startComputation=function(){Ia++},k.endComputation=function(){Ia>1?Ia--:(Ia=0,k.redraw())};var Ja,Ka=[],La=!1,Ma={list:1,style:1,form:1,type:1,width:1,height:1},Na={appendChild:function(a){Ja===b&&(Ja=xa.createElement("html")),xa.documentElement&&xa.documentElement!==a?xa.replaceChild(a,xa.documentElement):xa.appendChild(a),this.childNodes=xa.childNodes},insertBefore:function(a){this.appendChild(a)},childNodes:[]},Oa=[],Pa={};k.render=function(a,c,d){if(!a)throw new Error("Ensure the DOM element being passed to m.route/m.mount/m.render is not undefined.");var e,f=[],g=ba(a),h=a===xa;e=h||a===xa.documentElement?Na:a,h&&"html"!==c.tag&&(c={tag:"html",attrs:{},children:c}),Pa[g]===b&&W(e.childNodes),d===!0&&oa(a),Pa[g]=Q(e,null,b,b,c,Pa[g],!1,0,null,b,f),l(f,function(a){a()})},k.trust=function(a){return a=new String(a),a.$trusted=!0,a},k.prop=function(a){return(null!=a&&(d(a)||c(a))||"undefined"!=typeof Promise&&a instanceof Promise)&&c(a.then)?pa(a):ca(a)};var Qa,Ra=[],Sa=[],Ta=[],Ua=null,Va=0,Wa=null,Xa=null,Ya=16;k.component=function(a){for(var b=new Array(arguments.length-1),c=1;c<arguments.length;c++)b[c-1]=arguments[c];return da(a,b)},k.mount=k.module=function(a,b){if(!a)throw new Error("Please ensure the DOM element exists before rendering a template into it.");var d=Ra.indexOf(a);0>d&&(d=Ra.length);var e=!1,f={preventDefault:function(){e=!0,Wa=Xa=null}};return l(Ka,function(a){a.handler.call(a.controller,f),a.controller.onunload=null}),e?l(Ka,function(a){a.controller.onunload=a.handler}):Ka=[],Ta[d]&&c(Ta[d].onunload)&&Ta[d].onunload(f),ea(b,a,d,e)};var Za=!1;k.redraw=function(b){if(!Za){Za=!0,b&&(La=!0);try{Ua&&!b?(za===a.requestAnimationFrame||new Date-Va>Ya)&&(Ua>0&&Aa(Ua),Ua=za(ga,Ya)):(ga(),Ua=za(function(){Ua=null},Ya))}finally{Za=La=!1}}},k.redraw.strategy=k.prop(),k.withAttr=function(a,b,c){return function(d){d=d||window.event;var e=d.currentTarget||this,f=c||this,g=a in e?e[a]:e.getAttribute(a);b.call(f,g)}};var $a,_a,ab={pathname:"",hash:"#",search:"?"},bb=f,cb=!1;k.route=function(b,c,d,f){if(0===arguments.length)return _a;if(3===arguments.length&&e(c)){bb=function(a){var e=_a=ia(a);if(!ja(b,d,e)){if(cb)throw new Error("Ensure the default route matches one of the routes defined in m.route");cb=!0,k.route(c,!0),cb=!1}};var g="hash"===k.route.mode?"onhashchange":"onpopstate";return a[g]=function(){var a=ya[k.route.mode];"pathname"===k.route.mode&&(a+=ya.search),_a!==ia(a)&&bb(a)},Wa=la,void a[g]()}if(b.addEventListener||b.attachEvent){var h="pathname"!==k.route.mode?ya.pathname:"";return b.href=h+ab[k.route.mode]+f.attrs.href,void(b.addEventListener?(b.removeEventListener("click",ka),b.addEventListener("click",ka)):(b.detachEvent("onclick",ka),b.attachEvent("onclick",ka)))}if(e(b)){var i=_a;_a=b;var j,l=c||{},m=_a.indexOf("?");j=m>-1?na(_a.slice(m+1)):{};for(var n in l)Ba.call(l,n)&&(j[n]=l[n]);var o,p=ma(j);o=m>-1?_a.slice(0,m):_a,p&&(_a=o+(-1===o.indexOf("?")?"?":"&")+p);var q=(3===arguments.length?d:c)===!0||i===b;if(a.history.pushState){var r=q?"replaceState":"pushState";Wa=la,Xa=function(){try{a.history[r](null,xa.title,ab[k.route.mode]+_a)}catch(b){ya[k.route.mode]=_a}},bb(ab[k.route.mode]+_a)}else ya[k.route.mode]=_a,bb(ab[k.route.mode]+_a)}},k.route.param=function(a){if(!$a)throw new Error("You must call m.route(element, defaultRoute, routes) before calling m.route.param()");return a?$a[a]:$a},k.route.mode="search",k.route.buildQueryString=ma,k.route.parseQueryString=na,k.deferred=function(){var a=new qa;return a.promise=pa(a.promise),a};var db=1,eb=2,fb=3,gb=4;return k.deferred.onerror=function(a){if("[object Error]"===Ca.call(a)&&!/ Error/.test(a.constructor.toString()))throw Ia=0,a},k.sync=function(a){function b(a,b){return function(g){return e[a]=g,b||(f="reject"),0===--d&&(c.promise(e),c[f](e)),g}}var c=k.deferred(),d=a.length,e=[],f="resolve";return a.length>0?l(a,function(a,c){a.then(b(c,!0),b(c,!1))}):c.resolve([]),c.promise},k.request=function(a){a.background!==!0&&k.startComputation();var b,c,d,e=new qa,f=a.dataType&&"jsonp"===a.dataType.toLowerCase();return f?(b=a.serialize=c=a.deserialize=ra,d=function(a){return a.responseText}):(b=a.serialize=a.serialize||JSON.stringify,c=a.deserialize=a.deserialize||JSON.parse,d=a.extract||function(a){return a.responseText.length||c!==JSON.parse?a.responseText:null}),a.method=(a.method||"GET").toUpperCase(),a.url=wa(a.url,a.data),va(a,a.data,b),a.onload=a.onerror=function(b){try{b=b||event;var f=c(d(b.target,a));"load"===b.type?(a.unwrapSuccess&&(f=a.unwrapSuccess(f,b.target)),Da(f)&&a.type?l(f,function(b,c){f[c]=new a.type(b)}):a.type&&(f=new a.type(f)),e.resolve(f)):(a.unwrapError&&(f=a.unwrapError(f,b.target)),e.reject(f))}catch(g){e.reject(g),k.deferred.onerror(g)}finally{a.background!==!0&&k.endComputation()}},ua(a),e.promise=pa(e.promise,a.initialValue),e.promise},k});
//# sourceMappingURL=mithril.min.js.map
var $php = {
    urlencode: function (str) {
        str=(str+'');return encodeURIComponent(str).replace(/!/g,'%21').replace(/'/g,'%27').replace(/\(/g,'%28').replace(/\)/g,'%29').replace(/\*/g,'%2A').replace(/%20/g,'+');
    },
    urldecode: function (str) {
        return decodeURIComponent((str+'').replace(/%(?![\da-f]{2})/gi,function(){return'%25';}).replace(/\+/g,'%20'));
    },
    json_encode: function (mixedVal) { 
        var $global=(typeof window!=='undefined'?window:GLOBAL);$global.$locutus=$global.$locutus||{};var $locutus=$global.$locutus;$locutus.php=$locutus.php||{};var json=$global.JSON;var retVal;try{if(typeof json==='object'&&typeof json.stringify==='function'){retVal=json.stringify(mixedVal);if(retVal===undefined){throw new SyntaxError('json_encode');}return retVal;}var value=mixedVal;var quote=function(string){var escapeChars=['\u0000-\u001f','\u007f-\u009f','\u00ad','\u0600-\u0604','\u070f','\u17b4','\u17b5','\u200c-\u200f','\u2028-\u202f','\u2060-\u206f','\ufeff','\ufff0-\uffff'].join('');var escapable=new RegExp('[\\"'+escapeChars+']','g');var meta={'\b':'\\b','\t':'\\t','\n':'\\n','\f':'\\f','\r':'\\r','"':'\\"','\\':'\\\\'};escapable.lastIndex=0;return escapable.test(string)?'"'+string.replace(escapable,function(a){var c=meta[a];return typeof c==='string'?c:'\\u'+('0000'+a.charCodeAt(0).toString(16)).slice(-4)})+'"':'"'+string+'"';};var _str=function(key,holder){var gap='';var indent='    ';var i=0;var k='';var v='';var length=0;var mind=gap;var partial=[];var value=holder[key];if(value&&typeof value==='object'&&typeof value.toJSON==='function'){value=value.toJSON(key);}switch(typeof value){case'string':return quote(value);case'number':return isFinite(value)?String(value):'null';case'boolean':case'null':return String(value);case'object':if(!value){return'null';}gap+=indent;partial=[];if(Object.prototype.toString.apply(value)==='[object Array]'){length=value.length;for(i=0;i<length;i+=1){partial[i]=_str(i,value)||'null';}v=partial.length===0?'[]':gap?'[\n'+gap+partial.join(',\n'+gap)+'\n'+mind+']':'['+partial.join(',')+']';gap=mind;return v;}for(k in value){if(Object.hasOwnProperty.call(value,k)){v=_str(k,value);if(v){partial.push(quote(k)+(gap?': ':':')+v);}}}v=partial.length===0?'{}':gap?'{\n'+gap+partial.join(',\n'+gap)+'\n'+mind+'}':'{'+partial.join(',')+'}';gap=mind;return v;case'undefined':case'function':default:throw new SyntaxError('json_encode');}};return _str('',{'':value});}catch(err){if(!(err instanceof SyntaxError)){throw new Error('Unexpected error type in json_encode()');}$locutus.php.last_error_json=4;return null;}
    },
    json_decode: function (strJson) { 
        var $global=(typeof window!=='undefined'?window:GLOBAL);$global.$locutus=$global.$locutus||{};var $locutus=$global.$locutus;$locutus.php=$locutus.php||{};var json=$global.JSON;if(typeof json==='object'&&typeof json.parse==='function'){try{return json.parse(strJson);}catch(err){if(!(err instanceof SyntaxError)){throw new Error('Unexpected error type in json_decode()');}$locutus.php.last_error_json=4;return null;}}var chars=['\u0000','\u00ad','\u0600-\u0604','\u070f','\u17b4','\u17b5','\u200c-\u200f','\u2028-\u202f','\u2060-\u206f','\ufeff','\ufff0-\uffff'].join('');var cx=new RegExp('['+chars+']','g');var j;var text=strJson;cx.lastIndex=0;if(cx.test(text)){text=text.replace(cx,function(a){return'\\u'+('0000'+a.charCodeAt(0).toString(16)).slice(-4);})}var m=(/^[\],:{}\s]*$/).test(text.replace(/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g,'@').replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g,']').replace(/(?:^|:|,)(?:\s*\[)+/g,''));if(m){j=eval('('+text+')');return j;}$locutus.php.last_error_json=4;return null;
    },
    explode: function (delimiter, string, limit) {
        if (arguments.length < 2 ||typeof delimiter === 'undefined' || typeof string === 'undefined') {return null;}if (delimiter === '' || delimiter === false || delimiter === null) {return false;}if (typeof delimiter === 'function' || typeof delimiter === 'object' || typeof string === 'function' || typeof string === 'object') {return {0: ''};}if (delimiter === true) {delimiter = '1';}delimiter += '';string += '';var s = string.split(delimiter);if (typeof limit === 'undefined') {return s;}if (limit === 0) {limit = 1;}if (limit > 0) {if (limit >= s.length) {return s;}return s.slice(0, limit - 1).concat([s.slice(limit - 1).join(delimiter)]);}if (-limit >= s.length) {return [];}s.splice(s.length + limit);return s;
    },
    in_array: function(needle, haystack, argStrict) {
        var key = '';var strict = !!argStrict;if (strict) {for (key in haystack) {if (haystack[key] === needle) {return true;}}} else {for (key in haystack) {if (haystack[key] == needle) {return true;}}}return false;
    },
    time: function(){
        return Math.floor(new Date().getTime() / 1000);
    },
    mt_rand: function (min, max) {
        var argc = arguments.length;
        if (argc === 0) {
            min = 0;
            max = 2147483647;
        } else if (argc === 1) {
            throw new Error('Warning: mt_rand() expects exactly 2 parameters, 1 given');
        } else {
            min = parseInt(min, 10);
            max = parseInt(max, 10);
        }
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }
};
var $validator = {
    isFunction: function(str) {
        if(typeof str !== 'undefined' && str !== undefined && str !== null){
            return str.constructor.toString().indexOf("Function") > -1;
        }
        return false;
    },
    isArray: function(str) {
        if(typeof str !== 'undefined' && str !== undefined && str !== null){
            return str.constructor.toString().indexOf("Array") > -1;
        }
        return false;
    },
    isObject: function(str){
        if(typeof str !== 'undefined' && str !== undefined && str !== null){
            return str.constructor.toString().indexOf("Object") > -1;
        }
        return false;
    },
    isString: function(str){
        if(typeof str !== 'undefined' && str !== undefined && str !== null && str !== ''){
            return true;
        }
        return false;
    },
    isDate:function(str) {
        if(typeof str !== 'undefined' && str !== undefined && str !== null){
            return str.constructor.toString().indexOf("Date") > -1;
        }
        return false;
    },
    isBoolean:function(str) {
        if(typeof str !== 'undefined' && str !== undefined && str !== null){
            return str.constructor.toString().indexOf("Boolean") > -1;
        }
        return false;
    },
    isNumber:function(str) {
        if(typeof str !== 'undefined' && str !== undefined && str !== null){
            return str.constructor.toString().indexOf("Number") > -1;
        }
        return false;
    },
    isInt: function(x) {
        return x % 1 === 0;
    },
    isJson: function (item) {
        item = typeof item !== "string" ? JSON.stringify(item) : item;
        try {
            item = JSON.parse(item);
        } catch (e) {
            return false;
        }
        if (typeof item === "object" && item !== null) {
            return true;
        }
        return false;
    },
    isResponse: function(str){
        if(typeof str !== 'undefined' && str !== undefined && $validator.isJson(str)){
            return true;
        }
        return false;
    },
    isUrl: function (textval) {
        var urlregex = new RegExp("^(http|https|ftp)\://([a-zA-Z0-9\.\-]+(\:[a-zA-Z0-9\.&amp;%\$\-]+)*@)*((25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9])\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[0-9])|([a-zA-Z0-9\-]+\.)*[a-zA-Z0-9\-]+\.(com|edu|gov|int|mil|net|org|biz|arpa|info|name|pro|aero|coop|museum|[a-zA-Z]{2}))(\:[0-9]+)*(/($|[a-zA-Z0-9\.\,\?\'\\\+&amp;%\$#\=~_\-]+))*$");
        if(urlregex.test(textval)) {
            return (true);
        }
        return (false);
    }
};
var $alerts = {
    run: function(type,text,title,dismissing,timeout){
        if ($('.form-alerts')[0]) {
            $('.form-alerts').empty();
            var alert_class = '', dismissing_html = '', dismissing_class = '';
            if($validator.isString(title) !== false){
                title = '<strong>'+title+'</strong> ';
            }else {
                title = '';
            }
            if(type == 'success'){
                alert_class = ' alert-success';
                if($validator.isString(text) === false){
                    return false;
                }
            }else if(type == 'warning'){
                alert_class = ' alert-warning';
            }else if(type == 'warning'){
                alert_class = ' alert-info';
            }else if(type == 'error'){
                alert_class = ' alert-danger'; 
            }
            if(dismissing === true){
                dismissing_class = ' alert-dismissible fade in';
                dismissing_html = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
            }
            text = $php.urldecode(text);
            if($validator.isJson(text)){
                text = $php.json_decode(text);
                var count = text.length,i=0,output='';
                for(var keyname in text) {
                    var value = text[keyname];
                    for(var keyeror in value) {
                        output += '<li>'+value[keyeror]+'</li>';
                    }
                }
                if($validator.isString(output)){
                    text = '<ul>'+output+'</ul>';
                }
                $('.form-alerts').prepend('<div class="alert'+alert_class+dismissing_class+'" role="alert" data-plugin="alerts">'+dismissing_html+title+text+'</div>');
            }else{
                $('.form-alerts').prepend('<div class="alert'+alert_class+dismissing_class+'" role="alert" data-plugin="alerts">'+dismissing_html+title+text+'</div>');
            }
            if($validator.isString(timeout) !== false){
                setTimeout(function() {
                    $('.form-alerts').empty();
                }, 5000);
            }
        }
    },
    success: function(text,title,dismissing,timeout){
        $alerts.run('success',text,title,dismissing,timeout);
    },
    error: function(text,title,dismissing,timeout){
        if($validator.isString(text) === false){
            text = 'Đã có lỗi trong quá trình xử lý.';
        }
        $alerts.run('error',text,title,dismissing,timeout);
    },
    warning: function(text,title,dismissing,timeout){
        $alerts.run('warning',text,title,dismissing,timeout);
    },
    info:  function(text,title,dismissing,timeout){
        $alerts.run('info',text,title,dismissing,timeout);
    },
    response: function (data,message,callback) {
        if($validator.isResponse(data)){
            var objdata = $.parseJSON(data);
            if(objdata.Response == 'True'){
                if($validator.isString(objdata.Redirect) === true){
                    window.location.href = objdata.Redirect;
                }else if ($validator.isString(objdata.Message) === true){
                    $alerts.success(objdata.Message,'',false,true);
                }else if($validator.isString(message) === true){
                    $alerts.success(message,'',false,true);
                }else {
                    $('.form-alerts').empty();
                }
                if($validator.isString(callback) === true && $validator.isString(objdata.Redirect) === false){
                    if (typeof eval(callback) == 'function') { 
                        callback.call();
                    } else {
                       callback();
                    }
                }
            }else if(objdata.Response == 'False'){
                if($validator.isString(objdata.Redirect) === true){
                    window.location.href = objdata.Redirect;
                }else if ($validator.isString(objdata.Message) === true){
                    $alerts.error(objdata.Message,'',true);
                }else if($validator.isString(message) === true){
                    $alerts.error(message,'',true);
                }else {
                    $alerts.error('','',true);
                }
            }else {
                $alerts.error('','',true);
            }
        }else {
            $alerts.error('','',true);
        }
    },
};
var Format = {
    Integer: function (elm) {
        $(elm).val($(elm).val().replace(/\D/g,''));
    },
    Number: function(elm){
        $(elm).val(numeral($(elm).val().replace(/\D/g,'')).format('0,0'));
    },
    Currency: function(str){
        return numeral(str).format('0,0 đ');
    }
};
/**
 * https://github.com/SaneMethod/jquery-ajax-localstorage-cache
 */
; (function($, window){
    /**
     * Generate the cache key under which to store the local data - either the cache key supplied,
     * or one generated from the url, the type and, if present, the data.
     */
    var genCacheKey = function (options) {
        var url = options.url.replace(/jQuery.*/, '');

        // If cacheKey is specified as a function, return the result of calling that function
        // as the cacheKey.
        if (options.cacheKey && typeof options.cacheKey === 'function'){
            return options.cacheKey(options);
        }

        // Strip _={timestamp}, if cache is set to false
        if (options.cache === false) {
            url = url.replace(/([?&])_=[^&]*/, '');
        }

        return options.cacheKey || url + options.type + (options.data || '');
    };

    /**
     * Determine whether we're using localStorage or, if the user has specified something other than a boolean
     * value for options.localCache, whether the value appears to satisfy the plugin's requirements.
     * Otherwise, throw a new TypeError indicating what type of value we expect.
     * @param {boolean|object} storage
     * @returns {boolean|object}
     */
    var getStorage = function(storage){
        if (!storage) return false;
        if (storage === true) return window.localStorage;
        if (typeof storage === "object" && 'getItem' in storage &&
            'removeItem' in storage && 'setItem' in storage)
        {
            return storage;
        }
        throw new TypeError("localCache must either be a boolean value, " +
            "or an object which implements the Storage interface.");
    };

    /**
     * Remove the item specified by cacheKey and its attendant meta items from storage.
     * @param {Storage|object} storage
     * @param {string} cacheKey
     */
    var removeFromStorage = function(storage, cacheKey){
        storage.removeItem(cacheKey);
        storage.removeItem(cacheKey + 'cachettl');
        storage.removeItem(cacheKey + 'dataType');
    };

    /**
     * Prefilter for caching ajax calls.
     * See also $.ajaxTransport for the elements that make this compatible with jQuery Deferred.
     * New parameters available on the ajax call:
     * localCache   : true // required - either a boolean (in which case localStorage is used), or an object
     * implementing the Storage interface, in which case that object is used instead.
     * cacheTTL     : 5,           // optional - cache time in hours, default is 5.
     * cacheKey     : 'post',      // optional - key under which cached string will be stored
     * isCacheValid : function  // optional - return true for valid, false for invalid
     * @method $.ajaxPrefilter
     * @param options {Object} Options for the ajax call, modified with ajax standard settings
     */
    $.ajaxPrefilter(function(options){
        var storage = getStorage(options.localCache),
            // hourstl = options.cacheTTL || 5,
            minutestl = options.cacheTTL || 5,
            cacheKey = genCacheKey(options),
            cacheValid = options.isCacheValid,
            ttl,
            value;

        if (!storage) return;
        ttl = storage.getItem(cacheKey + 'cachettl');

        if (cacheValid && typeof cacheValid === 'function' && !cacheValid()){
            removeFromStorage(storage, cacheKey);
            ttl = 0;
        }

        if (ttl && ttl < +new Date()){
            removeFromStorage(storage, cacheKey);
            ttl = 0;
        }

        value = storage.getItem(cacheKey);
        if (!value){
            // If it not in the cache, we store the data, add success callback - normal callback will proceed
            if (options.success) {
                options.realsuccess = options.success;
            }
            options.success = function(data, status, jqXHR) {
                var strdata = data,
                    dataType = this.dataType || jqXHR.getResponseHeader('Content-Type');

                if (dataType.toLowerCase().indexOf('json') !== -1) strdata = JSON.stringify(data);

                // Save the data to storage catching exceptions (possibly QUOTA_EXCEEDED_ERR)
                try {
                    storage.setItem(cacheKey, strdata);
                    // Store timestamp and dataType
                    //storage.setItem(cacheKey + 'cachettl', +new Date() + 1000 * 60 * 60 * hourstl);
                    storage.setItem(cacheKey + 'cachettl', +new Date() + 1000 * 60 * minutestl);
                    storage.setItem(cacheKey + 'dataType', dataType);
                } catch (e) {
                    // Remove any incomplete data that may have been saved before the exception was caught
                    removeFromStorage(storage, cacheKey);
                    console.log('Cache Error:'+e, cacheKey, strdata);
                }

                if (options.realsuccess) options.realsuccess(data, status, jqXHR);
            };
        }
    });

    /**
     * This function performs the fetch from cache portion of the functionality needed to cache ajax
     * calls and still fulfill the jqXHR Deferred Promise interface.
     * See also $.ajaxPrefilter
     * @method $.ajaxTransport
     * @params options {Object} Options for the ajax call, modified with ajax standard settings
     */
    $.ajaxTransport("+*", function(options){
        if (options.localCache)
        {
            var cacheKey = genCacheKey(options),
                storage = getStorage(options.localCache),
                dataType = options.dataType || storage.getItem(cacheKey + 'dataType') || 'text',
                value = (storage) ? storage.getItem(cacheKey) : false;

            if (value){
                // In the cache? Get it, parse it to json if the dataType is JSON,
                // and call the completeCallback with the fetched value.
                if (dataType.toLowerCase().indexOf('json') !== -1) value = JSON.parse(value);
                return {
                    send: function(headers, completeCallback) {
                        var response = {};
                        response[dataType] = value;
                        completeCallback(200, 'success', response, '');
                    },
                    abort: function() {
                        console.log("Aborted ajax transport for json cache.");
                    }
                };
            }
        }
    });
})(jQuery, window);
var ajax_sendding = false;
var $http = {
    run: function(type,url,data,loading){
        if($validator.isString(url) === false || $validator.isString(data) === false){
            return false;
        }
        if(type !== 'GET'){
            type = 'POST';
        }
        var contenttype = 'application/x-www-form-urlencoded; charset=UTF-8';
        var processdata = true;
        if(type=='UPLOAD'){
            type = ' POST';
            contenttype = false;
            processdata = false;
        }
        
        var ajaxSend = $.ajax({
            type: type,
            url: url,
            data: data,
            dataType: 'text',
            contentType: contenttype,
            processData: processdata,
            // cache: true,
            localCache   : false,
            global: false,
            cacheTTL     : 1,
            isCacheValid : function(){  // optional.
                return false;
            },
            beforeSend: function() {
                if(loading !== false){
                    if ($("#pageload-bar").length === 0) {
                        $("body").append("<div id='pageload-bar'></div>");
                        $("#pageload-bar").addClass("waiting").append($("<dt/><dd/>"));
                        $("#pageload-bar").width((50 + Math.random() * 30) + "%"); 
                    }
                }
            },          
            success: function(string){},
            complete: function() {},
            error: function() {}
        
        }).always(function() {
            ajax_sendding = false;
            if(loading !== false){
                $("#pageload-bar").width("101%").delay(200).fadeOut(400, function() {
                    $(this).remove();
                });
            }
        }).done(function(data) {});
        if(typeof ajaxSend == 'undefined') {
            return false;
        }
        // if (ajax_sendding === true){
        //     ajaxSend.abort();
        // }
         ajax_sendding = true;
        return ajaxSend;
    },
    upload: function(url,data,loading){
        return $http.run('UPLOAD',url,data,loading);
    },
    get: function(url,data,loading){
        return $http.run('GET',url,data,loading);
    },
    post: function(url,data,loading){
        return $http.run('POST',url,data,loading);
    }
};
// module.Table = {
//     SetCheckAll: function () {
//         $(".data-list").on('change', '#check-all', function(){
//             $(".table-check input:checkbox").prop('checked', $(this).prop("checked"));
//         });
//     },
//     GetCheckItem: function(){
//         var selected = new Array();
//         $(".table-check input:checkbox:checked").each(function(){
//             selected.push($(this).val());
//         });
//         return selected;
//     },
// }
var Table = {
    SetCheckAll: function () {
        $(".data-list").on('change', '#check-all', function(){
            $(".table-check input:checkbox").prop('checked', $(this).prop("checked"));
        });
    },
    GetCheckItem: function(){
        var selected = [];
        $(".table-check input:checkbox:checked").each(function(){
            selected.push($(this).val());
        });
        return selected;
    },
    Response: function (data,message) {
        $alerts.response(data,message,function (){
            if($validator.isResponse(data)){
                var objdata = $.parseJSON(data);
                if(objdata.Response == 'True' && $validator.isString(objdata.Redirect) === false){
                    $('.data-list').html($php.urldecode(objdata.List));
                    $('#pagination').html($php.urldecode(objdata.Page));
                }
            }
        });
    },
    Search: function (ajaxdata,ajaxurl,stateobj) {   
        if($validator.isObject(ajaxdata) === false){
            return false;
        }
        var query = $('.na-search-input').val();
        ajaxdata._token = $('#page_token').val();
        ajaxdata.search = query;
        ajaxdata.type = 'search';
        if($validator.isObject(stateobj) === false){
            stateobj = {
                StateName: {
                    "search":query
                },
                Title: $('.heading-text').text(),
                URL: "?search="+query
            };
        }
        stateobj.query = query;
        stateobj.key = 'search';
        $http.post(ajaxurl,ajaxdata).success(function(res){
            if($validator.isObject(stateobj)){
                //History.pushState({Search:urlquery}, 'Attachment', "?search="+urlquery);
                //History.pushState(stateobj["StateName"], stateobj["Title"], stateobj["URL"]);
                Form.URLParameter('page','1');
                Form.URLParameter(stateobj['key'],stateobj['query']);
            }
            Table.Response(res);
        });
    },
    Action: function (elm) {
        var ajaxdata = {type:'action'};
        var ajaxurl = $(elm).parents('form').attr('action');
        var search = Form.getUrlVars()["search"];
        if($validator.isString(search) === false){ search = ''; }
        var page = Form.getUrlVars()["page"];
        if($validator.isString(page) === false){ page = 1; }
        var check = Table.GetCheckItem();
        if($validator.isString(check) === true){ ajaxdata.check = check; }
        var status = $('#action_status').attr('name');
        if($validator.isString(status) === true){
            ajaxdata[status] = $('#action_status').val();
        }
        ajaxdata.select_action = $('.na-select-action').val();
        ajaxdata._token = $('#page_token').val();
        ajaxdata.page = page;
        ajaxdata.search = search;
        $('.na-select-action').prop('selectedIndex',0);
        $http.post(ajaxurl,ajaxdata).success(function(res){
            if($validator.isString(check) === true){
                Table.Response(res);
            }
            if($validator.isString(status) === true){
                Table.StatusSet(res);
            }
        });
    },
    ActionChange: function(elm){
        var post_status = $(elm).val();
        var items = '';
        if(post_status == 'trash'){
            $(".na-select-action option").remove();
            items = '<option selected="selected" value="0">Chọn hành động</option><option value="restore">Khôi phục</option><option value="delete">Xóa vĩnh viễn</option>';
        }else {
            $(".na-select-action option").remove();
            items = '<option selected="selected" value="0">Chọn hành động</option><option value="edit">Chỉnh sửa</option><option value="trash">Xóa</option>';
        }
        $('.na-select-action').html(items);
    },
    StatusSet: function (res) {
        if($validator.isResponse(res)){
            var objdata = $.parseJSON(res);
            if(objdata.Response == 'True' && $validator.isString(objdata.Redirect) === false && $validator.isString(objdata.ActionStatus) === true){
                var i = 0 , count = objdata.ActionStatus.length;
                if($validator.isString(objdata.ActionStatus.all)){
                    $('#action_status').find('option[value=all]').text('Tất cả ('+objdata.ActionStatus.all+')');
                }
                if($validator.isString(objdata.ActionStatus.public)){
                    $('#action_status').find('option[value=public]').text('Công khai ('+objdata.ActionStatus.public+')');
                }
                if($validator.isString(objdata.ActionStatus.pending)){
                    $('#action_status').find('option[value=pending]').text('Đang chờ duyệt ('+objdata.ActionStatus.pending+')');
                }
                if($validator.isString(objdata.ActionStatus.draft)){
                    $('#action_status').find('option[value=draft]').text('Nháp ('+objdata.ActionStatus.draft+')');
                }
                if($validator.isString(objdata.ActionStatus.trash)){
                    $('#action_status').find('option[value=trash]').text('Xóa ('+objdata.ActionStatus.trash+')');
                }
            }
        }
    },
    StatusChange: function (elm) {
        var status = $(elm).attr('name');
        if($validator.isString(status) === false){
            return false;
        }
        // var ajaxdata = {
        //     _token: $('#page_token').val(),
        // }
        //ajaxdata[status] = elm.val();
        var ajaxdata = $(elm).parents('form').serializeObject();
        var ajaxurl = $(elm).parents('form').attr('action');
        // var stateobj = {
        //         StateName: {},
        //         Title: $('.heading-text').text(),
        //         URL: "?"+status+"="+elm.val()
        //     }

        //stateobj.StateName[status] = elm.val();
        $http.post(ajaxurl,ajaxdata).success(function(res){
            //$('.na-search-input').val('');

            Form.URLParameter(status,$(elm).val());
            //History.pushState(stateobj["StateName"], stateobj["Title"], stateobj["URL"]);       
            Table.Response(res);
        });
    }
};
var BindDOM = function() {
    'use strict';
    function bind_explode(delimiter, string, limit) {
        if (arguments.length < 2 || typeof delimiter === 'undefined' || typeof string === 'undefined') {
            return null;
        }
        if (delimiter === '' || delimiter === false || delimiter === null) {
            return false;
        }
        if (typeof delimiter === 'function' || typeof delimiter === 'object' || typeof string === 'function' || typeof string === 'object') {
            return {0: ''};
        }
        if (delimiter === true) {
            delimiter = '1';
        }
        delimiter += '';
        string += '';
        var s = string.split(delimiter);
        if (typeof limit === 'undefined') {
            return s;
        }
        if (limit === 0) {
            limit = 1;
        }
        if (limit > 0) {
            if (limit >= s.length) {
                return s;
            }
            return s.slice(0, limit - 1).concat([s.slice(limit - 1).join(delimiter)]);
        }
        if (-limit >= s.length) {
            return [];
        }
        s.splice(s.length + limit);
        return s;
    }
    function bind_check(type,str){
        if(type == 'object'){
            if(typeof str !== 'undefined' && str !== undefined && str !== null){
                return str.constructor.toString().indexOf("Object") > -1;
            }
            return false;
        }else if(type == 'string'){
            if(typeof str !== 'undefined' && str !== undefined && str !== null && str !== ''){
                return true;
            }
            return false;
        }
    }
    function bindCallback(callback,elm){
        if(!bind_check('string',callback)){
            return;
        }
        if(typeof eval(callback) == 'function') { 
            if(bind_check('string',elm)){
                eval(callback+'(elm)');
            }else {

                eval(callback+'()');
            }
        } else {
            // Do something standard
        }
    }
    function bindCss(){

    }
    function bindValue(){

    }
    function bind_text(elm,callback){
        // console.log(elm.textContent);
        // if($model.indexOf(callback) !== -1){
        //     var $this = $('[data-model="'+callback+'"]');
        //     elm.text($bind.BindSet('text',$this));
        //     $this.on('change keyup dp.change', function(e) {
        //         e.preventDefault();
        //         elm.text($bind.BindSet('text',$(this),e));
        //     });            
        // }else {
        //     $bind.BindCallback(callback);
        // }
    }
    // function bind_onchange(elm,callback){
    //     // elm.addEventListener("change", function(e){ 
    //     //     e.preventDefault();
    //     //     bindCallback(callback);
    //     // });
    //     elm.onchange = function(e){ 
    //         e.preventDefault();
    //         bindCallback(callback,elm); 
    //     };
    // }
    function bind_click(events,elm,callback){
        elm.onclick = function(e){ 
            e.preventDefault();
            bindCallback(callback,elm); 
        };
        // elm.addEventListener(events, function(e){ 
        //     e.preventDefault();
        //     bindCallback(callback,elm); 
        // });
    }
    function bind_change(events,elm,callback){
        elm.onchange = function(e){ 
            e.preventDefault();
            bindCallback(callback,elm); 
        };
    }
    function bind_keyboard(events,elm,callback){
        if(events == 'keyup'){
            elm.onkeyup = function(e){ 
                e.preventDefault();
                bindCallback(callback,elm); 
            };
        }else if(events == 'keydown'){
            elm.onkeydown = function(e){ 
                e.preventDefault();
                bindCallback(callback,elm); 
            };
        }else if(events == 'keypress'){
            elm.onkeypress = function(e){ 
                e.preventDefault();
                bindCallback(callback,elm); 
            };
        }
    }
    function bind_mouse(events,elm,callback){
        if(events == 'mousedown'){
            elm.onmousedown = function(e){ 
                e.preventDefault();
                bindCallback(callback,elm); 
            };
        }else if(events == 'mouseenter'){
            elm.onmouseenter = function(e){ 
                e.preventDefault();
                bindCallback(callback,elm); 
            };
        }else if(events == 'mouseleave'){
            elm.onmouseleave = function(e){ 
                e.preventDefault();
                bindCallback(callback,elm); 
            };
        }else if(events == 'mousemove'){
            elm.onmousemove = function(e){ 
                e.preventDefault();
                bindCallback(callback,elm); 
            };
        }else if(events == 'mouseover'){
            elm.onmouseover = function(e){ 
                e.preventDefault();
                bindCallback(callback,elm); 
            };
        }else if(events == 'mouseout'){
            elm.onmouseout = function(e){ 
                e.preventDefault();
                bindCallback(callback,elm); 
            };
        }else if(events == 'mouseup'){
            elm.onmouseup = function(e){ 
                e.preventDefault();
                bindCallback(callback,elm); 
            };
        }
    }
    function bind_form(events,elm,callback){
        elm.addEventListener(events, function(e){ 
            e.preventDefault();
            bindCallback(callback,elm); 
        });
    }
    function bind_load(elm,callback){
        bindCallback(callback,elm);
    }
    function bind_action(action,elm,model){
        switch (action) {
        	case 'load':
                bind_load(elm,model);
                break;
            case 'click':
                bind_click(action,elm,model);
                break;
            case 'mousedown': 
            case 'mouseenter': 
            case 'mouseleave': 
            case 'mousemove': 
            case 'mouseover': 
            case 'mouseout': 
            case 'mouseup': 
                bind_mouse(action,elm,model);
                break;
            case 'keyup':
            case 'keydown':
            case 'keypress':
                bind_keyboard(action,elm,model);
                break;
            case 'abort':
            case 'beforeunload':
            case 'error':
            case 'hashchange':
            case 'load':
            case 'pageshow':
            case 'pagehide':
            case 'resize':
            case 'scroll':
            case 'unload':
                break;
            case 'blur':
            case 'change':
                bind_change(action,elm,model);
                break;
            case 'focus':
            case 'focusin':
            case 'focusout':
            case 'input':
            case 'invalid':
            case 'reset':
            case 'search':
            case 'select':
            case 'submit':
                bind_form(action,elm,model);
                break;
            case 'text':
                // bind_text(elm,model);
                break;
        }
    }
    function get_model(){
        var model = [];
        var selector = document.querySelectorAll('[data-model]');
        var count = selector.length, i = 0;
        for(i;i<count;i++){
            model.push($(this).attr("data-model"));
        }
        return model;
    }
    var selector = '[data-bind]', attribute = 'data-bind';
    if(document.querySelector(selector)){
        var binds = document.querySelectorAll(selector);
        var binds_len = binds.length, i = 0;
        var get_action = '', action_arr= '', get_model = '';
        for(i;i<binds_len;i++){
            var $this = document.querySelectorAll(selector)[i];
            var item =  $this.getAttribute(attribute);
            var item_arr = bind_explode(',',item);
            var item_arr_len = item_arr.length, x = 0;
            if(!bind_check('object',item_arr) && item_arr_len < 1){
                continue;
            }
            for(x; x < item_arr_len; x++){
                action_arr =  bind_explode(':',item_arr[x]);
                if(!bind_check('string',action_arr[0]) || !bind_check('string',action_arr[1])){
                    continue;
                }
                get_action = action_arr[0].trim();
                get_model = action_arr[1].trim();
                if(!bind_check('string',get_action) || !bind_check('string',get_model)){
                    continue;
                }
                bind_action(get_action,$this,get_model);
            }
        }
    }
};
var RenderDOM = {
    html: function(selector,html,callback){
        var x = document.querySelectorAll(selector);
        var i = 0, count = x.length;
        for (i; i < count; i++) {
            x[i].innerHTML = html;
        }
        if(typeof callback == 'function') { 
            callback();
        } 
        BindDOM();
    },
    after: function(selector,html,callback){
        var x = document.querySelectorAll(selector);
        var i = 0, count = x.length;
        for (i; i < count; i++) {
            x[i].insertAdjacentHTML('afterend', html);
        }
        if(typeof callback == 'function') { 
            callback();
        } 
        BindDOM();
    },
    before: function(selector,html,callback){
        var x = document.querySelectorAll(selector);
        var i = 0, count = x.length;
        for (i; i < count; i++) {
            x[i].insertAdjacentHTML('beforeBegin', html);
        }
        if(typeof callback == 'function') { 
            callback();
        } 
        BindDOM();
    },
    append: function(selector,html,callback){
        var x = document.querySelectorAll(selector);
        var i = 0, count = x.length;
        for (i; i < count; i++) {
            x[i].insertAdjacentHTML('beforeEnd', html);
        }
        if(typeof callback == 'function') { 
            callback();
        } 
        BindDOM();
    },
    prepend: function(selector,html,callback){
        var x = document.querySelectorAll(selector);
        var i = 0, count = x.length;
        for (i; i < count; i++) {
            x[i].insertAdjacentHTML('afterBegin', html);
        }
        if(typeof callback == 'function') { 
            callback();
        } 
        BindDOM();
    }
};
document.addEventListener('DOMContentLoaded', BindDOM);
var test = {
    cl: function (){
        RenderDOM.prepend('.section-setting','<input type="text" data-bind1="keyup: test.cl" />');
        // console.log(1);
        // console.log($(elm).val());
        // $(elm).after('<input id="test" type="text" class="form-control" name="search_product" value="1" placeholder="Tìm hoặc tạo mới 1 sản phẩm" data-bind1="keyup: test.cl" />')
    },
};
"use strict";
// NProgress.configure({ showSpinner: false });
// NProgress.start();
// setTimeout(function() { NProgress.done(); $('.fade').removeClass('out'); }, 500);
var module = {};

var $model=new Array;$("[data-model]").each(function(a,d){$model.push($(this).attr("data-model"))});
var $bind = {
    // BindChange: function(model){
    //     $('[data-model="title1"]').on('change keyup dp.change',function(e) {
    //         e.preventDefault();
    //         return $(this).val();
    //     });
    // },
    BindSet: function(type,elm,e){
        var text = '';
        if(elm.is("select")){
            if(type == 'text'){
                text = elm.find('option:selected').text();
            }else{
                text = elm.find('option:selected').val();
            }
        }else if(elm.not('[data-plugin="datetimepicker"]').is('input:text')){
            text = elm.val();
        }else if(elm.is('input[data-plugin="datetimepicker"]')){
            if(typeof e !== 'undefined' &&  e !== undefined && e !== null){
                text = e.date.format('H:m DD/MM/YYYY');
            }else {
                text = elm.val();
            }
        }
        if(typeof text !== 'undefined' &&  text !== undefined && text !== null){
            return text;
        }
        return '';
    },
    BindCallback: function(callback,elm){
        if($validator.isString(callback) == false){
            return false;
        }
        if (typeof eval(callback) == 'function') { 
            if(typeof elm !== 'undefined' &&  elm !== undefined && elm !== null){
                eval(callback+'(elm)');
            }else {

                eval(callback+'()');
            }
        } else {
            // Do something standard
        }
    },
    BindText: function(elm,callback){
        if($model.indexOf(callback) !== -1){
            var $this = $('[data-model="'+callback+'"]');
            elm.text($bind.BindSet('text',$this));
            $this.on('change keyup dp.change', function(e) {
                e.preventDefault();
                elm.text($bind.BindSet('text',$(this),e));
            });            
        }else {
            $bind.BindCallback(callback);
        }
    },
    BindValue: function(elm,callback){
        if($model.indexOf(callback) !== -1){
            var $this = $('[data-model="'+callback+'"]');
            elm.val($bind.BindSet('value',$this));
            $this.on('change keyup dp.change', function(e) {
                e.preventDefault();
                elm.val($bind.BindSet('value',$(this),e));
            });            
        }else {
            $bind.BindCallback(callback);
        }
    },
    BindKey: function(type,elm,callback){
        if(type=='keyup'){
            elm.on('keyup', function(e) {
                e.preventDefault();
                $bind.BindCallback(callback,$(this));
            });
        }else if(type=='keypress' || type=='keydown'){
            elm.on(type,function(e){
                if($model.indexOf(callback) !== -1){
                     if (e.which == 13) {
                        var $this = $('[data-model="'+callback+'"]');
                        $this.trigger( "click" );
                    }
                }else {
                    $bind.BindCallback(callback,$(this));
                }
            });
        }
    },
    BindForm: function(elm,callback){
        $('form').not('.bootstrap-tagsinput input').on('keyup keypress','input',function (e) {
            if (e.which == 13) {
                //e.preventDefault();
                return false;
            }
        });
    },
    BindLoad: function(elm,callback){
        $bind.BindCallback(callback,elm);
    },
    BindOn: function(type,elm,callback){
        var allow = ["click","change"];
        if(allow.indexOf(type) == -1){ return false;}
        elm.on(type,function(e) {
            e.preventDefault();
            $bind.BindCallback(callback,$(this));
        });
    },
    BindData: function(){
        if($('[data-bind]')[0]){
            var action = '', action_list = '', model = '';
            $('[data-bind]').each(function(idx, obj) {
                var elm = $(this), elm_item = $php.explode(',',elm.attr('data-bind'));
                if($validator.isObject(elm_item) && elm_item.length > 0){
                    for(var i = 0; i < elm_item.length; i++){
                        action_list =  $php.explode(':',elm_item[i]);
                        action = action_list[0].trim();
                        if(action_list[1]){
                            model = action_list[1].trim();
                        }
                        if($validator.isString(action) == true && $validator.isString(model) == true){
                            switch (action) {
                                case 'click':
                                    $bind.BindOn('click',elm,model);
                                    break;
                                case 'change':
                                    $bind.BindOn('change',elm,model);
                                    break;
                                case 'keypress':
                                    $bind.BindKey('keypress',elm,model);
                                    break;
                                case 'keydown':
                                    $bind.BindKey('keydown',elm,model);
                                    break;
                                case 'keyup':
                                    $bind.BindKey('keyup',elm,model);
                                    break;
                                case 'text':
                                    $bind.BindText(elm,model);
                                    break;
                                case 'value':
                                    $bind.BindValue(elm,model);
                                    break;
                                case 'form':
                                    $bind.BindForm(elm,model);
                                    break;
                                case 'load':
                                    $bind.BindLoad(elm,model);
                                    break;
                            }
                        }
                    }
                }
            });
        }
    },
    init: function () {
        $bind.BindData();
    }
};
$(document).ready(function() {
    // $bind.init();
});
// var mose = {};
// $(window).load(function(){
// 	$("#loader-container").fadeOut("slow")
// });
!function($) {
    "use strict";

    var Components = function() {};

    //initializing tooltip
    Components.prototype.initTagsInputPlugin = function() {
        if ($('[data-plugin="tagsinput"]')[0]) {
            $('[data-plugin="tagsinput"]').each(function() {
                $(this).tagsinput({
                    maxChars: 50,
                });
            });
        }
    },

    Components.prototype.initBootstrapDropdownPlugin = function() {
        if ($('.dropdown-select')[0]) {
            $('.dropdown-select').each(function() {
                var slug = $(this).attr('data-slug');
                var name = $(this).attr('data-name');
                var type = $(this).attr('data-type') || 'multiple';
                if(typeof slug == 'undefined'){
                    return false;
                }
                $(this).on('click','.dropdown-item', function (e) {
                    e.stopPropagation();
                    var id = $(this).attr('data-id') || 0;
                    if(type=='single'){
                        $(this).parents('.dropdown-menu').find('.dropdown-item').not($(this)).parent().removeClass('selected');
                        $(this).parent().toggleClass('selected');
                    }else {
                        $(this).parent().toggleClass('selected');
                    }


                    if($(this).parent().hasClass('selected')){
                        if(type=='single'){
                            $(this).parents('.dropdown').find('input.'+slug).remove();
                            $(this).parents('.dropdown').append('<input class="'+slug+' '+slug+'-'+id+'" type="hidden" name="'+name+'[]" value="'+id+'" />');
                        }else {
                            $(this).parents('.dropdown').append('<input class="'+slug+' '+slug+'-'+id+'" type="hidden" name="'+name+'[]" value="'+id+'" />');
                        }
                    }else {
                        $(this).parents('.dropdown').find('.'+slug+'-'+id).remove();
                    }

                    var count = $(this).parents('.dropdown').find('input.'+slug).length;
                    if(type=='single'){
                        if(count > 0){
                            $(this).parents('.dropdown').find('.dropdown-toggle .text').text($(this).find('span').text() || '');
                        }else {
                            $(this).parents('.dropdown').find('.dropdown-toggle .text').text($(this).parents('.dropdown').find('.dropdown-toggle .text').attr('data-title')+' ');
                        }
                    }else {
                        $(this).parents('.dropdown').find('.count-selected').show();
                        if(count > 0){
                            $(this).parents('.dropdown').find('.count-selected').text('('+count+')');
                        }else {
                            $(this).parents('.dropdown').find('.count-selected').text('(0)');
                        }
                    }
                });
                $(this).on('click','.dropdown-menu', function (e) {
                    if ($(e.target).closest('.dropdown-toggle').length) {
                        $(this).data('closable', true);
                    }else {
                        $(this).data('closable', false);
                    }
                });
                $(this).on('hide.bs.dropdown', function (e) {
                    var hide = $(this).data('closable');
                    $(this).data('closable', true);
                    return hide;
                });
            });
        }
    },

    Components.prototype.initWavesPlugin = function() {
        if ($('.waves-effect')[0]) {
            Waves.attach('.waves-effect');
            Waves.attach('.waves-circle, .waves-float', ['waves-circle', 'waves-float']);
            Waves.init();
        }
    },

    Components.prototype.initAlertDismissingPlugin = function() {
        if ($('[data-plugin="alerts"]')[0]) {
            $('[data-plugin="alerts"]').each(function() {
                $(this).alert();
            });
        }
    },

    Components.prototype.initSelect2Plugin = function() {
        if ($('[data-plugin="select2"]')[0]) {
            $('[data-plugin="select2"]').each(function() {
                var optionSelect2 = {};
                if($(this).attr('data-select2-search') == 'false'){
                    optionSelect2 = {
                        minimumResultsForSearch: -1
                    };
                }
                $(this).select2(optionSelect2);
            });
        }
    },

    Components.prototype.initAutosizelugin = function() {
        if ($('[data-plugin="autosize"]')[0]) {
            $('[data-plugin="autosize"]').each(function() {
                autosize($(this));
            });
        }
    },

    Components.prototype.initjScrollPanePlugin = function() {
        
        if ($('[data-plugin="jScrollPane"]')[0]) {
            $('[data-plugin="jScrollPane"]').each(function(idx, obj) {
                var jScrollOptions = {};
                $(this).attr('style','');
                var resize = $(this).attr('data-resize');
                var type = $(this).attr('data-type');
                if(resize == 'true'){
                    jScrollOptions.autoReinitialise = true;
                    jScrollOptions.autoReinitialiseDelay = 100;
                }
                
                if(type == 'menu-left'){
                    if($(this).find('li.with-sub')){
                        $(this).find('li.with-sub').each(function(){
                            var parent = $(this),
                                clickLink = parent.find('>a'),
                                subMenu = parent.find('ul');

                            clickLink.click(function(){
                                if (parent.hasClass('opened')) {
                                    parent.removeClass('opened');
                                    subMenu.slideUp(350);
                                } else {
                                    $(this).find('li.with-sub').not(this).removeClass('opened').find('ul').slideUp(350);
                                    parent.addClass('opened');
                                    subMenu.slideDown(350);
                                }
                            });
                        });
                    }
                }
                $(this).jScrollPane(jScrollOptions);
            });
        }
    },
    Components.prototype.initDateTimepickerPlugin = function() {
        if ($('[data-plugin="datetimepicker"]')[0]) {
            $('[data-plugin="datetimepicker"]').datetimepicker({
                showTodayButton: true,
                icons: {
                    time: 'fa fa-clock-o',
                    date: 'fa fa-calendar',
                    up: 'fa fa-chevron-up',
                    down: 'fa fa-chevron-down',
                    previous: 'fa fa-long-arrow-left',
                    next: 'fa fa-long-arrow-right',
                    today: 'fa fa-bullseye',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                },
                showClose: true,
                showClear: true,
                format: 'H:m DD/MM/YYYY',
                //debug: true,
            });
        }
        
    },

    Components.prototype.initClipboardPlugin = function() {
        if ($('[data-plugin="clipboard"]')[0]) {
            $('[data-plugin="clipboard"]').each(function(idx, obj) {
                var clipboard = new Clipboard(this);
            });
        }
    },
    Components.prototype.initMorrisPlugin = function() {
        if ($('[data-plugin="morris"]')[0]) {
            $('[data-plugin="morris"]').each(function(idx, obj) {
                var id = $(this).attr("id");
                new Morris.Line({
                    element: 'sales-morris',
                    // Chart data records -- each entry in this array corresponds to a point on
                    // the chart.
                    data: [
                        { month: '2016-01', value: 20 },
                        { month: '2016-02', value: 10 },
                        { month: '2016-03', value: 5 },
                        { month: '2016-04', value: 5 },
                        { month: '2016-05', value: 20 },
                        { month: '2016-06', value: 20 },
                        { month: '2016-07', value: 20 },
                        { month: '2016-08', value: 20 },
                        { month: '2016-09', value: 20 },
                        { month: '2016-10', value: 20 },
                        { month: '2016-11', value: 20 },
                        { month: '2016-12', value: 20 }
                    ],
                    xLabels: 'month',
                    // The name of the data record attribute that contains x-values.
                    xkey: 'month',
                    // A list of names of data record attributes that contain y-values.
                    ykeys: ['value'],
                    // Labels for the ykeys -- will be displayed when you hover over the
                    // chart.
                    labels: ['Value']
                });
            });
        }
    },

    Components.prototype.initTooltipPlugin = function() {
        $.fn.tooltip && $('[data-toggle="tooltip"]').tooltip()
    },

    Components.prototype.initCurrencySymbolsPlugin = function() {
        if ($('.currency-symbols')[0]) {
            $('.currency-symbols').each(function() {
                // $(this).sortable();
                var type = $(this).attr('data-type');
                if(typeof type !== 'undefined'){
                    if(type == 'VND'){
                        $(this).html('&#8363;');
                    }else {
                        $(this).html('$');
                    }
                }
                
            });
        }
    },
    Components.prototype.initSortablePlugin = function() {
        if ($('[data-plugin="sortable"]')[0]) {
            $('[data-plugin="sortable"]').each(function() {
                // $(this).sortable();
                $(this).sortable({
                    // connectWith: ".meta-box-sortables",
                    // handle: "",
                    // cancel: ".portlet-toggle",
                    placeholder: "sortable-placeholder",
                    start: function(e, ui){
                        ui.placeholder.height(ui.item.height());
                    }
                });
            });
        }
    },

    Components.prototype.initTinymcePlugin = function() {
        if (document.querySelector('[data-plugin="tinymce"]')) {
            tinymce.init({
                selector: '[data-plugin="tinymce"]',
                height: 300,
                skin : "mose",
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true,
                templates: [
                    { title: 'Test template 1', content: 'Test 1' },
                    { title: 'Test template 2', content: 'Test 2' }
                ],
                setup: function (editor) {
                    editor.on('change', function () {
                        editor.save();
                    });
                }
                /*content_css: [
                    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
                    '//www.tinymce.com/css/codepen.min.css'
                ]*/
            });
        }
        
    },

    Components.prototype.initMaterialPlugin = function() {
        if (document.querySelector('.fg-line')) {
            $('body').on('focus', '.fg-line .form-control', function(){
                $(this).closest('.fg-line').addClass('fg-toggled');
            })

            $('body').on('blur', '.form-control', function(){
                var p = $(this).closest('.form-group, .input-group');
                var i = p.find('.form-control').val();

                if (p.hasClass('fg-float')) {
                    if (i.length == 0) {
                        $(this).closest('.fg-line').removeClass('fg-toggled');
                    }
                }
                else {
                    $(this).closest('.fg-line').removeClass('fg-toggled');
                }
            });
        }

        //Add blue border for pre-valued fg-flot text feilds
        if (document.querySelector('.fg-float')) {
            $('.fg-float .form-control').each(function(){
                var i = $(this).val();

                if (!i.length == 0) {
                    $(this).closest('.fg-line').addClass('fg-toggled');
                }

            });
        }
    },

    Components.prototype.initUploadPlugin = function() {
        $('[data-plugin="upload"]').on('change',':file',function(){
            var elm = $(this);
            var file = this.files[0];
            // name = file.name;
            // size = file.size;
            // type = file.type;

            if(file.name.length < 1) {
            
            }else if(file.size > 10000000) {
                alert("The file is too big");
            }
            else if(file.type != 'image/png' && file.type != 'image/jpg' && file.type != 'image/gif' && file.type != 'image/jpeg' ) {
                alert("The file does not match png, jpg or gif");
            }else { 
                var formData = new FormData();
                formData.append('_token',$('#page_token').val());
                formData.append('file', file);
                $.ajax({
                    type: 'POST',
                    url: '/admin/attachment/quick-create',
                    data: formData,
                    dataType: 'text',
                    contentType: false,
                    processData: false,
                    cache: true,         
                    success: function(res){
                        if($validator.isString(res)){
                            elm.parents('.form-group').find('input.form-control').val(res);
                        }
                    },
                    error: function() {}
                
                });

            }

        });  
    },

    //initializing popover
    Components.prototype.initPopoverPlugin = function() {
        $.fn.popover && $('[data-toggle="popover"]').popover()
    },

    //initializing custom modal
    Components.prototype.initCustomModalPlugin = function() {
        $('[data-plugin="custommodal"]').on('click', function(e) {
        	Custombox.open({
                target: $(this).attr("href"),
                effect: $(this).attr("data-animation"),
                overlaySpeed: $(this).attr("data-overlaySpeed"),
                overlayColor: $(this).attr("data-overlayColor")
            });
        	e.preventDefault();
        });
    },

    //initializing nicescroll
    Components.prototype.initNiceScrollPlugin = function() {
        //You can change the color of scroll bar here
        $.fn.niceScroll &&  $(".nicescroll").niceScroll({ cursorcolor: '#98a6ad',cursorwidth:'6px', cursorborderradius: '5px'});
    },

    //range slider
    Components.prototype.initRangeSlider = function() {
        $.fn.slider && $('[data-plugin="range-slider"]').slider({});
    },

    /* -------------
     * Form related controls
     */
    //switch
    Components.prototype.initSwitchery = function() {
        $('[data-plugin="switchery"]').each(function (idx, obj) {
            new Switchery($(this)[0], $(this).data());
        });
    },
    //multiselect
    Components.prototype.initMultiSelect = function() {
        if($('[data-plugin="multiselect"]').length > 0)
            $('[data-plugin="multiselect"]').multiSelect($(this).data());
    },

     /* -------------
     * small charts related widgets
     */
     //peity charts
     Components.prototype.initPeityCharts = function() {
        $('[data-plugin="peity-pie"]').each(function(idx, obj) {
            var colors = $(this).attr('data-colors')?$(this).attr('data-colors').split(","):[];
            var width = $(this).attr('data-width')?$(this).attr('data-width'):20; //default is 20
            var height = $(this).attr('data-height')?$(this).attr('data-height'):20; //default is 20
            $(this).peity("pie", {
                fill: colors,
                width: width,
                height: height
            });
        });
        //donut
         $('[data-plugin="peity-donut"]').each(function(idx, obj) {
            var colors = $(this).attr('data-colors')?$(this).attr('data-colors').split(","):[];
            var width = $(this).attr('data-width')?$(this).attr('data-width'):20; //default is 20
            var height = $(this).attr('data-height')?$(this).attr('data-height'):20; //default is 20
            $(this).peity("donut", {
                fill: colors,
                width: width,
                height: height
            });
        });

         $('[data-plugin="peity-donut-alt"]').each(function(idx, obj) {
            $(this).peity("donut");
        });

         // line
         $('[data-plugin="peity-line"]').each(function(idx, obj) {
            $(this).peity("line", $(this).data());
         });

         // bar
         $('[data-plugin="peity-bar"]').each(function(idx, obj) {
            var colors = $(this).attr('data-colors')?$(this).attr('data-colors').split(","):[];
            var width = $(this).attr('data-width')?$(this).attr('data-width'):20; //default is 20
            var height = $(this).attr('data-height')?$(this).attr('data-height'):20; //default is 20
            $(this).peity("bar", {
                fill: colors,
                width: width,
                height: height
            });
         });
     },
     Components.prototype.initKnob = function() {
         $('[data-plugin="knob"]').each(function(idx, obj) {
            $(this).knob();
         });
     },

     Components.prototype.initTagsinput = function() {
         $('[data-plugin="tagsinput"]').each(function(idx, obj) {
            $(this).tagsinput({
	    		maxChars: 50,
	    	});
         });
     },

     Components.prototype.initCircliful = function() {
         $('[data-plugin="circliful"]').each(function(idx, obj) {
            $(this).circliful();
         });
     },

    Components.prototype.initCounterUp = function() {
        var delay = $(this).attr('data-delay')?$(this).attr('data-delay'):100; //default is 100
        var time = $(this).attr('data-time')?$(this).attr('data-time'):1200; //default is 1200
         $('[data-plugin="counterup"]').each(function(idx, obj) {
            $(this).counterUp({
                delay: 100,
                time: 1200
            });
         });
     },


    //initilizing
    Components.prototype.init = function() {
        var $this = this;
        this.initTagsInputPlugin();
        this.initBootstrapDropdownPlugin();
        this.initWavesPlugin();
        this.initAlertDismissingPlugin();
        this.initSelect2Plugin();
        this.initAutosizelugin();
        this.initjScrollPanePlugin();
        this.initDateTimepickerPlugin();
        this.initClipboardPlugin();
        this.initMorrisPlugin();
        this.initSortablePlugin();
        this.initTinymcePlugin();
        this.initMaterialPlugin();
        
        this.initTooltipPlugin(),
        this.initCurrencySymbolsPlugin();
        this.initUploadPlugin();
        
        this.initPopoverPlugin(),
        this.initNiceScrollPlugin(),
        this.initCustomModalPlugin(),
        this.initRangeSlider(),
        this.initSwitchery(),
        this.initMultiSelect(),
        this.initPeityCharts(),
        this.initKnob(),
        this.initTagsinput(),
        this.initCircliful(),
        this.initCounterUp()
    },

    $.Components = new Components, $.Components.Constructor = Components;

}(window.jQuery),
    //initializing main application module
function($) {
    "use strict";
    $.Components.init();
}(window.jQuery);
var Interface = {
    MobileMenuLeft: function(elm){
        if($('body').hasClass('menu-left-opened')) {
            elm.removeClass('is-active');
            $('body').removeClass('menu-left-opened');
            $('html').css('overflow','auto');
        } else {
            elm.addClass('is-active');
            $('body').addClass('menu-left-opened');
            $('html').css('overflow','hidden');
        }
    },
    MobileMenuLeftDisable: function(elm){
        $('.hamburger').removeClass('is-active');
        $('body').removeClass('menu-left-opened');
        $('html').css('overflow','auto');
    }
};
var Install = {
    Step1: function() {
        $('.step-1').hide();
        $('.step-2').show();
    },
    Step1Back: function() {
        $('.step-2').hide();
        $('.step-1').show();
    },
    Step2: function(elm) {
        $('.step-2').hide();
        $('.step-1').hide();
        $('.heading').hide();
        $('#preloader').show();
        var ajaxurl = elm.parents('form').attr('action');
        if($validator.isString(ajaxurl) === false){return false;}
        var ajaxdata = {

        };
        $http.post(ajaxurl,ajaxdata,false).success(function(res){
            if($validator.isObject(stateobj) === true){
                
            }
        });
    },
};

var General = {
    Tinymce: function (elm) {
        tinemce.triggerSave();
    },    
    GetDistricts: function(elm){
        var province_id = elm.val(), option = '';
        var defaul_option = '<option value="">Chọn quận/huyện</option>';
        if($validator.isString(province_id) === false){
            $('#districts').html(defaul_option);
            return false;
        }
        var ajaxdata = {
             _token: $('#page_token').val(),
             province_id: province_id,
        };
        $http.post('admin/get-districts',ajaxdata,false).success(function(res){
            if($validator.isResponse(res)){
                var objdata = $php.json_decode(res);
                var count = objdata.length, i = 0;
                if(count < 0) {return false;}
                option += defaul_option;
                for (i; i < count; i++) {
                    option += '<option value="'+objdata[i].district_id+'">'+objdata[i].district_name+'</option>';
                }
                $('#districts').html(option);
            }
        });
    },
    ChangeSlug: function(elm){
        $(elm).parents('.form-group').find('input[name="slug"]').prop('readonly',function(i,r){
            return !r;
        });
    },
};
var Form = {
    Submit: function(elm,callback){
        var $this = $(elm);
        var ajaxdata = $this.parents('form').serializeObject();
        var ajaxurl = $this.parents('form').attr('action');
        $http.post(ajaxurl,ajaxdata).success(function(res){
            if($validator.isFunction(callback)){
                callback();
            }else {
                $alerts.response(res);
            }
        });
    },
    submitDisable: function(selector) {
        // $('input').on('keyup keypress',function (e) {
        //   if (e.which == 13) {
        //     $(selector).submit();
        //     return false;    //<---- Add this line
        //   }
        // });
        // var form = 'form'+selector+' input';
        // console.log(selector);
        // $(document).on('keyup keypress', form, function(e) {
        //  var keyCode = e.keyCode || e.which;
  //            if(keyCode == 13) {
  //            e.preventDefault();
  //            return false;
  //            }
        // });
        // $(selector).on('keyup keypress', function(e) {
        // var keyCode = e.keyCode || e.which;
        // if (keyCode === 13) { 
        //     e.preventDefault();
        //     return false;
        //   }
        // });
        // $(selector).submit(function(e) {
        //  e.preventDefault();
        //  console.log('a');
        //  return false;
        // });
    },
    WordLimiter: function(str,limit){
        if($.trim(str).length > limit){
            str = $.trim(str).substring(0, limit);
        }
        return str;
    },
    CheckBoxAll: function () {
        $(".data-list").on('change', '#check-all', function(){
            $(".table-check input:checkbox").prop('checked', $(this).prop("checked"));
        });
    },
    CheckBoxItem: function(){
        var selected = [];
        $(".table-check input:checkbox:checked").each(function(){
            selected.push($(this).val());
        });
        return selected;
    },
    URLParameter: function(key, value) {
        /* Old
        var sep = (window.location.href.indexOf('?') > -1) ? '&' : '?';
        //var newurl = window.location.href + sep + key + '=' + value;
        var myUrl = window.location.href;
        var re = new RegExp("([?&]" + key + "=)[^&]+", "");
        if (myUrl.indexOf("?") === -1) {
            myUrl += "?" + key + "=" + encodeURIComponent(value);
        } else {
            if (re.test(myUrl)) { myUrl = myUrl.replace(re, "$1" + encodeURIComponent(value)); } else { myUrl += "&" + key + "=" + encodeURIComponent(value); }
        }
        History.pushState({state:History.getStateId()+1},document.title,myUrl);
        //var State = History.getState();
        //History.log('statechange:'+State.title, State.data, State.title, State.url);
        return myUrl;
        */
        key = encodeURIComponent(key); value = encodeURIComponent(value);
        var s = document.location.search;
        var kvp = key+"="+value;
        var r = new RegExp("(&|\\?)"+key+"=[^\&]*");
        s = s.replace(r,"$1"+kvp);
        if(!RegExp.$1) {s += (s.length>0 ? '&' : '?') + kvp;}

        //again, do what you will here
        History.pushState({state:History.getStateId()+1},document.title,s);
        // var State = History.getState();
        // History.log('statechange:'+State.title, State.data, State.title, State.url);
    },
    getUrlVars: function() {
        var vars = [], hash;
        var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
        for(var i = 0; i < hashes.length; i++)
        {
            hash = hashes[i].split('=');
            vars.push(hash[0]);
            vars[hash[0]] = hash[1];
        }
        return vars;
    },
    formatBytes: function(bytes,decimals) {
       if(bytes === 0) return '0 Byte';
       var k = 1000;
       var dm = decimals + 1 || 3;
       var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
       var i = Math.floor(Math.log(bytes) / Math.log(k));
       return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
    },
    keyAction: function(type,elmGet,elmAction){
        $(elmGet).keypress(function(e){
            if(type=='enter'){
                if(e.which == 13){
                    $(elmAction).click();
                }
            }
        });
    }
};
var Seo = {
    SnippetForm: function (elm) {
        var output = '', snippet_preview_title = '', snippet_preview_desc = '', snippet_site_title_hide = '';
        var meta_title = $('.meta-title').val() || '';
        var meta_desc = $('.meta-description').val() || ''; 
        var snippet_title = $('#sp_seo_title').val();
        var snippet_site_title = $('#sp_seo_site_title').val();
        var snippet_url = $('#sp_seo_url').val();
        var snippet_desc = $('#sp_seo_desc').val();
        var snippet_keyword = $('#sp_seo_keyword').val();
        if($validator.isString(snippet_title)){
            snippet_preview_title = snippet_title;
            snippet_site_title_hide = '  style="display: none;"';
        }else {
            snippet_preview_title = meta_title;
        }
        if($validator.isString(snippet_desc)){
            snippet_preview_desc = snippet_desc;
        }else {
            snippet_preview_desc = meta_desc;
        }
        output += '<div class="box-typical">';
        output += '<div class="box-typical-header box-typical-header-bordered panel-heading"><h3>Tối ưu SEO</h3></div>';
        output += '<div class="box-typical-body b-t-p">';
        output += '<div class="snippet-text"><span class="snippet-title-group"><span class="snippet-title">'+Form.WordLimiter(snippet_preview_title,70)+'</span><span class="snippet-site-title"'+snippet_site_title_hide+'> - '+snippet_site_title+'</span></span></div>';
        output += '<div class="snippet-text"><cite class="snippet-cite">'+snippet_url+'</cite></div>';
        output += '<div class="snippet-text"><span class="snippet-desc">'+Form.WordLimiter(snippet_preview_desc,160)+'</span></div>';
        output += '<div class="snippet-def">Thiết lập các thẻ mô tả giúp khách hàng dễ dàng tìm thấy website trên công cụ tìm kiếm như Google.</div>';
        output += '<div class="snippet-btn"><button class="btn btn-secondary" type="button" data-toggle="collapse" aria-expanded="false" data-target="#snippet-editor" aria-controls="snippet-editor">Tùy chỉnh SEO</button></div>';
        output += '<div id="snippet-editor" class="collapse" aria-expanded="false">';
        output += '<div class="form-group"><label for="snippet-editor-meta-title">Tiêu đề trang</label><input type="text" class="form-control snippet-editor-title" id="snippet-editor-meta-title" name="seo_title" value="'+snippet_title+'" /><small class="text-muted">Tiêu đề tối đa 70 ký tự</small></div>';
        output += '<div class="form-group"><label for="snippet-editor-meta-description">Mô tả trang</label><textarea class="form-control snippet-editor-description" id="snippet-editor-meta-description" rows="3" name="seo_description">'+snippet_desc+'</textarea><small class="text-muted">Mô tả tối đa 160 ký tự</small></div>';
        output += '<div class="form-group"><label for="snippet-editor-meta-keyword">Từ khóa trang</label><input type="text" class="form-control snippet-editor-meta-keyword" id="snippet-editor-meta-keyword" name="seo_keyword" value="'+snippet_keyword+'" /><small class="text-muted">Từ khóa ngăn cách nhau bởi dấu phẩy</small></div>';
        output += '</div>';
        output += '</div>';
        output += '</div>';
        $(elm).append(output);
    },
    SnippetPreview: function(){
        $( ".meta-title, .meta-description, .snippet-editor-title, .snippet-editor-description,.snippet-editor-meta-keyword").on('keyup',function() {
            var meta_title = $('.meta-title').val() || '';
            var meta_desc = $('.meta-description').val() || '';
            var snippet_title = $('#snippet-editor-meta-title').val();
            var snippet_desc = $('#snippet-editor-meta-description').val();
            var snippet_keyword = $('#snippet-editor-meta-keyword').val();

            if($validator.isString(snippet_title)){
                meta_title = snippet_title;
                $('#sp_seo_title').val(meta_title);
                $('.snippet-site-title').hide();
            }else {
                $('#sp_seo_title').val('');
                $('.snippet-site-title').show();
            }
            if($validator.isString(snippet_desc)){
                meta_desc = snippet_desc;
                $('#sp_seo_desc').val(meta_desc);
            }else {
                $('#sp_seo_desc').val('');
            }
            $('#sp_seo_keyword').val(snippet_keyword);
            $('.snippet-title').text(Form.WordLimiter(meta_title,70));
            $('.snippet-desc').text(Form.WordLimiter(meta_desc,160));
        });
    }
};
var Modal = {
    ScrollImage: function () {
        $('#attachment-grid').bind('scroll', function(){
            var $this = $(this);
            if($this.scrollTop() + $this.innerHeight()>=$this[0].scrollHeight){
                var next = $this.attr('data-next');
                if($validator.isString(next)){
                    $http.get(next,{},false).success(function(res){
                        if(!$validator.isResponse(res)){return;}
                        var objdata = $php.json_decode(res);
                        if($validator.isString(objdata.data) === true){
                            if(objdata.data.length > 0){
                                $this.attr('data-next',objdata.next_page_url);
                                $this.append(Modal.LoopImage(objdata.data));
                            }
                        }
                    });
                }
            }
        });
    },
    SearchImage: function(elm){
        var ajaxdata = {
            search: $('.modal-search').val(),
        };
        $http.get('admin/attachment/get-list-image',ajaxdata,false).success(function(res){
            if(!$validator.isResponse(res)){return;}
            var objdata = $php.json_decode(res);
            if(objdata.data.length > 0){
                $('#attachment-grid').attr('data-next',objdata.next_page_url);
                $('.modal-list-data').find('#attachment-grid').html(Modal.LoopImage(objdata.data));
                $('.modal-list-data').show();
            }else {
                $('.modal-list-data').hide();
            }
        });
    },
    LoadImage: function () {      
        $http.get('admin/attachment/get-list-image',{}).success(function(res){
            if(!$validator.isResponse(res)){return;}
            var objdata = $php.json_decode(res);
            if(objdata.data.length < 0){
                $('.modal-list-data').hide();
            }else {
                $('.modal-list-data').html('<ul id="attachment-grid" class="clearfix" data-next="'+objdata.next_page_url+'">'+Modal.LoopImage(objdata.data)+'</ul>');
                $('.modal-list-data').show();
            }
            $('#modal-media').modal('show');
            $('#modal-media').on('shown.bs.modal', function () {
                Modal.ScrollImage();
            });
        });  
    },
    LoopImage: function(data){
        var count = data.length, output = '',i=0;
        for (i; i < count; i++) {
            output += '<li data-id="'+data[i].attachment_id+'" class="attachment-item attachment-item-'+data[i].attachment_id+'"><div class="thumbnail-preview"><div class="thumbnail"><div class="centered"><img src="'+data[i].attachment_url+'" alt="'+data[i].attachment_title+'" /></div></div></div></li>';
        }
        return output;
    },
    SetImage: function(elm){
        var type = $('#media-modal').attr('data-type');
        var output = '', id = '', url = '', title = '';
        if(type=='product'){
            var have_product =  false, count = $('.image-group-list').find('li').length;
            $('.attachment-item').each(function(idx, obj) {
                if($(this).hasClass('active')){
                    id = $(this).attr('data-id');
                    url = $(this).find('img').attr('src');
                    title = $(this).find('img').attr('alt');
                    output += '<li class="box-product-images ui-sortable-handle"><input type="hidden" name="product_image[]" value="'+id+'"><div class="thumbnail-preview"><div class="thumbnail"><div class="centered"><img src="'+url+'" alt="'+title+'" /></div></div></div></li>';
                    have_product = true;
                }
            });
            if(have_product){
                $('.image-group-list ul').append(output);
                $('.image-group-info').hide();
                $('.image-group-list').show();
            }else {
                if(count < 0){
                    $('.image-group-info').show();
                    $('.image-group-list').hide();
                }                
            }
        }else {
            $('.attachment-item').each(function(idx, obj) {
                if($(this).hasClass('active')){
                    id = $(this).attr('data-id');
                    url = $(this).find('img').attr('src');
                    title = $(this).find('img').attr('alt');
                }
            });
            $('#post-image-modal').hide();
            $('#post-image-thumbnail img').attr('src',url);
            $('#post-image-thumbnail input[name="post_image_url"]').val(url);
            $('#post-image-thumbnail input[name="post_image_id"]').val(id);
            $('#post-image-thumbnail').show();
        }


        // var type = elm.parents('#media-modal').find('#media-modal-list').attr('data-type');
        // if(type == 'featured' && $validator.isString(url) == true){
        //     $('#featured-thumbnail').find('img').attr('src',url);
        //     $('#featured-thumbnail').find('#hidden_featured_image').val(id);
        //     $('#featured-thumbnail').removeClass('hidden-xs-up');
        //     $('#featured-modal').addClass('hidden-xs-up');
            
        // }
        $('#media-modal').modal('hide');
    },
    ChooseImage: function () {
        var type = $('#media-modal').attr('data-type');
        $('.modal-list-data').on('click', '.attachment-item', function(e) {
            e.preventDefault();
            if(type=='product'){
                $(this).toggleClass('active');
            }else {
                $(".modal-list-data .attachment-item").not($(this)).removeClass('active');
                $(this).toggleClass('active');
            }
        });
    },
    FormPost: function (elm,loading,callback) {
        var $this = $(elm);
        var ajaxurl = $this.parents('form').attr('action');
        var ajaxdata = $this.parents('form').serializeObject();
        ajaxdata._token = $('#page_token').val();
        $http.post(ajaxurl,ajaxdata,loading).success(function(res){
            if($validator.isResponse(res)){
                var objdata = $php.json_decode(res);
                if(objdata.Response == 'True'){
                    $this.parents('.modal').find('.modal-alerts').html('');
                    $this.parents('.modal').find('form')[0].reset();
                    callback(objdata);
                    $this.parents('.modal').modal('hide');
                }else {
                    var text = $php.urldecode(objdata.Message);
                    if($validator.isJson(text)){
                        text = $php.json_decode(text);
                        var count = text.length,i=0,output='';
                        for(var keyname in text) {
                            var value = text[keyname];
                            for(var keyeror in value) {
                                output += '<li>'+value[keyeror]+'</li>';
                            }
                        }
                        if($validator.isString(output)){
                            text = '<ul>'+output+'</ul>';
                        }
                    }
                    $this.parents('.modal').find('.modal-alerts').html('<div class="alert alert-danger alert-dismissible fade in" role="alert" data-plugin="alerts"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+text+'</div>');
                }
            }
        });
    }
};
var Plugins = {
	ShowWidget: function(elm){
		var widget = elm.parents('.box-typical').attr('data-widget');
		if(!$validator.isString(widget)){return;}
		$('#widget-modal').attr('data-widget',widget);
		$('#widget-modal').modal('show');
	},
	AddWidget: function(elm){
		var plugin_path = $('#select_plugin option:selected').val();
		var plugin_text = $('#select_plugin option:selected').text();
		var widget = elm.parents('#widget-modal').attr('data-widget');
		var id = $('.box-typical[data-widget="'+widget+'"]').find('table tbody tr').last().attr('data-id');
		if(!$validator.isString(widget) && !$validator.isString(id) && $validator.isString(plugin_path) && $validator.isString(plugin_text)){
			return false;
		}
		var idnew = parseInt(id) + 1;
		if(!$validator.isInt(idnew)){
			idnew = 1;
		}
		var ajaxdata = {
            _token: $('#page_token').val(),
            action: 'add',
            widget: widget,
            plugin: plugin_path,
            order: idnew
        };
        var ajaxurl = elm.parents('form').attr('action');
		$http.get(ajaxurl,ajaxdata).success(function(res){
			$alerts.response(res,'',function(){
				if(!$validator.isInt(id)){
					$('.box-typical[data-widget="'+widget+'"]').find('table tbody tr').last().remove();
				}
            	$('.box-typical[data-widget="'+widget+'"]').find('table tbody').append('<tr data-id="'+idnew+'" data-path="'+plugin_path+'"><th class="table-title tbl-nowrap column-primary tbl-title-text">'+plugin_text+'</th><td class="text-nowrap text-xs-center"><span class="label label-success">Đang hoạt động</span></td><td class="text-xs-center"><div class="table-btn btn-group btn-group-sm"><input type="hidden" name="plugin['+widget+']['+idnew+']" value="'+plugin_path+'"><button type="button" class="btn plugin-widget-edit"><i class="material-icons md-18">mode_edit</i></button><button type="button" class="btn plugin-widget-remove"><i class="material-icons md-18">delete</i></button></div></td></tr>');
				$('#widget-modal').modal('hide');
            });
        });
		
	},
	EditPluginWidget: function(elm){
		elm.on( "click",".plugin-widget-edit", function(e) {
			e.preventDefault();
			var $this = $(this);
			var id = $this.parents('tr').attr('data-id');
			var plugin_path = $this.parents('tr').attr('data-path');
			var widget = $this.parents('.box-typical').attr('data-widget');
			if(!$validator.isString(widget) && !$validator.isString(id) && $validator.isString(plugin_path)){
				return false;
			}
			var ajaxdata = {
	            _token: $('#page_token').val(),
	            action: 'edit',
	            widget: widget,
	            plugin: plugin_path,
	            order: id
	        };
	        var ajaxurl = elm.parents('form').attr('action');
			$http.get(ajaxurl,ajaxdata).success(function(res){
	            $alerts.response(res,'');
	        });
		});
	},
	RemovePluginWidget: function(elm){
		elm.on( "click",".plugin-widget-remove", function(e) {
			e.preventDefault();
			var $this = $(this);
			var id = $this.parents('tr').attr('data-id');
			if(!$validator.isInt(id)){return;}
			var plugin_path = $this.parents('tr').attr('data-path');
			var widget = $this.parents('.box-typical').attr('data-widget');
			if(!$validator.isString(widget) && !$validator.isString(id) && $validator.isString(plugin_path)){
				return false;
			}
			var ajaxdata = {
	            _token: $('#page_token').val(),
	            action: 'remove',
	            widget: widget,
	            plugin: plugin_path,
	            order: id
	        };
	        var ajaxurl = elm.parents('form').attr('action');
			$http.get(ajaxurl,ajaxdata).success(function(res){
	            $alerts.response(res,'',function(){
	            	if($this.parents('tbody').find('tr').length == 1){
	            		$this.parents('tbody').append('<tr><td colspan="3"><div class="data-empty">No data</div></td></tr>');
	            	}
	            	$this.parents('tr').remove();
	            	
	            	//console.log($this.parents('tbody').find('tr'))
	            	// if(!$this.parents('tr'))
	            	// var id = $this.parents('tr').attr('data-id');
	            	// if($validator.isInt(id) == false){
	            	// 	'<td colspan="3"><div class="data-empty">No data</div></td>'
	            	// }
	            });
	        });
		});
	},
	DeleteWidget: function(elm){
		var ajaxurl = elm.parents('form').attr('action');
		var widget = elm.parents('.box-typical').attr('data-widget');
		if(!$validator.isString(widget)){return;}
		var ajaxdata = {
            _token: $('#page_token').val(),
            action: 'delete',
            widget: widget

        };
		$http.get(ajaxurl,ajaxdata).success(function(res){
			if($validator.isResponse(res)){
				var objdata = $php.json_decode(res);
				if(objdata.Response == 'True'){
					$('.box-typical[data-widget="'+widget+'"]').parent().remove();
				}
			}
        });
	},
	// DeleteWidget: function(elm){
	// 	var ajaxurl = elm.parents('form').attr('action');
	// 	var widget = elm.parents('.box-typical').attr('data-widget');
	// 	if($validator.isString(widget) == false){
	// 		alerts.error('Không tìm thấy tiện ích','Lỗi!',true,true);
	// 		return false;
	// 	}
	// 	var ajaxdata = {
 //            _token: $('#page_token').val(),
 //            type: 'delete_widget',
 //            widget: widget

 //        }
	// 	$http.get(ajaxurl,ajaxdata).success(function(res){
	// 		if($validator.isResponse(res)){
	// 			var objdata = $php.json_decode(res);
	// 			if(objdata.Response == 'True'){
	// 				$('.box-typical[data-widget="'+widget+'"]').remove();
	// 			}
	// 		}
 //        }).error(function() {
 //        	$alerts.error('Xóa tiện ích thất bại','',true,true);
 //        });
	// },
	sortable: function () {
		$( ".meta-box-sortables").sortable({
		    connectWith: ".meta-box-sortables",
		    handle: ".handle-title",
		    cancel: ".portlet-toggle",
		    placeholder: "sortable-placeholder",
		    start: function(e, ui){
		    	ui.placeholder.height(ui.item.height());
		    }
	    });
 
	    $( ".postbox" )
	    	//.addClass( "closed" )
	      	.find( ".hndle" )
	      	.addClass( "ui-widget-header ui-corner-all" );
	        //.prepend( "<span class='ui-icon ui-icon-minusthick portlet-toggle'></span>");
	 
	    $( ".handle-btn" ).click(function() {
	      	var icon = $( this );
	      	//icon.toggleClass( "ui-icon-minusthick ui-icon-plusthick" );
	      	icon.closest( ".postbox" ).toggleClass('closed');
	      	icon.closest( ".postbox" ).find( ".inside" ).toggle();
	    });
	},
};
var Attachment = {
	Create: function () {
		/* global plupload, pluploadL10n, ajaxurl, mUploaderInit */
		var topWin = window.dialogArguments, uploader, uploader_init;
		var pluploadL10n = {"queue_limit_exceeded":"You have attempted to queue too many files.","file_exceeds_size_limit":"%s exceeds the maximum upload size for this site.","zero_byte_file":"This file is empty. Please try another.","invalid_filetype":"This file type is not allowed. Please try another.","not_an_image":"This file is not an image. Please try another.","image_memory_exceeded":"Memory exceeded. Please try another smaller file.","image_dimensions_exceeded":"This is larger than the maximum size. Please try another.","default_error":"An error occurred in the upload. Please try again later.","missing_upload_url":"There was a configuration error. Please contact the server administrator.","upload_limit_exceeded":"You may only upload 1 file.","http_error":"HTTP error.","upload_failed":"Upload failed.","big_upload_queued":"%s exceeds the maximum upload size for the multi-file uploader when used in your browser.","io_error":"IO error.","security_error":"Security error.","file_cancelled":"File canceled.","upload_stopped":"Upload stopped.","dismiss":"Dismiss","crunching":"Completed","deleted":"moved to the trash.","error_uploading":"\u201c%s\u201d has failed to upload."};

		// progress and success handlers for media multi uploads
		function fileQueued(fileObj) {
			//var items = jQuery('#media-items').children();
			var uploadtitle = '<div class="uploading-item-wrapper"><div class="uploading-item-name clearfix"><span class="filename original">'+fileObj.name+'</span></div></div>';
			var uploadprocess = '<div class="progress"><div class="bar"></div></div>';
			var uploadinfo = '<div class="uploading-item-info clearfix"><div class="percent">0%</div><div class="filesize"></div></div>';
			// Create a progress bar containing the filename
			jQuery('<div class="uploading-item">').attr( 'id', 'media-item-' + fileObj.id ).append(uploadtitle+uploadprocess+uploadinfo).prependTo( jQuery('#media-items' ) );
		}

		function uploadProgress(up, file) {
			var item = jQuery('#media-item-' + file.id);
			var witem = jQuery('.media-upload-form').width();
			jQuery('.progress .bar', item).width( (file.loaded / file.size) * 100 +'%' );
			jQuery('.uploading-item-info .percent', item).html( file.percent + '%' );
			jQuery('.uploading-item-info .filesize', item).html( Form.formatBytes(file.size));
		}

		// check to see if a large file failed to upload
		function fileUploading( up, file ) {
			var hundredmb = 5 * 1024 * 1024,
				max = parseInt( up.settings.filters.max_file_size, 10 );
			if (file.size > hundredmb ) {
				setTimeout( function() {
					if ( file.status < 3 && file.loaded === 0 ) { // not uploading
						//FileError( file, pluploadL10n.big_upload_failed.replace( '%1$s', '<a class="uploader-html" href="#">' ).replace( '%2$s', '</a>' ) );
						FileError( file, pluploadL10n.upload_failed);
						up.stop(); // stops the whole queue
						up.removeFile( file );
						up.start(); // restart the queue
					}
				}, 10000 ); // wait for 10 sec. for the file to start uploading
			}
		}

		function uploadSuccess(fileObj, serverData) {
			var item = jQuery('#media-item-' + fileObj.id);

			// on success serverData should be numeric, fix bug in html4 runtime returning the serverData wrapped in a <pre> tag
			serverData = serverData.replace(/^<pre>(\d+)<\/pre>$/, '$1');

			// if async-upload returned an error message, place it in the media item div and return
			if ( serverData.match(/uploading-error/) ) {
				jQuery('.form-alerts').html(serverData);
				item.attr( 'class', 'uploading-item error').html('<p>' + pluploadL10n.error_uploading.replace('%s', jQuery.trim(fileObj.name)) +'</p>');
				return;
			} else {
				item.find('.uploading-item-wrapper').html(serverData);
				item.find('.progress').addClass('completed');
				jQuery('.percent', item).html( pluploadL10n.crunching );
			}
			prepareMediaItem(fileObj, serverData);
		}

		function prepareMediaItem(fileObj, serverData) {
			var f = ( typeof shortform == 'undefined' ) ? 1 : 2, item = jQuery('#media-item-' + fileObj.id);
			if ( f == 2 && shortform > 2 )
				f = shortform;

			if ( isNaN(serverData) || !serverData ) { // Old style: Append the HTML returned by the server -- thumbnail and form inputs
				//item.find('#uploading-item-wrapper').append(serverData);
				item.find('.uploading-item-wrapper').html(serverData);
				//prepareMediaItemInit(fileObj);
			}
		}
		// generic error message
		function QueueError(message) {
			jQuery('.form-alerts').show().html( '<div class="alert alert-danger" role="alert">' + message + '</div>' );
		}

		// file-specific error messages
		function FileError(fileObj, message) {
			itemAjaxError(fileObj.id, message);
		}

		function itemAjaxError(id, message) {
			var item = jQuery('#media-item-' + id), filename = item.find('.filename').text();
			//item.html('<div class="error-div"><a class="dismiss" href="#">' + pluploadL10n.dismiss + '</a><strong>' + pluploadL10n.error_uploading.replace('%s', jQuery.trim(filename)) + '</strong> '+message+'</div>');
			item.prepend('<div id="media-item-' + id + '" class="uploading-item error"><p><strong>' + pluploadL10n.dismiss + '</strong>'+ pluploadL10n.error_uploading.replace('%s', jQuery.trim(filename)) + message + '</p></div>');
		}

		function deleteError() {}
		function uploadComplete() {}
		function uploadError(fileObj, errorCode, message, uploader) {
			var hundredmb = 5 * 1024 * 1024, max;

			switch (errorCode) {
				case plupload.FAILED:
					FileError(fileObj, pluploadL10n.upload_failed);
					break;
				case plupload.FILE_EXTENSION_ERROR:
					FileError(fileObj, pluploadL10n.invalid_filetype);
					break;
				case plupload.FILE_SIZE_ERROR:
					uploadSizeError(uploader, fileObj);
					break;
				case plupload.IMAGE_FORMAT_ERROR:
					FileError(fileObj, pluploadL10n.not_an_image);
					break;
				case plupload.IMAGE_MEMORY_ERROR:
					FileError(fileObj, pluploadL10n.image_memory_exceeded);
					break;
				case plupload.IMAGE_DIMENSIONS_ERROR:
					FileError(fileObj, pluploadL10n.image_dimensions_exceeded);
					break;
				case plupload.GENERIC_ERROR:
					QueueError(pluploadL10n.upload_failed);
					break;
				case plupload.IO_ERROR:
					max = parseInt( uploader.settings.filters.max_file_size, 10 );

					if (fileObj.size > hundredmb )
						//FileError( fileObj, pluploadL10n.big_upload_failed.replace('%1$s', '<a class="uploader-html" href="#">').replace('%2$s', '</a>') );
						FileError( fileObj, pluploadL10n.upload_failed);
					else
						QueueError(pluploadL10n.io_error);
					break;
				case plupload.HTTP_ERROR:
					QueueError(pluploadL10n.http_error);
					break;
				case plupload.INIT_ERROR:
					break;
				case plupload.SECURITY_ERROR:
					QueueError(pluploadL10n.security_error);
					break;
				// case plupload.UPLOAD_ERROR.UPLOAD_STOPPED:
				// case plupload.UPLOAD_ERROR.FILE_CANCELLED:
				// 	jQuery('#media-item-' + fileObj.id).remove();
				// 	break;
				default:
					FileError(fileObj, pluploadL10n.default_error);
			}
		}

		function uploadSizeError( up, file ) {
			var message;
			message = pluploadL10n.file_exceeds_size_limit.replace('%s', file.name);
			jQuery('#media-items').prepend('<div id="media-item-' + file.id + '" class="uploading-item error"><p>' + message + '</p></div>');
			up.removeFile(file);
		}


		//e.preventDefault();
		// init and set the uploader
		uploader_init = function() {
			var isIE = navigator.userAgent.indexOf('Trident/') != -1 || navigator.userAgent.indexOf('MSIE ') != -1;
			// Make sure flash sends cookies (seems in IE it does whitout switching to urlstream mode)
			if ( ! isIE && 'flash' === plupload.predictRuntime( mUploaderInit ) &&
				( ! mUploaderInit.required_features || ! mUploaderInit.required_features.hasOwnProperty( 'send_binary_string' ) ) ) {

				mUploaderInit.required_features = mUploaderInit.required_features || {};
				mUploaderInit.required_features.send_binary_string = true;
			}
			uploader = new plupload.Uploader(mUploaderInit);
			uploader.bind('Init', function(up) {
				var uploaddiv = $('#plupload-upload-ui');
			});
			uploader.init();
			uploader.bind('FilesAdded', function( up, files ) {
				$('.form-alerts').empty();

				plupload.each( files, function( file ) {
					fileQueued( file );
				});

				up.refresh();
				up.start();
			});
			uploader.bind('UploadFile', function(up, file) {
				fileUploading(up, file);
			});
			uploader.bind('UploadProgress', function(up, file) {
				uploadProgress(up, file);
			});
			uploader.bind('Error', function(up, err) {
				uploadError(err.file, err.code, err.message, up);
				up.refresh();
			});
			uploader.bind('FileUploaded', function(up, file, response) {
				uploadSuccess(file, response.response);
			});
			uploader.bind('UploadComplete', function() {});
		};

		if ( typeof(mUploaderInit) == 'object' ) {
			uploader_init();
		}
	},
	TableAction: function (elm) {
		var mode = $.cookie('VSAttachment');
		if(!$validator.isString(mode)){ mode = 'grid'; }
		var ajaxdata = {
			 _token: $('#page_token').val(),
	        mode: mode,
		};
        var check = Table.GetCheckItem();
        if($validator.isString(check) === true){ ajaxdata.check = check; }
		var page = Form.getUrlVars()["page"];
        if($validator.isString(page) === true){ ajaxdata.page = page; }
        var search = Form.getUrlVars()["search"];
        if($validator.isString(search) === true){ ajaxdata.search = search; }
        ajaxdata.select_action = $('.na-select-action').val();
		var ajaxurl = elm.parents('form').attr('action');
        $('.na-select-action').prop('selectedIndex',0);
        $http.post(ajaxurl,ajaxdata).success(function(res){
            if($validator.isString(check) === true){
                Table.Response(res);
            }
        });
	},
	TableSearch: function (elm) {
		var mode = $.cookie('VSAttachment');
		if(!$validator.isString(mode)){ mode = 'grid'; }
		var ajaxdata = {
	        mode: mode,
	        type:'search'
		};
		var ajaxurl = elm.parents('form').attr('action');
		Table.Search(ajaxdata,ajaxurl);
	},
	VSSelect: function () {
		var mode = $.cookie('VSAttachment');
		if(!$validator.isString(mode)){ mode = 'grid'; }
		if(mode == 'list'){
			$('.section-attachment .na-select-action').parent().show();
			$('.section-attachment .na-select-btn').parent().show();
		}else {
			$('.section-attachment .na-select-action').parent().hide();
			$('.section-attachment .na-select-btn').parent().hide();
		}
	},
	ViewSwitch: function (elm) {
		var ajaxurl = elm.parents('form').attr('action');
		var mode = elm.attr('data-layout');
		if(mode != 'list'){ mode = 'grid'; }
		var ajaxdata = {
			 _token: $('#page_token').val(),
			mode: mode,
		};
		var page = Form.getUrlVars()["page"];
		if($validator.isString(page) === true){ ajaxdata.page = page; }
		var search = Form.getUrlVars()["search"];
        if($validator.isString(search) === true){ ajaxdata.search = search; }
		$http.post(ajaxurl,ajaxdata).success(function(res){
            Table.Response(res);
        });
		$.cookie('VSAttachment', mode,{ path: '/' });
		$('.view-switch .view-item').removeClass('current');
    	elm.addClass('current');
    	Attachment.VSSelect();
	},
	Update: function (elm) {
		var ajaxdata = elm.parents('form').serializeObject();
        var ajaxurl = elm.parents('form').attr('action');
		// var form_data = $($("#attachment-form")[0].elements).not("#page_token").serializeArray();
		// var ajaxdata = {
  //           _token: $('#page_token').val(),
  //           type:'update',
		// }
		// $(form_data).each(function(index, obj){
		//     ajaxdata[obj.name] = obj.value;
		// });
		$http.post(ajaxurl,ajaxdata).success(function(res){
			$alerts.response(res);
        });
	},
	DeleteGrid: function () {
		$('.attachment-list').on( "click",".attacment-delete", function(e) {
			e.preventDefault();
			var mode = $.cookie('VSAttachment');
			if(!$validator.isString(mode)){ mode = 'grid'; }
			var ajaxdata = {
				_token: $('#page_token').val(),
		        mode: mode,
		        attachment_id: $(this).attr('data-id'),
		        select_action: 'trash',
			};
			var ajaxurl = $(this).parents('form').attr('action');
			$http.post(ajaxurl,ajaxdata).success(function(res){
	            Table.Response(res);
	        });
		});
	},
	DeleteCreatePage: function () {
		$('#media-items').on( "click",".attacment-delete", function(e) {
			e.preventDefault();
			var item = $(this);
			var ajaxdata = {
				_token: $('#page_token').val(),
		        attachment_id: item.attr('data-id'),
		        select_action: 'trash'
			};
			var ajaxurl = $(this).parents('form').attr('action');
			$http.post(ajaxurl,ajaxdata).success(function(res){
	            if($validator.isResponse(res)){
	                var objdata = $php.json_decode(res);
	                if(objdata.Response == 'True'){
						item.parents('.uploading-item').remove();
						$alerts.success('Xóa tập tin thành công','',true,true);
					}
				}
	        });
		});
	},
	UploadFromUrl: function(elm){
		var ajaxdata = {
			_token: $('#page_token').val(),
			image_url: $('#image-url').val(),
		};
        var ajaxurl = elm.parents('form').attr('action');
        $http.post(ajaxurl,ajaxdata).success(function(res){
            
        }); 
	}
};
var Customer = {
    TableSearch: function (elm) {
        var $this = $(elm);
        var ajaxdata = {};
        var ajaxurl = $this.parents('form').attr('action');
        Table.Search(ajaxdata,ajaxurl);
    },
    Submit: function(elm){
        var $this = $(elm);
        var ajaxdata = $this.parents('form').serializeObject();
        var ajaxurl = $this.parents('form').attr('action');
        var form = $this.parents('form');

        if (!$this.parents('form').parsley().isValid()) {
            form.parsley().validate();
            return false;
        }
        if($validator.isString(form) === false){return false;}
        $http.post(ajaxurl,ajaxdata).success(function(res){
            $alerts.response(res);
        });
    }
};
var User = {
    TableSearch: function (elm) {
        var $this = $(elm);
        var ajaxdata = {
            user_status: $('#action_status').val()
        };
        var ajaxurl = $this.parents('form').attr('action');
        Table.Search(ajaxdata,ajaxurl);
    },
};
// var account = {
// 	ForgotPassword: function () {
// 		$('#recbtn').click( function(e) {
// 			e.preventDefault();
// 			var ajaxdata = {
//                 _token: $('#page_token').val(),
// 				email: $('#recEmail').val()
// 			};
//             var ajaxurl = $('#recoveryForm').attr('action');
//             var getAjax = module.form.Ajax(ajaxdata,ajaxurl);
//             if(typeof getAjax == 'undefined')
//             	return false;
//             getAjax.success(function(data){
//                 if(typeof data !== 'undefined' && data.length > 5 && module.form.isJson(data)){
//                 	var objdata = $.parseJSON(data);
//                 	if(objdata.Response == 'True'){
//                 		$('#recoveryForm').remove();
//                 		module.form.Alert(objdata.Message,'success');
//                 		$('.btn-back.hidden').removeClass('hidden');
//                 	}else if(objdata.Response == 'False'){
//                 		module.form.Alert(objdata.Message,'error');
//                 	}                    
//                 }else {
//                     module.form.Alert('error');                    
//                 }
//             }).complete(function() {
					
//             }).error(function() {
//                 module.form.Alert('error');
//             });
// 		});
// 	},
// 	RecoverySetPass: function () {
// 		$('#respassbtn').click( function(e) {
// 			e.preventDefault();
// 			var ajaxdata = {
//                 _token: $('#page_token').val(),
// 				password: $('#pass').val(),
// 				password_confirmation: $('#cpass').val()
// 			};
//             var ajaxurl = $('#resetpassForm').attr('action');
//             var getAjax = module.form.Ajax(ajaxdata,ajaxurl);
//             if(typeof getAjax == 'undefined')
//             	return false;
//             getAjax.success(function(data){
//                 if(typeof data !== 'undefined' && data.length > 5 && module.form.isJson(data)){
//                 	var objdata = $.parseJSON(data);
//                 	if(objdata.Response == 'True'){
//                 		$('#resetpassForm').remove();
//                 		module.form.Alert(objdata.Message,'success');
//                 		$('.btn-back.hidden').removeClass('hidden');
//                 	}else if(objdata.Response == 'False'){
//                 		module.form.Alert(objdata.Message,'error');
//                 	}                    
//                 }else {
//                     module.form.Alert('error');                    
//                 }
//             }).complete(function() {
					
//             }).error(function() {
//                 module.form.Alert('error');
//             });
// 		});
// 	},
//     init: function () {
//         module.account.ForgotPassword();
//         module.account.RecoverySetPass();
//     }
// };
var Taxonomy = {
    Submit: function (elm) {
        var ajaxurl = elm.parents('form').attr('action');
        var ajaxdata = elm.parents('form').serializeObject();
        $http.post(ajaxurl,ajaxdata).success(function(res){
            $alerts.response(res);
        });
    },
    TableSearch: function (elm) {
        var ajaxdata = {};
        var ajaxurl = elm.parents('form').attr('action');
        Table.Search(ajaxdata,ajaxurl);
    },
};
var Order = {
    TableSearch: function (elm) {
        var ajaxdata = {
            order_status: $('#action_status').val()
        };
        var ajaxurl = elm.parents('form').attr('action');
        Table.Search(ajaxdata,ajaxurl);
    },
    RenderModal: function(elm){
        var type = elm.attr('data-type');
        if($validator.isString(type) === false) {return;}
        if(type=='product'){
            $('#modal-product').modal('show');
        }else if(type=='customer'){
            var action = elm.attr('data-action');
            $('#modal-customer form')[0].reset();
            $('#modal-customer').find('.modal-alerts').empty();
            if(action=='create'){
                $('#modal-customer').attr('data-action','create');
                $('#modal-customer').find('.modal-title').text('Thêm khách hàng');
            }else {
                $('#modal-customer').find('.modal-title').text('Cập nhật thông tin giao hàng');
                var fullname = $('.order-customer-ship').find('input[name="shipping_fullname"]').val() || '';
                var phone = $('.order-customer-ship').find('input[name="shipping_phone"]').val() || '';
                var address = $('.order-customer-ship').find('input[name="shipping_address"]').val() || '';
                var district = $('.order-customer-ship').find('input[name="shipping_district"]').val() || 0;
                var province = $('.order-customer-ship').find('input[name="shipping_province"]').val() || 0;
                $('#modal-customer').find('input[name="fullname"]').val(fullname);
                $('#modal-customer').find('input[name="phone"]').val(phone);
                $('#modal-customer').find('textarea[name="address"]').val(address);
                $('#modal-customer').find('select[name="provinces"]').val(province).trigger("change");
                setTimeout(function(){ $('#modal-customer').find('select[name="districts"]').val(district); }, 200);
                $('#modal-customer').attr('data-action','update');
            }
            $('#modal-customer').modal('show');
        }
    },
    CreateSale: function(elm){
        var option = elm.parents('#modal-sale').find('.btn-option.btn-active').attr('data-option') || 'amount';
        var amount = elm.parents('#modal-sale').find('.sale-amount').val() || 0;
        var notes = elm.parents('#modal-sale').find('.sale-notes').val() || '';
        if(parseInt(amount) === 0){
            $('.amount-table .amount-discount').text('0');
            $('.amount-table .discount-edit p').text('');
            $('.amount-table input[name="amount_discount"]').val('0');
            $('.amount-table input[name="amount_discount_notes"]').val('');
            $('.amount-table .discount-add').show();
            $('.amount-table .discount-edit').hide();
        }else {
            $('.amount-table .amount-discount').text(numeral(amount).format('0,0'));
            $('.amount-table .discount-edit p').text(notes);
            $('.amount-table input[name="amount_discount"]').val(numeral().unformat(amount));
            $('.amount-table input[name="amount_discount_notes"]').val(notes);
            $('.amount-table .discount-add').hide();
            $('.amount-table .discount-edit').show();
        }
        $('.amount-table .amount-discount').attr('data-option',option);
        Order.Amount();
        elm.parents('.modal').modal('hide');
    },
    OptionSale: function(elm){
        elm.parents('#modal-sale').find('.btn-option').removeClass('btn-active');
        elm.addClass('btn-active');
        var option = elm.parents('#modal-sale').find('.btn-option.btn-active').attr('data-option') || 'amount';
        var take = elm.parents('#modal-sale').find('.sale-amount').val();
        if(option == "percentage" && numeral().unformat(take) > 100){
            elm.parents('#modal-sale').find('.sale-amount').val('100');  
        }
    },
    ChangeSale: function(elm){
        var take = elm.val();
        elm.val(numeral(take.replace(/\D/g,'')).format('0,0'));
        var option = elm.parents('#modal-sale').find('.btn-option.btn-active').attr('data-option') || 'amount';
        if(option == "percentage" && take > 100){
            elm.val('100');  
        }
    },
    Create: function(elm){
        var ajaxurl = elm.parents('form').attr('action');
        var ajaxdata = elm.parents('form').serializeObject();
        var type = elm.attr('data-type') || 'draft';
        ajaxdata._token = $('#page_token').val();
        ajaxdata.order_type = type;
        $http.post(ajaxurl,ajaxdata).success(function(res){
            $alerts.response(res);
        });
    },
    GetDiscount: function(){
        var variant = [];
        $('.product-table table tr').each(function() {
            variant.push({variant_id:$(this).attr('data-id'),variant_quantity:$(this).find('.product-number input').val()});
        });
        var ajaxdata ={
            _token: $('#page_token').val(),
            variant: variant
        };
        $http.post('admin/order/GetPromotion',ajaxdata,false).success(function(res){
            if($validator.isResponse(res)){
                var objdata = $php.json_decode(res);
                if($validator.isString(objdata.title) && $validator.isString(objdata.discount_price)){
                    $('.amount-table .order-discount').find('.discount-title').text(objdata.title);
                    $('.amount-table .order-discount').find('.discount-price').text(numeral(objdata.discount_price).format('0,0'));
                    $('.amount-table .order-discount').find('input[name="order_discount"]').val(objdata.discount_price);
                    $('.amount-table .order-discount').find('input[name="order_discount_notes"]').val(objdata.title);
                    $('.amount-table .order-discount').show();
                }else {
                    $('.amount-table .order-discount').find('.discount-title').text('');
                    $('.amount-table .order-discount').find('.discount-price').text('0');
                    $('.amount-table .order-discount').find('input[name="order_discount"]').val('0');
                    $('.amount-table .order-discount').find('input[name="order_discount_notes"]').val('');
                    $('.amount-table .order-discount').hide();
                }
            }
        });
    },
    ChangeShipping: function(){
        $('#modal-shipping').on('change', 'input[name="shipping"]', function(e) {
            e.preventDefault();
            var value = $(this).val();
            if(value == 'custom'){
                $(this).parents('.modal').find('.shipping-custom input').prop('readonly', false).val('');
            }else {
                $(this).parents('.modal').find('.shipping-custom input').prop('readonly', true).val('');
            }
            $(this).parents('.modal').find('.form-check').removeClass('selected');
            $(this).parents('.form-check').addClass('selected');
        });
    },
    GetShipping: function(){
        var province = $('.order-customer-ship input[name="shipping_province"]').val() || 0;
        var district = $('.order-customer-ship input[name="shipping_district"]').val() || 0;
        var ajaxdata = {
            province: province,
            district: district
        };
        $http.get('admin/order/GetShipping',ajaxdata,false).success(function(res){
            if($validator.isResponse(res)){
                var objdata = $php.json_decode(res);
                var count = objdata.shipping_data.length, i=0,output='';
                if(count < 1){return;}
                for(i;i<count;i++){
                    output += '<div class="form-check" data-id="'+objdata.shipping_data[i].id+'"><input id="'+objdata.shipping_data[i].id+'-shipping" type="radio" class="with-gap" name="shipping" value="'+objdata.shipping_data[i].id+'-shipping" /><label for="'+objdata.shipping_data[i].id+'-shipping">'+objdata.shipping_data[i].name+' ('+numeral(objdata.shipping_data[i].price).format('0,0')+' <span class="currency-symbols" data-type="VND">&#8363;</span>)</label><input type="hidden" class="shipping-type" value="'+objdata.shipping_data[i].type+'" /><input type="hidden" class="shipping-rate-from" value="'+objdata.shipping_data[i].rate_from+'" /><input type="hidden" class="shipping-rate-to" value="'+objdata.shipping_data[i].rate_to+'" /><input type="hidden" class="shipping-price" value="'+objdata.shipping_data[i].price+'" /><input type="hidden" class="shipping-name" value="'+objdata.shipping_data[i].name+'" /></div>';
                }
                $('#modal-shipping').find('.shipping-place').html(output);
                Order.SetShipping();
            }
        });
    },
    SetShipping: function(){
        var amount_order = $('.amount-table input[name="amount_order"]').val() || 0;
        var order_weight = $('.amount-table input[name="order_weight"]').val() || 0;
        $( ".shipping-place .form-check" ).each(function( index ) {
            var shipping_type = $(this).find('.shipping-type').val() || '';
            var shipping_rate_from = $(this).find('.shipping-rate-from').val() || 0;
            var shipping_rate_to = $(this).find('.shipping-rate-to').val() || 0;
            var shipping_price = $(this).find('.shipping-price').val() || 0;
            if(shipping_type == 'price'){
                if(parseInt(amount_order) > 0 && parseInt(amount_order) >= shipping_rate_from){
                    if(shipping_rate_to > 0 && parseInt(amount_order) > shipping_rate_to){
                        $(this).find('input[name="shipping"]').prop('checked', false);
                        $(this).hide();
                    }else {
                        $(this).show();
                    }
                }else {
                    $(this).find('input[name="shipping"]').prop('checked', false);
                    $(this).hide();
                }
            }else {
                if(parseInt(order_weight) >= shipping_rate_from && parseInt(order_weight) >= shipping_rate_from){
                    if(shipping_rate_to > 0 && parseInt(order_weight) > shipping_rate_to){
                        $(this).find('input[name="shipping"]').prop('checked', false);
                        $(this).hide();
                    }else {
                        $(this).show();
                    }
                }else {
                    $(this).find('input[name="shipping"]').prop('checked', false);
                    $(this).hide();
                }
            }
        });
        var checked = [];
        $('#modal-shipping .form-check input[name="shipping"]:checked').each(function( index ) {
            checked.push(index);
        });
        if(checked.length < 1){
            $('#modal-shipping .form-check input[value="free"]').prop('checked', true);
            $('.amount-table .shipping-edit p').text('');
            $('.amount-table .shipping-edit input[name="shipping_custom"]').val('');
            $('.amount-table .shipping-edit input[name="shipping_name"]').val('');
            $('.amount-table .shipping-edit input[name="shipping_id"]').val('0');
            $('.amount-table input[name="amount_shipping"]').val('0');
            $('.amount-table .amount-shipping').text('0');
            $('.amount-table .shipping-add').show();
            $('.amount-table .shipping-edit').hide();
        }
    },
    CreateShipping: function(elm){
        var shipping_name = elm.parents('.modal').find('.form-check.selected').find('.shipping-name').val() || '';
        var shipping_price =   elm.parents('.modal').find('.form-check.selected').find('.shipping-price').val() || 0;
        var shipping_id = elm.parents('.modal').find('.form-check.selected').attr('data-id') || 0;
        var select = elm.parents('.modal').find('.form-check.selected input[name="shipping"]').val();
        if(select == 'custom'){
            shipping_name = elm.parents('.modal').find('.shipping-custom').find('.shipping-name').val() || '';
            shipping_price = elm.parents('.modal').find('.shipping-custom').find('.shipping-price').val() || 0;
            if(!$validator.isString(shipping_name)){
                elm.parents('.modal').find('.modal-alerts').html('<div class="alert alert-danger alert-dismissible fade in" role="alert" data-plugin="alerts"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> Tên vận chuyển không được để trống.</div>');
                return;
            }else if(parseInt(shipping_price) === 0){
                elm.parents('.modal').find('.modal-alerts').html('<div class="alert alert-danger alert-dismissible fade in" role="alert" data-plugin="alerts"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> Phí vận chuyển phải lớn hơn 0.</div>');
                return;
            }else {
                elm.parents('.modal').find('.modal-alerts').empty();
            }
            $('.amount-table .shipping-edit input[name="shipping_custom"]').val('custom');
        }else {
            $('.amount-table .shipping-edit input[name="shipping_custom"]').val('');
        }
        $('.amount-table .shipping-edit p').text(shipping_name);
        $('.amount-table .shipping-edit input[name="shipping_name"]').val(shipping_name);
        $('.amount-table .shipping-edit input[name="shipping_id"]').val(shipping_id);
        $('.amount-table input[name="amount_shipping"]').val(numeral().unformat(shipping_price));
        $('.amount-table .amount-shipping').text(numeral(shipping_price).format('0,0'));
        $('.amount-table .shipping-add').hide();
        $('.amount-table .shipping-edit').show();
        elm.parents('.modal').modal('hide');
        Order.Amount();
    },
    CreateCustomer: function(elm){
        var ajaxdata = elm.parents('form').serializeObject();
        ajaxdata._token = $('#page_token').val();
        var ajaxurl = elm.parents('form').attr('action');
        $http.post(ajaxurl,ajaxdata).success(function(res){
            if($validator.isResponse(res)){
                var objdata = $php.json_decode(res);
                if(objdata.Response == 'True'){
                    elm.parents('.modal').find('.modal-alerts').html('');
                    $('#modal-customer').find('form').reset();
                    Order.SetCustomer(objdata.Data);
                    $('#modal-customer').modal('hide');
                }else {
                    var text = $php.urldecode(objdata.Message);
                    if($validator.isJson(text)){
                        text = $php.json_decode(text);
                        var count = text.length,i=0,output='';
                        for(var keyname in text) {
                            var value = text[keyname];
                            for(var keyeror in value) {
                                output += '<li>'+value[keyeror]+'</li>';
                            }
                        }
                        if($validator.isString(output)){
                            text = '<ul>'+output+'</ul>';
                        }
                    }
                    elm.parents('.modal').find('.modal-alerts').html('<div class="alert alert-danger alert-dismissible fade in" role="alert" data-plugin="alerts"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+text+'</div>');
                }
            }
        });
    },
    UpdateCustomer: function(elm){
        var text = '', isError = false;
        var fullname = $('#modal-customer').find('input[name="fullname"]').val();
        var phone = $('#modal-customer').find('input[name="phone"]').val();
        var address = $('#modal-customer').find('textarea[name="address"]').val();
        var district = $('#modal-customer').find('select[name="districts"]').val();
        var province = $('#modal-customer').find('select[name="provinces"]').val();
        if(!$validator.isString(fullname)){
            text = 'Tên khách hàng không được để trống';
            isError = true;
        }else if(!$validator.isString(phone)){
            text = 'Số diện thoại không được để trống';
            isError = true;
        }else if(!$validator.isString(address)){
            text = 'Địa chỉ giao hàng không được để trống';
            isError = true;
        }else if(!$validator.isString(province)){
            text = 'Tỉnh/Tthành phố không được để trống';
            isError = true;
        }else if(!$validator.isString(district)){
            text = 'Quận/Huyện không được để trống';
            isError = true;
        }

        if(isError === true){
            elm.parents('.modal').find('.modal-alerts').html('<div class="alert alert-danger alert-dismissible fade in" role="alert" data-plugin="alerts"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+text+'</div>');
        }else {
            var district_name = $('#modal-customer').find('select[name="districts"] option:selected').text();
            var province_name = $('#modal-customer').find('select[name="provinces"] option:selected').text();
            var avatar = $('.order-customer-ship').find('.customer-avatar img').attr('src') || '';
            var customer_email = $('.order-customer-info').find('input[name="customer_email"]').val() || '';
            var customer_order_count = $('.order-customer-info').find('input[name="customer_order_count"]').val() || 0;
            console.log(customer_email);
            var objdata = {
                avatar: avatar,
                customer_email: customer_email,
                customer_fullname: fullname,
                customer_phone: phone,
                customer_address: address,
                customer_district: district,
                customer_district_name: district_name,
                customer_province: province,
                customer_province_name: province_name,
                customer_order_count: customer_order_count
            };
            Order.SetCustomer(objdata);
            $('#modal-customer').modal('hide');
        }
    },
    RemoveCustomer: function(objdata){
        $('.order-customer-search').show();
        $('.order-customer .dropdown-action').hide();
        $('.order-customer-info').hide();
        $('.order-customer-ship').hide();
        $('.order-customer-info').find('ul').empty();
        $('.order-customer-ship').find('ul').empty();
        Order.GetShipping();
    },
    SetCustomer: function(objdata){
        var shipping_ouput = '', info_output = '';
        info_output += '<li>';
        if($validator.isString(objdata.avatar)){
            info_output += '<div class="customer-avatar tbl-cell"><img src="'+objdata.avatar+'" /></div>';
        }else {
            info_output += '<div class="customer-avatar tbl-cell"><i class="font-icon material-icons">account_circle</i></div>';
        }
        info_output += '<div class="customer-fullname tbl-cell"><a href="" class="font-weight-bold">'+objdata.customer_fullname+'</a></div></li>';
        if($validator.isString(objdata.customer_email)){
            info_output += '<li class="customer-email"><span class="label-heading">Email:</span> <span class="text">'+objdata.customer_email+'</span><input type="hidden" name="customer_email" value="'+objdata.customer_email+'" /></li>';
        }
        info_output += '<li class="customer-email"><span class="label-heading">Tổng đơn hàng:</span> <span class="text">'+objdata.customer_order_count+'</span><input type="hidden" name="customer_order_count" value="'+objdata.customer_order_count+'" /></li>';
        
        if($validator.isString(objdata.customer_fullname)){
            shipping_ouput += '<li class="shipping-fullname"><span class="label-heading">Họ tên:</span> <span class="text">'+objdata.customer_fullname+'</span><input type="hidden" name="shipping_fullname" value="'+objdata.customer_fullname+'" /></li>';
        }
        if($validator.isString(objdata.customer_phone)){
            shipping_ouput += '<li class="shipping-phone"><span class="label-heading">Số điện thoại:</span> <span class="text">'+objdata.customer_phone+'</span><input type="hidden" name="shipping_phone" value="'+objdata.customer_phone+'" /></li>';
        }
        if($validator.isString(objdata.customer_address)){
            shipping_ouput += '<li class="shipping-address"><span class="label-heading">Địa chỉ:</span> <span class="text">'+objdata.customer_address+'</span><input type="hidden" name="shipping_address" value="'+objdata.customer_address+'" /></li>';
        }
        if($validator.isString(objdata.customer_district_name)){
            shipping_ouput += '<li class="shipping-district"><span class="label-heading">Quận/Huyện:</span> <span class="text">'+objdata.customer_district_name+'</span><input type="hidden" name="shipping_district" value="'+objdata.customer_district+'" /><input type="hidden" name="shipping_district_name" value="'+objdata.customer_district_name+'" /></li>';
        }
        if($validator.isString(objdata.customer_province_name)){
            shipping_ouput += '<li class="shipping-province"><span class="label-heading">Tỉnh/Thành phố:</span> <span class="text">'+objdata.customer_province_name+'</span><input type="hidden" name="shipping_province" value="'+objdata.customer_province+'" /><input type="hidden" name="shipping_province_name" value="'+objdata.customer_province_name+'" /></li>';
        }
        $('.order-customer-info').find('ul').html(info_output);
        $('.order-customer-ship').find('ul').html(shipping_ouput);
        $('.order-customer-search').hide();
        $('.order-customer .dropdown-action').show();
        $('.order-customer-info').show();
        $('.order-customer-ship').show();
        Order.GetShipping();
    },
    CreateProduct: function(elm){
        var ajaxdata = elm.parents('form').serializeObject();
        ajaxdata._token = $('#page_token').val();
        var ajaxurl = elm.parents('form').attr('action');
        $http.post(ajaxurl,ajaxdata).success(function(res){
            if($validator.isResponse(res)){
                var objdata = $php.json_decode(res);
                if(objdata.Response == 'True'){
                    elm.parents('.modal').find('.modal-alerts').html('');
                    elm.parents('.modal').find('form')[0].reset();
                    Order.SetProduct(objdata.Data);
                    $(".product-table tr:last-child").find('.product-number input').val(ajaxdata.product_quantity).change();
                    elm.parents('.modal').modal('hide');
                }else {
                    var text = $php.urldecode(objdata.Message);
                    if($validator.isJson(text)){
                        text = $php.json_decode(text);
                        var count = text.length,i=0,output='';
                        for(var keyname in text) {
                            var value = text[keyname];
                            for(var keyeror in value) {
                                output += '<li>'+value[keyeror]+'</li>';
                            }
                        }
                        if($validator.isString(output)){
                            text = '<ul>'+output+'</ul>';
                        }
                    }
                    elm.parents('.modal').find('.modal-alerts').html('<div class="alert alert-danger alert-dismissible fade in" role="alert" data-plugin="alerts"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+text+'</div>');
                }
            }
        });
    },
    SetProduct: function(objdata){
        var output = '', order_number = 1, order_number_price = 0, order_number_weight = 0;
        var isError = '', error_list = [], product_list = [];
        if(parseInt(objdata.tracking_policy) == 1 && parseInt(objdata.out_of_stock) === 0 && parseInt(objdata.inventory)  < 1){
            isError = 'Sản phẩm <a href="'+objdata.product_url+'">'+objdata.product_title+' ('+objdata.variant_name+')</a> đã hết hàng.';
            order_number = 0;
        }
        $('.product-table table tr').each(function() {
            product_list.push($(this).attr('data-id'));
        });
        $('.product-table .product-table-alerts ul li').each(function() {
            error_list.push($(this).attr('data-id'));
        });
        
        if($php.in_array(objdata.variant_id,product_list)){
            var current_number = $('.product-table table tr[data-id="'+objdata.variant_id+'"]').find('.product-number input').val();
            if(parseInt(current_number) > 0){
                current_number = parseInt(current_number) + 1;
            }else {
                current_number = 0;
            }
            order_number_price = current_number * objdata.price_new;
            order_number_weight = current_number * objdata.weight;
            $('.product-table table tr[data-id="'+objdata.variant_id+'"]').find('.product-number input').val(current_number);
            $('.product-table table tr[data-id="'+objdata.variant_id+'"]').find('.variant-price-quantity').val(order_number_price);
            $('.product-table table tr[data-id="'+objdata.variant_id+'"]').find('.variant-weight-quantity').val(order_number_weight);
            $('.product-table table tr[data-id="'+objdata.variant_id+'"]').find('.order-product-price').text(numeral(order_number_price).format('0,0'));
        }else {
            order_number_price = order_number * objdata.price_new;
            order_number_weight = order_number * objdata.weight;
            output+= '<tr data-id="'+objdata.variant_id+'">';
            output+= '<td class="col-1"><div class="product-thumb"><div class="thumbnail-preview"><div class="thumbnail"><div class="centered"><img src="'+objdata.variant_image+'" /></div></div></td>';
            output+= '<td class="col-2"><div class="title-link"><a href="'+objdata.product_url+'">'+objdata.product_title+'</a></div><div>'+objdata.variant_name+'</div><input type="hidden" name="variant_id[]" value="'+objdata.variant_id+'" /><input type="hidden" name="product_id[]" value="'+objdata.product_id+'" /></td>';
            output+= '<td class="col-3 text-nowrap text-xs-right"><div class="price-group"><span class="price text-inline-hidden">'+numeral(objdata.price_new).format('0,0')+'</span> <span class="currency-symbols" data-type="VND">&#8363;</span></div><input type="hidden" class="variant-price" name="variant_price[]" value="'+objdata.price_new+'" /><input type="hidden" class="variant-weight" value="'+order_number_weight+'" /></td>';
            output+= '<td class="col-4 text-xs-center text-muted">x</td>';
            output+= '<td class="col-5"><div class="product-number"><input type="text" class="form-control" name="variant_number[]" data-over="'+objdata.out_of_stock+'" data-policy="'+objdata.tracking_policy+'" data-inventory="'+objdata.inventory+'" value="'+order_number+'" /></div></td>';
            output+= '<td class="col-6 text-nowrap text-xs-right"><div class="price-group"><span class="order-product-price price text-inline-hidden">'+numeral(order_number_price).format('0,0')+'</span> <span class="currency-symbols" data-type="VND">&#8363;</span></div><input type="hidden" class="variant-price-quantity" name="variant_price_quantity[]" value="'+order_number_price+'" /><input type="hidden" class="variant-weight-quantity" name="variant_weight_quantity[]" value="'+order_number_weight+'" /></td>';
            output+= '<td class="col-7"><button type="button" class="btn btn-link btn-remove p-a-0"><i class="material-icons md-20">close</i></td>';
            output+= '</tr>';
        }

        if($validator.isString(isError)){
            if($('.product-table .product-table-alerts .alert')[0]){
                if(!$php.in_array(objdata.variant_id,error_list)){
                    $('.product-table .product-table-alerts').find('ul').append('<li data-id="'+objdata.variant_id+'">'+isError+'</li>');               
                }
            }else {
                $('.product-table .product-table-alerts').html('<div class="alert alert-warning" role="alert"><ul><li data-id="'+objdata.variant_id+'">'+isError+'</li></ul></div>');
            }
        }
        $('.product-table').show();
        $('.section-order.order-create .product-table').find('tbody').append(output);
        $('.section-order.order-create .product-table').show();
        Order.GetDiscount();
        setTimeout(function(){ Order.Amount(); }, 200);
        
    },
    RemoveProduct: function(){
        $('.product-table').on('click', '.btn-remove', function(e) {
            e.preventDefault();
            var id = $(this).parents('tr').attr('data-id');
            $('.product-table .product-table-alerts ul').find('li[data-id="'+id+'"]').remove();
            if($('.product-table .product-table-alerts ul li').length < 1){
                $('.product-table .product-table-alerts').empty();
            }
            $(this).parents('tr').remove();
            if($('.product-table table tr').length < 1){
                $('.product-table').hide();
            }
            Order.GetDiscount();
            setTimeout(function(){ Order.Amount(); }, 200);
        });
    },
    UpdateProduct: function(){
        $('.product-table').on('keyup', '.product-number input', function(e) {
            e.preventDefault();
            var elm = $(this);
            var inventory = elm.attr('data-inventory');
            var out_of_stock = elm.attr('data-over');
            var tracking_policy = elm.attr('data-policy');
            var price_new = elm.parents('tr').find('.variant-price').val();
            var weight = elm.parents('tr').find('.variant-weight').val();
            var order_number_price = 1, order_number_weight = 0;
            if(parseInt(tracking_policy) == 1 && parseInt(out_of_stock) === 0 && parseInt(inventory)  < 1){
                elm.val('0');
            }else {
                if(parseInt(elm.val()) === 0 || !$validator.isString(elm.val())){
                    $alerts.error('Số lượng sản phẩm phải lớn hơn 0.');
                }else {
                    elm.val(elm.val().replace(/\D/g,''));                    
                }
            }
            var number = elm.val();
            order_number_price = number * price_new;
            order_number_weight = number * weight;
            elm.parents('tr').find('.order-product-price').text(numeral(order_number_price).format('0,0'));
            elm.parents('tr').find('.variant-price-quantity').val(order_number_price);
            elm.parents('tr').find('.variant-weight-quantity').val(order_number_weight);
            Order.GetDiscount();
            setTimeout(function(){ Order.Amount(); }, 200);
        });
    },
    Amount: function(){
        var amount_order = 0, order_weight = 0;
        $('.product-table table tr').each(function() {
            var variant_price = $(this).find('.variant-price-quantity').val() || 0;
            var variant_weight = $(this).find('.variant-weight-quantity').val() || 0;
            amount_order += parseInt(variant_price);
            order_weight += parseInt(variant_weight);
        });
        $('.amount-table input[name="amount_order"]').val(amount_order);
        $('.amount-table input[name="order_weight"]').val(order_weight);
        $('.amount-table .amount-order').text(numeral(amount_order).format('0,0'));

        var amount_discount = $('.amount-table input[name="amount_discount"]').val() || 0;
        var amount_discount_option = $('.amount-table .amount-discount').attr('data-option') || 'amount';
        var amount_ship = $('.amount-table input[name="amount_shipping"]').val() || 0;
        var order_discount = $('.amount-table input[name="order_discount"]').val() || 0;
        var amount_payment = 0;
        amount_payment = parseInt(amount_order) + parseInt(amount_ship) - parseInt(order_discount);
        if(amount_discount_option == 'amount'){
            amount_payment = amount_payment - parseInt(amount_discount);
        }else {
            amount_payment = amount_payment - (amount_payment * parseInt(amount_discount)/100);
        }
        if(amount_payment < 0){
            amount_payment = 0;
        }
        $('.amount-table .amount-payment').text(numeral(amount_payment).format('0,0'));
        $('.amount-table input[name="amount_payment"]').val(amount_payment);
        Order.SetShipping();        
    },
    Dropdown: function(elm){
        elm.on("click",function(e){
            $(this).find('.search-panel').addClass('active');
            $('html').one('click',function() {
                elm.find('.search-panel').removeClass('active');
            });
            e.stopPropagation();
        }); 
    },
    DropdownSet: function(){
        $('.box-search-advance .box-search-field input').one('click',function(e) {
            e.preventDefault();
            Order.DropdownSearch($(this));
        });
        $('.box-search-advance').on('click', '.search-item', function(e) {
            e.preventDefault();
            var type = $(this).parents('#box-search-result').attr('data-type');
            var id = $(this).attr('data-id');
            if($validator.isString(type) === false) {return;}
            var ajaxurl = '';
            if(type == 'product'){
                ajaxurl = 'admin/order/GetInfoProduct/'+id;
            }else if(type == 'customer'){
                ajaxurl = 'admin/order/GetInfoCustomer/'+id;
            }
            $http.get(ajaxurl,{},false).success(function(res){
                if($validator.isResponse(res)){
                    var objdata = $php.json_decode(res);
                    if(type == 'product'){
                        Order.SetProduct(objdata);
                    }else if(type == 'customer'){
                        Order.SetCustomer(objdata);
                    }
                }
            });
        });
    },
    DropdownSearch: function(elm){
        var type = elm.parents('.box-search-advance').attr('data-type');
        if($validator.isString(type) === false) {return;}
        var search = elm.val() || '';
        var ajaxdata = {
            search: search,
        };
        var ajaxurl = '';
        if(type == 'product'){
            ajaxurl = 'admin/order/GetListProduct';
        }else if(type == 'customer'){
            ajaxurl = 'admin/order/GetListCustomer';
        }
        $http.get(ajaxurl,ajaxdata,false).success(function(res){
            if($validator.isResponse(res)){
                var objdata = $php.json_decode(res);
                if(objdata.Response == 'True'){
                    elm.parents('.box-search-advance').find('.search-panel-body').html($php.urldecode(objdata.Data)); 
                }
            }
        });
    },
};
var Product = {
    Submit: function(elm){
        var ajaxurl = elm.parents('form').attr('action');
        var ajaxdata = elm.parents('form').serializeObject();
        $http.post(ajaxurl,ajaxdata).success(function(res){
            $alerts.response(res);
        });
    },
    AddCategory: function(){
        var data = {
            _token: $('#page_token').val(),
            submit_type: 'quick_create',
            name: $('.new-category').val(),
            parent: $('.new-category-parent').val()
        }
        $http.post('admin/taxonomy/post-category/create',data).success(function(res){
            if(!$validator.isResponse(res)){
                return;
            }
            var objdata = $php.json_decode(res);
            if(objdata.Response == 'True'){
                if($('ul.taxonomy-checklist')[0]){
                    var order_arr = new Array();
                    $('ul.taxonomy-checklist li').each(function(idx, obj) {
                        order_arr.push($(this).attr('data-order'));
                    });
                    var order = order_arr.sort(function(a, b){return b-a});
                    $('ul.taxonomy-checklist').prepend('<li data-id="'+objdata.taxonomy_id+'" data-text="'+objdata.taxonomy_name+'" data-order="'+order[0]+'"><input id="cat-'+objdata.taxonomy_id+'" class="filled-in" type="checkbox" name="post_category['+order[0]+']" value="'+objdata.taxonomy_id+'" /><label for="cat-'+objdata.taxonomy_id+'">'+objdata.taxonomy_name+'</label></li>');
                }
                $('.new-category').val('');
                $('.new-category-parent').val('0');
            }
        });
    },
    TableSearch: function (elm) {
        var ajaxdata = {
            product_status: $('#action_status').val()
        };
        var ajaxurl = $(elm).parents('form').attr('action');
        Table.Search(ajaxdata,ajaxurl);
    },
    ModalListImage: function(){
        // var choise = elm.parent().attr('data-image');
        // var type = elm.parent().attr('data-type');
        // if($validator.isInt(choise) == true && choise < 10){
        //     choise = choise;
        // }else {
        //     choise = 1;
        // }
        // if($('#media-modal-list')[0]){
        //     $('#media-modal-list').attr('data-image',choise);
        //     if($validator.isString(type) == true){
        //         $('#media-modal-list').attr('data-type',type);
        //     }
        // }
        
        
        var ajaxdata = {}
        $http.get('admin/attachment/get-list-image',ajaxdata).success(function(res){
            if(!$validator.isResponse(res)){return;}
            General.LoadModalImage(res);
            $('#media-modal').modal('show');
            $('#media-modal').on('shown.bs.modal', function () {
                General.ScrollModalImage()
            });
            General.SearchModalImage();
        });
    },
    UploadFromUrl: function(elm){
        var ajaxdata = {
            _token: $('#page_token').val(),
            image_url: $('#image-url').val(),
        };
        var ajaxurl = elm.parents('form').attr('action');
        $http.post(ajaxurl,ajaxdata).success(function(res){
            
            $alerts.response(res);
        });
    },
    ChangeTracking: function(){
        if($("#tracking-select").val() == 'tracking'){
            $('#product-quantity').prop('readonly', false);
            $('#quantity-limit').parent().show();
            $('.variant-item-list table .col-6').show();
        }else {
            $('#product-quantity').prop('readonly', true);
            $('#quantity-limit').parent().hide();
            $('.variant-item-list table .col-6').hide();
        }
    },
    SetQuantity: function(elm){

    },
    SearchProductTaxonomy: function(elm){
        var search = elm.val();
        var type = elm.parents('.dropdown-select').attr('data-name');
        var slug = elm.parents('.dropdown-select').attr('data-slug');
        var taxonomy_id = new Array();
        var choise = elm.parents('.dropdown').find('input.'+slug);
        $(choise).each(function(){
            taxonomy_id.push($(this).val());
        });
        var ajaxdata = {
            _token: $('#page_token').val(),
            type: type,
            search: search,
            taxonomy_id: taxonomy_id
        };
        $http.post('admin/product/search-taxonomy',ajaxdata,false).success(function(res){
            if($validator.isResponse(res)){
                var objdata = $php.json_decode(res);
                var count = objdata.length, i = 0, output = '';
                for (i; i < count; i++) {
                    var select = '';
                    if($php.in_array(objdata[i].taxonomy_id,taxonomy_id)){
                        select = ' class="selected"'
                    }
                    output += '<li'+select+'><a class="dropdown-item" href="javascript:;" data-id="'+objdata[i].taxonomy_id+'"><span>'+objdata[i].taxonomy_name+'</span><i class="font-icon material-icons md-18">check</i></a></li>';
                }
                elm.parents('.dropdown-select').find('ul').html(output);
            }
        });
    }
}
var Variant = {
    DisableOption: function(){
        var variant = [];
        $('.variant-attributes .variant-option select').each(function() {
            $(this).children('option').each(function() {
                if($(this).is(":selected")){
                   variant.push($(this).val());
                }
            });
        });
        $('.variant-attributes .variant-option select').each(function() {
            $(this).children('option').each(function() {
                if($php.in_array($(this).val(),variant) && $(this).val() !== 'custom'){
                    $(this).prop('disabled', true);
                }else {
                    $(this).prop('disabled', false);
                }
            });
        });
    },
    AddOption: function(elm){
        var count =  $('.variant-attributes .variant-option').length;
        if(count < 4){
            var variant = [];
            $('.variant-attributes .variant-option select').each(function() {
                $(this).children('option').each(function() {
                    if($(this).is(":selected")){
                        $(this).prop('disabled', true);
                        variant.push($(this).val());
                    }
                });
            });
            var input = '';
            if($('#modal-option-edit')[0]){
                input = '<input type="text" class="form-control" name="variant_option_name[]" value="" />';
            }else {
                input = '<input type="text" class="form-control" name="variant_option_name[]" value="" data-plugin="tagsinput" />';
            }
            $('.variant-attributes table').append('<tr class="variant-option"><td class="col-1"><select class="form-control"><option value="title">Tiêu đề</option><option value="size">Kích thước</option><option value="color">Màu sắc</option><option value="material">Vật liệu</option><option value="style">Kiểu dáng</option><option value="custom">Tạo tùy chọn mới</option></select></td><td class="col-2"><div class="input-group">'+input+'<span class="input-group-btn"><button class="btn btn-remove" type="button"><i class="font-icon material-icons md-18">delete_forever</i></button></span></div></td></tr>');
            
            $('[data-plugin="tagsinput"]').tagsinput({maxChars: 50,});
            var variant_item = $('.variant-attributes .variant-option select');
            var select = [];
            variant_item.last().children('option').each(function(index) {
                if($php.in_array($(this).val(),variant)){
                    $(this).prop('disabled', true);
                }else {
                    select.push(index);
                }         
            });
            if(select){ 
                variant_item.last().prop('selectedIndex', select[0]); 
                variant_item.last().children('option:selected').prop('disabled', true); 
                variant.push(variant_item.last().children('option:selected').val());
                var value = variant_item.last().children('option:selected').val(); 
                var text = variant_item.last().children('option:selected').text(); 
                variant_item.last().parent().find('input').remove();
                if(value=='custom'){
                    variant_item.last().after('<input type="text" class="form-control" name="variant_option[]" value="" placeholder="VD: Dung lượng" />');
                }else {
                    variant_item.last().after('<input type="hidden" class="form-control" name="variant_option[]" value="'+text+'" />');
                }
            }
            $('.variant-attributes .variant-option select').each(function() {
                $(this).children('option').each(function() {
                    if($php.in_array($(this).val(),variant) && $(this).val() !== 'custom'){
                        $(this).prop('disabled', true);
                    }else {
                        $(this).prop('disabled', false);
                    }
                });
            });
            if($("#tracking-select").val() == 'tracking'){
                $('.variant-list table .col-6').show();
            }else {
                $('.variant-list table .col-6').hide();
            }
            

            Variant.ChangeOptionItem();
           
            var count_modal = $('.variant-option-content .variant-option').length;
            if($('#modal-option-edit')[0]){
                if(count_modal == 3){ elm.parent().hide();}
            }else {
                if(count == 3){ elm.parent().hide();}
            }
            
        }else {
            elm.parent().hide();
        }
    },
    ChangeOption: function(){
        $('.variant-attributes').on('change','select',function() {
            var value = $(this).val(), text = $(this).children('option:selected').text();
            Variant.DisableOption();
            $(this).parent().find('input').remove();
            if(value=='custom'){
                $(this).after('<input type="text" class="form-control" name="variant_option[]" value="" placeholder="VD: Dung lượng" />');
            }else {
                $(this).after('<input type="hidden" class="form-control" name="variant_option[]" value="'+text+'" />');
            }
        });
    },
    RemoveOption: function(){
        $('.variant-attributes').on('click','.btn-remove',function(e){
            e.preventDefault();
            $(this).parents('.variant-option').remove();
            var count =  $('.variant-attributes .variant-option').length;
            if(count < 4){
                $('.variant-option-add').show();
            }
            Variant.AddOptionItem();
        });
    },
    AddOptionItem: function(){
        var item = $('.variant-attributes .variant-option');
        var output = '';
        if(item.length > 0 && item.length < 4){
            var item_len = 0;
            var item_value = [];
            var item_1 = item.eq(0).find('[data-plugin="tagsinput"]').tagsinput('items');
            var item_2 = item.eq(1).find('[data-plugin="tagsinput"]').tagsinput('items');
            var item_3 = item.eq(2).find('[data-plugin="tagsinput"]').tagsinput('items');
            var price = $('#price-new').val();
            var sku = $('#product-sku').val();
            var barcode = $('#product-barcode').val();
            var quantity = $('#product-quantity').val();
            if($validator.isString(item_1) && $validator.isString(item_2) && $validator.isString(item_3)){
                item_len =  item_1.length * item_2.length * item_3.length;
                $.each(item_1,function(index, value) {
                    var item_1_value = value;
                    $.each(item_2,function(index, value) {
                        var item_2_value = value;
                        $.each(item_3,function(index, value) {
                            item_value.push(item_1_value+' / '+item_2_value+' / '+value);
                        });
                    });
                });
            }else if(!$validator.isString(item_1) && $validator.isString(item_2) && $validator.isString(item_3)){
                item_len =  item_2.length * item_3.length;
                $.each(item_2,function(index, value) {
                    var item_2_value = value;
                    $.each(item_3,function(index, value) {
                        item_value.push(item_2_value+' / '+value);
                    });
                });
            }else if($validator.isString(item_1) && !$validator.isString(item_2) && $validator.isString(item_3)){
                item_len =  item_1.length * item_3.length;
                $.each(item_1,function(index, value) {
                    var item_1_value = value;
                    $.each(item_3,function(index, value) {
                        item_value.push(item_1_value+' / '+value);
                    });
                });
            }else if(!$validator.isString(item_1) && !$validator.isString(item_2) && $validator.isString(item_3)){
                item_len =  item_3.length;
                $.each(item_3,function(index, value) {
                    item_value.push(value);
                });
            }else if(!$validator.isString(item_1) && $validator.isString(item_2) && !$validator.isString(item_3)){
                item_len =  item_2.length;
                $.each(item_2,function(index, value) {
                    item_value.push(value);
                });
            }else if($validator.isString(item_1) && $validator.isString(item_2) && !$validator.isString(item_3)){
                item_len =  item_1.length * item_2.length;
                $.each(item_1,function(index, value) {
                    var item_1_value = value;
                    $.each(item_2,function(index, value) {
                        item_value.push(item_1_value+' / '+value);
                    });
                });
            }else if($validator.isString(item_1) && !$validator.isString(item_2) && !$validator.isString(item_3)){
                item_len =  item_1.length;
                $.each(item_1,function(index, value) {
                    item_value.push(value);
                });
            }
            var i = 0,x=1;
            for(i;i<item_len;i++){
                var sku_new = '';
                if(sku){ sku_new = sku+'-'+x;}
                output += '<tr class="variant-item"><th class="col-1 table-check"><input id="variant-id-'+x+'" class="filled-tbl" type="checkbox" name="variant_item[][id]" value="'+x+'" checked><label for="variant-id-'+x+'"></label></th><td class="col-2"><span class="variant-title text-primary">'+item_value[i]+'</span></td><td class="col-3"><div class="input-group"><input type="text" class="form-control variant-price" name="variant_item[][price]" value="'+price+'" /><span class="input-group-addon">₫</span></div></td><td class="col-4"><input type="text" class="form-control variant-sku" name="variant_item[][sku]" value="'+sku_new+'" /></td><td class="col-5"><input type="text" class="form-control variant-barcode" name="variant_item[][barcode]" value="'+barcode+'" /></td><td class="col-6"><input type="number" class="form-control variant-quantity" name="variant_item[][quantity]" value="'+quantity+'" /></td></tr>';
                x++;
            }
            $('.variant-item-list table tbody').html(output);
        }else if(item.length === 0){
            $('.variant-item-list table tbody').html(output);
        }
        if($("#tracking-select").val() == 'tracking'){
            $('.variant-item-list table .col-6').show();
        }else {
            $('.variant-item-list table .col-6').hide();
        }
    },
    ChangeOptionItem: function(){
        var item = $('.variant-attributes .variant-option');
        if(item.length > 0 && item.length < 4){
            item.on('change','[data-plugin="tagsinput"]',function() {
                Variant.AddOptionItem();
            });            
        }
        $('.variant-item-list').on('keypress','.variant-price',function(e){
            Format.Number($(this));
        });
    },
    SetValue: function(elm){
        var type = elm.attr('data-value');
        if($('.variant-item-list .variant-item').length > 0){
            var value = elm.val();
            if(type == 'price'){
                $('.variant-price').val(value);
            }else if(type=='sku'){
                $('.variant-sku').each(function(index) {
                    index = index + 1;
                    $(this).val(value+'-'+index);
                });
            }else if(type=='barcode'){
                $('.variant-barcode').val(value);
            }else if(type=='quantity'){
                $('.variant-quantity').val(value);
            }
        }
    },
    Delete: function(){
        $('.variant-table').on('click','.btn-delete',function(e){
            e.preventDefault();
            var $this = $(this);
            var ajaxdata = {
                _token: $('#page_token').val(),
                variant_id: $this.parents('tr').attr('data-id')
            };
            $http.post('admin/product/variant/delete/'+$this.parents('.variant-table').attr('data-product-id'),ajaxdata).success(function(res){
                if($validator.isResponse(res)){
                    var objdata = $php.json_decode(res);
                    if(objdata.Response == 'True'){
                        $this.parents('tr').remove();
                    }
                }
            });
        });
    },
    LoadEditModal: function(){
        $('.variant-table').on('click','.btn-edit',function(e){
            e.preventDefault();
            $('#modal-variant-add').find('form').attr('action',$('#modal-variant-add').find('form').attr('action').replace('admin/product/variant/create','admin/product/variant/edit'));
            var ajaxurl = $('#modal-variant-add').find('form').attr('action');       
            var variant_id = $(this).parents('tr').attr('data-id');
            var ajaxdata = {
                variant_id: variant_id,
            };
            $http.get(ajaxurl,ajaxdata).success(function(res){
                if($validator.isResponse(res)){
                    $('#modal-variant-add').find('form')[0].reset();
                    $('#modal-variant-add').find('.modal-title').text('Chỉnh sửa phiên bản');
                    $('#modal-variant-add').find('.modal-footer .btn-primary').text('Lưu thay đổi');
                    var objdata = $php.json_decode(res);
                    var count = objdata.option.length, i=0,output='';
                    output += '<div class="row">';
                    for(i;i<count;i++){
                        if(count==2){
                            output += '<div class="col-sm-6 col-xs-12">';
                        }else if(count==3){
                            output += '<div class="col-sm-4 col-xs-12">';
                        }else {
                            output += '<div class="col-sm-12 col-xs-12">';
                        }
                        output+='<div class="form-group"><label>'+objdata.option[i].variant_option+'</label><input type="hidden" class="form-control" name="variant_option[]" value="'+objdata.option[i].variant_option+'" /><input type="text" class="form-control" name="variant_option_name[]" value="'+objdata.option[i].variant_option_name+'" /></div>';
                        output+='</div>';
                    }
                    output += '</div><input type="hidden" class="form-control" name="variant_id" value="'+variant_id+'" />';
                    $('#modal-variant-add').find('.variant-option-data').html(output);
                    $('#modal-variant-add input[name="price_new"]').val(numeral(objdata.price_new).format('0,0'));
                    $('#modal-variant-add input[name="price_old"]').val(numeral(objdata.price_old).format('0,0'));
                    $('#modal-variant-add input[name="sku"]').val(objdata.sku);
                    $('#modal-variant-add input[name="barcode"]').val(objdata.barcode);
                    $('#modal-variant-add input[name="product_weight"]').val(numeral(objdata.weight).format('0,0'));
                    if(objdata.ship == 1){
                        $('#modal-variant-add input[name="product_ship"]').prop('checked', true);
                    }else {
                        $('#modal-variant-add input[name="product_ship"]').prop('checked', false);
                    }
                    if(objdata.tracking_policy == 1){
                        $('#modal-variant-add select[name="tracking"]').val('tracking');
                        $('#modal-variant-add input[name="product_quantity"]').val(numeral(objdata.quantity).format('0,0')).prop('readonly', false);
                        if(objdata.out_of_stock == 1){
                            $('#modal-variant-add input[name="quantity_limit"]').prop('checked', true);
                        }else{
                            $('#modal-variant-add input[name="quantity_limit"]').prop('checked', false);
                        }
                        $('#modal-variant-add input[name="quantity_limit"]').parents('.form-group').show();
                    }else {
                        $('#modal-variant-add select[name="tracking"]').val('notracking');
                        $('#modal-variant-add input[name="product_quantity"]').val('').prop('readonly', true);
                        $('#modal-variant-add input[name="quantity_limit"]').prop('checked', false);
                        $('#modal-variant-add input[name="quantity_limit"]').parents('.form-group').hide();
                    }
                    $('#modal-variant-add').modal('show');
                }
            });
        });
    },
    LoadAddModal: function(){
        $('#modal-variant-add').find('form').attr('action',$('#modal-variant-add').find('form').attr('action').replace('admin/product/variant/edit','admin/product/variant/create'));
        var ajaxurl = $('#modal-variant-add').find('form').attr('action');
        $http.get(ajaxurl,{}).success(function(res){
            if($validator.isResponse(res)){
                $('#modal-variant-add').find('form')[0].reset();
                $('#modal-variant-add').find('.modal-title').text('Tạo phiên bản mới');
                $('#modal-variant-add').find('.modal-footer .btn-primary').text('Tạo mới');
                var objdata = $php.json_decode(res);
                var count = objdata.length, i=0,output='';
                output += '<div class="row">';
                for(i;i<count;i++){
                    if(count==2){
                        output += '<div class="col-sm-6 col-xs-12">';
                    }else if(count==3){
                        output += '<div class="col-sm-4 col-xs-12">';
                    }else {
                        output += '<div class="col-sm-12 col-xs-12">';
                    }
                    output+='<div class="form-group"><label>'+objdata[i].variant_name+'</label><input type="text" class="form-control" name="variant_option_name[]" value="" /></div>';
                    output+='</div>';
                }
                output += '</div>';
                $('#modal-variant-add').find('.variant-option-data').html(output);
                $('#modal-variant-add').modal('show');
            }
        });
    },
    SubmitModal: function(){
        $('#modal-variant-add').on('click','.btn-submit',function(e){
            var ajaxurl = $(this).parents('form').attr('action');
            var ajaxdata = $(this).parents('form').serializeObject();
            ajaxdata._token = $('#page_token').val();
            $http.post(ajaxurl,ajaxdata).success(function(res){
                if($validator.isResponse(res)){
                    var objdata = $php.json_decode(res);
                    if(objdata.Response == 'True'){
                        $('.variant-table').html($php.urldecode(objdata.Data));
                        $('#modal-variant-add').modal('hide');
                    }else {

                    }
                }
            });
        });
        
    },
    LoadOptionModal: function(){
        var ajaxurl = $('#modal-option-edit').find('form').attr('action');
        $http.get(ajaxurl,{}).success(function(res){
            if($validator.isResponse(res)){
                var objdata = $php.json_decode(res);
                var count = objdata.length, i=0,z=0,output='';
                var select = [];
                for(z;z<count;z++){
                    select.push(objdata[z].variant_option);
                }
                
                for(i;i<count;i++){
                    var select_1='',select_2='',select_3='',select_4='',select_5='',select_6='';
                    var disabled_1='',disabled_2='',disabled_3='',disabled_4='',disabled_5='';
                    var selected = '',disabled='',value='',option='';
                    output += '<tr class="variant-option">';
                    $.each(select, function() {
                        if(value == 'Tiêu đề'){
                            disabled_1 = ' disabled';
                        }else if(value == 'Kích thước'){
                            disabled_2 = ' disabled';
                        }else if(value == 'Màu sắc'){
                            disabled_3 = ' disabled';
                        }else if(value == 'Vật liệu'){
                            disabled_4 = ' disabled';
                        }else if(value == 'Kiểu dáng'){
                            disabled_5 = ' disabled';
                        }
                    });
                    if(objdata[i].variant_option == 'Tiêu đề'){
                        select_1 = ' selected';
                        value = '<input type="hidden" class="form-control" name="variant_option[]" value="'+objdata[i].variant_option+'" />';
                    }else if(objdata[i].variant_option == 'Kích thước'){
                        select_2 = ' selected';
                        value = '<input type="hidden" class="form-control" name="variant_option[]" value="'+objdata[i].variant_option+'" />';
                    }else if(objdata[i].variant_option == 'Màu sắc'){
                        select_3 = ' selected';
                        value = '<input type="hidden" class="form-control" name="variant_option[]" value="'+objdata[i].variant_option+'" />';
                    }else if(objdata[i].variant_option == 'Vật liệu'){
                        select_4 = ' selected';
                        value = '<input type="hidden" class="form-control" name="variant_option[]" value="'+objdata[i].variant_option+'" />';
                    }else if(objdata[i].variant_option == 'Kiểu dáng'){
                        select_5 = ' selected';
                        value = '<input type="hidden" class="form-control" name="variant_option[]" value="'+objdata[i].variant_option+'" />';
                    }else {
                        select_6 = ' selected';
                        value = '<input type="text" class="form-control" name="variant_option[]" placeholder="VD: Dung lượng" value="'+objdata[i].variant_option+'" />';
                    }

                    output += '<td class="col-1"><select class="form-control"><option value="title"'+disabled_1+select_1+'>Tiêu đề</option><option value="size"'+disabled_2+select_2+'>Kích thước</option><option value="color"'+disabled_3+select_3+'>Màu sắc</option><option value="material"'+disabled_4+select_4+'>Vật liệu</option><option value="style"'+disabled_5+select_5+'>Kiểu dáng</option><option value="custom"'+select_6+'>Tạo tùy chọn mới</option></select>'+value+'</td>';
                    var item = objdata[i].variant_option_name.length, x = 0;
                    if(item > 0){
                        for(x;x<item;x++){
                            option += '<span class="label label-primary">'+objdata[i].variant_option_name[x]+'</span>&nbsp;';
                        }
                        option = option.substring(0, option.length - 1);
                    }
                    output += '<td class="col-2">'+option+'</td>';                    
                    output += '</tr>';
                }
                $('#modal-option-edit').find('.variant-option-content table tbody').html(output);

                var item =  $('.variant-option-content .variant-option').length;
                if(item < 4){
                    if(item===3){
                        $('.variant-option-add').hide();
                    }else {
                        $('.variant-option-add').show();
                    }
                    
                }else {
                    $('.variant-option-add').hide();
                }
                $('#modal-option-edit').modal('show');
            }
        });
    },
    OptionModal: function(elm){
        var ajaxurl = elm.parents('form').attr('action');
        var ajaxdata = elm.parents('form').serializeObject();
        ajaxdata._token = $('#page_token').val();
        $http.post(ajaxurl,ajaxdata).success(function(res){
            if($validator.isResponse(res)){
                var objdata = $php.json_decode(res);
                if(objdata.Response == 'True'){
                    $('.variant-table').html($php.urldecode(objdata.Data));
                }
                $('#modal-option-edit').modal('hide');
            }
        });
    },
    LoadSortModal: function(){
        var ajaxurl = $('#modal-variant-sort').find('form').attr('action');
        $http.get(ajaxurl,{}).success(function(res){
            if($validator.isResponse(res)){
                var objdata = $php.json_decode(res);
                var count = objdata.length, i=0,output='';
                output += '<ul class="variant-sort">';
                for(i;i<count;i++){
                    output += '<li><div class="variant-parent"><i class="font-icon material-icons">list</i> <span class="font-lg-size">'+objdata[i].variant_option+'</span><input type="hidden" class="form-control" name="variant_option[item_'+i+']" value="'+objdata[i].variant_option+'" /></div>';
                    var item = objdata[i].variant_option_name.length, x = 0;
                    if(item > 0){
                        output += '<ul class="variant-child clearfix">';
                        for(x;x<item;x++){
                            output += '<li><span>'+objdata[i].variant_option_name[x]+'</span><input type="hidden" class="form-control" name="variant_option_name[item_'+i+'][]" value="'+objdata[i].variant_option_name[x]+'" /></li>';
                        }
                        output += '</ul>';
                    }
                    output += '</li>';
                }
                output += '</ul>';
                $('#modal-variant-sort').find('.variant-sort-data').html(output);
                $('.variant-sort').sortable({
                    placeholder: "sortable-placeholder",
                    start: function(e, ui){
                        ui.placeholder.height(ui.item.height());
                    }
                });
                $('.variant-child').sortable({
                    start: function(e, ui){
                        ui.placeholder.height(ui.item.height());
                    }
                });
                $('#modal-variant-sort').modal('show');
            }
        });
    },
    SortModal: function(elm){
        var ajaxurl = elm.parents('form').attr('action');
        var ajaxdata = elm.parents('form').serializeObject();
        ajaxdata._token = $('#page_token').val();
        $http.post(ajaxurl,ajaxdata).success(function(res){
            if($validator.isResponse(res)){
                var objdata = $php.json_decode(res);
                if(objdata.Response == 'True'){
                    $('.variant-table').html($php.urldecode(objdata.Data));
                    $('#modal-variant-sort').modal('hide');
                }
            }
        });
    },
    LoadImageModal: function(){
        $('.variant-table').on('click', '.variant-thumb', function(e) {
            e.preventDefault();
            var variant_id = $(this).parents('tr').attr("data-id");
            var image_id = $(this).find('img').attr("data-id");
            var ajaxurl = $('#modal-variant-image').find('form').attr('action');
            $http.get(ajaxurl,{}).success(function(res){
                if($validator.isResponse(res)){
                    var objdata = $php.json_decode(res);
                    $('#modal-variant-image').attr('data-variant',variant_id);
                    if(objdata.Response == 'True'){
                        var output = '';
                        if(objdata.Data.length < 0){
                            $('.variant-image-data').html('');
                        }else {
                            var count = objdata.Data.length, i=0;
                            output += '<ul id="attachment-grid" class="clearfix">';
                            for (i; i < count; i++) {
                                var active='';
                                if(objdata.Data[i].id == image_id){
                                    active = ' active';
                                }
                                output += '<li data-id="'+objdata.Data[i].id+'" class="attachment-item attachment-item-'+objdata.Data[i].id+active+'"><div class="thumbnail-preview"><div class="thumbnail"><div class="centered"><img src="'+objdata.Data[i].url+'" /></div></div></div></li>';
                            }
                            output += '</ul>';
                        }
                        $('.variant-image-data').html(output);
                        $('#modal-variant-image').modal('show');
                    }
                }
            });
        });
        $('.variant-image-data').on('click', '.attachment-item', function(e) {
            e.preventDefault();
            $(".variant-image-data .attachment-item").not($(this)).removeClass('active');
            $(this).toggleClass('active');
        });
    },
    ImageModal: function(elm){
        var id = '', url = '', title = '';
        $('.variant-image-data .attachment-item').each(function(idx, obj) {
            if($(this).hasClass('active')){
                id = $(this).attr('data-id');
                url = $(this).find('img').attr('src');
                title = $(this).find('img').attr('alt');
            }
        });
        if(!$validator.isString(id)){
            id = 0;
        }
        var variant_id = $('#modal-variant-image').attr("data-variant");
        var ajaxurl = elm.parents('form').attr('action');
        var ajaxdata = {
            _token: $('#page_token').val(),
            variant_id: variant_id,
            attachment_id: id
        };
        $http.post(ajaxurl,ajaxdata).success(function(res){
            if($validator.isResponse(res)){
                var objdata = $php.json_decode(res);
                if(objdata.Response == 'True'){
                    if(id !== 0){
                        $('.variant-table').find('tr[data-id="'+variant_id+'"]').find('.variant-thumb').html('<div class="thumbnail-preview"><div class="thumbnail"><div class="centered"><img data-id="'+id+'" src="'+url+'"></div></div></div>');
                    }else {
                        $('.variant-table').find('tr[data-id="'+variant_id+'"]').find('.variant-thumb').html('<i class="font-icon material-icons md-20">photo_camera</i>');
                    }
                }
            }
        });
        $('#modal-variant-image').modal('hide');
    }
};
var Discount = {
    TypeChange: function(elm){
        var $this = $(elm);
        var discount_type = $this.val();
        var discount_offer = $('#discount-offer').val();
        if(discount_type == 2){
            $('.discount-coupon').hide();
            $('#discount-title-lbl').text('Tên chương trình khuyến mãi');
            $('#discount-title').val('');
            $('#promotion-allow').attr('checked', false);
            $('#limit').prop('checked', true);
            $('#discount-limit').val('').prop('readonly', true);
        }else {
            $('.discount-coupon').show();
            $('#discount-title-lbl').text('Tên mã khuyến mãi');
        }
    },
    LimitSet: function (elm) {
        $(elm).is(":checked") ? $('#discount-limit').prop('readonly', true) : $('#discount-limit').prop('readonly', false), $('#discount-limit').val(''), $('#discount-limit').parsley().reset();
    },
    TakeSet: function(elm){
        var $this = $(elm);
        var take = $this.val();
        $this.val(Format.Currency(take.replace(/\D/g,'')));
        var discount_option = $('#discount-option').val();
        if(discount_option == "percentage" && take > 100){
            $this.val('100');  
        }

    },
    DateLimit: function(elm){
        $(elm).is(":checked") ? $('#end-date').prop('readonly', true).val('') : $('#end-date').prop('readonly', false);
    },
    OptionSet: function(elm){
        var $this = $(elm);
        var take = $this.val();
        var discount_option = $('#discount-option').val();
        if(discount_type == "percentage" && take > 100){
            $this.val('100');  
        }else {

        }
    },
    OptionChange: function (elm) {
        var $this = $(elm);
        var discount_option = $this.val();
        var take = $('#discount-take').val('');
        if(discount_option == "percentage"){
            $('#discount-per').show();
        }else {
            $('#discount-per').hide();
        }
    },
    GenerateCode: function () {
        $http.get('admin/discount/generate-code',{},false).success(function(res){
            $('#discount-title').val(res);
            $('#discount-title').parsley().reset();
        });
    },
    OfferOption: function(){
        var discount_offer = $('#discount-offer').val();
        var discount_type = $('#discount-type').val();
        $('.offer-content-group').hide();
        $('.offer-option-group').hide();
        if(discount_offer=='amount_order'){
            $('#offer-amount-order').show();
        }else if(discount_offer=='product_group'){
            $('#offer-product-group').show();
           
        }else if(discount_offer=='product'){
            $('#offer-product').show();
        }else if(discount_offer=='customer_group'){
            $('#offer-customer-group').show();
        }
        if(discount_type == 2){
            if(discount_offer=='product_group' || discount_offer=='product'){
                $('#offer-option-2').show();
            }
        }else {
            if(discount_offer=='product_group' || discount_offer=='product'){
                var discount_option = $('#discount-option').val();
                if(discount_option=='amount'){
                    $('#offer-option-1').show();
                }
            }
        }  
    },
    OfferItemSet: function(){
        $('#offer-content').on("click",".dropdown-item", function(e) {
            e.preventDefault();
            var $this = $(this);
            var id = $this.attr('data-id');
            var text = $this.attr('data-text');
            if($validator.isString(id)){
                $this.parents('.dropdown-search').find('button[data-toggle="dropdown"] span').text(text);
                $this.parents('.offer-content-group').find('.offer-value').val(id);
            }
        });
    },
    OfferItemSearch: function(elm){
        var offer_type = elm.attr('data-type');
        var search = elm.parents('.dropdown-search').find('.dropdown-search-input input').val();
        if($validator.isString(search) === false){
            search = elm.val();
        }
        var ajaxdata = {
            _token: $('#page_token').val(),
            offer_type: offer_type,
            search: search
        };
        $http.get('admin/discount/offer-item',ajaxdata,false).success(function(res){
            if($validator.isResponse(res) === true){
                var objdata = $php.json_decode(res);
                var count = objdata.length,i=0,output='';
                for(i;i<count;i++){
                    output += '<a class="dropdown-item" href="javascript:;" data-id="'+objdata[i].id+'" data-text="'+objdata[i].text+'">'+objdata[i].text+'</a>';
                }
                elm.parents('.dropdown-search').find('.dropdown-item-list').html(output);
                elm.parents('.dropdown-search').find('.dropdown-loading').hide();
            }else {
                elm.parents('.dropdown-search').find('.dropdown-item-list').html('');
                elm.parents('.dropdown-search').find('.dropdown-loading').show();
                elm.parents('.dropdown-search').find('.dropdown-loading').text('Không tìm thấy kết quả.');
            }
        });
    },
    Create: function(elm){
        var ajaxdata = elm.parents('form').serializeObject();
        var ajaxurl = elm.parents('form').attr('action');
        var form = elm.parents('form');
        if (!elm.parents('form').parsley().isValid()) {
            form.parsley().validate();
            return false;
        }
        // if($validator.isString(form) == false){return false;}
        // if(form.parsley( 'isValid' )){return false;}
        $http.post(ajaxurl,ajaxdata).success(function(res){
            $alerts.response(res);
        });
    },
    Detail: function(){
        $('.discount-list').on( "click",".discount-title a", function(e) {
            e.preventDefault();
            var elm = $(this);
        var discount_id = elm.parents('tr').attr('data-id');
        var discount_type = elm.parents('tr').find('.discount-type').attr('data-type');
        var discount_type_text = elm.parents('tr').find('.discount-type').text().trim();
        var promotion_allow = elm.parents('tr').find('.discount-type').attr('data-promotion');
        var discount_title = elm.parents('tr').find('.discount-title').text().trim();
        var discount_status = elm.parents('tr').find('.discount-status').attr('data-text');
        var discount_date_start = elm.parents('tr').find('.discount-date-start').text().trim();
        var discount_date_end = elm.parents('tr').find('.discount-date-end');
        var discount_limit_start = elm.parents('tr').find('.discount-limit').attr('data-limitstart');
        var discount_limit_end = elm.parents('tr').find('.discount-limit').attr('data-limitend');
        var discount_take = elm.parents('tr').attr('data-take');
        var discount_option = elm.parents('tr').attr('data-option');
        if($validator.isString(discount_id) === false){return false;}
        var ajaxdata = {
            discount_id: discount_id
        };
        $http.get('admin/discount/detail',ajaxdata).success(function(res){
            $('#discount-modal .lbl-type').text(discount_type_text);
            $('#discount-modal .lbl-title').text(discount_title);
            if(discount_type == 1){
                if(promotion_allow == 1){
                    $('#discount-modal .lbl-promotion').text('Sử dụng chung với chương trình khuyến mãi');
                    $('#discount-modal .lbl-promotion').parent().show();
                }else {
                    $('#discount-modal .lbl-promotion').text('');
                    $('#discount-modal .lbl-promotion').parent().show();
                }
            }else {
                $('#discount-modal .lbl-promotion').text('');
                $('#discount-modal .lbl-promotion').parent().hide();
            }
            
            
            if(discount_status == 'active'){
                discount_status = '<span class="text-success font-weight-bold">Đã kích hoạt</span>';
            }else if(discount_status == 'deactive'){
                discount_status = '<span class="text-primary font-weight-bold">Tạm ngưng</span>';
            }else if(discount_status == 'wating'){
                discount_status = '<span class="text-muted font-weight-bold">Chưa kích hoạt</span>';
            }else{
                discount_status = '<span class="text-danger font-weight-bold">Hết hạn</span>';
            }
            $('#discount-modal .lbl-status').html(discount_status);
            $('#discount-modal .lbl-date-start').html('Bắt đầu khuyến mãi: <strong>'+discount_date_start+'</strong>');
            if(discount_date_end.attr('data-text') > 0){
                $('#discount-modal .lbl-date-end').html('Kết thúc khuyến mãi: <strong>'+discount_date_end.text().trim()+'</strong>');
            }else {
                $('#discount-modal .lbl-date-end').html('<strong>Khuyến mãi không bao giờ hết hạn</strong>');
            }
            if(discount_limit_start===0){
                $('#discount-modal .lbl-limit').html('<strong>Không giới hạn số lần sử dụng</strong>');
            }else {
                $('#discount-modal .lbl-limit').html('Số lần sử dụng khuyến mãi: <strong>'+discount_limit_end+'/'+discount_limit_start+'</strong>');
            }
            if($validator.isResponse(res)){
                var objdata = $php.json_decode(res), text = '';
                
                if(objdata.discount_offer == 1){
                    text = 'tất cả đơn hàng';
                }else if(objdata.discount_offer == 2){
                    text = 'cho đơn hàng từ <strong>'+objdata.money_over+'VND</strong>';
                }else if(objdata.discount_offer == 3){
                    text = 'cho nhóm sản phẩm';
                }else if(objdata.discount_offer == 4){
                    text = 'cho sản phẩm';
                }else if(objdata.discount_offer == 5){
                    text = 'cho nhóm khách hàng';
                }
                if($validator.isString(objdata.relationship_url)){
                    text = text+' <a href="'+objdata.relationship_url+'">'+objdata.relationship_name+'</a>';
                }else {
                    text = text+' <strong>'+objdata.relationship_name+'</strong>';
                }
                if(objdata.discount_type == 1){
                    if(objdata.discount_offer == 3 || objdata.discount_offer == 4 || objdata.discount_offer == 5){
                        if(objdata.offer_option == 1){
                            text = text+' (áp dụng cho đơn hàng)';
                        }else {
                            text = text+' (áp dụng cho từng sản phẩm trong đơn hàng)';
                        }
                    }else if(objdata.discount_offer == 2){
                        text = text+' trở lên';
                    }
                }else {
                    text = text+' khi mua từ '+objdata.offer_option+' sản phẩm trở lên';
                }


                if(discount_option == 'percentage'){
                    discount_option = '%';
                }else {
                    discount_option = ' &#8363;';
                    discount_take = numeral(discount_take).format('0,0');
                }   
                $('#discount-modal .lbl-group-info').html('Giảm <strong>'+discount_take+discount_option+'</strong> '+text);
                $('#discount-modal').modal('show');
            }
        });
    });
    },
    TableSearch: function(elm){
        var $this = $(elm);
        var ajaxdata = {
            discount_status: $('#action_status').val()
        };
        var ajaxurl = $this.parents('form').attr('action');
        Table.Search(ajaxdata,ajaxurl);
    },
};
var Website = Website || {};
Website.Navigation = {
    AddItem: function(elm){
        var $this = elm;
        var type = $this.parents('.collapse-in').attr('data-type');
        var parent =  $this.parents('.collapse-in');
        var checked = [];
        if(!$validator.isString(type)){return;}
        var count = 0, item_html = '', item_id = '', item_url = '', item_text = '',input_url='';
        if(type == 'custom'){
            item_url = parent.find('.custom-url').val();
            if(!$validator.isString(item_url)){return;}
            if($validator.isUrl(item_url) || item_url.indexOf('#') !== -1 || item_url.indexOf('javascript') !== -1){
                input_url = '<div class="form-group"><input type="text" class="form-control" data-type="url" value="'+item_url+'" /></div>';
            }
            item_text = parent.find('.custom-name').val();
            count = 1;
        }else {
            
            parent.find("input:checkbox:checked").each(function(){
                 checked.push($(this).val());
            });
            if(!$validator.isString(checked)){return;}
            count = checked.length;
        }
        if(count > 0){
            var i = 0, id = 3600;
            for (i; i < count; i++) {
                if(type !== 'custom'){
                    item_text = parent.find('li[data-id='+checked[i]+']').attr('data-text');
                    item_id = checked[i];
                    item_url = type+'-'+item_id;
                }
                var menu_id = $php.time() + id;
                if($validator.isString(item_text)){
                    item_html += '<li data-url="'+item_url+'" data-title="'+item_text+'" class="menu-edit-inactive menu-item"><div class="menu-item-bar"><div class="menu-item-handle"><span class="item-title"><span class="menu-item-title">'+item_text+'</span></span><span class="item-controls"><i data-id="'+menu_id+'" class="btn-edit font-icon material-icons">arrow_drop_down</i></span><div id="menu-item-settings-'+menu_id+'" class="menu-item-settings" style="display: none;"><div class="form-group"><input type="text" class="form-control" data-type="title" value="'+item_text+'" /></div>'+input_url+'<button type="button" class="btn btn-link btn-remove text-danger p-a-0" data-id="'+menu_id+'">Xóa mục</button></div></div></div></li>';
                }
                id--;
            }
        }
        $('.navigation-widget input:checkbox').removeAttr('checked');
        $('.navigation-widget input:text').val('');
        $('.menu-sortable').append(item_html);
    },
    SortableItem: function(elm){
        var ns = $('ol.menu-sortable').nestedSortable({
            forcePlaceholderSize: true,
            handle: '.item-title',
            helper: 'clone',
            items: 'li',
            opacity: '.6',
            placeholder: 'placeholder',
            collapsedClass: '.menu-edit-active',
            revert: 250,
            tabSize: 25,
            tolerance: 'pointer',
            toleranceElement: '> div',
            maxLevels: 4,
            isTree: true,
            expandOnHover: 700,
            startCollapsed: false,
            change: function(){
                //console.log('Relocated item');
            }
        });
    },
    RemoveItem: function(elm){
        $('.menu-sortable').on("click",'.btn-remove', function() {
            $(this).parents('.menu-item-bar').parent().remove();
        });
    },
    EditItem: function(elm){
        $('.menu-sortable').on("click",'.btn-edit', function() {
            $(this).parents('.menu-item-handle').find('.menu-item-settings').toggle();
            $(this).parents('.menu-item').toggleClass('menu-edit-inactive').toggleClass('menu-edit-active');
        });
    },
    GetItem: function(item){
        var data = [], i = 0;
        var selector = item.find('> li'), selector_len = selector.length;
        for (i; i < selector_len; i++) {
            data[i] = {};
            data[i].url = $(selector[i]).attr('data-url');
            data[i].title = $(selector[i]).attr('data-title');
            if($(selector[i]).find('> ol').length > 0){
                data[i].sub_menu = Website.Navigation.GetItem($(selector[i]).find('> ol'));
            }
        }
        return data;
    },
    SetItem: function(elm){
        $('.navigation-menu .dropdown-menu-item').on('click', '.dropdown-item', function(e) {
            e.preventDefault();
            var $this = $(this);
            var current_value = $this.parent().parent().find('input[name="select_index"]').val() || 0;
            var current_text = $this.parent().parent().find('button').text().trim() || 'Chưa xác định';
            var value = $this.attr('data-value') || 0;
            var text = $this.text().trim() || 'Chưa xác định';
            $this.parent().parent().find('button').text(text);
            $this.parent().parent().find('input[name="select_index"]').val(value);
            $this.text(current_text);
            $this.attr('data-value',current_value);
        });
    },
    SubmitItem: function (elm) {
        var item = $('.menu-sortable');
        var menu_data = Website.Navigation.GetItem(item);
        var ajaxdata = elm.parents('form').serializeObject();
        ajaxdata._token = $('#page_token').val();
        ajaxdata.menu_data = $php.json_encode(menu_data);
        var ajaxurl = elm.parents('form').attr('action');
        $http.post(ajaxurl,ajaxdata).success(function(res){
            // $alerts.response(res);
        });
    },
    TableAction: function () {
        $('#menu-action-btn').on( "click", function(e) {
            e.preventDefault();
            var ajaxdata = {
                type:'action'
            };
            var ajaxurl = $(this).parents('form').attr('action');
            module.general.ListAction('list',ajaxdata,ajaxurl);
        });
    },
    TableSearch: function () {
        $('#menu-search-btn').on( "click", function(e) {
            e.preventDefault();
            var ajaxdata = {
                type:'search'
            };
            var ajaxurl = $(this).parents('form').attr('action');
            module.general.ListSearch(ajaxdata,ajaxurl);
        });
    },
};
Website.Widget = {
    
};
Website.Widget = {
    
};

Website1 = {
    navigation_Setup: function () {
    	var ns = $('ol.menu-sortable').nestedSortable({
			forcePlaceholderSize: true,
			handle: '.item-title',
			helper:	'clone',
			items: 'li',
			opacity: .6,
			placeholder: 'placeholder',
			collapsedClass: '.menu-item-edit-active',
			revert: 250,
			tabSize: 25,
			tolerance: 'pointer',
			toleranceElement: '> div',
			maxLevels: 4,
			isTree: true,
			expandOnHover: 700,
			startCollapsed: false,
			change: function(){
				//console.log('Relocated item');
			}
		});
		
		$('.menu-sortable').on( "click",'.item-edit', function() {
			var id = $(this).attr('data-id');
			$('#menu-item-settings-'+id).toggle();
			$(this).toggleClass('icon-arrow-up').toggleClass('icon-arrow-down');
			$('#menu-item-'+id).toggleClass('menu-item-edit-inactive').toggleClass('menu-item-edit-active');
		});
		$('.menu-sortable').on( "click",'.item-delete', function() {
			var id = $(this).attr('data-id');
			$('#menu-item-'+id).remove();
		});
    },
    navigation_Add: function () {
    	$('.taxonomy-list-btn').on( "click", function(e) {
    		var taxonomy = $(this).parent().find('.taxonomy-checklist');
            var count = 0, type = '', item_html = '', item_id = '', item_url = '', item_text = '',input_url='';
    		if(taxonomy.length > 0){
	    		var check = module.form.taxonomyCheckbox();
	            if(check == undefined || typeof check == 'undefined' || check == null || check == '')
	                return false;
	            count = check.length;
	     		type = $(this).parent().find('.taxonomy-list').attr('data-type');
    		}else {
    			item_url = $(this).parent().find('.custom-url').val();
    			var RegExp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
    			if(item_url.length > 0 && RegExp.test(item_url)){
    				input_url = '<div class="form-group"><label class="sr-only">Đường dẫn</label><input type="text" placeholder="http://" class="form-control" data-type="url" value="'+item_url+'" /></div>';
    			}else {
    				return false;
    			}
    			item_text = $(this).parent().find('.custom-name').val();
    			count = 1;
    		}
	        var menu_html = $('.menu-sortable').html();
            if(count > 0){
            	for (var i = 0; i < count; i++) {
            		if(taxonomy.length > 0){
            			item_text = taxonomy.find('li[data-id='+check[i]+']').attr('data-text');
            			item_id = check[i];
	           		 	item_url = type+'-'+item_id;
            		}

    				//var menu_id = module.form.randomIntFromInterval(1,99999999);
    				var menu_id = module.php.mt_rand(1,99999999);
    				if(menu_html.indexOf(menu_id) > 0){
    					menu_id = module.php.mt_rand(1,99999999);
    				}
            		if(item_text !== undefined && typeof item_text !== 'undefined' && item_text !== null && item_text !== ''){
            			item_html += '<li id="menu-item-'+menu_id+'" data-url="'+item_url+'" data-title="'+item_text+'" class="menu-item-edit-inactive"><div class="menu-item-bar"><div class="menu-item-handle"><span class="item-title"><span data-id="'+menu_id+'" class="menu-item-title">'+item_text+'</span></span><span class="item-controls"><span data-id="'+menu_id+'" class="item-edit font-icon icon-arrow-up"></span></span><div id="menu-item-settings-'+menu_id+'" class="menu-item-settings" style="display: none;"><div class="form-group"><label class="sr-only">Tên đường dẫn</label><input type="text" placeholder="Tên đường dẫn" class="form-control" data-type="title" value="'+item_text+'" /></div>'+input_url+'<div class="settings-action"><span class="item-delete" data-id="'+menu_id+'"><span class="dashicons dashicons-trash"></span>Xóa mục</span></div></div></div></div></li>';
            		}
            		
            	}
            }
            $('.navigation-widget input:checkbox').removeAttr('checked');
            $('.navigation-widget input:text').val('');
           	$('.menu-sortable').append(item_html);
    	});
    	$('.menu-sortable').on('click','.form-control', function(e) {
	    	$(this).keyup(function() {
				var type = $(this).attr("data-type");
				var text = $(this).val();
				if(type == "url"){
					$(this).parents('li.menu-item-edit-active').attr("data-url",text);
	    		}else if(type == "title"){
	    			$(this).parents('li.menu-item-edit-active').attr("data-title",text);
	    		}
			});
    	});
    },
    // navigation_Data: function (item) {
    // 	var data = [];
    // 	var selector = item.find('> li');
    // 	for (var i = 0; i < selector.length; i++) {
    // 		data[i] = {};
    // 		data[i].url = $(selector[i]).attr('data-url');
    // 		data[i].title = $(selector[i]).attr('data-title');
    // 		if($(selector[i]).find('> ol').length > 0){
    // 			data[i].sub_menu = module.website.navigation_Data($(selector[i]).find('> ol'));
	   //  	}
    // 	}
    // 	return data;
    // },
    navigation_ListAction: function () {
		$('#menu-action-btn').on( "click", function(e) {
			e.preventDefault();
			var ajaxdata = {
		        type:'action'
			}
			var ajaxurl = $(this).parents('form').attr('action');
			module.general.ListAction('list',ajaxdata,ajaxurl);
		});
	},
	navigation_ListSearch: function () {
		$('#menu-search-btn').on( "click", function(e) {
			e.preventDefault();
			var ajaxdata = {
		        type:'search'
			}
			var ajaxurl = $(this).parents('form').attr('action');
			module.general.ListSearch(ajaxdata,ajaxurl);
		});
	},
    navigation_Submit: function () {
    	function navigation_data(item) {
	    	var data = [];
	    	var selector = item.find('> li');
	    	for (var i = 0; i < selector.length; i++) {
	    		data[i] = {};
	    		data[i].url = $(selector[i]).attr('data-url');
	    		data[i].title = $(selector[i]).attr('data-title');
	    		if($(selector[i]).find('> ol').length > 0){
	    			data[i].sub_menu = navigation_data($(selector[i]).find('> ol'));
		    	}
	    	}
	    	return data;
	    }
    	$('#navigation-submit-btn').on( "click", function(e) {
    		e.preventDefault();
    		var title = $('#menu-title').val();
    		if(title == undefined || typeof title == 'undefined' || title == null || title == ''){
    			return false;
    		}
    		var slug = $('#menu-slug').val();
    		if(slug == undefined || typeof slug == 'undefined' || slug == null || slug == ''){
    			slug = '';
    		}
    		var item = $('.menu-sortable');
    		var data_menu = navigation_data(item);
    		var menu = $('#select_index').val();
    		var ajaxurl = $(this).parents('form').attr('action');
    		var ajaxdata = {
    			_token: $('#page_token').val(),
    			title:title,
    			menu:menu,
    			slug:slug,
    			menu_data:module.php.json_encode(data_menu)
    		}
    		var getAjax = module.form.Ajax(ajaxdata,ajaxurl);
    		if(typeof getAjax == 'undefined')
                return false;
            getAjax.success(function(data){
                module.form.responseMessage(data);
            }).complete(function() {
                    
            }).error(function() {
                module.form.Alert('error');
            });
    	});
    },
    init: function () {
    	//module.form.submitDisable('#navigation-form');
        module.Website.navigation_Setup();
        module.Website.navigation_Add();
        module.Website.navigation_Submit();
        //module.website.navigation_ListSearch();
        //module.website.navigation_ListAction();
    }
}
var Setting = Setting || {};
Setting.Shipping = {
    ChangeCriteria: function(elm){
        var $this = $(elm);
        var value = $this.val();
        var type = $this.attr('data-type');
        if(type == 'add'){
            if(value=='price'){
                $this.parents('.shipping-detail').find('.criteria-price').show();
                $this.parents('.shipping-detail').find('.criteria-weight').hide();
            }else {
                $this.parents('.shipping-detail').find('.criteria-price').hide();
                $this.parents('.shipping-detail').find('.criteria-weight').show();
            }
        }else {
            if(value=='price'){
                $this.parents('.modal').find('.criteria-price').show();
                $this.parents('.modal').find('.criteria-weight').hide();
            }else {
                $this.parents('.modal').find('.criteria-price').hide();
                $this.parents('.modal').find('.criteria-weight').show();
            }
        }
    },
    ActiveRate: function(elm){
        var $this = $(elm);
        if($this.is(':checked')){
            $this.parents('tr').find('.district-price').prop('readonly', false);
            $this.parents('tr').find('.have-delivery').show();
            $this.parents('tr').find('.no-delivery').hide();
        }else {
            $this.parents('tr').find('.district-price').prop('readonly', true).val('0').change();
            $this.parents('tr').find('.have-delivery').hide();
            $this.parents('tr').find('.no-delivery').show();
        }
    },
    SetRate: function(elm){
        var $this = $(elm);
        var price = $this.val() || 0;
        var origin_price = $this.parents('.shipping-detail').find('.origin-price').val() || 0;
        var sum_price = 0;
        price = numeral().unformat(price);
        origin_price = numeral().unformat(origin_price);
        sum_price = price + origin_price;
        $this.parents('tr').find('.addition-price').text(numeral(price).format('0,0'));
        $this.parents('tr').find('.sum-price').text(numeral(sum_price).format('0,0'));
        $this.val(numeral($this.val().replace(/\D/g,'')).format('0,0'));
    },
    UpdateRate: function(elm){
        var $this = $(elm);
        console.log(1);
        var shipping_id = $this.parents('.shipping-group').find('.shipping-id').val() || 0;
        var shipping_name = $this.parents('.shipping-group').find('.shipping-name').val() || 0;
        var rate_id = $this.parents('.collapse').find('input[name="rate_id"]').val() || 0;
        var rate_name = $this.parents('.collapse').find('input[name="rate_name"]').val() || '';
        var shipping_price = $this.parents('.collapse').find('input[name="shipping_price"]').val() || 0;
        var shipping_criteria = $this.parents('.collapse').find('select[name="shipping_criteria"]').val() || '';
        var range_from = $this.parents('.collapse').find('input[name="range_from"]').val() || 0;
        var range_to = $this.parents('.collapse').find('input[name="range_to"]').val() || 0;
        var district_shipping_id = [], district_shipping_price = [];
        $this.parents('.collapse').find('input[class="filled-tbl"]').each(function() {
            if($(this).is(':checked')){
                district_shipping_id.push($(this).val());
                district_shipping_price.push(numeral().unformat($(this).parents('tr').find('.district-price').val()));
            }
        });
        var ajaxdata = {
            _token: $('#page_token').val(),
            shipping_id: shipping_id,
            shipping_name: shipping_name,
            rate_id: rate_id,
            rate_name: rate_name,
            shipping_price: shipping_price,
            shipping_criteria: shipping_criteria,
            range_from: range_from,
            range_to: range_to,
            district_shipping_id: district_shipping_id,
            district_shipping_price: district_shipping_price,
        };
        $http.post('admin/setting/shipping/rate/edit/'+shipping_id,ajaxdata).success(function(res){
            if($validator.isResponse(res)){
                var objdata = $php.json_decode(res);
                if(objdata.Response == 'True'){
                    RenderDOM.html('.shipping-setting .shipping-data',$php.urldecode(objdata.Data));
                }else {
                    $alerts.error(objdata.Message,'',true,true);
                }
            }
        });   
    },
    DeleteRate: function(elm){
        var $this = $(elm);
        var shipping_name = $this.parents('.shipping-group').find('.shipping-name').val() || '';
        var rate_name = $this.parents('.shipping-content').find('input[name="rate_name"]').val() || '';
        var rate_id = $this.parents('.shipping-content').find('input[name="rate_id"]').val() || 0;
        swal({
            title: "Xóa tỷ lệ vận chuyển "+shipping_name,
            text: "Bạn có muốn xóa "+rate_name+" khỏi khu vực vận chuyển "+shipping_name,
            type: "warning",
            showCancelButton: true,
            animation: 'none',
            cancelButtonText: "Hủy",
            confirmButtonText: "Đồng ý",
            closeOnConfirm: false,
            showLoaderOnConfirm: false,
        },function(){
            $http.get('admin/setting/shipping/rate/delete/'+rate_id,{}).success(function(res){
                if($validator.isResponse(res)){
                    var objdata = $php.json_decode(res);
                    if(objdata.Response == 'True'){
                        $this.parents('.shipping-content').remove();
                    }
                }
            });   
            swal.close();
        });
    },
    Add: function(elm){
        Modal.FormPost(elm,false,function(objdata){
            RenderDOM.html('.shipping-setting .shipping-data',$php.urldecode(objdata.Data));
        });
    },
    Action: function(elm){
        var $this = $(elm);
        var action = $this.attr('data-action');
        var name = $this.parents('.shipping-group').find('.shipping-name').val() || '';
        var id = $this.parents('.shipping-group').find('.shipping-id').val() || 0;
        if(action == 'remove'){
            swal({
                title: "Bạn có chắc chắn?",
                text: "Bạn có chắc chắn muốn xóa khu vực vận chuyển "+name,
                type: "warning",
                showCancelButton: true,
                animation: 'none',
                cancelButtonText: "Hủy",
                confirmButtonText: "Đồng ý",
                closeOnConfirm: false,
                showLoaderOnConfirm: false,
            },function(){
                $http.get('admin/setting/shipping/delete/'+id,{}).success(function(res){
                    if($validator.isResponse(res)){
                        var objdata = $php.json_decode(res);
                        if(objdata.Response == 'True'){
                            $this.parents('.shipping-group').remove();
                        }
                    }
                });   
                swal.close();
            });
        }else {
            $('#modal-rate').find('form')[0].reset();
            $('#modal-rate').find('form').find('.modal-alerts').html('');
            $('#modal-rate').find('input[name="shipping"]').val(id);
            $('#modal-rate').modal('show');
        }
    }
};
// Setting.Setting = {
//     StopSessionAll: function(elm){
//         swal({
//             title: "Bạn có chắc chắn?",
//             text: "Bạn có chắc chắn muốn yêu cầu tất cả người dùng đăng nhập lại",
//             type: "info",
//             showCancelButton: true,
//             animation: 'none',
//             cancelButtonText: "Hủy",
//             confirmButtonText: "Đồng ý",
//             closeOnConfirm: false,
//             showLoaderOnConfirm: true,
//         },function(){   
//             var ajaxdata = elm.parents('form').serializeObject();
//             var ajaxurl = elm.parents('form').attr('action');
//             $http.post(ajaxurl,ajaxdata).success(function(res){
//                 setTimeout(function(){     
//                     swal.close();
//                     location.reload();
//                 }, 1000);
//             });   
//         });
//     }
// };
// var Setting = Setting || {};
// Setting.Domain = {
//     Add: function(){

//     },
//     Valid: function(){
//         var ajaxurl = elm.parents('form').attr('action');
//         var ajaxdata = elm.parents('form').serializeObject();
//         ajaxdata._token = $('#page_token').val();
//         ajaxdata.order_type = type;
//         $http.post('admin/setting/domains/CheckValidDomain',ajaxdata).success(function(res){
            
//         });
//     },
//     DeleteModal: function(){

//     },
//     Delete: function(){

//     },
//     EditModal: function(){

//     },
//     Edit: function(){

//     },
//     SetPrimary: function(){

//     },
// };
var Post = {
    RemoveImage: function(){
        $('#post-image-thumbnail').hide();
        $('#post-image-thumbnail .image-src').empty();
        $('#post-image-thumbnail input[name="post_image_url"]').val('');
        $('#post-image-thumbnail input[name="post_image_id"]').val('');
        $('#post-image-modal').show();
    },
    // AddCategory: function(){
    //     var data = {
    //         _token: $('#page_token').val(),
    //         submit_type: 'quick_create',
    //         name: $('.new-category').val(),
    //         parent: $('.new-category-parent').val()
    //     };
    //     $http.post('admin/taxonomy/post-category/create',data).success(function(res){
    //         if(!$validator.isResponse(res)){
    //             return;
    //         }
    //         var objdata = $php.json_decode(res);
    //         if(objdata.Response == 'True'){
    //             if($('ul.taxonomy-checklist')[0]){
    //                 var order_arr = [];
    //                 $('ul.taxonomy-checklist li').each(function(idx, obj) {
    //                     order_arr.push($(this).attr('data-order'));
    //                 });
    //                 var order = order_arr.sort(function(a, b){return b-a;});
    //                 $('ul.taxonomy-checklist').prepend('<li data-id="'+objdata.taxonomy_id+'" data-text="'+objdata.taxonomy_name+'" data-order="'+order[0]+'"><input id="cat-'+objdata.taxonomy_id+'" class="filled-in" type="checkbox" name="post_category['+order[0]+']" value="'+objdata.taxonomy_id+'" /><label for="cat-'+objdata.taxonomy_id+'">'+objdata.taxonomy_name+'</label></li>');
    //             }
    //             $('.new-category').val('');
    //             $('.new-category-parent').val('0');
    //         }
    //     });
    // },
    TableSearch: function (elm){
        var user_id = Form.getUrlVars()["user_id"] || 0;
        var ajaxdata = {
            user_id: user_id,
            post_status: $('#action_status').val()
        };
        var ajaxurl = $(elm).parents('form').attr('action');
        Table.Search(ajaxdata,ajaxurl);
    },
};