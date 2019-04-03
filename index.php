<!--  -->
<?php
  //<!-- 1.将轮播图渲染到页面 -->
//导入sql文件;
require_once 'admin/api/tools/doSql.php';
//准备sql语句;
$sql = "select * from sliders";
//执行sql语句;
$slidersList = my_select($sql);


//<!-- 3.焦点关注  -->
$sql = "select  id,title,feature from posts 
            where status = 'published'
            order by id desc
          limit 5";
//执行sql语句;
$jiaoDianPost = my_select($sql);


// <!-- 4.一周热门排行 -->// <!-- 热门推荐 -->
$sql = "select  id,title,views,likes,feature from posts 
             where status = 'published'
             order by views desc
           limit 5";
//执行sql语句;
$viewsList = my_select($sql);
// <!-- 5.最新发布 -->
$sql = " select p.id,c.name,p.title,u.nickname,p.created,p.content,p.views,p.likes,p.feature
                    from posts p
                    inner join categories c
                    on p.category_id = c.id
                    inner join users u
                    on p.user_id = u.id
                  order by p.id desc
                  limit 3";
$newList = my_select($sql);


?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>阿里百秀-发现生活，发现美!</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.css">
    <style>
        .swipe-wrapper li img {
            height: 273px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="topnav">
            <?php 
            //<!-- 6.分类 左边导航栏  -->
            $sql = "select * from categories";
            $FenLei = my_select($sql);
            $FaClass = array('fa-glass','fa-phone','fa-fire','fa-gift')
            ?>
            <ul>
              <!--  -->
                <?php foreach ($FenLei as $key => $value) : ?>
                <li><a href="list.php?id=<?php echo $value['id'];?>&name=<?php echo $value['name']?>"><i class="fa <?php echo $FaClass[$key] ?>"></i><?php echo $value['name'] ?></a></li>
                <?php endforeach; ?>
              <!--  -->
            </ul>
        </div>
        <div class="header">
            <h1 class="logo"><a href="index.html"><img src="assets/img/logo.png" alt=""></a></h1>
            <ul class="nav">
              <!--  -->
                <?php foreach ($FenLei as $key => $value) : ?>
                <li><a href="list.php?id=<?php echo $value['id'];?>&name=<?php echo $value['name']?>"><i class="fa <?php echo $FaClass[$key] ?>"></i><?php echo $value['name'] ?></a></li>
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
            <div class="swipe">
                <ul class="swipe-wrapper">
                    <!-- 循环遍历数组 获取轮播图的数据 -->
                    <?php foreach ($slidersList as $value) : ?>
                    <li>
                        <a href="<?php echo $value['link'] ?>">
                            <img src="<?php echo $value['image'] ?>">
                            <span><?php echo $value['text'] ?></span>
                        </a>
                    </li>
                    <?php endforeach; ?>
                    <!--  -->
                </ul>
                <p class="cursor">
                    <!-- 循环生成页码 -->
                    <?php foreach ($slidersList as $key => $value) : ?>
                    <!-- 判断渲染页面时  -->
                    <!-- 如果页码为1下标为0时高亮 -->
                    <?php if ($key == 0) : ?>
                    <span class="active"></span>
                    <?php else : ?>
                    <span></span>
                    <?php endif; ?>
                    <!--  -->
                    <?php endforeach; ?>
                    <!--  -->
                </p>
                <a href="javascript:;" class="arrow prev"><i class="fa fa-chevron-left"></i></a>
                <a href="javascript:;" class="arrow next"><i class="fa fa-chevron-right"></i></a>
            </div>
            <div class="panel focus">
                <h3>焦点关注</h3>
                <ul>
                    <!-- 3.焦点关注 -->
                    <?php foreach ($jiaoDianPost as $key => $value) : ?>
                    <!-- 判断   样式 -->
                    <?php if ($key == 0) : ?>
                    <li class="large">
                        <?php else : ?>
                    <li>
                        <?php endif; ?>
                        <!--  -->
                        <a href="detail.php?id=<?php echo $value['id'] ?>">
                            <img src="<?php echo $value['feature'] ?>" alt="">
                            <span><?php echo $value['title'] ?></span>
                        </a>
                    </li>
                    <?php endforeach; ?>
                    <!--  -->
                </ul>
            </div>
            <div class="panel top">
                <h3>一周热门排行</h3>
                <ol>
                    <?php foreach ($viewsList as $key => $value) : ?>
                    <li>
                        <i><?php echo $key + 1 ?></i>
                        <a href="detail.php?id=<?php echo $value['id'] ?>"><?php echo $value['title']; ?></a>
                        <a href="javascript:" postid='<?php echo $value['id'] ?>' class="like">赞(<?php echo $value['likes']; ?>)</a>
                        <span>阅读 (<?php echo $value['views']; ?>)</span>
                    </li>
                    <?php endforeach; ?>
                </ol>
            </div>
            <div class="panel hots">

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
            <div class="panel new">
                <h3>最新发布</h3>
                <?php


                foreach ($newList as $value) :
                  //等同 commens中的post_id;
                  $id = $value['id'];
                  //评论的数量
                  $sql = "select * from comments where post_id = $id and status = 'approved'";
                  $count = count(my_select($sql));
                  ?>
                <div class="entry">
                    <div class="head">
                        <span class="sort"><?php echo $value['name'] ?></span>
                        <a href="detail.php?id=<?php echo $value['id'] ?>"><?php echo $value['title'] ?></a>
                    </div>
                    <div class="main">
                        <p class="info"><?php echo $value['nickname'] ?> 发表于 <?php echo $value['created'] ?></p>
                        <p class="brief"><?php echo $value['content'] ?></p>
                        <p class="extra">
                            <span class="reading">阅读(<?php echo $value['views'] ?>)</span>
                            <span class="comment">评论(<?php echo $count ?>)</span>
                            <a href="javascript:;" postid=<?php echo $value['id'] ?> class="like">
                                <i class="fa fa-thumbs-up"></i>
                                <span>赞(<?php echo $value['likes'] ?>)</span>
                            </a>
                            <a href="javascript:;" class="tags">
                                分类：<span><?php echo $value['name'] ?></span>
                            </a>
                        </p>
                        <a href="javascript:;" class="thumb">
                            <img src="<?php echo $value['feature'] ?>" alt="">
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="footer">
            <p>© 2016 XIU主题演示 本站主题由 themebetter 提供</p>
        </div>
    </div>
    <script src="assets/vendors/jquery/jquery.js"></script>
    <script src="assets/vendors/swipe/swipe.js"></script>
    <script>
        //
        var swiper = Swipe(document.querySelector('.swipe'), {
            auto: 3000,
            transitionEnd: function(index) {
                // index++;
                $('.cursor span').eq(index).addClass('active').siblings('.active').removeClass('active');
            }
        });

        // 上/下一张
        $('.swipe .arrow').on('click', function() {
            var _this = $(this);

            if (_this.is('.prev')) {
                swiper.prev();
            } else if (_this.is('.next')) {
                swiper.next();
            }
        })

        $('.like').on('click', function() {
            var id = $(this).attr('postid')
            // console.log(id);
            var that = this;

            $.post({
                url: 'admin/api/addLike.php',
                data: {
                    id: id
                },
                success: function(obj) {
                    console.log(obj);
                    if (obj != 'fail ') {
                        $(that).html('赞(' + obj + ')')
                    } else {
                        alert('点赞失败');
                    }
                }
            })
        })
    </script>
</body>

</html> 