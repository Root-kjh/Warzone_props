var casper= require('casper').create({
	pageSettings: {
		loadImages: false,
		loadPlugins: false,
		userAgent: 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.157 Safari/537.36'
}
});

casper.start().thenOpen("https://warzone.kro.kr/ROOT_Karaoke/login.html",function(){
	console.log("ROOT_Karaoke Login");
});

casper.viewport(1400, 800);

casper.then(function(){
	console.log("LOGIN");
	this.evaluate(function(){
		document.getElementById("id").value="root";
		document.getElementById("pw").value="4dminroot!";
		document.getElementById("submit").click();
});
});

casper.then(function (){
	casper.waitFor(function check(){
		open("https://warzone.kro.kr/ROOT_Karaoke/friend.php");
		console.log("Open Friend_page");
		return true;
    	}, function then() {
        	console.log('Done');
	},function timeout(){
		casper.exit();
		fail;
		
    	},3000);
});

casper.run();
