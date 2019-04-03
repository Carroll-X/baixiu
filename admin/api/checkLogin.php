 <?php
  //开始session;
  session_start();
  //判断是否是登录成功进入该页面;
  //如果是登录成功 session的值非null;
  //如果不是通过登录成功进入 则session为null 则打回登录页面
  //  isset(session的值为null)则==false;  !isset(session的值为null)则==true;


  // 返回是否登录成功
  // 再由ajax判断返回的数据来  
  // 判断用户是否是通过登录进入的页面 
  // 如果不是就打回登录页面;
  if(isset($_SESSION['info'])){  
    echo '{ "code":10000,"msg":"ok"}';
  }else{
    echo '{ "code":10001,"msg":"fail"}';
  }
?> 