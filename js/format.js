$.fn.tweetify = function() {
	this.each(function() {
		$(this).html(
			$(this).html()
				.replace(/((ftp|http|https|www):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?)/gi,'<a href="$1">$1</a>')
				.replace(/(^|\s)#(\w+)/g,'$1<a href="https://search.twitter.com/search?q=%23$2">#$2</a>')
				.replace(/(^|\s)@(\w+)/g,'$1<a href="https://twitter.com/$2">@$2</a>')
				.replace(/(^|\s)&gt;&gt;(\w+)/g,'$1<p class="identifier" id="$2"><a href="#$2">>>$2</a></p>')
				.replace(/(^|\s)&gt;(.*?)(<br( )*(\/)?( )*>|\n|$)/g,'$1<span>>$2</span>$3')
				.replace(/(?:https?:)?(?:\/\/)?(?:[0-9A-Z-]+\.)?(?:youtu\.be\/|youtube(?:-nocookie)?\.com\S*?[^\w\s-])([\w-]{11})(?=[^\w-]|$)(?![?=&+%\w.-]*(?:['"][^<>]*>|<\/a>))[?=&+%\w.-]*/g, 
				'<video width="560" height="315" src="https://www.youtube.com/embed/$1" frameborder="0" allowfullscreen>')
		);
	});
	return $(this);
};

