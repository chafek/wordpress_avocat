"use strict";!function(r){r.fn.LineProgressbar=function(t){return t=r.extend({percentage:100,ShowProgressCount:!0,duration:1e3,unit:"%",animation:!0,radius:"0px",height:"10px",width:"100%",transform:"rotate(180deg)"},t),r.options=t,this.each((function(e,n){void 0===r(n).data("progress-init")&&r(n).data("progress-init",t.percentage),r(n).data("progress-init")===t.percentage&&r(n).html('<div class="progressbar"><div class="progress"></div><div class="percentCount"></div></div>');var i=r(n).find(".progress"),o=r(n).find(".progressbar");i.css({backgroundColor:t.fillBackgroundColor,width:t.width,borderRadius:t.radius}),o.css({height:t.height,backgroundColor:t.backgroundColor,borderRadius:t.radius,transform:t.transform}),t.animation?i.animate({height:t.percentage+"%"},{step:function(e){t.ShowProgressCount&&r(n).find(".percentCount").text(Math.round(e)+t.unit)},duration:t.duration}):(i.css("height",t.percentage+"%"),r(n).find(".percentCount").text(Math.round(t.percentage)+"%"))}))}}(jQuery);