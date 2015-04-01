function wordCount(val){
    return {
        characters : val.replace(/\s+/g, '').length,
        words : val.match(/\S+/g).length
    };
}

var div      = document.getElementById("result");
var textarea = document.getElementById("text");

function estimate(words){
    document.getElementById('estimate').innerHTML = (
    "est. $"+parseFloat(2+(words*.005)).toFixed(2)
    );
}

textarea.addEventListener("keyup", function(){

  var c = wordCount( this.value ); // Pass value as argument
  // `c` is now an object literal:

  div.innerHTML = (
      " ("+c.words+" words)"
  );
    
estimate(c.words);

}, false);


