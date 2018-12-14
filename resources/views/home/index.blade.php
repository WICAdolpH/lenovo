<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{config('web.title')}}</title>
    <meta name="keywords" content="{{config('web.keywords')}}" />
    <meta name="description" content="{{config('web.description')}}" />
  <link rel="shortcut icon" href="/style/home/img/1.png">
  <link rel="stylesheet" href="/style/home/css/lenovo.css">
  <script src="/style/home/js/jquery.js"></script>
  <script src="/style/home/js/index.js"></script>
</head>
<body>
  <!-- 头 -->
  @include("home.public.header")



  <!-- 菜单 -->
  <div class="container menus">
    <div class="menus-img">
      <a><img src="/style/home/img/4.jpg"alt=""></a>
    </div>
    <div class="menus-dao">
      <ul>
        <li><a class=xp>小新Air 13 Pro
          <span class="pro"></span>
        </a>
        </li>
        <li class="bk">
          <a >爆款</a>
          <ul class="bk-bao">
           <li> <a href="">小新Air 12</a></li>
            <li><a href="">小新Air13 Pro</a></li>
            <li><a href="">小新310</a></li>
            <li><a href="">拯救者游戏本</a></li>
            <li><a href="">ThinkPad New S2</a></li>
            <li><a href="">看家宝Snowman</a></li>
            <li><a href="">小新700</a></li>
            <li><a href="">MIIX5</a> </li>
            <li><a href="">YOGA BOOK</a></li>
          </ul>
        </li>
        <li ><a class="lx">联想合伙人<span class="hehou"></span></a></li>
        <li><a>0元试用</a></li>
        <li><a>以旧换新</a></li>
        <li><a>私人定制</a></li>
        <li class="fw"><a>服务</a>
          <ul class="fuwu">
            <li><a href="">服务支持</a></li>
            <li><a href="">驱动下载</a></li>
            <li><a href="">联想知识库</a></li>
          </ul>
        </li>
        <li><a>社区</a></li>
        <!-- <li></li> -->
      </ul>
     </div>
  </div>
  <!-- 监听 -->
  <div class="jianting">
    <ul>
    </ul>
  </div>
  <!-- 侧边栏 -->
  <div class="cebianlang">
   <ul>
    <li class="ccbl"><span class="dianhua"></span>
      <div class="xianshi">
        <dl class="clearfix">
          <dt class="pc"></dt>
           <dd>
            <a href="javascript:;">商城服务热线<br>
            4000-888-222</a>
          </dd>
           <dt class="tk"></dt>
           <dd>
            <a href="javascript:;">商城服务热线<br>4000-888-222</a>
          </dd>
           <dt class="shouji"></dt>
           <dd>
            <a href="javascript:;">手机频道服务热线<br>
              400-818-8818</a>
          </dd>
           <dt class="xiuli"></dt>
           <dd>
            <a href="javascript:;">服务产品购买热线<br>
              400-890-1566</a>
          </dd>
          <dt class="dianlian"></dt>
          <dd>
            <a href="javascript:;">联想商用客户热线<br>
              400-813-6161</a>
          </dd>
          <dt class="ka"></dt>
          <dd>
            <a href="javascript:;">通信卡服务热线<br>
              400-641-0041</a>
          </dd>
         </dl>
      </div>
    </li>
    <li><span class="wechat"></span></li>
    <li><span class="home"></span></li>
    <li><span class="qianbi"></span></li>
   </ul>
   <div class="huidao">
    <span class="dingbu"></span>
   </div>

  </div>
  <!-- 轮播区 -->
  <div class="container carouse">
      <div class="left">
        <ul>
            @foreach($type as $one)
      <li>
       <div class="left-menu">
         <a href="/types/{{$one->id}}">{{$one->name}}
         <span class="list_usepng list_icona"></span>
         </a>
         <!-- 详细内容 -->
          <div class="left-xiang">
              <!-- 总说 -->
            <div class="left-zong">
              <!-- 分说 字-->
                @foreach($one->zi as $two)
             <div class="left-zi">
              <p><a href="/types/{{$two->id}}" >{{$two->name}}</a></p>
              <ul class="clearfix">
                  @foreach($two->zi as $three)
                <li>
                  <a href="/types/{{$three->id}}" >{{$three->name}}</a>
                </li>
                  @endforeach
              </ul>
             </div>
            @endforeach
            </div>
            <!-- 分说图 -->
            <div class="left-tu">
                @foreach($one->rightAds as $rightAds)
              <a href="">
                <img class="classification_img"  title="{{$rightAds->title}}" src="/Uploads/ads/{{$rightAds->img}}">
              </a>
                @endforeach
            </div>
          </div>
        </div>
        </li>
            @endforeach
        </ul>
      </div>
      <div class="clear"></div>
      <div class="center">
      <ul class='imgs'>
        @foreach($slider as  $key => $value)
            @if($key==0)
                <li class='active'><img src="/Uploads/lun/{{$value->img}}" alt=""></li>
            @else
                <li class=''><img src="/Uploads/lun/{{$value->img}}" alt="">
            @endif
        @endforeach

      </ul>
      <ul class='nums'>
          @foreach($slider as $key => $value)
              @if($key==0)
                  <li class="active"></li>
              @else
                  <li class=""></li>
              @endif

          @endforeach

      </ul>
      <a href="javascript:;" class="btn btn-left"></a>
      <a href="javascript:;" class="btn btn-right"></a>
  </div>
      <div class="right">
        <div class="xin">
          <div class="xisn">
            <div class="horn_ring"></div>
            <ul class="xnss">
               <li><a target="_blank" href="">四年延保，沸腾国庆！</a></li>
               <li><a target="_blank" href="">联想APP客户端乐豆抽奖大战开始啦，赶快下载抽取大奖，miix平板等着你！</a></li>
               <li><a target="_blank" href="">四年延保，沸腾国庆！</a></li>
               <li><a target="_blank" href="">联想APP客户端乐豆抽奖大战开始啦，赶快下载抽取大奖，miix平板等着你！</a>
               </li>
             </ul>
            </div>
          </div>
        <!-- 评论 -->
        <div class="ping">
           <h2 class="clearfix"><span>精彩讨论</span>
            <a target="_blank" href="">更多 &gt;</a>
           </h2>
           <ul class="lun">
              <li>
                <a target="_blank" href="">【评测】一款高颜值笔记本的告白</a>
              </li>
              <li>
                <a target="_blank" href="">【评测】Moto Z+哈苏模块≈单反体验</a>
              </li>
              <li>
              <a target="_blank" href="">【活动】分享你的怀旧珍藏赢好礼</a>
              </li>
              <li>
                <a target="_blank" href="">【体验】诠释轻薄与性能的小新 Air 13 Pro</a>
              </li>
              <li>
                <a target="_blank" href="">【小白课堂】小新笔记本还能这样玩</a>
              </li>
              <li>
                <a target="_blank" href="l">【活动】联想智能存储有奖征名</a>
              </li>
              <li>

                <a target="_blank" href="">【选本】新晋二合一笔记本推荐</a>
              </li>
             </ul>
        </div>
      </div>

  </div>
  <!-- 图片 -->
  <div class="container middle-erbo">
   <div class="bao">
    <div class="tui">
      <img src="/style/home/img/70.jpg" alt="">
    </div>
    <div class="boo">
      <ul class="bo-1">
          @foreach($ads as $key => $value)
          <li style="width: 252px; height: 159px">
            <a target="_blank" href="">
            <img src="/Uploads/ads/{{$value->img}}">
          </a>
          </li>
        @endforeach

      </ul>
      <a href="javascript:;" class="btn btn-left"></a>
      <a href="javascript:;" class="btn btn-right"></a>
    </div>
   </div>
  </div>
  <!-- 明星单品 -->
  <div class="container star">
    <div class="star-1">
      <h3><span><img src="/style/home/img/555.png" alt=""dispaly="none"></span>明星单品</h3>
      <div class="start-xi">
        <ul>
            @foreach($goods as $good)
          <li style="width: 198px; height: 297px;">
            <a target="_blank" href="/goods/{{ $good->id }}">
                <img title="{{$good->title}}" style="width: 198px;" src="/Uploads/goods/{{$good->img}}">
            </a>
            <p class="star_name">
              <a target="_blank" title="{{$good->title}}" href="/goods/{{ $good->id }}">{{$good->title}}</a>
            </p>
            <p class="star_ad">
              <a target="_blank" title="{{$good->title}}" href="/goods/{{ $good->id }}">{{$good->info}}</a>
            </p>
            <p class="star_price"><a title="{{$good->title}}" target="_blank" href="/goods/{{ $good->id }}">{{number_format($good->price)}}元</a></p>
          </li>
            @endforeach
      <div class='clear'></div>

    </ul>
  </div>
 </div>
</div>
  <!-- 猜你喜欢 -->
  <!-- <div class="like"></div> -->

  <!-- 楼层 -->
  <div class="ceng">
    <div class='container lou '>
  <!-- 1F联想 -->
    <?php
    $louNum = 0;
    ?>
    @foreach($type as $lou)
    @if($lou->is_lou)
        <?php
        $louNum++;
        ?>
     <div class="lenovo">
     <div class="title">
       <h3><span>{{$louNum}}F</span><em>{{$lou->name}}</em></h3>
       <div class="jieshao">
       @foreach($lou->zi as $zi)
        <a target="_blank" title="{{$zi->name}}">{{$zi->name}}</a>
        @endforeach
        <a href="" target="_blank" title="" class="myicon floor_more">更多</a>
       </div>
     </div>
     <div class="rong">
       <div class="zuo">

           <a target="_blank" href="/goods/{{ $good->id }}"> <img title="{{$lou->leftAds->title}}" width="240" height="535" src="/Uploads/ads/{{$lou->leftAds->img}}">
           </a>
       </div>
       <div class="you">
           @foreach($lou->goods as $louGoods)
               <div class="you1 good">
                   <a target="_blank" href="/goods/{{$louGoods->id}}"   title="{{$louGoods->title}}">
                       <img width="164" height="164" title="{{$louGoods->title}}" src="/Uploads/goods/{{$louGoods->img}}" >
                   </a>
                   <a class="good-jie"target="_blank" title="{{$louGoods->title}}" href="/goods/{{$louGoods->id}}">{{$louGoods->title}}
                   </a>
                   <a class="good-jie1"target="_blank" href="/goods/{{$louGoods->id}}" title="{{$louGoods->title}}">{{$louGoods->info}}
                   </a>
                   <a class="money"  target="_blank" href="/goods/{{$louGoods->id}}"  title="{{$louGoods->title}}">{{number_format($louGoods->price)}}元
                   </a>
                   <span class="good-biao"></span>
               </div>

           @endforeach
       </div>
       <div class="clear"></div>
     </div>
     </div>
    @endif

    @endforeach
        <!-- 6F社交平台 -->
        <div class="container social">
            <div class="title">
                <h3><span>{{++$louNum}}F</span> 社交平台</h3>
            </div>
            <div class="social-tu">
                <ul>
                    <li>
                        <div class="shekuang" datatype="5" sort="1" b_i="190,212,30">
                            <a target="_blank" href="">
                                <img width="190" height="212" src="/style/home/img/50.jpg" class="lazy_img"></a>
                            <div class="social-tou"></div>
                            <div class="social-rong">
                                <em class="social-zi" ></em>
                                <span>联想社区</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="shekuang" datatype="5" sort="2" b_i="190,212,30">
                            <a target="_blank" href="http://955.cc/muj82">
                                <img width="190" height="212" src="/style/home/img/52.jpg" class="lazy_img"></a>
                            <div class="social-tou"></div>
                            <div class="social-rong">
                                <em class="social-guanwei"></em>
                                <span>官方微信</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="shekuang" datatype="5" sort="3" b_i="190,212,30">
                            <a target="_blank" href="">
                                <img width="190" height="212" src="/style/home/img/53.jpg" class="lazy_img"></a>
                            <div class="social-tou"></div>
                            <div class="social-rong">
                                <em class="social-weifu"></em>
                                <span>微信服务</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="shekuang" datatype="5" sort="4" b_i="190,212,30">
                            <a target="_blank" href="">
                                <img width="190" height="212" src="/style/home/img/54.jpg" class="lazy_img"></a>
                            <div class="social-tou"></div>
                            <div class="social-rong">
                                <em class="social-batie"></em>
                                <span>百度贴吧</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="shekuang" datatype="5" sort="5" b_i="190,212,30">
                            <a target="_blank" href="">
                                <img width="190" height="212" src="/style/home/img/55.jpg" class="lazy_img"></a>
                            <div class="social-tou"></div>
                            <div class="social-rong">
                                <em class="social-gaungwei"></em>
                                <span>官方微博</span>
                            </div>
                        </div>
                    </li>
                    <li style="margin-right:0px;">
                        <div class="shekuang" datatype="5" sort="6" b_i="190,212,30">
                            <a target="_blank" href="" >
                                <img width="190" height="212" src="/style/home/img/56.jpg" class="lazy_img"></a>
                            <div class="social-tou"></div>
                            <div class="social-rong">
                                <em class="social-xinqu" ></em>
                                <span>兴趣部落</span>
                            </div>
                        </div>
                    </li>
                    <div class="clear"><div>
                </ul>
            </div>
        </div>

    </div>
   </div>
 </div>
<!-- 页脚-->
  @include("home.public.footer")
</div>
<!-- 登陆页面 -->
{{--<div class="WB" id="WB">
  <div class="Wto">
      <div class="dengtitle">
        <h2 class="btn1 now" type="0" >普通登录</h2>
        <h2 class="btn2" type="1" >快捷登录</h2>
        <a class="closess" href="javascript:;"></a>
      </div>

      <div class="inputa">
        <div class="img">
          <img src="/style/home/img/8989.png">
        </div>
        <input class="account" type="text" placeholder="请输入手机号或邮箱" style="display: inline:block;">
        <input class="m_account" style="display: none;" type="text" placeholder="请输入手机号">
      </div>



    <div class="imgs">
      <img height="34px" width="34px"src="/style/home/img/9898.png">
    </div>

    <button class="getMobileCode" style="display:none;">获取动态密码</button>

      <input class="pwd" type="password"  style="display: inline-block;">
      <input class="mcode" style="display: none;" type="text" >
      <div class="pwd_placeholder" style="line-height: 33px; width: 280px; height: 33px; left: 35.1042px; top: 4.50195e-06px; display: block;">密码
      </div>
      <div class="m_account_placeholder" style="line-height: 33px; width: 180px; height: 33px; left: 35.1042px; top: 4.50195e-06px; display: none;">动态密码
      </div>
  </div>


        <div class="captcha_wrapper" style="display: none;">
        <input class="captcha" type="text" data-placeholder="请输入验证码">
        <img class="captcha_img">
        <span class="captcha_tip">换一换</span>
      </div>
      <div class="login_main">
      <p class="tip"></p>
   </div>
   <div class="login_mains">
    <label>
     <input class="persistent" checked="" type="checkbox" latag="latag_pc_login_autologin">
     <p>自动登录</p>
    </label>
     </div>
     <div class="login_btn"> <a href="javascript:void(0)" class="submit" latag="latag_pc_login_confirm">登&nbsp;&nbsp;录</a> </div>
     <div class="login_footer"><p><a class="regist" href="javascript:void(0)" latag="latag_pc_login_register">立即注册</a><a href="javascript:void(0)" class="forgetPwd" latag="latag_pc_login_forgetpw">忘记密码</a></p>
     </div>
     <div class="cooperation">使用合作网站账号登录:
      <div class="cooperation_items">
      <a href=""><img title="qq登陆"src="/style/home/img/qq.png" alt=""></a>
      <a href=""><img title="微博登陆" src="/style/home/img/ico_sina.png" alt=""></a>
      <a href=""><img title="微信登陆" src="/style/home/img/ico_wc.png" alt=""></a>
      <a href=""><img title="支付宝登陆" src="/style/home/img/ico_zfb.png" alt=""></a>
    </div>
  </div>
</div>--}}
</div>
{{--<div class="zhuce">
      <div class="zhuce_title"> 
        <h1>欢迎注册联想会员</h1> 
           <a href=""><span class="close2s"></span></a>
        </div> 
        <div class="zhuce_inputa">
         <p><label>账号</label>
          <input class="account" type="text" placeholder="请输入手机号或邮箱">
        </p> 
       </div>
        <div class="zhuce_inputaa errorAccount">
            <p class="error">帐号不能为空
            </p>
      </div> 
      <div class="zhuce_inputb"> 
            <p>
              <label>密码</label><input placeholder="密码长度8~20位,数字、字母、字符至少包含两种" class="pwd" type="password">
            </p>
      </div> 
      <div class="zhuce_inputaa errorPwd">
      </div>
      <div class="zhuce_inputc"> 
        <p>
          <label>确认密码</label>
          <input type="password" class="repwd">
        </p> 
      </div> 
    <div class="zhuce_inputaa errorRepwd"></div>
      <div class="zhuce_inputd"> 
          <p><label>验证码</label>
          <input type="text" class="captcha">
          </p>
          <img class="img_captcha" ><span class="img_captcha_tip" >换一张</span>
          <button class="mobile_captcha" style="display:none;">获取验证码</button>
      </div> 
      <div class="zhuce_inputaa errorCaptcha"></div> 
      <div class="zhuce_main"><label>
      <input type="checkbox" class="chk" checked="">
      <p style="color: #000"> 同意联想的 
      <a target="_blank" href="" style="color: #005ce6;" >使用条款</a> 
      和 
      <a target="_blank" href="" style="color: #005ce6;" >隐私权政策</a>
      </p>
      </label>
      </div> 
      <div class="zhuce_btn">
        <a style="text-decoration:none;" class="submit" href="javascript:void(0)" latag="latag_pc_register_confirm">立即注册</a>
      </div> 
    </div>--}}
 

   </div>
</body>

</html>

