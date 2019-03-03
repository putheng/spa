var StackedMenu=function(){'use strict';var t=function(t){this.options={compact:!1,hoverable:!1,closeOther:!0,align:'right',selector:'#stacked-menu',selectorClass:'stacked-menu'},this.options=this._extend({},this.options,t),this.selector=document.querySelector(this.options.selector),this.items=this.selector?this.selector.querySelectorAll('.menu-item'):null,Array.prototype.forEach||(Array.prototype.forEach=function(t,e){if('function'!=typeof t)throw new TypeError(t+' is not a function');var s=this;e=e||this;for(var i=0;i<s.length;i++)t.call(e,s[i],i,s)}),this.each=Array.prototype.forEach,this.classes={alignLeft:this.options.selectorClass+'-has-left',compact:this.options.selectorClass+'-has-compact',collapsible:this.options.selectorClass+'-has-collapsible',hoverable:this.options.selectorClass+'-has-hoverable',hasChild:'has-child',hasActive:'has-active',hasOpen:'has-open'},this.active=null,this.open=[],this.turbolinksAvailable='object'==typeof window.Turbolinks&&window.Turbolinks.supported,this.handlerClickDoc=[],this.handlerOver=[],this.handlerOut=[],this.handlerClick=[],this.init()};return t.prototype._onReady=function(t){'loading'!=document.readyState?t():document.addEventListener('DOMContentLoaded',t,!1)},t.prototype._handleNavigation=function(t){t.each.call(this.items,function(e){t._on(e,'click',function(s){s.stopPropagation(),t.turbolinksAvailable&&s.preventDefault(),t._hasChild(e)?t.turbolinksAvailable||s.preventDefault():t.turbolinksAvailable&&window.Turbolinks.visit(e.firstElementChild.href)})})},t.prototype._extend=function(t){t=t||{};for(var e=arguments,s=1;s<e.length;s++)if(e[s])for(var i in e[s])e[s].hasOwnProperty(i)&&(t[i]=e[s][i]);return t},t.prototype._emit=function(t,e){var s;document.createEvent?(s=document.createEvent('Event')).initEvent(t,!0,!0):(s=document.createEventObject()).eventType=t,s.eventName=t,s.data=e||this,document.createEvent?this.selector.dispatchEvent(s):this.selector.fireEvent('on'+t,s)},t.prototype._hover=function(t,e,s){'A'===t.tagName?(this._on(t,'focus',e),this._on(t,'blur',s)):(this._on(t,'mouseover',e),this._on(t,'mouseout',s))},t.prototype._on=function(t,e,s){for(var i=e.split(' '),o=0;o<i.length;o++)t[window.addEventListener?'addEventListener':'attachEvent'](window.addEventListener?i[o]:'on'+i[o],s,!1)},t.prototype._off=function(t,e,s){for(var i=e.split(' '),o=0;o<i.length;o++)t[window.removeEventListener?'removeEventListener':'detachEvent'](window.removeEventListener?i[o]:'on'+i[o],s,!1)},t.prototype._addClass=function(t,e){for(var s=e.split(' '),i=0;i<s.length;i++)t.classList?t.classList.add(s[i]):t.classes[i]+=' '+s[i]},t.prototype._removeClass=function(t,e){for(var s=e.split(' '),i=0;i<s.length;i++)t.classList?t.classList.remove(s[i]):t.classes[i]=t.classes[i].replace(new RegExp('(^|\\b)'+s[i].split(' ').join('|')+'(\\b|$)','gi'),' ')},t.prototype._hasClass=function(t,e){return t.classList?t.classList.contains(e):new RegExp('(^| )'+e+'( |$)','gi').test(t.className)},t.prototype._hasChild=function(t){return this._hasClass(t,this.classes.hasChild)},t.prototype._hasActive=function(t){return this._hasClass(t,this.classes.hasActive)},t.prototype._hasOpen=function(t){return this._hasClass(t,this.classes.hasOpen)},t.prototype._isLevelMenu=function(t){return this._hasClass(t.parentNode.parentNode,this.options.selectorClass)},t.prototype._menuTrigger=function(t,e){var s=t.querySelector('a');this._off(t,'mouseover',this.handlerOver[e]),this._off(t,'mouseout',this.handlerOut[e]),this._off(s,'focus',this.handlerOver[e]),this._off(s,'blur',this.handlerOut[e]),this._off(t,'click',this.handlerClick[e]),this.handlerOver[e]=this.openMenu.bind(this,t),this.handlerOut[e]=this.closeMenu.bind(this,t),this.handlerClick[e]=this.toggleMenu.bind(this,t),this.isHoverable()?this._hasChild(t)&&(this._hover(t,this.handlerOver[e],this.handlerOut[e]),this._hover(s,this.handlerOver[e],this.handlerOut[e])):this._on(t,'click',this.handlerClick[e])},t.prototype._handleInteractions=function(t){var e=this;this.each.call(t,function(t,s){e._hasChild(t)&&e._menuTrigger(t,s),e._hasActive(t)&&(e.active=t)})},t.prototype._getSubhead=function(t){return t.querySelector('.menu-text').textContent},t.prototype._generateSubhead=function(){var t,e,s,i,o=this,n=this.selector.children;this.each.call(n,function(n){o.each.call(n.children,function(n){o._hasChild(n)&&(o.each.call(n.children,function(e){o._hasClass(e,'menu-link')&&(t=e)}),e=t.nextElementSibling,s=document.createElement('li'),i=document.createTextNode(o._getSubhead(t)),s.appendChild(i),o._addClass(s,'menu-subhead'),e.insertBefore(s,e.firstChild))})})},t.prototype._handleTabIndex=function(){var t=this;this.each.call(this.items,function(e){var s=e.parentNode.parentNode;t._isLevelMenu(e)||e.querySelector('a').setAttribute('tabindex','-1'),(t._hasActive(s)||t._hasOpen(s))&&e.querySelector('a').removeAttribute('tabindex')})},t.prototype._slide=function(t,e,s,i){s=s||300,i=i||'ease';var o=this,n=t.querySelector('.menu'),a=window.getComputedStyle(t).height,h=s+50,l=h+100;if(n.style.transition='height '+s+'ms '+i+', opacity '+s/2+'ms '+i+', visibility '+s/2+'ms '+i,'down'===e){t.style.overflow='hidden',t.style.height=a,n.style.height='auto';var r=window.getComputedStyle(n).height;n.style.height=0,n.style.visibility='hidden',n.style.opacity=0,t.style.overflow='',t.style.height='',setTimeout(function(){n.style.height=r,n.style.opacity=1,n.style.visibility='visible'},0)}else if('up'===e){var c=window.getComputedStyle(n).height;n.style.height=c,n.style.visibility='visible',n.style.opacity=1,setTimeout(function(){n.style.height=0,n.style.visibility='hidden',n.style.opacity=0},0)}var u=new Promise(function(s){setTimeout(function(){s(t),o._emit('menu:slide'+e)},h)});return setTimeout(function(){n.removeAttribute('style')},l),u},t.prototype.init=function(){var t=this,e=this.options;this._addClass(this.selector,e.selectorClass),this._generateSubhead(),this.compact(e.compact),this.hoverable(e.hoverable),this._handleTabIndex(),this._handleNavigation(t),this._on(document.body,'click',function(){!t.isHoverable()&&t.isCompact()&&t.closeAllMenu()}),this._onReady(function(){t._emit('menu:init')})},t.prototype.openMenu=function(t,e){if(void 0===e&&(e=!0),!this._hasActive(t)||this.isCompact()){var s=this,i=this._isLevelMenu(t)&&this.isCompact();if(this.isHoverable()||i?(this._addClass(t,this.classes.hasOpen),this._handleTabIndex()):this._slide(t,'down',150,'linear').then(function(){s._addClass(t,s.classes.hasOpen),s._handleTabIndex()}),this.open.push(t),this.isHoverable()||this.isCompact()&&!this.hoverable()){var o=document.documentElement.clientHeight,n=t.querySelector('.menu'),a=n.getBoundingClientRect(),h=a.height-20,l=o-a.top,r='left'===this.options.align?'100%':'0px';(a.top>=500||h>=l)&&(n.style.top='auto',n.style.bottom=0,n.style.transformOrigin=r+' 100% 0')}return e&&this._emit('menu:open'),this}},t.prototype.closeMenu=function(t,e){void 0===e&&(e=!0);var s=this,i=this._isLevelMenu(t)&&this.isCompact();if(this.isHoverable()||i?(this._removeClass(t,this.classes.hasOpen),this._handleTabIndex()):this._hasActive(t)||this._slide(t,'up',150,'linear').then(function(){s._removeClass(t,s.classes.hasOpen),s._handleTabIndex()}),this.each.call(this.open,function(e,i){t==e&&s.open.splice(i,1)}),this.isHoverable()||this.isCompact()&&!this.hoverable()){var o=t.querySelector('.menu');o.style.top='',o.style.bottom='',o.style.transformOrigin=''}return e&&this._emit('menu:close'),this},t.prototype.closeAllMenu=function(){var t=this;return this.each.call(this.items,function(e){t._hasOpen(e)&&t.closeMenu(e,!1)}),this},t.prototype.toggleMenu=function(t){var e,s,i=this._hasOpen(t)?'closeMenu':'openMenu',o=this;return this.each.call(this.items,function(i){e=i.parentNode.parentNode,e=o._hasClass(e,'menu-item')?e:e.parentNode,s=t.parentNode.parentNode,s=o._hasClass(s,'menu-item')?s:s.parentNode,!o._hasOpen(s)&&o._hasChild(e)&&(o.options.closeOther||!o.options.closeOther&&o.isCompact())&&o._hasOpen(e)&&o.closeMenu(e,!1)}),this._hasChild(t)&&this[i](t),this},t.prototype.align=function(t){var e='left'===t?'_addClass':'_removeClass',s=this.classes;return this[e](this.selector,s.alignLeft),this.options.align=t,this._emit('menu:align'),this},t.prototype.isCompact=function(){return this.options.compact},t.prototype.compact=function(t){var e=t?'_addClass':'_removeClass',s=this.classes;return this[e](this.selector,s.compact),this.options.compact=t,this._handleInteractions(this.items),this._emit('menu:compact'),this},t.prototype.isHoverable=function(){return this.options.hoverable},t.prototype.hoverable=function(t){var e=this.classes;return t?(this._addClass(this.selector,e.hoverable),this._removeClass(this.selector,e.collapsible)):(this._addClass(this.selector,e.collapsible),this._removeClass(this.selector,e.hoverable)),this.options.hoverable=t,this._handleInteractions(this.items),this._emit('menu:hoverable'),this},t}();

//# sourceMappingURL=stacked-menu.min.js.map