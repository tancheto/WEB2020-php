function onSubmit(){
  
  url = "./ajax-handler.php";
	
  var callback = function (text) {
  console.log(text);
  };

  let username = document.getElementById("username").value;
  let pass = document.getElementById("pass").value;
  let pass2 = document.getElementById("pass2").value;

  let obj = { "username": username, 
              "pass": pass , 
		      "pass2": pass2 };

  let jsonToBeSent = JSON.stringify(obj);
	
  ajax(url, { success: callback, 
              data: jsonToBeSent });			  
};

function ajax(url, settings){
  var xhr = new XMLHttpRequest();
  xhr.onload = function(){
    if (xhr.status == 200) {
      settings.success(xhr.response);
    } else {
      console.error(xhr.response);
    }
  };
   
  xhr.open("POST", url, /* async */ true);
  xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
  xhr.send(settings.data);  
}