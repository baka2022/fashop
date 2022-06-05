	$(function(){
		$(".adlistbox1 .choice-imgs ul").css("display","none");
		$(".adlistbox1 .choice-imgs ul").eq(0).css("display","block");
		$(".adlistbox2 .choice-imgs ul").css("display","none");
		$(".adlistbox2 .choice-imgs ul").eq(0).css("display","block");
		$(".adlistbox3 .choice-imgs ul").css("display","none");
		$(".adlistbox3 .choice-imgs ul").eq(0).css("display","block");
		$(".adlistbox4 .choice-imgs ul").css("display","none");
		$(".adlistbox4 .choice-imgs ul").eq(0).css("display","block");
		$(".adlistbox5 .choice-imgs ul").css("display","none");
		$(".adlistbox5 .choice-imgs ul").eq(0).css("display","block");
		$(".adlistbox6 .choice-imgs ul").css("display","none");
		$(".adlistbox6 .choice-imgs ul").eq(0).css("display","block");
		$(".adlistbox7 .choice-imgs ul").css("display","none");
		$(".adlistbox7 .choice-imgs ul").eq(0).css("display","block");
		$(".adlistbox8 .choice-imgs ul").css("display","none");
		$(".adlistbox8 .choice-imgs ul").eq(0).css("display","block");
		$(".adlistbox9 .choice-imgs ul").css("display","none");
		$(".adlistbox9 .choice-imgs ul").eq(0).css("display","block");
		
		
		//餐饮js切换效果
		$(".adlistbox1 .marks li").mouseenter(function(){
			if($(this).index() == $(".adlistbox1 .marks li").length-1){
				//空
			}else{
				$(".adlistbox1 .marks li").css("border-bottom","0px solid red");
				$(this).css("border-bottom","2px solid red");
				$(".adlistbox1 .choice-imgs ul").css("display","none");
				$(".adlistbox1 .choice-imgs ul")[$(this).index()].style.display = "block";
			}
		})
		//服饰js切换效果
		$(".adlistbox2 .marks li").mouseenter(function(){
			if($(this).index() == $(".adlistbox2 .marks li").length-1){
				//空
			}else{
				$(".adlistbox2 .marks li").css("border-bottom","0px solid red");
				$(this).css("border-bottom","2px solid red");
				$(".adlistbox2 .choice-imgs ul").css("display","none");
				$(".adlistbox2 .choice-imgs ul")[$(this).index()].style.display = "block";
			}
		})
		//娱乐js切换效果
		$(".adlistbox3 .marks li").mouseenter(function(){
			if($(this).index() == $(".adlistbox3 .marks li").length-1){
				//空
			}else{
				$(".adlistbox3 .marks li").css("border-bottom","0px solid red");
				$(this).css("border-bottom","2px solid red");
				$(".adlistbox3 .choice-imgs ul").css("display","none");
				$(".adlistbox3 .choice-imgs ul")[$(this).index()].style.display = "block";
			}
		})
		//家具js切换效果
		$(".adlistbox4 .marks li").mouseenter(function(){
			if($(this).index() == $(".adlistbox4 .marks li").length-1){
				//空
			}else{
				$(".adlistbox4 .marks li").css("border-bottom","0px solid red");
				$(this).css("border-bottom","2px solid red");
				$(".adlistbox4 .choice-imgs ul").css("display","none");
				$(".adlistbox4 .choice-imgs ul")[$(this).index()].style.display = "block";
			}
		})
		//零售js切换效果
		$(".adlistbox5 .marks li").mouseenter(function(){
			if($(this).index() == $(".adlistbox5 .marks li").length-1){
				//空
			}else{
				$(".adlistbox5 .marks li").css("border-bottom","0px solid red");
				$(this).css("border-bottom","2px solid red");
				$(".adlistbox5 .choice-imgs ul").css("display","none");
				$(".adlistbox5 .choice-imgs ul")[$(this).index()].style.display = "block";
			}
		})
		//日化js切换效果
		$(".adlistbox6 .marks li").mouseenter(function(){
			if($(this).index() == $(".adlistbox6 .marks li").length-1){
				//空
			}else{
				$(".adlistbox6 .marks li").css("border-bottom","0px solid red");
				$(this).css("border-bottom","2px solid red");
				$(".adlistbox6 .choice-imgs ul").css("display","none");
				$(".adlistbox6 .choice-imgs ul")[$(this).index()].style.display = "block";
			}
		})
		//建材js切换效果
		$(".adlistbox7 .marks li").mouseenter(function(){
			if($(this).index() == $(".adlistbox7 .marks li").length-1){
				//空
			}else{
				$(".adlistbox7 .marks li").css("border-bottom","0px solid red");
				$(this).css("border-bottom","2px solid red");
				$(".adlistbox7 .choice-imgs ul").css("display","none");
				$(".adlistbox7 .choice-imgs ul")[$(this).index()].style.display = "block";
			}
		})
		//酒店js切换效果
		$(".adlistbox8 .marks li").mouseenter(function(){
			if($(this).index() == $(".adlistbox8 .marks li").length-1){
				//空
			}else{
				$(".adlistbox8 .marks li").css("border-bottom","0px solid red");
				$(this).css("border-bottom","2px solid red");
				$(".adlistbox8 .choice-imgs ul").css("display","none");
				$(".adlistbox8 .choice-imgs ul")[$(this).index()].style.display = "block";
			}
		})
		//旅游js切换效果
		$(".adlistbox9 .marks li").mouseenter(function(){
			if($(this).index() == $(".adlistbox9 .marks li").length-1){
				//空
			}else{
				$(".adlistbox9 .marks li").css("border-bottom","0px solid red");
				$(this).css("border-bottom","2px solid red");
				$(".adlistbox9 .choice-imgs ul").css("display","none");
				$(".adlistbox9 .choice-imgs ul")[$(this).index()].style.display = "block";
			}
		})
	})
