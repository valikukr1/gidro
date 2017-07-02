function trim(str) {
            var str = str.replace(/^\s+|\s+$/g,"");
          return str;
        }
       function ValidCaptcha(a,b){
           var a = trim(a);
           if (a == b){
               return true;   
           }
          return false;
       }
       function checkform(theform, b){
            var why = "";
          var a = theform.input.value;
            if(a == ""){
                why += "Security code should not be empty.\n";
            }
            if(a != ""){
                if(!ValidCaptcha(a, b)){
                    why += "Security code did not match.\n";
                }
            }
            if(why != ""){
                alert(why);
                return false;
            }
        }
    var a = Math.ceil(Math.random() * 9);
    var b = Math.ceil(Math.random() * 9);
    var code = a + b;