function validateForm(){$("#modalForm").validate({rules:{txt_pwd:{required:!0,rangelength:[6,16]},txt_email:{required:!0,autoEmail:!0}},messages:{txt_pwd:{required:"\u5bc6\u7801\u4e0d\u80fd\u4e3a\u7a7a",rangelength:"\u5bc6\u7801\u4e0d\u6b63\u786e",remote:"\u5bc6\u7801\u4e0d\u6b63\u786e"},txt_email:{required:"\u90ae\u7bb1\u4e0d\u80fd\u4e3a\u7a7a",autoEmail:"\u90ae\u7bb1\u683c\u5f0f\u4e0d\u6b63\u786e",remote:"\u8be5\u90ae\u7bb1\u5df2\u7ecf\u6ce8\u518c"}},highlight:function(e){$(e).parent().addClass("status-error")},unhighlight:function(e){$(e).parent().removeClass("status-error")},errorPlacement:function(e,t){$(t).parent().find(".help-block").empty().append(e)}})}$.validator.addMethod("autoEmail",function(e){var t=/^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,4}$/i.test(e);return t}),$(function(){validateForm()});