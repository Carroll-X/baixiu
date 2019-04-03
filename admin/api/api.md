## 判断登录账号和密码是否正确的接口
type: post
url: api/doLogin.php
data:
    email：邮箱
    password:密码

响应体：
    JSON

    { "code":10000, "msg":"ok" }
    或者
    { "code":10001, "msg":"fail" }


## 判断有没有登录的接口
type:get
url: api/checkLogin.php
data:没有
响应体：
    JSON

    { "code":10000, "msg":"ok" }
    或者
    { "code":10001, "msg":"fail" }


## 获取当前登录的用户信息接口
type:get
url:api/doUserInfo.php
data:没有
响应体：
    JSON
    { "id":1,"slug":"admin",...... }


## 获取网站统计数据的接口
type:get
url:api/doTongJi.php
data:没有
响应体：
    JSON
    {wenzhang:700  caogao:210  fenlei:4  pinglun:400  daishenhe:83}


## 获取分页评论数据的接口
type:get
url:api/getComments.php
data:
    pageIndex: 页码
    pageSize: 页容量

响应体：
    JSON
    {
        data:[
            {},
            {},
            {}
        ],
        totalPages:43
    }


## 修改评论状态的接口
type:post
url:api/editComments.php
data:
    status：告诉我要修改成什么状态
    ids： 告诉我要修改成哪些数据
            如果单行值传一个id，如果多行，就传多个id
            ids的取值要么是 “3" 这样的，要么就是 "3,9,10,11"这样的

响应体：
    JSON
    
    { "code":10000, "msg":"ok" }
    或者
    { "code":10001, "msg":"fail" }


## 获得文章的接口
type:get
url: api/getPosts.php
data:
    pageIndex:页码
    pageSize:页容量
    category:要筛选的分类
    status:要筛选的状态

响应体：
    JSON
    {
        data:[ {},{} ],
        totalPages:76
    }


## 获得所有分类的接口
type:get
url:api/getCategory.php
data:无
响应体：
    JSON
    [{},{},{},{}]



## 文章页操作软删除接口 
type:'post'
url:'api/getPostsDelete.php'
data:   
    ids:ids;
响应体：
    JSON
        
    { "code":10000, "msg":"ok" }
    或者
    { "code":10001, "msg":"fail" }


## 新增文章的接口
type:post
url:api/addPosts.php
data:
​    title
​    content
​    slug
​    created
​    category
​    status
    feature
响应体：
​    JSON
​    { "code":10000, "msg":"ok" }
​    或者
​    { "code":10001, "msg":"fail" }


## 获取 想要编辑行的信息
type:'get',
url:'api/getPostsCompile.php',
data:{
    id:id
}
响应体：
    JSON

    [{}]



## 修改文章的接口
type:post
url:api/getPostschange.php
data:
    postID
​    title
​    content
​    slug
​    created
​    category
​    status
    feature
响应体：
​    JSON
​    { "code":10000, "msg":"ok" }
​    或者
​    { "code":10001, "msg":"fail" }



## 获取用户数据的接口用 api/doUserInfo.php;
type:'get',
url:'api/doUserInfo.php'
data :无,
响应体:
    JSON


## 个人中心更新的接口
type:'post',
url:'api/getUpdatePro.php',
data:
    fm,
响应体:
    JSON
    ​{ "code":10000, "msg":"ok" }
​    或者
​    { "code":10001, "msg":"fail" }

## 修改密码的接口
type:'post',
url:'api/getUpdatePwd.php',
data:{
    old: old,
    password: password
}
响应体:
    JSON


## 添加分类目录的接口
type:'post',
url:api/getCategories.php
data:
    slug:slug,
    name:name
响应体:
    JSON
    { "code":10000, "msg":"ok" }
​    或者
​    { "code":10001, "msg":"fail" }

## 分类目录删除操作的接口
type:'psot',
url:'api/DeleteCategories.php',
data:{id:id},
    响应体:
    JSON:
    { "code":10000, "msg":"ok" }
​    或者
​    { "code":10001, "msg":"fail" }

## 修改分类的接口
type:post
url:api/editCategory.php
data:
​    name：分类名
​    slug：别名
​    id: 要修改的分类的id
响应体：
​    JSON
​    { "code":10000, "msg":"ok" }
​    或者
​    { "code":10001, "msg":"fail" }


## 获取所有用户信息的接口
type:'get',
url:'api/getUser.php'
data :无,
响应体:
    JSON

## 获取所有轮播图的接口
type:'get',
url:'api/getSliders.php',
data :无,
响应体:
    JSON

##添加轮播图的接口
type:'post',
url:'api/addSliders.php'
data:fm
响应体:
    JSON
​    { "code":10000, "msg":"ok" }
​    或者
​    { "code":10001, "msg":"fail" }

##删除轮播图的接口
type:'post',
url:'api/DelSliders.php',
data:{id:id},
响应体:
    JSON
​    { "code":10000, "msg":"ok" }
​    或者
​    { "code":10001, "msg":"fail" }

##点赞的接口;
type:'post',
url:'admin/api/addLike.php'
data:{
    id:id
     },
响应体:
    JSON



## 获取需要编辑文章信息的接口
type:'get',
url:'api/updatePost.php',
data:{
    id:id
},
响应体:
    JSON
