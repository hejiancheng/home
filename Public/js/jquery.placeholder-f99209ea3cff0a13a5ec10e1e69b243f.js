!function(t,e){t.fn.placeholder=function(o){var l={labelMode:!1,labelStyle:{},labelAlpha:!1,labelAcross:!1},s=t.extend({},l,o||{}),a=function(t,e){""===t.val()?e.css("opacity",.4).html(t.data("placeholder")):e.html("")},c=function(o){if(document.querySelector)return t(o).attr("placeholder");var l;return l=o.getAttributeNode("placeholder"),l&&""!==l.nodeValue?l.nodeValue:e};return t(this).each(function(){var e=t(this),o="placeholder"in document.createElement("input"),l=c(this);if(!(!l||!s.labelMode&&o||s.labelMode&&!s.labelAcross&&o))if(e.data("placeholder",l),s.labelMode){var n=e.attr("id"),i=null;n||(n="placeholder"+Math.random(),e.attr("id",n)),i=t('<label for="'+n+'"></label>').css(t.extend({lineHeight:e.css("lineHeight"),fontSize:e.css("fontSize"),fontWeight:e.css("fontWeight"),position:"absolute",color:e.css("color"),cursor:"text",marginLeft:e.css("marginLeft"),marginTop:e.css("marginTop"),paddingLeft:e.css("paddingLeft"),paddingTop:e.css("paddingTop")},s.labelStyle)).insertBefore(e),s.labelAlpha?(e.bind({focus:function(){a(t(this),i)},input:function(){a(t(this),i)},blur:function(){""===this.value&&i.css("opacity",1).html(l)}}),window.screenX||(e.get(0).onpropertychange=function(t){t=t||window.event,"value"==t.propertyName&&a(e,i)}),i.get(0).oncontextmenu=function(){return e.trigger("focus"),!1}):e.bind({focus:function(){i.html("")},blur:function(){""===t(this).val()&&i.html(l)}}),s.labelAcross&&e.removeAttr("placeholder"),""===e.val()&&i.html(l)}else e.bind({focus:function(){t(this).val()===l&&t(this).val(""),t(this).css("color","")},blur:function(){""===t(this).val()&&t(this).val(l).css("color",t(this).css("color"))}}),""===e.val()&&e.val(l).css("color",e.css("color"))}),t(this)}}(jQuery),$(document).ready(function(){$("input[placeholder]").not("[type=password]").placeholder({labelMode:!1}),$("input[placeholder][type=password]").placeholder({labelMode:!0}),$(document).delegate("[type=submit]","click",function(){var t=$(this).closest("form").find("input[placeholder]").not("[type=password]").each(function(){var t=$(this).attr("placeholder");$(this).val()===t&&$(this).val(""),$(this).css("color","")});setTimeout(function(){t.each(function(){var t=$(this).attr("placeholder");""===$(this).val()&&$(this).val(t).css("color",$(this).css("color"))})},100)}),$(document).delegate("form","submit",function(){var t=$(this).find("input[placeholder]").not("[type=password]").each(function(){var t=$(this).attr("placeholder");$(this).val()===t&&$(this).val(""),$(this).css("color","")});setTimeout(function(){t.each(function(){var t=$(this).attr("placeholder");""===$(this).val()&&$(this).val(t).css("color",$(this).css("color"))})},100)})});