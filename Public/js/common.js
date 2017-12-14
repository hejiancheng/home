var localcollapse="";
	var localmenu="";
	var Language_cn={
        "sLengthMenu": "每页显示 _MENU_ 条记录",
        "sZeroRecords": "抱歉， 没有找到",
        "sInfo": "从 _START_ 到 _END_ /共 _TOTAL_ 条数据",
        "sInfoEmpty": "没有数据",
        "sInfoFiltered": "(从 _MAX_ 条数据中检索)",
        "sZeroRecords": "没有检索到数据",
         "sSearch": "搜索:",
        "oPaginate": {
        "sFirst": "首页",
        "sPrevious": "前一页",
        "sNext": "后一页",
        "sLast": "尾页"
        }};
	var date_flag={
		      showOtherMonths: true,
		      selectOtherMonths: true,
		      changeMonth: true,
		      changeYear: true,
		      showButtonPanel: true,
		      yearRange: '1900:+0',
		      maxDate:"+0d"
	};
	//解决日期控件点击今天不能自动输入今天日期的问题
	$.datepicker._gotoToday = function (id) {
	var target = $(id);
    var inst = this._getInst(target[0]);
    if (this._get(inst, 'gotoCurrent') && inst.currentDay) {
    inst.selectedDay = inst.currentDay;
    inst.drawMonth = inst.selectedMonth = inst.currentMonth;
    inst.drawYear = inst.selectedYear = inst.currentYear;
    }
    else {
    var date = new Date();
    inst.selectedDay = date.getDate();
    inst.drawMonth = inst.selectedMonth = date.getMonth();
    inst.drawYear = inst.selectedYear = date.getFullYear();
    this._setDateDatepicker(target, date);
    this._selectDate(id, this._getDateDatepicker(target));
    }
    this._notifyChange(inst);
    this._adjustDate(target);
    }
	function isempty(str){
		if (str == null || str == undefined || str == '') { 
			return true; 
		}
		else{
			return false;
		}
	}
	function count(o){
	　　var t = typeof o;
	　　if(t == 'string'){
	　　　　return o.length;
	　　}else if(t == 'object'){
	　　　　var n = 0;
	　　　　　　for(var i in o){
	　　　　　　n++;
	　　　　}
	　　　　return n;
	　　}
	　　return false;
	}
	function sum(value){
		var sum=0;
		for(var i=0;i<count(value);i++){
			if(!isempty(value[i])){
				sum+=parseFloat(value[i]);
			}
		}
		return sum;
	}
	function compareDate(d1,d2)
	{
		var date1 = new Date(Date.parse(d1.replace(/-/g, "/")));
        var date2 = new Date(Date.parse(d2.replace(/-/g, "/")));
		if(date1 > date2) return false;
		return true;
	}
	jQuery.validator.methods.compareDate = function(value, element, param) {
		if(isempty(value)){
			return true;
		}
		var startDate = jQuery(param).val();
		var date1 = new Date(Date.parse(startDate.replace(/-/g, "/")));
        var date2 = new Date(Date.parse(value.replace(/-/g, "/")));
        return date1 <= date2;
    };
	jQuery.validator.methods.compareNumber = function(value, element, param) {
    	var startNumber = jQuery(param).val();
        return startNumber <= value;
    };
	function setleftmenu(){
		if(localcollapse!=""){
			var collapse=document.getElementById(localcollapse);
			if(collapse!=null){
				collapse.setAttribute("class", "panel-collapse collapse in");
				localcollapse="";
			}
		}
		if(localmenu!=""){
			var menu=document.getElementById(localmenu);
			if(menu!=null){
				menu.setAttribute("class", "panel-body bg-info");
				localmenu="";
			}
		}
	}
	function clear_tree(treeObj){
		
		var nodes = treeObj.getCheckedNodes(true);
		if(nodes!=null){
			for (var i=0, l=nodes.length; i<l; i++) {
				treeObj.checkNode(nodes[i], false, true);
			}
		}
	}
	
	jQuery(function($){ 
	     $.datepicker.regional['zh-CN'] = { 
	        clearText: '清除', 
	        clearStatus: '清除已选日期', 
	        closeText: '关闭', 
	        closeStatus: '不改变当前选择', 
	        prevText: '<上月', 
	        prevStatus: '显示上月', 
	        prevBigText: '<<', 
	        prevBigStatus: '显示上一年', 
	        nextText: '下月>', 
	        nextStatus: '显示下月', 
	        nextBigText: '>>', 
	        nextBigStatus: '显示下一年', 
	        currentText: '今天', 
	        currentStatus: '显示本月', 
	        monthNames: ['一月','二月','三月','四月','五月','六月', '七月','八月','九月','十月','十一月','十二月'], 
	        monthNamesShort: ['一','二','三','四','五','六', '七','八','九','十','十一','十二'], 
	        monthStatus: '选择月份', 
	        yearStatus: '选择年份', 
	        weekHeader: '周', 
	        weekStatus: '年内周次', 
	        dayNames: ['星期日','星期一','星期二','星期三','星期四','星期五','星期六'], 
	        dayNamesShort: ['周日','周一','周二','周三','周四','周五','周六'], 
	        dayNamesMin: ['日','一','二','三','四','五','六'], 
	        dayStatus: '设置 DD 为一周起始', 
	        dateStatus: '选择 m月 d日, DD', 
	        dateFormat: 'yy-mm-dd', 
	        firstDay: 1, 
	        initStatus: '请选择日期', 
	        isRTL: false}; 
	        $.datepicker.setDefaults($.datepicker.regional['zh-CN']); 
	    });
	
	function clearForm(form){
		$(':input', form).each(function() {
		    var type = this.type;
		    var tag = this.tagName.toLowerCase(); // normalize case
		    // it's ok to reset the value attr of text inputs,
		    // password inputs, and textareas
		    if (type == 'text' || type == 'password' || tag == 'textarea')
		      this.value = "";
		    // checkboxes and radios need to have their checked state cleared
		    // but should *not* have their 'value' changed
		    else if (type == 'checkbox' || type == 'radio')
		      this.checked = false;
		    // select elements need to have their 'selectedIndex' property set to -1
		    // (this works for both single and multiple select elements)
		    else if (tag == 'select')
		      this.value = "";
		  });
	}
	
	function getElementsByClassName(n) {
	    var classElements = [],allElements = document.getElementsByTagName('*');
	    for (var i=0; i< allElements.length; i++ )
	   {
	       if (allElements[i].className.indexOf(n) >= 0 ) {
	           classElements[classElements.length] = allElements[i];
	        }
	   }
	   return classElements;
	}
	//获取账户信息 end
	//去空格函数
　　 	function trim(str){ //删除左右两端的空格  
　　    		return str.replace(/(^\s*)|(\s*$)/g, "");  
　　 	}  
　　 	function ltrim(str){ //删除左边的空格  
　　     	return str.replace(/(^\s*)/g,"");  
　　 	}  
　　 	function rtrim(str){ //删除右边的空格  
　　    		return str.replace(/(\s*$)/g,"");  
　　 	} 
　　 	
　　 	$(document).ready(function() {
　　 		$('#AlertMessage').dialog({
　　 			autoOpen: false,
　　 			width: 300,
　　 			modal: true,
　　 			buttons: {
　　 				"确定": function() {
　　 					$(this).dialog("close");
　　 				}
　　 			}
　　 		});
　　 		$('#ConfirmMessage').dialog({
　　 			autoOpen: false,
　　 			width: 300,
　　 			modal: true,
　　 			buttons: {
　　 				"确定": function() {
　　 					$(this).dialog('close');
　　 					mDialogCallback(true);
　　 				},
　　 				"取消": function() {
　　 					$(this).dialog('close');
　　 					mDialogCallback(false);
　　 				}
　　 			}
　　 		});
　　 	});
　　 	var mDialogCallback;
　　 	function ShowMsg(msg, callback) {
　　 		if (callback == null) {
　　 			$('#AlertMessageBody').html(msg);
　　 			$('#AlertMessage').dialog('open');
　　 		}
　　 		else {
　　 			mDialogCallback = callback;
　　 			$('#ConfirmMessageBody').html(msg);
　　 			$('#ConfirmMessage').dialog('open');
　　 		}
　　 	};
　　 	
　　 	(function( $ ) {
　　 	    $.widget( "custom.combobox", {
　　 	      _create: function() {
　　 	        this.wrapper = $( "<span>" )
　　 	          .addClass( "custom-combobox" )
　　 	          .insertAfter( this.element );
　　 	        this.element.hide();
　　 	        this._createAutocomplete();
　　 	        this._createShowAllButton();
　　 	      },
　　 	 
　　 	      _createAutocomplete: function() {
　　 	        var selected = this.element.children( ":selected" ),
　　 	          value = selected.val() ? selected.text() : "";
　　 	        this.input = $( "<input>" )
　　 	          .appendTo(this.wrapper)
　　 	          .val(value)
　　 	          .attr("title", "")
   	          .attr("name", this.element.attr("name"))
　　 	          .addClass("custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left")
　　 	          .autocomplete({
　　 	            delay: 0,
　　 	            minLength: 0,
　　 	         	scrollHeight:200,
　　 	            source: $.proxy( this, "_source" )
　　 	          })
　　 	          .tooltip({
　　 	            tooltipClass: "ui-state-highlight"
　　 	          });
　　 	        this._on( this.input, {
　　 	          autocompleteselect: function( event, ui ) {
　　 	            //设置选中项
　　 	        	  ui.item.option.selected=true;
　　 	            //触发select的"select"事件
　　 	            this.element.trigger( "select", event, {
　　 	              item: ui.item.option
　　 	            });
　　 	          },
　　 	          autocompletechange: "_removeIfInvalid" 
　　 	        });
　　 	      }, 
   	      
　　 	      _createShowAllButton: function() {
　　 	        var input = this.input,
　　 	    	  a=this.a,
　　 	          wasOpen = false;
　　 	 
　　 	        this.a=$( "<a>" )
　　 	          .attr( "tabIndex", -1 )
　　 	          .attr( "title", "Show All Items" )
　　 	          .tooltip()
　　 	          .appendTo( this.wrapper )
　　 	          .button({
　　 	            icons: {
　　 	              primary: "ui-icon-triangle-1-s"
　　 	            },
　　 	            text: false
　　 	          })
　　 	          .removeClass( "ui-corner-all" )
　　 	          .addClass( "custom-combobox-toggle ui-corner-right" )
　　 	          .mousedown(function() {
　　 	            wasOpen = input.autocomplete( "widget" ).is( ":visible" );
　　 	          })
　　 	          .click(function() {
　　 	            input.focus();
　　 	 
　　 	            // Close if already visible
　　 	            if ( wasOpen ) {
　　 	              return;
　　 	            }
　　 	 
　　 	            // Pass empty string as value to search for, displaying all results
　　 	            input.autocomplete( "search", "" );
　　 	          });
　　 	      },
　　 	 
　　 	      _source: function( request, response ) {
　　 	        var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
　　 	        response( this.element.children( "option" ).map(function() {
　　 	          var text = trim($( this ).text());
　　 	          var classname= this.className;
　　 	          if ( this.value && ( !request.term || matcher.test(classname) || matcher.test(text)) )
　　 	            return {
　　 	              label: text,
　　 	              value: text,
　　 	           //classname: name,//增加分类显示的
　　 	              option: this
　　 	            };
　　 	        }) );
　　 	      },
　　 	 
　　 	      _removeIfInvalid: function( event, ui ) {
　　 	 
　　 	        // Selected an item, nothing to do
　　 	        if ( ui.item ) {
　　 	          return;
　　 	        }
　　 	 
　　 	        // Search for a match (case-insensitive)
　　 	        var value = this.input.val(),
　　 	          valueLowerCase = value.toLowerCase(),
　　 	          valid = false;
　　 	        this.element.children( "option" ).each(function() {　　 	        	
　　 	          if ( $( this ).text().toLowerCase() === valueLowerCase ) {
　　 	            this.selected = valid = true;
　　 	            return false;
　　 	          }
　　 	        });　　 	 
　　 	        // Found a match, nothing to do
　　 	        if ( valid ) {
　　 	        	return;
　　 	        }
　　 	 
　　 	        // Remove invalid value
　　 	        this.input
　　 	          .val( "" )
　　 	          .attr( "title", value + " didn't match any item" )
　　 	          .tooltip( "open" );
　　 	        this.element.val( "" );
　　 	        this._delay(function() {
　　 	          this.input.tooltip( "close" ).attr( "title", "" );
　　 	        }, 2500 );
　　 	        this.input.autocomplete( "instance" ).term = "";
　　 	      },
　　 	 
　　 	      _destroy: function() {
　　 	        this.wrapper.remove();
　　 	        this.element.show();
　　 	      },
　　 	    //禁止combobox  
　　 	    disable: function() {
　　 	       	this.input.prop('disabled',true);
　　 	    	this.input.autocomplete("disable");
　　 	   		this.a.button("disable");
	　　 	},
	   	//使能combobox
	　　 	enable: function() {
	　　 	    this.input.prop('disabled',false);
	　　 	    this.input.autocomplete("enable");
	　　 	    this.a.button("enable");
	　　 	},
	   	//设置或获取combobox的value
	   	value:function(value){
	   		if(value==null | value==""){
	   			return this.input.val();
	   		}
	   		else{
	   			this.input.val(value);
	   		}
	   	}
　　 	    });
　　 	})( jQuery );	