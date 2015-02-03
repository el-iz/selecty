/* 
* @Author: eliz
* @Date:   2015-02-03 16:07:14
* @Last Modified by:   eliz
* @Last Modified time: 2015-02-03 16:52:36
*/

function Selecty(id) {
	var self = this;
	this.$selecty = $(id);
	this.$search = $(id).find(".selecty-search");
	this.$list = $(id).find(".selecty-wrapper");

	$(id).find(".selecty-search .selecty-search-checkbox").change(function(event) {
		var checked = $(this).prop("checked");
		$(id).find(".selecty-wrapper input").prop("checked",checked);
	});
	$(id).find(".selecty-search .selecty-search-input").keyup(function(event){
		var text = $(this).val().toLowerCase();
		$(id).find(".selecty-wrapper label").each(function(event){
			if (text == "" || $(this).text().toLowerCase().search(text) != -1)
				$(this).removeClass('hidden');
			else
				$(this).addClass('hidden');
		});
	});
}