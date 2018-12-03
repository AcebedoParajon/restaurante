var tam = [0, 0];
  if (typeof window.innerWidth != 'undefined')
  {
    tam = [window.innerWidth,window.innerHeight];
  }
  else if (typeof document.documentElement != 'undefined'
      && typeof document.documentElement.clientWidth !=
      'undefined' && document.documentElement.clientWidth != 0)
  {
    tam = [
        document.documentElement.clientWidth,
        document.documentElement.clientHeight
    ];
  }
  else   {
    tam = [
        document.getElementsByTagName('body')[0].clientWidth,
        document.getElementsByTagName('body')[0].clientHeight
    ];
}

divs = $("#menu1 .col-md-6").toArray().length;
$(document).ready(function(){
	console.log(tam);
	if (tam[0] < 800 && divs > 10){
			for (var i = 11; i < divs; i++) {
				$("#menu1 .row:nth-child(n+"+i+")").addClass("hidden-xs");
			}
		$("#vermas").removeClass("hidden hidden-xs");
	}
})

function vermas(){
	$("#vermas").addClass("hidden");
		for (var i = 11; i < divs; i++) {
			$("#menu1 .row:nth-child(n+"+i+")").removeClass("hidden-xs");
		}
	$("#vermenos").removeClass("hidden hidden-xs")
}

function vermenos(){
	$("#vermenos").addClass("hidden");
	for (var i = 11; i < divs; i++) {
		$("#menu1 .row:nth-child(n+"+i+")").addClass("hidden-xs");
	}
	$("#vermas").removeClass("hidden hidden-xs")
}