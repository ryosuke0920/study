!function(){
	class Hoge {
		main(){
			console.log("test.");
			fetch('promise.json');
		}
	}
	(new Hoge()).main();	
}();
