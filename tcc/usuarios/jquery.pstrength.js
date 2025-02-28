      /**
 * Fonte/Source: http://code.google.com/p/macademia/source/browse/trunk/Macademia/web-app/js/jquery/jquery.pstrength.min.js?spec=svn300&r=251
 * Traduzido por/Translated by: Wallace Silva <contato [at] wallacesilva [dot] com>
 * Edited by: Wallace Silva
 * Last Modified: 24/07/2012
 */
(function(a) {
    a.extend(a.fn, {pstrength:function(b) {
        var b = a.extend({verdects:["Muito fraca","Fraca","Média","Forte","Muito forte"],colors:["#f00","#c06","#f60","#3c0","#3d0"],scores:[10,15,30,40],common:["password","sex","god","123456","123","liverpool","letmein","qwerty","monkey"],minchar:5}, b);
        return this.each(function() {
            var d = a(this).attr("id");
            var c = '<div id="pstrength"><div class="pstrength-minchar" id="' + d + '_minchar"></div><div class="pstrength-info" id="' + d + '_text"></div><div class="pstrength-bar" id="' + d + '_bar" style="border: 1px solid white; font-size: 1px; height: 5px; width: 0px;"></div></div>';
            a(this).after(c);
            a(this).keyup(function() {
                a.fn.runPassword(a(this).val(), d, b)
            })
        })
    },runPassword:function(d, b, e) {
        nPerc = a.fn.checkPassword(d, e);
        var f = "#" + b + "_bar";
        var c = "#" + b + "_text";
        if (nPerc == -200) {
            strColor = "#f00";
            strText = "Senha insegura!";
            a(f).css({width:"0%"})
        } else {
            if (nPerc < 0 && nPerc > -199) {
                strColor = "#ccc";
                strText = "Muito pequena";
                a(f).css({width:"5%"})
            } else {
                if (nPerc <= e.scores[0]) {
                    strColor = e.colors[0];
                    strText = e.verdects[0];
                    a(f).css({width:"10%"})
                } else {
                    if (nPerc > e.scores[0] && nPerc <= e.scores[1]) {
                        strColor = e.colors[1];
                        strText = e.verdects[1];
                        a(f).css({width:"25%"})
                    } else {
                        if (nPerc > e.scores[1] && nPerc <= e.scores[2]) {
                            strColor = e.colors[2];
                            strText = e.verdects[2];
                            a(f).css({width:"50%"})
                        } else {
                            if (nPerc > e.scores[2] && nPerc <= e.scores[3]) {
                                strColor = e.colors[3];
                                strText = e.verdects[3];
                                a(f).css({width:"75%"})
                            } else {
                                strColor = e.colors[4];
                                strText = e.verdects[4];
                                a(f).css({width:"92%"})
                            }
                        }
                    }
                }
            }
        }
        a(f).css({backgroundColor:strColor});
        a(c).html("<span style='color: " + strColor + ";'>" + strText + "</span>")
    },checkPassword:function(e, f) {
        var b = 0;
        var c = f.verdects[0];
        if (e.length < f.minchar) {
            b = (b - 100)
        } else {
            if (e.length >= f.minchar && e.length <= (f.minchar + 2)) {
                b = (b + 6)
            } else {
                if (e.length >= (f.minchar + 3) && e.length <= (f.minchar + 4)) {
                    b = (b + 12)
                } else {
                    if (e.length >= (f.minchar + 5)) {
                        b = (b + 18)
                    }
                }
            }
        }
        if (e.match(/[a-z]/)) {
            b = (b + 1)
        }
        if (e.match(/[A-Z]/)) {
            b = (b + 5)
        }
        if (e.match(/\d+/)) {
            b = (b + 5)
        }
        if (e.match(/(.*[0-9].*[0-9].*[0-9])/)) {
            b = (b + 7)
        }
        if (e.match(/.[!,@,#,$,%,^,&,*,?,_,~]/)) {
            b = (b + 5)
        }
        if (e.match(/(.*[!,@,#,$,%,^,&,*,?,_,~].*[!,@,#,$,%,^,&,*,?,_,~])/)) {
            b = (b + 7)
        }
        if (e.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {
            b = (b + 2)
        }
        if (e.match(/([a-zA-Z])/) && e.match(/([0-9])/)) {
            b = (b + 3)
        }
        if (e.match(/([a-zA-Z0-9].*[!,@,#,$,%,^,&,*,?,_,~])|([!,@,#,$,%,^,&,*,?,_,~].*[a-zA-Z0-9])/)) {
            b = (b + 3)
        }
        for (var d = 0; d < f.common.length; d++) {
            if (e.toLowerCase() == f.common[d]) {
                b = -200
            }
        }
        return b
    }})
})(jQuery);