function change_alias(n) {
    var t = n;
    return t = t.toLowerCase(), t = t.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a"), t = t.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e"), t = t.replace(/ì|í|ị|ỉ|ĩ/g, "i"), t = t.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o"), t = t.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u"), t = t.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y"), t = t.replace(/đ/g, "d"), t = t.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|\$|_|`|-|{|}|\||\\/g, " "), t = t.replace(/ + /g, " "), t.trim()
}

function change_alias2(n) {
    var t = n;
    return t = t.toLowerCase(), t = t.replace(/ /g, "+"), t.trim()
}

function remove_unicode(n) {
    return n = n.toLowerCase(), n = n.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a"), n = n.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e"), n = n.replace(/ì|í|ị|ỉ|ĩ/g, "i"), n = n.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o"), n = n.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u"), n = n.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y"), n = n.replace(/đ/g, "d"), n = n.replace(/!|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g, "-"), n = n.replace(/-+-/g, "-"), n.replace(/^\-+|\-+$/g, "")
}
if (function(n, t) {
        function gt(n) {
            var t = n.length,
                r = i.type(n);
            return i.isWindow(n) ? !1 : 1 === n.nodeType && t ? !0 : "array" === r || "function" !== r && (0 === t || "number" == typeof t && t > 0 && t - 1 in n)
        }

        function te(n) {
            var t = ni[n] = {};
            return i.each(n.match(s) || [], function(n, i) {
                t[i] = !0
            }), t
        }

        function ur(n, r, u, f) {
            if (i.acceptData(n)) {
                var h, o, c = i.expando,
                    l = n.nodeType,
                    s = l ? i.cache : n,
                    e = l ? n[c] : n[c] && c;
                if (e && s[e] && (f || s[e].data) || u !== t || "string" != typeof r) return e || (e = l ? n[c] = b.pop() || i.guid++ : c), s[e] || (s[e] = l ? {} : {
                    toJSON: i.noop
                }), ("object" == typeof r || "function" == typeof r) && (f ? s[e] = i.extend(s[e], r) : s[e].data = i.extend(s[e].data, r)), o = s[e], f || (o.data || (o.data = {}), o = o.data), u !== t && (o[i.camelCase(r)] = u), "string" == typeof r ? (h = o[r], null == h && (h = o[i.camelCase(r)])) : h = o, h
            }
        }

        function fr(n, t, r) {
            if (i.acceptData(n)) {
                var e, o, s = n.nodeType,
                    u = s ? i.cache : n,
                    f = s ? n[i.expando] : i.expando;
                if (u[f]) {
                    if (t && (e = r ? u[f] : u[f].data)) {
                        for (i.isArray(t) ? t = t.concat(i.map(t, i.camelCase)) : (t in e) ? t = [t] : (t = i.camelCase(t), t = (t in e) ? [t] : t.split(" ")), o = t.length; o--;) delete e[t[o]];
                        if (r ? !ti(e) : !i.isEmptyObject(e)) return
                    }(r || (delete u[f].data, ti(u[f]))) && (s ? i.cleanData([n], !0) : i.support.deleteExpando || u != u.window ? delete u[f] : u[f] = null)
                }
            }
        }

        function er(n, r, u) {
            if (u === t && 1 === n.nodeType) {
                var f = "data-" + r.replace(rr, "-$1").toLowerCase();
                if (u = n.getAttribute(f), "string" == typeof u) {
                    try {
                        u = "true" === u ? !0 : "false" === u ? !1 : "null" === u ? null : +u + "" === u ? +u : ir.test(u) ? i.parseJSON(u) : u
                    } catch (e) {}
                    i.data(n, r, u)
                } else u = t
            }
            return u
        }

        function ti(n) {
            var t;
            for (t in n)
                if (("data" !== t || !i.isEmptyObject(n[t])) && "toJSON" !== t) return !1;
            return !0
        }

        function ct() {
            return !0
        }

        function g() {
            return !1
        }

        function cr() {
            try {
                return r.activeElement
            } catch (n) {}
        }

        function ar(n, t) {
            do n = n[t]; while (n && 1 !== n.nodeType);
            return n
        }

        function fi(n, t, r) {
            if (i.isFunction(t)) return i.grep(n, function(n, i) {
                return !!t.call(n, i, n) !== r
            });
            if (t.nodeType) return i.grep(n, function(n) {
                return n === t !== r
            });
            if ("string" == typeof t) {
                if (oe.test(t)) return i.filter(t, n, r);
                t = i.filter(t, n)
            }
            return i.grep(n, function(n) {
                return i.inArray(n, t) >= 0 !== r
            })
        }

        function vr(n) {
            var i = yr.split("|"),
                t = n.createDocumentFragment();
            if (t.createElement)
                while (i.length) t.createElement(i.pop());
            return t
        }

        function gr(n, t) {
            return i.nodeName(n, "table") && i.nodeName(1 === t.nodeType ? t : t.firstChild, "tr") ? n.getElementsByTagName("tbody")[0] || n.appendChild(n.ownerDocument.createElement("tbody")) : n
        }

        function nu(n) {
            return n.type = (null !== i.find.attr(n, "type")) + "/" + n.type, n
        }

        function tu(n) {
            var t = ye.exec(n.type);
            return t ? n.type = t[1] : n.removeAttribute("type"), n
        }

        function hi(n, t) {
            for (var u, r = 0; null != (u = n[r]); r++) i._data(u, "globalEval", !t || i._data(t[r], "globalEval"))
        }

        function iu(n, t) {
            if (1 === t.nodeType && i.hasData(n)) {
                var u, f, o, s = i._data(n),
                    r = i._data(t, s),
                    e = s.events;
                if (e) {
                    delete r.handle;
                    r.events = {};
                    for (u in e)
                        for (f = 0, o = e[u].length; o > f; f++) i.event.add(t, u, e[u][f])
                }
                r.data && (r.data = i.extend({}, r.data))
            }
        }

        function be(n, t) {
            var r, f, u;
            if (1 === t.nodeType) {
                if (r = t.nodeName.toLowerCase(), !i.support.noCloneEvent && t[i.expando]) {
                    u = i._data(t);
                    for (f in u.events) i.removeEvent(t, f, u.handle);
                    t.removeAttribute(i.expando)
                }
                "script" === r && t.text !== n.text ? (nu(t).text = n.text, tu(t)) : "object" === r ? (t.parentNode && (t.outerHTML = n.outerHTML), i.support.html5Clone && n.innerHTML && !i.trim(t.innerHTML) && (t.innerHTML = n.innerHTML)) : "input" === r && oi.test(n.type) ? (t.defaultChecked = t.checked = n.checked, t.value !== n.value && (t.value = n.value)) : "option" === r ? t.defaultSelected = t.selected = n.defaultSelected : ("input" === r || "textarea" === r) && (t.defaultValue = n.defaultValue)
            }
        }

        function u(n, r) {
            var s, e, h = 0,
                f = typeof n.getElementsByTagName !== o ? n.getElementsByTagName(r || "*") : typeof n.querySelectorAll !== o ? n.querySelectorAll(r || "*") : t;
            if (!f)
                for (f = [], s = n.childNodes || n; null != (e = s[h]); h++) !r || i.nodeName(e, r) ? f.push(e) : i.merge(f, u(e, r));
            return r === t || r && i.nodeName(n, r) ? i.merge([n], f) : f
        }

        function ke(n) {
            oi.test(n.type) && (n.defaultChecked = n.checked)
        }

        function ou(n, t) {
            if (t in n) return t;
            for (var r = t.charAt(0).toUpperCase() + t.slice(1), u = t, i = eu.length; i--;)
                if (t = eu[i] + r, t in n) return t;
            return u
        }

        function ut(n, t) {
            return n = t || n, "none" === i.css(n, "display") || !i.contains(n.ownerDocument, n)
        }

        function su(n, t) {
            for (var f, r, o, e = [], u = 0, s = n.length; s > u; u++) r = n[u], r.style && (e[u] = i._data(r, "olddisplay"), f = r.style.display, t ? (e[u] || "none" !== f || (r.style.display = ""), "" === r.style.display && ut(r) && (e[u] = i._data(r, "olddisplay", au(r.nodeName)))) : e[u] || (o = ut(r), (f && "none" !== f || !o) && i._data(r, "olddisplay", o ? f : i.css(r, "display"))));
            for (u = 0; s > u; u++) r = n[u], r.style && (t && "none" !== r.style.display && "" !== r.style.display || (r.style.display = t ? e[u] || "" : "none"));
            return n
        }

        function hu(n, t, i) {
            var r = to.exec(t);
            return r ? Math.max(0, r[1] - (i || 0)) + (r[2] || "px") : t
        }

        function cu(n, t, r, u, f) {
            for (var e = r === (u ? "border" : "content") ? 4 : "width" === t ? 1 : 0, o = 0; 4 > e; e += 2) "margin" === r && (o += i.css(n, r + p[e], !0, f)), u ? ("content" === r && (o -= i.css(n, "padding" + p[e], !0, f)), "margin" !== r && (o -= i.css(n, "border" + p[e] + "Width", !0, f))) : (o += i.css(n, "padding" + p[e], !0, f), "padding" !== r && (o += i.css(n, "border" + p[e] + "Width", !0, f)));
            return o
        }

        function lu(n, t, r) {
            var e = !0,
                u = "width" === t ? n.offsetWidth : n.offsetHeight,
                f = v(n),
                o = i.support.boxSizing && "border-box" === i.css(n, "boxSizing", !1, f);
            if (0 >= u || null == u) {
                if (u = y(n, t, f), (0 > u || null == u) && (u = n.style[t]), lt.test(u)) return u;
                e = o && (i.support.boxSizingReliable || u === n.style[t]);
                u = parseFloat(u) || 0
            }
            return u + cu(n, t, r || (o ? "border" : "content"), e, f) + "px"
        }

        function au(n) {
            var u = r,
                t = uu[n];
            return t || (t = vu(n, u), "none" !== t && t || (rt = (rt || i("<iframe frameborder='0' width='0' height='0'/>").css("cssText", "display:block !important")).appendTo(u.documentElement), u = (rt[0].contentWindow || rt[0].contentDocument).document, u.write("<!doctype html><html><body>"), u.close(), t = vu(n, u), rt.detach()), uu[n] = t), t
        }

        function vu(n, t) {
            var r = i(t.createElement(n)).appendTo(t.body),
                u = i.css(r[0], "display");
            return r.remove(), u
        }

        function li(n, t, r, u) {
            var f;
            if (i.isArray(t)) i.each(t, function(t, i) {
                r || fo.test(n) ? u(n, i) : li(n + "[" + ("object" == typeof i ? t : "") + "]", i, r, u)
            });
            else if (r || "object" !== i.type(t)) u(n, t);
            else
                for (f in t) li(n + "[" + f + "]", t[f], r, u)
        }

        function gu(n) {
            return function(t, r) {
                "string" != typeof t && (r = t, t = "*");
                var u, f = 0,
                    e = t.toLowerCase().match(s) || [];
                if (i.isFunction(r))
                    while (u = e[f++]) "+" === u[0] ? (u = u.slice(1) || "*", (n[u] = n[u] || []).unshift(r)) : (n[u] = n[u] || []).push(r)
            }
        }

        function nf(n, r, u, f) {
            function o(h) {
                var c;
                return e[h] = !0, i.each(n[h] || [], function(n, i) {
                    var h = i(r, u, f);
                    return "string" != typeof h || s || e[h] ? s ? !(c = h) : t : (r.dataTypes.unshift(h), o(h), !1)
                }), c
            }
            var e = {},
                s = n === yi;
            return o(r.dataTypes[0]) || !e["*"] && o("*")
        }

        function pi(n, r) {
            var f, u, e = i.ajaxSettings.flatOptions || {};
            for (u in r) r[u] !== t && ((e[u] ? n : f || (f = {}))[u] = r[u]);
            return f && i.extend(!0, n, f), n
        }

        function ao(n, i, r) {
            for (var s, o, f, e, h = n.contents, u = n.dataTypes;
                "*" === u[0];) u.shift(), o === t && (o = n.mimeType || i.getResponseHeader("Content-Type"));
            if (o)
                for (e in h)
                    if (h[e] && h[e].test(o)) {
                        u.unshift(e);
                        break
                    }
            if (u[0] in r) f = u[0];
            else {
                for (e in r) {
                    if (!u[0] || n.converters[e + " " + u[0]]) {
                        f = e;
                        break
                    }
                    s || (s = e)
                }
                f = f || s
            }
            return f ? (f !== u[0] && u.unshift(f), r[f]) : t
        }

        function vo(n, t, i, r) {
            var h, u, f, s, e, o = {},
                c = n.dataTypes.slice();
            if (c[1])
                for (f in n.converters) o[f.toLowerCase()] = n.converters[f];
            for (u = c.shift(); u;)
                if (n.responseFields[u] && (i[n.responseFields[u]] = t), !e && r && n.dataFilter && (t = n.dataFilter(t, n.dataType)), e = u, u = c.shift())
                    if ("*" === u) u = e;
                    else if ("*" !== e && e !== u) {
                if (f = o[e + " " + u] || o["* " + u], !f)
                    for (h in o)
                        if (s = h.split(" "), s[1] === u && (f = o[e + " " + s[0]] || o["* " + s[0]])) {
                            f === !0 ? f = o[h] : o[h] !== !0 && (u = s[0], c.unshift(s[1]));
                            break
                        }
                if (f !== !0)
                    if (f && n.throws) t = f(t);
                    else try {
                        t = f(t)
                    } catch (l) {
                        return {
                            state: "parsererror",
                            error: f ? l : "No conversion from " + e + " to " + u
                        }
                    }
            }
            return {
                state: "success",
                data: t
            }
        }

        function rf() {
            try {
                return new n.XMLHttpRequest
            } catch (t) {}
        }

        function yo() {
            try {
                return new n.ActiveXObject("Microsoft.XMLHTTP")
            } catch (t) {}
        }

        function ff() {
            return setTimeout(function() {
                it = t
            }), it = i.now()
        }

        function ef(n, t, i) {
            for (var u, f = (ft[t] || []).concat(ft["*"]), r = 0, e = f.length; e > r; r++)
                if (u = f[r].call(i, t, n)) return u
        }

        function of(n, t, r) {
            var h, e, o = 0,
                l = pt.length,
                f = i.Deferred().always(function() {
                    delete c.elem
                }),
                c = function() {
                    if (e) return !1;
                    for (var s = it || ff(), t = Math.max(0, u.startTime + u.duration - s), h = t / u.duration || 0, i = 1 - h, r = 0, o = u.tweens.length; o > r; r++) u.tweens[r].run(i);
                    return f.notifyWith(n, [u, i, t]), 1 > i && o ? t : (f.resolveWith(n, [u]), !1)
                },
                u = f.promise({
                    elem: n,
                    props: i.extend({}, t),
                    opts: i.extend(!0, {
                        specialEasing: {}
                    }, r),
                    originalProperties: t,
                    originalOptions: r,
                    startTime: it || ff(),
                    duration: r.duration,
                    tweens: [],
                    createTween: function(t, r) {
                        var f = i.Tween(n, u.opts, t, r, u.opts.specialEasing[t] || u.opts.easing);
                        return u.tweens.push(f), f
                    },
                    stop: function(t) {
                        var i = 0,
                            r = t ? u.tweens.length : 0;
                        if (e) return this;
                        for (e = !0; r > i; i++) u.tweens[i].run(1);
                        return t ? f.resolveWith(n, [u, t]) : f.rejectWith(n, [u, t]), this
                    }
                }),
                s = u.props;
            for (bo(s, u.opts.specialEasing); l > o; o++)
                if (h = pt[o].call(u, n, s, u.opts)) return h;
            return i.map(s, ef, u), i.isFunction(u.opts.start) && u.opts.start.call(n, u), i.fx.timer(i.extend(c, {
                elem: n,
                anim: u,
                queue: u.opts.queue
            })), u.progress(u.opts.progress).done(u.opts.done, u.opts.complete).fail(u.opts.fail).always(u.opts.always)
        }

        function bo(n, t) {
            var r, f, e, u, o;
            for (r in n)
                if (f = i.camelCase(r), e = t[f], u = n[r], i.isArray(u) && (e = u[1], u = n[r] = u[0]), r !== f && (n[f] = u, delete n[r]), o = i.cssHooks[f], o && "expand" in o) {
                    u = o.expand(u);
                    delete n[f];
                    for (r in u) r in n || (n[r] = u[r], t[r] = e)
                } else t[f] = e
        }

        function ko(n, t, r) {
            var u, a, v, c, e, y, s = this,
                l = {},
                o = n.style,
                h = n.nodeType && ut(n),
                f = i._data(n, "fxshow");
            r.queue || (e = i._queueHooks(n, "fx"), null == e.unqueued && (e.unqueued = 0, y = e.empty.fire, e.empty.fire = function() {
                e.unqueued || y()
            }), e.unqueued++, s.always(function() {
                s.always(function() {
                    e.unqueued--;
                    i.queue(n, "fx").length || e.empty.fire()
                })
            }));
            1 === n.nodeType && ("height" in t || "width" in t) && (r.overflow = [o.overflow, o.overflowX, o.overflowY], "inline" === i.css(n, "display") && "none" === i.css(n, "float") && (i.support.inlineBlockNeedsLayout && "inline" !== au(n.nodeName) ? o.zoom = 1 : o.display = "inline-block"));
            r.overflow && (o.overflow = "hidden", i.support.shrinkWrapBlocks || s.always(function() {
                o.overflow = r.overflow[0];
                o.overflowX = r.overflow[1];
                o.overflowY = r.overflow[2]
            }));
            for (u in t)
                if (a = t[u], po.exec(a)) {
                    if (delete t[u], v = v || "toggle" === a, a === (h ? "hide" : "show")) continue;
                    l[u] = f && f[u] || i.style(n, u)
                }
            if (!i.isEmptyObject(l)) {
                f ? "hidden" in f && (h = f.hidden) : f = i._data(n, "fxshow", {});
                v && (f.hidden = !h);
                h ? i(n).show() : s.done(function() {
                    i(n).hide()
                });
                s.done(function() {
                    var t;
                    i._removeData(n, "fxshow");
                    for (t in l) i.style(n, t, l[t])
                });
                for (u in l) c = ef(h ? f[u] : 0, u, s), u in f || (f[u] = c.start, h && (c.end = c.start, c.start = "width" === u || "height" === u ? 1 : 0))
            }
        }

        function f(n, t, i, r, u) {
            return new f.prototype.init(n, t, i, r, u)
        }

        function wt(n, t) {
            var r, i = {
                    height: n
                },
                u = 0;
            for (t = t ? 1 : 0; 4 > u; u += 2 - t) r = p[u], i["margin" + r] = i["padding" + r] = n;
            return t && (i.opacity = i.width = n), i
        }

        function sf(n) {
            return i.isWindow(n) ? n : 9 === n.nodeType ? n.defaultView || n.parentWindow : !1
        }
        var et, bi, o = typeof t,
            hf = n.location,
            r = n.document,
            ki = r.documentElement,
            cf = n.jQuery,
            lf = n.$,
            ot = {},
            b = [],
            bt = "1.10.2",
            di = b.concat,
            kt = b.push,
            l = b.slice,
            gi = b.indexOf,
            af = ot.toString,
            k = ot.hasOwnProperty,
            dt = bt.trim,
            i = function(n, t) {
                return new i.fn.init(n, t, bi)
            },
            st = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,
            s = /\S+/g,
            vf = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,
            yf = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]*))$/,
            nr = /^<(\w+)\s*\/?>(?:<\/\1>|)$/,
            pf = /^[\],:{}\s]*$/,
            wf = /(?:^|:|,)(?:\s*\[)+/g,
            bf = /\\(?:["\\\/bfnrt]|u[\da-fA-F]{4})/g,
            kf = /"[^"\\\r\n]*"|true|false|null|-?(?:\d+\.|)\d+(?:[eE][+-]?\d+|)/g,
            df = /^-ms-/,
            gf = /-([\da-z])/gi,
            ne = function(n, t) {
                return t.toUpperCase()
            },
            h = function(n) {
                (r.addEventListener || "load" === n.type || "complete" === r.readyState) && (tr(), i.ready())
            },
            tr = function() {
                r.addEventListener ? (r.removeEventListener("DOMContentLoaded", h, !1), n.removeEventListener("load", h, !1)) : (r.detachEvent("onreadystatechange", h), n.detachEvent("onload", h))
            },
            ni, ir, rr, wi, at, nt, tt, tf, vt;
        i.fn = i.prototype = {
            jquery: bt,
            constructor: i,
            init: function(n, u, f) {
                var e, o;
                if (!n) return this;
                if ("string" == typeof n) {
                    if (e = "<" === n.charAt(0) && ">" === n.charAt(n.length - 1) && n.length >= 3 ? [null, n, null] : yf.exec(n), !e || !e[1] && u) return !u || u.jquery ? (u || f).find(n) : this.constructor(u).find(n);
                    if (e[1]) {
                        if (u = u instanceof i ? u[0] : u, i.merge(this, i.parseHTML(e[1], u && u.nodeType ? u.ownerDocument || u : r, !0)), nr.test(e[1]) && i.isPlainObject(u))
                            for (e in u) i.isFunction(this[e]) ? this[e](u[e]) : this.attr(e, u[e]);
                        return this
                    }
                    if (o = r.getElementById(e[2]), o && o.parentNode) {
                        if (o.id !== e[2]) return f.find(n);
                        this.length = 1;
                        this[0] = o
                    }
                    return this.context = r, this.selector = n, this
                }
                return n.nodeType ? (this.context = this[0] = n, this.length = 1, this) : i.isFunction(n) ? f.ready(n) : (n.selector !== t && (this.selector = n.selector, this.context = n.context), i.makeArray(n, this))
            },
            selector: "",
            length: 0,
            toArray: function() {
                return l.call(this)
            },
            get: function(n) {
                return null == n ? this.toArray() : 0 > n ? this[this.length + n] : this[n]
            },
            pushStack: function(n) {
                var t = i.merge(this.constructor(), n);
                return t.prevObject = this, t.context = this.context, t
            },
            each: function(n, t) {
                return i.each(this, n, t)
            },
            ready: function(n) {
                return i.ready.promise().done(n), this
            },
            slice: function() {
                return this.pushStack(l.apply(this, arguments))
            },
            first: function() {
                return this.eq(0)
            },
            last: function() {
                return this.eq(-1)
            },
            eq: function(n) {
                var i = this.length,
                    t = +n + (0 > n ? i : 0);
                return this.pushStack(t >= 0 && i > t ? [this[t]] : [])
            },
            map: function(n) {
                return this.pushStack(i.map(this, function(t, i) {
                    return n.call(t, i, t)
                }))
            },
            end: function() {
                return this.prevObject || this.constructor(null)
            },
            push: kt,
            sort: [].sort,
            splice: [].splice
        };
        i.fn.init.prototype = i.fn;
        i.extend = i.fn.extend = function() {
            var u, o, r, e, s, h, n = arguments[0] || {},
                f = 1,
                l = arguments.length,
                c = !1;
            for ("boolean" == typeof n && (c = n, n = arguments[1] || {}, f = 2), "object" == typeof n || i.isFunction(n) || (n = {}), l === f && (n = this, --f); l > f; f++)
                if (null != (s = arguments[f]))
                    for (e in s) u = n[e], r = s[e], n !== r && (c && r && (i.isPlainObject(r) || (o = i.isArray(r))) ? (o ? (o = !1, h = u && i.isArray(u) ? u : []) : h = u && i.isPlainObject(u) ? u : {}, n[e] = i.extend(c, h, r)) : r !== t && (n[e] = r));
            return n
        };
        i.extend({
            expando: "jQuery" + (bt + Math.random()).replace(/\D/g, ""),
            noConflict: function(t) {
                return n.$ === i && (n.$ = lf), t && n.jQuery === i && (n.jQuery = cf), i
            },
            isReady: !1,
            readyWait: 1,
            holdReady: function(n) {
                n ? i.readyWait++ : i.ready(!0)
            },
            ready: function(n) {
                if (n === !0 ? !--i.readyWait : !i.isReady) {
                    if (!r.body) return setTimeout(i.ready);
                    i.isReady = !0;
                    n !== !0 && --i.readyWait > 0 || (et.resolveWith(r, [i]), i.fn.trigger && i(r).trigger("ready").off("ready"))
                }
            },
            isFunction: function(n) {
                return "function" === i.type(n)
            },
            isArray: Array.isArray || function(n) {
                return "array" === i.type(n)
            },
            isWindow: function(n) {
                return null != n && n == n.window
            },
            isNumeric: function(n) {
                return !isNaN(parseFloat(n)) && isFinite(n)
            },
            type: function(n) {
                return null == n ? n + "" : "object" == typeof n || "function" == typeof n ? ot[af.call(n)] || "object" : typeof n
            },
            isPlainObject: function(n) {
                var r;
                if (!n || "object" !== i.type(n) || n.nodeType || i.isWindow(n)) return !1;
                try {
                    if (n.constructor && !k.call(n, "constructor") && !k.call(n.constructor.prototype, "isPrototypeOf")) return !1
                } catch (u) {
                    return !1
                }
                if (i.support.ownLast)
                    for (r in n) return k.call(n, r);
                for (r in n);
                return r === t || k.call(n, r)
            },
            isEmptyObject: function(n) {
                var t;
                for (t in n) return !1;
                return !0
            },
            error: function(n) {
                throw Error(n);
            },
            parseHTML: function(n, t, u) {
                if (!n || "string" != typeof n) return null;
                "boolean" == typeof t && (u = t, t = !1);
                t = t || r;
                var f = nr.exec(n),
                    e = !u && [];
                return f ? [t.createElement(f[1])] : (f = i.buildFragment([n], t, e), e && i(e).remove(), i.merge([], f.childNodes))
            },
            parseJSON: function(r) {
                return n.JSON && n.JSON.parse ? n.JSON.parse(r) : null === r ? r : "string" == typeof r && (r = i.trim(r), r && pf.test(r.replace(bf, "@").replace(kf, "]").replace(wf, ""))) ? Function("return " + r)() : (i.error("Invalid JSON: " + r), t)
            },
            parseXML: function(r) {
                var u, f;
                if (!r || "string" != typeof r) return null;
                try {
                    n.DOMParser ? (f = new DOMParser, u = f.parseFromString(r, "text/xml")) : (u = new ActiveXObject("Microsoft.XMLDOM"), u.async = "false", u.loadXML(r))
                } catch (e) {
                    u = t
                }
                return u && u.documentElement && !u.getElementsByTagName("parsererror").length || i.error("Invalid XML: " + r), u
            },
            noop: function() {},
            globalEval: function(t) {
                t && i.trim(t) && (n.execScript || function(t) {
                    n.eval.call(n, t)
                })(t)
            },
            camelCase: function(n) {
                return n.replace(df, "ms-").replace(gf, ne)
            },
            nodeName: function(n, t) {
                return n.nodeName && n.nodeName.toLowerCase() === t.toLowerCase()
            },
            each: function(n, t, i) {
                var u, r = 0,
                    f = n.length,
                    e = gt(n);
                if (i) {
                    if (e) {
                        for (; f > r; r++)
                            if (u = t.apply(n[r], i), u === !1) break
                    } else
                        for (r in n)
                            if (u = t.apply(n[r], i), u === !1) break
                } else if (e) {
                    for (; f > r; r++)
                        if (u = t.call(n[r], r, n[r]), u === !1) break
                } else
                    for (r in n)
                        if (u = t.call(n[r], r, n[r]), u === !1) break; return n
            },
            trim: dt && !dt.call("﻿ ") ? function(n) {
                return null == n ? "" : dt.call(n)
            } : function(n) {
                return null == n ? "" : (n + "").replace(vf, "")
            },
            makeArray: function(n, t) {
                var r = t || [];
                return null != n && (gt(Object(n)) ? i.merge(r, "string" == typeof n ? [n] : n) : kt.call(r, n)), r
            },
            inArray: function(n, t, i) {
                var r;
                if (t) {
                    if (gi) return gi.call(t, n, i);
                    for (r = t.length, i = i ? 0 > i ? Math.max(0, r + i) : i : 0; r > i; i++)
                        if (i in t && t[i] === n) return i
                }
                return -1
            },
            merge: function(n, i) {
                var f = i.length,
                    u = n.length,
                    r = 0;
                if ("number" == typeof f)
                    for (; f > r; r++) n[u++] = i[r];
                else
                    while (i[r] !== t) n[u++] = i[r++];
                return n.length = u, n
            },
            grep: function(n, t, i) {
                var u, f = [],
                    r = 0,
                    e = n.length;
                for (i = !!i; e > r; r++) u = !!t(n[r], r), i !== u && f.push(n[r]);
                return f
            },
            map: function(n, t, i) {
                var u, r = 0,
                    e = n.length,
                    o = gt(n),
                    f = [];
                if (o)
                    for (; e > r; r++) u = t(n[r], r, i), null != u && (f[f.length] = u);
                else
                    for (r in n) u = t(n[r], r, i), null != u && (f[f.length] = u);
                return di.apply([], f)
            },
            guid: 1,
            proxy: function(n, r) {
                var f, u, e;
                return "string" == typeof r && (e = n[r], r = n, n = e), i.isFunction(n) ? (f = l.call(arguments, 2), u = function() {
                    return n.apply(r || this, f.concat(l.call(arguments)))
                }, u.guid = n.guid = n.guid || i.guid++, u) : t
            },
            access: function(n, r, u, f, e, o, s) {
                var h = 0,
                    l = n.length,
                    c = null == u;
                if ("object" === i.type(u)) {
                    e = !0;
                    for (h in u) i.access(n, r, h, u[h], !0, o, s)
                } else if (f !== t && (e = !0, i.isFunction(f) || (s = !0), c && (s ? (r.call(n, f), r = null) : (c = r, r = function(n, t, r) {
                        return c.call(i(n), r)
                    })), r))
                    for (; l > h; h++) r(n[h], u, s ? f : f.call(n[h], h, r(n[h], u)));
                return e ? n : c ? r.call(n) : l ? r(n[0], u) : o
            },
            now: function() {
                return (new Date).getTime()
            },
            swap: function(n, t, i, r) {
                var f, u, e = {};
                for (u in t) e[u] = n.style[u], n.style[u] = t[u];
                f = i.apply(n, r || []);
                for (u in t) n.style[u] = e[u];
                return f
            }
        });
        i.ready.promise = function(t) {
            if (!et)
                if (et = i.Deferred(), "complete" === r.readyState) setTimeout(i.ready);
                else if (r.addEventListener) r.addEventListener("DOMContentLoaded", h, !1), n.addEventListener("load", h, !1);
            else {
                r.attachEvent("onreadystatechange", h);
                n.attachEvent("onload", h);
                var u = !1;
                try {
                    u = null == n.frameElement && r.documentElement
                } catch (e) {}
                u && u.doScroll && function f() {
                    if (!i.isReady) {
                        try {
                            u.doScroll("left")
                        } catch (n) {
                            return setTimeout(f, 50)
                        }
                        tr();
                        i.ready()
                    }
                }()
            }
            return et.promise(t)
        };
        i.each("Boolean Number String Function Array Date RegExp Object Error".split(" "), function(n, t) {
            ot["[object " + t + "]"] = t.toLowerCase()
        });
        bi = i(r),
            function(n, t) {
                function u(n, t, i, r) {
                    var p, u, f, l, w, a, k, c, g, d;
                    if ((t ? t.ownerDocument || t : y) !== s && nt(t), t = t || s, i = i || [], !n || "string" != typeof n) return i;
                    if (1 !== (l = t.nodeType) && 9 !== l) return [];
                    if (v && !r) {
                        if (p = or.exec(n))
                            if (f = p[1]) {
                                if (9 === l) {
                                    if (u = t.getElementById(f), !u || !u.parentNode) return i;
                                    if (u.id === f) return i.push(u), i
                                } else if (t.ownerDocument && (u = t.ownerDocument.getElementById(f)) && ot(t, u) && u.id === f) return i.push(u), i
                            } else {
                                if (p[2]) return b.apply(i, t.getElementsByTagName(n)), i;
                                if ((f = p[3]) && e.getElementsByClassName && t.getElementsByClassName) return b.apply(i, t.getElementsByClassName(f)), i
                            }
                        if (e.qsa && (!h || !h.test(n))) {
                            if (c = k = o, g = t, d = 9 === l && n, 1 === l && "object" !== t.nodeName.toLowerCase()) {
                                for (a = pt(n), (k = t.getAttribute("id")) ? c = k.replace(cr, "\\$&") : t.setAttribute("id", c), c = "[id='" + c + "'] ", w = a.length; w--;) a[w] = c + wt(a[w]);
                                g = ti.test(n) && t.parentNode || t;
                                d = a.join(",")
                            }
                            if (d) try {
                                return b.apply(i, g.querySelectorAll(d)), i
                            } catch (tt) {} finally {
                                k || t.removeAttribute("id")
                            }
                        }
                    }
                    return pr(n.replace(vt, "$1"), t, i, r)
                }

                function ri() {
                    function n(i, u) {
                        return t.push(i += " ") > r.cacheLength && delete n[t.shift()], n[i] = u
                    }
                    var t = [];
                    return n
                }

                function c(n) {
                    return n[o] = !0, n
                }

                function l(n) {
                    var t = s.createElement("div");
                    try {
                        return !!n(t)
                    } catch (i) {
                        return !1
                    } finally {
                        t.parentNode && t.parentNode.removeChild(t);
                        t = null
                    }
                }

                function ui(n, t) {
                    for (var u = n.split("|"), i = n.length; i--;) r.attrHandle[u[i]] = t
                }

                function bi(n, t) {
                    var i = t && n,
                        r = i && 1 === n.nodeType && 1 === t.nodeType && (~t.sourceIndex || vi) - (~n.sourceIndex || vi);
                    if (r) return r;
                    if (i)
                        while (i = i.nextSibling)
                            if (i === t) return -1;
                    return n ? 1 : -1
                }

                function lr(n) {
                    return function(t) {
                        var i = t.nodeName.toLowerCase();
                        return "input" === i && t.type === n
                    }
                }

                function ar(n) {
                    return function(t) {
                        var i = t.nodeName.toLowerCase();
                        return ("input" === i || "button" === i) && t.type === n
                    }
                }

                function rt(n) {
                    return c(function(t) {
                        return t = +t, c(function(i, r) {
                            for (var u, f = n([], i.length, t), e = f.length; e--;) i[u = f[e]] && (i[u] = !(r[u] = i[u]))
                        })
                    })
                }

                function ki() {}

                function pt(n, t) {
                    var e, f, s, o, i, h, c, l = li[n + " "];
                    if (l) return t ? 0 : l.slice(0);
                    for (i = n, h = [], c = r.preFilter; i;) {
                        (!e || (f = ir.exec(i))) && (f && (i = i.slice(f[0].length) || i), h.push(s = []));
                        e = !1;
                        (f = rr.exec(i)) && (e = f.shift(), s.push({
                            value: e,
                            type: f[0].replace(vt, " ")
                        }), i = i.slice(e.length));
                        for (o in r.filter)(f = yt[o].exec(i)) && (!c[o] || (f = c[o](f))) && (e = f.shift(), s.push({
                            value: e,
                            type: o,
                            matches: f
                        }), i = i.slice(e.length));
                        if (!e) break
                    }
                    return t ? i.length : i ? u.error(n) : li(n, h).slice(0)
                }

                function wt(n) {
                    for (var t = 0, r = n.length, i = ""; r > t; t++) i += n[t].value;
                    return i
                }

                function fi(n, t, i) {
                    var r = t.dir,
                        u = i && "parentNode" === r,
                        f = di++;
                    return t.first ? function(t, i, f) {
                        while (t = t[r])
                            if (1 === t.nodeType || u) return n(t, i, f)
                    } : function(t, i, e) {
                        var h, s, c, l = p + " " + f;
                        if (e) {
                            while (t = t[r])
                                if ((1 === t.nodeType || u) && n(t, i, e)) return !0
                        } else
                            while (t = t[r])
                                if (1 === t.nodeType || u)
                                    if (c = t[o] || (t[o] = {}), (s = c[r]) && s[0] === l) {
                                        if ((h = s[1]) === !0 || h === ht) return h === !0
                                    } else if (s = c[r] = [l], s[1] = n(t, i, e) || ht, s[1] === !0) return !0
                    }
                }

                function ei(n) {
                    return n.length > 1 ? function(t, i, r) {
                        for (var u = n.length; u--;)
                            if (!n[u](t, i, r)) return !1;
                        return !0
                    } : n[0]
                }

                function bt(n, t, i, r, u) {
                    for (var e, o = [], f = 0, s = n.length, h = null != t; s > f; f++)(e = n[f]) && (!i || i(e, r, u)) && (o.push(e), h && t.push(f));
                    return o
                }

                function oi(n, t, i, r, u, f) {
                    return r && !r[o] && (r = oi(r)), u && !u[o] && (u = oi(u, f)), c(function(f, e, o, s) {
                        var l, c, a, p = [],
                            y = [],
                            w = e.length,
                            k = f || yr(t || "*", o.nodeType ? [o] : o, []),
                            v = !n || !f && t ? k : bt(k, p, n, o, s),
                            h = i ? u || (f ? n : w || r) ? [] : e : v;
                        if (i && i(v, h, o, s), r)
                            for (l = bt(h, y), r(l, [], o, s), c = l.length; c--;)(a = l[c]) && (h[y[c]] = !(v[y[c]] = a));
                        if (f) {
                            if (u || n) {
                                if (u) {
                                    for (l = [], c = h.length; c--;)(a = h[c]) && l.push(v[c] = a);
                                    u(null, h = [], l, s)
                                }
                                for (c = h.length; c--;)(a = h[c]) && (l = u ? it.call(f, a) : p[c]) > -1 && (f[l] = !(e[l] = a))
                            }
                        } else h = bt(h === e ? h.splice(w, h.length) : h), u ? u(null, e, h, s) : b.apply(e, h)
                    })
                }

                function si(n) {
                    for (var s, u, i, e = n.length, h = r.relative[n[0].type], c = h || r.relative[" "], t = h ? 1 : 0, l = fi(function(n) {
                            return n === s
                        }, c, !0), a = fi(function(n) {
                            return it.call(s, n) > -1
                        }, c, !0), f = [function(n, t, i) {
                            return !h && (i || t !== lt) || ((s = t).nodeType ? l(n, t, i) : a(n, t, i))
                        }]; e > t; t++)
                        if (u = r.relative[n[t].type]) f = [fi(ei(f), u)];
                        else {
                            if (u = r.filter[n[t].type].apply(null, n[t].matches), u[o]) {
                                for (i = ++t; e > i; i++)
                                    if (r.relative[n[i].type]) break;
                                return oi(t > 1 && ei(f), t > 1 && wt(n.slice(0, t - 1).concat({
                                    value: " " === n[t - 2].type ? "*" : ""
                                })).replace(vt, "$1"), u, i > t && si(n.slice(t, i)), e > i && si(n = n.slice(i)), e > i && wt(n))
                            }
                            f.push(u)
                        }
                    return ei(f)
                }

                function vr(n, t) {
                    var f = 0,
                        i = t.length > 0,
                        e = n.length > 0,
                        o = function(o, h, c, l, a) {
                            var y, g, k, w = [],
                                d = 0,
                                v = "0",
                                nt = o && [],
                                tt = null != a,
                                it = lt,
                                ut = o || e && r.find.TAG("*", a && h.parentNode || h),
                                rt = p += null == it ? 1 : Math.random() || .1;
                            for (tt && (lt = h !== s && h, ht = f); null != (y = ut[v]); v++) {
                                if (e && y) {
                                    for (g = 0; k = n[g++];)
                                        if (k(y, h, c)) {
                                            l.push(y);
                                            break
                                        }
                                    tt && (p = rt, ht = ++f)
                                }
                                i && ((y = !k && y) && d--, o && nt.push(y))
                            }
                            if (d += v, i && v !== d) {
                                for (g = 0; k = t[g++];) k(nt, w, h, c);
                                if (o) {
                                    if (d > 0)
                                        while (v--) nt[v] || w[v] || (w[v] = nr.call(l));
                                    w = bt(w)
                                }
                                b.apply(l, w);
                                tt && !o && w.length > 0 && d + t.length > 1 && u.uniqueSort(l)
                            }
                            return tt && (p = rt, lt = it), nt
                        };
                    return i ? c(o) : o
                }

                function yr(n, t, i) {
                    for (var r = 0, f = t.length; f > r; r++) u(n, t[r], i);
                    return i
                }

                function pr(n, t, i, u) {
                    var s, f, o, c, l, h = pt(n);
                    if (!u && 1 === h.length) {
                        if (f = h[0] = h[0].slice(0), f.length > 2 && "ID" === (o = f[0]).type && e.getById && 9 === t.nodeType && v && r.relative[f[1].type]) {
                            if (t = (r.find.ID(o.matches[0].replace(k, d), t) || [])[0], !t) return i;
                            n = n.slice(f.shift().value.length)
                        }
                        for (s = yt.needsContext.test(n) ? 0 : f.length; s--;) {
                            if (o = f[s], r.relative[c = o.type]) break;
                            if ((l = r.find[c]) && (u = l(o.matches[0].replace(k, d), ti.test(f[0].type) && t.parentNode || t))) {
                                if (f.splice(s, 1), n = u.length && wt(f), !n) return b.apply(i, u), i;
                                break
                            }
                        }
                    }
                    return kt(n, h)(u, t, !v, i, ti.test(n)), i
                }
                var ut, e, ht, r, ct, hi, kt, lt, g, nt, s, a, v, h, tt, at, ot, o = "sizzle" + -new Date,
                    y = n.document,
                    p = 0,
                    di = 0,
                    ci = ri(),
                    li = ri(),
                    ai = ri(),
                    ft = !1,
                    dt = function(n, t) {
                        return n === t ? (ft = !0, 0) : 0
                    },
                    st = typeof t,
                    vi = -2147483648,
                    gi = {}.hasOwnProperty,
                    w = [],
                    nr = w.pop,
                    tr = w.push,
                    b = w.push,
                    yi = w.slice,
                    it = w.indexOf || function(n) {
                        for (var t = 0, i = this.length; i > t; t++)
                            if (this[t] === n) return t;
                        return -1
                    },
                    gt = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",
                    f = "[\\x20\\t\\r\\n\\f]",
                    et = "(?:\\\\.|[\\w-]|[^\\x00-\\xa0])+",
                    pi = et.replace("w", "w#"),
                    wi = "\\[" + f + "*(" + et + ")" + f + "*(?:([*^$|!~]?=)" + f + "*(?:(['\"])((?:\\\\.|[^\\\\])*?)\\3|(" + pi + ")|)|)" + f + "*\\]",
                    ni = ":(" + et + ")(?:\\(((['\"])((?:\\\\.|[^\\\\])*?)\\3|((?:\\\\.|[^\\\\()[\\]]|" + wi.replace(3, 8) + ")*)|.*)\\)|)",
                    vt = RegExp("^" + f + "+|((?:^|[^\\\\])(?:\\\\.)*)" + f + "+$", "g"),
                    ir = RegExp("^" + f + "*," + f + "*"),
                    rr = RegExp("^" + f + "*([>+~]|" + f + ")" + f + "*"),
                    ti = RegExp(f + "*[+~]"),
                    ur = RegExp("=" + f + "*([^\\]'\"]*)" + f + "*\\]", "g"),
                    fr = RegExp(ni),
                    er = RegExp("^" + pi + "$"),
                    yt = {
                        ID: RegExp("^#(" + et + ")"),
                        CLASS: RegExp("^\\.(" + et + ")"),
                        TAG: RegExp("^(" + et.replace("w", "w*") + ")"),
                        ATTR: RegExp("^" + wi),
                        PSEUDO: RegExp("^" + ni),
                        CHILD: RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + f + "*(even|odd|(([+-]|)(\\d*)n|)" + f + "*(?:([+-]|)" + f + "*(\\d+)|))" + f + "*\\)|)", "i"),
                        bool: RegExp("^(?:" + gt + ")$", "i"),
                        needsContext: RegExp("^" + f + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + f + "*((?:-\\d)?\\d*)" + f + "*\\)|)(?=[^-]|$)", "i")
                    },
                    ii = /^[^{]+\{\s*\[native \w/,
                    or = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,
                    sr = /^(?:input|select|textarea|button)$/i,
                    hr = /^h\d$/i,
                    cr = /'|\\/g,
                    k = RegExp("\\\\([\\da-f]{1,6}" + f + "?|(" + f + ")|.)", "ig"),
                    d = function(n, t, i) {
                        var r = "0x" + t - 65536;
                        return r !== r || i ? t : 0 > r ? String.fromCharCode(r + 65536) : String.fromCharCode(55296 | r >> 10, 56320 | 1023 & r)
                    };
                try {
                    b.apply(w = yi.call(y.childNodes), y.childNodes);
                    w[y.childNodes.length].nodeType
                } catch (wr) {
                    b = {
                        apply: w.length ? function(n, t) {
                            tr.apply(n, yi.call(t))
                        } : function(n, t) {
                            for (var i = n.length, r = 0; n[i++] = t[r++];);
                            n.length = i - 1
                        }
                    }
                }
                hi = u.isXML = function(n) {
                    var t = n && (n.ownerDocument || n).documentElement;
                    return t ? "HTML" !== t.nodeName : !1
                };
                e = u.support = {};
                nt = u.setDocument = function(n) {
                    var i = n ? n.ownerDocument || n : y,
                        u = i.defaultView;
                    return i !== s && 9 === i.nodeType && i.documentElement ? (s = i, a = i.documentElement, v = !hi(i), u && u.attachEvent && u !== u.top && u.attachEvent("onbeforeunload", function() {
                        nt()
                    }), e.attributes = l(function(n) {
                        return n.className = "i", !n.getAttribute("className")
                    }), e.getElementsByTagName = l(function(n) {
                        return n.appendChild(i.createComment("")), !n.getElementsByTagName("*").length
                    }), e.getElementsByClassName = l(function(n) {
                        return n.innerHTML = "<div class='a'><\/div><div class='a i'><\/div>", n.firstChild.className = "i", 2 === n.getElementsByClassName("i").length
                    }), e.getById = l(function(n) {
                        return a.appendChild(n).id = o, !i.getElementsByName || !i.getElementsByName(o).length
                    }), e.getById ? (r.find.ID = function(n, t) {
                        if (typeof t.getElementById !== st && v) {
                            var i = t.getElementById(n);
                            return i && i.parentNode ? [i] : []
                        }
                    }, r.filter.ID = function(n) {
                        var t = n.replace(k, d);
                        return function(n) {
                            return n.getAttribute("id") === t
                        }
                    }) : (delete r.find.ID, r.filter.ID = function(n) {
                        var t = n.replace(k, d);
                        return function(n) {
                            var i = typeof n.getAttributeNode !== st && n.getAttributeNode("id");
                            return i && i.value === t
                        }
                    }), r.find.TAG = e.getElementsByTagName ? function(n, i) {
                        return typeof i.getElementsByTagName !== st ? i.getElementsByTagName(n) : t
                    } : function(n, t) {
                        var i, r = [],
                            f = 0,
                            u = t.getElementsByTagName(n);
                        if ("*" === n) {
                            while (i = u[f++]) 1 === i.nodeType && r.push(i);
                            return r
                        }
                        return u
                    }, r.find.CLASS = e.getElementsByClassName && function(n, i) {
                        return typeof i.getElementsByClassName !== st && v ? i.getElementsByClassName(n) : t
                    }, tt = [], h = [], (e.qsa = ii.test(i.querySelectorAll)) && (l(function(n) {
                        n.innerHTML = "<select><option selected=''><\/option><\/select>";
                        n.querySelectorAll("[selected]").length || h.push("\\[" + f + "*(?:value|" + gt + ")");
                        n.querySelectorAll(":checked").length || h.push(":checked")
                    }), l(function(n) {
                        var t = i.createElement("input");
                        t.setAttribute("type", "hidden");
                        n.appendChild(t).setAttribute("t", "");
                        n.querySelectorAll("[t^='']").length && h.push("[*^$]=" + f + "*(?:''|\"\")");
                        n.querySelectorAll(":enabled").length || h.push(":enabled", ":disabled");
                        n.querySelectorAll("*,:x");
                        h.push(",.*:")
                    })), (e.matchesSelector = ii.test(at = a.webkitMatchesSelector || a.mozMatchesSelector || a.oMatchesSelector || a.msMatchesSelector)) && l(function(n) {
                        e.disconnectedMatch = at.call(n, "div");
                        at.call(n, "[s!='']:x");
                        tt.push("!=", ni)
                    }), h = h.length && RegExp(h.join("|")), tt = tt.length && RegExp(tt.join("|")), ot = ii.test(a.contains) || a.compareDocumentPosition ? function(n, t) {
                        var r = 9 === n.nodeType ? n.documentElement : n,
                            i = t && t.parentNode;
                        return n === i || !(!i || 1 !== i.nodeType || !(r.contains ? r.contains(i) : n.compareDocumentPosition && 16 & n.compareDocumentPosition(i)))
                    } : function(n, t) {
                        if (t)
                            while (t = t.parentNode)
                                if (t === n) return !0;
                        return !1
                    }, dt = a.compareDocumentPosition ? function(n, t) {
                        if (n === t) return ft = !0, 0;
                        var r = t.compareDocumentPosition && n.compareDocumentPosition && n.compareDocumentPosition(t);
                        return r ? 1 & r || !e.sortDetached && t.compareDocumentPosition(n) === r ? n === i || ot(y, n) ? -1 : t === i || ot(y, t) ? 1 : g ? it.call(g, n) - it.call(g, t) : 0 : 4 & r ? -1 : 1 : n.compareDocumentPosition ? -1 : 1
                    } : function(n, t) {
                        var r, u = 0,
                            o = n.parentNode,
                            s = t.parentNode,
                            f = [n],
                            e = [t];
                        if (n === t) return ft = !0, 0;
                        if (!o || !s) return n === i ? -1 : t === i ? 1 : o ? -1 : s ? 1 : g ? it.call(g, n) - it.call(g, t) : 0;
                        if (o === s) return bi(n, t);
                        for (r = n; r = r.parentNode;) f.unshift(r);
                        for (r = t; r = r.parentNode;) e.unshift(r);
                        while (f[u] === e[u]) u++;
                        return u ? bi(f[u], e[u]) : f[u] === y ? -1 : e[u] === y ? 1 : 0
                    }, i) : s
                };
                u.matches = function(n, t) {
                    return u(n, null, null, t)
                };
                u.matchesSelector = function(n, t) {
                    if ((n.ownerDocument || n) !== s && nt(n), t = t.replace(ur, "='$1']"), !(!e.matchesSelector || !v || tt && tt.test(t) || h && h.test(t))) try {
                        var i = at.call(n, t);
                        if (i || e.disconnectedMatch || n.document && 11 !== n.document.nodeType) return i
                    } catch (r) {}
                    return u(t, s, null, [n]).length > 0
                };
                u.contains = function(n, t) {
                    return (n.ownerDocument || n) !== s && nt(n), ot(n, t)
                };
                u.attr = function(n, i) {
                    (n.ownerDocument || n) !== s && nt(n);
                    var f = r.attrHandle[i.toLowerCase()],
                        u = f && gi.call(r.attrHandle, i.toLowerCase()) ? f(n, i, !v) : t;
                    return u === t ? e.attributes || !v ? n.getAttribute(i) : (u = n.getAttributeNode(i)) && u.specified ? u.value : null : u
                };
                u.error = function(n) {
                    throw Error("Syntax error, unrecognized expression: " + n);
                };
                u.uniqueSort = function(n) {
                    var r, u = [],
                        t = 0,
                        i = 0;
                    if (ft = !e.detectDuplicates, g = !e.sortStable && n.slice(0), n.sort(dt), ft) {
                        while (r = n[i++]) r === n[i] && (t = u.push(i));
                        while (t--) n.splice(u[t], 1)
                    }
                    return n
                };
                ct = u.getText = function(n) {
                    var r, i = "",
                        u = 0,
                        t = n.nodeType;
                    if (t) {
                        if (1 === t || 9 === t || 11 === t) {
                            if ("string" == typeof n.textContent) return n.textContent;
                            for (n = n.firstChild; n; n = n.nextSibling) i += ct(n)
                        } else if (3 === t || 4 === t) return n.nodeValue
                    } else
                        for (; r = n[u]; u++) i += ct(r);
                    return i
                };
                r = u.selectors = {
                    cacheLength: 50,
                    createPseudo: c,
                    match: yt,
                    attrHandle: {},
                    find: {},
                    relative: {
                        ">": {
                            dir: "parentNode",
                            first: !0
                        },
                        " ": {
                            dir: "parentNode"
                        },
                        "+": {
                            dir: "previousSibling",
                            first: !0
                        },
                        "~": {
                            dir: "previousSibling"
                        }
                    },
                    preFilter: {
                        ATTR: function(n) {
                            return n[1] = n[1].replace(k, d), n[3] = (n[4] || n[5] || "").replace(k, d), "~=" === n[2] && (n[3] = " " + n[3] + " "), n.slice(0, 4)
                        },
                        CHILD: function(n) {
                            return n[1] = n[1].toLowerCase(), "nth" === n[1].slice(0, 3) ? (n[3] || u.error(n[0]), n[4] = +(n[4] ? n[5] + (n[6] || 1) : 2 * ("even" === n[3] || "odd" === n[3])), n[5] = +(n[7] + n[8] || "odd" === n[3])) : n[3] && u.error(n[0]), n
                        },
                        PSEUDO: function(n) {
                            var r, i = !n[5] && n[2];
                            return yt.CHILD.test(n[0]) ? null : (n[3] && n[4] !== t ? n[2] = n[4] : i && fr.test(i) && (r = pt(i, !0)) && (r = i.indexOf(")", i.length - r) - i.length) && (n[0] = n[0].slice(0, r), n[2] = i.slice(0, r)), n.slice(0, 3))
                        }
                    },
                    filter: {
                        TAG: function(n) {
                            var t = n.replace(k, d).toLowerCase();
                            return "*" === n ? function() {
                                return !0
                            } : function(n) {
                                return n.nodeName && n.nodeName.toLowerCase() === t
                            }
                        },
                        CLASS: function(n) {
                            var t = ci[n + " "];
                            return t || (t = RegExp("(^|" + f + ")" + n + "(" + f + "|$)")) && ci(n, function(n) {
                                return t.test("string" == typeof n.className && n.className || typeof n.getAttribute !== st && n.getAttribute("class") || "")
                            })
                        },
                        ATTR: function(n, t, i) {
                            return function(r) {
                                var f = u.attr(r, n);
                                return null == f ? "!=" === t : t ? (f += "", "=" === t ? f === i : "!=" === t ? f !== i : "^=" === t ? i && 0 === f.indexOf(i) : "*=" === t ? i && f.indexOf(i) > -1 : "$=" === t ? i && f.slice(-i.length) === i : "~=" === t ? (" " + f + " ").indexOf(i) > -1 : "|=" === t ? f === i || f.slice(0, i.length + 1) === i + "-" : !1) : !0
                            }
                        },
                        CHILD: function(n, t, i, r, u) {
                            var s = "nth" !== n.slice(0, 3),
                                e = "last" !== n.slice(-4),
                                f = "of-type" === t;
                            return 1 === r && 0 === u ? function(n) {
                                return !!n.parentNode
                            } : function(t, i, h) {
                                var a, k, c, l, v, w, b = s !== e ? "nextSibling" : "previousSibling",
                                    y = t.parentNode,
                                    g = f && t.nodeName.toLowerCase(),
                                    d = !h && !f;
                                if (y) {
                                    if (s) {
                                        while (b) {
                                            for (c = t; c = c[b];)
                                                if (f ? c.nodeName.toLowerCase() === g : 1 === c.nodeType) return !1;
                                            w = b = "only" === n && !w && "nextSibling"
                                        }
                                        return !0
                                    }
                                    if (w = [e ? y.firstChild : y.lastChild], e && d) {
                                        for (k = y[o] || (y[o] = {}), a = k[n] || [], v = a[0] === p && a[1], l = a[0] === p && a[2], c = v && y.childNodes[v]; c = ++v && c && c[b] || (l = v = 0) || w.pop();)
                                            if (1 === c.nodeType && ++l && c === t) {
                                                k[n] = [p, v, l];
                                                break
                                            }
                                    } else if (d && (a = (t[o] || (t[o] = {}))[n]) && a[0] === p) l = a[1];
                                    else
                                        while (c = ++v && c && c[b] || (l = v = 0) || w.pop())
                                            if ((f ? c.nodeName.toLowerCase() === g : 1 === c.nodeType) && ++l && (d && ((c[o] || (c[o] = {}))[n] = [p, l]), c === t)) break; return l -= u, l === r || 0 == l % r && l / r >= 0
                                }
                            }
                        },
                        PSEUDO: function(n, t) {
                            var f, i = r.pseudos[n] || r.setFilters[n.toLowerCase()] || u.error("unsupported pseudo: " + n);
                            return i[o] ? i(t) : i.length > 1 ? (f = [n, n, "", t], r.setFilters.hasOwnProperty(n.toLowerCase()) ? c(function(n, r) {
                                for (var u, f = i(n, t), e = f.length; e--;) u = it.call(n, f[e]), n[u] = !(r[u] = f[e])
                            }) : function(n) {
                                return i(n, 0, f)
                            }) : i
                        }
                    },
                    pseudos: {
                        not: c(function(n) {
                            var i = [],
                                r = [],
                                t = kt(n.replace(vt, "$1"));
                            return t[o] ? c(function(n, i, r, u) {
                                for (var e, o = t(n, null, u, []), f = n.length; f--;)(e = o[f]) && (n[f] = !(i[f] = e))
                            }) : function(n, u, f) {
                                return i[0] = n, t(i, null, f, r), !r.pop()
                            }
                        }),
                        has: c(function(n) {
                            return function(t) {
                                return u(n, t).length > 0
                            }
                        }),
                        contains: c(function(n) {
                            return function(t) {
                                return (t.textContent || t.innerText || ct(t)).indexOf(n) > -1
                            }
                        }),
                        lang: c(function(n) {
                            return er.test(n || "") || u.error("unsupported lang: " + n), n = n.replace(k, d).toLowerCase(),
                                function(t) {
                                    var i;
                                    do
                                        if (i = v ? t.lang : t.getAttribute("xml:lang") || t.getAttribute("lang")) return i = i.toLowerCase(), i === n || 0 === i.indexOf(n + "-");
                                    while ((t = t.parentNode) && 1 === t.nodeType);
                                    return !1
                                }
                        }),
                        target: function(t) {
                            var i = n.location && n.location.hash;
                            return i && i.slice(1) === t.id
                        },
                        root: function(n) {
                            return n === a
                        },
                        focus: function(n) {
                            return n === s.activeElement && (!s.hasFocus || s.hasFocus()) && !!(n.type || n.href || ~n.tabIndex)
                        },
                        enabled: function(n) {
                            return n.disabled === !1
                        },
                        disabled: function(n) {
                            return n.disabled === !0
                        },
                        checked: function(n) {
                            var t = n.nodeName.toLowerCase();
                            return "input" === t && !!n.checked || "option" === t && !!n.selected
                        },
                        selected: function(n) {
                            return n.parentNode && n.parentNode.selectedIndex, n.selected === !0
                        },
                        empty: function(n) {
                            for (n = n.firstChild; n; n = n.nextSibling)
                                if (n.nodeName > "@" || 3 === n.nodeType || 4 === n.nodeType) return !1;
                            return !0
                        },
                        parent: function(n) {
                            return !r.pseudos.empty(n)
                        },
                        header: function(n) {
                            return hr.test(n.nodeName)
                        },
                        input: function(n) {
                            return sr.test(n.nodeName)
                        },
                        button: function(n) {
                            var t = n.nodeName.toLowerCase();
                            return "input" === t && "button" === n.type || "button" === t
                        },
                        text: function(n) {
                            var t;
                            return "input" === n.nodeName.toLowerCase() && "text" === n.type && (null == (t = n.getAttribute("type")) || t.toLowerCase() === n.type)
                        },
                        first: rt(function() {
                            return [0]
                        }),
                        last: rt(function(n, t) {
                            return [t - 1]
                        }),
                        eq: rt(function(n, t, i) {
                            return [0 > i ? i + t : i]
                        }),
                        even: rt(function(n, t) {
                            for (var i = 0; t > i; i += 2) n.push(i);
                            return n
                        }),
                        odd: rt(function(n, t) {
                            for (var i = 1; t > i; i += 2) n.push(i);
                            return n
                        }),
                        lt: rt(function(n, t, i) {
                            for (var r = 0 > i ? i + t : i; --r >= 0;) n.push(r);
                            return n
                        }),
                        gt: rt(function(n, t, i) {
                            for (var r = 0 > i ? i + t : i; t > ++r;) n.push(r);
                            return n
                        })
                    }
                };
                r.pseudos.nth = r.pseudos.eq;
                for (ut in {
                        radio: !0,
                        checkbox: !0,
                        file: !0,
                        password: !0,
                        image: !0
                    }) r.pseudos[ut] = lr(ut);
                for (ut in {
                        submit: !0,
                        reset: !0
                    }) r.pseudos[ut] = ar(ut);
                ki.prototype = r.filters = r.pseudos;
                r.setFilters = new ki;
                kt = u.compile = function(n, t) {
                    var r, u = [],
                        f = [],
                        i = ai[n + " "];
                    if (!i) {
                        for (t || (t = pt(n)), r = t.length; r--;) i = si(t[r]), i[o] ? u.push(i) : f.push(i);
                        i = ai(n, vr(f, u))
                    }
                    return i
                };
                e.sortStable = o.split("").sort(dt).join("") === o;
                e.detectDuplicates = ft;
                nt();
                e.sortDetached = l(function(n) {
                    return 1 & n.compareDocumentPosition(s.createElement("div"))
                });
                l(function(n) {
                    return n.innerHTML = "<a href='#'><\/a>", "#" === n.firstChild.getAttribute("href")
                }) || ui("type|href|height|width", function(n, i, r) {
                    return r ? t : n.getAttribute(i, "type" === i.toLowerCase() ? 1 : 2)
                });
                e.attributes && l(function(n) {
                    return n.innerHTML = "<input/>", n.firstChild.setAttribute("value", ""), "" === n.firstChild.getAttribute("value")
                }) || ui("value", function(n, i, r) {
                    return r || "input" !== n.nodeName.toLowerCase() ? t : n.defaultValue
                });
                l(function(n) {
                    return null == n.getAttribute("disabled")
                }) || ui(gt, function(n, i, r) {
                    var u;
                    return r ? t : (u = n.getAttributeNode(i)) && u.specified ? u.value : n[i] === !0 ? i.toLowerCase() : null
                });
                i.find = u;
                i.expr = u.selectors;
                i.expr[":"] = i.expr.pseudos;
                i.unique = u.uniqueSort;
                i.text = u.getText;
                i.isXMLDoc = u.isXML;
                i.contains = u.contains
            }(n);
        ni = {};
        i.Callbacks = function(n) {
            n = "string" == typeof n ? ni[n] || te(n) : i.extend({}, n);
            var s, f, c, e, o, l, r = [],
                u = !n.once && [],
                a = function(t) {
                    for (f = n.memory && t, c = !0, o = l || 0, l = 0, e = r.length, s = !0; r && e > o; o++)
                        if (r[o].apply(t[0], t[1]) === !1 && n.stopOnFalse) {
                            f = !1;
                            break
                        }
                    s = !1;
                    r && (u ? u.length && a(u.shift()) : f ? r = [] : h.disable())
                },
                h = {
                    add: function() {
                        if (r) {
                            var t = r.length;
                            (function u(t) {
                                i.each(t, function(t, f) {
                                    var e = i.type(f);
                                    "function" === e ? n.unique && h.has(f) || r.push(f) : f && f.length && "string" !== e && u(f)
                                })
                            })(arguments);
                            s ? e = r.length : f && (l = t, a(f))
                        }
                        return this
                    },
                    remove: function() {
                        return r && i.each(arguments, function(n, t) {
                            for (var u;
                                (u = i.inArray(t, r, u)) > -1;) r.splice(u, 1), s && (e >= u && e--, o >= u && o--)
                        }), this
                    },
                    has: function(n) {
                        return n ? i.inArray(n, r) > -1 : !(!r || !r.length)
                    },
                    empty: function() {
                        return r = [], e = 0, this
                    },
                    disable: function() {
                        return r = u = f = t, this
                    },
                    disabled: function() {
                        return !r
                    },
                    lock: function() {
                        return u = t, f || h.disable(), this
                    },
                    locked: function() {
                        return !u
                    },
                    fireWith: function(n, t) {
                        return !r || c && !u || (t = t || [], t = [n, t.slice ? t.slice() : t], s ? u.push(t) : a(t)), this
                    },
                    fire: function() {
                        return h.fireWith(this, arguments), this
                    },
                    fired: function() {
                        return !!c
                    }
                };
            return h
        };
        i.extend({
            Deferred: function(n) {
                var u = [
                        ["resolve", "done", i.Callbacks("once memory"), "resolved"],
                        ["reject", "fail", i.Callbacks("once memory"), "rejected"],
                        ["notify", "progress", i.Callbacks("memory")]
                    ],
                    f = "pending",
                    r = {
                        state: function() {
                            return f
                        },
                        always: function() {
                            return t.done(arguments).fail(arguments), this
                        },
                        then: function() {
                            var n = arguments;
                            return i.Deferred(function(f) {
                                i.each(u, function(u, e) {
                                    var s = e[0],
                                        o = i.isFunction(n[u]) && n[u];
                                    t[e[1]](function() {
                                        var n = o && o.apply(this, arguments);
                                        n && i.isFunction(n.promise) ? n.promise().done(f.resolve).fail(f.reject).progress(f.notify) : f[s + "With"](this === r ? f.promise() : this, o ? [n] : arguments)
                                    })
                                });
                                n = null
                            }).promise()
                        },
                        promise: function(n) {
                            return null != n ? i.extend(n, r) : r
                        }
                    },
                    t = {};
                return r.pipe = r.then, i.each(u, function(n, i) {
                    var e = i[2],
                        o = i[3];
                    r[i[1]] = e.add;
                    o && e.add(function() {
                        f = o
                    }, u[1 ^ n][2].disable, u[2][2].lock);
                    t[i[0]] = function() {
                        return t[i[0] + "With"](this === t ? r : this, arguments), this
                    };
                    t[i[0] + "With"] = e.fireWith
                }), r.promise(t), n && n.call(t, t), t
            },
            when: function(n) {
                var t = 0,
                    u = l.call(arguments),
                    r = u.length,
                    e = 1 !== r || n && i.isFunction(n.promise) ? r : 0,
                    f = 1 === e ? n : i.Deferred(),
                    h = function(n, t, i) {
                        return function(r) {
                            t[n] = this;
                            i[n] = arguments.length > 1 ? l.call(arguments) : r;
                            i === o ? f.notifyWith(t, i) : --e || f.resolveWith(t, i)
                        }
                    },
                    o, c, s;
                if (r > 1)
                    for (o = Array(r), c = Array(r), s = Array(r); r > t; t++) u[t] && i.isFunction(u[t].promise) ? u[t].promise().done(h(t, s, u)).fail(f.reject).progress(h(t, c, o)) : --e;
                return e || f.resolveWith(s, u), f.promise()
            }
        });
        i.support = function(t) {
            var a, e, f, h, c, l, v, y, s, u = r.createElement("div");
            if (u.setAttribute("className", "t"), u.innerHTML = "  <link/><table><\/table><a href='/a'>a<\/a><input type='checkbox'/>", a = u.getElementsByTagName("*") || [], e = u.getElementsByTagName("a")[0], !e || !e.style || !a.length) return t;
            h = r.createElement("select");
            l = h.appendChild(r.createElement("option"));
            f = u.getElementsByTagName("input")[0];
            e.style.cssText = "top:1px;float:left;opacity:.5";
            t.getSetAttribute = "t" !== u.className;
            t.leadingWhitespace = 3 === u.firstChild.nodeType;
            t.tbody = !u.getElementsByTagName("tbody").length;
            t.htmlSerialize = !!u.getElementsByTagName("link").length;
            t.style = /top/.test(e.getAttribute("style"));
            t.hrefNormalized = "/a" === e.getAttribute("href");
            t.opacity = /^0.5/.test(e.style.opacity);
            t.cssFloat = !!e.style.cssFloat;
            t.checkOn = !!f.value;
            t.optSelected = l.selected;
            t.enctype = !!r.createElement("form").enctype;
            t.html5Clone = "<:nav><\/:nav>" !== r.createElement("nav").cloneNode(!0).outerHTML;
            t.inlineBlockNeedsLayout = !1;
            t.shrinkWrapBlocks = !1;
            t.pixelPosition = !1;
            t.deleteExpando = !0;
            t.noCloneEvent = !0;
            t.reliableMarginRight = !0;
            t.boxSizingReliable = !0;
            f.checked = !0;
            t.noCloneChecked = f.cloneNode(!0).checked;
            h.disabled = !0;
            t.optDisabled = !l.disabled;
            try {
                delete u.test
            } catch (p) {
                t.deleteExpando = !1
            }
            f = r.createElement("input");
            f.setAttribute("value", "");
            t.input = "" === f.getAttribute("value");
            f.value = "t";
            f.setAttribute("type", "radio");
            t.radioValue = "t" === f.value;
            f.setAttribute("checked", "t");
            f.setAttribute("name", "t");
            c = r.createDocumentFragment();
            c.appendChild(f);
            t.appendChecked = f.checked;
            t.checkClone = c.cloneNode(!0).cloneNode(!0).lastChild.checked;
            u.attachEvent && (u.attachEvent("onclick", function() {
                t.noCloneEvent = !1
            }), u.cloneNode(!0).click());
            for (s in {
                    submit: !0,
                    change: !0,
                    focusin: !0
                }) u.setAttribute(v = "on" + s, "t"), t[s + "Bubbles"] = v in n || u.attributes[v].expando === !1;
            u.style.backgroundClip = "content-box";
            u.cloneNode(!0).style.backgroundClip = "";
            t.clearCloneStyle = "content-box" === u.style.backgroundClip;
            for (s in i(t)) break;
            return t.ownLast = "0" !== s, i(function() {
                var h, e, f, c = "padding:0;margin:0;border:0;display:block;box-sizing:content-box;-moz-box-sizing:content-box;-webkit-box-sizing:content-box;",
                    s = r.getElementsByTagName("body")[0];
                s && (h = r.createElement("div"), h.style.cssText = "border:0;width:0;height:0;position:absolute;top:0;left:-9999px;margin-top:1px", s.appendChild(h).appendChild(u), u.innerHTML = "<table><tr><td><\/td><td>t<\/td><\/tr><\/table>", f = u.getElementsByTagName("td"), f[0].style.cssText = "padding:0;margin:0;border:0;display:none", y = 0 === f[0].offsetHeight, f[0].style.display = "", f[1].style.display = "none", t.reliableHiddenOffsets = y && 0 === f[0].offsetHeight, u.innerHTML = "", u.style.cssText = "box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;padding:1px;border:1px;display:block;width:4px;margin-top:1%;position:absolute;top:1%;", i.swap(s, null != s.style.zoom ? {
                    zoom: 1
                } : {}, function() {
                    t.boxSizing = 4 === u.offsetWidth
                }), n.getComputedStyle && (t.pixelPosition = "1%" !== (n.getComputedStyle(u, null) || {}).top, t.boxSizingReliable = "4px" === (n.getComputedStyle(u, null) || {
                    width: "4px"
                }).width, e = u.appendChild(r.createElement("div")), e.style.cssText = u.style.cssText = c, e.style.marginRight = e.style.width = "0", u.style.width = "1px", t.reliableMarginRight = !parseFloat((n.getComputedStyle(e, null) || {}).marginRight)), typeof u.style.zoom !== o && (u.innerHTML = "", u.style.cssText = c + "width:1px;padding:1px;display:inline;zoom:1", t.inlineBlockNeedsLayout = 3 === u.offsetWidth, u.style.display = "block", u.innerHTML = "<div><\/div>", u.firstChild.style.width = "5px", t.shrinkWrapBlocks = 3 !== u.offsetWidth, t.inlineBlockNeedsLayout && (s.style.zoom = 1)), s.removeChild(h), h = u = f = e = null)
            }), a = h = c = l = e = f = null, t
        }({});
        ir = /(?:\{[\s\S]*\}|\[[\s\S]*\])$/;
        rr = /([A-Z])/g;
        i.extend({
            cache: {},
            noData: {
                applet: !0,
                embed: !0,
                object: "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
            },
            hasData: function(n) {
                return n = n.nodeType ? i.cache[n[i.expando]] : n[i.expando], !!n && !ti(n)
            },
            data: function(n, t, i) {
                return ur(n, t, i)
            },
            removeData: function(n, t) {
                return fr(n, t)
            },
            _data: function(n, t, i) {
                return ur(n, t, i, !0)
            },
            _removeData: function(n, t) {
                return fr(n, t, !0)
            },
            acceptData: function(n) {
                if (n.nodeType && 1 !== n.nodeType && 9 !== n.nodeType) return !1;
                var t = n.nodeName && i.noData[n.nodeName.toLowerCase()];
                return !t || t !== !0 && n.getAttribute("classid") === t
            }
        });
        i.fn.extend({
            data: function(n, r) {
                var e, f, o = null,
                    s = 0,
                    u = this[0];
                if (n === t) {
                    if (this.length && (o = i.data(u), 1 === u.nodeType && !i._data(u, "parsedAttrs"))) {
                        for (e = u.attributes; e.length > s; s++) f = e[s].name, 0 === f.indexOf("data-") && (f = i.camelCase(f.slice(5)), er(u, f, o[f]));
                        i._data(u, "parsedAttrs", !0)
                    }
                    return o
                }
                return "object" == typeof n ? this.each(function() {
                    i.data(this, n)
                }) : arguments.length > 1 ? this.each(function() {
                    i.data(this, n, r)
                }) : u ? er(u, n, i.data(u, n)) : null
            },
            removeData: function(n) {
                return this.each(function() {
                    i.removeData(this, n)
                })
            }
        });
        i.extend({
            queue: function(n, r, u) {
                var f;
                return n ? (r = (r || "fx") + "queue", f = i._data(n, r), u && (!f || i.isArray(u) ? f = i._data(n, r, i.makeArray(u)) : f.push(u)), f || []) : t
            },
            dequeue: function(n, t) {
                t = t || "fx";
                var r = i.queue(n, t),
                    e = r.length,
                    u = r.shift(),
                    f = i._queueHooks(n, t),
                    o = function() {
                        i.dequeue(n, t)
                    };
                "inprogress" === u && (u = r.shift(), e--);
                u && ("fx" === t && r.unshift("inprogress"), delete f.stop, u.call(n, o, f));
                !e && f && f.empty.fire()
            },
            _queueHooks: function(n, t) {
                var r = t + "queueHooks";
                return i._data(n, r) || i._data(n, r, {
                    empty: i.Callbacks("once memory").add(function() {
                        i._removeData(n, t + "queue");
                        i._removeData(n, r)
                    })
                })
            }
        });
        i.fn.extend({
            queue: function(n, r) {
                var u = 2;
                return "string" != typeof n && (r = n, n = "fx", u--), u > arguments.length ? i.queue(this[0], n) : r === t ? this : this.each(function() {
                    var t = i.queue(this, n, r);
                    i._queueHooks(this, n);
                    "fx" === n && "inprogress" !== t[0] && i.dequeue(this, n)
                })
            },
            dequeue: function(n) {
                return this.each(function() {
                    i.dequeue(this, n)
                })
            },
            delay: function(n, t) {
                return n = i.fx ? i.fx.speeds[n] || n : n, t = t || "fx", this.queue(t, function(t, i) {
                    var r = setTimeout(t, n);
                    i.stop = function() {
                        clearTimeout(r)
                    }
                })
            },
            clearQueue: function(n) {
                return this.queue(n || "fx", [])
            },
            promise: function(n, r) {
                var u, e = 1,
                    o = i.Deferred(),
                    f = this,
                    s = this.length,
                    h = function() {
                        --e || o.resolveWith(f, [f])
                    };
                for ("string" != typeof n && (r = n, n = t), n = n || "fx"; s--;) u = i._data(f[s], n + "queueHooks"), u && u.empty && (e++, u.empty.add(h));
                return h(), o.promise(r)
            }
        });
        var d, or, ii = /[\t\r\n\f]/g,
            ie = /\r/g,
            re = /^(?:input|select|textarea|button|object)$/i,
            ue = /^(?:a|area)$/i,
            ri = /^(?:checked|selected)$/i,
            a = i.support.getSetAttribute,
            ht = i.support.input;
        i.fn.extend({
            attr: function(n, t) {
                return i.access(this, i.attr, n, t, arguments.length > 1)
            },
            removeAttr: function(n) {
                return this.each(function() {
                    i.removeAttr(this, n)
                })
            },
            prop: function(n, t) {
                return i.access(this, i.prop, n, t, arguments.length > 1)
            },
            removeProp: function(n) {
                return n = i.propFix[n] || n, this.each(function() {
                    try {
                        this[n] = t;
                        delete this[n]
                    } catch (i) {}
                })
            },
            addClass: function(n) {
                var e, t, r, u, o, f = 0,
                    h = this.length,
                    c = "string" == typeof n && n;
                if (i.isFunction(n)) return this.each(function(t) {
                    i(this).addClass(n.call(this, t, this.className))
                });
                if (c)
                    for (e = (n || "").match(s) || []; h > f; f++)
                        if (t = this[f], r = 1 === t.nodeType && (t.className ? (" " + t.className + " ").replace(ii, " ") : " ")) {
                            for (o = 0; u = e[o++];) 0 > r.indexOf(" " + u + " ") && (r += u + " ");
                            t.className = i.trim(r)
                        }
                return this
            },
            removeClass: function(n) {
                var e, t, r, u, o, f = 0,
                    h = this.length,
                    c = 0 === arguments.length || "string" == typeof n && n;
                if (i.isFunction(n)) return this.each(function(t) {
                    i(this).removeClass(n.call(this, t, this.className))
                });
                if (c)
                    for (e = (n || "").match(s) || []; h > f; f++)
                        if (t = this[f], r = 1 === t.nodeType && (t.className ? (" " + t.className + " ").replace(ii, " ") : "")) {
                            for (o = 0; u = e[o++];)
                                while (r.indexOf(" " + u + " ") >= 0) r = r.replace(" " + u + " ", " ");
                            t.className = n ? i.trim(r) : ""
                        }
                return this
            },
            toggleClass: function(n, t) {
                var r = typeof n;
                return "boolean" == typeof t && "string" === r ? t ? this.addClass(n) : this.removeClass(n) : i.isFunction(n) ? this.each(function(r) {
                    i(this).toggleClass(n.call(this, r, this.className, t), t)
                }) : this.each(function() {
                    if ("string" === r)
                        for (var t, f = 0, u = i(this), e = n.match(s) || []; t = e[f++];) u.hasClass(t) ? u.removeClass(t) : u.addClass(t);
                    else(r === o || "boolean" === r) && (this.className && i._data(this, "__className__", this.className), this.className = this.className || n === !1 ? "" : i._data(this, "__className__") || "")
                })
            },
            hasClass: function(n) {
                for (var i = " " + n + " ", t = 0, r = this.length; r > t; t++)
                    if (1 === this[t].nodeType && (" " + this[t].className + " ").replace(ii, " ").indexOf(i) >= 0) return !0;
                return !1
            },
            val: function(n) {
                var u, r, e, f = this[0];
                return arguments.length ? (e = i.isFunction(n), this.each(function(u) {
                    var f;
                    1 === this.nodeType && (f = e ? n.call(this, u, i(this).val()) : n, null == f ? f = "" : "number" == typeof f ? f += "" : i.isArray(f) && (f = i.map(f, function(n) {
                        return null == n ? "" : n + ""
                    })), r = i.valHooks[this.type] || i.valHooks[this.nodeName.toLowerCase()], r && "set" in r && r.set(this, f, "value") !== t || (this.value = f))
                })) : f ? (r = i.valHooks[f.type] || i.valHooks[f.nodeName.toLowerCase()], r && "get" in r && (u = r.get(f, "value")) !== t ? u : (u = f.value, "string" == typeof u ? u.replace(ie, "") : null == u ? "" : u)) : void 0
            }
        });
        i.extend({
            valHooks: {
                option: {
                    get: function(n) {
                        var t = i.find.attr(n, "value");
                        return null != t ? t : n.text
                    }
                },
                select: {
                    get: function(n) {
                        for (var e, t, o = n.options, r = n.selectedIndex, u = "select-one" === n.type || 0 > r, s = u ? null : [], h = u ? r + 1 : o.length, f = 0 > r ? h : u ? r : 0; h > f; f++)
                            if (t = o[f], !(!t.selected && f !== r || (i.support.optDisabled ? t.disabled : null !== t.getAttribute("disabled")) || t.parentNode.disabled && i.nodeName(t.parentNode, "optgroup"))) {
                                if (e = i(t).val(), u) return e;
                                s.push(e)
                            }
                        return s
                    },
                    set: function(n, t) {
                        for (var u, r, f = n.options, e = i.makeArray(t), o = f.length; o--;) r = f[o], (r.selected = i.inArray(i(r).val(), e) >= 0) && (u = !0);
                        return u || (n.selectedIndex = -1), e
                    }
                }
            },
            attr: function(n, r, u) {
                var f, e, s = n.nodeType;
                if (n && 3 !== s && 8 !== s && 2 !== s) return typeof n.getAttribute === o ? i.prop(n, r, u) : (1 === s && i.isXMLDoc(n) || (r = r.toLowerCase(), f = i.attrHooks[r] || (i.expr.match.bool.test(r) ? or : d)), u === t ? f && "get" in f && null !== (e = f.get(n, r)) ? e : (e = i.find.attr(n, r), null == e ? t : e) : null !== u ? f && "set" in f && (e = f.set(n, u, r)) !== t ? e : (n.setAttribute(r, u + ""), u) : (i.removeAttr(n, r), t))
            },
            removeAttr: function(n, t) {
                var r, u, e = 0,
                    f = t && t.match(s);
                if (f && 1 === n.nodeType)
                    while (r = f[e++]) u = i.propFix[r] || r, i.expr.match.bool.test(r) ? ht && a || !ri.test(r) ? n[u] = !1 : n[i.camelCase("default-" + r)] = n[u] = !1 : i.attr(n, r, ""), n.removeAttribute(a ? r : u)
            },
            attrHooks: {
                type: {
                    set: function(n, t) {
                        if (!i.support.radioValue && "radio" === t && i.nodeName(n, "input")) {
                            var r = n.value;
                            return n.setAttribute("type", t), r && (n.value = r), t
                        }
                    }
                }
            },
            propFix: {
                "for": "htmlFor",
                "class": "className"
            },
            prop: function(n, r, u) {
                var e, f, s, o = n.nodeType;
                if (n && 3 !== o && 8 !== o && 2 !== o) return s = 1 !== o || !i.isXMLDoc(n), s && (r = i.propFix[r] || r, f = i.propHooks[r]), u !== t ? f && "set" in f && (e = f.set(n, u, r)) !== t ? e : n[r] = u : f && "get" in f && null !== (e = f.get(n, r)) ? e : n[r]
            },
            propHooks: {
                tabIndex: {
                    get: function(n) {
                        var t = i.find.attr(n, "tabindex");
                        return t ? parseInt(t, 10) : re.test(n.nodeName) || ue.test(n.nodeName) && n.href ? 0 : -1
                    }
                }
            }
        });
        or = {
            set: function(n, t, r) {
                return t === !1 ? i.removeAttr(n, r) : ht && a || !ri.test(r) ? n.setAttribute(!a && i.propFix[r] || r, r) : n[i.camelCase("default-" + r)] = n[r] = !0, r
            }
        };
        i.each(i.expr.match.bool.source.match(/\w+/g), function(n, r) {
            var u = i.expr.attrHandle[r] || i.find.attr;
            i.expr.attrHandle[r] = ht && a || !ri.test(r) ? function(n, r, f) {
                var e = i.expr.attrHandle[r],
                    o = f ? t : (i.expr.attrHandle[r] = t) != u(n, r, f) ? r.toLowerCase() : null;
                return i.expr.attrHandle[r] = e, o
            } : function(n, r, u) {
                return u ? t : n[i.camelCase("default-" + r)] ? r.toLowerCase() : null
            }
        });
        ht && a || (i.attrHooks.value = {
            set: function(n, r, u) {
                return i.nodeName(n, "input") ? (n.defaultValue = r, t) : d && d.set(n, r, u)
            }
        });
        a || (d = {
            set: function(n, i, r) {
                var u = n.getAttributeNode(r);
                return u || n.setAttributeNode(u = n.ownerDocument.createAttribute(r)), u.value = i += "", "value" === r || i === n.getAttribute(r) ? i : t
            }
        }, i.expr.attrHandle.id = i.expr.attrHandle.name = i.expr.attrHandle.coords = function(n, i, r) {
            var u;
            return r ? t : (u = n.getAttributeNode(i)) && "" !== u.value ? u.value : null
        }, i.valHooks.button = {
            get: function(n, i) {
                var r = n.getAttributeNode(i);
                return r && r.specified ? r.value : t
            },
            set: d.set
        }, i.attrHooks.contenteditable = {
            set: function(n, t, i) {
                d.set(n, "" === t ? !1 : t, i)
            }
        }, i.each(["width", "height"], function(n, r) {
            i.attrHooks[r] = {
                set: function(n, i) {
                    return "" === i ? (n.setAttribute(r, "auto"), i) : t
                }
            }
        }));
        i.support.hrefNormalized || i.each(["href", "src"], function(n, t) {
            i.propHooks[t] = {
                get: function(n) {
                    return n.getAttribute(t, 4)
                }
            }
        });
        i.support.style || (i.attrHooks.style = {
            get: function(n) {
                return n.style.cssText || t
            },
            set: function(n, t) {
                return n.style.cssText = t + ""
            }
        });
        i.support.optSelected || (i.propHooks.selected = {
            get: function(n) {
                var t = n.parentNode;
                return t && (t.selectedIndex, t.parentNode && t.parentNode.selectedIndex), null
            }
        });
        i.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"], function() {
            i.propFix[this.toLowerCase()] = this
        });
        i.support.enctype || (i.propFix.enctype = "encoding");
        i.each(["radio", "checkbox"], function() {
            i.valHooks[this] = {
                set: function(n, r) {
                    return i.isArray(r) ? n.checked = i.inArray(i(n).val(), r) >= 0 : t
                }
            };
            i.support.checkOn || (i.valHooks[this].get = function(n) {
                return null === n.getAttribute("value") ? "on" : n.value
            })
        });
        var ui = /^(?:input|select|textarea)$/i,
            fe = /^key/,
            ee = /^(?:mouse|contextmenu)|click/,
            sr = /^(?:focusinfocus|focusoutblur)$/,
            hr = /^([^.]*)(?:\.(.+)|)$/;
        i.event = {
            global: {},
            add: function(n, r, u, f, e) {
                var b, p, k, w, c, l, a, v, h, d, g, y = i._data(n);
                if (y) {
                    for (u.handler && (w = u, u = w.handler, e = w.selector), u.guid || (u.guid = i.guid++), (p = y.events) || (p = y.events = {}), (l = y.handle) || (l = y.handle = function(n) {
                            return typeof i === o || n && i.event.triggered === n.type ? t : i.event.dispatch.apply(l.elem, arguments)
                        }, l.elem = n), r = (r || "").match(s) || [""], k = r.length; k--;) b = hr.exec(r[k]) || [], h = g = b[1], d = (b[2] || "").split(".").sort(), h && (c = i.event.special[h] || {}, h = (e ? c.delegateType : c.bindType) || h, c = i.event.special[h] || {}, a = i.extend({
                        type: h,
                        origType: g,
                        data: f,
                        handler: u,
                        guid: u.guid,
                        selector: e,
                        needsContext: e && i.expr.match.needsContext.test(e),
                        namespace: d.join(".")
                    }, w), (v = p[h]) || (v = p[h] = [], v.delegateCount = 0, c.setup && c.setup.call(n, f, d, l) !== !1 || (n.addEventListener ? n.addEventListener(h, l, !1) : n.attachEvent && n.attachEvent("on" + h, l))), c.add && (c.add.call(n, a), a.handler.guid || (a.handler.guid = u.guid)), e ? v.splice(v.delegateCount++, 0, a) : v.push(a), i.event.global[h] = !0);
                    n = null
                }
            },
            remove: function(n, t, r, u, f) {
                var y, o, h, b, p, a, c, l, e, w, k, v = i.hasData(n) && i._data(n);
                if (v && (a = v.events)) {
                    for (t = (t || "").match(s) || [""], p = t.length; p--;)
                        if (h = hr.exec(t[p]) || [], e = k = h[1], w = (h[2] || "").split(".").sort(), e) {
                            for (c = i.event.special[e] || {}, e = (u ? c.delegateType : c.bindType) || e, l = a[e] || [], h = h[2] && RegExp("(^|\\.)" + w.join("\\.(?:.*\\.|)") + "(\\.|$)"), b = y = l.length; y--;) o = l[y], !f && k !== o.origType || r && r.guid !== o.guid || h && !h.test(o.namespace) || u && u !== o.selector && ("**" !== u || !o.selector) || (l.splice(y, 1), o.selector && l.delegateCount--, c.remove && c.remove.call(n, o));
                            b && !l.length && (c.teardown && c.teardown.call(n, w, v.handle) !== !1 || i.removeEvent(n, e, v.handle), delete a[e])
                        } else
                            for (e in a) i.event.remove(n, e + t[p], r, u, !0);
                    i.isEmptyObject(a) && (delete v.handle, i._removeData(n, "events"))
                }
            },
            trigger: function(u, f, e, o) {
                var a, v, s, w, l, c, b, p = [e || r],
                    h = k.call(u, "type") ? u.type : u,
                    y = k.call(u, "namespace") ? u.namespace.split(".") : [];
                if (s = c = e = e || r, 3 !== e.nodeType && 8 !== e.nodeType && !sr.test(h + i.event.triggered) && (h.indexOf(".") >= 0 && (y = h.split("."), h = y.shift(), y.sort()), v = 0 > h.indexOf(":") && "on" + h, u = u[i.expando] ? u : new i.Event(h, "object" == typeof u && u), u.isTrigger = o ? 2 : 3, u.namespace = y.join("."), u.namespace_re = u.namespace ? RegExp("(^|\\.)" + y.join("\\.(?:.*\\.|)") + "(\\.|$)") : null, u.result = t, u.target || (u.target = e), f = null == f ? [u] : i.makeArray(f, [u]), l = i.event.special[h] || {}, o || !l.trigger || l.trigger.apply(e, f) !== !1)) {
                    if (!o && !l.noBubble && !i.isWindow(e)) {
                        for (w = l.delegateType || h, sr.test(w + h) || (s = s.parentNode); s; s = s.parentNode) p.push(s), c = s;
                        c === (e.ownerDocument || r) && p.push(c.defaultView || c.parentWindow || n)
                    }
                    for (b = 0;
                        (s = p[b++]) && !u.isPropagationStopped();) u.type = b > 1 ? w : l.bindType || h, a = (i._data(s, "events") || {})[u.type] && i._data(s, "handle"), a && a.apply(s, f), a = v && s[v], a && i.acceptData(s) && a.apply && a.apply(s, f) === !1 && u.preventDefault();
                    if (u.type = h, !o && !u.isDefaultPrevented() && (!l._default || l._default.apply(p.pop(), f) === !1) && i.acceptData(e) && v && e[h] && !i.isWindow(e)) {
                        c = e[v];
                        c && (e[v] = null);
                        i.event.triggered = h;
                        try {
                            e[h]()
                        } catch (d) {}
                        i.event.triggered = t;
                        c && (e[v] = c)
                    }
                    return u.result
                }
            },
            dispatch: function(n) {
                n = i.event.fix(n);
                var o, e, r, u, s, h = [],
                    c = l.call(arguments),
                    a = (i._data(this, "events") || {})[n.type] || [],
                    f = i.event.special[n.type] || {};
                if (c[0] = n, n.delegateTarget = this, !f.preDispatch || f.preDispatch.call(this, n) !== !1) {
                    for (h = i.event.handlers.call(this, n, a), o = 0;
                        (u = h[o++]) && !n.isPropagationStopped();)
                        for (n.currentTarget = u.elem, s = 0;
                            (r = u.handlers[s++]) && !n.isImmediatePropagationStopped();)(!n.namespace_re || n.namespace_re.test(r.namespace)) && (n.handleObj = r, n.data = r.data, e = ((i.event.special[r.origType] || {}).handle || r.handler).apply(u.elem, c), e !== t && (n.result = e) === !1 && (n.preventDefault(), n.stopPropagation()));
                    return f.postDispatch && f.postDispatch.call(this, n), n.result
                }
            },
            handlers: function(n, r) {
                var e, o, f, s, c = [],
                    h = r.delegateCount,
                    u = n.target;
                if (h && u.nodeType && (!n.button || "click" !== n.type))
                    for (; u != this; u = u.parentNode || this)
                        if (1 === u.nodeType && (u.disabled !== !0 || "click" !== n.type)) {
                            for (f = [], s = 0; h > s; s++) o = r[s], e = o.selector + " ", f[e] === t && (f[e] = o.needsContext ? i(e, this).index(u) >= 0 : i.find(e, this, null, [u]).length), f[e] && f.push(o);
                            f.length && c.push({
                                elem: u,
                                handlers: f
                            })
                        }
                return r.length > h && c.push({
                    elem: this,
                    handlers: r.slice(h)
                }), c
            },
            fix: function(n) {
                if (n[i.expando]) return n;
                var e, o, s, u = n.type,
                    f = n,
                    t = this.fixHooks[u];
                for (t || (this.fixHooks[u] = t = ee.test(u) ? this.mouseHooks : fe.test(u) ? this.keyHooks : {}), s = t.props ? this.props.concat(t.props) : this.props, n = new i.Event(f), e = s.length; e--;) o = s[e], n[o] = f[o];
                return n.target || (n.target = f.srcElement || r), 3 === n.target.nodeType && (n.target = n.target.parentNode), n.metaKey = !!n.metaKey, t.filter ? t.filter(n, f) : n
            },
            props: "altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),
            fixHooks: {},
            keyHooks: {
                props: "char charCode key keyCode".split(" "),
                filter: function(n, t) {
                    return null == n.which && (n.which = null != t.charCode ? t.charCode : t.keyCode), n
                }
            },
            mouseHooks: {
                props: "button buttons clientX clientY fromElement offsetX offsetY pageX pageY screenX screenY toElement".split(" "),
                filter: function(n, i) {
                    var u, o, f, e = i.button,
                        s = i.fromElement;
                    return null == n.pageX && null != i.clientX && (o = n.target.ownerDocument || r, f = o.documentElement, u = o.body, n.pageX = i.clientX + (f && f.scrollLeft || u && u.scrollLeft || 0) - (f && f.clientLeft || u && u.clientLeft || 0), n.pageY = i.clientY + (f && f.scrollTop || u && u.scrollTop || 0) - (f && f.clientTop || u && u.clientTop || 0)), !n.relatedTarget && s && (n.relatedTarget = s === n.target ? i.toElement : s), n.which || e === t || (n.which = 1 & e ? 1 : 2 & e ? 3 : 4 & e ? 2 : 0), n
                }
            },
            special: {
                load: {
                    noBubble: !0
                },
                focus: {
                    trigger: function() {
                        if (this !== cr() && this.focus) try {
                            return this.focus(), !1
                        } catch (n) {}
                    },
                    delegateType: "focusin"
                },
                blur: {
                    trigger: function() {
                        return this === cr() && this.blur ? (this.blur(), !1) : t
                    },
                    delegateType: "focusout"
                },
                click: {
                    trigger: function() {
                        return i.nodeName(this, "input") && "checkbox" === this.type && this.click ? (this.click(), !1) : t
                    },
                    _default: function(n) {
                        return i.nodeName(n.target, "a")
                    }
                },
                beforeunload: {
                    postDispatch: function(n) {
                        n.result !== t && (n.originalEvent.returnValue = n.result)
                    }
                }
            },
            simulate: function(n, t, r, u) {
                var f = i.extend(new i.Event, r, {
                    type: n,
                    isSimulated: !0,
                    originalEvent: {}
                });
                u ? i.event.trigger(f, null, t) : i.event.dispatch.call(t, f);
                f.isDefaultPrevented() && r.preventDefault()
            }
        };
        i.removeEvent = r.removeEventListener ? function(n, t, i) {
            n.removeEventListener && n.removeEventListener(t, i, !1)
        } : function(n, t, i) {
            var r = "on" + t;
            n.detachEvent && (typeof n[r] === o && (n[r] = null), n.detachEvent(r, i))
        };
        i.Event = function(n, r) {
            return this instanceof i.Event ? (n && n.type ? (this.originalEvent = n, this.type = n.type, this.isDefaultPrevented = n.defaultPrevented || n.returnValue === !1 || n.getPreventDefault && n.getPreventDefault() ? ct : g) : this.type = n, r && i.extend(this, r), this.timeStamp = n && n.timeStamp || i.now(), this[i.expando] = !0, t) : new i.Event(n, r)
        };
        i.Event.prototype = {
            isDefaultPrevented: g,
            isPropagationStopped: g,
            isImmediatePropagationStopped: g,
            preventDefault: function() {
                var n = this.originalEvent;
                this.isDefaultPrevented = ct;
                n && (n.preventDefault ? n.preventDefault() : n.returnValue = !1)
            },
            stopPropagation: function() {
                var n = this.originalEvent;
                this.isPropagationStopped = ct;
                n && (n.stopPropagation && n.stopPropagation(), n.cancelBubble = !0)
            },
            stopImmediatePropagation: function() {
                this.isImmediatePropagationStopped = ct;
                this.stopPropagation()
            }
        };
        i.each({
            mouseenter: "mouseover",
            mouseleave: "mouseout"
        }, function(n, t) {
            i.event.special[n] = {
                delegateType: t,
                bindType: t,
                handle: function(n) {
                    var u, f = this,
                        r = n.relatedTarget,
                        e = n.handleObj;
                    return (!r || r !== f && !i.contains(f, r)) && (n.type = e.origType, u = e.handler.apply(this, arguments), n.type = t), u
                }
            }
        });
        i.support.submitBubbles || (i.event.special.submit = {
            setup: function() {
                return i.nodeName(this, "form") ? !1 : (i.event.add(this, "click._submit keypress._submit", function(n) {
                    var u = n.target,
                        r = i.nodeName(u, "input") || i.nodeName(u, "button") ? u.form : t;
                    r && !i._data(r, "submitBubbles") && (i.event.add(r, "submit._submit", function(n) {
                        n._submit_bubble = !0
                    }), i._data(r, "submitBubbles", !0))
                }), t)
            },
            postDispatch: function(n) {
                n._submit_bubble && (delete n._submit_bubble, this.parentNode && !n.isTrigger && i.event.simulate("submit", this.parentNode, n, !0))
            },
            teardown: function() {
                return i.nodeName(this, "form") ? !1 : (i.event.remove(this, "._submit"), t)
            }
        });
        i.support.changeBubbles || (i.event.special.change = {
            setup: function() {
                return ui.test(this.nodeName) ? (("checkbox" === this.type || "radio" === this.type) && (i.event.add(this, "propertychange._change", function(n) {
                    "checked" === n.originalEvent.propertyName && (this._just_changed = !0)
                }), i.event.add(this, "click._change", function(n) {
                    this._just_changed && !n.isTrigger && (this._just_changed = !1);
                    i.event.simulate("change", this, n, !0)
                })), !1) : (i.event.add(this, "beforeactivate._change", function(n) {
                    var t = n.target;
                    ui.test(t.nodeName) && !i._data(t, "changeBubbles") && (i.event.add(t, "change._change", function(n) {
                        !this.parentNode || n.isSimulated || n.isTrigger || i.event.simulate("change", this.parentNode, n, !0)
                    }), i._data(t, "changeBubbles", !0))
                }), t)
            },
            handle: function(n) {
                var i = n.target;
                return this !== i || n.isSimulated || n.isTrigger || "radio" !== i.type && "checkbox" !== i.type ? n.handleObj.handler.apply(this, arguments) : t
            },
            teardown: function() {
                return i.event.remove(this, "._change"), !ui.test(this.nodeName)
            }
        });
        i.support.focusinBubbles || i.each({
            focus: "focusin",
            blur: "focusout"
        }, function(n, t) {
            var u = 0,
                f = function(n) {
                    i.event.simulate(t, n.target, i.event.fix(n), !0)
                };
            i.event.special[t] = {
                setup: function() {
                    0 == u++ && r.addEventListener(n, f, !0)
                },
                teardown: function() {
                    0 == --u && r.removeEventListener(n, f, !0)
                }
            }
        });
        i.fn.extend({
            on: function(n, r, u, f, e) {
                var s, o;
                if ("object" == typeof n) {
                    "string" != typeof r && (u = u || r, r = t);
                    for (s in n) this.on(s, r, u, n[s], e);
                    return this
                }
                if (null == u && null == f ? (f = r, u = r = t) : null == f && ("string" == typeof r ? (f = u, u = t) : (f = u, u = r, r = t)), f === !1) f = g;
                else if (!f) return this;
                return 1 === e && (o = f, f = function(n) {
                    return i().off(n), o.apply(this, arguments)
                }, f.guid = o.guid || (o.guid = i.guid++)), this.each(function() {
                    i.event.add(this, n, f, u, r)
                })
            },
            one: function(n, t, i, r) {
                return this.on(n, t, i, r, 1)
            },
            off: function(n, r, u) {
                var f, e;
                if (n && n.preventDefault && n.handleObj) return f = n.handleObj, i(n.delegateTarget).off(f.namespace ? f.origType + "." + f.namespace : f.origType, f.selector, f.handler), this;
                if ("object" == typeof n) {
                    for (e in n) this.off(e, r, n[e]);
                    return this
                }
                return (r === !1 || "function" == typeof r) && (u = r, r = t), u === !1 && (u = g), this.each(function() {
                    i.event.remove(this, n, u, r)
                })
            },
            trigger: function(n, t) {
                return this.each(function() {
                    i.event.trigger(n, t, this)
                })
            },
            triggerHandler: function(n, r) {
                var u = this[0];
                return u ? i.event.trigger(n, r, u, !0) : t
            }
        });
        var oe = /^.[^:#\[\.,]*$/,
            se = /^(?:parents|prev(?:Until|All))/,
            lr = i.expr.match.needsContext,
            he = {
                children: !0,
                contents: !0,
                next: !0,
                prev: !0
            };
        i.fn.extend({
            find: function(n) {
                var t, r = [],
                    u = this,
                    f = u.length;
                if ("string" != typeof n) return this.pushStack(i(n).filter(function() {
                    for (t = 0; f > t; t++)
                        if (i.contains(u[t], this)) return !0
                }));
                for (t = 0; f > t; t++) i.find(n, u[t], r);
                return r = this.pushStack(f > 1 ? i.unique(r) : r), r.selector = this.selector ? this.selector + " " + n : n, r
            },
            has: function(n) {
                var t, r = i(n, this),
                    u = r.length;
                return this.filter(function() {
                    for (t = 0; u > t; t++)
                        if (i.contains(this, r[t])) return !0
                })
            },
            not: function(n) {
                return this.pushStack(fi(this, n || [], !0))
            },
            filter: function(n) {
                return this.pushStack(fi(this, n || [], !1))
            },
            is: function(n) {
                return !!fi(this, "string" == typeof n && lr.test(n) ? i(n) : n || [], !1).length
            },
            closest: function(n, t) {
                for (var r, f = 0, o = this.length, u = [], e = lr.test(n) || "string" != typeof n ? i(n, t || this.context) : 0; o > f; f++)
                    for (r = this[f]; r && r !== t; r = r.parentNode)
                        if (11 > r.nodeType && (e ? e.index(r) > -1 : 1 === r.nodeType && i.find.matchesSelector(r, n))) {
                            r = u.push(r);
                            break
                        }
                return this.pushStack(u.length > 1 ? i.unique(u) : u)
            },
            index: function(n) {
                return n ? "string" == typeof n ? i.inArray(this[0], i(n)) : i.inArray(n.jquery ? n[0] : n, this) : this[0] && this[0].parentNode ? this.first().prevAll().length : -1
            },
            add: function(n, t) {
                var r = "string" == typeof n ? i(n, t) : i.makeArray(n && n.nodeType ? [n] : n),
                    u = i.merge(this.get(), r);
                return this.pushStack(i.unique(u))
            },
            addBack: function(n) {
                return this.add(null == n ? this.prevObject : this.prevObject.filter(n))
            }
        });
        i.each({
            parent: function(n) {
                var t = n.parentNode;
                return t && 11 !== t.nodeType ? t : null
            },
            parents: function(n) {
                return i.dir(n, "parentNode")
            },
            parentsUntil: function(n, t, r) {
                return i.dir(n, "parentNode", r)
            },
            next: function(n) {
                return ar(n, "nextSibling")
            },
            prev: function(n) {
                return ar(n, "previousSibling")
            },
            nextAll: function(n) {
                return i.dir(n, "nextSibling")
            },
            prevAll: function(n) {
                return i.dir(n, "previousSibling")
            },
            nextUntil: function(n, t, r) {
                return i.dir(n, "nextSibling", r)
            },
            prevUntil: function(n, t, r) {
                return i.dir(n, "previousSibling", r)
            },
            siblings: function(n) {
                return i.sibling((n.parentNode || {}).firstChild, n)
            },
            children: function(n) {
                return i.sibling(n.firstChild)
            },
            contents: function(n) {
                return i.nodeName(n, "iframe") ? n.contentDocument || n.contentWindow.document : i.merge([], n.childNodes)
            }
        }, function(n, t) {
            i.fn[n] = function(r, u) {
                var f = i.map(this, t, r);
                return "Until" !== n.slice(-5) && (u = r), u && "string" == typeof u && (f = i.filter(u, f)), this.length > 1 && (he[n] || (f = i.unique(f)), se.test(n) && (f = f.reverse())), this.pushStack(f)
            }
        });
        i.extend({
            filter: function(n, t, r) {
                var u = t[0];
                return r && (n = ":not(" + n + ")"), 1 === t.length && 1 === u.nodeType ? i.find.matchesSelector(u, n) ? [u] : [] : i.find.matches(n, i.grep(t, function(n) {
                    return 1 === n.nodeType
                }))
            },
            dir: function(n, r, u) {
                for (var e = [], f = n[r]; f && 9 !== f.nodeType && (u === t || 1 !== f.nodeType || !i(f).is(u));) 1 === f.nodeType && e.push(f), f = f[r];
                return e
            },
            sibling: function(n, t) {
                for (var i = []; n; n = n.nextSibling) 1 === n.nodeType && n !== t && i.push(n);
                return i
            }
        });
        var yr = "abbr|article|aside|audio|bdi|canvas|data|datalist|details|figcaption|figure|footer|header|hgroup|mark|meter|nav|output|progress|section|summary|time|video",
            ce = / jQuery\d+="(?:null|\d+)"/g,
            pr = RegExp("<(?:" + yr + ")[\\s/>]", "i"),
            ei = /^\s+/,
            wr = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi,
            br = /<([\w:]+)/,
            kr = /<tbody/i,
            le = /<|&#?\w+;/,
            ae = /<(?:script|style|link)/i,
            oi = /^(?:checkbox|radio)$/i,
            ve = /checked\s*(?:[^=]|=\s*.checked.)/i,
            dr = /^$|\/(?:java|ecma)script/i,
            ye = /^true\/(.*)/,
            pe = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g,
            e = {
                option: [1, "<select multiple='multiple'>", "<\/select>"],
                legend: [1, "<fieldset>", "<\/fieldset>"],
                area: [1, "<map>", "<\/map>"],
                param: [1, "<object>", "<\/object>"],
                thead: [1, "<table>", "<\/table>"],
                tr: [2, "<table><tbody>", "<\/tbody><\/table>"],
                col: [2, "<table><tbody><\/tbody><colgroup>", "<\/colgroup><\/table>"],
                td: [3, "<table><tbody><tr>", "<\/tr><\/tbody><\/table>"],
                _default: i.support.htmlSerialize ? [0, "", ""] : [1, "X<div>", "<\/div>"]
            },
            we = vr(r),
            si = we.appendChild(r.createElement("div"));
        e.optgroup = e.option;
        e.tbody = e.tfoot = e.colgroup = e.caption = e.thead;
        e.th = e.td;
        i.fn.extend({
            text: function(n) {
                return i.access(this, function(n) {
                    return n === t ? i.text(this) : this.empty().append((this[0] && this[0].ownerDocument || r).createTextNode(n))
                }, null, n, arguments.length)
            },
            append: function() {
                return this.domManip(arguments, function(n) {
                    if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                        var t = gr(this, n);
                        t.appendChild(n)
                    }
                })
            },
            prepend: function() {
                return this.domManip(arguments, function(n) {
                    if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                        var t = gr(this, n);
                        t.insertBefore(n, t.firstChild)
                    }
                })
            },
            before: function() {
                return this.domManip(arguments, function(n) {
                    this.parentNode && this.parentNode.insertBefore(n, this)
                })
            },
            after: function() {
                return this.domManip(arguments, function(n) {
                    this.parentNode && this.parentNode.insertBefore(n, this.nextSibling)
                })
            },
            remove: function(n, t) {
                for (var r, e = n ? i.filter(n, this) : this, f = 0; null != (r = e[f]); f++) t || 1 !== r.nodeType || i.cleanData(u(r)), r.parentNode && (t && i.contains(r.ownerDocument, r) && hi(u(r, "script")), r.parentNode.removeChild(r));
                return this
            },
            empty: function() {
                for (var n, t = 0; null != (n = this[t]); t++) {
                    for (1 === n.nodeType && i.cleanData(u(n, !1)); n.firstChild;) n.removeChild(n.firstChild);
                    n.options && i.nodeName(n, "select") && (n.options.length = 0)
                }
                return this
            },
            clone: function(n, t) {
                return n = null == n ? !1 : n, t = null == t ? n : t, this.map(function() {
                    return i.clone(this, n, t)
                })
            },
            html: function(n) {
                return i.access(this, function(n) {
                    var r = this[0] || {},
                        f = 0,
                        o = this.length;
                    if (n === t) return 1 === r.nodeType ? r.innerHTML.replace(ce, "") : t;
                    if (!("string" != typeof n || ae.test(n) || !i.support.htmlSerialize && pr.test(n) || !i.support.leadingWhitespace && ei.test(n) || e[(br.exec(n) || ["", ""])[1].toLowerCase()])) {
                        n = n.replace(wr, "<$1><\/$2>");
                        try {
                            for (; o > f; f++) r = this[f] || {}, 1 === r.nodeType && (i.cleanData(u(r, !1)), r.innerHTML = n);
                            r = 0
                        } catch (s) {}
                    }
                    r && this.empty().append(n)
                }, null, n, arguments.length)
            },
            replaceWith: function() {
                var t = i.map(this, function(n) {
                        return [n.nextSibling, n.parentNode]
                    }),
                    n = 0;
                return this.domManip(arguments, function(r) {
                    var u = t[n++],
                        f = t[n++];
                    f && (u && u.parentNode !== f && (u = this.nextSibling), i(this).remove(), f.insertBefore(r, u))
                }, !0), n ? this : this.remove()
            },
            detach: function(n) {
                return this.remove(n, !0)
            },
            domManip: function(n, t, r) {
                n = di.apply([], n);
                var h, f, c, o, v, s, e = 0,
                    l = this.length,
                    p = this,
                    w = l - 1,
                    a = n[0],
                    y = i.isFunction(a);
                if (y || !(1 >= l || "string" != typeof a || i.support.checkClone) && ve.test(a)) return this.each(function(i) {
                    var u = p.eq(i);
                    y && (n[0] = a.call(this, i, u.html()));
                    u.domManip(n, t, r)
                });
                if (l && (s = i.buildFragment(n, this[0].ownerDocument, !1, !r && this), h = s.firstChild, 1 === s.childNodes.length && (s = h), h)) {
                    for (o = i.map(u(s, "script"), nu), c = o.length; l > e; e++) f = s, e !== w && (f = i.clone(f, !0, !0), c && i.merge(o, u(f, "script"))), t.call(this[e], f, e);
                    if (c)
                        for (v = o[o.length - 1].ownerDocument, i.map(o, tu), e = 0; c > e; e++) f = o[e], dr.test(f.type || "") && !i._data(f, "globalEval") && i.contains(v, f) && (f.src ? i._evalUrl(f.src) : i.globalEval((f.text || f.textContent || f.innerHTML || "").replace(pe, "")));
                    s = h = null
                }
                return this
            }
        });
        i.each({
            appendTo: "append",
            prependTo: "prepend",
            insertBefore: "before",
            insertAfter: "after",
            replaceAll: "replaceWith"
        }, function(n, t) {
            i.fn[n] = function(n) {
                for (var u, r = 0, f = [], e = i(n), o = e.length - 1; o >= r; r++) u = r === o ? this : this.clone(!0), i(e[r])[t](u), kt.apply(f, u.get());
                return this.pushStack(f)
            }
        });
        i.extend({
            clone: function(n, t, r) {
                var f, h, o, e, s, c = i.contains(n.ownerDocument, n);
                if (i.support.html5Clone || i.isXMLDoc(n) || !pr.test("<" + n.nodeName + ">") ? o = n.cloneNode(!0) : (si.innerHTML = n.outerHTML, si.removeChild(o = si.firstChild)), !(i.support.noCloneEvent && i.support.noCloneChecked || 1 !== n.nodeType && 11 !== n.nodeType || i.isXMLDoc(n)))
                    for (f = u(o), s = u(n), e = 0; null != (h = s[e]); ++e) f[e] && be(h, f[e]);
                if (t)
                    if (r)
                        for (s = s || u(n), f = f || u(o), e = 0; null != (h = s[e]); e++) iu(h, f[e]);
                    else iu(n, o);
                return f = u(o, "script"), f.length > 0 && hi(f, !c && u(n, "script")), f = s = h = null, o
            },
            buildFragment: function(n, t, r, f) {
                for (var h, o, w, s, y, p, l, b = n.length, a = vr(t), c = [], v = 0; b > v; v++)
                    if (o = n[v], o || 0 === o)
                        if ("object" === i.type(o)) i.merge(c, o.nodeType ? [o] : o);
                        else if (le.test(o)) {
                    for (s = s || a.appendChild(t.createElement("div")), y = (br.exec(o) || ["", ""])[1].toLowerCase(), l = e[y] || e._default, s.innerHTML = l[1] + o.replace(wr, "<$1><\/$2>") + l[2], h = l[0]; h--;) s = s.lastChild;
                    if (!i.support.leadingWhitespace && ei.test(o) && c.push(t.createTextNode(ei.exec(o)[0])), !i.support.tbody)
                        for (o = "table" !== y || kr.test(o) ? "<table>" !== l[1] || kr.test(o) ? 0 : s : s.firstChild, h = o && o.childNodes.length; h--;) i.nodeName(p = o.childNodes[h], "tbody") && !p.childNodes.length && o.removeChild(p);
                    for (i.merge(c, s.childNodes), s.textContent = ""; s.firstChild;) s.removeChild(s.firstChild);
                    s = a.lastChild
                } else c.push(t.createTextNode(o));
                for (s && a.removeChild(s), i.support.appendChecked || i.grep(u(c, "input"), ke), v = 0; o = c[v++];)
                    if ((!f || -1 === i.inArray(o, f)) && (w = i.contains(o.ownerDocument, o), s = u(a.appendChild(o), "script"), w && hi(s), r))
                        for (h = 0; o = s[h++];) dr.test(o.type || "") && r.push(o);
                return s = null, a
            },
            cleanData: function(n, t) {
                for (var r, f, u, e, c = 0, s = i.expando, h = i.cache, l = i.support.deleteExpando, a = i.event.special; null != (r = n[c]); c++)
                    if ((t || i.acceptData(r)) && (u = r[s], e = u && h[u])) {
                        if (e.events)
                            for (f in e.events) a[f] ? i.event.remove(r, f) : i.removeEvent(r, f, e.handle);
                        h[u] && (delete h[u], l ? delete r[s] : typeof r.removeAttribute !== o ? r.removeAttribute(s) : r[s] = null, b.push(u))
                    }
            },
            _evalUrl: function(n) {
                return i.ajax({
                    url: n,
                    type: "GET",
                    dataType: "script",
                    async: !1,
                    global: !1,
                    throws: !0
                })
            }
        });
        i.fn.extend({
            wrapAll: function(n) {
                if (i.isFunction(n)) return this.each(function(t) {
                    i(this).wrapAll(n.call(this, t))
                });
                if (this[0]) {
                    var t = i(n, this[0].ownerDocument).eq(0).clone(!0);
                    this[0].parentNode && t.insertBefore(this[0]);
                    t.map(function() {
                        for (var n = this; n.firstChild && 1 === n.firstChild.nodeType;) n = n.firstChild;
                        return n
                    }).append(this)
                }
                return this
            },
            wrapInner: function(n) {
                return i.isFunction(n) ? this.each(function(t) {
                    i(this).wrapInner(n.call(this, t))
                }) : this.each(function() {
                    var t = i(this),
                        r = t.contents();
                    r.length ? r.wrapAll(n) : t.append(n)
                })
            },
            wrap: function(n) {
                var t = i.isFunction(n);
                return this.each(function(r) {
                    i(this).wrapAll(t ? n.call(this, r) : n)
                })
            },
            unwrap: function() {
                return this.parent().each(function() {
                    i.nodeName(this, "body") || i(this).replaceWith(this.childNodes)
                }).end()
            }
        });
        var rt, v, y, ci = /alpha\([^)]*\)/i,
            de = /opacity\s*=\s*([^)]*)/,
            ge = /^(top|right|bottom|left)$/,
            no = /^(none|table(?!-c[ea]).+)/,
            ru = /^margin/,
            to = RegExp("^(" + st + ")(.*)$", "i"),
            lt = RegExp("^(" + st + ")(?!px)[a-z%]+$", "i"),
            io = RegExp("^([+-])=(" + st + ")", "i"),
            uu = {
                BODY: "block"
            },
            ro = {
                position: "absolute",
                visibility: "hidden",
                display: "block"
            },
            fu = {
                letterSpacing: 0,
                fontWeight: 400
            },
            p = ["Top", "Right", "Bottom", "Left"],
            eu = ["Webkit", "O", "Moz", "ms"];
        i.fn.extend({
            css: function(n, r) {
                return i.access(this, function(n, r, u) {
                    var e, o, s = {},
                        f = 0;
                    if (i.isArray(r)) {
                        for (o = v(n), e = r.length; e > f; f++) s[r[f]] = i.css(n, r[f], !1, o);
                        return s
                    }
                    return u !== t ? i.style(n, r, u) : i.css(n, r)
                }, n, r, arguments.length > 1)
            },
            show: function() {
                return su(this, !0)
            },
            hide: function() {
                return su(this)
            },
            toggle: function(n) {
                return "boolean" == typeof n ? n ? this.show() : this.hide() : this.each(function() {
                    ut(this) ? i(this).show() : i(this).hide()
                })
            }
        });
        i.extend({
            cssHooks: {
                opacity: {
                    get: function(n, t) {
                        if (t) {
                            var i = y(n, "opacity");
                            return "" === i ? "1" : i
                        }
                    }
                }
            },
            cssNumber: {
                columnCount: !0,
                fillOpacity: !0,
                fontWeight: !0,
                lineHeight: !0,
                opacity: !0,
                order: !0,
                orphans: !0,
                widows: !0,
                zIndex: !0,
                zoom: !0
            },
            cssProps: {
                float: i.support.cssFloat ? "cssFloat" : "styleFloat"
            },
            style: function(n, r, u, f) {
                if (n && 3 !== n.nodeType && 8 !== n.nodeType && n.style) {
                    var o, s, e, h = i.camelCase(r),
                        c = n.style;
                    if (r = i.cssProps[h] || (i.cssProps[h] = ou(c, h)), e = i.cssHooks[r] || i.cssHooks[h], u === t) return e && "get" in e && (o = e.get(n, !1, f)) !== t ? o : c[r];
                    if (s = typeof u, "string" === s && (o = io.exec(u)) && (u = (o[1] + 1) * o[2] + parseFloat(i.css(n, r)), s = "number"), !(null == u || "number" === s && isNaN(u) || ("number" !== s || i.cssNumber[h] || (u += "px"), i.support.clearCloneStyle || "" !== u || 0 !== r.indexOf("background") || (c[r] = "inherit"), e && "set" in e && (u = e.set(n, u, f)) === t))) try {
                        c[r] = u
                    } catch (l) {}
                }
            },
            css: function(n, r, u, f) {
                var h, e, o, s = i.camelCase(r);
                return r = i.cssProps[s] || (i.cssProps[s] = ou(n.style, s)), o = i.cssHooks[r] || i.cssHooks[s], o && "get" in o && (e = o.get(n, !0, u)), e === t && (e = y(n, r, f)), "normal" === e && r in fu && (e = fu[r]), "" === u || u ? (h = parseFloat(e), u === !0 || i.isNumeric(h) ? h || 0 : e) : e
            }
        });
        n.getComputedStyle ? (v = function(t) {
            return n.getComputedStyle(t, null)
        }, y = function(n, r, u) {
            var s, h, c, o = u || v(n),
                e = o ? o.getPropertyValue(r) || o[r] : t,
                f = n.style;
            return o && ("" !== e || i.contains(n.ownerDocument, n) || (e = i.style(n, r)), lt.test(e) && ru.test(r) && (s = f.width, h = f.minWidth, c = f.maxWidth, f.minWidth = f.maxWidth = f.width = e, e = o.width, f.width = s, f.minWidth = h, f.maxWidth = c)), e
        }) : r.documentElement.currentStyle && (v = function(n) {
            return n.currentStyle
        }, y = function(n, i, r) {
            var s, e, o, h = r || v(n),
                u = h ? h[i] : t,
                f = n.style;
            return null == u && f && f[i] && (u = f[i]), lt.test(u) && !ge.test(i) && (s = f.left, e = n.runtimeStyle, o = e && e.left, o && (e.left = n.currentStyle.left), f.left = "fontSize" === i ? "1em" : u, u = f.pixelLeft + "px", f.left = s, o && (e.left = o)), "" === u ? "auto" : u
        });
        i.each(["height", "width"], function(n, r) {
            i.cssHooks[r] = {
                get: function(n, u, f) {
                    return u ? 0 === n.offsetWidth && no.test(i.css(n, "display")) ? i.swap(n, ro, function() {
                        return lu(n, r, f)
                    }) : lu(n, r, f) : t
                },
                set: function(n, t, u) {
                    var f = u && v(n);
                    return hu(n, t, u ? cu(n, r, u, i.support.boxSizing && "border-box" === i.css(n, "boxSizing", !1, f), f) : 0)
                }
            }
        });
        i.support.opacity || (i.cssHooks.opacity = {
            get: function(n, t) {
                return de.test((t && n.currentStyle ? n.currentStyle.filter : n.style.filter) || "") ? .01 * parseFloat(RegExp.$1) + "" : t ? "1" : ""
            },
            set: function(n, t) {
                var r = n.style,
                    u = n.currentStyle,
                    e = i.isNumeric(t) ? "alpha(opacity=" + 100 * t + ")" : "",
                    f = u && u.filter || r.filter || "";
                r.zoom = 1;
                (t >= 1 || "" === t) && "" === i.trim(f.replace(ci, "")) && r.removeAttribute && (r.removeAttribute("filter"), "" === t || u && !u.filter) || (r.filter = ci.test(f) ? f.replace(ci, e) : f + " " + e)
            }
        });
        i(function() {
            i.support.reliableMarginRight || (i.cssHooks.marginRight = {
                get: function(n, r) {
                    return r ? i.swap(n, {
                        display: "inline-block"
                    }, y, [n, "marginRight"]) : t
                }
            });
            !i.support.pixelPosition && i.fn.position && i.each(["top", "left"], function(n, r) {
                i.cssHooks[r] = {
                    get: function(n, u) {
                        return u ? (u = y(n, r), lt.test(u) ? i(n).position()[r] + "px" : u) : t
                    }
                }
            })
        });
        i.expr && i.expr.filters && (i.expr.filters.hidden = function(n) {
            return 0 >= n.offsetWidth && 0 >= n.offsetHeight || !i.support.reliableHiddenOffsets && "none" === (n.style && n.style.display || i.css(n, "display"))
        }, i.expr.filters.visible = function(n) {
            return !i.expr.filters.hidden(n)
        });
        i.each({
            margin: "",
            padding: "",
            border: "Width"
        }, function(n, t) {
            i.cssHooks[n + t] = {
                expand: function(i) {
                    for (var r = 0, f = {}, u = "string" == typeof i ? i.split(" ") : [i]; 4 > r; r++) f[n + p[r] + t] = u[r] || u[r - 2] || u[0];
                    return f
                }
            };
            ru.test(n) || (i.cssHooks[n + t].set = hu)
        });
        var uo = /%20/g,
            fo = /\[\]$/,
            yu = /\r?\n/g,
            eo = /^(?:submit|button|image|reset|file)$/i,
            oo = /^(?:input|select|textarea|keygen)/i;
        i.fn.extend({
            serialize: function() {
                return i.param(this.serializeArray())
            },
            serializeArray: function() {
                return this.map(function() {
                    var n = i.prop(this, "elements");
                    return n ? i.makeArray(n) : this
                }).filter(function() {
                    var n = this.type;
                    return this.name && !i(this).is(":disabled") && oo.test(this.nodeName) && !eo.test(n) && (this.checked || !oi.test(n))
                }).map(function(n, t) {
                    var r = i(this).val();
                    return null == r ? null : i.isArray(r) ? i.map(r, function(n) {
                        return {
                            name: t.name,
                            value: n.replace(yu, "\r\n")
                        }
                    }) : {
                        name: t.name,
                        value: r.replace(yu, "\r\n")
                    }
                }).get()
            }
        });
        i.param = function(n, r) {
            var u, f = [],
                e = function(n, t) {
                    t = i.isFunction(t) ? t() : null == t ? "" : t;
                    f[f.length] = encodeURIComponent(n) + "=" + encodeURIComponent(t)
                };
            if (r === t && (r = i.ajaxSettings && i.ajaxSettings.traditional), i.isArray(n) || n.jquery && !i.isPlainObject(n)) i.each(n, function() {
                e(this.name, this.value)
            });
            else
                for (u in n) li(u, n[u], r, e);
            return f.join("&").replace(uo, "+")
        };
        i.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "), function(n, t) {
            i.fn[t] = function(n, i) {
                return arguments.length > 0 ? this.on(t, null, n, i) : this.trigger(t)
            }
        });
        i.fn.extend({
            hover: function(n, t) {
                return this.mouseenter(n).mouseleave(t || n)
            },
            bind: function(n, t, i) {
                return this.on(n, null, t, i)
            },
            unbind: function(n, t) {
                return this.off(n, null, t)
            },
            delegate: function(n, t, i, r) {
                return this.on(t, n, i, r)
            },
            undelegate: function(n, t, i) {
                return 1 === arguments.length ? this.off(n, "**") : this.off(t, n || "**", i)
            }
        });
        var w, c, ai = i.now(),
            vi = /\?/,
            so = /#.*$/,
            pu = /([?&])_=[^&]*/,
            ho = /^(.*?):[ \t]*([^\r\n]*)\r?$/gm,
            co = /^(?:GET|HEAD)$/,
            lo = /^\/\//,
            wu = /^([\w.+-]+:)(?:\/\/([^\/?#:]*)(?::(\d+)|)|)/,
            bu = i.fn.load,
            ku = {},
            yi = {},
            du = "*/".concat("*");
        try {
            c = hf.href
        } catch (go) {
            c = r.createElement("a");
            c.href = "";
            c = c.href
        }
        w = wu.exec(c.toLowerCase()) || [];
        i.fn.load = function(n, r, u) {
            if ("string" != typeof n && bu) return bu.apply(this, arguments);
            var f, s, h, e = this,
                o = n.indexOf(" ");
            return o >= 0 && (f = n.slice(o, n.length), n = n.slice(0, o)), i.isFunction(r) ? (u = r, r = t) : r && "object" == typeof r && (h = "POST"), e.length > 0 && i.ajax({
                url: n,
                type: h,
                dataType: "html",
                data: r
            }).done(function(n) {
                s = arguments;
                e.html(f ? i("<div>").append(i.parseHTML(n)).find(f) : n)
            }).complete(u && function(n, t) {
                e.each(u, s || [n.responseText, t, n])
            }), this
        };
        i.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], function(n, t) {
            i.fn[t] = function(n) {
                return this.on(t, n)
            }
        });
        i.extend({
            active: 0,
            lastModified: {},
            etag: {},
            ajaxSettings: {
                url: c,
                type: "GET",
                isLocal: /^(?:about|app|app-storage|.+-extension|file|res|widget):$/.test(w[1]),
                global: !0,
                processData: !0,
                async: !0,
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                accepts: {
                    "*": du,
                    text: "text/plain",
                    html: "text/html",
                    xml: "application/xml, text/xml",
                    json: "application/json, text/javascript"
                },
                contents: {
                    xml: /xml/,
                    html: /html/,
                    json: /json/
                },
                responseFields: {
                    xml: "responseXML",
                    text: "responseText",
                    json: "responseJSON"
                },
                converters: {
                    "* text": String,
                    "text html": !0,
                    "text json": i.parseJSON,
                    "text xml": i.parseXML
                },
                flatOptions: {
                    url: !0,
                    context: !0
                }
            },
            ajaxSetup: function(n, t) {
                return t ? pi(pi(n, i.ajaxSettings), t) : pi(i.ajaxSettings, n)
            },
            ajaxPrefilter: gu(ku),
            ajaxTransport: gu(yi),
            ajax: function(n, r) {
                function k(n, r, s, c) {
                    var a, rt, k, p, w, l = r;
                    2 !== o && (o = 2, g && clearTimeout(g), y = t, d = c || "", f.readyState = n > 0 ? 4 : 0, a = n >= 200 && 300 > n || 304 === n, s && (p = ao(u, f, s)), p = vo(u, p, f, a), a ? (u.ifModified && (w = f.getResponseHeader("Last-Modified"), w && (i.lastModified[e] = w), w = f.getResponseHeader("etag"), w && (i.etag[e] = w)), 204 === n || "HEAD" === u.type ? l = "nocontent" : 304 === n ? l = "notmodified" : (l = p.state, rt = p.data, k = p.error, a = !k)) : (k = l, (n || !l) && (l = "error", 0 > n && (n = 0))), f.status = n, f.statusText = (r || l) + "", a ? tt.resolveWith(h, [rt, l, f]) : tt.rejectWith(h, [f, l, k]), f.statusCode(b), b = t, v && nt.trigger(a ? "ajaxSuccess" : "ajaxError", [f, u, a ? rt : k]), it.fireWith(h, [f, l]), v && (nt.trigger("ajaxComplete", [f, u]), --i.active || i.event.trigger("ajaxStop")))
                }
                "object" == typeof n && (r = n, n = t);
                r = r || {};
                var l, a, e, d, g, v, y, p, u = i.ajaxSetup({}, r),
                    h = u.context || u,
                    nt = u.context && (h.nodeType || h.jquery) ? i(h) : i.event,
                    tt = i.Deferred(),
                    it = i.Callbacks("once memory"),
                    b = u.statusCode || {},
                    rt = {},
                    ut = {},
                    o = 0,
                    ft = "canceled",
                    f = {
                        readyState: 0,
                        getResponseHeader: function(n) {
                            var t;
                            if (2 === o) {
                                if (!p)
                                    for (p = {}; t = ho.exec(d);) p[t[1].toLowerCase()] = t[2];
                                t = p[n.toLowerCase()]
                            }
                            return null == t ? null : t
                        },
                        getAllResponseHeaders: function() {
                            return 2 === o ? d : null
                        },
                        setRequestHeader: function(n, t) {
                            var i = n.toLowerCase();
                            return o || (n = ut[i] = ut[i] || n, rt[n] = t), this
                        },
                        overrideMimeType: function(n) {
                            return o || (u.mimeType = n), this
                        },
                        statusCode: function(n) {
                            var t;
                            if (n)
                                if (2 > o)
                                    for (t in n) b[t] = [b[t], n[t]];
                                else f.always(n[f.status]);
                            return this
                        },
                        abort: function(n) {
                            var t = n || ft;
                            return y && y.abort(t), k(0, t), this
                        }
                    };
                if (tt.promise(f).complete = it.add, f.success = f.done, f.error = f.fail, u.url = ((n || u.url || c) + "").replace(so, "").replace(lo, w[1] + "//"), u.type = r.method || r.type || u.method || u.type, u.dataTypes = i.trim(u.dataType || "*").toLowerCase().match(s) || [""], null == u.crossDomain && (l = wu.exec(u.url.toLowerCase()), u.crossDomain = !(!l || l[1] === w[1] && l[2] === w[2] && (l[3] || ("http:" === l[1] ? "80" : "443")) === (w[3] || ("http:" === w[1] ? "80" : "443")))), u.data && u.processData && "string" != typeof u.data && (u.data = i.param(u.data, u.traditional)), nf(ku, u, r, f), 2 === o) return f;
                v = u.global;
                v && 0 == i.active++ && i.event.trigger("ajaxStart");
                u.type = u.type.toUpperCase();
                u.hasContent = !co.test(u.type);
                e = u.url;
                u.hasContent || (u.data && (e = u.url += (vi.test(e) ? "&" : "?") + u.data, delete u.data), u.cache === !1 && (u.url = pu.test(e) ? e.replace(pu, "$1_=" + ai++) : e + (vi.test(e) ? "&" : "?") + "_=" + ai++));
                u.ifModified && (i.lastModified[e] && f.setRequestHeader("If-Modified-Since", i.lastModified[e]), i.etag[e] && f.setRequestHeader("If-None-Match", i.etag[e]));
                (u.data && u.hasContent && u.contentType !== !1 || r.contentType) && f.setRequestHeader("Content-Type", u.contentType);
                f.setRequestHeader("Accept", u.dataTypes[0] && u.accepts[u.dataTypes[0]] ? u.accepts[u.dataTypes[0]] + ("*" !== u.dataTypes[0] ? ", " + du + "; q=0.01" : "") : u.accepts["*"]);
                for (a in u.headers) f.setRequestHeader(a, u.headers[a]);
                if (u.beforeSend && (u.beforeSend.call(h, f, u) === !1 || 2 === o)) return f.abort();
                ft = "abort";
                for (a in {
                        success: 1,
                        error: 1,
                        complete: 1
                    }) f[a](u[a]);
                if (y = nf(yi, u, r, f)) {
                    f.readyState = 1;
                    v && nt.trigger("ajaxSend", [f, u]);
                    u.async && u.timeout > 0 && (g = setTimeout(function() {
                        f.abort("timeout")
                    }, u.timeout));
                    try {
                        o = 1;
                        y.send(rt, k)
                    } catch (et) {
                        if (!(2 > o)) throw et;
                        k(-1, et)
                    }
                } else k(-1, "No Transport");
                return f
            },
            getJSON: function(n, t, r) {
                return i.get(n, t, r, "json")
            },
            getScript: function(n, r) {
                return i.get(n, t, r, "script")
            }
        });
        i.each(["get", "post"], function(n, r) {
            i[r] = function(n, u, f, e) {
                return i.isFunction(u) && (e = e || f, f = u, u = t), i.ajax({
                    url: n,
                    type: r,
                    dataType: e,
                    data: u,
                    success: f
                })
            }
        });
        i.ajaxSetup({
            accepts: {
                script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"
            },
            contents: {
                script: /(?:java|ecma)script/
            },
            converters: {
                "text script": function(n) {
                    return i.globalEval(n), n
                }
            }
        });
        i.ajaxPrefilter("script", function(n) {
            n.cache === t && (n.cache = !1);
            n.crossDomain && (n.type = "GET", n.global = !1)
        });
        i.ajaxTransport("script", function(n) {
            if (n.crossDomain) {
                var u, f = r.head || i("head")[0] || r.documentElement;
                return {
                    send: function(t, i) {
                        u = r.createElement("script");
                        u.async = !0;
                        n.scriptCharset && (u.charset = n.scriptCharset);
                        u.src = n.url;
                        u.onload = u.onreadystatechange = function(n, t) {
                            (t || !u.readyState || /loaded|complete/.test(u.readyState)) && (u.onload = u.onreadystatechange = null, u.parentNode && u.parentNode.removeChild(u), u = null, t || i(200, "success"))
                        };
                        f.insertBefore(u, f.firstChild)
                    },
                    abort: function() {
                        u && u.onload(t, !0)
                    }
                }
            }
        });
        wi = [];
        at = /(=)\?(?=&|$)|\?\?/;
        i.ajaxSetup({
            jsonp: "callback",
            jsonpCallback: function() {
                var n = wi.pop() || i.expando + "_" + ai++;
                return this[n] = !0, n
            }
        });
        i.ajaxPrefilter("json jsonp", function(r, u, f) {
            var e, s, o, h = r.jsonp !== !1 && (at.test(r.url) ? "url" : "string" == typeof r.data && !(r.contentType || "").indexOf("application/x-www-form-urlencoded") && at.test(r.data) && "data");
            return h || "jsonp" === r.dataTypes[0] ? (e = r.jsonpCallback = i.isFunction(r.jsonpCallback) ? r.jsonpCallback() : r.jsonpCallback, h ? r[h] = r[h].replace(at, "$1" + e) : r.jsonp !== !1 && (r.url += (vi.test(r.url) ? "&" : "?") + r.jsonp + "=" + e), r.converters["script json"] = function() {
                return o || i.error(e + " was not called"), o[0]
            }, r.dataTypes[0] = "json", s = n[e], n[e] = function() {
                o = arguments
            }, f.always(function() {
                n[e] = s;
                r[e] && (r.jsonpCallback = u.jsonpCallback, wi.push(e));
                o && i.isFunction(s) && s(o[0]);
                o = s = t
            }), "script") : t
        });
        tf = 0;
        vt = n.ActiveXObject && function() {
            var n;
            for (n in nt) nt[n](t, !0)
        };
        i.ajaxSettings.xhr = n.ActiveXObject ? function() {
            return !this.isLocal && rf() || yo()
        } : rf;
        tt = i.ajaxSettings.xhr();
        i.support.cors = !!tt && "withCredentials" in tt;
        tt = i.support.ajax = !!tt;
        tt && i.ajaxTransport(function(r) {
            if (!r.crossDomain || i.support.cors) {
                var u;
                return {
                    send: function(f, e) {
                        var h, s, o = r.xhr();
                        if (r.username ? o.open(r.type, r.url, r.async, r.username, r.password) : o.open(r.type, r.url, r.async), r.xhrFields)
                            for (s in r.xhrFields) o[s] = r.xhrFields[s];
                        r.mimeType && o.overrideMimeType && o.overrideMimeType(r.mimeType);
                        r.crossDomain || f["X-Requested-With"] || (f["X-Requested-With"] = "XMLHttpRequest");
                        try {
                            for (s in f) o.setRequestHeader(s, f[s])
                        } catch (c) {}
                        o.send(r.hasContent && r.data || null);
                        u = function(n, f) {
                            var s, a, l, c;
                            try {
                                if (u && (f || 4 === o.readyState))
                                    if (u = t, h && (o.onreadystatechange = i.noop, vt && delete nt[h]), f) 4 !== o.readyState && o.abort();
                                    else {
                                        c = {};
                                        s = o.status;
                                        a = o.getAllResponseHeaders();
                                        "string" == typeof o.responseText && (c.text = o.responseText);
                                        try {
                                            l = o.statusText
                                        } catch (y) {
                                            l = ""
                                        }
                                        s || !r.isLocal || r.crossDomain ? 1223 === s && (s = 204) : s = c.text ? 200 : 404
                                    }
                            } catch (v) {
                                f || e(-1, v)
                            }
                            c && e(s, l, c, a)
                        };
                        r.async ? 4 === o.readyState ? setTimeout(u) : (h = ++tf, vt && (nt || (nt = {}, i(n).unload(vt)), nt[h] = u), o.onreadystatechange = u) : u()
                    },
                    abort: function() {
                        u && u(t, !0)
                    }
                }
            }
        });
        var it, yt, po = /^(?:toggle|show|hide)$/,
            uf = RegExp("^(?:([+-])=|)(" + st + ")([a-z%]*)$", "i"),
            wo = /queueHooks$/,
            pt = [ko],
            ft = {
                "*": [function(n, t) {
                    var f = this.createTween(n, t),
                        s = f.cur(),
                        r = uf.exec(t),
                        e = r && r[3] || (i.cssNumber[n] ? "" : "px"),
                        u = (i.cssNumber[n] || "px" !== e && +s) && uf.exec(i.css(f.elem, n)),
                        o = 1,
                        h = 20;
                    if (u && u[3] !== e) {
                        e = e || u[3];
                        r = r || [];
                        u = +s || 1;
                        do o = o || ".5", u /= o, i.style(f.elem, n, u + e); while (o !== (o = f.cur() / s) && 1 !== o && --h)
                    }
                    return r && (u = f.start = +u || +s || 0, f.unit = e, f.end = r[1] ? u + (r[1] + 1) * r[2] : +r[2]), f
                }]
            };
        i.Animation = i.extend(of, {
            tweener: function(n, t) {
                i.isFunction(n) ? (t = n, n = ["*"]) : n = n.split(" ");
                for (var r, u = 0, f = n.length; f > u; u++) r = n[u], ft[r] = ft[r] || [], ft[r].unshift(t)
            },
            prefilter: function(n, t) {
                t ? pt.unshift(n) : pt.push(n)
            }
        });
        i.Tween = f;
        f.prototype = {
            constructor: f,
            init: function(n, t, r, u, f, e) {
                this.elem = n;
                this.prop = r;
                this.easing = f || "swing";
                this.options = t;
                this.start = this.now = this.cur();
                this.end = u;
                this.unit = e || (i.cssNumber[r] ? "" : "px")
            },
            cur: function() {
                var n = f.propHooks[this.prop];
                return n && n.get ? n.get(this) : f.propHooks._default.get(this)
            },
            run: function(n) {
                var r, t = f.propHooks[this.prop];
                return this.pos = r = this.options.duration ? i.easing[this.easing](n, this.options.duration * n, 0, 1, this.options.duration) : n, this.now = (this.end - this.start) * r + this.start, this.options.step && this.options.step.call(this.elem, this.now, this), t && t.set ? t.set(this) : f.propHooks._default.set(this), this
            }
        };
        f.prototype.init.prototype = f.prototype;
        f.propHooks = {
            _default: {
                get: function(n) {
                    var t;
                    return null == n.elem[n.prop] || n.elem.style && null != n.elem.style[n.prop] ? (t = i.css(n.elem, n.prop, ""), t && "auto" !== t ? t : 0) : n.elem[n.prop]
                },
                set: function(n) {
                    i.fx.step[n.prop] ? i.fx.step[n.prop](n) : n.elem.style && (null != n.elem.style[i.cssProps[n.prop]] || i.cssHooks[n.prop]) ? i.style(n.elem, n.prop, n.now + n.unit) : n.elem[n.prop] = n.now
                }
            }
        };
        f.propHooks.scrollTop = f.propHooks.scrollLeft = {
            set: function(n) {
                n.elem.nodeType && n.elem.parentNode && (n.elem[n.prop] = n.now)
            }
        };
        i.each(["toggle", "show", "hide"], function(n, t) {
            var r = i.fn[t];
            i.fn[t] = function(n, i, u) {
                return null == n || "boolean" == typeof n ? r.apply(this, arguments) : this.animate(wt(t, !0), n, i, u)
            }
        });
        i.fn.extend({
            fadeTo: function(n, t, i, r) {
                return this.filter(ut).css("opacity", 0).show().end().animate({
                    opacity: t
                }, n, i, r)
            },
            animate: function(n, t, r, u) {
                var o = i.isEmptyObject(n),
                    e = i.speed(t, r, u),
                    f = function() {
                        var t = of(this, i.extend({}, n), e);
                        (o || i._data(this, "finish")) && t.stop(!0)
                    };
                return f.finish = f, o || e.queue === !1 ? this.each(f) : this.queue(e.queue, f)
            },
            stop: function(n, r, u) {
                var f = function(n) {
                    var t = n.stop;
                    delete n.stop;
                    t(u)
                };
                return "string" != typeof n && (u = r, r = n, n = t), r && n !== !1 && this.queue(n || "fx", []), this.each(function() {
                    var o = !0,
                        t = null != n && n + "queueHooks",
                        e = i.timers,
                        r = i._data(this);
                    if (t) r[t] && r[t].stop && f(r[t]);
                    else
                        for (t in r) r[t] && r[t].stop && wo.test(t) && f(r[t]);
                    for (t = e.length; t--;) e[t].elem !== this || null != n && e[t].queue !== n || (e[t].anim.stop(u), o = !1, e.splice(t, 1));
                    (o || !u) && i.dequeue(this, n)
                })
            },
            finish: function(n) {
                return n !== !1 && (n = n || "fx"), this.each(function() {
                    var t, f = i._data(this),
                        r = f[n + "queue"],
                        e = f[n + "queueHooks"],
                        u = i.timers,
                        o = r ? r.length : 0;
                    for (f.finish = !0, i.queue(this, n, []), e && e.stop && e.stop.call(this, !0), t = u.length; t--;) u[t].elem === this && u[t].queue === n && (u[t].anim.stop(!0), u.splice(t, 1));
                    for (t = 0; o > t; t++) r[t] && r[t].finish && r[t].finish.call(this);
                    delete f.finish
                })
            }
        });
        i.each({
            slideDown: wt("show"),
            slideUp: wt("hide"),
            slideToggle: wt("toggle"),
            fadeIn: {
                opacity: "show"
            },
            fadeOut: {
                opacity: "hide"
            },
            fadeToggle: {
                opacity: "toggle"
            }
        }, function(n, t) {
            i.fn[n] = function(n, i, r) {
                return this.animate(t, n, i, r)
            }
        });
        i.speed = function(n, t, r) {
            var u = n && "object" == typeof n ? i.extend({}, n) : {
                complete: r || !r && t || i.isFunction(n) && n,
                duration: n,
                easing: r && t || t && !i.isFunction(t) && t
            };
            return u.duration = i.fx.off ? 0 : "number" == typeof u.duration ? u.duration : u.duration in i.fx.speeds ? i.fx.speeds[u.duration] : i.fx.speeds._default, (null == u.queue || u.queue === !0) && (u.queue = "fx"), u.old = u.complete, u.complete = function() {
                i.isFunction(u.old) && u.old.call(this);
                u.queue && i.dequeue(this, u.queue)
            }, u
        };
        i.easing = {
            linear: function(n) {
                return n
            },
            swing: function(n) {
                return .5 - Math.cos(n * Math.PI) / 2
            }
        };
        i.timers = [];
        i.fx = f.prototype.init;
        i.fx.tick = function() {
            var u, n = i.timers,
                r = 0;
            for (it = i.now(); n.length > r; r++) u = n[r], u() || n[r] !== u || n.splice(r--, 1);
            n.length || i.fx.stop();
            it = t
        };
        i.fx.timer = function(n) {
            n() && i.timers.push(n) && i.fx.start()
        };
        i.fx.interval = 13;
        i.fx.start = function() {
            yt || (yt = setInterval(i.fx.tick, i.fx.interval))
        };
        i.fx.stop = function() {
            clearInterval(yt);
            yt = null
        };
        i.fx.speeds = {
            slow: 600,
            fast: 200,
            _default: 400
        };
        i.fx.step = {};
        i.expr && i.expr.filters && (i.expr.filters.animated = function(n) {
            return i.grep(i.timers, function(t) {
                return n === t.elem
            }).length
        });
        i.fn.offset = function(n) {
            if (arguments.length) return n === t ? this : this.each(function(t) {
                i.offset.setOffset(this, n, t)
            });
            var r, e, f = {
                    top: 0,
                    left: 0
                },
                u = this[0],
                s = u && u.ownerDocument;
            if (s) return r = s.documentElement, i.contains(r, u) ? (typeof u.getBoundingClientRect !== o && (f = u.getBoundingClientRect()), e = sf(s), {
                top: f.top + (e.pageYOffset || r.scrollTop) - (r.clientTop || 0),
                left: f.left + (e.pageXOffset || r.scrollLeft) - (r.clientLeft || 0)
            }) : f
        };
        i.offset = {
            setOffset: function(n, t, r) {
                var f = i.css(n, "position");
                "static" === f && (n.style.position = "relative");
                var e = i(n),
                    o = e.offset(),
                    l = i.css(n, "top"),
                    a = i.css(n, "left"),
                    v = ("absolute" === f || "fixed" === f) && i.inArray("auto", [l, a]) > -1,
                    u = {},
                    s = {},
                    h, c;
                v ? (s = e.position(), h = s.top, c = s.left) : (h = parseFloat(l) || 0, c = parseFloat(a) || 0);
                i.isFunction(t) && (t = t.call(n, r, o));
                null != t.top && (u.top = t.top - o.top + h);
                null != t.left && (u.left = t.left - o.left + c);
                "using" in t ? t.using.call(n, u) : e.css(u)
            }
        };
        i.fn.extend({
            position: function() {
                if (this[0]) {
                    var n, r, t = {
                            top: 0,
                            left: 0
                        },
                        u = this[0];
                    return "fixed" === i.css(u, "position") ? r = u.getBoundingClientRect() : (n = this.offsetParent(), r = this.offset(), i.nodeName(n[0], "html") || (t = n.offset()), t.top += i.css(n[0], "borderTopWidth", !0), t.left += i.css(n[0], "borderLeftWidth", !0)), {
                        top: r.top - t.top - i.css(u, "marginTop", !0),
                        left: r.left - t.left - i.css(u, "marginLeft", !0)
                    }
                }
            },
            offsetParent: function() {
                return this.map(function() {
                    for (var n = this.offsetParent || ki; n && !i.nodeName(n, "html") && "static" === i.css(n, "position");) n = n.offsetParent;
                    return n || ki
                })
            }
        });
        i.each({
            scrollLeft: "pageXOffset",
            scrollTop: "pageYOffset"
        }, function(n, r) {
            var u = /Y/.test(r);
            i.fn[n] = function(f) {
                return i.access(this, function(n, f, e) {
                    var o = sf(n);
                    return e === t ? o ? r in o ? o[r] : o.document.documentElement[f] : n[f] : (o ? o.scrollTo(u ? i(o).scrollLeft() : e, u ? e : i(o).scrollTop()) : n[f] = e, t)
                }, n, f, arguments.length, null)
            }
        });
        i.each({
            Height: "height",
            Width: "width"
        }, function(n, r) {
            i.each({
                padding: "inner" + n,
                content: r,
                "": "outer" + n
            }, function(u, f) {
                i.fn[f] = function(f, e) {
                    var o = arguments.length && (u || "boolean" != typeof f),
                        s = u || (f === !0 || e === !0 ? "margin" : "border");
                    return i.access(this, function(r, u, f) {
                        var e;
                        return i.isWindow(r) ? r.document.documentElement["client" + n] : 9 === r.nodeType ? (e = r.documentElement, Math.max(r.body["scroll" + n], e["scroll" + n], r.body["offset" + n], e["offset" + n], e["client" + n])) : f === t ? i.css(r, u, s) : i.style(r, u, f, s)
                    }, r, o ? f : t, o, null)
                }
            })
        });
        i.fn.size = function() {
            return this.length
        };
        i.fn.andSelf = i.fn.addBack;
        "object" == typeof module && module && "object" == typeof module.exports ? module.exports = i : (n.jQuery = n.$ = i, "function" == typeof define && define.amd && define("jquery", [], function() {
            return i
        }))
    }(window), jQuery(document).ready(function(n) {
        n(document).delegate(".linkout", "click", function() {
            var t = n(this).attr("data-link");
            window.open(t, "_blank")
        })
    }), !jQuery) throw new Error("Bootstrap requires jQuery"); + function(n) {
    "use strict";

    function t() {
        var i = document.createElement("bootstrap"),
            t = {
                WebkitTransition: "webkitTransitionEnd",
                MozTransition: "transitionend",
                OTransition: "oTransitionEnd otransitionend",
                transition: "transitionend"
            },
            n;
        for (n in t)
            if (void 0 !== i.style[n]) return {
                end: t[n]
            }
    }
    n.fn.emulateTransitionEnd = function(t) {
        var i = !1,
            u = this,
            r;
        n(this).one(n.support.transition.end, function() {
            i = !0
        });
        return r = function() {
            i || n(u).trigger(n.support.transition.end)
        }, setTimeout(r, t), this
    };
    n(function() {
        n.support.transition = t()
    })
}(window.jQuery); + function(n) {
    "use strict";
    var i = '[data-dismiss="alert"]',
        t = function(t) {
            n(t).on("click", i, this.close)
        },
        r;
    t.prototype.close = function(t) {
        function f() {
            i.trigger("closed.bs.alert").remove()
        }
        var u = n(this),
            r = u.attr("data-target"),
            i;
        r || (r = u.attr("href"), r = r && r.replace(/.*(?=#[^\s]*$)/, ""));
        i = n(r);
        t && t.preventDefault();
        i.length || (i = u.hasClass("alert") ? u : u.parent());
        i.trigger(t = n.Event("close.bs.alert"));
        t.isDefaultPrevented() || (i.removeClass("in"), n.support.transition && i.hasClass("fade") ? i.one(n.support.transition.end, f).emulateTransitionEnd(150) : f())
    };
    r = n.fn.alert;
    n.fn.alert = function(i) {
        return this.each(function() {
            var r = n(this),
                u = r.data("bs.alert");
            u || r.data("bs.alert", u = new t(this));
            "string" == typeof i && u[i].call(r)
        })
    };
    n.fn.alert.Constructor = t;
    n.fn.alert.noConflict = function() {
        return n.fn.alert = r, this
    };
    n(document).on("click.bs.alert.data-api", i, t.prototype.close)
}(window.jQuery); + function(n) {
    "use strict";
    var t = function(i, r) {
            this.$element = n(i);
            this.options = n.extend({}, t.DEFAULTS, r)
        },
        i;
    t.DEFAULTS = {
        loadingText: "loading..."
    };
    t.prototype.setState = function(n) {
        var i = "disabled",
            t = this.$element,
            r = t.is("input") ? "val" : "html",
            u = t.data();
        n += "Text";
        u.resetText || t.data("resetText", t[r]());
        t[r](u[n] || this.options[n]);
        setTimeout(function() {
            "loadingText" == n ? t.addClass(i).attr(i, i) : t.removeClass(i).removeAttr(i)
        }, 0)
    };
    t.prototype.toggle = function() {
        var n = this.$element.closest('[data-toggle="buttons"]'),
            t;
        n.length && (t = this.$element.find("input").prop("checked", !this.$element.hasClass("active")).trigger("change"), "radio" === t.prop("type") && n.find(".active").removeClass("active"));
        this.$element.toggleClass("active")
    };
    i = n.fn.button;
    n.fn.button = function(i) {
        return this.each(function() {
            var u = n(this),
                r = u.data("bs.button"),
                f = "object" == typeof i && i;
            r || u.data("bs.button", r = new t(this, f));
            "toggle" == i ? r.toggle() : i && r.setState(i)
        })
    };
    n.fn.button.Constructor = t;
    n.fn.button.noConflict = function() {
        return n.fn.button = i, this
    };
    n(document).on("click.bs.button.data-api", "[data-toggle^=button]", function(t) {
        var i = n(t.target);
        i.hasClass("btn") || (i = i.closest(".btn"));
        i.button("toggle");
        t.preventDefault()
    })
}(window.jQuery); + function(n) {
    "use strict";
    var t = function(t, i) {
            this.$element = n(t);
            this.$indicators = this.$element.find(".carousel-indicators");
            this.options = i;
            this.paused = this.sliding = this.interval = this.$active = this.$items = null;
            "hover" == this.options.pause && this.$element.on("mouseenter", n.proxy(this.pause, this)).on("mouseleave", n.proxy(this.cycle, this))
        },
        i;
    t.DEFAULTS = {
        interval: 5e3,
        pause: "hover",
        wrap: !0
    };
    t.prototype.cycle = function(t) {
        return t || (this.paused = !1), this.interval && clearInterval(this.interval), this.options.interval && !this.paused && (this.interval = setInterval(n.proxy(this.next, this), this.options.interval)), this
    };
    t.prototype.getActiveIndex = function() {
        return this.$active = this.$element.find(".item.active"), this.$items = this.$active.parent().children(), this.$items.index(this.$active)
    };
    t.prototype.to = function(t) {
        var r = this,
            i = this.getActiveIndex();
        if (!(t > this.$items.length - 1) && !(0 > t)) return this.sliding ? this.$element.one("slid", function() {
            r.to(t)
        }) : i == t ? this.pause().cycle() : this.slide(t > i ? "next" : "prev", n(this.$items[t]))
    };
    t.prototype.pause = function(t) {
        return t || (this.paused = !0), this.$element.find(".next, .prev").length && n.support.transition.end && (this.$element.trigger(n.support.transition.end), this.cycle(!0)), this.interval = clearInterval(this.interval), this
    };
    t.prototype.next = function() {
        if (!this.sliding) return this.slide("next")
    };
    t.prototype.prev = function() {
        if (!this.sliding) return this.slide("prev")
    };
    t.prototype.slide = function(t, i) {
        var u = this.$element.find(".item.active"),
            r = i || u[t](),
            s = this.interval,
            f = "next" == t ? "left" : "right",
            h = "next" == t ? "first" : "last",
            o = this,
            e;
        if (!r.length) {
            if (!this.options.wrap) return;
            r = this.$element.find(".item")[h]()
        }
        if (this.sliding = !0, s && this.pause(), e = n.Event("slide.bs.carousel", {
                relatedTarget: r[0],
                direction: f
            }), !r.hasClass("active")) {
            if (this.$indicators.length && (this.$indicators.find(".active").removeClass("active"), this.$element.one("slid", function() {
                    var t = n(o.$indicators.children()[o.getActiveIndex()]);
                    t && t.addClass("active")
                })), n.support.transition && this.$element.hasClass("slide")) {
                if (this.$element.trigger(e), e.isDefaultPrevented()) return;
                r.addClass(t);
                r[0].offsetWidth;
                u.addClass(f);
                r.addClass(f);
                u.one(n.support.transition.end, function() {
                    r.removeClass([t, f].join(" ")).addClass("active");
                    u.removeClass(["active", f].join(" "));
                    o.sliding = !1;
                    setTimeout(function() {
                        o.$element.trigger("slid")
                    }, 0)
                }).emulateTransitionEnd(600)
            } else {
                if (this.$element.trigger(e), e.isDefaultPrevented()) return;
                u.removeClass("active");
                r.addClass("active");
                this.sliding = !1;
                this.$element.trigger("slid")
            }
            return s && this.cycle(), this
        }
    };
    i = n.fn.carousel;
    n.fn.carousel = function(i) {
        return this.each(function() {
            var u = n(this),
                r = u.data("bs.carousel"),
                f = n.extend({}, t.DEFAULTS, u.data(), "object" == typeof i && i),
                e = "string" == typeof i ? i : f.slide;
            r || u.data("bs.carousel", r = new t(this, f));
            "number" == typeof i ? r.to(i) : e ? r[e]() : f.interval && r.pause().cycle()
        })
    };
    n.fn.carousel.Constructor = t;
    n.fn.carousel.noConflict = function() {
        return n.fn.carousel = i, this
    };
    n(document).on("click.bs.carousel.data-api", "[data-slide], [data-slide-to]", function(t) {
        var f, i = n(this),
            r = n(i.attr("data-target") || (f = i.attr("href")) && f.replace(/.*(?=#[^\s]+$)/, "")),
            e = n.extend({}, r.data(), i.data()),
            u = i.attr("data-slide-to");
        u && (e.interval = !1);
        r.carousel(e);
        (u = i.attr("data-slide-to")) && r.data("bs.carousel").to(u);
        t.preventDefault()
    });
    n(window).on("load", function() {
        n('[data-ride="carousel"]').each(function() {
            var t = n(this);
            t.carousel(t.data())
        })
    })
}(window.jQuery); + function(n) {
    "use strict";
    var t = function(i, r) {
            this.$element = n(i);
            this.options = n.extend({}, t.DEFAULTS, r);
            this.transitioning = null;
            this.options.parent && (this.$parent = n(this.options.parent));
            this.options.toggle && this.toggle()
        },
        i;
    t.DEFAULTS = {
        toggle: !0
    };
    t.prototype.dimension = function() {
        var n = this.$element.hasClass("width");
        return n ? "width" : "height"
    };
    t.prototype.show = function() {
        var u, t, r, i, f, e;
        if (!this.transitioning && !this.$element.hasClass("in") && (u = n.Event("show.bs.collapse"), this.$element.trigger(u), !u.isDefaultPrevented())) {
            if (t = this.$parent && this.$parent.find("> .panel > .in"), t && t.length) {
                if (r = t.data("bs.collapse"), r && r.transitioning) return;
                t.collapse("hide");
                r || t.data("bs.collapse", null)
            }
            if (i = this.dimension(), this.$element.removeClass("collapse").addClass("collapsing")[i](0), this.transitioning = 1, f = function() {
                    this.$element.removeClass("collapsing").addClass("in")[i]("auto");
                    this.transitioning = 0;
                    this.$element.trigger("shown.bs.collapse")
                }, !n.support.transition) return f.call(this);
            e = n.camelCase(["scroll", i].join("-"));
            this.$element.one(n.support.transition.end, n.proxy(f, this)).emulateTransitionEnd(350)[i](this.$element[0][e])
        }
    };
    t.prototype.hide = function() {
        var i, t, r;
        if (!this.transitioning && this.$element.hasClass("in") && (i = n.Event("hide.bs.collapse"), this.$element.trigger(i), !i.isDefaultPrevented())) return t = this.dimension(), this.$element[t](this.$element[t]())[0].offsetHeight, this.$element.addClass("collapsing").removeClass("collapse").removeClass("in"), this.transitioning = 1, r = function() {
            this.transitioning = 0;
            this.$element.trigger("hidden.bs.collapse").removeClass("collapsing").addClass("collapse")
        }, n.support.transition ? (this.$element[t](0).one(n.support.transition.end, n.proxy(r, this)).emulateTransitionEnd(350), void 0) : r.call(this)
    };
    t.prototype.toggle = function() {
        this[this.$element.hasClass("in") ? "hide" : "show"]()
    };
    i = n.fn.collapse;
    n.fn.collapse = function(i) {
        return this.each(function() {
            var r = n(this),
                u = r.data("bs.collapse"),
                f = n.extend({}, t.DEFAULTS, r.data(), "object" == typeof i && i);
            u || r.data("bs.collapse", u = new t(this, f));
            "string" == typeof i && u[i]()
        })
    };
    n.fn.collapse.Constructor = t;
    n.fn.collapse.noConflict = function() {
        return n.fn.collapse = i, this
    };
    n(document).on("click.bs.collapse.data-api", "[data-toggle=collapse]", function(t) {
        var e, i = n(this),
            s = i.attr("data-target") || t.preventDefault() || (e = i.attr("href")) && e.replace(/.*(?=#[^\s]+$)/, ""),
            r = n(s),
            u = r.data("bs.collapse"),
            h = u ? "toggle" : i.data(),
            f = i.attr("data-parent"),
            o = f && n(f);
        u && u.transitioning || (o && o.find('[data-toggle=collapse][data-parent="' + f + '"]').not(i).addClass("collapsed"), i[r.hasClass("in") ? "addClass" : "removeClass"]("collapsed"));
        r.collapse(h)
    })
}(window.jQuery); + function(n) {
    "use strict";

    function r() {
        n(e).remove();
        n(i).each(function(t) {
            var i = u(n(this));
            i.hasClass("open") && (i.trigger(t = n.Event("hide.bs.dropdown")), t.isDefaultPrevented() || i.removeClass("open").trigger("hidden.bs.dropdown"))
        })
    }

    function u(t) {
        var i = t.attr("data-target"),
            r;
        return i || (i = t.attr("href"), i = i && /#/.test(i) && i.replace(/.*(?=#[^\s]*$)/, "")), r = i && n(i), r && r.length ? r : t.parent()
    }
    var e = ".dropdown-backdrop",
        i = "[data-toggle=dropdown]",
        t = function(t) {
            n(t).on("click.bs.dropdown", this.toggle)
        },
        f;
    t.prototype.toggle = function(t) {
        var f = n(this),
            i, e;
        if (!f.is(".disabled, :disabled")) {
            if (i = u(f), e = i.hasClass("open"), r(), !e) {
                if ("ontouchstart" in document.documentElement && !i.closest(".navbar-nav").length && n('<div class="dropdown-backdrop"/>').insertAfter(n(this)).on("click", r), i.trigger(t = n.Event("show.bs.dropdown")), t.isDefaultPrevented()) return;
                i.toggleClass("open").trigger("shown.bs.dropdown");
                f.focus()
            }
            return !1
        }
    };
    t.prototype.keydown = function(t) {
        var e, o, s, f, r;
        if (/(38|40|27)/.test(t.keyCode) && (e = n(this), t.preventDefault(), t.stopPropagation(), !e.is(".disabled, :disabled"))) {
            if (o = u(e), s = o.hasClass("open"), !s || s && 27 == t.keyCode) return 27 == t.which && o.find(i).focus(), e.click();
            f = n("[role=menu] li:not(.divider):visible a", o);
            f.length && (r = f.index(f.filter(":focus")), 38 == t.keyCode && r > 0 && r--, 40 == t.keyCode && r < f.length - 1 && r++, ~r || (r = 0), f.eq(r).focus())
        }
    };
    f = n.fn.dropdown;
    n.fn.dropdown = function(i) {
        return this.each(function() {
            var r = n(this),
                u = r.data("dropdown");
            u || r.data("dropdown", u = new t(this));
            "string" == typeof i && u[i].call(r)
        })
    };
    n.fn.dropdown.Constructor = t;
    n.fn.dropdown.noConflict = function() {
        return n.fn.dropdown = f, this
    };
    n(document).on("click.bs.dropdown.data-api", r).on("click.bs.dropdown.data-api", ".dropdown form", function(n) {
        n.stopPropagation()
    }).on("click.bs.dropdown.data-api", i, t.prototype.toggle).on("keydown.bs.dropdown.data-api", i + ", [role=menu]", t.prototype.keydown)
}(window.jQuery); + function(n) {
    "use strict";
    var t = function(t, i) {
            this.options = i;
            this.$element = n(t);
            this.$backdrop = this.isShown = null;
            this.options.remote && this.$element.load(this.options.remote)
        },
        i;
    t.DEFAULTS = {
        backdrop: !0,
        keyboard: !0,
        show: !0
    };
    t.prototype.toggle = function(n) {
        return this[this.isShown ? "hide" : "show"](n)
    };
    t.prototype.show = function(t) {
        var i = this,
            r = n.Event("show.bs.modal", {
                relatedTarget: t
            });
        this.$element.trigger(r);
        this.isShown || r.isDefaultPrevented() || (this.isShown = !0, this.escape(), this.$element.on("click.dismiss.modal", '[data-dismiss="modal"]', n.proxy(this.hide, this)), this.backdrop(function() {
            var u = n.support.transition && i.$element.hasClass("fade"),
                r;
            i.$element.parent().length || i.$element.appendTo(document.body);
            i.$element.show();
            u && i.$element[0].offsetWidth;
            i.$element.addClass("in").attr("aria-hidden", !1);
            i.enforceFocus();
            r = n.Event("shown.bs.modal", {
                relatedTarget: t
            });
            u ? i.$element.find(".modal-dialog").one(n.support.transition.end, function() {
                i.$element.focus().trigger(r)
            }).emulateTransitionEnd(300) : i.$element.focus().trigger(r)
        }))
    };
    t.prototype.hide = function(t) {
        t && t.preventDefault();
        t = n.Event("hide.bs.modal");
        this.$element.trigger(t);
        this.isShown && !t.isDefaultPrevented() && (this.isShown = !1, this.escape(), n(document).off("focusin.bs.modal"), this.$element.removeClass("in").attr("aria-hidden", !0).off("click.dismiss.modal"), n.support.transition && this.$element.hasClass("fade") ? this.$element.one(n.support.transition.end, n.proxy(this.hideModal, this)).emulateTransitionEnd(300) : this.hideModal())
    };
    t.prototype.enforceFocus = function() {
        n(document).off("focusin.bs.modal").on("focusin.bs.modal", n.proxy(function(n) {
            this.$element[0] === n.target || this.$element.has(n.target).length || this.$element.focus()
        }, this))
    };
    t.prototype.escape = function() {
        this.isShown && this.options.keyboard ? this.$element.on("keyup.dismiss.bs.modal", n.proxy(function(n) {
            27 == n.which && this.hide()
        }, this)) : this.isShown || this.$element.off("keyup.dismiss.bs.modal")
    };
    t.prototype.hideModal = function() {
        var n = this;
        this.$element.hide();
        this.backdrop(function() {
            n.removeBackdrop();
            n.$element.trigger("hidden.bs.modal")
        })
    };
    t.prototype.removeBackdrop = function() {
        this.$backdrop && this.$backdrop.remove();
        this.$backdrop = null
    };
    t.prototype.backdrop = function(t) {
        var r = this.$element.hasClass("fade") ? "fade" : "",
            i;
        if (this.isShown && this.options.backdrop) {
            if (i = n.support.transition && r, this.$backdrop = n('<div class="modal-backdrop ' + r + '" />').appendTo(document.body), this.$element.on("click.dismiss.modal", n.proxy(function(n) {
                    n.target === n.currentTarget && ("static" == this.options.backdrop ? this.$element[0].focus.call(this.$element[0]) : this.hide.call(this))
                }, this)), i && this.$backdrop[0].offsetWidth, this.$backdrop.addClass("in"), !t) return;
            i ? this.$backdrop.one(n.support.transition.end, t).emulateTransitionEnd(150) : t()
        } else !this.isShown && this.$backdrop ? (this.$backdrop.removeClass("in"), n.support.transition && this.$element.hasClass("fade") ? this.$backdrop.one(n.support.transition.end, t).emulateTransitionEnd(150) : t()) : t && t()
    };
    i = n.fn.modal;
    n.fn.modal = function(i, r) {
        return this.each(function() {
            var f = n(this),
                u = f.data("bs.modal"),
                e = n.extend({}, t.DEFAULTS, f.data(), "object" == typeof i && i);
            u || f.data("bs.modal", u = new t(this, e));
            "string" == typeof i ? u[i](r) : e.show && u.show(r)
        })
    };
    n.fn.modal.Constructor = t;
    n.fn.modal.noConflict = function() {
        return n.fn.modal = i, this
    };
    n(document).on("click.bs.modal.data-api", '[data-toggle="modal"]', function(t) {
        var i = n(this),
            r = i.attr("href"),
            u = n(i.attr("data-target") || r && r.replace(/.*(?=#[^\s]+$)/, "")),
            f = u.data("modal") ? "toggle" : n.extend({
                remote: !/#/.test(r) && r
            }, u.data(), i.data());
        t.preventDefault();
        u.modal(f, this).one("hide", function() {
            i.is(":visible") && i.focus()
        })
    });
    n(document).on("show.bs.modal", ".modal", function() {
        n(document.body).addClass("modal-open")
    }).on("hidden.bs.modal", ".modal", function() {
        n(document.body).removeClass("modal-open")
    })
}(window.jQuery); + function(n) {
    "use strict";
    var t = function(n, t) {
            this.type = this.options = this.enabled = this.timeout = this.hoverState = this.$element = null;
            this.init("tooltip", n, t)
        },
        i;
    t.DEFAULTS = {
        animation: !0,
        placement: "top",
        selector: !1,
        template: '<div class="tooltip"><div class="tooltip-arrow"><\/div><div class="tooltip-inner"><\/div><\/div>',
        trigger: "hover focus",
        title: "",
        delay: 0,
        html: !1,
        container: !1
    };
    t.prototype.init = function(t, i, r) {
        var f, e, u, o, s;
        for (this.enabled = !0, this.type = t, this.$element = n(i), this.options = this.getOptions(r), f = this.options.trigger.split(" "), e = f.length; e--;)
            if (u = f[e], "click" == u) this.$element.on("click." + this.type, this.options.selector, n.proxy(this.toggle, this));
            else "manual" != u && (o = "hover" == u ? "mouseenter" : "focus", s = "hover" == u ? "mouseleave" : "blur", this.$element.on(o + "." + this.type, this.options.selector, n.proxy(this.enter, this)), this.$element.on(s + "." + this.type, this.options.selector, n.proxy(this.leave, this)));
        this.options.selector ? this._options = n.extend({}, this.options, {
            trigger: "manual",
            selector: ""
        }) : this.fixTitle()
    };
    t.prototype.getDefaults = function() {
        return t.DEFAULTS
    };
    t.prototype.getOptions = function(t) {
        return t = n.extend({}, this.getDefaults(), this.$element.data(), t), t.delay && "number" == typeof t.delay && (t.delay = {
            show: t.delay,
            hide: t.delay
        }), t
    };
    t.prototype.getDelegateOptions = function() {
        var t = {},
            i = this.getDefaults();
        return this._options && n.each(this._options, function(n, r) {
            i[n] != r && (t[n] = r)
        }), t
    };
    t.prototype.enter = function(t) {
        var i = t instanceof this.constructor ? t : n(t.currentTarget)[this.type](this.getDelegateOptions()).data("bs." + this.type);
        return clearTimeout(i.timeout), i.hoverState = "in", i.options.delay && i.options.delay.show ? (i.timeout = setTimeout(function() {
            "in" == i.hoverState && i.show()
        }, i.options.delay.show), void 0) : i.show()
    };
    t.prototype.leave = function(t) {
        var i = t instanceof this.constructor ? t : n(t.currentTarget)[this.type](this.getDelegateOptions()).data("bs." + this.type);
        return clearTimeout(i.timeout), i.hoverState = "out", i.options.delay && i.options.delay.hide ? (i.timeout = setTimeout(function() {
            "out" == i.hoverState && i.hide()
        }, i.options.delay.hide), void 0) : i.hide()
    };
    t.prototype.show = function() {
        var o = n.Event("show.bs." + this.type),
            i, l;
        if (this.hasContent() && this.enabled) {
            if (this.$element.trigger(o), o.isDefaultPrevented()) return;
            i = this.tip();
            this.setContent();
            this.options.animation && i.addClass("fade");
            var t = "function" == typeof this.options.placement ? this.options.placement.call(this, i[0], this.$element[0]) : this.options.placement,
                s = /\s?auto?\s?/i,
                h = s.test(t);
            h && (t = t.replace(s, "") || "top");
            i.detach().css({
                top: 0,
                left: 0,
                display: "block"
            }).addClass(t);
            this.options.container ? i.appendTo(this.options.container) : i.insertAfter(this.$element);
            var r = this.getPosition(),
                u = i[0].offsetWidth,
                f = i[0].offsetHeight;
            if (h) {
                var e = this.$element.parent(),
                    a = t,
                    c = document.documentElement.scrollTop || document.body.scrollTop,
                    v = "body" == this.options.container ? window.innerWidth : e.outerWidth(),
                    y = "body" == this.options.container ? window.innerHeight : e.outerHeight(),
                    p = "body" == this.options.container ? 0 : e.offset().left;
                t = "bottom" == t && r.top + r.height + f - c > y ? "top" : "top" == t && r.top - c - f < 0 ? "bottom" : "right" == t && r.right + u > v ? "left" : "left" == t && r.left - u < p ? "right" : t;
                i.removeClass(a).addClass(t)
            }
            l = this.getCalculatedOffset(t, r, u, f);
            this.applyPlacement(l, t);
            this.$element.trigger("shown.bs." + this.type)
        }
    };
    t.prototype.applyPlacement = function(n, t) {
        var h, i = this.tip(),
            c = i[0].offsetWidth,
            f = i[0].offsetHeight,
            e = parseInt(i.css("margin-top"), 10),
            o = parseInt(i.css("margin-left"), 10),
            u, r, s;
        isNaN(e) && (e = 0);
        isNaN(o) && (o = 0);
        n.top = n.top + e;
        n.left = n.left + o;
        i.offset(n).addClass("in");
        u = i[0].offsetWidth;
        r = i[0].offsetHeight;
        ("top" == t && r != f && (h = !0, n.top = n.top + f - r), /bottom|top/.test(t)) ? (s = 0, n.left < 0 && (s = -2 * n.left, n.left = 0, i.offset(n), u = i[0].offsetWidth, r = i[0].offsetHeight), this.replaceArrow(s - c + u, u, "left")) : this.replaceArrow(r - f, r, "top");
        h && i.offset(n)
    };
    t.prototype.replaceArrow = function(n, t, i) {
        this.arrow().css(i, n ? 50 * (1 - n / t) + "%" : "")
    };
    t.prototype.setContent = function() {
        var n = this.tip(),
            t = this.getTitle();
        n.find(".tooltip-inner")[this.options.html ? "html" : "text"](t);
        n.removeClass("fade in top bottom left right")
    };
    t.prototype.hide = function() {
        function i() {
            "in" != u.hoverState && t.detach()
        }
        var u = this,
            t = this.tip(),
            r = n.Event("hide.bs." + this.type);
        return this.$element.trigger(r), r.isDefaultPrevented() ? void 0 : (t.removeClass("in"), n.support.transition && this.$tip.hasClass("fade") ? t.one(n.support.transition.end, i).emulateTransitionEnd(150) : i(), this.$element.trigger("hidden.bs." + this.type), this)
    };
    t.prototype.fixTitle = function() {
        var n = this.$element;
        (n.attr("title") || "string" != typeof n.attr("data-original-title")) && n.attr("data-original-title", n.attr("title") || "").attr("title", "")
    };
    t.prototype.hasContent = function() {
        return this.getTitle()
    };
    t.prototype.getPosition = function() {
        var t = this.$element[0];
        return n.extend({}, "function" == typeof t.getBoundingClientRect ? t.getBoundingClientRect() : {
            width: t.offsetWidth,
            height: t.offsetHeight
        }, this.$element.offset())
    };
    t.prototype.getCalculatedOffset = function(n, t, i, r) {
        return "bottom" == n ? {
            top: t.top + t.height,
            left: t.left + t.width / 2 - i / 2
        } : "top" == n ? {
            top: t.top - r,
            left: t.left + t.width / 2 - i / 2
        } : "left" == n ? {
            top: t.top + t.height / 2 - r / 2,
            left: t.left - i
        } : {
            top: t.top + t.height / 2 - r / 2,
            left: t.left + t.width
        }
    };
    t.prototype.getTitle = function() {
        var t = this.$element,
            n = this.options;
        return t.attr("data-original-title") || ("function" == typeof n.title ? n.title.call(t[0]) : n.title)
    };
    t.prototype.tip = function() {
        return this.$tip = this.$tip || n(this.options.template)
    };
    t.prototype.arrow = function() {
        return this.$arrow = this.$arrow || this.tip().find(".tooltip-arrow")
    };
    t.prototype.validate = function() {
        this.$element[0].parentNode || (this.hide(), this.$element = null, this.options = null)
    };
    t.prototype.enable = function() {
        this.enabled = !0
    };
    t.prototype.disable = function() {
        this.enabled = !1
    };
    t.prototype.toggleEnabled = function() {
        this.enabled = !this.enabled
    };
    t.prototype.toggle = function(t) {
        var i = t ? n(t.currentTarget)[this.type](this.getDelegateOptions()).data("bs." + this.type) : this;
        i.tip().hasClass("in") ? i.leave(i) : i.enter(i)
    };
    t.prototype.destroy = function() {
        this.hide().$element.off("." + this.type).removeData("bs." + this.type)
    };
    i = n.fn.tooltip;
    n.fn.tooltip = function(i) {
        return this.each(function() {
            var u = n(this),
                r = u.data("bs.tooltip"),
                f = "object" == typeof i && i;
            r || u.data("bs.tooltip", r = new t(this, f));
            "string" == typeof i && r[i]()
        })
    };
    n.fn.tooltip.Constructor = t;
    n.fn.tooltip.noConflict = function() {
        return n.fn.tooltip = i, this
    }
}(window.jQuery); + function(n) {
    "use strict";
    var t = function(n, t) {
            this.init("popover", n, t)
        },
        i;
    if (!n.fn.tooltip) throw new Error("Popover requires tooltip.js");
    t.DEFAULTS = n.extend({}, n.fn.tooltip.Constructor.DEFAULTS, {
        placement: "right",
        trigger: "click",
        content: "",
        template: '<div class="popover"><div class="arrow"><\/div><h3 class="popover-title"><\/h3><div class="popover-content"><\/div><\/div>'
    });
    t.prototype = n.extend({}, n.fn.tooltip.Constructor.prototype);
    t.prototype.constructor = t;
    t.prototype.getDefaults = function() {
        return t.DEFAULTS
    };
    t.prototype.setContent = function() {
        var n = this.tip(),
            t = this.getTitle(),
            i = this.getContent();
        n.find(".popover-title")[this.options.html ? "html" : "text"](t);
        n.find(".popover-content")[this.options.html ? "html" : "text"](i);
        n.removeClass("fade top bottom left right in");
        n.find(".popover-title").html() || n.find(".popover-title").hide()
    };
    t.prototype.hasContent = function() {
        return this.getTitle() || this.getContent()
    };
    t.prototype.getContent = function() {
        var t = this.$element,
            n = this.options;
        return t.attr("data-content") || ("function" == typeof n.content ? n.content.call(t[0]) : n.content)
    };
    t.prototype.arrow = function() {
        return this.$arrow = this.$arrow || this.tip().find(".arrow")
    };
    t.prototype.tip = function() {
        return this.$tip || (this.$tip = n(this.options.template)), this.$tip
    };
    i = n.fn.popover;
    n.fn.popover = function(i) {
        return this.each(function() {
            var u = n(this),
                r = u.data("bs.popover"),
                f = "object" == typeof i && i;
            r || u.data("bs.popover", r = new t(this, f));
            "string" == typeof i && r[i]()
        })
    };
    n.fn.popover.Constructor = t;
    n.fn.popover.noConflict = function() {
        return n.fn.popover = i, this
    }
}(window.jQuery); + function(n) {
    "use strict";

    function t(i, r) {
        var u, f = n.proxy(this.process, this);
        this.$element = n(i).is("body") ? n(window) : n(i);
        this.$body = n("body");
        this.$scrollElement = this.$element.on("scroll.bs.scroll-spy.data-api", f);
        this.options = n.extend({}, t.DEFAULTS, r);
        this.selector = (this.options.target || (u = n(i).attr("href")) && u.replace(/.*(?=#[^\s]+$)/, "") || "") + " .nav li > a";
        this.offsets = n([]);
        this.targets = n([]);
        this.activeTarget = null;
        this.refresh();
        this.process()
    }
    t.DEFAULTS = {
        offset: 10
    };
    t.prototype.refresh = function() {
        var i = this.$element[0] == window ? "offset" : "position",
            t;
        this.offsets = n([]);
        this.targets = n([]);
        t = this;
        this.$body.find(this.selector).map(function() {
            var f = n(this),
                r = f.data("target") || f.attr("href"),
                u = /^#\w/.test(r) && n(r);
            return u && u.length && [
                [u[i]().top + (!n.isWindow(t.$scrollElement.get(0)) && t.$scrollElement.scrollTop()), r]
            ] || null
        }).sort(function(n, t) {
            return n[0] - t[0]
        }).each(function() {
            t.offsets.push(this[0]);
            t.targets.push(this[1])
        })
    };
    t.prototype.process = function() {
        var n, i = this.$scrollElement.scrollTop() + this.options.offset,
            f = this.$scrollElement[0].scrollHeight || this.$body[0].scrollHeight,
            e = f - this.$scrollElement.height(),
            t = this.offsets,
            r = this.targets,
            u = this.activeTarget;
        if (i >= e) return u != (n = r.last()[0]) && this.activate(n);
        for (n = t.length; n--;) u != r[n] && i >= t[n] && (!t[n + 1] || i <= t[n + 1]) && this.activate(r[n])
    };
    t.prototype.activate = function(t) {
        this.activeTarget = t;
        n(this.selector).parents(".active").removeClass("active");
        var r = this.selector + '[data-target="' + t + '"],' + this.selector + '[href="' + t + '"]',
            i = n(r).parents("li").addClass("active");
        i.parent(".dropdown-menu").length && (i = i.closest("li.dropdown").addClass("active"));
        i.trigger("activate")
    };
    var i = n.fn.scrollspy;
    n.fn.scrollspy = function(i) {
        return this.each(function() {
            var u = n(this),
                r = u.data("bs.scrollspy"),
                f = "object" == typeof i && i;
            r || u.data("bs.scrollspy", r = new t(this, f));
            "string" == typeof i && r[i]()
        })
    };
    n.fn.scrollspy.Constructor = t;
    n.fn.scrollspy.noConflict = function() {
        return n.fn.scrollspy = i, this
    };
    n(window).on("load", function() {
        n('[data-spy="scroll"]').each(function() {
            var t = n(this);
            t.scrollspy(t.data())
        })
    })
}(window.jQuery); + function(n) {
    "use strict";
    var t = function(t) {
            this.element = n(t)
        },
        i;
    t.prototype.show = function() {
        var t = this.element,
            e = t.closest("ul:not(.dropdown-menu)"),
            i = t.attr("data-target"),
            r, u, f;
        (i || (i = t.attr("href"), i = i && i.replace(/.*(?=#[^\s]*$)/, "")), t.parent("li").hasClass("active")) || (r = e.find(".active:last a")[0], u = n.Event("show.bs.tab", {
            relatedTarget: r
        }), (t.trigger(u), u.isDefaultPrevented()) || (f = n(i), this.activate(t.parent("li"), e), this.activate(f, f.parent(), function() {
            t.trigger({
                type: "shown.bs.tab",
                relatedTarget: r
            })
        })))
    };
    t.prototype.activate = function(t, i, r) {
        function f() {
            u.removeClass("active").find("> .dropdown-menu > .active").removeClass("active");
            t.addClass("active");
            e ? (t[0].offsetWidth, t.addClass("in")) : t.removeClass("fade");
            t.parent(".dropdown-menu") && t.closest("li.dropdown").addClass("active");
            r && r()
        }
        var u = i.find("> .active"),
            e = r && n.support.transition && u.hasClass("fade");
        e ? u.one(n.support.transition.end, f).emulateTransitionEnd(150) : f();
        u.removeClass("in")
    };
    i = n.fn.tab;
    n.fn.tab = function(i) {
        return this.each(function() {
            var u = n(this),
                r = u.data("bs.tab");
            r || u.data("bs.tab", r = new t(this));
            "string" == typeof i && r[i]()
        })
    };
    n.fn.tab.Constructor = t;
    n.fn.tab.noConflict = function() {
        return n.fn.tab = i, this
    };
    n(document).on("click.bs.tab.data-api", '[data-toggle="tab"], [data-toggle="pill"]', function(t) {
        t.preventDefault();
        n(this).tab("show")
    })
}(window.jQuery); + function(n) {
    "use strict";
    var t = function(i, r) {
            this.options = n.extend({}, t.DEFAULTS, r);
            this.$window = n(window).on("scroll.bs.affix.data-api", n.proxy(this.checkPosition, this)).on("click.bs.affix.data-api", n.proxy(this.checkPositionWithEventLoop, this));
            this.$element = n(i);
            this.affixed = this.unpin = null;
            this.checkPosition()
        },
        i;
    t.RESET = "affix affix-top affix-bottom";
    t.DEFAULTS = {
        offset: 0
    };
    t.prototype.checkPositionWithEventLoop = function() {
        setTimeout(n.proxy(this.checkPosition, this), 1)
    };
    t.prototype.checkPosition = function() {
        var i;
        if (this.$element.is(":visible")) {
            var s = n(document).height(),
                e = this.$window.scrollTop(),
                o = this.$element.offset(),
                r = this.options.offset,
                f = r.top,
                u = r.bottom;
            "object" != typeof r && (u = f = r);
            "function" == typeof f && (f = r.top());
            "function" == typeof u && (u = r.bottom());
            i = null != this.unpin && e + this.unpin <= o.top ? !1 : null != u && o.top + this.$element.height() >= s - u ? "bottom" : null != f && f >= e ? "top" : !1;
            this.affixed !== i && (this.unpin && this.$element.css("top", ""), this.affixed = i, this.unpin = "bottom" == i ? o.top - e : null, this.$element.removeClass(t.RESET).addClass("affix" + (i ? "-" + i : "")), "bottom" == i && this.$element.offset({
                top: document.body.offsetHeight - u - this.$element.height()
            }))
        }
    };
    i = n.fn.affix;
    n.fn.affix = function(i) {
        return this.each(function() {
            var u = n(this),
                r = u.data("bs.affix"),
                f = "object" == typeof i && i;
            r || u.data("bs.affix", r = new t(this, f));
            "string" == typeof i && r[i]()
        })
    };
    n.fn.affix.Constructor = t;
    n.fn.affix.noConflict = function() {
        return n.fn.affix = i, this
    };
    n(window).on("load", function() {
        n('[data-spy="affix"]').each(function() {
            var i = n(this),
                t = i.data();
            t.offset = t.offset || {};
            t.offsetBottom && (t.offset.bottom = t.offsetBottom);
            t.offsetTop && (t.offset.top = t.offsetTop);
            i.affix(t)
        })
    })
}(window.jQuery);
window.matchMedia = window.matchMedia || function(n) {
        var u, i = n.documentElement,
            f = i.firstElementChild || i.firstChild,
            r = n.createElement("body"),
            t = n.createElement("div");
        return t.id = "mq-test-1", t.style.cssText = "position:absolute;top:-100em", r.style.background = "none", r.appendChild(t),
            function(n) {
                return t.innerHTML = '&shy;<style media="' + n + '"> #mq-test-1 { width: 42px; }<\/style>', i.insertBefore(r, f), u = t.offsetWidth == 42, i.removeChild(r), {
                    matches: u,
                    media: n
                }
            }
    }(document),
    function(n) {
        function d() {
            a(!0)
        }
        if (n.respond = {}, respond.update = function() {}, respond.mediaQueriesSupported = n.matchMedia && n.matchMedia("only all").matches, !respond.mediaQueriesSupported) {
            var t = n.document,
                i = t.documentElement,
                e = [],
                u = [],
                r = [],
                o = {},
                v = 30,
                f = t.getElementsByTagName("head")[0] || i,
                g = t.getElementsByTagName("base")[0],
                s = f.getElementsByTagName("link"),
                h = [],
                y = function() {
                    for (var f = s, c = f.length, r = 0, t, i, u, e; r < c; r++) t = f[r], i = t.href, u = t.media, e = t.rel && t.rel.toLowerCase() === "stylesheet", !i || !e || o[i] || (t.styleSheet && t.styleSheet.rawCssText ? (w(t.styleSheet.rawCssText, i, u), o[i] = !0) : (/^([a-zA-Z:]*\/\/)/.test(i) || g) && i.replace(RegExp.$1, "").split("/")[0] !== n.location.host || h.push({
                        href: i,
                        media: u
                    }));
                    p()
                },
                p = function() {
                    if (h.length) {
                        var n = h.shift();
                        nt(n.href, function(t) {
                            w(t, n.href, n.media);
                            o[n.href] = !0;
                            p()
                        })
                    }
                },
                w = function(n, t, i) {
                    var o = n.match(/@media[^\{]+\{([^\{\}]*\{[^\}\{]*\})+/gi),
                        s = o && o.length || 0,
                        t = t.substring(0, t.lastIndexOf("/")),
                        v = function(n) {
                            return n.replace(/(url\()['"]?([^\/\)'"][^:\)'"]+)['"]?(\))/g, "$1" + t + "$2$3")
                        },
                        y = !s && i,
                        h = 0,
                        f, c, r, l, p;
                    for (t.length && (t += "/"), y && (s = 1); h < s; h++)
                        for (f = 0, y ? (c = i, u.push(v(n))) : (c = o[h].match(/@media *([^\{]+)\{([\S\s]+?)$/) && RegExp.$1, u.push(RegExp.$2 && v(RegExp.$2))), l = c.split(","), p = l.length; f < p; f++) r = l[f], e.push({
                            media: r.split("(")[0].match(/(only\s+)?([a-zA-Z]+)\s?/) && RegExp.$2 || "all",
                            rules: u.length - 1,
                            hasquery: r.indexOf("(") > -1,
                            minw: r.match(/\(min\-width:[\s]*([\s]*[0-9\.]+)(px|em)[\s]*\)/) && parseFloat(RegExp.$1) + (RegExp.$2 || ""),
                            maxw: r.match(/\(max\-width:[\s]*([\s]*[0-9\.]+)(px|em)[\s]*\)/) && parseFloat(RegExp.$1) + (RegExp.$2 || "")
                        });
                    a()
                },
                c, b, k = function() {
                    var u, r = t.createElement("div"),
                        n = t.body,
                        f = !1;
                    return r.style.cssText = "position:absolute;font-size:1em;width:1em", n || (n = f = t.createElement("body"), n.style.background = "none"), n.appendChild(r), i.insertBefore(n, i.firstChild), u = r.offsetWidth, f ? i.removeChild(n) : n.removeChild(r), l = parseFloat(u)
                },
                l, a = function(n) {
                    var nt = "clientWidth",
                        tt = i[nt],
                        it = t.compatMode === "CSS1Compat" && tt || t.body[nt] || tt,
                        d = {},
                        ot = s[s.length - 1],
                        rt = (new Date).getTime(),
                        o, h, g;
                    if (n && c && rt - c < v) {
                        clearTimeout(b);
                        b = setTimeout(a, v);
                        return
                    }
                    c = rt;
                    for (o in e) {
                        var y = e[o],
                            p = y.minw,
                            w = y.maxw,
                            ut = p === null,
                            ft = w === null,
                            et = "em";
                        !p || (p = parseFloat(p) * (p.indexOf(et) > -1 ? l || k() : 1));
                        !w || (w = parseFloat(w) * (w.indexOf(et) > -1 ? l || k() : 1));
                        y.hasquery && (ut && ft || !(ut || it >= p) || !(ft || it <= w)) || (d[y.media] || (d[y.media] = []), d[y.media].push(u[y.rules]))
                    }
                    for (o in r) r[o] && r[o].parentNode === f && f.removeChild(r[o]);
                    for (o in d) h = t.createElement("style"), g = d[o].join("\n"), h.type = "text/css", h.media = o, f.insertBefore(h, ot.nextSibling), h.styleSheet ? h.styleSheet.cssText = g : h.appendChild(t.createTextNode(g)), r.push(h)
                },
                nt = function(n, t) {
                    var i = tt();
                    i && (i.open("GET", n, !0), i.onreadystatechange = function() {
                        i.readyState == 4 && (i.status == 200 || i.status == 304) && t(i.responseText)
                    }, i.readyState != 4) && i.send(null)
                },
                tt = function() {
                    var n = !1;
                    try {
                        n = new XMLHttpRequest
                    } catch (t) {
                        n = new ActiveXObject("Microsoft.XMLHTTP")
                    }
                    return function() {
                        return n
                    }
                }();
            y();
            respond.update = y;
            n.addEventListener ? n.addEventListener("resize", d, !1) : n.attachEvent && n.attachEvent("onresize", d)
        }
    }(this);
! function(n, t, i, r, u, f, e) {
    function y() {
        function s(n, t) {
            i.push({
                Nb: n,
                Pb: t
            })
        }

        function h(n, t) {
            o.c(i, function(r, u) {
                r.Nb == n && r.Pb === t && i.splice(u, 1)
            })
        }

        function c() {
            i = []
        }

        function e() {
            o.c(r, function(n) {
                o.$RemoveEvent(n.Wd, n.Nb, n.Pb, n.Xd)
            });
            r = []
        }
        var t = this,
            f, i = [],
            r = [];
        t.Nc = function() {
            return f
        };
        t.a = function(n, t, i, u) {
            o.$AddEvent(n, t, i, u);
            r.push({
                Wd: n,
                Nb: t,
                Pb: i,
                Xd: u
            })
        };
        t.ab = function(n, t, i, u) {
            o.c(r, function(f, e) {
                f.Wd === n && f.Nb == t && f.Pb === i && f.Xd == u && (o.$RemoveEvent(n, t, i, u), r.splice(e, 1))
            })
        };
        t.Zd = e;
        t.$On = t.addEventListener = s;
        t.$Off = t.removeEventListener = h;
        t.k = function(t) {
            var r = [].slice.call(arguments, 1);
            o.c(i, function(i) {
                i.Nb == t && i.Pb.apply(n, r)
            })
        };
        t.$Destroy = function() {
            f || (f = u, e(), c())
        }
    }

    function p(n, t, i) {
        var r = this;
        o.Y(r, y);
        l.call(r, 0, i.$Idle);
        r.oc = 0;
        r.Tc = i.$Idle
    }
    var b, k, c;
    new function() {};
    var s = {
            E: i.PI,
            m: i.max,
            j: i.min,
            Q: i.ceil,
            R: i.floor,
            H: i.abs,
            pb: i.sin,
            bc: i.cos,
            Id: i.tan,
            Zf: i.atan,
            fc: i.sqrt,
            v: i.pow,
            Md: i.random,
            $Round: i.round
        },
        h = n.$Jease$ = {
            $Swing: function(n) {
                return -s.bc(n * s.E) / 2 + .5
            },
            $Linear: function(n) {
                return n
            },
            $InQuad: function(n) {
                return n * n
            },
            $OutQuad: function(n) {
                return -n * (n - 2)
            },
            $InOutQuad: function(n) {
                return (n *= 2) < 1 ? 1 / 2 * n * n : -1 / 2 * (--n * (n - 2) - 1)
            },
            $InCubic: function(n) {
                return n * n * n
            },
            $OutCubic: function(n) {
                return (n -= 1) * n * n + 1
            },
            $InOutCubic: function(n) {
                return (n *= 2) < 1 ? 1 / 2 * n * n * n : 1 / 2 * ((n -= 2) * n * n + 2)
            },
            $InQuart: function(n) {
                return n * n * n * n
            },
            $OutQuart: function(n) {
                return -((n -= 1) * n * n * n - 1)
            },
            $InOutQuart: function(n) {
                return (n *= 2) < 1 ? 1 / 2 * n * n * n * n : -1 / 2 * ((n -= 2) * n * n * n - 2)
            },
            $InQuint: function(n) {
                return n * n * n * n * n
            },
            $OutQuint: function(n) {
                return (n -= 1) * n * n * n * n + 1
            },
            $InOutQuint: function(n) {
                return (n *= 2) < 1 ? 1 / 2 * n * n * n * n * n : 1 / 2 * ((n -= 2) * n * n * n * n + 2)
            },
            $InSine: function(n) {
                return 1 - s.bc(s.E / 2 * n)
            },
            $OutSine: function(n) {
                return s.pb(s.E / 2 * n)
            },
            $InOutSine: function(n) {
                return -1 / 2 * (s.bc(s.E * n) - 1)
            },
            $InExpo: function(n) {
                return n == 0 ? 0 : s.v(2, 10 * (n - 1))
            },
            $OutExpo: function(n) {
                return n == 1 ? 1 : -s.v(2, -10 * n) + 1
            },
            $InOutExpo: function(n) {
                return n == 0 || n == 1 ? n : (n *= 2) < 1 ? 1 / 2 * s.v(2, 10 * (n - 1)) : 1 / 2 * (-s.v(2, -10 * --n) + 2)
            },
            $InCirc: function(n) {
                return -(s.fc(1 - n * n) - 1)
            },
            $OutCirc: function(n) {
                return s.fc(1 - (n -= 1) * n)
            },
            $InOutCirc: function(n) {
                return (n *= 2) < 1 ? -1 / 2 * (s.fc(1 - n * n) - 1) : 1 / 2 * (s.fc(1 - (n -= 2) * n) + 1)
            },
            $InElastic: function(n) {
                if (!n || n == 1) return n;
                return -(s.v(2, 10 * (n -= 1)) * s.pb((n - .075) * 2 * s.E / .3))
            },
            $OutElastic: function(n) {
                if (!n || n == 1) return n;
                return s.v(2, -10 * n) * s.pb((n - .075) * 2 * s.E / .3) + 1
            },
            $InOutElastic: function(n) {
                if (!n || n == 1) return n;
                var t = .45,
                    i = .1125;
                return (n *= 2) < 1 ? -.5 * s.v(2, 10 * (n -= 1)) * s.pb((n - i) * 2 * s.E / t) : s.v(2, -10 * (n -= 1)) * s.pb((n - i) * 2 * s.E / t) * .5 + 1
            },
            $InBack: function(n) {
                var t = 1.70158;
                return n * n * ((t + 1) * n - t)
            },
            $OutBack: function(n) {
                var t = 1.70158;
                return (n -= 1) * n * ((t + 1) * n + t) + 1
            },
            $InOutBack: function(n) {
                var t = 1.70158;
                return (n *= 2) < 1 ? 1 / 2 * n * n * (((t *= 1.525) + 1) * n - t) : 1 / 2 * ((n -= 2) * n * (((t *= 1.525) + 1) * n + t) + 2)
            },
            $InBounce: function(n) {
                return 1 - h.$OutBounce(1 - n)
            },
            $OutBounce: function(n) {
                return n < 1 / 2.75 ? 7.5625 * n * n : n < 2 / 2.75 ? 7.5625 * (n -= 1.5 / 2.75) * n + .75 : n < 2.5 / 2.75 ? 7.5625 * (n -= 2.25 / 2.75) * n + .9375 : 7.5625 * (n -= 2.625 / 2.75) * n + .984375
            },
            $InOutBounce: function(n) {
                return n < 1 / 2 ? h.$InBounce(n * 2) * .5 : h.$OutBounce(n * 2 - 1) * .5 + .5
            },
            $GoBack: function() {
                return 1 - s.H(1)
            },
            $InWave: function(n) {
                return 1 - s.bc(n * s.E * 2)
            },
            $OutWave: function(n) {
                return s.pb(n * s.E * 2)
            },
            $OutJump: function(n) {
                return 1 - ((n *= 2) < 1 ? (n = 1 - n) * n * n : (n -= 1) * n * n)
            },
            $InJump: function(n) {
                return (n *= 2) < 1 ? n * n * n : (n = 2 - n) * n * n
            },
            $Early: s.Q,
            $Late: s.R
        },
        o = n.$Jssor$ = new function() {
            function rr() {
                if (!st) {
                    st = {
                        Hc: "ontouchstart" in n || "createTouch" in t
                    };
                    var i;
                    (ht.pointerEnabled || (i = ht.msPointerEnabled)) && (st.ze = i ? "msTouchAction" : "touchAction")
                }
                return st
            }

            function it(t) {
                var r, o, i;
                if (!b)
                    if (b = -1, ui != "Microsoft Internet Explorer" || !n.attachEvent || !n.ActiveXObject)
                        if (ui != "Netscape" || !n.addEventListener) i = /(opera)(?:.*version|)[ \/]([\w.]+)/i.exec(p), i && (b = ri, v = w(i[2]));
                        else {
                            var f = p.indexOf("Firefox"),
                                u = p.indexOf("Safari"),
                                s = p.indexOf("Chrome"),
                                e = p.indexOf("AppleWebKit");
                            f >= 0 ? (b = tr, v = w(p.substring(f + 8))) : u >= 0 ? (o = p.substring(0, u).lastIndexOf("/"), b = s >= 0 ? ir : ii, v = w(p.substring(o + 1, u))) : (i = /Trident\/.*rv:([0-9]{1,}[\.0-9]{0,})/i.exec(p), i && (b = ot, v = w(i[1])));
                            e >= 0 && (tt = w(p.substring(e + 12)))
                        } else {
                    r = p.indexOf("MSIE");
                    b = ot;
                    v = w(p.substring(r + 5, p.indexOf(";", r))); /*@cc_on@*/
                }
                return t == b
            }

            function ct() {
                return it(ot)
            }

            function fi() {
                return it(ii)
            }

            function ur() {
                return it(ri)
            }

            function fr() {
                return fi() && tt > 534 && tt < 535
            }

            function lt() {
                return it(), tt > 537 || v > 42 || b == ot && v >= 11
            }

            function ei(n) {
                var t, i;
                return function(r) {
                    if (!t) {
                        t = u;
                        var f = n.substr(0, 1).toUpperCase() + n.substr(1);
                        c([n].concat(["WebKit", "ms", "Moz", "O", "webkit"]), function(t, u) {
                            var o = n;
                            return u && (o = t + f), r.style[o] != e ? i = o : void 0
                        })
                    }
                    return i
                }
            }

            function oi(n) {
                var t;
                return function(i) {
                    return t = t || ei(n)(i) || n
                }
            }

            function si(n) {
                return {}.toString.call(n)
            }

            function c(n, t) {
                var i, r;
                if (si(n) == "[object Array]") {
                    for (i = 0; i < n.length; i++)
                        if (r = t(n[i], i, n)) return r
                } else
                    for (i in n)
                        if (r = t(n[i], i, n)) return r
            }

            function at(n) {
                return n == r ? String(n) : hi[si(n)] || "object"
            }

            function er(n) {
                for (var t in n) return u
            }

            function rt(n) {
                try {
                    return at(n) == "object" && !n.nodeType && n != n.window && (!n.constructor || {}.hasOwnProperty.call(n.constructor.prototype, "isPrototypeOf"))
                } catch (t) {}
            }

            function ci(n, t) {
                setTimeout(n, t || 0)
            }

            function li(n, t, i) {
                var r = !n || n == "inherit" ? "" : n;
                return c(t, function(n) {
                    var t = n.exec(r),
                        i, u;
                    t && (i = r.substr(0, t.index), u = r.substr(t.index + t[0].length + 1, r.length - 1), r = i + u)
                }), r && (i += (r.indexOf(" ") ? " " : "") + r), i
            }

            function ai(n, t) {
                return n === e && (n = t), n
            }

            function kt(n) {
                n.constructor === kt.caller && n.B && n.B.apply(n, kt.caller.arguments)
            }

            function d(t) {
                return t || n.event
            }

            function g(t, i, u) {
                if (u !== e) t.style[i] = u == e ? "" : u;
                else {
                    var f = t.currentStyle || t.style;
                    return u = f[i], u == "" && n.getComputedStyle && (f = t.ownerDocument.defaultView.getComputedStyle(t, r), f && (u = f.getPropertyValue(i) || f[i])), u
                }
            }

            function or(n, t, i, u) {
                if (i === e) return i = w(g(n, t)), isNaN(i) && (i = r), i;
                i == r ? i = "" : u && (i += "px");
                g(n, t, i)
            }

            function l(n, t) {
                var r = t ? or : g,
                    i;
                return t & 4 && (i = oi(n)),
                    function(u, f) {
                        return r(u, i ? i(u) : n, f, t & 2)
                    }
            }

            function sr(n) {
                return w(n.style.opacity || "1")
            }

            function hr(n, t) {
                n.style.opacity = t == 1 || t == r ? "" : s.$Round(t * 100) / 100
            }

            function vi(n, t) {
                var i = "";
                t && (ct() && v && v < 10 && (delete t.$RotateX, delete t.$RotateY, delete t.$TranslateZ), c(t, function(n, t) {
                    var r = vt[t],
                        u;
                    r && (u = r[1] || 0, wt[t] != n && (i += " " + r[0] + "(" + n + ["deg", "px", ""][u] + ")"))
                }), lt() && ((t.$TranslateX || t.$TranslateY || t.$TranslateZ != e) && (i += " translate3d(" + (t.$TranslateX || 0) + "px," + (t.$TranslateY || 0) + "px," + (t.$TranslateZ || 0) + "px)"), t.$ScaleX == e && (t.$ScaleX = 1), t.$ScaleY == e && (t.$ScaleY = 1), (t.$ScaleX != 1 || t.$ScaleY != 1) && (i += " scale3d(" + t.$ScaleX + ", " + t.$ScaleY + ", 1)")));
                n.style[bt(n)] = i
            }

            function yi(n, t, i, u) {
                for (u = u || "u", n = n ? n.firstChild : r; n; n = n.nextSibling)
                    if (n.nodeType == 1) {
                        if (ft(n, u) == t) return n;
                        if (!i) {
                            var f = yi(n, t, i, u);
                            if (f) return f
                        }
                    }
            }

            function pi(n, t, i, u) {
                var f, e;
                for (u = u || "u", f = [], n = n ? n.firstChild : r; n; n = n.nextSibling) n.nodeType == 1 && (ft(n, u) == t && f.push(n), i || (e = pi(n, t, i, u), e.length && (f = f.concat(e))));
                return f
            }

            function nt() {
                for (var i = arguments, u, t, n, o = 1 & i[0], f = 1 + o, s, r = i[f - 1] || {}; f < i.length; f++)
                    if (u = i[f])
                        for (t in u) n = u[t], n !== e && (n = u[t], s = r[t], r[t] = o && (rt(s) || rt(n)) ? nt(o, {}, s, n) : n);
                return r
            }

            function wi(n, t) {
                var f = {},
                    r, i, u, e;
                for (r in n) i = n[r], u = t[r], i !== u && (rt(i) && rt(u) && (i = wi(i, u), e = !er(i)), e || (f[r] = i));
                return f
            }

            function bi(n) {
                return t.createElement(n)
            }

            function ut(n, t, i) {
                if (i == e) return n.getAttribute(t);
                n.setAttribute(t, i)
            }

            function ft(n, t) {
                return ut(n, t) || ut(n, "data-" + t)
            }

            function et(n, t) {
                return ut(n, "class", t) || ""
            }

            function dt(n) {
                var t = {};
                return c(n, function(n) {
                    n != e && (t[n] = n)
                }), t
            }

            function ki(n, t) {
                return n.match(t || nr)
            }

            function gt(n, t) {
                return dt(ki(n || "", t))
            }

            function ni(n, t) {
                var i = "";
                return c(t, function(t) {
                    i && (i += n);
                    i += t
                }), i
            }

            function cr(n, t, i) {
                et(n, ni(" ", nt(wi(gt(et(n)), gt(t)), gt(i))))
            }

            function di() {
                c([].slice.call(arguments, 0), function(n) {
                    i.te(n) ? di.apply(r, n) : n && n.$Destroy()
                })
            }

            function ti(n, t, r) {
                var u = n.cloneNode(!t);
                return r || i.Ng(u, "id"), u
            }

            function lr() {
                function a() {
                    cr(f, w, (s[h || l & 2 || l] || "") + " " + (s[v] || ""));
                    i.Fc(f, h ? "none" : "")
                }

                function u() {
                    v = 0;
                    r.ab(n, "mouseup", u);
                    r.ab(t, "mouseup", u);
                    r.ab(t, "touchend", u);
                    r.ab(t, "touchcancel", u);
                    r.ab(n, "blur", u);
                    a()
                }

                function b(f) {
                    h ? i.$CancelEvent(f) : (v = 4, a(), r.a(n, "mouseup", u), r.a(t, "mouseup", u), r.a(t, "touchend", u), r.a(t, "touchcancel", u), r.a(n, "blur", u))
                }
                var r = this;
                o.Y(r, y);
                var f, p = "",
                    k = ["av", "pv", "ds", "dn"],
                    s = [],
                    w, v = 0,
                    l = 0,
                    h = 0;
                r.Kd = function(n) {
                    if (n === e) return l;
                    l = n & 2 || n & 1;
                    a()
                };
                r.$Enable = function(n) {
                    if (n === e) return !h;
                    h = n ? 0 : 3;
                    a()
                };
                r.B = function(n) {
                    r.$Elmt = f = i.$GetElement(n);
                    ut(f, "data-jssor-button", "1");
                    var t = o.Lg(et(f));
                    t && (p = t.shift());
                    c(k, function(n) {
                        s.push(p + n)
                    });
                    w = ni(" ", s);
                    s.unshift("");
                    r.a(f, "mousedown", b);
                    r.a(f, "touchstart", b)
                };
                o.B(r)
            }

            function k(n, t) {
                function s(n, t) {
                    var i;
                    t = t || {};
                    var s = t.$TranslateZ || 0,
                        h = (t.$RotateX || 0) % 360,
                        c = (t.$RotateY || 0) % 360,
                        l = (t.$Rotate || 0) % 360,
                        r = t.$ScaleX,
                        u = t.$ScaleY,
                        f = t.Mh;
                    r == e && (r = 1);
                    u == e && (u = 1);
                    f == e && (f = 1);
                    i = new ar(t.$TranslateX, t.$TranslateY, s);
                    i.$Scale(r, u, f);
                    i.Ue(t.$SkewX, t.$SkewY);
                    i.$RotateX(h);
                    i.$RotateY(c);
                    i.Xe(l);
                    i.$Move(t.K, t.N);
                    n.style[o] = i.Ve()
                }
                var u = lt(),
                    f = fr(),
                    o = bt(n);
                k = function(n, t) {
                    t = t || {};
                    var h = t.K,
                        l = t.N,
                        o;
                    c(pt, function(i, r) {
                        o = t[r];
                        o !== e && i(n, o)
                    });
                    i.Pg(n, t.$Clip);
                    i.Og(n, t.Ab);
                    u || (h != e && i.Z(n, (t.se || 0) + h), l != e && i.V(n, (t.ve || 0) + l));
                    t.We && (f ? ci(i.T(r, vi, n, t)) : u ? s(n, t) : vi(n, t))
                };
                i.U = k;
                k(n, t)
            }

            function ar(n, t, i) {
                function e(n) {
                    return n * s.E / 180
                }

                function v(n, t, i, r, u, f, e, o, s, h, c, l, a, v, y, p, w, b, k, d, g, nt, tt, it, rt, ut, ft, et, ot, st, ht, ct) {
                    return [n * w + t * g + i * rt + r * ot, n * b + t * nt + i * ut + r * st, n * k + t * tt + i * ft + r * ht, n * d + t * it + i * et + r * ct, u * w + f * g + e * rt + o * ot, u * b + f * nt + e * ut + o * st, u * k + f * tt + e * ft + o * ht, u * d + f * it + e * et + o * ct, s * w + h * g + c * rt + l * ot, s * b + h * nt + c * ut + l * st, s * k + h * tt + c * ft + l * ht, s * d + h * it + c * et + l * ct, a * w + v * g + y * rt + p * ot, a * b + v * nt + y * ut + p * st, a * k + v * tt + y * ft + p * ht, a * d + v * it + y * et + p * ct]
                }

                function o(n, t) {
                    return v.apply(r, (t || u).concat(n))
                }
                var f = this,
                    u = [1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, n || 0, t || 0, i || 0, 1],
                    h = s.pb,
                    c = s.bc,
                    l = s.Id;
                f.$Scale = function(n, t, i) {
                    (n != 1 || t != 1 || i != 1) && (u = o([n, 0, 0, 0, 0, t, 0, 0, 0, 0, i, 0, 0, 0, 0, 1]))
                };
                f.$Move = function(n, t, i) {
                    u[12] += n || 0;
                    u[13] += t || 0;
                    u[14] += i || 0
                };
                f.$RotateX = function(n) {
                    if (n) {
                        a = e(n);
                        var t = c(a),
                            i = h(a);
                        u = o([1, 0, 0, 0, 0, t, i, 0, 0, -i, t, 0, 0, 0, 0, 1])
                    }
                };
                f.$RotateY = function(n) {
                    if (n) {
                        a = e(n);
                        var t = c(a),
                            i = h(a);
                        u = o([t, 0, -i, 0, 0, 1, 0, 0, i, 0, t, 0, 0, 0, 0, 1])
                    }
                };
                f.Xe = function(n) {
                    if (n) {
                        a = e(n);
                        var t = c(a),
                            i = h(a);
                        u = o([t, i, 0, 0, -i, t, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1])
                    }
                };
                f.Ue = function(i, r) {
                    (i || r) && (n = e(i), t = e(r), u = o([1, l(t), 0, 0, l(n), 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1]))
                };
                f.Ve = function() {
                    return "matrix3d(" + u.join(",") + ")"
                }
            }

            function gi(n, t) {
                var r = {};
                return c(n, function(n, u) {
                    var f = n;
                    t[u] != e && (f = i.uc(n) ? n + t[u] : gi(n, t[u]));
                    r[u] = f
                }), r
            }
            var i = this,
                nr = /\S+/g,
                ot = 1,
                tr = 2,
                ii = 3,
                ir = 4,
                ri = 5,
                st, b = 0,
                v = 0,
                tt = 0,
                ht = navigator,
                ui = ht.appName,
                p = ht.userAgent,
                w = parseFloat,
                bt = oi("transform"),
                hi = {},
                vt, yt, pt, wt;
            c(["Boolean", "Number", "String", "Function", "Array", "Date", "RegExp", "Object"], function(n) {
                hi["[object " + n + "]"] = n.toLowerCase()
            });
            i.Rc = rr;
            i.be = ct;
            i.eh = fi;
            i.Wg = lt;
            ei("transform");
            i.hd = function() {
                return v
            };
            i.Sg = function() {
                return it(), tt
            };
            i.$Delay = ci;
            i.X = ai;
            i.Y = function(n, t) {
                return t.call(n), nt({}, n)
            };
            i.B = kt;
            i.$GetElement = function(n) {
                return i.Tg(n) && (n = t.getElementById(n)), n
            };
            i.Yg = d;
            i.$EvtSrc = function(n) {
                n = d(n);
                var r = n.target || n.srcElement || t;
                return r.nodeType == 3 && (r = i.rd(r)), r
            };
            i.Ee = function(n) {
                return n = d(n), n.relatedTarget || n.toElement
            };
            i.he = function(n) {
                return n = d(n), n.which || [0, 1, 3, 0, 2][n.button] || n.charCode || n.keyCode
            };
            i.pd = function(n) {
                return n = d(n), {
                    x: n.clientX || 0,
                    y: n.clientY || 0
                }
            };
            i.Vg = function(n, t) {
                return n.x >= t.x && n.x <= t.x + t.w && n.y >= t.y && n.y <= t.y + t.h
            };
            i.fe = function(n, t) {
                var r = o.Zg(t),
                    u = o.pd(n);
                return i.Vg(u, r)
            };
            vt = {
                $Rotate: ["rotate"],
                $RotateX: ["rotateX"],
                $RotateY: ["rotateY"],
                $SkewX: ["skewX"],
                $SkewY: ["skewY"]
            };
            lt() || (vt = nt(vt, {
                $ScaleX: ["scaleX", 2],
                $ScaleY: ["scaleY", 2],
                $TranslateZ: ["translateZ", 1]
            }));
            i.ch = l("transformOrigin", 4);
            i.bh = l("backfaceVisibility", 4);
            i.kc = l("transformStyle", 4);
            i.ah = l("perspective", 6);
            i.yg = l("perspectiveOrigin", 4);
            i.Vd = function(n, t) {
                if (ct() && v < 9) n.style.zoom = t == 1 ? "" : t;
                else {
                    var i = bt(n),
                        r = t == 1 ? "" : "scale(" + t + ")",
                        u = n.style[i],
                        f = new RegExp(/[\s]*scale\(.*?\)/g),
                        e = li(u, [f], r);
                    n.style[i] = e
                }
            };
            i.$AddEvent = function(n, t, r, u) {
                n = i.$GetElement(n);
                n.addEventListener ? (t == "mousewheel" && n.addEventListener("DOMMouseScroll", r, u), n.addEventListener(t, r, u)) : n.attachEvent && (n.attachEvent("on" + t, r), u && n.setCapture && n.setCapture())
            };
            i.$RemoveEvent = function(n, t, r, u) {
                n = i.$GetElement(n);
                n.removeEventListener ? (t == "mousewheel" && n.removeEventListener("DOMMouseScroll", r, u), n.removeEventListener(t, r, u)) : n.detachEvent && (n.detachEvent("on" + t, r), u && n.releaseCapture && n.releaseCapture())
            };
            i.$CancelEvent = function(n) {
                n = d(n);
                n.preventDefault && n.preventDefault();
                n.cancel = u;
                n.returnValue = f
            };
            i.$StopEvent = function(n) {
                n = d(n);
                n.stopPropagation && n.stopPropagation();
                n.cancelBubble = u
            };
            i.T = function(n, t) {
                var i = [].slice.call(arguments, 2);
                return function() {
                    var r = i.concat([].slice.call(arguments, 0));
                    return t.apply(n, r)
                }
            };
            i.zg = function(n, r) {
                if (r == e) return n.textContent || n.innerText;
                var u = t.createTextNode(r);
                i.Qb(n);
                n.appendChild(u)
            };
            i.Zg = function(n) {
                var t = n.getBoundingClientRect();
                return {
                    x: t.left,
                    y: t.top,
                    w: t.right - t.left,
                    h: t.bottom - t.top
                }
            };
            i.Cb = function(n, t) {
                for (var r = [], i = n.firstChild; i; i = i.nextSibling)(t || i.nodeType == 1) && r.push(i);
                return r
            };
            i.$FindChild = yi;
            i.rg = function(n, t) {
                return n.getElementsByTagName(t)
            };
            i.lb = function(n, i, r, u) {
                var e, f;
                r = r || "u";
                do {
                    if (n.nodeType == 1 && (r && (f = ft(n, r)), f && f == ai(i, f) || u == n.tagName)) {
                        e = n;
                        break
                    }
                    n = o.rd(n)
                } while (n && n != t.body);
                return e
            };
            i.qg = function(n) {
                return dt(["INPUT", "TEXTAREA", "SELECT"])[n.tagName]
            };
            i.F = nt;
            i.qe = function(n) {
                return at(n) == "function"
            };
            i.te = function(n) {
                return at(n) == "array"
            };
            i.Tg = function(n) {
                return at(n) == "string"
            };
            i.uc = function(n) {
                return !isNaN(w(n)) && isFinite(n)
            };
            i.c = c;
            i.Jd = rt;
            i.Rb = function() {
                return bi("DIV")
            };
            i.vg = function() {
                return bi("SPAN")
            };
            i.ug = function() {};
            i.n = ut;
            i.db = ft;
            i.q = function(n, t, r) {
                var u = i.tg(ft(n, t));
                return isNaN(u) && (u = r), u
            };
            i.Dd = dt;
            i.Lg = ki;
            i.Kg = function(n) {
                return n && (n = n.toLowerCase()), n
            };
            i.ud = ni;
            i.rd = function(n) {
                return n.parentNode
            };
            i.xb = function(n) {
                i.zb(n, "none")
            };
            i.eb = function(n, t) {
                i.zb(n, t ? "none" : "")
            };
            i.Ng = function(n, t) {
                n.removeAttribute(t)
            };
            i.Pg = function(n, t) {
                if (t) n.style.clip = "rect(" + s.$Round(t.$Top || t.N || 0) + "px " + s.$Round(t.$Right) + "px " + s.$Round(t.$Bottom) + "px " + s.$Round(t.$Left || t.K || 0) + "px)";
                else if (t !== e) {
                    var i = n.style.cssText,
                        r = [new RegExp(/[\s]*clip: rect\(.*?\)[;]?/i), new RegExp(/[\s]*cliptop: .*?[;]?/i), new RegExp(/[\s]*clipright: .*?[;]?/i), new RegExp(/[\s]*clipbottom: .*?[;]?/i), new RegExp(/[\s]*clipleft: .*?[;]?/i)],
                        u = li(i, r, "");
                    o.xd(n, u)
                }
            };
            i.Og = function(n, t) {
                t && (n.style.backgroundColor = "rgba(" + s.$Round(t.Fd) + "," + s.$Round(t.Ad) + "," + s.$Round(t.Od) + "," + t.$Opacity + ")")
            };
            i.Db = function() {
                return +new Date
            };
            i.J = function(n, t) {
                n.appendChild(t)
            };
            i.Gg = function(n, t) {
                c(t, function(t) {
                    i.J(n, t)
                })
            };
            i.tb = function(n, t, i) {
                (i || t.parentNode).insertBefore(n, t)
            };
            i.Fg = function(n, t, i) {
                n.insertAdjacentHTML(t, i)
            };
            i.qb = function(n, t) {
                t = t || n.parentNode;
                t && t.removeChild(n)
            };
            i.Eg = function(n, t) {
                c(n, function(n) {
                    i.qb(n, t)
                })
            };
            i.Qb = function(n) {
                i.Eg(i.Cb(n, u), n)
            };
            i.$Destroy = di;
            i.fd = function(n, t) {
                var u = i.rd(n);
                t & 1 && (i.Z(n, (i.C(u) - i.C(n)) / 2), i.Pd(n, r));
                t & 2 && (i.V(n, (i.D(u) - i.D(n)) / 2), i.Ed(n, r))
            };
            yt = {
                $Top: r,
                $Right: r,
                $Bottom: r,
                $Left: r,
                I: r,
                G: r
            };
            i.Hg = function(n) {
                var t = i.Rb(),
                    u, f, r;
                return k(t, {
                    Rd: "block",
                    Ob: i.wb(n),
                    $Top: 0,
                    $Left: 0,
                    I: 0,
                    G: 0
                }), u = i.Nd(n, yt), i.tb(t, n), i.J(t, n), f = i.Nd(n, yt), r = {}, c(u, function(n, t) {
                    n == f[t] && (r[t] = n)
                }), k(t, yt), k(t, r), k(n, {
                    $Top: 0,
                    $Left: 0
                }), r
            };
            i.Jg = function(n, t) {
                return parseInt(n, t || 10)
            };
            i.tg = w;
            i.de = function(n, i) {
                for (var r = t.body; i && n !== i && r !== i;) i = i.parentNode;
                return n === i
            };
            i.fb = ti;
            i.Kb = function(n, t) {
                function f(n, u) {
                    i.$RemoveEvent(r, "load", f);
                    i.$RemoveEvent(r, "abort", e);
                    i.$RemoveEvent(r, "error", e);
                    t && t(r, u)
                }

                function e(n) {
                    f(n, u)
                }
                var r = new Image;
                ur() && v < 11.6 || !n ? f(!n) : (i.$AddEvent(r, "load", f), i.$AddEvent(r, "abort", e), i.$AddEvent(r, "error", e), r.src = n)
            };
            i.Ig = function(n, t, r) {
                function f(n) {
                    u--;
                    t && n && n.src == t.src && (t = n);
                    !u && r && r(t)
                }
                var u = 1;
                c(n, function(n) {
                    n.src && (u++, i.Kb(n.src, f))
                });
                f()
            };
            i.zd = function(n, t, i, r) {
                var u, e, f, s;
                for (r && (n = ti(n)), u = pi(n, t), u.length || (u = o.rg(n, t)), e = u.length - 1; e > -1; e--) f = u[e], s = ti(i), et(s, et(f)), o.xd(s, f.style.cssText), o.tb(s, f), o.qb(f);
                return n
            };
            i.Bc = function(n) {
                return new lr(n)
            };
            i.O = g;
            l("backgroundColor");
            i.ic = l("overflow");
            i.Fc = l("pointerEvents");
            i.V = l("top", 2);
            i.Pd = l("right", 2);
            i.Ed = l("bottom", 2);
            i.Z = l("left", 2);
            i.C = l("width", 2);
            i.D = l("height", 2);
            l("marginLeft", 2);
            l("marginTop", 2);
            i.wb = l("position");
            i.zb = l("display");
            i.S = l("zIndex", 1);
            i.cf = function(n, t, i) {
                if (t !== e) hr(n, t, i);
                else return sr(n)
            };
            i.xd = function(n, t) {
                if (t != e) n.style.cssText = t;
                else return n.style.cssText
            };
            i.lf = function(n, t) {
                if (t === e) {
                    t = g(n, "backgroundImage") || "";
                    var i = /\burl\s*\(\s*["']?([^"'\r\n,]+)["']?\s*\)/gi.exec(t) || [];
                    return i[1]
                }
                g(n, "backgroundImage", t ? "url('" + t + "')" : "")
            };
            i.kf = pt = {
                $Opacity: i.cf,
                $Top: i.V,
                $Right: i.Pd,
                $Bottom: i.Ed,
                $Left: i.Z,
                I: i.C,
                G: i.D,
                Ob: i.wb,
                Rd: i.zb,
                $ZIndex: i.S
            };
            i.Nd = function(n, t) {
                var i = {};
                return c(t, function(t, r) {
                    pt[r] && (i[r] = pt[r](n))
                }), i
            };
            i.U = k;
            wt = {
                se: 0,
                ve: 0,
                K: 0,
                N: 0,
                $Zoom: 1,
                $ScaleX: 1,
                $ScaleY: 1,
                $Rotate: 0,
                $RotateX: 0,
                $RotateY: 0,
                $TranslateX: 0,
                $TranslateY: 0,
                $TranslateZ: 0,
                $SkewX: 0,
                $SkewY: 0
            };
            i.Zc = function(n, t) {
                var i = n || {};
                return n && (o.qe(n) ? i = {
                    X: i
                } : o.qe(n.$Clip) && (i.$Clip = {
                    X: n.$Clip
                })), i.X = i.X || t, i.$Clip && (i.$Clip.X = i.$Clip.X || t), i.Ab && (i.Ab.X = i.Ab.X || t), i
            };
            i.Re = gi;
            i.Ae = function(n, t, i, f, l, a, y) {
                var p = t,
                    w, it, st, rt, ut;
                if (n) {
                    p = {};
                    for (w in t) {
                        var ht = a[w] || 1,
                            ot = l[w] || [0, 1],
                            b = (i - ot[0]) / ot[1];
                        b = s.j(s.m(b, 0), 1);
                        b = b * ht;
                        it = s.R(b);
                        b != it && (b -= it);
                        var k = f.X || h.$Linear,
                            d, lt = n[w],
                            g = t[w];
                        o.uc(g) ? (k = f[w] || k, st = k(b), d = lt + g * st) : (d = nt({
                            rc: {}
                        }, n[w]), rt = f[w] || {}, c(g.rc || g, function(n, t) {
                            k = rt[t] || rt.X || k;
                            var r = k(b),
                                i = n * r;
                            d.rc[t] = i;
                            d[t] += i
                        }));
                        p[w] = d
                    }
                    ut = c(t, function(n, t) {
                        return wt[t] != e
                    });
                    ut && c(wt, function(t, i) {
                        p[i] == e && n[i] !== e && (p[i] = n[i])
                    });
                    ut && (p.$Zoom && (p.$ScaleX = p.$ScaleY = p.$Zoom), p.$OriginalWidth = y.$OriginalWidth, p.$OriginalHeight = y.$OriginalHeight, ct() && v >= 11 && (t.K || t.N) && i != 0 && i != 1 && (p.$Rotate = p.$Rotate || 1e-8), p.We = u)
                }
                if (t.$Clip && y.$Move) {
                    var tt = p.$Clip.rc,
                        ft = (tt.$Top || 0) + (tt.$Bottom || 0),
                        et = (tt.$Left || 0) + (tt.$Right || 0);
                    p.$Left = (p.$Left || 0) + et;
                    p.$Top = (p.$Top || 0) + ft;
                    p.$Clip.$Left -= et;
                    p.$Clip.$Right -= et;
                    p.$Clip.$Top -= ft;
                    p.$Clip.$Bottom -= ft
                }
                return !p.$Clip || p.$Clip.$Top || p.$Clip.$Left || p.$Clip.N || p.$Clip.K || p.$Clip.$Right != y.$OriginalWidth || p.$Clip.$Bottom != y.$OriginalHeight || (p.$Clip = r), p
            }
        };
    var l = function(t, i, r, h, c, l) {
            function ti(n) {
                y += n;
                v += n;
                nt += n;
                p += n;
                g += n;
                rt += n
            }

            function ct(n) {
                var f = n,
                    t, ct, b, w, k, it, st, ht;
                tt && (!ft && (f >= v || f < y) || ft && f >= y) && (f = ((f - y) % tt + tt) % tt + y);
                (!ut || d || p != f) && (t = s.j(f, v), t = s.m(t, y), r.$Reverse && (t = v - t + y), (!ut || d || t != g) && (l && (ct = (t - nt) / (i || 1), b = o.Ae(c, l, ct, yt, wt, pt, r), ot ? o.c(b, function(n, t) {
                    ot[t] && ot[t](h, n)
                }) : o.U(h, b), kt && (k = t > y && t < v, k != dt && (w = dt = k)), w || b.$Opacity == e || (it = b.$Opacity < .001, it != bt && (w = bt = it)), w != e && (w && o.Fc(h, "none"), w || o.Fc(h, o.n(h, "data-events")))), st = g, ht = g = t, o.c(et, function(n, i) {
                    var r = !ut && ft || f <= p ? et[et.length - i - 1] : n;
                    r.M(t - rt)
                }), p = f, ut = u, a.md(st - nt, ht - nt), a.Gb(st, ht)))
            }

            function lt(n, t, i) {
                t && n.$Shift(v);
                i || (y = s.j(y, n.Dc() + rt), v = s.m(v, n.nb() + rt));
                et.push(n)
            }

            function gt() {
                if (w) {
                    var t = o.Db(),
                        i = s.j(t - st, r.le),
                        n = p + i * k * vt;
                    st = t;
                    n * k >= b * k && (n = b);
                    ct(n);
                    !d && n * k >= b * k ? ni(ht) : it(gt)
                }
            }

            function at(n, t, i) {
                w || (w = u, d = i, ht = t, n = s.m(n, y), n = s.j(n, v), b = n, k = b < p ? -1 : 1, a.Oc(), st = o.Db(), it(gt))
            }

            function ni(n) {
                w && (d = w = ht = f, a.Kc(), n && n())
            }
            var it;
            t = t || 0;
            var a = this,
                w, b, k, d, st = 0,
                vt = 1,
                yt, pt, wt, ht, rt = 0,
                p = 0,
                g = 0,
                ut, nt, y, v, tt, ft, et = [],
                ot, bt = f,
                kt, dt = f;
            it = n.requestAnimationFrame || n.webkitRequestAnimationFrame || n.mozRequestAnimationFrame || n.msRequestAnimationFrame;
            (o.eh() && o.hd() < 7 || !it) && (it = function(n) {
                o.$Delay(n, r.$Interval)
            });
            a.$Play = function(n, t, i) {
                at(n ? p + n : v, t, i)
            };
            a.Gc = at;
            a.Le = function(n, t) {
                at(v, n, t)
            };
            a.L = ni;
            a.pe = function() {
                return p
            };
            a.ue = function() {
                return b
            };
            a.o = function() {
                return g
            };
            a.M = ct;
            a.Je = function() {
                ct(v, u)
            };
            a.$IsPlaying = function() {
                return w
            };
            a.je = function(n) {
                vt = n
            };
            a.$Shift = ti;
            a.ud = lt;
            a.W = function(n, t) {
                lt(n, 0, t)
            };
            a.od = function(n) {
                lt(n, 1)
            };
            a.nd = function(n) {
                v += n
            };
            a.Dc = function() {
                return y
            };
            a.nb = function() {
                return v
            };
            a.Gb = a.Oc = a.Kc = a.md = o.ug;
            a.sd = o.Db();
            r = o.F({
                $Interval: 16,
                le: 50
            }, r);
            h && (kt = o.n(h, "data-inactive"));
            tt = r.lc;
            ft = r.bf;
            ot = r.mf;
            y = nt = t;
            v = t + i;
            pt = r.$Round || {};
            wt = r.$During || {};
            yt = o.Zc(r.$Easing)
        },
        v = {
            af: "data-scale",
            Eb: "data-autocenter",
            Lc: "data-nofreeze",
            ee: "data-nodrag"
        },
        w = new function() {
            var n = this;
            n.xc = function(n, t, i, r) {
                (r || !o.n(n, t)) && o.n(n, t, i)
            };
            n.yc = function(n) {
                var t = o.q(n, v.Eb);
                o.fd(n, t)
            }
        },
        d = n.$JssorSlideshowFormations$ = new function() {
            function rt(n) {
                return (n & w) == w
            }

            function ut(n) {
                return (n & b) == b
            }

            function f(n, t, i) {
                i.push(t);
                n[t] = n[t] || [];
                n[t].push(i)
            }
            var e = this,
                n = 0,
                t = 1,
                i = 2,
                r = 3,
                k = 1,
                w = 2,
                b = 4,
                d = 8,
                g = 256,
                nt = 512,
                tt = 1024,
                it = 2048,
                o = it + k,
                h = it + w,
                c = nt + k,
                l = nt + w,
                a = g + b,
                v = g + d,
                y = tt + b,
                p = tt + d;
            e.$FormationStraight = function(n) {
                for (var u = n.$Cols, e = n.$Rows, k = n.$Assembly, d = n.sc, p = [], t = 0, i = 0, w = u - 1, b = e - 1, s = d - 1, r, i = 0; i < e; i++)
                    for (t = 0; t < u; t++) {
                        switch (k) {
                            case o:
                                r = s - (t * e + (b - i));
                                break;
                            case y:
                                r = s - (i * u + (w - t));
                                break;
                            case c:
                                r = s - (t * e + i);
                            case a:
                                r = s - (i * u + t);
                                break;
                            case h:
                                r = t * e + i;
                                break;
                            case v:
                                r = i * u + (w - t);
                                break;
                            case l:
                                r = t * e + (b - i);
                                break;
                            default:
                                r = i * u + t
                        }
                        f(p, r, [i, t])
                    }
                return p
            };
            e.$FormationSwirl = function(e) {
                var nt = e.$Cols,
                    tt = e.$Rows,
                    ft = e.$Assembly,
                    et = e.sc,
                    it = [],
                    rt = [],
                    d = 0,
                    s = 0,
                    p = 0,
                    b = nt - 1,
                    k = tt - 1,
                    g, w, ut = 0;
                switch (ft) {
                    case o:
                        s = b;
                        p = 0;
                        w = [i, t, r, n];
                        break;
                    case y:
                        s = 0;
                        p = k;
                        w = [n, r, t, i];
                        break;
                    case c:
                        s = b;
                        p = k;
                        w = [r, t, i, n];
                        break;
                    case a:
                        s = b;
                        p = k;
                        w = [t, r, n, i];
                        break;
                    case h:
                        s = 0;
                        p = 0;
                        w = [i, n, r, t];
                        break;
                    case v:
                        s = b;
                        p = 0;
                        w = [t, i, n, r];
                        break;
                    case l:
                        s = 0;
                        p = k;
                        w = [r, n, i, t];
                        break;
                    default:
                        s = 0;
                        p = 0;
                        w = [n, i, t, r]
                }
                for (d = 0; d < et;) {
                    if (g = p + "," + s, s >= 0 && s < nt && p >= 0 && p < tt && !rt[g]) rt[g] = u, f(it, d++, [p, s]);
                    else switch (w[ut++ % w.length]) {
                        case n:
                            s--;
                            break;
                        case i:
                            p--;
                            break;
                        case t:
                            s++;
                            break;
                        case r:
                            p++
                    }
                    switch (w[ut % w.length]) {
                        case n:
                            s++;
                            break;
                        case i:
                            p++;
                            break;
                        case t:
                            s--;
                            break;
                        case r:
                            p--
                    }
                }
                return it
            };
            e.$FormationZigZag = function(u) {
                var nt = u.$Cols,
                    tt = u.$Rows,
                    rt = u.$Assembly,
                    ut = u.sc,
                    k = [],
                    d = 0,
                    e = 0,
                    s = 0,
                    w = nt - 1,
                    b = tt - 1,
                    it, p, g = 0;
                switch (rt) {
                    case o:
                        e = w;
                        s = 0;
                        p = [i, t, r, t];
                        break;
                    case y:
                        e = 0;
                        s = b;
                        p = [n, r, t, r];
                        break;
                    case c:
                        e = w;
                        s = b;
                        p = [r, t, i, t];
                        break;
                    case a:
                        e = w;
                        s = b;
                        p = [t, r, n, r];
                        break;
                    case h:
                        e = 0;
                        s = 0;
                        p = [i, n, r, n];
                        break;
                    case v:
                        e = w;
                        s = 0;
                        p = [t, i, n, i];
                        break;
                    case l:
                        e = 0;
                        s = b;
                        p = [r, n, i, n];
                        break;
                    default:
                        e = 0;
                        s = 0;
                        p = [n, i, t, i]
                }
                for (d = 0; d < ut;)
                    if (it = s + "," + e, e >= 0 && e < nt && s >= 0 && s < tt && typeof k[it] == "undefined") {
                        f(k, d++, [s, e]);
                        switch (p[g % p.length]) {
                            case n:
                                e++;
                                break;
                            case i:
                                s++;
                                break;
                            case t:
                                e--;
                                break;
                            case r:
                                s--
                        }
                    } else {
                        switch (p[g++ % p.length]) {
                            case n:
                                e--;
                                break;
                            case i:
                                s--;
                                break;
                            case t:
                                e++;
                                break;
                            case r:
                                s++
                        }
                        switch (p[g++ % p.length]) {
                            case n:
                                e++;
                                break;
                            case i:
                                s++;
                                break;
                            case t:
                                e--;
                                break;
                            case r:
                                s--
                        }
                    }
                return k
            };
            e.$FormationStraightStairs = function(n) {
                var g = n.$Cols,
                    nt = n.$Rows,
                    e = n.$Assembly,
                    d = n.sc,
                    b = [],
                    k = 0,
                    r = 0,
                    u = 0,
                    s = g - 1,
                    w = nt - 1,
                    tt = d - 1,
                    t, i;
                switch (e) {
                    case o:
                    case l:
                    case c:
                    case h:
                        t = 0;
                        i = 0;
                        break;
                    case v:
                    case y:
                    case a:
                    case p:
                        t = s;
                        i = 0;
                        break;
                    default:
                        e = p;
                        t = s;
                        i = 0
                }
                for (r = t, u = i; k < d;) {
                    ut(e) || rt(e) ? f(b, tt - k++, [u, r]) : f(b, k++, [u, r]);
                    switch (e) {
                        case o:
                        case l:
                            r--;
                            u++;
                            break;
                        case c:
                        case h:
                            r++;
                            u--;
                            break;
                        case v:
                        case y:
                            r--;
                            u--;
                            break;
                        case p:
                        case a:
                        default:
                            r++;
                            u++
                    }
                    if (r < 0 || u < 0 || r > s || u > w) {
                        switch (e) {
                            case o:
                            case l:
                                t++;
                                break;
                            case v:
                            case y:
                            case c:
                            case h:
                                i++;
                                break;
                            case p:
                            case a:
                            default:
                                t--
                        }
                        if (t < 0 || i < 0 || t > s || i > w) {
                            switch (e) {
                                case o:
                                case l:
                                    t = s;
                                    i++;
                                    break;
                                case c:
                                case h:
                                    i = w;
                                    t++;
                                    break;
                                case v:
                                case y:
                                    i = w;
                                    t--;
                                    break;
                                case p:
                                case a:
                                default:
                                    t = 0;
                                    i++
                            }
                            i > w ? i = w : i < 0 ? i = 0 : t > s ? t = s : t < 0 && (t = 0)
                        }
                        u = i;
                        r = t
                    }
                }
                return b
            };
            e.$FormationRectangle = function(n) {
                for (var r = n.$Cols || 1, u = n.$Rows || 1, e = [], i, o = s.$Round(s.j(r / 2, u / 2)) + 1, t = 0; t < r; t++)
                    for (i = 0; i < u; i++) f(e, o - s.j(t + 1, i + 1, r - t, u - i), [i, t]);
                return e
            };
            e.$FormationRandom = function(n) {
                for (var r = [], t, i = 0; i < n.$Rows; i++)
                    for (t = 0; t < n.$Cols; t++) f(r, s.Q(1e5 * s.Md()) % 13, [i, t]);
                return r
            };
            e.$FormationCircle = function(n) {
                for (var r = n.$Cols || 1, u = n.$Rows || 1, e = [], t, o = r / 2 - .5, h = u / 2 - .5, i = 0; i < r; i++)
                    for (t = 0; t < u; t++) f(e, s.$Round(s.fc(s.v(i - o, 2) + s.v(t - h, 2))), [t, i]);
                return e
            };
            e.$FormationCross = function(n) {
                for (var r = n.$Cols || 1, u = n.$Rows || 1, e = [], t, o = r / 2 - .5, h = u / 2 - .5, i = 0; i < r; i++)
                    for (t = 0; t < u; t++) f(e, s.$Round(s.j(s.H(i - o), s.H(t - h))), [t, i]);
                return e
            };
            e.$FormationRectangleCross = function(n) {
                for (var e = n.$Cols || 1, o = n.$Rows || 1, h = [], t, r = e / 2 - .5, u = o / 2 - .5, c = s.m(r, u) + 1, i = 0; i < e; i++)
                    for (t = 0; t < o; t++) f(h, s.$Round(c - s.m(r - s.H(i - r), u - s.H(t - u))) - 1, [t, i]);
                return h
            }
        };
    n.$JssorSlideshowRunner$ = function(n, t, i, e, c, a) {
        function tt(n) {
            n.$Top && (n.N = n.$Top);
            n.$Left && (n.K = n.$Left);
            o.c(n, function(n) {
                o.Jd(n) && tt(n)
            })
        }

        function k(n, t, i) {
            var r = {
                $Interval: t,
                $Duration: 1,
                $Delay: 0,
                $Cols: 1,
                $Rows: 1,
                $Opacity: 0,
                $Zoom: 0,
                $Clip: 0,
                $Move: f,
                $SlideOut: f,
                $Reverse: f,
                $Formation: d.$FormationRandom,
                $Assembly: 1032,
                $ChessMode: {
                    $Column: 0,
                    $Row: 0
                },
                $Easing: h.$Linear,
                $Round: {},
                tc: [],
                $During: {}
            };
            return o.F(r, n), r.$Rows == 0 && (r.$Rows = s.$Round(r.$Cols * i)), tt(r), r.sc = r.$Cols * r.$Rows, r.$Easing = o.Zc(r.$Easing, h.$Linear), r.Te = s.Q(r.$Duration / r.$Interval), r.Se = function(n, t) {
                var f, i, u;
                if (n /= r.$Cols, t /= r.$Rows, f = n + "x" + t, !r.tc[f])
                    for (r.tc[f] = {
                            I: n,
                            G: t
                        }, i = 0; i < r.$Cols; i++)
                        for (u = 0; u < r.$Rows; u++) r.tc[f][u + "," + i] = {
                            $Top: u * t,
                            $Right: i * n + n,
                            $Bottom: u * t + t,
                            $Left: i * n
                        };
                return r.tc[f]
            }, r.$Brother && (r.$Brother = k(r.$Brother, t, i), r.$SlideOut = u), r
        }

        function it(n, t, i, r, e, h) {
            function ot(n) {
                var t = n.$Formation(n);
                return n.$Reverse ? t.reverse() : t
            }
            var it = this,
                nt, rt = {},
                y = {},
                w = [],
                l, c, b, k = i.$ChessMode.$Column || 0,
                d = i.$ChessMode.$Row || 0,
                v = i.Se(e, h),
                g = ot(i),
                et = g.length - 1,
                tt = i.$Duration + i.$Delay * et,
                ut = r + tt,
                p = i.$SlideOut,
                ft;
            ut += 50;
            it.Td = ut;
            it.jc = function(n) {
                var t, u;
                n -= r;
                t = n < tt;
                (t || ft) && (ft = t, p || (n = tt - n), u = s.Q(n / i.$Interval), o.c(y, function(n, t) {
                    var i = s.m(u, n.j);
                    i = s.j(i, n.length - 1);
                    n.Sd != i && (n.Sd || p ? i == n.m && p && o.xb(w[t]) : o.eb(w[t]), n.Sd = i, o.U(w[t], n[i]))
                }))
            };
            t = o.fb(t);
            a(t, 0, 0);
            o.c(g, function(n, t) {
                o.c(n, function(n) {
                    var at = n[0],
                        vt = n[1],
                        a = at + "," + vt,
                        w = f,
                        g = f,
                        it = f,
                        yt, pt, wt, r, tt, bt, kt, ut, ft, et, ot;
                    k && vt % 2 && (k & 3 && (w = !w), k & 12 && (g = !g), k & 16 && (it = !it));
                    d && at % 2 && (d & 3 && (w = !w), d & 12 && (g = !g), d & 16 && (it = !it));
                    i.$Top = i.$Top || i.$Clip & 4;
                    i.$Bottom = i.$Bottom || i.$Clip & 8;
                    i.$Left = i.$Left || i.$Clip & 1;
                    i.$Right = i.$Right || i.$Clip & 2;
                    var st = g ? i.$Bottom : i.$Top,
                        ht = g ? i.$Top : i.$Bottom,
                        ct = w ? i.$Right : i.$Left,
                        lt = w ? i.$Left : i.$Right;
                    for (i.$Clip = st || ht || ct || lt, b = {}, c = {
                            N: 0,
                            K: 0,
                            $Opacity: 1,
                            I: e,
                            G: h
                        }, l = o.F({}, c), nt = o.F({}, v[a]), i.$Opacity && (c.$Opacity = 2 - i.$Opacity), i.$ZIndex && (c.$ZIndex = i.$ZIndex, l.$ZIndex = 0), yt = i.$Cols * i.$Rows > 1 || i.$Clip, (i.$Zoom || i.$Rotate) && (pt = u, pt && (c.$Zoom = i.$Zoom ? i.$Zoom - 1 : 1, l.$Zoom = 1, wt = i.$Rotate || 0, c.$Rotate = wt * 360 * (it ? -1 : 1), l.$Rotate = 0)), yt && (r = nt.rc = {}, i.$Clip && (tt = i.$ScaleClip || 1, st && ht ? (r.$Top = v.G / 2 * tt, r.$Bottom = -r.$Top) : st ? r.$Bottom = -v.G * tt : ht && (r.$Top = v.G * tt), ct && lt ? (r.$Left = v.I / 2 * tt, r.$Right = -r.$Left) : ct ? r.$Right = -v.I * tt : lt && (r.$Left = v.I * tt)), b.$Clip = nt, l.$Clip = v[a]), bt = w ? 1 : -1, kt = g ? 1 : -1, i.x && (c.K += e * i.x * bt), i.y && (c.N += h * i.y * kt), o.c(c, function(n, t) {
                            o.uc(n) && n != l[t] && (b[t] = n - l[t])
                        }), rt[a] = p ? l : c, ut = i.Te, ft = s.$Round(t * i.$Delay / i.$Interval), y[a] = new Array(ft), y[a].j = ft, y[a].m = ft + ut - 1, et = 0; et <= ut; et++) ot = o.Ae(l, b, et / ut, i.$Easing, i.$During, i.$Round, {
                        $Move: i.$Move,
                        $OriginalWidth: e,
                        $OriginalHeight: h
                    }), ot.$ZIndex = ot.$ZIndex || 1, y[a].push(ot)
                })
            });
            g.reverse();
            o.c(g, function(i) {
                o.c(i, function(i) {
                    var u = i[0],
                        f = i[1],
                        e = u + "," + f,
                        r = t;
                    (f || u) && (r = o.fb(t));
                    o.U(r, rt[e]);
                    o.ic(r, "hidden");
                    o.wb(r, "absolute");
                    n.gf(r);
                    w[e] = r;
                    o.eb(r, !p)
                })
            })
        }

        function ft() {
            var n = this,
                t = 0;
            l.call(n, 0, g);
            n.Gb = function(n, i) {
                i - t > b && (t = i, p && p.jc(i), w && w.jc(i))
            };
            n.ld = nt
        }
        var v = this,
            g, w, p, rt = 0,
            ut = e.$TransitionsOrder,
            nt, b = 8;
        v.Ge = function() {
            var n = 0,
                t = e.$Transitions,
                i = t.length;
            return n = ut ? rt++ % i : s.R(s.Md() * i), t[n] && (t[n].ec = n), t[n]
        };
        v.He = function(r, u, f, e, o, h) {
            var c, l, y;
            v.yb();
            nt = o;
            o = k(o, b, h);
            c = e.Cd;
            l = f.Cd;
            c["no-image"] = !e.Qc;
            l["no-image"] = !f.Qc;
            var d = c,
                tt = l,
                rt = o,
                a = o.$Brother || k({}, b, h);
            o.$SlideOut || (d = l, tt = c);
            y = a.$Shift || 0;
            w = new it(n, tt, a, s.m(y - a.$Interval, 0), t, i);
            p = new it(n, d, rt, s.m(a.$Interval - y, 0), t, i);
            w.jc(0);
            p.jc(0);
            g = s.m(w.Td, p.Td);
            v.ec = r
        };
        v.yb = function() {
            n.yb();
            w = r;
            p = r
        };
        v.Me = function() {
            var n = r;
            return p && (n = new ft), n
        };
        c && o.Sg() < 537 && (b = 16);
        y.call(v);
        l.call(v, -1e7, 1e7)
    };
    b = {
        Ec: 1
    };
    n.$JssorBulletNavigator$ = function() {
        function et(n) {
            h[n] && h[n].Kd(n == l)
        }

        function ot(t) {
            n.k(b.Ec, t * a)
        }
        var n = this,
            st = o.Y(n, y),
            i, k, tt, it, d, l = 0,
            t, a, p, rt, ut, f, c, g, nt, ft, h;
        n.Wc = function(n) {
            if (n != d) {
                var i = l,
                    t = s.R(n / a);
                l = t;
                d = n;
                et(i);
                et(t)
            }
        };
        n.Xc = function(n) {
            o.eb(i, n)
        };
        n.Yc = function(v) {
            var y, st, b;
            o.$Destroy(h);
            d = e;
            n.Zd();
            ft = [];
            h = [];
            o.Qb(i);
            k = s.Q(v / a);
            l = 0;
            var ht = g + rt,
                ct = nt + ut,
                et = s.Q(k / p) - 1;
            for (tt = g + ht * (f ? p - 1 : et), it = nt + ct * (f ? et : p - 1), o.C(i, tt), o.D(i, it), y = 0; y < k; y++) {
                st = o.vg();
                o.zg(st, y + 1);
                b = o.zd(c, "numbertemplate", st, u);
                o.wb(b, "absolute");
                var lt = y % (et + 1),
                    at = s.R(y / (et + 1)),
                    vt = t.gc && !f ? et - lt : lt;
                o.Z(b, (f ? at : vt) * ht);
                o.V(b, (f ? vt : at) * ct);
                o.J(i, b);
                ft[y] = b;
                t.$ActionMode & 1 && n.a(b, "click", o.T(r, ot, y));
                t.$ActionMode & 2 && n.a(b, "mouseenter", o.T(r, ot, y));
                h[y] = o.Bc(b)
            }
            w.yc(i)
        };
        n.B = function(r, u) {
            n.$Elmt = i = o.$GetElement(r);
            n.dd = t = o.F({
                $SpacingX: 10,
                $SpacingY: 10,
                $ActionMode: 1
            }, u);
            c = o.$FindChild(i, "prototype");
            g = o.C(c);
            nt = o.D(c);
            o.qb(c, i);
            a = t.$Steps || 1;
            p = t.$Rows || 1;
            rt = t.$SpacingX;
            ut = t.$SpacingY;
            f = t.$Orientation & 2;
            t.$AutoCenter && w.xc(i, v.Eb, t.$AutoCenter)
        };
        n.$Destroy = function() {
            o.$Destroy(h, st)
        };
        o.B(n)
    };
    n.$JssorArrowNavigator$ = function() {
        function k(t) {
            n.k(b.Ec, t, u)
        }

        function g(n) {
            o.eb(t, n);
            o.eb(i, n)
        }

        function nt() {
            l.$Enable((f.$Loop || !s.hf(e)) && h > 1);
            a.$Enable((f.$Loop || !s.ff(e)) && h > 1)
        }
        var n = this,
            d = o.Y(n, y),
            t, i, f, s, p, h, e, c, l, a;
        n.Wc = function(n, t, i) {
            e = t;
            i || nt()
        };
        n.Xc = g;
        n.Yc = function(f) {
            h = f;
            e = 0;
            p || (n.a(t, "click", o.T(r, k, -c)), n.a(i, "click", o.T(r, k, c)), l = o.Bc(t), a = o.Bc(i), o.n(t, v.Lc, 1), o.n(i, v.Lc, 1), p = u)
        };
        n.B = function(r, u, e, h) {
            n.dd = f = o.F({
                $Steps: 1
            }, e);
            t = r;
            i = u;
            f.gc && (t = u, i = r);
            c = f.$Steps;
            s = h;
            f.$AutoCenter && (w.xc(t, v.Eb, f.$AutoCenter), w.xc(i, v.Eb, f.$AutoCenter));
            w.yc(t);
            w.yc(i)
        };
        n.$Destroy = function() {
            o.$Destroy(l, a, d)
        };
        o.B(n)
    };
    n.$JssorThumbnailNavigator$ = function() {
        function ht() {
            function v() {
                c.Kd(d == e)
            }

            function a(n) {
                if (n || !k.$LastDragSucceeded()) {
                    var o = t - e % t,
                        i = k.ie((e + o) / t - 1),
                        r = i * t + t - o;
                    i < 0 && (r += it % t);
                    i >= ot && (r -= it % t);
                    h.k(b.Ec, r, f, u)
                }
            }
            var i = this,
                e, s, c, l;
            o.Y(i, y);
            i.ne = v;
            i.B = function(t, f) {
                i.ec = e = f;
                l = t.Ne || t.Qc || o.Rb();
                i.id = s = o.zd(tt, "thumbnailtemplate", l, u);
                c = o.Bc(s);
                n.$ActionMode & 1 && i.a(s, "click", o.T(r, a, 0));
                n.$ActionMode & 2 && i.a(s, "mouseenter", o.T(r, a, 1))
            };
            o.B(i)
        }
        var h = this,
            st = o.Y(h, y),
            i, et, n, it, ot, d, l = [],
            ut, ft, t, a, p, g, nt, rt, k, tt;
        h.Wc = function(n, i, r) {
            if (n != d) {
                var u = d;
                d = n;
                u != -1 && l[u].ne();
                l[n] && l[n].ne()
            }
            r || k.$PlayTo(k.ie(s.R(n / t)))
        };
        h.Xc = function(n) {
            o.eb(i, n)
        };
        h.Yc = function(r, h) {
            var at, y, vt, yt, b, pt;
            o.$Destroy(k, l);
            d = e;
            l = [];
            at = o.fb(et);
            o.Qb(i);
            n.gc && o.n(i, "dir", "rtl");
            o.Gg(i, o.Cb(at));
            y = o.$FindChild(i, "slides", u);
            it = r;
            ot = s.Q(it / t);
            d = -1;
            var v = n.$Orientation & 1,
                tt = g + (g + a) * (t - 1) * (1 - v),
                st = nt + (nt + p) * (t - 1) * v,
                ct = (v ? s.m : s.j)(ut, tt),
                lt = (v ? s.j : s.m)(ft, st);
            rt = s.Q((ut - a) / (g + a) * v + (ft - p) / (nt + p) * (1 - v));
            vt = tt + (tt + a) * (rt - 1) * v;
            yt = st + (st + p) * (rt - 1) * (1 - v);
            ct = s.j(ct, vt);
            lt = s.j(lt, yt);
            o.C(y, ct);
            o.D(y, lt);
            o.fd(y, 3);
            b = [];
            o.c(h, function(n, i) {
                var f = new ht(n, i),
                    u = f.id,
                    r = s.R(i / t),
                    e = i % t;
                o.Z(u, (g + a) * e * (1 - v));
                o.V(u, (nt + p) * e * v);
                b[r] || (b[r] = o.Rb(), o.J(y, b[r]));
                o.J(b[r], u);
                l.push(f)
            });
            pt = o.F({
                $AutoPlay: 0,
                $NaviQuitDrag: f,
                $SlideWidth: tt,
                $SlideHeight: st,
                $SlideSpacing: a * v + p * (1 - v),
                $MinDragOffsetToSlide: 12,
                $SlideDuration: 200,
                $PauseOnHover: 1,
                $Cols: rt,
                $PlayOrientation: n.$Orientation,
                $DragOrientation: n.$NoDrag || n.$DisableDrag ? 0 : n.$Orientation
            }, n);
            k = new c(i, pt);
            w.yc(i)
        };
        h.B = function(r, f, e) {
            i = r;
            h.dd = n = o.F({
                $SpacingX: 0,
                $SpacingY: 0,
                $Orientation: 1,
                $ActionMode: 1
            }, f);
            ut = o.C(i);
            ft = o.D(i);
            var s = o.$FindChild(i, "slides", u);
            tt = o.$FindChild(s, "prototype");
            e = o.fb(e);
            o.tb(e, s);
            g = o.C(tt);
            nt = o.D(tt);
            o.qb(tt, s);
            o.wb(s, "absolute");
            o.ic(s, "hidden");
            t = n.$Rows || 1;
            a = n.$SpacingX;
            p = n.$SpacingY;
            n.$AutoCenter &= n.$Orientation;
            n.$AutoCenter && w.xc(i, v.Eb, n.$AutoCenter);
            et = o.fb(i)
        };
        h.$Destroy = function() {
            o.$Destroy(k, l, st)
        };
        o.B(h)
    };
    p.kd = 21;
    p.vc = 24;
    k = n.$JssorCaptionSlideo$ = function() {
        function vt(n, t) {
            var i = {};
            return o.c(n, function(n, r) {
                var u = ct[r];
                u && (o.Jd(n) ? n = vt(n, t || r == "e") : t && o.uc(n) && (n = ui[n]), i[u] = n)
            }), i
        }

        function yt(t, i) {
            var r = [],
                u = o.q(t, "play"),
                f, s;
            return i && u ? (f = new k(t, w, {
                Qg: u
            }), dt.push(f), n.a(f, p.kd, pi), n.a(f, p.vc, wi)) : o.c(o.Cb(t), function(n) {
                r = r.concat(yt(n, i + 1))
            }), (i || !(!e || e & 16)) && (!i || u && u & 16) || (s = lt[o.q(t, "t")], s && r.push({
                $Elmt: t,
                ld: s
            })), r
        }

        function pt(n) {
            var t = at[n],
                i;
            return t == r && (t = at[n] = {
                ub: n,
                Vc: [],
                wd: []
            }, i = 0, o.c(nt, function(t, r) {
                return i = r, t.ub > n
            }) || i++, nt.splice(i, 0, t)), t
        }

        function fi(n, t, i) {
            var f, e, c;
            if (ft && (c = ft[o.q(n, "c")], c && (f = pt(c.r, 0), f.Mg = c.e || 0)), o.c(t, function(t) {
                    var r = o.F(u, {}, vt(t)),
                        h = o.Zc(r.$Easing),
                        a, c, v;
                    delete r.$Easing;
                    r.$Left && (r.K = r.$Left, h.K = h.$Left, delete r.$Left);
                    r.$Top && (r.N = r.$Top, h.N = h.$Top, delete r.$Top);
                    a = {
                        $Easing: h,
                        $OriginalWidth: i.I,
                        $OriginalHeight: i.G
                    };
                    c = new l(t.b, t.d, a, n, i, r);
                    b = s.m(b, t.b + t.d);
                    f ? (e || (e = new l(t.b, 0)), e.W(c)) : (v = pt(t.b, t.b + t.d), v.Vc.push(c));
                    r.Ab && (i.Ab = {
                        Fd: 0,
                        Ad: 0,
                        Od: 0,
                        $Opacity: 0
                    });
                    i = o.Re(i, r)
                }), f && e) {
                e.Je();
                var h = e,
                    a, v = e.Dc(),
                    y = e.nb(),
                    p = s.m(y, f.Mg);
                f.ub < y && (f.ub > v ? (h = new l(v, f.ub - v), h.W(e, u)) : h = r, a = new l(f.ub, p - v, {
                    lc: p - f.ub,
                    bf: u
                }), a.W(e, u));
                h && f.Vc.push(h);
                a && f.wd.push(a)
            }
            return i
        }

        function ei(n) {
            o.c(n, function(n) {
                var t = n.$Elmt,
                    r = o.C(t),
                    u = o.D(t),
                    i = {
                        $Left: o.Z(t),
                        $Top: o.V(t),
                        K: 0,
                        N: 0,
                        $Opacity: 1,
                        $ZIndex: o.S(t) || 0,
                        $Rotate: 0,
                        $RotateX: 0,
                        $RotateY: 0,
                        $ScaleX: 1,
                        $ScaleY: 1,
                        $TranslateX: 0,
                        $TranslateY: 0,
                        $TranslateZ: 0,
                        $SkewX: 0,
                        $SkewY: 0,
                        I: r,
                        G: u,
                        $Clip: {
                            $Top: 0,
                            $Right: r,
                            $Bottom: u,
                            $Left: 0
                        }
                    };
                i.se = i.$Left;
                i.ve = i.$Top;
                fi(t, n.ld, i)
            })
        }

        function oi(t, i, r) {
            var e = t.b - i,
                f;
            return e && (f = new l(i, e), f.W(g, u), f.$Shift(r), n.W(f)), n.nd(t.d), e
        }

        function si(t) {
            var i = g.Dc(),
                r = 0;
            o.c(t, function(t, u) {
                t = o.F({
                    d: 3e3
                }, t);
                oi(t, i, r);
                i = t.b;
                r += t.d;
                u && t.t != 2 || (n.oc = i, n.Tc = i + t.d)
            })
        }

        function ot(n, t, i) {
            var u = t.length,
                h, r, f, e;
            if (u > 4)
                for (h = s.Q(u / 4), r = 0; r < h; r++) f = t.slice(r * 4, s.j(r * 4 + 4, u)), e = new l(f[0].ub, 0), ot(e, f, i), n.W(e);
            else o.c(t, function(t) {
                o.c(i ? t.wd : t.Vc, function(t) {
                    i && t.nd(b - t.nb());
                    n.W(t)
                })
            })
        }

        function rt(n) {
            return n & 2 || n & 4 && o.Rc().Hc
        }

        function hi() {
            st || (c & 8 && n.a(t, "keydown", ii), c & 32 && (n.a(t, "mousedown", ut), n.a(t, "touchstart", ut)), st = u)
        }

        function ci() {
            n.ab(t, "keydown", ii);
            n.ab(t, "mousedown", ut);
            n.ab(t, "touchstart", ut);
            st = f
        }

        function ni(t) {
            (!d || t) && (d = u, n.L(), t && tt && n.M(0), n.je(1), n.Le(), hi(), n.k(p.kd, n))
        }

        function v() {
            !ht && (d || n.o()) && (ht = u, n.L(), n.pe() > n.oc && n.M(n.oc), n.je(bt || 1), n.Gc(0))
        }

        function li() {
            a || v()
        }

        function ti(t) {
            var i = t;
            t < 0 && n.o() && (i = 1);
            i != tt && (tt = i, wt && n.k(p.vc, n, tt))
        }

        function ii(n) {
            c & 8 && o.he(n) == 27 && v()
        }

        function ai(n) {
            a && o.Ee(n) !== r && (a = f, c & 16 && o.$Delay(li, 160))
        }

        function ut(n) {
            c & 32 && !o.de(i, o.$EvtSrc(n)) && v()
        }

        function vi(n) {
            a || (a = u, e & 1 && o.fe(n, i) && ni())
        }

        function yi(n) {
            var s = o.$EvtSrc(n),
                t = o.lb(s, r, r, "A"),
                f = t && (o.qg(t) || t === i || o.de(i, t));
            d && rt(c) ? f || v() : rt(e) && (f || ni(u))
        }

        function pi(n) {
            var i = n.Dg(),
                t = gt[i];
            t !== n && t && t.sg();
            gt[i] = n
        }

        function wi(t, i) {
            n.k(p.vc, t, i)
        }
        var n = this,
            ri = o.Y(n, y);
        l.call(n, 0, 0);
        var i, w, ui = [h.$Linear, h.$Swing, h.$InQuad, h.$OutQuad, h.$InOutQuad, h.$InCubic, h.$OutCubic, h.$InOutCubic, h.$InQuart, h.$OutQuart, h.$InOutQuart, h.$InQuint, h.$OutQuint, h.$InOutQuint, h.$InSine, h.$OutSine, h.$InOutSine, h.$InExpo, h.$OutExpo, h.$InOutExpo, h.$InCirc, h.$OutCirc, h.$InOutCirc, h.$InElastic, h.$OutElastic, h.$InOutElastic, h.$InBack, h.$OutBack, h.$InOutBack, h.$InBounce, h.$OutBounce, h.$InOutBounce, h.$Early, h.$Late],
            ct = {},
            lt, ft, g = new l(0, 0),
            at = [],
            nt = [],
            et, b = 0;
        var e, wt, tt = 0,
            c, it, bt, kt, st, dt = [],
            gt = [],
            d, ht, a;
        n.Dg = function() {
            return kt || ""
        };
        n.sg = v;
        n.Oc = function() {
            ti(1)
        };
        n.Kc = function() {
            d = f;
            ht = f;
            ti(-1);
            n.o() || ci()
        };
        n.Gb = function() {
            !a && it && n.pe() > n.Tc && v()
        };
        n.B = function(t, r, f) {
            var h;
            i = t;
            w = r;
            e = f.Qg;
            et = f.pg;
            lt = w.$Transitions;
            ft = w.$Controls;
            h = {
                $Top: "y",
                $Left: "x",
                $Bottom: "m",
                $Right: "t",
                $Rotate: "r",
                $RotateX: "rX",
                $RotateY: "rY",
                $ScaleX: "sX",
                $ScaleY: "sY",
                $TranslateX: "tX",
                $TranslateY: "tY",
                $TranslateZ: "tZ",
                $SkewX: "kX",
                $SkewY: "kY",
                $Opacity: "o",
                $Easing: "e",
                $ZIndex: "i",
                $Clip: "c",
                Ab: "bc",
                Fd: "re",
                Ad: "gr",
                Od: "bl"
            };
            o.c(h, function(n, t) {
                ct[n] = t
            });
            ei(yt(i, 0));
            ot(g, nt);
            e && (n.W(g), et = u, it = o.q(i, "idle"), c = o.q(i, "rollback"), bt = o.q(i, "speed", 1), kt = o.db(i, "group"), (rt(e) || rt(c)) && n.a(i, "click", yi), (e & 1 || it) && !o.Rc().Hc && (n.a(i, "mouseenter", vi), n.a(i, "mouseleave", ai)), wt = o.q(i, "pause"));
            var l = w.$Breaks || [],
                s = l[o.q(i, "b")] || [],
                a = {
                    b: b,
                    d: s.length ? 0 : f.$Idle || it || 0
                };
            s = s.concat([a]);
            si(s);
            n.nb();
            et && n.nd(1e8);
            b = n.nb();
            ot(n, nt, u);
            n.M(-1);
            n.M(o.q(i, "initial") || 0)
        };
        n.$Destroy = function() {
            o.$Destroy(ri, dt);
            n.L();
            n.M(-1)
        };
        o.B(n)
    };
    c = n.$JssorSlider$ = (n.module || {}).exports = function() {
        function tu() {
            return !ui && oi & 12
        }

        function kf() {
            return au || !ui && oi & 3
        }

        function iu() {
            return !et && !tu() && !rt.$IsPlaying()
        }

        function ye() {
            return !kf() && iu()
        }

        function df() {
            return ut || ni
        }

        function pe() {
            return df() & 2 ? di : ki
        }

        function gf(n, t, i) {
            o.Z(n, t);
            o.V(n, i)
        }

        function ne(n, t) {
            var i = df(),
                r = (ki * t + lu) * (i & 1),
                u = (di * t + lu) * (i & 2) / 2;
            gf(n, r, u)
        }

        function te(n, t) {
            var u, r, i;
            return !et || ft & 1 || (u = n, n < dt && (u = dt, r = -1), n > ri && (u = ri, r = 1), r && (i = n - u, t ? (i = s.Zf(i) * 2 / s.E, i = s.v(i * r, 1.6)) : (i = s.v(i * r, .625), i = s.Id(i * s.E / 2)), n = u + i * r)), n
        }

        function we(n) {
            return te(n, u)
        }

        function be(n) {
            return te(n)
        }

        function ru(n, t) {
            if (!(ft & 1)) {
                var i = n - ri + (t || 0),
                    r = dt - n + (t || 0);
                i > 0 && i > r ? n = ri : r > 0 && (n = dt)
            }
            return n
        }

        function ie(n) {
            return !(ft & 1) && n - dt < .0001
        }

        function re(n) {
            return !(ft & 1) && ri - n < .0001
        }

        function or(n) {
            return !(ft & 1) && (n - dt < .0001 || ri - n < .0001)
        }

        function wu(n, t, i) {
            er || o.c(ei, function(r) {
                r.Wc(n, t, i)
            })
        }

        function ue(n) {
            var t = n,
                i = or(n);
            return i ? t = ru(t) : (n = nt(n), t = n), t = s.R(t), s.m(t, 0)
        }

        function ke(n) {
            it[g];
            cf = g;
            g = n;
            lf = it[g]
        }

        function de() {
            ut = 0;
            var n = ot.o(),
                t = ue(n);
            wu(t, n);
            (or(n) || n == s.R(n)) && (k & 2 && (ai > 0 && t == w - 1 || ai < 0 && !t) && (k = 0), ke(t), i.k(c.$EVT_PARK, g, cf))
        }

        function fe(n, t) {
            !w || t && rt.$IsPlaying() || (rt.L(), rt.bd(n, n))
        }

        function sr(n) {
            w ? (n = nt(n), n = ru(n), fe(n)) : wu(0, 0)
        }

        function ge() {
            var t = c.ae || 0,
                n = ir;
            return c.ae |= n, fi = n & ~t
        }

        function no() {
            fi && (c.ae &= ~ir, fi = 0)
        }

        function bu(n) {
            var t = o.Rb();
            return o.U(t, li), n && o.ic(t, "hidden"), t
        }

        function nt(n, t) {
            return t = t || w || 1, (n % t + t) % t
        }

        function ee(n, t, i) {
            k & 8 && (k = 0);
            hr(n, wr, t, i)
        }

        function ku() {
            o.c(ei, function(n) {
                n.Xc(n.dd.$ChanceToShow <= ui)
            })
        }

        function to(n) {
            ui || !o.Ee(n) && o.fe(n, d) || (ui = 1, ku(), et || (oi & 12 && he(), it[g] && it[g].zc()), i.k(c.$EVT_MOUSE_LEAVE))
        }

        function io() {
            ui && (ui = 0, ku(), !et && oi & 12 && se());
            i.k(c.$EVT_MOUSE_ENTER)
        }

        function ro() {
            o.U(ti, li)
        }

        function du(n, t) {
            hr(n, t, u)
        }

        function hr(n, t, i, r) {
            var c, o, l, h, v, y, p;
            !w || et && !a.$NaviQuitDrag || tu() || isNaN(n) || (c = ot.o(), o = n, i && (o = c + n, ft & 2 && (ie(c) && n < 0 && (o = ri), re(c) && n > 0 && (o = dt))), ft & 1 || (o = r ? nt(o) : ru(o, .5)), i && !or(o) && (o = s.$Round(o)), l = (o - c) % w, o = c + l, t == e && (t = wr), h = s.H(l), v = 0, h && (h < 1 && (h = s.v(h, .5)), h > 1 && (y = pe(), p = (ni & 1 ? ar : vr) / y, h = s.j(h, p * 1.5)), v = t * h), er = u, rt.L(), er = f, rt.bd(c, o, v))
        }

        function uo(n, t, i) {
            var a = this,
                h = {
                    $Top: 2,
                    $Right: 1,
                    $Bottom: 2,
                    $Left: 1
                },
                y = {
                    $Top: "top",
                    $Right: "right",
                    $Bottom: "bottom",
                    $Left: "left"
                },
                f, r, e, c, l = {};
            a.$Elmt = n;
            a.$ScaleSize = function(a, p, w) {
                var b, d = a,
                    g = p,
                    nt, tt, k;
                e || (e = o.Hg(n), f = n.parentNode, c = {
                    $Scale: o.q(n, v.af, 1),
                    $AutoCenter: o.q(n, v.Eb)
                }, o.c(y, function(t, i) {
                    l[i] = o.q(n, "data-scale-" + t, 1)
                }), r = n, t && (r = o.fb(f, u), o.U(r, {
                    $Top: 0,
                    $Left: 0
                }), o.J(r, n), o.J(f, r)));
                i ? (b = s.m(a, p), t && w >= 0 && w < 1 && (nt = s.j(a, p), b = s.j(b / nt, 1 / (1 - w)) * nt)) : d = g = b = s.v(pt < wt ? p : a, c.$Scale);
                tt = t ? 1.001 : 1;
                k = b * tt;
                t && (sf = k);
                o.Vd(r, k);
                o.C(f, e.I * d);
                o.D(f, e.G * g);
                var it = o.be() && o.hd() < 9 ? k : 1,
                    rt = (d - it) * e.I / 2,
                    ut = (g - it) * e.G / 2;
                o.Z(r, rt);
                o.V(r, ut);
                o.c(e, function(n, t) {
                    if (h[t] && n) {
                        var i = (h[t] & 1) * s.v(a, l[t]) * n + (h[t] & 2) * s.v(p, l[t]) * n / 2;
                        o.kf[t](f, i)
                    }
                });
                o.fd(f, c.$AutoCenter)
            }
        }

        function fo() {
            var n = this;
            l.call(n, 0, 0, {
                lc: w
            });
            o.c(it, function(t) {
                n.od(t);
                t.$Shift(vt / ht)
            })
        }

        function eo() {
            var n = this,
                t = nu.$Elmt;
            l.call(n, -1, 2, {
                $Easing: h.$Linear,
                mf: {
                    Ob: ne
                },
                lc: w,
                $Reverse: pr
            }, t, {
                Ob: 1
            }, {
                Ob: -2
            });
            n.id = t
        }

        function oo() {
            var n = this;
            l.call(n, -1e8, 2e8);
            n.Gb = function(n, t) {
                var r, f, e;
                s.H(t - n) > 1e-5 && (r = t, f = t, s.R(t) != t && t > n && (ft & 1 || t > vi) && f++, e = ue(f), wu(e, r, u), i.k(c.$EVT_POSITION_CHANGE, nt(r), nt(n), t, n))
            }
        }

        function so(n, t) {
            var e = this,
                h, v, o, s, y;
            l.call(e, -1e8, 2e8, {
                le: 100
            });
            e.Oc = function() {
                rr = u;
                i.k(c.$EVT_SWIPE_START, nt(ot.o()), si.o())
            };
            e.Kc = function() {
                rr = f;
                s = f;
                i.k(c.$EVT_SWIPE_END, nt(ot.o()), si.o());
                et || de()
            };
            e.Gb = function(n, t) {
                var i = t,
                    r;
                s ? i = y : o && (r = t / o, i = a.$SlideEasing(r) * (v - h) + h);
                i = we(i);
                si.M(i)
            };
            e.bd = function(n, t, i, r) {
                et = f;
                o = i || 1;
                h = n;
                v = t;
                er = u;
                si.M(n);
                er = f;
                e.M(0);
                e.Gc(o, r)
            };
            e.Rg = function() {
                s = u;
                s && e.$Play(r, r, u)
            };
            e.Ug = function(n) {
                y = n
            };
            si = new oo;
            si.W(n);
            cu && si.W(t)
        }

        function ho() {
            var t = this,
                n = bu();
            o.S(n, 0);
            t.$Elmt = n;
            t.gf = function(t) {
                o.J(n, t);
                o.eb(n)
            };
            t.yb = function() {
                o.xb(n);
                o.Qb(n)
            }
        }

        function co(n, t) {
            function bt() {
                rt && rt.$Destroy();
                au -= vt;
                vt = 0;
                rt = new hi.$Class(tt, hi, {
                    $Idle: o.q(tt, "idle", pf),
                    pg: !k
                });
                rt.$On(p.vc, si)
            }

            function oi() {
                rt.sd < hi.sd && bt()
            }

            function si(n, i) {
                vt += i;
                au += i;
                t == g && (vt || h.zc())
            }

            function ui(n, r, e) {
                var w, b;
                if (!wt) {
                    if (wt = u, v && e) {
                        var k = o.q(v, "data-expand", 0) * 2,
                            l = e.width,
                            a = e.height,
                            y = l,
                            p = a;
                        l && a && (ut && (ut & 3 && (!(ut & 4) || l > lt || a > at) && (w = f, b = lt / at * a / l, ut & 1 ? w = b > 1 : ut & 2 && (w = b < 1), y = w ? l * at / a : lt, p = w ? at : a * lt / l), o.C(v, y), o.D(v, p), o.V(v, (at - p) / 2), o.Z(v, (lt - y) / 2)), o.Vd(v, s.m((y + k) / y, (p + k) / p)));
                        o.wb(v, "absolute")
                    }
                    i.k(c.$EVT_LOAD_END, t)
                }
                r.Yd(f);
                n && n(h)
            }

            function ci(n, i, r, f) {
                if (f == et && g == t && k && iu() && !h.Nc()) {
                    var e = nt(n);
                    ct.He(e, t, i, h, r, at / lt);
                    i.dh();
                    ur.$Shift(e - ur.Dc() - 1);
                    ur.M(e);
                    fe(e, u)
                }
            }

            function vi(i) {
                if (i == et && g == t && iu() && !h.Nc()) {
                    if (!b) {
                        var u = r;
                        ct && (ct.ec == t ? u = ct.Me() : ct.yb());
                        oi();
                        b = new lo(n, t, u, rt);
                        b.og(d)
                    }
                    b.$IsPlaying() || b.Jc()
                }
            }

            function dt(n, i, u) {
                if (n == t) n != i ? it[i] && it[i].Ce() : !u && b && b.Df(), d && d.$Enable(), et = o.Db(), h.Kb(o.T(r, vi, et));
                else {
                    var f = s.j(t, n),
                        e = s.m(t, n),
                        c = s.j(e - f, f + w - e),
                        l = kt + a.$LazyLoading - 1;
                    (!ii || c <= l) && h.Kb()
                }
            }

            function pi() {
                g == t && b && (b.L(), d && d.$Quit(), d && d.$Disable(), b.De())
            }

            function wi() {
                g == t && b && b.L()
            }

            function bi(n) {
                yi || i.k(c.$EVT_CLICK, t, n)
            }

            function fi(n, t, i) {
                var f, e, s, h;
                o.n(n, uu) || (i && (tt || (tt = n, st = bu(u), f = "background", o.O(st, f + "Color", o.O(tt, f + "Color")), o.O(st, f + "Image", o.O(tt, f + "Image")), o.O(tt, f, r), o.tb(st, tt)), o.n(n, "data-events", o.Fc(n)), o.n(n, "data-display", o.zb(n)), o.ch(n, o.db(n, "data-to")), o.bh(n, o.db(n, "data-bf")), i > 1 && o.kc(n, o.n(n, "data-ts")), o.ah(n, o.q(n, "data-p")), o.yg(n, o.db(n, "po")), n.tagName == "IMG" && (ht.push(n), o.n(n, "src") || (ii = u, o.xb(n))), e = o.lf(n), e && (s = new Image, o.n(s, "src", e), ht.push(s)), i && o.S(n, (o.S(n) || 0) + 1)), h = o.Cb(n), o.c(h, function(r) {
                    i < 3 && !v && o.db(r, "u") == "image" && (v = r, v.border = 0, o.U(v, li), o.U(n, li), o.O(v, "maxWidth", "10000px"), o.J(st, v));
                    fi(r, t, i + 1)
                }))
            }
            var h = this,
                ei = o.Y(h, y),
                rt, vt = 0,
                gt, tt, st, ut, yt, v, ht = [],
                ni, wt, ii, b, d, et, ri, pt;
            l.call(h, -kt, kt + 1, {
                lc: ft & 1 ? w : e,
                $Reverse: pr
            });
            h.Yd = function(t) {
                ri != t && (ri = t, t && o.J(n, yt), t || o.qb(yt))
            };
            h.Kb = function(n, f) {
                f = f || h;
                ht.length && !wt ? (f.Yd(u), ni || (ni = u, i.k(c.$EVT_LOAD_START, t), o.c(ht, function(n) {
                    if (!o.n(n, "src")) {
                        var t = o.db(n, "src") || o.db(n, "src2") || "";
                        t && (n.src = t, o.zb(n, o.n(n, "data-display")))
                    }
                })), o.Ig(ht, v, o.T(r, ui, n, f))) : ui(n, f)
            };
            h.Gf = function() {
                var n, i, u;
                if (ye())
                    if (w == 1) h.Ce(), dt(t, t);
                    else {
                        if (ct && (n = ct.Ge(w)), n) return et = o.Db(), i = t + ai, u = it[nt(i)], u.Kb(o.T(r, ci, i, u, n, et), h);
                        !ft && or(ot.o()) && or(ot.o() + ai) || du(ai)
                    }
            };
            h.zc = function() {
                dt(t, t, u)
            };
            h.Ce = function() {
                d && d.$Quit();
                d && d.$Disable();
                h.re();
                b && b.Kf();
                b = r;
                bt()
            };
            h.dh = function() {
                o.xb(n)
            };
            h.re = function() {
                o.eb(n)
            };
            h.md = function(n, t) {
                var i = kt - t;
                ne(gt, i)
            };
            h.ec = t;
            fi(n, u, 0);
            ut = o.q(tt, "data-fillmode", a.$FillMode);
            pt = o.$FindChild(tt, "thumb", u);
            pt && (h.Ne = o.fb(pt), o.xb(pt));
            o.eb(n);
            yt = o.fb(ti);
            o.S(yt, 1e3);
            h.a(n, "click", bi);
            bt(u);
            h.Qc = v;
            h.Cd = n;
            h.id = gt = n;
            h.a(i, 203, dt);
            h.a(i, 28, wi);
            h.a(i, 24, pi);
            h.$Destroy = function() {
                o.$Destroy(ei, rt, b)
            }
        }

        function lo(n, t, r, e) {
            function ot() {
                s.Jc()
            }

            function st(n) {
                rt = n;
                s.L();
                s.Jc()
            }

            function ht() {}
            var s = this,
                ft = o.Y(s, y),
                w = 0,
                nt = 0,
                v, b, a, h, d, tt, rt, ut = it[t];
            l.call(s, 0, 0);
            s.Jc = function() {
                var n, r;
                et || rr || rt || g != t || s.Nc() || (n = s.o(), n || v && !d && (d = u, s.De(u), i.k(c.$EVT_SLIDESHOW_START, t, nt, w, nt, v, h)), i.k(c.$EVT_STATE_CHANGE, t, n, w, b, a, h), tu() || (n == h ? k && o.$Delay(ut.Gf, 20) : (r = n == a ? h : n ? s.ue() : a, n == a && kf() || s.Gc(r, ot))))
            };
            s.Df = function() {
                a == h && a == s.o() && s.M(b)
            };
            s.Kf = function() {
                ct && ct.ec == t && ct.yb();
                var n = s.o();
                n < h && i.k(c.$EVT_STATE_CHANGE, t, -n - 1, w, b, a, h)
            };
            s.De = function(n) {
                r && o.ic(ii, n && r.ld.$Outside ? "" : "hidden")
            };
            s.md = function(n, r) {
                d && r >= v && (d = f, ut.re(), ct.yb(), i.k(c.$EVT_SLIDESHOW_END, t, v, w, nt, v, h));
                i.k(c.$EVT_PROGRESS_CHANGE, t, r, w, b, a, h)
            };
            s.og = function(n) {
                n && !tt && (tt = n, n.$On($JssorPlayer$.jf, st))
            };
            s.a(e, p.kd, ht);
            r && s.od(r);
            v = s.nb();
            s.od(e);
            b = v + e.oc;
            h = s.nb();
            a = k ? v + e.Tc : h;
            s.$Destroy = function() {
                ft.$Destroy();
                s.L()
            }
        }

        function oe() {
            pu = rr;
            wf = rt.ue();
            pi = ot.o();
            fr = be(pi)
        }

        function se() {
            oe();
            (et || tu()) && (rt.L(), i.k(c.Jf))
        }

        function he(n) {
            var i;
            if (iu()) {
                var r = ot.o(),
                    t = fr,
                    u = 0;
                n && s.H(gt) >= a.$MinDragOffsetToSlide && (t = r, u = gr);
                t = s.Q(t);
                t = ru(t + u, .5);
                i = s.H(t - r);
                i < 1 && a.$SlideEasing != h.$Linear && (i = s.v(i, .5));
                yi && n || !pu ? r == t ? lf.zc() : rt.bd(r, t, i * wr) : rt.Gc(wf)
            }
        }

        function ce(n) {
            o.lb(o.$EvtSrc(n), e, v.ee) || o.$CancelEvent(n)
        }

        function le(n) {
            br = f;
            et = u;
            se();
            pu || (ut = 0);
            i.k(c.$EVT_DRAG_START, nt(pi), pi, n)
        }

        function ao(n) {
            ae(n, 1)
        }

        function ae(n, r) {
            var f, u, s;
            gt = 0;
            dr = 0;
            gr = 0;
            of = sf;
            r ? (f = n.touches[0], kr = {
                x: f.clientX,
                y: f.clientY
            }) : kr = o.pd(n);
            u = o.$EvtSrc(n);
            s = o.lb(u, "1", rf);
            s && s !== d || fi || r && n.touches.length != 1 || (gi = o.lb(u, e, v.ee) || !ir || !ge(), i.a(t, r ? "touchmove" : "mousemove", gu), br = !gi && o.lb(u, e, v.Lc), br || gi || le(n, r))
        }

        function gu(n) {
            var t, i, c, l;
            if (n = o.Yg(n), n.type != "mousemove" ? n.touches.length == 1 ? (i = n.touches[0], t = {
                    x: i.clientX,
                    y: i.clientY
                }) : wi() : t = o.pd(n), t) {
                var r = t.x - kr.x,
                    f = t.y - kr.y,
                    e = s.H(r),
                    h = s.H(f);
                (ut || e > 1.5 || h > 1.5) && (br ? le(n, i) : (s.R(fr) != fr && (ut = ut || ni & fi), (r || f) && !ut && (ut = fi == 3 ? h > e ? 2 : 1 : fi, yu && ut == 1 && h > e * 2.4 && (gi = u)), c = r, l = ki, ut == 2 && (c = f, l = di), (gt - dr) * tr < -1.5 && (gr = 0), (gt - dr) * tr > 1.5 && (gr = -1), dr = gt, gt = c, bf = fr - gt * tr / l / of * a.$DragRatio, gt && ut && !gi && (o.$CancelEvent(n), rt.Rg(u), rt.Ug(bf))))
            }
        }

        function wi() {
            if (no(), i.ab(t, "mousemove", gu), i.ab(t, "touchmove", gu), yi = gt, et) {
                yi && k & 8 && (k = 0);
                rt.L();
                et = f;
                var n = ot.o();
                i.k(c.$EVT_DRAG_END, nt(n), n, nt(pi), pi);
                oi & 12 && oe();
                he(u)
            }
        }

        function vo(n) {
            var i = o.$EvtSrc(n),
                t = o.lb(i, "1", uu),
                r;
            d === t && (yi ? (o.$StopEvent(n), t = o.lb(i, e, "data-jssor-button", "A"), t && o.$CancelEvent(n)) : (k & 4 && (k = 0), t = o.lb(i, e, "data-jssor-click"), t && (o.$CancelEvent(n), hitValues = (o.n(t, "data-jssor-click") || "").split(":"), r = o.Jg(hitValues[1]), hitValues[0] == "to" && hr(r - 1), hitValues[0] == "next" && hr(r, e, u))))
        }

        function yo() {
            vu.ze && o.O(tt, vu.ze, [r, "pan-y", "pan-x", "auto"][ir] || "");
            i.a(d, "click", vo, u);
            i.a(d, "mouseleave", to);
            i.a(d, "mouseenter", io);
            i.a(d, "mousedown", ae);
            i.a(d, "touchstart", ao);
            i.a(d, "dragstart", ce);
            i.a(d, "selectstart", ce);
            i.a(n, "mouseup", wi);
            i.a(t, "mouseup", wi);
            i.a(t, "touchend", wi);
            i.a(t, "touchcancel", wi);
            i.a(n, "blur", wi);
            a.$ArrowKeyNavigation && i.a(t, "keydown", function(n) {
                var t = o.he(n);
                (t == 37 || t == 39) && (k & 8 && (k = 0), ee(a.$ArrowKeyNavigation * (t - 38) * tr, u))
            })
        }

        function ve(n) {
            var r, f, t, i, h, c;
            if (tf.Zd(), st = [], it = [], r = o.Cb(tt), f = o.Dd(["DIV", "A", "LI"]), o.c(r, function(n) {
                    var t = n;
                    f[n.tagName.toUpperCase()] && !o.db(n, "u") && o.zb(n) != "none" && (t = bu(u), o.U(n, li), o.tb(t, n), o.J(t, n), o.kc(t, "flat"), o.kc(n, "preserve-3d"), o.xb(t), st.push(t));
                    o.S(t, (o.S(t) || 0) + 1)
                }), w = st.length, w) {
                for (t = ni & 1 ? ar : vr, ro(), vt = a.$Align, vt == e && (vt = (t - ht + bt) / 2), yr = t / ht, kt = s.j(w, a.$Cols || w, s.Q(yr)), ft = kt < w ? a.$Loop : 0, w * ht - bt <= t && (yr = w - bt / ht, vt = (t - ht + bt) / 2, lu = (t - ht * w + bt) / 2), cr && (hu = cr.$Class, cu = !vt && kt == 1 && w > 1 && hu && (!o.be() || o.hd() >= 9)), ft & 1 || (vi = vt / ht, vi > w - 1 && (vi = w - 1, vt = vi * ht), dt = vi, ri = dt + w - yr - bt / ht), ir = (kt > 1 || vt ? ni : -1) & a.$DragOrientation, cu && (ct = new hu(nu, lt, at, cr, yu, gf)), i = 0; i < st.length; i++) h = st[i], c = new co(h, i), it.push(c);
                ur = new eo;
                ot = new fo;
                rt = new so(ot, ur);
                yo()
            }
            o.c(ei, function(t) {
                t.Yc(w, it);
                n && t.$On(b.Ec, ee)
            })
        }

        function nf(n, t, i) {
            o.te(n) && (n = o.ud("", n));
            var r, u;
            w && (t == e && (t = w), u = "beforebegin", r = st[t], r || (u = "afterend", r = st[w - 1]));
            o.$Destroy(it);
            n && o.Fg(r || tt, u || "afterbegin", n);
            o.c(i, function(n) {
                o.qb(n)
            });
            ve()
        }
        var i = this,
            tf = o.Y(i, y),
            uu = "data-jssor-slider",
            rf = "data-jssor-thumb",
            d, a, ni, cr, hi, bi, ci, yt, pt, wt, fu, uf, ff = 1,
            ef = 1,
            of = 1,
            sf = 1,
            hf = {},
            tt, ti, eu, ou, su, lr, ar, vr, li, st = [],
            cf, g = -1,
            lf, w, lt, at, bt, ki, di, ht, kt, yr, ii, ut, fi, gi, ei = [],
            af, vf, yf, k, nr, pr, tr, ai, oi, pf, wr, hu, cu, vt, lu = 0,
            vi = 0,
            ri = Number.MAX_VALUE,
            dt = Number.MIN_VALUE,
            ft, ir, yi, ui = 1,
            au = 0,
            rr, et, br, kr, gt, dr, gr, ot, si, ur, rt, nu, vu = o.Rc(),
            yu = vu.Hc,
            it = [],
            ct, fr, pi, pu, wf, bf, er;
        i.$SlidesCount = function() {
            return st.length
        };
        i.$CurrentIndex = function() {
            return g
        };
        i.$CurrentPosition = function() {
            return ot.o()
        };
        i.$AutoPlay = function(n) {
            if (n == e) return k;
            n != k && (k = n, k && it[g] && it[g].zc())
        };
        i.$IsDragging = function() {
            return et
        };
        i.$IsSliding = function() {
            return rr
        };
        i.$IsMouseOver = function() {
            return !ui
        };
        i.$LastDragSucceeded = function() {
            return yi
        };
        i.$OriginalWidth = function() {
            return pt
        };
        i.$OriginalHeight = function() {
            return wt
        };
        i.$ScaleHeight = function(n) {
            if (n == e) return uf || wt;
            i.$ScaleSize(n / wt * pt, n)
        };
        i.$ScaleWidth = function(n) {
            if (n == e) return fu || pt;
            i.$ScaleSize(n, n / pt * wt)
        };
        i.$ScaleSize = function(n, t, i) {
            o.C(d, n);
            o.D(d, t);
            ff = n / pt;
            ef = t / wt;
            o.c(hf, function(n) {
                n.$ScaleSize(ff, ef, i)
            });
            fu || (o.tb(ii, tt), o.V(ii, 0), o.Z(ii, 0));
            fu = n;
            uf = t
        };
        i.hf = ie;
        i.ff = re;
        i.$PlayTo = hr;
        i.$GoTo = sr;
        i.$Next = function() {
            du(1)
        };
        i.$Prev = function() {
            du(-1)
        };
        i.$Pause = function() {
            k = 0
        };
        i.$Play = function() {
            i.$AutoPlay(k || 1)
        };
        i.$SetSlideshowTransitions = function(n) {
            a.$SlideshowOptions.$Transitions = n
        };
        i.$SetCaptionTransitions = function(n) {
            hi.$Transitions = n;
            hi.sd = o.Db()
        };
        i.ie = function(n) {
            if (n = nt(n), ft & 1) {
                var i = vt / ht,
                    t = nt(ot.o()),
                    r = nt(n - t + i),
                    u = nt(s.H(n - t));
                r >= kt ? u > w / 2 && (n > t ? n -= w : n += w) : n > t && r < i ? n -= w : n < t && r > i && (n += w)
            }
            return n
        };
        i.$AppendSlides = function(n, t) {
            var r, i;
            t == e && (t = g + 1);
            r = st[g];
            nf(n, t);
            i = 0;
            o.c(st, function(n, t) {
                n == r && (i = t)
            });
            sr(i)
        };
        i.$ReloadSlides = function(n) {
            nf(n, r, st);
            sr(0)
        };
        i.$RemoveSlides = function(n) {
            var t = g,
                i = [];
            o.c(n, function(n) {
                n < w && n >= 0 && (i.push(st[n]), n < g && t--)
            });
            nf(r, r, i);
            t = s.j(t, w - 1);
            sr(t)
        };
        i.B = function(n, r) {
            i.$Elmt = d = o.$GetElement(n);
            pt = o.C(d);
            wt = o.D(d);
            a = o.F({
                $FillMode: 0,
                $LazyLoading: 1,
                $ArrowKeyNavigation: 1,
                $StartIndex: 0,
                $AutoPlay: 0,
                $Loop: 1,
                $HWA: u,
                $NaviQuitDrag: u,
                $AutoPlaySteps: 1,
                $AutoPlayInterval: 3e3,
                $PauseOnHover: 1,
                $SlideDuration: 500,
                $SlideEasing: h.$OutQuad,
                $MinDragOffsetToSlide: 20,
                $DragRatio: 1,
                $SlideSpacing: 0,
                $UISearchMode: 1,
                $PlayOrientation: 1,
                $DragOrientation: 1
            }, r);
            a.$HWA = a.$HWA && o.Wg();
            a.$Idle != e && (a.$AutoPlayInterval = a.$Idle);
            a.$DisplayPieces != e && (a.$Cols = a.$DisplayPieces);
            a.$ParkingPosition != e && (a.$Align = a.$ParkingPosition);
            k = a.$AutoPlay & 63;
            !a.$UISearchMode;
            ai = a.$AutoPlaySteps;
            oi = a.$PauseOnHover;
            oi &= yu ? 10 : 5;
            pf = a.$AutoPlayInterval;
            wr = a.$SlideDuration;
            ni = a.$PlayOrientation & 3;
            nr = o.Kg(o.n(d, "dir")) == "rtl";
            pr = nr && (ni == 1 || a.$DragOrientation & 1);
            tr = pr ? -1 : 1;
            cr = a.$SlideshowOptions;
            hi = o.F({
                $Class: p
            }, a.$CaptionSliderOptions);
            bi = a.$BulletNavigatorOptions;
            ci = a.$ArrowNavigatorOptions;
            yt = a.$ThumbnailNavigatorOptions;
            var f = o.Cb(d);
            o.c(f, function(n, t) {
                var i = o.db(n, "u");
                i == "loading" ? ti = n : (i == "slides" && (tt = n, o.O(tt, "margin", 0), o.O(tt, "padding", 0), o.kc(tt, "flat")), i == "navigator" && (eu = n), i == "arrowleft" && (ou = n), i == "arrowright" && (su = n), i == "thumbnavigator" && (lr = n), n.tagName != "STYLE" && n.tagName != "SCRIPT" && (hf[i || t] = new uo(n, i == "slides", o.Dd(["slides", "thumbnavigator"])[i])))
            });
            ti && o.qb(ti);
            ti = ti || o.Rb(t);
            ar = o.C(tt);
            vr = o.D(tt);
            lt = a.$SlideWidth || ar;
            at = a.$SlideHeight || vr;
            li = {
                I: lt,
                G: at,
                $Top: 0,
                $Left: 0,
                Rd: "block",
                Ob: "absolute"
            };
            bt = a.$SlideSpacing;
            ki = lt + bt;
            di = at + bt;
            ht = ni & 1 ? ki : di;
            nu = new ho;
            o.n(d, uu, "1");
            o.S(tt, o.S(tt) || 0);
            o.wb(tt, "absolute");
            ii = o.fb(tt, u);
            o.O(ii, "pointerEvents", "none");
            o.tb(ii, tt);
            o.J(ii, nu.$Elmt);
            o.ic(tt, "hidden");
            eu && bi && (bi.gc = nr, af = new bi.$Class(eu, bi, pt, wt), ei.push(af));
            ci && ou && su && (ci.gc = nr, ci.$Loop = a.$Loop, vf = new ci.$Class(ou, su, ci, i), ei.push(vf));
            lr && yt && (yt.$StartIndex = a.$StartIndex, yt.$ArrowKeyNavigation = yt.$ArrowKeyNavigation || 0, yt.gc = nr, yf = new yt.$Class(lr, yt, ti), yt.$NoDrag || o.n(lr, rf, "1"), ei.push(yf));
            ve(u);
            i.$ScaleSize(pt, wt);
            ku();
            sr(nt(a.$StartIndex));
            o.O(d, "visibility", "visible")
        };
        i.$Destroy = function() {
            k = 0;
            o.$Destroy(it, ei, tf);
            o.Qb(d)
        };
        o.B(i)
    };
    c.$EVT_CLICK = 21;
    c.$EVT_DRAG_START = 22;
    c.$EVT_DRAG_END = 23;
    c.$EVT_SWIPE_START = 24;
    c.$EVT_SWIPE_END = 25;
    c.$EVT_LOAD_START = 26;
    c.$EVT_LOAD_END = 27;
    c.Jf = 28;
    c.$EVT_MOUSE_ENTER = 31;
    c.$EVT_MOUSE_LEAVE = 32;
    c.$EVT_POSITION_CHANGE = 202;
    c.$EVT_PARK = 203;
    c.$EVT_SLIDESHOW_START = 206;
    c.$EVT_SLIDESHOW_END = 207;
    c.$EVT_PROGRESS_CHANGE = 208;
    c.$EVT_STATE_CHANGE = 209
}(window, document, Math, null, !0, !1),
function(n) {
    var e = Array.prototype.slice,
        h = Array.prototype.splice,
        u = {
            topSpacing: 0,
            bottomSpacing: 0,
            className: "is-sticky",
            wrapperClassName: "sticky-wrapper",
            center: !1,
            getWidthFrom: "",
            widthFromWrapper: !0,
            responsiveWidth: !1
        },
        f = n(window),
        c = n(document),
        t = [],
        o = f.height(),
        r = function() {
            for (var e = f.scrollTop(), h = c.height(), l = h - o, a = e > l ? l - e : 0, r, u, s = 0; s < t.length; s++) {
                var i = t[s],
                    v = i.stickyWrapper.offset().top,
                    y = v - i.topSpacing - a;
                i.stickyWrapper.css("height", i.stickyElement.outerHeight());
                e <= y ? i.currentTop !== null && (i.stickyElement.css({
                    width: "",
                    position: "",
                    top: ""
                }), i.stickyElement.parent().removeClass(i.className), i.stickyElement.trigger("sticky-end", [i]), i.currentTop = null) : (r = h - i.stickyElement.outerHeight() - i.topSpacing - i.bottomSpacing - e - a, r = r < 0 ? r + i.topSpacing : i.topSpacing, i.currentTop != r && (i.getWidthFrom ? u = n(i.getWidthFrom).width() || null : i.widthFromWrapper && (u = i.stickyWrapper.width()), u == null && (u = i.stickyElement.width()), i.stickyElement.css("width", u).css("position", "fixed").css("top", r), i.stickyElement.parent().addClass(i.className), i.currentTop === null ? i.stickyElement.trigger("sticky-start", [i]) : i.stickyElement.trigger("sticky-update", [i]), i.currentTop === i.topSpacing && i.currentTop > r || i.currentTop === null && r < i.topSpacing ? i.stickyElement.trigger("sticky-bottom-reached", [i]) : i.currentTop !== null && r === i.topSpacing && i.currentTop < r && i.stickyElement.trigger("sticky-bottom-unreached", [i]), i.currentTop = r))
            }
        },
        s = function() {
            var u, i, r;
            for (o = f.height(), u = 0; u < t.length; u++) i = t[u], r = null, i.getWidthFrom ? i.responsiveWidth === !0 && (r = n(i.getWidthFrom).width()) : i.widthFromWrapper && (r = i.stickyWrapper.width()), r != null && i.stickyElement.css("width", r)
        },
        i = {
            init: function(i) {
                var r = n.extend({}, u, i);
                return this.each(function() {
                    var i = n(this),
                        e = i.attr("id"),
                        o = i.outerHeight(),
                        s = e ? e + "-" + u.wrapperClassName : u.wrapperClassName,
                        h = n("<div><\/div>").attr("id", s).addClass(r.wrapperClassName),
                        f;
                    i.wrapAll(h);
                    f = i.parent();
                    r.center && f.css({
                        width: i.outerWidth(),
                        marginLeft: "auto",
                        marginRight: "auto"
                    });
                    i.css("float") == "right" && i.css({
                        float: "none"
                    }).parent().css({
                        float: "right"
                    });
                    f.css("height", o);
                    r.stickyElement = i;
                    r.stickyWrapper = f;
                    r.currentTop = null;
                    t.push(r)
                })
            },
            update: r,
            unstick: function() {
                return this.each(function() {
                    for (var r = this, u = n(r), f = -1, i = t.length; i-- > 0;) t[i].stickyElement.get(0) === r && (h.call(t, i, 1), f = i);
                    f != -1 && (u.unwrap(), u.css({
                        width: "",
                        position: "",
                        top: "",
                        float: ""
                    }))
                })
            }
        };
    window.addEventListener ? (window.addEventListener("scroll", r, !1), window.addEventListener("resize", s, !1)) : window.attachEvent && (window.attachEvent("onscroll", r), window.attachEvent("onresize", s));
    n.fn.sticky = function(t) {
        if (i[t]) return i[t].apply(this, e.call(arguments, 1));
        if (typeof t != "object" && t) n.error("Method " + t + " does not exist on jQuery.sticky");
        else return i.init.apply(this, arguments)
    };
    n.fn.unstick = function(t) {
        if (i[t]) return i[t].apply(this, e.call(arguments, 1));
        if (typeof t != "object" && t) n.error("Method " + t + " does not exist on jQuery.sticky");
        else return i.unstick.apply(this, arguments)
    };
    n(function() {
        setTimeout(r, 0)
    })
}(jQuery),
function(n) {
    var e = Array.prototype.slice,
        h = Array.prototype.splice,
        u = {
            topSpacing: 0,
            bottomSpacing: 0,
            className: "is-sticky",
            wrapperClassName: "sticky-wrapper",
            center: !1,
            getWidthFrom: "",
            widthFromWrapper: !0,
            responsiveWidth: !1
        },
        f = n(window),
        c = n(document),
        t = [],
        o = f.height(),
        r = function() {
            for (var e = f.scrollTop(), h = c.height(), l = h - o, a = e > l ? l - e : 0, r, u, s = 0; s < t.length; s++) {
                var i = t[s],
                    v = i.stickyWrapper.offset().top,
                    y = v - i.topSpacing - a;
                i.stickyWrapper.css("height", i.stickyElement.outerHeight());
                e <= y ? i.currentTop !== null && (i.stickyElement.css({
                    width: "",
                    position: "",
                    top: ""
                }), i.stickyElement.parent().removeClass(i.className), i.stickyElement.trigger("sticky-end", [i]), i.currentTop = null) : (r = h - i.stickyElement.outerHeight() - i.topSpacing - i.bottomSpacing - e - a, r = r < 0 ? r + i.topSpacing : i.topSpacing, i.currentTop != r && (i.getWidthFrom ? u = n(i.getWidthFrom).width() || null : i.widthFromWrapper && (u = i.stickyWrapper.width()), u == null && (u = i.stickyElement.width()), i.stickyElement.css("width", u).css("position", "fixed").css("top", r), i.stickyElement.parent().addClass(i.className), i.currentTop === null ? i.stickyElement.trigger("sticky-start", [i]) : i.stickyElement.trigger("sticky-update", [i]), i.currentTop === i.topSpacing && i.currentTop > r || i.currentTop === null && r < i.topSpacing ? i.stickyElement.trigger("sticky-bottom-reached", [i]) : i.currentTop !== null && r === i.topSpacing && i.currentTop < r && i.stickyElement.trigger("sticky-bottom-unreached", [i]), i.currentTop = r))
            }
        },
        s = function() {
            var u, i, r;
            for (o = f.height(), u = 0; u < t.length; u++) i = t[u], r = null, i.getWidthFrom ? i.responsiveWidth === !0 && (r = n(i.getWidthFrom).width()) : i.widthFromWrapper && (r = i.stickyWrapper.width()), r != null && i.stickyElement.css("width", r)
        },
        i = {
            init: function(i) {
                var r = n.extend({}, u, i);
                return this.each(function() {
                    var i = n(this),
                        e = i.attr("id"),
                        o = i.outerHeight(),
                        s = e ? e + "-" + u.wrapperClassName : u.wrapperClassName,
                        h = n("<div><\/div>").attr("id", s).addClass(r.wrapperClassName),
                        f;
                    i.wrapAll(h);
                    f = i.parent();
                    r.center && f.css({
                        width: i.outerWidth(),
                        marginLeft: "auto",
                        marginRight: "auto"
                    });
                    i.css("float") == "right" && i.css({
                        float: "none"
                    }).parent().css({
                        float: "right"
                    });
                    f.css("height", o);
                    r.stickyElement = i;
                    r.stickyWrapper = f;
                    r.currentTop = null;
                    t.push(r)
                })
            },
            update: r,
            unstick: function() {
                return this.each(function() {
                    for (var r = this, u = n(r), f = -1, i = t.length; i-- > 0;) t[i].stickyElement.get(0) === r && (h.call(t, i, 1), f = i);
                    f != -1 && (u.unwrap(), u.css({
                        width: "",
                        position: "",
                        top: "",
                        float: ""
                    }))
                })
            }
        };
    window.addEventListener ? (window.addEventListener("scroll", r, !1), window.addEventListener("resize", s, !1)) : window.attachEvent && (window.attachEvent("onscroll", r), window.attachEvent("onresize", s));
    n.fn.sticky = function(t) {
        if (i[t]) return i[t].apply(this, e.call(arguments, 1));
        if (typeof t != "object" && t) n.error("Method " + t + " does not exist on jQuery.sticky");
        else return i.init.apply(this, arguments)
    };
    n.fn.unstick = function(t) {
        if (i[t]) return i[t].apply(this, e.call(arguments, 1));
        if (typeof t != "object" && t) n.error("Method " + t + " does not exist on jQuery.sticky");
        else return i.unstick.apply(this, arguments)
    };
    n(function() {
        setTimeout(r, 0)
    })
}(jQuery),
function(n) {
    function f(f) {
        var c = ".smartmenus_mouse",
            h, s;
        u || f ? u && f && (n(document).unbind(c), u = !1) : (h = !0, s = null, n(document).bind(t([
            ["mousemove", function(t) {
                var u = {
                        x: t.pageX,
                        y: t.pageY,
                        timeStamp: (new Date).getTime()
                    },
                    e, o, f;
                s && (e = Math.abs(s.x - u.x), o = Math.abs(s.y - u.y), (e > 0 || o > 0) && 2 >= e && 2 >= o && 300 >= u.timeStamp - s.timeStamp && (r = !0, h) && (f = n(t.target).closest("a"), f.is("a") && n.each(i, function() {
                    if (n.contains(this.$root[0], f[0])) return (this.itemEnter({
                        currentTarget: f[0]
                    }), !1)
                }), h = !1));
                s = u
            }],
            [o() ? "touchstart" : "pointerover pointermove pointerout MSPointerOver MSPointerMove MSPointerOut", function(n) {
                e(n.originalEvent) && (r = !1)
            }]
        ], c)), u = !0)
    }

    function e(n) {
        return !/^(4|mouse)$/.test(n.pointerType)
    }

    function o() {
        return "ontouchstart" in window
    }

    function t(t, i) {
        i || (i = "");
        var r = {};
        return n.each(t, function(n, t) {
            r[t[0].split(" ").join(i + " ") + i] = t[1]
        }), r
    }
    var i = [],
        s = !!window.createPopup,
        r = !1,
        u = !1;
    n.SmartMenus = function(t, i) {
        this.$root = n(t);
        this.opts = i;
        this.rootId = "";
        this.accessIdPrefix = "";
        this.$subArrow = null;
        this.activatedItems = [];
        this.visibleSubMenus = [];
        this.showTimeout = 0;
        this.hideTimeout = 0;
        this.scrollTimeout = 0;
        this.clickActivated = !1;
        this.focusActivated = !1;
        this.zIndexInc = 0;
        this.idInc = 0;
        this.$firstLink = null;
        this.$firstSub = null;
        this.disabled = !1;
        this.$disableOverlay = null;
        this.isTouchScrolling = !1;
        this.wasCollapsible = !1;
        this.init()
    };
    n.extend(n.SmartMenus, {
        hideAll: function() {
            n.each(i, function() {
                this.menuHideAll()
            })
        },
        destroy: function() {
            for (; i.length;) i[0].destroy();
            f(!0)
        },
        prototype: {
            init: function(r) {
                var e = this,
                    u;
                if (r || (i.push(this), this.rootId = ((new Date).getTime() + Math.random() + "").replace(/\D/g, ""), this.accessIdPrefix = "sm-" + this.rootId + "-", this.$root.hasClass("sm-rtl") && (this.opts.rightToLeftSubMenus = !0), u = ".smartmenus", this.$root.data("smartmenus", this).attr("data-smartmenus-id", this.rootId).dataSM("level", 1).bind(t([
                        ["mouseover focusin", n.proxy(this.rootOver, this)],
                        ["mouseout focusout", n.proxy(this.rootOut, this)],
                        ["keydown", n.proxy(this.rootKeyDown, this)]
                    ], u)).delegate("a", t([
                        ["mouseenter", n.proxy(this.itemEnter, this)],
                        ["mouseleave", n.proxy(this.itemLeave, this)],
                        ["mousedown", n.proxy(this.itemDown, this)],
                        ["focus", n.proxy(this.itemFocus, this)],
                        ["blur", n.proxy(this.itemBlur, this)],
                        ["click", n.proxy(this.itemClick, this)],
                        ["touchend", n.proxy(this.itemTouchEnd, this)]
                    ], u)), u += this.rootId, this.opts.hideOnClick && n(document).bind(t([
                        ["touchstart", n.proxy(this.docTouchStart, this)],
                        ["touchmove", n.proxy(this.docTouchMove, this)],
                        ["touchend", n.proxy(this.docTouchEnd, this)],
                        ["click", n.proxy(this.docClick, this)]
                    ], u)), n(window).bind(t([
                        ["resize orientationchange", n.proxy(this.winResize, this)]
                    ], u)), this.opts.subIndicators && (this.$subArrow = n("<span/>").addClass("sub-arrow"), this.opts.subIndicatorsText && this.$subArrow.html(this.opts.subIndicatorsText)), f()), this.$firstSub = this.$root.find("ul").each(function() {
                        e.menuInit(n(this))
                    }).eq(0), this.$firstLink = this.$root.find("a").eq(0), this.opts.markCurrentItem) {
                    var o = /(index|default)\.[^#\?\/]*/i,
                        s = window.location.href.replace(o, ""),
                        h = s.replace(/#.*/, "");
                    this.$root.find("a").each(function() {
                        var t = this.href.replace(o, ""),
                            i = n(this);
                        (t == s || t == h) && (i.addClass("current"), e.opts.markCurrentTree && i.parentsUntil("[data-smartmenus-id]", "ul").each(function() {
                            n(this).dataSM("parent-a").addClass("current")
                        }))
                    })
                }
                this.wasCollapsible = this.isCollapsible()
            },
            destroy: function(t) {
                var r, u;
                t || (r = ".smartmenus", this.$root.removeData("smartmenus").removeAttr("data-smartmenus-id").removeDataSM("level").unbind(r).undelegate(r), r += this.rootId, n(document).unbind(r), n(window).unbind(r), this.opts.subIndicators && (this.$subArrow = null));
                this.menuHideAll();
                u = this;
                this.$root.find("ul").each(function() {
                    var t = n(this);
                    t.dataSM("scroll-arrows") && t.dataSM("scroll-arrows").remove();
                    t.dataSM("shown-before") && ((u.opts.subMenusMinWidth || u.opts.subMenusMaxWidth) && t.css({
                        width: "",
                        minWidth: "",
                        maxWidth: ""
                    }).removeClass("sm-nowrap"), t.dataSM("scroll-arrows") && t.dataSM("scroll-arrows").remove(), t.css({
                        zIndex: "",
                        top: "",
                        left: "",
                        marginLeft: "",
                        marginTop: "",
                        display: ""
                    }));
                    0 == t.attr("id").indexOf(u.accessIdPrefix) && t.removeAttr("id")
                }).removeDataSM("in-mega").removeDataSM("shown-before").removeDataSM("ie-shim").removeDataSM("scroll-arrows").removeDataSM("parent-a").removeDataSM("level").removeDataSM("beforefirstshowfired").removeAttr("role").removeAttr("aria-hidden").removeAttr("aria-labelledby").removeAttr("aria-expanded");
                this.$root.find("a.has-submenu").each(function() {
                    var t = n(this);
                    0 == t.attr("id").indexOf(u.accessIdPrefix) && t.removeAttr("id")
                }).removeClass("has-submenu").removeDataSM("sub").removeAttr("aria-haspopup").removeAttr("aria-controls").removeAttr("aria-expanded").closest("li").removeDataSM("sub");
                this.opts.subIndicators && this.$root.find("span.sub-arrow").remove();
                this.opts.markCurrentItem && this.$root.find("a.current").removeClass("current");
                t || (this.$root = null, this.$firstLink = null, this.$firstSub = null, this.$disableOverlay && (this.$disableOverlay.remove(), this.$disableOverlay = null), i.splice(n.inArray(this, i), 1))
            },
            disable: function(t) {
                if (!this.disabled) {
                    if (this.menuHideAll(), !t && !this.opts.isPopup && this.$root.is(":visible")) {
                        var i = this.$root.offset();
                        this.$disableOverlay = n('<div class="sm-jquery-disable-overlay"/>').css({
                            position: "absolute",
                            top: i.top,
                            left: i.left,
                            width: this.$root.outerWidth(),
                            height: this.$root.outerHeight(),
                            zIndex: this.getStartZIndex(!0),
                            opacity: 0
                        }).appendTo(document.body)
                    }
                    this.disabled = !0
                }
            },
            docClick: function(t) {
                return this.isTouchScrolling ? (this.isTouchScrolling = !1, void 0) : ((this.visibleSubMenus.length && !n.contains(this.$root[0], t.target) || n(t.target).is("a")) && this.menuHideAll(), void 0)
            },
            docTouchEnd: function() {
                if (this.lastTouch) {
                    if (!(!this.visibleSubMenus.length || void 0 !== this.lastTouch.x2 && this.lastTouch.x1 != this.lastTouch.x2 || void 0 !== this.lastTouch.y2 && this.lastTouch.y1 != this.lastTouch.y2 || this.lastTouch.target && n.contains(this.$root[0], this.lastTouch.target))) {
                        this.hideTimeout && (clearTimeout(this.hideTimeout), this.hideTimeout = 0);
                        var t = this;
                        this.hideTimeout = setTimeout(function() {
                            t.menuHideAll()
                        }, 350)
                    }
                    this.lastTouch = null
                }
            },
            docTouchMove: function(n) {
                if (this.lastTouch) {
                    var t = n.originalEvent.touches[0];
                    this.lastTouch.x2 = t.pageX;
                    this.lastTouch.y2 = t.pageY
                }
            },
            docTouchStart: function(n) {
                var t = n.originalEvent.touches[0];
                this.lastTouch = {
                    x1: t.pageX,
                    y1: t.pageY,
                    target: t.target
                }
            },
            enable: function() {
                this.disabled && (this.$disableOverlay && (this.$disableOverlay.remove(), this.$disableOverlay = null), this.disabled = !1)
            },
            getClosestMenu: function(t) {
                for (var i = n(t).closest("ul"); i.dataSM("in-mega");) i = i.parent().closest("ul");
                return i[0] || null
            },
            getHeight: function(n) {
                return this.getOffset(n, !0)
            },
            getOffset: function(n, t) {
                var u, i, r;
                return "none" == n.css("display") && (u = {
                    position: n[0].style.position,
                    visibility: n[0].style.visibility
                }, n.css({
                    position: "absolute",
                    visibility: "hidden"
                }).show()), i = n[0].getBoundingClientRect && n[0].getBoundingClientRect(), r = i && (t ? i.height || i.bottom - i.top : i.width || i.right - i.left), r || 0 === r || (r = t ? n[0].offsetHeight : n[0].offsetWidth), u && n.hide().css(u), r
            },
            getStartZIndex: function(n) {
                var t = parseInt(this[n ? "$root" : "$firstSub"].css("z-index"));
                return !n && isNaN(t) && (t = parseInt(this.$root.css("z-index"))), isNaN(t) ? 1 : t
            },
            getTouchPoint: function(n) {
                return n.touches && n.touches[0] || n.changedTouches && n.changedTouches[0] || n
            },
            getViewport: function(n) {
                var i = n ? "Height" : "Width",
                    t = document.documentElement["client" + i],
                    r = window["inner" + i];
                return r && (t = Math.min(t, r)), t
            },
            getViewportHeight: function() {
                return this.getViewport(!0)
            },
            getViewportWidth: function() {
                return this.getViewport()
            },
            getWidth: function(n) {
                return this.getOffset(n)
            },
            handleEvents: function() {
                return !this.disabled && this.isCSSOn()
            },
            handleItemEvents: function(n) {
                return this.handleEvents() && !this.isLinkInMegaMenu(n)
            },
            isCollapsible: function() {
                return "static" == this.$firstSub.css("position")
            },
            isCSSOn: function() {
                return "block" == this.$firstLink.css("display")
            },
            isFixed: function() {
                var t = "fixed" == this.$root.css("position");
                return t || this.$root.parentsUntil("body").each(function() {
                    if ("fixed" == n(this).css("position")) return (t = !0, !1)
                }), t
            },
            isLinkInMegaMenu: function(t) {
                return n(this.getClosestMenu(t[0])).hasClass("mega-menu")
            },
            isTouchMode: function() {
                return !r || this.isCollapsible()
            },
            itemActivate: function(t, i) {
                var u = t.closest("ul"),
                    r = u.dataSM("level"),
                    e, f;
                r > 1 && (!this.activatedItems[r - 2] || this.activatedItems[r - 2][0] != u.dataSM("parent-a")[0]) && (e = this, n(u.parentsUntil("[data-smartmenus-id]", "ul").get().reverse()).add(u).each(function() {
                    e.itemActivate(n(this).dataSM("parent-a"))
                }));
                ((!this.isCollapsible() || i) && this.menuHideSubMenus(this.activatedItems[r - 1] && this.activatedItems[r - 1][0] == t[0] ? r : r - 1), this.activatedItems[r - 1] = t, this.$root.triggerHandler("activate.smapi", t[0]) !== !1) && (f = t.dataSM("sub"), f && (this.isTouchMode() || !this.opts.showOnClick || this.clickActivated) && this.menuShow(f))
            },
            itemBlur: function(t) {
                var i = n(t.currentTarget);
                this.handleItemEvents(i) && this.$root.triggerHandler("blur.smapi", i[0])
            },
            itemClick: function(t) {
                var i, u, r;
                if (this.isTouchScrolling) return this.isTouchScrolling = !1, t.stopPropagation(), !1;
                if (i = n(t.currentTarget), this.handleItemEvents(i)) {
                    if (this.$root.triggerHandler("click.smapi", i[0]) === !1) return !1;
                    if (i.dataSM("href") && i.attr("href", i.dataSM("href")).removeDataSM("href"), u = n(t.target).is("span.sub-arrow"), r = i.dataSM("sub"), r && !r.is(":visible")) {
                        if (this.itemActivate(i), r.is(":visible")) return this.focusActivated = !0, !1
                    } else if (this.isCollapsible() && u) return this.itemActivate(i), this.menuHide(r), !1;
                    return this.opts.showOnClick && r && 2 == r.dataSM("level") ? (this.clickActivated = !0, this.menuShow(r), !1) : i.hasClass("disabled") ? !1 : this.$root.triggerHandler("select.smapi", i[0]) === !1 ? !1 : void 0
                }
            },
            itemDown: function(t) {
                var i = n(t.currentTarget);
                this.handleItemEvents(i) && i.dataSM("mousedown", !0)
            },
            itemEnter: function(t) {
                var i = n(t.currentTarget),
                    r;
                this.handleItemEvents(i) && (this.isTouchMode() || (this.showTimeout && (clearTimeout(this.showTimeout), this.showTimeout = 0), r = this, this.showTimeout = setTimeout(function() {
                    r.itemActivate(i)
                }, this.opts.showOnClick && 1 == i.closest("ul").dataSM("level") ? 1 : this.opts.showTimeout)), this.$root.triggerHandler("mouseenter.smapi", i[0]))
            },
            itemFocus: function(t) {
                var i = n(t.currentTarget);
                this.handleItemEvents(i) && (!this.focusActivated || this.isTouchMode() && i.dataSM("mousedown") || this.activatedItems.length && this.activatedItems[this.activatedItems.length - 1][0] == i[0] || this.itemActivate(i, !0), this.$root.triggerHandler("focus.smapi", i[0]))
            },
            itemLeave: function(t) {
                var i = n(t.currentTarget);
                this.handleItemEvents(i) && (this.isTouchMode() || this.showTimeout && (clearTimeout(this.showTimeout), this.showTimeout = 0), i.removeDataSM("mousedown"), this.$root.triggerHandler("mouseleave.smapi", i[0]))
            },
            itemTouchEnd: function(t) {
                var i = n(t.currentTarget),
                    r;
                this.handleItemEvents(i) && (r = i.dataSM("sub"), "#" !== i.attr("href").charAt(0) && r && !r.is(":visible") && i.dataSM("href", i.attr("href")).attr("href", "#"))
            },
            menuHide: function(t) {
                var i, r;
                this.$root.triggerHandler("beforehide.smapi", t[0]) !== !1 && (t.stop(!0, !0), "none" != t.css("display")) && (i = function() {
                    t.css("z-index", "")
                }, this.isCollapsible() ? this.opts.collapsibleHideFunction ? this.opts.collapsibleHideFunction.call(this, t, i) : t.hide(this.opts.collapsibleHideDuration, i) : this.opts.hideFunction ? this.opts.hideFunction.call(this, t, i) : t.hide(this.opts.hideDuration, i), t.dataSM("ie-shim") && t.dataSM("ie-shim").remove(), t.dataSM("scroll") && (this.menuScrollStop(t), t.css({
                    "touch-action": "",
                    "-ms-touch-action": ""
                }).unbind(".smartmenus_scroll").removeDataSM("scroll").dataSM("scroll-arrows").hide()), t.dataSM("parent-a").removeClass("highlighted").attr("aria-expanded", "false"), t.attr({
                    "aria-expanded": "false",
                    "aria-hidden": "true"
                }), r = t.dataSM("level"), this.activatedItems.splice(r - 1, 1), this.visibleSubMenus.splice(n.inArray(t, this.visibleSubMenus), 1), this.$root.triggerHandler("hide.smapi", t[0]))
            },
            menuHideAll: function() {
                this.showTimeout && (clearTimeout(this.showTimeout), this.showTimeout = 0);
                for (var t = this.opts.isPopup ? 1 : 0, n = this.visibleSubMenus.length - 1; n >= t; n--) this.menuHide(this.visibleSubMenus[n]);
                this.opts.isPopup && (this.$root.stop(!0, !0), this.$root.is(":visible") && (this.opts.hideFunction ? this.opts.hideFunction.call(this, this.$root) : this.$root.hide(this.opts.hideDuration), this.$root.dataSM("ie-shim") && this.$root.dataSM("ie-shim").remove()));
                this.activatedItems = [];
                this.visibleSubMenus = [];
                this.clickActivated = !1;
                this.focusActivated = !1;
                this.zIndexInc = 0
            },
            menuHideSubMenus: function(n) {
                for (var i, t = this.activatedItems.length - 1; t >= n; t--) i = this.activatedItems[t].dataSM("sub"), i && this.menuHide(i)
            },
            menuIframeShim: function(t) {
                s && this.opts.overlapControlsInIE && !t.dataSM("ie-shim") && t.dataSM("ie-shim", n("<iframe/>").attr({
                    src: "javascript:0",
                    tabindex: -9
                }).css({
                    position: "absolute",
                    top: "auto",
                    left: "0",
                    opacity: 0,
                    border: "0"
                }))
            },
            menuInit: function(n) {
                var i, r, t, u, f;
                if (!n.dataSM("in-mega")) {
                    for (n.hasClass("mega-menu") && n.find("ul").dataSM("in-mega", !0), i = 2, r = n[0];
                        (r = r.parentNode.parentNode) != this.$root[0];) i++;
                    t = n.prevAll("a").eq(-1);
                    t.length || (t = n.prevAll().find("a").eq(-1));
                    t.addClass("has-submenu").dataSM("sub", n);
                    n.dataSM("parent-a", t).dataSM("level", i).parent().dataSM("sub", n);
                    u = t.attr("id") || this.accessIdPrefix + ++this.idInc;
                    f = n.attr("id") || this.accessIdPrefix + ++this.idInc;
                    t.attr({
                        id: u,
                        "aria-haspopup": "true",
                        "aria-controls": f,
                        "aria-expanded": "false"
                    });
                    n.attr({
                        id: f,
                        role: "group",
                        "aria-hidden": "true",
                        "aria-labelledby": u,
                        "aria-expanded": "false"
                    });
                    this.opts.subIndicators && t[this.opts.subIndicatorsPos](this.$subArrow.clone())
                }
            },
            menuPosition: function(i) {
                var r, e, w = i.dataSM("parent-a"),
                    g = w.closest("li"),
                    it = g.parent(),
                    rt = i.dataSM("level"),
                    s = this.getWidth(i),
                    u = this.getHeight(i),
                    ut = w.offset(),
                    ot = ut.left,
                    st = ut.top,
                    nt = this.getWidth(w),
                    y = this.getHeight(w),
                    ft = n(window),
                    b = ft.scrollLeft(),
                    l = ft.scrollTop(),
                    et = this.getViewportWidth(),
                    a = this.getViewportHeight(),
                    h = it.hasClass("sm") && !it.hasClass("sm-vertical"),
                    k = this.opts.rightToLeftSubMenus && !g.is("[data-sm-reverse]") || !this.opts.rightToLeftSubMenus && g.is("[data-sm-reverse]"),
                    v = 2 == rt ? this.opts.mainMenuSubOffsetX : this.opts.subMenusSubOffsetX,
                    d = 2 == rt ? this.opts.mainMenuSubOffsetY : this.opts.subMenusSubOffsetY,
                    p, c, f, tt;
                (h ? (r = k ? nt - s - v : v, e = this.opts.bottomToTopSubMenus ? -u - d : y + d) : (r = k ? v - s : nt - v, e = this.opts.bottomToTopSubMenus ? y - d - u : d), this.opts.keepInViewport) && (p = ot + r, c = st + e, (k && b > p ? r = h ? b - p + r : nt - v : !k && p + s > b + et && (r = h ? b + et - s - p + r : v - s), h || (a > u && c + u > l + a ? e += l + a - u - c : (u >= a || l > c) && (e += l - c)), h && (c + u > l + a + .49 || l > c) || !h && u > a + .49) && (f = this, i.dataSM("scroll-arrows") || i.dataSM("scroll-arrows", n([n('<span class="scroll-up"><span class="scroll-up-arrow"><\/span><\/span>')[0], n('<span class="scroll-down"><span class="scroll-down-arrow"><\/span><\/span>')[0]]).bind({
                    mouseenter: function() {
                        i.dataSM("scroll").up = n(this).hasClass("scroll-up");
                        f.menuScroll(i)
                    },
                    mouseleave: function(n) {
                        f.menuScrollStop(i);
                        f.menuScrollOut(i, n)
                    },
                    "mousewheel DOMMouseScroll": function(n) {
                        n.preventDefault()
                    }
                }).insertAfter(i)), tt = ".smartmenus_scroll", i.dataSM("scroll", {
                    step: 1,
                    itemH: y,
                    subH: u,
                    arrowDownH: this.getHeight(i.dataSM("scroll-arrows").eq(1))
                }).bind(t([
                    ["mouseover", function(n) {
                        f.menuScrollOver(i, n)
                    }],
                    ["mouseout", function(n) {
                        f.menuScrollOut(i, n)
                    }],
                    ["mousewheel DOMMouseScroll", function(n) {
                        f.menuScrollMousewheel(i, n)
                    }]
                ], tt)).dataSM("scroll-arrows").css({
                    top: "auto",
                    left: "0",
                    marginLeft: r + (parseInt(i.css("border-left-width")) || 0),
                    width: s - (parseInt(i.css("border-left-width")) || 0) - (parseInt(i.css("border-right-width")) || 0),
                    zIndex: i.css("z-index")
                }).eq(h && this.opts.bottomToTopSubMenus ? 0 : 1).show(), this.isFixed() && i.css({
                    "touch-action": "none",
                    "-ms-touch-action": "none"
                }).bind(t([
                    [o() ? "touchstart touchmove touchend" : "pointerdown pointermove pointerup MSPointerDown MSPointerMove MSPointerUp", function(n) {
                        f.menuScrollTouch(i, n)
                    }]
                ], tt))));
                i.css({
                    top: "auto",
                    left: "0",
                    marginLeft: r,
                    marginTop: e - y
                });
                this.menuIframeShim(i);
                i.dataSM("ie-shim") && i.dataSM("ie-shim").css({
                    zIndex: i.css("z-index"),
                    width: s,
                    height: u,
                    marginLeft: r,
                    marginTop: e - y
                })
            },
            menuScroll: function(n, t, i) {
                var f, u = n.dataSM("scroll"),
                    c = n.dataSM("scroll-arrows"),
                    e = parseFloat(n.css("margin-top")),
                    o = u.up ? u.upEnd : u.downEnd,
                    s, h, l;
                if (!t && u.velocity) {
                    if (u.velocity *= .9, f = u.velocity, .5 > f) return this.menuScrollStop(n), void 0
                } else f = i || (t || !this.opts.scrollAccelerate ? this.opts.scrollStep : Math.floor(u.step));
                s = n.dataSM("level");
                this.activatedItems[s - 1] && this.activatedItems[s - 1].dataSM("sub") && this.activatedItems[s - 1].dataSM("sub").is(":visible") && this.menuHideSubMenus(s - 1);
                h = u.up && e >= o || !u.up && o >= e ? e : Math.abs(o - e) > f ? e + (u.up ? f : -f) : o;
                (n.add(n.dataSM("ie-shim")).css("margin-top", h), r && (u.up && h > u.downEnd || !u.up && u.upEnd > h) && c.eq(u.up ? 1 : 0).show(), h == o) ? (r && c.eq(u.up ? 0 : 1).hide(), this.menuScrollStop(n)) : t || (this.opts.scrollAccelerate && u.step < this.opts.scrollStep && (u.step += .5), l = this, this.scrollTimeout = setTimeout(function() {
                    l.menuScroll(n)
                }, this.opts.scrollInterval))
            },
            menuScrollMousewheel: function(n, t) {
                if (this.getClosestMenu(t.target) == n[0]) {
                    t = t.originalEvent;
                    var i = (t.wheelDelta || -t.detail) > 0;
                    n.dataSM("scroll-arrows").eq(i ? 0 : 1).is(":visible") && (n.dataSM("scroll").up = i, this.menuScroll(n, !0))
                }
                t.preventDefault()
            },
            menuScrollOut: function(t, i) {
                r && (/^scroll-(up|down)/.test((i.relatedTarget || "").className) || (t[0] == i.relatedTarget || n.contains(t[0], i.relatedTarget)) && this.getClosestMenu(i.relatedTarget) == t[0] || t.dataSM("scroll-arrows").css("visibility", "hidden"))
            },
            menuScrollOver: function(n, t) {
                if (r && !/^scroll-(up|down)/.test(t.target.className) && this.getClosestMenu(t.target) == n[0]) {
                    this.menuScrollRefreshData(n);
                    var i = n.dataSM("scroll");
                    n.dataSM("scroll-arrows").eq(0).css("margin-top", i.upEnd).end().eq(1).css("margin-top", i.downEnd + i.subH - i.arrowDownH).end().css("visibility", "visible")
                }
            },
            menuScrollRefreshData: function(t) {
                var i = t.dataSM("scroll"),
                    u = n(window),
                    r = u.scrollTop() - t.dataSM("parent-a").offset().top - i.itemH;
                n.extend(i, {
                    upEnd: r,
                    downEnd: r + this.getViewportHeight() - i.subH
                })
            },
            menuScrollStop: function(t) {
                if (this.scrollTimeout) return (clearTimeout(this.scrollTimeout), this.scrollTimeout = 0, n.extend(t.dataSM("scroll"), {
                    step: 1,
                    velocity: 0
                }), !0)
            },
            menuScrollTouch: function(t, i) {
                var u, r, f;
                (i = i.originalEvent, e(i)) && (u = this.getTouchPoint(i), this.getClosestMenu(u.target) == t[0] && (r = t.dataSM("scroll"), /(start|down)$/i.test(i.type) ? (this.menuScrollStop(t) ? (i.preventDefault(), this.isTouchScrolling = !0) : this.isTouchScrolling = !1, this.menuScrollRefreshData(t), n.extend(r, {
                    touchY: u.pageY,
                    touchTimestamp: i.timeStamp,
                    velocity: 0
                })) : /move$/i.test(i.type) ? (f = r.touchY, void 0 !== f && f != u.pageY && (this.isTouchScrolling = !0, n.extend(r, {
                    up: u.pageY > f,
                    touchY: u.pageY,
                    touchTimestamp: i.timeStamp,
                    velocity: r.velocity + .5 * Math.abs(u.pageY - f)
                }), this.menuScroll(t, !0, Math.abs(r.touchY - f))), i.preventDefault()) : void 0 !== r.touchY && (120 > i.timeStamp - r.touchTimestamp && r.velocity > 0 && (r.velocity *= .5, this.menuScrollStop(t), this.menuScroll(t), i.preventDefault()), delete r.touchY)))
            },
            menuShow: function(n) {
                var i, r, t;
                (n.dataSM("beforefirstshowfired") || (n.dataSM("beforefirstshowfired", !0), this.$root.triggerHandler("beforefirstshow.smapi", n[0]) !== !1)) && this.$root.triggerHandler("beforeshow.smapi", n[0]) !== !1 && (n.dataSM("shown-before", !0).stop(!0, !0), !n.is(":visible")) && (i = n.dataSM("parent-a"), ((this.opts.keepHighlighted || this.isCollapsible()) && i.addClass("highlighted"), this.isCollapsible()) ? n.removeClass("sm-nowrap").css({
                    zIndex: "",
                    width: "auto",
                    minWidth: "",
                    maxWidth: "",
                    top: "",
                    left: "",
                    marginLeft: "",
                    marginTop: ""
                }) : ((n.css("z-index", this.zIndexInc = (this.zIndexInc || this.getStartZIndex()) + 1), (this.opts.subMenusMinWidth || this.opts.subMenusMaxWidth) && (n.css({
                    width: "auto",
                    minWidth: "",
                    maxWidth: ""
                }).addClass("sm-nowrap"), this.opts.subMenusMinWidth && n.css("min-width", this.opts.subMenusMinWidth), this.opts.subMenusMaxWidth)) && (r = this.getWidth(n), n.css("max-width", this.opts.subMenusMaxWidth), r > this.getWidth(n) && n.removeClass("sm-nowrap").css("width", this.opts.subMenusMaxWidth)), this.menuPosition(n), n.dataSM("ie-shim") && n.dataSM("ie-shim").insertBefore(n)), t = function() {
                    n.css("overflow", "")
                }, this.isCollapsible() ? this.opts.collapsibleShowFunction ? this.opts.collapsibleShowFunction.call(this, n, t) : n.show(this.opts.collapsibleShowDuration, t) : this.opts.showFunction ? this.opts.showFunction.call(this, n, t) : n.show(this.opts.showDuration, t), i.attr("aria-expanded", "true"), n.attr({
                    "aria-expanded": "true",
                    "aria-hidden": "false"
                }), this.visibleSubMenus.push(n), this.$root.triggerHandler("show.smapi", n[0]))
            },
            popupHide: function(n) {
                this.hideTimeout && (clearTimeout(this.hideTimeout), this.hideTimeout = 0);
                var t = this;
                this.hideTimeout = setTimeout(function() {
                    t.menuHideAll()
                }, n ? 1 : this.opts.hideTimeout)
            },
            popupShow: function(n, t) {
                if (!this.opts.isPopup) return alert('SmartMenus jQuery Error:\n\nIf you want to show this menu via the "popupShow" method, set the isPopup:true option.'), void 0;
                if (this.hideTimeout && (clearTimeout(this.hideTimeout), this.hideTimeout = 0), this.$root.dataSM("shown-before", !0).stop(!0, !0), !this.$root.is(":visible")) {
                    this.$root.css({
                        left: n,
                        top: t
                    });
                    this.menuIframeShim(this.$root);
                    this.$root.dataSM("ie-shim") && this.$root.dataSM("ie-shim").css({
                        zIndex: this.$root.css("z-index"),
                        width: this.getWidth(this.$root),
                        height: this.getHeight(this.$root),
                        left: n,
                        top: t
                    }).insertBefore(this.$root);
                    var r = this,
                        i = function() {
                            r.$root.css("overflow", "")
                        };
                    this.opts.showFunction ? this.opts.showFunction.call(this, this.$root, i) : this.$root.show(this.opts.showDuration, i);
                    this.visibleSubMenus[0] = this.$root
                }
            },
            refresh: function() {
                this.destroy(!0);
                this.init(!0)
            },
            rootKeyDown: function(t) {
                var r, u, i;
                if (this.handleEvents()) switch (t.keyCode) {
                    case 27:
                        r = this.activatedItems[0];
                        r && (this.menuHideAll(), r[0].focus(), i = r.dataSM("sub"), i && this.menuHide(i));
                        break;
                    case 32:
                        u = n(t.target);
                        u.is("a") && this.handleItemEvents(u) && (i = u.dataSM("sub"), i && !i.is(":visible") && (this.itemClick({
                            currentTarget: t.target
                        }), t.preventDefault()))
                }
            },
            rootOut: function(n) {
                if (this.handleEvents() && !this.isTouchMode() && n.target != this.$root[0] && (this.hideTimeout && (clearTimeout(this.hideTimeout), this.hideTimeout = 0), !this.opts.showOnClick || !this.opts.hideOnClick)) {
                    var t = this;
                    this.hideTimeout = setTimeout(function() {
                        t.menuHideAll()
                    }, this.opts.hideTimeout)
                }
            },
            rootOver: function(n) {
                this.handleEvents() && !this.isTouchMode() && n.target != this.$root[0] && this.hideTimeout && (clearTimeout(this.hideTimeout), this.hideTimeout = 0)
            },
            winResize: function(n) {
                var t, i;
                this.handleEvents() ? "onorientationchange" in window && "orientationchange" != n.type || (t = this.isCollapsible(), this.wasCollapsible && t || (this.activatedItems.length && this.activatedItems[this.activatedItems.length - 1][0].blur(), this.menuHideAll()), this.wasCollapsible = t) : this.$disableOverlay && (i = this.$root.offset(), this.$disableOverlay.css({
                    top: i.top,
                    left: i.left,
                    width: this.$root.outerWidth(),
                    height: this.$root.outerHeight()
                }))
            }
        }
    });
    n.fn.dataSM = function(n, t) {
        return t ? this.data(n + "_smartmenus", t) : this.data(n + "_smartmenus")
    };
    n.fn.removeDataSM = function(n) {
        return this.removeData(n + "_smartmenus")
    };
    n.fn.smartmenus = function(t) {
        var i, r, u;
        return "string" == typeof t ? (i = arguments, r = t, Array.prototype.shift.call(i), this.each(function() {
            var t = n(this).data("smartmenus");
            t && t[r] && t[r].apply(t, i)
        })) : (u = n.extend({}, n.fn.smartmenus.defaults, t), this.each(function() {
            new n.SmartMenus(this, u)
        }))
    };
    n.fn.smartmenus.defaults = {
        isPopup: !1,
        mainMenuSubOffsetX: 0,
        mainMenuSubOffsetY: 0,
        subMenusSubOffsetX: 0,
        subMenusSubOffsetY: 0,
        subMenusMinWidth: "10em",
        subMenusMaxWidth: "20em",
        subIndicators: !0,
        subIndicatorsPos: "prepend",
        subIndicatorsText: "+",
        scrollStep: 30,
        scrollInterval: 30,
        scrollAccelerate: !0,
        showTimeout: 250,
        hideTimeout: 500,
        showDuration: 0,
        showFunction: null,
        hideDuration: 0,
        hideFunction: function(n, t) {
            n.fadeOut(200, t)
        },
        collapsibleShowDuration: 0,
        collapsibleShowFunction: function(n, t) {
            n.slideDown(200, t)
        },
        collapsibleHideDuration: 0,
        collapsibleHideFunction: function(n, t) {
            n.slideUp(200, t)
        },
        showOnClick: !1,
        hideOnClick: !0,
        keepInViewport: !0,
        keepHighlighted: !0,
        markCurrentItem: !1,
        markCurrentTree: !0,
        rightToLeftSubMenus: !1,
        bottomToTopSubMenus: !1,
        overlapControlsInIE: !0
    }
}(jQuery),
function(n) {
    n(function() {
        var t = n("ul.navbar-nav:not([data-sm-skip])");
        t.each(function() {
            function u() {
                var n = i.getViewportWidth();
                n != f && (i.isCollapsible() ? (t.addClass("sm-collapsible"), t.is("[data-sm-skip-collapsible-behavior]") || r.addClass("navbar-toggle sub-arrow")) : (t.removeClass("sm-collapsible"), t.is("[data-sm-skip-collapsible-behavior]") || r.removeClass("navbar-toggle sub-arrow")), f = n)
            }
            var t = n(this),
                i, f, r;
            t.addClass("sm").smartmenus({
                subMenusSubOffsetX: 2,
                subMenusSubOffsetY: -6,
                subIndicators: !1,
                collapsibleShowFunction: null,
                collapsibleHideFunction: null,
                rightToLeftSubMenus: t.hasClass("navbar-right"),
                bottomToTopSubMenus: t.closest(".navbar").hasClass("navbar-fixed-bottom")
            }).bind({
                "show.smapi": function(t, i) {
                    var r = n(i),
                        u = r.dataSM("scroll-arrows");
                    u && u.css("background-color", n(document.body).css("background-color"));
                    r.parent().addClass("open")
                },
                "hide.smapi": function(t, i) {
                    n(i).parent().removeClass("open")
                }
            }).find("a.current").parent().addClass("active");
            i = t.data("smartmenus");
            t.is("[data-sm-skip-collapsible-behavior]") && t.bind({
                "click.smapi": function(t, r) {
                    if (i.isCollapsible()) {
                        var f = n(r),
                            u = f.parent().dataSM("sub");
                        if (u && u.dataSM("shown-before") && u.is(":visible")) return i.itemActivate(f), i.menuHide(u), !1
                    }
                }
            });
            r = t.find(".caret");
            u();
            n(window).bind("resize.smartmenus" + i.rootId, u)
        })
    });
    n.SmartMenus.prototype.isCollapsible = function() {
        return "left" != this.$firstLink.parent().css("float")
    }
}(jQuery);
"function" != typeof Object.create && (Object.create = function(n) {
        function t() {}
        return t.prototype = n, new t
    }),
    function(n, t, i) {
        var r = {
            init: function(t, i) {
                this.$elem = n(i);
                this.options = n.extend({}, n.fn.owlCarousel.options, this.$elem.data(), t);
                this.userOptions = t;
                this.loadContent()
            },
            loadContent: function() {
                function r(n) {
                    var i, r = "";
                    if ("function" == typeof t.options.jsonSuccess) t.options.jsonSuccess.apply(this, [n]);
                    else {
                        for (i in n.owl) n.owl.hasOwnProperty(i) && (r += n.owl[i].item);
                        t.$elem.html(r)
                    }
                    t.logIn()
                }
                var t = this,
                    i;
                "function" == typeof t.options.beforeInit && t.options.beforeInit.apply(this, [t.$elem]);
                "string" == typeof t.options.jsonPath ? (i = t.options.jsonPath, n.getJSON(i, r)) : t.logIn()
            },
            logIn: function() {
                this.$elem.data("owl-originalStyles", this.$elem.attr("style"));
                this.$elem.data("owl-originalClasses", this.$elem.attr("class"));
                this.$elem.css({
                    opacity: 0
                });
                this.orignalItems = this.options.items;
                this.checkBrowser();
                this.wrapperWidth = 0;
                this.checkVisible = null;
                this.setVars()
            },
            setVars: function() {
                if (0 === this.$elem.children().length) return !1;
                this.baseClass();
                this.eventTypes();
                this.$userItems = this.$elem.children();
                this.itemsAmount = this.$userItems.length;
                this.wrapItems();
                this.$owlItems = this.$elem.find(".owl-item");
                this.$owlWrapper = this.$elem.find(".owl-wrapper");
                this.playDirection = "next";
                this.prevItem = 0;
                this.prevArr = [0];
                this.currentItem = 0;
                this.customEvents();
                this.onStartup()
            },
            onStartup: function() {
                this.updateItems();
                this.calculateAll();
                this.buildControls();
                this.updateControls();
                this.response();
                this.moveEvents();
                this.stopOnHover();
                this.owlStatus();
                !1 !== this.options.transitionStyle && this.transitionTypes(this.options.transitionStyle);
                !0 === this.options.autoPlay && (this.options.autoPlay = 5e3);
                this.play();
                this.$elem.find(".owl-wrapper").css("display", "block");
                this.$elem.is(":visible") ? this.$elem.css("opacity", 1) : this.watchVisibility();
                this.onstartup = !1;
                this.eachMoveUpdate();
                "function" == typeof this.options.afterInit && this.options.afterInit.apply(this, [this.$elem])
            },
            eachMoveUpdate: function() {
                !0 === this.options.lazyLoad && this.lazyLoad();
                !0 === this.options.autoHeight && this.autoHeight();
                this.onVisibleItems();
                "function" == typeof this.options.afterAction && this.options.afterAction.apply(this, [this.$elem])
            },
            updateVars: function() {
                "function" == typeof this.options.beforeUpdate && this.options.beforeUpdate.apply(this, [this.$elem]);
                this.watchVisibility();
                this.updateItems();
                this.calculateAll();
                this.updatePosition();
                this.updateControls();
                this.eachMoveUpdate();
                "function" == typeof this.options.afterUpdate && this.options.afterUpdate.apply(this, [this.$elem])
            },
            reload: function() {
                var n = this;
                t.setTimeout(function() {
                    n.updateVars()
                }, 0)
            },
            watchVisibility: function() {
                var n = this;
                if (!1 === n.$elem.is(":visible")) n.$elem.css({
                    opacity: 0
                }), t.clearInterval(n.autoPlayInterval), t.clearInterval(n.checkVisible);
                else return !1;
                n.checkVisible = t.setInterval(function() {
                    n.$elem.is(":visible") && (n.reload(), n.$elem.animate({
                        opacity: 1
                    }, 200), t.clearInterval(n.checkVisible))
                }, 500)
            },
            wrapItems: function() {
                this.$userItems.wrapAll('<div class="owl-wrapper">').wrap('<div class="owl-item"><\/div>');
                this.$elem.find(".owl-wrapper").wrap('<div class="owl-wrapper-outer">');
                this.wrapperOuter = this.$elem.find(".owl-wrapper-outer");
                this.$elem.css("display", "block")
            },
            baseClass: function() {
                var n = this.$elem.hasClass(this.options.baseClass),
                    t = this.$elem.hasClass(this.options.theme);
                n || this.$elem.addClass(this.options.baseClass);
                t || this.$elem.addClass(this.options.theme)
            },
            updateItems: function() {
                var t, i;
                if (!1 === this.options.responsive) return !1;
                if (!0 === this.options.singleItem) return this.options.items = this.orignalItems = 1, this.options.itemsCustom = !1, this.options.itemsDesktop = !1, this.options.itemsDesktopSmall = !1, this.options.itemsTablet = !1, this.options.itemsTabletSmall = !1, this.options.itemsMobile = !1;
                if (t = n(this.options.responsiveBaseWidth).width(), t > (this.options.itemsDesktop[0] || this.orignalItems) && (this.options.items = this.orignalItems), !1 !== this.options.itemsCustom)
                    for (this.options.itemsCustom.sort(function(n, t) {
                            return n[0] - t[0]
                        }), i = 0; i < this.options.itemsCustom.length; i += 1) this.options.itemsCustom[i][0] <= t && (this.options.items = this.options.itemsCustom[i][1]);
                else t <= this.options.itemsDesktop[0] && !1 !== this.options.itemsDesktop && (this.options.items = this.options.itemsDesktop[1]), t <= this.options.itemsDesktopSmall[0] && !1 !== this.options.itemsDesktopSmall && (this.options.items = this.options.itemsDesktopSmall[1]), t <= this.options.itemsTablet[0] && !1 !== this.options.itemsTablet && (this.options.items = this.options.itemsTablet[1]), t <= this.options.itemsTabletSmall[0] && !1 !== this.options.itemsTabletSmall && (this.options.items = this.options.itemsTabletSmall[1]), t <= this.options.itemsMobile[0] && !1 !== this.options.itemsMobile && (this.options.items = this.options.itemsMobile[1]);
                this.options.items > this.itemsAmount && !0 === this.options.itemsScaleUp && (this.options.items = this.itemsAmount)
            },
            response: function() {
                var i = this,
                    u, r;
                if (!0 !== i.options.responsive) return !1;
                r = n(t).width();
                i.resizer = function() {
                    n(t).width() !== r && (!1 !== i.options.autoPlay && t.clearInterval(i.autoPlayInterval), t.clearTimeout(u), u = t.setTimeout(function() {
                        r = n(t).width();
                        i.updateVars()
                    }, i.options.responsiveRefreshRate))
                };
                n(t).resize(i.resizer)
            },
            updatePosition: function() {
                this.jumpTo(this.currentItem);
                !1 !== this.options.autoPlay && this.checkAp()
            },
            appendItemsSizes: function() {
                var t = this,
                    i = 0,
                    r = t.itemsAmount - t.options.items;
                t.$owlItems.each(function(u) {
                    var f = n(this);
                    f.css({
                        width: t.itemWidth
                    }).data("owl-item", Number(u));
                    (0 == u % t.options.items || u === r) && (u > r || (i += 1));
                    f.data("owl-roundPages", i)
                })
            },
            appendWrapperSizes: function() {
                this.$owlWrapper.css({
                    width: this.$owlItems.length * this.itemWidth * 2,
                    left: 0
                });
                this.appendItemsSizes()
            },
            calculateAll: function() {
                this.calculateWidth();
                this.appendWrapperSizes();
                this.loops();
                this.max()
            },
            calculateWidth: function() {
                this.itemWidth = Math.round(this.$elem.width() / this.options.items)
            },
            max: function() {
                var n = -1 * (this.itemsAmount * this.itemWidth - this.options.items * this.itemWidth);
                return this.options.items > this.itemsAmount ? this.maximumPixels = n = this.maximumItem = 0 : (this.maximumItem = this.itemsAmount - this.options.items, this.maximumPixels = n), n
            },
            min: function() {
                return 0
            },
            loops: function() {
                var r = 0,
                    u = 0,
                    t, i;
                for (this.positionsInArray = [0], this.pagesInArray = [], t = 0; t < this.itemsAmount; t += 1) u += this.itemWidth, this.positionsInArray.push(-u), !0 === this.options.scrollPerPage && (i = n(this.$owlItems[t]), i = i.data("owl-roundPages"), i !== r && (this.pagesInArray[r] = this.positionsInArray[t], r = i))
            },
            buildControls: function() {
                (!0 === this.options.navigation || !0 === this.options.pagination) && (this.owlControls = n('<div class="owl-controls"/>').toggleClass("clickable", !this.browser.isTouch).appendTo(this.$elem));
                !0 === this.options.pagination && this.buildPagination();
                !0 === this.options.navigation && this.buildButtons()
            },
            buildButtons: function() {
                var t = this,
                    i = n('<div class="owl-buttons"/>');
                t.owlControls.append(i);
                t.buttonPrev = n("<div/>", {
                    "class": "owl-prev",
                    html: t.options.navigationText[0] || ""
                });
                t.buttonNext = n("<div/>", {
                    "class": "owl-next",
                    html: t.options.navigationText[1] || ""
                });
                i.append(t.buttonPrev).append(t.buttonNext);
                i.on("touchstart.owlControls mousedown.owlControls", 'div[class^="owl"]', function(n) {
                    n.preventDefault()
                });
                i.on("touchend.owlControls mouseup.owlControls", 'div[class^="owl"]', function(i) {
                    i.preventDefault();
                    n(this).hasClass("owl-next") ? t.next() : t.prev()
                })
            },
            buildPagination: function() {
                var t = this;
                t.paginationWrapper = n('<div class="owl-pagination"/>');
                t.owlControls.append(t.paginationWrapper);
                t.paginationWrapper.on("touchend.owlControls mouseup.owlControls", ".owl-page", function(i) {
                    i.preventDefault();
                    Number(n(this).data("owl-page")) !== t.currentItem && t.goTo(Number(n(this).data("owl-page")), !0)
                })
            },
            updatePagination: function() {
                var r, u, f, t, i, e;
                if (!1 === this.options.pagination) return !1;
                for (this.paginationWrapper.html(""), r = 0, u = this.itemsAmount - this.itemsAmount % this.options.items, t = 0; t < this.itemsAmount; t += 1) 0 == t % this.options.items && (r += 1, u === t && (f = this.itemsAmount - this.options.items), i = n("<div/>", {
                    "class": "owl-page"
                }), e = n("<span><\/span>", {
                    text: !0 === this.options.paginationNumbers ? r : "",
                    "class": !0 === this.options.paginationNumbers ? "owl-numbers" : ""
                }), i.append(e), i.data("owl-page", u === t ? f : t), i.data("owl-roundPages", r), this.paginationWrapper.append(i));
                this.checkPagination()
            },
            checkPagination: function() {
                var t = this;
                if (!1 === t.options.pagination) return !1;
                t.paginationWrapper.find(".owl-page").each(function() {
                    n(this).data("owl-roundPages") === n(t.$owlItems[t.currentItem]).data("owl-roundPages") && (t.paginationWrapper.find(".owl-page").removeClass("active"), n(this).addClass("active"))
                })
            },
            checkNavigation: function() {
                if (!1 === this.options.navigation) return !1;
                !1 === this.options.rewindNav && (0 === this.currentItem && 0 === this.maximumItem ? (this.buttonPrev.addClass("disabled"), this.buttonNext.addClass("disabled")) : 0 === this.currentItem && 0 !== this.maximumItem ? (this.buttonPrev.addClass("disabled"), this.buttonNext.removeClass("disabled")) : this.currentItem === this.maximumItem ? (this.buttonPrev.removeClass("disabled"), this.buttonNext.addClass("disabled")) : 0 !== this.currentItem && this.currentItem !== this.maximumItem && (this.buttonPrev.removeClass("disabled"), this.buttonNext.removeClass("disabled")))
            },
            updateControls: function() {
                this.updatePagination();
                this.checkNavigation();
                this.owlControls && (this.options.items >= this.itemsAmount ? this.owlControls.hide() : this.owlControls.show())
            },
            destroyControls: function() {
                this.owlControls && this.owlControls.remove()
            },
            next: function(n) {
                if (this.isTransition) return !1;
                if (this.currentItem += !0 === this.options.scrollPerPage ? this.options.items : 1, this.currentItem > this.maximumItem + (!0 === this.options.scrollPerPage ? this.options.items - 1 : 0))
                    if (!0 === this.options.rewindNav) this.currentItem = 0, n = "rewind";
                    else return this.currentItem = this.maximumItem, !1;
                this.goTo(this.currentItem, n)
            },
            prev: function(n) {
                if (this.isTransition) return !1;
                if (this.currentItem = !0 === this.options.scrollPerPage && 0 < this.currentItem && this.currentItem < this.options.items ? 0 : this.currentItem - (!0 === this.options.scrollPerPage ? this.options.items : 1), 0 > this.currentItem)
                    if (!0 === this.options.rewindNav) this.currentItem = this.maximumItem, n = "rewind";
                    else return this.currentItem = 0, !1;
                this.goTo(this.currentItem, n)
            },
            goTo: function(n, i, r) {
                var u = this;
                if (u.isTransition) return !1;
                if ("function" == typeof u.options.beforeMove && u.options.beforeMove.apply(this, [u.$elem]), n >= u.maximumItem ? n = u.maximumItem : 0 >= n && (n = 0), u.currentItem = u.owl.currentItem = n, !1 !== u.options.transitionStyle && "drag" !== r && 1 === u.options.items && !0 === u.browser.support3d) return u.swapSpeed(0), !0 === u.browser.support3d ? u.transition3d(u.positionsInArray[n]) : u.css2slide(u.positionsInArray[n], 1), u.afterGo(), u.singleItemTransition(), !1;
                n = u.positionsInArray[n];
                !0 === u.browser.support3d ? (u.isCss3Finish = !1, !0 === i ? (u.swapSpeed("paginationSpeed"), t.setTimeout(function() {
                    u.isCss3Finish = !0
                }, u.options.paginationSpeed)) : "rewind" === i ? (u.swapSpeed(u.options.rewindSpeed), t.setTimeout(function() {
                    u.isCss3Finish = !0
                }, u.options.rewindSpeed)) : (u.swapSpeed("slideSpeed"), t.setTimeout(function() {
                    u.isCss3Finish = !0
                }, u.options.slideSpeed)), u.transition3d(n)) : !0 === i ? u.css2slide(n, u.options.paginationSpeed) : "rewind" === i ? u.css2slide(n, u.options.rewindSpeed) : u.css2slide(n, u.options.slideSpeed);
                u.afterGo()
            },
            jumpTo: function(n) {
                "function" == typeof this.options.beforeMove && this.options.beforeMove.apply(this, [this.$elem]);
                n >= this.maximumItem || -1 === n ? n = this.maximumItem : 0 >= n && (n = 0);
                this.swapSpeed(0);
                !0 === this.browser.support3d ? this.transition3d(this.positionsInArray[n]) : this.css2slide(this.positionsInArray[n], 1);
                this.currentItem = this.owl.currentItem = n;
                this.afterGo()
            },
            afterGo: function() {
                this.prevArr.push(this.currentItem);
                this.prevItem = this.owl.prevItem = this.prevArr[this.prevArr.length - 2];
                this.prevArr.shift(0);
                this.prevItem !== this.currentItem && (this.checkPagination(), this.checkNavigation(), this.eachMoveUpdate(), !1 !== this.options.autoPlay && this.checkAp());
                "function" == typeof this.options.afterMove && this.prevItem !== this.currentItem && this.options.afterMove.apply(this, [this.$elem])
            },
            stop: function() {
                this.apStatus = "stop";
                t.clearInterval(this.autoPlayInterval)
            },
            checkAp: function() {
                "stop" !== this.apStatus && this.play()
            },
            play: function() {
                var n = this;
                if (n.apStatus = "play", !1 === n.options.autoPlay) return !1;
                t.clearInterval(n.autoPlayInterval);
                n.autoPlayInterval = t.setInterval(function() {
                    n.next(!0)
                }, n.options.autoPlay)
            },
            swapSpeed: function(n) {
                "slideSpeed" === n ? this.$owlWrapper.css(this.addCssSpeed(this.options.slideSpeed)) : "paginationSpeed" === n ? this.$owlWrapper.css(this.addCssSpeed(this.options.paginationSpeed)) : "string" != typeof n && this.$owlWrapper.css(this.addCssSpeed(n))
            },
            addCssSpeed: function(n) {
                return {
                    "-webkit-transition": "all " + n + "ms ease",
                    "-moz-transition": "all " + n + "ms ease",
                    "-o-transition": "all " + n + "ms ease",
                    transition: "all " + n + "ms ease"
                }
            },
            removeTransition: function() {
                return {
                    "-webkit-transition": "",
                    "-moz-transition": "",
                    "-o-transition": "",
                    transition: ""
                }
            },
            doTranslate: function(n) {
                return {
                    "-webkit-transform": "translate3d(" + n + "px, 0px, 0px)",
                    "-moz-transform": "translate3d(" + n + "px, 0px, 0px)",
                    "-o-transform": "translate3d(" + n + "px, 0px, 0px)",
                    "-ms-transform": "translate3d(" + n + "px, 0px, 0px)",
                    transform: "translate3d(" + n + "px, 0px,0px)"
                }
            },
            transition3d: function(n) {
                this.$owlWrapper.css(this.doTranslate(n))
            },
            css2move: function(n) {
                this.$owlWrapper.css({
                    left: n
                })
            },
            css2slide: function(n, t) {
                var i = this;
                i.isCssFinish = !1;
                i.$owlWrapper.stop(!0, !0).animate({
                    left: n
                }, {
                    duration: t || i.options.slideSpeed,
                    complete: function() {
                        i.isCssFinish = !0
                    }
                })
            },
            checkBrowser: function() {
                var n = i.createElement("div");
                n.style.cssText = "  -moz-transform:translate3d(0px, 0px, 0px); -ms-transform:translate3d(0px, 0px, 0px); -o-transform:translate3d(0px, 0px, 0px); -webkit-transform:translate3d(0px, 0px, 0px); transform:translate3d(0px, 0px, 0px)";
                n = n.style.cssText.match(/translate3d\(0px, 0px, 0px\)/g);
                this.browser = {
                    support3d: null !== n && 1 === n.length,
                    isTouch: "ontouchstart" in t || t.navigator.msMaxTouchPoints
                }
            },
            moveEvents: function() {
                (!1 !== this.options.mouseDrag || !1 !== this.options.touchDrag) && (this.gestures(), this.disabledEvents())
            },
            eventTypes: function() {
                var n = ["s", "e", "x"];
                this.ev_types = {};
                !0 === this.options.mouseDrag && !0 === this.options.touchDrag ? n = ["touchstart.owl mousedown.owl", "touchmove.owl mousemove.owl", "touchend.owl touchcancel.owl mouseup.owl"] : !1 === this.options.mouseDrag && !0 === this.options.touchDrag ? n = ["touchstart.owl", "touchmove.owl", "touchend.owl touchcancel.owl"] : !0 === this.options.mouseDrag && !1 === this.options.touchDrag && (n = ["mousedown.owl", "mousemove.owl", "mouseup.owl"]);
                this.ev_types.start = n[0];
                this.ev_types.move = n[1];
                this.ev_types.end = n[2]
            },
            disabledEvents: function() {
                this.$elem.on("dragstart.owl", function(n) {
                    n.preventDefault()
                });
                this.$elem.on("mousedown.disableTextSelect", function(t) {
                    return n(t.target).is("input, textarea, select, option")
                })
            },
            gestures: function() {
                function f(n) {
                    if (void 0 !== n.touches) return {
                        x: n.touches[0].pageX,
                        y: n.touches[0].pageY
                    };
                    if (void 0 === n.touches) {
                        if (void 0 !== n.pageX) return {
                            x: n.pageX,
                            y: n.pageY
                        };
                        if (void 0 === n.pageX) return {
                            x: n.clientX,
                            y: n.clientY
                        }
                    }
                }

                function e(t) {
                    "on" === t ? (n(i).on(r.ev_types.move, o), n(i).on(r.ev_types.end, s)) : "off" === t && (n(i).off(r.ev_types.move), n(i).off(r.ev_types.end))
                }

                function o(e) {
                    e = e.originalEvent || e || t.event;
                    r.newPosX = f(e).x - u.offsetX;
                    r.newPosY = f(e).y - u.offsetY;
                    r.newRelativeX = r.newPosX - u.relativePos;
                    "function" == typeof r.options.startDragging && !0 !== u.dragging && 0 !== r.newRelativeX && (u.dragging = !0, r.options.startDragging.apply(r, [r.$elem]));
                    (8 < r.newRelativeX || -8 > r.newRelativeX) && !0 === r.browser.isTouch && (void 0 !== e.preventDefault ? e.preventDefault() : e.returnValue = !1, u.sliding = !0);
                    (10 < r.newPosY || -10 > r.newPosY) && !1 === u.sliding && n(i).off("touchmove.owl");
                    r.newPosX = Math.max(Math.min(r.newPosX, r.newRelativeX / 5), r.maximumPixels + r.newRelativeX / 5);
                    !0 === r.browser.support3d ? r.transition3d(r.newPosX) : r.css2move(r.newPosX)
                }

                function s(i) {
                    i = i.originalEvent || i || t.event;
                    var f;
                    i.target = i.target || i.srcElement;
                    u.dragging = !1;
                    !0 !== r.browser.isTouch && r.$owlWrapper.removeClass("grabbing");
                    r.dragDirection = r.owl.dragDirection = 0 > r.newRelativeX ? "left" : "right";
                    0 !== r.newRelativeX && (f = r.getNewPosition(), r.goTo(f, !1, "drag"), u.targetElement === i.target && !0 !== r.browser.isTouch && (n(i.target).on("click.disable", function(t) {
                        t.stopImmediatePropagation();
                        t.stopPropagation();
                        t.preventDefault();
                        n(t.target).off("click.disable")
                    }), i = n._data(i.target, "events").click, f = i.pop(), i.splice(0, 0, f)));
                    e("off")
                }
                var r = this,
                    u = {
                        offsetX: 0,
                        offsetY: 0,
                        baseElWidth: 0,
                        relativePos: 0,
                        position: null,
                        minSwipe: null,
                        maxSwipe: null,
                        sliding: null,
                        dargging: null,
                        targetElement: null
                    };
                r.isCssFinish = !0;
                r.$elem.on(r.ev_types.start, ".owl-wrapper", function(i) {
                    i = i.originalEvent || i || t.event;
                    var o;
                    if (3 === i.which) return !1;
                    if (!(r.itemsAmount <= r.options.items)) {
                        if (!1 === r.isCssFinish && !r.options.dragBeforeAnimFinish || !1 === r.isCss3Finish && !r.options.dragBeforeAnimFinish) return !1;
                        !1 !== r.options.autoPlay && t.clearInterval(r.autoPlayInterval);
                        !0 === r.browser.isTouch || r.$owlWrapper.hasClass("grabbing") || r.$owlWrapper.addClass("grabbing");
                        r.newPosX = 0;
                        r.newRelativeX = 0;
                        n(this).css(r.removeTransition());
                        o = n(this).position();
                        u.relativePos = o.left;
                        u.offsetX = f(i).x - o.left;
                        u.offsetY = f(i).y - o.top;
                        e("on");
                        u.sliding = !1;
                        u.targetElement = i.target || i.srcElement
                    }
                })
            },
            getNewPosition: function() {
                var n = this.closestItem();
                return n > this.maximumItem ? n = this.currentItem = this.maximumItem : 0 <= this.newPosX && (this.currentItem = n = 0), n
            },
            closestItem: function() {
                var t = this,
                    i = !0 === t.options.scrollPerPage ? t.pagesInArray : t.positionsInArray,
                    u = t.newPosX,
                    r = null;
                return n.each(i, function(f, e) {
                    u - t.itemWidth / 20 > i[f + 1] && u - t.itemWidth / 20 < e && "left" === t.moveDirection() ? (r = e, t.currentItem = !0 === t.options.scrollPerPage ? n.inArray(r, t.positionsInArray) : f) : u + t.itemWidth / 20 < e && u + t.itemWidth / 20 > (i[f + 1] || i[f] - t.itemWidth) && "right" === t.moveDirection() && (!0 === t.options.scrollPerPage ? (r = i[f + 1] || i[i.length - 1], t.currentItem = n.inArray(r, t.positionsInArray)) : (r = i[f + 1], t.currentItem = f + 1))
                }), t.currentItem
            },
            moveDirection: function() {
                var n;
                return 0 > this.newRelativeX ? (n = "right", this.playDirection = "next") : (n = "left", this.playDirection = "prev"), n
            },
            customEvents: function() {
                var n = this;
                n.$elem.on("owl.next", function() {
                    n.next()
                });
                n.$elem.on("owl.prev", function() {
                    n.prev()
                });
                n.$elem.on("owl.play", function(t, i) {
                    n.options.autoPlay = i;
                    n.play();
                    n.hoverStatus = "play"
                });
                n.$elem.on("owl.stop", function() {
                    n.stop();
                    n.hoverStatus = "stop"
                });
                n.$elem.on("owl.goTo", function(t, i) {
                    n.goTo(i)
                });
                n.$elem.on("owl.jumpTo", function(t, i) {
                    n.jumpTo(i)
                })
            },
            stopOnHover: function() {
                var n = this;
                !0 === n.options.stopOnHover && !0 !== n.browser.isTouch && !1 !== n.options.autoPlay && (n.$elem.on("mouseover", function() {
                    n.stop()
                }), n.$elem.on("mouseout", function() {
                    "stop" !== n.hoverStatus && n.play()
                }))
            },
            lazyLoad: function() {
                var r, t, u, i, f;
                if (!1 === this.options.lazyLoad) return !1;
                for (r = 0; r < this.itemsAmount; r += 1) t = n(this.$owlItems[r]), "loaded" !== t.data("owl-loaded") && (u = t.data("owl-item"), i = t.find(".lazyOwl"), "string" != typeof i.data("src") ? t.data("owl-loaded", "loaded") : (void 0 === t.data("owl-loaded") && (i.hide(), t.addClass("loading").data("owl-loaded", "checked")), (f = !0 === this.options.lazyFollow ? u >= this.currentItem : !0) && u < this.currentItem + this.options.items && i.length && this.lazyPreload(t, i)))
            },
            lazyPreload: function(n, i) {
                function u() {
                    n.data("owl-loaded", "loaded").removeClass("loading");
                    i.removeAttr("data-src");
                    "fade" === r.options.lazyEffect ? i.fadeIn(400) : i.show();
                    "function" == typeof r.options.afterLazyLoad && r.options.afterLazyLoad.apply(this, [r.$elem])
                }

                function f() {
                    e += 1;
                    r.completeImg(i.get(0)) || !0 === o ? u() : 100 >= e ? t.setTimeout(f, 100) : u()
                }
                var r = this,
                    e = 0,
                    o;
                "DIV" === i.prop("tagName") ? (i.css("background-image", "url(" + i.data("src") + ")"), o = !0) : i[0].src = i.data("src");
                f()
            },
            autoHeight: function() {
                function u() {
                    var r = n(i.$owlItems[i.currentItem]).height();
                    i.wrapperOuter.css("height", r + "px");
                    i.wrapperOuter.hasClass("autoHeight") || t.setTimeout(function() {
                        i.wrapperOuter.addClass("autoHeight")
                    }, 0)
                }

                function f() {
                    r += 1;
                    i.completeImg(e.get(0)) ? u() : 100 >= r ? t.setTimeout(f, 100) : i.wrapperOuter.css("height", "")
                }
                var i = this,
                    e = n(i.$owlItems[i.currentItem]).find("img"),
                    r;
                void 0 !== e.get(0) ? (r = 0, f()) : u()
            },
            completeImg: function(n) {
                return !n.complete || "undefined" != typeof n.naturalWidth && 0 === n.naturalWidth ? !1 : !0
            },
            onVisibleItems: function() {
                var t;
                for (!0 === this.options.addClassActive && this.$owlItems.removeClass("active"), this.visibleItems = [], t = this.currentItem; t < this.currentItem + this.options.items; t += 1) this.visibleItems.push(t), !0 === this.options.addClassActive && n(this.$owlItems[t]).addClass("active");
                this.owl.visibleItems = this.visibleItems
            },
            transitionTypes: function(n) {
                this.outClass = "owl-" + n + "-out";
                this.inClass = "owl-" + n + "-in"
            },
            singleItemTransition: function() {
                var n = this,
                    u = n.outClass,
                    f = n.inClass,
                    t = n.$owlItems.eq(n.currentItem),
                    i = n.$owlItems.eq(n.prevItem),
                    e = Math.abs(n.positionsInArray[n.currentItem]) + n.positionsInArray[n.prevItem],
                    r = Math.abs(n.positionsInArray[n.currentItem]) + n.itemWidth / 2;
                n.isTransition = !0;
                n.$owlWrapper.addClass("owl-origin").css({
                    "-webkit-transform-origin": r + "px",
                    "-moz-perspective-origin": r + "px",
                    "perspective-origin": r + "px"
                });
                i.css({
                    position: "relative",
                    left: e + "px"
                }).addClass(u).on("webkitAnimationEnd oAnimationEnd MSAnimationEnd animationend", function() {
                    n.endPrev = !0;
                    i.off("webkitAnimationEnd oAnimationEnd MSAnimationEnd animationend");
                    n.clearTransStyle(i, u)
                });
                t.addClass(f).on("webkitAnimationEnd oAnimationEnd MSAnimationEnd animationend", function() {
                    n.endCurrent = !0;
                    t.off("webkitAnimationEnd oAnimationEnd MSAnimationEnd animationend");
                    n.clearTransStyle(t, f)
                })
            },
            clearTransStyle: function(n, t) {
                n.css({
                    position: "",
                    left: ""
                }).removeClass(t);
                this.endPrev && this.endCurrent && (this.$owlWrapper.removeClass("owl-origin"), this.isTransition = this.endCurrent = this.endPrev = !1)
            },
            owlStatus: function() {
                this.owl = {
                    userOptions: this.userOptions,
                    baseElement: this.$elem,
                    userItems: this.$userItems,
                    owlItems: this.$owlItems,
                    currentItem: this.currentItem,
                    prevItem: this.prevItem,
                    visibleItems: this.visibleItems,
                    isTouch: this.browser.isTouch,
                    browser: this.browser,
                    dragDirection: this.dragDirection
                }
            },
            clearEvents: function() {
                this.$elem.off(".owl owl mousedown.disableTextSelect");
                n(i).off(".owl owl");
                n(t).off("resize", this.resizer)
            },
            unWrap: function() {
                0 !== this.$elem.children().length && (this.$owlWrapper.unwrap(), this.$userItems.unwrap().unwrap(), this.owlControls && this.owlControls.remove());
                this.clearEvents();
                this.$elem.attr("style", this.$elem.data("owl-originalStyles") || "").attr("class", this.$elem.data("owl-originalClasses"))
            },
            destroy: function() {
                this.stop();
                t.clearInterval(this.checkVisible);
                this.unWrap();
                this.$elem.removeData()
            },
            reinit: function(t) {
                t = n.extend({}, this.userOptions, t);
                this.unWrap();
                this.init(t, this.$elem)
            },
            addItem: function(n, t) {
                var i;
                if (!n) return !1;
                if (0 === this.$elem.children().length) return this.$elem.append(n), this.setVars(), !1;
                this.unWrap();
                i = void 0 === t || -1 === t ? -1 : t;
                i >= this.$userItems.length || -1 === i ? this.$userItems.eq(-1).after(n) : this.$userItems.eq(i).before(n);
                this.setVars()
            },
            removeItem: function(n) {
                if (0 === this.$elem.children().length) return !1;
                n = void 0 === n || -1 === n ? -1 : n;
                this.unWrap();
                this.$userItems.eq(n).remove();
                this.setVars()
            }
        };
        n.fn.owlCarousel = function(t) {
            return this.each(function() {
                if (!0 === n(this).data("owl-init")) return !1;
                n(this).data("owl-init", !0);
                var i = Object.create(r);
                i.init(t, this);
                n.data(this, "owlCarousel", i)
            })
        };
        n.fn.owlCarousel.options = {
            items: 5,
            itemsCustom: !1,
            itemsDesktop: [1199, 4],
            itemsDesktopSmall: [979, 3],
            itemsTablet: [768, 2],
            itemsTabletSmall: !1,
            itemsMobile: [479, 1],
            singleItem: !1,
            itemsScaleUp: !1,
            slideSpeed: 200,
            paginationSpeed: 800,
            rewindSpeed: 1e3,
            autoPlay: !1,
            stopOnHover: !1,
            navigation: !1,
            navigationText: ["prev", "next"],
            rewindNav: !0,
            scrollPerPage: !1,
            pagination: !0,
            paginationNumbers: !1,
            responsive: !0,
            responsiveRefreshRate: 200,
            responsiveBaseWidth: t,
            baseClass: "owl-carousel",
            theme: "owl-theme",
            lazyLoad: !1,
            lazyFollow: !0,
            lazyEffect: "fade",
            autoHeight: !1,
            jsonPath: !1,
            jsonSuccess: !1,
            dragBeforeAnimFinish: !0,
            mouseDrag: !0,
            touchDrag: !0,
            addClassActive: !1,
            transitionStyle: !1,
            beforeUpdate: !1,
            afterUpdate: !1,
            beforeInit: !1,
            afterInit: !1,
            beforeMove: !1,
            afterMove: !1,
            afterAction: !1,
            startDragging: !1,
            afterLazyLoad: !1
        }
    }(jQuery, window, document);
$(document).ready(function() {
    $(".popleft .close").click(function() {
        $(".popleft").css("display", "none")
    });
    $(".i_hotline").hover(function() {
        $(".c_hotline").fadeIn("slow");
        $(".i_hotline").fadeOut("slow")
    });
    $(".c_hotline").hover(function() {
        $(".c_hotline").fadeIn("slow");
        $(".i_hotline").fadeOut("slow")
    }, function() {
        $(".c_hotline").fadeOut("slow");
        $(".i_hotline").fadeIn("slow")
    });
    $(".close_hotline").click(function() {
        $(".i_hotline").fadeIn("slow");
        $(".c_hotline").fadeOut("slow")
    });
    $(".i_hotline-mb").hover(function() {
        $("#hotline-mb").css("height", "auto");
        $(".i_hotline-mb").fadeOut("slow");
        $(".c_hotline-mb").fadeIn("slow")
    });
    $(".close_hotline-mb").click(function() {
        $(".i_hotline-mb").fadeIn("slow");
        $(".c_hotline-mb").fadeOut("slow");
        $("#hotline-mb").css("height", "30px")
    });
    $(".btnsearch").click(function() {
        var n = $(".txtsearch").val(),
            t;
        n.length < 1 ? alert("Hãy nhập từ khoá tìm kiếm") : (t = change_alias2(n), location.href = "/tim-kiem.html?key=" + t)
    });
    $(".txtsearch").bind("enterKey", function() {
        var n = $(".txtsearch").val(),
            t;
        n.length < 1 ? alert("Hãy nhập từ khoá tìm kiếm") : (t = change_alias2(n), location.href = "/tim-kiem.html?key=" + t)
    });
    $(".txtsearch").keyup(function(n) {
        n.keyCode == 13 && $(this).trigger("enterKey")
    })
});
equalheight = function(n) {
    var r = 0,
        u = 0,
        i = [],
        t;
    $(n).each(function() {
        if (t = $(this), $(t).height("auto"), topPostion = t.position().top, u != topPostion) {
            for (currentDiv = 0; currentDiv < i.length; currentDiv++) i[currentDiv].height(r);
            i.length = 0;
            u = topPostion;
            r = t.height();
            i.push(t)
        } else i.push(t), r = r < t.height() ? t.height() : r;
        for (currentDiv = 0; currentDiv < i.length; currentDiv++) i[currentDiv].height(r)
    })
};
$(document).ready(function() {
    var i = $(".bg_list ul li .border_right:first-child").height(),
        n, t;
    $(".sort_by").click(function() {
        $(".sortprice").toggle()
    });
    $(".sortbyprice_asc").click(function() {
        n("price", "asc")
    });
    $(".sortbyprice_desc").click(function() {
        n("price", "desc")
    });
    $(".sortbydate_asc").click(function() {
        n("date", "asc")
    });
    $(".sortbydate_desc").click(function() {
        n("date", "desc")
    });
    $(".view_list").click(function() {
        n("view", "list")
    });
    $(".view_grid").click(function() {
        n("view", "grid")
    });
    $(".sort_refresh").click(function() {
        var n = window.location.pathname,
            t = window.location.origin;
        window.location.assign(t + n)
    });
    $(".sort_img_show").click(function() {
        n("img", "hide");
        $(this).toggleClass("sort_img_show sort_img_hide")
    });
    $(".sort_img_hide").click(function() {
        n("img", "show");
        $(this).toggleClass("sort_img_hide sort_img_show")
    });
    n = function(n, t) {
        var o = $(location).attr("host"),
            s = $(location).attr("href"),
            v = document.location.toString(),
            a = $(location).attr("hash"),
            i = $(location).attr("search"),
            f, h, e, u, c, l, r;
        if (s = s.replace(a, ""), f = "", n != "")
            if (h = s.replace(o, "").replace(i, "").replace("https://", "").replace("#", ""), i != "") {
                for (i = i.replace("?", ""), e = i.split("&"), r = "", u = 0; u < e.length; u++) i.includes(n) == !0 ? e[u].includes(n) == !0 && (c = e[u].split("="), l = c[0] + "=" + t, i = i.replace(e[u], l)) : r = "&" + n + "=" + t;
                f = "https://" + o + h + "?" + i + r;
                window.location.assign(f)
            } else r = n + "=" + t, f = "https://" + o + h + "?" + i + r, window.location.assign(f)
    };
    t = $(".article-item").find("p.briefdesc").each(function() {
        var r = $(this).html(),
            t, i, n;
        if (r.length > 0 && (t = r.split(" "), t.length > 25)) {
            for (i = "", n = 0; n < 25; n++) i += t[n] + " ";
            $(this).html("");
            $(this).html(i + "...")
        }
    });
    equalheight = function(n) {
        var r = 0,
            u = 0,
            i = [],
            t;
        $(n).each(function() {
            if (t = $(this), $(t).height("auto"), topPostion = t.position().top, u != topPostion) {
                for (currentDiv = 0; currentDiv < i.length; currentDiv++) i[currentDiv].height(r);
                i.length = 0;
                u = topPostion;
                r = t.height();
                i.push(t)
            } else i.push(t), r = r < t.height() ? t.height() : r;
            for (currentDiv = 0; currentDiv < i.length; currentDiv++) i[currentDiv].height(r)
        })
    };
    $(window).load(function() {
        equalheight(".bg_grid_tour_child")
    });
    $(window).resize(function() {
        equalheight(".bg_grid_tour_child")
    })
});
! function(n, t) {
    "object" == typeof exports ? module.exports = t(n) : "function" == typeof define && define.amd ? define([], t(n)) : n.LazyLoad = t(n)
}("undefined" != typeof global ? global : this.window || this.global, function(n) {
    "use strict";

    function t(n, t) {
        this.settings = i(r, t || {});
        this.images = n || document.querySelectorAll(this.settings.selector);
        this.observer = null;
        this.init()
    }
    const r = {
            src: "data-src",
            srcset: "data-srcset",
            selector: ".lazyload"
        },
        i = function() {
            let n = {},
                r = !1,
                t = 0,
                u = arguments.length;
            for ("[object Boolean]" === Object.prototype.toString.call(arguments[0]) && (r = arguments[0], t++); t < u; t++) ! function(t) {
                for (let u in t) Object.prototype.hasOwnProperty.call(t, u) && (n[u] = r && "[object Object]" === Object.prototype.toString.call(t[u]) ? i(!0, n[u], t[u]) : t[u])
            }(arguments[t]);
            return n
        };
    if (t.prototype = {
            init: function() {
                if (!n.IntersectionObserver) return void this.loadImages();
                let t = this;
                this.observer = new IntersectionObserver(function(n) {
                    n.forEach(function(n) {
                        if (n.intersectionRatio > 0) {
                            t.observer.unobserve(n.target);
                            let i = n.target.getAttribute(t.settings.src),
                                r = n.target.getAttribute(t.settings.srcset);
                            "img" === n.target.tagName.toLowerCase() ? (i && (n.target.src = i), r && (n.target.srcset = r)) : n.target.style.backgroundImage = "url(" + i + ")"
                        }
                    })
                }, {
                    root: null,
                    rootMargin: "0px",
                    threshold: [0]
                });
                this.images.forEach(function(n) {
                    t.observer.observe(n)
                })
            },
            loadAndDestroy: function() {
                this.settings && (this.loadImages(), this.destroy())
            },
            loadImages: function() {
                if (this.settings) {
                    let n = this;
                    this.images.forEach(function(t) {
                        let i = t.getAttribute(n.settings.src),
                            r = t.getAttribute(n.settings.srcset);
                        "img" === t.tagName.toLowerCase() ? (i && (t.src = i), r && (t.srcset = r)) : t.style.backgroundImage = "url(" + i + ")"
                    })
                }
            },
            destroy: function() {
                this.settings && (this.observer.disconnect(), this.settings = null)
            }
        }, n.lazyload = function(n, i) {
            return new t(n, i)
        }, n.jQuery) {
        const i = n.jQuery;
        i.fn.lazyload = function(n) {
            return n = n || {}, n.attribute = n.attribute || "data-src", new t(i.makeArray(this), n), this
        }
    }
    return t
});
$(document).ready(function() {

        $(".btnsearchtour").click(function() {
             location.reload();
            // var u = $("#select_f_search_diemden option:selected").text(),
            //     t = $("#select_f_search_diemden option:selected").val(),
            //     i = $("#select_f_search_km").val(),
            //     r = $("input[name='radiotour']:checked").val(),
            //     f, n;
            // t == "0" ? alert("Lựa chọn điểm đến") : (f = remove_unicode(u), n = "all", i == "1" && (n = "discount"), i == "0" && (n = "all"), r == "1" && window.location.assign("/du-lich-trong-nuoc/" + t + ".html?search=" + n), r == "2" && window.location.assign("/du-lich-nuoc-ngoai/" + t + ".html?search=" + n))
        });
        // $(".btnsearchtourmb").click(function() {
        //     var i = $("#select_f_search_diemden option:selected").text(),
        //         n = $("#select_f_search_diemden option:selected").val(),
        //         t = $("#search_luachon_new_ option:selected").val(),
        //         r;
        //     n == "0" ? alert("Lựa chọn điểm đến") : (r = remove_unicode(i), t == "0" && window.location.assign("/du-lich-trong-nuoc/" + n + ".html"), t == "1" && window.location.assign("/du-lich-nuoc-ngoai/" + n + ".html"))
        // });
        // $("#select_f_search_diemden").change(function() {
        //     var n = $("#select_f_search_diemden").val(),
        //         t = $(".select_f_search_mb").val();
        //     n == "0" ? alert("Lựa chọn điểm đến") : t == "00" ? alert("Lựa chọn tuyến du lịch.") : (t == "0" && window.location.assign("/du-lich-trong-nuoc/" + n + ".html"), t == "1" && window.location.assign("/du-lich-nuoc-ngoai/" + n + ".html"))
        // })
    }),
    function(n) {
        function r(n) {
            n.find(".fs-option.hl").removeClass("hl");
            n.find(".fs-search input").focus();
            window.fSelect.idx = -1
        }

        function u(n) {
            var t = n.find(".fs-options"),
                f = n.find(".fs-option.hl"),
                r = f.offset().top + t.scrollTop(),
                e = r + f.outerHeight(),
                u = t.offset().top + t.scrollTop(),
                o = u + t.outerHeight(),
                i;
            e > o ? (i = t.scrollTop() + e - o, t.scrollTop(i)) : r < u && (i = t.scrollTop() - u - r, t.scrollTop(i))
        }

        function f(n) {
            window.fSelect.active_el = n;
            window.fSelect.active_id = n.data("id");
            window.fSelect.initial_values = n.find("select").val();
            n.find(".fs-dropdown").removeClass("hidden");
            n.addClass("fs-open");
            r(n)
        }

        function t(t) {
            if ("undefined" == typeof t && null != window.fSelect.active_el && (t = window.fSelect.active_el), "undefined" != typeof t) {
                var i = window.fSelect.initial_values,
                    r = t.find("select").val();
                JSON.stringify(i) != JSON.stringify(r) && n(document).trigger("fs:closed", t)
            }
            n(".fs-wrap").removeClass("fs-open");
            n(".fs-dropdown").addClass("hidden");
            window.fSelect.active_el = null;
            window.fSelect.active_id = null;
            window.fSelect.last_choice = null
        }
        n.fn.fSelect = function(t) {
            function r(t, i) {
                this.$select = n(t);
                this.settings = i;
                this.create()
            }
            var i;
            return i = "string" == typeof t ? t : n.extend({
                placeholder: "Select some options",
                numDisplayed: 3,
                overflowText: "{n} selected",
                searchText: "Search",
                showSearch: !0,
                optionFormatter: !1
            }, t), r.prototype = {
                create: function() {
                    this.settings.multiple = this.$select.is("[multiple]");
                    var n = this.settings.multiple ? " multiple" : "";
                    this.$select.wrap('<div class="fs-wrap' + n + '" tabindex="0" />');
                    this.$select.before('<div class="fs-label-wrap"><div class="fs-label">' + this.settings.placeholder + '<\/div><span class="fs-arrow"><\/span><\/div>');
                    this.$select.before('<div class="fs-dropdown hidden"><div class="fs-options"><\/div><\/div>');
                    this.$select.addClass("hidden");
                    this.$wrap = this.$select.closest(".fs-wrap");
                    this.$wrap.data("id", window.fSelect.num_items);
                    window.fSelect.num_items++;
                    this.reload()
                },
                reload: function() {
                    var n, t;
                    this.settings.showSearch && (n = '<div class="fs-search"><input type="search" placeholder="' + this.settings.searchText + '" /><\/div>', this.$wrap.find(".fs-dropdown").prepend(n));
                    this.idx = 0;
                    this.optgroup = 0;
                    this.selected = [].concat(this.$select.val());
                    t = this.buildOptions(this.$select);
                    this.$wrap.find(".fs-options").html(t);
                    this.reloadDropdownLabel()
                },
                destroy: function() {
                    this.$wrap.find(".fs-label-wrap").remove();
                    this.$wrap.find(".fs-dropdown").remove();
                    this.$select.unwrap().removeClass("hidden")
                },
                buildOptions: function(t) {
                    var i = this,
                        r = "";
                    return t.children().each(function(t, u) {
                        var f = n(u),
                            e;
                        if ("optgroup" == f.prop("nodeName").toLowerCase()) r += '<div class="fs-optgroup-label" data-group="' + i.optgroup + '">' + f.prop("label") + "<\/div>", r += i.buildOptions(f), i.optgroup++;
                        else if (e = f.prop("value"), 0 < i.idx || "" != e || !i.settings.multiple) {
                            var s = f.is(":disabled") ? " disabled" : "",
                                h = -1 < n.inArray(e, i.selected) ? " selected" : "",
                                c = " g" + i.optgroup,
                                o = '<div class="fs-option' + h + s + c + '" data-value="' + e + '" data-index="' + i.idx + '"><span class="fs-checkbox"><i><\/i><\/span><div class="fs-option-label">' + f.html() + "<\/div><\/div>";
                            "function" == typeof i.settings.optionFormatter && (o = i.settings.optionFormatter(o));
                            r += o;
                            i.idx++
                        }
                    }), r
                },
                reloadDropdownLabel: function() {
                    var i = this.settings,
                        t = [];
                    this.$wrap.find(".fs-option.selected").each(function(i, r) {
                        t.push(n(r).find(".fs-option-label").text())
                    });
                    t = t.length < 1 ? i.placeholder : t.length > i.numDisplayed ? i.overflowText.replace("{n}", t.length) : t.join(", ");
                    this.$wrap.find(".fs-label").html(t);
                    this.$wrap.toggleClass("fs-default", t === i.placeholder);
                    this.$select.change()
                }
            }, this.each(function() {
                var t = n(this).data("fSelect");
                t || (t = new r(this, i), n(this).data("fSelect", t));
                "string" == typeof i && t[i]()
            })
        };
        window.fSelect = {
            num_items: 0,
            active_id: null,
            active_el: null,
            last_choice: null,
            idx: -1
        };
        n(document).on("click", ".fs-option:not(.hidden, .disabled)", function(r) {
            var u = n(this).closest(".fs-wrap"),
                e = !1,
                f;
            if (u.hasClass("multiple")) {
                if (f = [], r.shiftKey && null != window.fSelect.last_choice) {
                    var o = parseInt(n(this).attr("data-index")),
                        s = !n(this).hasClass("selected"),
                        h = Math.min(window.fSelect.last_choice, o),
                        c = Math.max(window.fSelect.last_choice, o);
                    for (i = h; i <= c; i++) u.find(".fs-option[data-index=" + i + "]").not(".hidden, .disabled").each(function() {
                        n(this).toggleClass("selected", s)
                    })
                } else window.fSelect.last_choice = parseInt(n(this).attr("data-index")), n(this).toggleClass("selected");
                u.find(".fs-option.selected").each(function(t, i) {
                    f.push(n(i).attr("data-value"))
                })
            } else f = n(this).attr("data-value"), u.find(".fs-option").removeClass("selected"), n(this).addClass("selected"), e = !0;
            u.find("select").val(f);
            u.find("select").fSelect("reloadDropdownLabel");
            n(document).trigger("fs:changed", u);
            e && t(u)
        });
        n(document).on("keyup", ".fs-search input", function(t) {
            if (40 == t.which) {
                n(this).blur();
                return
            }
            var i = n(this).closest(".fs-wrap"),
                u = n(this).val().replace(/[|\\{}()[\]^$+*?.]/g, "\\$&");
            i.find(".fs-option, .fs-optgroup-label").removeClass("hidden");
            "" != u && (i.find(".fs-option").each(function() {
                var t = new RegExp(u, "gi");
                null === n(this).find(".fs-option-label").text().match(t) && n(this).addClass("hidden")
            }), i.find(".fs-optgroup-label").each(function() {
                var t = n(this).attr("data-group"),
                    i = n(this).closest(".fs-options").find(".fs-option.g" + t + ":not(.hidden)").length;
                i < 1 && n(this).addClass("hidden")
            }));
            r(i)
        });
        n(document).on("click", function(i) {
            var u = n(i.target),
                r = u.closest(".fs-wrap"),
                e;
            0 < r.length ? (r.data("id") !== window.fSelect.active_id && t(), (u.hasClass("fs-label") || u.hasClass("fs-arrow")) && (e = r.find(".fs-dropdown").hasClass("hidden"), e ? f(r) : t(r))) : t()
        });
        n(document).on("keydown", function(i) {
            var r = window.fSelect.active_el,
                o = n(i.target),
                s, f, e;
            if (o.hasClass("fs-wrap")) {
                if (32 == i.which) {
                    o.find(".fs-label").trigger("click");
                    return
                }
            } else if (0 < o.closest(".fs-search").length) {
                if (32 == i.which) return
            } else if (null === r) return;
            38 == i.which ? (i.preventDefault(), r.find(".fs-option.hl").removeClass("hl"), f = r.find(".fs-option[data-index=" + window.fSelect.idx + "]"), s = f.prevAll(".fs-option:not(.hidden, .disabled)"), s.length > 0 ? (window.fSelect.idx = parseInt(s.attr("data-index")), r.find(".fs-option[data-index=" + window.fSelect.idx + "]").addClass("hl"), u(r)) : (window.fSelect.idx = -1, r.find(".fs-search input").focus())) : 40 == i.which ? (i.preventDefault(), f = r.find(".fs-option[data-index=" + window.fSelect.idx + "]"), e = f.length < 1 ? r.find(".fs-option:not(.hidden, .disabled):first") : f.nextAll(".fs-option:not(.hidden, .disabled)"), e.length > 0 && (window.fSelect.idx = parseInt(e.attr("data-index")), r.find(".fs-option.hl").removeClass("hl"), r.find(".fs-option[data-index=" + window.fSelect.idx + "]").addClass("hl"), u(r))) : 32 == i.which || 13 == i.which ? (i.preventDefault(), r.find(".fs-option.hl").click()) : 27 == i.which && t(r)
        })
    }(jQuery),
    function(n) {
        n.fn.jRate = function(t) {
            "use strict";

            function s(n) {
                return typeof n != "undefined"
            }

            function g() {
                if (s(i)) return i.rating
            }

            function nt(n) {
                if (!s(n) || n < i.min || n > i.max) throw n + " is not in range(" + min + "," + max + ")";
                i.rating = n;
                e(n)
            }

            function tt(n) {
                var f = '<svg width="' + i.width + '" height=' + i.height + ' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"',
                    o = i.horizontal,
                    t = u.attr("id"),
                    e = '<defs><linearGradient id="' + t + "_grad" + n + '" x1="0%" y1="0%" x2="' + (o ? 100 : 0) + '%" y2="' + (o ? 0 : 100) + '%"><stop offset="0%"  stop-color=' + i.backgroundColor + '/><stop offset="0%" stop-color=' + i.backgroundColor + "/><\/linearGradient><\/defs>",
                    r;
                switch (i.shape) {
                    case "STAR":
                        r = f + 'viewBox="0 12.705 512 486.59">' + e + '<polygon style="fill: url(#' + t + "_grad" + n + ");stroke:" + i.strokeColor + ";fill-opacity:" + +i.transparency + ";stroke-width:" + i.strokeWidth + '; "points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "/><\/svg>';
                        break;
                    case "CIRCLE":
                        r = f + ">" + e + '<circle  cx="' + i.width / 2 + '" cy="' + i.height / 2 + '" r="' + i.width / 2 + '" fill="url(#' + t + "_grad" + n + ')" style="stroke:' + i.strokeColor + ";fill-opacity:" + +i.transparency + ";stroke-width:" + i.strokeWidth + ';"/><\/svg>';
                        break;
                    case "RECTANGLE":
                        r = f + ">" + e + '<rect width="' + i.width + '" height="' + i.height + '" fill="url(#' + t + "_grad" + n + ')" style="stroke:' + i.strokeColor + ";fill-opacity:" + +i.transparency + ";stroke-width:" + i.strokeWidth + ';"/><\/svg>';
                        break;
                    case "TRIANGLE":
                        r = f + ">" + e + '<polygon points="' + i.width / 2 + ",0 0," + i.height + " " + i.width + "," + i.height + '" fill="url(#' + t + "_grad" + n + ')" style="stroke:' + i.strokeColor + ";fill-opacity:" + +i.transparency + ";stroke-width:" + i.strokeWidth + ';"/><\/svg>';
                        break;
                    case "RHOMBUS":
                        r = f + ">" + e + '<polygon points="' + i.width / 2 + ",0 " + i.width + "," + i.height / 2 + " " + i.width / 2 + "," + i.height + " 0," + i.height / 2 + '" fill="url(#' + t + "_grad" + n + ')"  style="stroke:' + i.strokeColor + ";fill-opacity:" + +i.transparency + ";stroke-width:" + i.strokeWidth + ';"/><\/svg>';
                        break;
                    case "FOOD":
                        r = f + 'viewBox="0 0 50 50">' + e + '<path fill="url(#' + t + "_grad" + n + ')" style="stroke:' + i.strokeColor + ";fill-opacity:" + +i.transparency + ';"d="M45.694,21.194C45.694,9.764,36.43,0.5,25,0.5S4.306,9.764,4.306,21.194c0,8.621,5.272,16.005,12.764,19.115c-1.882,2.244-3.762,4.486-5.645,6.73c-0.429,0.5-0.458,1.602,0.243,2.145c0.7,0.551,1.757,0.252,2.139-0.289c1.878-2.592,3.753-5.189,5.63-7.783c1.774,0.494,3.633,0.777,5.561,0.777c1.85,0,3.64-0.266,5.349-0.723c1.617,2.563,3.238,5.121,4.862,7.684c0.34,0.555,1.365,0.91,2.088,0.414c0.728-0.492,0.759-1.58,0.368-2.096c-1.663-2.252-3.332-4.508-4.995-6.76C40.3,37.354,45.694,29.91,45.694,21.194z M25,37.824c-1.018,0-2.01-0.105-2.977-0.281c1.07-1.48,2.146-2.965,3.215-4.447c0.939,1.48,1.874,2.959,2.81,4.436C27.058,37.717,26.041,37.824,25,37.824z M30.155,37c-1.305-1.764-2.609-3.527-3.91-5.295c0.724-1,1.446-1.998,2.17-3c1.644,0.746,3.646,0,4.827-1.787c1.239-1.872,0.005,0,0.005,0.002c0.01-0.014,5.822-8.824,5.63-8.97c-0.186-0.15-3.804,4.771-6.387,8.081l-0.548-0.43c2.362-3.481,5.941-8.426,5.757-8.575c-0.189-0.146-3.959,4.655-6.652,7.878l-0.545-0.428c2.463-3.398,6.202-8.228,6.014-8.374c-0.188-0.15-4.115,4.528-6.917,7.67l-0.547-0.43c2.575-3.314,6.463-8.02,6.278-8.169c-0.191-0.15-5.808,6.021-7.319,7.651c-1.325,1.424-1.664,3.68-0.562,5.12c-0.703,0.84-1.41,1.678-2.113,2.518c-0.781-1.057-1.563-2.111-2.343-3.17c1.975-1.888,1.984-5.234-0.054-7.626c-2.14-2.565-6.331-5.22-8.51-3.818c-2.093,1.526-1.14,6.396,0.479,9.316c1.498,2.764,4.617,3.965,7.094,2.805c0.778,1.227,1.554,2.455,2.333,3.684c-1.492,1.783-2.984,3.561-4.478,5.342C13.197,34.826,8.38,28.574,8.38,21.191c0-9.183,7.444-16.631,16.632-16.631c9.188,0,16.625,7.447,16.625,16.631C41.63,28.576,36.816,34.828,30.155,37z"/><\/svg>';
                        break;
                    case "TWITTER":
                        r = f + 'viewBox="0 0 512 512">' + e + '<path fill="url(#' + t + "_grad" + n + ')" style="stroke:' + i.strokeColor + ";fill-opacity:" + +i.transparency + ';stroke-width:0.7px;"d="M512,97.209c-18.838,8.354-39.082,14.001-60.33,16.54c21.687-13,38.343-33.585,46.187-58.115c-20.299,12.039-42.778,20.78-66.705,25.49c-19.16-20.415-46.461-33.17-76.674-33.17c-58.011,0-105.043,47.029-105.043,105.039c0,8.233,0.929,16.25,2.72,23.939c-87.3-4.382-164.701-46.2-216.509-109.753c-9.042,15.514-14.223,33.558-14.223,52.809c0,36.444,18.544,68.596,46.73,87.433c-17.219-0.546-33.416-5.271-47.577-13.139c-0.01,0.438-0.01,0.878-0.01,1.321c0,50.894,36.209,93.348,84.261,103c-8.813,2.399-18.094,3.686-27.674,3.686c-6.769,0-13.349-0.66-19.764-1.887c13.368,41.73,52.16,72.104,98.126,72.949c-35.95,28.175-81.243,44.967-130.458,44.967c-8.479,0-16.84-0.497-25.058-1.471c46.486,29.806,101.701,47.197,161.021,47.197c193.211,0,298.868-160.062,298.868-298.872c0-4.554-0.103-9.084-0.305-13.59C480.11,136.773,497.918,118.273,512,97.209z"/><\/svg>';
                        break;
                    case "BULB":
                        r = f + 'viewBox="0 0 512 512">' + e + '<path fill="url(#' + t + "_grad" + n + ')" style="stroke:' + i.strokeColor + ";fill-opacity:" + +i.transparency + ';stroke-width:0.7px;"d="M384,192c0,64-64,127-64,192H192c0-63-64-128-64-192c0-70.688,57.313-128,128-128S384,121.313,384,192z M304,448h-96c-8.844,0-16,7.156-16,16s7.156,16,16,16h2.938c6.594,18.625,24.188,32,45.063,32s38.469-13.375,45.063-32H304c8.844,0,16-7.156,16-16S312.844,448,304,448z M304,400h-96c-8.844,0-16,7.156-16,16s7.156,16,16,16h96c8.844,0,16-7.156,16-16S312.844,400,304,400z M81.719,109.875l28.719,16.563c4.438-9.813,9.844-19,16.094-27.656L97.719,82.125L81.719,109.875z M272,33.625V0h-32v33.625C245.344,33.063,250.5,32,256,32S266.656,33.063,272,33.625z M190.438,46.438l-16.563-28.719l-27.75,16l16.656,28.813C171.438,56.281,180.625,50.875,190.438,46.438z M430.281,109.875l-16-27.75l-28.813,16.656c6.25,8.656,11.688,17.844,16.125,27.656L430.281,109.875z M365.844,33.719l-27.688-16l-16.563,28.719c9.781,4.438,19,9.844,27.625,16.063L365.844,33.719z M96,192c0-5.5,1.063-10.656,1.625-16H64v32h33.688C97.063,202.688,96,197.438,96,192z M414.375,176c0.563,5.344,1.625,10.5,1.625,16c0,5.438-1.063,10.688-1.688,16H448v-32H414.375z M388.094,286.719l26.188,15.125l16-27.719l-29.063-16.75C397.188,267.313,392.813,277.063,388.094,286.719z M81.719,274.125l16,27.719l25.969-14.969c-4.688-9.688-9.063-19.5-13.031-29.438L81.719,274.125z"/><\/svg>';
                        break;
                    case "BASKET":
                        r = f + 'viewBox="0 0 30 30">' + e + '<path fill="url(#' + t + "_grad" + n + ')" style="stroke:' + i.strokeColor + ";fill-opacity:" + +i.transparency + ';stroke-width:0.7px;"d="M28.835,9.955H7.947L5.74,1.352C5.632,0.795,5.16,0.375,4.595,0.375H1.169C0.523,0.375,0,0.922,0,1.597c0,0.673,0.523,1.22,1.169,1.22H3.7l5.312,20.71c-0.404,0.16-0.767,0.407-1.068,0.72v0.002l-0.002-0.002c-0.546,0.569-0.884,1.36-0.884,2.228c0,0.868,0.338,1.659,0.884,2.228l0.044,0.044c0.543,0.545,1.28,0.88,2.089,0.88c0.831,0,1.588-0.353,2.134-0.924c0.545-0.569,0.883-1.359,0.883-2.228c0-0.612-0.169-1.187-0.46-1.674h8.839c-0.292,0.486-0.461,1.062-0.461,1.674c0,0.868,0.338,1.659,0.884,2.228c0.544,0.57,1.301,0.924,2.133,0.924c0.831,0,1.585-0.353,2.131-0.924V28.7l0.003,0.001c0.545-0.569,0.883-1.359,0.883-2.228c0-0.617-0.172-1.198-0.467-1.686c0.57-0.08,1.008-0.592,1.008-1.208c0-0.675-0.523-1.221-1.169-1.221H11.128l-0.776-3.03h16.77c0.577,0,1.057-0.438,1.152-1.013l1.69-6.833c0.161-0.651-0.214-1.316-0.836-1.484c-0.097-0.025-0.197-0.039-0.292-0.039V9.955L28.835,9.955z M10.089,24.788c0.048,0.007,0.095,0.01,0.145,0.01V24.8h0.032c0.37,0.045,0.702,0.222,0.95,0.481c0.291,0.305,0.472,0.729,0.472,1.193c0,0.466-0.18,0.89-0.472,1.193c-0.29,0.305-0.696,0.493-1.142,0.493c-0.432,0-0.825-0.175-1.113-0.461l-0.029-0.032c-0.292-0.303-0.472-0.727-0.472-1.193c0-0.464,0.18-0.888,0.472-1.193H8.931c0.292-0.303,0.697-0.493,1.144-0.493H10.089L10.089,24.788z M23.834,24.8h0.383c0.356,0.045,0.677,0.207,0.921,0.449l0.029,0.032c0.291,0.305,0.473,0.729,0.473,1.193c0,0.466-0.182,0.89-0.473,1.193l0.001,0.002c-0.291,0.305-0.697,0.491-1.143,0.491c-0.445,0-0.85-0.188-1.142-0.493c-0.29-0.303-0.472-0.727-0.472-1.193c0-0.464,0.182-0.888,0.472-1.193C23.132,25.021,23.465,24.845,23.834,24.8L23.834,24.8z"/><\/svg>';
                        break;
                    default:
                        throw Error("No such shape as " + i.shape);
                }
                return r
            }

            function it() {
                u.css("white-space", "nowrap");
                u.css("cursor", "pointer");
                u.css("fill", i.shape)
            }

            function rt(n, t) {
                n.on("mousemove", h(t)).on("mouseenter", h(t)).on("click", ut(t)).on("mouseover", h(t)).on("hover", h(t)).on("mouseleave", v).on("mouseout", v).on("JRate.change", d).on("JRate.set", ft);
                if (i.touch) n.on("touchstart", b(t)).on("touchmove", b(t)).on("touchend", k(t)).on("tap", k(t))
            }

            function c() {
                for (var t = u.attr("id"), n = 0; n < i.count; n++) r.eq(n).find("#" + t + "_grad" + (n + 1)).find("stop").eq(0).attr({
                    offset: "0%"
                }), r.eq(n).find("#" + t + "_grad" + (n + 1)).find("stop").eq(0).attr({
                    "stop-color": i.backgroundColor
                }), r.eq(n).find("#" + t + "_grad" + (n + 1)).find("stop").eq(1).attr({
                    offset: "0%"
                }), r.eq(n).find("#" + t + "_grad" + (n + 1)).find("stop").eq(1).attr({
                    "stop-color": i.backgroundColor
                })
            }

            function e(n) {
                var v, h, f, a, e, t;
                if (c(), v = (i.max - i.min) / i.count, n = (n - i.min) / v, h = i.startColor, f = u.attr("id"), i.reverse)
                    for (t = 0; t < n; t++) a = i.count - 1 - t, r.eq(a).find("#" + f + "_grad" + (a + 1)).find("stop").eq(0).attr({
                        offset: "100%"
                    }), r.eq(a).find("#" + f + "_grad" + (a + 1)).find("stop").eq(0).attr({
                        "stop-color": h
                    }), parseInt(n) !== n && (e = Math.ceil(i.count - n) - 1, r.eq(e).find("#" + f + "_grad" + (e + 1)).find("stop").eq(0).attr({
                        offset: 100 - n * 10 % 10 * 10 + "%"
                    }), r.eq(e).find("#" + f + "_grad" + (e + 1)).find("stop").eq(0).attr({
                        "stop-color": i.backgroundColor
                    }), r.eq(e).find("#" + f + "_grad" + (e + 1)).find("stop").eq(1).attr({
                        offset: 100 - n * 10 % 10 * 10 + "%"
                    }), r.eq(e).find("#" + f + "_grad" + (e + 1)).find("stop").eq(1).attr({
                        "stop-color": h
                    })), s(o) && (h = l(i.count - 1, t));
                else
                    for (t = 0; t < n; t++) r.eq(t).find("#" + f + "_grad" + (t + 1)).find("stop").eq(0).attr({
                        offset: "100%"
                    }), r.eq(t).find("#" + f + "_grad" + (t + 1)).find("stop").eq(0).attr({
                        "stop-color": h
                    }), n * 10 % 10 > 0 && (r.eq(Math.ceil(n) - 1).find("#" + f + "_grad" + (t + 1)).find("stop").eq(0).attr({
                        offset: n * 10 % 10 * 10 + "%"
                    }), r.eq(Math.ceil(n) - 1).find("#" + f + "_grad" + (t + 1)).find("stop").eq(0).attr({
                        "stop-color": h
                    })), s(o) && (h = l(i.count, t))
            }

            function a(n) {
                var t, i;
                return t = document.createElement("canvas"), t.height = 1, t.width = 1, i = t.getContext("2d"), i.fillStyle = n, i.fillRect(0, 0, 1, 1), i.getImageData(0, 0, 1, 1).data
            }

            function v() {
                i.readOnly || (e(i.rating), d(null, {
                    rating: i.rating
                }))
            }

            function y(n) {
                var t = 1 / i.precision;
                return Math.ceil(n * t) / t
            }

            function p(n, t, u, f) {
                var s, h, c, o;
                i.readOnly || (s = r.eq(t - 1), h = i.horizontal ? (n.pageX - s.offset().left) / s.width() : (n.pageY - s.offset().top) / s.height(), c = (i.max - i.min) / i.count, h = i.reverse ? h : 1 - h, o = ((i.reverse ? i.max - i.min - t + 1 : t) - h) * c, o = i.min + Number(y(o)), o < i.minSelected && (o = i.minSelected), o <= i.max && o >= i.min && (e(o), f && (i.rating = o), s.trigger(u, {
                    rating: o
                })))
            }

            function w(n, t, u, f) {
                var c, l, s, h, a, o;
                i.readOnly || (c = n.originalEvent.changedTouches, c.length > 1) || (l = c[0], s = r.eq(t - 1), h = i.horizontal ? (l.pageX - s.offset().left) / s.width() : (l.pageY - s.offset().top) / s.height(), a = (i.max - i.min) / i.count, h = i.reverse ? h : 1 - h, o = ((i.reverse ? i.max - i.min - t + 1 : t) - h) * a, o = i.min + Number(y(o)), o < i.minSelected && (o = i.minSelected), o <= i.max && o >= i.min && (e(o), f && (i.rating = o), s.trigger(u, {
                    rating: o
                })))
            }

            function h(n) {
                return function(t) {
                    p(t, n, "JRate.change")
                }
            }

            function ut(n) {
                return function(t) {
                    p(t, n, "JRate.set", !0)
                }
            }

            function b(n) {
                return function(t) {
                    w(t, n, "JRate.touch")
                }
            }

            function k(n) {
                return function(t) {
                    w(t, n, "JRate.tap", !0)
                }
            }

            function d(n, t) {
                i.onChange && typeof i.onChange == "function" && i.onChange.apply(this, [t.rating])
            }

            function ft(n, t) {
                i.onSet && typeof i.onSet == "function" && i.onSet.apply(this, [t.rating])
            }

            function et() {
                for (var t, f, o, n = 0; n < i.count; n++) u.append(tt(n + 1));
                for (r = u.find("svg"), n = 0; n < i.count; n++) t = r.eq(n), rt(t, n + 1), i.horizontal ? t.css("margin-right", i.shapeGap || "0px") : t.css({
                    display: "block",
                    "margin-bottom": i.shapeGap || "0px"
                }), i.widthGrowth && (f = "scaleX(" + (1 + i.widthGrowth * n) + ")", t.css({
                    transform: f,
                    "-webkit-transform": f,
                    "-moz-transform": f,
                    "-ms-transform": f,
                    "-o-transform": f
                })), i.heightGrowth && (o = "scaleY(" + (1 + i.heightGrowth * n) + ")", t.css({
                    transform: o,
                    "-webkit-transform": o,
                    "-moz-transform": o,
                    "-ms-transform": o,
                    "-o-transform": o
                }));
                c();
                e(i.rating);
                r.attr({
                    width: i.width,
                    height: i.height
                })
            }
            var u = n(this),
                i = n.extend({}, {
                    rating: 0,
                    shape: "STAR",
                    count: 5,
                    width: "18",
                    height: "18",
                    widthGrowth: 0,
                    heightGrowth: 0,
                    backgroundColor: "white",
                    startColor: "yellow",
                    endColor: "green",
                    strokeColor: "black",
                    transparency: 1,
                    shapeGap: "0px",
                    opacity: 1,
                    min: 0,
                    max: 5,
                    precision: .1,
                    minSelected: 0,
                    strokeWidth: "2px",
                    horizontal: !0,
                    reverse: !1,
                    readOnly: !1,
                    touch: !0,
                    onChange: null,
                    onSet: null
                }, t),
                f, o, r, l = function(n, t) {
                    for (var u = [], e, s, r = 0; r < 3; r++) e = Math.round((f[r] - o[r]) / n), s = f[r] + e * (t + 1), u[r] = s / 256 ? (f[r] - e * (t + 1)) % 256 : (f[r] + e * (t + 1)) % 256;
                    return "rgba(" + u[0] + "," + u[1] + "," + u[2] + "," + i.opacity + ")"
                };
            return i.startColor && (f = a(i.startColor)), i.endColor && (o = a(i.endColor)), it(), et(), n.extend({}, this, {
                getRating: g,
                setRating: nt,
                setReadOnly: function(n) {
                    i.readOnly = n
                },
                isReadOnly: function() {
                    return i.readOnly
                }
            })
        }
    }(jQuery),
    function(n) {
        "use strict";
        var t = {
            init: function(t) {
                var e, u, r, f, i = this;
                n.expr[":"].icontains = function(n, t, i) {
                    return (n.textContent || n.innerText || jQuery(n).text() || "").toLowerCase().indexOf(i[3].toLowerCase()) >= 0
                };
                i.settings = n.extend({
                    filter: null,
                    clearlink: null,
                    alternate: null,
                    alternateclass: "alternate"
                }, t);
                i.items = i.children("div, li");
                r = i.settings.filter ? i.settings.filter : n("<input><\/input>", {
                    type: "text"
                }).prependTo(this);
                e = i.settings.clearlink ? i.settings.clearlink : n("<a>Clear<\/a>").insertAfter(r);
                r.change(function() {
                    f = r.val();
                    i.items.hide();
                    i.settings.alternate && i.items.removeClass(i.settings.alternateclass);
                    u = f.length < 1 ? i.items : i.items.filter(":icontains(" + f + ")");
                    i.settings.alternate && u.filter(":odd").addClass(i.settings.alternateclass);
                    u.show()
                }).on("keyup", function() {
                    r.change()
                });
                e.on("click", function() {
                    r.val("").change()
                });
                return this
            },
            refresh: function() {
                var n = this,
                    t, i, r;
                n.items = n.children("div, li");
                n.settings.alternate && (n.items.removeClass(n.settings.alternateclass), i = n.settings.filter, t = i.val(), t.length > 0 ? (r = n.items.filter(":icontains(" + t + ")"), r.filter(":odd").addClass(n.settings.alternateclass)) : n.items.filter(":odd").addClass(n.settings.alternateclass))
            }
        };
        n.fn.listfilter = function(i) {
            if (t[i]) return t[i].apply(this, Array.prototype.slice.call(arguments, 1));
            if (typeof i != "object" && i) n.error("Method " + i + " not available");
            else return t.init.apply(this, arguments)
        }
    }(jQuery)