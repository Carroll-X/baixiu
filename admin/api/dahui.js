


var xhr = new XMLHttpRequest();
xhr.open('get','./api/checkLogin.php');
xhr.send();
xhr.onreadystatechange = function(){
  if(xhr.readyState == 4 && xhr.status ==200){
    var obj = JSON.parse(xhr.responseText);
    if(obj.code != 10000){
      location.href = 'login.html';
    }
  }
}

//