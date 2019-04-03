<?php 
//<!-- 文章详情 -->
//导入sql文件
require_once 'admin/api/tools/doSql.php';
$id = $_GET['id'];
//准备sql语句
$sql = "select c.name,p.title,u.nickname,p.created,p.views,p.content 
            from posts p
            inner join categories c
            on p.category_id = c.id
            inner join users u
            on p.user_id = u.id
          where p.id = $id ";
$data = my_select($sql)[0];

//<!-- 评论数量 -->
$sql = "select * from comments where post_id = $id and status = 'approved'";
$commentCount = count(my_select($sql));

//刷新页面阅读加一;
$views = $data['views'] + 1;

$sql = "update posts set views='$views' where id = $id";

$res = my_zsg($sql);

?>

<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>阿里百秀-发现生活，发现美!</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.css">
</head>

<body>
    <div class="wrapper">
        <div class="topnav">
            <?php 
            //<!-- 6.分类 左边导航栏  -->
            $sql = "select * from categories";
            $FenLei = my_select($sql);
            $FaClass = array('fa-glass', 'fa-phone', 'fa-fire', 'fa-gift')
            ?>
            <ul>
                <!--  -->
                <?php foreach ($FenLei as $key => $value) : ?>
                <li><a href="list.php?id=<?php echo $value['id']; ?>&name=<?php echo $value['name'] ?>"><i class="fa <?php echo $FaClass[$key] ?>"></i><?php echo $value['name'] ?></a></li>
                <?php endforeach; ?>
                <!--  -->
            </ul>
        </div>
        <div class="header">
            <h1 class="logo"><a href="index.html"><img src="assets/img/logo.png" alt=""></a></h1>
            <ul class="nav">
                <!--  -->
                <?php foreach ($FenLei as $key => $value) : ?>
                <li><a href="list.php?id=<?php echo $value['id']; ?>&name=<?php echo $value['name'] ?>"><i class="fa <?php echo $FaClass[$key] ?>"></i><?php echo $value['name'] ?></a></li>
                <?php endforeach; ?>
                <!--  -->
            </ul>
            <div class="search">
                <form>
                    <input type="text" class="keys" placeholder="输入关键字">
                    <input type="submit" class="btn" value="搜索">
                </form>
            </div>
            <div class="slink">
                <a href="javascript:;">链接01</a> | <a href="javascript:;">链接02</a>
            </div>
        </div>
        <div class="aside">
            <div class="widgets">
                <h4>搜索</h4>
                <div class="body search">
                    <form>
                        <input type="text" class="keys" placeholder="输入关键字">
                        <input type="submit" class="btn" value="搜索">
                    </form>
                </div>
            </div>
            <div class="widgets">
                <h4>随机推荐</h4>
                <ul class="body random">
                    <?php 
                    //<!-- 2.将随机推荐随机渲染到页面 -->
                    //准备sql语句;
                    $sql = "select  id,title,feature,views from posts 
                        where status = 'published'
                        order by rand()
                    limit 5";
                    //执行sql语句;
                    $randPost = my_select($sql);

                    foreach ($randPost as $value) :
                      ?>
                    <li>
                        <a href="detail.php?id=<?php echo $value['id']; ?>">
                            <p class="title"><?php echo $value['title']; ?></p>
                            <p class="reading">阅读(<?php echo $value['views']; ?>)</p>
                            <div class="pic">
                                <img src="<?php echo $value['feature']; ?>" alt="">
                            </div>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="widgets">
                <h4>最新评论</h4>
                <ul class="body discuz">
                    <li>
                        <a href="javascript:;">
                            <div class="avatar">
                                <img src="uploads/avatar_1.jpg" alt="">
                            </div>
                            <div class="txt">
                                <p>
                                    <span>鲜活</span>9个月前(08-14)说:
                                </p>
                                <p>挺会玩的</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <div class="avatar">
                                <img src="uploads/avatar_1.jpg" alt="">
                            </div>
                            <div class="txt">
                                <p>
                                    <span>鲜活</span>9个月前(08-14)说:
                                </p>
                                <p>挺会玩的</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <div class="avatar">
                                <img src="uploads/avatar_2.jpg" alt="">
                            </div>
                            <div class="txt">
                                <p>
                                    <span>鲜活</span>9个月前(08-14)说:
                                </p>
                                <p>挺会玩的</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <div class="avatar">
                                <img src="uploads/avatar_1.jpg" alt="">
                            </div>
                            <div class="txt">
                                <p>
                                    <span>鲜活</span>9个月前(08-14)说:
                                </p>
                                <p>挺会玩的</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <div class="avatar">
                                <img src="uploads/avatar_2.jpg" alt="">
                            </div>
                            <div class="txt">
                                <p>
                                    <span>鲜活</span>9个月前(08-14)说:
                                </p>
                                <p>挺会玩的</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <div class="avatar">
                                <img src="uploads/avatar_1.jpg" alt="">
                            </div>
                            <div class="txt">
                                <p>
                                    <span>鲜活</span>9个月前(08-14)说:
                                </p>
                                <p>挺会玩的</p>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="content">
            <div class="article">
                <div class="breadcrumb">
                    <dl>
                        <dt>当前位置：</dt>
                        <dd><a href="javascript:;"><?php echo $data['name'] ?></a></dd>
                        <dd><?php echo $data['title'] ?></dd>
                    </dl>
                </div>
                <h2 class="title">
                    <a href="javascript:;"><?php echo $data['title'] ?></a>
                </h2>
                <div class="meta">
                    <span><?php echo $data['nickname'] ?> 发布于 <?php echo $data['created'] ?></span>
                    <span>分类: <a href="javascript:;"><?php echo $data['name'] ?></a></span>
                    <span>阅读: (<?php echo $views; ?>)</span>
                    <span>评论: (<?php echo  $commentCount ?>)</span>
                </div>
                <div>
                    <?php echo $data['content'] ?>
                </div>
            </div>
            <div class="panel hots">
                <?php 
                // <!-- 4.一周热门排行 -->// <!-- 热门推荐 -->
                $sql = "select  id,title,views,likes,feature from posts 
                                where status = 'published'
                                order by views desc
                                limit 5";
                //执行sql语句;
                $viewsList = my_select($sql);
                ?>
                <h3>热门推荐</h3>
                <ul>
                    <?php for ($i = 0; $i < 4; $i++) : ?>
                    <li>
                        <a href="detail.php?id=<?php echo $viewsList[$i]['id'] ?>">
                            <img src="<?php echo $viewsList[$i]['feature']; ?>" alt="">
                            <span><?php echo $viewsList[$i]['title']; ?></span>
                        </a>
                    </li>
                    <?php endfor; ?>

                </ul>
            </div>
        </div>
        <div class="footer">
            <p>© 2016 XIU主题演示 本站主题由 themebetter 提供</p>
        </div>
    </div>
</body>

</html> 