function init_DataTables() {
    if (console.log("run_datatables"), "undefined" != typeof $.fn.DataTable) {
        // console.log("init_DataTables");
        var a = function() {
            $("#datatable-buttons").length && $("#datatable-buttons").DataTable({
                dom: "Bfrtip",
                buttons: [{
                    extend: "copy",
                    className: "btn-sm"
                }, {
                    extend: "csv",
                    className: "btn-sm"
                }, {
                    extend: "excel",
                    className: "btn-sm"
                }, {
                    extend: "pdfHtml5",
                    className: "btn-sm"
                }, {
                    extend: "print",
                    className: "btn-sm"
                }],
                responsive: !0
            })
        };
        TableManageButtons = function() {
            "use strict";
            return {
                init: function() {
                    a()
                }
            }
        }(), $("#datatable").dataTable(), $("#datatable-keytable").DataTable({
            keys: !0
        }), $("#datatable-responsive").DataTable(), $("#datatable-scroller").DataTable({
            ajax: "js/datatables/json/scroller-demo.json",
            deferRender: !0,
            scrollY: 380,
            scrollCollapse: !0,
            scroller: !0
        }), $("#datatable-fixed-header").DataTable({
            fixedHeader: !0
        });
        var b = $("#datatable-checkbox");
        b.dataTable({
            order: [
                [1, "asc"]
            ],
            columnDefs: [{
                orderable: !1,
                targets: [0]
            }]
        }), b.on("draw.dt", function() {
            $("checkbox input").iCheck({
                checkboxClass: "icheckbox_flat-green"
            })
        }), TableManageButtons.init()
    }
}

var originalLeave = $.fn.popover.Constructor.prototype.leave;
$.fn.popover.Constructor.prototype.leave = function(a) {
    var c, d, b = a instanceof this.constructor ? a : $(a.currentTarget)[this.type](this.getDelegateOptions()).data("bs." + this.type);
    originalLeave.call(this, a), a.currentTarget && (c = $(a.currentTarget).siblings(".popover"), d = b.timeout, c.one("mouseenter", function() {
        clearTimeout(d), c.one("mouseleave", function() {
            $.fn.popover.Constructor.prototype.leave.call(b, b)
        })
    }))
}, 
$("body").popover({
    selector: "[data-popover]",
    trigger: "click hover",
    delay: {
        show: 50,
        hide: 400
    }
}), 
$(document).ready(function() {
     init_DataTables()
});