CE.ready(function(){
	var tab = document.getElementById('user-tab');
	var tabLi = tab.getElementsByTagName('li');
	var tabLiFirst = tabLi[0];




	//获取当前的li
	var currentLi = tabLiFirst;
	CE.addClass(currentLi,'tab-active');
	//显示当前tab
	var disTabDiv = function(cur){
		var currentTabDiv = document.getElementById(CE.getAttr(cur,'bind-tab-id'));
		CE.addClass(currentTabDiv,'dis');
	}
	//隐藏当前tab
	var hideTabDiv = function(cur){
		var currentTabDiv = document.getElementById(CE.getAttr(cur,'bind-tab-id'));
		CE.removeClass(currentTabDiv,'dis');
	}

	disTabDiv(currentLi);
	

	CE.each(tabLi,function(i,li){
		CE.bindEvent(li,'click',function(){
			CE.removeClass(currentLi,'tab-active');
			hideTabDiv(currentLi);

			currentLi = li;
			
			CE.addClass(currentLi,'tab-active');
			disTabDiv(currentLi);
		});
	})



})