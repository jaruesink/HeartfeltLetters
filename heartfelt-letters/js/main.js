function wordCount( val ){
    return {
        characters : val.replace(/\s+/g, '').length,
        words              : val.match(/\S+/g).length,
    };
}

var div      = document.getElementById("result");
var textarea = document.getElementById("text");

textarea.addEventListener("input", function(){

  var c = wordCount( this.value ); // Pass value as argument
  // `c` is now an object literal:

  div.innerHTML = (
      " ("+c.words+" words)"
  );

}, false);
